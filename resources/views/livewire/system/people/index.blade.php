<div>
    <ul>
        @foreach (App\Models\User::all() as $user)
        <li><a href="{{ route('system.people.view',$user->id)}}">{{ $user->name }}</a></li>
        @endforeach
    </ul>

</div>
