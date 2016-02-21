@extends('layouts.app')

@section('title',trans('message.from_message'))

@section('content')
    <div class="container profile-section">
        <h1>{{ trans('message.from_message') }}</h1>
        <div class="col-sm-4">
            @include('blocks.profile_sidebar')
        </div>
        <div class="col-sm-8">
            <div id="messages-items">
                @foreach($messages as $item)
                    <div class="item">
                        <div class="right">
                            <div class="i-am">
                                {!! Html::image("userfiles/".$item->to->photo,'people',['class'=>'img-responsive']) !!}
                                <p class="name">{{$item->to->name}} {{ $item->to->last_name }}</p>
                                <div class="pp-zone">
                                    <input type="hidden" value="{{ $item->to->id }}" name="to_id">
                                    <input type="hidden" value="{{$item->to->name}} {{ $item->to->last_name }}" name="name">
                                    <input type="hidden" value="/userfiles/{{ $item->to->photo }}" name="image">
                                    <button id="ShowMessageModal">{{ trans('message.pp') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="left">
                            <div class="field-created">
                                {{ date('Y-m-d G:i',strtotime($item->created_at)) }}
                            </div>
                            <div class="field-message">
                                {{ $item->message }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $messages->render() !!}
        </div>
    </div>
    @include('blocks.message_modal')
@endsection
