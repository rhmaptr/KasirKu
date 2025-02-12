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
        <div class="bg-slate-50 w-[250px] h-10 ml-4 mt-2 flex gap-2">
            <div class="bg-slate-50 w-[30px] h-[30px] mt-1">
                <Image />
            </div>
            <p class="text-center text-green-400 font-bold pt-2"> ini adalah tanggal</p>
        </div>
        <div class="bg-slate-50 w-[240px] h-10 mt-2 ml-[720px] flex gap-1">
            <p class="text-center text-green-400 font-semibold pt-2 ml-[75px]">Nama Pengguna</p>
            <div class="bg-slate-50 w-[30px] h-[30px] mt-1">
                <Image />
            </div>
        </div>
        <div class="bg-black w-[1220px] h-[1px] mt-12 ml-[-1220px]"></div>
        <div class="bg-slate-50 w-[635px] h-[557px] mt-[60px] ml-[-1220px]">
            <div class="bg-sky-400 w-[625px] h-[50px] rounded-[15px] flex">
                <input
                    class=" bg-white w-[570px] h-[50px] rounded-tl-[13px] rounded-bl-[13px] shadow-lg text-black pl-4 font-medium"
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
            <div
                class="bg-slate-100 w-[600px] h-[500px] ml-[15px] mt-4 flex flex-wrap content-start gap-4 overflow-y-auto no-scrollbar">
                <div class="bg-slate-400 w-[290px] h-[150px] mt-2 rounded-[20px] shadow-lg cursor-pointer">
                    <div class="bg-pink-200 w-[140px] h-[150px] rounded-tl-[20px] rounded-bl-[20px]">
                        <Image />
                    </div>
                    <div
                        class="bg-slate-200 w-[125px] h-[25px] ml-[150px] mt-[-140px] text-black font-semibold text-[15px]">
                        Icon Login</div>
                    <div class="bg-blue-200 w-[125px] h-[30px] ml-[150px] flex">
                        <div class="bg-red-300 w-[30px] h-[30px] text-center pt-[3px] text-black font-medium">Rp.</div>
                        <div class="bg-yellow-300 w-[95px] h-[30px] pt-[3px] text-black font-medium line-clamp-1">1.000
                        </div>
                    </div>
                    <div class="bg-green-400 w-[125px] h-[30px] ml-[150px] mt-[45px] flex">
                        <div class="bg-purple-300 w-[45px] h-[30px] flex">
                            <div class="bg-sky-400 w-[40px] h-[30px] text-center pt-1 text-black font-medium">Stok</div>
                            <div class="bg-pink-500 w-[10px] h-[30px] pt-1 text-center text-black font-medium">:</div>
                        </div>
                        <div class="bg-orange-500 pt-1 line-clamp-1 text-black font-medium">50000</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-black w-[1px] h-[570px] mt-[55px] ml-2"></div>
        <div class="bg-slate-50 w-[570px] h-[557px] mt-[55px] ml-2">
            <p class="text-green-400 text-[35px] font-semibold">Pesanan</p>
            <div class="bg-black w-[570px] h-[1px]"></div>
            <div class="bg-slate-400 w-[570px] h-[390px] flex-col overflow-y-auto no-scrollbar">
                <div class="bg-slate-200 w-[570px] h-[40px] flex">
                    <div class="bg-amber-400 w-[160px] h-[40px] text-black text-[20px] font-medium pt-[5px]">Kode
                        Transaksi</div>
                    <div class="bg-red-400 w-[15px] h-[40px] text-black text-[25px] font-medium">:</div>
                    <div class="bg-sky-400 w-[395px] h-[40px] text-black text-[20px] font-medium pt-[5px] line-clamp-1">
                        123445</div>
                </div>
                <div class="bg-white w-[550px] h-[70px] mt-4 ml-[10px] rounded-[15px] pt-[10px] flex shadow-lg">
                    <div class="bg-slate-200 w-[80px] h-[50px] ml-4 rounded-[10px]">
                        <Image />
                    </div>
                    <div class="bg-yellow-300 w-[150px] h-[25px] ml-4 text-black font-semibold pt-1 line-clamp-1">Nama
                        Barang apa aja boleh terserah kamu</div>
                    <div class="bg-teal-600 w-[150px] h-[25px] mt-[25px] ml-[-150px] flex">
                        <div class="bg-red-400 w-[30px] h-[25px] pt-[1px] text-black font-medium">Rp.</div>
                        <div class="bg-indigo-500 w-[113px] h-[25px] pt-[2px] text-black font-medium line-clamp-1">
                            300.000.000.000</div>
                    </div>
                    <div class="bg-sky-300 w-[30px] h-[28px] mt-[25px] ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#dc2626"
                            viewBox="0 0 256 256">
                            <path
                                d="M180,128a12,12,0,0,1-12,12H88a12,12,0,0,1,0-24h80A12,12,0,0,1,180,128Zm56,0A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z">
                            </path>
                        </svg>
                    </div>
                    <input
                        class="bg-slate-200 w-[30px] h-[28px] mt-[25px] ml-2 text-center text-black font-medium pt-1 rounded-[7px]"></input>
                    <div class="bg-rose-400 w-[30px] h-[28px] mt-[25px] ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#4ade80"
                            viewBox="0 0 256 256">
                            <path
                                d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212Zm52-84a12,12,0,0,1-12,12H140v28a12,12,0,0,1-24,0V140H88a12,12,0,0,1,0-24h28V88a12,12,0,0,1,24,0v28h28A12,12,0,0,1,180,128Z">
                            </path>
                        </svg>
                    </div>
                    <div class="bg-yellow-200 w-[140px] h-[25px] mt-[25px] ml-[20px] flex">
                        <div class="bg-blue-400 w-[30px] h-[25px] text-black font-medium">Rp.</div>
                        <div class="bg-red-500 w-[110px] h-[25px] text-black font-medium line-clamp-1">300.000.000.000
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-black w-[570px] h-[1px]"></div>
            <div class="bg-yellow-300 w-[570px] h-[110px]">
                <div class="bg-pink-300 w-[570px] h-[50px] flex">
                    <div class="bg-red-300 w-[100px] h-[50px] text-black text-[30px] font-semibold">Total :</div>
                    <div class="bg-orange-400 w-[470px] h-[50px] flex justify-end">
                        <div class="bg-slate-50 h-[50px] flex line-clamp-1">
                            <div class="bg-blue-400 w-[50px] h-[50px] text-[30px] text-black font-semibold">Rp.</div>
                            <div class="bg-red-500 h-[50px] text-black text-[30px] font-semibold">3000.000.000.000</div>
                        </div>
                    </div>
                </div>
                <div class="bg-blue-300 w-[570px] h-[50px] mt-[10px]">
                    <div
                        class="bg-green-400 hover:bg-[#50C878] w-[550px] h-[50px] ml-[10px] rounded-[20px] text-center pt-[10px] font-semibold text-[20px] cursor-pointer">
                        Pesan</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>