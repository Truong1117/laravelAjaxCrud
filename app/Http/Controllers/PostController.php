<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    //
    public function index()
    {
        $post = Post::all();
        return view('posts.index', compact('post'));
    }

    public function addPost(Request $req)
    {
        // $validator = Validator::make($req->all(), [
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        // }else {
        $post = new Post;
        $post->title = $req->title;
        $post->body = $req->body;
        $post->save();
        return response()->json($post);
    }
    public function editPost(Request $request){
        $post = Post::find ($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return response()->json($post);
      }
      
      public function deletePost(Request $request){
        $post = Post::find ($request->id)->delete();
        return response()->json();
      }
}
