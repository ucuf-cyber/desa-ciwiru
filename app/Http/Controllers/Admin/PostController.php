<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }
    public function create() {
        $categories = PostCategory::all();
        return view('admin.posts.form', ['post' => new Post(), 'categories' => $categories]);
    }
    public function store(Request $request) {
        $data = $this->validateData($request);
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(4);
        $data['author_id'] = auth()->id();
        if ($request->hasFile('thumbnail')) $data['thumbnail'] = $request->file('thumbnail')->store('posts','public');
        if ($data['status'] === 'published' && empty($data['published_at'])) $data['published_at'] = now();
        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success','Berita ditambahkan.');
    }
    public function edit(Post $post) {
        $categories = PostCategory::all();
        return view('admin.posts.form', compact('post','categories'));
    }
    public function update(Request $request, Post $post) {
        $data = $this->validateData($request);
        if ($request->hasFile('thumbnail')) $data['thumbnail'] = $request->file('thumbnail')->store('posts','public');
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success','Berita diperbarui.');
    }
    public function destroy(Post $post) {
        $post->delete();
        return back()->with('success','Berita dihapus.');
    }
    private function validateData(Request $r): array {
        return $r->validate([
            'title' => 'required|string|max:200',
            'category_id' => 'nullable|exists:post_categories,id',
            'thumbnail' => 'nullable|image|max:4096',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'required|string',
            'tags' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ]);
    }
}
