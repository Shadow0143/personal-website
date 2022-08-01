<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request){
        $post= new Post;
        $post->type = 'post';
        $post->post_content = $request->post;
        $post->save();
        return back();
    }
}
