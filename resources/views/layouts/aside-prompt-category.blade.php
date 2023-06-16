<!-- catagories -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Catagories</h2>
    </div>
    <div class="category-widget">
        <ul>
            @foreach ($categories as $category)
            <li><a href="/midjourney/category/{{$category->slug}}">{{$category->name}}<span style="background-color: {{$category->color}}">{{count($category->prompts)}}</span></a></li>
            @endforeach

        </ul>
    </div>
</div>
<!-- /catagories -->
