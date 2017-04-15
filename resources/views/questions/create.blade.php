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
            Nova pergunta
        </li>
    </ul>

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-pencil-square-o font-green-sharp"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">Adicionar Pergunta</span>
            </div>
        </div>
        <div class="portlet-body form">

            <form action="{{ route('questions.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="text">Pergunta</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="text" id="text" value="{{ old('text') }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="level">Nível</label>
                        <div class="col-md-1">
                            <input type="number" min="1" class="form-control" name="level" id="level" value="{{ old('level', 1) }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="hint">Dica</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="hint" id="hint" value="{{ old('hint') }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="text">Opções</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-1" style="padding-top: 5px">
                                    <input type="radio" name="answer" value="0"/>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="options[0][text]" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1" style="padding-top: 5px">
                                    <input type="radio" name="answer" value="1"/>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="options[1][text]" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1" style="padding-top: 5px">
                                    <input type="radio" name="answer" value="2"/>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="options[2][text]" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1" style="padding-top: 5px">
                                    <input type="radio" name="answer" value="3"/>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="options[3][text]" class="form-control">
                                </div>
                            </div>
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