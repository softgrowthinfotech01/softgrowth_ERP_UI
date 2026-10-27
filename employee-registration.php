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
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Employee ID <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-hashtag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="employeeId" readonly
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed focus:outline-none font-mono font-semibold">
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
                    </div>

                    <!-- Gender -->
                    <div class="md:col-span-2">
                        <label class="block text-[11px] font-bold text-gray-700 mb-1.5">Gender <span class="text-red-500">*</span></label>
                        <div class="flex gap-4">
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
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Birth <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="date" id="dob"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                    </div>

                    <!-- Profile Photo -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Profile Photo <span class="text-[10px] font-normal text-gray-400">(Optional, JPG/PNG max 2MB)</span></label>
                        <div class="relative">
                            <input type="file" id="profilePhoto" accept="image/jpeg, image/png"
                                class="w-full px-3 py-1.5 text-[11px] rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm file:mr-3 file:py-1 file:px-2 file:rounded file:border-0 file:text-[10px] file:font-semibold file:bg-orange-100 file:text-orange-700 hover:file:bg-orange-200">
                        </div>
                        <p id="photoError" class="text-[10px] text-red-500 mt-1 hidden"></p>
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
                    </div>

                    <!-- Email ID -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Email ID <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="email" id="email" placeholder="Enter valid email address"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Address <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-map-pin absolute left-3 top-3 text-gray-400 text-xs"></i>
                            <textarea id="address" rows="2" placeholder="Enter complete residential address"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm"></textarea>
                        </div>
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">City <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-city absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="city" placeholder="Enter city"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                    </div>

                    <!-- State -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">State <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-map absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <select id="state" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                <option value="">Select State</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- PIN Code -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">PIN Code <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="pinCode" maxlength="6" placeholder="6-digit PIN"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                    </div>
                </div>

                <!-- ============================================================ -->
                <!-- SECTION 3: JOB DETAILS -->
                <!-- ============================================================ -->
              <!-- ===== JOB DETAILS SECTION ===== -->
<div class="bg-orange-50 px-4 py-2.5 border-y border-orange-100 flex items-center gap-2">
    <i class="fas fa-briefcase text-orange-500 text-xs"></i>
    <h3 class="font-bold text-gray-800 text-[13px]">Job Details</h3>
</div>

<div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-3">
    
    <!-- Designation -->
    <div>
        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Designation <span class="text-red-500">*</span></label>
        <div class="relative">
            <i class="fas fa-user-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
            <select id="designation" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                <option value="">Select Designation</option>
                <option value="Software Developer">Software Developer</option>
                <option value="Frontend Developer">Frontend Developer</option>
                <option value="Backend Developer">Backend Developer</option>
                <option value="UI/UX Designer">UI/UX Designer</option>
                <option value="Software Tester">Software Tester</option>
                <option value="Digital Marketing Executive">Digital Marketing Executive</option>
                <option value="HR Executive">HR Executive</option>
                <option value="Accountant">Accountant</option>
                <option value="Office Administrator">Office Administrator</option>
                <option value="Trainer">Trainer</option>
            </select>
            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
        </div>
    </div>

    <!-- Date of Joining -->
    <div>
        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Joining <span class="text-red-500">*</span></label>
        <div class="relative">
            <i class="fas fa-calendar-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
            <input type="date" id="doj"
                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
        </div>
    </div>
</div>

<!-- ===== CREATE NEW ROLE SECTION ===== -->
<div class="px-4 pb-5">
    
    <!-- Default State: Text + Button -->
    <div id="createRoleDefault" class="flex flex-col sm:flex-row items-center justify-between gap-3">
        <span class="text-sm text-gray-500">Can't find the required role?</span>
        <button type="button" onclick="toggleCreateRole()" 
                class="w-full sm:w-auto px-4 py-2 bg-blue-50 text-blue-600 rounded-lg border border-blue-100 hover:bg-blue-100 hover:border-blue-200 transition-all duration-200 flex items-center justify-center gap-1.5 text-sm font-semibold shadow-sm">
            <i class="fas fa-plus text-xs"></i>
            Create New Designation 
        </button>
    </div>

    <!-- Expanded State: Input Form (Hidden by default) -->
    <div id="createRoleForm" class="hidden mt-3 bg-orange-50/50 border border-orange-100 rounded-xl p-4 transition-all duration-300">
        <div class="flex flex-col sm:flex-row items-end gap-3">
            
            <!-- Input Field -->
            <div class="flex-1 w-full">
                <label class="block text-[11px] font-bold text-gray-700 mb-1">New Designation  <span class="text-red-500">*</span></label>
                <div class="relative">
                    <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input type="text" id="newRoleInput" placeholder="Enter new Designation " 
                           class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm bg-white">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button type="button" onclick="toggleCreateRole()" 
                        class="flex-1 sm:flex-none px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-semibold hover:bg-white transition-all duration-200">
                    Cancel
                </button>
                <button type="button" onclick="saveNewRole()" 
                        class="flex-1 sm:flex-none px-5 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg text-sm font-bold shadow-sm transition-all duration-200">
                    Save Designation 
                </button>
            </div>
            
        </div>
    </div>
</div>

<!-- ===== JAVASCRIPT LOGIC ===== -->
<script>
    // Toggle UI visibility
    function toggleCreateRole() {
        const defaultState = document.getElementById('createRoleDefault');
        const formState = document.getElementById('createRoleForm');
        const input = document.getElementById('newRoleInput');

        if (formState.classList.contains('hidden')) {
            // Open form
            defaultState.classList.add('hidden');
            formState.classList.remove('hidden');
            input.focus();
        } else {
            // Close form
            formState.classList.add('hidden');
            defaultState.classList.remove('hidden');
            input.value = ''; // clear input
        }
    }

    // Save the new role
    function saveNewRole() {
        const input = document.getElementById('newRoleInput');
        const newRole = input.value.trim();
        const select = document.getElementById('designation');

        if (newRole === "") {
            alert("Please enter a role name.");
            input.focus();
            return;
        }

        // Check if it already exists
        let exists = false;
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].value.toLowerCase() === newRole.toLowerCase()) {
                exists = true;
                break;
            }
        }

        if (exists) {
            alert("This role already exists in the list!");
            select.value = newRole; // Auto-select it
            toggleCreateRole(); // Close form
            return;
        }

        // Create new option and append
        const newOption = document.createElement('option');
        newOption.value = newRole;
        newOption.text = newRole;
        select.appendChild(newOption);
        
        // Select the newly added option
        select.value = newRole;
        
        // Close form and reset
        toggleCreateRole();
    }
</script>

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
                            <i class="fas fa-phone-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="tel" id="emergencyContact" maxlength="10" placeholder="Enter 10-digit number"
                                class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                    </div>

                    <!-- Employee Status -->
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
                        <button type="button" id="saveAddNewBtn"
                            class="w-full sm:w-auto px-4 py-2 bg-orange-100 text-orange-700 font-semibold rounded-lg hover:bg-orange-200 transition text-[12px] shadow-sm flex items-center justify-center gap-2">
                            <i class="fas fa-plus-circle text-[10px]"></i> Save &amp; Add New
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
    <!-- SCRIPT -->
    <!-- ============================================================ -->
    <script>
        (function() {
            // ============================================================
            // AUTO-GENERATE EMPLOYEE ID
            // ============================================================
            function generateEmployeeID() {
                // In a real app, this would come from the backend to ensure uniqueness.
                // We'll generate a dummy sequential one.
                const randomNum = Math.floor(Math.random() * 9000) + 1000;
                return 'EMP' + randomNum;
            }

            const employeeIdInput = document.getElementById('employeeId');
            
            function resetFormWithNewId() {
                employeeIdInput.value = generateEmployeeID();
            }

            // Set initial ID
            resetFormWithNewId();

            // ============================================================
            // DOM REFS
            // ============================================================
            const form = document.getElementById('employeeForm');
            const employeeName = document.getElementById('employeeName');
            const profilePhoto = document.getElementById('profilePhoto');
            const photoError = document.getElementById('photoError');
            const mobileNumber = document.getElementById('mobileNumber');
            const email = document.getElementById('email');
            const address = document.getElementById('address');
            const city = document.getElementById('city');
            const state = document.getElementById('state');
            const pinCode = document.getElementById('pinCode');
            const designation = document.getElementById('designation');
            const dob = document.getElementById('dob');
            const doj = document.getElementById('doj');
            const emergencyContact = document.getElementById('emergencyContact');
            const employeeStatus = document.getElementById('employeeStatus');

            const resetBtn = document.getElementById('resetBtn');
            const saveAddNewBtn = document.getElementById('saveAddNewBtn');
            const backToListBtn = document.getElementById('backToListBtn');

            // ============================================================
            // PHOTO VALIDATION
            // ============================================================
            profilePhoto.addEventListener('change', function() {
                photoError.classList.add('hidden');
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    const validTypes = ['image/jpeg', 'image/png'];
                    
                    if (!validTypes.includes(file.type)) {
                        photoError.textContent = 'Please upload a JPG or PNG file.';
                        photoError.classList.remove('hidden');
                        this.value = ''; // Clear input
                        return;
                    }
                    
                    if (file.size > 2 * 1024 * 1024) { // 2MB in bytes
                        photoError.textContent = 'Profile photo must not exceed 2 MB.';
                        photoError.classList.remove('hidden');
                        this.value = ''; // Clear input
                        return;
                    }
                }
            });

            // ============================================================
            // VALIDATION FUNCTION
            // ============================================================
            function validateForm() {
                // Clear previous error borders
                const inputs = form.querySelectorAll('input, select, textarea');
                inputs.forEach(input => {
                    input.classList.remove('border-red-500', 'ring-red-200');
                });

                let isValid = true;

                // 1. Employee Name
                if (!employeeName.value.trim()) {
                    employeeName.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 2. Gender
                const genderSelected = document.querySelector('input[name="gender"]:checked');
                if (!genderSelected) {
                    // Highlight the gender radio group
                    document.querySelectorAll('input[name="gender"]').forEach(radio => {
                        radio.parentElement.classList.add('text-red-500');
                    });
                    isValid = false;
                } else {
                    document.querySelectorAll('input[name="gender"]').forEach(radio => {
                        radio.parentElement.classList.remove('text-red-500');
                    });
                }

                // 3. Date of Birth
                if (!dob.value) {
                    dob.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                } else {
                    const dobDate = new Date(dob.value);
                    const today = new Date();
                    today.setHours(0,0,0,0);
                    if (dobDate >= today) {
                        alert('Date of Birth cannot be today or in the future.');
                        dob.classList.add('border-red-500', 'ring-red-200');
                        isValid = false;
                    }
                }

                // 4. Mobile Number
                if (!mobileNumber.value.match(/^\d{10}$/)) {
                    mobileNumber.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 5. Email
                if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                    email.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 6. Address
                if (!address.value.trim()) {
                    address.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 7. City
                if (!city.value.trim()) {
                    city.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 8. State
                if (!state.value) {
                    state.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 9. PIN Code
                if (!pinCode.value.match(/^\d{6}$/)) {
                    pinCode.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 10. Designation
                if (!designation.value) {
                    designation.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 11. Date of Joining
                if (!doj.value) {
                    doj.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                // 12. Emergency Contact (Optional, but if filled, must be 10 digits)
                if (emergencyContact.value && !emergencyContact.value.match(/^\d{10}$/)) {
                    emergencyContact.classList.add('border-red-500', 'ring-red-200');
                    isValid = false;
                }

                if (!isValid) {
                    // Scroll to the first error
                    const firstError = form.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                    alert('Please fill in all mandatory fields correctly.');
                    return false;
                }

                return true;
            }

            // ============================================================
            // SUBMIT HANDLER
            // ============================================================
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (validateForm()) {
                    // Simulate API Call
                    const saveBtn = document.getElementById('saveEmployeeBtn');
                    saveBtn.disabled = true;
                    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin text-[10px]"></i> Saving...';

                    setTimeout(() => {
                        alert('Employee registered successfully.');
                        saveBtn.disabled = false;
                        saveBtn.innerHTML = '<i class="fas fa-save text-[10px]"></i> Save Employee';
                        
                        // Redirect to Employee List (simulate)
                        console.log('Redirecting to employee list...');
                        // window.location.href = 'employee-list.php';
                    }, 1000);
                }
            });

            // ============================================================
            // SAVE & ADD NEW
            // ============================================================
            saveAddNewBtn.addEventListener('click', function() {
                if (validateForm()) {
                    const originalText = saveAddNewBtn.innerHTML;
                    saveAddNewBtn.disabled = true;
                    saveAddNewBtn.innerHTML = '<i class="fas fa-spinner fa-spin text-[10px]"></i> Saving...';

                    setTimeout(() => {
                        alert('Employee registered successfully. Ready for next entry.');
                        
                        // Reset form
                        form.reset();
                        
                        // Reset default values
                        employeeStatus.value = 'Active';
                        
                        // Clear error highlights
                        document.querySelectorAll('input, select, textarea').forEach(el => {
                            el.classList.remove('border-red-500', 'ring-red-200');
                        });
                        document.querySelectorAll('input[name="gender"]').forEach(radio => {
                            radio.parentElement.classList.remove('text-red-500');
                        });

                        // Generate new ID
                        resetFormWithNewId();
                        
                        saveAddNewBtn.disabled = false;
                        saveAddNewBtn.innerHTML = originalText;

                        // Scroll to top
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        
                    }, 1000);
                }
            });

            // ============================================================
            // RESET BUTTON
            // ============================================================
            resetBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to clear the entered details?')) {
                    form.reset();
                    employeeStatus.value = 'Active';
                    resetFormWithNewId();
                    
                    // Clear errors
                    document.querySelectorAll('input, select, textarea').forEach(el => {
                        el.classList.remove('border-red-500', 'ring-red-200');
                    });
                    document.querySelectorAll('input[name="gender"]').forEach(radio => {
                        radio.parentElement.classList.remove('text-red-500');
                    });
                    photoError.classList.add('hidden');
                }
            });

            // ============================================================
            // BACK TO LIST
            // ============================================================
            backToListBtn.addEventListener('click', function() {
                // In a real app: window.location.href = 'employee-list.php';
                alert('Navigating back to Employee List...');
            });

        })();
    </script>

</body>

</html>