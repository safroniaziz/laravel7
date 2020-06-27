@extends('layouts.app',['title' =>  'Belajar Laravel'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">New Post</div>
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            @include('posts/partials.form',['submit'    =>  'Create'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection