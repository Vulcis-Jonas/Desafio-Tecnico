<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="../resources/css/app.css">
        <link href="../vendor/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
        <link rel="stylesheet" href="../resources/css/jquery.timepicker.css">
    </head>
    <body>

        <section>
                <form action="{{ route('registrar_regra_diaria') }}" class="form-create-rule toggle-item-content center  no-selectable" method= "POST">
                    @csrf
                    <div class="custom-radios">
                        <div class="radio-group">
                            <input type="radio" id="option-one" name="selector">
                            <label for="option-one">Uma vez</label>
                            <input type="radio" id="option-two" name="selector">
                            <label for="option-two">Diariamente</label>
                            <input type="radio" id="option-three" name="selector">
                            <label for="option-three">Semanalmente</label>
                        </div>
                    </div>
                    <input type="date" name="birthday" class="toggle-item-rule input-date-rule center"/>
                    <div class="custom-checkbox ocult toggle-item-rule">
                        <div class="checkbox-group center ">
                            <input type="checkbox" id="option-sun" name="selector">
                            <label for="option-sun">Dom</label>
                            <input type="checkbox" id="option-mod" name="selector">
                            <label for="option-mod">Seg</label>
                            <input type="checkbox" id="option-tue" name="selector">
                            <label for="option-tue">Ter</label>
                            <input type="checkbox" id="option-wed" name="selector">
                            <label for="option-wed">Qua</label>
                            <input type="checkbox" id="option-thu" name="selector">
                            <label for="option-thu">Qui</label>
                            <input type="checkbox" id="option-fri" name="selector">
                            <label for="option-fri">Sex</label>
                            <input type="checkbox" id="option-sat" name="selector">
                            <label for="option-sat">Sab</label>
                        </div>
                    </div>
                    <div class="form-time center" method="post">
                        <input class="timepicker timepicker-with-dropdown text-center" required>
                        <i class="fas fa-minus"></i>
                        <input class="timepicker timepicker-with-dropdown text-center" required>
                    </div>
                    <button type="submit" class="center btn-form-submit">Criar regra</button>
                </form>

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
        <script type="text/javascript" src="../vendor/jquery/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script src="../vendor/timepicker/jquery.timepicker.js"></script>

        <script type="text/javascript" src="../resources/js/app.js"></script>
        <?php
            $results = DB::select('SELECT * FROM desafio_db.regras_diarias;');
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
