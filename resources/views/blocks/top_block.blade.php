<div class="top block-block" id="advert-block">
    <div class="block-header">
        {{ trans('message.top_advert') }}
    </div>
    <div class="block-content">
        @foreach($top_advert as $item)
            <div class="item">
                <div class="field-title">
                    <a href="{{route('advertisement',['locale'=>$cur_local,'category'=>$item->category->url,'url'=>$item->url])}}">
                        {{ $item->title }}
                    </a>
                </div>
                <div class="field-user">
                    {{ $item->user->name }}
                </div>
                <div class="field-date">
                    {{ date('d.m.Y G:i',strtotime($item->created_at)) }}
                </div>
            </div>
        @endforeach
    </div>
</div>