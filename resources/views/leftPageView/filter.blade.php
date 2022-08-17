<div class="postsDisplay">
    @foreach ($post as $post)
        <div class="col-lg-12 col-md-12 col-sm-12 embeded_post ">
            {{date('d-M-Y',strtotime($post->created_at))}} <br>
            @if(!empty($post->title))
                <h2><a href="{{route('postDetails',['id'=>$post->id])}}">{{ucfirst($post->title)}}</a></h2>
            @endif
            @if(!empty($post->sub_title))
                <h4>{{ucfirst($post->sub_title)}}</h4>
            @endif
        

            @if(!empty($post->title))
                    @if (!empty($post['post_content']))
                        <?php
                        $rem_len = str_word_count($post['post_content']);
                        $extract_data = implode(' ', array_slice(explode(' ', $post['post_content']), 0, 50));
                      
                        ?>
                    @if($rem_len > 50)                                              
                        <p>{!! $extract_data !!}
                        </p>
                        <a href="{{route('postDetails',['id'=>$post->id])}}" class=" mb-5"> Read more </a> 
                        @else
                            {!! $post['post_content'] !!}
                        @endif

                    @endif

                @else
                    {!! $post['post_content'] !!}
                @endif  
            @if(count($post->post_image) == 1)
            <div class="light_gallery gitem" id="lightGallery">
                @foreach($post->post_image as $image)
                <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                    <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}" class="img-responsive">
                    <div class="more_img_overlay">
                    
                    </div>
                </a>
                @endforeach
            </div>  
            @endif
            @if(count($post->post_image) == 2)
            <div class="light_gallery gitem2" id="lightGallery">
                @foreach($post->post_image as $image)
                <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                    <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}" class="img-responsive">
                    <div class="more_img_overlay">
                    
                    </div>
                </a>
                @endforeach
            </div>  
            @endif
            @if(count($post->post_image) == 3)
            <div class="light_gallery gitem3" id="lightGallery">
                @foreach($post->post_image as $image)
                <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                    <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}" class="img-responsive">
                    <div class="more_img_overlay">
                    
                    </div>
                </a>
                @endforeach
            </div>  
            @endif
            @if(count($post->post_image) == 4) 
            <div class="light_gallery gitem4" id="lightGallery">
                @foreach($post->post_image as $image)
                <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                    <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}" class="img-responsive">
                    <div class="more_img_overlay">
                    
                    </div>
                </a>
                @endforeach
            </div>  
            @endif
            @if(count($post->post_image) > 5) 
                <div class="light_gallery gitem5" id="lightGallery">
                    @foreach($post->post_image as $image)
                    <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                        <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}" class="img-responsive">
                        <div class="more_img_overlay">
                            <span>+{{count($post->post_image)-5}}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            @endif  

            <div class="postFtr">
                <ul class="pftrList">
                    <!-- Button trigger modal -->
                    <li>

                    
                        @if(!Auth::user())
                            <a href="javaScript:void(0);" onclick="goolgelogin()" id="likeremove{{$post['id']}}" title="like" class="likeremove{{$post['id']}} ">
                                <i class="ti-heart"></i> <span> {{$post->likes}}</span>
                            </a>
                        @else
                            <a href="javaScript:void(0);"  id="datashow{{$post['id']}}" class="text-danger datashow{{$post['id']}} " title="liked !" style="display: none">
                                <i class="ti-heart"></i> 
                                <span id="datalike{{$post['id']}}"  class="datalike{{$post['id']}}"> {{$post->likes}}</span>
                            </a>
                            @if($post->likeExist)
                                <a href="javaScript:void(0);"  id="likeshow{{$post['id']}}" class="text-danger likeshow{{$post['id']}}" title="liked !">
                                    <i class="ti-heart"></i> <span> {{$post->likes}}</span>
                                </a>
                            @else
                                <a href="javaScript:void(0);" @if(Auth::user()) onclick="likes('{{$post['id']}}')" @else onclick="goolgelogin()"   @endif id="likeremove{{$post['id']}}" title="like"  class="likeremove{{$post['id']}}">
                                    <i class="ti-heart"></i> <span > {{$post->likes}}</span>
                                </a>
                            @endif
                            
                        @endif
                    </li>

                    <li>
                            <a href="javaScript:void(0);" class="comment_icon" data-id="{{$post['id']}}" data-toggle="collapse" data-target="#comments_view{{$post['id']}}">
                       
                            <i class="ti-comment"></i>
                            <span id="commentCount-{{$post->id}}">{{$post['total_comment']}}
                            </span>
                        </a>
                        <input type="hidden" id="commentCountbox{{$post->id}}" value="0">
                    </li>
                    <li><a href="">
                            @if (is_array($post->categ) || is_object($post->categ))
                            <i class="ti-flag-alt"></i>
                            @foreach($post->categ as $val_tag)
                                    <span >{{ucfirst($val_tag)}}</span> &nbsp;
                            @endforeach
                            @endif

                        </a>
                    </li>
                    <div id="comments_view{{$post['id']}}" class="collapse header-clp mt-5 mb-5">
                        <div class="mt-3">
                            @if(!empty(Auth::user()))
                            <form action="" id="commet_form{{$post['id']}}" class="commet_form" method="POST">
                                <div class="row mb-2">
                                    <div class="col-10">
                                        <input type="hidden" name="post_new_id" id="post_new_id">
                                        <input type="text" name="" id="comment_message{{$post['id']}}" class="form-control" placeholder="Write comments">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-outline-primary" onClick="submitForm(`{{$post->id}}`)">Send</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                            <div id="commentId-{{$post->id}}" class="comment_history">
                                @forelse ($post['all_comments'] as $comm)
                                <div class="col-12 mb-3" style="" id="comment_row{{$post->id}}{{$comm->id}}">
                                    {{$comm->user_name}} <br>
                                    <div class="row">
                                        <div class="col-6" style="word-wrap: break-word">
                                            <b>{{$comm->comments}}</b>
                                        </div>
                                        <div class="col-2">
                                            @if(Auth::user())
                                            @if(Auth::user()->role=='owner')
                                            <a data-toggle="collapse" data-target="#reply_view{{$comm['id']}}" href="javaScript:void(0);" class="comment_icon " style="background: transparent;color:gray" title="Reply">
                                                <i class="ti-share-alt"></i>
                                            </a>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="col-2 text-right">
                                            {{-- {{moment($comm->created_at).startOf('hour').fromNow(); }} --}}
                                            {{$comm->created_at->diffForHumans()}}
                                            
                                        </div>
                                        @if(Auth::user())
                                            @if(Auth::user()->role=='owner')
                                                <div class="col-2">
                                                    <a href="javaScript:void(0);" data-id="{{$comm->id}}" class="text-danger btn btn-outline-danger" onclick="deleteComment('{{$comm->id}},{{$post->id}}')">x</a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="co-12 collapse header-clp mb-3" id="reply_view{{$comm->id}}">
                                        <form action="" id="reply{{$comm->id}}">
                                            <div class="row">
                                                <div class="col-8 ">
                                                    <input type="hidden" name="reply_for_comment" id="reply_for_comment" value="{{$comm->id}}">
                                                    <input type="text" name="reply_message" id="reply_message{{$comm->id}}" class="form-control" placeholder="Reply on comment">
                                                </div>
                                                <div class="col-4 text-right">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm" onclick="submitReply('{{$comm->id}}')">Reply</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 mb-3 mt-0" id="replyview{{$comm->id}}">

                                        @foreach($comm['all_reply'] as $reply)
                                        <div class="mb-2">
                                            Reply by : <span><strong>{{$reply->user_name}}</strong></span>
                                            <div class="row">
                                                <div class="col-8" style="word-wrap: break-word">
                                                    {{$reply->replys}}
                                                </div>
                                                <div class="col-4 text-right">
                                                    {{$reply->created_at->diffForHumans()}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                
                                @empty
                                <div class="text-center" id="nocomment-{{$post->id}}">No comments.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <li>
                        <a href="">
                            @if (is_array($post->tags) || is_object($post->tags))
                                <i class="ti-tag"></i>
                                @foreach($post->tags as $val_tag)
                                    <span>{{ucfirst($val_tag)}}</span>
                                @endforeach
                            @endif
                            
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
</div>