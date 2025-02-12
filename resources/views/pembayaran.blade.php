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
        <div class="bg-slate-50 w-[635px] h-[557px] mt-[50px] ml-[-1220px]">
            <div class="bg-slate-50 w-[625px] h-[50px] flex ml-[10px]">
                <p class="text-green-400 text-[35px] font-semibold">Pesanan</p>
            </div>
            <div class="bg-black w-[570px] h-[1px]"></div>
            <div class="bg-slate-500 w-[570px] h-[410px] flex-col overflow-y-auto no-scrollbar">
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
                        class="bg-white border-2 border-red-600 w-[550px] h-[50px] ml-[10px] rounded-[20px] text-center pt-[10px] font-semibold text-[20px] cursor-pointer text-red-600">
                        Kembali</div>
                </div>
            </div>
        </div>
        <div class="bg-black w-[1px] h-[570px] ml-[-63px] mt-[53px]"></div>
        <div class="bg-white w-[640px] h-[300px] ml-[3px] mt-[53px] rounded-[15px] shadow-lg">
            <div
                class="bg-transparent w-[620px] h-[50px] ml-[10px] mt-[4px] flex text-[30px] font-semibold text-green-400">
                Pelanggan</div>
            <div class="bg-black w-[630px] h-[1px] mt-[-5px] ml-[5px]"></div>
            <div id="tambah_pelanggan"
                class="bg-green-400 w-[170px] h-[35px] cursor-pointer shadow-md rounded-[10px] ml-[10px] mt-[5px] text-white font-semibold flex items-center justify-center text-[16px]">
                Tambah Pelanggan</div>

            <script>
            document.getElementById("tambah_pelanggan").addEventListener("click", function() {
                window.location.href = "/tambah_pelanggan";
            });
            </script>

            <div class="bg-transparent w-[615px] h-[40px] ml-[10px] mt-[10px] flex">
                <div class="bg-transparent w-[170px] h-[30px] text-semibold">Nama Pelanggan :</div>
                <input type="text"
                    class=" w-[440px] pl-[10px] rounded-[10px] border-2 border-slate-300 focus:border-green-400 outline-none">
            </div>
            <div class="bg-transparent w-[615px] h-[40px] ml-[10px] flex mt-[5px]">
                <div class="bg-transparent w-[170px] h-[30px] text-semibold">Nomor HP :</div>
                <input type="text"
                    class=" w-[440px] pl-[10px] rounded-[10px] border-2 border-slate-300 focus:border-green-400 outline-none">
            </div>
            <div class="bg-transparent w-[615px] h-[100px] ml-[10px] flex mt-[5px]">
                <div class="bg-transparent w-[170px] h-[30px] text-semibold">Alamat :</div>
                <textarea name="" id=""
                    class="pt-[10px] w-[440px] pl-[10px] rounded-[10px] border-2 border-slate-300 focus:border-green-400 outline-none"></textarea>
            </div>
        </div>
        <!-- <div class="bg-black w-[640px] h-[1px] mt-[385px] ml-[-640px]"></div> -->
        <div class="bg-white w-[640px] h-[260px] ml-[-640px] mt-[360px] rounded-[15px] shadow-lg">
            <div
                class="bg-transparent w-[620px] h-[50px] ml-[10px] mt-[4px] flex text-[30px] font-semibold text-green-400">
                Pembayaran</div>
            <div class="bg-black w-[630px] h-[1px] mt-[-5px] ml-[5px]"></div>
            <div class="bg-transparent w-[615px] ml-[10px] flex-col mt-[5px]">
                <div class="bg-transparent w-[170px] h-[30px] text-semibold">Nominal uang :</div>
                <input type="text"
                    class=" w-[610px] h-[40px] pl-[10px] rounded-[10px] border-2 border-slate-300 focus:border-green-400 outline-none">
            </div>
            <div class="bg-transparent w-[615px] ml-[10px] flex-col mt-[5px]">
                <div class="bg-transparent w-[170px] h-[30px] text-semibold">Kembalian :</div>
                <input type="text" class=" w-[610px] h-[40px] pl-[10px] rounded-[10px] border-2 bg-slate-300">
            </div>
            <button type="submit"
                class="w-[610px] h-[40px] bg-[#50C878] hover:bg-green-400 rounded-[10px] ml-[10px] mt-[5px] font-semibold">Bayar</button>
        </div>
    </div>
</body>

</html>