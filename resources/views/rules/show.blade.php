@extends('layouts.app')
@section('content')
    <div class="toggle-item-content list-rules">
        @if (!$rules->isEmpty())
            <p>Aqui está uma listar de todas as regras de atendimento criadas.</p>
        @else
            <p>Não existem regras criadas!</p>
        @endif
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
@endsection
