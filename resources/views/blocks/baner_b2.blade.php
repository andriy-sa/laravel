@if($b2_baner)
    <div id="b2-baner">
        @foreach($b2_baner as $item)
            <div class="item">
                <a target="_blank" href="{{ $item->url }}">
                    {!! Html::image('userfiles/baners/'.$item->image,'baner',['class'=>'img-responsive']) !!}
                </a>
            </div>
        @endforeach
    </div>
@endif