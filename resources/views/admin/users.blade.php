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
                <th>Фото</th>
                <th>Імя</th>
                <th>Прізвище</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Дата Реєстрації</th>
                <th>Бан</th>
            </tr>
            </thead>
            @foreach($users as $item)
                <tr>
                    <td><img style="max-width: 50px" src="/userfiles/{{$item->photo}}" alt="{{$item->name}}"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastname }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ date('Y-m-d H:i',strtotime($item->created_at)) }}</td>
                    <td>
                        <label>
                            <input @if($item->ban) checked @endif id="BanUser" value="1" type="checkbox">
                            <input type="hidden" name="user_id" value="{{ $item->id }}">
                            Забанити
                        </label>
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
            $("#example1").DataTable({
                aaSorting: [[4, "desc"]],
            });

            $('body').on('change','#BanUser',function(){
                var id = $(this).next().val();
                var val = 0;
                var token = '{{ csrf_token() }}';
                if($(this).is(':checked')){
                   val = 1;
                }

                $.ajax({
                    method: 'POST',
                    url   : '/admin/users/change_ban',
                    data  : {'id':id,'val':val,'_token':token},
                    success : function(data){
                    }
                })

            });
        });

    </script>
@stop