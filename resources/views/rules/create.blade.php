@extends('layouts.app')
@section('content')
    @isset($message)
    <div class="alert alert-success">
    <strong>{{$message}}</strong>
    </div>
    @endif
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
@endsection
