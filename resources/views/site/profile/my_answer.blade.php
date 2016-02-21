@extends('layouts.app')

@section('title',trans('message.my_answer'))

@section('content')
    <div class="container profile-section">
        <h1>{{ trans('message.my_answer') }}</h1>
        <div class="col-sm-4">
            @include('blocks.profile_sidebar')
        </div>
        <div class="col-sm-8">
            <div class="table-responsive">
                <table class="table table-hover sa-table-info">
                    <thead>
                    <th>{{ trans('message.title') }}</th>
                    <th>{{ trans('message.author') }}</th>
                    <th>{{ trans('message.created_at') }}</th>
                    <th>{{ trans('message.count_view') }}</th>
                    <th>{{ trans('message.count_comments') }}</th>
                    <th>{{ trans('message.more') }}</th>
                    </thead>
                    <tbody>
                    @foreach($advert as $item)
                        <tr class="@if($item->status == 'blocked') danger @else success @endif">
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td><b> {{ $item->read }}
                                </b></td>
                            <td>
                                <b>
                                    {{ $item->comments->count() }}
                                </b>
                            </td>
                            <td>
                                <a href="{{route('advertisement',['locale'=>$cur_local,'category'=>$item->category->url,'url'=>$item->url])}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $advert->render() !!}
            </div>
        </div>
    </div>
@endsection
