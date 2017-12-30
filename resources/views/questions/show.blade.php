@extends('layouts.app')

@section('title')
    Criar Pergunta
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Gerenciar perguntas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Pergunta #{{ $question->id }}</li>
        </ol>
    </nav>

    <h4 class="mb-3">{{ $question->text }}</h4>

    <ul class="list-group">
        @foreach($question->options as $option)
            <li class="list-group-item {{ $option->answer? "list-group-item-success" : "" }}">{{ $option->text }}</li>
        @endforeach
    </ul>

    <form action="{{ route('questions.destroy', $question->id) }}" method="post" class="mt-5">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn default btn-xs text-danger" onclick='return confirm("Deseja realmente remover esta pergunta do CrazyQuiz?")'>
            <i class="fa fa-close"></i> Apagar Pergunta
        </button>
    </form>

@endsection