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
        <h2 class="text-3xl font-semibold text-gray-900 mb-6 text-center">Edit Pelanggan</h2>

        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-800 font-medium mb-2">Nama</label>
                <input type="text" name="nama" value="{{ $pelanggan->nama }}"
                    class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-800 font-medium mb-2">Alamat</label>
                    <input type="text" name="harga" value="{{ $pelanggan->alamat }}"
                        class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                </div>
                <div>
                    <label class="block text-gray-800 font-medium mb-2">Nomor HP</label>
                    <input type="text" name="stok" value="{{ $pelanggan->no_hp }}"
                        class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                </div>
            </div>

            <div class="flex items-center justify-between mt-6 gap-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-3 rounded-lg font-medium shadow-md hover:shadow-lg hover:from-blue-700 hover:to-blue-600 transition duration-300">
                    Perbarui
                </button>
                <a href="{{ route('pelanggan') }}"
                    class="w-full text-center text-gray-600 font-medium hover:text-gray-800 transition duration-200">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>