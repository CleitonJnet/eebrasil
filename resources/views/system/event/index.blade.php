<x-app-layout>
    <x-slot name="htitle">
        <x-icon.event />
        <div class="relative group">
            {{ $year == 'all' ? 'Todos os Eventos' : 'Eventos de '.$year }} &#9662;
            <div class="absolute right-0 hidden gap-1 p-1 text-right rounded-md shadow-md bg-black/80 backdrop:blur-xl group-hover:grid">
                <a class="block px-4 py-2 text-xs text-center text-white rounded-md bg-sky-600 hover:bg-sky-700" href="{{ route('system.event.index', date('Y')) }}">{{ date('Y') }}</a>
                @if($training_last_year     >= 1)<a class="block px-4 py-2 text-xs text-center text-white transition rounded-md bg-sky-600 hover:bg-sky-700" href="{{ route('system.event.index', date('Y') - 1) }}">{{ date('Y') - 1 }}</a> @endif
                @if($training_previous_year >= 1)<a class="block px-4 py-2 text-xs text-center text-white transition rounded-md bg-sky-600 hover:bg-sky-700" href="{{ route('system.event.index', date('Y') - 2) }}">{{ date('Y') - 2 }}</a> @endif
                @if($training_all_years     >  1)<a class="block px-4 py-2 text-xs text-center text-white transition rounded-md bg-sky-600 hover:bg-sky-700" href="{{ route('system.event.index', 'all') }}">TODOS                      </a> @endif
            </div>
        </div>
    </x-slot>
    <x-slot name="hmenu">
        <li><a href="{{ route('system.event.create') }}">ADICIONAR EVENTO</a></li>
        <li><a href="{{ route('system.event.report') }}">RELATÓRIO</a></li>
    </x-slot>

    <livewire:system.event.index :year="$year" />

    <x-slot name="breadcrumb">
        <a href="{{ route('system.event.index') }}"><x-icon.event /></a>
    </x-slot>
</x-app-layout>
