@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Категорії
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li>
                Категорії
            </li>
        </ol>
    </section>
    <section id="admin-content">
        <a href="{{ route('admin_categories_trashed') }}" class="btn btn-primary">
            Архів
        </a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th></th>
            </tr>
            </thead>
            @foreach($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->uk_title }}</td>
                    <td>
                        <a href="{{ URL::route( 'admin_category_edit', array("id"=>$item->id)) }}"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="confirm-remove" href="{{ URL::route('admin_category_delete', array("id"=>$item->id)) }}"><i class="fa fa-fw fa-remove"></i></a>
                    </td>
                </tr>
            @endforeach
            <tbody>

            </tbody>
        </table>
    </section>
@stop

@section('scripts')
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('body').on('click','a.confirm-remove',function(){
                if (confirm("Видалити категорію ?")) {
                    return true;
                } else {
                    return false;
                }
            });
            $("#example1").DataTable({
                aaSorting: [[0, "desc"]],
            });
        });

    </script>
@stop