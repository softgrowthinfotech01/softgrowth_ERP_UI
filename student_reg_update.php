<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Student - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
  /* Minimal custom styles for stepper and file uploads */
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
        /* file input styling – consistent across browsers */
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
        @media (max-width: 768px) {
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

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

   <main id="main" class="md:ml-[300px] max-w-6xl mx-auto px-4 sm:px-6 py-28 pb-10 lg:mb-6 transition-all duration-200">

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
        <div class="step-box active bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8" id="step1">
            <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm">
                    <i class="fas fa-user-graduate"></i>
                </span>
                Personal + Academic Details
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Student Batch -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Student Batch</label>
                    <select class="w-full rounded-xl  border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="student_batch">
                        <option value="">Select Batch</option>
                        <option value="2024-25">2024-25</option>
                        <option value="2025-26">2025-26</option>
                    </select>
                </div>

                <!-- Student Year -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Student Year</label>
                    <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="student_year">
                        <option value="">Select Year</option>
                        <option value="First Year">1st Year</option>
                        <option value="Second Year">2nd Year</option>
                        <option value="Third Year">3rd Year</option>
                    </select>
                </div>

                <!-- Course -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Course</label>
                    <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="course">
                        <option value="">Select Course</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                    </select>
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

                <!-- Sub-Caste -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Sub-Caste</label>
                    <input type="text" class="w-full rounded-xl border border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="sub_caste" placeholder="Enter sub-caste" />
                </div>

                <!-- Admission Date -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Admission Date</label>
                    <input type="date" class="w-full rounded-xl border border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="admission_date" />
                </div>

                <!-- Aadhaar -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Aadhaar Number</label>
                    <input type="text" class="w-full rounded-xl border border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="aadhaar_number" placeholder="XXXX-XXXX-XXXX" />
                </div>

                <!-- ABC ID -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">ABC ID</label>
                    <input type="text" class="w-full rounded-xl border border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="abc_id" placeholder="Enter ABC ID" />
                </div>

                <!-- DOB -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Date of Birth</label>
                    <input type="date" class="w-full rounded-xl border border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="date_of_birth" />
                </div>

                <!-- Place of Birth -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Place of Birth</label>
                    <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="place_of_birth" placeholder="Enter place of birth" />
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Gender</label>
                    <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Photo -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Passport Photo</label>
                    <input type="file" id="photo" class="file-input" accept="image/*" />
                    <img id="photoPreview" class="preview-img hidden" src="#" alt="Preview" />
                </div>

            </div>
        </div>

        <!-- ================= STEP 2 ================= -->
        <div class="step-box bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8" id="step2">
            <h2 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm">
                    <i class="fas fa-file-upload"></i>
                </span>
                Documents Upload
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- TC Certificate -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">TC Certificate</label>
                    <input type="file" id="tc_certificate" class="file-input" accept="image/*,application/pdf" />
                    <img id="tcPreview" class="preview-img hidden" src="#" alt="Preview" />
                </div>

                <!-- 10th Marksheet -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">10th Marksheet</label>
                    <input type="file" id="marksheet_10" class="file-input" accept="image/*,application/pdf" />
                    <img id="marksheet10Preview" class="preview-img hidden" src="#" alt="Preview" />
                </div>

                <!-- 12th Marksheet -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">12th Marksheet</label>
                    <input type="file" id="marksheet_12" class="file-input" accept="image/*,application/pdf" />
                    <img id="marksheet12Preview" class="preview-img hidden" src="#" alt="Preview" />
                </div>

                <!-- Other Academic Docs -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Other Academic Documents</label>
                    <input type="file" id="other_academic_docs" class="file-input" accept="image/*,application/pdf" />
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

                <!-- Non-Creamy Layer -->
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
            <h2 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm">
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

                <!-- Admission Fees -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Admission Fees</label>
                    <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="admission_fees" placeholder="Enter admission fees" />
                </div>

                <!-- Student Phone -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Student Phone</label>
                    <input type="tel" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="student_phone" placeholder="Enter student phone" />
                </div>

                <!-- Parent Phone -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Parent Phone</label>
                    <input type="tel" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="parent_phone" placeholder="Enter parent phone" />
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

            <!-- ================= SEMESTER PATTERN ================= -->
            <div class="mt-8">
                <h3 class="text-md font-extrabold text-gray-900 mb-4">Semester Pattern</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <!-- First Year -->
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200">
                        <p class="font-bold text-gray-800 mb-3">First Year</p>
                        <label class="flex items-center gap-3 p-3 rounded-lg bg-white border border-gray-300 cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" name="semester" value="FY Semester 1" class="w-4 h-4 text-teal-600 focus:ring-teal-500" />
                            <span class="text-gray-700">Semester 1</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg bg-white border border-gray-200 cursor-pointer hover:bg-gray-50 transition mt-2">
                            <input type="radio" name="semester" value="FY Semester 2" class="w-4 h-4 text-teal-600 focus:ring-teal-500" />
                            <span class="text-gray-700">Semester 2</span>
                        </label>
                    </div>

                    <!-- Second Year -->
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200">
                        <p class="font-bold text-gray-800 mb-3">Second Year</p>
                        <label class="flex items-center gap-3 p-3 rounded-lg bg-white border border-gray-300 cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" name="semester" value="SY Semester 3" class="w-4 h-4 text-teal-600 focus:ring-teal-500" />
                            <span class="text-gray-700">Semester 3</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg bg-white border border-gray-300 cursor-pointer hover:bg-gray-50 transition mt-2">
                            <input type="radio" name="semester" value="SY Semester 4" class="w-4 h-4 text-teal-600 focus:ring-teal-500" />
                            <span class="text-gray-700">Semester 4</span>
                        </label>
                    </div>

                    <!-- Third Year -->
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200">
                        <p class="font-bold text-gray-800 mb-3">Third Year</p>
                        <label class="flex items-center gap-3 p-3 rounded-lg bg-white border border-gray-300 cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" name="semester" value="TY Semester 5" class="w-4 h-4 text-teal-600 focus:ring-teal-500" />
                            <span class="text-gray-700">Semester 5</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg bg-white border border-gray-300 cursor-pointer hover:bg-gray-50 transition mt-2">
                            <input type="radio" name="semester" value="TY Semester 6" class="w-4 h-4 text-teal-600 focus:ring-teal-500" />
                            <span class="text-gray-700">Semester 6</span>
                        </label>
                    </div>

                </div>
            </div>

        </div>

        <!-- BUTTONS -->
        <div class="flex flex-col sm:flex-row justify-between gap-4 mt-6">
        
        </div>

    </main>


    <?php include 'footer.php' ?>


    <script src="url.js"></script>

    <script>
        window.onload = function() {

            getStudent();

        }



        const params =
            new URLSearchParams(window.location.search);

        const studentId =
            params.get("id");



        async function getStudent() {

            try {

                const response = await fetch(

                    url + "students/" + studentId,

                    {

                        headers: {

                            "Authorization": "Bearer " + localStorage.getItem("token"),

                            "Accept": "application/json"

                        }

                    }

                );



                const result = await response.json();

                console.log(result);



                const student = result.data;



                console.log(student);

                document.getElementById("student_batch").value =
                    student.student_batch || "";

                let yearValue = student.student_year;



                if (yearValue === "1st Year") {

                    yearValue = "First Year";

                }



                if (yearValue === "2nd Year") {

                    yearValue = "Second Year";

                }



                if (yearValue === "3rd Year") {

                    yearValue = "Third Year";

                }



                document.getElementById("student_year").value =
                    yearValue;

                document.getElementById("course").value =
                    student.course || "";

                document.getElementById("student_name").value =
                    student.student_name || "";

                document.getElementById("parent_name").value =
                    student.parent_name || "";

                document.getElementById("caste").value =
                    student.caste || "";

                document.getElementById("sub_caste").value =
                    student.sub_caste || "";

                document.getElementById("admission_date").value =
                    student.admission_date || "";

                document.getElementById("aadhaar_number").value =
                    student.aadhaar_number || "";

                document.getElementById("abc_id").value =
                    student.abc_id || "";

                document.getElementById("date_of_birth").value =
                    student.date_of_birth || "";

                document.getElementById("place_of_birth").value =
                    student.place_of_birth || "";

                document.getElementById("gender").value =
                    student.gender || "";

                document.getElementById("full_fees").value =
                    student.full_fees || "";

                document.getElementById("admission_fees").value =
                    student.admission_fees || "";

                document.getElementById("student_phone").value =
                    student.student_phone || "";

                document.getElementById("parent_phone").value =
                    student.parent_phone || "";

                document.getElementById("blood_group").value =
                    student.blood_group || "";

                document.getElementById("tahsil").value =
                    student.tahsil || "";

                document.getElementById("district").value =
                    student.district || "";

                document.getElementById("full_address").value =
                    student.full_address || "";

                const semesterRadios = document.getElementsByName("semester");

                semesterRadios.forEach(radio => {

                    if (radio.value === student.semester_pattern) {

                        radio.checked = true;

                    }
                });

                document.getElementById("photoPreview").src =
                    baseUrl + "storage/" + student.passport_photo;

                document.getElementById("tcPreview").src =
                    baseUrl + "storage/" + student.tc_certificate;

                document.getElementById("marksheet10Preview").src =
                    baseUrl + "storage/" + student.marksheet_10;

                document.getElementById("marksheet12Preview").src =
                    baseUrl + "storage/" + student.marksheet_12;

                document.getElementById("otherAcademicDocsPreview").src =
                    baseUrl + "storage/" + student.other_academic_documents;

                document.getElementById("castePreview").src =
                    baseUrl + "storage/" + student.caste_certificate;

                document.getElementById("domicilePreview").src =
                    baseUrl + "storage/" + student.domicile_certificate;

                document.getElementById("nonCreamyLayerPreview").src =
                    baseUrl + "storage/" + student.non_creamy_layer_certificate;

                document.getElementById("otherDocumentsPreview").src =
                    baseUrl + "storage/" + student.other_documents;

            } catch (error) {

                console.log(error);

            }

        }


        async function updateStudent() {

            try {

                const formData = new FormData();



                formData.append("_method", "PUT");



                formData.append(
                    "student_name",
                    document.getElementById("student_name").value
                );



                formData.append(
                    "student_batch",
                    document.getElementById("student_batch").value
                );



                formData.append(
                    "student_year",
                    document.getElementById("student_year").value
                );


                formData.append(
                    "course",
                    document.getElementById("course").value
                );



                formData.append(
                    "parent_name",
                    document.getElementById("parent_name").value
                );



                formData.append(
                    "gender",
                    document.getElementById("gender").value
                );



                formData.append(
                    "caste",
                    document.getElementById("caste").value
                );



                formData.append(
                    "sub_caste",
                    document.getElementById("sub_caste").value
                );



                formData.append(
                    "admission_date",
                    document.getElementById("admission_date").value
                );



                formData.append(
                    "aadhaar_number",
                    document.getElementById("aadhaar_number").value
                );



                formData.append(
                    "abc_id",
                    document.getElementById("abc_id").value
                );



                formData.append(
                    "date_of_birth",
                    document.getElementById("date_of_birth").value
                );



                formData.append(
                    "place_of_birth",
                    document.getElementById("place_of_birth").value
                );



                formData.append(
                    "full_fees",
                    document.getElementById("full_fees").value
                );



                formData.append(
                    "admission_fees",
                    document.getElementById("admission_fees").value
                );



                formData.append(
                    "student_phone",
                    document.getElementById("student_phone").value
                );



                formData.append(
                    "parent_phone",
                    document.getElementById("parent_phone").value
                );



                formData.append(
                    "blood_group",
                    document.getElementById("blood_group").value
                );



                formData.append(
                    "tahsil",
                    document.getElementById("tahsil").value
                );



                formData.append(
                    "district",
                    document.getElementById("district").value
                );



                formData.append(
                    "full_address",
                    document.getElementById("full_address").value
                );

                const semesterRadios = document.getElementsByName("semester");
                semesterRadios.forEach(radio => {

                    if (radio.checked) {

                        formData.append("semester_pattern", radio.value);

                    }
                });


                document.getElementById("photo").files[0] &&
                    formData.append(
                        "passport_photo",
                        document.getElementById("photo").files[0]
                    );

                document.getElementById("tc_certificate").files[0] &&
                    formData.append(
                        "tc_certificate",
                        document.getElementById("tc_certificate").files[0]
                    );

                document.getElementById("marksheet_10").files[0] &&
                    formData.append(
                        "marksheet_10",
                        document.getElementById("marksheet_10").files[0]
                    );

                document.getElementById("marksheet_12").files[0] &&
                    formData.append(
                        "marksheet_12",
                        document.getElementById("marksheet_12").files[0]
                    );

                document.getElementById("other_academic_docs").files[0] &&
                    formData.append(
                        "other_academic_documents",
                        document.getElementById("other_academic_docs").files[0]
                    );

                document.getElementById("caste_certificate").files[0] &&
                    formData.append(
                        "caste_certificate",
                        document.getElementById("caste_certificate").files[0]
                    );

                document.getElementById("domicile_certificate").files[0] &&
                    formData.append(
                        "domicile_certificate",
                        document.getElementById("domicile_certificate").files[0]
                    );


                document.getElementById("non_creamy_layer").files[0] &&
                    formData.append(
                        "non_creamy_layer_certificate",
                        document.getElementById("non_creamy_layer").files[0]
                    );

                document.getElementById("other_documents").files[0] &&
                    formData.append(
                        "other_documents",
                        document.getElementById("other_documents").files[0]
                    );




                const response = await fetch(

                    url + "students/" + studentId,

                    {

                        method: "POST",

                        headers: {

                            "Authorization": "Bearer " + localStorage.getItem("token"),

                            "Accept": "application/json"

                        },

                        body: formData

                    }

                );


                const result = await response.json();

                console.log(result);



                // ================= SUCCESS =================

                if (response.ok) {

                    alert("Student Updated Successfully ✅");

                    window.location.href =
                        "student_record";

                }



                // ================= VALIDATION ERRORS =================
                else if (response.status === 422) {

                    let errorMessage = "";



                    // LOOP ALL ERRORS

                    Object.keys(result.errors).forEach(key => {

                        errorMessage +=
                            result.errors[key][0] + "\n";

                    });



                    alert(errorMessage);

                }



                // ================= OTHER ERRORS =================
                else {

                    alert(result.message || "Something went wrong");

                }



            } catch (error) {

                console.log(error);

                alert("Server Error ❌");

            }
        }
        // ================= STEPER =================

        let step = 1;

        const next =
            document.getElementById("next");

        const prev =
            document.getElementById("prev");



        function show(n) {

            document.querySelectorAll(".step-box")
                .forEach(e => e.classList.remove("active"));



            document.getElementById("step" + n)
                .classList.add("active");



            for (let i = 1; i <= 3; i++) {

                document.getElementById("s" + i)
                    .classList.remove("active");

            }



            for (let i = 1; i < n; i++) {

                document.getElementById("l" + i)
                    .classList.add("active");

            }



            for (let i = 1; i <= n; i++) {

                document.getElementById("s" + i)
                    .classList.add("active");

            }



            prev.classList.toggle(
                "hidden",
                n === 1
            );



            next.innerText =
                n === 3 ? "Update" : "Next";

        }



        next.onclick = () => {

            if (step === 3) {

                updateStudent();

                return;

            }



            step++;

            show(step);

        }



        prev.onclick = () => {

            step--;

            show(step);

        }



        show(step);
    </script>
</body>

</html>