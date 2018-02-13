@extends('layouts.app')

@section('cover')
@if (Auth::check())
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>英語で話す</h1>
                <a href="" class="btn btn-success btn-lg">検索</a>
            </div>
        </div>
    </div>
@else
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>英語で話す</h1>
                <a href="" class="btn btn-success btn-lg">Talk withを始める</a>
            </div>
        </div>
    </div>
@endif
@endsection

@section('content')
    @include('users.users', ['users' => $users])
@endsection