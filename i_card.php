<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ID Card - ERP</title>

<link rel="stylesheet" href="dist/output.css">
<link
href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
rel="stylesheet">

<script
src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js">
</script>

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

/* TEXTAREA */
.textarea{
    width:100%;
    min-height:120px;
    background:white;
    border:1px solid #334155;
    border-radius:10px;
    padding:14px;
    color:black;
    outline:none;
    resize:none;
    transition:0.3s;
}

.textarea:focus{
    border-color:#06b6d4;
    box-shadow:0 0 0 3px rgba(6,182,212,0.2);
}

/* LABEL */
.label{
    display:block;
    margin-bottom:8px;
    color:#cbd5e1;
    font-size:14px;
}

/* FILE INPUT */
.file-input{
    width:100%;
    padding:12px;
    background:white;
    border:1px solid #334155;
    border-radius:10px;
    color:gray;
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
.input::placeholder{
    color:#64748b;
}

/* =========================
TOM SELECT FIX
========================= */

.ts-wrapper{

    width:100%;

}



.ts-control{

    min-height:50px !important;

    border-radius:10px !important;

    border:1px solid #334155 !important;

    background:white !important;

    padding:10px 14px !important;

    box-shadow:none !important;

}



.ts-control input{

    font-size:14px !important;

    color:black !important;

}



.ts-dropdown{

    border-radius:10px !important;

    border:1px solid #334155 !important;

    overflow:hidden;

}



.ts-dropdown .option{

    padding:12px !important;

    font-size:14px !important;

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

<div class="p-[70px] mt-5 mb-10 md:ml-[300px]">


    <!-- CARD -->
    <div class="bg-gray-800 rounded-xl p-6">

        <!-- TITLE -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold">
                Student ID Card Form
            </h2>
        </div>

        <hr class="border-slate-700 mb-8">

        <!-- FORM -->
        <form>

            <div class="grid md:grid-cols-2 gap-6">

              <!-- SELECT STUDENT -->

<div>

    <label class="label">

        Select Student

    </label>

 <select
id="student_select"
>
        <option value="">

            Search Student

        </option>

    </select>

</div>

                <!-- course -->
                  <div>
                    <label class="label">Course</label>
                    <input type="text" id="course" class="input" placeholder="Enter course name">
                </div>

                
                <!-- CLASS -->
                <div>
                    <label class="label">Class</label>
                    <input type="text" id="student_year" class="input" placeholder="Enter class name">
                </div>

                <!-- DOB -->
                <div>
                    <label class="label">Date of Birth</label>
                    <input type="date" id="date_of_birth" class="input">
                </div>

                <!-- PHONE -->
                <div>
                    <label class="label">Phone Number</label>
                    <input type="number" id="student_phone" class="input" placeholder="Enter phone number">
                </div>


                <!-- BLOOD GROUP -->
                <div>
                    <label class="label">Blood Group</label>

                    <select class="input" id="blood_group">
                        <option value="">-- Select Blood Group --</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>

                <!-- ADDRESS -->
                <div class="md:col-span-2">
                    <label class="label">Address</label>
                    <textarea class="textarea input" id="full_address" placeholder="Enter address"></textarea>
                </div>

                <!-- PHOTO -->
              <div>

    <label class="label">

        Photo

    </label>

    <img

    id="photoPreview"

    src="images/default-user.png"

    class="w-32 h-32 rounded-xl
    object-cover border border-slate-700">

</div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-10">
               <button type="button" class="submit-btn">
                    Generate ID Card
                </button>
            </div>

        </form>

    </div>

</div>

<?php include 'footer.php' ?>


<script src="url.js"></script>

<script>

let tomSelectInstance;



window.onload = function(){

    getStudents();

}



// =========================
// FETCH STUDENTS
// =========================

async function getStudents(){

    try{

        const response = await fetch(

            url + "students",

            {

                headers:{

                    "Authorization":
                    "Bearer " +
                    localStorage.getItem("token"),

                    "Accept":
                    "application/json"

                }

            }

        );



        const result =
        await response.json();



        console.log(result);



        const students =
        result.data.data;



        const select =
        document.getElementById(
            "student_select"
        );



        students.forEach(student => {

            select.innerHTML += `

                <option value="${student.id}">

                    ${student.student_name}

                </option>

            `;

        });



        // TOM SELECT

        tomSelectInstance =
        new TomSelect(

            "#student_select",

            {

                create:false,

                sortField:{
                    field:"text",
                    direction:"asc"
                }

            }

        );



        // CHANGE EVENT

       tomSelectInstance.on(

    "change",

    function(value){

        getStudentData(value);

    }

);



    }catch(error){

        console.log(error);

    }

}



// =========================
// FETCH SINGLE STUDENT
// =========================

async function getStudentData(id){

    try{

        const response = await fetch(

            url + "students/" + id,

            {

                headers:{

                    "Authorization":
                    "Bearer " +
                    localStorage.getItem("token"),

                    "Accept":
                    "application/json"

                }

            }

        );



        const result =
        await response.json();



        console.log(result);



        const student =
        result.data;



        // FILL DATA

      


        document.getElementById(
            "course"
        ).value =
        student.course || "";



        document.getElementById(
            "student_year"
        ).value =
        student.student_year || "";



        document.getElementById(
            "date_of_birth"
        ).value =
        student.date_of_birth || "";



        document.getElementById(
            "student_phone"
        ).value =
        student.student_phone || "";



        document.getElementById(
            "blood_group"
        ).value =
        student.blood_group || "";

        document.getElementById(
    "full_address"
).value =
student.full_address || "";



        // PHOTO PREVIEW

        if(student.passport_photo){

            document.getElementById(
                "photoPreview"
            ).src =

            baseUrl +
            "storage/" +
            student.passport_photo;

        }



    }catch(error){

        console.log(error);

    }

}

</script>

</body>
</html>