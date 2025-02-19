<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>KasirKu</title>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <div class="bg-slate-50 w-screen h-screen flex pr-4">
        <x-sidebar></x-sidebar>

        <div class="flex flex-col w-full ml-4 mt-3">
            <div class="flex justify-between items-center mb-4">
                <p id="currentDate" class="text-green-400 font-bold"></p>
                <div class="flex items-center gap-2">
                    <p class="text-green-400 font-semibold">Nama Pengguna</p>
                </div>
            </div>

            <div class="flex gap-4">
                <!-- Pelanggan -->
                <div class="bg-white w-1/2 p-4 rounded-lg shadow-lg">
                    <h2 class="text-green-400 text-2xl font-semibold mb-2">Pelanggan</h2>
                    <div id="tambah_pelanggan" class="bg-green-400 text-white w-40 text-center p-2 rounded-lg cursor-pointer">Tambah Pelanggan</div>

                    <div class="mt-4">
                        <label class="block font-semibold">Nama Pelanggan :</label>
                        <input type="text" class="w-full p-2 border-2 border-slate-300 rounded-lg focus:border-green-400 outline-none" id="namaPelanggan" placeholder="Masukkan Nama Pelanggan">
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold">Nomor HP :</label>
                        <input type="text" class="w-full p-2 border-2 border-slate-300 rounded-lg focus:border-green-400 outline-none" id="nomorHp">
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold">Alamat :</label>
                        <textarea class="w-full p-2 border-2 border-slate-300 rounded-lg focus:border-green-400 outline-none" id="alamat"></textarea>
                    </div>
                </div>

                <!-- Pembayaran -->
                <div class="bg-white w-1/2 p-4 rounded-lg shadow-lg">
                    <h2 class="text-green-400 text-2xl font-semibold mb-2">Pembayaran</h2>

                    <div class="mt-4">
                        <label class="block font-semibold">Total Belanja :</label>
                        <input id="totalBelanja" type="text" class="w-full p-2 border-2 bg-slate-300 rounded-lg" readonly>
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold">Nominal Uang :</label>
                        <input type="text" class="w-full p-2 border-2 border-slate-300 rounded-lg focus:border-green-400 outline-none" placeholder="Masukkan Nominal Uang" id="nominalUang">
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold">Kembalian :</label>
                        <input type="text" class="w-full p-2 border-2 bg-slate-300 rounded-lg" readonly id="kembalian">
                    </div>

                    <button onclick="bayar()" class="w-full bg-green-500 hover:bg-green-400 text-white font-semibold p-2 rounded-lg mt-4">Bayar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("currentDate").textContent = new Date().toLocaleDateString("id-ID", {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Ambil total harga dari localStorage dan tampilkan di input "Total Belanja"
        document.addEventListener("DOMContentLoaded", function() {
            let totalAmount = localStorage.getItem("totalAmount");
            document.getElementById("totalBelanja").value = totalAmount ? parseInt(totalAmount.replace(/\D/g, '')).toLocaleString('id-ID', { minimumFractionDigits: 0 }) : "0";
        });

        // Fungsi untuk menghitung kembalian
        document.getElementById("nominalUang").addEventListener("input", function() {
            let nominal = parseInt(this.value.replace(/\D/g, '')) || 0; // Mengambil nilai nominal dan menghapus karakter non-digit
            let total = parseInt(document.getElementById("totalBelanja").value.replace(/\D/g, '')) || 0; // Mengambil nilai total belanja dan menghapus karakter non-digit
            let kembalian = nominal - total; // Menghitung selisih

            // Memastikan kembalian hanya ditampilkan jika nominal cukup
            document.getElementById("kembalian").value = kembalian >= 0 ? kembalian.toLocaleString('id-ID', { minimumFractionDigits: 0 }) : "0";
        });

        // Fungsi untuk menambah pelanggan (misalnya, link ke halaman tambah pelanggan)
        document.getElementById("tambah_pelanggan").addEventListener("click", function() {
            window.location.href = "/tambah_pelanggan";
        });

        // Fungsi untuk mengisi data pelanggan secara otomatis saat mengetik
        document.getElementById("namaPelanggan").addEventListener("input", function() {
            let selectedPelanggan = @json($pelanggan);
            let pelanggan = selectedPelanggan.find(p => p.nama.toLowerCase().includes(this.value.toLowerCase()));
            if (pelanggan) {
                document.getElementById("nomorHp").value = pelanggan.no_hp;
                document.getElementById("alamat").value = pelanggan.alamat;
            } else {
                document.getElementById("nomorHp").value = "";
                document.getElementById("alamat").value = "";
            }
        });

        function bayar() {
            let namaPelanggan = document.getElementById("namaPelanggan").value;
            let nomorHp = document.getElementById("nomorHp").value;
            let alamat = document.getElementById("alamat").value;
            let totalBelanja = document.getElementById("totalBelanja").value;
            let nominalUang = document.getElementById("nominalUang").value;
            let kembalian = document.getElementById("kembalian").value;
            let cart = JSON.parse(localStorage.getItem("cart"));
            if (!cart || cart.length === 0) {
                alert("Keranjang belanja kosong!");
                return;
            }

            $.ajax({
                url: "{{ route('simpan-transaksi') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    nama_pelanggan: namaPelanggan,
                    nomor_hp: nomorHp,
                    alamat: alamat,
                    total_belanja: totalBelanja,
                    nominal_uang: nominalUang,
                    kembalian: kembalian,
                    cart: JSON.stringify(cart) // Pastikan cart dikirim sebagai JSON string
                },
                success: function(response) {
                    alert(response.message);
                    localStorage.removeItem("cart");
                    localStorage.removeItem("totalAmount");
                    window.location.href = "/transaksi"; // Arahkan kembali ke halaman transaksi
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan saat menyimpan transaksi: " + xhr.responseJSON.message);
                }
            });
        }
    </script>
</body>

</html>