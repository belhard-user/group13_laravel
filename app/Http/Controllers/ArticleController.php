<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use DB;

class ArticleController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $articles = Article::with('tags')->orderBy('updated_at', 'DESC')
            ->paginate(Article::PER_PAGE)
        ;

        return view('article.index', [
            'articles' => $articles
        ]);
    }

    public function add()
    {
        return view('article.add');
    }

    public function store(ArticleRequest $request)
    {
        $tagIds = $request->get('tag_id');
        try {
            DB::beginTransaction();
            $article = $request
                ->user()
                ->articles()
                ->create($request->all());
            $article->tags()->attach($tagIds);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }

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

    public function update(Article $article, ArticleRequest $request)
    {
        try {
            DB::beginTransaction();
            $tagsIds = $request->get('tag_id');
            $article->update($request->all());

            $article->tags()->sync($tagsIds);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }

        return redirect()->route('article.index');
    }
}
