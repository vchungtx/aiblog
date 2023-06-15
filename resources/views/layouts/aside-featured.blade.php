


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


