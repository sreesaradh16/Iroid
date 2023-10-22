<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'postcategories';

    protected $fillable = [
        'post_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'category_id', 'id');
    }
}
