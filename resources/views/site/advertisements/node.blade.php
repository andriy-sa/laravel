@extends('layouts.app')

@section('title',$advertisement->title.' | '.trans('message.action'))

@section('content')
    <div class="container advertisements-page">
        <div class="page-title">
            <h1>{{ $advertisement->title }}</h1>
        </div>
        <div class="col-sm-8">
            <div id="advertisement-info" class="my1-panel">
                <div class="top">
                    <div class="i-am">
                        {!! Html::image("userfiles/".$advertisement->user->photo,'people',['class'=>'img-responsive']) !!}
                        <p class="name">{{$advertisement->user->name}} {{ $advertisement->user->last_name }}</p>
                        @if($advertisement->user->phone)
                            <span class="phone">{{$advertisement->user->phone}}</span>
                        @endif
                        @if(Auth::check() && $advertisement->user_id != Auth::user()->id)
                        <div class="pp-zone">
                            <input type="hidden" value="{{ $advertisement->user_id }}" name="to_id">
                            <input type="hidden" value="{{$advertisement->user->name}} {{ $advertisement->user->last_name }}" name="name">
                            <input type="hidden" value="/userfiles/{{ $advertisement->user->photo }}" name="image">
                            <button id="ShowMessageModal">{{ trans('message.pp') }}</button>
                        </div>
                        @endif
                    </div>
                    @if(Checker::is_my_adv($advertisement->id))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="str-icon"><img alt="str" src="/images/str_n.png"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('advert_update',['locale'=>$cur_local,'id'=>$advertisement->id]) }}">{{ trans('message.update') }}</a></li>
                            @if($advertisement->status == 'blocked')
                            <li><a href="{{ route('cancel_sug',['id'=>$advertisement->id]) }}">{{ trans('message.reanime') }}</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                </div>
                <div class="center">
                    <div class="field-title">
                        {{$advertisement->title}}
                    </div>
                    <div class="field-description">
                        {!! $advertisement->description !!}
                    </div>
                </div>
                <div class="subject-panel">
                    <li class="created_at col-sm-6 text-left">
                        <i class="fa fa-calendar"></i>
                        {{date('d-m-Y H:i',strtotime($advertisement->created_at))}}
                    </li>
                    <li class="read col-sm-6 text-right">
                        <i class="fa fa-eye"></i>
                        {{trans('message.read')}}: {{$advertisement->read}}
                    </li>
                </div>
            </div>
            @if($advertisement->comments()->count())
                <h3>{{ trans('message.suggestions') }}</h3>
                <div class="comments-items">
                    @foreach($advertisement->comments as $comment)
                        <div class="item my3-panel @if($advertisement->sel_comment == $comment->id) selected @endif">
                            <div class="top">
                                <div class="i-am">
                                    {!! Html::image("userfiles/".$comment->user->photo,'people',['class'=>'img-responsive']) !!}
                                    <p class="name">{{$comment->user->name}} {{ $comment->user->last_name }}</p>
                                    @if($comment->user->phone)
                                        <span class="phone">{{$comment->user->phone}}</span>
                                    @endif
                                    @if(Auth::check() && $comment->user_id != Auth::user()->id)
                                        <div class="pp-zone">
                                            <input type="hidden" value="{{ $comment->user_id }}" name="to_id">
                                            <input type="hidden" value="{{$comment->user->name}} {{ $comment->user->last_name }}" name="name">
                                            <input type="hidden" value="/userfiles/{{ $comment->user->photo }}" name="image">
                                            <button id="ShowMessageModal">{{ trans('message.pp') }}</button>
                                        </div>
                                    @endif
                                </div>
                                @if(Checker::is_my_adv($advertisement->id) && $advertisement->sel_comment != $comment->id)
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <span class="str-icon"><img alt="str" src="/images/str_n.png"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('select_sug',['id'=>$comment->id]) }}">{{ trans('message.select_sug') }}</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </div>
                            <div class="center">
                                <div class="field-price">
                                    {{$comment->price}}
                                </div>
                                <div class="field-text">
                                    {!! $comment->text !!}
                                </div>
                            </div>
                            <div class="subject-panel">
                                <li class="created_at col-sm-6 text-left">
                                    <i class="fa fa-calendar"></i>
                                    {{date('d-m-Y H:i',strtotime($comment->created_at))}}
                                </li>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(Checker::comment_add($advertisement->id))
            <div id="comment-form" class="my2-panel">
                <h3>
                    <div class="my-photo">
                        {!! HTML::image("userfiles/".Auth::user()->photo,Auth::user()->name,['class' => 'img-responsive']) !!}
                    </div>
                    <div class="f-title">{{trans('message.suggestion')}}</div>
                </h3>
                <form id="sendComment" action="{{ route('post_comment_create',['locale'=>$cur_local]) }}" method="post">
                    <div class="form-group">
                        <textarea name="text" placeholder="{{trans('message.message')}}" class="form-control" id="text"  rows="5">{{ old('text') }}</textarea>
                    </div>
                    <div class="form-group max-50">
                        <input type="text" placeholder="{{trans('message.price')}}" value="{{ old('price') }}" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="{{ $advertisement->id }}" name="hidden_adv_id">
                        {!! csrf_field() !!}
                        <button class="btn" id="saveBtn" type="submit">{{trans('message.send')}}</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
        <div class="col-sm-4">
           @include('blocks.top_block')
           @include('blocks.baner_b1')
           @include('blocks.latest_block')
           @include('blocks.baner_b2')
        </div>
    </div>
    @include('blocks.message_modal')
@stop

@section('scripts')
    {!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {!! $validator->selector('#sendComment') !!}
@stop
