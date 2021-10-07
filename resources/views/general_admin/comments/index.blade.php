@extends('general_admin.layout')
  @section('title', 'Comment page')
@section('content')
<div class="">
    <div class="box">
        <div class="box-body">
          <div class="form-group">
            <a href="create.html" class="btn btn-success">Create</a>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Comment</th>
              <th>-</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($comments as $comment)
              <tr>
                <td>{{$comment->id}} </td>
                <td>{{$comment->users->name}}</td>
                <td>{{$comment->comment}}
                </td>
                <td>
                    {{-- <a href="edit.html" class="fa fa-thumbs-o-up"></a>  --}}
                    <form action="{{ route('comments.destroy', $comment->id)}}" method="POST">
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
  </div>

  @endsection
