@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/posts" title="Назад"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Название поста</strong>
            {{$post -> title}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Текст поста</strong>
            {{$post -> content}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Дата</strong>
            {{$post -> created_at}}
        </div>
    </div>
</div>
@endsection