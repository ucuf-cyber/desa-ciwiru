<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    protected $fillable = ['title','slug','description','cover'];
    public function items() { return $this->hasMany(GalleryItem::class, 'album_id')->orderBy('sort_order'); }
}
