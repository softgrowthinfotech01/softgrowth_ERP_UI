<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Payment - ERP</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<link rel="stylesheet" href="dist/output.css">
<link rel="stylesheet" href="dist/style.css">


<style>

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

    <!-- Student Name -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Student Name</label>
            <select
id="student_select"
class="input">

    <option value="">
        Select Student
    </option>

</select>
        </div>


        <!-- Class -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Course</label>
            <input id="course" class="input" placeholder="Enter Course">
        </div>

        <!-- Student Name -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Student Year</label>
            <input id="student_year" class="input" placeholder="Enter Student Year">
        </div>

        <!-- Student ID -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Student ID</label>
            <input id="student_id" class="input" placeholder="Enter Student ID">
        </div>

        <!-- Total Amount -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Total Amount</label>
            <input id="total_amount" class="input" placeholder="Auto Calculated" readonly>
        </div>

        <!-- Balance Amount -->
        <div>
            <label class="text-md text-white font-bold mb-1 block">Balance Amount</label>
            <input id="balance_amount" class="input" placeholder="Auto Calculated" readonly>
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

<script src="url.js"></script>
<!-- ================= SCRIPT ================= -->
<script>


// ================= STEP FORM =================

let step = 1;

const next = document.getElementById("next");
const prev = document.getElementById("prev");

function showStep(stepNo){

    // Hide all steps
    document.querySelectorAll(".step-box").forEach(box=>{
        box.classList.remove("active");
    });

    document.getElementById("step"+stepNo).classList.add("active");

    // Remove active from indicators
    for(let i=1;i<=3;i++){

        document.getElementById("s"+i).classList.remove("active");

        if(i<3){
            document.getElementById("l"+i).classList.remove("active");
        }

    }

    // Add active to completed/current steps
    for(let i=1;i<=stepNo;i++){

        document.getElementById("s"+i).classList.add("active");

        if(i<stepNo){
            document.getElementById("l"+i).classList.add("active");
        }

    }

    prev.classList.toggle("hidden", stepNo===1);

    next.innerText = stepNo===3 ? "Submit" : "Next";

}

// NEXT
next.addEventListener("click",function(){

    if(step < 3){

        step++;

        showStep(step);

    }else{

        alert("Payment Submitted Successfully ✅");

        // submitForm();   // Call your API here later

    }

});

// PREVIOUS
prev.addEventListener("click",function(){

    if(step>1){

        step--;

        showStep(step);

    }

});

// Initial
showStep(step);




// api

    let studentDropdown;

window.onload = function () {

    getStudents();

};



// =========================
// FETCH ALL STUDENTS
// =========================

async function getStudents(){

    try{

        const response = await fetch(

            url + "students",

            {

                headers:{

                    "Authorization":"Bearer " +
                    localStorage.getItem("token"),

                    "Accept":"application/json"

                }

            }

        );
const result = await response.json();

console.log(result);

if (!result.success) {
    alert(result.message);
    return;
}

const students = result.data.data;

console.log(students);

const select = document.getElementById("student_select");

select.innerHTML = `
    <option value="">Select Student</option>
`;

students.forEach(student => {

    select.innerHTML += `
        <option value="${student.id}">
            ${student.student_name}
        </option>
    `;

});

        studentDropdown = new TomSelect("#student_select",{

            create:false,

            placeholder:"Search Student..."

        });

    }

    catch(error){

        console.log(error);

    }

}

document.getElementById("student_select")

.addEventListener("change",function(){

    if(this.value){

        getStudentData(this.value);

    }

});

async function getStudentData(id){

    try{

        const response = await fetch(

            url + "students/" + id,

            {

                headers:{

                    "Authorization":"Bearer " +
                    localStorage.getItem("token"),

                    "Accept":"application/json"

                }

            }

        );

        const result = await response.json();

        const student = result.data;

    
        document.getElementById("course").value =
        student.course || "";

        document.getElementById("student_year").value =
        student.student_year || "";

        document.getElementById("student_id").value =
        student.id;

        // NEXT STEP

        // getFeeSummary(student.id);

    }

    catch(error){

        console.log(error);

    }

}

</script>

</body>
</html>