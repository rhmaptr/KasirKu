<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>KasirKu</title>
</head>

<body class="flex items-center justify-center h-screen bg-slate-50">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-xl border border-gray-200">
        <h2 class="text-3xl font-semibold text-gray-900 mb-6 text-center">Edit Produk</h2>

        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-800 font-medium mb-2">Nama Produk</label>
                <input type="text" name="nama" value="{{ $produk->nama }}"
                    class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-800 font-medium mb-2">Harga</label>
                    <input type="number" name="harga" value="{{ $produk->harga }}"
                        class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                </div>
                <div>
                    <label class="block text-gray-800 font-medium mb-2">Stok</label>
                    <input type="number" name="stok" value="{{ $produk->stok }}"
                        class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                </div>
            </div>

            <div>
                <label class="block text-gray-800 font-medium mb-2">Foto Produk</label>
                <input type="file" name="foto" class="w-full border border-gray-300 p-3 rounded-lg bg-gray-50">
                <div class="mt-4 flex items-center gap-4">
                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk"
                        class="w-24 h-24 rounded-lg shadow-md border">
                    <span class="text-sm text-gray-500">Preview Gambar</span>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6 gap-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-3 rounded-lg font-medium shadow-md hover:shadow-lg hover:from-blue-700 hover:to-blue-600 transition duration-300">
                    Perbarui
                </button>
                <a href="{{ route('produk.index') }}"
                    class="w-full text-center text-gray-600 font-medium hover:text-gray-800 transition duration-200">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>