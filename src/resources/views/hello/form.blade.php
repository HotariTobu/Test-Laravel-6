<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template/Blade/form</title>
</head>

<body>
    <h1>Template/Blade/form</h1>
    <form action="./form" method="post">
        @csrf
        <!-- @csrf is a Blade directive to insert code for against Cross Site Request Forgery -->
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>

</html>