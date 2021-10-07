@extends('pages.layout')
  @section('title', 'Blog Single')
@section('content')
<div class="container">
<h1>Blog Single</h1>
</div>
<section>
<div class="container">
    <div class="card mb-3">
        <div class="col-3">
          <img class="card-img-top" src="/{{ $posts->image ?? 'default-image.jpg' }}" alt="Card image cap" >
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$posts->title}}</h5>
          <p class="card-text">{{$posts->text}}</p>
           <p class="card-text"><small class="text-muted">Post time {{$posts->created_at->format('m/d/Y')}} </small></p>
          <p class="card-text"><small class="text-muted">Last updated {{$posts->updated_at}} </small></p>
        </div>
    </div>

    @if(!$posts->comments->isEmpty())

    @foreach($posts->comments as $comment)
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2>{{$comment->users->name}}</h2>
            <span>{{$comment->created_at->format('m/d/Y')}}</span>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer">
                <cite>{{$comment->comment}}</cite>
            </footer>

          </blockquote>
        </div>
    </div><br>
    @endforeach

    @else
    <div class="card">
        <div class="card-header">
            No Comments
        </div>
    </div>
    @endif
    <br>
    <br>
    <form action="/comment" method="POST">
    @csrf
        <div class="form-floating">
            <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
        </div>
        @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="hidden" name="post_id" value="{{ $posts->id }}">
        <button class="btn btn-primary">Primary</button>
    </form>
</div>
@endsection
