<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
                <div classs= "content__NG">
  	            <p>ネタバレはありますか？</p>
  	            <label><input type="radio" name="post[NG]" value="{{ $post->NG }}">ネタバレあり</label>
  	            <label><input type="radio" name="post[NG]" value="{{ $post->NG }}">ネタバレなし</label>
	            </div>
	            <div classs= "content__ranking">
	            <p>漫画の評価</p>
  	            <label><input type="radio" name="post[ranking]" value="{{ $post->ranking }}">5</label>
  	            <label><input type="radio" name="post[ranking]" value="{{ $post->ranking }}">4</label>
  	            <label><input type="radio" name="post[ranking]" value="{{ $post->ranking }}">3</label>
  	            <label><input type="radio" name="post[ranking]" value="{{ $post->ranking }}">2</label>
  	            <label><input type="radio" name="post[ranking]" value="{{ $post->ranking }}">1</label>
	            </div>
                <input type="submit" value="保存">
            </form>
        </div>
        @endsection
    </body>
</html>