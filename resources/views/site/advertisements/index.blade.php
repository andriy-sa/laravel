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
            <div class="advertisements-items">
                @foreach($top_advertisements as $item)
                    @include('blocks.item')
                @endforeach
                @foreach($advertisements as $item)
                    @include('blocks.item')
                @endforeach
            </div>
            <div class="pagination">
                {!! $advertisements->render() !!}
            </div>
        </div>
    </div>
@stop
