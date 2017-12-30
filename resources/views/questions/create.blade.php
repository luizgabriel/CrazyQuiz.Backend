@extends('layouts.app')

@section('title')
    Criar Pergunta
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Gerenciar perguntas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Criar Pergunta</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Adicionar Pergunta</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('questions.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label" for="text">Pergunta</label>
                        <input type="text" class="form-control" name="text" id="text" value="{{ old('text') }}"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="text">Opções</label>

                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="answer" value="0" required/>
                                </span>
                            </div>
                            <input type="text" name="options[0][text]" class="form-control">
                        </div>

                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="answer" value="1" required/>
                                </span>
                            </div>
                            <input type="text" name="options[1][text]" class="form-control">
                        </div>

                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="answer" value="2" required/>
                                </span>
                            </div>
                            <input type="text" name="options[2][text]" class="form-control">
                        </div>

                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="answer" value="3" required/>
                                </span>
                            </div>
                            <input type="text" name="options[3][text]" class="form-control">
                        </div>


                    </div>


                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection