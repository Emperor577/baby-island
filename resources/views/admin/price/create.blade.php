@extends('admin.master')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Создать Прайст</strong>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body card-block">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">RU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">UZ</a>
                            </li>
                        </ul>
                        <form action="{{ route('admin.price.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Заголовок</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title_ru" placeholder="Имя" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Прайст</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <div class="row" id="price_ru">
                                                <div class="col col-md-6 mb-2">
                                                    <input type="text" class="form-control" name="price_title_ru[]" placeholder="Названия">
                                                </div>
                                                <div class="col col-md-6 mb-2">
                                                    <input type="number" class="form-control" name="price_count_ru[]" placeholder="Цена">
                                                </div>
                                            </div>
                                            <button type="button" onclick="addrow_ru()" class="btn btn-dark">Добавить</button>
                                            <button type="button" onclick="removerow_ru()" class="btn btn-danger pull-right">Удалить</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Имя</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title_uz" placeholder="Имя" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Прайст</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <div class="row" id="price_uz">
                                                <div class="col col-md-6 mb-2">
                                                    <input type="text" class="form-control" name="price_title_uz[]" placeholder="Названия">
                                                </div>
                                                <div class="col col-md-6 mb-2">
                                                    <input type="number" class="form-control" name="price_count_uz[]" placeholder="Цена">
                                                </div>
                                            </div>
                                            <button type="button" onclick="addrow_uz()" class="btn btn-dark">Добавить</button>
                                            <button type="button" onclick="removerow_uz()" class="btn btn-danger pull-right">Удалить</button>
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
                                <a href="{{ route('admin.staff.index') }}" class="btn btn-warning color-white"><i class="fa fa-long-arrow-left"></i> Назад</a>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script type="text/javascript">
        function addrow_ru() {
            $('#price_ru').append("<div class=\"col col-md-6 mb-2\">\n" +
                "                                                    <input type=\"text\" class=\"form-control\" name=\"price_title_ru[]\" placeholder=\"Названия\">\n" +
                "                                                </div>\n" +
                "                                                <div class=\"col col-md-6 mb-2\">\n" +
                "                                                    <input type=\"number\" class=\"form-control\" name=\"price_count_ru[]\" placeholder=\"Цена\">\n" +
                "                                                </div>");

        }
        function addrow_uz() {
            $('#price_uz').append("<div class=\"col col-md-6 mb-2\">\n" +
                "                                                    <input type=\"text\" class=\"form-control\" name=\"price_title_uz[]\" placeholder=\"Названия\">\n" +
                "                                                </div>\n" +
                "                                                <div class=\"col col-md-6 mb-2\">\n" +
                "                                                    <input type=\"number\" class=\"form-control\" name=\"price_count_uz[]\" placeholder=\"Цена\">\n" +
                "                                                </div>");
        }
        
        function removerow_ru() {
            var i = 0;
            var select;
            while (i++ != 3) {
                select = document.getElementById('price_ru');
                select.removeChild(select.lastChild);
            }
        }
        function removerow_uz() {
            var k = 0;
            var select;
            while (k++ != 3) {
                select = document.getElementById('price_uz');
                select.removeChild(select.lastChild);
            }
        }
    </script>
@endsection
