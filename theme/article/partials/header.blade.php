<div class="post-preview">
    <a href="{{ $article->getUrl() }}">
        <h3 class="post-title">{{ $article->present()->title }}</h3>
        <h3 class="post-subtitle">
            {{ $article->param('meta_description') }}
        </h3>
    </a>
    <div class="post-meta">
        Posted by: <a href="#">{{ $article->present()->author }}</a> on {{ $article->present()->datePublished }}

        @if($article->param('show_hits'))
            <small class="label label-info">
                <i class="fa fa-eye"></i> Hits: {{ $article->present()->hits }}
            </small>
        @endif
    </div>
</div>
<hr>
