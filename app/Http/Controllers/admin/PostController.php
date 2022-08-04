<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\postImages;

class PostController extends Controller
{
    public function createPost(Request $request){

        // dd($request->all());
        $post= new Post;
        $post->type = $request->postType;
        $post->title = $request->blog_title;
        $post->sub_title = $request->blog_subtitle;
        $post->sub_title = $request->blog_subtitle;
        if($request->postType=='blog'){
            $post->post_content = $request->blog_post;
        }else{
            $post->post_content = $request->post;
        }
        $tag = json_encode($request->tags,true);
        $post->tag = $tag;
        $post->save();

        $postImagearry = $request->post_image;
        if(!empty($postImagearry)){
			for ($k = 0; $k < count($postImagearry); $k++) {
					$input['imagename'] ='PostImage-'.Auth::user()->id. '-'.rand(000, 5000) . '.' . $postImagearry[$k]->getClientOriginalExtension();
					$destinationPath_selected = public_path('/uploads');
					$img2 = Image::make($postImagearry[$k]->getRealPath());
					$img2->resize(1024, 768, function ($constraint2) {
						$constraint2->aspectRatio();
					})->save($destinationPath_selected . '/' . $input['imagename']);
		
                    $postimage = new postImages();
                    $postimage->user_id = Auth::user()->id;
                    $postimage->post_id  = $post->id;
                    $postimage->image = $input['imagename'];
					$postimage->save();
				
				}
		}

        Alert::success('Success','Post added');
        return back();
    }
}
