<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>PR</title>
        <link rel="stylesheet" href="{{secure_asset('css/index.css') }}">
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
        <div class="background">
            <div class='Blog'>
        <h3>{{Auth::user()->name}}</h3>
        <h1>Blog Name</h1>
        [<a href='/posts/create'>create</a>]
        <br>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    </h2>
                    <p>ネタバレ{{$post->NG}} &emsp; 5段階評価 : {{$post->ranking}}</p>
                    <h3 class='body'>{{ $post->body }}</h3>
                    <p>公開日時 : {{$post->created_at}}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        @endsection
    </body>
</html>