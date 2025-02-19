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

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 50;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
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
            <div class="bg-green-400 w-[1179px] h-[45px] mt-2 ml-4 rounded-[5px] shadow-lg flex">
                <p class="ml-[85px] mt-[10px] font-medium">Kode Transaksi</p>
                <p class="ml-[143px] mt-[10px] font-medium">Waktu</p>
                <p class="ml-[136px] mt-[10px] font-medium">Nama Pelanggan</p>
                <p class="ml-[108px] mt-[10px] font-medium">Total Belanja</p>
                <p class="ml-[180px] mt-[10px] font-medium">Aksi</p>
            </div>
            <div class="bg-transparent w-[1179px] h-[265px] ml-4 mt-2 flex-col overflow-y-auto no-scrollbar">
                @if(isset($transaksis) && $transaksis->count() > 0)
                @foreach ($transaksis as $transaksi)
                <div class="bg-white w-[1179px] h-[45px] rounded-[5px] pt-[5px] mt-2 flex shadow-md">
                    <div class="bg-white w-[200px] h-[35px] ml-[40px]">
                        <div
                            class="bg-white w-[200px] h-[23px] text-center mt-[6px] line-clamp-1 text-black font-medium">
                            {{ $transaksi->id }}</div>
                    </div>
                    <div class=" bg-white w-[200px] h-[35px] ml-[20px]">
                        <div
                            class="bg-white w-[200px] h-[23px] text-center mt-[6px] line-clamp-1 text-black font-medium">
                            {{ $transaksi->created_at }}</div>
                    </div>
                    <div class="bg-white w-[200px] h-[35px] ml-[20px]">
                        <div
                            class="bg-white w-[200px] h-[23px] text-center mt-[6px] line-clamp-1 text-black font-medium">
                            {{ $transaksi->nama_pelanggan }}</div>
                    </div>
                    <div class="bg-white w-[200px] h-[35px] ml-[20px] flex justify-center items-center">
                        <div class="bg-white w-[25px] h-[23px] text-black font-medium">Rp.</div>
                        <div class="bg-white h-[23px] line-clamp-1 text-black font-medium">{{ number_format($transaksi->total_belanja, 0, ',', '.') }}</div>
                    </div>
                    <div class="bg-white w-[200px] h-[35px] ml-[40px] flex justify-center items-center">
                        <div class="bg-blue-400 w-[80px] h-[30px] flex">
                            <div class="bg-white w-[40px] h-[30px] flex justify-center items-center">
                                <svg class="cursor-pointer" onclick="showDetail('{{ $transaksi->id }}')" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#377bc3" viewBox="0 0 256 256">
                                    <path
                                        d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM192,108.68,147.31,64l24-24L216,84.68Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="bg-white w-[40px] h-[30px] flex justify-center items-center">
                                <svg class="cursor-pointer" onclick="deleteTransaksi('{{ $transaksi->id }}')" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#db3333" viewBox="0 0 256 256">
                                    <path
                                        d="M224,56a8,8,0,0,1-8,8h-8V208a16,16,0,0,1-16,16H64a16,16,0,0,1-16-16V64H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,56ZM88,32h80a8,8,0,0,0,0-16H88a8,8,0,0,0,0,16Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="w-full h-full flex items-center justify-center">
                    <p class="text-green-500 font-semibold">Tidak ada data transaksi.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Detail Transaksi -->
    <div id="modalDetail" class="modal">
        <div class="modal-content">
            <h3 class="text-lg font-semibold">Detail Transaksi</h3>
            <div id="detailContent" class="text-sm mt-4"></div>
            <button onclick="closeModal('modalDetail')" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mt-4">Tutup</button>
        </div>
    </div>

    <script>
        document.getElementById("currentDate").textContent = new Date().toLocaleDateString("id-ID", {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        function showDetail(id) {
            // Ambil detail transaksi dari server
            $.ajax({
                url: `/transaksi/${id}`,
                method: "GET",
                success: function(response) {
                    let detailContent = document.getElementById("detailContent");
                    detailContent.innerHTML = `
                        <p><strong>ID Transaksi:</strong> ${response.id}</p>
                        <p><strong>Nama Pelanggan:</strong> ${response.nama_pelanggan}</p>
                        <p><strong>Nomor HP:</strong> ${response.nomor_hp}</p>
                        <p><strong>Alamat:</strong> ${response.alamat}</p>
                        <p><strong>Total Belanja:</strong> Rp. ${response.total_belanja.toLocaleString()}</p>
                        <p><strong>Nominal Uang:</strong> Rp. ${response.nominal_uang.toLocaleString()}</p>
                        <p><strong>Kembalian:</strong> Rp. ${response.kembalian.toLocaleString()}</p>
                        <p><strong>Waktu Transaksi:</strong> ${response.created_at}</p>
                    `;
                    showModal('modalDetail');
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan saat mengambil detail transaksi: " + xhr.responseJSON.message);
                }
            });
        }

        function deleteTransaksi(id) {
            if (confirm("Apakah Anda yakin ingin menghapus transaksi ini?")) {
                $.ajax({
                    url: `/transaksi/${id}`,
                    method: "DELETE",
                    success: function(response) {
                        alert("Transaksi berhasil dihapus.");
                        location.reload();
                    },
                    error: function(xhr) {
                        alert("Terjadi kesalahan saat menghapus transaksi: " + xhr.responseJSON.message);
                    }
                });
            }
        }

        function showModal(modalId) {
            document.getElementById(modalId).style.display = "flex";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
    </script>
</body>

</html>