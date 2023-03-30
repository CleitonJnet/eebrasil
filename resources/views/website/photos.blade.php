<x-pages>
    <x-slot name="title_page">
        Fotos da <br>
        {{ $photos->first()->training->church->name }}
    </x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('gallery') }}">Galeria</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Fotos</span>
    </x-slot>
</x-pages>
