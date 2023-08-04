<form action="/rest" method="post">
    @csrf

    <table>
        <tr>
            <th>message</th>
            <th>url</th>
        </tr>

        <tr>
            <td>
                <input type="text" name="message" value="{{ old('message') }}">
            </td>
            <td>
                <input type="text" name="url" value="{{ old('url') }}">
            </td>
        </tr>
    </table>

    <input type="submit">
</form>
