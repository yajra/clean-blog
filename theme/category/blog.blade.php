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

    @each('category.partials.articles', $articles, 'article', 'category.partials.no-articles')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! $articles->render() !!}
            </div>
        </div>
    </div>
@stop
