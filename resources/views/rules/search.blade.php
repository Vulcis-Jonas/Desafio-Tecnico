@extends('layouts.app')
@section('content')
    <div class="list-times toggle-item-content">
        <form action="{{ route('search') }}" method="get">
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
@endsection
