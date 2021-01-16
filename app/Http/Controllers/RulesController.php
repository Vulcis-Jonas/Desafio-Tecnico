<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rules;
use App\Http\Controllers\RulesController;
use DateTime;
use PDO;
class RulesController extends Controller
{
    public $objRules;

    public function __constuct()
    {
        $this->objRules= Rules::latest()->paginate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //return view(regras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rules $rule)
    {
        $rules = Rules::latest()->paginate();
        return view('rules.create', compact('rules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_rule' => 'required',
            'time_start'  => 'required',
            'time_end' => 'required',
        ]);



        if ($request->type_rule == 'Uma vez' && empty($request->date_rule)) {

            $message="Insira uma data!";
            return view('rules.create', compact('message'));
        }

        if ($request->type_rule == 'Semanalmente' && empty($request->weekday_rule)) {

            $message="Escolha um dia da semana!";
            return view('rules.create', compact('message'));
        }

        if ($request->time_start >= $request->time_end) {
            $message="Insera um intervalo de horário correto!";
            return view('rules.create', compact('message'));
        }

        if ($request->type_rule == 'Diariamente') {
        }


        $rules = Rules::latest()->paginate();

        Rules::create($request->all());

        return redirect()->route('main')
            ->with('alert-danger', 'danger');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $valueDate = $request->daterange;
        $fromRule = substr($valueDate, 0, 10);
        $toRule = substr($valueDate, 13);
        //dd(date('Y-m-d', strtotime(str_replace('/', '-', $fromRule))));
        //echo "<script> console.log('1223'); </script>";
        //dd(Rules::where('date_rule', '=', '2021-01-12')->count());
        $rules = Rules::latest()->paginate();
        $from = date('Y-m-d', strtotime(str_replace('/', '-', $fromRule)));
        $to = date('Y-m-d', strtotime(str_replace('/', '-', $toRule)));

        $dayRules = Rules::whereBetween('date_rule', [$from, $to])->get()->toArray();
        $dailyRules = Rules::where('type_rule', ['Diariamente'])->get()->toArray();
        $weekRules = Rules::where('type_rule', ['Semanalmente'])->get()->toArray();

        $fromTime = new DateTime($from);
        $toTime = new DateTime($to);
        $interval = $toTime->diff($fromTime);
        $times = array(
            array(
                "type_rule" => '',
                "date_rule" => '',
                "time_rule" => '',
            )
        );
        if($dayRules || $dailyRules || $weekRules) {
            $time_rule_day = "";
            for ( $i = 0; $i < $interval->days; $i++ ) {
                if (count($dailyRules) > $i) {
                    $time_rule_day = $time_rule_day . " | " .date('G:i', strtotime($dailyRules[$i]["time_start"])) . " ás " . date('G:i', strtotime($dailyRules[$i]["time_end"]));
                    $time = array(
                        array(
                            "type_rule" => $dailyRules[$i]["type_rule"],
                            "date_rule" => 'Todos os dias',
                            "time_rule" => $time_rule_day,
                        )
                    );

                    if($dailyRules[$i] == end($dailyRules)){
                        $times = array_merge($times, $time);
                    }

                }
            }
            for ( $i = 0; $i < $interval->days; $i++ ) {
                if (count($weekRules) > $i) {
                    $time = array(
                        array(
                            "type_rule" => $weekRules[$i]["type_rule"],
                            "date_rule" => '' . date('d-m-Y', strtotime("next ". $weekRules[$i]["weekday_rule"])) .'',
                            "time_rule" => date('G:i', strtotime($weekRules[$i]["time_start"])) . " ás " . date('G:i', strtotime($weekRules[$i]["time_end"])),

                        )
                    );
                    $times = array_merge($times, $time);
                }
                if (count($dayRules) > $i) {
                    $time = array(
                        array(
                            "type_rule" => $dayRules[$i]["type_rule"],
                            "date_rule" => '' . date('d-m-Y', strtotime($dayRules[$i]["date_rule"])) .'',
                            "time_rule" => date('G:i', strtotime($dayRules[$i]["time_start"])) . " ás " . date('G:i', strtotime($dayRules[$i]["time_end"])),

                        )
                    );
                    $times = array_merge($times, $time);
                }
            }
        }


        unset($times[0]);
        //dd($times);
        //$times = Rules::whereBetween('date_rule', [$from, $to])->get()->toArray();
        return view('rules.search', compact('rules', 'times', 'valueDate'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $rules = Rules::latest()->paginate();

        return view('rules.show', compact('rules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$deleted = Rules::table('DELETE FROM `desafio_db`.`rules` WHERE (`id` = ?)', [$id]);
        //Rules::table('rules')->where('id', '=', $id)->delete();
        // $rules = Rules::find($id);
        // $id.destroy();
        //Rules::destroy($id);
        $rule = Rules::find($id);
        $rule->delete();

        $rules = Rules::latest()->paginate();
        return redirect()->route('show');
    }
}
