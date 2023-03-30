<x-app-layout>
    <x-slot name="htitle">
        <x-icon.event />
        Eventos
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.event.create') }}">ADICIONAR EVENTO</a></li>
        <li><a href="{{ route('system.event.index', date('Y')) }}">EVENTOS DE {{ date('Y') }}</a></li>
        @if($training_last_year     >= 1)<li><a href="{{ route('system.event.index', date('Y') - 1) }}">EVENTOS DE {{ date('Y') - 1 }}</a></li> @endif
        @if($training_previous_year >= 1)<li><a href="{{ route('system.event.index', date('Y') - 2) }}">EVENTOS DE {{ date('Y') - 2 }}</a></li> @endif
        @if($training_all_years     >  1)<li><a href="{{ route('system.event.index', 'all') }}">TODOS OS ANOS              </a></li> @endif
    </x-slot>

    <livewire:system.event.index :year="$year" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.event.index') }}"><x-icon.event /></a>
    </x-slot>
</x-app-layout>
