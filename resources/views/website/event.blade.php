<x-pages>
    <x-slot name="title_page">Detalhes do <br> Treinamento</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('events') }}">Treinamentos</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Evento</span>
    </x-slot>

    <div class="page-event">
        <div class="page-event-banner" style="background-image: url({{ asset($training->course->banner) }});">
            <div class="figcaption">
                Em Evangelismo Explosivo as equipes nunca estão sozinhas, <strong>o líder entra no barco junto com sua
                    equipe</strong> para uma grande aventura.
            </div>
        </div>
        <div>
            <h2 class="event-detail-title">{{ $training->course->name }}</h2>
            <div>Professor: {{ $training->user->name }}</div>
            <div>
                Data do evento:
                {{ date('d', strtotime($training->date)) }} de
                {{ __(date('M', strtotime($training->date))) }} de
                {{ date('Y', strtotime($training->date)) }}
            </div>
            <div>Local: {{ $training->church->name }}</div>
            <div>Endereço:
                {{ address($training->street, $training->number, $training->complement, $training->neighborhood, $training->city, $training->zone->initial, $training->zipcode) }}
            </div>
            @if ($training->phone != null && $training->email != null)
                <div>
                    <h2>Como se inscrever:</h2>
                    @if ($training->phone != null)
                        <div>
                            Telefone:
                            {{ telep($training->phone) }}
                        </div>
                    @endif
                    @if ($training->phone != null)
                        <div>
                            E-mail:
                            {{ $training->email }}
                        </div>
                    @endif
                </div>
            @endif

            @if ($workload != '00:00')

            <h2>Programação:</h2>

            <div class="px-2 pt-4 pb-2"> @if($training->available_id != null) Treinamento com: {{$days->count()}} dia{{ ($days->count()>1)?'s':''}} de aula{{ ($days->count()>1)?'s':''}}. @else Plano de aula não definido @endif</div>

            @foreach ($days as $day)
                @php
                    $start = App\Models\Schedule::where('training_id',$training->id)->where('date',$day->date)->get()->first()->start;
                    $end  = App\Models\Schedule::where('training_id',$training->id)->where('date',$day->date)->get()->last()->end;

                    $time = workload($start, $end);
                    $minutes[] = $time;
                @endphp
                <div>
                    @if($days->count()>1)<span>{{ $loop->iteration}}º</span> Dia: @endif
                    {{day_month($day->date)}}, de {{ date('H:i',strtotime($start)) }} &#x27BA; {{ date('H:i',strtotime($end)) }} Duração: {{ $time }}
                </div>
            @endforeach

            @endif

        </div>

    </div>

    <div class="event-countdown">
        <div id="countdown">0 dias - 00:00:00</div>
    </div>


    <script>
        // Define a data do evento (no formato "YYYY-MM-DD HH:MM:SS")
        var eventDate = new Date("{{ $training->date }}T{{ $time }}");

        // Função para atualizar o contador regressivo
        function updateCountdown() {
            var now = new Date();
            var timeLeft = eventDate - now;

            // Calcula os dias, horas, minutos e segundos restantes
            var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeLeft / (1000 * 60 * 60)) % 24);
            var minutes = Math.floor((timeLeft / (1000 * 60)) % 60);
            var seconds = Math.floor((timeLeft / 1000) % 60);

            if (hours < 10) {
                hours = "0" + hours
            }
            if (minutes < 10) {
                minutes = "0" + minutes
            }
            if (seconds < 10) {
                seconds = "0" + seconds
            }

            // Atualiza o conteúdo do elemento #countdown
            var countdownElement = document.getElementById("countdown");
            countdownElement.innerHTML = "Faltam: " + days + " dias, " + hours + ":" + minutes + ":" + seconds +
                " para o evento.";
        }

        // Chama a função updateCountdown a cada segundo
        setInterval(updateCountdown, 1000);
    </script>



</x-pages>
