<x-app-layout>
    <x-slot name="htitle">
        <x-icon.event />
        Editar Evento
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.event.index') }}">TODOS OS EVENTOS</a></li>
        <li><a href="{{ route('system.event.view',$id) }}">EXIBIR</a></li>
    </x-slot>

    <livewire:system.event.edit :event="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.event.index') }}"><x-icon.event /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <a href="{{ route('system.event.view',$id) }}">Exibir</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Editar Evento</span>
    </x-slot>
</x-app-layout>
