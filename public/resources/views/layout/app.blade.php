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

        <section>
            <nav class="navbar-vertical">
                <a>
                    Agendar
                    <p>Cadastra regras de horário para atendimento.</p>
                </a>
                <a href="{{ URL::route('show') }}" >
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

                @section('sidebar')

                @show
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
        <?php
            $results = DB::select('SELECT * FROM desafio_db.rules;');
            echo '<script>console.log(' . json_encode($results) . ')</script>';
        ?>
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
