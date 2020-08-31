@extends('layouts.app')

@section('title', 'CoolBlogger')

@section('content')
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
				    <h3 class="card-title border-bottom mb-3 pb-1">Latest posts</h3>
					<div style="overflow-x: scroll;" class=" d-flex">
						@forelse($posts as $post)
					  	<div class="card m-1" style="min-width: 250px;">
						  <div class="card-body">
						  	<div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-dark">{{ $post->title }}</a>
                                </h5>
                                <span class="badge badge-pill badge-secondary">{{ $post->category->category }}</span>
                            </div>
                            {{-- Show timestamp in human-readable way --}}
                            <h6 class="card-subtitle mb-2 text-muted">
                               By <a href="{{ route('users.index', ['user' => $post->user->alias]) }}">{{ '@' . $post->user->alias }}</a>  |  Created {{   $post->created_at->diffForHumans() }}
                            </h6>
                            @if($post->updated_at != $post->created_at)
                                <h6 class="card-subtitle text-muted align-self-center">
                                    <i>Updated {{   $post->updated_at->diffForHumans() }}</i>
                                </h6>
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection