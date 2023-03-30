<x-app-layout>
    <x-slot name="htitle">
        <x-icon.people />
        Informações do perfil
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.people.index') }}">LISTAR TODOS</a></li>
        <li><a href="{{ route('system.people.edit',$id) }}">EDITAR</a></li>
    </x-slot>

    <livewire:system.people.view :profile="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.people.index') }}"><x-icon.people /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Informações do perfil</span>
    </x-slot>
</x-app-layout>
