<?php  

namespace App\Traits;

use App\Article;
use App\Category;

trait ModelFinder
{
	protected $per_page = 5;

	public function getArticles()
	{
        return Article::with('category', 'user')->latest()->paginate($this->per_page);

	}

	public function getArticle($id)
	{
		return Article::findOrFail($id);
	}


	public function getCategories()
	{
		return Category::orderBy('name')->get();
	}
}