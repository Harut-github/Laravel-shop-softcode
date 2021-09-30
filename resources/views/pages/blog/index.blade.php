@extends('pages.layout')
  @section('title', 'Blog page')
@section('content')
<div class="container">
<h1>Blog</h1>
</div>
<section>
<div class="container">
	<div class="row">
	@foreach($posts as $post)
		<div class="col-sm-12 col-md-4 col-lg-4">
		 	<div class="card">
			    <img class="card-img-top" src="/{{ $post->image ?? 'default-image.jpg' }}" alt="Card image">
			    <div>
			    	<button type="button" class="btn btn-link">category</button>
			    </div>
			    <div class="card-body">
			      <h4 class="card-title">{{$post->title}}</h4>
			      <p class="card-text">{{$post->description}}</p>
			      <a href="/blog/{{$post->slug}}" class="btn btn-primary">See page</a>
			    </div>
			 </div>
		</div>
	@endforeach
	<hr>
	{{$posts->links()}}

	</div>
</div>
</section>




@endsection
