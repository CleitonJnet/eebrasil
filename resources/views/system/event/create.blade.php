<x-app-layout>
    <x-slot name="htitle">
        <x-icon.event />
        Cadastrar Evento
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.event.index') }}">TODOS OS EVENTOS</a></li>
    </x-slot>

    <livewire:system.event.create />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.event.index') }}"><x-icon.event /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Cadastrar Evento</span>
    </x-slot>
</x-app-layout>


