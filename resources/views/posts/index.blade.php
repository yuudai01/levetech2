<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
        <link rel="stylesheet" href="{{secure_asset('css/index.css') }}">

    </head>
    <body>
        @extends('layouts.app')
        @section('content')
        <div class='Blog'>
            <a href='/posts/PR/{{Auth::user()->id}}'>{{Auth::user()->name}}</a>
            <h1>Blog Name</h1>
            [<a href='/posts/create'>create</a>]
            <div class='keyword'>
                <form action="{{ route('posts.index') }}" method="GET">
                    <input type="text" name="keyword" placeholder="検索ワード" value="{{ $keyword }}">
                    <input type="submit" value="検索">
                </form>
            </div>
            <div class='posts'>
                @foreach ($posts as $post)
                
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        <p>ネタバレ{{$post->NG}} &emsp; 5段階評価 : {{$post->ranking}}</p>
                        <h3 class='body'>{{ $post->body }}</h3>
                        <p>公開日時 : {{$post->created_at}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endsection
    </body>
</html>