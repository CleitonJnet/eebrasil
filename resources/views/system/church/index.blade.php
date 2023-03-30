<x-app-layout>
    <x-slot name="htitle">
        <x-icon.church />
        Igrejas
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.church.create') }}">CADASTRAR</a></li>
    </x-slot>

    <livewire:system.church.index />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.church.index') }}"><x-icon.church /></a>
    </x-slot>
</x-app-layout>
