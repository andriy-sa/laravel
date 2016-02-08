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
                    </div>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="str-icon"><img alt="str" src="/images/str_n.png"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Редагувати</a></li>
                            <li><a href="#">Видалити</a></li>
                        </ul>
                    </li>
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
            <div id="comment-form" class="my2-panel">
                <h3>
                    <div class="my-photo">
                        {!! HTML::image("userfiles/".Auth::user()->photo,Auth::user()->name,['class' => 'img-responsive']) !!}
                    </div>
                    <div class="f-title">Залишити свою пропозицію</div>
                </h3>
                <form action="" method="post">
                    <div class="form-group">
                        <textarea name="text" placeholder="Повідомлення" class="form-control" id="text"  rows="5">{{ old('text') }}</textarea>
                    </div>
                    <div class="form-group max-50">
                        <input type="text" placeholder="Ціна" value="{{ old('price') }}" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        {!! csrf_field() !!}
                        <button class="btn btn-success" type="submit">Відправити</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            {{ Checker::test() }}
        </div>
    </div>
@stop
