@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                    @if (count($user->level) > 0)
                    <span class="level">{{ $user->level }}</span>
                    @endif
                </div>
                <div class="list-group">
                    <h3 class="list-group-item-heading">
                        ○ A comment
                    </h3>
                    <p class="list-group-item-text" id="comment">
                        @if (count($user->comment) > 0)
                            {{ $user->comment }} 
                        @endif
                    </p>
                </div>
                <div class="list-group">
                    <h3 class="list-group-item-heading">
                        ○ About me
                    </h3>
                    <p class="list-group-item-text" id="aboutme">
                         @if (count($user->aboutme) > 0)
                            {{ $user->aboutme }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="panel-footer">
                @if (Auth::user()->id == $user->id)
	            	{!! link_to_route('users.edit', 'Edit about me', ['id' => $user->id]) !!}
	        	@else
	            	<a>Talk!!</a>
	        	@endif
        	</div>
        </aside>
        <div class="col-xs-6">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="#">Send</a></li>
                <li><a href="#">Receive</a></li>
            </ul>
        </div>
    </div>
@endsection