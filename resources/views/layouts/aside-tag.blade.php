<!-- tags -->
<div class="aside-widget">
    <div class="tags-widget">
        <ul>
            @foreach ($tags as $tag)
            <li><a href="/tag/{{$tag->slug}}">{{$tag->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /tags -->
