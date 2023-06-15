
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


