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
        <div class="bg-white w-80 h-64 mt-[20px] ml-[30px] rounded-[20px] shadow-xl">
            <h2 class="text-green-500 text-center font-semibold text-[25px] mt-[40px]">PENGINGAT</h2>
            <p class="text-center text-gray-600 ml-2 mr-2 font-semibold pt-2">Jangan lupa berdoa sebelum memulai
                pekerjaan, agar selalu diberikan kemudahan oleh Tuhan Yang Maha Esa.</p>
        </div>
        <div
            class="bg-white w-[840px] h-64 mt-[20px] ml-4 rounded-[20px] text-center pt-28 font-semibold text-[40px] shadow-xl text-black">
            Grafik</div>
        <div class="bg-white w-[800px] h-[310px] mt-[300px] ml-[-1170px] rounded-[20px] shadow-xl">
            <select
                class="bg-slate-100 w-[765px] h-[40px] ml-4 mt-4 rounded-[5px] shadow-lg text-black font-medium cursor-pointer">
                <option>Stok Terkecil</option>
                <option>Stok Terbesar</option>
            </select>
            <div class="bg-white w-[800px] h-[250px] overflow-y-auto no-scrollbar rounded-[20px]">
                <div class="bg-transparent w-[765px] h-[50px] ml-4 mt-4 rounded-[5px] flex shadow-lg">
                    <div class="bg-transparent w-[100px] h-[50px]">
                        <div class="bg-slate-300 w-[70px] h-[40px] ml-2 mt-[5px] rounded-[10px]"></div>
                    </div>
                    <div class="bg-transparent w-[200px] h-[50px]">
                        <div
                            class="bg-transparent w-[150px] h-[25px] ml-[10px] mt-[13px] line-clamp-1 text-black text-center font-medium">
                            0987352</div>
                    </div>
                    <div class="bg-transparent w-[200px] h[50px]">
                        <div
                            class="bg-transparent w-[150px] h-[25px] ml-[10px] mt-[13px] line-clamp-1 text-black text-center font-medium">
                            uncle muthu</div>
                    </div>
                    <div class="bg-transparent w-[200px] h-[50px]">
                        <div
                            class="bg-transparent w-[150px] h-[25px] ml-[10px] mt-[13px] line-clamp-1 text-black text-center font-medium">
                            50</div>
                    </div>
                    <div class="bg-transparent w-[200px] h-50px]">
                        <div
                            class="bg-transparent w-[150px] h-[25px] ml-[10px] mt-[13px] flex justify-center items-center">
                            <div class="bg-transparent w-[30px] h-[25px] text-center text-black font-medium">Rp.</div>
                            <div class="bg-transparent h-[25px] text-center text-black font-medium line-clamp-1">300.000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white w-[350px] h-[310px] mt-[300px] ml-4 rounded-[20px] shadow-xl">
            <div class="bg-black w-[80px] h-[80px] ml-[135px] mt-6 pl-[10px] pt-[12px]">
                <Img />
            </div>
            <div class="bg-white w-[350px] h-8">
                <p class="text-[20px] font-semibold text-center text-black">Nama Pengguna</p>
            </div>
            <div class="bg-black w-[340px] h-[2px] mt-4 ml-1"></div>
            <div class="bg-white w-[350px] h-[80px] mt-2">
                <p class="text-center text-gray-600 font-medium pt-2">'nama pengguna' sebagai</p>
                <p class="text-center text-black font-semibold text-[25px]">Petugas</p>
            </div>
        </div>
    </div>
</body>

</html>