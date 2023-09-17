<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <body>
        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                <td>{{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d-M-Y G:ia') }}</td>
            </tr>
        @endforeach
    </body>
    <foot>
        <tr>
            <td colspan="3">Jumlah Data: {{ count($data_buku) }}</td>
            <td colspan="3">Total Harga Semua Buku: {{ "Rp ".number_format($data_buku->sum('harga'), 2, ',', '.') }}</td>
        </tr>
    </foot>
</table>