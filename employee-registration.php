<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Registration - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-10 mb-10 transition-all duration-200 flex flex-col items-center justify-center">
        <div class="w-full max-w-5xl space-y-4">

            <!-- Global Error Banner -->
            <div id="globalErrorBanner" class="hidden mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-3 shadow-sm">
                <i class="fas fa-exclamation-circle text-red-500 text-lg flex-shrink-0"></i>
                <div id="globalErrorMessage">Please correct the highlighted fields before proceeding.</div>
            </div>

            <!-- Global Success Banner -->
            <div id="globalSuccessBanner" class="hidden mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl text-sm flex items-center gap-3 shadow-sm">
                <i class="fas fa-check-circle text-green-500 text-lg flex-shrink-0"></i>
                <div id="globalSuccessMessage">Employee registered successfully.</div>
            </div>

            <!-- Header -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 flex items-center justify-between gap-3 flex-wrap">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900 leading-tight">Employee Registration</h1>
                        <p class="text-[11px] text-gray-500 mt-0.5">Register new employees and maintain central HR records.</p>
                    </div>
                </div>
                <span class="text-[10px] bg-orange-100 text-orange-700 px-2.5 py-1 rounded-full font-semibold">
                    <i class="fas fa-user-shield text-[9px] mr-1"></i> HR Admin
                </span>
            </div>

            <!-- Form -->
            <form id="employeeForm" class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden" novalidate>
                
                <!-- ============================================================ -->
                <!-- SECTION 1: BASIC INFORMATION -->
                <!-- ============================================================ -->
                <div class="bg-orange-50 px-4 py-2.5 border-b border-orange-100 flex items-center gap-2">
                    <i class="fas fa-id-card text-orange-500 text-xs"></i>
                    <h3 class="font-bold text-gray-800 text-[13px]">Basic Information</h3>
                </div>

                <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                    
                    <!-- Employee ID -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Employee ID</label>
                        <div class="relative">
                            <i class="fas fa-hashtag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="employeeId" readonly value="Auto-generated on save"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 bg-gray-100 text-gray-500 cursor-not-allowed focus:outline-none font-mono font-semibold">
                        </div>
                    </div>

                    <!-- Employee Name -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Employee Name <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="employeeName" placeholder="Enter full name"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-employee_name"></p>
                    </div>

                    <!-- Gender -->
                    <div class="md:col-span-2">
                        <label class="block text-[11px] font-bold text-gray-700 mb-1.5">Gender <span class="text-red-500">*</span></label>
                        <div class="flex gap-4" id="genderContainer">
                            <label class="inline-flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="gender" value="Male" class="w-3.5 h-3.5 text-orange-500 focus:ring-orange-400 accent-orange-500">
                                <span class="text-[12px] text-gray-700">Male</span>
                            </label>
                            <label class="inline-flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="gender" value="Female" class="w-3.5 h-3.5 text-orange-500 focus:ring-orange-400 accent-orange-500">
                                <span class="text-[12px] text-gray-700">Female</span>
                            </label>
                            <label class="inline-flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="gender" value="Other" class="w-3.5 h-3.5 text-orange-500 focus:ring-orange-400 accent-orange-500">
                                <span class="text-[12px] text-gray-700">Other</span>
                            </label>
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-gender"></p>
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Birth <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="date" id="dob"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-date_of_birth"></p>
                    </div>

                    <!-- Profile Photo -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Profile Photo <span class="text-[10px] font-normal text-gray-400">(Optional, JPG/PNG max 2MB)</span></label>
                        <div class="relative">
                            <input type="file" id="profilePhoto" accept="image/jpeg,image/png"
                                class="w-full px-3 py-1.5 text-[11px] rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm file:mr-3 file:py-1 file:px-2 file:rounded file:border-0 file:text-[10px] file:font-semibold file:bg-orange-100 file:text-orange-700 hover:file:bg-orange-200">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-profile_photo"></p>
                    </div>
                </div>

                <!-- ============================================================ -->
                <!-- SECTION 2: CONTACT DETAILS -->
                <!-- ============================================================ -->
                <div class="bg-orange-50 px-4 py-2.5 border-y border-orange-100 flex items-center gap-2">
                    <i class="fas fa-address-book text-orange-500 text-xs"></i>
                    <h3 class="font-bold text-gray-800 text-[13px]">Contact Details</h3>
                </div>

                <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                    
                    <!-- Mobile Number -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Mobile Number <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 text-xs font-semibold">+91</span>
                            <input type="tel" id="mobileNumber" maxlength="10" placeholder="Enter 10-digit number"
                                class="w-full pl-10 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-mobile_number"></p>
                    </div>

                    <!-- Email ID -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Email ID <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="email" id="email" placeholder="Enter valid email address"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-email"></p>
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Address <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-map-pin absolute left-3 top-3 text-gray-400 text-xs"></i>
                            <textarea id="address" rows="2" placeholder="Enter complete residential address"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm"></textarea>
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-address"></p>
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">City <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-city absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="city" placeholder="Enter city"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-city"></p>
                    </div>

                    <!-- State (Input Box Entry) -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">State <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-map absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="state" placeholder="Enter state name"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-state"></p>
                    </div>

                    <!-- PIN Code -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">PIN Code <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="pinCode" maxlength="6" placeholder="6-digit PIN"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-pin_code"></p>
                    </div>
                </div>

                <!-- ============================================================ -->
                <!-- SECTION 3: JOB DETAILS -->
                <!-- ============================================================ -->
                <div class="bg-orange-50 px-4 py-2.5 border-y border-orange-100 flex items-center gap-2">
                    <i class="fas fa-briefcase text-orange-500 text-xs"></i>
                    <h3 class="font-bold text-gray-800 text-[13px]">Job Details</h3>
                </div>

                <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                    
                    <!-- Designation (API Fetched) -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Designation <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-user-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <select id="designation" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                <option value="">Loading designations...</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-designation_id"></p>
                    </div>

                    <!-- Date of Joining -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Joining <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-calendar-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="date" id="doj"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-date_of_joining"></p>
                    </div>
                </div>

                <!-- ============================================================ -->
                <!-- SECTION 4: ADDITIONAL DETAILS -->
                <!-- ============================================================ -->
                <div class="bg-orange-50 px-4 py-2.5 border-y border-orange-100 flex items-center gap-2">
                    <i class="fas fa-info-circle text-orange-500 text-xs"></i>
                    <h3 class="font-bold text-gray-800 text-[13px]">Additional Details</h3>
                </div>

                <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                    
                    <!-- Emergency Contact -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Emergency Contact <span class="text-[10px] font-normal text-gray-400">(Optional)</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 text-xs font-semibold">+91</span>
                            <input type="tel" id="emergencyContact" maxlength="10" placeholder="Enter 10-digit number"
                                class="w-full pl-10 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-emergency_contact"></p>
                    </div>

                    <!-- Employee Status (Active / Inactive) -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Employee Status <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-toggle-on absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <select id="employeeStatus" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                        </div>
                        <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-employee_status"></p>
                    </div>
                </div>

                <!-- ============================================================ -->
                <!-- FORM ACTIONS -->
                <!-- ============================================================ -->
                <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-3">
                    <button type="button" id="backToListBtn"
                        class="w-full sm:w-auto px-5 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition text-[12px] shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left text-[10px]"></i> Back to List
                    </button>

                    <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                        <button type="button" id="resetBtn"
                            class="w-full sm:w-auto px-4 py-2 bg-white border border-gray-300 text-red-600 font-semibold rounded-lg hover:bg-red-50 transition text-[12px] shadow-sm">
                            Reset
                        </button>
                        
                        <button type="submit" id="saveEmployeeBtn"
                            class="w-full sm:w-auto px-6 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-[12px] shadow-md flex items-center justify-center gap-2">
                            <i class="fas fa-save text-[10px]"></i> Save Employee
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <!-- ============================================================ -->
    <!-- SCRIPT LOGIC & API INTEGRATION -->
    <!-- ============================================================ -->
    <script>
        (function() {
            // Authentication Token Verification
            const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');
            if (!token) {
                alert('Authentication token missing. Please log in again.');
                window.location.href = 'login.php';
                return;
            }

            const baseUrl = typeof url !== 'undefined' ? url : '';
            const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;

            // DOM Elements
            const form = document.getElementById('employeeForm');
            const employeeName = document.getElementById('employeeName');
            const profilePhoto = document.getElementById('profilePhoto');
            const mobileNumber = document.getElementById('mobileNumber');
            const email = document.getElementById('email');
            const address = document.getElementById('address');
            const city = document.getElementById('city');
            const state = document.getElementById('state');
            const pinCode = document.getElementById('pinCode');
            const designationSelect = document.getElementById('designation');
            const dob = document.getElementById('dob');
            const doj = document.getElementById('doj');
            const emergencyContact = document.getElementById('emergencyContact');
            const employeeStatus = document.getElementById('employeeStatus');

            const globalErrorBanner = document.getElementById('globalErrorBanner');
            const globalErrorMessage = document.getElementById('globalErrorMessage');
            const globalSuccessBanner = document.getElementById('globalSuccessBanner');
            const globalSuccessMessage = document.getElementById('globalSuccessMessage');

            // Set max Date of Birth to today so future dates cannot be selected
            const todayStr = new Date().toISOString().split('T')[0];
            dob.setAttribute('max', todayStr);

            // ============================================================
            // 1. FETCH DESIGNATIONS FROM API
            // ============================================================
            async function fetchDesignations() {
                try {
                    const response = await fetch(`${cleanBase}/designations`, {
                        method: 'GET',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Accept': 'application/json'
                        }
                    });
                    const result = await response.json();
                    if (response.ok && result.data) {
                        designationSelect.innerHTML = '<option value="">Select Designation</option>';
                        result.data.forEach(item => {
                            const opt = document.createElement('option');
                            opt.value = item.id;
                            opt.textContent = item.designation_name;
                            designationSelect.appendChild(opt);
                        });
                    } else {
                        designationSelect.innerHTML = '<option value="">Failed to load designations</option>';
                    }
                } catch (err) {
                    console.error('Error fetching designations:', err);
                    designationSelect.innerHTML = '<option value="">Error connecting to server</option>';
                }
            }

            fetchDesignations();

            // ============================================================
            // 2. ERROR CLEARING & UTILITIES
            // ============================================================
            function clearBanners() {
                globalErrorBanner.classList.add('hidden');
                globalSuccessBanner.classList.add('hidden');
                document.querySelectorAll('.error-msg').forEach(el => {
                    el.textContent = '';
                    el.classList.add('hidden');
                });
                document.querySelectorAll('input, select, textarea').forEach(el => {
                    el.classList.remove('border-red-500', 'ring-red-200');
                });
            }

            function displayValidationError(errors) {
                let htmlList = '<strong>Please correct the following errors:</strong><ul class="list-disc ml-4 mt-1 space-y-0.5">';
                let firstElement = null;

                for (const [key, messages] of Object.entries(errors)) {
                    const msg = Array.isArray(messages) ? messages[0] : messages;
                    htmlList += `<li><span class="font-semibold">${key.replace(/_/g, ' ')}</span>: ${msg}</li>`;

                    const errEl = document.getElementById('err-' + key);
                    const inputEl = document.getElementById(key === 'designation_id' ? 'designation' : (key === 'pin_code' ? 'pinCode' : key));

                    if (errEl) {
                        errEl.textContent = msg;
                        errEl.classList.remove('hidden');
                    }
                    if (inputEl) {
                        inputEl.classList.add('border-red-500', 'ring-red-200');
                        if (!firstElement) firstElement = inputEl;
                    }
                }
                htmlList += '</ul>';
                globalErrorMessage.innerHTML = htmlList;
                globalErrorBanner.classList.remove('hidden');

                if (firstElement) {
                    firstElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstElement.focus();
                }
            }

            // ============================================================
            // 3. PROFILE PHOTO SIZE & TYPE VALIDATION (Max 2MB)
            // ============================================================
            profilePhoto.addEventListener('change', function() {
                const photoErrEl = document.getElementById('err-profile_photo');
                photoErrEl.classList.add('hidden');
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    
                    if (!validTypes.includes(file.type)) {
                        photoErrEl.textContent = 'Please upload a valid JPG or PNG image.';
                        photoErrEl.classList.remove('hidden');
                        this.value = '';
                        return;
                    }
                    
                    if (file.size > 2 * 1024 * 1024) { // 2MB limit
                        photoErrEl.textContent = 'Profile photo size must not exceed 2 MB.';
                        photoErrEl.classList.remove('hidden');
                        this.value = '';
                        return;
                    }
                }
            });

            // ============================================================
            // 4. SUBMISSION HANDLER (API POST /employees)
            // ============================================================
            async function submitEmployeeForm(isSaveAndAddNew = false) {
                clearBanners();

                // Client-side quick validations
                let localErrors = {};
                if (!employeeName.value.trim()) localErrors.employee_name = ['Employee name is required.'];
                const genderChecked = document.querySelector('input[name="gender"]:checked');
                if (!genderChecked) localErrors.gender = ['Gender selection is required.'];
                
                if (!dob.value) {
                    localErrors.date_of_birth = ['Date of birth is required.'];
                } else {
                    const dobDate = new Date(dob.value);
                    const todayDate = new Date();
                    todayDate.setHours(0, 0, 0, 0);
                    if (dobDate > todayDate) {
                        localErrors.date_of_birth = ['Date of birth cannot be in the future.'];
                    }
                }

                if (!mobileNumber.value.match(/^[0-9]{10}$/)) localErrors.mobile_number = ['Mobile number must be exactly 10 digits.'];
                if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) localErrors.email = ['Enter a valid email address.'];
                if (!address.value.trim()) localErrors.address = ['Residential address is required.'];
                if (!city.value.trim()) localErrors.city = ['City is required.'];
                if (!state.value.trim()) localErrors.state = ['State name is required.'];
                if (!pinCode.value.match(/^[0-9]{6}$/)) localErrors.pin_code = ['PIN code must be exactly 6 digits.'];
                if (!designationSelect.value) localErrors.designation_id = ['Designation selection is required.'];
                if (!doj.value) localErrors.date_of_joining = ['Date of joining is required.'];
                if (emergencyContact.value && !emergencyContact.value.match(/^[0-9]{10}$/)) {
                    localErrors.emergency_contact = ['Emergency contact must be 10 digits.'];
                }

                if (Object.keys(localErrors).length > 0) {
                    displayValidationError(localErrors);
                    return;
                }

                // Prepare FormData matching backend requirements
                const formData = new FormData();
                formData.append('employee_name', employeeName.value.trim());
                formData.append('gender', genderChecked.value);
                formData.append('date_of_birth', dob.value);
                formData.append('mobile_number', mobileNumber.value.trim());
                formData.append('email', email.value.trim().toLowerCase());
                formData.append('address', address.value.trim());
                formData.append('city', city.value.trim());
                formData.append('state', state.value.trim());
                formData.append('pin_code', pinCode.value.trim());
                formData.append('designation_id', designationSelect.value);
                formData.append('date_of_joining', doj.value);
                if (emergencyContact.value.trim()) {
                    formData.append('emergency_contact', emergencyContact.value.trim());
                }
                formData.append('employee_status', employeeStatus.value);

                if (profilePhoto.files && profilePhoto.files[0]) {
                    formData.append('profile_photo', profilePhoto.files[0]);
                }

                const activeBtn = isSaveAndAddNew ? document.getElementById('saveAddNewBtn') : document.getElementById('saveEmployeeBtn');
                const originalHTML = activeBtn.innerHTML;
                activeBtn.disabled = true;
                activeBtn.innerHTML = '<i class="fas fa-spinner fa-spin text-xs"></i> Saving...';

                try {
                    const response = await fetch(`${cleanBase}/employees`, {
                        method: 'POST',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.status === 201 || response.ok) {
                        globalSuccessMessage.innerHTML = `<strong>Success!</strong> Employee registered successfully with code: <span class="font-mono font-bold">${result.data?.employee_code || 'Generated'}</span>`;
                        globalSuccessBanner.classList.remove('hidden');
                        window.scrollTo({ top: 0, behavior: 'smooth' });

                        form.reset();
                        employeeStatus.value = 'Active';

                        if (isSaveAndAddNew) {
                            setTimeout(() => { globalSuccessBanner.classList.add('hidden'); }, 4000);
                        } else {
                            setTimeout(() => {
                                // Optional redirect back to list
                                // window.location.href = 'employee-list.php';
                            }, 2000);
                        }
                    } else if (response.status === 422 && result.errors) {
                        displayValidationError(result.errors);
                    } else {
                        globalErrorMessage.textContent = result.message || 'Failed to register employee. Please check inputs.';
                        globalErrorBanner.classList.remove('hidden');
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                } catch (err) {
                    console.error('Submission network error:', err);
                    globalErrorMessage.textContent = 'A network or server error occurred while saving employee details.';
                    globalErrorBanner.classList.remove('hidden');
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } finally {
                    activeBtn.disabled = false;
                    activeBtn.innerHTML = originalHTML;
                }
            }

            // Event Listeners for submission buttons
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                submitEmployeeForm(false);
            });

            // ============================================================
            // 5. RESET BUTTON HANDLER
            // ============================================================
            const resetBtn = document.getElementById('resetBtn');
            if (resetBtn) {
                resetBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to clear the entered details?')) {
                        form.reset();
                        employeeStatus.value = 'Active';
                        clearBanners();
                    }
                });
            }

            // ============================================================
            // 6. BACK TO LIST BUTTON HANDLER
            // ============================================================
            const backToListBtn = document.getElementById('backToListBtn');
            if (backToListBtn) {
                backToListBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to go back? Unsaved changes will be lost.')) {
                        if (window.history.length > 1) {
                            window.history.back();
                        } else {
                            window.location.href = 'employee-list.php';
                        }
                    }
                });
            }

        })();
    </script>

</body>

</html>