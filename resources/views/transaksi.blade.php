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
        </div>

        <script>
            document.getElementById("currentDate").textContent = new Date().toLocaleDateString("id-ID", {
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
            });
        </script>

        <div class="bg-black w-[1220px] h-[1px] mt-12 ml-[-1220px]"></div>

        <!-- Daftar Produk -->
        <div class="bg-slate-50 w-[635px] h-[557px] mt-[60px] ml-[-1220px]">
            <div class="bg-transparent w-[625px] h-[50px] rounded-[15px] flex">
                <input id="search" onkeyup="searchProduct()"
                    class="bg-white w-[570px] h-[50px] rounded-tl-[13px] rounded-bl-[13px] shadow-lg text-black pl-4 font-medium"
                    placeholder="Telusuri...">
                <div class="bg-slate-100 w-[55px] h-[50px] pt-[9px] pl-[12px] rounded-br-[13px] rounded-tr-[13px] cursor-pointer shadow-lg">
                    🔍
                </div>
            </div>
            <div id="productList"
                class="bg-transparent w-[600px] h-[500px] ml-[15px] mt-4 flex flex-wrap content-start gap-4 overflow-y-auto no-scrollbar">
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
                            <div id="totalAmount" class="bg-transparent h-[50px] text-black text-[30px] font-semibold">0</div>
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
        let products = [
            { id: 1, name: "Icon Login", price: 100000, stock: 15 },
            { id: 2, name: "Produk 2", price: 25000, stock: 23 },
            { id: 3, name: "Produk 3", price: 5000, stock: 36 }
        ];
        let cart = [];

        // Render products to the page
        function renderProducts() {
            let productList = document.getElementById("productList");
            productList.innerHTML = "";
            products.filter(p => p.stock > 0).forEach(p => {
                productList.innerHTML += `
                <div onclick="addToCart(${p.id})" class='bg-white w-[290px] h-[150px] rounded-[20px] shadow-lg cursor-pointer p-4'>
                    <div class='text-black font-semibold text-[15px]'>${p.name}</div>
                    <div class='text-black font-medium'>Rp. ${p.price}</div>
                    <div class='text-black font-medium mt-2'>Stok: ${p.stock}</div>
                </div>`;
            });
        }

        // Add product to cart
        function addToCart(id) {
            let product = products.find(p => p.id === id);
            if (product && product.stock > 0) {
                let cartItem = cart.find(c => c.id === id);
                if (cartItem) {
                    cartItem.qty++;
                } else {
                    cart.push({ id: product.id, name: product.name, price: product.price, qty: 1 });
                }
                product.stock--;
                renderProducts();
                renderCart();
            }
        }

        // Render cart items
        function renderCart() {
            let orderList = document.getElementById("orderList");
            orderList.innerHTML = "";
            let total = 0;
            cart.forEach(c => {
                total += c.price * c.qty;
                orderList.innerHTML += `
                    <div class='flex justify-between items-center p-2 bg-white shadow-md rounded-lg m-2'>
                        <span class="font-semibold text-black">${c.name} x ${c.qty}</span>
                        <div class='flex items-center gap-2'>
                            <button onclick="changeQuantity(${c.id}, -1)" class="bg-red-500 text-white px-3 py-1 rounded-full">➖</button>
                            <button onclick="changeQuantity(${c.id}, 1)" class="bg-green-500 text-white px-3 py-1 rounded-full">➕</button>
                        </div>
                        <span class="font-medium text-black">Rp. ${c.price * c.qty}</span>
                    </div>`;
            });
            document.getElementById("totalAmount").textContent = total.toLocaleString();
        }

        // Change product quantity
        const changeQuantity = (productId, change) => {
            let cartItem = cart.find(c => c.id === productId);
            let product = products.find(p => p.id === productId);

            if (cartItem && product) {
                let newQty = cartItem.qty + change;

                if (newQty >= 0 && newQty <= product.stock + cartItem.qty) {
                    cartItem.qty = newQty;
                    product.stock -= change;

                    // Remove item if quantity is 0
                    if (cartItem.qty === 0) {
                        cart = cart.filter(c => c.id !== productId);
                    }

                    renderCart();
                    renderProducts();
                }
            }
        }

        // Search for product
        const searchProduct = () => {
            let searchText = document.getElementById("search").value.toLowerCase();
            let filteredProducts = products.filter(p => p.name.toLowerCase().includes(searchText) && p.stock > 0);
            
            let productList = document.getElementById("productList");
            productList.innerHTML = "";
            filteredProducts.forEach(p => {
                productList.innerHTML += `
                        <div onclick="addToCart(${p.id})" class='bg-white w-[290px] h-[150px] rounded-[20px] shadow-lg cursor-pointer p-4'>
                        <div class='text-black font-semibold text-[15px]'>${p.name}</div>
                        <div class='text-black font-medium'>Rp. ${p.price}</div>
                        <div class='text-black font-medium mt-2'>Stok: ${p.stock}</div>
                    </div>`;
            });
        };

        // Checkout function (just an example)
        const checkout = () => {
            alert("Pesanan berhasil!");
            cart = [];
            renderCart();
            renderProducts();
        };

        // Initial render
        renderProducts();
        renderCart();
    </script>
</body>

</html>

