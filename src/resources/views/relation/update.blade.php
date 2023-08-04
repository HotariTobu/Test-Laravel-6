<form method="post">
    @csrf

    <table>
        <tr>
            <th>id</th>
            <td><input type="number" name="id"></td>
        </tr>

        <tr>
            <th>person_id</th>
            <td><input type="number" name="person_id"></td>
        </tr>
        <tr>
            <th>title</th>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <th>message</th>
            <td><input type="text" name="message"></td>
        </tr>

        <tr>
            <th></th>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>
