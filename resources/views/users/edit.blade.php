@extends('layouts.app')

@section('content')

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('comment', 'A comment:') !!}
            {!! Form::textarea('comment', null, ['rows' => 2,'cols' => 30]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('aboutme', 'About me:') !!}
            {!! Form::textarea('aboutme', null, ['rows' => 15,'cols' => 100]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('level', 'English level:') !!}
            {!! Form::select('level', [
                            'Beginner' => 'Beginner',
                            'Intermediate' => 'Intermediate',
                            'Expert' => 'Expert']) !!}
        </div>

        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection