<div id="log-section">
    <div class="container">
        @if($error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach($error as $item)
                    <p>{{$item}}</p>
                @endforeach
            </div>
        @endif
        @if($success)
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p>{{$success}}</p>
            </div>
        @endif
    </div>
</div>