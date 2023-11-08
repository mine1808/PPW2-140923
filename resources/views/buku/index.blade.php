<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
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
    <td>
        <form action="{{ route('buku.search') }}" method="get">
            @csrf
            <input type="text" name="kata" class="form-control" placeholder="Cari..." style="width: 30%;
            display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
            </form>
    </td>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
                @if(Auth::check() && Auth::user()->level=='admin')
                <th colspan="2">Aksi</th>
                @endif
            </tr>
        </thead>
    <tbody>
        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ number_format($buku->harga, 0, ',', ',') }}</td>
                <td>{{ $buku->tgl_terbit }}</td>
                @if(Auth::check() && Auth::user()->level == 'admin')
                <td>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                        @csrf
                        <button onclick="return confirm('yakin mau dihapus?')">Hapus</button>
                    </form>
                </td>
                <td>
                    <button><a href="{{ route('buku.edit', $buku->id) }}">Edit</a></button> 
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
            <td colspan="3">Jumlah Data: {{ count($data_buku) }}</td>
            </tr>
            <tr>
            <td colspan="3">Total Harga Semua Buku: {{ "Rp ".number_format($data_buku->sum('harga'), 2, ',', '.') }}</td>            
            </tr>
        </tfoot>
    </table>
    <div>{{ $data_buku->links() }}</div>
    <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
    @if(Auth::check() && Auth::user()->level == 'admin')
    <p align="center"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>
</body>
</html>