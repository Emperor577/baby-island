@extends('admin.master')


@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <strong class="card-title mb-0 d-flex flex-column justify-content-center">Отзывы</strong>
                            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Создать отзывы</a>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Фото</th>
                                    <th>ID</th>
                                    <th>имя</th>
                                    <th>Описания</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td class="serial">{{ ++$i }}.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{ asset("storage/testimonial/". $testimonial->photo) }}" alt="">
                                                </a>
                                            </div>
                                        </td>
                                        <td> #{{ $testimonial->id }} </td>
                                        <td>  <span class="name">{{ $testimonial->name }}</span> </td>
                                        <td> <span class="product">{!! $testimonial->description !!}</span> </td>
                                        <td>
                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="btn btn-warning color-white mb-1"><i class="fa fa-pencil"></i> Изменить</a>
                                            <form action="{{ route('admin.testimonial.delete', $testimonial->id) }}" method="post">
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