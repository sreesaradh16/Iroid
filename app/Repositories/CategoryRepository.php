<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class CategoryRepository
{
    public function create($data)
    {
        $category = Category::create([
            'name' => $data['name'],
        ]);

        return $category;
    }

    public function update($data, $category)
    {
        $category->name  = $data['name'];
        $category->save();

        return $category;
    }

    public function delete($category)
    {
        $category->delete();
    }
}
