<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{ __('messages.welcome') }}</h1>
    <p>{{ __('messages.name') }}</p>
    <p>{{ __('messages.course') }}</p>
    <p>{{ __('messages.bio') }}</p>
    <p>{{ __('messages.skill') }}</p>

    <form>
        @csrf
        <select onchange="window.location.href=this.value" name="" id="">
            <option>Select Language</option>
            <option value="/lang/locale/en">English</option>
            <option value="/lang/locale/mr">Marathi</option>
            <option value="/lang/locale/gu">Gujarati</option>
            <option value="/lang/locale/te">Telugu</option>
            <option value="/lang/locale/bh">Bhojpuri</option>
            <option value="/lang/locale/ur">Urdu</option>
            <option value="/lang/locale/hi">Hindi</option>
        </select>
    </form>
</body>

</html>