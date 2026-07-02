<!-- MOBILE OVERLAY -->
<div id="overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-30 hidden lg:hidden transition-all duration-300"></div>

<!-- SIDEBAR -->
<aside id="sidebar" class="fixed top-0 left-0 w-72 h-screen z-40 transform -translate-x-full lg:translate-x-0 transition-all duration-500 ease-[cubic-bezier(.4,0,.2,1)] overflow-y-auto bg-white shadow-2xl border-r border-gray-200 erp-side">

    <!-- LOGO -->
    <div class="sticky top-0 z-10 bg-white/80 backdrop-blur-md border-b border-gray-200 h-16 flex items-center justify-between px-5">
        <h1 class="text-2xl font-black text-gray-800 tracking-tight">
            ERP <span class="text-teal-600">Pro</span>
        </h1>
        <button onclick="closeSidebar()" class="lg:hidden text-gray-500 hover:text-teal-600 text-2xl transition">
            ✕
        </button>
    </div>

    <!-- MENU -->
    <div class="p-4 space-y-1">

        <a href="dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 font-bold hover:bg-teal-50 hover:text-teal-700 transition-all duration-200">
            <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-teal-600 text-lg">🏠</span>
            <span>Dashboard</span>
        </a>

        <!-- Student Entry Dropdown -->
        <div class="dropdown">
            <button onclick="toggleDropdown('studentMenu')" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-gray-700 font-bold hover:bg-teal-50 hover:text-teal-700 transition-all duration-200">
                <span class="flex items-center gap-3">
                    <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-teal-600 text-lg">🎓</span>
                    <span>Student Entry</span>
                </span>
                <span class="arrow transition-transform duration-300 text-gray-400">⌄</span>
            </button>
            <div id="studentMenu" class="dropdown-menu overflow-hidden max-h-0 transition-all duration-300 ease-in-out ml-4 pl-4 border-l-2 border-teal-200 space-y-1 mt-1">
                <a href="student_reg" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-teal-50 hover:text-teal-700 transition">➕ Student Registration</a>
                <a href="student_payment" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-teal-50 hover:text-teal-700 transition">💳 Student Payment</a>
            </div>
        </div>

        <!-- Records Dropdown -->
        <div class="dropdown">
            <button onclick="toggleDropdown('recordMenu')" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-gray-700 font-bold hover:bg-teal-50 hover:text-teal-700 transition-all duration-200">
                <span class="flex items-center gap-3">
                    <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-teal-600 text-lg">📊</span>
                    <span>Records</span>
                </span>
                <span class="arrow transition-transform duration-300 text-gray-400">⌄</span>
            </button>
            <div id="recordMenu" class="dropdown-menu overflow-hidden max-h-0 transition-all duration-300 ease-in-out ml-4 pl-4 border-l-2 border-teal-200 space-y-1 mt-1">
                <a href="student_record" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-teal-50 hover:text-teal-700 transition">👨‍🎓 Student Record</a>
                <a href="payment_record" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-teal-50 hover:text-teal-700 transition">💰 Payment Record</a>
                <a href="balance_payment" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-teal-50 hover:text-teal-700 transition">⚖️ Balance Payments</a>
                <a href="Leager_form" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-teal-50 hover:text-teal-700 transition">📒 Ledger</a>
                <a href="cash_memo_records" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-teal-50 hover:text-teal-700 transition">💵 Cash Memo Records</a>
            </div>
        </div>

        <a href="bonafide" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 font-bold hover:bg-teal-50 hover:text-teal-700 transition-all duration-200">
            <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-teal-600 text-lg">📄</span>
            <span>Bonafide</span>
        </a>

        <a href="cash_memo" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 font-bold hover:bg-teal-50 hover:text-teal-700 transition-all duration-200">
            <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-teal-600 text-lg">💵</span>
            <span>Cash Memo</span>
        </a>

        <a href="i_card" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 font-bold hover:bg-teal-50 hover:text-teal-700 transition-all duration-200">
            <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-teal-600 text-lg">🆔</span>
            <span>I Card</span>
        </a>

        <a href="update_password" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 font-bold hover:bg-teal-50 hover:text-teal-700 transition-all duration-200">
            <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-teal-600 text-lg">🔑</span>
            <span>Update Password</span>
        </a>

        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-600 font-bold hover:bg-red-50 transition-all duration-200 mt-4 border-t border-gray-200 pt-4">
            <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-50 text-red-500 text-lg">🚪</span>
            <span>Logout</span>
        </a>

    </div>
</aside>

<!-- TOGGLE BUTTON -->
<button onclick="toggleSidebar()" class="fixed top-4 left-4 z-50 lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-teal-600 text-white text-2xl font-bold shadow-lg hover:bg-teal-700 transition-all duration-200 hover:scale-105">
    ☰
</button>

<style>
  /* minimal custom – dropdown max-height animation & scrollbar */
    .dropdown-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .dropdown-menu.open {
        max-height: 500px; /* enough to show all items */
    }
    .arrow.rotate-180 {
        transform: rotate(180deg);
    }
    /* custom scrollbar for sidebar */
    .erp-side::-webkit-scrollbar {
        width: 5px;
    }
    .erp-side::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 20px;
    }
    .erp-side::-webkit-scrollbar-thumb:hover {
        background: #a1a8b3;
    }
</style>

<script>
  const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");

    function toggleSidebar() {
        sidebar.classList.toggle("-translate-x-full");
        overlay.classList.toggle("hidden");
    }

    function closeSidebar() {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    }

    overlay.addEventListener("click", closeSidebar);

    function toggleDropdown(id) {
        const menu = document.getElementById(id);
        const arrow = menu.closest(".dropdown").querySelector(".arrow");
        const isOpen = menu.classList.contains("open");

        // close all other dropdowns
        document.querySelectorAll(".dropdown-menu").forEach(m => {
            if (m.id !== id) {
                m.classList.remove("open");
                m.closest(".dropdown").querySelector(".arrow")?.classList.remove("rotate-180");
            }
        });

        if (isOpen) {
            menu.classList.remove("open");
            arrow.classList.remove("rotate-180");
        } else {
            menu.classList.add("open");
            arrow.classList.add("rotate-180");
        }
    }

    // close sidebar on window resize to desktop
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            overlay.classList.add("hidden");
            sidebar.classList.remove("-translate-x-full");
        } else {
            sidebar.classList.add("-translate-x-full");
        }
    });
</script>