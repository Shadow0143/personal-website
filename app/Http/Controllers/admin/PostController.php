<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function createPost(Request $request){

        dd($request->all());
        $post= new Post;
        $post->type = $request->postType;
        $post->post_content = $request->post;
        $post->save();

        Alert::success('Success','Post added');
        return back();
    }
}
