<x-app-layout>
    <x-slot name="htitle">
        <x-icon.church />
        Informações da Igreja
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.church.index') }}">LISTAR TODAS</a></li>
        <li><a href="{{ route('system.church.edit',$id) }}">EDITAR</a></li>
    </x-slot>

    <livewire:system.church.view :church="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.church.index') }}"><x-icon.church /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Informações da Igreja</span>
    </x-slot>
</x-app-layout>
