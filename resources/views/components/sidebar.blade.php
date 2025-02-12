<div class="bg-[#50C878] w-[130px] h-[633px] rounded-tr-[12px] rounded-br-[12px]">

    <a href="/beranda"
        class="{{ request()->is('beranda') ? 'font-medium cursor-pointer bg-white/40' : 'bg-[#50C878] hover:bg-white/40'}} w-[90px] h-[60px] ml-[20px] mt-[10px] rounded-md flex items-center pl-3 gap-x-3 font-medium">
        <div>
            <div class="bg-transparent w-[30px] h-[30px] ml-[18px] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fffff" viewBox="0 0 256 256"><path d="M219.31,108.68l-80-80a16,16,0,0,0-22.62,0l-80,80A15.87,15.87,0,0,0,32,120v96a8,8,0,0,0,8,8h64a8,8,0,0,0,8-8V160h32v56a8,8,0,0,0,8,8h64a8,8,0,0,0,8-8V120A15.87,15.87,0,0,0,219.31,108.68ZM208,208H160V152a8,8,0,0,0-8-8H104a8,8,0,0,0-8,8v56H48V120l80-80,80,80Z"></path></svg>
            </div>
            <div class="bg-transparent w-[74px] h-[20px] mt-[-5px] ml-[-4px] flex items-center justify-center">Beranda</div>
        </div>
    </a>

    <a href="/transaksi"
        class="{{ request()->is('transaksi') ? 'font-medium cursor-pointer bg-white/40' : 'bg-[#50C878] hover:bg-white/40'}} w-[90px] h-[60px] ml-[20px] mt-[5px] rounded-md flex items-center pl-3 gap-x-3 font-medium">
        <div>
            <div class="bg-transparent w-[30px] h-[30px] ml-[18px] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256"><path d="M239.76,158.06,217.28,68.12A16,16,0,0,0,201.75,56H136V40a16,16,0,0,0-16-16H80A16,16,0,0,0,64,40V56H54.25A16,16,0,0,0,38.72,68.12L16.24,158.06A7.93,7.93,0,0,0,16,160v32a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V160A7.93,7.93,0,0,0,239.76,158.06ZM80,40h40V56H80ZM54.25,72h147.5l20,80H34.25ZM32,192V168H224v24ZM64,96a8,8,0,0,1,8-8H88a8,8,0,0,1,0,16H72A8,8,0,0,1,64,96Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H120A8,8,0,0,1,112,96Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H168A8,8,0,0,1,160,96ZM64,128a8,8,0,0,1,8-8H88a8,8,0,0,1,0,16H72A8,8,0,0,1,64,128Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H120A8,8,0,0,1,112,128Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H168A8,8,0,0,1,160,128Z"></path></svg>
            </div>
            <div class="bg-transparent w-[74px] h-[20px] mt-[-5px] ml-[-4px] flex items-center justify-center">Transaksi</div>
        </div>
    </a>

    <a href="/pelanggan"
        class="{{ request()->is('pelanggan') ? 'font-medium cursor-pointer bg-white/40' : 'bg-[#50C878] hover:bg-white/40'}} w-[90px] h-[60px] ml-[20px] mt-[5px] rounded-md flex items-center pl-3 gap-x-3 font-medium">
        <div>
            <div class="bg-transparent w-[30px] h-[30px] ml-[18px] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256"><path d="M200,112a8,8,0,0,1-8,8H152a8,8,0,0,1,0-16h40A8,8,0,0,1,200,112Zm-8,24H152a8,8,0,0,0,0,16h40a8,8,0,0,0,0-16Zm40-80V200a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56ZM216,200V56H40V200H216Zm-80.26-34a8,8,0,1,1-15.5,4c-2.63-10.26-13.06-18-24.25-18s-21.61,7.74-24.25,18a8,8,0,1,1-15.5-4,39.84,39.84,0,0,1,17.19-23.34,32,32,0,1,1,45.12,0A39.76,39.76,0,0,1,135.75,166ZM96,136a16,16,0,1,0-16-16A16,16,0,0,0,96,136Z"></path></svg>
            </div>
            <div class="bg-transparent w-[74px] h-[20px] mt-[-5px] ml-[-4px] flex items-center justify-center">Pelanggan</div>
        </div>
    </a>

    <a href="/produk"
        class="{{ request()->is('produk') ? 'font-medium cursor-pointer bg-white/40' : 'bg-[#50C878] hover:bg-white/40'}} w-[90px] h-[60px] ml-[20px] mt-[5px] rounded-md flex items-center pl-3 gap-x-3 font-medium">
        <div>
            <div class="bg-transparent w-[30px] h-[30px] ml-[18px] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256"><path d="M104,216a16,16,0,1,1-16-16A16,16,0,0,1,104,216Zm88-16a16,16,0,1,0,16,16A16,16,0,0,0,192,200ZM239.71,74.14l-25.64,92.28A24.06,24.06,0,0,1,191,184H92.16A24.06,24.06,0,0,1,69,166.42L33.92,40H16a8,8,0,0,1,0-16H40a8,8,0,0,1,7.71,5.86L57.19,64H232a8,8,0,0,1,7.71,10.14ZM221.47,80H61.64l22.81,82.14A8,8,0,0,0,92.16,168H191a8,8,0,0,0,7.71-5.86Z"></path></svg>
            </div>
            <div class="bg-transparent w-[74px] h-[20px] mt-[-5px] ml-[-4px] flex items-center justify-center">Produk</div>
        </div>
    </a>

    <a href="/pengguna"
        class="{{ request()->is('pengguna') ? 'font-medium cursor-pointer bg-white/40' : 'bg-[#50C878] hover:bg-white/40'}} w-[90px] h-[60px] ml-[20px] mt-[5px] rounded-md flex items-center pl-3 gap-x-3 font-medium">
        <div>
            <div class="bg-transparent w-[30px] h-[30px] ml-[18px] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path></svg>
            </div>
            <div class="bg-transparent w-[74px] h-[20px] mt-[-5px] ml-[-4px] flex items-center justify-center">Pengguna</div>
        </div>
    </a>

    <a href="/rekap"
        class="{{ request()->is('rekap') ? 'font-medium cursor-pointer bg-white/40' : 'bg-[#50C878] hover:bg-white/40'}} w-[90px] h-[60px] ml-[20px] mt-[5px] rounded-md flex items-center pl-3 gap-x-3 font-medium">
        <div>
            <div class="bg-transparent w-[30px] h-[30px] ml-[18px] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256"><path d="M245,110.64A16,16,0,0,0,232,104H216V88a16,16,0,0,0-16-16H130.67L102.94,51.2a16.14,16.14,0,0,0-9.6-3.2H40A16,16,0,0,0,24,64V208h0a8,8,0,0,0,8,8H211.1a8,8,0,0,0,7.59-5.47l28.49-85.47A16.05,16.05,0,0,0,245,110.64ZM93.34,64,123.2,86.4A8,8,0,0,0,128,88h72v16H69.77a16,16,0,0,0-15.18,10.94L40,158.7V64Zm112,136H43.1l26.67-80H232Z"></path></svg>
            </div>
            <div class="bg-transparent w-[74px] h-[20px] mt-[-5px] ml-[-4px] flex items-center justify-center">Rekap</div>
        </div>
    </a>

    <a href="/keluar"
        class="{{ request()->is('keluar') ? 'font-medium cursor-pointer bg-white/40' : 'bg-[#50C878] hover:bg-white/40'}} w-[90px] h-[60px] ml-[20px] mt-[160px] rounded-md flex items-center pl-3 gap-x-3 font-medium">
        <div>
            <div class="bg-transparent w-[30px] h-[30px] ml-[18px] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256"><path d="M120,216a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H56V208h56A8,8,0,0,1,120,216Zm109.66-93.66-40-40a8,8,0,0,0-11.32,11.32L204.69,120H112a8,8,0,0,0,0,16h92.69l-26.35,26.34a8,8,0,0,0,11.32,11.32l40-40A8,8,0,0,0,229.66,122.34Z"></path></svg>
            </div>
            <div class="bg-transparent w-[74px] h-[20px] mt-[-5px] ml-[-4px] flex items-center justify-center">Keluar</div>
        </div>
    </a>
</div>