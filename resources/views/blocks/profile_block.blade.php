<div class="go-home">
    <a href="{{route('profile',['locale'=>Config::get('app.locale')])}}"><i class="fa fa-users"></i> {{trans('message.profile')}}</a>
    <a href="/{{Config::get('app.locale')}}/logout"><i class="fa fa-sign-out"></i> {{trans('message.logout')}}</a>
</div>