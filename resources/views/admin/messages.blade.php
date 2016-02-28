@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Повідомлення
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li>
                Повідомлення
            </li>
        </ol>
    </section>
    <section id="admin-content">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Імя</th>
                <th>Телефон</th>
                <th>Тип послуги</th>
                <th>ID оголошення</th>
                <th>Дата</th>
            </tr>
            </thead>
            @foreach($messages as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->aid }}</td>
                    <td>{{ date('Y-m-d H:i',strtotime($item->created_at)) }}</td>
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
            $("#example1").DataTable({
                aaSorting: [[4, "desc"]],
            });
        });

    </script>
@stop