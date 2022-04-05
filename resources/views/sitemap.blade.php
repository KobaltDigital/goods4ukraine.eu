<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url('privacy')}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime('yesterday')) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{url('cookies')}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime('yesterday')) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{url('about')}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime('yesterday')) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{url('rules')}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime('yesterday')) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{url('contact')}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime('yesterday')) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>   
    <url>
        <loc>{{url('terms-of-use')}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime('yesterday')) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>       
    <url>
        <loc>{{url('press')}}</loc>
        <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime('yesterday')) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>       
    @foreach ($ads as $ad)
        <url>
            <loc>{{route('ads.show', $ad)}}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($ad->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>