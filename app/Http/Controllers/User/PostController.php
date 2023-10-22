<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('user.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'author' => 'required',
            'content' => 'required',
            'image' => 'nullable||file|max:2048',
        ], [
            'name.required' => 'Name is required',
            'date.required' => 'Date is required',
            'author.required' => 'Author is required',
        ]);

        DB::beginTransaction();
        try {

            $path = (isset($request->image) && $request->image->isValid() ? $request->image->store('post', 'public') : null);

            Post::create([
                'category_id' => $request->category_id,
                'author_id' => $request->author_id,
                'name' => $request->name,
                'date' => $request->date,
                'content' => $request->content,
                'image' => $path,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('user.posts.index');
        }
        DB::commit();
        $request->session()->flash('success', 'User created successfully');
        return redirect()->route('user.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $response = array();
        if (!empty($post)) {

            $response['category_id'] = $post->category_id;
            $response['author_id'] = $post->author_id;
            $response['name'] = $post->name;
            $response['date'] = $post->date;
            $response['content'] = $post->content;

            $response['success'] = 1;
        } else {
            $response['success'] = 0;
        }

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $response = array();
        if (!empty($user)) {
            $update['category_id'] = $request->post('category_id');
            $update['author_id'] = $request->post('author_id');
            $update['name'] = $request->post('name');
            $update['content'] = $request->post('content');
            $update['date'] = $request->post('date');

            if ($user->update($update)) {
                $response['success'] = 1;
                $response['msg'] = 'Update successfully';
            } else {
                $response['success'] = 0;
                $response['msg'] = 'Record not updated';
            }
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {

        if ($post->delete()) {
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response);
    }
}
