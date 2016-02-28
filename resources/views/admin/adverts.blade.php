@extends('layouts.admin')

@section('title','front admin page')

@section('content')
    <section class="content-header">
        <h1>
            Оголошення
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li>
                Оголошення
            </li>
        </ol>
    </section>
    <section id="admin-content">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Категорія</th>
                <th>Користувач</th>
                <th>Дата створення</th>
                <th></th>
            </tr>
            </thead>
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
               if (confirm("Видалити оголошення?")) {
                   return true;
               } else {
                   return false;
               }
           });
            $("#example1").DataTable({
                processing: true,
                serverSide: true,
                aaSorting: [[4, "desc"]],
                ajax: '/admin/adverts_ajax',
                "columns": [
                    {data: 0, name: 'a.id'},
                    {data: 1, name: 'a.title'},
                    {data: 2, name: 'c.uk_title'},
                    {data: 3, name: 'u.name'},
                    {data: 4, name: 'a.created_at'},
                    {data: 5, name: 'a.updated_at'}
                ]
            });
        });

    </script>
@stop