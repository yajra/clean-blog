@extends('layouts.master')

@section('body', '')

@push('styles')
@endpush

@section('title')
    {{ $category->title }} | @parent
@stop

@section('keywords', $category->param('meta_keywords') ?? config('site.keywords'))
@section('description', $category->param('meta_description') ?? config('site.description'))
@section('author', $category->param('author_alias') ?? config('site.author'))

@section('page-title')
    {{ $category->title }}
@stop

@section('content')
    @include('layouts.partials.header', [
        'h1' => $category->present()->title,
        'h2' => $category->description,
        'img' => theme_asset('img/home-bg.jpg')
    ])

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <table class="table table-bordered">
                    <caption>
                        {!! form()->open(['class' => 'form-horizontal', 'id' => 'limit-form', 'method' => 'get']) !!}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="limit">Limit</label>

                                    <div class="input-control col-md-6">
                                        {!! form()->select('limit', array_combine([5, 10, 15, 25, 50, 100], [5, 10, 15, 25, 50, 100]) , $limit, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ form()->hidden('layout', 'list') }}
                        {!! form()->close() !!}
                    </caption>
                    <thead>
                    <tr>
                        <th width="20px">Id</th>
                        <th>Title</th>
                    </tr>
                    </thead>
                    @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td><a href="{{ $article->getUrl() }}">{{ $article->title }}</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No articles found!</td>
                        </tr>
                    @endforelse
                </table>

                {!! $articles->render() !!}
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script>
    $(function () {
        $('select[name=limit]').on('change', function () {
            $('#limit-form').submit();
        });
    });
</script>
@endpush
