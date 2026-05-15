<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration V2 - ERP</title>

<script src="https://cdn.tailwindcss.com"></script>

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
<select class="input">
<option>Select Batch</option>
<option>2024-25</option>
<option>2025-26</option>
</select>
</div>

<!-- Student Year -->
<div>
<label class="text-md text-white font-bold mb-1 block">Student Year</label>
<select class="input">
<option>Select Year</option>
<option>1st Year</option>
<option>2nd Year</option>
<option>3rd Year</option>
</select>
</div>

<!-- Course -->
<div>
<label class="text-md text-white font-bold mb-1 block">Course</label>
<select class="input">
<option>Select Course</option>
<option>BCA</option>
<option>BBA</option>
</select>
</div>

<!-- Student Name -->
<div>
<label class="text-md text-white font-bold mb-1 block">Student Name</label>
<input class="input" placeholder="Enter student name">
</div>

<!-- Caste -->
<div>
<label class="text-md text-white font-bold mb-1 block">Caste</label>
<input class="input" placeholder="Enter caste">
</div>

<!-- Admission Date -->
<div>
<label class="text-md text-white font-bold mb-1 block">Admission Date</label>
<input class="input" type="date">
</div>

<!-- Aadhaar -->
<div>
<label class="text-md text-white font-bold mb-1 block">Aadhaar Number</label>
<input class="input" placeholder="XXXX-XXXX-XXXX">
</div>

<!-- ABC ID -->
<div>
<label class="text-md text-white font-bold mb-1 block">ABC ID</label>
<input class="input" placeholder="Enter ABC ID">
</div>

<!-- DOB -->
<div>
<label class="text-md text-white font-bold mb-1 block">Date of Birth</label>
<input class="input" type="date">
</div>

<!-- Place of Birth -->
<div>
<label class="text-md text-white font-bold mb-1 block">Place of Birth</label>
<input class="input" placeholder="Enter place of birth">
</div>

<!-- PHOTO -->
<div class="md:col-span-2">
<label class="text-md text-white font-bold mb-1 block">Passport Photo</label>
<input type="file" class="input file:bg-red-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-red-600 cursor-pointer">
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
<input type="file" class="input file:bg-cyan-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-cyan-600 cursor-pointer">
</div>

<!-- 10th Marksheet -->
<div>
<label class="text-md text-white font-bold mb-1 block">10th Marksheet</label>
<input type="file" class="input file:bg-indigo-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-indigo-600 cursor-pointer">
</div>

<!-- 12th Marksheet -->
<div>
<label class="text-md text-white font-bold mb-1 block">12th Marksheet</label>
<input type="file" class="input file:bg-purple-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-purple-600 cursor-pointer">
</div>

<!-- Other Academic Docs -->
<div>
<label class="text-md text-white font-bold mb-1 block">Other Academic Documents</label>
<input type="file" class="input file:bg-sky-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-sky-600 cursor-pointer">
</div>

<!-- Caste Certificate -->
<div>
<label class="text-md text-white font-bold mb-1 block">Caste Certificate</label>
<input type="file" class="input file:bg-emerald-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-emerald-600 cursor-pointer">
</div>

<!-- Domicile Certificate -->
<div>
<label class="text-md text-white font-bold mb-1 block">Domicile Certificate</label>
<input type="file" class="input file:bg-pink-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-pink-600 cursor-pointer">
</div>

<!-- Non Creamy Layer -->
<div>
<label class="text-md text-white font-bold mb-1 block">Non-Creamy Layer Certificate</label>
<input type="file" class="input file:bg-amber-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-amber-600 cursor-pointer">
</div>

<!-- Other Documents -->
<div>
<label class="text-md text-white font-bold mb-1 block">Other Documents</label>
<input type="file" class="input file:bg-red-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-red-600 cursor-pointer">
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
<input class="input" placeholder="Enter full fees">
</div>

<!-- Admission Fees -->
<div>
<label class="text-md text-white font-bold mb-1 block">Admission Fees</label>
<input class="input" placeholder="Enter admission fees">
</div>

<!-- Student Phone -->
<div>
<label class="text-md text-white font-bold mb-1 block">Student Phone</label>
<input class="input" placeholder="Enter student phone">
</div>

<!-- Parent Phone -->
<div>
<label class="text-md text-white font-bold mb-1 block">Parent Phone</label>
<input class="input" placeholder="Enter parent phone">
</div>

<!-- Blood Group -->
<div>
<label class="text-md text-white font-bold mb-1 block">Blood Group</label>
<select class="input">
<option>Select Blood Group</option>
<option>A+</option><option>A-</option>
<option>B+</option><option>B-</option>
<option>O+</option><option>O-</option>
</select>
</div>

<!-- Tahsil -->
<div>
<label class="text-md text-white font-bold mb-1 block">Tahsil</label>
<input class="input" placeholder="Enter tahsil">
</div>

<!-- District -->
<div>
<label class="text-md text-white font-bold mb-1 block">District</label>
<input class="input" placeholder="Enter district">
</div>

<!-- Address -->
<div class="md:col-span-2">
<label class="text-md text-white font-bold mb-1 block">Full Address</label>
<textarea class="input" rows="4" placeholder="Enter full address"></textarea>
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
<input type="radio" name="sem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600 ">Semester 1</span>
</label>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer   transition mt-2">
<input type="radio" name="sem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 2</span>
</label>
</div>

<!-- Second Year -->
<div class="p-4 rounded-xl bg-gradient-to-br from-violet-400 via-black/50 to-violet-300 border border-slate-700">
<p class="font-semibold text-white mb-3">Second Year</p>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition">
<input type="radio" name="sem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 1</span>
</label>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition mt-2">
<input type="radio" name="sem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 2</span>
</label>
</div>

<!-- Third Year -->
<div class="p-4 rounded-xl bg-gradient-to-br from-pink-400 via-black/50 to-pink-300 border border-slate-700">
<p class="font-semibold text-white mb-3">Third Year</p>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition">
<input type="radio" name="sem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 1</span>
</label>

<label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer  transition mt-2">
<input type="radio" name="sem1" class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500"><span class="text-gray-600">Semester 2</span>
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

<button id="next" class="px-5 py-2 bg-green-500 rounded-lg ml-auto">
Next
</button>

</div>

</div>

<?php include 'footer.php' ?>

<script>
let step = 1;

const next = document.getElementById("next");
const prev = document.getElementById("prev");

function show(n){

document.querySelectorAll(".step-box").forEach(e=>e.classList.remove("active"));
document.getElementById("step"+n).classList.add("active");

for(let i=1;i<=3;i++){
document.getElementById("s"+i).classList.remove("active");
}

for(let i=1;i<n;i++){
document.getElementById("l"+i).classList.add("active");
}

for(let i=1;i<=n;i++){
document.getElementById("s"+i).classList.add("active");
}

prev.classList.toggle("hidden", n===1);
next.innerText = n===3 ? "Submit" : "Next";
}

next.onclick = ()=>{
if(step===3){
alert("Submitted Successfully ✅");
return;
}
step++;
show(step);
}

prev.onclick = ()=>{
step--;
show(step);
}

show(step);
</script>

</body>
</html> 