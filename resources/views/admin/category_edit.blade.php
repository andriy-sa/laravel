@extends('layouts.admin')

@section('title','front admin page')

@section('content')
    <section class="content-header">
        <h1>
            Редагувати : {{ $cat->uk_title }}
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li>
                <a href="{{ route('admin_categories') }}">
                    <i class="fa fa-dashboard"></i> Категорії
                </a>
            </li>
        </ol>
    </section>
    <section id="admin-content">
        <form action="{{ route('admin_category_edit_post',['id'=>$cat->id]) }}" method="post">
            <div class="form-group">
                <label for="uk_title">Заголовок UK</label>
                <input name="uk_title" value="{{ $cat->uk_title }}" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="ru_title">Заголовок RU</label>
                <input name="ru_title" value="{{ $cat->ru_title }}" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="icon">Icon</label>
                <input name="icon" value="{{ $cat->icon }}" type="text" class="form-control">
            </div>
            <div class="form-group">
                {!! csrf_field() !!}
                <button class="btn btn-success" type="submit">Зберегти</button>
            </div>
        </form>
    </section>
@stop
