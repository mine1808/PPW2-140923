<div class="container">
<h4>Edit Buku</h4>
@if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('buku.update',$buku->id)}}" method="POST">
    @csrf
    <div>Judul
            <input type="text" name="judul" id="judul" value="{{$buku->judul}}">
        </div>
        <div>Penulis
            <input type="text" name="penulis" id="penulis" value="{{$buku->penulis}}">
        </div>
        <div>Harga
            <input type="text" name="harga" id="harga" value="{{$buku->harga}}">
        </div>
        <div>Tgl. Terbit
            <input type="text" name="tgl_terbit" id="tgl_terbit"
            class="date form-control" placehorder="yyyy/mm/dd">
        </div>
    <div><button type="submit">Simpan</button></div>
    <a href="/buku"> Batal</a>
</form>
</div>