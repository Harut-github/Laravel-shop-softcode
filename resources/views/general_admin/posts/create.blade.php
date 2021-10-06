@extends('general_admin.layout')
@section('title', 'Posts page')
@section('content')
<section class="content">
    <form action="/general_admin/posts" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Добавляем статью</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="slug" name="slug" value="{{ old('slug') }}">
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- <div class="form-group">
                    <label for="exampleInputFile">Лицевая картинка</label>
                    <input type="file" id="exampleInputFile">

                    <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                </div> --}}

                <div class="form-group">
                    <label>Categories</label>
                    <select class="form-control select2" style="width: 100%;" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label>Tags</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div> --}}
                <!-- Date -->
                {{-- <div class="form-group">
                    <label>Дата:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                    </div>
                </div> --}}

                {{-- <div class="form-group">
                    <label>
                        <input type="checkbox" class="minimal">
                    </label>
                    <label>
                        Рекомендовать
                    </label>
                </div> --}}

                {{-- <div class="form-group">
                    <label>
                        <input type="checkbox" class="minimal">
                    </label>
                    <label>
                        Черновик
                    </label>
                </div> --}}


            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Big Text</label>
                    <textarea name="text" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="/general_admin/posts" class="btn btn-default">Назад</a>
            <button class="btn btn-success pull-right">Добавить</button>
        </div>
    </div>

</section>


@endsection

