<div>

    <div class="grid gap-8">

        <div style="position: relative; max-width: 100%; border: 2px solid #0088ae;border-radius: 5px;">
            <h2 class="sticky top-0 left-0 z-20 w-full p-2" style="text-transform: uppercase; font-weight: 700; background-color: #004356; color: #f0f0f0;">&#10070; {{ Auth::user()->name }}</h2>

            <div id="{{ explode(' ',Auth::user()->name)[0] }}" class="p-4" style="box-shadow: inset 0 0 10px 2px rgba(0,0,0,0.3); background-color: #0087ad;">
                @foreach ( Auth::user()->courses()->where('execution','EE-certified Teacher')->orderBy('id')->get() as $course)

                @if ($trainings->where('course_id',$course->id)->where('user_id',Auth::user()->id)->count()>0)

                <div class="relative px-4 py-4 my-4 bg-white rounded" style="box-shadow: 0 0 2px 2px rgba(0,0,0,0.25);">
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: {{ $course->color }}; opacity: 20%;"></div>
                    <div class="px-2 py-1 mb-2 rounded" style="background-color: {{ $course->color }}; color: #fff;">
                        <h3 style="color: #fff; font-family: 'Cinzel',serif;">&#x2726; {{ $course->name }}</h3>
                    </div>

                    <x-event.list.item :course="$course" :teacher="Auth::user()->id" :year="$year" />

                </div>

                @endif
                @endforeach
            </div>

        </div>

    </div>
</div>
