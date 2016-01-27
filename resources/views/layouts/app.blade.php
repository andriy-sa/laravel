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
    <link href="/css/megamenu.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    @yield('styles')
    <link href="/css/style.css" rel="stylesheet">


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
          <li><a href="#">{{ trans('message.help') }}</a></li>|
          <li><a href="#">{{ trans('message.contacts') }}</a></li>|
          <li><a href="#">{{ trans('message.delivery_info') }}</a></li>
        </ul>
      </div>
      <div class="top_left">
        <h2><span></span> {{ trans('message.call_us') }} : 032 2352 782</h2>
      </div>
        <div class="clearfix"> </div>
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
    </div>
    <!-- start header_right -->
    <div class="header_right">
      <div class="rgt-bottom">
        @if(Auth::check())
          @include('blocks.profile_block')
        @else
          @include('blocks.auth_block')
        @endif
        <div class="clearfix"> </div>
    </div>
    <div class="search">
        <form>
          <input type="text" value="" placeholder="{{ trans('message.search') }}">
        <input type="submit" value="">
      </form>
    </div>
    <div class="site-slogan">
      {{ trans('message.builder') }}
    </div>
    <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
  </div>
    <ul class="megamenu skyblue">
      <li class="active grid"><a class="color1" href="#">Home</a></li>
      <li class="grid"><a class="color2" href="#">Link</a></li>
      <li class="grid"><a class="color3" href="#">Link2</a></li>
      <li class="grid"><a class="color4" href="#">Link3</a></li>
    </ul> 
  </div>
</div>
</div>
  <div id="main-content">
    @yield('content')
  </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/function.js"></script>
    <script src="/js/menu_jquery.js"></script>
    @yield('scripts')
  </body>
</html>
