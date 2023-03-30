<x-app-layout>
    <x-slot name="htitle">
        <x-icon.people />
        Cadastrar perfil
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.people.index') }}">LISTAR TODOS</a></li>
    </x-slot>

    <livewire:system.people.create />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.people.index') }}"><x-icon.people /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Cadastrar perfil</span>
    </x-slot>
</x-app-layout>


