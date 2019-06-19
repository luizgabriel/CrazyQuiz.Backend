@extends('layouts.app')

@section('title')
    Gerenciar Perguntas
@endsection

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Gerenciar perguntas</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">

                @if(session()->get('questions.created', false))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Pergunta criada com sucesso!
                    </div>
                @endif

                @if(session()->get('questions.updated', false))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Pergunta atualizada com sucesso!
                    </div>
                @endif

                <div class="card">

                    <div class="card-header">
                        <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                   role="tab" aria-controls="pills-home" aria-selected="true">Questões</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-statistic-tab" data-toggle="pill" href="#pills-statistic"
                                   role="tab" aria-controls="pills-statistic" aria-selected="false">Estatística</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">

                                <a href="{{ route('questions.create') }}" class="btn btn-primary mb-4">
                                    Criar Pergunta <i class="fa fa-plus ml-4"></i>
                                </a>

                                <div class="table-responsive">
                                    <table class="table table-hover table-light" style="min-width: 700px">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Pergunta</th>
                                            <th>Resposta</th>
                                            <th>Dificuldade</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if($questions->count() == 0)
                                            <tr>
                                                <td colspan="4">
                                                    Nenhuma questão cadastrada
                                                </td>
                                            </tr>
                                        @endif

                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{ $question->id }}</td>
                                                <td>{{ Str::limit($question->text) }}</td>
                                                <td>{{ Str::limit(optional($question->answer)->text) }}</td>
                                                <td data->
                                                    @if ($question->hard)
                                                        Difícil
                                                    @elseif ($question->easy)
                                                        Fácil
                                                    @else
                                                        Normal
                                                    @endif
                                                </td>
                                                <td width="250px">
                                                    <a href="{{ route('questions.edit', $question->id) }}"
                                                       class="btn default btn-xs text-success pull-left">
                                                        <i class="fa fa-pencil"></i> Editar
                                                    </a>
                                                    <form action="{{ route('questions.destroy', $question->id) }}"
                                                          class="pull-left" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn default btn-xs text-danger"
                                                                onclick='return confirm("Deseja realmente remover esta pergunta do CrazyQuiz?")'>
                                                            <i class="fa fa-close"></i> Remover
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="m-auto">
                                        <div class="pull-right">
                                            {!! $questions->links("pagination::bootstrap-4") !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-statistic" role="tabpanel"
                                 aria-labelledby="pills-statistic-tab">

                                <h2>Dificuldade</h2>

                                <ul class="list-group w-25">
                                    <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
                                        Fáceis
                                        <span class="badge badge-primary badge-pill">{{ $easy }}</span>
                                    </li>
                                    <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
                                        Normal
                                        <span class="badge badge-primary badge-pill">{{ $normal }}</span>
                                    </li>
                                    <li class="list-group-item list-group-item-danger d-flex justify-content-between align-items-center">
                                        Difíceis
                                        <span class="badge badge-primary badge-pill">{{ $hard }}</span>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection