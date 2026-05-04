<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function explore()
    {
        return view('home.explore');
    }

    public function search(Request $request)
    {
        $query = $request->q;

        $posts = Post::with(['user', 'likes'])
            ->withCount('likes')
            ->when($query, function ($q) use ($query) {
                $q->where('content', 'like', "%{$query}%");
            })
            ->latest()
            ->get();

        return view('search.index', compact('posts', 'query'));
    }
}
