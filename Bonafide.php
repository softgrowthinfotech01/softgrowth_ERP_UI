<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bonafide Certificate - ERP</title>

<link rel="stylesheet" href="dist/output.css">
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

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

/* CARD */
.card{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(18px);
    border:1px solid rgba(255,255,255,0.1);
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

/* INPUT */
.input{
    width:100%;
    height:50px;
    background:white;
    border:1px solid #334155;
    border-radius:10px;
    padding:0 14px;
    color:black;
    outline:none;
    transition:0.3s;
}

.input:focus{
    border-color:#06b6d4;
    box-shadow:0 0 0 3px rgba(6,182,212,0.2);
}
.input::placeholder{
    color:#64748b;
}
/* LABEL */
.label{
    display:block;
    margin-bottom:8px;
    color:#cbd5e1;
    font-size:14px;
}

/* BUTTON */
.submit-btn{
    background:#06b6d4;
    color:white;
    height:50px;
    padding:0 40px;
    border-radius:10px;
    font-weight:600;
    transition:0.3s;
}

.submit-btn:hover{
    background:#0891b2;
    transform:translateY(-2px);
}


.ts-wrapper{

    width:100%;

}



.ts-control{

    width:100% !important;

    padding:10px !important;

    border-radius:10px !important;

    background:#ffffff !important;

    border:1px solid #cbd5e1 !important;

    min-height:50px !important;

    box-shadow:none !important;

    font-weight:500 !important;

    color:#0f172a !important;

    transition:.2s !important;

}



.ts-control:focus-within{

    border-color:#06b6d4 !important;

    box-shadow:0 0 0 4px rgba(6,182,212,0.15) !important;

}



.ts-control input{

    color:#0f172a !important;

    font-size:15px !important;

}



.ts-dropdown{

    border-radius:14px !important;

    border:1px solid #cbd5e1 !important;

    overflow:hidden;

    margin-top:6px !important;

}



.ts-dropdown .option{

    padding:12px !important;

    font-weight:500;

}



.ts-dropdown .active{

    background:#06b6d4 !important;

    color:white !important;

}

</style>
</head>

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center"
style="background-image:url('images/bg8.jpeg');">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="p-8 md:p-[70px] mt-10 mb-20 md:mb-10 md:ml-[300px]">

    <!-- PAGE HEADER -->
    <!-- <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-black">
                Bonafide
            </h1>
        </div>

        <div class="flex items-center gap-2 text-md font-semibold text-black">
            <span>🏠</span>
            <span>/</span>
            <span>Bonafide</span>
        </div>

    </div> -->

    <!-- CARD -->
    <div class="bg-gray-800 rounded-xl p-6">

        <!-- TITLE -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold">
                Bonafide Certificate
            </h2>
        </div>

        <hr class="border-slate-700 mb-8">

        <!-- FORM -->
      <form id="bonafideForm">

            <div class="grid md:grid-cols-3 gap-6">

                <!-- STUDENT NAME -->
                <div>
                    <label class="label">Student Name</label>
                   <select
id="student_select"
class=""
onchange="getStudentDetails(this.value)">

<option value="">
Select Student
</option>

</select>
                </div>

                <!-- PARENT NAME -->
                <div>
                    <label class="label">Parents Name</label>
                    <input type="text" id="parent_name" class="input" placeholder="parents name " readonly>
                </div>

                <!-- Course -->
<div>
<label class="text-md text-white font-bold mb-1 block">Course</label>
<input class="input" id="course" placeholder="course" readonly>
</div>
                <!-- CLASS -->
                <div>
                    <label class="label">Class Name</label>
                    <input type="text" id="student_year" class="input" placeholder="class name " readonly>
                </div>


                <!-- ADMISSION DATE -->
                <div>
                    <label class="label">Date of Admission</label>
                    <input type="date" id="admission_date" class="input" readonly>
                </div>

                <!-- DOB -->
                <div>
                    <label class="label">Date Of Birth</label>
                    <input type="date" id="date_of_birth" class="input" readonly>
                </div>

                <!-- DOB WORDS -->
                <div>
                    <label class="label">Date Of Birth (In Words)</label>
                    <input
type="text"
id="date_of_birth_words"
class="input mt-3"
readonly
placeholder="Date in words" readonly>
                </div>

                <!-- CASTE -->
                <div>
                    <label class="label">Caste</label>
                    <input type="text" id="caste" class="input" placeholder=" caste" readonly>
                </div>

                <!-- SUB CASTE -->
                <div>
                    <label class="label">Sub-Caste</label>
                    <input type="text" id="sub_caste" class="input" placeholder="Sub-caste " readonly>
                </div>

                <!-- ADDRESS -->
                <div>
                    <label class="label">Address</label>
                    <input type="text" id="full_address" class="input" placeholder="address " readonly>
                </div>

                <!-- TAHSIL -->
                <div>
                    <label class="label">Tahsil</label>
                    <input type="text" id="tahsil" class="input" placeholder="tahsil " readonly>
                </div>

                <!-- DISTRICT -->
                <div>
                    <label class="label">District</label>
                    <input type="text" id="district" class="input" placeholder="district " readonly>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-10">
                <button

type="button"

class="submit-btn"

onclick="generateBonafide()">

Generate Bonafide Certificate

</button>
            </div>

        </form>

    </div>

</div>

<?php include 'footer.php' ?>

<script src="url.js"></script>

<script>

// =========================
// PAGE LOAD
// =========================

window.onload = function(){

    getStudents();

}


function formatDateInWords(dateString){

    const date = new Date(dateString);



    const options = {

        day: 'numeric',

        month: 'long',

        year: 'numeric'

    };



    return date.toLocaleDateString(
        'en-IN',
        options
    );

}
// =========================
// FETCH ALL STUDENTS
// =========================

async function getStudents(){

    try{

        const response = await fetch(

            url + "students",

            {

                headers:{

                    "Authorization":
                    "Bearer " + localStorage.getItem("token"),

                    "Accept":"application/json"

                }

            }

        );



        const result = await response.json();

        console.log(result);



        const students =
        result.data.data;



        const select =
        document.getElementById("student_select");



        // RESET

        select.innerHTML = `

            <option value="">
                Select Student
            </option>

        `;



        students.forEach(student => {

            select.innerHTML += `

                <option value="${student.id}">

                    ${student.student_name}

                </option>

            `;

        });

        new TomSelect("#student_select",{

    create:false,

    sortField:{
        field:"text",
        direction:"asc"
    },

    placeholder:"Search Student..."

});



    }catch(error){

        console.log(error);

        alert("Failed to load students");

    }



    finally{

        document.getElementById(
            "student_select"
        ).disabled = false;

    }


}


function convertDateToWords(dateString){

    const months = [

        "January", "February", "March",
        "April", "May", "June",
        "July", "August", "September",
        "October", "November", "December"

    ];



    const numbers = [

        "Zero","One","Two","Three","Four",
        "Five","Six","Seven","Eight","Nine",
        "Ten","Eleven","Twelve","Thirteen",
        "Fourteen","Fifteen","Sixteen",
        "Seventeen","Eighteen","Nineteen",
        "Twenty","Twenty One","Twenty Two",
        "Twenty Three","Twenty Four",
        "Twenty Five","Twenty Six",
        "Twenty Seven","Twenty Eight",
        "Twenty Nine","Thirty","Thirty One"

    ];



    const date = new Date(dateString);



    const day =
    numbers[date.getDate()];



    const month =
    months[date.getMonth()];



    const year =
    date.getFullYear()
    .toString()
    .split("")
    .map(num => numbers[num])
    .join(" ");




    return `${day} ${month} ${year}`;

}
// =========================
// FETCH SINGLE STUDENT
// =========================

async function getStudentDetails(id){

    if(!id){

        return;

    }



    try{

        const response = await fetch(

            url + "students/" + id + "/bonafide",

            {

                headers:{

                    "Authorization":
                    "Bearer " + localStorage.getItem("token"),

                    "Accept":"application/json"

                }

            }

        );



        const result = await response.json();

        console.log(result);



        const student =
        result.data;



        // =========================
        // PREFILL DATA
        // =========================
document.getElementById("student_select").value =
id;


        document.getElementById("parent_name").value =
        student.parent_name || "";


        document.getElementById("course").value =
        student.course || "";

        document.getElementById("student_year").value =
        student.student_year || "";

        document.getElementById("caste").value =
        student.caste || "";

        document.getElementById("sub_caste").value =
        student.sub_caste || "";

        document.getElementById("full_address").value =
        student.full_address || "";

        document.getElementById("tahsil").value =
        student.tahsil || "";

        document.getElementById("district").value =
        student.district || "";

        document.getElementById("date_of_birth").value =
        student.date_of_birth || "";

       document.getElementById(
    "date_of_birth_words"
).value =

convertDateToWords(
    student.date_of_birth
);

         document.getElementById("admission_date").value =
        student.admission_date || "";




       



        // =========================
        // DATES
        // =========================

        document.getElementById("admission_date").value =
        student.admission_date || "";



        document.getElementById("date_of_birth").value =
        student.date_of_birth || "";



    }catch(error){

        console.log(error);

        alert("Failed to fetch student details");

    }

}
// generate bonafide certificate

function generateBonafide(){

    const studentId =

    document.getElementById(
        "student_select"
    ).value;



    if(!studentId){

        alert("Please Select Student");

        return;

    }



    // REDIRECT TO PREVIEW PAGE

    window.location.href =

    "bonafide_print.php?id=" + studentId;

}

</script>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
</body>
</html>