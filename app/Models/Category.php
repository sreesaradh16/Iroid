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
        'email',
        'image',
        'password',
    ];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}
