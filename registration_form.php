<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Ultra Register + Login UI</title>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<style>

/* ===== BACKGROUND ORBS ===== */
.orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  opacity: 0.4;
  animation: float 8s infinite ease-in-out;
}

.orb1 {
  width: 300px;
  height: 300px;
  background: #22d3ee;
  top: 10%;
  left: 15%;
}

.orb2 {
  width: 250px;
  height: 250px;
  background: #3b82f6;
  bottom: 10%;
  right: 10%;
  animation-delay: 2s;
}

@keyframes float {
  0%,100% { transform: translateY(0px); }
  50% { transform: translateY(-25px); }
}

/* ===== CARD ANIMATION ===== */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(30px) scale(0.95); }
  to { opacity: 1; transform: translateY(0) scale(1); }
}

@keyframes popIn {
  from { opacity: 0; transform: scale(0.7) rotateX(10deg); }
  to { opacity: 1; transform: scale(1) rotateX(0); }
}

.animate-fadeUp { animation: fadeUp 0.7s ease; }
.animate-pop { animation: popIn 0.35s ease; }

/* ===== GLASS CARD ===== */
.glass {
  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(18px);
  border: 1px solid rgba(255,255,255,0.15);
  box-shadow: 0 25px 60px rgba(0,0,0,0.5);
}

/* ===== INPUTS ===== */
.input {
  transition: 0.3s;
}

.input:hover {
  transform: translateY(-2px);
}

.input:focus {
  transform: translateY(-3px);
  box-shadow: 0 0 0 2px #22d3ee;
}

/* ===== BUTTON SHINE ===== */
.btn {
  position: relative;
  overflow: hidden;
}

.btn::after {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(120deg, transparent, rgba(255,255,255,0.4), transparent);
  transition: 0.5s;
}

.btn:hover::after {
  left: 100%;
}

.btn:hover {
  transform: translateY(-2px) scale(1.02);
}

</style>
</head>

<body class="h-screen flex items-center justify-center bg-gradient-to-br from-slate-950 via-slate-900 to-black overflow-hidden">

<!-- BACKGROUND ORBS -->
<div class="orb orb1"></div>
<div class="orb orb2"></div>

<!-- BACKDROP -->
<div id="backdrop" class="fixed inset-0 bg-black/60 hidden"></div>

<!-- =========================
     REGISTER CARD
========================= -->
<div id="registerBox"
     class="glass w-[460px] p-10 rounded-3xl animate-fadeUp relative z-10">

    <h2 class="text-white text-4xl font-bold text-center mb-2">
        Create Account
    </h2>

    <p class="text-gray-300 text-center mb-8 text-sm">
        Start your journey with premium experience
    </p>

    <div class="space-y-4">
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <input class="input w-full p-3 rounded-xl bg-white/10 text-white outline-none"
           placeholder="Org Name">

    <input class="input w-full p-3 rounded-xl bg-white/10 text-white outline-none"
           placeholder="Owner Name">

    <input class="input w-full p-3 rounded-xl bg-white/10 text-white outline-none"
           placeholder="Email">

    <input class="input w-full p-3 rounded-xl bg-white/10 text-white outline-none"
           placeholder="Mobile">

    <input class="input w-full p-3 rounded-xl bg-white/10 text-white outline-none md:col-span-2"
           placeholder="Address">

    <input class="input w-full p-3 rounded-xl bg-white/10 text-white outline-none"
           placeholder="Username">

    <input class="input w-full p-3 rounded-xl bg-white/10 text-white outline-none"
           placeholder="Password">

</div>

        <button id="btn"
            onclick="registerUser()"
            class="btn w-full py-3 rounded-xl bg-gradient-to-r from-cyan-400 to-blue-500 text-black font-bold transition">

            Register
        </button>

    </div>
</div>

<!-- =========================
     LOGIN MODAL
========================= -->
<div id="loginModal"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60">

    <div class="glass w-[400px] p-8 rounded-3xl animate-pop relative">

        <button onclick="closeModal()"
            class="absolute right-4 top-3 text-white text-2xl hover:text-red-400 transition">
            ×
        </button>

        <h2 class="text-white text-3xl font-bold text-center mb-6">
            Welcome Back
        </h2>

        <input class="input w-full p-3 mb-3 rounded-xl bg-white/10 text-white outline-none"
               placeholder="Username">

        <input class="input w-full p-3 mb-5 rounded-xl bg-white/10 text-white outline-none"
               placeholder="Password">

        <button class="btn w-full py-3 rounded-xl bg-cyan-400 text-black font-bold">
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
            document.getElementById("backdrop").classList.remove("hidden");

            btn.innerText = "Register";
            btn.disabled = false;

        }, 400);

    }, 700);
}

function closeModal() {
    document.getElementById("loginModal").classList.add("hidden");
    document.getElementById("backdrop").classList.add("hidden");
}

document.getElementById("backdrop").addEventListener("click", closeModal);

document.addEventListener("keydown", function(e){
    if(e.key === "Escape") closeModal();
});

</script>

</body>
</html>