@php

if (Voyager::translatable($items)) {
$items = $items->load('translations');
}

@endphp
<!-- nav -->
<div class="section-row">
    <ul class="nav-aside-menu">
        @foreach ($items as $item)
        <li><a href="{{ url($item->link()) }}" target="{{ $item->target }}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
</div>
<!-- /nav -->






