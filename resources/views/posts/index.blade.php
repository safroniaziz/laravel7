@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                @isset($category)
                    <h4>Category: {{ $category->name }}</h4>
                @endisset

                @isset($tag)
                    <h4>Tag: {{ $tag->name }}</h4>
                @endisset

                @if (!isset($category) && !isset($tag))
                    <h4>All Posts</h4>
                @endif

                <hr>
            </div>
            <div>
                @if (Auth::check())
                    <a href="{{ route('post.create') }}" class="btn btn-primary">New Post</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login to create new post</a>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            @forelse ($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-3">

                        <div class="card-header">
                            {{ $post->title }}
                        </div>
                        <div class="card-body">
                            <div>
                                {{ Str::limit($post->body,50) }}
                            </div>
                            <a href="{{ route('post.detail',[$post->slug]) }}">Read More</a>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            Published on {{ $post->created_at->diffForHumans() }}
                            @auth
                                <a href="{{ route('post.edit',[$post->slug]) }}" class="btn btn-sm btn-success">Edit</a>   
                            @endauth
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    There are no posts here
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div>
                {{ $posts->links() }} 
            </div>
        </div>
    </div>
@stop