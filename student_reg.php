<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration V2 - ERP</title>

<link rel="stylesheet" href="dist/output.css">

<style>
body{
    overflow-x:hidden;
        background-size: 400% 400%;
    animation: gradientMove 15s ease infinite;
}
/* smooth motion */
@keyframes gradientMove {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

/* GLASS CARD */
.card{
    background: rgba(208, 208, 208, 0.06);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 22px;
}

/* STEP */
.step{
    width:42px;
    height:42px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    background:#334155;
    color:white;
    transition:.3s;
}

.step.active{
    background:linear-gradient(135deg,#06b6d4,#6366f1);
    transform:scale(1.1);
}

.line{
    height:3px;
    flex:1;
    background:#334155;
    transition:.3s;
}

.line.active{
    background:linear-gradient(90deg,#06b6d4,#6366f1);
}

/* FORM STEP */
.step-box{
    display:none;
    opacity:0;
    transform:translateY(20px);
    transition:.4s;
}

.step-box.active{
    display:block;
    opacity:1;
    transform:translateY(0);
}

/* INPUT */
.input{
    width:100%;
    padding:12px;
    border-radius:14px;
    background:#ffffff;
    border:1px solid #cbd5e1;
    color:#0f172a;
    outline:none;
    transition:.2s;
    font-weight:500;
}

.input::placeholder{
    color:#64748b;
}

.input:focus{
    border-color:#06b6d4;
    box-shadow:0 0 0 4px rgba(6,182,212,0.15);
}

/* file input fix */
input[type="file"]{
    background:#ffffff;
    color:#0f172a;
}
</style>

</head>

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center"
      style="background-image: url('images/bg8.jpeg');">
      
<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div id="main" class="md:ml-[300px] transition-all main duration-300  mt-14 mb-20 md:mb-5 md:mt-5 p-4 md:p-[70px] max-w-6xl mx-auto">



<!-- STEPPER -->
<div class="flex items-center mb-8">
<div class="step active" id="s1">1</div>
<div class="line active" id="l1"></div>
<div class="step" id="s2">2</div>
<div class="line" id="l2"></div>
<div class="step" id="s3">3</div>
</div>

<!-- ================= STEP 1 ================= -->
<div class="step-box active bg-gray-800 rounded-xl p-6" id="step1">
<h2 class="text-xl text-white  font-bold mb-4">Personal + Academic Details</h2>

<div class="grid md:grid-cols-2 gap-4">

<!-- Student Batch -->
<div>
<label class="text-md text-white font-bold mb-1 block">Student Batch</label>
<select class="input" id="student_batch">
<option value="">Select Batch</option>
<option value="2024-25">2024-25</option>
<option value="2025-26">2025-26</option>
</select>
</div>

<!-- Student Year -->
<div>
<label class="text-md text-white font-bold mb-1 block">Student Year</label>
<select class="input" id="student_year">
<option value="">Select Year</option>
<option value="1st Year">1st Year</option>
<option value="2nd Year">2nd Year</option>
<option value="3rd Year">3rd Year</option>
</select>
</div>

<!-- Course -->
<div>
<label class="text-md text-white font-bold mb-1 block">Course</label>
<select class="input" id="course">
<option value="" >Select Course</option>
<option value="BCA">BCA</option>
<option value="BBA">BBA</option>
</select>
</div>

<!-- Student Name -->
<div>
<label class="text-md text-white font-bold mb-1 block">Student Name</label>
<input class="input" id="student_name" placeholder="Enter student name">
</div>

<!-- Caste -->
<div>
<label class="text-md text-white font-bold mb-1 block">Caste</label>
<input class="input" id="caste" placeholder="Enter caste">
</div>

<!-- Admission Date -->
<div>
<label class="text-md text-white font-bold mb-1 block">Admission Date</label>
<input class="input" id="admission_date" type="date">
</div>

<!-- Aadhaar -->
<div>
<label class="text-md text-white font-bold mb-1 block">Aadhaar Number</label>
<input class="input" id="aadhaar" placeholder="XXXX-XXXX-XXXX">
</div>

<!-- ABC ID -->
<div>
<label class="text-md text-white font-bold mb-1 block">ABC ID</label>
<input class="input" id="abc_id" placeholder="Enter ABC ID">
</div>

<!-- DOB -->
<div>
<label class="text-md text-white font-bold mb-1 block">Date of Birth</label>
<input class="input" id="dob" type="date">
</div>

<!-- Place of Birth -->
<div>
<label class="text-md text-white font-bold mb-1 block">Place of Birth</label>
<input class="input" id="birth_place" placeholder="Enter place of birth">
</div>

<!-- PHOTO -->
<div class="md:col-span-2">
<label class="text-md text-white font-bold mb-1 block">Passport Photo</label>
<input type="file" id="photo" class="input file:bg-red-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-red-600 cursor-pointer">
</div>

</div>
</div>

<!-- ================= STEP 2 ================= -->
<div class="step-box bg-gray-800 rounded-xl p-6" id="step2">
<h2 class="text-xl text-white font-bold mb-1 block">Documents Upload</h2>

<div class="grid md:grid-cols-2 gap-4">

<!-- TC Certificate -->
<div>
<label class="text-md text-white font-bold mb-1 block">TC Certificate</label>
<input type="file" id="tc_certificate" class="input file:bg-cyan-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-cyan-600 cursor-pointer">
</div>

<!-- 10th Marksheet -->
<div>
<label class="text-md text-white font-bold mb-1 block">10th Marksheet</label>
<input type="file" id="10_marksheet" class="input file:bg-indigo-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-indigo-600 cursor-pointer">
</div>

<!-- 12th Marksheet -->
<div>
<label class="text-md text-white font-bold mb-1 block">12th Marksheet</label>
<input type="file" id="12_marksheet" class="input file:bg-purple-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-purple-600 cursor-pointer">
</div>

<!-- Other Academic Docs -->
<div>
<label class="text-md text-white font-bold mb-1 block">Other Academic Documents</label>
<input type="file" id="other_doc" class="input file:bg-sky-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-sky-600 cursor-pointer">
</div>

<!-- Caste Certificate -->
<div>
<label class="text-md text-white font-bold mb-1 block">Caste Certificate</label>
<input type="file" id="caste_certificate" class="input file:bg-emerald-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-emerald-600 cursor-pointer">
</div>

<!-- Domicile Certificate -->
<div>
<label class="text-md text-white font-bold mb-1 block">Domicile Certificate</label>
<input type="file" id="domicile_certificate" class="input file:bg-pink-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-pink-600 cursor-pointer">
</div>

<!-- Non Creamy Layer -->
<div>
<label class="text-md text-white font-bold mb-1 block">Non-Creamy Layer Certificate</label>
<input type="file" id="non_creamy_layer" class="input file:bg-amber-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-amber-600 cursor-pointer">
</div>

<!-- Other Documents -->
<div>
<label class="text-md text-white font-bold mb-1 block">Other Documents</label>
<input type="file" id="other_documents" class="input file:bg-red-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-red-600 cursor-pointer">
</div>

</div>
</div>

<!-- ================= STEP 3 ================= -->
<div class="step-box bg-gray-800 rounded-xl  p-6" id="step3">

<h2 class="text-xl text-white font-bold mb-4 block">Fees + Contact Details</h2>

<div class="grid md:grid-cols-2 gap-4">

<!-- Full Fees -->
<div>
<label class="text-md text-white font-bold mb-1 block">Full Fees</label>
<input class="input" id="full_fees" placeholder="Enter full fees">
</div>

<!-- Admission Fees -->
<div>
<label class="text-md text-white font-bold mb-1 block">Admission Fees</label>
<input class="input" id="admission_fees" placeholder="Enter admission fees">
</div>

<!-- Student Phone -->
<div>
<label class="text-md text-white font-bold mb-1 block">Student Phone</label>
<input class="input" id="student_phone" placeholder="Enter student phone">
</div>

<!-- Parent Phone -->
<div>
<label class="text-md text-white font-bold mb-1 block">Parent Phone</label>
<input class="input" id="parent_phone" placeholder="Enter parent phone">
</div>

<!-- Blood Group -->
<div>
<label class="text-md text-white font-bold mb-1 block">Blood Group</label>
<select class="input" id="blood_group">
<option>Select Blood Group</option>
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
<label class="text-md text-white font-bold mb-1 block">Tahsil</label>
<input class="input" id="tahsil" placeholder="Enter tahsil">
</div>

<!-- District -->
<div>
<label class="text-md text-white font-bold mb-1 block">District</label>
<input class="input" id="district" placeholder="Enter district">
</div>

<!-- Address -->
<div class="md:col-span-2">
<label class="text-md text-white font-bold mb-1 block">Full Address</label>
<textarea class="input" id="full_address" rows="4" placeholder="Enter full address"></textarea>
</div>

</div>

<!-- ================= SEMESTER PATTERN ================= -->
<div class="mt-8">

<h3 class="text-md text-white font-bold mb-1 block">
Semester Pattern
</h3>

<div class="grid md:grid-cols-3 gap-4">

<!-- First Year -->
<div class="p-4 rounded-xl bg-gradient-to-br from-green-400 via-black/50 to-green-300 border border-slate-700">
<p class="font-semibold text-white mb-3">First Year</p>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition">
<input type="radio" id="FYsem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600 ">Semester 1</span>
</label>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer   transition mt-2">
<input type="radio" id="FYsem2" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 2</span>
</label>
</div>

<!-- Second Year -->
<div class="p-4 rounded-xl bg-gradient-to-br from-violet-400 via-black/50 to-violet-300 border border-slate-700">
<p class="font-semibold text-white mb-3">Second Year</p>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition">
<input type="radio" id="SYsem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 1</span>
</label>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition mt-2">
<input type="radio" id="SYsem2" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 2</span>
</label>
</div>

<!-- Third Year -->
<div class="p-4 rounded-xl bg-gradient-to-br from-pink-400 via-black/50 to-pink-300 border border-slate-700">
<p class="font-semibold text-white mb-3">Third Year</p>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition">
<input type="radio" id="TYsem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 1</span>
</label>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition mt-2">
<input type="radio" id="TYsem2" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 2</span>
</label>

</div>

</div>
</div>

</div>
<!-- BUTTONS -->
<div class="flex justify-between mt-6">

<button id="prev" class="px-5 py-2 bg-blue-700 rounded-lg hidden">
Previous
</button>

<button id="next" onclick="saveStudent()" class="px-5 py-2 bg-green-500 rounded-lg ml-auto">
Next
</button>

</div>

</div>

<?php include 'footer.php' ?>
<script>

async function saveStudent() {

    try {

        const token = localStorage.getItem("token");

        const formData = new FormData();

        // =========================
        // STEP 1
        // =========================

        formData.append("student_batch",
            document.getElementById("student_batch").value);

        formData.append("student_year",
            document.getElementById("student_year").value);

        formData.append("course",
            document.getElementById("course").value);

        formData.append("student_name",
            document.getElementById("student_name").value);

        formData.append("caste",
            document.getElementById("caste").value);

        formData.append("admission_date",
            document.getElementById("admission_date").value);

        formData.append("aadhaar",
            document.getElementById("aadhaar").value);

        formData.append("abc_id",
            document.getElementById("abc_id").value);

        formData.append("dob",
            document.getElementById("dob").value);

        formData.append("birth_place",
            document.getElementById("birth_place").value);




        // =========================
        // FILES
        // =========================

        formData.append("photo",
            document.getElementById("photo").files[0]);

        formData.append("tc_certificate",
            document.getElementById("tc_certificate").files[0]);

        formData.append("10_marksheet",
            document.getElementById("10_marksheet").files[0]);

        formData.append("12_marksheet",
            document.getElementById("12_marksheet").files[0]);

        formData.append("other_doc",
            document.getElementById("other_doc").files[0]);

        formData.append("caste_certificate",
            document.getElementById("caste_certificate").files[0]);

        formData.append("domicile_certificate",
            document.getElementById("domicile_certificate").files[0]);

        formData.append("non_creamy_layer",
            document.getElementById("non_creamy_layer").files[0]);

        formData.append("other_documents",
            document.getElementById("other_documents").files[0]);



        // =========================
        // STEP 3
        // =========================

        formData.append("full_fees",
            document.getElementById("full_fees").value);

        formData.append("admission_fees",
            document.getElementById("admission_fees").value);

        formData.append("student_phone",
            document.getElementById("student_phone").value);

        formData.append("parent_phone",
            document.getElementById("parent_phone").value);

        formData.append("blood_group",
            document.getElementById("blood_group").value);

        formData.append("tahsil",
            document.getElementById("tahsil").value);

        formData.append("district",
            document.getElementById("district").value);

        formData.append("full_address",
            document.getElementById("full_address").value);



        // =========================
        // SEMESTERS
        // =========================

        formData.append("FYsem1",
            document.getElementById("FYsem1").checked ? 1 : 0);

        formData.append("FYsem2",
            document.getElementById("FYsem2").checked ? 1 : 0);

        formData.append("SYsem1",
            document.getElementById("SYsem1").checked ? 1 : 0);

        formData.append("SYsem2",
            document.getElementById("SYsem2").checked ? 1 : 0);

        formData.append("TYsem1",
            document.getElementById("TYsem1").checked ? 1 : 0);

        formData.append("TYsem2",
            document.getElementById("TYsem2").checked ? 1 : 0);



        // =========================
        // API CALL
        // =========================

        const response = await fetch(
            "http://127.0.0.1:8000/api/students",
            {

                method: "POST",

                headers: {

                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json"

                },

                body: formData

            }
        );



        const result = await response.json();

        console.log(result);



        if(response.ok){

            alert("Student Added Successfully ✅");

        } else {

            console.log(result);

            alert("Error");

        }

    } catch(error) {

        console.log(error);

        alert("API Error");

    }

}

</script>
</body>
</html> 