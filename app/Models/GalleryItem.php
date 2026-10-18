<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = ['album_id','type','file_path','caption','sort_order'];
    public function album() { return $this->belongsTo(GalleryAlbum::class, 'album_id'); }
}
