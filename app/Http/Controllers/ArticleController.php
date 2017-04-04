<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Traits\ModelFinder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    use ModelFinder;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->getArticles();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // move in view composer

        if (Gate::denies('create', 'App\Article')) 
        {
            return view('welcome');
        }

        $categories = $this->getCategories();

        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        Auth::user()->createArticle($request->all());

        flash()->success('Article has been created');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // move to view composer
        if (Gate::denies('update', $article)) {
            return view('welcome');
        }
        $categories = $this->getCategories();

        return view('articles.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        flash()->success('Article updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if (Gate::denies('delete', $article)) {
            return view('welcome');
        }
        $article->delete();

        flash()->success('Article deleted');

        return redirect(route('welcome'));

    }
}
