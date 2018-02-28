@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                    
                    <span class="level">{{ $user->level }}</span>
                    
                </div>
                <div class="list-group">
                    <h3 class="list-group-item-heading">
                        ○ A comment
                    </h3>
                    <p class="list-group-item-text" id="comment">
                        
                            {{ $user->comment }} 
                        
                    </p>
                </div>
                <div class="list-group">
                    <h3 class="list-group-item-heading">
                        ○ About me
                    </h3>
                    <p class="list-group-item-text" id="aboutme">
                         
                            {{ $user->aboutme }}
                        
                    </p>
                </div>
            </div>
            <div class="button">
                @if (Auth::user()->id == $user->id)
	            	{!! link_to_route('users.edit', 'Edit about me', ['id' => $user->id], ['class' => 'btn btn-success']) !!}
	        	@else
    	        	
    	            	{!! link_to_route('messages.index', 'Talk!', ['id' => $user->id], ['class' => 'btn btn-danger']) !!}
    	            
	        	@endif
        	</div>
        </aside>
        <div class="col-xs-6">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">Thankings <span class="badge">{{ $count_thankings }}</span></a></li>
                <li role="presentation" class="active"><a href="{{ route('users.thankers', ['id' => $user->id]) }}">Thankers <span class="badge">{{ $count_thankers }}</span></a></li>
            </ul>
            
                @if (count($users) > 0)
                <ul class="row">
                @foreach ($users as $user)
                        <li class="media">
                            <div class="media-left">
                                <span class="user-name-left">{{ $user->name }}</span>
                            </div>
                            <div class="media-body">
                                <span class="talk-button-right"> {!! link_to_route('messages.index', 'Talk!', ['id' => $user->id], ['class' => 'btn btn-danger']) !!} </span>
                            </div>
                        </li>
                @endforeach
                </ul>
                {!! $users->render() !!}
                @endif
            
        </div>
    </div>
            
        
        </div>
    </div>
@endsection