@extends('layouts.app')
@section('title')
Hướng dẫn sử dụng Midjourney
@endsection

@section('head')
<meta name="title" content="Hướng dẫn sử dụng Midjourney" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index,follow" />
<meta property="fb:app_id" content="" />
<meta property="og:site_name" content="AIBlog" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:title" content="Hướng dẫn sử dụng Midjourney" />
<meta property="og:description" content="Hướng dẫn sử dụng Midjourney mới nhất {{ date('Y') }}" />
<meta name="description" content="Hướng dẫn sử dụng Midjourney mới nhất {{ date('Y') }}"" />
<meta name="keywords" content="AI, artificial intelligence, aiblog, tri tue nhan tao, chatgpt, chat gpt, midjourney, mid journey, ai midjourney, dalle, dall-e, did, d-id" />
@endsection

@section('page-header')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="page-header-breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/midjourney">MidJourney</a></li>
                    <li>Sử dụng MidJourney </li>
                </ul>
                <h1>Sử dụng MidJourney</h1>
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
            <div class="col-md-8">
                <div class="row" id="posts-container">
                    @foreach ($posts as $post)

                    @if ($loop->index == 0)
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-thumb">

                            <a class="post-img" href="/{{$post->slug}}.html"><img
                                    src="@if($post->image == null) /img/default-ai.jpg @elseif( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif"
                                    alt="{{$post->title}}" title="{{$post->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @foreach ($post->categories as $category)
                                    @if($loop->index < 3)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                                    @endif
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/{{$post->slug}}.html">{{$post->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @elseif ($loop->index < 3)
                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="/{{$post->slug}}.html"><img
                                    src="@if($post->image == null) /img/default-ai.jpg @elseif( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif"
                                    alt="{{$post->title}}" title="{{$post->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @foreach ($post->categories as $category)
                                    @if($loop->index < 3)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                                    @endif
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/{{$post->slug}}.html">{{$post->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    @if ($loop->index == 2)
                    <div class="clearfix visible-md visible-lg"></div>
                    <!-- ad -->
                    @include('layouts.center-ad')
                    <!-- ad -->
                    @endif
                    @else

                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-row">
                            <a class="post-img" href="/{{$post->slug}}.html"><img
                                    src="@if($post->image == null) /img/default-ai.jpg @elseif( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif"
                                    alt="{{$post->title}}" title="{{$post->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @foreach ($post->categories as $category)
                                    @if($loop->index < 3)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                                    @endif
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/{{$post->slug}}.html">{{$post->title}}</a></h3>
                                <p>{{$post->excerpt}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @endif
                    @endforeach

                </div>
                @if(count($posts) >= 10)
                <div class="col-md-12">
                    <div class="section-row">
                        <button id="load-more-btn" class="primary-button center-block">Tiếp theo</button>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-md-4">
                @include('layouts.aside-ad')
                @include('layouts.aside-category')
                @include('layouts.aside-tag')
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@endsection

@section('footer')
<script>
    $(function() {
        var page = 2; // Starting page number for loading more posts
        var loading = false; // Variable to prevent multiple simultaneous AJAX requests
        var endOfPosts = false; // Variable to indicate if all posts have been loaded
        var slug = '{{$category->slug}}';

        function loadMorePosts() {
            if (loading || endOfPosts) {
                return; // Don't proceed if already loading or all posts have been loaded
            }

            loading = true;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/' + slug + '/load-more', // Replace with the URL of your Laravel route for loading more posts
                method: 'POST',
                data: {
                    page: page,
                },
                success: function(response) {
                    if (response.posts.length > 0) {
                        // Append the loaded posts to the container
                        $('#posts-container').append(response.posts);
                        page++; // Increment the page number for the next load
                        loading = false;

                        if (response.jsonData.current_page == response.jsonData.last_page) {
                            endOfPosts = true;
                            $('#load-more-btn').hide(); // Hide the button if all posts have been loaded
                        }
                    } else {
                        endOfPosts = true;
                        $('#load-more-btn').hide(); // Hide the button if all posts have been loaded
                    }
                },
                error: function() {
                    loading = false;
                },
            });
        }

       // Trigger the loadMorePosts function on button click
        $('#load-more-btn').click(loadMorePosts);
    });
</script>
@endsection
