@if (count($users) > 0)
<div class="row">
@foreach ($users as $user)
    
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel panel-default user-index">
                <div class="panel-heading">
                    <h4 class="panel-title-user">{{ $user->name }}</h4>
                    <div class="panel-heading-right clearfix">
                        
                        <span class="level-user">{{ $user->level }}</span>
                        
                        
                    </div>
                    
                </div>
                <div class="panel panel-body">
                    <div class="comment-user">
                        <p class="comment">{{ $user->comment }}</p>
                    </div>
                    <div class="panel-body-right clearfix">
                       <span class="profile"> {!! link_to_route('users.show', 'view profile', ['id' => $user->id], ['class' => 'btn btn-info']) !!} </span>
                       
                    @if (Auth::check())
                       @if (Auth::user()->id != $user->id) 
                            @if (Auth::user()->is_thanking($user->id))
                                <span class="talk-button"> {!! link_to_route('messages.index', 'Talk!', ['id' => $user->id], ['class' => 'btn btn-info btn-block']) !!} </span>
                            @else
                                {!! Form::open(['route' => ['user.talks', $user->id]]) !!}
                                    {!! Form::submit('Talk!', ['class' => "btn btn-info btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    @endif
                           
                       
                    </div>
                </div>
            </div>
        </div>
    
@endforeach
</div>
<div class="paginate">
{!! $users->render() !!}
</div>
@endif


