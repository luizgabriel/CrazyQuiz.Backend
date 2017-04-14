@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Perguntas</div>

        <div class="panel-body">

            <a href="" class="btn btn-primary">
                Adicionar pergunta
            </a>

        </div>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nível</th>
                    <th>Texto</th>
                </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->level }}</td>
                    <td>{{ str_limit($question->text) }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        {!! $questions->links() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection