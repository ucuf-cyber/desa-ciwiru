<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->with('category');
        if ($cat = $request->get('kategori')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $cat));
        }
        if ($s = $request->get('q')) {
            $query->where(function($q) use ($s){
                $q->where('title','like',"%$s%")->orWhere('excerpt','like',"%$s%");
            });
        }
        $posts = $query->orderByDesc('published_at')->paginate(9)->withQueryString();
        $categories = PostCategory::withCount('posts')->get();
        return view('public.berita.index', compact('posts','categories'));
    }

    public function show(string $slug)
    {
        $post = Post::published()->where('slug', $slug)->with('category','author')->firstOrFail();
        $post->increment('views');
        $related = Post::published()->where('category_id', $post->category_id)->where('id','!=',$post->id)->take(3)->get();
        return view('public.berita.show', compact('post','related'));
    }
}
