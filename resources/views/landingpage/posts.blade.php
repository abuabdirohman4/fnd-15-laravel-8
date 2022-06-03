@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    {{-- Search --}}
    {{-- <div class="row">
        <div class="col-md-6">
            <form action="/posts" method="get">

            </form>
        </div>
    </div> --}}

    @if ($posts->count()) {{-- true jika lebih dari 0, false jika kosong atau 0 --}}
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height: 350px; overflow: hidden">
                    <img src="{{ asset('storage/'.$posts[0]->image) }}" class="card-img-top" alt="{{$posts[0]->category->name}}">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{$posts[0]->category->name}}">
            @endif
            <div class="card-body text-center">
            <h3 class="card-title">
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                    {{ $posts[0]->title }}
                </a>
            </h3>
            <p>
                <small class="text-muted">
                    By <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a>
                    in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More..</a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute text-white px-3 py-2" style="background-color: rgba(0, 0, 0, 0.6)">
                            <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-white">
                                {{ $post->category->name }}
                            </a>
                        </div>
                        @if ($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="{{$post->category->name}}">
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{$post->category->name}}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p>
                                <small class="text-muted">
                                    By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif
@endsection
