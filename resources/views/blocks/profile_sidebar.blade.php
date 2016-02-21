<div id="profile-sidebar">
    <ul>
        <li>
            <a href="{{route('profile',['locale'=>$cur_local])}}">
                <span class="icon"><i class="fa fa-2x fa-cogs"></i></span>
                <span class="title">{{ trans('message.profile') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('my_advert',['locale'=>$cur_local]) }}">
                <span class="icon"><i class="fa fa-2x fa-paperclip"></i></span>
                <span class="title">{{ trans('message.my_adver') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('my_answer',['locale'=>$cur_local]) }}">
                <span class="icon"><i class="fa fa-2x fa-comments"></i></span>
                <span class="title">{{ trans('message.my_answer') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('to_message',['locale'=>$cur_local]) }}">
                <span class="icon"><i class="fa fa-2x fa-commenting-o"></i></span>
                <span class="title">{{ trans('message.to_message') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('from_message',['locale'=>$cur_local]) }}">
                <span class="icon"><i class="fa fa-2x fa-commenting"></i></span>
                <span class="title">{{ trans('message.from_message') }}</span>
            </a>
        </li>
    </ul>
</div>