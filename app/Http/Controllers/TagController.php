<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index($tag_slug)
    {
        $tag_slug = Tag::with('articles.tags')
            ->where('slug', $tag_slug)
            ->firstOrFail();

        $tag_slug->setRelation(
            'articles',
            $tag_slug->articles()->paginate(Article::PER_PAGE)
        );

        return view('tag.index', [
            'tag' => $tag_slug
        ]);
    }
}
