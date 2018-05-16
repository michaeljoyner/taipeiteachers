<?php

namespace App\Http\Controllers;

use Dymantic\Articles\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::published()->paginate(15);

        return view('front.blog.index', ['articles' => $articles]);
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('front.blog.show', ['article' => $article->toJsonableArray()]);
    }
}
