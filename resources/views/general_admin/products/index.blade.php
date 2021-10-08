@extends('general_admin.layout')
@section('title', 'Products page')
@section('content')

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Products</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <a href="/general_admin/products/create" class="btn btn-success">Create</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>Price</th>
                    <th>Img</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <img src="/{{$product->image}}" alt="" width="100">
                    </td>
                    <td>
                    <a href="{{ route('products.edit', $product->id)}}" class="fa fa-pencil"></a>

                    <form action="{{ route('products.destroy', $product->id)}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button onclick="return confirm('вы уверены что хотите удалить???')">
                            <i class="fa fa-remove"></i>
                       </button>
                    </form>
                    </td>
                </tr>
                @endforeach
                </tfoot>
            </table>
        </div>
    </div>
</section>

@endsection

