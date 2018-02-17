@extends('layouts.app')

@section('content')

@if (count($messages) > 0)
    <ul class="media-list">
            
        @foreach ($messages as $message)

            <li class="media">
                @if ( $message->from_id == Auth::user()->id )
                    <?php $side = "talk-box talk-right"; ?>
                @else
                    <?php $side = "talk-box talk-left"; ?>
                @endif
                
                <div class="<?= $side ?>">
                    <?php $from_user = \App\User::find($message->from_id); ?>
                        
                    <p>{!! $from_user->name !!}</p>
                    <p class="talk-content">{!! $message->content !!}</p>
                </div>
            </li>
            
        @endforeach
    </ul>
{!! $messages->render() !!}
@endif

{!! Form::open(['route' => 'messages.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id->id) !!}
                    </div>
                    {!! Form::submit('send', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
    

@endsection