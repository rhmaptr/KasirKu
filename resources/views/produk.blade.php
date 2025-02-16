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
        <div class="bg-slate-50 w-[250px] h-10 ml-4 mt-2 flex items-center gap-2">
            <div class="w-[30px] h-[30px] flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" viewBox="0 0 24 24">
                    <path
                        d="M19 3h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2ZM5 20V9h14v11H5Z" />
                </svg>
            </div>
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
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        </script>
        <div class="bg-green-100 w-[1217px] h-[150px] mt-[65px] ml-[-1217px] rounded-[15px] shadow-lg">
            <p class="text-green-400 text-[23px] font-medium mt-2 ml-4">Bekerjalah Dengan Teliti!</p>
            <p class="text-slate-400 text-[13px] font-medium ml-4">Klik 'tambah produk' jika anda ingin menambahkan data
                produk</p>
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
            <div id="tambah_produk"
                class="bg-[#50C878] w-[180px] h-[40px] ml-4 mt-2 rounded-[10px] flex shadow-lg cursor-pointer hover:bg-green-400">
                <div class="bg-transparent w-[30px] h-[30px] ml-2 mt-[5px] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000" viewBox="0 0 256 256">
                        <path
                            d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z">
                        </path>
                    </svg>
                </div>
                <div class="bg-transparent w-[135px] h-[30px] mt-[5px] pt-1 pl-1 font-medium">Tambah Produk</div>
            </div>

            <script>
            document.getElementById("tambah_produk").addEventListener("click", function() {
                window.location.href = "/tambah_produk";
            });
            </script>

            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-green-400">
                        <th class="p-2 border text-white">Kode</th>
                        <th class="p-2 border text-white">Nama</th>
                        <th class="p-2 border text-white">Harga</th>
                        <th class="p-2 border text-white">Stok</th>
                        <th class="p-2 border text-white">Foto</th>
                        <th class="p-2 border text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($produk) && count($produk) > 0)
                    @foreach ($produk as $item)
                    <tr class="border-b">
                        <td class="p-2 text-center">{{ $item->kode }}</td>
                        <td class="p-2">{{ $item->nama }}</td>
                        <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="p-2 text-center">{{ $item->stok }}</td>
                        <td class="p-2 text-center">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Produk" class="w-16 h-16 rounded">
                        </td>
                        <td class="p-2 text-center flex justify-center gap-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('produk.edit', $item->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
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
                            Tidak ada data produk.
                        </td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>