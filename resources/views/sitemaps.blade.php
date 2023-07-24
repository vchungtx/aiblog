<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($monthsWithPosts as $monthsWithPost)
    <sitemap>
        <loc>{{ url('/') }}/sitemap/{{ $monthsWithPost }}.xml</loc>
    </sitemap>
    @endforeach
    <sitemap>
        <loc>{{ url('/') }}/sitemap-menu.xml</loc>
    </sitemap>
</sitemapindex>

