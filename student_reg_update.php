<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Student - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        .file-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px dashed #d1d5db;
            border-radius: 0.75rem;
            background: #f9fafb;
            transition: 0.2s;
        }
        .file-input:hover {
            border-color: #f97316;
            background: #fff7ed;
        }
        .file-input::file-selector-button {
            background: #f97316;
            color: white;
            padding: 0.4rem 1rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .file-input::file-selector-button:hover {
            background: #ea580c;
        }
        .section-body {
            transition: all 0.3s ease;
        }
        .chevron-icon {
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <!-- MAIN WRAPPER CENTERED -->
    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-8 mb-12 transition-all duration-200 flex flex-col items-center justify-center">
        <div class="w-full max-w-5xl">

            <!-- Global Error Banner -->
            <div id="globalErrorBanner" class="hidden mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                <span id="globalErrorMessage">Please correct the highlighted fields before proceeding.</span>
            </div>

            <!-- Update Student Form -->
            <form id="updateStudentForm" enctype="multipart/form-data">

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

                    <div id="personal-body" class="section-body p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Registration ID <span class="text-gray-400 font-normal">(Read-only)</span></label>
                                <div class="relative">
                                    <i class="fas fa-id-badge absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="registration_id" readonly class="bg-gray-100 w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">APAAR ID / ABC ID <span class="text-gray-400 font-normal">(Optional, 12 digits)</span></label>
                                <div class="relative">
                                    <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="abc_id" maxlength="12" placeholder="Enter 12-digit APAAR/ABC ID" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
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
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Course / Class <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-graduation-cap absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs z-10"></i>
                                    <select id="course" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select course / class</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Phone Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="student_phone" maxlength="10" placeholder="10-digit mobile number" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Parent / Guardian Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-phone-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="parent_phone" maxlength="10" placeholder="10-digit parent mobile number" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Parent Name <span class="text-gray-400 font-normal">(Optional)</span></label>
                                <div class="relative">
                                    <i class="fas fa-user-tie absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="parent_name" placeholder="Enter parent name" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Aadhaar Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="aadhaar_number" maxlength="12" placeholder="12-digit Aadhaar Number" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Birth <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="date" id="date_of_birth" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
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
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Place of Birth <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-globe absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="place_of_birth" placeholder="Enter place of birth" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Caste <span class="text-gray-400 font-normal">(Optional)</span></label>
                                <div class="relative">
                                    <i class="fas fa-users absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="caste" placeholder="Enter caste" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Sub Caste <span class="text-gray-400 font-normal">(Optional)</span></label>
                                <div class="relative">
                                    <i class="fas fa-user-friends absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="sub_caste" placeholder="Enter sub caste" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
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

                    <div id="academic-body" class="section-body p-4 hidden">
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
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Previous Class <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-history absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="previous_class" placeholder="Enter previous class" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Batch <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-calendar absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs z-10"></i>
                                    <select id="student_batch" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select Batch Year</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Admission Date <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-calendar-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="date" id="admission_date" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Gross Fee</label>
                                <div class="relative">
                                    <i class="fas fa-rupee-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="number" step="0.01" id="full_fees" placeholder="Gross fee" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Discount Amount <span class="text-gray-400 font-normal">(Optional)</span></label>
                                <div class="relative">
                                    <i class="fas fa-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="number" step="0.01" id="discount_amount" placeholder="Enter discount amount" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
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

                    <div id="address-body" class="section-body p-4 hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="md:col-span-2">
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Full Address <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-map-pin absolute left-3 top-3 text-gray-400 text-xs"></i>
                                    <textarea rows="2" id="full_address" placeholder="Enter complete address" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm"></textarea>
                                </div>
                            </div>

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
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">State <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-flag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="state" placeholder="Enter state" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Pincode <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-map-marked-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="pincode" maxlength="6" placeholder="6-digit pincode" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
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

                    <div id="documents-body" class="section-body p-4 hidden">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <!-- 1. Passport Photo -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                    <i class="fas fa-camera text-orange-500 mr-1"></i> Passport Photo
                                </label>
                                <input type="file" id="passport_photo" class="file-input" accept="image/jpeg,image/png,image/jpg" />
                                <p id="passport_photo_name" class="text-[10px] text-green-600 mt-0.5 hidden"></p>
                            </div>

                            <!-- 2. Aadhaar Card -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                    <i class="fas fa-id-card text-orange-500 mr-1"></i> Aadhaar Card
                                </label>
                                <input type="file" id="aadhar_card" class="file-input" accept="image/*,application/pdf" />
                                <p id="aadhar_card_name" class="text-[10px] text-green-600 mt-0.5 hidden"></p>
                            </div>

                            <!-- 3. Other Documents (Existing + New Files) -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                    <i class="fas fa-folder-open text-orange-500 mr-1"></i> Other Documents
                                    <span id="other_documents_count" class="ml-1 text-[9px] font-semibold text-orange-500"></span>
                                </label>
                                <input type="file" id="other_documents" class="file-input" accept="image/*,application/pdf" multiple />
                                <div id="other_documents_list" class="mt-1.5 space-y-1"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mt-5">
                    <button type="button" id="backBtn" class="w-full sm:w-auto px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-sm shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left text-xs"></i> Back
                    </button>
                    <button type="button" id="updateBtn" class="w-full sm:w-auto px-6 py-2.5 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-save text-xs"></i> Update Student
                    </button>
                </div>
            </form>
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
            const storageBase = cleanBase.replace(/\/api$/, '');

            const params = new URLSearchParams(window.location.search);
            const studentId = params.get("id");
            if (!studentId) {
                alert('Student ID is missing.');
                window.location.href = 'student_record.php';
                return;
            }

            // Holds existing files fetched from DB and newly selected files
            let existingOtherDocs = [];
            let selectedOtherDocs = [];

            // Fetch Classes and Academic Years dropdowns
            async function fetchDropdownData() {
                try {
                    const classRes = await fetch(`${cleanBase}/student-classes`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    const classResult = await classRes.json();
                    if (classRes.ok) {
                        const classes = classResult.data?.data || classResult.data || classResult;
                        const classSelect = document.getElementById('course');
                        classSelect.innerHTML = '<option value="">Select course / class</option>' + 
                            (Array.isArray(classes) ? classes : []).map(c => `<option value="${c.id}">${c.class_name}</option>`).join('');
                    }

                    const yearRes = await fetch(`${cleanBase}/academic-years`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    const yearResult = await yearRes.json();
                    if (yearRes.ok) {
                        const years = yearResult.data?.data || yearResult.data || yearResult;
                        const yearSelect = document.getElementById('student_batch');
                        yearSelect.innerHTML = '<option value="">Select Batch Year</option>' + 
                            (Array.isArray(years) ? years : []).map(y => `<option value="${y.academic_year}">${y.academic_year}</option>`).join('');
                    }
                } catch (err) {
                    console.error('Error loading dropdowns:', err);
                }
            }

            // Accordion functionality
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

            // File input name displays
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

            // ==============================
            // RENDER COMBINED OTHER DOCUMENTS
            // ==============================
            const otherDocsInput = document.getElementById('other_documents');
            const otherDocsList = document.getElementById('other_documents_list');
            const otherDocsCount = document.getElementById('other_documents_count');

            function renderOtherDocs() {
                if (!otherDocsList) return;
                otherDocsList.innerHTML = '';
                
                const totalCount = existingOtherDocs.length + selectedOtherDocs.length;
                if (totalCount === 0) {
                    otherDocsCount.textContent = '';
                    return;
                }
                otherDocsCount.textContent = `(${totalCount} total)`;

                // 1. Render Existing DB Files (with download links)
                existingOtherDocs.forEach((filePath, index) => {
                    const fileName = filePath.split('/').pop() || `Document ${index + 1}`;
                    const chip = document.createElement('div');
                    chip.className = 'flex items-center justify-between gap-2 bg-blue-50 border border-blue-200 rounded-md px-2 py-1 text-[10px]';
                    chip.innerHTML = `
                        <div class="flex items-center gap-1.5 min-w-0 flex-1">
                            <i class="fas fa-file-pdf text-blue-500 text-[10px] flex-shrink-0"></i>
                            <span class="text-gray-700 truncate">${fileName}</span>
                            <span class="text-blue-600 text-[9px] font-semibold flex-shrink-0">(Existing)</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <a href="${storageBase}/storage/${filePath}" target="_blank" title="View/Download" class="text-blue-500 hover:text-blue-700 hover:bg-blue-100 rounded w-5 h-5 flex items-center justify-center flex-shrink-0 transition">
                                <i class="fas fa-download text-[9px]"></i>
                            </a>
                            <button type="button" data-index="${index}" class="remove-existing-doc text-red-500 hover:text-red-700 hover:bg-red-50 rounded w-5 h-5 flex items-center justify-center flex-shrink-0 transition" title="Remove">
                                <i class="fas fa-times text-[9px]"></i>
                            </button>
                        </div>
                    `;
                    otherDocsList.appendChild(chip);
                });

                // 2. Render Newly Selected Local Files
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
                        <button type="button" data-index="${index}" class="remove-new-doc text-red-500 hover:text-red-700 hover:bg-red-50 rounded w-5 h-5 flex items-center justify-center flex-shrink-0 transition" title="Remove">
                            <i class="fas fa-times text-[9px]"></i>
                        </button>
                    `;
                    otherDocsList.appendChild(chip);
                });

                // Bind delete events for existing DB files
                otherDocsList.querySelectorAll('.remove-existing-doc').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const idx = parseInt(this.getAttribute('data-index'), 10);
                        existingOtherDocs.splice(idx, 1);
                        renderOtherDocs();
                    });
                });

                // Bind delete events for newly selected local files
                otherDocsList.querySelectorAll('.remove-new-doc').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const idx = parseInt(this.getAttribute('data-index'), 10);
                        selectedOtherDocs.splice(idx, 1);
                        renderOtherDocs();
                    });
                });
            }

            if (otherDocsInput) {
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

            // Load student data
            async function getStudent() {
                try {
                    await fetchDropdownData();

                    const response = await fetch(`${cleanBase}/students/${studentId}`, {
                        headers: {
                            "Authorization": "Bearer " + token,
                            "Accept": "application/json"
                        }
                    });

                    if (!response.ok) {
                        if (response.status === 401) {
                            alert('Session expired. Please log in again.');
                            window.location.href = 'login.php';
                            return;
                        }
                        throw new Error('Failed to fetch student data');
                    }

                    const result = await response.json();
                    const student = result.data?.student || result.data || result;

                    // Populate fields
                    document.getElementById("registration_id").value = student.registration_id || student.student_id || "";
                    document.getElementById("abc_id").value = student.abc_id || "";
                    document.getElementById("student_name").value = student.student_name || "";
                    document.getElementById("course").value = student.class_id || student.course || "";
                    document.getElementById("student_phone").value = student.student_phone || "";
                    document.getElementById("parent_phone").value = student.parent_phone || "";
                    document.getElementById("parent_name").value = student.parent_name || "";
                    document.getElementById("aadhaar_number").value = student.aadhaar_number || "";
                    document.getElementById("date_of_birth").value = student.date_of_birth || "";
                    document.getElementById("gender").value = student.gender || "";
                    document.getElementById("blood_group").value = student.blood_group || "";
                    document.getElementById("place_of_birth").value = student.place_of_birth || "";
                    document.getElementById("caste").value = student.caste || "";
                    document.getElementById("sub_caste").value = student.sub_caste || "";

                    document.getElementById("board").value = student.board || "";
                    document.getElementById("previous_class").value = student.previous_class || "";
                    document.getElementById("student_batch").value = student.student_batch || student.academic_year || "";
                    document.getElementById("admission_date").value = student.admission_date || "";
                    document.getElementById("full_fees").value = student.full_fees || "";
                    document.getElementById("discount_amount").value = student.discount_amount || "";

                    document.getElementById("full_address").value = student.full_address || "";
                    document.getElementById("tahsil").value = student.tahsil || "";
                    document.getElementById("district").value = student.district || "";
                    document.getElementById("state").value = student.state || "";
                    document.getElementById("pincode").value = student.pincode || "";

                    if (student.passport_photo) {
                        const pLabel = document.getElementById('passport_photo_name');
                        pLabel.textContent = '✓ Current file uploaded';
                        pLabel.classList.remove('hidden');
                    }
                    if (student.aadhar_card || student.aadhaar_card) {
                        const aLabel = document.getElementById('aadhar_card_name');
                        aLabel.textContent = '✓ Current file uploaded';
                        aLabel.classList.remove('hidden');
                    }

                    // Parse and load existing Other Documents from DB
                    // Parse and load existing Other Documents from DB robustly
                    if (student.other_documents) {
                        try {
                            if (typeof student.other_documents === 'string') {
                                if (student.other_documents.trim().startsWith('[')) {
                                    existingOtherDocs = JSON.parse(student.other_documents);
                                } else if (student.other_documents.includes(',')) {
                                    existingOtherDocs = student.other_documents.split(',').map(s => s.trim());
                                } else {
                                    existingOtherDocs = [student.other_documents.trim()];
                                }
                            } else if (Array.isArray(student.other_documents)) {
                                existingOtherDocs = student.other_documents;
                            }
                        } catch(e) {
                            existingOtherDocs = [student.other_documents];
                        }
                    }
                    renderOtherDocs();

                } catch (error) {
                    console.error('Error loading student:', error);
                    alert('Could not load student data. ' + error.message);
                }
            }

            // Update student
            async function updateStudent() {
                const updateBtn = document.getElementById('updateBtn');
                const originalText = updateBtn.innerHTML;
                updateBtn.disabled = true;
                updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Updating...';

                try {
                    const formData = new FormData();
                    formData.append("_method", "PUT");

                    const fields = [
                        'student_name', 'abc_id', 'student_phone', 'parent_phone', 'parent_name',
                        'aadhaar_number', 'date_of_birth', 'gender', 'blood_group', 'place_of_birth',
                        'caste', 'sub_caste', 'board', 'previous_class', 'student_batch',
                        'admission_date', 'full_fees', 'discount_amount', 'full_address',
                        'tahsil', 'district', 'state', 'pincode'
                    ];

                    fields.forEach(id => {
                        const el = document.getElementById(id);
                        if (el && el.value.trim() !== '') {
                            formData.append(id, el.value.trim());
                        }
                    });

                    formData.append('class_id', document.getElementById('course').value);
                    formData.append('course', document.getElementById('course').selectedOptions[0]?.textContent || '');

                    const passportPhoto = document.getElementById('passport_photo').files[0];
                    if (passportPhoto) formData.append('passport_photo', passportPhoto);

                    const aadharCard = document.getElementById('aadhar_card').files[0];
                    if (aadharCard) formData.append('aadhar_card', aadharCard);

                    // 1. Send remaining retained existing files so backend doesn't delete them
                    existingOtherDocs.forEach(filePath => {
                        formData.append('retained_other_documents[]', filePath);
                    });

                    // 2. Send newly selected local files
                    selectedOtherDocs.forEach(file => {
                        formData.append('other_documents[]', file);
                    });

                    const response = await fetch(`${cleanBase}/students/${studentId}`, {
                        method: "POST",
                        headers: {
                            "Authorization": "Bearer " + token,
                            "Accept": "application/json"
                        },
                        body: formData
                    });

                    const result = await response.json().catch(() => ({}));

                    if (response.ok) {
                        alert("Student Updated Successfully ✅");
                        window.location.href = "student_record.php";
                    } else if (response.status === 422) {
                        let errorMessage = "Please correct the following:\n";
                        if (result.errors) {
                            Object.keys(result.errors).forEach(key => {
                                errorMessage += `- ${result.errors[key][0]}\n`;
                            });
                        } else {
                            errorMessage += result.message || "Validation error";
                        }
                        alert(errorMessage);
                    } else if (response.status === 401) {
                        alert('Session expired. Please log in again.');
                        window.location.href = 'login.php';
                    } else {
                        alert(result.message || "Something went wrong");
                    }
                } catch (error) {
                    console.error('Update error:', error);
                    alert("Server Error ❌");
                } finally {
                    updateBtn.disabled = false;
                    updateBtn.innerHTML = originalText;
                }
            }

            document.getElementById('updateBtn').addEventListener('click', function(e) {
                e.preventDefault();
                updateStudent();
            });

            document.getElementById('backBtn').addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to go back? Any unsaved changes will be lost.')) {
                    window.location.href = 'student_record.php';
                }
            });

            getStudent();
        })();
    </script>
</body>

</html>