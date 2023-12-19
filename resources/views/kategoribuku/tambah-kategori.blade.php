<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kategori Buku') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 5%">
        @if(Session::has('pesan'))
            <div class="alert alert-success fade show" id="success-alert" role="alert">{{ Session::get('pesan') }}</div>
        @endif

        @if(count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li style="list-style: none;">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{ route('buku.tambahKategori', $buku->id) }}">
            @csrf
            <div class="form-group">
                <label for="kategori_ids">Pilih Kategori:</label>
                <select name="kategori_ids[]" class="form-control" multiple>
                    @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan Kategori</button>
        </form>
    </div>

</x-app-layout>
