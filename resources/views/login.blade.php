<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Masuk</title>
</head>
<body class="h-screen flex items-center justify-center bg-green-500/20">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-96 text-center">
        <h2 class="text-3xl font-bold text-gray-700">Selamat Datang</h2>
        <p class="text-gray-500 text-sm mt-2">Silakan masuk untuk melanjutkan</p>

        <form action="/login" method="POST" class="mt-6 text-left">
            @csrf
            <label class="block font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" 
                class="w-full border-2 p-3 rounded-lg mb-4 focus:border-green-500 outline-none transition" 
                placeholder="Masukkan nama Anda" required>

            <label class="block font-medium text-gray-700">Kata Sandi</label>
            <div class="relative">
                <input type="password" id="password" name="password" 
                    class="w-full border-2 p-3 rounded-lg focus:border-green-500 outline-none pr-10 transition" 
                    placeholder="Masukkan password Anda" required>
                <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="togglePassword()">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gray" viewBox="0 0 256 256">
                        <path d="M128,48C77.13,48,38.39,77.83,18.15,108.1a10.63,10.63,0,0,0,0,11.8C38.39,154.17,77.13,184,128,184s89.61-29.83,109.85-59.1a10.63,10.63,0,0,0,0-11.8C217.61,77.83,178.87,48,128,48Zm0,120c-41.78,0-76.4-25.73-94.68-51.94C51.6,90.73,86.22,64,128,64s76.4,26.73,94.68,51.94C204.4,142.27,169.78,168,128,168Zm0-32a32,32,0,1,0-32-32A32,32,0,0,0,128,136Zm0-48a16,16,0,1,1-16,16A16,16,0,0,1,128,88Z"></path>
                    </svg>
                </span>
            </div>

            <button type="submit" 
                class="w-full bg-green-500 hover:bg-green-600 transition text-white px-4 py-3 mt-6 rounded-lg font-semibold shadow-md">
                Masuk
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `
                    <path d="M128,48C77.13,48,38.39,77.83,18.15,108.1a10.63,10.63,0,0,0,0,11.8C38.39,154.17,77.13,184,128,184s89.61-29.83,109.85-59.1a10.63,10.63,0,0,0,0-11.8C217.61,77.83,178.87,48,128,48ZM128,136a36,36,0,1,1,36-36A36,36,0,0,1,128,136Z"></path>
                `;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `
                    <path d="M128,48C77.13,48,38.39,77.83,18.15,108.1a10.63,10.63,0,0,0,0,11.8C38.39,154.17,77.13,184,128,184s89.61-29.83,109.85-59.1a10.63,10.63,0,0,0,0-11.8C217.61,77.83,178.87,48,128,48Zm-36,80a36,36,0,1,1,36,36A36,36,0,0,1,92,128Zm128.49,57.85a8,8,0,1,1-11.32,11.32l-160-160a8,8,0,0,1,11.32-11.32Z"></path>
                `;
            }
        }
    </script>

</body>
</html>
