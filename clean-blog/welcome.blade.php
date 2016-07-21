@extends('layouts.master')

@section('content')
    @include('layouts.partials.header', [
        'h1' => config('site.name'),
        'h2' => config('site.description'),
        'img' => theme_asset('img/home-bg.jpg')
    ])

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2 class="post-title">Welcome</h2>
                <h3 class="post-subtitle">Your Application's Landing Page.</h3>
            </div>
        </div>
    </div>
@endsection
