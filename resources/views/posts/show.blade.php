@extends('layouts.app')
@section('content')
<div class="card mb-3">
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $post->title }}
                <div class="text-secondary">
                    <a href="{{ route('category.show',[$post->category->slug]) }}">{{ $post->category->name }}</a>
                    &middot; {{ $post->created_at->diffForHumans() }}
                    &middot;
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('tag.show',[$tag->slug]) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            
            <div class="card-body">
                <div>
                   {{ $post->body }}
                </div>

                <button type="button" class="btn btn-link text-danger btn-sm p-0" data-toggle="modal" data-target="#exampleModal">
                    Delete
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete the post</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('post.destroy',[$post->slug]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-link text-danger btn-sm p-0">Delete</button>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection