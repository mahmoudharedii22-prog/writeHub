<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function like(Post $post)
    {
        $post->likes()->create([
            'user_id' => Auth::id(),
        ]);
    }

}
