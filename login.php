<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page</title>

    <link rel="stylesheet" href="dist/output.css">
</head>

<body class="min-h-screen overflow-hidden flex items-center justify-center bg-gradient-to-br from-slate-950 via-slate-900 to-black px-4">

    <div class="w-[92%] max-w-[420px] p-6 sm:p-8 mt-14 rounded-3xl border border-white/10 bg-white/10 backdrop-blur-2xl shadow-2xl">

        <div class="w-20 h-20 mx-auto mb-5 rounded-full border border-cyan-300/30 bg-cyan-400/20 flex items-center justify-center">
            <span class="text-4xl">🔐</span>
        </div>

        <h2 class="text-center text-3xl font-bold text-white mb-2">
            Welcome Back
        </h2>

        <p class="text-center text-slate-300 mb-8">
            Login to continue your journey
        </p>

        <input 
            type="text"
            placeholder="Enter Username"
            class="w-full mb-4 p-4 rounded-2xl bg-white/10 border border-white/10 text-white placeholder:text-slate-400 outline-none focus:border-cyan-400 focus:ring-4 focus:ring-cyan-400/20 transition-all duration-300">

        <input 
            type="password"
            placeholder="Enter Password"
            class="w-full mb-4 p-4 rounded-2xl bg-white/10 border border-white/10 text-white placeholder:text-slate-400 outline-none focus:border-cyan-400 focus:ring-4 focus:ring-cyan-400/20 transition-all duration-300">

        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer">
                <input type="checkbox" class="accent-cyan-400">
                Remember me
            </label>

            <a href="#" class="text-sm text-white hover:text-cyan-300 transition">
                Forgot Password?
            </a>
        </div>

        <button class="w-full py-4 rounded-2xl bg-cyan-400 text-black text-lg font-bold transition-all duration-300 hover:bg-cyan-300 hover:scale-[1.02]">
            Login
        </button>

        <p class="mt-6 text-center text-sm text-slate-400">
            Don’t have an account?
            <a href="#" class="font-semibold text-cyan-300 hover:text-cyan-200 transition">
                Register
            </a>
        </p>

    </div>

</body>
</html>