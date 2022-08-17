@extends('layouts.app')
@section('css')
@endsection

<style>
    .modal-open .modal{
        background: transparent;
    }
    .modal.show #modal-dialog{
        margin-right: 30px;
    }

    .select2-dropdown.increasezindex {
    z-index:99999;
    }

    a:link  {
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
                <div lass="col-lg-12 col-md-12 col-sm-12  ">
                    <div class="header embeded_post text-center">
                        <h1> BIOGRAPHY</h1>
                    </div>
                    <div class="body">
                        <h4>
                            I live in Faridabad, with my beautiful wife and two wonderful kids. I proudly call myself an “Intrapreneur”, what does it mean? Well, it means, that I have been an on the job Entrepreneur for last 15 years. I love the process of making processes.
                        </h4>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-6">
                                <h2>MY BOOk</h2>
                                <h5>
                                    <span class="text-primary">Leap Ahead</span>
                                </h5>
                                <p>
                                    A framework in Operational Excellence in business.
                                </p>
                            </div>
                            <div class="col-4">
                                @if (count($data) > 0)
                                    @foreach ($data as $data2)
                                        @if ($data2['section_name'] == 'My Book')
                                            @foreach ($data2['section_item'] as $items)
                                                @if ($items['section_item_name'] == 'Image')
                                                    <div class="bhRight">
                                                        <img src="{{ asset('package') }}/{{ $items['section_item_value'] }}" />
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-12">
                        <h5> SUMMARY </h5>
                        <p>
                            Timeless principles to build excellence in business operations. You will learn ideas and techniques to not only improve your business but also to help you transform your life. Fragments of this framework can be seen in the lives of every successful human being, in religions and even in literature throughout the centuries. 

                        </p>

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
                                                            <input type="text" name="section_name" id="section_name" value="{{ $item['section_item_value'] }}">
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
                                                            <input type="hidden" name="change_signature_id" id="change_signature_id" value="{{$item['id']}}">
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
                                                        <textarea name="section_descr" id="section_descr" cols="30" rows="5">{{ $item['section_item_value'] }}</textarea>
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
                                                                    <input type="url" name="twitter_link" id="twitter_link" class="form-control" value="{{$item['section_item_value']}}">
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
                                                                    <input type="hidden" name="facebook_id" id="facebook_id" value="{{$item['id']}}">
                                                                    <input type="url" name="facebook_link" id="facebook_link" class="form-control" value="{{$item['section_item_value']}}">
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
                                                                    <input type="url" name="linkdin_link" id="linkdin_link" class="form-control" value="{{$item['section_item_value']}}">
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
                                                                    <input type="url" name="youtube_link" id="youtube_link" class="form-control" value="{{$item['section_item_value']}}">
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
                                                    <a href="javaScript:void(0);" class="btn btn-sm btn-outline-light"  data-toggle="modal" data-target="#profilemodal" >Change Profile</a>
                                                <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" id="profileimgPreview" />
                                                @else
                                                <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}"/>
                                                @endif
                                            @else
                                            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}"/>
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
                                <a href="javaScript:void(0);" class="rmore" return false" id="knowmorebtn">Know More</a>

                                   
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


@endsection

@section('js')



@endsection