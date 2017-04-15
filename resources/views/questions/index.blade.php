@extends('layouts.app')

@section('title')
    <div class="page-title">
        <h1>Gerenciar Perguntas <small>adicione, edite ou remova perguntas</small></h1>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            @if(session()->get('questions.created', false))
            <div class="note note-success note-bordered">
                Pergunta criada com sucesso!
            </div>
            @endif

            <div class="portlet light">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-question-circle-o font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Perguntas</span>
                    </div>
                </div>

                <div class="portlet-body">

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('questions.create') }}" class="btn btn-primary">
                                        Adicionar Pergunta <i class="fa fa-plus" style="margin-left: 10px"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="uppercase">
                                <th>#</th>
                                <th>Nível</th>
                                <th>Texto</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr data-id="{{  $question->id }}" data-text="{{ $question->text }}">
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->level }}</td>
                                <td>{{ str_limit($question->text) }}</td>
                                <td>
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn default btn-xs text-warning">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <button data-component="destroyBtn" class="btn default btn-xs text-danger">
                                        <i class="fa fa-close"></i> Remover
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <div class="pull-right">
                                {!! $questions->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>

@endsection