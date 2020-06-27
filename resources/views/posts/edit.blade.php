@extends('layouts.app',['title' =>  'Belajar Laravel'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit Post: {{ $post->title }}</div>
                    <div class="card-body">
                        <form action="{{ route('post.update',[$post->slug]) }}" method="POST">
                            @method('patch')
                            @csrf
                            @include('posts/partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection