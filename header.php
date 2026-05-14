<header class="fixed top-0 left-0 w-full h-16 bg-slate-900/90 backdrop-blur-lg border-b border-slate-800 z-50">

    <div class="h-full flex items-center justify-between px-4 lg:px-8">

        <!-- LEFT -->

        

            <h1 class="text-lg md:text-2xl ml-10 font-bold text-white">
                ERP <span class="text-cyan-400">System</span>
            </h1>

        

        <!-- SEARCH -->
        <div class="hidden md:flex relative">

            <input id="searchInput"
                onclick="toggleSearch()"
                type="text"
                placeholder="Search..."
                class="bg-slate-800 text-white px-4 py-2 rounded-xl w-64 outline-none">

            <!-- SEARCH DROPDOWN -->
            <div id="searchBox"
                class="hidden absolute top-12 left-0 w-64 bg-slate-900 border border-slate-700 rounded-xl p-3 space-y-2">

                <p class="text-slate-400 text-sm">Recent</p>
                <div class="text-white text-sm hover:bg-slate-800 p-2 rounded">Students</div>
                <div class="text-white text-sm hover:bg-slate-800 p-2 rounded">Teachers</div>
                <div class="text-white text-sm hover:bg-slate-800 p-2 rounded">Fees</div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-4">

            <!-- NOTIFICATION -->
            <!-- <div class="relative">

                <button onclick="toggleNotif()"
                    class="text-xl text-white">
                    🔔
                </button>

                <div id="notifBox"
                    class="hidden absolute right-0 top-12 w-64 bg-slate-900 border border-slate-700 rounded-xl p-3">

                    <p class="text-white text-sm">New student added</p>
                    <p class="text-slate-400 text-xs mt-1">2 mins ago</p>

                </div>

            </div> -->

            <!-- PROFILE -->
            <div class="relative">

                <button onclick="toggleProfile()"
                    class="flex items-center gap-2 bg-slate-800 px-3 py-2 rounded-xl">

                    <img src="https://i.pravatar.cc/100"
                        class="w-8 h-8 rounded-full border border-cyan-400">

                    <span class="hidden md:block text-white text-sm">Admin</span>

                </button>

                <!-- PROFILE DROPDOWN -->
                <div id="profileBox"
                    class="hidden absolute right-0 top-12 w-48 bg-slate-900 border border-slate-700 rounded-xl p-2">

                    <div class="p-2 text-white hover:bg-slate-800 rounded">Profile</div>
                    <div class="p-2 text-white hover:bg-slate-800 rounded">Settings</div>
                    <div class="p-2 text-red-400 hover:bg-slate-800 rounded">Logout</div>

                </div>

            </div>

        </div>

    </div>

</header>

<script>

const searchBox = document.getElementById("searchBox");
const notifBox = document.getElementById("notifBox");
const profileBox = document.getElementById("profileBox");

function closeAll(){
    searchBox.classList.add("hidden");
    notifBox.classList.add("hidden");
    profileBox.classList.add("hidden");
}

/* SEARCH */
function toggleSearch(){
    closeAll();
    searchBox.classList.toggle("hidden");
}

/* NOTIFICATION */
function toggleNotif(){
    closeAll();
    notifBox.classList.toggle("hidden");
}

/* PROFILE */
function toggleProfile(){
    closeAll();
    profileBox.classList.toggle("hidden");
}

/* OUTSIDE CLICK CLOSE */
document.addEventListener("click", function(e){
    const isInside = e.target.closest("header");
    if(!isInside){
        closeAll();
    }
});

</script>