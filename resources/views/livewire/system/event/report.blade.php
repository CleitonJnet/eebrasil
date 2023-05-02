<div style="display: grid; grid-template-columns: 3fr 12fr; gap: 10px;">

    <div>

        <div class="flex items-center justify-between w-full h-10 px-2 text-sm rounded-t-lg bg-slate-600 text-slate-100">
            <div class="flex items-center justify-center">
                <div class="flex items-center justify-center py-1 mr-1 text-xs rounded w-7 bg-slate-500">
                    {{App\Models\Role::find(6)->users()->count()}}
                </div>
                Professor{{App\MOdels\Role::find(6)->users()->count()>1?'es':''}}
            </div>
            <div class="grid grid-cols-3 gap-1">
                <div class="flex items-center justify-center py-1 text-xs rounded w-7 bg-slate-500" title="Planejados">{{ $trainings->where('status',1)->count() }}</div>
                <div class="flex items-center justify-center py-1 text-xs rounded w-7 bg-slate-500" title="Confirmados">{{ $trainings->where('status',2)->count() }}</div>
                <div class="flex items-center justify-center py-1 text-xs rounded w-7 bg-slate-500" title="Finalizados">{{ $trainings->where('status',3)->count() }}</div>
            </div>
        </div>
        <div class="rounded-b-lg bg-black/25" style="padding: 5px 0px 10px; max-width: 100%; font-size: 10pt; position: relative; max-height: calc( 100vh - 200px ); overflow: auto;">

            @foreach ($listTeachers as $teacher)

            @php $training = $trainings->where('user_id',$teacher->id); @endphp

            <div class="block px-1 mb-4"style="max-height: calc( 100vh - 200px ); overflow: auto;">
                <div class="flex items-center justify-between col-span-3 px-2 transition rounded-t text-slate-400 bg-slate-700 hover:text-slate-50">
                    <div class="text-sm font-semibold text-white">{{ (explode(' ',$teacher->name))[0] }}:</div>
                    <div class="flex items-center"><span class="text-slate-500">|</span>
                        <div class="px-1 text-xs font-thin text-center">{{ $training->where('status',1)->count() }}</div><span class="text-slate-500">|</span>
                        <div class="px-1 text-xs font-thin text-center">{{ $training->where('status',2)->count() }}</div><span class="text-slate-500">|</span>
                        <div class="px-1 text-xs font-thin text-center">{{ $training->where('status',3)->count() }}</div><span class="text-slate-500">|</span>
                    </div>
                </div>
                <div class="grid gap-1 pt-1">
                    @foreach ($teacher->courses()->where('execution','EE-certified Teacher')->orderBy('id')->get() as $course)
                    <div class="grid grid-cols-12 overflow-hidden rounded shadow" title="{{ $course->name }}">

                        <div class="relative flex items-center justify-center col-span-3 bg-white" style="height: 38px;">
                            <div class="flex items-center justify-center" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: {{ $course->color }};">
                                <div style="font-size: 7pt; color: #fff;">{{ $course->initial}}</div>
                            </div>
                        </div>

                        <div class="relative flex items-center justify-center col-span-9" style="height: 38px;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: {{ $course->color }}; z-index: 0;"></div>
                            <div class="z-0 grid w-full grid-cols-3 text-center text-white gap-x-2">
                                <div style="font-size: 7pt" class="px-1 pt-1 font-thin truncate bg-black/10">Planejando</div>
                                <div style="font-size: 7pt" class="px-1 pt-1 font-thin truncate bg-black/10">Confirmado</div>
                                <div style="font-size: 7pt" class="px-1 pt-1 font-thin truncate bg-black/10">Finalizado</div>
                                <div class="text-xs font-bold bg-black/10">{{ $training->where('course.initial',$course->initial)->where('status',1)->count() }}</div>
                                <div class="text-xs font-bold bg-black/10">{{ $training->where('course.initial',$course->initial)->where('status',2)->count() }}</div>
                                <div class="text-xs font-bold bg-black/10">{{ $training->where('course.initial',$course->initial)->where('status',3)->count() }}</div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

            @endforeach

            <div class="px-1">{{ $listTeachers->links() }}</div>
        </div>

    </div>

    <div>
    ...
    <canvas id="myChart" wire:ignore></canvas>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    @endpush

    </div>


</div>
