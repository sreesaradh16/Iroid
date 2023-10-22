<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function posts()
    {
        return $this->belongsToMany(Category::class, 'postcategories', 'category_id', 'post_id');
    }
}
