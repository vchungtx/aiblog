@extends('layouts.app')
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
                    <a class="post-img" href="/ai-news/{{$featurePost->slug}}"><img src="/storage/{{$featurePost->image}}" alt="{{$featurePost->title}}" title="{{$featurePost->title}}"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            @foreach ($featurePost->categories as $category)
                            <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                            @endforeach
                            <span class="post-date">{{ date('d/m/Y', strtotime($featurePost->created_at))}} </span>
                        </div>
                        <h3 class="post-title"><a href="/ai-news/{{$featurePost->slug}}">{{$featurePost->title}}</a></h3>
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
                    <h2>Recent Posts</h2>
                </div>
            </div>
            @for ($i = 0; $i < 6; $i++)
            <!-- post -->
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="/ai-news/{{$recentPosts[$i]->slug}}"><img src="/storage/{{$recentPosts[$i]->image}}" alt="{{$recentPosts[$i]->title}}" title="{{$recentPosts[$i]->title}}"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            @foreach ($recentPosts[$i]->categories as $category)
                            <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                            @endforeach
                            <span class="post-date">{{ date('d/m/Y', strtotime($recentPosts[$i]->created_at))}}</span>
                        </div>
                        <h3 class="post-title"><a href="/ai-news/{{$recentPosts[$i]->slug}}">{{$recentPosts[$i]->title}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post -->
            @if ($i == 2)
            <div class="clearfix visible-md visible-lg"></div>
            @endif
            @endfor
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <!-- post -->

                    <div class="col-md-12">
                        <div class="post post-thumb">
                            <a class="post-img" href="/ai-news/{{$recentPosts[6]->slug}}"><img src="/storage/{{$recentPosts[6]->image}}" alt="{{$recentPosts[6]->title}}" title="{{$recentPosts[6]->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @foreach ($recentPosts[6]->categories as $category)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($recentPosts[6]->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/ai-news/{{$recentPosts[6]->slug}}">{{$recentPosts[6]->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    @for ($i = 7; $i < 13; $i++)
                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="/ai-news/{{$recentPosts[$i]->slug}}"><img src="/storage/{{$recentPosts[$i]->image}}" alt="{{$recentPosts[$i]->title}}" title="{{$recentPosts[$i]->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">

                                    @foreach ($recentPosts[$i]->categories as $category)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($recentPosts[$i]->created_at))}}  </span>
                                </div>
                                <h3 class="post-title"><a href="/ai-news/{{$recentPosts[$i]->slug}}">{{$recentPosts[$i]->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @if ($i == 8 || $i == 10)
                    <div class="clearfix visible-md visible-lg"></div>
                    @endif
                    @endfor

                </div>
            </div>

            <div class="col-md-4">
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Most Read</h2>
                    </div>
                    @foreach ($mostReadPosts as $mostReadPost)
                    <div class="post post-widget">
                        <a class="post-img" href="/ai-news/{{$mostReadPost->slug}}"><img src="/storage/{{$mostReadPost->image}}" alt="{{$mostReadPost->title}}" title="{{$mostReadPost->title}}"></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="/ai-news/{{$mostReadPost->slug}}">{{$mostReadPost->title}}</a></h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /post widget -->

                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Featured Posts</h2>
                    </div>
                    @foreach ($featurePosts as $featurePost)
                    @if ($loop->index < 2)
                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="/ai-news/{{$featurePost->slug}}"><img src="/storage/{{$featurePost->image}}" alt="{{$featurePost->title}}" title="{{$featurePost->title}}"></a>
                        <div class="post-body">
                            <div class="post-meta">
                                @foreach ($featurePost->categories as $category)
                                <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                                @endforeach
                                <span class="post-date">{{ date('d/m/Y', strtotime($featurePost->created_at))}} </span>
                            </div>
                            <h3 class="post-title"><a href="/ai-news/{{$featurePost->slug}}">{{$featurePost->title}}</a></h3>
                        </div>
                    </div>
                    <!-- /post -->
                    @endif
                    @endforeach


                </div>
                <!-- /post widget -->

                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                    </a>
                </div>
                <!-- /ad -->
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
                    <h2>Featured Posts</h2>
                </div>
            </div>
            @foreach ($featurePosts as $featurePost)

            <!-- post -->
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="/ai-news/{{$featurePost->slug}}"><img src="/storage/{{$featurePost->image}}" alt="{{$featurePost->title}}" title="{{$featurePost->title}}"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            @foreach ($featurePost->categories as $category)
                            <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                            @endforeach
                            <span class="post-date">{{ date('d/m/Y', strtotime($featurePost->created_at))}} </span>
                        </div>
                        <h3 class="post-title"><a href="/ai-news/{{$featurePost->slug}}">{{$featurePost->title}}</a></h3>
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
                            <h2>Most Read</h2>
                        </div>
                    </div>
                    @foreach ($mostReadPosts as $mostReadPost)
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-row">
                            <a class="post-img" href="/ai-news/{{$mostReadPost->slug}}"><img src="/storage/{{$mostReadPost->image}}" alt="{{$mostReadPost->title}}" title="{{$mostReadPost->title}}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @foreach ($mostReadPost->categories as $category)
                                    <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                                    @endforeach
                                    <span class="post-date">{{ date('d/m/Y', strtotime($mostReadPost->created_at))}} </span>
                                </div>
                                <h3 class="post-title"><a href="/ai-news/{{$mostReadPost->slug}}">{{$mostReadPost->title}}</a></h3>
                                <p>{{$mostReadPost->excerpt}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @endforeach




                    <div class="col-md-12">
                        <div class="section-row">
                            <button class="primary-button center-block">Load More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                    </a>
                </div>
                <!-- /ad -->

                <!-- catagories -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Catagories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="/ai-news/category/{{$category->slug}}">{{$category->name}}<span style="background-color: {{$category->color}}">{{count($category->posts)}}</span></a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <!-- /catagories -->

                <!-- tags -->
                <div class="aside-widget">
                    <div class="tags-widget">
                        <ul>
                            <li><a href="#">Chrome</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">Backend</a></li>
                            <li><a href="#">JQuery</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">Website</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /tags -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection
