<!-- MOBILE OVERLAY -->
<div id="overlay"
class="fixed inset-0 bg-black/70 backdrop-blur-md z-30 hidden lg:hidden transition-all duration-300">
</div>

<!-- SIDEBAR -->
<aside id="sidebar"
class="fixed top-0 left-0 w-72 h-screen z-40
transform -translate-x-full lg:translate-x-0
transition-all duration-500 ease-[cubic-bezier(.4,0,.2,1)]
overflow-y-auto shadow-2xl erp-side">

    <!-- LOGO -->
    <div class="h-16 flex items-center justify-between px-5 erp-side-logo">
        <h1 class="text-2xl font-black text-white tracking-tight">
            ERP <span>Pro</span>
        </h1>

        <button onclick="closeSidebar()"
        class="lg:hidden text-white text-2xl hover:text-purple-400 transition">
            ✕
        </button>
    </div>

    <!-- MENU -->
    <div class="p-4 space-y-2">

        <a href="dashboard" class="erp-nav-link">
            <span class="erp-nav-icon">🏠</span>
            <span>Dashboard</span>
        </a>

        <div class="dropdown">
            <button onclick="toggleDropdown('studentMenu')" class="erp-nav-link erp-nav-btn">
                <span class="flex items-center gap-3">
                    <span class="erp-nav-icon">🎓</span>
                    <span>Student Entry</span>
                </span>
                <span class="arrow transition-transform duration-300">⌄</span>
            </button>

            <div id="studentMenu" class="dropdown-menu">
                <a href="student_reg" class="erp-sub-link">➕ Student Registration</a>
                <a href="student_payment" class="erp-sub-link">💳 Student Payment</a>
            </div>
        </div>

        <div class="dropdown">
            <button onclick="toggleDropdown('recordMenu')" class="erp-nav-link erp-nav-btn">
                <span class="flex items-center gap-3">
                    <span class="erp-nav-icon">📊</span>
                    <span>Records</span>
                </span>
                <span class="arrow transition-transform duration-300">⌄</span>
            </button>

            <div id="recordMenu" class="dropdown-menu">
                <a href="student_record" class="erp-sub-link">👨‍🎓 Student Record</a>
                <a href="payment_record" class="erp-sub-link">💰 Payment Record</a>
                <a href="balance_payment" class="erp-sub-link">⚖️ Balance Payments</a>
                <a href="Leager_form" class="erp-sub-link">📒 Ledger</a>
                <a href="cash_memo_records" class="erp-sub-link">💵 Cash Memo Records</a>
            </div>
        </div>

        <a href="bonafide" class="erp-nav-link">
            <span class="erp-nav-icon">📄</span>
            <span>Bonafide</span>
        </a>

        <a href="cash_memo" class="erp-nav-link">
            <span class="erp-nav-icon">💵</span>
            <span>Cash Memo</span>
        </a>

        <a href="i_card" class="erp-nav-link">
            <span class="erp-nav-icon">🆔</span>
            <span>I Card</span>
        </a>

        <a href="update_password" class="erp-nav-link">
            <span class="erp-nav-icon">🔑</span>
            <span>Update Password</span>
        </a>

        <a href="#" class="erp-nav-link erp-logout">
            <span class="erp-nav-icon">🚪</span>
            <span>Logout</span>
        </a>

    </div>
</aside>

<!-- TOGGLE BUTTON -->
<button onclick="toggleSidebar()"
class="fixed top-3 left-5 z-50 lg:hidden erp-menu-btn">
    ☰
</button>

<style>
/* ULTRA PREMIUM SIDEBAR */
.erp-side{
    background:
#FFFFFF;

    border-right:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(5px);
    /* -webkit-backdrop-filter:blur(30px); */

    box-shadow:20px 0 80px rgba(0,0,0,.45);
}

/* GLOW BACKGROUND */
.erp-side::before{
    content:"";
    position:absolute;
    inset:0;

    /* background:
        radial-gradient(circle at top left,
        rgba(168,85,247,.25),
        transparent 32%),

        radial-gradient(circle at bottom right,
        rgba(59,130,246,.20),
        transparent 35%),

        linear-gradient(
            120deg,
            transparent,
            rgba(255,255,255,.035),
            transparent
        ); */

    pointer-events:none;
}

/* LOGO */
.erp-side-logo{
    position:sticky;
    top:0;
    z-index:2;

    background:rgba(6,8,22,.72);
    backdrop-filter:blur(25px);
    -webkit-backdrop-filter:blur(25px);

    border-bottom:1px solid rgba(255,255,255,.07);
}

.erp-side-logo span{
    color:#A855F7;
    text-shadow:
        0 0 12px rgba(168,85,247,.7),
        0 0 30px rgba(168,85,247,.4);
}

/* MAIN LINKS */
.erp-nav-link{
    position:relative;
    z-index:1;

    display:flex;
    align-items:center;
    gap:12px;
    width:100%;

    padding:11px 13px;
    border-radius:0px;

    color:black;
    font-size:14px;
    font-weight:800;

    /* background:rgba(54, 54, 54, 0.12); */
    border-bottom:2px solid #00000039;

    transition:.35s ease;
}

.erp-nav-link::before{
    content:"";
    position:absolute;
    inset:0;
    border-radius:18px;

    /* background:
        linear-gradient(
            90deg,
            rgba(168,85,247,.28),
            rgba(59,130,246,.22)
        ); */

    opacity:0;
    transition:.35s ease;
    z-index:-1;
}

.erp-nav-link:hover{
    color:black;
    transform:translateX(6px);
    /* border-color:rgba(168,85,247,.40); */

    box-shadow:
        0 12px 35px rgb(0, 0, 0);
}

.erp-nav-link:hover::before{
    opacity:1;
}

.erp-nav-btn{
    justify-content:space-between;
}

/* ICONS */
.erp-nav-icon{
    width:38px;
    height:38px;

    display:grid;
    place-items:center;

    border-radius:14px;

    background:
    #a7560085;

    border:1px solid rgba(255,255,255,.09);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.12),
        0 8px 18px rgba(0,0,0,.18);
}

/* DROPDOWN */
.dropdown-menu{
    max-height:0;
    overflow:hidden;
    background-color:rgba(172, 172, 172, 0.68);
    margin-left:18px;
    margin-top:8px;
    padding-left:12px;
    border-radius: 10px;
    border-left:1px dashed rgba(168,85,247,.55);

    transition:max-height .45s ease;
}

.erp-sub-link{
    display:block;

    margin-bottom:7px;
    padding:9px 12px;

    border-radius:10px;

    color:black;
    font-size:13px;
    font-weight:700;

    background:rgba(255, 255, 255, 0);

    transition:.25s ease;
}

.erp-sub-link:hover{
    color:black;
    /* background:rgba(168,85,247,.11); */
    transform:translateX(4px);
    box-shadow:0 12px 28px rgb(0, 0, 0);
}

/* LOGOUT */
.erp-logout{
    margin-top:10px;
border-radius: 0px;
    color:black;
    background:rgba(255, 0, 0, 0.37);
    /* border-color:rgba(239,68,68,.18); */
}

.erp-logout:hover{
    border-color:rgba(255, 0, 0, 0.45);
    box-shadow:0 12px 28px rgb(0, 0, 0);
}

/* MOBILE BUTTON */
.erp-menu-btn{
    width:40px;
    height:40px;

    margin-left:6px;
    margin-bottom:10px;
    margin-top: -11px;
    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:14px;

    color:#fff;
    font-size:22px;
    font-weight:900;

    background:linear-gradient(
        135deg,
        #7C3AED,
        #06B6D4
    );

    border:1px solid rgba(255,255,255,.15);

    box-shadow:
        0 10px 25px rgba(124,58,237,.25);

    transition:.3s ease;
}

.erp-menu-btn:hover{
    transform:scale(1.08);
}

/* SCROLLBAR */
.erp-side::-webkit-scrollbar{
    width:5px;
}

.erp-side::-webkit-scrollbar-thumb{
    background:rgba(168,85,247,.55);
    border-radius:20px;
}

.rotate-180{
    transform:rotate(180deg);
}
</style>

<script>
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");

function toggleSidebar(){
    sidebar.classList.toggle("-translate-x-full");
    overlay.classList.toggle("hidden");
}

function closeSidebar(){
    sidebar.classList.add("-translate-x-full");
    overlay.classList.add("hidden");
}

overlay.addEventListener("click", closeSidebar);

function toggleDropdown(id){
    const currentMenu = document.getElementById(id);
    const allMenus = document.querySelectorAll(".dropdown-menu");
    const allArrows = document.querySelectorAll(".arrow");

    allMenus.forEach(menu => {
        if(menu.id !== id){
            menu.style.maxHeight = null;
        }
    });

    allArrows.forEach(arrow => {
        const menu = arrow.closest(".dropdown").querySelector(".dropdown-menu");

        if(menu.id !== id){
            arrow.classList.remove("rotate-180");
        }
    });

    const arrow = currentMenu.closest(".dropdown").querySelector(".arrow");

    if(currentMenu.style.maxHeight){
        currentMenu.style.maxHeight = null;
        arrow.classList.remove("rotate-180");
    }else{
        currentMenu.style.maxHeight = currentMenu.scrollHeight + "px";
        arrow.classList.add("rotate-180");
    }
}

window.addEventListener("resize", () => {
    if(window.innerWidth >= 1024){
        overlay.classList.add("hidden");
        sidebar.classList.remove("-translate-x-full");
    }else{
        sidebar.classList.add("-translate-x-full");
    }
});
</script>