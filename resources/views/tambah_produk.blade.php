<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Produk</title>
</head>
<body>
    <div class="bg-slate-50 w-screen h-screen flex">
        <x-sidebar></x-sidebar>
        <div class="w-full p-6">
            <h1 class="text-2xl font-bold text-green-500">Tambah Produk</h1>
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 bg-white p-6 rounded-lg shadow-md">
                @csrf
                
                <label class="block font-medium">Kode</label>
                <input type="text" name="kode" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>

                <label class="block font-medium">Nama</label>
                <input type="text" name="nama" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>
                
                <label class="block font-medium">Harga</label>
                <input type="number" step="0.000001" name="harga" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>

                <label class="block font-medium">Stok</label>
                <input type="number" name="stok" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>

                <label class="block font-medium">Foto</label>
                <input type="file" name="foto" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" accept="image/*" required>

                <button type="submit" class="bg-green-400 w-full text-white px-4 py-2 rounded-md">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
