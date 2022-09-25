<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; // useする
use App\Category;

class PostController extends Controller
{
    public function index(Post $post, Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Post::query();
        
        if(!empty($keyword)) {
                
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        
            
        }
        
        
        $post = $query->get();
        
        return view('posts/index')->with(['posts' => $post, 'keyword'=> $keyword]);
        
    } 
    /**
    * 特定IDのpostを表示する
    *
    * @params Object Post // 引数の$postはid=1のPostインスタンス
    * @return Reposnse post view
    */
    public function show(Post $post)
    {   
    
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    public function PR(Post $post)
    {
        
        $authId = auth()->id();
        $post->where('user_id', auth()->id());
        return view('posts/PR')->with(['posts' => $post->getPaginateByLimitWithAuth()]);
    }
    
}
?>