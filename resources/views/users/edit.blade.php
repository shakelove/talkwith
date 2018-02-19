@extends('layouts.app')

@section('content')

    <h1>id: {{ $user->id }} のメッセージ編集ページ</h1>

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

        {!! Form::label('comment', 'A comment:') !!}
        {!! Form::textarea('comment') !!}
        
        {!! Form::label('aboutme', 'About me:') !!}
        {!! Form::textarea('aboutme') !!}
        
        {!! Form::label('level', 'English level:') !!}
        {!! Form::select('level', [
                        'Beginner' => 'Beginner',
                        'Intermediate' => 'Intermediate',
                        'Expert' => 'Expert']) !!}

        {!! Form::submit('Update') !!}

    {!! Form::close() !!}

@endsection