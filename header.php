<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-sm border-b border-gray-100">
    <div class="flex items-center justify-between h-16 px-4 sm:px-6 md:px-8">

        <!-- Brand -->
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-teal-600 text-white flex items-center justify-center font-extrabold text-lg shadow-md">
                E
            </div>
            <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">
                ERP <span class="text-teal-600">System</span>
            </h1>
        </div>

        <!-- Search – hidden on mobile -->
        <!-- <div class="hidden md:flex relative w-72 lg:w-96">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-search"></i></span>
            <input id="searchInput" onclick="toggleSearch()" type="text"
                   placeholder="Search students, fees, records..."
                   class="w-full h-10 pl-10 pr-4 rounded-xl border border-gray-200 bg-gray-50 text-gray-700 placeholder:text-gray-400 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 outline-none transition" />
            <div id="searchBox" class="hidden absolute top-12 left-0 w-full bg-white rounded-xl shadow-lg border border-gray-100 p-3 dropdown-animate">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Recent Searches</p>
                <div class="space-y-1">
                    <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-50 cursor-pointer text-gray-700 font-medium">
                        <i class="fas fa-user-graduate text-teal-500"></i> Students
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-50 cursor-pointer text-gray-700 font-medium">
                        <i class="fas fa-chalkboard-teacher text-blue-500"></i> Teachers
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-50 cursor-pointer text-gray-700 font-medium">
                        <i class="fas fa-credit-card text-amber-500"></i> Fees
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-50 cursor-pointer text-gray-700 font-medium">
                        <i class="fas fa-chart-bar text-purple-500"></i> Records
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Right: Profile -->
        <div class="flex items-center gap-3">
            <div class="relative">
                <button onclick="toggleProfile()" class="flex items-center gap-2 h-10 px-3 rounded-full bg-gray-50 border border-gray-200 hover:bg-white hover:border-teal-300 transition shadow-sm">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-teal-600 to-teal-400 text-white flex items-center justify-center font-bold text-sm">A</div>
                    <span class="hidden sm:inline text-sm font-bold text-gray-700">Admin</span>
                    <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                </button>
                <!-- Profile dropdown -->
                <div id="profileBox" class="hidden absolute right-0 top-12 w-48 bg-white rounded-xl shadow-lg border border-gray-100 p-2 dropdown-animate">
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer text-gray-700 font-medium">
                        <i class="fas fa-user-circle text-teal-500"></i> Profile
                    </div>
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer text-gray-700 font-medium">
                        <i class="fas fa-cog text-gray-500"></i> Settings
                    </div>
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-red-50 cursor-pointer text-red-600 font-medium">
                        <a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>

<style>
    /* minimal custom – dropdown animation */
    .dropdown-animate {
        animation: dropFade 0.25s ease;
    }
    @keyframes dropFade {
        from { opacity: 0; transform: translateY(-8px) scale(0.97); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
</style>


<script>
const searchBox = document.getElementById("searchBox");
    const profileBox = document.getElementById("profileBox");

    function closeAll() {
        if (searchBox) searchBox.classList.add("hidden");
        if (profileBox) profileBox.classList.add("hidden");
    }

    function toggleSearch() {
        if (profileBox) profileBox.classList.add("hidden");
        if (searchBox) searchBox.classList.toggle("hidden");
    }

    function toggleProfile() {
        if (searchBox) searchBox.classList.add("hidden");
        if (profileBox) profileBox.classList.toggle("hidden");
    }

    // Click outside closes both
    document.addEventListener("click", function(e) {
        const header = e.target.closest("header");
        if (!header) closeAll();
    });

    // Prevent closing when clicking inside dropdowns
    document.querySelectorAll("#searchBox, #profileBox").forEach(el => {
        el.addEventListener("click", function(e) {
            e.stopPropagation();
        });
    });
</script>