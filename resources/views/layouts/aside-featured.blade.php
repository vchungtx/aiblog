


    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2>Tiêu điểm</h2>
        </div>
        @foreach ($featurePosts as $featurePost)
        @if ($loop->index < 2)
        <!-- post -->
        <div class="post post-thumb">
            <a class="post-img" href="/ai-news/{{$featurePost->slug}}"><img src="@if($featurePost->image == null) /img/default-ai.jpg @elseif( !filter_var($featurePost->image, FILTER_VALIDATE_URL)){{ Voyager::image( $featurePost->image ) }}@else{{ $featurePost->image }}@endif" alt="{{$featurePost->title}}" title="{{$featurePost->title}}"></a>
            <div class="post-body">
                <div class="post-meta">
                    @foreach ($featurePost->categories as $category)
                    @if($loop->index < 3)
                    <a class="post-category" style="background-color: {{$category->color}}" href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                    @endif
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


