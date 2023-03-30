<div class="px-4">
    <li class="@if(request()->routeIs('system.event.*')) active @endif"><a href="{{ route('system.event.index') }}">
        <x-icon.event />
        <span class="menu-label">Eventos</span>
    </a></li>
    {{-- <li class="@if(request()->routeIs('system.church.*')) active @endif"><a href="{{ route('system.church.index') }}">
        <x-icon.church />
        <span class="menu-label">Igrejas</span>
    </a></li>
    <li class="@if(request()->routeIs('system.people.*')) active @endif"><a href="{{ route('system.people.index') }}">
        <x-icon.people />
        <span class="menu-label">Pessoas</span>
    </a></li>
    <li class="@if(request()->routeIs('system.ministery.*')) active @endif"><a href="{{ route('system.ministery.index') }}">
        <x-icon.ministery />
        <span class="menu-label">Ministérios</span>
    </a></li> --}}
</div>
