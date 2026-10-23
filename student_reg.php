<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Registration - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <!-- MAIN WRAPPER CENTERED -->
    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-8 mb-12 transition-all duration-200 flex flex-col items-center justify-center">

        <!-- CONTENT CONTAINER -->
        <div class="w-full max-w-5xl">

            <!-- Global Error Banner -->
            <div id="globalErrorBanner" class="hidden mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                <span id="globalErrorMessage">Please correct the highlighted fields before proceeding.</span>
            </div>

            <!-- ============================================================ -->
            <!-- FORM VIEW -->
            <!-- ============================================================ -->
            <div id="formView">
                <form id="studentRegistrationForm" enctype="multipart/form-data">

                    <!-- SECTION 1: PERSONAL INFORMATION -->
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                        <button type="button" class="w-full flex items-center justify-between px-4 py-3 bg-orange-50 hover:bg-orange-100 transition-colors toggle-section" data-target="personal-body">
                            <div class="flex items-center gap-2.5">
                                <span class="w-8 h-8 rounded-lg bg-orange-500 text-white flex items-center justify-center text-xs shadow-sm">
                                    <i class="fas fa-user"></i>
                                </span>
                                <h2 class="text-base font-bold text-gray-900">Personal Information</h2>
                            </div>
                            <i class="fas fa-chevron-up text-orange-500 text-xs transition-transform duration-300 chevron-icon"></i>
                        </button>

                        <div id="personal-body" class="section-body p-4 transition-all duration-300">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Registration ID <span class="text-gray-400 font-normal">(Optional)</span></label>
                                    <div class="relative">
                                        <i class="fas fa-id-badge absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="registration_id" readonly placeholder="Leave blank to auto-generate" class="bg-gray-100 w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-registration_id"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">APAAR ID / ABC ID <span class="text-gray-400 font-normal">(Optional, 12 digits)</span></label>
                                    <div class="relative">
                                        <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="abc_id" maxlength="12" placeholder="Enter 12-digit APAAR/ABC ID" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-abc_id"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Full Name <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="student_name" placeholder="Enter student name" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-student_name"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Course / Class <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-graduation-cap absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs z-10"></i>
                                        <select id="course" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                            <option value="">Select course / class</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-course"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Phone Number <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="student_phone" maxlength="10" placeholder="10-digit mobile number" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-student_phone"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Parent / Guardian Number <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-phone-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="parent_phone" maxlength="10" placeholder="10-digit parent mobile number" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-parent_phone"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Parent Name <span class="text-gray-400 font-normal">(Optional)</span></label>
                                    <div class="relative">
                                        <i class="fas fa-user-tie absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="parent_name" placeholder="Enter parent name" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-parent_name"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Aadhaar Number <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="aadhaar_number" maxlength="12" placeholder="12-digit Aadhaar Number" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-aadhaar_number"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Birth <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="date" id="date_of_birth" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-date_of_birth"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Gender <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-venus-mars absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <select id="gender" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                            <option value="">Select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-gender"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Blood Group <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-tint absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <select id="blood_group" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                            <option value="">Select blood group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-blood_group"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Place of Birth <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-globe absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="place_of_birth" placeholder="Enter place of birth" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-place_of_birth"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Caste <span class="text-gray-400 font-normal">(Optional)</span></label>
                                    <div class="relative">
                                        <i class="fas fa-users absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="caste" placeholder="Enter caste" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-caste"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Sub Caste <span class="text-gray-400 font-normal">(Optional)</span></label>
                                    <div class="relative">
                                        <i class="fas fa-user-friends absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="sub_caste" placeholder="Enter sub caste" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-sub_caste"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: ACADEMIC INFORMATION -->
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                        <button type="button" class="w-full flex items-center justify-between px-4 py-3 bg-orange-50 hover:bg-orange-100 transition-colors toggle-section" data-target="academic-body">
                            <div class="flex items-center gap-2.5">
                                <span class="w-8 h-8 rounded-lg bg-orange-500 text-white flex items-center justify-center text-xs shadow-sm">
                                    <i class="fas fa-book"></i>
                                </span>
                                <h2 class="text-base font-bold text-gray-900">Academic Information</h2>
                            </div>
                            <i class="fas fa-chevron-down text-orange-500 text-xs transition-transform duration-300 chevron-icon"></i>
                        </button>

                        <div id="academic-body" class="section-body p-4 transition-all duration-300 hidden">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Board <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-university absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <select id="board" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                            <option value="">Select board</option>
                                            <option value="CBSE">CBSE</option>
                                            <option value="ICSE">ICSE</option>
                                            <option value="State Board">State Board</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-board"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Previous Class <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-history absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="previous_class" placeholder="Enter previous class" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-previous_class"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Batch <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-calendar absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="student_batch" placeholder="e.g. 2026 or 2025-26" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-student_batch"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Admission Date <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-calendar-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="date" id="admission_date" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-admission_date"></p>
                                </div>

                                <!-- Course Fees & Discount Amount side-by-side -->
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Course Fees <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-rupee-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="number" step="0.01" id="full_fees" placeholder="Enter course fees" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-full_fees"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Discount Amount <span class="text-gray-400 font-normal">(Optional)</span></label>
                                    <div class="relative">
                                        <i class="fas fa-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="number" step="0.01" id="discount_amount" placeholder="Enter discount amount" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-discount_amount"></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: ADDRESS INFORMATION -->
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                        <button type="button" class="w-full flex items-center justify-between px-4 py-3 bg-orange-50 hover:bg-orange-100 transition-colors toggle-section" data-target="address-body">
                            <div class="flex items-center gap-2.5">
                                <span class="w-8 h-8 rounded-lg bg-orange-500 text-white flex items-center justify-center text-xs shadow-sm">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <h2 class="text-base font-bold text-gray-900">Address Information</h2>
                            </div>
                            <i class="fas fa-chevron-down text-orange-500 text-xs transition-transform duration-300 chevron-icon"></i>
                        </button>

                        <div id="address-body" class="section-body p-4 transition-all duration-300 hidden">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="md:col-span-2">
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Full Address <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-map-pin absolute left-3 top-3 text-gray-400 text-xs"></i>
                                        <textarea rows="2" id="full_address" placeholder="Enter complete address" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm"></textarea>
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-full_address"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Tahsil <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-location-arrow absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="tahsil" placeholder="Enter tahsil" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-tahsil"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">District <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-city absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="district" placeholder="Enter district" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-district"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">State <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-flag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="state" placeholder="Enter state" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-state"></p>
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Pincode <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <i class="fas fa-map-marked-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                        <input type="text" id="pincode" maxlength="6" placeholder="6-digit pincode" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    </div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-pincode"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 4: DOCUMENT UPLOADS -->
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                        <button type="button" class="w-full flex items-center justify-between px-4 py-3 bg-orange-50 hover:bg-orange-100 transition-colors toggle-section" data-target="documents-body">
                            <div class="flex items-center gap-2.5">
                                <span class="w-8 h-8 rounded-lg bg-orange-500 text-white flex items-center justify-center text-xs shadow-sm">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </span>
                                <h2 class="text-base font-bold text-gray-900">Document Uploads</h2>
                            </div>
                            <i class="fas fa-chevron-down text-orange-500 text-xs transition-transform duration-300 chevron-icon"></i>
                        </button>

                        <div id="documents-body" class="section-body p-4 transition-all duration-300 hidden">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                                <!-- 1. Passport Photo (Required) -->
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                        <i class="fas fa-camera text-orange-500 mr-1"></i> Passport Photo <span class="text-red-500">*</span>
                                    </label>
                                    <label class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-orange-50 hover:border-orange-400 transition">
                                        <div class="flex flex-col items-center justify-center pt-2 pb-2">
                                            <i class="fas fa-cloud-upload-alt text-gray-400 text-lg mb-1"></i>
                                            <p class="text-[10px] text-gray-500"><span class="font-semibold text-orange-500">Upload</span> Passport Photo</p>
                                            <p class="text-[9px] text-gray-400">(JPG / PNG - Max 2MB)</p>
                                        </div>
                                        <input type="file" class="hidden" id="passport_photo" accept="image/jpeg,image/png,image/jpg" />
                                    </label>
                                    <p id="passport_photo_name" class="text-[10px] text-green-600 mt-0.5 hidden"></p>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-passport_photo"></p>
                                </div>

                                <!-- 2. Aadhaar Card (Optional) -->
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                        <i class="fas fa-id-card text-orange-500 mr-1"></i> Aadhaar Card <span class="text-gray-400 font-normal">(Optional)</span>
                                    </label>
                                    <label class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-orange-50 hover:border-orange-400 transition">
                                        <div class="flex flex-col items-center justify-center pt-2 pb-2">
                                            <i class="fas fa-cloud-upload-alt text-gray-400 text-lg mb-1"></i>
                                            <p class="text-[10px] text-gray-500"><span class="font-semibold text-orange-500">Upload</span> Aadhaar Card</p>
                                            <p class="text-[9px] text-gray-400">(PDF / JPG / PNG)</p>
                                        </div>
                                        <input type="file" class="hidden" id="aadhar_card" accept="image/*,application/pdf" />
                                    </label>
                                    <p id="aadhar_card_name" class="text-[10px] text-green-600 mt-0.5 hidden"></p>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-aadhar_card"></p>
                                </div>

                                <!-- 3. Other Documents (Multiple, Optional) -->
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                        <i class="fas fa-folder-open text-orange-500 mr-1"></i> Other Documents <span class="text-gray-400 font-normal">(Multiple, Optional)</span>
                                        <span id="other_documents_count" class="ml-1 text-[9px] font-semibold text-orange-500"></span>
                                    </label>

                                    <label class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-orange-50 hover:border-orange-400 transition">
                                        <div class="flex flex-col items-center justify-center pt-2 pb-2">
                                            <i class="fas fa-cloud-upload-alt text-gray-400 text-lg mb-1"></i>
                                            <p class="text-[10px] text-gray-500">
                                                <span class="font-semibold text-orange-500">Upload</span> Other Documents
                                            </p>
                                            <p class="text-[9px] text-gray-400">(PDF / JPG / PNG - Multiple)</p>
                                        </div>
                                        <input type="file" class="hidden" id="other_documents" accept="image/*,application/pdf" multiple />
                                    </label>

                                    <div id="other_documents_list" class="mt-1.5 space-y-1"></div>
                                    <p class="error-msg text-red-500 text-[10px] mt-0.5 hidden" id="err-other_documents"></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS: Back | Next -->
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mt-5">
                        <button type="button" id="backBtn" class="w-full sm:w-auto px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-sm shadow-sm flex items-center justify-center gap-2">
                            <i class="fas fa-arrow-left text-xs"></i> Back
                        </button>

                        <button type="button" id="nextBtn" class="w-full sm:w-auto px-6 py-2.5 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center justify-center gap-2">
                            Review & Preview <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>

                </form>
            </div>

            <!-- ============================================================ -->
            <!-- PREVIEW VIEW -->
            <!-- ============================================================ -->
            <div id="previewView" class="hidden">

                <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                    <div class="bg-orange-500 text-white px-4 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <span class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
                                <i class="fas fa-eye text-sm"></i>
                            </span>
                            <div>
                                <h2 class="text-base font-bold leading-tight">Preview - Student Registration</h2>
                                <p class="text-[10px] text-orange-100">Please review all details before final submission.</p>
                            </div>
                        </div>
                        <button type="button" id="editBtn" class="text-[11px] bg-white/20 hover:bg-white/30 px-3 py-1.5 rounded-md font-semibold transition flex items-center gap-1.5">
                            <i class="fas fa-edit text-[10px]"></i> Edit
                        </button>
                    </div>
                </div>

                <div id="previewContent" class="space-y-4"></div>

                <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mt-5">
                    <button type="button" id="backToFormBtn" class="w-full sm:w-auto px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-sm shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left text-xs"></i> Back to Edit
                    </button>

                    <button type="button" id="submitBtn" data-permission="student-record.add" class="w-full sm:w-auto px-6 py-2.5 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane text-xs"></i> Submit Registration
                    </button>
                </div>

            </div>

        </div>

    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

<script>
    (function() {
        const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');
        if (!token) {
            alert('Authentication token missing. Please log in again.');
            window.location.href = 'login.php';
            return;
        }

        const baseUrl = typeof url !== 'undefined' ? url : '';
        const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;

        // ============================================================
        // FETCH CLASS MASTERS INTO DROPDOWN
        // ============================================================
        async function fetchClassMasters() {
            const courseSelect = document.getElementById('course');
            if (!courseSelect) return;

            try {
                const response = await fetch(`${cleanBase}/class-masters`, {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();
                if (response.ok && result.data) {
                    // Clear existing options except default placeholder
                    courseSelect.innerHTML = '<option value="">Select course / class</option>';
                    result.data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.class_name; // Send the class name string or item.id depending on your backend
                        option.textContent = item.class_name;
                        courseSelect.appendChild(option);
                    });
                }
            } catch (err) {
                console.error('Failed to fetch class masters:', err);
            }
        }

        // Run fetch on load
        fetchClassMasters();

        // ============================================================
        // 1. ACCORDION
        // ============================================================
        const toggleButtons = document.querySelectorAll('.toggle-section');

        function closeAllSections() {
            toggleButtons.forEach(btn => {
                const targetId = btn.getAttribute('data-target');
                const target = document.getElementById(targetId);
                const chevron = btn.querySelector('.chevron-icon');
                if (target) target.classList.add('hidden');
                if (chevron) {
                    chevron.classList.remove('fa-chevron-up');
                    chevron.classList.add('fa-chevron-down');
                }
            });
        }

        function openSection(button) {
            const targetId = button.getAttribute('data-target');
            const target = document.getElementById(targetId);
            const chevron = button.querySelector('.chevron-icon');
            if (target) target.classList.remove('hidden');
            if (chevron) {
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-up');
            }
        }

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const target = document.getElementById(targetId);
                if (!target) return;
                const isCurrentlyOpen = !target.classList.contains('hidden');
                closeAllSections();
                if (!isCurrentlyOpen) openSection(this);
            });
        });

        // ============================================================
        // 2. SINGLE FILE UPLOADS NAME DISPLAY
        // ============================================================
        const passportInput = document.getElementById('passport_photo');
        const passportLabel = document.getElementById('passport_photo_name');
        if (passportInput && passportLabel) {
            passportInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    passportLabel.textContent = '✓ ' + this.files[0].name;
                    passportLabel.classList.remove('hidden');
                } else {
                    passportLabel.classList.add('hidden');
                }
            });
        }

        const aadharInput = document.getElementById('aadhar_card');
        const aadharLabel = document.getElementById('aadhar_card_name');
        if (aadharInput && aadharLabel) {
            aadharInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    aadharLabel.textContent = '✓ ' + this.files[0].name;
                    aadharLabel.classList.remove('hidden');
                } else {
                    aadharLabel.classList.add('hidden');
                }
            });
        }

        // ============================================================
        // 3. OTHER DOCUMENTS — MULTIPLE UPLOADER
        // ============================================================
        const otherDocsInput = document.getElementById('other_documents');
        const otherDocsList = document.getElementById('other_documents_list');
        const otherDocsCount = document.getElementById('other_documents_count');

        let selectedOtherDocs = [];

        function renderOtherDocs() {
            otherDocsList.innerHTML = '';
            if (selectedOtherDocs.length === 0) {
                otherDocsCount.textContent = '';
                return;
            }
            otherDocsCount.textContent = `(${selectedOtherDocs.length} selected)`;

            selectedOtherDocs.forEach((file, index) => {
                const chip = document.createElement('div');
                chip.className = 'flex items-center justify-between gap-2 bg-orange-50 border border-orange-200 rounded-md px-2 py-1 text-[10px]';
                const sizeKB = (file.size / 1024).toFixed(0);
                chip.innerHTML = `
                    <div class="flex items-center gap-1.5 min-w-0 flex-1">
                        <i class="fas fa-file-alt text-orange-500 text-[10px] flex-shrink-0"></i>
                        <span class="text-gray-700 truncate">${file.name}</span>
                        <span class="text-gray-400 text-[9px] flex-shrink-0">(${sizeKB} KB)</span>
                    </div>
                    <button type="button" data-index="${index}" class="remove-other-doc text-red-500 hover:text-red-700 hover:bg-red-50 rounded w-5 h-5 flex items-center justify-center flex-shrink-0 transition">
                        <i class="fas fa-times text-[9px]"></i>
                    </button>
                `;
                otherDocsList.appendChild(chip);
            });

            otherDocsList.querySelectorAll('.remove-other-doc').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const idx = parseInt(this.getAttribute('data-index'), 10);
                    selectedOtherDocs.splice(idx, 1);
                    renderOtherDocs();
                });
            });
        }

        if (otherDocsInput && otherDocsList) {
            otherDocsInput.addEventListener('change', function() {
                const newFiles = Array.from(this.files);
                newFiles.forEach(newFile => {
                    const isDuplicate = selectedOtherDocs.some(
                        f => f.name === newFile.name && f.size === newFile.size
                    );
                    if (!isDuplicate) selectedOtherDocs.push(newFile);
                });
                renderOtherDocs();
                this.value = '';
            });
        }

        // ============================================================
        // 4. VIEW MANAGEMENT
        // ============================================================
        const formView = document.getElementById('formView');
        const previewView = document.getElementById('previewView');
        const nextBtn = document.getElementById('nextBtn');
        const backBtn = document.getElementById('backBtn');
        const backToFormBtn = document.getElementById('backToFormBtn');
        const editBtn = document.getElementById('editBtn');
        const submitBtn = document.getElementById('submitBtn');

        function showPreview() {
            formView.classList.add('hidden');
            previewView.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function showForm() {
            previewView.classList.add('hidden');
            formView.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function clearErrors() {
            document.querySelectorAll('.error-msg').forEach(el => {
                el.textContent = '';
                el.classList.add('hidden');
            });
            document.querySelectorAll('input, select, textarea').forEach(el => {
                el.classList.remove('border-red-500', 'bg-red-50');
            });
            const banner = document.getElementById('globalErrorBanner');
            if (banner) banner.classList.add('hidden');
        }

        function getValue(id) {
            const el = document.getElementById(id);
            if (!el) return '—';
            if (el.tagName === 'SELECT') {
                return el.value ? (el.options[el.selectedIndex]?.text || el.value) : '—';
            }
            return el.value ? el.value : '—';
        }

        function row(label, value) {
            return `<div class="flex border-b border-gray-100 py-1.5">
                <span class="w-2/5 text-gray-500 font-medium text-[12px]">${label}</span>
                <span class="w-3/5 text-gray-800 text-[12px]">${value || '—'}</span>
            </div>`;
        }

        function section(title, icon, rowsHtml) {
            return `<div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                <div class="bg-orange-50 px-4 py-2.5 border-b border-orange-100 flex items-center gap-2">
                    <i class="fas ${icon} text-orange-500 text-xs"></i>
                    <h3 class="font-bold text-gray-800 text-[13px]">${title}</h3>
                </div>
                <div class="px-4 py-1">${rowsHtml}</div>
            </div>`;
        }

        function setError(fieldId, message) {
            const el = document.getElementById(fieldId);
            const errEl = document.getElementById('err-' + fieldId);
            if (errEl) {
                errEl.textContent = message;
                errEl.classList.remove('hidden');
            }
            if (el) {
                el.classList.add('border-red-500', 'bg-red-50');
            }
        }

        // ============================================================
        // 5. CLIENT-SIDE VALIDATION
        // ============================================================
        function validateForm() {
            clearErrors();
            let isValid = true;
            let firstInvalidField = null;

            const requiredFields = [
                'student_name', 'course', 'student_phone', 'parent_phone',
                'aadhaar_number', 'date_of_birth', 'gender', 'blood_group',
                'place_of_birth', 'board', 'previous_class', 'student_batch',
                'full_fees', 'admission_date', 'full_address', 'tahsil',
                'district', 'state', 'pincode'
            ];

            requiredFields.forEach(fieldId => {
                const el = document.getElementById(fieldId);
                if (el && (!el.value || el.value.trim() === '')) {
                    isValid = false;
                    setError(fieldId, 'This field is required.');
                    if (!firstInvalidField) firstInvalidField = el;
                }
            });

            // Student Phone (10 digits)
            const studentPhoneEl = document.getElementById('student_phone');
            if (studentPhoneEl && studentPhoneEl.value.trim() !== '') {
                const cleanVal = studentPhoneEl.value.trim();
                if (cleanVal.length !== 10 || isNaN(cleanVal)) {
                    isValid = false;
                    setError('student_phone', 'Phone number must be exactly 10 digits.');
                    if (!firstInvalidField) firstInvalidField = studentPhoneEl;
                }
            }

            // Parent Phone (10 digits)
            const parentPhoneEl = document.getElementById('parent_phone');
            if (parentPhoneEl && parentPhoneEl.value.trim() !== '') {
                const cleanVal = parentPhoneEl.value.trim();
                if (cleanVal.length !== 10 || isNaN(cleanVal)) {
                    isValid = false;
                    setError('parent_phone', 'Parent phone number must be exactly 10 digits.');
                    if (!firstInvalidField) firstInvalidField = parentPhoneEl;
                }
            }

            // Aadhaar Number (12 digits)
            const aadhaarEl = document.getElementById('aadhaar_number');
            if (aadhaarEl && aadhaarEl.value.trim() !== '') {
                const cleanVal = aadhaarEl.value.trim();
                if (cleanVal.length !== 12 || isNaN(cleanVal)) {
                    isValid = false;
                    setError('aadhaar_number', 'Aadhaar number must be exactly 12 digits.');
                    if (!firstInvalidField) firstInvalidField = aadhaarEl;
                }
            }

            // APAAR / ABC ID (Optional, 12 digits if provided)
            const abcEl = document.getElementById('abc_id');
            if (abcEl && abcEl.value.trim() !== '') {
                const cleanVal = abcEl.value.trim();
                if (cleanVal.length !== 12 || isNaN(cleanVal)) {
                    isValid = false;
                    setError('abc_id', 'APAAR/ABC ID must be exactly 12 digits.');
                    if (!firstInvalidField) firstInvalidField = abcEl;
                }
            }

            // Passport Photo (Required)
            const passportPhoto = document.getElementById('passport_photo');
            const passportInputLabel = passportPhoto ? passportPhoto.closest('div') : null;
            if (passportPhoto && (!passportPhoto.files || passportPhoto.files.length === 0)) {
                isValid = false;
                const errEl = document.getElementById('err-passport_photo');
                if (errEl) {
                    errEl.textContent = 'Passport photo is required.';
                    errEl.classList.remove('hidden');
                }
                if (!firstInvalidField && passportInputLabel) firstInvalidField = passportInputLabel;
            }

            if (!isValid) {
                const banner = document.getElementById('globalErrorBanner');
                if (banner) {
                    document.getElementById('globalErrorMessage').textContent = 'Please correct the errors and fill in all required fields marked with * before previewing.';
                    banner.classList.remove('hidden');
                }
                if (firstInvalidField) {
                    let sectionBody = firstInvalidField.closest('.section-body');
                    if (sectionBody && sectionBody.classList.contains('hidden')) {
                        sectionBody.classList.remove('hidden');
                        const toggleBtn = document.querySelector(`[data-target="${sectionBody.id}"]`);
                        if (toggleBtn) {
                            const chevron = toggleBtn.querySelector('.chevron-icon');
                            if (chevron) {
                                chevron.classList.remove('fa-chevron-down');
                                chevron.classList.add('fa-chevron-up');
                            }
                        }
                    }
                    firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    if (firstInvalidField.focus) firstInvalidField.focus();
                }
            }

            return isValid;
        }

        function buildPreview() {
            const personalRows =
                row('Registration ID', getValue('registration_id') || 'Auto-generated') +
                row('APAAR / ABC ID', getValue('abc_id')) +
                row('Full Name', getValue('student_name')) +
                row('Course / Class', getValue('course')) +
                row('Phone Number', getValue('student_phone')) +
                row('Parent Phone', getValue('parent_phone')) +
                row('Parent Name', getValue('parent_name')) +
                row('Aadhaar Number', getValue('aadhaar_number')) +
                row('Date of Birth', getValue('date_of_birth')) +
                row('Gender', getValue('gender')) +
                row('Blood Group', getValue('blood_group')) +
                row('Place of Birth', getValue('place_of_birth')) +
                row('Caste', getValue('caste')) +
                row('Sub Caste', getValue('sub_caste'));

            const academicRows =
                row('Board', getValue('board')) +
                row('Previous Class', getValue('previous_class')) +
                row('Student Batch', getValue('student_batch')) +
                row('Course Fees', getValue('full_fees')) +
                row('Discount Amount', getValue('discount_amount') || '0') +
                row('Admission Date', getValue('admission_date'));

            const addressRows =
                row('Full Address', getValue('full_address')) +
                row('Tahsil', getValue('tahsil')) +
                row('District', getValue('district')) +
                row('State', getValue('state')) +
                row('Pincode', getValue('pincode'));

            const passportFile = document.getElementById('passport_photo').files[0];
            const aadharFile = document.getElementById('aadhar_card').files[0];
            let otherNames = selectedOtherDocs.length > 0 ? selectedOtherDocs.map(f => f.name).join(', ') : 'None';

            const docRows =
                row('Passport Photo', passportFile ? passportFile.name : 'Not uploaded') +
                row('Aadhaar Card', aadharFile ? aadharFile.name : 'Not uploaded') +
                row('Other Documents', otherNames);

            document.getElementById('previewContent').innerHTML =
                section('Personal Information', 'fa-user', personalRows) +
                section('Academic Information', 'fa-book', academicRows) +
                section('Address Information', 'fa-map-marker-alt', addressRows) +
                section('Document Uploads', 'fa-cloud-upload-alt', docRows);
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (!validateForm()) return;
                buildPreview();
                showPreview();
            });
        }

        if (backToFormBtn) backToFormBtn.addEventListener('click', showForm);
        if (editBtn) editBtn.addEventListener('click', showForm);

        if (backBtn) {
            backBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to go back? Any unsaved changes will be lost.')) {
                    window.history.back();
                }
            });
        }

        // ============================================================
        // 6. SUBMIT BUTTON & API INTEGRATION
        // ============================================================
        let isSubmitting = false;

        if (submitBtn) {
            submitBtn.addEventListener('click', async function(e) {
                e.preventDefault();

                if (isSubmitting) return;

                clearErrors();

                isSubmitting = true;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Submitting...';

                const formData = new FormData();

                const fields = [
                    'student_name', 'registration_id', 'abc_id', 'course',
                    'student_phone', 'parent_phone', 'parent_name', 'aadhaar_number',
                    'date_of_birth', 'gender', 'blood_group', 'place_of_birth',
                    'caste', 'sub_caste', 'board', 'previous_class',
                    'student_batch', 'full_fees', 'discount_amount', 'admission_date',
                    'full_address', 'tahsil', 'district', 'state', 'pincode'
                ];

                fields.forEach(fieldId => {
                    const el = document.getElementById(fieldId);
                    if (el && el.value.trim() !== '') {
                        formData.append(fieldId, el.value.trim());
                    }
                });

                const passportPhoto = document.getElementById('passport_photo').files[0];
                if (passportPhoto) formData.append('passport_photo', passportPhoto);

                const aadharCard = document.getElementById('aadhar_card').files[0];
                if (aadharCard) formData.append('aadhar_card', aadharCard);

                selectedOtherDocs.forEach(file => {
                    formData.append('other_documents[]', file);
                });

                try {
                    const response = await fetch(`${cleanBase}/students`, {
                        method: 'POST',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok && result.success) {
                        const regId = result.registration_id || result.data?.registration_id || 'Generated';
                        
                        document.getElementById('studentRegistrationForm').reset();
                        selectedOtherDocs = [];
                        renderOtherDocs();
                        
                        const passportLabel = document.getElementById('passport_photo_name');
                        if (passportLabel) passportLabel.classList.add('hidden');
                        
                        const aadharLabel = document.getElementById('aadhar_card_name');
                        if (aadharLabel) aadharLabel.classList.add('hidden');

                        showForm();

                        const banner = document.getElementById('globalErrorBanner');
                        const errorMessageContainer = document.getElementById('globalErrorMessage');
                        if (banner && errorMessageContainer) {
                            banner.className = 'mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl text-sm flex items-center gap-3';
                            banner.querySelector('i').className = 'fas fa-check-circle text-green-500 text-lg';
                            errorMessageContainer.innerHTML = `<strong>Success!</strong> Student registered successfully. Registration ID: <span class="font-mono font-bold">${regId}</span>`;
                            banner.classList.remove('hidden');
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                        }
                    } else {
                        showForm();
                        
                        if (response.status === 422 && result.errors) {
                            const banner = document.getElementById('globalErrorBanner');
                            const errorMessageContainer = document.getElementById('globalErrorMessage');
                            
                            banner.className = 'mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-3';
                            banner.querySelector('i').className = 'fas fa-exclamation-circle text-red-500 text-lg';

                            let errorListHtml = '<strong>Please correct the following fields before proceeding:</strong><ul class="list-disc ml-5 mt-1 space-y-0.5">';
                            let firstInvalidField = null;

                            Object.keys(result.errors).forEach(key => {
                                let cleanKey = key.replace(/\.\d+\$/, '').replace('[]', '');
                                const errorMessage = result.errors[key][0];
                                
                                let readableFieldName = cleanKey.replace(/_/g, ' ');
                                readableFieldName = readableFieldName.charAt(0).toUpperCase() + readableFieldName.slice(1);

                                errorListHtml += `<li><span class="font-semibold">${readableFieldName}</span>: ${errorMessage}</li>`;

                                const errEl = document.getElementById('err-' + cleanKey);
                                const inputEl = document.getElementById(cleanKey);
                                
                                if (errEl) {
                                    errEl.textContent = errorMessage;
                                    errEl.classList.remove('hidden');
                                }
                                if (inputEl) {
                                    inputEl.classList.add('border-red-500', 'bg-red-50');
                                    if (!firstInvalidField) firstInvalidField = inputEl;
                                }
                            });

                            errorListHtml += '</ul>';
                            errorMessageContainer.innerHTML = errorListHtml;
                            banner.classList.remove('hidden');

                            if (firstInvalidField) {
                                let sectionBody = firstInvalidField.closest('.section-body');
                                if (sectionBody && sectionBody.classList.contains('hidden')) {
                                    sectionBody.classList.remove('hidden');
                                    const toggleBtn = document.querySelector(`[data-target="${sectionBody.id}"]`);
                                    if (toggleBtn) {
                                        const chevron = toggleBtn.querySelector('.chevron-icon');
                                        if (chevron) {
                                            chevron.classList.remove('fa-chevron-down');
                                            chevron.classList.add('fa-chevron-up');
                                        }
                                    }
                                }
                                firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                if (firstInvalidField.focus) firstInvalidField.focus();
                            }
                        } else {
                            alert(result.message || 'Failed to register student.');
                        }
                    }
                } catch (err) {
                    console.error('Submission error:', err);
                    showForm();
                    alert('Network or server error while submitting registration.');
                } finally {
                    isSubmitting = false;
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane text-xs"></i> Submit Registration';
                }
            });
        }

    })();
</script>
</body>

</html>