<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:type" content="website" /> <!-- TIPO DE ARQUIVO -->
        <meta property="og:url" content="http://www.eebrasil.org.br" /> <!-- ENDEREÇO DO SITE -->
        <meta property="og:title" content="Evangelismo Explosivo Internacional no Brasil" /> <!-- TITULO DO ARQUIVO -->
        <meta property="og:image" content="https://www.eebrasil.org.br/img/logo.png" /> <!-- IMAGEM DE REFERENCIA DO SITE -->
        <meta property="og:description" content="Evangelismo Explosivo Internacional no Brasil é um ministério que treina as pessoas para compartilhar sua fé em Cristo." /> <!-- DESCRIÇÃO DO SITE -->

        <title>{{ config('app.name', 'Evangelismo Explosivo') }}</title>

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('img/favicon/manifest.json')}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('img/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        @livewireStyles

    </head>
    <body>

        {{ $slot }}

        @livewireScripts
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="{{ asset('js/javascript.js') }}"></script>
    </body>
</html>


