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


        $path = (isset($request->image) && $request->image->isValid() ? $request->image->store('post', 'public') : null);

        Post::create([
            'author' => $request->author,
            'name' => $request->name,
            'date' => $request->date,
            'content' => $request->content,
            'image' => $path,
        ]);


        return redirect()->route('user.dashboard');
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
    
}
