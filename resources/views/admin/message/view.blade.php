@extends('admin.master')

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Сообщения от {{ $message->name }}</strong>
                        </div>
                        <div class="card-body card-block">
                            <p>имя:<br>{{ $message->name }}</p>
                            <p>телефон:<br>{{ $message->phone }}</p>
                            <p>почта:<br>{{ $message->email }}</p>
                            <p>адрес:<br>{{ $message->address }}</p>
                            <p>текст:<br>{{ $message->message }}</p>
                            <a href="{{ route('admin.message.index') }}" class="btn btn-warning color-white"><i class="fa fa-long-arrow-left"></i> Назад</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
