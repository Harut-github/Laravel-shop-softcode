@extends('general_admin.layout')
@section('title', 'Posts page')
@section('content')

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Листинг сущности</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <a href="/general_admin/posts/create" class="btn btn-success">Добавить</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>Category</th>
                    <th>Tegs</th>
                    <th>Img</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}
                    <td>{{$post->category['title']}}</td> {{-- for this look in post modal --}}
                    <td>tags</td>
                    <td>
                        <img src="/{{$post->image}}" alt="" width="100">
                    </td>
                    <td>
                    <a href="{{ route('posts.edit', $post->id)}}" class="fa fa-pencil"></a>

                    <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
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

