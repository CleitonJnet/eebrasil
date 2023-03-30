<x-app-layout>
    <x-slot name="htitle">
        <x-icon.ministery />
        Informações do ministério
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.ministery.index') }}">LISTAR TODOS</a></li>
        <li><a href="{{ route('system.ministery.edit',$id) }}">EDITAR</a></li>
    </x-slot>

    <livewire:system.ministery.view :ministery="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.ministery.index') }}"><x-icon.ministery /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Informações do ministério</span>
    </x-slot>
</x-app-layout>
