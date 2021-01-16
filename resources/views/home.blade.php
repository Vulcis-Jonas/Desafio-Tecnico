<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="resources/css/app.css">
        <link href="vendor/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
        <link rel="stylesheet" href="resources/css/jquery.timepicker.css">
    </head>
    <body>

        <?php
            $query = DB::select('SELECT * FROM desafio_db.rules;');
            $results = json_encode($query);
        ?>

        <section>
            <nav class="navbar-vertical">
                <a>
                    Agendar
                    <p>Cadastra regras de horário para atendimento.</p>
                </a>
                <!-- href="{{ URL::route('show') }}" -->
                <a >
                    Regras
                    <p>Com esta ferramenta podes visualizar e gerenciar suas regras.</p>
                </a>
                <a>
                    Pesquisar
                    <p>Exibir os horários disponíveis, considerando um intervalo de datas. </p>
                </a>
            </nav>
            <aside>
                <header>
                    <h1>Sistema de agendamentos clinicos</h1>
                    <span>Desafio técnico proposto pela Edutec</span>
                </header>

                <form action="{{ route('store') }}" name="theForm" class="form-create-rule toggle-item-content center  no-selectable" method= "POST">
                    @csrf
                    <div class="custom-radios">
                        <div class="radio-group">
                            <input type="radio" id="option-one" name="type_rule" value="Uma vez" checked>
                            <label for="option-one">Uma vez</label>
                            <input type="radio" id="option-two" name="type_rule" value="Diariamente">
                            <label for="option-two">Diariamente</label>
                            <input type="radio" id="option-three" name="type_rule" value="Semanalmente">
                            <label for="option-three">Semanalmente</label>
                        </div>
                    </div>
                    <input type="date" name="date_rule" class="toggle-item-rule input-date-rule center"/>
                    <div class="custom-checkbox ocult toggle-item-rule">
                        <div class="checkbox-group center ">
                            <input type="radio" id="option-sun" name="weekday_rule" value='Sunday'  <?php isset($_POST['type_rule']) ? 'checked' : '';?> >
                            <label for="option-sun">Dom</label>
                            <input type="radio" id="option-mod" name="weekday_rule" value='Monday'>
                            <label for="option-mod">Seg</label>
                            <input type="radio" id="option-tue" name="weekday_rule" value='Tuesday'>
                            <label for="option-tue">Ter</label>
                            <input type="radio" id="option-wed" name="weekday_rule" value='Wednesday'>
                            <label for="option-wed">Qua</label>
                            <input type="radio" id="option-thu" name="weekday_rule" value='Thursday'>
                            <label for="option-thu">Qui</label>
                            <input type="radio" id="option-fri" name="weekday_rule" value='Friday'>
                            <label for="option-fri">Sex</label>
                            <input type="radio" id="option-sat" name="weekday_rule" value='Saturday'>
                            <label for="option-sat">Sab</label>
                        </div>
                    </div>
                    <div class="form-time center" method="post">
                        <input class="timepicker timepicker-with-dropdown text-center" name="time_start" required>
                        <i class="fas fa-minus"></i>
                        <input class="timepicker timepicker-with-dropdown text-center" name="time_end" required>
                    </div>
                    <button type="submit" class="center btn-form-submit">Criar regra</button>
                </form>

                <div class="toggle-item-content list-rules ocult ">

                    <p>Aqui está uma listar de todas as regras de atendimento criadas.</p>
                    <ul class="result-search">
                        @foreach ($rules as $rule)
                        <li>
                            <span>
                                <h4>Tipo: {{ $rule->type_rule }}</h4>
                                @if ($rule->date_rule)
                                    <p>Dia: {{ date('d F Y', strtotime($rule->date_rule)) }}</p>
                                @endif
                                @if ($rule->weekday_rule)
                                    <p>Dia da semana: {{ $rule->weekday_rule }} </p>
                                @endif
                                <p>Horários: {{ date('G:i', strtotime($rule->time_start)) }} ás {{ date('G:i', strtotime($rule->time_end)) }}</p>
                            </span>
                            <form action="{{ route('destroy', ['id' => $rule->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="list-times toggle-item-content ocult">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <input type="text" name="daterange" placeholder="Período " value="{{$valueDate}}"/>
                        <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <ul class="result-search">
                        @if ($times)
                            @foreach ($times as $time)
                                <li>
                                    <span>
                                        @if ($time["type_rule"] == "Uma vez")
                                            <h4>Dia: {{ $time["date_rule"] }}</h4>
                                        @endif
                                        @if ($time["type_rule"] != "Uma vez")
                                            <h4>Dia: {{ $time["date_rule"] }}</h4>
                                        @endif
                                        <p>Horários: {{ $time["time_rule"] }}</p>
                                    </span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </aside>
        </section>
        <footer>
            <span>
                <h2><a href="">Jonas Teixeira</a></h2>
                <p>Uma pequena aplicação para facilitar o gerenciamento de
                    horários de uma clínica! Ela deve satisfazer as seguintes necessidades:</p>
            </span>
            <ul>
                <li>Cadastrar e apagar regras<i class="fas fa-check"></i></li>
                <li>Listar regras e horários<i class="fas fa-check"></i></li>
                <li>Fonte no <a href="">GitHub</a><i class="fas fa-check"></i></li>
                <li>Laravel<i class="fas fa-check"></i></li>
            </ul>
        </footer>
        <script type="text/javascript" src="vendor/jquery/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script src="vendor/timepicker/jquery.timepicker.js"></script>

        <script type="text/javascript" src="resources/js/app.js"></script>

        <script>
            $('input[name="daterange"]').daterangepicker({
                "locale": {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "daysOfWeek": [
                    "Dom",
                    "Seg",
                    "Ter",
                    "Qua",
                    "Qui",
                    "Sex",
                    "Sab"
                    ],
                    "monthNames": [
                    "Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro"
                    ],
                    "firstDay": 1,
                },
                "opens": "center",
                "autoApply": true,
                },
                function() {
                }
                );
        </script>
    </body>
</html>
