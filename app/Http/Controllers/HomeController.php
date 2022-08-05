<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;
use App\Models\Section_item;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;
use App\Models\Replys;
use App\Models\postImages;
use Postimages as GlobalPostimages;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::where('posts.status','active')->orderBy('posts.created_at', 'DESC')->get();
        foreach($post as $key=>$val){
            $comments = Comment::where('post_id',$val->id)->count('comments');
            $all_comments = Comment::where('post_id',$val->id)->orderBy('id','desc')->get();
            $post[$key]->total_comment = $comments;
            $post[$key]->all_comments = $all_comments;

            foreach($all_comments as $key2=>$comm)
            {
                $reply = Replys::where('comment_id',$comm->id)->orderBy('id','desc')->get();
                $all_comments[$key2]->all_reply = $reply;
            }

            $post[$key]->tags = json_decode($val->tag,true);
            $post[$key]->categ = json_decode($val->category,true);

            $post_image = postImages::where('post_id',$val->id)->get();
            $post[$key]->post_image = $post_image;

        }

        // dd($post);  

        $section = Section::where('status','active')->orderBy('sequence', 'ASC')->get();
        $data=[];
        foreach($section as $sec){
            $Section_item = Section_item::select('id','section_item_name','section_item_value')->where('status','active')->where('section_id',$sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item = $Section_item;
            array_push($data, $sec);
        }

        // dd($Section_item);
        $array = json_decode(json_encode($data), true);
        return view('home')->with('data',$array)->with('post',$post);
    }


    public function editSection(Request $request)
    {
        dd($request->all());
        $update = Section_item::find($request->id);
        $update->section_item_value = $request->value;
        $update->save();
        return back();
    }
}
