@extends('layouts.app')

@section('title',trans('message.search').' | '.trans('message.action'))

@section('content')
    <div class="container advertisements-page">
        <div class="page-title">
            <h1>{{ trans('message.search') }} : {{ $q }}</h1>
        </div>
        <div class="col-sm-4">
            @include('blocks.top_block')
            @include('blocks.baner_b1')
            @include('blocks.latest_block')
            @include('blocks.baner_b2')
        </div>
        <div class="col-sm-8">
            <div class="advertisements-items">
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