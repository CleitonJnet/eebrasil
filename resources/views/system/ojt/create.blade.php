<x-app-layout>
    <x-slot name="htitle">
        <svg width="20px" fill="currentColor" viewBox="0 0 24 24" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"><path d="M9 24H1a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm-2-4H1a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2Zm-2-4H1a1 1 0 0 1 0-2h4a1 1 0 0 1 0 2Zm8 7.955a1 1 0 0 1-.089-2A10 10 0 1 0 2.041 11.09a1 1 0 0 1-1.992-.18A12 12 0 0 1 24 12a11.934 11.934 0 0 1-10.91 11.951.917.917 0 0 1-.09.004ZM12 6a1 1 0 0 0-1 1v5a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V7a1 1 0 0 0-1-1Z"/></svg>
        Cadastro de Visita
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.event.view',$id) }}">EVENTO</a></li>
        <li><a href="{{ route('system.ojt.index',$id) }}">LISTA DE VISITAS</a></li>
    </x-slot>

    <livewire:system.ojt.create :event="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.event.index') }}"><x-icon.event /></a>
    </x-slot>
</x-app-layout>
