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
        <div class="bg-white w-80 h-64 mt-[20px] ml-[30px] rounded-[20px] shadow-xl">
            <h2 class="text-green-500 text-center font-semibold text-[25px] mt-[40px]">PENGINGAT</h2>
            <p class="text-center text-gray-600 ml-2 mr-2 font-semibold pt-2">Jangan lupa berdoa sebelum memulai
                pekerjaan, agar selalu diberikan kemudahan oleh Tuhan Yang Maha Esa.</p>
        </div>
        <div class="bg-white w-[800px] h-[310px] mt-[20px] ml-4 rounded-[20px] shadow-xl">
            <h2 class="text-green-500 text-center font-semibold text-[25px] mt-[20px]">Data Produk</h2>
            <div class="bg-white w-[800px] h-[250px] overflow-y-auto no-scrollbar rounded-[20px] mt-4">
                @if(isset($produk) && $produk->count() > 0)
                @foreach ($produk as $item)
                <div class="bg-transparent w-[765px] h-[50px] ml-4 mt-4 rounded-[5px] flex shadow-lg">
                    <div class="bg-transparent w-[100px] h-[50px]">
                        <div class="bg-slate-300 w-[70px] h-[40px] ml-2 mt-[5px] rounded-[10px]"></div>
                    </div>
                    <div class="bg-transparent w-[200px] h-[50px]">
                        <div class="bg-transparent w-[150px] h-[25px] ml-[10px] mt-[13px] line-clamp-1 text-black text-center font-medium">
                            {{ $item->kode_produk }}
                        </div>
                    </div>
                    <div class="bg-transparent w-[200px] h[50px]">
                        <div class="bg-transparent w-[150px] h-[25px] ml-[10px] mt-[13px] line-clamp-1 text-black text-center font-medium">
                            {{ $item->nama }}
                        </div>
                    </div>
                    <div class="bg-transparent w-[200px] h-[50px]">
                        <div class="bg-transparent w-[150px] h-[25px] ml-[10px] mt-[13px] line-clamp-1 text-black text-center font-medium">
                            {{ $item->stok }}
                        </div>
                    </div>
                    <div class="bg-transparent w-[200px] h-50px]">
                        <div class="bg-transparent w-[150px] h-[25px] ml-[10px] mt-[13px] flex justify-center items-center">
                            <div class="bg-transparent w-[30px] h-[25px] text-center text-black font-medium">Rp.</div>
                            <div class="bg-transparent h-[25px] text-center text-black font-medium line-clamp-1">{{ number_format($item->harga, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="w-full h-full flex items-center justify-center">
                    <p class="text-green-500 font-semibold">Tidak ada data produk.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>