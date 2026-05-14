<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Payment - ERP</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

/* ===== BACKGROUND ===== */
body{
    background: #0f172a;
    overflow-x:hidden;
}

/* ===== GLASS CARD ===== */
.card{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 18px;
}

/* ===== STEP ===== */
.step{
    width:40px;
    height:40px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#334155;
    color:white;
    font-weight:bold;
    transition:.3s;
}

.step.active{
    background:linear-gradient(135deg,#06b6d4,#6366f1);
    transform:scale(1.1);
}

.line{
    flex:1;
    height:3px;
    background:#334155;
    transition:.3s;
}

.line.active{
    background:linear-gradient(90deg,#06b6d4,#6366f1);
}

/* ===== STEP BOX ===== */
.step-box{
    display:none;
    opacity:0;
    transform:translateY(15px);
    transition:.4s;
}

.step-box.active{
    display:block;
    opacity:1;
    transform:translateY(0);
}

/* ===== INPUT ===== */
.input{
    width:100%;
    padding:10px 12px;
    border-radius:12px;
    background:white;
    border:1px solid #cbd5e1;
    outline:none;
    color:#0f172a;
}

.input:focus{
    border-color:#06b6d4;
    box-shadow:0 0 0 3px rgba(6,182,212,0.2);
}

</style>
</head>

<body class="text-white">
<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="lg:ml-64 max-w-7xl mx-auto mt-10 p-4 md:p-12"> 
<!-- HEADER -->
<div class="flex justify-between items-center mb-6">
<h1 class="text-xl font-bold">💳 Student Payment Form</h1>

<button class="text-red-500 border border-red-500 px-3 py-1 rounded hover:bg-red-500 hover:text-white">
Clear Filter
</button>
</div>

<!-- STEP INDICATOR -->
<div class="flex items-center mb-6">
<div class="step active" id="s1">1</div>
<div class="line active" id="l1"></div>
<div class="step" id="s2">2</div>
<div class="line" id="l2"></div>
<div class="step" id="s3">3</div>
</div>

<!-- ================= STEP 1 ================= -->
<div class="step-box active card p-5" id="step1">

<h2 class="font-bold mb-4">Student Details</h2>

<div class="grid md:grid-cols-3 gap-4">

<input class="input" placeholder="Class">
<input class="input" placeholder="Student Name">
<input class="input" placeholder="Student ID">

<input class="input" placeholder="Total Amount" readonly>
<input class="input" placeholder="Balance Amount" readonly>

</div>
</div>

<!-- ================= STEP 2 ================= -->
<div class="step-box card p-5" id="step2">

<h2 class="font-bold mb-4">Fee Structure</h2>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">

<!-- LEFT FEES -->
<input class="input" placeholder="Admission Fee">
<input class="input" placeholder="Integration Fee">
<input class="input" placeholder="Exam Fee">
<input class="input" placeholder="Practical Exam Fee">
<input class="input" placeholder="University Development Fee">
<input class="input" placeholder="Avishkar / Indra Fee">
<input class="input" placeholder="E-Suvidha Fee">
<input class="input" placeholder="ID Card Fee">
<input class="input" placeholder="Computer Lab Fee">
<input class="input" placeholder="Course Fee">
<input class="input" placeholder="Youth Festival Fee">
<input class="input" placeholder="Alumni Union Fee">
<input class="input" placeholder="College Magazine Fee">

<!-- RIGHT FEES -->
<input class="input" placeholder="Tuition Fee">
<input class="input" placeholder="Enrollment Fee">
<input class="input" placeholder="Eligibility Fee">
<input class="input" placeholder="Laboratory Fee">
<input class="input" placeholder="Library Fee">
<input class="input" placeholder="Disaster Management Fee">
<input class="input" placeholder="Exam Form Process Fee">
<input class="input" placeholder="Convocation Fee">
<input class="input" placeholder="College Exam Fee">
<input class="input" placeholder="University Fee">
<input class="input" placeholder="Maintenance Fee">
<input class="input" placeholder="Student Insurance Fee">
<input class="input" placeholder="Other Fee">

</div>
</div>

<!-- ================= STEP 3 ================= -->
<div class="step-box card p-5" id="step3">

<h2 class="font-bold mb-4">Payment Details</h2>

<div class="grid md:grid-cols-2 gap-4">

<select class="input">
<option>Select Installment</option>
<option>1st Installment</option>
<option>2nd Installment</option>
<option>Full Payment</option>
</select>

<input class="input" placeholder="Amount Entered">

<textarea class="input md:col-span-2" rows="4" placeholder="Enter Remark"></textarea>

</div>

<div class="flex justify-center mt-6">
<button class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-700">
Submit
</button>
</div>

</div>

<!-- BUTTONS -->
<div class="flex justify-between mt-6">
<button id="prev" class="px-4 py-2 bg-slate-700 rounded hidden">Previous</button>
<button id="next" class="px-4 py-2 bg-cyan-500 rounded ml-auto">Next</button>
</div>

</div>
<?php include 'footer.php' ?>
<!-- ================= SCRIPT ================= -->
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

for(let i=1;i<=n;i++){
document.getElementById("s"+i).classList.add("active");
}

for(let i=1;i<n;i++){
document.getElementById("l"+i).classList.add("active");
}

prev.classList.toggle("hidden", n===1);
next.innerText = n===3 ? "Submit" : "Next";

}

next.onclick = ()=>{
if(step===3){
alert("Payment Submitted Successfully ✅");
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