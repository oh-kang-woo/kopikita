@extends('admin.dashAdmin')

@section('content')

<div class="max-w-6xl mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-6 text-coffee-dark">Kelola Kedai Kopi</h1>

    <a href="{{ route('admin.kedai.create') }}"
       class="px-4 py-2 bg-mocha-light text-white rounded-lg shadow">
        + Tambah Kedai Kopi
    </a>

    <div class="mt-6 bg-white shadow p-6 rounded-xl">

        @foreach($kedai as $k)
            <div class="border-b py-4 flex justify-between items-center">

                <div>
                    <h2 class="text-lg font-semibold">{{ $k->nama }}</h2>
                    <p class="text-sm text-gray-600">{{ $k->lokasi }}</p>
                </div>

                <div class="flex gap-2">

                    <a href="{{ route('admin.kedai.edit', $k->id) }}"
                       class="px-3 py-1 bg-blue-500 text-white rounded">Edit</a>

                    <form action="{{ route('admin.kedai.delete', $k->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 bg-red-500 text-white rounded">
                            Hapus
                        </button>
                    </form>

                </div>
            </div>
        @endforeach

    </div>

</div>

@endsection
