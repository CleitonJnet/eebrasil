<x-app-layout>
    <x-slot name="htitle">
        <x-icon.ministery />
        Editar ministério
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.ministery.index') }}">LISTAR TODOS</a></li>
        <li><a href="{{ route('system.ministery.view',$id) }}">EXIBIR</a></li>
    </x-slot>

    <livewire:system.ministery.edit :ministery="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.ministery.index') }}"><x-icon.ministery /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <a href="{{ route('system.ministery.view',$id) }}">Exibir</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Editar ministério</span>
    </x-slot>
</x-app-layout>
