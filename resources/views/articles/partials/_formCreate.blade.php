{{ csrf_field() }}

<!-- Title -->
<div class="form-group">
	<label for="title">Title</label>
	<input type="text" name="title" id="title"  placeholder="Enter Title" value="{{ old('title') ?? $article->title }}" class="form-control">
</div>

<!-- Body -->
<div class="form-group">
	<label for="body">Body</label>
	<textarea name="body" id="body" class="form-control" rows="5" placeholder="Article body">{{ old('body') ?? $article->body }}</textarea>
</div>

<!-- Category -->
<div class="form-group">
	<label for="category_id">Category</label>
	<select name="category_id" id="category_id" class="form-control">
		<option disabled selected>Select category</option>
		@foreach ($categories as $category)
			<option value="{{ $category->id }}" 
				{{ selected($category->id, old('category_id') ?? $article->category_id ) }}
			>
				{{ ucfirst($category->name) }}
			</option>
		@endforeach
	</select>
</div>

<!-- Button -->
<button type="submit" class="btn btn-success">{{ $button }}</button>
