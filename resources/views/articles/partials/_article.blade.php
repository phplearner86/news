<div class="panel panel-default">

	<!-- Title -->
    <div class="panel-heading">
    @if (Request::is('articles'))
        <a href="{{ $article->path('show') }}">
            {{ $article->title }}
        </a>
    @else
            {{ $article->title }}
    
    @endif
    </div>

	<!-- Body -->    
    <div class="panel-body">
        <p>{{ $article->body }}</p>
    </div>

	<!-- Info -->
    <div class="panel-footer">
        Posted By: {{ $article->user->name }}, 
        <i class="fa fa-calendar"></i>
        {{ $article->created_at->format(' d M Y') }}, 
         <i class="fa fa-flag"></i>
        {{ $article->category->name }}

         @if (Request::segment(2) == $article->id)
            <div class="pull-right">
                @can('update', $article)
                     <a href="{{ $article->path('edit') }}">
                        <i class="fa fa-pencil-square-o"></i> Edit article
                     </a>
                @endcan
               
                @can('delete', $article)
                    @include('articles.partials._formDelete')
                @endcan

            </div>
        @endif


    </div>

    
</div>