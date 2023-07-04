@extends('layouts.app')

@section('title')
Tổng hợp các Prompt và hình ảnh đẹp tạo bởi MidJourney mới nhất
@endsection

@section('head')
<meta name="title" content="Tổng hợp các Prompt và hình ảnh đẹp tạo bởi MidJourney mới nhất" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index,follow" />
<meta property="fb:app_id" content="" />
<meta property="og:site_name" content="AIBlog" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:title" content="Tổng hợp các Prompt và hình ảnh đẹp tạo bởi MidJourney mới nhất" />
<meta property="og:description" content="Prompt Midjourney về các chủ đề nhân vật, cây cối, hoa quả..." />
<meta name="description" content="Prompt Midjourney về các chủ đề nhân vật, cây cối, hoa quả..." />
<meta name="keywords" content="AI, artificial intelligence, aiblog, tri tue nhan tao, chatgpt, chat gpt, midjourney mid journey, dalle, dall-e, did, d-id, prompt" />
@endsection

@section('page-header')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="page-header-breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li>MidJourney</li>
                </ul>
                <h1>MidJourney</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->
@endsection
@section('content')
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2><a href="/midjourney/prompt">Prompt mẫu</a></h2>
                </div>
            </div>
            @foreach ($prompts as $prompt)
            <!-- post -->
            <div class="col-md-4">
                <div class="post">
                    <div class="post-img" ><img class="prompt-image"
                                                src="@if($prompt->image == null) /img/default-ai.jpg @elseif( !filter_var($prompt->image, FILTER_VALIDATE_URL)){{ Voyager::image( $prompt->image ) }}@else{{ $prompt->image }}@endif"
                                                alt=""></div>
                    <div class="post-body">
                        <p class="prompt-title">{{$prompt->content}}</p>
                    </div>
                </div>
            </div>
            @if (($loop->index +1) % 3 == 0)
            <div class="clearfix visible-md visible-lg"></div>
            @endif
            <!-- /post -->
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2><a href="/midjourney/posts">Sử dụng Midjourney</a></h2>
                </div>
            </div>
            <div class="col-md-8">
                @foreach ($posts as $post)
                <!-- post -->
                <div class="col-md-12">
                    <div class="post post-row">

                        <div class="post-body">
                            <a class="post-img" href="/{{$post->slug}}.html"><img src="@if($post->image == null) /img/default-ai.jpg @elseif( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif" alt="{{$post->title}}" title="{{$post->title}}"></a>
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
                @endforeach
            </div>
            <div class="col-md-4">
                @include('layouts.aside-prompt-category')
                @include('layouts.aside-ad')
                @include('layouts.aside-category')
                @include('layouts.aside-ad')
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
        var modal = $('#myModal');
        var captionText = $('#caption');
        function showImage(){
            modal.css('display', 'block');
            $('#img01').attr('src', $(this).attr('src'));

        }
        function hideImage(){
            modal.css('display', 'none');
        }
        modal.click(function(e) {
            if (e.target !== this)
                return;
            hideImage();
        });
        $('.prompt-image').click(showImage)
        $('.close').click(hideImage);
    });




</script>
@endsection
