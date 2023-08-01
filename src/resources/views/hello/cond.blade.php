<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template/Blade/cond</title>
</head>

<body>
    <h1>Template/Blade/cond</h1>
    @empty ($msg)
        <p>input message as a path part</p>
    @else
        <?php $len = strlen($msg) ?>
        @if ($len < 5)
            <p>short message</p>
        @elseif ($len < 10)
            <p>middle message</p>
        @else
            <p>long message</p>
        @endif
    @endempty

    @isset ($len)
        <p>$len is set</p>

        <p>{{ var_dump($msg) }}</p>

        @unless ($len % 2 == 0)
            <p>odd</p>
        @else
            <p>even</p>
        @endunless
    @else
        <p>$len is not set</p>
    @endisset
</body>

</html>