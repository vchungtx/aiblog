<!-- archive -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Lưu trữ</h2>
    </div>
    <div class="archive-widget">
        <ul>
            @foreach ($monthsWithPosts as $monthsWithPost)
            <li><a href="/archive/{{$monthsWithPost}}">{{$monthsWithPost}}</a></li>
            @endforeach


        </ul>
    </div>
</div>
<!-- /archive -->
