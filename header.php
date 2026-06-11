<header class="erp-header fixed top-0 left-0 w-full h-16 z-50">

    <div class="erp-header-inner">

        <!-- LEFT -->
        <div class="erp-brand">
            <div class="erp-brand-mark">E</div>

            <h1>
                ERP <span>System</span>
            </h1>
        </div>

        <!-- SEARCH -->
        <div class="erp-search hidden md:flex">

            <span class="erp-search-icon">⌕</span>

            <input id="searchInput"
                onclick="toggleSearch()"
                type="text"
                placeholder="Search students, fees, records..."
                autocomplete="off">

            <div id="searchBox" class="erp-search-box hidden">

                <p>Recent Searches</p>

                <div>🎓 Students</div>
                <div>👨‍🏫 Teachers</div>
                <div>💳 Fees</div>
                <div>📊 Records</div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="erp-header-right">

            <!-- PROFILE -->
            <div class="relative">

                <button onclick="toggleProfile()" class="erp-profile-btn">

                    <div class="erp-avatar">
                        A
                    </div>

                    <span>Admin</span>

                    <!-- <small>⌄</small> -->

                </button>

                <div id="profileBox" class="erp-profile-box hidden">

                    <div>👤 Profile</div>
                    <div>⚙️ Settings</div>
                    <div class="logout">🚪 Logout</div>

                </div>

            </div>

        </div>

    </div>

</header>

<style>
/* PREMIUM HEADER */
.erp-header{
    padding:10px 18px;
    background:transparent;
    margin-top: -8px;
}

.erp-header-inner{
    height:80%;

    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;

    padding: 30px;

    background:
    #05618F;

    border:1px solid rgba(226,232,240,.90);
    border-radius:0 0 26px 26px;

    backdrop-filter:blur(24px);
    -webkit-backdrop-filter:blur(24px);

    box-shadow:
        0 16px 40px rgba(15,23,42,.10),
        inset 0 1px 0 rgba(255,255,255,1);
}

/* BRAND */
.erp-brand{
    display:flex;
    align-items:center;
    gap:12px;
}

.erp-brand-mark{
    width:38px;
    height:38px;

    display:grid;
    place-items:center;

    border-radius:14px;

    color:white;
    font-size:18px;
    font-weight:950;

    background:
     black;

    box-shadow:
        0 10px 24px rgba(99,102,241,.28);
}

.erp-brand h1{
    color:white;
    font-size:22px;
    font-weight:950;
    letter-spacing:-.6px;
}

.erp-brand h1 span{
    color:white;
}

/* SEARCH */
.erp-search{
    position:relative;
    align-items:center;

    width:360px;
}

.erp-search-icon{
    position:absolute;
    left:14px;
    z-index:2;

    color:#64748B;
    font-size:18px;
    font-weight:900;
}

.erp-search input{
    width:100%;
    height:42px;

    padding:0 16px 0 42px;

    border-radius:16px;

    background:#F8FAFC;
    border:1px solid #E2E8F0;

    color:#0F172A;
    font-size:14px;
    font-weight:700;

    outline:none;

    transition:.28s ease;
}

.erp-search input:focus{
    border-color:#A5B4FC;
    background:#fff;

    box-shadow:
        0 0 0 4px rgba(99,102,241,.10);
}

.erp-search-box,
.erp-profile-box{
    position:absolute;
    top:52px;

    background:rgba(255,255,255,.96);
    backdrop-filter:blur(24px);
    -webkit-backdrop-filter:blur(24px);

    border:1px solid #E2E8F0;
    border-radius:18px;

    box-shadow:
        0 22px 55px rgba(15,23,42,.16);

    animation:dropFade .25s ease;
}

.erp-search-box{
    left:0;
    width:100%;
    padding:12px;
}

.erp-search-box p{
    color:#94A3B8;
    font-size:12px;
    font-weight:900;
    margin-bottom:8px;
}

.erp-search-box div,
.erp-profile-box div{
    padding:10px 12px;
    border-radius:13px;

    color:#334155;
    font-size:13px;
    font-weight:800;

    cursor:pointer;
    transition:.25s ease;
}

.erp-search-box div:hover,
.erp-profile-box div:hover{
    color:#4F46E5;
    background:#EEF2FF;
}

/* RIGHT */
.erp-header-right{
    display:flex;
    align-items:center;
    gap:12px;
}

.erp-profile-btn{
    display:flex;
    align-items:center;
    gap:9px;

    height:42px;

    padding:4px 12px 4px 5px;

    border-radius:999px;

    background:#F8FAFC;
    border:1px solid #E2E8F0;

    transition:.28s ease;
}

.erp-profile-btn:hover{
    background:#fff;
    border-color:#A5B4FC;
    box-shadow:
        0 10px 25px rgba(99,102,241,.13);
}

.erp-avatar{
    width:32px;
    height:32px;

    display:grid;
    place-items:center;

    border-radius:50%;

    color:#fff;
    font-size:13px;
    font-weight:950;

    background:
        linear-gradient(
            135deg,
            #6366F1,
            #8B5CF6
        );
}

.erp-profile-btn span{
    color:#0F172A;
    font-size:14px;
    font-weight:900;
}

.erp-profile-btn small{
    color:#64748B;
    font-size:14px;
}

.erp-profile-box{
    right:0;
    width:190px;
    padding:8px;
}

.erp-profile-box .logout{
    color:#DC2626;
}

.erp-profile-box .logout:hover{
    color:#B91C1C;
    background:#FEF2F2;
}

/* ANIMATION */
@keyframes dropFade{
    from{
        opacity:0;
        transform:translateY(-8px) scale(.97);
    }
    to{
        opacity:1;
        transform:translateY(0) scale(1);
    }
}

/* MOBILE */
@media(max-width:768px){

    .erp-header{
        padding:6px 8px;
    }

    .erp-header-inner{
        padding:0 12px;
        border-radius:0 0 18px 18px;
    }

    .erp-brand-mark{
        width:32px;
        height:32px;
        border-radius:12px;
        font-size:15px;
    }

    .erp-brand h1{
        font-size:18px;
    }

    .erp-profile-btn{
        height:36px;
        padding:3px 8px 3px 4px;
    }

    .erp-avatar{
        width:28px;
        height:28px;
        font-size:12px;
    }

    .erp-profile-btn span{
        display:none;
    }
}
</style>

<script>
const searchBox = document.getElementById("searchBox");
const profileBox = document.getElementById("profileBox");

function closeAll(){
    if(searchBox) searchBox.classList.add("hidden");
    if(profileBox) profileBox.classList.add("hidden");
}

function toggleSearch(){
    if(profileBox) profileBox.classList.add("hidden");
    searchBox.classList.toggle("hidden");
}

function toggleProfile(){
    if(searchBox) searchBox.classList.add("hidden");
    profileBox.classList.toggle("hidden");
}

document.addEventListener("click", function(e){
    const isInside = e.target.closest("header");
    if(!isInside){
        closeAll();
    }
});
</script>