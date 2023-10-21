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
    @section('content')
    if(count($data_buku))
        <div class="alert alert-success">Ditemukan <strong>{{count($data_buku)}}</strong> data dengan kata: <strong>{{ $cari }}</strong></div>
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
                <td>{{ number_format($buku->harga, 0, ',', ',') }}</td>
                <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('buku.search) }}" method="get">
                        @csrf
                        <input type="text" name="kata" class="form-control" placeholder="Cari..." style="width: 30%;
                        display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
                    </form>
                </td>
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
            <td colspan="3">Total Harga Semua Buku: {{ "Rp ".number_format($data_buku->sum('harga'), 2, ',', '.') }}</td>            
            </tr>
        </tfoot>
    </table>
    <div>{{ $data_buku->links() }}</div>
    <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
    <p align="center"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>
    
    @else
        <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
        <a href="/buku" class="btn btn-warning">Kembali</a></div>
    @endif
    @endsection
</body>
</html>