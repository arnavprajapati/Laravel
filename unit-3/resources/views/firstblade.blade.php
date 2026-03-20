<div>
    <p>This is the first blade file.</p>
    <h1>Hello {{ $name }}</h1>
    <h1>Reversed Languages</h1>
    <ul>
        @foreach($languages as $lang)
        <li>{{ $lang }}</li>
        @endforeach
    </ul>
</div>