@php

if (Voyager::translatable($items)) {
$items = $items->load('translations');
}

@endphp
<!-- nav -->
<ul class="nav-menu nav navbar-nav">
    @foreach ($items as $item)
    @if(!$item->children->isEmpty())
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $item->title }}<span class="caret"></span></a>
        <ul class="dropdown-menu">
            @foreach ($item->children as $childrenItem)
            <li>
                <a href="{{ url($childrenItem->link()) }}" target="{{ $childrenItem->target }}">
                    {{ $childrenItem->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </li>
    @else
    <li><a href="{{ url($item->link()) }}" target="{{ $item->target }}">{{ $item->title }}</a></li>
    @endif
    @endforeach
</ul>
<!-- /nav -->






