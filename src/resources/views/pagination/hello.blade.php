<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<table>
    <tr>
        <th>Name</th>
        <th>Mail</th>
        <th>Age</th>
    </tr>

    @foreach ($people as $person)
        <tr>
            <td>{{ $person->name }}</td>
            <td>{{ $person->mail }}</td>
            <td>{{ $person->age }}</td>
        </tr>
    @endforeach
</table>

{{ $people->links() }}
