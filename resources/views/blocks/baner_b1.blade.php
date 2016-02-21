@if($b1_baner)
    <div id="b1-baner">
        @foreach($b1_baner as $item)
            <div class="item">
                <a target="_blank" href="{{ $item->url }}">
                    {!! Html::image('userfiles/baners/'.$item->image,'baner',['class'=>'img-responsive']) !!}
                </a>
            </div>
        @endforeach
    </div>
@endif