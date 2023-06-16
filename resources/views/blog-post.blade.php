@extends('layouts.app')
@section('head')
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/skins/ui/oxide/content.min.css"/>

@endsection
@section('page-header')
<!-- Page Header -->
<div id="post-header" class="page-header">
    <div class="background-img" style="background-image: url('@if( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-meta">
                    @foreach ($post->categories as $category)
                    <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                    @endforeach
                    <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
                </div>
                <h1>{{$post->title}}</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->
@endsection
@section('content')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post mce-content-body">

                        {!! $post->body!!}
                    </div>

                </div>

                <!-- author -->
                <div class="section-row">
                    <div class="post-author">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="@if( !filter_var($post->authorId->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( $post->authorId->avatar ) }}@else{{ $post->authorId->avatar }}@endif" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3>{{$post->authorId->name}}</h3>
                                </div>
                                <p>{{$post->authorId->title}}</p>
                                <ul class="author-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /author -->

                <!-- comments -->
                <div class="section-row">
                    <div class="section-title">
                        <h2>3 Comments</h2>
                    </div>

                    <div class="post-comments">
                        <!-- comment -->
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="/img/avatar.png" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4>John Doe</h4>
                                    <span class="time">March 27, 2018 at 8:00 am</span>
                                    <a href="#" class="reply">Reply</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                                <!-- comment -->
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="/img/avatar.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h4>John Doe</h4>
                                            <span class="time">March 27, 2018 at 8:00 am</span>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                                <!-- /comment -->
                            </div>
                        </div>
                        <!-- /comment -->

                        <!-- comment -->
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="/img/avatar.png" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4>John Doe</h4>
                                    <span class="time">March 27, 2018 at 8:00 am</span>
                                    <a href="#" class="reply">Reply</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                        <!-- /comment -->
                    </div>
                </div>
                <!-- /comments -->

                <!-- reply -->
                <div class="section-row">
                    <div class="section-title">
                        <h2>Leave a reply</h2>
                        <p>your email address will not be published. required fields are marked *</p>
                    </div>
                    <form class="post-reply">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>Name *</span>
                                    <input class="input" type="text" name="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>Email *</span>
                                    <input class="input" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>Website</span>
                                    <input class="input" type="text" name="website">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="input" name="message" placeholder="Message"></textarea>
                                </div>
                                <button class="primary-button">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /reply -->
            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">
                @include('layouts.aside-ad')
                @include('layouts.aside-most-read')
                @include('layouts.aside-featured')
                @include('layouts.aside-category')
                @include('layouts.aside-tag')
                @include('layouts.aside-archive')
            </div>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection

