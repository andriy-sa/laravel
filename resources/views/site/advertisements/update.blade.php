@extends('layouts.app')

@section('title',$title.' | '.trans('message.action'))

@section('content')
    <div class="container advertisements-page">
        <div class="page-title">
            <h1>{{ $title }}</h1>
        </div>
        <div class="col-sm-4">
            @include('blocks.category_sidebar')
        </div>
        <div class="col-sm-8">
            <form id="updateAdvertisement" class="my1-panel" method="post" action="{{ route('post_advert_update',['locale'=>$cur_local,'id'=>$advertisement->id]) }}">
                <div class="form-group">
                    <label for="title">{{ trans('message.title') }}</label>
                    <input type="text" id="title" name="title" value="{{ $advertisement->title }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">{{ trans('message.category') }}</label>
                    {!! Form::select('category',$categories_select,$advertisement->category_id,['placeholder' => trans('message.select_category'),'class'=>'form-control','id'=>'category']) !!}
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('message.description') }}</label>
                    <textarea name="description" id="description" class="form-control" rows="7">{!! $advertisement->description !!}</textarea>
                </div>
                <div class="form-group">
                    {!! csrf_field() !!}
                    <button class="btn btn-success" type="submit">{{ trans('message.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('scripts')
    {!! Html::script('ckeditor/ckeditor.js') !!}
    <script type="text/javascript">
        CKEDITOR.replace( 'description' );
    </script>
    {!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {{--<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js', '#createAdvertisement')}}"></script>--}}
    {!! $validator->selector('#updateAdvertisement') !!}
@stop