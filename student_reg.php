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

            <!-- ============================================================ -->
            <!-- FORM VIEW -->
            <!-- ============================================================ -->
            <div id="formView">

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
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Registration ID <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-id-badge absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="registration_id" value="REG-2025-0001" readonly class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed focus:outline-none">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">ABC ID <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="abc_id" placeholder="Enter Student ID" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Full Name <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="student_name" placeholder="Enter student name" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Class <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-graduation-cap absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="course" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select class</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="KG 1">KG 1</option>
                                        <option value="KG 2">KG 2</option>
                                        <option value="Class 1">Class 1</option>
                                        <option value="Class 2">Class 2</option>
                                        <option value="Class 3">Class 3</option>
                                        <option value="Class 4">Class 4</option>
                                        <option value="Class 5">Class 5</option>
                                        <option value="Class 6">Class 6</option>
                                        <option value="Class 7">Class 7</option>
                                        <option value="Class 8">Class 8</option>
                                        <option value="Class 9">Class 9</option>
                                        <option value="Class 10">Class 10</option>
                                        <option value="Class 11">Class 11</option>
                                        <option value="Class 12">Class 12</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Phone Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="student_phone" maxlength="10" placeholder="Enter student phone number" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Parent / Guardian Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-phone-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="parent_phone" maxlength="10" placeholder="Enter parent/guardian number" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Aadhaar Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="aadhaar" maxlength="12" placeholder="XXXX-XXXX-XXXX" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Birth <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="date" id="dob" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Sex <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-venus-mars absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="gender" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Previous Class <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-history absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="previous_class" placeholder="Enter previous class" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
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
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Registration ID <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-id-badge absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="registration_id_academic" value="REG-2025-0001" readonly class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed focus:outline-none">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Board <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-university absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="student_board" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select board</option>
                                        <option value="CBSE">CBSE</option>
                                        <option value="State">State</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BBA">BBA</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Course / Class Name <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-book-open absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="course_name" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select course / class name</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="KG 1">KG 1</option>
                                        <option value="KG 2">KG 2</option>
                                        <option value="Class 1">Class 1</option>
                                        <option value="Class 2">Class 2</option>
                                        <option value="Class 3">Class 3</option>
                                        <option value="Class 4">Class 4</option>
                                        <option value="Class 5">Class 5</option>
                                        <option value="Class 6">Class 6</option>
                                        <option value="Class 7">Class 7</option>
                                        <option value="Class 8">Class 8</option>
                                        <option value="Class 9">Class 9</option>
                                        <option value="Class 10">Class 10</option>
                                        <option value="Class 11">Class 11</option>
                                        <option value="Class 12">Class 12</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Course Fees <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-rupee-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="full_fees" placeholder="Enter course fees" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Registration <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-calendar-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="date" id="admission_date" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <!-- <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Batch <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-layer-group absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="student_batch" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select batch</option>
                                        <option value="2024-25">2024-25</option>
                                        <option value="2025-26">2025-26</option>
                                        <option value="2026-27">2026-27</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div> -->

                            <!-- <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Section <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-users absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="section" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select section</option>
                                        <option value="Section A">Section A</option>
                                        <option value="Section B">Section B</option>
                                        <option value="Section C">Section C</option>
                                        <option value="Section D">Section D</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div> -->

                            <!-- <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Previous Class <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-history absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="previous_class_academic" placeholder="Enter previous class" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div> -->
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
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Address <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-map-pin absolute left-3 top-3 text-gray-400 text-xs"></i>
                                    <textarea rows="2" id="full_address" placeholder="Enter complete address" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm"></textarea>
                                </div>
                            </div>
<!-- 
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Tahsil <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-location-arrow absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="tahsil" placeholder="Enter tahsil" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">District <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-city absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="district" placeholder="Enter district" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Place of Birth <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-globe absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="birth_place" placeholder="Enter place of birth" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
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
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Caste <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-users absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="caste" placeholder="Enter caste" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Sub Caste <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-user-friends absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="sub_caste" placeholder="Enter sub caste" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">APAAR ID <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-fingerprint absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="apaar_id" placeholder="Enter APAAR ID" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Parent Name <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-user-tie absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="parent_name" placeholder="Enter parent name" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- SECTION 4: DOCUMENT UPLOADS (OPTIONAL) -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                    <button type="button" class="w-full flex items-center justify-between px-4 py-3 bg-orange-50 hover:bg-orange-100 transition-colors toggle-section" data-target="documents-body">
                        <div class="flex items-center gap-2.5">
                            <span class="w-8 h-8 rounded-lg bg-orange-500 text-white flex items-center justify-center text-xs shadow-sm">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </span>
                            <h2 class="text-base font-bold text-gray-900">Document Uploads <span class="text-[10px] font-normal text-gray-500 ml-1">(Optional)</span></h2>
                        </div>
                        <i class="fas fa-chevron-down text-orange-500 text-xs transition-transform duration-300 chevron-icon"></i>
                    </button>

                    <div id="documents-body" class="section-body p-4 transition-all duration-300 hidden">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                    <i class="fas fa-id-card text-orange-500 mr-1"></i> Aadhaar Card <span class="text-red-500"></span>
                                </label>
                                <label class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-orange-50 hover:border-orange-400 transition">
                                    <div class="flex flex-col items-center justify-center pt-2 pb-2">
                                        <i class="fas fa-cloud-upload-alt text-gray-400 text-lg mb-1"></i>
                                        <p class="text-[10px] text-gray-500"><span class="font-semibold text-orange-500">Upload</span> Aadhaar Card</p>
                                        <p class="text-[9px] text-gray-400">(PDF / JPG / PNG)</p>
                                    </div>
                                    <input type="file" class="hidden" id="aadhaar_card" accept="image/*,application/pdf" />
                                </label>
                                <p id="aadhaar_card_name" class="text-[10px] text-green-600 mt-0.5 hidden"></p>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                    <i class="fas fa-camera text-orange-500 mr-1"></i> Passport Photo <span class="text-red-500"></span>
                                </label>
                                <label class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-orange-50 hover:border-orange-400 transition">
                                    <div class="flex flex-col items-center justify-center pt-2 pb-2">
                                        <i class="fas fa-cloud-upload-alt text-gray-400 text-lg mb-1"></i>
                                        <p class="text-[10px] text-gray-500"><span class="font-semibold text-orange-500">Upload</span> Passport Photo</p>
                                        <p class="text-[9px] text-gray-400">(JPG / PNG)</p>
                                    </div>
                                    <input type="file" class="hidden" id="passport_photo" accept="image/*" />
                                </label>
                                <p id="passport_photo_name" class="text-[10px] text-green-600 mt-0.5 hidden"></p>
                            </div>

                            <!-- Other Documents (MULTIPLE) -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                    <i class="fas fa-folder-open text-orange-500 mr-1"></i> Other Documents <span class="text-red-500"></span>
                                    <span class="text-[9px] font-normal text-gray-500">(Multiple)</span>
                                    <span id="other_documents_count" class="ml-1 text-[9px] font-semibold text-orange-500"></span>
                                </label>

                                <label id="other_documents_dropzone" class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-orange-50 hover:border-orange-400 transition">
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

                                <p class="text-[9px] text-gray-400 mt-1">
                                    <i class="fas fa-info-circle mr-0.5"></i> You can select multiple files. Each max 5MB.
                                </p>
                            </div>

                        </div>

                        <div class="flex items-center gap-2 mt-3 text-[10px] text-gray-500">
                            <i class="fas fa-info-circle text-orange-500"></i>
                            <span>Accepted formats: PDF, JPG, PNG | Max file size: 5MB per file</span>
                        </div>
                    </div>
                </div>

                <!-- ACTION BUTTONS: Back | Next -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mt-5">
                    <button type="button" id="backBtn" class="w-full sm:w-auto px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-sm shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left text-xs"></i> Back
                    </button>

                    <button type="button" id="nextBtn" class="w-full sm:w-auto px-6 py-2.5 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center justify-center gap-2">
                        Next <i class="fas fa-arrow-right text-xs"></i>
                    </button>
                </div>

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
                                <p class="text-[10px] text-orange-100">Please review all details before submitting.</p>
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

                    <button type="button" id="submitBtn" class="w-full sm:w-auto px-6 py-2.5 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane text-xs"></i> Submit Registration
                    </button>
                </div>

            </div>

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
            // 2. SINGLE FILE UPLOAD NAME DISPLAY
            // ============================================================
            const singleFiles = [
                { input: 'aadhaar_card', label: 'aadhaar_card_name' },
                { input: 'passport_photo', label: 'passport_photo_name' }
            ];

            singleFiles.forEach(item => {
                const input = document.getElementById(item.input);
                const label = document.getElementById(item.label);
                if (input && label) {
                    input.addEventListener('change', function() {
                        if (this.files && this.files[0]) {
                            label.textContent = '✓ ' + this.files[0].name;
                            label.classList.remove('hidden');
                        } else {
                            label.classList.add('hidden');
                        }
                    });
                }
            });

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
                        syncInputFiles();
                        renderOtherDocs();
                    });
                });
            }

            function syncInputFiles() {
                const dataTransfer = new DataTransfer();
                selectedOtherDocs.forEach(file => dataTransfer.items.add(file));
                otherDocsInput.files = dataTransfer.files;
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
                    syncInputFiles();
                    renderOtherDocs();
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

            // ============================================================
            // 5. BUILD PREVIEW
            // ============================================================
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

            function buildPreview() {
                const personalRows =
                    row('Registration ID', getValue('registration_id')) +
                    row('Student ID', getValue('abc_id')) +
                    row('Full Name', getValue('student_name')) +
                    row('Class', getValue('course')) +
                    row('Phone Number', getValue('student_phone')) +
                    row('Parent / Guardian Number', getValue('parent_phone')) +
                    row('Aadhaar Number', getValue('aadhaar')) +
                    row('Date of Birth', getValue('dob')) +
                    row('Sex', getValue('gender')) +
                    row('Previous Class', getValue('previous_class'));

                const academicRows =
                    row('Registration ID', getValue('registration_id_academic')) +
                    row('Board', getValue('student_board')) +
                    row('Course / Class Name', getValue('course_name')) +
                    row('Course Fees', getValue('full_fees')) +
                    row('Date of Registration', getValue('admission_date')) +
                    row('Student Batch', getValue('student_batch')) +
                    row('Section', getValue('section')) +
                    row('Previous Class', getValue('previous_class_academic'));

                const addressRows =
                    row('Address', getValue('full_address')) +
                    row('Tahsil', getValue('tahsil')) +
                    row('District', getValue('district')) +
                    row('Place of Birth', getValue('birth_place')) +
                    row('Blood Group', getValue('blood_group')) +
                    row('Caste', getValue('caste')) +
                    row('Sub Caste', getValue('sub_caste')) +
                    row('APAAR ID', getValue('apaar_id')) +
                    row('Parent Name', getValue('parent_name'));

                const aadhaarFile = document.getElementById('aadhaar_card').files[0];
                const photoFile = document.getElementById('passport_photo').files[0];

                let otherList = '—';
                if (selectedOtherDocs.length > 0) {
                    otherList = selectedOtherDocs.map(f => f.name).join(', ');
                }

                const docRows =
                    row('Aadhaar Card', aadhaarFile ? aadhaarFile.name : 'Not uploaded') +
                    row('Passport Photo', photoFile ? photoFile.name : 'Not uploaded') +
                    row('Other Documents', otherList);

                document.getElementById('previewContent').innerHTML =
                    section('Personal Information', 'fa-user', personalRows) +
                    section('Academic Information', 'fa-book', academicRows) +
                    section('Address Information', 'fa-map-marker-alt', addressRows) +
                    section('Document Uploads', 'fa-cloud-upload-alt', docRows);
            }

            // ============================================================
            // 6. NEXT BUTTON — NO VALIDATION
            // ============================================================
            if (nextBtn) {
                nextBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    nextBtn.disabled = true;
                    nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Loading...';

                    setTimeout(() => {
                        nextBtn.disabled = false;
                        nextBtn.innerHTML = 'Next <i class="fas fa-arrow-right text-xs"></i>';
                        buildPreview();
                        showPreview();
                    }, 300);
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
            // 7. SUBMIT BUTTON
            // ============================================================
            if (submitBtn) {
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Submitting...';

                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<i class="fas fa-paper-plane text-xs"></i> Submit Registration';
                        alert('Student registration submitted successfully! ✅\n\n(Demo only - data not sent to server)');
                    }, 1200);
                });
            }

        })();
    </script>
</body>

</html>