<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Assuming you have an Article model

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        return Article::create($request->only(['title', 'content']));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $article->update($request->only(['title', 'content']));

        return $article;
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
}
