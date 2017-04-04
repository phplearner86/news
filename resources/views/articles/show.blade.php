@extends('layouts.app')

@section('title', '| Article')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- Article -->
            @include('articles.partials._article')

        </div>
    </div>
</div>

@endsection
