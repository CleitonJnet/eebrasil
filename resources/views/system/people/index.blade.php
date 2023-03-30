<x-app-layout>
    <x-slot name="htitle">
        <x-icon.people />
        Pessoas
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.people.create') }}">CADASTRAR</a></li>
    </x-slot>

    <livewire:system.people.index />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.people.index') }}"><x-icon.people /></a>
    </x-slot>
</x-app-layout>
