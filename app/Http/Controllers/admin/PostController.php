<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\postImages;
use Image;

class PostController extends Controller
{
    public function createPost(Request $request)
    {

        // dd($request->all());
        $post = new Post;
        $post->type = $request->postType;
        if ($request->postType == 'post') {
            $post->title = $request->post_title;
        } else {
            $post->title = $request->blog_title;
        }
        $post->sub_title = $request->blog_subtitle;

        if ($request->postType == 'blog') {
            $post->post_content = $request->blog_post;
        } else if ($request->postType == 'post') {
            $post->post_content = $request->post_post;
        } else {
            $post->post_content = $request->post;
        }
        $tag = json_encode($request->tags, true);
        $categ = json_encode($request->categories, true);
        $post->tag = $tag;
        $post->category = $categ;
        $post->save();

        $postImagearry = $request->post_image;
        if (!empty($postImagearry)) {
            for ($k = 0; $k < count($postImagearry); $k++) {
                $input['imagename'] = 'PostImage-' . Auth::user()->id . '-' . rand(000, 5000) . '.' . $postImagearry[$k]->getClientOriginalExtension();
                $destinationPath_selected = public_path('/uploads');
                $img2 = Image::make($postImagearry[$k]->getRealPath());
                // $img2->resize(1024, 768, function ($constraint2) {
                // 	$constraint2->aspectRatio();
                // })
                $img2->save($destinationPath_selected . '/' . $input['imagename']);

                $postimage = new postImages();
                $postimage->user_id = Auth::user()->id;
                $postimage->post_id  = $post->id;
                $postimage->image = $input['imagename'];
                $postimage->save();
            }
        }

        Alert::success('Success', 'Post added');
        return back();
    }
}