@extends('layouts.app')

@section('title', '| Create article')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

			@include('flash::message')
			@include('errors._list')
			
			<div class="panel panel-default">

				<!-- Title -->
			    <div class="panel-heading">
			 	   <h4><i class="fa fa-pencil"></i>Create new article</h4>
			    </div>

				<!-- Body -->    
			    <div class="panel-body">
			        <form action="{{ route('articles.store') }}" method="post">
			        	@include('articles.partials._formCreate', [
			        	  'button' => 'Create article',
			        	  'article' => new \App\Article,
			        	])
			        </form>
			    </div>

			</div>

        </div>
    </div>
</div>

@endsection
