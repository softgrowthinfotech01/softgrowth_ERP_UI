<?php
// edit_profile.php
// Single-page layout without tabs: everything fits cleanly on screen.
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

        /* ===== STICKY SUMMARY ===== */
        @media (min-width: 1024px) {
            .sticky-summary { position: sticky; top: 6rem; }
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
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 text-center">
                        <div class="w-20 h-20 mx-auto rounded-xl bg-slate-50 border-2 border-dashed border-slate-300 flex items-center justify-center mb-3 overflow-hidden">
                            <img id="summaryLogo" src="" alt="Logo" class="w-full h-full object-contain p-2" />
                        </div>
                        <h3 id="summaryName" class="text-sm font-bold text-gray-900 truncate">Loading...</h3>
                        <p id="summaryReg" class="text-[11px] text-gray-400 mt-0.5">Reg No: —</p>

                        <div class="flex items-center justify-center gap-1.5 mt-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            <span class="text-[10px] font-semibold text-green-600 uppercase tracking-wider">Active</span>
                        </div>
                    </div>
                </aside>

                <!-- ============================================================
                     RIGHT MAIN: UNIFIED FORM SECTION
                ============================================================ -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">

                    <div class="p-4 sm:p-5">
                        <div class="bg-orange-50 border-l-4 border-orange-500 rounded-r-lg px-3 py-2 mb-4 flex items-center gap-2">
                            <div class="w-7 h-7 rounded-md bg-orange-600 flex items-center justify-center text-white shadow-sm flex-shrink-0">
                                <i class="fas fa-building text-xs"></i>
                            </div>
                            <h3 class="text-sm font-bold text-gray-800">Institution Information & Credentials</h3>
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

                         
                           <!-- Username -->
                            <div class="">
                                <label id="usernameLabel" class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">
                                    Username <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                                    <input type="text" id="username" placeholder="Enter username"
                                           class="input-focus compact-input w-full pl-9 pr-3 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 placeholder:text-slate-400 outline-none transition-all duration-200" />
                                </div>
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-username">Username is required.</p>
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
                                        <select id="countryCode" class="appearance-none h-full pl-2 pr-6 rounded-l-lg border border-r-0 border-slate-200 bg-slate-100 text-slate-700 text-xs font-medium outline-none cursor-pointer focus:border-orange-500 transition-colors compact-input">
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
                                <p class="text-red-500 text-[10px] mt-1 hidden" id="error-phoneNo">Please enter a valid phone number.</p>
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
                            <div class="">
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
                                    Institution Logo <span class="text-slate-400 text-[10px] font-normal normal-case">(Optional update)</span>
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
                                            <p class="text-xs text-slate-500 font-medium">No new logo selected</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- ===== FORM ACTIONS (visible in edit mode) ===== -->
                    <div id="formActions" class="hidden px-4 sm:px-5 py-3 border-t border-slate-200 bg-slate-50/50">
                        <label class="flex items-start gap-2 cursor-pointer mb-3">
                            <input type="checkbox" id="termsCheck" class="mt-0.5 accent-orange-500 w-3.5 h-3.5 rounded" />
                            <span class="text-xs text-slate-600">
                                I agree to the <a href="#" class="text-blue-600 hover:underline font-medium">Terms & Conditions</a> and <a href="#" class="text-blue-600 hover:underline font-medium">Privacy Policy</a>.
                            </span>
                        </label>
                        <p class="text-red-500 text-[10px] -mt-2 mb-3 hidden" id="error-terms">You must agree to the Terms & Conditions.</p>

                        <div class="flex flex-col sm:flex-row justify-end gap-2">
                            <button type="button" onclick="cancelEdit()"
                                    class="px-4 py-2 rounded-lg border border-slate-300 text-slate-600 font-semibold text-xs hover:bg-slate-100 transition-all duration-200">
                                Cancel
                            </button>
                            <button type="submit" id="saveBtn"
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
    <div id="passwordModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 modal-overlay">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 modal-pop relative">
            <button onclick="closePasswordModal()" class="absolute right-3 top-3 text-slate-400 hover:text-red-500 text-xl transition-all duration-300 hover:rotate-90">×</button>

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
                    <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">Current Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                        <input type="password" id="currentPassword" placeholder="Enter current password" class="input-focus-teal compact-input w-full pl-9 pr-9 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 outline-none" />
                        <span class="eye-btn" onclick="togglePassword('currentPassword', this)"><i class="fas fa-eye"></i></span>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">New Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                        <input type="password" id="newPassword" placeholder="Enter new password" class="input-focus-teal compact-input w-full pl-9 pr-9 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 outline-none" />
                        <span class="eye-btn" onclick="togglePassword('newPassword', this)"><i class="fas fa-eye"></i></span>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-semibold text-slate-700 uppercase tracking-wider mb-1">Confirm Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs z-10"></i>
                        <input type="password" id="confirmNewPassword" placeholder="Re-enter new password" class="input-focus-teal compact-input w-full pl-9 pr-9 rounded-lg border border-slate-200 bg-slate-50/60 text-slate-800 outline-none" />
                        <span class="eye-btn" onclick="togglePassword('confirmNewPassword', this)"><i class="fas fa-eye"></i></span>
                    </div>
                </div>

                <div class="flex gap-2 pt-3">
                    <button type="button" onclick="closePasswordModal()" class="flex-1 py-2 rounded-lg border border-slate-300 text-slate-600 font-semibold text-xs hover:bg-slate-50">Cancel</button>
                    <button type="submit" id="modalSubmitBtn" class="flex-1 py-2 rounded-lg bg-teal-600 text-white font-bold text-xs shadow-md hover:bg-teal-700 flex items-center justify-center gap-1.5">
                        <i class="fas fa-sync-alt"></i> Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SUCCESS TOAST -->
    <div id="successToast" class="fixed top-5 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-5 py-2.5 rounded-lg shadow-2xl hidden z-[60] flex items-center gap-2">
        <div class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center"><i class="fas fa-check text-white text-[10px]"></i></div>
        <span class="text-xs font-medium" id="alertMessage">Success!</span>
    </div>

    <?php include 'footer.php'; ?>
    <script src="url.js"></script>

<script>
        function getApiUrl(path) {
            const baseUrl = typeof url !== 'undefined' ? url : '';
            if (!baseUrl) return path;
            const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;
            const cleanPath = path.startsWith('/') ? path : '/' + path;
            return cleanBase + cleanPath;
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('institutionForm').classList.add('locked');
            checkUserRoleAndProfile();
        });

        async function getToken() {
            return localStorage.getItem('auth_token') || localStorage.getItem('token') || localStorage.getItem('accessToken') || sessionStorage.getItem('token');
        }

        async function checkUserRoleAndProfile() {
            try {
                const token = await getToken();
                const headers = {
                    'Authorization': token ? `Bearer ${token}` : '',
                    'Accept': 'application/json'
                };

                // 1. Fetch current user data
                const userResponse = await fetch(getApiUrl('user'), {
                    method: 'GET',
                    headers: headers
                });
                const userData = await userResponse.json();

                if (userResponse.ok && userData.data) {
                    const user = userData.data;
                    const role = (user.role || '').toLowerCase();

                    // Update summary sidebar name and role
                    document.getElementById('summaryName').textContent = user.name || user.username || 'User Profile';
                    document.getElementById('summaryReg').textContent = 'Role: ' + user.role.toUpperCase();

                    // If NOT admin, adapt form for regular user (hide institute fields & phone number, update label)
                    if (role !== 'admin') {
                        adaptForRegularUser(user);
                    }
                }

                // 2. Fetch Institute Details (to load logo and institute info for everyone if available)
                fetchInstituteData(headers);

            } catch (error) {
                console.error('Error loading profile data:', error);
            }
        }

        function adaptForRegularUser(user) {
            // Hide institution-only fields including phone number, registration no, and aff no
            const fieldsToHide = ['collegeName', 'registrationNo', 'affNo', 'phoneNo', 'website', 'address', 'logoInput'];
            fieldsToHide.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    const wrapper = el.closest('.md\\:col-span-2') || el.closest('div').parentElement;
                    if (wrapper) wrapper.style.display = 'none';
                }
            });

            // Change Username label to "Name" for non-admin users using explicit ID
            const usernameLabel = document.getElementById('usernameLabel');
            if (usernameLabel) {
                usernameLabel.innerHTML = 'Name <span class="text-red-500">*</span>';
            }
            document.getElementById('username').placeholder = 'Enter name';

            // Populate available personal fields
            document.getElementById('username').value = user.username || '';
            document.getElementById('emailId').value = user.email || '';

            // Update header title to reflect personal profile
            document.querySelector('h1.text-lg').textContent = 'My Profile';
            document.querySelector('p.text-xs.text-gray-500').textContent = 'Manage your account credentials';
        }

        async function fetchInstituteData(headers) {
            try {
                const response = await fetch(getApiUrl('institute'), {
                    method: 'GET',
                    headers: headers
                });

                const data = await response.json();

                if (response.ok && data) {
                    // Populate admin fields if inputs are visible
                    if (document.getElementById('collegeName').offsetParent !== null) {
                        document.getElementById('collegeName').value = data.org_name || '';
                        document.getElementById('registrationNo').value = data.org_registration_no || '';
                        document.getElementById('affNo').value = data.affiliation_no || '';
                        document.getElementById('phoneNo').value = data.mobile || '';
                        document.getElementById('emailId').value = data.email || '';
                        document.getElementById('website').value = data.website || '';
                        document.getElementById('address').value = data.address || '';
                    }

                    document.getElementById('summaryName').textContent = data.org_name || document.getElementById('summaryName').textContent;
                    if (document.getElementById('registrationNo').offsetParent !== null) {
                        document.getElementById('summaryReg').textContent = 'Reg No: ' + (data.org_registration_no || '—');
                    }

                    // Handle Logo Display for all users (Admin & Regular Users)
                    const logoVal = data.logo;
                    const logoContainerParent = document.getElementById('summaryLogo').closest('.bg-slate-50');
                    
                    if (logoVal) {
                        let logoUrl = logoVal;
                        if (!logoUrl.startsWith('http') && !logoUrl.startsWith('data:')) {
                            const baseDomain = typeof url !== 'undefined' ? url.replace(/\/api\/?\$/, '') : '';
                            logoUrl = baseDomain + (logoUrl.startsWith('/') ? '' : '/') + logoUrl;
                        }
                        document.getElementById('summaryLogo').src = logoUrl;
                        document.getElementById('logoPreview').src = logoUrl;
                        document.getElementById('logoPreviewContainer').style.display = 'flex';
                        document.getElementById('logoPreviewContainer').classList.remove('hidden');
                        document.getElementById('logoPlaceholder').style.display = 'none';
                        document.getElementById('logoPlaceholder').classList.add('hidden');
                    } else {
                        // If no institute logo exists, completely remove/hide the logo box for regular users
                        const userResponse = await fetch(getApiUrl('user'), { method: 'GET', headers });
                        const userData = await userResponse.json();
                        const role = userData.data ? (userData.data.role || '').toLowerCase() : 'admin';

                        if (role !== 'admin' && logoContainerParent) {
                            logoContainerParent.style.display = 'none';
                        }
                    }
                }

                const adminResponse = await fetch(getApiUrl('admin/details'), {
                    method: 'GET',
                    headers: headers
                });
                const adminData = await adminResponse.json();
                if (adminResponse.ok && adminData.username && document.getElementById('username').offsetParent !== null) {
                    document.getElementById('username').value = adminData.username;
                }
            } catch (error) {
                console.error('Error fetching institute data:', error);
            }
        }

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
            checkUserRoleAndProfile();
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
                icon.className = 'fas fa-times';
                btnText.textContent = 'Cancel Edit';
                btn.className = 'fab-edit inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-600 text-white font-bold text-xs shadow-md hover:bg-slate-700';
            } else {
                form.classList.add('locked');
                actions.classList.add('hidden');
                icon.className = 'fas fa-pen';
                btnText.textContent = 'Edit Details';
                btn.className = 'fab-edit inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-orange-600 text-white font-bold text-xs shadow-md hover:bg-orange-700';
            }
        }

        function cancelEdit() {
            restoreOriginalValues();
            isEditMode = false;
            document.getElementById('institutionForm').classList.add('locked');
            document.getElementById('formActions').classList.add('hidden');
            document.getElementById('editIcon').className = 'fas fa-pen';
            document.getElementById('editBtnText').textContent = 'Edit Details';
            document.getElementById('editToggleBtn').className = 'fab-edit inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-orange-600 text-white font-bold text-xs shadow-md hover:bg-orange-700';
            showToast('Changes discarded.');
        }

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

        function openPasswordModal() {
            document.getElementById('passwordModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function showToast(msg) {
            const toast = document.getElementById('successToast');
            document.getElementById('alertMessage').textContent = msg;
            toast.classList.remove('hidden');
            setTimeout(() => toast.classList.add('hidden'), 2500);
        }

        // Logo Upload Preview Fix
        const dropZone = document.getElementById('dropZone');
        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');
        const logoPreviewContainer = document.getElementById('logoPreviewContainer');
        const logoPlaceholder = document.getElementById('logoPlaceholder');
        const logoFileName = document.getElementById('logoFileName');

        if (dropZone) {
            dropZone.addEventListener('click', () => {
                if (!document.getElementById('institutionForm').classList.contains('locked')) {
                    logoInput.click();
                }
            });
        }

        if (logoInput) {
            logoInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        logoPreview.src = event.target.result;
                        logoFileName.textContent = file.name;
                        logoPreviewContainer.style.display = 'flex';
                        logoPreviewContainer.classList.remove('hidden');
                        logoPlaceholder.style.display = 'none';
                        logoPlaceholder.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        function removeLogo() {
            if (logoInput) logoInput.value = '';
            if (logoPreview) logoPreview.src = '#';
            if (logoPreviewContainer) {
                logoPreviewContainer.style.display = 'none';
                logoPreviewContainer.classList.add('hidden');
            }
            if (logoPlaceholder) {
                logoPlaceholder.style.display = 'flex';
                logoPlaceholder.classList.remove('hidden');
            }
        }

        // Update Password Function
        async function updatePassword() {
            const current = document.getElementById('currentPassword').value.trim();
            const newPass = document.getElementById('newPassword').value.trim();
            const confirmPass = document.getElementById('confirmNewPassword').value.trim();

            if (!current || !newPass || !confirmPass) {
                alert('All password fields are required.');
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
                const token = await getToken();
                const payload = {
                    current_password: current,
                    password: newPass,
                    password_confirmation: confirmPass
                };

                const response = await fetch(getApiUrl('update-password'), {
                    method: 'POST',
                    headers: {
                        'Authorization': token ? `Bearer ${token}` : '',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const result = await response.json();
                if (response.ok) {
                    showToast('Password updated successfully!');
                    closePasswordModal();
                    document.getElementById('currentPassword').value = '';
                    document.getElementById('newPassword').value = '';
                    document.getElementById('confirmNewPassword').value = '';
                } else {
                    let errorMessage = result.message || 'Failed to update password.';
                    if (result.errors) {
                        const firstErrorKey = Object.keys(result.errors)[0];
                        if (firstErrorKey && result.errors[firstErrorKey][0]) {
                            errorMessage = result.errors[firstErrorKey][0];
                        }
                    }
                    alert(errorMessage);
                }
            } catch (error) {
                console.error('Password update network error:', error);
                alert('Network error while updating password.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Update Password';
            }
        }

        // Profile Form Submission
        document.getElementById('institutionForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const saveBtn = document.getElementById('saveBtn');
            saveBtn.disabled = true;
            saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';

            const token = await getToken();
            const headers = {
                'Authorization': token ? `Bearer ${token}` : '',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            };

            try {
                const userResponse = await fetch(getApiUrl('user'), { method: 'GET', headers });
                const userData = await userResponse.json();
                const isAdmin = userData.data && userData.data.role.toLowerCase() === 'admin';

                let endpoint = 'user/profile';
                let payload = {
                    username: document.getElementById('username').value,
                    email: document.getElementById('emailId').value
                };

                if (isAdmin) {
                    endpoint = 'institute/update';
                    const formData = new FormData();
                    formData.append('org_name', document.getElementById('collegeName').value);
                    formData.append('org_registration_no', document.getElementById('registrationNo').value);
                    formData.append('affiliation_no', document.getElementById('affNo').value);
                    formData.append('mobile', document.getElementById('phoneNo').value);
                    formData.append('email', document.getElementById('emailId').value);
                    formData.append('website', document.getElementById('website').value);
                    formData.append('address', document.getElementById('address').value);
                    formData.append('username', document.getElementById('username').value);

                    const logoFile = document.getElementById('logoInput').files[0];
                    if (logoFile) formData.append('logo', logoFile);

                    const response = await fetch(getApiUrl(endpoint), {
                        method: 'POST',
                        headers: { 'Authorization': token ? `Bearer ${token}` : '', 'Accept': 'application/json' },
                        body: formData
                    });
                    const result = await response.json();
                    if (response.ok) {
                        showToast('Institution profile updated successfully!');
                        setTimeout(() => { toggleEditMode(); checkUserRoleAndProfile(); }, 1000);
                    } else {
                        alert(result.message || 'Failed to update profile.');
                    }
                } else {
                    const response = await fetch(getApiUrl(endpoint), {
                        method: 'PUT',
                        headers: headers,
                        body: JSON.stringify(payload)
                    });
                    const result = await response.json();
                    if (response.ok) {
                        showToast('Profile updated successfully!');
                        setTimeout(() => { toggleEditMode(); checkUserRoleAndProfile(); }, 1000);
                    } else {
                        alert(result.message || 'Failed to update profile.');
                    }
                }
            } catch (error) {
                console.error('Profile update error:', error);
                alert('Network error while saving profile.');
            } finally {
                saveBtn.disabled = false;
                saveBtn.innerHTML = '<i class="fas fa-save"></i> Save Changes';
            }
        });
    </script>
</body>
</html>