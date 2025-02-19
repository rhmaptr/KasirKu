<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>KasirKu</title>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <div class="bg-slate-50 w-screen h-screen flex">
        <x-sidebar></x-sidebar>
        <div class="bg-slate-50 w-[250px] h-10 ml-4 mt-2 flex items-center gap-2">
            <p id="currentDate" class="text-green-400 font-bold"></p>
        </div>
        <div class="bg-slate-50 w-[240px] h-10 mt-2 ml-[720px] flex gap-1">
            <p class="text-center text-green-400 font-semibold pt-2 ml-[75px]">Nama Pengguna</p>
            <div class="bg-slate-50 w-[30px] h-[30px] mt-1">
                <Image />
            </div>
        </div>
        <script>
            document.getElementById("currentDate").textContent = new Date().toLocaleDateString("id-ID", {
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
            });
        </script>
        <div class="bg-green-100 w-[1217px] h-[150px] mt-[65px] ml-[-1217px] rounded-[15px] shadow-lg">
            <p class="text-green-400 text-[23px] font-medium mt-2 ml-4">Bekerjalah Dengan Teliti!</p>
            <p class="text-slate-400 text-[13px] font-medium ml-4">Ayo bekerja dengan teliti lakukan apa yang harus
                kerjakan</p>
            <img src="laptop.png" alt="" class="ml-[900px] mt-[-62px] w-[223px] h-[153px]" />
        </div>
        <div class="bg-white w-[1217px] h-[390px] flex-col mt-[230px] ml-[-1217px] rounded-[15px] shadow-lg flex">
            <div class="bg-sky-400 w-[1179px] h-[50px] rounded-[15px] mt-2 ml-4 flex">
                <input
                    class=" bg-white w-[1150px] h-[50px] rounded-tl-[13px] rounded-bl-[13px] shadow-lg text-black pl-4 font-medium"
                    placeholder="Telusuri..."></input>
                <div
                    class="bg-slate-100 w-[55px] h-[50px] pt-[9px] pl-[12px] rounded-br-[13px] rounded-tr-[13px] cursor-pointer shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256">
                        <path
                            d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z">
                        </path>
                    </svg>
                </div>
            </div>

            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-green-400">
                        <th class="p-2 border text-white">No</th>
                        <th class="p-2 border text-white">Nama Lengkap</th>
                        <th class="p-2 border text-white">Username</th>
                        <th class="p-2 border text-white">Kata Sandi</th>
                        <th class="p-2 border text-white">Hak Akses</th>
                        <th class="p-2 border text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($pengguna) && count($pengguna) > 0)
                    @foreach ($pengguna as $item)
                    <tr class="border-b">
                        <td class="p-2 text-center">{{ $item->id }}</td>
                        <td class="p-2 text-center">{{ $item->akses }}</td>
                        <td class="p-2 text-center">{{ $item->nama }}</td>
                        <td class="p-2 text-center">{{ $item->username }}</td>
                        <td class="p-2 text-center">{{ $item->password }}</td>
                        <td class="p-2 text-center flex justify-center gap-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('pelanggan.edit', $item->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center p-4 text-green-500 text-lg font-semibold">
                            Tidak ada data Pengguna.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Menangani pencarian
        document.querySelector('input[placeholder="Telusuri..."]').addEventListener('input', function() {
            const query = this.value.toLowerCase(); // Mengambil input pencarian
            const rows = document.querySelectorAll('tbody tr'); // Menangkap semua baris tabel

            rows.forEach(row => {
                const columns = row.querySelectorAll('td'); // Mengambil setiap kolom dalam baris
                let matched = false;

                columns.forEach(col => {
                    if (col.textContent.toLowerCase().includes(query)) {
                        matched = true; // Jika ada teks yang cocok dengan query
                    }
                });

                // Menampilkan atau menyembunyikan baris berdasarkan hasil pencarian
                if (matched) {
                    row.style.display = ''; // Menampilkan baris
                } else {
                    row.style.display = 'none'; // Menyembunyikan baris
                }
            });
        });
    </script>
</body>

</html>