@extends('layouts.admin')

@section('title','front admin page')

@section('content')
    <section class="content-header">
        <h1>
            Банера
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li>
                Банера
            </li>
        </ol>
    </section>
    <section id="admin-content">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Тип</th>
                <th>Link</th>
                <th></th>
            </tr>
            </thead>
                @foreach($baners as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->note }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->url }}</td>
                        <td>
                            <a href="{{ URL::route( 'admin_baner_update', array("id"=>$item->id)) }}"><i class="fa fa-fw fa-edit"></i></a>
                            <a class="confirm-remove" href="{{ URL::route('admin_baner_delete', array("id"=>$item->id)) }}"><i class="fa fa-fw fa-remove"></i></a>
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
                if (confirm("Видалити банер?")) {
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