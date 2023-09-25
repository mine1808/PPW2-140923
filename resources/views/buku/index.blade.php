<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKUKU</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #e0e0e0;
        }

        tfoot tr {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
    <tbody>
        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                <td>{{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d-M-Y G:ia') }}</td>
                <td>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                        @csrf
                        <button onclick="return confirm('yakin mau dihapus?')">Hapus</button>
                    </form>
                </td>
                <td>
                    <button><a href="{{ route('buku.edit', $buku->id) }}">Edit</a></button> 
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
            <td colspan="3">Jumlah Data: {{ count($data_buku) }}</td>
            </tr>
            <tr>
            <td colspan="3">Total Harga Semua Buku: {{ "Rp ".number_format($data_buku->sum('harga'), 2, ',', '.') }}</td>            </tr>
        </tfoot>
    </table>
    <p align="center"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>
</body>
</html>