@extends('layouts.app')
@section('css')
@endsection

<style>
    .modal-open .modal {
        background: transparent;
    }

    .modal.show #modal-dialog {
        margin-right: 30px;
    }

    .select2-dropdown.increasezindex {
        z-index: 99999;
    }

    a:link {
        text-decoration: none;
    }

    .scrollable {
        scrollbar-color: #6969dd #e0e0e0;
        scrollbar-width: thin;
    }

    .scrollable::-webkit-scrollbar-thumb {
        background-image: linear-gradient(180deg, #D0368A 0%, #708AD4 99%);
        box-shadow: inset 2px 2px 5px 0 rgba(#fff, 0.5);
        border-radius: 100px;
    }
</style>

@section('content')
<div class="pw-body">
    <div class="pw-left">
        <a class="btn btn-outline-danger" onclick="window.history.back()"> Back</a>
        <div class="iContainer" id="mainDiv">
            <div class="postsDisplay">
                <div class="col-lg-12 col-md-12 col-sm-12 embeded_post ">
                    {{date('d-M-Y',strtotime($post_data->created_at))}} <br>
                    @if(!empty($post_data->title))
                    <h1>{{ucfirst($post_data->title)}}</h1>
                    @endif
                    @if(!empty($post_data->sub_title))
                    <h4>{{ucfirst($post_data->sub_title)}}</h4>
                    @endif


                    @if(!empty($post_data->title))
                    {!! $post_data['post_content'] !!}
                    @endif
                    @if(count($post_data->post_image) == 1)
                    <div class="light_gallery gitem" id="lightGallery">
                        @foreach($post_data->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post_data->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">

                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                    @if(count($post_data->post_image) == 2)
                    <div class="light_gallery gitem2" id="lightGallery">
                        @foreach($post_data->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post_data->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">

                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                    @if(count($post_data->post_image) == 3)
                    <div class="light_gallery gitem3" id="lightGallery">
                        @foreach($post_data->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post_data->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">

                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                    @if(count($post_data->post_image) == 4)
                    <div class="light_gallery gitem4" id="lightGallery">
                        @foreach($post_data->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post_data->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">

                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                    @if(count($post_data->post_image) > 5)
                    <div class="light_gallery gitem5" id="lightGallery">
                        @foreach($post_data->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post_data->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">
                                <span>+{{count($post_data->post_image)-5}}</span>
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
                                <a href="javaScript:void(0);" onclick="goolgelogin()"
                                    id="likeremove{{$post_data['id']}}" title="like"
                                    class="likeremove{{$post_data['id']}} ">
                                    <i class="ti-heart"></i> <span> {{$post_data->likes}}</span>
                                </a>
                                @else
                                <a href="javaScript:void(0);" id="datashow{{$post_data['id']}}"
                                    class="text-danger datashow{{$post_data['id']}} " title="liked !"
                                    style="display: none">
                                    <i class="ti-heart"></i>
                                    <span id="datalike{{$post_data['id']}}" class="datalike{{$post_data['id']}}">
                                        {{$post_data->likes}}</span>
                                </a>
                                @if($post_data->likeExist)
                                <a href="javaScript:void(0);" id="likeshow{{$post_data['id']}}"
                                    class="text-danger likeshow{{$post_data['id']}}" title="liked !">
                                    <i class="ti-heart"></i> <span> {{$post_data->likes}}</span>
                                </a>
                                @else
                                <a href="javaScript:void(0);" @if(Auth::user()) onclick="likes('{{$post_data['id']}}')"
                                    @else onclick="goolgelogin()" @endif id="likeremove{{$post_data['id']}}"
                                    title="like" class="likeremove{{$post_data['id']}}">
                                    <i class="ti-heart"></i> <span> {{$post_data->likes}}</span>
                                </a>
                                @endif

                                @endif
                            </li>

                            <li>
                                <a href="javaScript:void(0);" class="comment_icon" data-id="{{$post_data['id']}}"
                                    data-toggle="collapse" data-target="#comments_view{{$post_data['id']}}">

                                    <i class="ti-comment"></i>
                                    <span id="commentCount-{{$post_data->id}}">{{$post_data['total_comment']}}
                                    </span>
                                </a>
                                <input type="hidden" id="commentCountbox{{$post_data->id}}"
                                    value="{{$post_data['total_comment']}}">
                            </li>
                            <li><a href="">
                                    @if (is_array($post_data->categ) || is_object($post_data->categ))
                                    <i class="ti-flag-alt"></i>
                                    @foreach($post_data->categ as $val_tag)
                                    <span>{{ucfirst($val_tag)}}</span> &nbsp;
                                    @endforeach
                                    @endif

                                </a>
                            </li>
                            <div id="comments_view{{$post_data['id']}}" class="collapse header-clp mt-5 mb-5">
                                <div class="mt-3">
                                    @if(!empty(Auth::user()))

                                    <form action="" id="commet_form{{$post_data['id']}}" class="commet_form"
                                        method="POST">
                                        <div class="row mb-2">
                                            <div class="col-10">
                                                <input type="hidden" name="post_new_id" id="post_new_id">
                                                <input type="text" name="" id="comment_message{{$post_data['id']}}"
                                                    class="form-control" placeholder="Write comments">
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-outline-primary"
                                                    onClick="submitForm(`{{$post_data->id}}`)">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                    <div id="commentId-{{$post_data->id}}" class="comment_history">
                                        @forelse ($post_data['all_comments'] as $comm)
                                        <div class="col-12 mb-3" style=""
                                            id="comment_row{{$post_data->id}}{{$comm->id}}">
                                            {{$comm->user_name}} <br>
                                            <div class="row">
                                                <div class="col-6" style="word-wrap: break-word">
                                                    <b>{{$comm->comments}}</b>
                                                </div>
                                                <div class="col-2">
                                                    @if(Auth::user())
                                                    @if(Auth::user()->role=='owner')
                                                    <a data-toggle="collapse" data-target="#reply_view{{$comm['id']}}"
                                                        href="javaScript:void(0);" class="comment_icon "
                                                        style="background: transparent;color:gray" title="Reply">
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
                                                    <a href="javaScript:void(0);" data-id="{{$comm->id}}"
                                                        class="text-danger btn btn-outline-danger"
                                                        onclick="deleteComment('{{$comm->id}},{{$post_data->id}}')">x</a>
                                                </div>
                                                @endif
                                                @endif
                                            </div>
                                            <div class="co-12 collapse header-clp mb-3" id="reply_view{{$comm->id}}">
                                                <form action="" id="reply{{$comm->id}}">
                                                    <div class="row">
                                                        <div class="col-8 ">
                                                            <input type="hidden" name="reply_for_comment"
                                                                id="reply_for_comment" value="{{$comm->id}}">
                                                            <input type="text" name="reply_message"
                                                                id="reply_message{{$comm->id}}" class="form-control"
                                                                placeholder="Reply on comment">
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <button type="submit" class="btn btn-outline-primary btn-sm"
                                                                onclick="submitReply('{{$comm->id}}')">Reply</button>
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
                                        <div class="text-center" id="nocomment-{{$post_data->id}}">No comments.</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <li>
                                <a href="">
                                    @if (is_array($post_data->tags) || is_object($post_data->tags))
                                    <i class="ti-tag"></i>
                                    @foreach($post_data->tags as $val_tag)
                                    <span>{{ucfirst($val_tag)}}</span>
                                    @endforeach
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (count($data) > 0)
    <div class="pw-right">
        <div class="pwRightInr">
            @foreach ($data as $data)
            @if ($data['section_name'] == 'Intro')
            <div class="helloSec">
                <div class="iContainer">

                    <div class="hsLeft">
                        <p>
                            @foreach ($data['section_item'] as $item)
                            @if(!empty(Auth::user()->id))
                            @if(Auth::user()->role=='owner')
                            @if ($item['section_item_name'] == 'Greeting')
                        <form action="" id="greating_form">
                            <input type="hidden" name="greating_id" id="greating_id" value="{{$item['id']}}">
                            <input type="text" name="section_name" id="section_name"
                                value="{{ $item['section_item_value'] }}">
                        </form>
                        @endif
                        @else
                        @if ($item['section_item_name'] == 'Greeting')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endif
                        @else
                        @if ($item['section_item_name'] == 'Greeting')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endif
                        @endforeach

                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Signature')
                        @if(!empty(Auth::user()->id))
                        @if(Auth::user()->role=='owner')
                        <form action="">
                            <input type="hidden" name="change_signature_id" id="change_signature_id"
                                value="{{$item['id']}}">
                            <input type="file" name="change_signature" id="change_signature" class="">
                            <span class="text-danger text-left">
                                <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" id="imgPreview" />
                            </span>
                        </form>
                        @else
                        <span>
                            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        </span>
                        @endif
                        @else
                        <span>
                            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        </span>
                        @endif
                        @endif
                        @endforeach
                        @foreach ($data['section_item'] as $item)
                        @if(!empty(Auth::user()->id))
                        @if(Auth::user()->role=='owner')
                        @if ($item['section_item_name'] == 'Degree')
                        <form action="">
                            <input type="hidden" name="section_descr_id" id="section_descr_id" value="{{$item['id']}}">
                            <textarea name="section_descr" id="section_descr" cols="30"
                                rows="5">{{ $item['section_item_value'] }}</textarea>
                        </form>
                        @endif
                        @else
                        @if ($item['section_item_name'] == 'Degree')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endif
                        @else
                        @if ($item['section_item_name'] == 'Degree')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endif

                        @endforeach
                        </p>
                        <div class="socialFooter">
                            <ul>
                                <li>
                                    <a href=""><i class="ti-twitter-alt"></i></a>
                                    @foreach ($data['section_item'] as $item)
                                    @if(Auth::user())
                                    @if(Auth::user()->role=='owner')
                                    <form action="">
                                        @if ($item['section_item_name'] == 'Twitter_Link')
                                        <input type="hidden" name="twitter_id" id="twitter_id" value="{{$item['id']}}">
                                        <input type="url" name="twitter_link" id="twitter_link" class="form-control"
                                            value="{{$item['section_item_value']}}">
                                        @endif
                                    </form>
                                    @endif
                                    @endif
                                    @endforeach
                                </li>
                                <li>
                                    <a href=""><i class="ti-facebook"></i></a>
                                    @foreach ($data['section_item'] as $item)
                                    @if(Auth::user())
                                    @if(Auth::user()->role=='owner')
                                    <form action="">
                                        @if ($item['section_item_name'] == 'Facebook_Link')
                                        <input type="hidden" name="facebook_id" id="facebook_id"
                                            value="{{$item['id']}}">
                                        <input type="url" name="facebook_link" id="facebook_link" class="form-control"
                                            value="{{$item['section_item_value']}}">
                                        @endif
                                    </form>
                                    @endif
                                    @endif
                                    @endforeach
                                </li>
                                <li>
                                    <a href=""><i class="ti-linkedin"></i></a>
                                    @foreach ($data['section_item'] as $item)
                                    @if(Auth::user())
                                    @if(Auth::user()->role=='owner')
                                    <form action="">
                                        @if ($item['section_item_name'] == 'Linkdin_Link')
                                        <input type="hidden" name="linkdin_id" id="linkdin_id" value="{{$item['id']}}">
                                        <input type="url" name="linkdin_link" id="linkdin_link" class="form-control"
                                            value="{{$item['section_item_value']}}">
                                        @endif
                                    </form>
                                    @endif
                                    @endif
                                    @endforeach
                                </li>
                                <li>
                                    <a href=""><i class="ti-youtube"></i></a>
                                    @foreach ($data['section_item'] as $item)
                                    @if(Auth::user())
                                    @if(Auth::user()->role=='owner')
                                    <form action="">
                                        @if ($item['section_item_name'] == 'Youtube_Link')
                                        <input type="hidden" name="youtube_id" id="youtube_id" value="{{$item['id']}}">
                                        <input type="url" name="youtube_link" id="youtube_link" class="form-control"
                                            value="{{$item['section_item_value']}}">
                                        @endif
                                    </form>
                                    @endif
                                    @endif
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Profile Image')
                    <div class="hsRight">
                        @if(Auth::user())
                        @if(!empty(Auth::user()->role=='owner'))
                        <a href="javaScript:void(0);" class="btn btn-sm btn-outline-light" data-toggle="modal"
                            data-target="#profilemodal">Change Profile</a>
                        <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" id="profileimgPreview" />
                        @else
                        <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        @endif
                        @else
                        <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
            @endif
            @if ($data['section_name'] == 'Biography')
            <div class="bioSec">
                <div class="iContainer">
                    <h3>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Title')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endforeach
                    </h3>
                    <p>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Description')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endforeach
                    </p>
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Read More Link')
                    {{-- <a href="{{ $item['section_item_value'] }}" class="rmore">Know More</a> --}}
                    <a href="{{ route('biographyDetails') }}" class="rmore">Know More</a>

                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @if ($data['section_name'] == 'My Book')
            <div class="myProSec">
                <div class="iContainer">
                    <div class="blockHead">
                        <div class="bhLeft">
                            <div class="titleTag">
                                @foreach ($data['section_item'] as $item)
                                @if ($item['section_item_name'] == 'Section Title')
                                {{ $item['section_item_value'] }}
                                @endif
                                @endforeach
                            </div>
                            <h4>
                                @foreach ($data['section_item'] as $item)
                                @if ($item['section_item_name'] == 'Section Sub Title')
                                {{ $item['section_item_value'] }}
                                @endif
                                @endforeach
                            </h4>
                            <p class="titleDesco">
                                @foreach ($data['section_item'] as $item)
                                @if ($item['section_item_name'] == 'Section Description')
                                {{ $item['section_item_value'] }}
                                @endif
                                @endforeach
                            </p>
                        </div>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Image')
                        <div class="bhRight">
                            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <h5>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Title')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endforeach
                    </h5>
                    <p>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Description')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endforeach
                    </p>
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Buy Now Link')
                    <a href="{{ $item['section_item_value'] }}" class="rmore">Buy Now</a>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
            <div class="ctaSec">
                <div class="iContainer">
                    <h4>Skip to the good part...</h4>
                    <ul class="ctaList">
                        <li><a href="">
                                <div class="ctaImage"><img src="{{ asset('images/cta1.jpg') }}" /></div>
                                <div class="ctaMatr"><i class="ti-twitter"></i>
                                    <h5> My Tweets</h5>
                                </div>
                            </a>
                        </li>
                        <li><a href="">
                                <div class="ctaImage"><img src="{{ asset('images/cta2.jpg') }}" /></div>
                                <div class="ctaMatr"><i class="ti-write"></i>
                                    <h5> Recent Posts</h5>
                                </div>
                            </a>
                        </li>
                        <li><a href="">
                                <div class="ctaImage"><img src="{{ asset('images/cta3.jpg') }}" /></div>
                                <div class="ctaMatr"><i class="ti-face-smile"></i>
                                    <h5> Social Events</h5>
                                </div>
                            </a>
                        </li>
                        <li><a href="">
                                <div class="ctaImage"><img src="{{ asset('images/cta4.jpg') }}" /></div>
                                <div class="ctaMatr"><i class="ti-marker-alt"></i>
                                    <h5>My Book</h5>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@if(!Auth::user())
<div class="modal fade" id="loginwithgooglemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign in with Google</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemodal()"
                    id="googleclosebutton">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ route('redirectToGoogle') }}"
                    class="btn btn-outline-primary btn-block btn-lg google">Continue with &nbsp;<i
                        class="fa-brands fa-google-plus-g"></i> &nbsp; </a>
            </div>

        </div>
    </div>
</div>
@endif

@endsection

@section('js')

<script>
    function goolgelogin(){
        $('#loginwithgooglemodal').modal('show');
    }

    function likes(postid){
            // alert(postid);
            var postid = postid;
            $.ajax({
            type: "GET",
            url: "{{route('likes')}}",
            data: {postid:postid},
            success: function(res){
               $('.likeshow'+postid).hide();
               $('.likeremove'+postid).hide();
               $('#datalike'+postid).html(res);
               $('#datashow'+postid).show();
           },
        });
    }

  
    function deleteComment(ids){
        
        
        var ids = ids.split(',');
        var post_id = ids[1] ;
        var comment_id = ids[0] ;
        var counter = $('#commentCountbox'+post_id).val();
        var desc = parseInt(counter) - 1 ;

        $('#commentCount-'+post_id).html(desc);
        $('#commentCountbox'+post_id).val(desc);




        $.ajax({
            type: "GET",
            url: "{{route('deletesComment')}}",
            data: {comment_id:comment_id},
            success: function(res){
               $('#comment_row'+post_id+comment_id).hide();
             
           },
        });
    }

</script>

<script>
    $(".comment_icon").click(function (event) {
            var id = $(this).data('id');
            var first_value = $('#commentCount-'+id).text();
            var value = parseInt(first_value);
            var counter = $('#commentCountbox'+id).val(value);
            $('#post_new_id').val(id);
        });

    function submitForm(id){
            var counter = $('#commentCountbox'+id).val();
            var incr = parseInt(counter) + 1 ;

            $('#commentCount-'+id).html(incr);
            $('#commentCountbox'+id).val(incr);
            
            $("#commet_form"+id).submit(function (event) {
            var formData = {
                "_token": "{{ csrf_token() }}",
                comment_message: $("#comment_message"+id).val(),
                post_id: $("#post_new_id").val(),
            };
           
            $.ajax({
                type: "POST",
                url: "{{route('sendComment')}}",
                data: formData,
                dataType: "json",
                encode: true,
                success: function(res){
                if(res.success==true){ 
                        $('#commentId-'+id).prepend(res.data);
                        $('#comment_message'+id).val('');
                        $('#nocomment-'+id).hide();
                    }
                    
                },
            });
            event.preventDefault();
            event.stopImmediatePropagation();
            });
        }

        function submitReply(id){
            $("#reply"+id).submit(function (event) {
            var formData = {
                "_token": "{{ csrf_token() }}",
                reply_message: $("#reply_message"+id).val(),
                comment_id: id,
            };
            // alert(formData.reply_message);
            // alert(formData.comment_id);
           
            $.ajax({
                type: "POST",
                url: "{{route('sendReply')}}",
                data: formData,
                dataType: "json",
                encode: true,
                success: function(res){
                if(res.success==true){ 
                        $('#replyview'+id).prepend(res.data);
                        $('#reply_message'+id).val('');
                    }
                    
                },
            });
            event.preventDefault();
            event.stopImmediatePropagation();
            });
        }
</script>

@endsection