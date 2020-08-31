@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-1 mb-3">{{ $post->title }}</h5>
                    {{-- Show timestamp in human-readable way --}}
                    <div class="d-flex justify-content-between align-items-center mb-2">
	                    <h6 class="card-subtitle text-muted align-self-center">
	                    	{{-- Accesing to user with relationship from post --}}
	                       By <a href="{{ route('users.index', ['user' => $post->user->alias]) }}">{{ '@' . $post->user->alias }}</a>  |  Created {{   $post->created_at->diffForHumans() }}
	                    </h6>
	                    <a href="{{ route('categories.posts.show', ['category' => $post->category->slug]) }}" class="badge badge-primary text-white p-1">{{ $post->category->category }}</a>
	                </div>
                    @if($post->updated_at != $post->created_at)
                        <h6 class="card-subtitle text-muted align-self-center mb-4">
                            Updated {{   $post->updated_at->diffForHumans() }}
                        </h6>
                    @endif
                    {{-- Print ontent with spaces --}}
                    <p class="card-text">{!! nl2br(e($post->content)) !!}</p>
                    @can('updateDelete', $post)
                    <div class="d-flex">
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="card-link text-primary ml-2 mr-2">Edit</a>
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="card-link text-danger border-0 bg-transparent ml-2 mr-2" value="Delete">
                        </form>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection