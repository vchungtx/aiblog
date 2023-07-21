@extends('layouts.app')
@section('title')
{{$post->title}}
@endsection

@section('head')
<meta name="title" content="{{$post->title}}" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index,follow" />
<meta property="fb:app_id" content="" />
<meta property="og:site_name" content="AIBlog" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:title" content="{$post->title}}" />
<meta property="og:description" content="{{$post->excerpt}}" />
<meta name="description" content="{{$post->excerpt}}"" />
<meta name="keywords" content="AI, artificial intelligence, aiblog, tri tue nhan tao, chatgpt, chat gpt, midjourney, mid journey, ai midjourney, chat openai, openai chat, chatgpt openai, ai online, chat gpt online, dalle, dall-e, did, d-id, {{Str::ascii($post->title)}}" />

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/skins/ui/oxide/content.min.css"/>
@endsection

@section('page-header')
<!-- Page Header -->
<div id="post-header" class="page-header">
    <div class="background-img" style="background-image: url('@if($post->image == null) /img/default-ai.jpg @elseif( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-meta">
                    @foreach ($post->categories as $category)
                    <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
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
                                <img class="media-object" src="@if($post->image == null) /img/default-ai.jpg @elseif( !filter_var($post->authorId->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( $post->authorId->avatar ) }}@else{{ $post->authorId->avatar }}@endif" alt="">
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
                <!-- reply -->

                <div class="section-row">
                    <div class="section-title">
                        <h2>Gửi comment</h2>
                    </div>
                    <form class="post-reply" action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="input" name="content" placeholder="Nội dung"></textarea>
                                </div>
                                <button class="primary-button" type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- /reply -->

                <!-- comments -->
                <div class="section-row">
                    <div class="section-title">
                        <h2>{{count($post->comments)}} Comments</h2>
                    </div>

                    <div class="post-comments">
                        <!-- comment -->
                        @foreach($post->comments as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="@if( !filter_var($comment->userId->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( $comment->userId->avatar ) }}@else{{ $comment->userId->avatar }}@endif" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4>{{$comment->userId->name}}</h4>
                                    <span class="time">{{$comment->created_at}}</span>
                                    <a href="#" comment-id="{{ $comment->id }}" class="reply" >Reply</a>
                                </div>
                                <p>{{$comment->content}}</p>
                                <form class="post-reply"  style="display: none" action="{{ route('comments.store') }}" method="POST" id="reply-box-{{ $comment->id }}">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="reply_comment_id" value="{{ $comment->id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="input" name="content" placeholder="Nội dung"></textarea>
                                            </div>
                                            <button class="primary-button" type="submit">Submit a reply</button>
                                        </div>
                                    </div>
                                </form>
                                @foreach ($comment->replies as $reply)
                                <!-- reply comment -->
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="@if( !filter_var($reply->userId->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( $reply->userId->avatar ) }}@else{{ $reply->userId->avatar }}@endif" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h4>{{$reply->userId->name}}</h4>
                                            <span class="time">{{$reply->created_at}}</span>

                                        </div>
                                        <p>{{$reply->content}}</p>
                                    </div>
                                </div>
                                <!-- /comment -->
                                @endforeach

                            </div>
                        </div>
                        @endforeach

                        </div>
                </div>
                <!-- /comments -->


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

@section('footer')
<script>
    $(document).ready(function() {
        $('.reply').click(function() {
            var commentId = $(this).attr('comment-id');
            $('#reply-box-' + commentId).toggle();
            return false;
        });
        $('.input').click(function() {
        @auth
        // If logged in, do nothing or perform desired action
        @else
            // If not logged in, show the login form
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('.login-area').show();
        @endauth
        });
    });
</script>
@endsection
