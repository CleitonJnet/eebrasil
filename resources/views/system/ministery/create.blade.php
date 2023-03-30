<x-app-layout>
    <x-slot name="htitle">
        <x-icon.ministery />
        Cadastrar ministério
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.ministery.index') }}">LISTAR TODOS</a></li>
    </x-slot>

    <livewire:system.ministery.create />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.ministery.index') }}"><x-icon.ministery /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Cadastrar ministério</span>
    </x-slot>
</x-app-layout>


