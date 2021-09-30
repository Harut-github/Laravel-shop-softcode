@extends('general_admin.layout')
  @section('title', 'Categories edit')
@section('content')
 <form action="{{ route('categories.update', $category->id)}}" method="POST">
    @method('PATCH')
    @csrf
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Меняем категорию</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              @include('general_admin.errors.index')
              <label for="exampleInputEmail1">Название</label>
              <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'error' : ''}}" id="exampleInputEmail1" placeholder="" value="{{ $category->title }}">
              <input type="text" name="slug" class="form-control {{ $errors->has('slug') ? 'error' : ''}}" id="exampleInputEmail1" placeholder="" value="{{ $category->slug }}">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="/general_admin/categories" class="btn btn-default">Назад</a>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </form>
@endsection
