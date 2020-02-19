@extends('admin.master')

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <strong class="card-title mb-0 d-flex flex-column justify-content-center">сообщение</strong>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Имя</th>
                                    <th>Телефон</th>
                                    <th>Эл. поста</th>
                                    <th>Статус</th>
                                    <th>действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach($messages as $message)
                                    <tr>
                                        <td class="serial">{{ ++$i }}.</td>
                                        <td class="avatar">
                                            <span class="product">{{ $message->name }}</span>
                                        </td>
                                        <td> <span class="product">{{ $message->phone }}</span> </td>
                                        <td> <span class="product">{{ $message->email }}</span> </td>
                                        <td> <span class="product">@if($message->is_seen === 0) <span class="badge badge-danger">new</span>@else Прочитано @endif</span> </td>
                                        <td>
                                            <a href="{{ route('admin.message.view', $message->id) }}" class="btn btn-warning color-white mb-1"><i class="fa fa-eye"></i> Прочитать</a>
                                            <form action="{{ route('admin.message.delete', $message->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
