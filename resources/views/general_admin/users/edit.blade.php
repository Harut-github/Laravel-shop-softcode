@extends('general_admin.layout') @section('title', 'Posts edit') @section('content')
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Добавляем пользователя</h3>
        </div>
        <form action="{{ route('users.update', $user->id)}}" method="POST">
            @method('PUT')
            @csrf
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Пароль</label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                    <img src="../assets/dist/img/photo1.png" alt="" width="200" class="img-responsive">
                    <label for="exampleInputFile">Аватар</label>
                    <input type="file" id="exampleInputFile">

                    <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button class="btn btn-default">Назад</button>
            <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        </form>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>

@endsection
