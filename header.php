<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-sm border-b border-gray-100">
    <div class="flex items-center justify-between h-16 px-4 sm:px-6 md:px-8">

        <!-- Brand -->
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-orange-400 text-white flex items-center justify-center font-semibold text-lg shadow-md">
                E
            </div>
            <h1 class="text-xl font-bold text-gray-800 tracking-tight">
                ERP <span class="text-orange-400">System</span>
            </h1>
        </div>

        <!-- Search – hidden on mobile -->
        <div class="hidden md:flex relative w-72 lg:w-96">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                <i class="fas fa-search"></i>
            </span>
            <input id="searchInput"
                   onclick="toggleSearch()"
                   type="text"
                   placeholder="Search students, fees, records..."
                   class="w-full h-10 pl-10 pr-4 rounded-xl border border-gray-200 bg-gray-50 text-gray-700 placeholder:text-gray-400 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 outline-none transition" />
        </div>

        <!-- Right: Profile -->
        <div class="flex items-center gap-3">
            <div class="relative">
                <button onclick="toggleProfile()"
                        class="flex items-center gap-2 h-10 px-3 rounded-full bg-gray-50 border border-gray-200 hover:bg-white hover:border-teal-300 transition shadow-sm">

                    <div class="w-8 h-8 rounded-full bg-orange-400 text-white flex items-center justify-center font-semibold text-sm">
                        <span id="headerUserInitial">U</span>
                    </div>

                    <span id="headerUserRole" class="hidden sm:inline text-sm font-semibold text-gray-700">
                        Loading...
                    </span>

                    <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                </button>

                <!-- Profile dropdown -->
                <div id="profileBox" class="hidden absolute right-0 top-12 w-48 bg-white rounded-xl shadow-lg border border-gray-100 p-2 dropdown-animate">
                    <a href="profile">
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer text-gray-700 font-medium">
                            <i class="fas fa-user-circle text-orange-400"></i> Profile 
                        </div>
                    </a>

                    <!-- Register User Link (Hidden by default, shown only for Admin via JS) -->
                    <a href="register_user" id="registerUserLink" class="hidden">
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer text-gray-700 font-medium">
                            <i class="fas fa-user-plus"></i> Register User 
                        </div>
                    </a>

                  <div onclick="handleLogout()" class="flex items-center gap-3 p-2 rounded-lg hover:bg-red-50 cursor-pointer text-red-600 font-semibold">
    <i class="fas fa-sign-out-alt"></i>
    <span>Logout</span>
</div>
                </div>

            </div>
        </div>

    </div>
</header>

<style>
    .dropdown-animate {
        animation: dropFade 0.25s ease;
    }

    @keyframes dropFade {
        from {
            opacity: 0;
            transform: translateY(-8px) scale(0.97);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
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

    document.addEventListener("click", function(e) {
        const header = e.target.closest("header");
        if (!header) closeAll();
    });

    document.querySelectorAll("#searchBox, #profileBox").forEach(el => {
        el.addEventListener("click", function(e) {
            e.stopPropagation();
        });
    });

    // Load User Profile Data & Permissions Globally
    document.addEventListener("DOMContentLoaded", async function() {
        const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');
        if (!token) return;

        const baseUrl = typeof url !== 'undefined' ? url : '';
        const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;

        try {
            const headers = {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            };

            // 1. Fetch user data to populate role and control admin-only options
            const userRes = await fetch(`${cleanBase}/user`, { method: 'GET', headers });
            if (userRes.ok) {
                const userData = await userRes.json();
                const user = userData.data || userData;

                const roleEl = document.getElementById('headerUserRole');
                const initialEl = document.getElementById('headerUserInitial');
                const registerLink = document.getElementById('registerUserLink');

                if (user.role) {
                    const formattedRole = user.role.charAt(0).toUpperCase() + user.role.slice(1);
                    if (roleEl) roleEl.textContent = formattedRole;
                    if (initialEl) initialEl.textContent = user.role.charAt(0).toUpperCase();

                    // Check if user is admin or super admin
                    const roleLower = user.role.toLowerCase();
                    if (roleLower === 'admin' || roleLower === 'super admin') {
                        if (registerLink) registerLink.classList.remove('hidden');
                    } else {
                        if (registerLink) registerLink.classList.add('hidden');
                    }
                }
            }

            // 2. Fetch permissions for action-level elements
            const res = await fetch(`${cleanBase}/my-permissions`, { method: 'GET', headers });
            if (!res.ok) return;

            const json = await res.json();
            const data = json.data || {};
            
            if (data.is_admin) return;

            const permissions = data.permissions || [];
            const userActionPerms = permissions.map(p => `${p.menu_slug || ''}.${p.action.toLowerCase()}`);

            document.querySelectorAll('[data-permission]').forEach(el => {
                const requiredPerm = el.getAttribute('data-permission').toLowerCase();
                if (!userActionPerms.includes(requiredPerm)) {
                    el.style.display = 'none';
                }
            });

        } catch (err) {
            console.error('Header initialization error:', err);
        }
    });
</script>