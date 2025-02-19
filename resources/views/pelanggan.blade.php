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

        .table-container {
            max-width: 100%;
            overflow-x: auto;
        }

        /* Styling untuk Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 450px;
            text-align: center;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.3s ease-out;
        }

        /* Animasi fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Animasi slide-in dari bawah */
        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
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
                <input class="bg-white w-[1150px] h-[50px] rounded-tl-[13px] rounded-bl-[13px] shadow-lg text-black pl-4 font-medium" placeholder="Telusuri..."></input>
                <div class="bg-slate-100 w-[55px] h-[50px] pt-[9px] pl-[12px] rounded-br-[13px] rounded-tr-[13px] cursor-pointer shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256">
                        <path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"></path>
                    </svg>
                </div>
            </div>

            <div class="table-container bg-white w-[1179px] h-[350px] mt-4 ml-4 rounded-[15px] shadow-lg overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-green-400 sticky top-0">
                            <th class="p-2 text-white">ID</th>
                            <th class="p-2 text-white">Nama</th>
                            <th class="p-2 text-white">Alamat</th>
                            <th class="p-2 text-white">No Hp</th>
                            <th class="p-2 text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($pelanggan) && count($pelanggan) > 0)
                        @foreach ($pelanggan as $item)
                        <tr class="border-b">
                            <td class="p-2 text-center">{{ $item->id }}</td>
                            <td class="p-2 text-center">{{ $item->nama }}</td>
                            <td class="p-2 text-center">{{ $item->alamat }}</td>
                            <td class="p-2 text-center">{{ $item->no_hp }}</td>
                            <td class="p-2 text-center flex justify-center gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('pelanggan.edit', $item->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <button onclick="openModal('{{ $item->id }}')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Hapus
                                </button>

                                <!-- Form Hapus -->
                                <form id="deleteForm-{{ $item->id }}" action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center p-4 text-green-500 text-lg font-semibold">
                                Tidak ada data Pelanggan.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="modalDelete" class="modal-overlay">
        <div class="modal-content">
            <h3 class="text-lg font-semibold">Konfirmasi Hapus</h3>
            <p class="text-sm">Apakah Anda yakin ingin menghapus data pelanggan ini?</p>
            <div class="mt-4">
                <button id="confirmDelete" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-all ease-in-out duration-200">Hapus</button>
                <button onclick="closeModal()" class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400 transition-all ease-in-out duration-200">Batal</button>
            </div>
        </div>
    </div>

    <script>
        let deleteId = null;

        // Menangani pencarian
        document.querySelector('input[placeholder="Telusuri..."]').addEventListener('input', function () {
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

        // Menampilkan modal
        function openModal(id) {
            deleteId = id;
            document.getElementById("modalDelete").style.display = "flex";
        }

        // Menutup modal
        function closeModal() {
            document.getElementById("modalDelete").style.display = "none";
        }

        // Konfirmasi penghapusan
        document.getElementById("confirmDelete").addEventListener("click", function () {
            if (deleteId) {
                // Kirim form untuk menghapus data
                document.getElementById("deleteForm-" + deleteId).submit();
                closeModal();
            }
        });
    </script>
</body>

</html>
