@extends('general_admin.layout')
@section('title', 'Products page')
@section('content')
<section class="content">
    <form action="/general_admin/products" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Products</h3>
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
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="price" name="price" value="{{ old('price') }}">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
            <a href="/general_admin/products" class="btn btn-default">Back</a>
            <button class="btn btn-success pull-right">Create</button>
        </div>
    </div>

</section>


@endsection

