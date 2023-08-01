<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template/Blade/repeat</title>
</head>

<?php
$data = [
    'one',
    'two',
    'three',
    'four',
    'five',
];

$fruits = [
    'apple',
    'banana',
    null,
    'grape',
    'lemon',
];
$fruits = [];
?>

<body>
    <h1>Template/Blade/repeat</h1>
    @for ($i = 0; $i < 20; $i++)
        @if ($i % 3 == 0)
            @continue
        @endif

        <p>i = {{ $i }}</p>
    @endfor

    @foreach ($data as $item)
        <p>{{ $item }}</p>
    @endforeach

    @forelse ($fruits as $fruit)
        <p>{{ $fruit }}</p>
    @empty
        <p>empty!</p>
    @endforelse

    <?php $j = 0 ?>
    @while (isset($j))
        @if ($j > 5)
            @break
        @endif

        <p>j = {{ $j++ }}</p>
    @endwhile
</body>

</html>