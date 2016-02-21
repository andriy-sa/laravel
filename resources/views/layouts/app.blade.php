<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    @yield('styles')
    <link href="/css/slick.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/logo.png" type="image/png">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="top_bg">
    <div class="container">
        <div class="header_top">
            <div class="top_right">
                <ul>
                    <li><a href="{{ route('help',['locale'=>$cur_local]) }}">{{ trans('message.help') }}</a></li>
                </ul>
            </div>
            <div class="top_left">
                <h2><span></span> {{ trans('message.call_us') }} : 032 2352 782</h2>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- header -->
<div class="header_bg">
    <div class="container">
        <div class="header">
            <div class="head-t">
                <div class="logo">
                    <a href="{{route('home',['locale'=>Config::get('app.locale')])}}">
                        <img src="/images/logo.png" class="img-responsive" alt=""/>
                        <span class="logo-text">{{ trans('message.action') }}</span>
                    </a>
                    <div class="slogan-cont">
                        <div class="site-slogan">
                            {{ trans('message.builder') }}
                        </div>
                    </div>
                </div>
                <!-- start header_right -->
                <div class="header_right">
                    <div class="rgt-bottom">
                        @if(Auth::check())
                            @include('blocks.profile_block')
                        @else
                            @include('blocks.auth_block')
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="search">
                        <form method="get" action="{{ route('search',['locale'=>$cur_local]) }}">
                            <input type="text" name="q" value="" placeholder="{{ trans('message.search') }}">
                            <input type="submit" value="">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="main-menu">
    <nav class="navbar container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li @if(Route::current()->getName() == 'home') class="active" @endif><a href="{{route('home',['locale'=>$cur_local])}}">{{ trans('message.home') }}</a></li>
                <li @if(Route::current()->getName() == 'advert') class="active" @endif><a href="{{ route('advert',['locale'=>$cur_local]) }}">{{ trans('message.advertisement') }}</a></li>
                <li @if(Route::current()->getName() == 'advert_create') class="active" @endif><a href="{{ route('advert_create',['locale'=>$cur_local]) }}">{{ trans('message.advert_create') }}</a></li>
                <li @if(Route::current()->getName() == 'request') class="active" @endif><a href="{{ route('request',['locale'=>$cur_local]) }}">{{ trans('message.order_request') }}</a></li>
            </ul>
            <div class="btn-group lang-group navbar-right">
                <button type="button" class="btn">{{ Config::get('app.locale') }}</button>
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    {{-- */ $get_local = (Config::get('app.locale') == 'uk') ? 'ru' : 'uk';  /* --}}
                    <li><a href="{{ route('home',['locale'=> $get_local]) }}">{{$get_local}}</a></li>
                </ul>
            </div>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
@include('blocks.baner_a1')
@include('blocks.log')
<div id="main-content">
    @yield('content')
</div>

<div id="footer">
    <div class="container">
        <div class="col-sm-6">
            <a href=""><i class="fa fa-2x fa-vk"></i></a>
            <a href=""><i class="fa fa-2x fa-facebook-square"></i></a>
            <a href=""><i class="fa fa-2x fa-twitter-square "></i></a>
        </div>
        <div class="col-sm-6 text-right">
            Smolyar Andriy &copy; {{date('Y')}} All rights reserved
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/function.js"></script>
<script src="/js/menu_jquery.js"></script>
@yield('scripts')
</body>
</html>
