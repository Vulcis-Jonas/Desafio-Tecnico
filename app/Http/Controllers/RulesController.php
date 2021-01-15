<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rules;
use App\Http\Controllers\RulesController;

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
        $valueDate = "date('d/m/Y', strtotime('+0 day')". "-" ."date('d/m/Y', strtotime('+0 day')";
        $rules = Rules::latest()->paginate();
        $from = date('Y-m-d', strtotime('+0 day'));
        $to = date('Y-m-d', strtotime('+0 day'));
        $times = Rules::whereBetween('date_rule', [$from, $to])->get();

        return view('home', compact('rules', 'times', 'valueDate'));
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

        if ($request->type_rule == 'Diariamente') {
            
        }

        $rules = Rules::latest()->paginate();

        Rules::create($request->all());

        return redirect()->route('main')
            ->with('success', 'Project created successfully.');
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

        dd( Rules::where('type_rule', ['Diariamente'])->get());
        $times = Rules::whereBetween('date_rule', [$from, $to])->get();
        //dd(Rules::whereBetween('date_rule', [$from, $to])->get());
        return view('home', compact('rules', 'times', 'valueDate'));
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

        return view('home', compact('rules'));
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
        return redirect()->route('main');
    }
}
