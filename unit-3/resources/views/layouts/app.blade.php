<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
</head>

<body>
    <h1>This is main page</h1>
    <header>
        <p>This is the header</p>
    </header>
    <main>
        <img src="{{ asset('images/King.jpg') }}" style="width: 190px; height: 350px;" alt="">
        <img src="{{ asset('images/king-wall.jpg') }}" style="width: 190px;height: 350px;" alt="">
        <img src="{{ asset('images/roko-entry.jpg') }}" style="width: 190px;height:350px;" alt="">
        @yield('data')
    </main>
    <footer>
        <p>&copy; 2023 My App. All rights reserved.</p>
    </footer>
</body>