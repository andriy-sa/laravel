@extends('layouts.app')

@section('title',trans('message.help_prv').' | '.trans('message.action'))

@section('content')
    <div class="container front">
        <div class="col-sm-4">
            @include('blocks.top_block')
            @include('blocks.baner_b1')
            @include('blocks.latest_block')
            @include('blocks.baner_b2')
        </div>
        <div class="col-sm-8 my1-panel">
            <h1 class="text-center">{{ trans('message.help_prv') }}</h1>
            <div class="text">
                {!! $text->{'text_'.$cur_local} !!}
            </div>
        </div>
    </div>
@stop