<!-- MOBILE OVERLAY -->
<div id="overlay"
class="fixed inset-0 bg-black/50 backdrop-blur-sm z-30 hidden lg:hidden transition-opacity duration-300">
</div>

<!-- SIDEBAR -->
<aside id="sidebar"
class="fixed top-0 left-0 w-72 h-screen bg-slate-900 border-r border-slate-800 z-40
transform -translate-x-full lg:translate-x-0
transition-all duration-300 ease-in-out overflow-y-auto shadow-2xl">

    <!-- LOGO -->
    <div class="h-16 flex items-center justify-between px-5 border-b border-slate-800">

        <h1 class="text-2xl font-bold text-white">
            ERP <span class="text-cyan-400">Pro</span>
        </h1>

        <!-- CLOSE BUTTON MOBILE -->
        <button onclick="closeSidebar()"
        class="lg:hidden text-white text-2xl hover:text-cyan-400 transition">
            ✕
        </button>

    </div>

    <!-- MENU -->
    <div class="p-4 space-y-2">

    <!-- DASHBOARD -->
    <a href="dashboard"
    class="flex items-center gap-4 px-4 py-3 rounded-xl text-slate-300
    hover:bg-cyan-500 hover:text-white transition-all duration-300">
        🏠 Dashboard
    </a>

    <!-- STUDENT ENTRY -->
    <div class="dropdown">

        <button onclick="toggleDropdown('studentMenu', this)"
        class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-slate-300
        hover:bg-cyan-500 hover:text-white transition-all duration-300">

            <span class="flex items-center gap-4">
                🎓 Student Entry
            </span>

            <span class="arrow transition-transform duration-300">
                ▼
            </span>

        </button>

        <div id="studentMenu"
        class="dropdown-menu max-h-0 overflow-hidden transition-all duration-500 ease-in-out ml-6 mt-2 space-y-2">

            <a href="student_reg"
            class="block px-4 py-2 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-cyan-400 transition">
                ➕ Student Registration
            </a>

            <a href="student_payment"
            class="block px-4 py-2 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-cyan-400 transition">
                💳 Student Payment
            </a>

        </div>

    </div>

    <!-- RECORDS -->
    <div class="dropdown">

        <button onclick="toggleDropdown('recordMenu', this)"
        class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-slate-300
        hover:bg-cyan-500 hover:text-white transition-all duration-300">

            <span class="flex items-center gap-4">
                📊 Records
            </span>

            <span class="arrow transition-transform duration-300">
                ▼
            </span>

        </button>

        <div id="recordMenu"
        class="dropdown-menu max-h-0 overflow-hidden transition-all duration-500 ease-in-out ml-6 mt-2 space-y-2">

          <a href="student_record"
   class="block px-4 py-2 rounded-md text-slate-400 hover:bg-slate-800 hover:text-cyan-400">
    👨‍🎓 Student Record
</a>

<a href="payment_record"
   class="block px-4 py-2 rounded-md text-slate-400 hover:bg-slate-800 hover:text-cyan-400">
    💰 Payment Record
</a>

<a href="balance_payment"
   class="block px-4 py-2 rounded-md text-slate-400 hover:bg-slate-800 hover:text-cyan-400">
    ⚖️ Balance Payments
</a>

<a href="Leager_form"
   class="block px-4 py-2 rounded-md text-slate-400 hover:bg-slate-800 hover:text-cyan-400">
    📒 Ledger
</a>

<a href="cash_memo_records"
   class="block px-4 py-2 rounded-md text-slate-400 hover:bg-slate-800 hover:text-cyan-400">
    💵 Cash Memo Records
</a>
        </div>

    </div>

    <!-- SIMPLE ITEMS -->
    <a href="bonafide"
    class="flex items-center gap-4 px-4 py-3 rounded-xl text-slate-300
    hover:bg-cyan-500 hover:text-white transition-all duration-300">
        📄 Bonafide
    </a>
    
    <a href="cash_memo"
    class="flex items-center gap-4 px-4 py-3 rounded-xl text-slate-300
    hover:bg-cyan-500 hover:text-white transition-all duration-300">
       💵  Cash Memo
    </a>

    <a href="i_card"
    class="flex items-center gap-4 px-4 py-3 rounded-xl text-slate-300
    hover:bg-cyan-500 hover:text-white transition-all duration-300">
        🆔 I Card
    </a>

    <a href="update_password"
    class="flex items-center gap-4 px-4 py-3 rounded-xl text-slate-300
    hover:bg-cyan-500 hover:text-white transition-all duration-300">
        🔑 Update password
    </a>

    <!-- LOGOUT -->
    <a href="#"
    class="flex items-center gap-4 px-4 py-3 rounded-xl text-red-400
    hover:bg-red-500/20 hover:text-red-300 transition-all duration-300">
        🚪 Logout
    </a>

</div>


</aside>

<!-- TOGGLE BUTTON -->
<button onclick="toggleSidebar()"
class="fixed top-2 left-2 z-50 lg:hidden
w-12 h-12 rounded-xl
 text-white text-2xl
shadow-lg hover:scale-110 transition">

☰

</button>

<!-- SCRIPT -->
<script>

const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");

/* SIDEBAR OPEN/CLOSE */

function toggleSidebar(){

sidebar.classList.toggle("-translate-x-full");

overlay.classList.toggle("hidden");

}

/* CLOSE SIDEBAR */

function closeSidebar(){

sidebar.classList.add("-translate-x-full");

overlay.classList.add("hidden");

}

/* OUTSIDE CLICK CLOSE */

overlay.addEventListener("click", closeSidebar);

/* AUTO CLOSE OTHER DROPDOWNS */

function toggleDropdown(id){

const currentMenu = document.getElementById(id);

const allMenus = document.querySelectorAll(".dropdown-menu");

const allArrows = document.querySelectorAll(".arrow");

/* CLOSE ALL OTHER MENUS */

allMenus.forEach(menu => {

if(menu.id !== id){

menu.style.maxHeight = null;

}

});

/* RESET OTHER ARROWS */

allArrows.forEach(arrow => {

if(arrow.parentElement.parentElement
.querySelector(".dropdown-menu").id !== id){

arrow.classList.remove("rotate-180");

}

});

/* TOGGLE CURRENT */

const arrow = currentMenu.parentElement.querySelector(".arrow");

if(currentMenu.style.maxHeight){

currentMenu.style.maxHeight = null;

arrow.classList.remove("rotate-180");

}else{

currentMenu.style.maxHeight =
currentMenu.scrollHeight + "px";

arrow.classList.add("rotate-180");

}

}

/* DESKTOP FIX */

window.addEventListener("resize", () => {

if(window.innerWidth >= 1024){

overlay.classList.add("hidden");

sidebar.classList.remove("-translate-x-full");

}else{

sidebar.classList.add("-translate-x-full");

}

});

</script>