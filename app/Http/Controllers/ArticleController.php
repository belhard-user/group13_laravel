<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    const PER_PAGE = 15;

    public function index()
    {
        $articles = \DB::table('articles')
            ->orderBy('updated_at', 'DESC')
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
        $data = $request->except('_token');
        $data = array_merge($data, [
            'slug' => str_slug($request->get('title')),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        \DB::table('articles')->insert($data);

        return redirect()->route('article.index');
    }

    public function show($slug)
    {
        $article = \DB::table('articles')->where('slug', $slug)->first();

        dd($article);
    }
}
