@foreach ($posts as $post)
<!-- post -->
<div class="col-md-12">
    <div class="post post-row">
        <a class="post-img" href="/ai-news/{{$post->slug}}"><img
                src="@if( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif"
                alt="{{$post->title}}" title="{{$post->title}}"></a>
        <div class="post-body">
            <div class="post-meta">
                <a class="post-category" style="background-color: {{$category->color}}"
                   href="/ai-news/category/{{$category->slug}}">{{$category->name}}</a>
                <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
            </div>
            <h3 class="post-title"><a href="/ai-news/{{$post->slug}}">{{$post->title}}</a></h3>
            <p>{{$post->excerpt}}</p>
        </div>
    </div>
</div>
<!-- /post -->
@endforeach
