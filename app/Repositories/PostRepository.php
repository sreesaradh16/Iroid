<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostRepository
{
    public function create($data)
    {
        $path = (isset($data['image']) && $data['image']->isValid() ? $data['image']->store('post', 'public') : null);

        $post = Post::create([
            'name' => $data['name'],
            'author' => $data['author'],
            'date' => $data['date'],
            'content' => $data['content'],
            'image' => $path,
        ]);

        return $post;
    }

    public function update($data, $post)
    {
        $post->name  = $data['name'];
        $post->author  = $data['author'];
        $post->date  = $data['date'];
        $post->content  = $data['content'];

        if (isset($data['image']) && $data['image']->isValid()) {
            //delete old file
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            //store new file
            $path = $data['image']->store('post', 'public');

            $post->image = $path;
        }

        $post->save();

        return $post;
    }

    public function delete($post)
    {
        $post->delete();
    }
}
