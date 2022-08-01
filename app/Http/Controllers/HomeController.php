<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;
use App\Models\Section_item;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;


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
        $post = Post::where('status','active')->orderBy('created_at', 'DESC')->get();
        foreach($post as $key=>$val){
            $comments = Comment::where('post_id',$val->id)->count('comments');
            $all_comments = Comment::where('post_id',$val->id)->orderBy('id','desc')->get();
            $post[$key]->total_comment = $comments;
            $post[$key]->all_comments = $all_comments;
        }

        $section = Section::where('status','active')->orderBy('sequence', 'ASC')->get();
        $data=[];
        foreach($section as $sec){
            $Section_item = Section_item::select('id','section_item_name','section_item_value')->where('status','active')->where('section_id',$sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item = $Section_item;
            array_push($data, $sec);
        }
        $array = json_decode(json_encode($data), true);
        return view('home')->with('data',$array)->with('post',$post);
    }


    public function editSection(Request $request)
    {

        $response = Http::get('https://personal-website.iudyog.com/edit-section-api', [
            'id' => $request->id,
            'sectionId' => $request->sectionId,
        ]);
        $details = $response->json();
        
        return $details;
        
    }
}
