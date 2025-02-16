@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow-lg">
    <h2 class="text-xl font-bold mb-4">Edit Produk</h2>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nama Produk</label>
            <input type="text" name="nama" value="{{ $produk->nama }}"
                class="w-full border p-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Harga</label>
            <input type="number" name="harga" value="{{ $produk->harga }}"
                class="w-full border p-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Stok</label>
            <input type="number" name="stok" value="{{ $produk->stok }}"
                class="w-full border p-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Foto Produk</label>
            <input type="file" name="foto" class="w-full border p-2 rounded">
            <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk" class="mt-2 w-16 h-16">
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
            <a href="{{ route('produk.index') }}" class="ml-2 text-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
