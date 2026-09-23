<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register + Login - ERP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes rotate-bg {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        /* .animate-float { animation: float 4s ease-in-out infinite; } */
        .animate-rotate-bg { animation: rotate-bg 20s linear infinite; }
        .btn-shine { position: relative; overflow: hidden; }
        .btn-shine::after {
            content: "";
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: 0.5s;
        }
        .btn-shine:hover::after { left: 100%; }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-r from-white to-teal-800">

    <!-- =========================
         REGISTER CARD
    ========================= -->
    <div id="registerBox"
        class="w-full max-w-5xl bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl relative overflow-hidden border border-white/30 transition-all duration-700">

        <div class="grid grid-cols-1 lg:grid-cols-2">

            <!-- ===== LEFT SIDE: LOGO PANEL ===== -->
            <div class="relative flex flex-col items-center justify-center p-10 lg:p-12 text-white bg-gradient-to-br from-teal-700 via-teal-600 to-teal-400 overflow-hidden">
                <!-- Rotating decorative overlay -->
                <div class="absolute -top-1/2 -left-1/2 w-[200%] h-[200%] bg-[radial-gradient(circle,rgba(255,255,255,0.1)_0%,transparent_70%)] animate-rotate-bg"></div>
                <!-- Dots pattern overlay -->
                <div class="absolute inset-0 bg-[length:20px_20px]"></div>

                <div class="relative z-10 flex flex-col items-center gap-4">
                    <!-- Floating logo -->
                    <div class="animate-float">
                        <img src="images/soft_logo.webp"
                             alt="Softgrowth Infotech Logo"
                             class="h-48 w-auto rounded-2xl ml-10 p-3  " />
                    </div>
                    <span class="text-2xl font-bold tracking-wide uppercase text-center drop-shadow-lg -mt-4">
                        Softgrowth Infotech LLP.
                    </span>
                    <span class="text-2xl font-bold tracking-wide uppercase -mt-3 text-teal-100 text-center drop-shadow-lg">
                        ERP System
                    </span>
                    <div class="flex items-center gap-3 mt-2">
                        <span class="h-px w-8 bg-teal-200/60"></span>
                        <p class="text-teal-100 text-md font-medium tracking-wider">Grow With Technology</p>
                        <span class="h-px w-8 bg-teal-200/60"></span>
                    </div>
                    <!-- Trust badges -->
                    <div class="flex gap-6 mt-6 text-teal-100/80">
                        <div class="flex flex-col items-center gap-1">
                            <i class="fas fa-shield-alt text-xl"></i>
                            <span class="text-[10px] uppercase tracking-wider">Secure</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <i class="fas fa-bolt text-xl"></i>
                            <span class="text-[10px] uppercase tracking-wider">Fast</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <i class="fas fa-chart-line text-xl"></i>
                            <span class="text-[10px] uppercase tracking-wider">Scalable</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== RIGHT SIDE: FORM ===== -->
            <div class="p-8 lg:p-10 bg-white/80 backdrop-blur-sm">

                <div class="flex items-center gap-3 mb-2">
                    <span class="h-1 w-8 bg-gradient-to-r from-teal-500 to-teal-300 rounded-full"></span>
                    <span class="text-xs font-semibold uppercase tracking-widest text-teal-600">Get Started</span>
                </div>

                <h2 class="text-3xl font-bold text-gray-900 mb-1">Create Account</h2>
                <p class="text-gray-500 text-sm mb-6">Start your journey with premium experience</p>

                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="relative">
                            <i class="fas fa-building absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10 peer-focus:text-teal-600 transition-colors"></i>
                            <input class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50/80 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:bg-white focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                                placeholder="Org Name">
                        </div>

                        <div class="relative">
                            <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10 peer-focus:text-teal-600 transition-colors"></i>
                            <input class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50/80 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:bg-white focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                                placeholder="Owner Name">
                        </div>

                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10 peer-focus:text-teal-600 transition-colors"></i>
                            <input class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50/80 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:bg-white focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                                placeholder="Email">
                        </div>

                        <div class="relative">
                            <i class="fas fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10 peer-focus:text-teal-600 transition-colors"></i>
                            <input class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50/80 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:bg-white focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                                placeholder="Mobile">
                        </div>

                        <div class="relative md:col-span-2">
                            <i class="fas fa-map-marker-alt absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10 peer-focus:text-teal-600 transition-colors"></i>
                            <input class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50/80 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:bg-white focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                                placeholder="Address">
                        </div>

                        <div class="relative">
                            <i class="fas fa-at absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10 peer-focus:text-teal-600 transition-colors"></i>
                            <input class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50/80 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:bg-white focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                                placeholder="Username">
                        </div>

                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10 peer-focus:text-teal-600 transition-colors"></i>
                            <input type="password" class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50/80 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:bg-white focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                                placeholder="Password">
                        </div>

                    </div>

                    <button id="btn"
                        onclick="registerUser()"
                        class="btn-shine w-full py-4 rounded-xl text-white font-bold text-lg shadow-lg flex items-center justify-center gap-2 bg-gradient-to-br from-teal-600 via-teal-700 to-teal-500 bg-[length:200%_200%] transition-all duration-300 hover:bg-right hover:-translate-y-0.5 hover:scale-[1.02] hover:shadow-[0_10px_25px_rgba(13,148,136,0.4)]">
                        <i class="fas fa-rocket"></i>
                        Register
                    </button>

                    <p class="text-center text-xs text-gray-400 mt-4">
                        Already have an account?
                        <a href="#" class="text-teal-600 font-semibold hover:underline">Sign In</a>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- =========================
         LOGIN MODAL
    ========================= -->
    <div id="loginModal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-md p-4">

        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-sm p-8 relative border border-white/50 transition-all duration-300">

            <button onclick="closeModal()"
                class="absolute right-5 top-4 text-gray-400 hover:text-red-500 text-3xl transition-all duration-300 hover:rotate-90">
                ×
            </button>

            <div class="flex justify-center mb-4">
                <div class="flex items-center gap-2 bg-gray-50 px-4 py-2 rounded-full">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center">
                        <i class="fas fa-cube text-white text-sm"></i>
                    </div>
                    <span class="text-lg font-bold text-gray-800">Softgrowth <span class="text-teal-600">ERP</span></span>
                </div>
            </div>

            <h2 class="text-2xl font-extrabold text-gray-900 text-center mb-2">Welcome Back</h2>
            <p class="text-gray-400 text-center text-sm mb-6">Sign in to continue to your dashboard</p>

            <div class="relative mb-4">
                <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                <input class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                    placeholder="Username">
            </div>

            <div class="relative mb-6">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                <input type="password" class="w-full p-3 pl-11 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none transition-all duration-300 hover:-translate-y-0.5 focus:border-teal-500 focus:-translate-y-1 focus:shadow-[0_0_0_2px_#0f766e]"
                    placeholder="Password">
            </div>

            <button class="btn-shine w-full py-4 rounded-xl text-white font-bold text-lg shadow-lg flex items-center justify-center gap-2 bg-gradient-to-br from-teal-600 via-teal-700 to-teal-500 bg-[length:200%_200%] transition-all duration-300 hover:bg-right hover:-translate-y-0.5 hover:scale-[1.02] hover:shadow-[0_10px_25px_rgba(13,148,136,0.4)]">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </button>

        </div>
    </div>

    <!-- =========================
         SCRIPT
    ========================= -->
    <script>
        function registerUser() {
            const btn = document.getElementById("btn");
            const box = document.getElementById("registerBox");

            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating...';
            btn.disabled = true;

            setTimeout(() => {
                box.classList.add("scale-90", "translate-y-5", "opacity-0");

                setTimeout(() => {
                    box.classList.add("hidden");
                    document.getElementById("loginModal").classList.remove("hidden");
                    btn.innerHTML = '<i class="fas fa-rocket"></i> Register';
                    btn.disabled = false;
                }, 400);
            }, 700);
        }

        function closeModal() {
            document.getElementById("loginModal").classList.add("hidden");
        }

        document.getElementById("loginModal").addEventListener("click", function(e) {
            if (e.target === this) closeModal();
        });

        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape") closeModal();
        });
    </script>

</body>

</html>