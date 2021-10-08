
@extends('pages.layout')
@section('title', 'Home page')
@section('content')

<section>
    <div class="container">
        <div class="row">

            <h2>Top posts </h2>
            @foreach ($posts_top as $value)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title">{{ $value->title }}</h5>
                            <i>views- {{$value->views}}</i>
                        </div>
                        <p class="card-text">{{$value->description}}</p>
                        <a href="/blog/{{$value->slug}}" class="btn btn-primary">Link</a>
                    </div>
                </div>
            </div>
            @endforeach

            <h2>Bed Posts</h2>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $posts_bed->title }}</h5>
                        <p class="card-text">{{$posts_bed->description}}</p>
                        <a href="/blog/{{$posts_bed->slug}}" class="btn btn-primary">Link</a>
                    </div>
                </div>
            </div>

            <h2>Random Post</h2>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $posts_random->title }}</h5>
                        <p class="card-text">{{$posts_random->description}}</p>
                        <a href="/blog/{{$posts_random->slug}}" class="btn btn-primary">Link</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
