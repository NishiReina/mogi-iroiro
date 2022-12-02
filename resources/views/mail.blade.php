@extends('layouts.default')


@section('content')

<h1>利用者全員に送信</h1>

<form action="/mail" method="POST">
    @csrf
    <label for="mail">件名：</label>
        <input type="text" name="title">
    </label><br>
    <label for="content">メッセージ：
        <textarea name="content" cols="30" rows="10"></textarea>
    </label><br>
    <button>送信</button>
</form>

@endsection