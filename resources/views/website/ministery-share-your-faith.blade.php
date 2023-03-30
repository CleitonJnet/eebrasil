<x-pages>
    <x-slot name="title_page">Workshop<br> O Evangelho em Sua Mão</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('ministeries') }}">Ministérios</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <a class="mediaq-none-991" href="{{ route('eed') }}">Escola de Evangelismo e Discipulado</a>
        <a class="mediaq-inline-991" href="{{ route('eed') }}">EED</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Workshop ESM</span>
    </x-slot>



    <div class="page-eed">

        <div class="parts">
            <a class="part grid-btn-left" style="background-color: rgba(77, 77, 77, 0.3); cursor: default;color:#fff; filter: grayscale(.8);">
                <div class="banner-book">
                    <img src="{{ asset('img/manual_esm.jpg') }}" alt="logo" class="book" />
                </div>
                <div class="more">
                    <div>Saiba mais sobre:</div>
                    <div>Workshop: O Evangelho Em Sua Mão</div>
                </div>
            </a>
            <a class="part grid-btn-right" href="{{ route('clinic') }}">
                <div class="more">
                    <div>Saiba mais sobre:</div>
                    <div>Clínica: Evangelismo Explosivo</div>
                </div>
                <div class="banner-book">
                    <img src="{{ asset('img/manual_facilitador.jpg') }}" alt="logo" class="book" />
                </div>
            </a>
        </div>

    </div>

</x-pages>
