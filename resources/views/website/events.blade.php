<x-pages>
    <x-slot name="title_page">Treinamentos<br>Agendados</x-slot>
    <x-slot name="breadcrumb">
        <span>Treinamentos</span>
    </x-slot>

    <div class="list-events">

        @foreach ($trainings as $ntraining)
        <a href="{{ route('event',$ntraining->id) }}" class="event-item" data-aos="zoom-in-down" data-aos-duration="500">
            <div class="event-banner" style="background-image: url({{ asset( $ntraining->course->banner ) }})">
                <svg class="svg-banner-event" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill-opacity="1" d="M0,160L720,316L1440,160L1440,320L0,320Z"></path>
                </svg>
                <img class="event-logo" src="{{ asset($ntraining->course->logo) }}" alt="...">
            </div>
            <div class="event-info">
                <div class="event-title-date">
                    <div class="event-title">{{ $ntraining->course->name }}</div>
                    <div>
                        <div class="event-date">
                            {{ date('d', strtotime($ntraining->date)) }} de
                            {{ __(date('M', strtotime($ntraining->date))) }} de
                            {{ date('Y', strtotime($ntraining->date)) }}
                        </div>
                        <div class="local">{{ $ntraining->city }} - {{ $ntraining->zone->initial }}</div>
                    </div>
                </div>
                <div class="event-church">{{ $ntraining->church->name }}</div>
            </div>
            <div class="event-details">
                <div>
                    @if($ntraining->phone != null)<div><div style="font-size: 10pt; color: #cecece;">Telefone:</div> {{ telep($ntraining->phone) }}</div>@endif
                    @if($ntraining->email != null)<div><div style="font-size: 10pt; color: #cecece;">E-mail:</div> {{ $ntraining->email }}</div>@endif
                    <hr>
                    <div class="more_details">Mais detalhes</div>
                </div>
            </div>
            <div class="inscription">Inscrições abertas</div>
        </a>
        @endforeach

    </div>

</x-pages>
