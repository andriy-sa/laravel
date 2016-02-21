<div id="category-sidebar">
    <ul>
        @foreach($categories as $item)
            <li class="col-sm-6 no-pad">
                <a href="{{route('cat_advert',['locale'=>$cur_local,'category'=>$item->url])}}">
                    <span class="icon"><i class="fa fa-2x {{$item->icon}}"></i></span>
                    <span class="title">{{ $item->{$cur_local.'_title'} }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>