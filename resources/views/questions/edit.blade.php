@extends('layouts.app')

@section('title')
    Criar Pergunta
@endsection

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Gerenciar perguntas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Atualizar Pergunta</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Atualizar Pergunta</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('questions.update', $question->id) }}" method="post" class="form-horizontal">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}

                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label" for="text">Pergunta</label>
                            <input type="text" class="form-control" name="text" id="text"
                                   placeholder="Pense numa pergunta bem engraçada! Ou não..."
                                   value="{{ old('text', $question->text) }}"/>
                            @include('includes.validation', ['input' => 'text'])
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="text">Opções</label>
                            @include('includes.validation', ['input' => 'options'])
                            @foreach ($question->options as $i => $option)
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="options[{{ $i }}][answer]" value="1"
                                                   {{ $option->answer? 'checked' : '' }}
                                                   placeholder="Preencha a opção {{$i + 1}}"/>
                                        </div>
                                    </div>
                                    <input type="text" name="options[{{ $i }}][text]" value="{{ $option->text }}"
                                           class="form-control"/>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i> Salvar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection