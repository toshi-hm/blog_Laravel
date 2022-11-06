<x-app-layout>
    <x-slot name="header">
        編集画面
    </x-slot>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
                <p class="title_error" style="color:red">{{ $errors->first("post.title") }}</p>
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
                <p class="body_error" style="color:red">{{ $errors->first("post.body") }}</p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
            </div>
            <input type="submit" value="update">  
        </form>
        <div class="footer">
            <a href="/posts/{{ $post->id }}">戻る</a>
        </div>
    </div>
</x-app-layout>
