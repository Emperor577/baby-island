@extends('admin.master')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Создать контент "О Нас"</strong>
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
                        <form action="{{ route('admin.about-us.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Контент на русском</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea id="text_ru" name="text_ru" placeholder="Text" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Контент на узбекском</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea id="text_uz" rows="5" name="text_uz" placeholder="Text" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">Выбрать файл</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file-input" name="photo" class="form-control-file">
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('admin.about-us.index') }}" class="btn btn-warning color-white"><i class="fa fa-long-arrow-left"></i> Назад</a>
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
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'text_ru' );
        CKEDITOR.replace( 'text_uz' );
    </script>
@endsection
