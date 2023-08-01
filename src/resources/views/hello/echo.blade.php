<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template/Blade/echo</title>
</head>

<body>
    <h1>Template/Blade/echo</h1>
    <!-- escaped -->
    <p>{{ $msg }}</p>
    <!-- none escaped -->
    <p>{!! $msg !!}</p>
</body>

</html>