<?php

namespace App\Http\Controllers;

// App\Models内のPostクラスをインポート
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category; // use
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */

class PostController extends Controller
{

 // インポートしたPostをインスタンス化して$postとして使用
 public function index(Post $post)
 {
  return view("posts/index") -> with(["posts" => $post -> getPaginateByLimit()]);
 }
 
 public function create(Category $category)
 {
  return view("posts/create") -> with(["categories" => $category->get()]);
 }
 
 public function show(Post $post)
 {
  return view("posts/show") -> with(["post" => $post]);
 }
 
 public function store(PostRequest $request, Post $post)
 {
  // dd($request->all());
  $input = $request["post"];
  $post->fill($input)->save();
  return redirect("/posts/" . $post->id);
 }
 
 public function edit(Post $post)
 {
  return view("posts/edit") -> with(["post" => $post]);
 }
 
 public function update(PostRequest $request, Post $post)
 {
  $input_post = $request["post"];
  $post -> fill($input_post) -> save();
  
  return redirect("/posts/" . $post->id);  
 }
 
 public function delete(Post $post)
 {
  $post -> delete();
  return redirect("/");
 }
}
