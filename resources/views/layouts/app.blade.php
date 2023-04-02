<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evangelismo Explosivo</title>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-c26783b2.css') }}">
    @livewireStyles

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    @stack('head')

</head>
<body>

    <div class="whois-content">
        <div class="whois">
            <span> &#171;
                @if (session('login-role') == 6) Professor @else Escritório @endif
            &#187;</span>
        </div>
    </div>

    <header>
        <nav class="navigation">
            <div class="icontainer">
                <a href="{{ route('system.event.index') }}" rel="logomarca" class="brand">
                    <x-icon.logo />
                </a>
                <div class="btns">
                    <a href="/login.html" id="btn-login-0">
                        <svg class="link-login-devmedia" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0)">
                                <path class="login-usuario" d="M29.874,22.626a17.433,17.433,0,0,0-6.65-4.171,10.117,10.117,0,1,0-11.449,0A17.528,17.528,0,0,0,0,35H2.734a14.766,14.766,0,1,1,29.531,0H35A17.386,17.386,0,0,0,29.874,22.626ZM17.5,17.5a7.383,7.383,0,1,1,7.383-7.383A7.391,7.391,0,0,1,17.5,17.5Z" transform="translate(0)"></path>
                            </g>
                        </svg>
                    </a>
                    <button class="btn-menu" onclick="show_menu()"><img src="{{ asset('img/menu.png') }}" alt="menu"></button>
                </div>
                <ul>

                    @if (session('login-role') == 6)
                    @livewire('system.navigation-teacher')
                    @else
                    @livewire('system.navigation-office')
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <li id="btn-login-1"><a @click.prevent="$root.submit();" href="{{ route('logout') }}">Sair</a></li>
                    </form>
                </ul>

            </div>
        </nav>
        <nav class="section-title">
            <div class="icontainer">
                <div class="s-title">
                    <h1>{{ $htitle ?? '' }}</h1>
                    <ul> {{ $hmenu ?? '' }} </ul>
                </div>
                <div class="search"><button type="button" id="btn-search">&#128270;</button></div>
            </div>
        </nav>

        <div id="section-search" class="">

            <!-- buscar -->
            <div class="icontainer">
                <input type="text" class="input-search" placeholder="Buscar...">

                <!-- Conteúdo da busca -->
                <div class="search-content">
                    <div class="search-items">
                        <div class="items people">
                            <div class="title">Pessoas:</div>
                            <div class="cards">
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                            </div>
                        </div>
                        <div class="items churches">
                            <div class="title">Igrejas:</div>
                            <div class="cards">
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                            </div>
                        </div>
                        <div class="items courses">
                            <div class="title">Cursos:</div>
                            <div class="cards">
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                                <div class="card">conteúdo...</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </header>

    <main>
        <div class="icontainer">
            {{ $slot }}
        </div>
    </main>

    <div class="breadcrumb">
        <div class="icontainer">
            {{ $breadcrumb }}
        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('build/assets/app-4d2b66eb.js') }}"></script>
</body>
</html>
