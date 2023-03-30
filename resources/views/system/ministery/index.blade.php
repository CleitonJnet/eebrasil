<x-app-layout>
    <x-slot name="htitle">
        <x-icon.ministery />
        Ministérios
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.ministery.create') }}">CADASTRAR</a></li>
    </x-slot>

    <livewire:system.ministery.index />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.ministery.index') }}"><x-icon.ministery /></a>
    </x-slot>
</x-app-layout>
