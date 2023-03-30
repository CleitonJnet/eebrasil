<x-app-layout>
    <x-slot name="htitle">
        <x-icon.people />
        Editar perfil
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.people.index') }}">LISTAR TODOS</a></li>
        <li><a href="{{ route('system.people.view',$id) }}">EXIBIR</a></li>
    </x-slot>

    <livewire:system.people.edit :profile="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.people.index') }}"><x-icon.people /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <a href="{{ route('system.people.view',$id) }}">Exibir</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Editar perfil</span>
    </x-slot>
</x-app-layout>
