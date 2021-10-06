@extends('general_admin.layout')
@section('title', 'Posts page')
@section('content')


<section class="content">
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Обновляем статью</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title" name="title" value="{{$post->title}}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="slug" name="slug" value="{{$post->slug}}">
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <img src="../assets/dist/img/boxed-bg.jpg" alt="" class="img-responsive" width="200">
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
                    <label>Теги</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                        <option>Alabama</option>
                        <option selected="selected">Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option selected="selected">Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div> --}}

                {{-- <div class="form-group">
                    <label>Дата:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" value="{{$post->created_at->format("m.d.y")}}">
                    </div>
                </div> --}}

                {{-- <div class="form-group">
                    <label>
                        <input type="checkbox" class="minimal" checked>
                    </label>
                    <label>
                        Рекомендовать
                    </label>
                </div> --}}

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description"  cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Big Text</label>
                    <textarea name="text" cols="30" rows="10" class="form-control">{{$post->text}}</textarea>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <a href="/general_admin/posts" class="btn btn-default">Назад</a>
            <button class="btn btn-warning pull-right">Изменить</button>
        </div>
    </div>
</form>
</section>

@endsection

