<x-pages>
    <x-slot name="title_page">Fotos dos <br> Treinamentos</x-slot>
    <x-slot name="breadcrumb">
        <span>Galeria</span>
    </x-slot>

    <div class="news-gallery" data-aos="fade-up" data-aos-duration="1000">

        @foreach ($trainings as $p_training)
        <a href="{{ route('photos', $p_training->id) }}" class="paste">
            <div class="photos gallery{{ $p_training->id }}">
                {{-- @dd($p_training->media) --}}
                @foreach ($p_training->media as $photo)
                    <img class="@if ($loop->index == 0) selected @endif"
                        src="{{ asset("storage/$photo->path_thumbnail") }}" alt="...">
                @endforeach
            </div>
            <script>
                let time{{ $p_training->id . $loop->index }} = 2000,
                    currentImageIndex{{ $p_training->id . $loop->index }} = 0,
                    images{{ $p_training->id . $loop->index }} = document.querySelectorAll(".gallery{{ $p_training->id }} img"),
                    max{{ $p_training->id . $loop->index }} = images{{ $p_training->id . $loop->index }}.length;

                function nextImage{{ $p_training->id . $loop->index }}() {
                    images{{ $p_training->id . $loop->index }}[currentImageIndex{{ $p_training->id . $loop->index }}].classList
                        .remove("selected")

                    currentImageIndex{{ $p_training->id . $loop->index }}++

                    if (currentImageIndex{{ $p_training->id . $loop->index }} >= max{{ $p_training->id . $loop->index }})
                        currentImageIndex{{ $p_training->id . $loop->index }} = 0

                    images{{ $p_training->id . $loop->index }}[currentImageIndex{{ $p_training->id . $loop->index }}].classList.add(
                        "selected")
                }

                function start{{ $p_training->id . $loop->index }}() {
                    console.log(max{{ $p_training->id . $loop->index }})
                    setInterval(() => {
                        nextImage{{ $p_training->id . $loop->index }}()
                    }, time{{ $p_training->id . $loop->index }});
                }

                window.addEventListener("load", start{{ $p_training->id . $loop->index }})
            </script>
            <div class="info">
                <div class="info-event">{{ $p_training->course->name }}</div>
                <div>
                    <div class="info-church">{{ $p_training->church->name }}</div>
                    <div class="info-city-uf">{{ $p_training->city }}, {{ $p_training->zone->initial }}</div>
                    <hr>
                    <div class="info-date">
                        {{ date('d', strtotime($p_training->date)) }} de
                        {{ __(date('M', strtotime($p_training->date))) }} de
                        {{ date('Y', strtotime($p_training->date)) }}
                    </div>
                </div>
            </div>
        </a>
@endforeach
    </div>


</x-pages>
