<div class="grid grid-cols-11 gap-2 mb-16">
    <div class="col-span-2 text-sm rounded">
        <div class="grid gap-1">
            <a class="flex items-center justify-start h-10 px-2 rounded-sm bg-sky-600 text-sky-50" href="{{ route('system.student.index',$event->id) }}">
                <x-icon.student />
                <span class="ml-2">Lista de Alunos</span>
            </a>
            <a class="flex items-center justify-start h-10 px-2 rounded-sm bg-sky-600 text-sky-50" href="{{ route('system.schedule.index',$event->id) }}">
                <svg width="20px" fill="currentColor" viewBox="0 0 24 24" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"><path d="M9 24H1a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm-2-4H1a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2Zm-2-4H1a1 1 0 0 1 0-2h4a1 1 0 0 1 0 2Zm8 7.955a1 1 0 0 1-.089-2A10 10 0 1 0 2.041 11.09a1 1 0 0 1-1.992-.18A12 12 0 0 1 24 12a11.934 11.934 0 0 1-10.91 11.951.917.917 0 0 1-.09.004ZM12 6a1 1 0 0 0-1 1v5a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V7a1 1 0 0 0-1-1Z"/></svg>
                <span class="ml-2">Plano de Aula</span>
            </a>
            <a class="flex items-center justify-start h-10 px-2 rounded-sm bg-sky-600 text-sky-50" href="{{ route('system.gallery.index',$event->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="20px" fill="currentColor" viewBox="0 0 512 512"><path d="M494.933 38.4h-409.6c-9.412 0-17.067 7.654-17.067 17.067v17.067H51.2c-9.412 0-17.067 7.654-17.067 17.067v17.067H17.067C7.654 106.667 0 114.321 0 123.733v332.8c0 9.412 7.654 17.067 17.067 17.067h409.6c9.412 0 17.067-7.654 17.067-17.067v-17.067H460.8c9.412 0 17.067-7.654 17.067-17.067v-17.067h17.067c9.412 0 17.067-7.654 17.067-17.067v-332.8C512 46.054 504.346 38.4 494.933 38.4zM17.067 123.733h409.6l.009 190.635-44.783-51.183c-3.251-3.721-9.6-3.721-12.851 0l-54.067 61.79-147.176-130.816a8.503 8.503 0 0 0-11.332 0l-139.4 123.912V123.733zM426.684 431.01v25.523H17.067V340.89l145.067-128.947 147.934 131.49c1.69 1.51 3.942 2.193 6.204 2.142a8.51 8.51 0 0 0 5.888-2.901l53.308-60.911 51.209 58.53.008 90.573c0 .017-.017.043-.017.068s.016.051.016.076zm34.116-8.61h-17.067V123.733c0-9.412-7.654-17.067-17.067-17.067H51.2V89.6h409.6v332.8zm34.133-34.133h-17.067V89.6c0-9.412-7.654-17.067-17.067-17.067H85.333V55.467h409.6v332.8z"/><path d="M307.2 174.933c-18.825 0-34.133 15.309-34.133 34.133S288.375 243.2 307.2 243.2s34.133-15.309 34.133-34.133-15.308-34.134-34.133-34.134zm0 51.2c-9.412 0-17.067-7.654-17.067-17.067 0-9.412 7.654-17.067 17.067-17.067s17.067 7.654 17.067 17.067-7.655 17.067-17.067 17.067z"/></svg>
                <span class="ml-2">Galeria de Fotos</span>
            </a>
            {{-- <a class="flex items-center justify-start h-10 px-2 rounded-sm bg-sky-600 text-sky-50" href="{{ route('system.ojt.index',$event->id) }}" title="Saída de Treinamento Prático">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" fill="currentColor" viewBox="0 0 32 32"><path d="M16 21.916c-4.797.02-8.806 3.369-9.837 7.856l-.013.068a.75.75 0 0 0 1.464.325l.001-.005c.875-3.885 4.297-6.744 8.386-6.744s7.511 2.859 8.375 6.687l.011.057a.75.75 0 0 0 .732.59h.001a.745.745 0 0 0 .165-.019l-.005.001a.751.751 0 0 0 .572-.898l.001.005c-1.045-4.554-5.055-7.903-9.849-7.924h-.002zM9.164 10.602a4.676 4.676 0 1 0-4.676-4.676 4.682 4.682 0 0 0 4.675 4.676zm0-7.852a3.176 3.176 0 1 1-3.176 3.176A3.18 3.18 0 0 1 9.163 2.75zm13.762 7.852a4.676 4.676 0 1 0-4.676-4.676 4.682 4.682 0 0 0 4.675 4.676zm0-7.852a3.176 3.176 0 1 1-3.176 3.176 3.18 3.18 0 0 1 3.176-3.176zm7.896 17.09c-.878-3.894-4.308-6.759-8.406-6.759-.423 0-.839.031-1.246.089l.046-.006a.717.717 0 0 0-.133.047l.004-.002c-.751-2.129-2.745-3.627-5.089-3.627a5.387 5.387 0 0 0-5.068 3.561l-.012.038c-.017-.004-.03-.014-.047-.017a8.35 8.35 0 0 0-1.195-.084h-.007a8.653 8.653 0 0 0-8.392 6.701l-.011.058a.75.75 0 0 0 1.464.325l.001-.005c.737-3.207 3.56-5.565 6.937-5.579h.002c.335 0 .664.024.985.07l-.037-.004c-.008.119-.036.232-.036.354a5.417 5.417 0 0 0 10.833 0v-.001c0-.12-.028-.233-.036-.352.016-.002.031.005.047.001.294-.044.634-.068.98-.068h.011-.001a7.14 7.14 0 0 1 6.93 5.531l.009.048a.745.745 0 0 0 .897.571l-.005.001a.751.751 0 0 0 .572-.898l.001.005zM16 18.916h-.001a3.917 3.917 0 1 1 3.917-3.917V15A3.92 3.92 0 0 1 16 18.916z"/></svg>
                <span class="ml-2">STP</span>
            </a> --}}
            {{-- <a class="flex items-center justify-start h-10 px-2 rounded-sm bg-sky-600 text-sky-50" href="#">
                <svg width="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 318.188 318.188" xml:space="preserve"><path d="M283.149 52.722 232.625 2.197A7.5 7.5 0 0 0 227.321 0H40.342a7.5 7.5 0 0 0-7.5 7.5v303.188a7.5 7.5 0 0 0 7.5 7.5h237.504a7.5 7.5 0 0 0 7.5-7.5V58.025c0-1.989-.79-3.896-2.197-5.303zm-48.328-27.115 24.918 24.919h-24.918V25.607zM47.842 15h171.98v10.263H47.842V15zm222.504 288.188H47.842V40.263h171.98v17.763a7.5 7.5 0 0 0 7.5 7.5h43.024v237.662z"/><path d="M201.704 147.048c-3.615-.024-7.177.154-10.693.354-1.296.087-2.579.199-3.861.31a93.594 93.594 0 0 1-3.813-4.202c-7.82-9.257-14.134-19.755-19.279-30.664 1.366-5.271 2.459-10.772 3.119-16.485 1.205-10.427 1.619-22.31-2.288-32.251-1.349-3.431-4.946-7.608-9.096-5.528-4.771 2.392-6.113 9.169-6.502 13.973-.313 3.883-.094 7.776.558 11.594.664 3.844 1.733 7.494 2.897 11.139a165.324 165.324 0 0 0 3.588 9.943 171.593 171.593 0 0 1-2.63 7.603c-2.152 5.643-4.479 11.004-6.717 16.161l-3.465 7.507c-3.576 7.855-7.458 15.566-11.814 23.02-10.163 3.585-19.283 7.741-26.857 12.625-4.063 2.625-7.652 5.476-10.641 8.603-2.822 2.952-5.69 6.783-5.941 11.024-.141 2.394.807 4.717 2.768 6.137 2.697 2.015 6.271 1.881 9.4 1.225 10.25-2.15 18.121-10.961 24.824-18.387 4.617-5.115 9.872-11.61 15.369-19.465l.037-.054c9.428-2.923 19.689-5.391 30.579-7.205 4.975-.825 10.082-1.5 15.291-1.974 3.663 3.431 7.621 6.555 11.939 9.164 3.363 2.069 6.94 3.816 10.684 5.119 3.786 1.237 7.595 2.247 11.528 2.886 1.986.284 4.017.413 6.092.335 4.631-.175 11.278-1.951 11.714-7.57.134-1.721-.237-3.229-.98-4.551-3.643-6.493-16.231-8.533-22.006-9.451-4.553-.723-9.2-.939-13.804-.935zm-75.06 20.697a170.827 170.827 0 0 1-6.232 9.041c-4.827 6.568-10.34 14.369-18.322 17.286-1.516.554-3.512 1.126-5.616 1.002-1.874-.11-3.722-.936-3.637-3.065.042-1.114.587-2.535 1.423-3.931.915-1.531 2.048-2.935 3.275-4.226 2.629-2.762 5.953-5.439 9.777-7.918 5.865-3.805 12.867-7.23 20.672-10.286-.449.71-.897 1.416-1.34 2.097zm27.222-84.26a38.169 38.169 0 0 1-.323-10.503 24.858 24.858 0 0 1 1.038-4.952c.428-1.33 1.352-4.576 2.826-4.993 2.43-.688 3.177 4.529 3.452 6.005 1.566 8.396.186 17.733-1.693 25.969-.299 1.31-.632 2.599-.973 3.883a121.219 121.219 0 0 1-1.648-4.821c-1.1-3.525-2.106-7.091-2.679-10.588zm16.683 66.28a236.508 236.508 0 0 0-25.979 5.708c.983-.275 5.475-8.788 6.477-10.555 4.721-8.315 8.583-17.042 11.358-26.197 4.9 9.691 10.847 18.962 18.153 27.214.673.749 1.357 1.489 2.053 2.22-4.094.441-8.123.978-12.062 1.61zm61.744 11.694c-.334 1.805-4.189 2.837-5.988 3.121-5.316.836-10.94.167-16.028-1.542-3.491-1.172-6.858-2.768-10.057-4.688-3.18-1.921-6.155-4.181-8.936-6.673 3.429-.206 6.9-.341 10.388-.275 3.488.035 7.003.211 10.475.664 6.511.726 13.807 2.961 18.932 7.186 1.009.833 1.331 1.569 1.214 2.207zM158.594 233.392h-16.606v47.979h15.523c7.985 0 14.183-2.166 18.591-6.498 4.408-4.332 6.613-10.501 6.613-18.509 0-7.438-2.096-13.127-6.285-17.065-4.19-3.938-10.135-5.907-17.836-5.907zm7.909 33.917c-1.838 2.287-4.726 3.43-8.664 3.43h-2.888v-26.877h3.773c3.545 0 6.187 1.061 7.926 3.183 1.739 2.123 2.609 5.382 2.609 9.78.001 4.703-.918 8.198-2.756 10.484zM129.78 237.363c-3.041-2.647-7.592-3.971-13.652-3.971H99.522v47.979h12.963v-15.917h3.643c5.819 0 10.309-1.46 13.472-4.381 3.161-2.92 4.742-7.061 4.742-12.421-.001-4.879-1.521-8.642-4.562-11.289zm-10.288 15.884c-1.149 1.094-2.697 1.641-4.644 1.641h-2.363v-11.026h3.348c3.588 0 5.382 1.619 5.382 4.857-.001 1.924-.575 3.434-1.723 4.528zM191.314 281.371h12.766v-18.017h14.374v-10.403H204.08v-9.156h15.589v-10.403h-28.355z"/></svg>
                <span class="ml-2">Imprimir em PDF</span>
            </a> --}}
        </div>
    </div>
    <div class="relative col-span-6 px-2 py-12 overflow-hidden bg-white rounded">
        <div class="absolute top-0 left-0 flex justify-between items-center w-full px-2 py-1 leading-7 text-white bg-slate-600">
            <div class="font-light truncate" style="font-family: Cinzel, serif">{{ $event->course->name }}</div>
            <div class="font-light text-sm text-slate-300 truncate" style="font-family: Cinzel, serif">{{ $event->course->ministry->name }}</div>
        </div>

        <div class="grid grid-cols-12 leading-7">
            <div class="col-span-3 font-bold">
                Professor:
            </div>
            <div class="col-span-9">{{ $event->user->name }}</div>
        </div>
        <hr class="my-2 cols-span-full">
        <div class="grid grid-cols-12 leading-7">
            <div class="col-span-3 font-bold">
                Igreja:
            </div>
            <div class="col-span-9">{{  isset($event->church) ? $event->church->name : '' }}</div>
        </div>
        <div class="grid grid-cols-12 leading-7">
            <div class="col-span-3 font-bold">
                Pastor da Igreja:
            </div>
            <div class="col-span-9">{{  isset($event->church) ? $event->church->pastor : '' }}</div>
        </div>
        <div class="grid grid-cols-12 leading-7">
            <div class="col-span-3 font-bold">
                Endereço:
            </div>
            <div class="col-span-9">{{ address($event->street, $event->number, $event->complement, $event->neighborhood, $event->city, $event->zone->initial, $event->zipcode) }}</div>
        </div>
        <hr class="my-2 cols-span-full">
        <div class="grid grid-cols-12 leading-7">
            <div class="col-span-3 font-bold">
                Phone:
            </div>
            <div class="col-span-9">{{ telep($event->phone) }}</div>
        </div>
        <div class="grid grid-cols-12 leading-7">
            <div class="col-span-3 font-bold">
                E-mail:
            </div>
            <div class="col-span-9">{{ $event->email }}</div>
        </div>
        <hr class="my-2 cols-span-full">
        <div class="grid grid-cols-12 leading-7">
            <div class="col-span-3 font-bold">
                Link:
            </div>
            <div class="col-span-9">{{ isset($event->url)?$event->url:'-' }}</div>
        </div>
        <hr class="my-2 cols-span-full">
        <div class="grid grid-cols-12 leading-7">
            <div class="col-span-5 font-bold">
                Valor destinado ao EE:
            </div>
            <div class="col-span-7">R$ {{ number_format($event->price,2,',','.') }}</div>

            <div class="col-span-5 font-bold">
                Valor destinado a Igreja:
            </div>
            <div class="col-span-7">R$ {{ number_format($event->price_church,2,',','.') }}</div>

            <div class="col-span-5 font-bold">
                Desconto em cada inscrição:
            </div>
            <div class="col-span-7">R$ {{ number_format($event->discount,2,',','.') }}</div>

            <div class="col-span-5 font-bold">
                Valor total da Inscrição:
            </div>
            <div class="col-span-7">R$ {{ number_format($event->price_church + $event->price - $event->discount,2,',','.') }}</div>
        </div>

        <div style="border: solid 1px rgba(0,0,0,0.25); border-radius: 5px; overflow: hidden; margin: 20px 0;">
            <div class="px-2 pt-4 pb-2"> @if($event->available_id != null) Treinamento com: {{$days->count()}} dia{{ ($days->count()>1)?'s':''}} de aula{{ ($days->count()>1)?'s':''}}. @else Plano de aula não definido @endif</div>
            @foreach ($days as $day)
            @php
                $start = App\Models\Schedule::where('training_id',$event->id)->where('date',$day->date)->get()->first()->start;
                $end  = App\Models\Schedule::where('training_id',$event->id)->where('date',$day->date)->get()->last()->end;

                $time = workload($start, $end);
                $minutes[] = $time;
            @endphp
            <div class="grid grid-cols-11 gap-2 px-2 py-1 odd:bg-slate-200 even:bg-slate-100">
                @if($days->count()>1)<div class="col-span-1 text-right"> <span>{{ $loop->iteration}}º</span> Dia:</div>@endif
                <div class="col-span-5 text-right">{{day_month($day->date)}},</div>
                <div class="col-span-3">de {{ date('H:i',strtotime($start)) }} &#x27BA; {{ date('H:i',strtotime($end)) }}</div>
                <div class="col-span-2 text-right ">Duração: {{ $time }}</div>
            </div>
            @endforeach
        </div>
        <div>
            <div class="mb-2 font-bold">Comentários:</div>
            <div class="text-sm italic">{{ $event->comment }}</div>
        </div>

        <div class="absolute bottom-0 left-0 grid w-full grid-cols-2 gap-8 p-1 text-xs bg-slate-100">
            <div class="grid grid-cols-5">
                <div class="col-span-2 font-bold">Cadastrado em:</div>
                <div class="col-span-3 text-right">{{ date('d/m/y H:i',strtotime($event->created_at)) }}</div>
            </div>
            <div class="grid grid-cols-5">
                <div class="col-span-2 font-bold">Modificado em:</div>
                <div class="col-span-3 text-right">{{ ($event->updated_at == $event->created_at)? 'Nunca' : date('d/m/y H:i',strtotime($event->updated_at)) }}</div>
            </div>

        </div>
    </div>
    <div class="relative col-span-3 p-2 pt-10 overflow-hidden text-sm bg-white rounded">
        <div class="absolute top-0 left-0 flex justify-between w-full px-2 py-1 leading-7 text-white bg-slate-600">
            <div class="font-semibold">Status do evento: </div>
            <div class="font-bold" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">{{ event_sts($event->status) }}</div>
        </div>
        <div>
            <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/20">
                <div class="font-bold">Carga Horária:</div>
                <div>{{ $minutes != [] ? workload_lot($minutes) : '00:00' }}</div>
            </div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/00">
            <div class="font-bold">Total de Alunos:</div>
            <div>{{ $totStudents }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/20">
            <div class="font-bold">Total de Alunos finalizaram:</div>
            <div>{{ $totAccredited }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/00">
            <div class="font-bold">Nª de pastores:</div>
            <div>{{ $totPastors }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/20">
            <div class="font-bold">Nº total de Igrejas:</div>
            <div>{{ $totChurches }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/00">
            <div class="font-bold">Nº de Igrejas Novas:</div>
            <div>{{ $totNewChurches }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/20">
            <div class="font-bold">Kits recebidos do EE:</div>
            <div>{{ $event->kits }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/00">
            <div class="font-bold">Kits usados no evento:</div>
            <div>{{ $tot_kits_received }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/20">
            <div class="font-bold">Kits restantes:</div>
            <div>{{ $event->kits - $tot_kits_received }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/00">
            <div class="font-bold">Total pagantes:</div>
            <div>{{ $tot_payment }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/20">
            <div class="font-bold">Valor arrecadado para EE:</div>
            <div>R$ {{ number_format($tot_payment * ($event->price - $event->discount), 2,',') }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/00">
            <div class="font-bold">Valor arrecadado para Igreja:</div>
            <div>R$ {{ number_format($tot_payment * $event->price_church, 2,',') }}</div>
        </div>
        <div class="flex justify-between px-2 leading-9 rounded-md bg-sky-800/20">
            <div class="font-bold">Valor total arrecadado:</div>
            <div>R$ {{ number_format($tot_payment * ($event->price + $event->price_church - $event->discount), 2,',') }}</div>
        </div>
    </div>

</div>
