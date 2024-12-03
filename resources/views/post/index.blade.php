<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}" />

    <title>kadai-app | 投稿</title>
</head>
<!-- 投稿画面 -->

<body class="">
    <x-header></x-header>
    <div class="page post-page">
        <form class="form" action="/post" method="post">
            @csrf
            <textarea name="postContent" id="" cols="30" rows="5" placeholder="いまどうしてる?"></textarea>
            <div class="post-button">
                <button class="button-white" type="submit">投稿する</button>
            </div>
            @error('postContent')
            <div class="mt-3">
                <p class="text-red-500">
                    {{ $message }}
                </p>
            </div>
            @enderror
        </form>
    </div>
</body>
<script src="{{ asset('/js/app.js') }}"></script>
<style scoped>
    .post-page .form {
        display: flex;
        flex-direction: column;
    }

    .post-page .post-button {
        text-align: end;
        margin: 20px 20px 0 0;
    }

    .post-page button {
        height: 35px;
        width: 90px;
    }
</style>

</html>