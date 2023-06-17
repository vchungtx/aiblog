
    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2>Được quan tâm</h2>
        </div>
        @foreach ($mostReadPosts as $mostReadPost)
        <div class="post post-widget">
            <a class="post-img" href="/ai-news/{{$mostReadPost->slug}}"><img src="@if($mostReadPost->image == null) /img/default-ai.jpg @elseif( !filter_var($mostReadPost->image, FILTER_VALIDATE_URL)){{ Voyager::image( $mostReadPost->image ) }}@else{{ $mostReadPost->image }}@endif" alt="{{$mostReadPost->title}}" title="{{$mostReadPost->title}}"></a>
            <div class="post-body">
                <h3 class="post-title"><a href="/ai-news/{{$mostReadPost->slug}}">{{$mostReadPost->title}}</a></h3>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /post widget -->


