<x-pages>
    <x-slot name="title_page">Inscrição</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('events') }}">Treinamentos</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <a href="{{ route('event',$training->id) }}">{{ $training->course->name }}</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Inscrição</span>
    </x-slot>

    <div>
        <livewire:website.registration event="{{ $training->id }}" />
    </div>

</x-pages>
