<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Bonafide Certificate</title>

<link rel="stylesheet" href="dist/output.css">

<style>

body{

    background:#f1f5f9;

}



.certificate{

    width:900px;

    margin:auto;

    background:white;

    padding:50px;

    border:8px solid #0f172a;

    min-height:1100px;

    position:relative;

}



.watermark{

    position:absolute;

    top:50%;

    left:50%;

    transform:translate(-50%,-50%);

    opacity:.05;

    font-size:120px;

    font-weight:bold;

    color:#0f172a;

    pointer-events:none;

}



@media print{

    .no-print{

        display:none;

    }



    body{

        background:white;

    }



    .certificate{

        border:none;

        width:100%;

        min-height:auto;

    }

}

</style>

</head>

<body class="p-10">



<!-- PRINT BUTTON -->

<div class="text-center mb-6 no-print">

<button

onclick="window.print()"
class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-xl font-semibold">

Print Certificate

</button>

</div>





<!-- CERTIFICATE -->

<div class="certificate">

<div class="watermark">

BONAFIDE

</div>



<!-- HEADER -->

<div class="text-center border-b pb-6">

<img

src="images/logo.png"

class="w-24 h-24 mx-auto mb-3">



<h1 class="text-4xl font-bold text-slate-800">

SOFTGROWTH COLLEGE

</h1>



<p class="text-slate-600 mt-2">

Nagpur, Maharashtra

</p>



<h2 class="text-2xl font-bold mt-6 underline">

BONAFIDE CERTIFICATE

</h2>

</div>





<!-- CONTENT -->

<!-- CONTENT -->

<div class="mt-14 text-[20px] leading-10 text-slate-800">

<p>

This is to certify that

<span id="student_name" class="font-bold"></span>

son/daughter of

<span id="parent_name" class="font-bold"></span>

is a bonafide student of our institution studying in

<span id="course" class="font-bold"></span>

(

<span id="student_year" class="font-bold"></span>

)

during the academic year

<span id="academic_year" class="font-bold"></span>.

</p>



<p class="mt-8">

As per college records, the student's date of birth is

<span id="date_of_birth" class="font-bold"></span>

(

<span id="date_of_birth_words" class="font-bold"></span>

).

</p>



<p class="mt-8">

The student belongs to

<span id="caste" class="font-bold"></span>

caste

(

<span id="sub_caste" class="font-bold"></span>

).

</p>



<p class="mt-8">

Residential Address:

<span id="full_address" class="font-bold"></span>,

Taluka

<span id="tahsil" class="font-bold"></span>,

District

<span id="district" class="font-bold"></span>.

</p>



<p class="mt-8">

This certificate is issued upon request of the student for official purpose.

</p>

</div>


<!-- FOOTER -->

<div class="flex justify-between mt-32">

<div>

<p class="font-semibold">

Date:

<span id="today_date"></span>

</p>

</div>



<div class="text-center">

<div class="border-t border-black w-52 mx-auto mb-2"></div>

<p class="font-bold">

Principal Signature

</p>

</div>

</div>

</div>





<script src="url.js"></script>

<script>

// =========================
// GET STUDENT ID
// =========================

const params =
new URLSearchParams(window.location.search);

const studentId =
params.get("id");



// =========================
// DATE IN WORDS
// =========================

function convertDateToWords(dateString){

    const months = [

        "January","February","March",
        "April","May","June",
        "July","August","September",
        "October","November","December"

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
// LOAD DATA
// =========================

window.onload = function(){

    getBonafide();

}



// =========================
// FETCH BONAFIDE
// =========================

async function getBonafide(){

    try{

        const response = await fetch(

            url + "students/" + studentId + "/bonafide",

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



        // NAME

        document.getElementById("student_name").innerText =
        student.student_name || "";



        // PARENT

        document.getElementById("parent_name").innerText =
        student.parent_name || "";



        // COURSE

        document.getElementById("course").innerText =
        student.course || "";

        // STUDENT YEAR
        document.getElementById("student_year").innerText =
        student.student_year || "";



       // DOB NUMBER

document.getElementById(
    "date_of_birth"
).innerText =

student.date_of_birth || "";



// DOB WORDS

document.getElementById(
    "date_of_birth_words"
).innerText =

convertDateToWords(
    student.date_of_birth
);
        // CASTE
        document.getElementById("caste").innerText =
        student.caste || "";


        document.getElementById("sub_caste").innerText =
student.sub_caste || "";


document.getElementById("full_address").innerText =
student.full_address || "";

document.getElementById("tahsil").innerText =
student.tahsil || "";

document.getElementById("district").innerText =
student.district || "";
        // TODAY DATE

        document.getElementById("today_date").innerText =

        new Date().toLocaleDateString("en-IN");



    }catch(error){

        console.log(error);

        alert("Failed to load bonafide");

    }

}

</script>

</body>
</html>