@extends('layouts.app')

@section('title')
    <div class="page-title">
        <h1>Gerenciar Perguntas <small>adicione, edite ou remova perguntas</small></h1>
    </div>
@endsection

@section('content')


    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('questions.index') }}">Gerenciar perguntas</a>
            <i class="fa fa-circle"></i>
        </li>
        <li class="active">
            Editar pergunta
        </li>
    </ul>

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-pencil-square-o font-green-sharp"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">Editar Pergunta</span>
            </div>
        </div>
        <div class="portlet-body form">

            <form action="{{ route('questions.update', $question->id) }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="text">Pergunta</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="text" id="text" value="{{ old('text', $question->text) }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="level">Nível</label>
                        <div class="col-md-1">
                            <input type="number" min="1" class="form-control" name="level" id="level" value="{{ old('level', $question->level) }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="hint">Dica</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="hint" id="hint" value="{{ old('hint', $question->hint) }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="text">Opções</label>
                        <div class="col-md-6">
                            @foreach($question->options as $option)
                            <div class="row">
                                <div class="col-md-1" style="padding-top: 5px">
                                    <input type="radio" name="answer" value="{{ $option->id }}" {{ $option->answer? 'checked': '' }}/>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="options[{{ $option->id }}][text]" value="{{ $option->text }}" class="form-control">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection