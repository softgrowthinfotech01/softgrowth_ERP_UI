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

    <style>
        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;         
            justify-content: center;
            font-weight: 900;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f1f5f9;
            color: #94a3b8;
            border: 2px solid #e2e8f0;
        }
        .step.active {
            background: #0f766e;
            color: #fff;
            border-color: #0f766e;
            transform: scale(1.05);
            box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.2);
        }
        .line {
            height: 3px;
            flex: 1;
            border-radius: 999px;
            background: #e2e8f0;
            transition: 0.3s ease;
        }
        .line.active {
            background: #0f766e;
        }
        .step-box {
            display: none;
            opacity: 0;
            transform: translateY(12px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .step-box.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        .file-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px dashed #d1d5db;
            border-radius: 0.75rem;
            background: #f9fafb;
            transition: 0.2s;
        }
        .file-input:hover {
            border-color: #0f766e;
            background: #f0fdfa;
        }
        .file-input::file-selector-button {
            background: #0f766e;
            color: white;
            padding: 0.4rem 1rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .file-input::file-selector-button:hover {
            background: #0d6b64;
        }
        .preview-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            margin-top: 6px;
        }
        @media (max-width: 640px) {
            .step {
                width: 34px;
                height: 34px;
                font-size: 13px;
            }
            .line {
                height: 2px;
            }
        }
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <!-- MAIN WRAPPER CENTERED -->
    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200 flex flex-col items-center justify-center">

        <!-- CONTENT CONTAINER -->
        <div class="w-full max-w-6xl">

            <!-- STEPPER -->
            <div class="flex items-center gap-2 sm:gap-4 mb-8">
                <button id="prev" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition hidden sm:w-auto w-full">
                    <i class="fas fa-arrow-left mr-2"></i> Previous
                </button>
                <div class="step active" id="s1">1</div>
                <div class="line active" id="l1"></div>
                <div class="step" id="s2">2</div>
                <div class="line" id="l2"></div>
                <div class="step" id="s3">3</div>
                <button id="next" class="px-6 py-2.5 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-700 transition sm:w-auto w-full sm:ml-auto">
                    Next <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>

            <!-- ================= STEP 1 ================= -->
            <div class="step-box active bg-white rounded-2xl shadow-sm border border-gray-300 p-6 md:p-8" id="step1">
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm shadow-md">
                        <i class="fas fa-user-graduate"></i>
                    </span>
                    Personal + Academic Details
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Student Board -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Board / Course</label>
                        <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="student_board">
                            <option value="">Select Board</option>
                            <option value="CBSE">CBSE</option>
                            <option value="State">State</option>
                            <option value="BCA">BCA</option>
                            <option value="BBA">BBA</option>
                        </select>
                    </div>
                    
                    <!-- Student Batch -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student Batch</label>
                        <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="student_batch">
                            <option value="">Select Batch</option>
                            <option value="2024-25">2024-25</option>
                            <option value="2025-26">2025-26</option>
                            <option value="2026-27">2026-27</option>
                        </select>
                    </div>

                    <!-- Student Class -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student Class</label>
                        <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="course">
                            <option value="">Select Class</option>
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
                    </div>

                    <!-- Student Section -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student Section</label>
                        <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="section">
                            <option value="">Select Section</option>
                            <option value="Section A">Section A</option>
                            <option value="Section B">Section B</option>
                            <option value="Section C">Section C</option>
                            <option value="Section D">Section D</option>
                        </select>
                    </div>

                    <!-- Student ID -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student ID</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="abc_id" placeholder="Enter Student ID" />
                    </div>

                    <!-- Student Name -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student Name</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="student_name" placeholder="Enter student name" />
                    </div>

                    <!-- Parent Name -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Parent Name</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="parent_name" placeholder="Enter parent name" />
                    </div>

                    <!-- Caste -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Caste</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="caste" placeholder="Enter caste" />
                    </div>

                    <!-- Sub Caste -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Sub Caste</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="sub_caste" placeholder="Enter sub caste" />
                    </div>

                    <!-- Admission Date -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Admission Date</label>
                        <input type="date" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="admission_date" />
                    </div>

                    <!-- Aadhaar -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Aadhaar Number</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="aadhaar" maxlength="12" placeholder="XXXX-XXXX-XXXX" />
                    </div>

                    <!-- APAAR ID -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">APAAR ID</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="apaar_id" placeholder="Enter APAAR ID" />
                    </div>

                    <!-- DOB -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Date of Birth</label>
                        <input type="date" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="dob" />
                    </div>

                    <!-- Place of Birth -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Place of Birth</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="birth_place" placeholder="Enter place of birth" />
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Gender</label>
                        <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Photo -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Passport Photo</label>
                        <input type="file" id="photo" class="file-input" accept="image/*" />
                        <img id="photoPreview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                </div>
            </div>

            <!-- ================= STEP 2 ================= -->
            <div class="step-box bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8" id="step2">
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm shadow-md">
                        <i class="fas fa-file-upload"></i>
                    </span>
                    Documents Upload
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- TC Certificate -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student Aadhaar Card</label>
                        <input type="file" id="tc_certificate" class="file-input" accept="image/*,application/pdf" />
                        <img id="tcPreview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                    <!-- Birth Certificate -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Birth Certificate</label>
                        <input type="file" id="marksheet_10" class="file-input" accept="image/*,application/pdf" />
                        <img id="marksheet10Preview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                    <!-- Parent Aadhaar Card -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Parent Aadhaar Card</label>
                        <input type="file" id="marksheet_12" class="file-input" accept="image/*,application/pdf" />
                        <img id="marksheet12Preview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                    <!-- Address Proof -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Address Proof</label>
                        <input type="file" id="other_doc" class="file-input" accept="image/*,application/pdf" />
                        <img id="otherAcademicDocsPreview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                    <!-- Caste Certificate -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Caste Certificate</label>
                        <input type="file" id="caste_certificate" class="file-input" accept="image/*,application/pdf" />
                        <img id="castePreview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                    <!-- Domicile Certificate -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Domicile Certificate</label>
                        <input type="file" id="domicile_certificate" class="file-input" accept="image/*,application/pdf" />
                        <img id="domicilePreview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                    <!-- Non Creamy Layer -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Non-Creamy Layer Certificate</label>
                        <input type="file" id="non_creamy_layer" class="file-input" accept="image/*,application/pdf" />
                        <img id="nonCreamyLayerPreview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                    <!-- Other Documents -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Other Documents</label>
                        <input type="file" id="other_documents" class="file-input" accept="image/*,application/pdf" />
                        <img id="otherDocumentsPreview" class="preview-img hidden" src="#" alt="Preview" />
                    </div>

                </div>
            </div>

            <!-- ================= STEP 3 ================= -->
            <div class="step-box bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8" id="step3">
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm shadow-md">
                        <i class="fas fa-coins"></i>
                    </span>
                    Fees + Contact Details
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Full Fees -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Full Fees</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="full_fees" placeholder="Enter full fees" />
                    </div>

                    <!-- Admission Fees / Discount -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Discount</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="discount" placeholder="Enter discount" />
                    </div>

                    <!-- Student Phone -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student Phone</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="student_phone" maxlength="10" placeholder="Enter student phone" />
                    </div>

                    <!-- Parent Phone -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Parent Phone</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="parent_phone" maxlength="10" placeholder="Enter parent phone" />
                    </div>

                    <!-- Blood Group -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Blood Group</label>
                        <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="blood_group">
                            <option value="">Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>

                    <!-- Tahsil -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Tahsil</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="tahsil" placeholder="Enter tahsil" />
                    </div>

                    <!-- District -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">District</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="district" placeholder="Enter district" />
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Full Address</label>
                        <textarea rows="4" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="full_address" placeholder="Enter full address"></textarea>
                    </div>

                </div>
            </div>

        </div>

    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <!-- ============================================================
        STEPPER NAVIGATION + FILE PREVIEWS + SUBMISSION LOGIC
        ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = ['step1', 'step2', 'step3'];
            let current = 0;

            const stepEls = document.querySelectorAll('.step');
            const lineEls = document.querySelectorAll('.line');
            const boxes = steps.map(id => document.getElementById(id));
            const prevBtn = document.getElementById('prev');
            const nextBtn = document.getElementById('next');

            function updateUI() {
                stepEls.forEach((el, i) => {
                    el.classList.toggle('active', i === current);
                });
                lineEls.forEach((el, i) => {
                    el.classList.toggle('active', i < current);
                });
                boxes.forEach((box, i) => {
                    box.classList.toggle('active', i === current);
                });
                prevBtn.classList.toggle('hidden', current === 0);
                if (current === steps.length - 1) {
                    nextBtn.innerHTML = 'Submit <i class="fas fa-check ml-2"></i>';
                } else {
                    nextBtn.innerHTML = 'Next <i class="fas fa-arrow-right ml-2"></i>';
                }
            }

            function goTo(index) {
                if (index >= 0 && index < steps.length) {
                    current = index;
                    updateUI();
                }
            }

            prevBtn.addEventListener('click', () => goTo(current - 1));
            nextBtn.addEventListener('click', async () => {
                if (current === steps.length - 1) {
                    await saveStudent();
                } else {
                    goTo(current + 1);
                }
            });

            updateUI();

            // Photo Preview Setup
            setupFilePreview('photo', 'photoPreview');
            setupFilePreview('tc_certificate', 'tcPreview');
            setupFilePreview('marksheet_10', 'marksheet10Preview');
            setupFilePreview('marksheet_12', 'marksheet12Preview');
            setupFilePreview('other_doc', 'otherAcademicDocsPreview');
            setupFilePreview('caste_certificate', 'castePreview');
            setupFilePreview('domicile_certificate', 'domicilePreview');
            setupFilePreview('non_creamy_layer', 'nonCreamyLayerPreview');
            setupFilePreview('other_documents', 'otherDocumentsPreview');
        });

        function setupFilePreview(inputId, previewId) {
            const fileInput = document.getElementById(inputId);
            const previewImg = document.getElementById(previewId);
            if (fileInput && previewImg) {
                fileInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            previewImg.src = event.target.result;
                            previewImg.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        previewImg.classList.add('hidden');
                    }
                });
            }
        }

        function showValidationErrors(errors) {
            let messages = [];
            if (errors.passport_photo) messages.push("Passport Photo must be JPG, JPEG or PNG");
            if (errors.tc_certificate) messages.push("TC Certificate must be PDF or Image");
            if (errors.marksheet_10) messages.push("10th Marksheet must be PDF or Image");
            if (errors.marksheet_12) messages.push("12th Marksheet must be PDF or Image");
            if (errors.aadhaar_number) messages.push("Aadhaar Number must be 12 digits");
            if (errors.student_phone) messages.push("Student Phone must be 10 digits");
            if (errors.parent_phone) messages.push("Parent Phone must be 10 digits");
            alert(messages.join("\n"));
        }

        async function saveStudent() {
            try {
                const token = localStorage.getItem("token");
                const nextBtn = document.getElementById("next");

                const studentPhone = document.getElementById("student_phone").value.trim();
                if (!studentPhone || !/^\d+$/.test(studentPhone) || studentPhone.length !== 10) {
                    alert("Student Phone must be a valid 10-digit number.");
                    return;
                }

                const parentPhone = document.getElementById("parent_phone").value.trim();
                if (!parentPhone || !/^\d+$/.test(parentPhone) || parentPhone.length !== 10) {
                    alert("Parent Phone must be a valid 10-digit number.");
                    return;
                }

                const aadhaar = document.getElementById("aadhaar").value.trim();
                if (!aadhaar || !/^\d+$/.test(aadhaar) || aadhaar.length !== 12) {
                    alert("Aadhaar Number must be a valid 12-digit number.");
                    return;
                }

                const fullFees = document.getElementById("full_fees").value.trim();
                if (!fullFees || !/^\d+$/.test(fullFees)) {
                    alert("Full Fees is required and must contain only numbers.");
                    return;
                }

                const formData = new FormData();
                formData.append("student_board", document.getElementById("student_board").value);
                formData.append("student_batch", document.getElementById("student_batch").value);
                formData.append("course", document.getElementById("course").value);
                formData.append("section", document.getElementById("section").value);
                formData.append("student_id", document.getElementById("abc_id").value);
                formData.append("student_name", document.getElementById("student_name").value);
                formData.append("parent_name", document.getElementById("parent_name").value);
                formData.append("caste", document.getElementById("caste").value);
                formData.append("sub_caste", document.getElementById("sub_caste").value);
                formData.append("admission_date", document.getElementById("admission_date").value);
                formData.append("aadhaar_number", aadhaar);
                formData.append("abc_id", document.getElementById("abc_id").value);
                formData.append("date_of_birth", document.getElementById("dob").value);
                formData.append("place_of_birth", document.getElementById("birth_place").value);
                formData.append("gender", document.getElementById("gender").value);

                // Files
                const appendFile = (id, key) => {
                    const file = document.getElementById(id).files[0];
                    if (file) formData.append(key, file);
                };

                appendFile("photo", "passport_photo");
                appendFile("tc_certificate", "tc_certificate");
                appendFile("marksheet_10", "marksheet_10");
                appendFile("marksheet_12", "marksheet_12");
                appendFile("other_doc", "other_academic_documents");
                appendFile("caste_certificate", "caste_certificate");
                appendFile("domicile_certificate", "domicile_certificate");
                appendFile("non_creamy_layer", "non_creamy_layer_certificate");
                appendFile("other_documents", "other_documents");

                formData.append("full_fees", parseFloat(fullFees) || 0);
                formData.append("discount", parseFloat(document.getElementById("discount").value) || 0);
                formData.append("student_phone", studentPhone);
                formData.append("parent_phone", parentPhone);
                formData.append("blood_group", document.getElementById("blood_group").value);
                formData.append("tahsil", document.getElementById("tahsil").value);
                formData.append("district", document.getElementById("district").value);
                formData.append("full_address", document.getElementById("full_address").value);

                nextBtn.disabled = true;
                nextBtn.innerText = "Submitting...";

                const response = await fetch(url + "students", {
                    method: "POST",
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        "Accept": "application/json"
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    alert("Student Added Successfully ✅");
                    location.reload();
                } else {
                    if (result.errors) {
                        showValidationErrors(result.errors);
                    } else {
                        alert(result.message || "Failed to register student.");
                    }
                }
            } catch (error) {
                console.error(error);
                alert("API Connection Error");
            } finally {
                const nextBtn = document.getElementById("next");
                nextBtn.disabled = false;
                nextBtn.innerText = "Submit";
            }
        }
    </script>
</body>

</html>