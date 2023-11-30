<!DOCTYPE html>
<html>
<head>
    <title>List Buku</title>
</head>
<body>

    <h1>List Buku</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Judul Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
                <tr>
                    <td><img src="{{ asset('path/to/foto/' . $buku->foto) }}" alt="Foto Buku"></td>
                    <td>{{ $buku->judul }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>