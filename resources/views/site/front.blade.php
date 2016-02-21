@extends('layouts.app')

@section('title',trans('message.action'))

@section('content')
	<div class="container front">
		<div class="col-sm-3">
			@include('blocks.popular_block')
			@include('blocks.baner_b1')
		</div>
		<div class="col-sm-6">
			@include('blocks.category_block')
			@include('blocks.valut_block')
		</div>
		<div class="col-sm-3">
			@include('blocks.latest_block')
			@include('blocks.baner_b2')
		</div>
	</div>
@stop