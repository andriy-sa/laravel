@extends('layouts.app')

@section('content')
<div class="container profile-section">
    <h1>{{ trans('message.update_profile') }}</h1>
    <div class="col-sm-4">
        @include('blocks.profile_sidebar')
    </div>
    <div class="col-sm-8">
        <form class="my1-panel" action="{{route('profile_post',['locale'=>$cur_local])}}" method="post" enctype="multipart/form-data">
            <div class="col-sm-6">
                <div id="image-preview" style="background-image: url('/userfiles/{{ $user->photo }}')">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="image" id="image-upload" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">{{trans('message.name')}} <span>*</span></label>
                    <input type="text" value="{{$user->name}}" name="name" placeholder="{{trans('message.name')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">{{trans('message.last_name')}}</label>
                    <input type="text" value="{{$user->last_name}}" name="last_name" placeholder="{{trans('message.last_name')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">{{trans('message.phone')}}</label>
                    <input type="text" value="{{$user->phone}}" name="phone" placeholder="{{trans('message.phone')}}" class="form-control">
                </div>
                <div class="form-group">
                    <button id="saveBtn" type="submit">{{ trans('message.save') }}</button>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('/js/jquery.uploadPreview.js') !!}
    <script type="text/javascript">
        $(document).ready(function() {
            $.uploadPreview({
                input_field: "#image-upload",   // Default: .image-upload
                preview_box: "#image-preview",  // Default: .image-preview
                label_field: "#image-label",    // Default: .image-label
                label_default: "Choose File",   // Default: Choose File
                label_selected: "Change File",  // Default: Change File
                no_label: false                 // Default: false
            });
        });
    </script>
@stop
