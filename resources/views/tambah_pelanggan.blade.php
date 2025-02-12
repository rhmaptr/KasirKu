<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>KasirKu</title>
</head>
<body>
    <div class="bg-slate-50 w-screen h-screen flex">
        <x-sidebar></x-sidebar>
        <div class="w-full p-6">
            <h1 class="text-2xl font-bold text-green-500">Tambah Pelanggan</h1>
            <form action="/pelanggan" method="POST" class="mt-4 bg-white p-6 rounded-lg shadow-md">
                @csrf
                
                <label class="block font-medium">Nama</label>
                <input type="text" name="nama" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>

                <label class="block font-medium">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required></textarea>
                
                <label class="block font-medium">No HP</label>
                <input type="tel" name="no_hp" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>

                <button type="submit" class="bg-green-500 w-full text-white px-4 py-2 rounded-md">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
