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

    {{-- <div>

        <div class="flex items-center justify-between px-4 py-2 text-white rounded-t-lg bg-slate-600">
            <div>Lista por <span class="text-slate-300">@if (session('modeList') == 0) eventos @else professores @endif</span></div>

            <div>
                <div class="relative group" title="Modo de vizualização">
                    <svg height="25px" width="25px" style="filter:drop-shadow(0 0 1px rgba(0,0,0,1));" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 495 495" xml:space="preserve">
                    <g>
                        <path style="fill:#005ECE;" d="M495,297.5v-110h-68.21c-3.63-11.87-8.42-23.31-14.35-34.23l45.42-45.42l-77.78-77.79l-46.05,46.06 c-11.66-6.08-23.87-10.89-36.53-14.38V0h-50v152c52.66,0,95.5,42.84,95.5,95.5S300.16,343,247.5,343v152h60v-74.82 c10.09-3.4,19.85-7.66,29.23-12.74l50.42,50.42l77.79-77.78l-51.06-51.05c5.27-10.11,9.58-20.64,12.91-31.53H495z"/>
                        <path style="fill:#2488FF;" d="M152,247.5c0-52.66,42.84-95.5,95.5-95.5V0h-60v64.82c-12.42,4.18-24.32,9.65-35.61,16.36 l-44.04-44.04l-77.79,77.78l47.74,47.74c-5.28,11.19-9.41,22.83-12.36,34.84H0v110h71.58c3.93,10.63,8.81,20.85,14.6,30.61 l-49.04,49.04l77.78,77.79l52.74-52.75c9.62,4.54,19.59,8.24,29.84,11.06V495h50V343C194.84,343,152,300.16,152,247.5z"/>
                    </g>
                    </svg>
                    <div class="absolute right-0 z-30 hidden gap-1 p-1 text-right rounded-md bg-black/50 group-hover:grid" style="width:150px; box-shadow: 0 5px 10px 2px rgba(0,0,0,.5)">
                        <button type="button" wire:click='mode_list(0)' class="block w-full px-2 py-1 text-sm font-semibold text-left text-white rounded bg-sky-600 hover:bg-sky-700">Modo: eventos</button>
                        <button type="button" wire:click='mode_list(1)' class="block w-full px-2 py-1 text-sm font-semibold text-left text-white rounded bg-sky-600 hover:bg-sky-700">Modo: professores</button>
                    </div>
                </div>
            </div>
        </div>


        @if (session('modeList') == 0)

            <div class="grid grid-cols-2 gap-2 p-4 rounded-b-lg" style="box-shadow: inset 0 0 10px 2px rgba(0,0,0,0.3); background-color: #0087ad;">

                @if($year == date('Y') || $year == 'all' )
                    <div class="grid grid-cols-2 gap-2 col-span-full">
                        <button type="button" wire:click='list_actual(2)' class="p-2 font-semibold rounded-2xl @if($status == 2) bg-slate-300 @else hover:bg-black/10 @endif">Eventos Confirmados</button>
                        <button type="button" wire:click='list_actual(3)' class="p-2 font-semibold rounded-2xl @if($status == 3) bg-slate-300 @else hover:bg-black/10 @endif">Eventos Finalizados</button>
                    </div>
                @else
                    <div class="p-2 font-semibold text-center col-span-full rounded-2xl bg-slate-200">Eventos Finalizados</div>
                @endif
                <hr class="col-span-full" />

                @foreach($trainings_ as $event)
                    <a href="{{route('system.event.view',$event->id)}}" class="event_item" style="background-color: #f0f0f0; color: #004356; box-shadow: 0 0 2px 2px @if($event->date < date('Y-m-d') && $status == 2) #ff0000 @else #004356 @endif; border-radius: 2px; overflow: hidden; position: relative;">

                        <div style="padding: 10px; border-left: solid 1px #004356; background-color: @if($status == 2) rgba(166, 249, 221,.35) @else #fff @endif">
                            <div class="py-1 mb-2 text-sm font-semibold text-center text-white uppercase truncate rounded-2xl" style="background: {{ $event->course->color }};" title="{{$event->course->name}}">{{$event->course->name}}</div>
                            <div style="line-height: 12pt; font-size: 10pt; font-weight: 700;" class="truncate" title="{{$event->church->name}}">&#9962; {{$event->church->name}}</div>
                            <hr style="margin: 4px 0; border-top: solid 1px rgba(0, 136, 174,.5);">
                            <div class="flex justify-between">
                                <div class="text-xs font-semibold">{{ $event->user->name }}</div>
                                <div style="line-height: 12pt; font-size: 10pt;padding-bottom: 15px" class="text-right truncate" title="{{$event->city}} - {{$event->zone->initial}}">{{$event->city}} - {{$event->zone->initial}}</div>
                            </div>
                            @php
                                $time = App\Models\Schedule::where('training_id',$event->id)->where('date',$event->date)->get()->first();
                            @endphp


                            <div class="flex justify-between">
                                <div style="line-height: 12pt; font-size: 10pt;" class="truncate @if($event->date < date('Y-m-d') && $status == 2) text-red-700 font-extrabold @endif" title="&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif">&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif</div>
                                <div style="line-height: 12pt; font-size: 10pt; display: flex;" title="{{$event->students()->count()}} alunos inscritos">
                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" height='14px' width='14px' viewBox="0 0 512 512" fill="currentColor">
                                        <path d="M149.078 301.555v144.302c0 7.532 6.105 13.637 13.637 13.637s13.637-6.105 13.637-13.637V301.555h-27.274zM335.254 301.555v144.302c0 7.532 6.105 13.637 13.637 13.637s13.637-6.105 13.637-13.637V301.555h-27.274zM199.172 301.555V466.05c0 14.355 11.638 25.991 25.992 25.991s25.992-11.636 25.992-25.991V301.555h-51.984zM262.378 301.555V466.05c0 14.355 11.638 25.991 25.992 25.991s25.992-11.636 25.992-25.991V301.555h-51.984z"/>
                                        <circle cx="256.764" cy="44.89" r="44.89"/>
                                        <path d="m397.701 204.82-32.014-67.722c-9.479-20.052-29.935-33.008-52.116-33.008H199.674c-22.179 0-42.635 12.957-52.116 33.008l-32.014 67.722c-6.769 14.323 3.681 30.916 19.583 30.916l.054-.001 83.308-.209c11.963-.029 21.636-9.751 21.605-21.714-.03-11.943-9.722-21.605-21.658-21.605l-.055.001-49.016.123 17.359-36.719c.034-.072.678-.709 1.707-1.572a6.53 6.53 0 0 1 10.732 5.005v13.367l19.169-.049h.106c17.177 0 31.925 10.439 38.231 25.331a41.638 41.638 0 0 1 22.41-22.028l13.179-40.809a8.893 8.893 0 1 1 16.925 5.465l-10.415 32.249h15.121v-13.753a6.58 6.58 0 0 1 11.191-4.698 30.733 30.733 0 0 1 1.441 1.492l17.399 36.805h-49.111c-11.963 0-21.66 9.697-21.66 21.66 0 11.901 9.6 21.551 21.477 21.651l83.491.009c15.873-.001 26.371-16.561 19.584-30.917zM470.544 255.506H41.456c-7.254 0-13.135 5.881-13.135 13.135s5.881 13.135 13.135 13.135h14.139v210.065c0 11.133 9.026 20.159 20.159 20.159s20.159-9.026 20.159-20.159V281.777h321.359v210.064c0 11.133 9.026 20.159 20.159 20.159s20.159-9.026 20.159-20.159V281.777h12.953c7.254 0 13.135-5.881 13.135-13.135.001-7.255-5.88-13.136-13.134-13.136z"/>
                                    </svg>
                                        <div class="ml-1"><span class="hidden lg-inline">Alunos inscritos:</span> {{$event->students()->count()}}</div>
                                </div>

                            </div>
                        </div>
                    </a>
                @endforeach

            </div>

            <div class='mt-1'>{{ $trainings_->links() }}</div>

        @else

            <div class="grid gap-8" style="max-height: calc( 100vh - 200px ); overflow: auto; scroll-behavior: smooth;">

                @foreach ($teachers as $teacher)

                <div style="position: relative; max-width: 100%;">
                    <h2 class="sticky top-[-.1px] left-0 z-20 w-full p-2" style="text-transform: uppercase; font-weight: 700; background-color: #004356; color: #f0f0f0;">&#10070; {{ $teacher->name }}</h2>

                    <div id="{{ explode(' ',$teacher->name)[0] }}" class="p-4" style="box-shadow: inset 0 0 10px 2px rgba(0,0,0,0.3); background-color: #0087ad;">
                        @foreach ( $teacher->courses()->where('execution','EE-certified Teacher')->orderBy('id')->get() as $course)

                        @if ($trainings->where('course_id',$course->id)->where('user_id',$teacher->id)->count()>0)

                        <div class="relative px-4 py-4 my-4 bg-white rounded" style="box-shadow: 0 0 2px 2px rgba(0,0,0,0.25);">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: {{ $course->color }}; opacity: 20%;"></div>
                            <div class="px-2 py-1 mb-2 rounded" style="background-color: {{ $course->color }}; color: #fff;">
                                <h3 style="color: #fff; font-family: 'Cinzel',serif;">&#x2726; {{ $course->name }}</h3>
                            </div>

                            <x-event.list.item :course="$course" :teacher="$teacher->id" :year="$year" />

                        </div>

                        @endif
                        @endforeach
                    </div>

                </div>

                @endforeach
            </div>

        @endif

    </div> --}}


</div>
