<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translate(-50%, -20px); }
            to { opacity: 1; transform: translate(-50%, 0); }
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.8); opacity: 0.8; }
            100% { transform: scale(1.4); opacity: 0; }
        }
        .animate-float { animation: float 5s ease-in-out infinite; }
        .alert-slide { animation: slideDown 0.4s ease; }
        .pulse-ring::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            border: 2px solid rgba(13, 148, 136, 0.4);
            animation: pulse-ring 2s ease-out infinite;
        }
        .btn-shine { position: relative; overflow: hidden; }
        .btn-shine::after {
            content: "";
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.35), transparent);
            transition: 0.6s;
        }
        .btn-shine:hover::after { left: 100%; }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 bg-gray-100">

    <!-- =========================
         MAIN CARD (Side-by-Side)
    ========================= -->
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-2 border border-white/40">

        <!-- ===== LEFT SIDE: IMAGE PANEL ===== -->
        <div class="relative hidden lg:flex flex-col items-center justify-center p-10 text-white overflow-hidden min-h-[600px]">

            <!-- Background Image -->
            <img src="images/erp_bg.png" alt="ERP Background"
                 class="absolute inset-0 w-full h-full object-cover" />

            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-teal-900/30 via-teal-800/30 to-teal-600/30"></div>

            <!-- Dots pattern overlay -->
            <div class="absolute inset-0 bg-[length:22px_22px]"></div>

         
        </div>

        <!-- ===== RIGHT SIDE: LOGIN FORM ===== -->
        <div class="p-8 sm:p-10 flex flex-col justify-center bg-white">

            <!-- Mobile Logo (visible only on small screens) -->
            <div class="flex lg:hidden justify-center mb-6">
                <img src="images/softgrowth_logo.png"
                     alt="Softgrowth Infotech Logo"
                     class="h-20 w-auto rounded-xl bg-white p-2 shadow-lg" />
            </div>

            <!-- Lock Icon with pulse -->
            <div class="relative w-20 h-20 mx-auto mb-5 rounded-full bg-teal-50 border border-teal-200 flex items-center justify-center ">
                <i class="fas fa-lock text-3xl text-teal-600"></i>
            </div>

            <h2 class="text-center text-2xl font-bold text-gray-900 mb-1">
                Welcome Back
            </h2>
            <p class="text-center font-medium text-sm text-gray-500 mb-7">
                Login to continue your journey
            </p>

            <!-- Username -->
            <div class="relative mb-4">
                <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                <input type="text" id="username" placeholder="Enter Username"
                       class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-300 focus:border-teal-600 focus:shadow-[0_0_0_3px_rgba(15,118,110,0.15)] focus:bg-white" />
            </div>

            <!-- Password -->
            <div class="relative mb-4">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                <input type="password" id="password" placeholder="Enter Password"
                       class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-300 focus:border-teal-600 focus:shadow-[0_0_0_3px_rgba(15,118,110,0.15)] focus:bg-white" />
            </div>

            <!-- Options -->
            <div class="flex flex-wrap items-center justify-between gap-2 mb-6 text-sm font-medium">
                <label class="flex items-center gap-2 text-gray-600 cursor-pointer select-none">
                    <input type="checkbox" class="accent-teal-600 w-4 h-4 rounded" />
                    Remember me
                </label>
                <a href="#" class="text-teal-600 hover:text-teal-800 font-semibold transition">
                    Forgot Password?
                </a>
            </div>

            <!-- Login Button -->
            <button onclick="goToDashboard()"
                    class="btn-shine w-full py-3.5 rounded-xl text-white font-bold text-lg shadow-lg flex items-center justify-center gap-2 bg-gradient-to-br from-teal-600 via-teal-700 to-teal-500 bg-[length:200%_200%] transition-all duration-300 hover:bg-right hover:-translate-y-0.5 hover:scale-[1.02] hover:shadow-[0_10px_25px_rgba(13,148,136,0.4)]">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </button>

            <!-- Footer note -->
            <!-- <p class="text-center text-xs text-gray-400 mt-6">
                © 2025 Softgrowth Infotech LLP. All rights reserved.
            </p> -->

        </div>
    </div>

    <!-- ===== CUSTOM ALERT ===== -->
    <div id="customAlert"
         class="fixed top-5 left-1/2 -translate-x-1/2 bg-teal-600 text-white px-6 py-3 rounded-lg shadow-lg hidden z-50 alert-slide">
        <i class="fas fa-check-circle mr-2"></i> Login Successful ✅
    </div>

    <script src="url.js"></script>
    <script>
        function goToDashboard() {
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            if (username === "" || password === "") {
                alert("Please enter Username and Password");
                return;
            }

            const customAlert = document.getElementById("customAlert");
            customAlert.classList.remove("hidden");

            setTimeout(() => {
                window.location.href = "dashboard.php";
            }, 1500);
        }
    </script>
</body>

</html>