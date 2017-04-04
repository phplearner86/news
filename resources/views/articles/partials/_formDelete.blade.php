<form action="{{ $article->path('destroy') }}" method="post">

	{{ csrf_field() }}
	{{ method_field('DELETE') }}

	<button  class="fa fa-trash-o">Delete article</button>
</form>