<!-- resources/views/buku/moderasi-review.blade.php -->

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Moderasi Review Buku') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 5%">
        @if(Session::has('pesan'))
            <div class="alert alert-success fade show" id="success-alert" role="alert">{{ Session::get('pesan') }}</div>
        @endif

        <h3>Review yang perlu dimoderasi:</h3>

        @foreach($reviews as $review)
            <div class="card mb-3">
                <div class="card-body">
                    <p>{{ $review->isi }}</p>
                    <form method="post" action="{{ route('buku.aproveReview', $review->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Setujui</button>
                    </form>
                    <form method="post" action="{{ route('buku.rejectReview', $review->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
