<div>
    <ul>
        @foreach (App\Models\Ministry::all() as $ministery)
        <li><a href="{{ route('system.ministery.view',$ministery->id)}}">{{ $ministery->name }}</a></li>
        @endforeach
    </ul>

</div>
