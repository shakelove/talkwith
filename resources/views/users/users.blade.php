@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    <li class="media">
        <div class="media-left">
            <div>
                {{ $user->name }}
            </div>
            <div>
                {{ $user->comment }}
            </div>
        </div>
        <div class="media-right">
            <div>
                {{ $user->level }}
            </div>
            <div>
                {{ $user->thanks }} thanks
            </div>
            <div>
                <p>{!! link_to_route('users.show', 'view profile', ['id' => $user->id]) !!}</p>
            </div>
            <div>
                <a href="#">Talk!!</a>
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $users->render() !!}
@endif