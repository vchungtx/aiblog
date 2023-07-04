@extends('layouts.app')

@section('title')
AIBlog | Trí tuệ nhân tạo| ChatGPT | Midjourney | D-ID | DALL-E
@endsection

@section('head')
<meta name="title" content="AIBlog | Trí tuệ nhân tạo| ChatGPT | Midjourney | D-ID | DALL-E" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index,follow" />
<meta property="fb:app_id" content="" />
<meta property="og:site_name" content="AIBlog" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:title" content="AIBlog | Trí tuệ nhân tạo| ChatGPT | Midjourney | D-ID | DALL-E" />
<meta property="og:description" content="Tổng hợp những tin tức, kiến thức, và cách sử dụng các công cụ trí tuệ nhân tạo ChatGPT, Midjourney, D-ID, DALL-E ..." />
<meta name="description" content="Tổng hợp những tin tức, kiến thức, và cách sử dụng các công cụ trí tuệ nhân tạo ChatGPT, Midjourney, D-ID, DALL-E ..." />
<meta name="keywords" content="AI, artificial intelligence, aiblog, tri tue nhan tao, chatgpt, chat gpt, midjourney, mid journey, ai midjourney, chat openai, openai chat, chatgpt openai, ai online, chat gpt online, dalle, dall-e, did, d-id," />
@endsection

@section('content')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach ($featurePosts as $featurePost)
            @if ($loop->index < 2)
            <!-- post -->
            <div class="col-md-6">
                <div class="post post-thumb">
                    <a class="post-img" href="/{{$featurePost->slug}}.html"><img src="@if($featurePost->image == null) /img/default-ai.jpg @elseif( !filter_var($featurePost->image, FILTER_VALIDATE_URL)){{ Voyager::image( $featurePost->image ) }}@else{{ $featurePost->image }}@endif" alt="{{$featurePost->title}}" title="{{$featurePost->title}}"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            @foreach ($featurePost->categories as $category)
                            @if($loop->index < 3)
                            <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                            @endif
                            @endforeach
                            <span class="post-date">{{ date('d/m/Y', strtotime($featurePost->created_at))}} </span>
                        </div>
                        <h3 class="post-title"><a href="/{{$featurePost->slug}}.html">{{$featurePost->title}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post -->
            @endif
            @endforeach

        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Bài viết mới nhất</h2>
                </div>
            </div>
            @foreach ($recentPosts as $recentPost)
            @if ($loop->index < 6)
            <!-- post -->
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="/{{$recentPost->slug}}.html"><img src="@if($recentPost->image == null) /img/default-ai.jpg @elseif( !filter_var($recentPost->image, FILTER_VALIDATE_URL)){{ Voyager::image( $recentPost->image ) }}@else{{ $recentPost->image }}@endif" alt="{{$recentPost->title}}" title="{{$recentPost->title}}"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            @foreach ($recentPost->categories as $category)
                            @if($loop->index < 3)
                            <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                            @endif
                            @endforeach
                            <span class="post-date">{{ date('d/m/Y', strtotime($recentPost->created_at))}}</span>
                        </div>
                        <h3 class="post-title"><a href="/{{$recentPost->slug}}.html">{{$recentPost->title}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post -->
            @endif
            @if ($loop->index == 2)
            <div class="clearfix visible-md visible-lg"></div>
            @endif
            @endforeach
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach ($recentPosts as $recentPost)
                    @if ($loop->index == 6)
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-thumb">
                            <a class="post-img" href="/{{$recentPost->slug}}.html"><img src="@if($recentPost->image == null) /img/default-ai.jpg @elseif( !filter_var($recentPost->image, FILTER_VALIDATE_URL)){{ Voyager::image( $recentPost->image ) }}@else{{ $recentPost->image }}@endif" alt="{{$recentPost->title}}" title="{{$recentPost->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @foreach ($recentPost->categories as $category)
                                    @if($loop->index < 3)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                                    @endif
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($recentPost->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/{{$recentPost->slug}}.html">{{$recentPost->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @elseif ($loop->index > 6)
                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="/{{$recentPost->slug}}.html"><img src="@if($recentPost->image == null) /img/default-ai.jpg @elseif( !filter_var($recentPost->image, FILTER_VALIDATE_URL)){{ Voyager::image( $recentPost->image ) }}@else{{ $recentPost->image }}@endif" alt="{{$recentPost->title}}" title="{{$recentPost->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">

                                    @foreach ($recentPost->categories as $category)
                                    @if($loop->index < 3)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                                    @endif
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($recentPost->created_at))}}  </span>
                                </div>
                                <h3 class="post-title"><a href="/{{$recentPost->slug}}.html">{{$recentPost->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @if ($loop->index == 8 || $loop->index == 10)
                    <div class="clearfix visible-md visible-lg"></div>
                    @endif
                    @endif
                    @endforeach

                </div>
            </div>
            <div class="col-md-4">
            @include('layouts.aside-most-read')
            @include('layouts.aside-featured')
            @include('layouts.aside-ad')
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Tiêu điểm</h2>
                </div>
            </div>
            @foreach ($featurePosts as $featurePost)

            <!-- post -->
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="/{{$featurePost->slug}}.html"><img src="@if($featurePost->image == null) /img/default-ai.jpg @elseif( !filter_var($featurePost->image, FILTER_VALIDATE_URL)){{ Voyager::image( $featurePost->image ) }}@else{{ $featurePost->image }}@endif" alt="{{$featurePost->title}}" title="{{$featurePost->title}}"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            @foreach ($featurePost->categories as $category)
                            @if($loop->index < 3)
                            <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                            @endif
                            @endforeach
                            <span class="post-date">{{ date('d/m/Y', strtotime($featurePost->created_at))}} </span>
                        </div>
                        <h3 class="post-title"><a href="/{{$featurePost->slug}}.html">{{$featurePost->title}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post -->

            @endforeach

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Được quan tâm</h2>
                        </div>
                    </div>
                    @foreach ($mostReadPosts as $mostReadPost)
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-row">

                            <div class="post-body">
                                <a class="post-img" href="/{{$mostReadPost->slug}}.html"><img src="@if($mostReadPost->image == null) /img/default-ai.jpg @elseif( !filter_var($mostReadPost->image, FILTER_VALIDATE_URL)){{ Voyager::image( $mostReadPost->image ) }}@else{{ $mostReadPost->image }}@endif" alt="{{$mostReadPost->title}}" title="{{$mostReadPost->title}}"></a>
                                <div class="post-meta">
                                    @foreach ($mostReadPost->categories as $category)
                                    @if($loop->index < 3)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/{{$category->slug}}">{{$category->name}}</a>
                                    @endif
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($mostReadPost->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/{{$mostReadPost->slug}}.html">{{$mostReadPost->title}}</a></h3>
                                <p>{{$mostReadPost->excerpt}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @endforeach




<!--                    <div class="col-md-12">-->
<!--                        <div class="section-row">-->
<!--                            <button class="primary-button center-block">Load More</button>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
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
