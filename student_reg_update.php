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
        /* Custom styles for file inputs and preview images */
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
        .preview-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            margin-top: 6px;
        }
        /* Accordion transition */
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

            <!-- Global Error Banner (hidden by default, used for errors) -->
            <div id="globalErrorBanner" class="hidden mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                <span id="globalErrorMessage">Please correct the highlighted fields before proceeding.</span>
            </div>

            <!-- Update Student Form -->
            <form id="updateStudentForm">
                <!-- SECTION 1: PERSONAL INFORMATION (with Academic Details) -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                    <button type="button" class="w-full flex items-center justify-between px-4 py-3 bg-orange-50 hover:bg-orange-100 transition-colors toggle-section" data-target="personal-body">
                        <div class="flex items-center gap-2.5">
                            <span class="w-8 h-8 rounded-lg bg-orange-500 text-white flex items-center justify-center text-xs shadow-sm">
                                <i class="fas fa-user-graduate"></i>
                            </span>
                            <h2 class="text-base font-bold text-gray-900">Personal + Academic Details</h2>
                        </div>
                        <i class="fas fa-chevron-up text-orange-500 text-xs transition-transform duration-300 chevron-icon"></i>
                    </button>

                    <div id="personal-body" class="section-body p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <!-- Student Batch -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Batch <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-calendar absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs z-10"></i>
                                    <select id="student_batch" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select Batch</option>
                                        <option value="2024-25">2024-25</option>
                                        <option value="2025-26">2025-26</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>
                            <!-- Student Year -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Year <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-user-graduate absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="student_year" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select Year</option>
                                        <option value="First Year">1st Year</option>
                                        <option value="Second Year">2nd Year</option>
                                        <option value="Third Year">3rd Year</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>
                            <!-- Course -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Course <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-graduation-cap absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs z-10"></i>
                                    <select id="course" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select Course</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BBA">BBA</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>
                            <!-- Student Name -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Name <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="student_name" placeholder="Enter student name" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Parent Name -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Parent Name</label>
                                <div class="relative">
                                    <i class="fas fa-user-tie absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="parent_name" placeholder="Enter parent name" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Caste -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Caste</label>
                                <div class="relative">
                                    <i class="fas fa-users absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="caste" placeholder="Enter caste" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Sub-Caste -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Sub-Caste</label>
                                <div class="relative">
                                    <i class="fas fa-user-friends absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="sub_caste" placeholder="Enter sub-caste" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Admission Date -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Admission Date</label>
                                <div class="relative">
                                    <i class="fas fa-calendar-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="date" id="admission_date" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Aadhaar -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Aadhaar Number</label>
                                <div class="relative">
                                    <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="aadhaar_number" placeholder="XXXX-XXXX-XXXX" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- ABC ID -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">ABC ID</label>
                                <div class="relative">
                                    <i class="fas fa-id-badge absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="abc_id" placeholder="Enter ABC ID" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- DOB -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Birth</label>
                                <div class="relative">
                                    <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="date" id="date_of_birth" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Place of Birth -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Place of Birth</label>
                                <div class="relative">
                                    <i class="fas fa-globe absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="place_of_birth" placeholder="Enter place of birth" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Gender -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Gender</label>
                                <div class="relative">
                                    <i class="fas fa-venus-mars absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="gender" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>
                            <!-- Photo (full width) -->
                            <div class="md:col-span-2">
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Passport Photo</label>
                                <input type="file" id="photo" class="file-input" accept="image/*" />
                                <img id="photoPreview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: DOCUMENTS UPLOAD -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                    <button type="button" class="w-full flex items-center justify-between px-4 py-3 bg-orange-50 hover:bg-orange-100 transition-colors toggle-section" data-target="documents-body">
                        <div class="flex items-center gap-2.5">
                            <span class="w-8 h-8 rounded-lg bg-orange-500 text-white flex items-center justify-center text-xs shadow-sm">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </span>
                            <h2 class="text-base font-bold text-gray-900">Documents Upload</h2>
                        </div>
                        <i class="fas fa-chevron-down text-orange-500 text-xs transition-transform duration-300 chevron-icon"></i>
                    </button>

                    <div id="documents-body" class="section-body p-4 hidden">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <!-- TC Certificate -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">TC Certificate</label>
                                <input type="file" id="tc_certificate" class="file-input" accept="image/*,application/pdf" />
                                <img id="tcPreview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                            <!-- 10th Marksheet -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">10th Marksheet</label>
                                <input type="file" id="marksheet_10" class="file-input" accept="image/*,application/pdf" />
                                <img id="marksheet10Preview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                            <!-- 12th Marksheet -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">12th Marksheet</label>
                                <input type="file" id="marksheet_12" class="file-input" accept="image/*,application/pdf" />
                                <img id="marksheet12Preview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                            <!-- Other Academic Docs -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Other Academic Documents</label>
                                <input type="file" id="other_academic_docs" class="file-input" accept="image/*,application/pdf" />
                                <img id="otherAcademicDocsPreview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                            <!-- Caste Certificate -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Caste Certificate</label>
                                <input type="file" id="caste_certificate" class="file-input" accept="image/*,application/pdf" />
                                <img id="castePreview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                            <!-- Domicile Certificate -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Domicile Certificate</label>
                                <input type="file" id="domicile_certificate" class="file-input" accept="image/*,application/pdf" />
                                <img id="domicilePreview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                            <!-- Non-Creamy Layer -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Non-Creamy Layer Certificate</label>
                                <input type="file" id="non_creamy_layer" class="file-input" accept="image/*,application/pdf" />
                                <img id="nonCreamyLayerPreview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                            <!-- Other Documents -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Other Documents</label>
                                <input type="file" id="other_documents" class="file-input" accept="image/*,application/pdf" />
                                <img id="otherDocumentsPreview" class="preview-img hidden" src="#" alt="Preview" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: FEES + CONTACT DETAILS -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 mb-4 overflow-hidden">
                    <button type="button" class="w-full flex items-center justify-between px-4 py-3 bg-orange-50 hover:bg-orange-100 transition-colors toggle-section" data-target="fees-body">
                        <div class="flex items-center gap-2.5">
                            <span class="w-8 h-8 rounded-lg bg-orange-500 text-white flex items-center justify-center text-xs shadow-sm">
                                <i class="fas fa-coins"></i>
                            </span>
                            <h2 class="text-base font-bold text-gray-900">Fees + Contact Details</h2>
                        </div>
                        <i class="fas fa-chevron-down text-orange-500 text-xs transition-transform duration-300 chevron-icon"></i>
                    </button>

                    <div id="fees-body" class="section-body p-4 hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <!-- Full Fees -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Full Fees</label>
                                <div class="relative">
                                    <i class="fas fa-rupee-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="full_fees" placeholder="Enter full fees" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Admission Fees -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Admission Fees</label>
                                <div class="relative">
                                    <i class="fas fa-money-bill-wave absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="admission_fees" placeholder="Enter admission fees" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Student Phone -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Phone</label>
                                <div class="relative">
                                    <i class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="tel" id="student_phone" placeholder="Enter student phone" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Parent Phone -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Parent Phone</label>
                                <div class="relative">
                                    <i class="fas fa-phone-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="tel" id="parent_phone" placeholder="Enter parent phone" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Blood Group -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Blood Group</label>
                                <div class="relative">
                                    <i class="fas fa-tint absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="blood_group" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                                </div>
                            </div>
                            <!-- Tahsil -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Tahsil</label>
                                <div class="relative">
                                    <i class="fas fa-location-arrow absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="tahsil" placeholder="Enter tahsil" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- District -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">District</label>
                                <div class="relative">
                                    <i class="fas fa-city absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="district" placeholder="Enter district" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>
                            <!-- Address (full width) -->
                            <div class="md:col-span-2">
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Full Address</label>
                                <textarea rows="2" id="full_address" placeholder="Enter full address" class="w-full pl-3 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm"></textarea>
                            </div>
                        </div>

                        <!-- SEMESTER PATTERN -->
                        <div class="mt-5">
                            <h3 class="text-sm font-bold text-gray-800 mb-3">Semester Pattern</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <!-- First Year -->
                                <div class="p-3 rounded-lg bg-orange-50 border border-orange-200">
                                    <p class="font-semibold text-gray-800 text-xs mb-2">First Year</p>
                                    <label class="flex items-center gap-2 p-2 rounded-md bg-white border border-gray-200 cursor-pointer hover:bg-orange-50 transition">
                                        <input type="radio" name="semester" value="FY Semester 1" class="w-3 h-3 text-orange-600 focus:ring-orange-500" />
                                        <span class="text-gray-700 text-xs">Semester 1</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-2 rounded-md bg-white border border-gray-200 cursor-pointer hover:bg-orange-50 transition mt-1.5">
                                        <input type="radio" name="semester" value="FY Semester 2" class="w-3 h-3 text-orange-600 focus:ring-orange-500" />
                                        <span class="text-gray-700 text-xs">Semester 2</span>
                                    </label>
                                </div>
                                <!-- Second Year -->
                                <div class="p-3 rounded-lg bg-orange-50 border border-orange-200">
                                    <p class="font-semibold text-gray-800 text-xs mb-2">Second Year</p>
                                    <label class="flex items-center gap-2 p-2 rounded-md bg-white border border-gray-200 cursor-pointer hover:bg-orange-50 transition">
                                        <input type="radio" name="semester" value="SY Semester 3" class="w-3 h-3 text-orange-600 focus:ring-orange-500" />
                                        <span class="text-gray-700 text-xs">Semester 3</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-2 rounded-md bg-white border border-gray-200 cursor-pointer hover:bg-orange-50 transition mt-1.5">
                                        <input type="radio" name="semester" value="SY Semester 4" class="w-3 h-3 text-orange-600 focus:ring-orange-500" />
                                        <span class="text-gray-700 text-xs">Semester 4</span>
                                    </label>
                                </div>
                                <!-- Third Year -->
                                <div class="p-3 rounded-lg bg-orange-50 border border-orange-200">
                                    <p class="font-semibold text-gray-800 text-xs mb-2">Third Year</p>
                                    <label class="flex items-center gap-2 p-2 rounded-md bg-white border border-gray-200 cursor-pointer hover:bg-orange-50 transition">
                                        <input type="radio" name="semester" value="TY Semester 5" class="w-3 h-3 text-orange-600 focus:ring-orange-500" />
                                        <span class="text-gray-700 text-xs">Semester 5</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-2 rounded-md bg-white border border-gray-200 cursor-pointer hover:bg-orange-50 transition mt-1.5">
                                        <input type="radio" name="semester" value="TY Semester 6" class="w-3 h-3 text-orange-600 focus:ring-orange-500" />
                                        <span class="text-gray-700 text-xs">Semester 6</span>
                                    </label>
                                </div>
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
            // Auth check
            const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');
            if (!token) {
                alert('Authentication token missing. Please log in again.');
                window.location.href = 'login.php';
                return;
            }

            const baseUrl = typeof url !== 'undefined' ? url : '';
            const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;

            const params = new URLSearchParams(window.location.search);
            const studentId = params.get("id");
            if (!studentId) {
                alert('Student ID is missing.');
                window.location.href = 'student_record';
                return;
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

            // Preview image handling for file inputs
            function setupPreview(inputId, previewId) {
                const input = document.getElementById(inputId);
                const preview = document.getElementById(previewId);
                if (input && preview) {
                    input.addEventListener('change', function() {
                        if (this.files && this.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.classList.remove('hidden');
                            };
                            reader.readAsDataURL(this.files[0]);
                        } else {
                            preview.classList.add('hidden');
                        }
                    });
                }
            }

            // Setup previews for all file inputs that have previews
            setupPreview('photo', 'photoPreview');
            setupPreview('tc_certificate', 'tcPreview');
            setupPreview('marksheet_10', 'marksheet10Preview');
            setupPreview('marksheet_12', 'marksheet12Preview');
            setupPreview('other_academic_docs', 'otherAcademicDocsPreview');
            setupPreview('caste_certificate', 'castePreview');
            setupPreview('domicile_certificate', 'domicilePreview');
            setupPreview('non_creamy_layer', 'nonCreamyLayerPreview');
            setupPreview('other_documents', 'otherDocumentsPreview');

            // Load student data
            async function getStudent() {
                try {
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
                    const student = result.data || result.student || result;

                    // Populate fields
                    document.getElementById("student_batch").value = student.student_batch || "";
                    let yearValue = student.student_year;
                    if (yearValue === "1st Year") yearValue = "First Year";
                    if (yearValue === "2nd Year") yearValue = "Second Year";
                    if (yearValue === "3rd Year") yearValue = "Third Year";
                    document.getElementById("student_year").value = yearValue || "";
                    document.getElementById("course").value = student.course || "";
                    document.getElementById("student_name").value = student.student_name || "";
                    document.getElementById("parent_name").value = student.parent_name || "";
                    document.getElementById("caste").value = student.caste || "";
                    document.getElementById("sub_caste").value = student.sub_caste || "";
                    document.getElementById("admission_date").value = student.admission_date || "";
                    document.getElementById("aadhaar_number").value = student.aadhaar_number || "";
                    document.getElementById("abc_id").value = student.abc_id || "";
                    document.getElementById("date_of_birth").value = student.date_of_birth || "";
                    document.getElementById("place_of_birth").value = student.place_of_birth || "";
                    document.getElementById("gender").value = student.gender || "";
                    document.getElementById("full_fees").value = student.full_fees || "";
                    document.getElementById("admission_fees").value = student.admission_fees || "";
                    document.getElementById("student_phone").value = student.student_phone || "";
                    document.getElementById("parent_phone").value = student.parent_phone || "";
                    document.getElementById("blood_group").value = student.blood_group || "";
                    document.getElementById("tahsil").value = student.tahsil || "";
                    document.getElementById("district").value = student.district || "";
                    document.getElementById("full_address").value = student.full_address || "";

                    // Semester radios
                    const semesterRadios = document.getElementsByName("semester");
                    semesterRadios.forEach(radio => {
                        if (radio.value === student.semester_pattern) {
                            radio.checked = true;
                        }
                    });

                    // Set preview images from server
                    const setPreview = (id, path) => {
                        const img = document.getElementById(id);
                        if (img && path) {
                            img.src = cleanBase + "/storage/" + path;
                            img.classList.remove('hidden');
                        }
                    };
                    setPreview("photoPreview", student.passport_photo);
                    setPreview("tcPreview", student.tc_certificate);
                    setPreview("marksheet10Preview", student.marksheet_10);
                    setPreview("marksheet12Preview", student.marksheet_12);
                    setPreview("otherAcademicDocsPreview", student.other_academic_documents);
                    setPreview("castePreview", student.caste_certificate);
                    setPreview("domicilePreview", student.domicile_certificate);
                    setPreview("nonCreamyLayerPreview", student.non_creamy_layer_certificate);
                    setPreview("otherDocumentsPreview", student.other_documents);

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

                    // Text fields
                    const fields = [
                        'student_batch', 'student_year', 'course', 'student_name', 'parent_name',
                        'caste', 'sub_caste', 'admission_date', 'aadhaar_number', 'abc_id',
                        'date_of_birth', 'place_of_birth', 'gender', 'full_fees', 'admission_fees',
                        'student_phone', 'parent_phone', 'blood_group', 'tahsil', 'district',
                        'full_address'
                    ];
                    fields.forEach(id => {
                        const el = document.getElementById(id);
                        if (el) formData.append(id, el.value);
                    });

                    // Semester
                    const semesterRadios = document.getElementsByName("semester");
                    semesterRadios.forEach(radio => {
                        if (radio.checked) formData.append("semester_pattern", radio.value);
                    });

                    // Files
                    const fileFields = [
                        ['photo', 'passport_photo'],
                        ['tc_certificate', 'tc_certificate'],
                        ['marksheet_10', 'marksheet_10'],
                        ['marksheet_12', 'marksheet_12'],
                        ['other_academic_docs', 'other_academic_documents'],
                        ['caste_certificate', 'caste_certificate'],
                        ['domicile_certificate', 'domicile_certificate'],
                        ['non_creamy_layer', 'non_creamy_layer_certificate'],
                        ['other_documents', 'other_documents']
                    ];
                    fileFields.forEach(([inputId, fieldName]) => {
                        const input = document.getElementById(inputId);
                        if (input && input.files[0]) {
                            formData.append(fieldName, input.files[0]);
                        }
                    });

                    const response = await fetch(`${cleanBase}/students/${studentId}`, {
                        method: "POST",
                        headers: {
                            "Authorization": "Bearer " + token,
                            "Accept": "application/json"
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok) {
                        alert("Student Updated Successfully ✅");
                        window.location.href = "student_record";
                    } else if (response.status === 422) {
                        let errorMessage = "";
                        Object.keys(result.errors).forEach(key => {
                            errorMessage += result.errors[key][0] + "\n";
                        });
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

            // Event listeners
            document.getElementById('updateBtn').addEventListener('click', function(e) {
                e.preventDefault();
                updateStudent();
            });

            document.getElementById('backBtn').addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to go back? Any unsaved changes will be lost.')) {
                    window.location.href = 'student_record';
                }
            });

            // Initialize
            getStudent();

            // Open first section by default
            // The first section's body has no 'hidden' class initially (personal-body)
        })();
    </script>
</body>

</html>

