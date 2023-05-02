<ul class="flex px-4 navigation_main">
    <li class="@if(
                request()->routeIs('system.event.*') ||
                request()->routeIs('system.student.*') ||
                request()->routeIs('system.gallery.*') ||
                request()->routeIs('system.ojt.*') ||
                request()->routeIs('system.schedule.*')
                ) active @endif item"><a class="link" href="{{ route('system.event.index') }}">
        <x-icon.event />
        <span class="menu-label">Eventos</span>
    </a></li>

    <li class="relative group item @if(
        request()->routeIs('system.people.*' ) ||
        request()->routeIs('system.church.*' ) ||
        request()->routeIs('system.ministery.*' )
        ) active @endif">
        <div class="link">
            <x-icon.menu />
            <span class="truncate menu-label">Cadastro&#9662;</span>
        </div>
        <div class="hidden group-hover:block">
            <div class="absolute right-0 grid gap-1 p-1 mt-5 text-left rounded-md shadow-md bg-black/80">
                <a class="block px-4 py-2 text-xs text-center text-white rounded-md bg-sky-600 hover:bg-sky-700" href="{{ route('system.people.index') }}">Pessoas</a>
                <a class="block px-4 py-2 text-xs text-center text-white rounded-md bg-sky-600 hover:bg-sky-700" href="{{ route('system.church.index') }}">Igrejas</a>
                <a class="block px-4 py-2 text-xs text-center text-white rounded-md bg-sky-600 hover:bg-sky-700" href="{{ route('system.ministery.index') }}">Ministérios</a>
                <a class="block px-4 py-2 text-xs text-center text-white rounded-md bg-sky-600 hover:bg-sky-700" href="{{ route('system.church.index') }}">Funções</a>
            </div>
        </div>
    </li>


    {{-- <li class="@if(request()->routeIs('system.people.*')) active @endif"><a href="{{ route('system.people.index') }}">
        <x-icon.people />
        <span class="menu-label">Pessoas</span>
    </a></li>
    <li class="@if(request()->routeIs('system.ministery.*')) active @endif"><a href="{{ route('system.ministery.index') }}">
        <x-icon.ministery />
        <span class="menu-label">Ministérios</span>
    </a></li> --}}
</ul>
