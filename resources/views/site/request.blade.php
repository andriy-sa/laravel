@extends('layouts.app')

@section('title',trans('message.order_request').' | '.trans('message.action'))

@section('content')
    <div class="container front">
        <div class="col-sm-4">
            @include('blocks.top_block')
            @include('blocks.baner_b1')
            @include('blocks.latest_block')
            @include('blocks.baner_b2')
        </div>
        <div class="col-sm-8 my1-panel">
            <h1 class="text-center">{{ trans('message.order_request') }}</h1>

            <form id="Order" action="{{ route('request_post',['locale'=>$cur_local]) }}" method="post">
                @if(!Auth::check())
                    <?php
                        $c_name = old('name');
                        $c_phone = old('phone');
                    ?>
                @else
                    <?php
                    $c_name = Auth::user()->name;
                    $c_phone = Auth::user()->phone;
                    ?>
                @endif
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $c_name }}" name="name" placeholder="{{ trans('message.name') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $c_phone }}" name="phone" placeholder="{{ trans('message.phone') }}">
                    </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ old('aid') }}" name="aid" placeholder="ID {{ trans('message.advertisement') }}">
                </div>
                <div class="form-group">
                    <div class="css-checkbox css-checkbox-warning css-input">
                        <label>
                            <input value="top" checked name="type" type="radio">
                            <span class="fa fa-check"></span>
                            TOP (30 грн.)
                        </label>
                    </div>
                    <div class="css-checkbox css-checkbox-warning css-input">
                        <label>
                            <input value="hot" name="type" type="radio">
                            <span class="fa fa-check"></span>
                            {{ trans('message.hot') }} (10 грн.)
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    {!! csrf_field() !!}
                    <button id="saveBtn" type="submit">{{ trans('message.send') }}</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    {!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {{--<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js', '#createAdvertisement')}}"></script>--}}
    {!! $validator->selector('#Order') !!}
@stop