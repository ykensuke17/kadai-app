<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller,
    Session;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * 投稿画面遷移
     */
    function create()
    {
        // セッションにログイン情報があるか確認
        if (!Session::exists('user')) {
            // ログインしていなければログインページへ
            return redirect('/login');
        }

        // 画面表示
        return view('post.index');
    }

    /**
     * 投稿処理
     */
    function store(Request $request)
    {

        $rules = [
            'postContent' => 'required|max:140',
        ];

        $messages = ['required' => '投稿内容を入力してください。', 'max' => '投稿内容を140文字以下にしてください。'];

        Validator::make($request->all(), $rules, $messages)->validate();

        // セッションにログイン情報があるか確認
        if (!Session::exists('user')) {
            // ログインしていなければログインページへ
            return redirect('/login');
        }

        // ログイン中のユーザーの情報を取得する
        $loginUser = Session::get('user');

        // データ登録
        $post = new Post;
        $post->user = $loginUser->id;
        $post->content = $request->postContent;
        $post->save();

        return redirect('/');
    }

    /**
     * 投稿詳細画面遷移
     */
    public function show($id)
    {
        // 指定したIDの投稿情報を取得する
        $post = Post::find($id);

        // 投稿が存在するか判定
        if ($post == null) {
            return dd('存在しない投稿です');
        }

        // 投稿者を取得
        $user = $post->user();

        $isOwnPost = false;

        // セッションにログイン情報があるか確認
        if (Session::exists('user')) {
            // ログイン中のユーザーの情報を取得する
            $loginUser = Session::get('user');
            // 自分自身の投稿ページか判定
            $isOwnPost = $loginUser->id == $user->id;
        }

        // 画面表示
        return view('post.detail', compact('post', 'user', 'isOwnPost', 'loginUser'));
    }

    /**
     * 投稿編集画面
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // 投稿が存在するか判定
        if ($post == null) {
            return dd('存在しない投稿です');
        }
        // セッションにログイン情報があるか確認
        if (!Session::exists('user')) {
            return redirect('/');
        }

        // ログイン中のユーザーの情報を取得する
        $loginUser = Session::get('user');
        // 投稿者を取得する
        $user = $post->user();
        // 自分自身の投稿ページか判定
        if ($loginUser->id != $user->id) {
            return redirect('/');
        }

        // 画面表示
        return view('post.edit', compact('post'));
    }

    /**
     * 投稿編集処理
     */
    public function update(Request $request, $id)
    {
        // idから投稿を取得
        $post = Post::find($id);

        // 投稿が存在するか判定
        if ($post == null) {
            return dd('存在しない投稿です');
        }
        // セッションにログイン情報があるか確認
        if (!Session::exists('user')) {
            return redirect('/');
        }

        // データ登録
        $post->content = $request->postContent;
        $post->save();

        // 画面表示
        return redirect('/post/detail/' . $post->id);
    }

    /**
     * 投稿削除処理
     */
    public function delete($id)
    {
        // idから投稿を取得
        $post = Post::find($id);

        // 投稿が存在するか判定
        if ($post == null) {
            return dd('存在しない投稿です');
        }
        // セッションにログイン情報があるか確認
        if (!Session::exists('user')) {
            return redirect('/');
        }

        // ログイン中のユーザーの情報を取得する
        $loginUser = Session::get('user');
        // 投稿者を取得する
        $user = $post->user();
        // 自分自身の投稿ページか判定
        if ($loginUser->id != $user->id) {
            return redirect('/');
        }

        // データ登録
        $post->is_deleted = true;
        $post->save();

        return redirect('/');
    }
}
