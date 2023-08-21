<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        
        $posts = Post::with(['user', 'likes'])->paginate(3); // Gets a collection of all posts. Paginate returns a paginator instance.
        return view('posts.index', ['posts' => $posts]);
    }

    public function save(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        //Must first establish fillable property for mass assignment.
        $request->user()->posts()->create($request->only('body'));

        return back();
    }
    
    public function destroy(Post $post) {

        $post->delete();

        return back();
    }
}
