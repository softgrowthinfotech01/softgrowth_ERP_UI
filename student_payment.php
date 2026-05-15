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

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center" style="background-image: url('images/bg8.jpeg');">
<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="md:ml-[300px] max-w-7xl mx-auto mt-14 mb-20 md:mb-1 md:mt-10 p-4 md:p-[80px] mb-10 md:p-12"> 
<!-- HEADER -->
<!-- <div class="flex justify-between items-center mb-6">
 <h1 class="text-xl font-bold">💳 Student Payment Form</h1> -->

<!-- <button class="text-red-500 border border-red-500 px-3 py-1 rounded hover:bg-red-500 hover:text-white">
Clear Filter
</button> 
</div> -->

<!-- STEP INDICATOR -->
<div class="flex items-center mb-6">
<div class="step active" id="s1">1</div>
<div class="line active" id="l1"></div>
<div class="step" id="s2">2</div>
<div class="line" id="l2"></div>
<div class="step" id="s3">3</div>
</div>

<!-- ================= STEP 1 ================= -->
<div class="step-box active bg-gray-900 rounded-xl p-5" id="step1">

    <h2 class="font-bold mb-4">Student Details</h2>

    <div class="grid md:grid-cols-3 gap-4">

        <!-- Class -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Class</label>
            <input class="input" placeholder="Enter Class">
        </div>

        <!-- Student Name -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Student Name</label>
            <input class="input" placeholder="Enter Student Name">
        </div>

        <!-- Student ID -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Student ID</label>
            <input class="input" placeholder="Enter Student ID">
        </div>

        <!-- Total Amount -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Total Amount</label>
            <input class="input" placeholder="Auto Calculated" readonly>
        </div>

        <!-- Balance Amount -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Balance Amount</label>
            <input class="input" placeholder="Auto Calculated" readonly>
        </div>

    </div>

</div>

<!-- ================= STEP 2 ================= -->
<div class="step-box bg-gray-900 rounded-xl p-5" id="step2">

    <h2 class="font-bold mb-4">Fee Structure</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">

        <div>
            <label class="text-white text-md font-bold mb-1 block">Admission Fee</label>
            <input class="input" placeholder="Enter Admission Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Integration Fee</label>
            <input class="input" placeholder="Enter Integration Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Exam Fee</label>
            <input class="input" placeholder="Enter Exam Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Practical Exam Fee</label>
            <input class="input" placeholder="Enter Practical Exam Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">University Development Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Avishkar / Indra Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">E-Suvidha Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">ID Card Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Computer Lab Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Course Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Youth Festival Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Alumni Union Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">College Magazine Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Tuition Fee</label>
            <input class="input" placeholder="Enter Tuition Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Enrollment Fee</label>
            <input class="input" placeholder="Enter Enrollment Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Eligibility Fee</label>
            <input class="input" placeholder="Enter Eligibility Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Laboratory Fee</label>
            <input class="input" placeholder="Enter Laboratory Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Library Fee</label>
            <input class="input" placeholder="Enter Library Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Disaster Management Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Exam Form Process Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Convocation Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">College Exam Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">University Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Maintenance Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Student Insurance Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

        <div>
            <label class="text-white text-md font-bold mb-1 block">Other Fee</label>
            <input class="input" placeholder="Enter Fee">
        </div>

    </div>
</div>
<!-- ================= STEP 3 ================= -->
<div class="step-box bg-gray-900 rounded-xl p-5" id="step3">

    <h2 class="font-bold mb-4">Payment Details</h2>

    <div class="grid md:grid-cols-2 gap-4">

        <!-- Installment -->
        <div>
            <label class="text-white text-md font-bold mb-1 block">Select Installment</label>
            <select class="input">
                <option>Select Installment</option>
                <option>1st Installment</option>
                <option>2nd Installment</option>
                <option>Full Payment</option>
            </select>
        </div>

        <!-- Amount -->
        <div>
            <label class="text-white text-md font-bold mb-1 block">Amount Entered</label>
            <input class="input" placeholder="Enter Amount">
        </div>

        <!-- Remark -->
        <div class="md:col-span-2">
            <label class="text-white text-md font-bold mb-1 block">Remark</label>
            <textarea class="input" rows="4" placeholder="Enter Remark"></textarea>
        </div>

    </div>

</div>
<!-- BUTTONS -->
<div class="flex justify-between mt-6">
<button id="prev" class="px-4 py-2 bg-blue-700 rounded hidden">Previous</button>
<button id="next" class="px-4 py-2 bg-green-500 rounded ml-auto">Next</button>
</div>



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