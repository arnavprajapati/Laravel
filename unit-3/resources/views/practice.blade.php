<p>{{ $name }}</p>

@if($age < 18)
    <p>Not eligible</p>
@elseif($age >= 18 && $age < 65)
    <p>Eligible</p>
@else
    <p>Senior citizen.</p>
@endif