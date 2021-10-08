@extends('general_admin.layout')
@section('title', 'products page')
@section('content')


<section class="content">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Product</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title" name="title" value="{{$product->title}}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="slug" name="slug" value="{{$product->slug}}">
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="price" name="price" value="{{$product->price}}">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Big Text</label>
                    <textarea name="text" cols="30" rows="10" class="form-control">{{$product->text}}</textarea>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <a href="/general_admin/products" class="btn btn-default"><-back</a>
            <button class="btn btn-warning pull-right">Edit</button>
        </div>
    </div>
</form>
</section>

@endsection

