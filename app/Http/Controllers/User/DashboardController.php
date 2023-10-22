<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $posts = Post::orderBy('created_at', 'DESC');

        if ($request->post) {
            $posts->where('name', 'LIKE', '%' . $request->post . '%');
        }

        if ($request->author) {
            $posts->where('author', 'LIKE', '%' . $request->author . '%');
        }

        if ($request->date) {
            $posts->where('date', $request->date);
        }

        return view('user.dashboard', [
            'posts' => $posts->get(),
            'all_posts' => Post::orderBy('created_at', 'DESC')->get(),
            'all_categories' => Category::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function searchPost(Request $request)
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        if ($request->keyword != '') {
            $posts = Post::where('name', 'LIKE', '%' . $request->keyword . '%')->orWhere('author', 'LIKE', '%' . $request->keyword . '%')->get();
        }

        return response()->json([
            'posts' => $posts
        ]);
    }

    public function addCategoriesToPost(Request $request)
    {
        foreach ($request->category_ids as $category_id) {
            $post_category = PostCategory::create([
                'post_id' => $request->post_id,
                'category_id' => $category_id,
            ]);
        }
        return response()->json(['success']);
    }
}
