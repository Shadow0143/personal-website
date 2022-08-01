@extends('layouts.app')
@section('css')
    <link href="{{ asset('blog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('blog/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('blog/assets/css/owl.css') }}">
    <style>
        .blog-container{
            margin-bottom:30px; 
        }
    </style>
@endsection
@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Read our Blog</h1>
                    <span>Lorem ipsum dolor sit amet consectetur</span>
                </div>
            </div>
        </div>
    </div>
    <div class="single-services">
        <div class="container">
            <div class="row">
                <div class="col-md-6 blog-container">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="{{ asset('blog/assets/images/blog-image-1-940x460.jpg') }}" alt="">
                            <h4><a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a></h4>
                            <div style="margin-bottom:10px;">
                                <span>John Doe &nbsp;|&nbsp; 27.07.2020 10:10 &nbsp;|&nbsp; 15 comments</span>
                            </div>
                            <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in, tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante, quis posuere nibh vestibulum sit amet.</p>
                            <br>
                            <div>
                                <a href="blog-details.html" class="filled-button">Continue Reading</a>
                            </div>
                        </article>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="{{ asset('blog/assets/images/blog-image-2-940x460.jpg') }}" alt="">
                            <h4><a href="blog-details.html">Mauris lobortis quam id dictum dignissim</a></h4>
                            <div style="margin-bottom:10px;">
                                <span>John Doe &nbsp;|&nbsp; 27.07.2020 10:10 &nbsp;|&nbsp; 15 comments</span>
                            </div>
                            <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in, tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante, quis posuere nibh vestibulum sit amet</p>
                            <br>
                            <div>
                                <a href="blog-details.html" class="filled-button">Continue Reading</a>
                            </div>
                        </article>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="{{ asset('blog/assets/images/blog-image-1-940x460.jpg') }}" alt="">
                            <h4><a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a></h4>
                            <div style="margin-bottom:10px;">
                                <span>John Doe &nbsp;|&nbsp; 27.07.2020 10:10 &nbsp;|&nbsp; 15 comments</span>
                            </div>
                            <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in, tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante, quis posuere nibh vestibulum sit amet.</p>
                            <br>
                            <div>
                                <a href="blog-details.html" class="filled-button">Continue Reading</a>
                            </div>
                        </article>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="{{ asset('blog/assets/images/blog-image-2-940x460.jpg') }}" alt="">
                            <h4><a href="blog-details.html">Mauris lobortis quam id dictum dignissim</a></h4>
                            <div style="margin-bottom:10px;">
                                <span>John Doe &nbsp;|&nbsp; 27.07.2020 10:10 &nbsp;|&nbsp; 15 comments</span>
                            </div>
                            <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in, tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante, quis posuere nibh vestibulum sit amet</p>
                            <br>
                            <div>
                                <a href="blog-details.html" class="filled-button">Continue Reading</a>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <br>
    <br>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Copyright © 2020 BlueHorse
                    </p>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::check())
        <button class="open-button" onclick="openForm()" data-toggle="modal" data-target="#myModal">Post</button>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('createPost') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Create Post</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body-left">
                                <img src="{{ asset('images/profile.jpg') }}">
                            </div>
                            <div class="modal-body-right">
                                <a href="">Kamal Kalra</a>
                            </div>
                        </div>
                        <div class="modal-body_text">
                            <textarea rows="4" cols="50" name="post" id="post" placeholder="Describe yourself here..."></textarea>
                        </div>
                        <div class="modal-body_post">
                            <span class="post_text">Add Your Post</span>
                            <div class="post_icon">
                                <ul>
                                    <li><a href=""><i class="fa fa-picture-o img_icon" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-tag tag_icon" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-smile-o emoji_icon"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer_btn">
                            <input style="width: 80%; margin: 20px 49px;" type="submit" value="Publish">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script src="{{ asset('blog/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('blog/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('blog/assets/js/custom.js') }}"></script>
    <script src="{{ asset('blog/assets/js/owl.js') }}"></script>
    <script src="{{ asset('blog/assets/js/slick.js') }}"></script>
    <script src="{{ asset('blog/assets/js/accordions.js') }}"></script>
    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0;

        function clearField(t) {
            if (!cleared[t.id]) {
                cleared[t.id] = 1;
                t.value = '';
                t.style.color = '#fff';
            }
        }
    </script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }
        </script>
@endsection