@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавить новую запись</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/posts" title="Назад"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/posts" method="POST" >
        @csrf

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Пользователь</strong>
                    <input type="text" name="name_id" class="form-control" placeholder="Номер пользователя">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Совет</strong>
                    <input type="text" name="title" class="form-control" placeholder="Совет">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Пояснение</strong>
                    <textarea class="form-control" style="height:50px" name="content"
                        placeholder="Пояснение"></textarea>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>

    </form>
@endsection