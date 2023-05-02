<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Evangelismo Explosivo </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-efe9de42.css') }}" /> --}}

    @stack('head')

</head>
<body>

    <div class="whois-content"> <div class="whois"> <span> &#171; {{ session('login-role') == 6 ? 'Professor' : 'Escritório' }} &#187;</span> </div> </div>

    <header>
        <nav class="navigation">
            <div class="icontainer">
                <a href="{{ route('system.event.index') }}" rel="logomarca" class="brand">
                    <x-icon.logo />
                </a>

                <div class="flex items-center">

                    @if (session('login-role') == 6)
                        @livewire('system.navigation-teacher')
                    @else
                        @livewire('system.navigation-office')
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <div id="btn-login-1"><a class="px-6 py-1 text-sm bg-black hover:bg-black/70 rounded-3xl text-slate-300" @click.prevent="$root.submit();" href="{{ route('logout') }}">Sair</a></div>
                    </form>
                </div>

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
                {{-- <div class="search-content">
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
                </div> --}}


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
    @stack('scripts')
    {{-- <script src="{{ asset('build/assets/app-4d2b66eb.js') }}"></script> --}}
</body>
</html>
