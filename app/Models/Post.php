<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','slug','category_id','author_id','thumbnail','body','excerpt','tags','meta_title','meta_description','status','views','published_at'];
    protected $casts = ['published_at' => 'datetime'];

    public function category(): BelongsTo { return $this->belongsTo(PostCategory::class, 'category_id'); }
    public function author(): BelongsTo { return $this->belongsTo(User::class, 'author_id'); }

    public function scopePublished($q) { return $q->where('status','published')->where('published_at','<=', now()); }
}
