<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Softgrowth ERP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Include your global URL configuration script -->
    <script src="url.js"></script>
    <style>
        /* ===== SMOOTH STEP TRANSITIONS ===== */
        .step-box {
            display: none;
            opacity: 0;
            transform: translateY(12px) scale(0.98);
            transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                        transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .step-box.active {
            display: block;
            opacity: 1;
            transform: translateY(0) scale(1);
            animation: stepFadeIn 0.45s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        .step-box.exiting {
            display: block;
            opacity: 0;
            transform: translateY(-8px) scale(0.98);
            transition: opacity 0.25s ease, transform 0.25s ease;
        }
        @keyframes stepFadeIn {
            0% {
                opacity: 0;
                transform: translateY(12px) scale(0.98);
            }
            60% {
                opacity: 1;
                transform: translateY(-2px) scale(1.005);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ===== CONTENT FADE-IN FOR INNER ELEMENTS ===== */
        .step-box.active > * {
            animation: contentFade 0.5s cubic-bezier(0.4, 0, 0.2, 1) backwards;
        }
        .step-box.active > *:nth-child(1) { animation-delay: 0.05s; }
        .step-box.active > *:nth-child(2) { animation-delay: 0.10s; }
        .step-box.active > *:nth-child(3) { animation-delay: 0.15s; }
        .step-box.active > *:nth-child(4) { animation-delay: 0.20s; }
        .step-box.active > *:nth-child(5) { animation-delay: 0.25s; }
        .step-box.active > *:nth-child(6) { animation-delay: 0.30s; }
        .step-box.active > *:nth-child(7) { animation-delay: 0.35s; }

        @keyframes contentFade {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== INPUT FOCUS ===== */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
            border-color: #f97316;
        }
        .otp-input:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
            border-color: #f97316;
            transform: scale(1.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }
        .check-valid i { color: #22c55e !important; }
        .check-invalid i { color: #ef4444 !important; }
        .otp-input::-webkit-outer-spin-button,
        .otp-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* ===== TOAST SLIDE ===== */
        @keyframes slideDown {
            from { opacity: 0; transform: translate(-50%, -20px); }
            to { opacity: 1; transform: translate(-50%, 0); }
        }
        .alert-slide { animation: slideDown 0.4s cubic-bezier(0.4, 0, 0.2, 1); }

        /* ===== PULSE RING ===== */
        @keyframes pulse-ring {
            0% { transform: scale(0.9); opacity: 0.6; }
            100% { transform: scale(1.3); opacity: 0; }
        }
        .pulse-ring::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            border: 2px solid rgba(249, 115, 22, 0.4);
            animation: pulse-ring 2s ease-out infinite;
        }

        /* ===== SUCCESS CHECKMARK SCALE ===== */
        @keyframes successPop {
            0% { transform: scale(0.5); opacity: 0; }
            60% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }
        .success-pop { animation: successPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }

        /* ===== BUTTON PRESS ===== */
        button { transition: transform 0.15s ease; }
        button:active { transform: scale(0.97); }

        /* Fallback logo monogram styling */
#logoFallback {
    display: none;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    letter-spacing: -0.025em;
}
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center p-4 bg-gradient-to-br from-slate-100 via-slate-50 to-orange-50">

    <!-- =========================
         MAIN CARD
    ========================= -->
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl shadow-slate-300/50 overflow-hidden grid grid-cols-1 lg:grid-cols-2 border border-slate-200">

        <!-- ===== LEFT SIDE: BRAND PANEL ===== -->
        <div class="relative hidden lg:flex flex-col items-center justify-center p-10 text-white overflow-hidden min-h-[520px]">

            <!-- Background Image -->
            <img src="images/login_img.png" alt="ERP Background"
                 class="absolute inset-0 w-full h-full object-cover" />

            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/70"></div>

            <!-- Brand Content -->
            <div class="relative z-10 flex flex-col items-center text-center gap-5 w-full">

                <!-- Organization Logo -->
              <!-- Organization Logo with Fallback Support -->
<div class="bg-white rounded-2xl shadow-2xl p-1 ring-4 ring-white/20 transition-transform duration-500 hover:scale-105 flex items-center justify-center w-20 h-20 overflow-hidden">
    <!-- Image Logo -->
    <img id="brandLogo" src="images/default_logo.png" alt="Organization Logo"
         class="h-full w-full object-contain rounded-xl"
         onerror="handleLogoError()" />
    
    <!-- Text Monogram Fallback (Shown if image fails) -->
    <div id="logoFallback" class="w-full h-full rounded-xl bg-orange-600 text-white text-xl shadow-inner">
        <!-- Dynamically populated initials -->
    </div>
</div>

                <!-- Organization Name & Subtitle -->
                <div class="space-y-1.5">
                    <h1 id="brandOrgName" class="text-xl font-extrabold tracking-tight text-white drop-shadow-lg">
                        Softgrowth ERP
                    </h1>
                    <p class="text-orange-200 text-xs font-semibold tracking-widest uppercase">
                       Smart Schools, Simple Management.
                    </p>
                </div>

                <!-- Tagline -->
                <div class="flex items-center gap-3">
                    <span class="h-px w-8 bg-orange-300/50"></span>
                    <p class="text-slate-300 text-xs font-medium tracking-wider">
                       Secure Portal
                    </p>
                    <span class="h-px w-8 bg-orange-300/50"></span>
                </div>

                <!-- Trust Features -->
                <div class="grid grid-cols-3 gap-3 mt-4 w-full max-w-[240px]">
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center border border-white/15">
                            <i class="fas fa-shield-alt text-orange-300 text-xs"></i>
                        </div>
                        <span class="text-[9px] uppercase tracking-widest text-slate-300 font-semibold">Secure</span>
                    </div>
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center border border-white/15">
                            <i class="fas fa-bolt text-orange-300 text-xs"></i>
                        </div>
                        <span class="text-[9px] uppercase tracking-widest text-slate-300 font-semibold">Fast</span>
                    </div>
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center border border-white/15">
                            <i class="fas fa-chart-line text-orange-300 text-xs"></i>
                        </div>
                        <span class="text-[9px] uppercase tracking-widest text-slate-300 font-semibold">Scalable</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- ===== RIGHT SIDE: MULTI-STEP FORM ===== -->
        <div class="p-8 sm:p-10 flex flex-col justify-center bg-white">

            <!-- ============================================
                 STEP 1: LOGIN SCREEN
            ============================================ -->
            <div id="step1" class="step-box active">

                <div class="flex justify-center mb-4">
                    <div class="relative w-16 h-16 rounded-full bg-orange-50 border border-orange-200 flex items-center justify-center pulse-ring">
                        <i class="fas fa-lock text-2xl text-orange-500"></i>
                    </div>
                </div>

                <div class="text-center mb-6">
                    <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Welcome Back!</h1>
                    <p class="text-sm text-slate-500 mt-1.5">Login to your account</p>
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Email or Username <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm z-10"></i>
                        <input type="text" id="loginIdentifier" placeholder="Enter email or username"
                               class="input-focus w-full p-3.5 pl-11 rounded-xl border border-slate-200 bg-slate-50/60 text-slate-800 text-sm placeholder:text-slate-400 outline-none transition-all duration-200" />
                    </div>
                    <p class="text-red-500 text-xs mt-1.5 hidden" id="error-loginIdentifier">Email or username is required.</p>
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm z-10"></i>
                        <input type="password" id="password" placeholder="Enter password"
                               class="input-focus w-full p-3.5 pl-11 pr-11 rounded-xl border border-slate-200 bg-slate-50/60 text-slate-800 text-sm placeholder:text-slate-400 outline-none transition-all duration-200" />
                        <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 cursor-pointer hover:text-orange-500 transition-colors text-sm"
                           onclick="togglePassword('password', this)"></i>
                    </div>
                    <p class="text-red-500 text-xs mt-1.5 hidden" id="error-password">Password is required.</p>
                </div>

                <div class="flex items-center justify-end mb-5">
                    <a href="#" onclick="showStep('step4'); return false;" class="text-orange-500 hover:text-orange-700 font-semibold text-xs transition">
                        Forgot Password?
                    </a>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="resetLoginForm()"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Clear
                    </button>
                    <button type="button" id="loginBtn" onclick="handleLogin()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Login
                    </button>
                </div>
            </div>

            <!-- ============================================
                 STEP 2: EMAIL VERIFICATION (OTP)
            ============================================ -->
            <div id="step2" class="step-box">

                <div class="text-center mb-5">
                    <div class="w-14 h-14 mx-auto mb-3 rounded-full bg-blue-50 border border-blue-200 flex items-center justify-center">
                        <i class="fas fa-envelope text-xl text-blue-500"></i>
                    </div>
                    <h1 class="text-xl font-extrabold text-slate-900 tracking-tight">Verify Your Email</h1>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        We have sent a 6-digit OTP to your registered email address.
                    </p>
                </div>

                <div class="flex justify-center gap-1.5 sm:gap-2 mb-3" id="loginOtpContainer">
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="0" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="1" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="2" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="3" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="4" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="5" />
                </div>
                <p class="text-red-500 text-xs text-center mb-2.5 hidden" id="error-otp">Please enter the 6-digit OTP.</p>

                <p class="text-center text-xs text-slate-500 mb-5">
                    Didn't receive the OTP?
                    <a href="#" id="resendOtpLogin" onclick="resendLoginOtp(); return false;" class="text-blue-500 hover:text-blue-700 font-semibold transition">
                        Resend OTP
                    </a>
                </p>

                <div class="flex gap-3">
                    <button type="button" onclick="showStep('step1')"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="button" id="verifyOtpBtn" onclick="verifyLoginOtp()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Verify & Login
                    </button>
                </div>
            </div>

            <!-- ============================================
                 STEP 3: LOGIN SUCCESS
            ============================================ -->
            <div id="step3" class="step-box">

                <div class="text-center py-2">
                    <div class="success-pop w-18 h-18 mx-auto mb-4 rounded-full bg-green-50 border-2 border-green-200 flex items-center justify-center" style="width:72px;height:72px;">
                        <i class="fas fa-check text-2xl text-green-500"></i>
                    </div>
                    <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight mb-2">Login Successful!</h1>
                    <p class="text-sm text-slate-500 leading-relaxed mb-7">
                        You have been successfully logged<br/>into your account.
                    </p>

                    <button type="button" onclick="window.location.href='dashboard.php'"
                            class="w-full py-3.5 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Go to Dashboard
                    </button>
                </div>
            </div>

            <!-- ============================================
                 STEP 4: FORGOT PASSWORD
            ============================================ -->
            <div id="step4" class="step-box">

                <div class="mb-5">
                    <h1 class="text-xl font-extrabold text-slate-900 tracking-tight mb-2">Reset Your Password</h1>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Enter your registered email address to receive a password reset OTP.
                    </p>
                </div>

                <div class="mb-5">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm z-10"></i>
                        <input type="email" id="resetEmail" placeholder="Enter your email address"
                               class="input-focus w-full p-3.5 pl-11 rounded-xl border border-slate-200 bg-slate-50/60 text-slate-800 text-sm placeholder:text-slate-400 outline-none transition-all duration-200" />
                    </div>
                    <p class="text-red-500 text-xs mt-1.5 hidden" id="error-resetEmail">Please enter a valid email address.</p>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="showStep('step1')"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="button" onclick="sendResetOtp()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Send OTP
                    </button>
                </div>
            </div>

            <!-- ============================================
                 STEP 5: VERIFY OTP (RESET PASSWORD)
            ============================================ -->
            <div id="step5" class="step-box">

                <div class="text-center mb-5">
                    <div class="w-14 h-14 mx-auto mb-3 rounded-full bg-blue-50 border border-blue-200 flex items-center justify-center">
                        <i class="fas fa-envelope text-xl text-blue-500"></i>
                    </div>
                    <h1 class="text-xl font-extrabold text-slate-900 tracking-tight">Verify OTP</h1>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        We have sent a 6-digit OTP to your registered email address.
                    </p>
                </div>

                <div class="flex justify-center gap-1.5 sm:gap-2 mb-3" id="resetOtpContainer">
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="0" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="1" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="2" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="3" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="4" />
                    <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-11 sm:h-13 text-center text-lg font-bold rounded-xl border border-slate-200 bg-slate-50 text-slate-800 outline-none transition-all duration-200" data-index="5" />
                </div>
                <p class="text-red-500 text-xs text-center mb-2.5 hidden" id="error-otp2">Please enter the 6-digit OTP.</p>

                <p class="text-center text-xs text-slate-500 mb-5">
                    Didn't receive the OTP?
                    <a href="#" id="resendOtpReset" onclick="sendResetOtp(); return false;" class="text-blue-500 hover:text-blue-700 font-semibold transition">
                        Resend OTP
                    </a>
                </p>

                <div class="flex gap-3">
                    <button type="button" onclick="showStep('step4')"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="button" onclick="verifyResetOtp()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Verify OTP
                    </button>
                </div>
            </div>

            <!-- ============================================
                 STEP 6: SET NEW PASSWORD
            ============================================ -->
            <div id="step6" class="step-box">

                <div class="mb-5">
                    <h1 class="text-xl font-extrabold text-slate-900 tracking-tight mb-2">Set New Password</h1>
                    <p class="text-xs text-slate-500">Enter your new password below.</p>
                </div>

                <div class="mb-3">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        New Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm z-10"></i>
                        <input type="password" id="newPassword" placeholder="Enter new password"
                               class="input-focus w-full p-3.5 pl-11 pr-11 rounded-xl border border-slate-200 bg-slate-50/60 text-slate-800 text-sm placeholder:text-slate-400 outline-none transition-all duration-200" />
                        <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 cursor-pointer hover:text-orange-500 transition-colors text-sm"
                           onclick="togglePassword('newPassword', this)"></i>
                    </div>
                    <p class="text-red-500 text-xs mt-1.5 hidden" id="error-newPassword">Password does not meet requirements.</p>
                </div>

                <div class="mb-3">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Confirm New Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm z-10"></i>
                        <input type="password" id="confirmNewPassword" placeholder="Re-enter new password"
                               class="input-focus w-full p-3.5 pl-11 pr-11 rounded-xl border border-slate-200 bg-slate-50/60 text-slate-800 text-sm placeholder:text-slate-400 outline-none transition-all duration-200" />
                        <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 cursor-pointer hover:text-orange-500 transition-colors text-sm"
                           onclick="togglePassword('confirmNewPassword', this)"></i>
                    </div>
                    <p class="text-red-500 text-xs mt-1.5 hidden" id="error-confirmNewPassword">Passwords do not match.</p>
                </div>

                <ul class="space-y-1 text-xs text-slate-600 mb-5">
                    <li class="flex items-center gap-2" id="reset-req-length">
                        <i class="fas fa-circle-check text-slate-300 text-sm"></i>
                        <span>Minimum 6 characters</span>
                    </li>
                </ul>

                <div class="flex gap-3">
                    <button type="button" onclick="showStep('step1')"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="button" onclick="submitNewPassword()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Reset Password
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== FOOTER CREDIT ===== -->
    <p class="text-center text-xs text-slate-500 mt-6">
        © 2026 Softgrowth Infotech LLP. · Designed & Developed by
        <a href="https://softgrowthinfotech.com/" target="_blank" rel="noopener noreferrer"
           class="text-orange-600 font-semibold hover:text-orange-700 underline underline-offset-2 transition-colors duration-200">
            Softgrowth Infotech LLP.
        </a>
    </p>

    <!-- ===== CUSTOM ALERT ===== -->
    <div id="customAlert"
         class="fixed top-5 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-6 py-3.5 rounded-xl shadow-2xl hidden z-50 alert-slide flex items-center gap-3">
        <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
            <i class="fas fa-check text-white text-xs"></i>
        </div>
        <span class="text-sm font-medium" id="alertMessage">Success!</span>
    </div>
<script>
        // Global state IDs
        let verificationId = null;
        let resetVerificationId = null;

        // ===== HELPER: CLEAR OTP FIELDS =====
        function clearOtpInputs(containerId) {
            const container = document.getElementById(containerId);
            if (container) {
                container.querySelectorAll('.otp-input').forEach(input => {
                    input.value = '';
                });
            }
        }

        // ===== PASSWORD TOGGLE =====
        function togglePassword(id, icon) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }

        // ===== SMOOTH STEP NAVIGATION =====
        function showStep(stepId) {
            const currentActive = document.querySelector('.step-box.active');
            const nextStep = document.getElementById(stepId);

            if (currentActive === nextStep) return;

            if (stepId === 'step1') {
                clearOtpInputs('loginOtpContainer');
                clearOtpInputs('resetOtpContainer');
            }
            if (stepId === 'step2') {
                clearOtpInputs('loginOtpContainer');
            }
            if (stepId === 'step5') {
                clearOtpInputs('resetOtpContainer');
            }

            if (currentActive) {
                currentActive.classList.add('exiting');
                currentActive.classList.remove('active');

                setTimeout(() => {
                    currentActive.classList.remove('exiting');
                    nextStep.classList.add('active');
                }, 250);
            } else {
                nextStep.classList.add('active');
            }
        }

        // ===== TOAST ALERT =====
        function showAlert(msg) {
            const alert = document.getElementById('customAlert');
            document.getElementById('alertMessage').textContent = msg;
            alert.classList.remove('hidden');
            setTimeout(() => alert.classList.add('hidden'), 3000);
        }

        // ===== DYNAMIC SCHOOL BRANDING =====
        function updateSchoolBranding(institute) {
            if (institute) {
                if (institute.org_name) {
                    document.getElementById('brandOrgName').textContent = institute.org_name;
                }
                if (institute.logo) {
                    let logoUrl = institute.logo;
                    if (!logoUrl.startsWith('http') && !logoUrl.startsWith('data:')) {
                        const baseDomain = typeof url !== 'undefined' ? url.replace(/\/api\/?\$/, '') : '';
                        logoUrl = baseDomain + (logoUrl.startsWith('/') ? '' : '/') + logoUrl;
                    }
                    document.getElementById('brandLogo').src = logoUrl;
                }
            }
        }

        // ===== LOAD PUBLIC SCHOOL BRANDING ON STARTUP =====
        document.addEventListener('DOMContentLoaded', async () => {
            try {
                const response = await fetch(url + 'public-institute', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                if (response.ok && data) {
                    updateSchoolBranding(data);
                }
            } catch (e) {
                console.error('Could not fetch public institute branding:', e);
            }
        });
        
        // ===== LOGIN FORM =====
        function resetLoginForm() {
            document.getElementById('loginIdentifier').value = '';
            document.getElementById('password').value = '';
            document.getElementById('error-loginIdentifier').classList.add('hidden');
            document.getElementById('error-password').classList.add('hidden');
            document.getElementById('loginIdentifier').classList.remove('border-red-500', 'bg-red-50');
            document.getElementById('password').classList.remove('border-red-500', 'bg-red-50');
            clearOtpInputs('loginOtpContainer');
        }

        async function handleLogin() {
            const identifier = document.getElementById('loginIdentifier').value.trim();
            const password = document.getElementById('password').value.trim();
            let valid = true;

            if (identifier === '') {
                document.getElementById('error-loginIdentifier').classList.remove('hidden');
                document.getElementById('loginIdentifier').classList.add('border-red-500', 'bg-red-50');
                valid = false;
            } else {
                document.getElementById('error-loginIdentifier').classList.add('hidden');
                document.getElementById('loginIdentifier').classList.remove('border-red-500', 'bg-red-50');
            }

            if (password === '') {
                document.getElementById('error-password').classList.remove('hidden');
                document.getElementById('password').classList.add('border-red-500', 'bg-red-50');
                valid = false;
            } else {
                document.getElementById('error-password').classList.add('hidden');
                document.getElementById('password').classList.remove('border-red-500', 'bg-red-50');
            }

            if (!valid) return;

            const loginBtn = document.getElementById('loginBtn');
            if (loginBtn.disabled) return; // Prevent double click
            loginBtn.disabled = true;
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Logging in...';

            const isEmail = identifier.includes('@');
            const payload = { password: password };
            if (isEmail) {
                payload.email = identifier;
            } else {
                payload.username = identifier;
            }

            try {
                const response = await fetch(url + `login`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Login failed.');
                }

                verificationId = data.verification_id;

                // Extract institute info from login response
                const instituteData = data.institute || (data.data && data.data.institute);
                if (instituteData) {
                    updateSchoolBranding(instituteData);
                    localStorage.setItem('institute', JSON.stringify(instituteData));
                }

                showAlert(data.message || 'OTP sent successfully.');
                showStep('step2');

            } catch (error) {
                showAlert(error.message);
            } finally {
                loginBtn.disabled = false;
                loginBtn.innerHTML = 'Login';
            }
        }

        // ===== OTP INPUT HANDLING =====
        document.querySelectorAll('.otp-input').forEach((input, idx, all) => {
            input.addEventListener('input', (e) => {
                const val = e.target.value.replace(/\D/g, '');
                e.target.value = val;
                if (val && idx < all.length - 1) {
                    all[idx + 1].focus();
                }
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && idx > 0) {
                    all[idx - 1].focus();
                }
            });
            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pasted = e.clipboardData.getData('text').replace(/\D/g, '').slice(0, 6);
                pasted.split('').forEach((char, i) => {
                    if (all[i]) all[i].value = char;
                });
                if (pasted.length === 6) all[5].focus();
            });
        });

        function getOtpValues(containerId) {
            const container = document.getElementById(containerId);
            return Array.from(container.querySelectorAll('.otp-input')).map(i => i.value).join('');
        }

        async function resendLoginOtp() {
            if (!verificationId) return;
            clearOtpInputs('loginOtpContainer');
            try {
                const response = await fetch(url + `login/resend-otp`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ verification_id: verificationId })
                });
                const data = await response.json();
                if (!response.ok) throw new Error(data.message || 'Could not resend OTP.');
                verificationId = data.verification_id;
                showAlert('A new OTP has been sent to your email.');
            } catch (error) {
                showAlert(error.message);
            }
        }

        // ===== VERIFY LOGIN OTP =====
        async function verifyLoginOtp() {
            const otp = getOtpValues('loginOtpContainer');
            if (otp.length !== 6) {
                document.getElementById('error-otp').classList.remove('hidden');
                return;
            }
            document.getElementById('error-otp').classList.add('hidden');

            const verifyBtn = document.getElementById('verifyOtpBtn');
            if (verifyBtn.disabled) return; // Prevent double click
            verifyBtn.disabled = true;
            verifyBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Verifying...';

            try {
                const response = await fetch(url + `login/verify-otp`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        verification_id: verificationId,
                        otp: otp
                    })
                });

                const data = await response.json();
                if (!response.ok) throw new Error(data.message || 'OTP verification failed.');

                // Store Sanctum token and user details locally
                localStorage.setItem('auth_token', data.token);
                localStorage.setItem('user', JSON.stringify(data.user));
                
                const instituteData = data.institute || (data.data && data.data.institute);
                if (instituteData) {
                    localStorage.setItem('institute', JSON.stringify(instituteData));
                    updateSchoolBranding(instituteData);
                }

                showAlert(data.message || 'Login Success!');
                setTimeout(() => showStep('step3'), 800);

            } catch (error) {
                showAlert(error.message);
            } finally {
                verifyBtn.disabled = false;
                verifyBtn.innerHTML = 'Verify & Login';
            }
        }

        
        // ===== FORGOT PASSWORD =====
        async function sendResetOtp() {
            const email = document.getElementById('resetEmail').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+\$/;
            if (!emailRegex.test(email)) {
                document.getElementById('error-resetEmail').classList.remove('hidden');
                document.getElementById('resetEmail').classList.add('border-red-500', 'bg-red-50');
                return;
            }
            document.getElementById('error-resetEmail').classList.add('hidden');
            document.getElementById('resetEmail').classList.remove('border-red-500', 'bg-red-50');

            try {
                const response = await fetch(url + `forgot-password`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email: email })
                });

                const data = await response.json();
                if (!response.ok) throw new Error(data.message || 'Failed to send reset OTP.');

                resetVerificationId = data.verification_id;
                showAlert(data.message);
                showStep('step5');

            } catch (error) {
                showAlert(error.message);
            }
        }

        // ===== VERIFY RESET OTP =====
        async function verifyResetOtp() {
            const otp = getOtpValues('resetOtpContainer');
            if (otp.length !== 6) {
                document.getElementById('error-otp2').classList.remove('hidden');
                return;
            }
            document.getElementById('error-otp2').classList.add('hidden');

            try {
                const response = await fetch(url + `forgot-password/verify-otp`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        verification_id: resetVerificationId,
                        otp: otp
                    })
                });

                const data = await response.json();
                if (!response.ok) throw new Error(data.message || 'Invalid or expired OTP.');

                showAlert(data.message);
                setTimeout(() => showStep('step6'), 800);

            } catch (error) {
                showAlert(error.message);
            }
        }

        // ===== SUBMIT NEW PASSWORD =====
        async function submitNewPassword() {
            const newPass = document.getElementById('newPassword').value;
            const confirmPass = document.getElementById('confirmNewPassword').value;
            let valid = true;

            if (newPass.length < 6) {
                document.getElementById('error-newPassword').classList.remove('hidden');
                document.getElementById('newPassword').classList.add('border-red-500', 'bg-red-50');
                valid = false;
            } else {
                document.getElementById('error-newPassword').classList.add('hidden');
                document.getElementById('newPassword').classList.remove('border-red-500', 'bg-red-50');
            }

            if (confirmPass !== newPass || confirmPass === '') {
                document.getElementById('error-confirmNewPassword').classList.remove('hidden');
                document.getElementById('confirmNewPassword').classList.add('border-red-500', 'bg-red-50');
                valid = false;
            } else {
                document.getElementById('error-confirmNewPassword').classList.add('hidden');
                document.getElementById('confirmNewPassword').classList.remove('border-red-500', 'bg-red-50');
            }

            if (!valid) return;

            try {
                const response = await fetch(url + `forgot-password/reset`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        verification_id: resetVerificationId,
                        password: newPass,
                        password_confirmation: confirmPass
                    })
                });

                const data = await response.json();
                if (!response.ok) throw new Error(data.message || 'Password reset failed.');

                showAlert(data.message);
                setTimeout(() => {
                    document.getElementById('newPassword').value = '';
                    document.getElementById('confirmNewPassword').value = '';
                    showStep('step1');
                }, 1400);

            } catch (error) {
                showAlert(error.message);
            }
        }

        // ===== CLEAR ERRORS ON INPUT =====
        ['loginIdentifier', 'password', 'resetEmail', 'newPassword', 'confirmNewPassword'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', () => {
                    const errEl = document.getElementById('error-' + id);
                    if (errEl) errEl.classList.add('hidden');
                    el.classList.remove('border-red-500', 'bg-red-50');
                });
            }
        });




        // ===== FALLBACK LOGO HANDLER =====
function handleLogoError() {
    const imgEl = document.getElementById('brandLogo');
    const fallbackEl = document.getElementById('logoFallback');
    const orgNameEl = document.getElementById('brandOrgName');

    if (imgEl) imgEl.style.display = 'none';
    if (fallbackEl) {
        // Generate initials from organization name (e.g., "Softgrowth ERP" -> "SE")
        const orgName = orgNameEl ? orgNameEl.textContent.trim() : 'ERP';
        const words = orgName.split(' ').filter(Boolean);
        let initials = 'ERP';
        
        if (words.length >= 2) {
            initials = (words[0][0] + words[1][0]).toUpperCase();
        } else if (words.length === 1 && words[0].length >= 2) {
            initials = words[0].substring(0, 2).toUpperCase();
        }

        fallbackEl.textContent = initials;
        fallbackEl.style.display = 'flex';
    }
}

// ===== UPDATED DYNAMIC SCHOOL BRANDING =====
function updateSchoolBranding(institute) {
    if (institute) {
        if (institute.org_name) {
            document.getElementById('brandOrgName').textContent = institute.org_name;
        }
        
        const imgEl = document.getElementById('brandLogo');
        const fallbackEl = document.getElementById('logoFallback');

        if (institute.logo && institute.logo.trim() !== '' && institute.logo !== 'null') {
            let logoUrl = institute.logo;
            if (!logoUrl.startsWith('http') && !logoUrl.startsWith('data:')) {
                const baseDomain = typeof url !== 'undefined' ? url.replace(/\/api\/?\$/, '') : '';
                logoUrl = baseDomain + (logoUrl.startsWith('/') ? '' : '/') + logoUrl;
            }
            
            if (imgEl) {
                imgEl.src = logoUrl;
                imgEl.style.display = 'block';
            }
            if (fallbackEl) {
                fallbackEl.style.display = 'none';
            }
        } else {
            // If logo path is empty or null from backend, trigger fallback immediately
            handleLogoError();
        }
    }
}
    </script>
</body>
</html>