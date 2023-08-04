<form method="post">
    @csrf

    <table>
        <tr>
            <th>name</th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>mail</th>
            <td><input type="email" name="mail"></td>
        </tr>
        <tr>
            <th>age</th>
            <td><input type="number" name="age"></td>
        </tr>

        <tr>
            <th></th>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>
