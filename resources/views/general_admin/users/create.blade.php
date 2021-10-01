@extends('general_admin.layout')
@section('title', 'Posts create')
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Добавляем пользователя</h3>
        </div>
        <form action="/general_admin/users" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name">
                </div>
                @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" name="password">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">Аватар</label>
                    <input type="file" id="exampleInputFile" name="avatar">

                    <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="/general_admin/users" class="btn btn-default">Назад</a>
            <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
        </form>
    </div>
    <!-- /.box -->

</section>
@endsection
