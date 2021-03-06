<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

   public function index()
   {
   $articles = Article::Latest()->get();
   return view('articles.index', ['articles' => $articles]);
}




    public function show(Article $article)
    {
       
        return view ('articles.show', ['article' => $article]);
   
    }


public function create()
{
	return view('articles.create');
}





public function store()
{
	Article::create(request()->validate([
    'title' => 'required',
    'excerpt' => 'required',
    'body' => 'required'
   ]));





  $article = new Article();

  $article->title = request ('title');
  $article->excerpt = request ('excerpt');
  $article->body = request ('body');

  $article->save();

  return redirect('/articles');
}




public function edit(Article $article)
{

	
	return view('articles.edit', compact('article'));
}



public function update(Article $article)

{

	request()->validate([
    'title' => 'required',
    'excerpt' => 'required',
    'body' => 'required'
   ]);



  $article->title = request ('title');
  $article->excerpt = request ('excerpt');
  $article->body = request ('body');
    $article->save();

    return redirect('/articles/' . $article->id);
}
}





