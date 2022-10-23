<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// App\Models内のPostクラスをインポート
use App\Models\Post;
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
 public function create()
 {
  return view("posts/create");
 }
 public function show(Post $post)
 {
  return view("posts/show") -> with(["post" => $post]);
 }
}
