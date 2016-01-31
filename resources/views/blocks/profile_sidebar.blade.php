<div id="profile-sidebar">
    <ul>
        <li>
            <a href="{{route('profile',['locale'=>$cur_local])}}">
                <span class="icon"><i class="fa fa-2x fa-cogs"></i></span>
                <span class="title">{{ trans('message.profile') }}</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fa fa-2x fa-paperclip"></i></span>
                <span class="title">{{ trans('message.my_adver') }}</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fa fa-2x fa-comments"></i></span>
                <span class="title">{{ trans('message.my_answer') }}</span>
            </a>
        </li>
    </ul>
</div>