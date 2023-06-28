@foreach ($posts as $post)
<!-- post -->
<div class="col-md-12">
    <div class="post post-row">
        <a class="post-img" href="/{{$post->slug}}.html"><img
                src="@if($post->image == null) /img/default-ai.jpg @elseif( !filter_var($post->image, FILTER_VALIDATE_URL)){{ Voyager::image( $post->image ) }}@else{{ $post->image }}@endif"
                alt="{{$post->title}}" title="{{$post->title}}"></a>
        <div class="post-body">
            <div class="post-meta">
                <a class="post-category" style="background-color: {{$category->color}}"
                   href="/{{$category->slug}}">{{$category->name}}</a>
                <span class="post-date">{{ date('d/m/Y', strtotime($post->created_at))}} </span>
            </div>
            <h3 class="post-title"><a href="/{{$post->slug}}.html">{{$post->title}}</a></h3>
            <p>{{$post->excerpt}}</p>
        </div>
    </div>
</div>
<!-- /post -->
@endforeach
