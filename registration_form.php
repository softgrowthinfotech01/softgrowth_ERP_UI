<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register + Login - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* Minimal custom styles – only for animations and button shine */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.7) rotateX(10deg);
            }
            to {
                opacity: 1;
                transform: scale(1) rotateX(0);
            }
        }
        .animate-fadeUp {
            animation: fadeUp 0.7s ease;
        }
        .animate-pop {
            animation: popIn 0.35s ease;
        }
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        .btn-shine::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: 0.5s;
        }
        .btn-shine:hover::after {
            left: 100%;
        }
        .btn-shine:hover {
            transform: translateY(-2px) scale(1.02);
        }
        /* input transition */
        .input-transition {
            transition: 0.3s;
        }
        .input-transition:hover {
            transform: translateY(-2px);
        }
        .input-transition:focus {
            transform: translateY(-3px);
            box-shadow: 0 0 0 2px #0f766e;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100 p-4">

    <!-- =========================
         REGISTER CARD
    ========================= -->
    <div id="registerBox"
        class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 animate-fadeUp relative">

        <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-1">
            Create Account
        </h2>
        <p class="text-gray-500 text-center text-sm mb-6">
            Start your journey with premium experience
        </p>

        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <input class="input-transition w-full p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none focus:border-teal-500"
                    placeholder="Org Name">

                <input class="input-transition w-full p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none focus:border-teal-500"
                    placeholder="Owner Name">

                <input class="input-transition w-full p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none focus:border-teal-500"
                    placeholder="Email">

                <input class="input-transition w-full p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none focus:border-teal-500"
                    placeholder="Mobile">

                <input class="input-transition w-full p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none md:col-span-2"
                    placeholder="Address">

                <input class="input-transition w-full p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none focus:border-teal-500"
                    placeholder="Username">

                <input class="input-transition w-full p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none focus:border-teal-500"
                    placeholder="Password">

            </div>

            <button id="btn"
                onclick="registerUser()"
                class="btn-shine w-full py-3 rounded-xl bg-teal-600 text-white font-bold transition hover:bg-teal-700 shadow-md">
                Register
            </button>
        </div>
    </div>

    <!-- =========================
         LOGIN MODAL
    ========================= -->
    <div id="loginModal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm p-4">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-8 animate-pop relative">

            <button onclick="closeModal()"
                class="absolute right-4 top-3 text-gray-400 hover:text-red-500 text-2xl transition">
                ×
            </button>

            <h2 class="text-2xl font-extrabold text-gray-900 text-center mb-6">
                Welcome Back
            </h2>

            <input class="input-transition w-full p-3 mb-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none focus:border-teal-500"
                placeholder="Username">

            <input class="input-transition w-full p-3 mb-5 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 outline-none focus:border-teal-500"
                placeholder="Password">

            <button class="btn-shine w-full py-3 rounded-xl bg-teal-600 text-white font-bold hover:bg-teal-700 transition shadow-md">
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

            btn.innerText = "Creating...";
            btn.disabled = true;

            setTimeout(() => {
                box.style.transform = "scale(0.9) translateY(20px)";
                box.style.opacity = "0";

                setTimeout(() => {
                    box.style.display = "none";
                    document.getElementById("loginModal").classList.remove("hidden");
                    btn.innerText = "Register";
                    btn.disabled = false;
                }, 400);
            }, 700);
        }

        function closeModal() {
            document.getElementById("loginModal").classList.add("hidden");
        }

        // Click outside modal to close
        document.getElementById("loginModal").addEventListener("click", function(e) {
            if (e.target === this) closeModal();
        });

        // Escape key closes modal
        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape") closeModal();
        });
    </script>

</body>

</html>