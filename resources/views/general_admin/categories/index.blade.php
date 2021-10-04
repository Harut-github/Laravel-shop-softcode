@extends('general_admin.layout')
@section('title', 'Categories page')
@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Листинг сущности</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="form-group">
        <a href="{{ route('categories.create')}}" class="btn btn-success">Добавить</a>
      </div>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Название</th>
          <th>Действия</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                 <tr>
                    <td>{{ $category->id }}</td>
                      <td>{{ $category->title }}</td>
                      <td>
                        <a href="{{ route('categories.edit', $category->id)}}" class="fa fa-pencil"></a>
                         <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
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
    <!-- /.box-body -->
  </div>
</section>
@endsection
