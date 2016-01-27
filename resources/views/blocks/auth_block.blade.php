<div class="log">
    <div class="login" >
        <div id="loginContainer"><a href="#" id="loginButton"><span>{{ trans('message.login') }}</span></a>
            <div id="loginBox">
                <form method="post" action="/{{Config::get('app.locale')}}/login" id="loginForm">
                    <fieldset id="body">
                        <fieldset>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email">
                        </fieldset>
                        <fieldset>
                            <label for="password">{{ trans('message.password') }}</label>
                            <input type="password" name="password" id="password">
                        </fieldset>
                        {!! csrf_field() !!}
                        <input type="submit" id="login" value="{{ trans('message.login') }}">
                        <label for="checkbox"><input type="checkbox" name="remember" id="checkbox"> <i>{{ trans('message.remember') }}</i></label>
                    </fieldset>
                    <a class="btn btn-link" href="{{ url(Config::get('app.locale').'/password/reset') }}">{{ trans('message.pass_forgot') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="reg">
    <a href="/{{Config::get('app.locale')}}/register">{{ trans('message.register') }}</a>
</div>