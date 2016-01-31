@if(Auth::check() && Route::current()->getName() !='advert_create')
    <a href="{{route('advert_create',['locale'=>$cur_local])}}" class="advert_create">
        {{ trans('message.advert_create') }}
    </a>
@endif
<div id="category-sidebar">
    <ul>
        @foreach($categories as $item)
        <li>
            <a href="{{route('cat_advert',['locale'=>$cur_local,'category'=>$item->url])}}">
                <span class="icon"><i class="fa fa-2x {{$item->icon}}"></i></span>
                <span class="title">{{ $item->{$cur_local.'_title'} }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>