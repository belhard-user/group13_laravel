<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    const PER_PAGE = 15;

    public function index()
    {
        $articles = Article::orderBy('updated_at', 'DESC')
            ->paginate(static::PER_PAGE)
        ;

        return view('article.index', [
            'articles' => $articles
        ]);
    }

    public function add()
    {
        return view('article.add');
    }

    public function store(Request $request)
    {
        // Article::create($request->all());
        $request
            ->user()
            ->articles()
            ->create($request->all())
        ;

        return redirect()->route('article.index');
    }

    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article
        ]);
    }

    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article
        ]);
    }

    public function update(Article $article, Request $request)
    {
        $article->update($request->all());

        return redirect()->route('article.index');
    }
}
