@extends('layouts.admin')

@section('title','front admin page')

@section('content')
	<section class="content-header">
      <h1>
        Адмін-панель: Правила сайту
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Home</li>
      </ol>
    </section>
    <section id="admin-content">
        <form method="post" action="{{ route('admin_index_post') }}">
            <div class="form-group">
                <label for="text_uk">Text UA</label>
                <textarea name="text_uk" id="text_uk" class="form-control" rows="7">{!! $help->text_uk !!}</textarea>
            </div>
            <div class="form-group">
                <label for="text_ru">Text RU</label>
                <textarea name="text_ru" id="text_ru" class="form-control" rows="7">{!! $help->text_ru !!}</textarea>
            </div>
            <div class="form-group">
                {!! csrf_field() !!}
                <button class="btn btn-success" type="submit">Зберегти</button>
            </div>
        </form>
    </section>
@stop

@section('scripts')
    {!! Html::script('ckeditor/ckeditor.js') !!}
    <script type="text/javascript">
        CKEDITOR.replace( 'text_uk' );
        CKEDITOR.replace( 'text_ru' );
    </script>
@stop