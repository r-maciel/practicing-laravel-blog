@extends('layouts.app')

@section('title', 'CoolBlogger')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    @if(auth()->check() && auth()->user()->alias === $user->alias)
                    <h4 class="align-self-center align-middle mb-0">Your Posts</h4>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary bg-primary">Create new Post</a>
                    @else
                    <h4 class="align-self-center align-middle mb-0">{{ '@'.$user->alias }} Posts</h4>
                    @endif
                </div>

                <div class="card-body">
                    @forelse($posts as $post)
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-dark">{{ $post->title }}</a>
                                </h5>
                                <span class="badge badge-pill badge-secondary">{{ $post->category->category }}</span>
                            </div>
                            {{-- Show timestamp in human-readable way --}}
                            <h6 class="card-subtitle mb-2 text-muted">
                               <i>Created {{ $post->created_at->diffForHumans() }}</i>
                            </h6>
                            @if($post->updated_at != $post->created_at)
                                <h6 class="card-subtitle text-muted align-self-center mb-4">
                                    <i>Updated {{   $post->updated_at->diffForHumans() }}</i>
                                </h6>
                            @endif
                            @if(auth()->check() && auth()->user()->alias === $user->alias)
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="card-link text-primary">Edit</a>
                            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="card-link text-danger border-0 bg-transparent p-0" value="Delete">
                            </form>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">No Posts available, create someone</h5>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection