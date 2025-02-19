<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="The experimental website of Elliot Dickerson made in Laravel.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elliot &gt; Home</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
    <link rel="stylesheet" href="{{ asset('pages.css') }}">
</head>

<body id="root" class="container">
<nav>
    <ul>
        <li>
            <hgroup><h1 class="title question">Elliot Dickerson</h1>
                <h2 class="title question">A site to test things</h2></hgroup>
        </li>
    </ul>
    <ul>
        <li><a href="/" class="active">Home</a></li>
        <li><a href="/about" class="inactive">About</a></li>
        <li><a href="/interests" class="inactive">Interests</a></li>
    </ul>
</nav>
<main>
    <header>
        <h2 class="title">{{ $title }}</h2>
    </header>
    @foreach($body as $paragraph)
        <p>{!! $paragraph !!}</p>
    @endforeach
</main>
</body>
</html>
