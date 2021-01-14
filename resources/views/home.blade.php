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

                <form action="{{ route('registrar_regra_diaria') }}" name="theForm" class="form-create-rule toggle-item-content center  no-selectable" method= "POST">
                    @csrf
                    <div class="custom-radios">
                        <div class="radio-group">
                            <input type="radio" id="option-one" name="type_rule" value="Uma vez">
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
                            <input type="radio" id="option-sun" name="weekday_rule" value='Domingo'>
                            <label for="option-sun">Dom</label>
                            <input type="radio" id="option-mod" name="weekday_rule" value='Segunda'>
                            <label for="option-mod">Seg</label>
                            <input type="radio" id="option-tue" name="weekday_rule" value='Terça'>
                            <label for="option-tue">Ter</label>
                            <input type="radio" id="option-wed" name="weekday_rule" value='Quarta'>
                            <label for="option-wed">Qua</label>
                            <input type="radio" id="option-thu" name="weekday_rule" value='Quinta'>
                            <label for="option-thu">Qui</label>
                            <input type="radio" id="option-fri" name="weekday_rule" value='Sexta'>
                            <label for="option-fri">Sex</label>
                            <input type="radio" id="option-sat" name="weekday_rule" value='Sábado'>
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
                                    <p>Dia: {{ $rule->date_rule }}</p>
                                @endif
                                @if ($rule->weekday_rule)
                                    <p>Dia da semana: {{ $rule->weekday_rule }} </p>
                                @endif
                                <p>Horários: {{ $rule->time_start }} ás {{ $rule->time_start }}</p>
                            </span>
                            <i class="fas fa-trash"></i>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="list-times toggle-item-content ocult">
                    <input type="text" name="daterange" placeholder="Período "/>
                    <ul class="result-search">
                        <li>
                            <span>
                                <h4>Dia: 25 de Agosto de 2021</h4>
                                <p>Horários: 14:00 às 15:00</p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h4>Dia: 29 de Agosto de 2021</h4>
                                <p>Horários: 08:30 às 11:00</p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h4>Dia: 25 de Agosto de 2021</h4>
                                <p>Horários: 14:00 às 15:00</p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h4>Dia: 25 de Agosto de 2021</h4>
                                <p>Horários: 14:00 às 15:00</p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h4>Dia: 25 de Agosto de 2021</h4>
                                <p>Horários: 14:00 às 15:00</p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h4>Dia: 25 de Agosto de 2021</h4>
                                <p>Horários: 14:00 às 15:00</p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h4>Dia: 25 de Agosto de 2021</h4>
                                <p>Horários: 14:00 às 15:00</p>
                            </span>
                        </li>
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
                    console.log('start, end, label');
                }
                );
        </script>
    </body>
</html>
