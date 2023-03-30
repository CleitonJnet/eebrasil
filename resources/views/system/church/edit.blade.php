<x-app-layout>
    <x-slot name="htitle">
        <x-icon.church />
        Editar igreja
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.church.index') }}">LISTAR TODAS</a></li>
        <li><a href="{{ route('system.church.view',$id) }}">EXIBIR</a></li>
    </x-slot>

    <livewire:system.church.edit :church="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.church.index') }}"><x-icon.church /></a>
        <span class="breadcrumb-separator">&#8250;</span>
        <a href="{{ route('system.church.view',$id) }}">Exibir</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>Editar igreja</span>
    </x-slot>
</x-app-layout>
