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
            <h1 class="text-2xl font-bold text-green-400">Tambah Pengguna</h1>
            <form action="" method="POST" enctype="multipart/form-data" class="mt-4 bg-white p-6 rounded-lg shadow-md">
                @csrf

                <label class="block font-medium">Hak Akses</label>
                <select name="akses" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                </select>

                <label class="block font-medium">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>
                
                <label class="block font-medium">Nama Pengguna</label>
                <input type="text" name="username" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>
                
                <label class="block font-medium">Kata Sandi</label>
                <input type="password" name="password" class="w-full border-2 p-2 rounded-md mb-4 focus:border-green-400 outline-none" required>
                
                <button type="submit" class="bg-green-400 w-full text-white px-4 py-2 rounded-md">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
