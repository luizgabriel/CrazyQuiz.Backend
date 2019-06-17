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
                        <h4 class="mb-0">Perguntas</h4>
                    </div>

                    <div class="card-body">

                        <a href="{{ route('questions.create') }}" class="btn btn-primary mb-4">
                            Criar Pergunta <i class="fa fa-plus" style="margin-left: 10px"></i>
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
                                        <td>
                                            @if ($question->difficulty > 5)
                                                <span class="badge badge-danger">Difícil ({{ number_format($question->difficulty, 1) }})</span>
                                            @elseif ($question->difficulty < -5)
                                                <span class="badge badge-success">Fácil ({{ number_format($question->difficulty, 1) }})</span>
                                            @else
                                                <span class="badge badge-primary">Normal ({{ number_format($question->difficulty, 1) }})</span>
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
                </div>
            </div>
        </div>
    </div>
@endsection