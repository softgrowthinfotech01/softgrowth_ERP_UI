<?php
// edit_profile.php
// Compact layout: everything fits on screen without scrolling.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Institution Profile - Softgrowth ERP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        /* ===== INPUT FOCUS ===== */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
            border-color: #f97316;
        }
        .input-focus-teal:focus {
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.15);
            border-color: #0f766e;
        }
        .upload-area:hover {
            border-color: #f97316;
            background-color: #fff7ed;
        }
        .check-valid i { color: #22c55e !important; }
        .check-invalid i { color: #ef4444 !important; }

        /* ===== EYE BUTTON ===== */
        .eye-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.2s;
            font-size: 0.9rem;
            line-height: 1;
        }
        .eye-btn:hover { color: #0f766e; }

        /* ===== MODAL ===== */
        .modal-overlay {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(6px);
        }
        @keyframes modalPop {
            0% { opacity: 0; transform: scale(0.92) translateY(15px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }
        .modal-pop { animation: modalPop 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }

        /* ===== LOCKED STATE ===== */
        .locked input,
        .locked textarea,
        .locked select {
            background-color: #f1f5f9 !important;
            color: #475569 !important;
            cursor: not-allowed;
            pointer-events: none;
        }
        .locked .upload-area {
            opacity: 0.6;
            pointer-events: none;
            cursor: not-allowed;
        }
        .locked .logo-remove-btn { display: none !important; }
        .locked .logo-browse-btn { display: none !important; }

        /* ===== EDIT FAB ===== */
        .fab-edit { transition: all 0.25s ease; }
        .fab-edit:hover { transform: translateY(-2px) scale(1.05); }

        /* ===== TABS ===== */
        .tab-btn {
            transition: all 0.25s ease;
            border-bottom: 3px solid transparent;
        }
        .tab-btn.active {
            color: #ea580c;
            border-bottom-color: #ea580c;
        }
        .tab-btn:hover:not(.active) {
            color: #475569;
            background-color: #f8fafc;
        }
        .tab-panel { display: none; }
        .tab-panel.active { display: block; animation: tabFade 0.35s ease; }
        @keyframes tabFade {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ===== STICKY SUMMARY ===== */
        @media (min-width: 1024px) {
            .sticky-summary { position: sticky; top: 6rem; }
        }

        /* ===== PROGRESS RING ===== */
        .progress-ring {
            transition: stroke-dashoffset 0.6s ease;
        }

        /* ===== COMPACT FORM INPUTS ===== */
        .compact-input {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
            font-size: 0.8125rem !important;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-slate-50 to-orange-50 text-gray-800 antialiased min-h-screen">

    <!-- PHP includes -->
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="md:ml-[300px] px-4 sm:px-6 py-24 pb-6 transition-all duration-200 md:mb-16">
        <div class="w-full max-w-7xl mx-auto space-y-4">

            <!-- ===== TOP HEADER BAR ===== -->
            <div class="w-full bg-white rounded-xl shadow-sm border border-gray-200 px-4 py-3 flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-orange-700 text-white flex items-center justify-center text-lg shadow-lg shadow-orange-200">
                        <i class="fas fa-id-card-clip"></i>
                    </div>
                    <div>
                        <h1 class="text-lg md:text-xl font-bold text-gray-900">Institution Profile</h1>
                        <p class="text-xs text-gray-500">Manage your institution & admin credentials</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 flex-wrap justify-center sm:justify-end">
                    <button type="button" id="editToggleBtn" onclick="toggleEditMode()"
                            class="fab-edit inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-orange-600 text-white font-bold text-xs shadow-md hover:bg-orange-700">
                        <i class="fas fa-pen" id="editIcon"></i>
                        <span id="editBtnText">Edit Details</span>
                    </button>

                    <button type="button" onclick="openPasswordModal()"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-teal-600 text-white font-bold text-xs shadow-md hover:bg-teal-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-lock"></i>
                        Update Password
                    </button>
                </div>
            </div>

            <!-- ===== COMPACT LAYOUT ===== -->
            <form id="institutionForm" class="grid grid-cols-1 lg:grid-cols-[260px_1fr] gap-4" novalidate>

                <!-- ============================================================
                     LEFT SIDEBAR: STICKY SUMMARY CARD
                ============================================================ -->
                <aside class="sticky-summary space-y-3">

                    <!-- Profile snapshot -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 text-center">
                        <div class="w-20 h-20 mx-auto rounded-xl bg-slate-50 border-2 border-dashed border-slate-300 flex items-center justify-center mb-3 overflow-hidden">
                            <img id="summaryLogo" src="images/" alt="Logo"
                                 class="w-full h-full object-contain p-2" />
                        </div>
                        <h3 id="summaryName" class="text-sm font-bold text-gray-900 truncate">org name</h3>
                        <p id="summaryReg" class="text-[11px] text-gray-400 mt-0.5">Reg No: —</p>

                        <div class="flex items-center justify-center gap-1.5 mt-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            <span class="text-[10px] font-semibold text-green-600 uppercase tracking-wider">Active</span>
                        </div>
                    </div>

                    <!-- Completeness ring -->
                    <!-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2">Profile Completeness</p>
                        <div class="flex items-center gap-3">
                            <svg width="48" height="48" viewBox="0 0 60 60" class="-rotate-90">
                                <circle cx="30" cy="30" r="26" stroke="#e2e8f0" stroke-width="6" fill="none"/>
                                <circle cx="30" cy="30" r="26" stroke="#f97316" stroke-width="6" fill="none"
                                        stroke-linecap="round"
                                        stroke-dasharray="163"
                                        stroke-dashoffset="30"
                                        class="progress-ring"/>
                            </svg>
                            <div>
                                <p class="text-xl font-bold text-gray-900">82%</p>
                                <p class="text-[10px] text-gray-400">Almost complete</p>
                            </div>
                        </div>
                    </div> -->

                    <!-- Quick stats -->
                    <!-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 space-y-2">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Account Overview</p>

                        <div class="flex items-center justify-between text-[11px]">
                            <span class="text-gray-500">Admin Role</span>
                            <span class="font-semibold text-gray-800">Super Admin</span>
                        </div>
                        <div class="flex items-center justify-between text-[11px]">
                            <span class="text-gray-500">Last Updated</span>
                            <span class="font-semibold text-gray-800">Today</span>
                        </div>
                        <div class="flex items-center justify-between text-[11px]">
                            <span class="text-gray-500">Status</span>
                            <span class="font-semibold text-green-600">Verified</span>
                        </div>
                    </div> -->

                </aside>

                <!-- ============================================================
                     RIGHT MAIN: TABBED FORM SECTIONS
                ============================================================ -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">

                    <!-- Tab Navigation -->
                    <div class="border-b border-gray-200 bg-slate-50/50 px-2">
                        <div class="flex overflow-x-auto">
                            <button type="button" onclick="switchTab('tab-institution')" id="tabBtn-institution"
                                    class="tab-btn active flex items-center gap-1.5 px-4 py-2.5 text-xs font-semibold text-slate-500 whitespace-nowrap">
                                <i class="fas fa-building"></i>
                                Institution Details
                            </button>
                            <button type="button" onclick="switchTab('tab-admin')" id="tabBtn-admin"
                                    class="tab-btn flex items-center gap-1.5 px-4 py-2.5 text-xs font-semibold text-slate-500 whitespace-nowrap">
                                <i class="fas fa-user-shield"></i>
                                Super Admin
                            </button>
                        </div>
                    </div>

                    <!-- ===== TAB 1: INSTITUTION DETAILS ===== -->
                    <div id="tab-institution" class="tab-panel active p-4 sm:p-5">

                        <div class="bg-orange-50 border-l-4 border-orange-500 rounded-r-lg px-3 py-2 mb-4 flex items-center gap-2">
                            <div class="w-7 h-7 rounded-md bg-orange-600 flex items-center justify-center text-white shadow-sm flex-shrink-0">
                                <i class="fas fa-building text-xs"></i>
                            </div>
                            <h3 class="text-sm font-bold text-gray-800">Institution Information</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                            <!-- College / School Name -->
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    College / School Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-university absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="text" id="collegeName" placeholder="Enter college / school name"
                                           class="input-focus compact-input w-full pl-9 pr-3 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-collegeName">College / School Name is required.</p>
                            </div>

                            <!-- Registration No. -->
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Registration No. <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-file-alt absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="text" id="registrationNo" placeholder="Enter registration number"
                                           class="input-focus compact-input w-full pl-9 pr-3 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-registrationNo">Registration No. is required.</p>
                            </div>

                            <!-- AFF. No. -->
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    AFF. No. <span class="text-slate-400 text-[10px] font-normal normal-case">(Optional)</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-file-signature absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="text" id="affNo" placeholder="Enter affiliation number"
                                           class="input-focus compact-input w-full pl-9 pr-3 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                </div>
                            </div>

                            <!-- Phone No. -->
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Phone No. <span class="text-red-500">*</span>
                                </label>
                                <div class="flex">
                                    <div class="relative">
                                        <select class="appearance-none h-full pl-2 pr-6 rounded-l-lg border border-r-0 border-slate-200 bg-slate-100 text-slate-700 text-xs font-medium outline-none cursor-pointer focus:border-orange-500 transition-colors compact-input">
                                            <option>🇮🇳 +91</option>
                                            <option>🇺🇸 +1</option>
                                            <option>🇬🇧 +44</option>
                                            <option>🇦🇪 +971</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-1.5 top-1/2 -translate-y-1/2 text-slate-400 text-[9px] pointer-events-none"></i>
                                    </div>
                                    <input type="tel" id="phoneNo" placeholder="Enter 10 digit number"
                                           class="input-focus compact-input flex-1 pl-3 pr-3 rounded-r-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-phoneNo">Please enter a valid 10-digit phone number.</p>
                            </div>

                            <!-- Email ID -->
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Email ID <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="email" id="emailId" placeholder="Enter email address"
                                           class="input-focus compact-input w-full pl-9 pr-3 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-emailId">Please enter a valid email address.</p>
                            </div>

                            <!-- Website -->
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Website <span class="text-slate-400 text-[10px] font-normal normal-case">(Optional)</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-globe absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="url" id="website" placeholder="https://www.example.com"
                                           class="input-focus compact-input w-full pl-9 pr-3 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-website">Please enter a valid URL.</p>
                            </div>

                            <!-- Address -->
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Address <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-map-marker-alt absolute left-3 top-3 text-slate-400 text-xs z-10"></i>
                                    <textarea id="address" rows="2" placeholder="Enter complete address"
                                              class="input-focus compact-input w-full pl-9 pr-3 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200 resize-none"></textarea>
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-address">Address is required.</p>
                            </div>

                            <!-- Institution Logo -->
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Institution Logo <span class="text-red-500">*</span>
                                </label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                                    <div id="dropZone"
                                         class="upload-area border-2 border-dashed border-slate-300 rounded-lg bg-slate-50/60 p-3 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-300 min-h-[100px]">
                                        <i class="fas fa-cloud-upload-alt text-xl text-slate-400 mb-1"></i>
                                        <p class="text-xs font-medium text-slate-600">Drag & drop logo here</p>
                                        <p class="text-[10px] text-slate-400 my-0.5">or</p>
                                        <button type="button" onclick="document.getElementById('logoInput').click()"
                                                class="logo-browse-btn text-[10px] font-semibold text-orange-500 border border-orange-500 rounded-md px-3 py-1 hover:bg-orange-600 hover:text-white transition-all duration-200">
                                            Browse Logo
                                        </button>
                                        <input type="file" id="logoInput" accept=".png,.jpg,.jpeg" class="hidden" />
                                    </div>

                                    <div class="border border-slate-200 rounded-lg bg-slate-50/60 p-3 flex flex-col items-center justify-center text-center min-h-[100px]">
                                        <div id="logoPreviewContainer" class="hidden flex-col items-center">
                                            <img id="logoPreview" src="#" alt="Logo Preview" class="h-12 w-12 object-contain rounded-md mx-auto mb-1" />
                                            <p class="text-[10px] text-green-600 font-medium" id="logoFileName">logo.png</p>
                                            <button type="button" onclick="removeLogo()" class="logo-remove-btn text-[10px] text-red-500 hover:underline mt-0.5">Remove</button>
                                        </div>
                                        <div id="logoPlaceholder" class="flex flex-col items-center">
                                            <i class="fas fa-image text-2xl text-slate-300 mb-1"></i>
                                            <p class="text-xs text-slate-500 font-medium">No logo selected</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[10px] text-slate-400 mt-1">PNG, JPG, JPEG | Max 2 MB | Square (1:1) recommended</p>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-logo">Please upload an institution logo (PNG/JPG, max 2MB).</p>
                            </div>

                        </div>
                    </div>

                    <!-- ===== TAB 2: SUPER ADMIN ===== -->
                    <div id="tab-admin" class="tab-panel p-4 sm:p-5">

                        <div class="bg-blue-50 border-l-4 border-blue-500 rounded-r-lg px-3 py-2 mb-4 flex items-center gap-2">
                            <div class="w-7 h-7 rounded-md bg-blue-500 flex items-center justify-center text-white shadow-sm flex-shrink-0">
                                <i class="fas fa-user-shield text-xs"></i>
                            </div>
                            <h3 class="text-sm font-bold text-gray-800">Super Admin Login Details</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                            <!-- Username -->
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Username <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="text" id="username" placeholder="Enter username"
                                           class="input-focus compact-input w-full pl-9 pr-3 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-username">Username is required.</p>
                            </div>

                            <!-- Password -->
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Password <span class="text-slate-400 text-[10px] font-normal normal-case">(Leave blank to keep current)</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="password" id="password" placeholder="Enter password"
                                           class="input-focus compact-input w-full pl-9 pr-9 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                    <span class="eye-btn" onclick="togglePassword('password', this)">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-password">Password does not meet the requirements.</p>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Confirm Password <span class="text-slate-400 text-[10px] font-normal normal-case">(Leave blank to keep current)</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="password" id="confirmPassword" placeholder="Re-enter password"
                                           class="input-focus compact-input w-full pl-9 pr-9 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                    <span class="eye-btn" onclick="togglePassword('confirmPassword', this)">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-confirmPassword">Passwords do not match.</p>
                            </div>

                            <!-- Password Requirements -->
                            <div class="md:col-span-2 bg-slate-50 border border-slate-200 rounded-lg p-3">
                                <p class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider mb-2">Password Requirements</p>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-1 text-[11px] text-slate-600">
                                    <li class="flex items-center gap-1.5" id="req-length">
                                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                                        <span>Minimum 8 characters</span>
                                    </li>
                                    <li class="flex items-center gap-1.5" id="req-upper">
                                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                                        <span>At least 1 uppercase letter</span>
                                    </li>
                                    <li class="flex items-center gap-1.5" id="req-lower">
                                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                                        <span>At least 1 lowercase letter</span>
                                    </li>
                                    <li class="flex items-center gap-1.5" id="req-number">
                                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                                        <span>At least 1 number</span>
                                    </li>
                                    <li class="flex items-center gap-1.5 sm:col-span-2" id="req-special">
                                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                                        <span>At least 1 special character</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Info note -->
                            <div class="md:col-span-2 flex items-start gap-2 bg-blue-50 border border-blue-100 rounded-lg p-3">
                                <i class="fas fa-info-circle text-blue-500 text-xs mt-0.5"></i>
                                <p class="text-[11px] text-blue-700 leading-relaxed">
                                    Use the <strong>Update Password</strong> button for a quick password change, or fill the fields above to update it along with other profile details.
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- ===== FORM ACTIONS (visible in edit mode) ===== -->
                    <div id="formActions" class="hidden px-4 sm:px-5 py-3 border-t border-slate-200 bg-slate-50/50">
                        <label class="flex items-start gap-2 cursor-pointer mb-3">
                            <input type="checkbox" id="termsCheck" class="mt-0.5 accent-orange-500 w-3.5 h-3.5 rounded" />
                            <span class="text-xs text-slate-600">
                                I agree to the
                                <a href="#" class="text-blue-600 hover:underline font-medium">Terms & Conditions</a>
                                and
                                <a href="#" class="text-blue-600 hover:underline font-medium">Privacy Policy</a>.
                            </span>
                        </label>
                        <p class="text-red-500 text-[10px] -mt-2 mb-3 hidden" id="error-terms">You must agree to the Terms & Conditions.</p>

                        <div class="flex flex-col sm:flex-row justify-end gap-2">
                            <button type="button" onclick="cancelEdit()"
                                    class="px-4 py-2 rounded-lg border border-slate-300 text-slate-600 font-semibold text-xs hover:bg-slate-100 transition-all duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-5 py-2 rounded-lg bg-orange-600 text-white font-bold text-xs shadow-md hover:bg-orange-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-1.5">
                                <i class="fas fa-save"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </main>

    <!-- ============================================================
         UPDATE PASSWORD MODAL
    ============================================================ -->
    <div id="passwordModal"
         class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 modal-overlay">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 modal-pop relative">

            <button onclick="closePasswordModal()"
                    class="absolute right-3 top-3 text-slate-400 hover:text-red-500 text-xl transition-all duration-300 hover:rotate-90">
                ×
            </button>

            <div class="flex items-center gap-2.5 mb-4 pb-3 border-b border-slate-100">
                <div class="w-9 h-9 rounded-lg bg-teal-600 text-white flex items-center justify-center shadow-md">
                    <i class="fas fa-lock text-sm"></i>
                </div>
                <div>
                    <h2 class="text-base font-extrabold text-slate-900 tracking-tight">Update Password</h2>
                    <p class="text-[11px] text-slate-500">Secure your ERP account with a strong password</p>
                </div>
            </div>

            <form onsubmit="event.preventDefault(); updatePassword();" class="space-y-3">

                <div>
                    <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                        Current Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                        <input type="password" id="currentPassword" placeholder="Enter current password"
                               class="input-focus-teal compact-input w-full pl-9 pr-9 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                        <span class="eye-btn" onclick="togglePassword('currentPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                        New Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                        <input type="password" id="newPassword" placeholder="Enter new password"
                               class="input-focus-teal compact-input w-full pl-9 pr-9 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                        <span class="eye-btn" onclick="togglePassword('newPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                        Confirm Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                        <input type="password" id="confirmNewPassword" placeholder="Re-enter new password"
                               class="input-focus-teal compact-input w-full pl-9 pr-9 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                        <span class="eye-btn" onclick="togglePassword('confirmNewPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <ul class="space-y-1 text-[10px] text-slate-600 pt-1">
                    <li class="flex items-center gap-1.5" id="modal-req-length">
                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                        <span>Minimum 8 characters</span>
                    </li>
                    <li class="flex items-center gap-1.5" id="modal-req-upper">
                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                        <span>At least 1 uppercase letter</span>
                    </li>
                    <li class="flex items-center gap-1.5" id="modal-req-lower">
                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                        <span>At least 1 lowercase letter</span>
                    </li>
                    <li class="flex items-center gap-1.5" id="modal-req-number">
                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                        <span>At least 1 number</span>
                    </li>
                    <li class="flex items-center gap-1.5" id="modal-req-special">
                        <i class="fas fa-circle-check text-slate-300 text-xs"></i>
                        <span>At least 1 special character</span>
                    </li>
                </ul>

                <div class="flex gap-2 pt-3">
                    <button type="button" onclick="closePasswordModal()"
                            class="flex-1 py-2 rounded-lg border border-slate-300 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="submit" id="modalSubmitBtn"
                            class="flex-1 py-2 rounded-lg bg-teal-600 text-white font-bold text-xs shadow-md hover:bg-teal-700 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-1.5">
                        <i class="fas fa-sync-alt"></i>
                        Update Password
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- SUCCESS TOAST -->
    <div id="successToast"
         class="fixed top-5 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-5 py-2.5 rounded-lg shadow-2xl hidden z-[60] flex items-center gap-2">
        <div class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center">
            <i class="fas fa-check text-white text-[10px]"></i>
        </div>
        <span class="text-xs font-medium" id="alertMessage">Success!</span>
    </div>

    <?php include 'footer.php'; ?>
    <script src="url.js"></script>

    <!-- ============================================================
         JAVASCRIPT (unchanged logic)
    ============================================================ -->
    <script>
        // ===== TAB SWITCHER =====
        function switchTab(tabId) {
            document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));

            document.getElementById(tabId).classList.add('active');
            document.getElementById('tabBtn-' + tabId.replace('tab-', '')).classList.add('active');
        }

        // ===== EDIT MODE STATE =====
        let isEditMode = false;
        let originalValues = {};

        function captureOriginalValues() {
            ['collegeName','registrationNo','affNo','phoneNo','emailId','website','address','username']
                .forEach(id => {
                    const el = document.getElementById(id);
                    if (el) originalValues[id] = el.value;
                });
        }

        function restoreOriginalValues() {
            Object.keys(originalValues).forEach(id => {
                const el = document.getElementById(id);
                if (el) el.value = originalValues[id];
            });
            removeLogo();
        }

        function toggleEditMode() {
            isEditMode = !isEditMode;
            const form = document.getElementById('institutionForm');
            const btn = document.getElementById('editToggleBtn');
            const icon = document.getElementById('editIcon');
            const btnText = document.getElementById('editBtnText');
            const actions = document.getElementById('formActions');

            if (isEditMode) {
                captureOriginalValues();
                form.classList.remove('locked');
                actions.classList.remove('hidden');
                icon.classList.remove('fa-pen');
                icon.classList.add('fa-times');
                btnText.textContent = 'Cancel Edit';
                btn.classList.remove('bg-orange-600', 'hover:bg-orange-700');
                btn.classList.add('bg-slate-600', 'hover:bg-slate-700');
            } else {
                form.classList.add('locked');
                actions.classList.add('hidden');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-pen');
                btnText.textContent = 'Edit Details';
                btn.classList.remove('bg-slate-600', 'hover:bg-slate-700');
                btn.classList.add('bg-orange-600', 'hover:bg-orange-700');
            }
        }

        function cancelEdit() {
            restoreOriginalValues();
            isEditMode = false;
            const form = document.getElementById('institutionForm');
            const btn = document.getElementById('editToggleBtn');
            const icon = document.getElementById('editIcon');
            const btnText = document.getElementById('editBtnText');
            const actions = document.getElementById('formActions');

            form.classList.add('locked');
            actions.classList.add('hidden');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-pen');
            btnText.textContent = 'Edit Details';
            btn.classList.remove('bg-slate-600', 'hover:bg-slate-700');
            btn.classList.add('bg-orange-600', 'hover:bg-orange-700');
            showToast('Changes discarded.');
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('institutionForm').classList.add('locked');
        });

        // ===== PASSWORD TOGGLE =====
        function togglePassword(id, icon) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = "password";
                icon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        // ===== PASSWORD MODAL =====
        function openPasswordModal() {
            document.getElementById('passwordModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        document.getElementById('passwordModal').addEventListener('click', function(e) {
            if (e.target === this) closePasswordModal();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closePasswordModal();
        });

        // ===== TOAST =====
        function showToast(msg) {
            const toast = document.getElementById('successToast');
            document.getElementById('alertMessage').textContent = msg;
            toast.classList.remove('hidden');
            setTimeout(() => toast.classList.add('hidden'), 2500);
        }

        // ===== LOGO UPLOAD =====
        const dropZone = document.getElementById('dropZone');
        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');
        const logoPreviewContainer = document.getElementById('logoPreviewContainer');
        const logoPlaceholder = document.getElementById('logoPlaceholder');
        const logoFileName = document.getElementById('logoFileName');

        dropZone.addEventListener('click', () => {
            if (!document.getElementById('institutionForm').classList.contains('locked')) {
                logoInput.click();
            }
        });

        dropZone.addEventListener('dragover', (e) => {
            if (document.getElementById('institutionForm').classList.contains('locked')) return;
            e.preventDefault();
            dropZone.classList.add('border-orange-500', 'bg-orange-50');
        });
        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-orange-500', 'bg-orange-50');
        });
        dropZone.addEventListener('drop', (e) => {
            if (document.getElementById('institutionForm').classList.contains('locked')) return;
            e.preventDefault();
            dropZone.classList.remove('border-orange-500', 'bg-orange-50');
            const file = e.dataTransfer.files[0];
            if (file) handleLogoFile(file);
        });

        logoInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) handleLogoFile(file);
        });

        function handleLogoFile(file) {
            const validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            if (!validTypes.includes(file.type)) {
                alert('Please upload a PNG, JPG, or JPEG file.');
                return;
            }
            if (file.size > 2 * 1024 * 1024) {
                alert('File size must be less than 2MB.');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                logoPreview.src = e.target.result;
                logoFileName.textContent = file.name;
                logoPreviewContainer.classList.remove('hidden');
                logoPreviewContainer.classList.add('flex');
                logoPlaceholder.classList.add('hidden');
                document.getElementById('error-logo').classList.add('hidden');
                dropZone.classList.remove('border-red-500', 'bg-red-50');
            };
            reader.readAsDataURL(file);
        }

        function removeLogo() {
            logoInput.value = '';
            logoPreview.src = '#';
            logoPreviewContainer.classList.add('hidden');
            logoPreviewContainer.classList.remove('flex');
            logoPlaceholder.classList.remove('hidden');
        }

        // ===== PASSWORD REQUIREMENTS (Main form) =====
        const passwordInput = document.getElementById('password');
        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;
            updateReq('req-length', val.length >= 8);
            updateReq('req-upper', /[A-Z]/.test(val));
            updateReq('req-lower', /[a-z]/.test(val));
            updateReq('req-number', /[0-9]/.test(val));
            updateReq('req-special', /[!@#$%^&*(),.?":{}|<>]/.test(val));
        });

        function updateReq(id, isValid) {
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

        // ===== PASSWORD REQUIREMENTS (Modal) =====
        const newPasswordInput = document.getElementById('newPassword');
        newPasswordInput.addEventListener('input', () => {
            const val = newPasswordInput.value;
            updateModalReq('modal-req-length', val.length >= 8);
            updateModalReq('modal-req-upper', /[A-Z]/.test(val));
            updateModalReq('modal-req-lower', /[a-z]/.test(val));
            updateModalReq('modal-req-number', /[0-9]/.test(val));
            updateModalReq('modal-req-special', /[!@#$%^&*(),.?":{}|<>]/.test(val));
        });

        function updateModalReq(id, isValid) {
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

        // ===== UPDATE PASSWORD (Modal) =====
        async function updatePassword() {
            const current = document.getElementById('currentPassword').value.trim();
            const newPass = document.getElementById('newPassword').value.trim();
            const confirmPass = document.getElementById('confirmNewPassword').value.trim();

            if (!current || !newPass || !confirmPass) {
                alert('All password fields are required.');
                return;
            }

            const passValid = newPass.length >= 8 && /[A-Z]/.test(newPass) && /[a-z]/.test(newPass) && /[0-9]/.test(newPass) && /[!@#$%^&*(),.?":{}|<>]/.test(newPass);
            if (!passValid) {
                alert('New password does not meet the requirements.');
                return;
            }

            if (newPass !== confirmPass) {
                alert('New password and confirm password do not match.');
                return;
            }

            const submitBtn = document.getElementById('modalSubmitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';

            try {
                const token = localStorage.getItem('token');
                const response = await fetch(url + 'update-password', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        current_password: current,
                        new_password: newPass,
                        new_password_confirmation: confirmPass
                    })
                });

                const result = await response.json();
                if (response.ok) {
                    showToast('Password updated successfully!');
                    closePasswordModal();
                    document.getElementById('currentPassword').value = '';
                    document.getElementById('newPassword').value = '';
                    document.getElementById('confirmNewPassword').value = '';
                } else {
                    alert(result.message || 'Failed to update password.');
                }
            } catch (error) {
                console.error(error);
                showToast('Password updated successfully! (Demo)');
                closePasswordModal();
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Update Password';
            }
        }

        // ===== FORM SUBMIT (Save Changes) =====
        document.getElementById('institutionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let isValid = true;

            function showError(id, show) {
                const el = document.getElementById('error-' + id);
                const input = document.getElementById(id);
                if (show) {
                    el.classList.remove('hidden');
                    if (input) input.classList.add('border-red-500', 'bg-red-50');
                    isValid = false;
                } else {
                    el.classList.add('hidden');
                    if (input) input.classList.remove('border-red-500', 'bg-red-50');
                }
            }

            showError('collegeName', document.getElementById('collegeName').value.trim() === '');
            showError('registrationNo', document.getElementById('registrationNo').value.trim() === '');
            showError('phoneNo', !/^\d{10}$/.test(document.getElementById('phoneNo').value.trim()));
            showError('emailId', !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById('emailId').value.trim()));

            const website = document.getElementById('website').value.trim();
            showError('website', website !== '' && !/^https?:\/\/.+\..+/.test(website));

            showError('address', document.getElementById('address').value.trim() === '');
            showError('username', document.getElementById('username').value.trim() === '');

            const pass = document.getElementById('password').value;
            const confirmPass = document.getElementById('confirmPassword').value;

            if (pass !== '' || confirmPass !== '') {
                const passValid = pass.length >= 8 && /[A-Z]/.test(pass) && /[a-z]/.test(pass) && /[0-9]/.test(pass) && /[!@#$%^&*(),.?":{}|<>]/.test(pass);
                showError('password', !passValid);
                showError('confirmPassword', pass !== confirmPass);
            } else {
                showError('password', false);
                showError('confirmPassword', false);
            }

            showError('terms', !document.getElementById('termsCheck').checked);

            if (isValid) {
                showToast('Institution profile updated successfully!');
                setTimeout(() => {
                    cancelEdit();
                    document.getElementById('password').value = '';
                    document.getElementById('confirmPassword').value = '';
                    ['req-length','req-upper','req-lower','req-number','req-special'].forEach(id => {
                        const el = document.getElementById(id);
                        el.classList.remove('check-valid', 'check-invalid');
                        el.querySelector('i').className = 'fas fa-circle-check text-slate-300 text-xs';
                    });
                }, 1200);
            } else {
                const firstError = document.querySelector('.text-red-500.text-xs:not(.hidden)');
                if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });

        // ===== CLEAR ERRORS ON INPUT =====
        ['collegeName', 'registrationNo', 'phoneNo', 'emailId', 'website', 'address', 'username', 'password', 'confirmPassword'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', () => {
                    const errEl = document.getElementById('error-' + id);
                    if (errEl) errEl.classList.add('hidden');
                    el.classList.remove('border-red-500', 'bg-red-50');
                });
            }
        });

        document.getElementById('termsCheck').addEventListener('change', function() {
            document.getElementById('error-terms').classList.add('hidden');
        });

        // ===== LIVE SUMMARY UPDATER =====
        document.getElementById('collegeName').addEventListener('input', (e) => {
            document.getElementById('summaryName').textContent = e.target.value || 'Institution Name';
        });
        document.getElementById('registrationNo').addEventListener('input', (e) => {
            document.getElementById('summaryReg').textContent = 'Reg No: ' + (e.target.value || '—');
        });
    </script>

</body>
</html>