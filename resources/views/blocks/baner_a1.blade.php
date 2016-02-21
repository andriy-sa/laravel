@if($a1_baner)
<div id="a1-baner" class="container">
    @foreach($a1_baner as $item)
        <div class="item">
            <a target="_blank" href="{{ $item->url }}">
                {!! Html::image('userfiles/baners/'.$item->image,'baner',['class'=>'img-responsive']) !!}
            </a>
        </div>
    @endforeach
</div>
@endif