@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Мой блог </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/posts/create" title="Создать пост">  <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Название поста</th>
            <th>Текст поста</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post -> id}}</td>
                <td>{{$post -> title}}</td>
                <td>{{$post -> content}}</td>
                <td>{{$post -> created_at}}</td>
                <td>
                    <form action="/posts/{{$post -> id}}" method="POST">

                        <a href="/posts/{{$post -> id}}" title="показать">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="/posts/{{$post -> id}}/edit" title="изменить">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="удалить" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $posts->links('pagination::bootstrap-4') !!}

@endsection