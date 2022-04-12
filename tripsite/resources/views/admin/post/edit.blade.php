@extends('admin.layouts.admin_layout')

@section('title', 'Добавить статью')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить сатью</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Выберите категорию</label>
                                        <select name="cat_id" class="form-control" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category['id'] }}" @if ($category['id'] == $post['cat_id']) selected
                                                    @endif>{{ $category['title'] }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите название статьи" value="{{$post['title']}}" required>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" value="{{$post['price']}}" name="price" class="form-control" placeholder="Price">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="feature_image">Изображение статьи</label>
                                    <img src="{{ $post['img']}}" alt="" class="img-uploaded" style="display: block; width: 300px">
                                    <input type="text" name="img" class="form-control" id="feature_image"
                                           name="feature_image" value="{{ $post['img']}}" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Выбрать изображение</a>
                                </div>

                                <div class="form-group">
                                    <label>Описание</label>
                                    <textarea class="form-control"  value="{{$post['productDescription']}}" name="text"></textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


{{--@extends('layouts.admin_layout')--}}

{{--@section('title', 'Добавить статью')--}}

{{--@section('content')--}}
{{--    <!-- Content Header (Page header) -->--}}
{{--    <div class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1 class="m-0">Добавить сатью</h1>--}}
{{--                </div><!-- /.col -->--}}
{{--            </div><!-- /.row -->--}}
{{--            @if (session('success'))--}}
{{--                <div class="alert alert-success" role="alert">--}}
{{--                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
{{--                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </div>--}}
{{--    <!-- /.content-header -->--}}

{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="card card-primary">--}}
{{--                        <!-- form start -->--}}
{{--                        <form action="{{ route('post.store') }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Title</label>--}}
{{--                                    <input type="text" name="title" class="form-control" placeholder="Title">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Description</label>--}}
{{--                                    <textarea class="form-control" name="text"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Price</label>--}}
{{--                                    <input type="number" name="price" class="form-control" placeholder="Price">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <!-- select -->--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Choose category</label>--}}
{{--                                        <select name="cat_id" class="form-control" required>--}}
{{--                                            @foreach ($categories as $category)--}}
{{--                                                <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>File input</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="custom-file">--}}
{{--                                            <img src="" alt="" class="img-uploaded" style="display: block; width: 300px">--}}
{{--                                            <input type="file" class="custom-file-input" name="img">--}}
{{--                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer">--}}
{{--                                <button type="submit" class="btn btn-primary">Добавить</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </section>--}}
{{--    <!-- /.content -->--}}
{{--@endsection--}}

