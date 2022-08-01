<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function sendComment(Request $request)
    {
        // dd($request->all());
        $comment =  new Comment();


        if(Auth::user()){
            $comment->user_id = Auth::user()->id;
            $comment->user_name = Auth::user()->name;
        }else{
        
            $comment->user_name ='Guest';
        }
        

        $sequence = $comment->id;

        $comment->post_id = $request->post_id;
        $comment->comments = $request->comment_message;
        $comment->sequence = $sequence;
        $comment->save();

        $new_comment = Comment::where('post_id',$request->post_id)->orderBy('id','desc')->first();

        $data = '<div class="col-12 mb-3">'.$new_comment->user_name.'<br>  <div class="row"><div class="col-8" style="word-wrap: break-word"><b>'.$new_comment->comments.'</b></div><div class="col-4">'.date('D-M-Y H:i',strtotime($new_comment->created_at)).'</div></div></div>';

        return \Response::json(['success' => true, 'data'=>$data]);

    }
}
