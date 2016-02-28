@extends('layouts.admin')

@section('title','front admin page')

@section('content')
    <section class="content-header">
        <h1>
            Редагувати : {{ $baner->note }}
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
        <form action="{{ route('admin_baner_update_post',['id'=>$baner->id]) }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-group">
                    <label for="note">Заголовок</label>
                    <input name="note" value="{{ $baner->note }}" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="url">Link</label>
                    <input name="url" value="{{ $baner->url }}" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">Тип</label>
                    <select class="form-control" name="type" id="type">
                        <option @if($baner->type == 'a1') selected @endif value="a1">a1</option>
                        <option @if($baner->type == 'b1') selected @endif value="b1">b1</option>
                        <option @if($baner->type == 'b2') selected @endif value="b2">b2</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="image">Банер</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="col-sm-6">
                    <img class="img-responsive" src="/userfiles/baners/{{ $baner->image }}" alt="baner">
                </div>

            </div>
            <div style="clear: both" class="form-group">
                {!! csrf_field() !!}
                <button class="btn btn-success" type="submit">Зберегти</button>
            </div>
        </form>
    </section>
@stop