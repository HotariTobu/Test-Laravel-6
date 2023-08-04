<p>{{ $sessionData }}</p>

<form method="post">
    @csrf

    <input type="text" name="input">
    <input type="submit">
</form>
