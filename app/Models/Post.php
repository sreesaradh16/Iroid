<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'author',
        'name',
        'date',
        'content',
        'image'
    ];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }

    public function categories()
    {
        return $this->belongsToMany(Post::class, 'postcategories', 'post_id', 'category_id');
    }
}
