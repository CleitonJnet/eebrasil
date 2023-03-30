<x-app-layout>
    <x-slot name="htitle">
        <x-icon.church />
        Cadastrar igreja
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.church.index') }}">LISTAR TODAS</a></li>
    </x-slot>

    <livewire:system.church.create />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.church.index') }}"><x-icon.church /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Cadastrar igreja</span>
    </x-slot>
</x-app-layout>


