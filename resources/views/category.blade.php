@extends('layouts.app')
@section('page-header')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="page-header-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>{{$category->name}}</li>
                </ul>
                <h1>{{$category->name}}</h1>
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
                <div class="row">
                    @foreach ($posts as $post)

                    @if ($loop->index == 0)
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-thumb">

                            <a class="post-img" href="/ai-news/{{$post->slug}}"><img src="@if( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif" alt="{{$post->title}}" title="{{$post->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                                    <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/ai-news/{{$post->slug}}">{{$post->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @elseif ($loop->index < 3)
                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="/ai-news/{{$post->slug}}"><img src="@if( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif" alt="{{$post->title}}" title="{{$post->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                                    <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/ai-news/{{$post->slug}}">{{$post->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    @if ($loop->index == 2)
                    <div class="clearfix visible-md visible-lg"></div>
                    <!-- ad -->
                    <div class="col-md-12">
                        <div class="section-row">
                            <a href="#">
                                <img class="img-responsive center-block" src="/img/ad-2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- ad -->
                    @endif
                    @else

                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-row">
                            <a class="post-img" href="/ai-news/{{$post->slug}}"><img src="@if( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif" alt="{{$post->title}}" title="{{$post->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                                    <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/ai-news/{{$post->slug}}">{{$post->title}}</a></h3>
                                <p>{{$post->excerpt}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @endif
                    @endforeach

                    <div class="col-md-12">
                        <div class="section-row">
                            <button class="primary-button center-block">Load More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @include('layouts.aside-ad')
                @include('layouts.aside-most-read')
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

