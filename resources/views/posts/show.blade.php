<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button> 
            <p class ='delete'>[<span onclick = "return deletePost(this);" >delete</span>]</p>
        </form>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
                <p>公開日時 : {{$post->created_at}}</p>
                <p>ネタバレ{{$post->NG}}</p>
                <p>5段階評価 : {{$post->ranking}}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
            function deletePost(e){
                'use strict'
                if(confirm ('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
        
        <form action="/posts" method="POST">
            @csrf
            <div class="body">
                <h2>Body</h2>
                <textarea name="comment[body]" placeholder="感想に対するコメント">{{ old('comments.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('comments.body') }}</p>
            </div>
        </form>
        
        <input type="submit" value="保存"/>
        <div class="content_comments">
            <div class="content__comment">
                
                <p>{{ $post->body }}</p>
                
            </div>
        </div>
        @endsection
        
    </body>
</html>