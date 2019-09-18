@extends('admin.master')


@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <strong class="card-title mb-0 d-flex flex-column justify-content-center">О Нас</strong>
                            <a href="{{ route('admin.about-us.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Создать</a>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Photo</th>
                                    <th>ID</th>
                                    <th>Text</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach($about_us as $about)
                                    <tr>
                                        <td class="serial">{{ ++$i }}.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#">
                                                    <img src="{{ asset("storage/about-us/". $about->photo) }}" alt="">
                                                </a>
                                            </div>
                                        </td>
                                        <td> #{{ $about->id }} </td>
                                        <td> <span class="product">{!! $about->text !!}</span> </td>
                                        <td>
                                            <a href="{{ route('admin.about-us.edit', $about->id) }}" class="btn btn-warning color-white mb-1"><i class="fa fa-pencil"></i> Изменить</a>
                                            <form action="{{ route('admin.about-us.delete', $about->id) }}" method="post">
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