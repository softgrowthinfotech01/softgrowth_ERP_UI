<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Softgrowth ERP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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

        /* ===== OTP BOUNCE ON FOCUS ===== */
        .otp-input:focus {
            transform: scale(1.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
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
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-slate-100 via-slate-50 to-orange-50">

    <!-- ===== STEP INDICATOR ===== -->
    <div id="stepIndicator" class="fixed top-4 left-1/2 -translate-x-1/2 z-50 hidden sm:flex items-center gap-2 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full shadow-lg border border-slate-200 transition-all duration-500">
        <div id="stepIndicator1" class="flex items-center gap-1.5 text-xs font-semibold transition-all duration-500">
            <span class="w-5 h-5 rounded-full bg-orange-600 text-white flex items-center justify-center text-[10px] transition-all duration-500">1</span>
            <span class="text-slate-700 transition-all duration-500">Login</span>
        </div>
        <i class="fas fa-chevron-right text-slate-300 text-[10px]"></i>
        <div id="stepIndicator2" class="flex items-center gap-1.5 text-xs font-semibold opacity-40 transition-all duration-500">
            <span class="w-5 h-5 rounded-full bg-slate-300 text-white flex items-center justify-center text-[10px] transition-all duration-500">2</span>
            <span class="text-slate-500 transition-all duration-500">Verify</span>
        </div>
        <i class="fas fa-chevron-right text-slate-300 text-[10px]"></i>
        <div id="stepIndicator3" class="flex items-center gap-1.5 text-xs font-semibold opacity-40 transition-all duration-500">
            <span class="w-5 h-5 rounded-full bg-slate-300 text-white flex items-center justify-center text-[10px] transition-all duration-500">3</span>
            <span class="text-slate-500 transition-all duration-500">Success</span>
        </div>
    </div>

    <!-- =========================
         MAIN CARD
    ========================= -->
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl shadow-slate-300/50 overflow-hidden grid grid-cols-1 lg:grid-cols-2 border border-slate-200">

        <!-- ===== LEFT SIDE: IMAGE PANEL ===== -->
        <div class="relative hidden lg:flex flex-col items-center justify-center p-10 text-white overflow-hidden min-h-[520px]">
            <img src="images/login_img.png" alt="ERP Background"
                 class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000" />
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-black/20"></div>
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
                        Username <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm z-10"></i>
                        <input type="text" id="username" placeholder="Enter username"
                               class="input-focus w-full p-3.5 pl-11 rounded-xl border border-slate-200 bg-slate-50/60 text-slate-800 text-sm placeholder:text-slate-400 outline-none transition-all duration-200" />
                    </div>
                    <p class="text-red-500 text-xs mt-1.5 hidden" id="error-username">Username is required.</p>
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

                <div class="flex items-center justify-between mb-5">
                    <label class="flex items-center gap-2 text-slate-600 cursor-pointer select-none text-xs font-medium">
                        <input type="checkbox" class="accent-orange-500 w-4 h-4 rounded" />
                        Remember me
                    </label>
                    <a href="#" onclick="showStep('step4'); return false;" class="text-orange-500 hover:text-orange-700 font-semibold text-xs transition">
                        Forgot Password?
                    </a>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="resetLoginForm()"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="button" onclick="handleLogin()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
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

                <div class="flex justify-center gap-1.5 sm:gap-2 mb-3">
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
                    <a href="#" id="resendOtpLogin" onclick="resendOtp('login'); return false;" class="text-blue-500 hover:text-blue-700 font-semibold transition">
                        Resend OTP (00:45)
                    </a>
                </p>

                <div class="flex gap-3">
                    <button type="button" onclick="showStep('step1')"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="button" onclick="verifyLoginOtp()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Verify
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
                            class="w-full py-3.5 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
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
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
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

                <div class="flex justify-center gap-1.5 sm:gap-2 mb-3">
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
                    <a href="#" id="resendOtpReset" onclick="resendOtp('reset'); return false;" class="text-blue-500 hover:text-blue-700 font-semibold transition">
                        Resend OTP (00:45)
                    </a>
                </p>

                <div class="flex gap-3">
                    <button type="button" onclick="showStep('step4')"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="button" onclick="verifyResetOtp()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Verify
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
                        <span>Minimum 8 characters</span>
                    </li>
                    <li class="flex items-center gap-2" id="reset-req-upper">
                        <i class="fas fa-circle-check text-slate-300 text-sm"></i>
                        <span>At least 1 uppercase letter</span>
                    </li>
                    <li class="flex items-center gap-2" id="reset-req-lower">
                        <i class="fas fa-circle-check text-slate-300 text-sm"></i>
                        <span>At least 1 lowercase letter</span>
                    </li>
                    <li class="flex items-center gap-2" id="reset-req-number">
                        <i class="fas fa-circle-check text-slate-300 text-sm"></i>
                        <span>At least 1 number</span>
                    </li>
                    <li class="flex items-center gap-2" id="reset-req-special">
                        <i class="fas fa-circle-check text-slate-300 text-sm"></i>
                        <span>At least 1 special character</span>
                    </li>
                </ul>

                <div class="flex gap-3">
                    <button type="button" onclick="showStep('step1')"
                            class="flex-1 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="button" onclick="resetPassword()"
                            class="flex-1 py-3 rounded-xl bg-orange-600 text-white font-bold text-sm shadow-md hover:bg-orange-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        Reset Password
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== CUSTOM ALERT ===== -->
    <div id="customAlert"
         class="fixed top-5 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-6 py-3.5 rounded-xl shadow-2xl hidden z-50 alert-slide flex items-center gap-3">
        <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
            <i class="fas fa-check text-white text-xs"></i>
        </div>
        <span class="text-sm font-medium" id="alertMessage">Success!</span>
    </div>

    <script>
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

            // Step 1: Fade out current step
            if (currentActive) {
                currentActive.classList.add('exiting');
                currentActive.classList.remove('active');

                setTimeout(() => {
                    currentActive.classList.remove('exiting');
                    // Step 2: Fade in new step
                    nextStep.classList.add('active');
                }, 250);
            } else {
                nextStep.classList.add('active');
            }

            // Update step indicator
            const stepNum = parseInt(stepId.replace('step', ''));
            const indicator = document.getElementById('stepIndicator');

            if (stepNum > 3) {
                indicator.classList.add('hidden');
            } else {
                indicator.classList.remove('hidden');
                for (let i = 1; i <= 3; i++) {
                    const el = document.getElementById('stepIndicator' + i);
                    const circle = el.querySelector('span');
                    if (i <= stepNum) {
                        el.classList.remove('opacity-40');
                        circle.classList.remove('bg-slate-300');
                        circle.classList.add('bg-orange-600');
                    } else {
                        el.classList.add('opacity-40');
                        circle.classList.remove('bg-orange-600');
                        circle.classList.add('bg-slate-300');
                    }
                }
            }
        }

        // ===== TOAST ALERT =====
        function showAlert(msg) {
            const alert = document.getElementById('customAlert');
            document.getElementById('alertMessage').textContent = msg;
            alert.classList.remove('hidden');
            setTimeout(() => alert.classList.add('hidden'), 2200);
        }

        // ===== LOGIN FORM =====
        function resetLoginForm() {
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            document.getElementById('error-username').classList.add('hidden');
            document.getElementById('error-password').classList.add('hidden');
            document.getElementById('username').classList.remove('border-red-500', 'bg-red-50');
            document.getElementById('password').classList.remove('border-red-500', 'bg-red-50');
        }

        function handleLogin() {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            let valid = true;

            if (username === '') {
                document.getElementById('error-username').classList.remove('hidden');
                document.getElementById('username').classList.add('border-red-500', 'bg-red-50');
                valid = false;
            } else {
                document.getElementById('error-username').classList.add('hidden');
                document.getElementById('username').classList.remove('border-red-500', 'bg-red-50');
            }

            if (password === '') {
                document.getElementById('error-password').classList.remove('hidden');
                document.getElementById('password').classList.add('border-red-500', 'bg-red-50');
                valid = false;
            } else {
                document.getElementById('error-password').classList.add('hidden');
                document.getElementById('password').classList.remove('border-red-500', 'bg-red-50');
            }

            if (valid) {
                showAlert('Credentials validated. Sending OTP...');
                setTimeout(() => {
                    showStep('step2');
                    startCountdown('resendOtpLogin');
                }, 800);
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

        // ===== RESEND COUNTDOWN =====
        function startCountdown(linkId) {
            const link = document.getElementById(linkId);
            if (!link) return;
            let seconds = 45;
            link.style.pointerEvents = 'none';
            link.style.opacity = '0.6';
            link.textContent = `Resend OTP (00:${seconds.toString().padStart(2, '0')})`;
            const timer = setInterval(() => {
                seconds--;
                link.textContent = `Resend OTP (00:${seconds.toString().padStart(2, '0')})`;
                if (seconds <= 0) {
                    clearInterval(timer);
                    link.textContent = 'Resend OTP';
                    link.style.pointerEvents = 'auto';
                    link.style.opacity = '1';
                }
            }, 1000);
        }

        function resendOtp(type) {
            const linkId = type === 'login' ? 'resendOtpLogin' : 'resendOtpReset';
            showAlert('OTP resent to your email!');
            startCountdown(linkId);
        }

        // ===== VERIFY LOGIN OTP =====
        function verifyLoginOtp() {
            const otp = getOtpValues('step2');
            if (otp.length !== 6) {
                document.getElementById('error-otp').classList.remove('hidden');
                return;
            }
            document.getElementById('error-otp').classList.add('hidden');
            showAlert('OTP verified successfully!');
            setTimeout(() => showStep('step3'), 800);
        }

        // ===== FORGOT PASSWORD =====
        function sendResetOtp() {
            const email = document.getElementById('resetEmail').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('error-resetEmail').classList.remove('hidden');
                document.getElementById('resetEmail').classList.add('border-red-500', 'bg-red-50');
                return;
            }
            document.getElementById('error-resetEmail').classList.add('hidden');
            document.getElementById('resetEmail').classList.remove('border-red-500', 'bg-red-50');
            showAlert('Reset OTP sent to your email!');
            setTimeout(() => {
                showStep('step5');
                startCountdown('resendOtpReset');
            }, 800);
        }

        // ===== VERIFY RESET OTP =====
        function verifyResetOtp() {
            const otp = getOtpValues('step5');
            if (otp.length !== 6) {
                document.getElementById('error-otp2').classList.remove('hidden');
                return;
            }
            document.getElementById('error-otp2').classList.add('hidden');
            showAlert('OTP verified!');
            setTimeout(() => showStep('step6'), 800);
        }

        // ===== NEW PASSWORD VALIDATION =====
        const newPasswordInput = document.getElementById('newPassword');
        newPasswordInput.addEventListener('input', () => {
            const val = newPasswordInput.value;
            updateResetReq('reset-req-length', val.length >= 8);
            updateResetReq('reset-req-upper', /[A-Z]/.test(val));
            updateResetReq('reset-req-lower', /[a-z]/.test(val));
            updateResetReq('reset-req-number', /[0-9]/.test(val));
            updateResetReq('reset-req-special', /[!@#$%^&*(),.?":{}|<>]/.test(val));
        });

        function updateResetReq(id, isValid) {
            const el = document.getElementById(id);
            const icon = el.querySelector('i');
            if (isValid) {
                el.classList.add('check-valid');
                el.classList.remove('check-invalid');
                icon.classList.remove('text-slate-300');
            } else {
                el.classList.remove('check-valid');
                el.classList.add('check-invalid');
                icon.classList.add('text-slate-300');
            }
        }

        // ===== RESET PASSWORD =====
        function resetPassword() {
            const newPass = document.getElementById('newPassword').value;
            const confirmPass = document.getElementById('confirmNewPassword').value;
            let valid = true;

            const passValid = newPass.length >= 8 && /[A-Z]/.test(newPass) && /[a-z]/.test(newPass) && /[0-9]/.test(newPass) && /[!@#$%^&*(),.?":{}|<>]/.test(newPass);
            if (!passValid) {
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

            if (valid) {
                showAlert('Password reset successfully!');
                setTimeout(() => {
                    document.getElementById('newPassword').value = '';
                    document.getElementById('confirmNewPassword').value = '';
                    showStep('step1');
                }, 1400);
            }
        }

        // ===== CLEAR ERRORS ON INPUT =====
        ['username', 'password', 'resetEmail', 'newPassword', 'confirmNewPassword'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', () => {
                    const errEl = document.getElementById('error-' + id);
                    if (errEl) errEl.classList.add('hidden');
                    el.classList.remove('border-red-500', 'bg-red-50');
                });
            }
        });
    </script>
</body>
</html>