<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
        <a href='/posts/PR/{{Auth::user()->id}}'>{{Auth::user()->name}}</a>
        <h1>Blog Name</h1>
        [<a href='/posts/create'>create</a>]
        
        <div>
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
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <p>公開日時 : {{$post->created_at}}</p>
                    <p>ネタバレ{{$post->NG}}</p>
                    <p>5段階評価 : {{$post->ranking}}</p>
                </div>
                
            @endforeach
        </div>
        @endsection
    </body>
</html>