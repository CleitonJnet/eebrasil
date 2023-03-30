<x-app-layout>
    <x-slot name="htitle">
        <x-icon.event />
        Informações do Evento
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.event.index') }}">LISTAR TODOS</a></li>
        @if(session('login-role') == 6)<li><a href="{{ route('system.event.edit',$id) }}">EDITAR</a></li>@endif
    </x-slot>

    <livewire:system.event.view :event="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.event.index') }}"><x-icon.event /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Informações do Evento</span>
    </x-slot>
</x-app-layout>
