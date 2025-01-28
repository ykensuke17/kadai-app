<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}" />

    <title>kadai-app | 新規登録</title>
</head>
<!-- 新規登録画面 -->

<body class="">
    <x-header></x-header>
    <div class="page signup-page">
        <form class="form" action="/signup" method="post">
            @csrf
            <div class="form-item name">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" />
            </div>
            <div class="form-item email">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" />
            </div>
            <div class="form-item password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" />
            </div>
            <div class="signup-button">
                <button class="button-white" type="submit">signup</button>
            </div>
        </form>
    </div>
</body>

<script src="{{ asset('/js/app.js') }}"></script>
<style scoped>
    .signup-page {
        display: flex;
        justify-content: center;
    }

    .signup-page .title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
    }

    .signup-page .form {
        width: 60vw;
    }

    .signup-page input {
        height: 30px;
        border-radius: 10px;
        background-color: lightgray;
    }

    .signup-page .form-item {
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }

    .signup-page .signup-button {
        text-align: center;
        margin-top: 10px;
    }

    .signup-page button {
        width: 50%;
        height: 30px;
        font-size: 18px;
    }

    .signup-page .error-message {
        margin-top: 5px;
        font-size: 10px;
    }
</style>

</html>