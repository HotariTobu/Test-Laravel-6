<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template/Blade/loop</title>
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
?>

<body>
    <h1>Template/Blade/loop</h1>
    {{-- @for ($i = 5; $i < 10; $i++)
        @for ($j = 0; $j < 5; $j++)
            <p>{{ var_dump($loop) }}</p>
        @endfor
    @endfor --}}
    
    @foreach ($data as $item)
        @foreach ($fruits as $fruit)
            <p>{{ var_dump($loop) }}</p>
        @endforeach
    @endforeach
</body>

</html>