@extends('layouts.app')

@section('cover')
@if (Auth::check())
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>英語で話す</h1>
                <!--<a href="" class="btn btn-success btn-lg">検索</a>-->
                
                {!! Form::open(['route' => 'levels']) !!}
                
                    {!! Form::select('level', [
                                'Beginner' => 'Beginner',
                                'Intermediate' => 'Intermediate',
                                'Expert' => 'Expert'], null, ['class' => 'level-edit']) !!}
                                
                    {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@else
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>英語で話す</h1>
                <p class="btn btn-success btn-lg">{!! link_to_route('signup.get', 'Talk withを始める') !!}</p>
            </div>
        </div>
    </div>
@endif
@endsection

@section('content')
    @include('users.levelusers', ['users' => $users])
@endsection