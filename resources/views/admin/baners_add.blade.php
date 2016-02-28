@extends('layouts.admin')

@section('title','front admin page')

@section('content')
    <section class="content-header">
        <h1>
            Додати банер
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li>
                <a href="{{ route('admin_baners') }}">
                    <i class="fa fa-dashboard"></i> Банера
                </a>
            </li>
        </ol>
    </section>
    <section id="admin-content">
        <form action="{{ route('admin_baners_add_post') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-group">
                    <label for="note">Заголовок</label>
                    <input name="note" value="{{ old('note') }}" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="url">Link</label>
                    <input name="url" value="{{ old('url') }}" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">Тип</label>
                    <select class="form-control" name="type" id="type">
                        <option @if(old('type') == 'a1') selected @endif value="a1">a1</option>
                        <option @if(old('type') == 'b1') selected @endif value="b1">b1</option>
                        <option @if(old('type') == 'b2') selected @endif value="b2">b2</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Банер</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                {!! csrf_field() !!}
                <button class="btn btn-success" type="submit">Зберегти</button>
            </div>
        </form>
    </section>
@stop