<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/megamenu.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
          <li><a href="#">help</a></li>|
          <li><a href="#">Contact</a></li>|
          <li><a href="#">Delivery information</a></li>
        </ul>
      </div>
      <div class="top_left">
        <h2><span></span> Call us : 032 2352 782</h2>
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
      <a href="#"><img src="images/logo.png" class="img-responsive" alt=""/> </a>
    </div>
    <!-- start header_right -->
    <div class="header_right">
      <div class="rgt-bottom">
        <div class="log">
          <div class="login" >
            <div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
                <div id="loginBox">                
                    <form id="loginForm">
                            <fieldset id="body">
                              <fieldset>
                                      <label for="email">Email Address</label>
                                      <input type="text" name="email" id="email">
                                </fieldset>
                                <fieldset>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password">
                                 </fieldset>
                                <input type="submit" id="login" value="Sign in">
                              <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                          </fieldset>
                        <span><a href="#">Forgot your password?</a></span>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="reg">
          <a href="/register">REGISTER</a>
        </div>
      <div class="clearfix"> </div>
    </div>
    <div class="search">
        <form>
          <input type="text" value="" placeholder="search...">
        <input type="submit" value="">
      </form>
    </div>
    <div class="site-slogan">
      Будівельні матеріали
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/function.js"></script>
    <script src="js/menu_jquery.js"></script>
  </body>
</html>
