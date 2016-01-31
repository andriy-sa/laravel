<div class="item item-{{ $item->status }}">
    <div class="top">
        <div class="i-am">
            {!! Html::image("userfiles/".$item->user->photo,'people',['class'=>'img-responsive']) !!}
            <p class="name">{{$item->user->name}} {{ $item->user->last_name }}</p>
            @if($item->user->phone)
                <span class="phone">{{$item->user->phone}}</span>
            @endif
        </div>
    </div>
    <div class="center">
        {{$item->title}}
        @if($item->status == 'top')
            <span class="unique-status">ТОП</span>
        @elseif($item->status == 'hot')
            <span class="unique-status">{{trans('message.hot')}}</span>
        @elseif($item->status == 'blocked')
            <span class="unique-status">{{trans('message.blocked')}}</span>
        @endif
    </div>
    <div class="subject-panel">
        <li class="col-sm-3 created_at">
            <i class="fa fa-calendar"></i>
            {{date('d-m-Y H:i',strtotime($item->created_at))}}
        </li>
        <li class="col-sm-3 read">
            <i class="fa fa-eye"></i>
            {{trans('message.read')}}: {{$item->read}}
        </li>
        <li class="col-sm-3 comments">
            <i class="fa fa-envelope-o"></i>
            {{trans('message.comments')}}: {{$item->comments->count()}}
        </li>
        <li class="col-sm-3 more">
            @if($item->status != 'blocked')
            <a href="{{route('advertisement',['locale'=>$cur_local,'category'=>$item->category->url,'url'=>$item->url])}}">
                <i class="fa fa-reply-all "></i>
                {{trans('message.more')}}
            </a>
            @endif
        </li>
    </div>
</div>