<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Payment - ERP</title>

<link rel="stylesheet" href="dist/output.css">

<style>

/* ===== BACKGROUND ===== */
 body {
            overflow-x: hidden;
            min-height: 100vh;

            background:
                linear-gradient(rgba(0, 0, 0, 0.45),
                    rgba(0, 0, 0, .45)),
                url('images/d_bg.png');

            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }



/* ===== STEP ===== */

        /* STEP */
        .step {
            width: 42px;
            height: 42px;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 900;
            color: #D1FAE5;

            background: rgba(15, 23, 42, .72);
            border: 1px solid rgba(16, 185, 129, .28);

            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .10),
                0 8px 20px rgba(0, 0, 0, .22);

            transition: .3s ease;
        }

        .step.active {
            color: #06281f;

            background:
                linear-gradient(135deg,
                    #34D399,
                    #FBBF24);

            transform: scale(1.1);

            box-shadow:
                0 0 0 5px rgba(52, 211, 153, .12),
                0 12px 28px rgba(251, 191, 36, .25);
        }

        /* LINE */
        .line {
            height: 3px;
            flex: 1;
            border-radius: 50px;

            background: rgba(148, 163, 184, .28);
            transition: .3s ease;
        }

        .line.active {
            background:
                linear-gradient(90deg,
                    #34D399,
                    #FBBF24);

            box-shadow: 0 0 18px rgba(52, 211, 153, .30);
        }



















.step-box{
    display:none;
    opacity:0;
    transform:translateY(18px) scale(.98);
    transition:.45s ease;

    position:relative;
    overflow:hidden;

    padding:32px;
    border-radius:34px;

    background:
        linear-gradient(135deg,
            rgba(255,255,255,.92),
            rgba(245,243,255,.88),
            rgba(236,254,255,.84)
        );

    border:1px solid rgba(255,255,255,.75);

    backdrop-filter:blur(35px);
    -webkit-backdrop-filter:blur(35px);

    box-shadow:
        0 35px 90px rgba(15,23,42,.22),
        inset 0 1px 0 rgba(255,255,255,1);
}

/* ANIMATED BORDER */
.step-box::before{
    content:"";
    position:absolute;
    inset:-2px;
    z-index:0;

    background:
        conic-gradient(
            from 180deg,
            #7C3AED,
            #06B6D4,
            #22C55E,
            #F59E0B,
            #7C3AED
        );

    opacity:.35;
    animation:spinGlow 7s linear infinite;
}

.step-box::after{
    content:"";
    position:absolute;
    inset:2px;
    z-index:0;

    border-radius:32px;

    background:
        linear-gradient(135deg,
            rgba(255,255,255,.95),
            rgba(245,243,255,.90),
            rgba(240,249,255,.88)
        );
}

.step-box.active{
    display:block;
    opacity:1;
    transform:translateY(0) scale(1);
}

.step-box > *{
    position:relative;
    z-index:2;
}

/* HEADING */
.step-box h2{
    display:inline-flex;
    align-items:center;
    gap:12px;

    color:#0F172A !important;
    font-size:27px;
    font-weight:950;
    margin-bottom:28px;
    letter-spacing:-.8px;
}

.step-box h2::before{
    content:"✦";
    width:42px;
    height:42px;

    display:grid;
    place-items:center;

    border-radius:15px;

    color:#fff;
    font-size:18px;

    background:
        linear-gradient(135deg,#7C3AED,#06B6D4);

    box-shadow:
        0 14px 32px rgba(124,58,237,.30);
}

.step-box h2::after{
    content:"";
    position:absolute;
    left:55px;
    bottom:-9px;

    width:120px;
    height:4px;
    border-radius:999px;

    background:
        linear-gradient(90deg,#7C3AED,#06B6D4,#22C55E);
}

/* LABEL */
.step-box label{
    color:#1E293B !important;
    font-size:13px !important;
    font-weight:950 !important;
    letter-spacing:.25px;
    margin-bottom:8px !important;
}

/* INPUT */
.input{
    width:100%;
    height:52px;

    padding:0 16px;

    border-radius:18px;

    background:
        linear-gradient(180deg,#FFFFFF,#F8FAFC);

    border:1px solid rgba(203,213,225,.88);

    color:#0F172A;
    font-size:14px;
    font-weight:750;

    outline:none;
    transition:.28s ease;

    box-shadow:
        0 10px 24px rgba(15,23,42,.07),
        inset 0 1px 0 rgba(255,255,255,1);
}

.input::placeholder{
    color:#94A3B8;
}

.input:hover{
    transform:translateY(-2px);
    border-color:#67E8F9;
    box-shadow:
        0 14px 28px rgba(6,182,212,.12);
}

.input:focus{
    background:#fff;
    border-color:#7C3AED;

    box-shadow:
        0 0 0 4px rgba(124,58,237,.14),
        0 18px 35px rgba(6,182,212,.15);
}

/* SELECT */
select.input{
    cursor:pointer;
}

/* DATE */
input[type="date"].input{
    color:#334155;
}

/* FILE INPUT */
input[type="file"].input{
    height:auto;
    padding:12px;

    background:
        linear-gradient(135deg,#FFFFFF,#F8FAFC);

    border:1px dashed rgba(124,58,237,.48);
}

input[type="file"].input::file-selector-button{
    border:0;

    padding:11px 18px;
    margin-right:14px;

    border-radius:14px;

    color:#fff;
    font-weight:950;

    background:
        linear-gradient(135deg,#7C3AED,#06B6D4);

    cursor:pointer;
    transition:.25s ease;

    box-shadow:
        0 10px 24px rgba(124,58,237,.25);
}

input[type="file"].input::file-selector-button:hover{
    transform:scale(1.05);
}

/* ANIMATION */
@keyframes spinGlow{
    to{
        transform:rotate(360deg);
    }
}

/* MOBILE */
@media(max-width:768px){
    .step-box{
        padding:20px;
        border-radius:24px;
    }

    .step-box::after{
        border-radius:22px;
    }

    .step-box h2{
        font-size:20px;
        gap:9px;
    }

    .step-box h2::before{
        width:34px;
        height:34px;
        border-radius:12px;
        font-size:15px;
    }

    .step-box h2::after{
        left:45px;
        width:80px;
    }

    .input{
        height:44px;
        border-radius:14px;
        font-size:13px;
    }
}




/* =================================
   STUDENT PAYMENT PAGE SET FIX
================================= */

html,
body{
    margin:0;
    padding:0;
    min-height:100%;
    overflow-x:hidden;
}

body{
    display:flex;
    flex-direction:column;
    padding:0 !important;
}

/* MAIN WRAPPER */
.md\:ml-\[300px\].max-w-7xl{
    flex:1;

    margin-left:450px !important;
    margin-top:0 !important;
    margin-bottom:0 !important;

    padding-top:125px !important;
    padding-left:35px !important;
    padding-right:35px !important;
    padding-bottom:25px !important;

    max-width:none !important;
    width:auto !important;
}

/* CENTER CONTENT */
.md\:ml-\[300px\].max-w-7xl > .step-box,
.md\:ml-\[300px\].max-w-7xl > .flex,
.md\:ml-\[300px\].max-w-7xl > .step-box + .flex{
    max-width:1450px;
    width:100%;
    margin-left:auto;
    margin-right:auto;
}

/* HEADER / SIDEBAR */
.erp-header{
    z-index:9999 !important;
}

.erp-side{
    z-index:9998 !important;
}

/* FOOTER */
footer,
.erp-footer{
    position:relative !important;
    left:auto !important;
    right:auto !important;
    bottom:auto !important;

    margin-left:290px !important;
    width:calc(100% - 290px) !important;

    margin-top:45px !important;
    padding:0 !important;

    z-index:20 !important;
}

.erp-footer-wrap,
.erp-footer-inner{
    margin:0 !important;
    border-radius:30px 30px 0 0 !important;
}

/* TABLET */
@media(max-width:1024px){

    .md\:ml-\[300px\].max-w-7xl{
        margin-left:0 !important;

        padding-top:110px !important;
        padding-left:14px !important;
        padding-right:14px !important;
        padding-bottom:15px !important;

        width:100% !important;
    }

    footer,
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
    }
}

/* MOBILE */
@media(max-width:768px){

    body{
        background-attachment:scroll !important;
    }

    .md\:ml-\[300px\].max-w-7xl{
        margin-left:0 !important;

        padding-top:100px !important;
        padding-left:6px !important;
        padding-right:6px !important;
        padding-bottom:12px !important;

        width:100% !important;
        max-width:100% !important;
    }

    .step{
        width:34px !important;
        height:34px !important;
        font-size:13px !important;
    }

    .line{
        height:2px !important;
    }

    .step-box{
        width:100% !important;
        max-width:100% !important;

        padding:16px !important;
        border-radius:20px !important;
    }

    .step-box::after{
        border-radius:18px !important;
    }

    .step-box h2{
        font-size:18px !important;
        line-height:1.3 !important;
        margin-bottom:18px !important;
    }

    .step-box h2::before{
        width:34px !important;
        height:34px !important;
        font-size:14px !important;
        border-radius:12px !important;
    }

    .step-box h2::after{
        left:45px !important;
        width:80px !important;
    }

    .grid{
        gap:12px !important;
    }

    label{
        font-size:12px !important;
        margin-bottom:5px !important;
    }

    .input{
        width:100% !important;
        height:42px !important;
        padding:0 12px !important;
        font-size:13px !important;
        border-radius:12px !important;
    }

    textarea.input{
        min-height:90px !important;
        padding:10px 12px !important;
    }

    #next,
    #prev{
        width:100% !important;
        height:42px !important;
        font-size:13px !important;
        border-radius:12px !important;
    }

    .flex.justify-between{
        gap:10px !important;
        flex-direction:column !important;
    }

    footer,
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
        padding:0 !important;
    }

    .erp-footer-wrap,
    .erp-footer-inner{
        width:100% !important;
        max-width:100% !important;
        margin:0 !important;
        border-radius:24px 24px 0 0 !important;
    }
}
</style>
</head>

<body class="text-white ">
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
<div class="step-box active " id="step1">

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
<div class="step-box " id="step2">

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
<div class="step-box " id="step3">

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