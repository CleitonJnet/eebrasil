<div>

    @if (session('login-role' == 6))
    @if($events_plan->count()>0)
    <div class="text-sm" style="color: rgba(0,0,0,.5); text-shadow: 0px 0px 1px {{ $course->color }}; font-weight: 700; padding: 10px 0 1px; margin-bottom: 7px; border-bottom: solid 1px {{ $course->color }};">Eventos sendo planejados</div>
    @endif

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; width: 100%; margin-bottom: 5px;">

        @foreach ($events_plan as $event)

        <a href="{{route('system.event.view',$event->id)}}" class="event_item" style="background-color: #f0f0f0; color: #004356; box-shadow: 0 0 2px 2px #004356; border-radius: 2px; overflow: hidden; position: relative; @if($event->date<NOW()) opacity: .8 @endif">

            <div style="padding: 10px; border-left: solid 1px #004356; background-color: rgba(244, 225, 140,.35)">
                <div style="line-height: 12pt; font-size: 10pt; font-weight: 700;" class="truncate" title="{{$event->church->name}}">&#9962; {{$event->church->name}}</div>
                <hr style="margin: 4px 0; border-top: solid 1px rgba(0, 136, 174,.5);">
                <div style="line-height: 12pt; font-size: 10pt;padding-bottom: 15px" class="text-right truncate" title="{{$event->city}} - {{$event->zone->initial}}">{{$event->city}} - {{$event->zone->initial}}</div>
                @php
                    $time = App\Models\Schedule::where('training_id',$event->id)->where('date',$event->date)->get()->first();
                @endphp


                <div class="flex justify-between">
                    <div style="line-height: 12pt; font-size: 10pt;" class="truncate @if($event->date < date('Y-m-d')) text-red-700 font-extrabold @endif" title="&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif">&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif</div>
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
    <div>{{$events_plan->links()}}</div>
    @endif


    @if($events_confirmed->count()>0)
    <div class="text-sm" style="color: rgba(0,0,0,.5); text-shadow: 0px 0px 1px {{ $course->color }}; font-weight: 700; padding: 10px 0 1px; margin-bottom: 7px; border-bottom: solid 1px {{ $course->color }}">Eventos Confirmados</div>
    @endif
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; width: 100%; margin-bottom: 5px;">

        @foreach ($events_confirmed as $event)

        <a href="{{route('system.event.view',$event->id)}}" class="event_item" style="background-color: #f0f0f0; color: #004356; box-shadow: 0 0 2px 2px @if($event->date < date('Y-m-d')) #ff0000 @else #004356 @endif; border-radius: 2px; overflow: hidden; position: relative; @if($event->date<NOW()) opacity: .8 @endif">

            <div style="padding: 10px; border-left: solid 1px #004356; background-color: rgba(166, 249, 221,.35)">
                <div style="line-height: 12pt; font-size: 10pt; font-weight: 700;" class="truncate" title="{{$event->church->name}}">&#9962; {{$event->church->name}}</div>
                <hr style="margin: 4px 0; border-top: solid 1px rgba(0, 136, 174,.5);">
                <div style="line-height: 12pt; font-size: 10pt;padding-bottom: 15px" class="text-right truncate" title="{{$event->city}} - {{$event->zone->initial}}">{{$event->city}} - {{$event->zone->initial}}</div>
                @php
                    $time = App\Models\Schedule::where('training_id',$event->id)->where('date',$event->date)->get()->first();
                @endphp


                <div class="flex justify-between">
                    <div style="line-height: 12pt; font-size: 10pt;" class="truncate @if($event->date < date('Y-m-d')) text-red-700 font-extrabold @endif" title="&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif">&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif</div>
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
    <div>{{$events_confirmed->links()}}</div>


    @if($events_done->count()>0)
    <div class="text-sm" style="color: rgba(0,0,0,.5); text-shadow: 0px 0px 1px {{ $course->color }}; font-weight: 700; padding: 10px 0 1px; margin-bottom: 7px; border-bottom: solid 1px {{ $course->color }}">Eventos Finalizados</div>
    @endif
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; width: 100%; margin-bottom: 5px;">

        @foreach ($events_done as $event)

        <a href="{{route('system.event.view',$event->id)}}" class="event_item" style="background-color: #f0f0f0; color: #004356; box-shadow: 0 0 2px 2px #004356; border-radius: 2px; overflow: hidden; position: relative; @if($event->date<NOW()) opacity: .8 @endif">

            <div style="padding: 10px; border-left: solid 1px #004356; background-color: rgba(255, 255, 255,.35)">
                <div style="line-height: 12pt; font-size: 10pt; font-weight: 700;" class="truncate" title="{{$event->church->name}}">&#9962; {{$event->church->name}}</div>
                <hr style="margin: 4px 0; border-top: solid 1px rgba(0, 136, 174,.5);">
                <div style="line-height: 12pt; font-size: 10pt;padding-bottom: 15px" class="text-right truncate" title="{{$event->city}} - {{$event->zone->initial}}">{{$event->city}} - {{$event->zone->initial}}</div>
                @php
                    $time = App\Models\Schedule::where('training_id',$event->id)->where('date',$event->date)->get()->first();
                @endphp


                <div class="flex justify-between">
                    <div style="line-height: 12pt; font-size: 10pt;" class="truncate @if($event->date > date('Y-m-d')) text-red-700 font-extrabold @endif" title="&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif">&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif</div>
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
    <div>{{$events_done->links()}}</div>

    @if($events_canceled->count()>0)
    <div class="text-sm" style="color: rgba(0,0,0,.5); text-shadow: 0px 0px 1px {{ $course->color }}; font-weight: 100; padding: 10px 0 1px; margin-bottom: 7px; border-bottom: solid 1px {{ $course->color }}">Eventos Cancelados</div>
    @endif
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; width: 100%; margin-bottom: 5px;">

        @foreach ($events_canceled as $event)

        <a href="{{route('system.event.view',$event->id)}}" class="event_item" style="background-color: #f0f0f0; color: #004356; box-shadow: 0 0 2px 2px #004356; border-radius: 2px; overflow: hidden; position: relative; @if($event->date<NOW()) opacity: .8 @endif">

            <div style="padding: 10px; border-left: solid 1px #004356; background-color: rgba(200, 200, 200,.35)">
                <div style="line-height: 12pt; font-size: 10pt; font-weight: 700;" class="truncate" title="{{$event->church->name}}">&#9962; {{$event->church->name}}</div>
                <hr style="margin: 4px 0; border-top: solid 1px rgba(0, 136, 174,.5);">
                <div style="line-height: 12pt; font-size: 10pt;padding-bottom: 15px" class="text-right truncate" title="{{$event->city}} - {{$event->zone->initial}}">{{$event->city}} - {{$event->zone->initial}}</div>
                @php
                    $time = App\Models\Schedule::where('training_id',$event->id)->where('date',$event->date)->get()->first();
                @endphp


                <div class="flex justify-between">
                    <div style="line-height: 12pt; font-size: 10pt;" class="truncate" title="&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif">&#128198; {{ date('d/m/Y',strtotime($event->date)) }} @if(isset($time) && $time != null) | &#128354; {{ date('H:i',strtotime($time->start)) }} @endif</div>
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
    <div>{{$events_canceled->links()}}</div>

</div>
