<div>
    <ul>
        @foreach (App\Models\Church::all() as $church)
        <li><a href="{{ route('system.church.view',$church->id)}}">{{ $church->name }}</a></li>
        @endforeach
    </ul>


</div>
