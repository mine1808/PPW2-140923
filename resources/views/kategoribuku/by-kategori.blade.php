<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Buku by Kategori') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 5%">
        <h3>Kategori: {{ $kategori->nama_kategori }}</h3>

        @foreach($buku as $buku)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $buku->judul }}</h5>
                    <p class="card-text">Penulis: {{ $buku->penulis }}</p>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
