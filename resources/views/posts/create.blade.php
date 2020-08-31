@extends('layouts.app')

@section('title', 'CoolBlogger')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="align-self-center align-middle mb-0">Create a new Post</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="post">
                    	@csrf
						<div class="form-group">
						    <label for="title">Title</label>
						    @error('title')
						    	<small class="form-text text-danger">
						    		{{ $message }}
						    	</small>
						    @enderror
						    <input type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title" name="title" value="{{ old('title') }}">	
						    <small id="titleHelp" class="form-text text-muted">
						    	Add a nice title for your next great post.
						    </small>
					 	</div>
					 	<div class="form-group">
					    	<label for="content">Content</label>
						    @error('content')
						    	<small class="form-text text-danger">
						    		{{ $message }}
						    	</small>
						    @enderror
					    	<textarea type="content" class="form-control" id="content" placeholder="Enter content" name="content">{{ old('content') }}</textarea>		
						    <small id="contentHelp" class="form-text text-muted">
						    	Let's write an awesome post!.
						    </small>
					 	</div>
					 	<div class="form-group">
					 		<label for="category_slug">Category</label>
						    @error('category_slug')
						    	<small class="form-text text-danger">
						    		{{ $message }}
						    	</small>
						    @enderror
					 		<select class="custom-select" id="category_slug" name="category_slug">
								<option {{ old('category_slug') ?? 'selected' }} disabled value="">Select a category</option>
								@forelse($categories as $category)
									<option value="{{ $category->slug }}" {{ old('category_slug') == $category->slug ? 'selected' : '' }}>
										{{ $category->category }}
									</option>
								@empty
									<option disabled value="">No categories available</option>
								@endforelse
							</select>		
						    <small id="contentHelp" class="form-text text-muted">
						    	Choice the category you think is going to fix better.
						    </small>				 	
						</div>
					 	<button type="submit" class="btn btn-primary">Create</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection