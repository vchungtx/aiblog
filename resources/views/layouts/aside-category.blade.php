<!-- catagories -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Danh mục</h2>
    </div>
    <div class="category-widget">
        <ul>
            @foreach ($categories as $category)
<!--            <li><a href="/{{$category->slug}}">{{$category->name}}<span style="background-color: {{$category->color}}">{{count($category->posts)}}</span></a></li>-->
            <li><a href="/{{$category->slug}}">{{$category->name}}</a></li>
            @endforeach

        </ul>
    </div>
</div>
<!-- /catagories -->
