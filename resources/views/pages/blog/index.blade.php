@extends('pages.layout')
  @section('title', 'Blog page')
@section('content')
<div class="container">
<h1>Blog</h1>
</div>

<section>
    <div class="container">
        <div class="row text-center">
            <h2>Categories filter</h2>
            <div style="margin:15px 0;">
                @foreach($categories as $category)
                    <a class="btn btn-info m-3" href="{{route('getPostsCategory', $category->slug)}}">{{$category->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>
<div class="container">
	<div class="row">
	@foreach($posts as $post)
		<div class="col-sm-12 col-md-4 col-lg-4">
		 	<div class="card">
			    <img class="card-img-top" src="/{{ $post->image ?? 'default-image.jpg' }}" alt="Card image">
			    <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between" style="">
                        <a href="{{route('getPostsCategory',$post->category['slug'])}}" >{{$post->category['title']}}</a>
                        <i>Views - {{ $post->views }}</i>
                    </div>
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
