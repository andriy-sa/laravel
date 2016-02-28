@extends('layouts.admin')

@section('title','front admin page')

@section('content')
    <section class="content-header">
        <h1>
            Оголошення
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li>
                <a href="{{ route('admin_adverts') }}">
                     Оголошення
                </a>
            </li>
            <li>
                {{ $advert->title }}
            </li>
        </ol>
    </section>
    <section id="admin-content">
        <form  method="post" action="{{ route('admin_adverts_update_post',['id'=>$advert->id]) }}">
            <div class="form-group">
                <label for="title">{{ trans('message.title') }}</label>
                <input type="text" id="title" name="title" value="{{ $advert->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">{{ trans('message.category') }}</label>
                {!! Form::select('category',$categories_select,$advert->category_id,['placeholder' => trans('message.select_category'),'class'=>'form-control','id'=>'category']) !!}
            </div>
            <div class="form-group">
                <label for="description">{{ trans('message.description') }}</label>
                <textarea name="description" id="description" class="form-control" rows="7">{!! $advert->description !!}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($advert->status == 'default') selected @endif value="default">Default</option>
                    <option @if($advert->status == 'top') selected @endif value="top">Top</option>
                    <option @if($advert->status == 'hot') selected @endif value="hot">Hot</option>
                    <option @if($advert->status == 'blocked') selected @endif value="blocked">Blocked</option>
                </select>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="published" value="1" class="flat-red" @if($advert->published) checked @endif> Опублікувати
                    </label>
                </div>
            </div>
            <div class="form-group">
                {!! csrf_field() !!}
                <button class="btn btn-success" type="submit">Зберегти</button>
            </div>
        </form>
    </section>
@stop
@section('scripts')
    {!! Html::script('ckeditor/ckeditor.js') !!}
    <script src="/plugins/iCheck/icheck.min.js"></script>
    <link rel="stylesheet" href="/plugins/iCheck/all.css">
    <script type="text/javascript">
        CKEDITOR.replace( 'description' );

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>


@stop