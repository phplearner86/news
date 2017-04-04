@extends('layouts.app')

@section('title', '| Articles')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- Articl list -->
            @if ($articles->count())

                @foreach ($articles as $article)

                    @include('articles.partials._article')

                @endforeach
                
            @endif

        </div>
    </div>
    
    <!-- Pagination -->
    <div class="text-center">{{ $articles->links() }}</div>

</div>

@endsection
