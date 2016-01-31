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
            <form method="post" action="{{ route('post_advert_create',['locale'=>$cur_local]) }}">
                create forma
            </form>
        </div>
    </div>
@stop
