<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function save(Post $post, Request $request) {

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($request->user())->send(new PostLiked(auth()->user(), $post)); //We pass in the user and the ost arguments.
        }
        

        return back();
    }
    public function destroy(Post $post, Request $request) {

        //Now we want to delete a like of this post out of many posts liked by this user.
        //Now we have to refer to our user and then get all the likes he made and then
        //get a particular post using this post id.
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
    
}
