<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}
