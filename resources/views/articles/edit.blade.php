@extends('layouts.app')

@section('title', '| Edit article')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

			@include('flash::message')
			@include('errors._list')
			
			<div class="panel panel-default">

				<!-- Title -->
			    <div class="panel-heading">
			 	   <h4>Edit article</h4>
			    </div>

				<!-- Body -->    
			    <div class="panel-body">
			        <form action="{{ $article->path('update') }}" method="post">

			        	{{ method_field('PUT') }}

			        	@include('articles.partials._formCreate', [
			        		'button' => 'Save Changes'
			        		])
			        		
			        </form>
			    </div>

			</div>

        </div>
    </div>
</div>

@endsection
