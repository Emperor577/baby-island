@extends('admin.master')
@section('styles')
<link rel="stylesheet" href="{{ asset("dashboard/assets/css/dashStyle.css") }}">
@endsection
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Редактировать Галирею</strong>
                    </div>
                    <div class="card-body card-block">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">RU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">UZ</a>
                            </li>
                        </ul>
                        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Загаловок Фото</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title_ru" value="{{ $gallery->translate('ru')->title }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Загаловок Фото</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title_uz" value="{{ $gallery->translate('uz')->title }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">File input</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    @if($gallery->photo != null || $gallery->photo != '')
                                    <span class="delete-image" id="delete-icon" onclick="deleteFunc({{ $gallery->id }})"><i class="fa fa-times"></i></span>
                                    <img id="my_image" src="{{ asset('storage/gallery/'. $gallery->photo) }}" alt="" height="200px">
                                    @endif
                                    <input type="file" id="file-input" name="photo" class="form-control-file">
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-warning color-white"><i class="fa fa-long-arrow-left"></i> Назад</a>
                                <input type="submit" class="btn btn-primary" value="Подтвердить">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset("dashboard/assets/js/axios.js") }}"></script>
<script type="text/javascript">
    function deleteFunc(id) {
        axios.delete('image/delete/' + id)
            .then(function(response) {
                document.getElementById('my_image').setAttribute("src", "");
                document.getElementById('delete-icon').style.display = 'none';
                console.log(response.data);
            })
            .catch(function(error) {
                console.log(error);
            });

    }

</script>
@endsection
