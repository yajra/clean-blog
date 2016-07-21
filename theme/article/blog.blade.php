@include('layouts.partials.header', [
    'h1' => $article->present()->title,
    'h2' => $article->param('meta_description') ?? config('site.description'),
    'img' => theme_asset('img/home-bg.jpg')
])

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @include('article.partials.header')
            {!! $article->present()->content !!}
        </div>
    </div>
</div>

