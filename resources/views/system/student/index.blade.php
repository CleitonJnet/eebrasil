<x-app-layout>
    <x-slot name="htitle">
        <x-icon.student />
        Lista de Alunos
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.event.view', $id) }}">EVENTO</a></li>
    </x-slot>

    <livewire:system.student.index :event="$id" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.student.index', $id) }}"><x-icon.student /></a>
    </x-slot>
</x-app-layout>
