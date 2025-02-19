<!DOCTYPE html>
<html lang="id">

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
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        </script>

        <div class="bg-black w-[1220px] h-[1px] mt-12 ml-[-1220px]"></div>

        <!-- Daftar Produk -->
        <div class="bg-slate-50 w-[635px] h-[557px] mt-[60px] ml-[-1220px]">
            <div class="bg-transparent w-[625px] h-[50px] rounded-[15px] flex">
                <input id="search" onkeyup="searchProduct()"
                    class="bg-white w-[570px] h-[50px] rounded-tl-[13px] rounded-bl-[13px] shadow-lg text-black pl-4 font-medium"
                    placeholder="Telusuri...">
                <div
                    class="bg-slate-100 w-[55px] h-[50px] pt-[9px] pl-[12px] rounded-br-[13px] rounded-tr-[13px] cursor-pointer shadow-lg">
                    🔍
                </div>
            </div>
            <div id="productList"
                class="bg-transparent w-[600px] h-[500px] ml-[15px] mt-4 flex flex-wrap content-start gap-4 overflow-y-auto no-scrollbar">
                @if(isset($produk) && $produk->count() > 0)
                @foreach ($produk as $product)
                <div id="product-{{ $product->id }}"
                    onclick="addToCart('{{ $product->id }}', '{{ $product->nama }}', '{{ $product->harga }}', '{{ $product->stok }}', '{{ asset('storage/' . $product->foto) }}')"
                    class='product-item bg-white w-[290px] h-[150px] rounded-[20px] shadow-lg cursor-pointer flex'>
                    <div class='text-black font-semibold text-[15px]'>
                        <img src="{{ asset('storage/' . $product->foto) }}" alt="Produk"
                            class="rounded-l-[20px] h-full w-[130px] object-cover">
                    </div>
                    <div class="flex-col pl-3">
                        <div class='product-name text-black font-semibold text-[15px] mt-[10px]'>{{ $product->nama }}
                        </div>
                        <div class='text-black font-medium'>Rp. {{ number_format($product->harga, 0, ',', '.') }}</div>
                        <div class='text-black font-medium mt-[55px]'>Stok: <span
                                id="stok-{{ $product->id }}">{{ $product->stok }}</span></div>
                    </div>
                </div>

                @endforeach
                @else
                <div class="w-[300px] h-[100px] bg-transparent flex text-center items-center mt-[170px] ml-[140px]">
                    <p class="text-green-500 font-semibold">Produk Kosong!! Silahkan tambahkan produk terlebih dahulu.
                    </p>
                </div>
                @endif
            </div>
        </div>

        <div class="bg-black w-[1px] h-[570px] mt-[55px] ml-2"></div>

        <!-- Keranjang -->
        <div class="bg-slate-50 w-[570px] h-[557px] mt-[55px] ml-2">
            <p class="text-green-400 text-[35px] font-semibold">Pesanan</p>
            <div class="bg-black w-[570px] h-[1px]"></div>
            <div id="orderList" class="bg-transparent w-[570px] h-[410px] flex-col overflow-y-auto no-scrollbar"></div>
            <div class="bg-black w-[570px] h-[1px]"></div>

            <div class="bg-transparent w-[570px] h-[110px]">
                <div class="bg-transparent w-[570px] h-[50px] flex">
                    <div class="bg-transparent w-[100px] h-[50px] text-black text-[30px] font-semibold">Total :</div>
                    <div class="bg-transparent w-[470px] h-[50px] flex justify-end">
                        <div class="bg-slate-50 h-[50px] flex line-clamp-1">
                            <div class="bg-transparent w-[50px] h-[50px] text-[30px] text-black font-semibold">Rp.</div>
                            <div id="totalAmount" class="bg-transparent h-[50px] text-black text-[30px] font-semibold">0
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-transparent w-[570px] h-[50px] mt-[10px]">
                    <button onclick="checkout()"
                        class="bg-green-400 hover:bg-[#50C878] w-[570px] h-[40px] rounded-[10px] text-center font-semibold text-[17px] cursor-pointer flex items-center justify-center">
                        Pesan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cart = [];

        document.addEventListener("DOMContentLoaded", function () {
            // Ambil data dari localStorage
            let savedCart = localStorage.getItem("cart");
            if (savedCart) {
                cart = JSON.parse(savedCart);
                renderCart();
            }

            // Sembunyikan produk yang stoknya habis atau sudah ada di keranjang
            cart.forEach(item => {
                let productElement = document.getElementById(`product-${item.id}`);
                if (productElement) {
                    productElement.style.display = 'none';
                }
            });

            // Sembunyikan produk yang stoknya habis
            document.querySelectorAll('.product-item').forEach(product => {
                let stockElement = product.querySelector('span[id^="stok-"]');
                if (parseInt(stockElement.textContent) <= 0) {
                    product.style.display = 'none';
                }
            });
        });

        function addToCart(id, nama, harga, stok, foto) {
            let item = cart.find(i => i.id === id);

            if (item) {
                if (item.qty < stok) { // Biar tidak lebih dari stok
                    item.qty++;
                    updateStock(id, -1);
                } else {
                    alert("Stok tidak cukup!");
                }
            } else {
                cart.push({
                    id,
                    nama,
                    harga,
                    qty: 1,
                    stok,
                    foto
                });
                updateStock(id, -1);
            }
            renderCart();
            saveCart();
        }

        function renderCart() {
            let orderList = document.getElementById("orderList");
            orderList.innerHTML = "";
            let total = 0;

            cart.forEach((c, index) => {
                total += c.harga * c.qty;
                orderList.innerHTML += `
                <div class='flex justify-between items-center p-2 bg-white shadow-md rounded-lg m-2'>
                    <img src="${c.foto}" class="w-[40px] h-[40px] rounded-[10px] object-cover">
                    <span class="font-semibold text-black">${c.nama} x ${c.qty}</span>
                    <div class='flex items-center gap-2'>
                        <button onclick="changeQuantity(${index}, -1)" class="bg-red-500 text-white px-3 py-1 rounded-full">➖</button>
                        <button onclick="changeQuantity(${index}, 1)" class="bg-green-500 text-white px-3 py-1 rounded-full">➕</button>
                    </div>
                    <span class="font-medium text-black">Rp. ${(c.harga * c.qty).toLocaleString()}</span>
                </div>`;
            });

            document.getElementById("totalAmount").textContent = total.toLocaleString();
        }

        function changeQuantity(index, change) {
            if (cart[index]) {
                let item = cart[index];
                if (item.qty + change <= item.stok && item.qty + change > 0) {
                    item.qty += change;
                    updateStock(item.id, -change);
                } else if (item.qty + change <= 0) {
                    updateStock(item.id, item.qty);
                    cart.splice(index, 1);
                } else {
                    alert("Stok tidak cukup!");
                }
                renderCart();
                saveCart();
            }
        }

        function updateStock(id, change) {
            let stockElement = document.getElementById(`stok-${id}`);
            let newStock = parseInt(stockElement.textContent) + change;
            stockElement.textContent = newStock;

            if (newStock <= 0) {
                document.getElementById(`product-${id}`).style.display = 'none';
            }
        }

        function saveCart() {
            localStorage.setItem("cart", JSON.stringify(cart));
            localStorage.setItem("totalAmount", document.getElementById("totalAmount").textContent);
        }

        function checkout() {
            saveCart(); // Simpan keranjang ke localStorage sebelum pindah halaman
            window.location.href = "/pembayaran";
        }

        function searchProduct() {
            let input = document.getElementById("search").value.toLowerCase();
            let products = document.querySelectorAll(".product-item");

            products.forEach(product => {
                let productName = product.querySelector(".product-name").textContent.toLowerCase();
                product.style.display = productName.includes(input) ? "flex" : "none";
            });
        }
    </script>

</body>

</html>