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
            padding: 70px;
        }
        .idcard-form-card{
    position:relative;
    overflow:hidden;

    padding:22px;
    border-radius:26px;

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


.idcard-form-card::after{
    content:"";
    position:absolute;
    inset:2px;
    z-index:0;

    border-radius:24px;

    background:
        linear-gradient(135deg,
            rgba(255,255,255,.95),
            rgba(245,243,255,.90),
            rgba(240,249,255,.88)
        );
}

.idcard-form-card > *{
    position:relative;
    z-index:2;
}

.idcard-heading{
    display:flex;
    align-items:center;
    gap:14px;

    margin-bottom:22px;
    padding-bottom:16px;

    border-bottom:1px solid rgba(226,232,240,.85);
}

.idcard-icon{
    width:48px;
    height:48px;

    display:grid;
    place-items:center;

    border-radius:16px;

    font-size:22px;

    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 16px 34px rgba(124,58,237,.28);
}

.idcard-heading h2{
    color:#0F172A;
    font-size:22px;
    font-weight:950;
    letter-spacing:-.6px;
}

.idcard-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
    margin-top:3px;
}

.label{
    display:block;
    color:#1E293B !important;
    font-size:13px;
    font-weight:950;
    margin-bottom:7px;
}

.input{
    width:100%;
    height:44px;

    padding:0 14px;

    border-radius:14px;

    background:linear-gradient(180deg,#FFFFFF,#F8FAFC);
    border:1px solid rgba(203,213,225,.88);

    color:#0F172A;
    font-size:13px;
    font-weight:750;

    outline:none;
    transition:.28s ease;

    box-shadow:
        0 8px 20px rgba(15,23,42,.06),
        inset 0 1px 0 rgba(255,255,255,1);
}

.textarea.input{
    height:90px;
    padding:13px 14px;
    resize:none;
}

.input::placeholder{
    color:#94A3B8;
}

.input:hover{
    transform:translateY(-1px);
    border-color:#67E8F9;
    box-shadow:0 12px 25px rgba(6,182,212,.12);
}

.input:focus{
    background:#fff;
    border-color:#7C3AED;

    box-shadow:
        0 0 0 4px rgba(124,58,237,.14),
        0 16px 30px rgba(6,182,212,.15);
}

/* PHOTO */
.photo-box{
    display:flex;
    flex-direction:column;
    gap:8px;
}

.photo-preview-wrap{
    width:120px;
    height:120px;

    padding:5px;

    border-radius:24px;

    background:
        linear-gradient(135deg,#7C3AED,#06B6D4,#22C55E);

    box-shadow:
        0 18px 35px rgba(124,58,237,.22);
}

.photo-preview{
    width:100%;
    height:100%;

    object-fit:cover;
    border-radius:20px;

    background:#fff;
    border:3px solid #fff;
}

/* BUTTON */
.submit-btn{
    position:relative;
    overflow:hidden;

    padding:12px 26px;

    border-radius:16px;

    color:#fff;
    font-size:13px;
    font-weight:950;

    background:linear-gradient(135deg,#7C3AED,#06B6D4);

    box-shadow:0 18px 40px rgba(124,58,237,.28);

    transition:.3s ease;
}

.submit-btn::before{
    content:"";
    position:absolute;
    top:0;
    left:-100%;

    width:100%;
    height:100%;

    background:linear-gradient(90deg,transparent,rgba(255,255,255,.35),transparent);
    transition:.5s ease;
}

.submit-btn:hover{
    transform:translateY(-3px) scale(1.02);
    box-shadow:0 24px 50px rgba(6,182,212,.30);
}

.submit-btn:hover::before{
    left:100%;
}

@keyframes spinGlow{
    to{
        transform:rotate(360deg);
    }
}

@media(max-width:768px){
    .idcard-form-card{
        padding:18px;
        border-radius:22px;
    }

    .idcard-form-card::after{
        border-radius:20px;
    }

    .idcard-heading{
        gap:12px;
        margin-bottom:18px;
    }

    .idcard-icon{
        width:42px;
        height:42px;
        border-radius:14px;
        font-size:20px;
    }

    .idcard-heading h2{
        font-size:19px;
    }

    .input{
        height:42px;
        border-radius:13px;
    }

    .textarea.input{
        height:80px;
    }

    .photo-preview-wrap{
        width:100px;
        height:100px;
        border-radius:20px;
    }

    .photo-preview{
        border-radius:16px;
    }

    .submit-btn{
        width:100%;
        padding:12px 18px;
    }
}


/* ===================================
   ERP PAGE LAYOUT FIX
=================================== */

html,
body{
    margin:0;
    padding:0;
    min-height:100%;
    overflow-x:hidden;
}

/* PAGE CONTENT */
.p-4.md\:p-8.mt-10.mb-24.md\:mb-10.md\:ml-\[300px\]{

    margin-left:300px !important;

    margin-top:0 !important;
    margin-bottom:0 !important;

    padding-top:120px !important;
    padding-left:35px !important;
    padding-right:35px !important;
    padding-bottom:25px !important;

    min-height:calc(100vh - 180px);
}

/* CARD */
.idcard-form-card{
    width:100%;
    max-width:1280px;
    margin:0 auto;
}

/* HEADER */
.erp-header{
    z-index:9999 !important;
}

/* SIDEBAR */
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

    padding:0 !important;
    margin-top:0 !important;
}

.erp-footer-wrap,
.erp-footer-inner{
    margin:0 !important;
    border-radius:30px 30px 0 0 !important;
}

/* TABLET */
@media(max-width:1024px){

    .p-4.md\:p-8.mt-10.mb-24.md\:mb-10.md\:ml-\[300px\]{

        margin-left:0 !important;

        padding-top:105px !important;
        padding-left:14px !important;
        padding-right:14px !important;
        padding-bottom:15px !important;

        min-height:auto;
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

    .p-4.md\:p-8.mt-10.mb-24.md\:mb-10.md\:ml-\[300px\]{

        margin-left:0 !important;

        padding-top:95px !important;
        padding-left:10px !important;
        padding-right:10px !important;
        padding-bottom:12px !important;
    }

    .idcard-form-card{
        width:100% !important;
        max-width:100% !important;

        padding:18px !important;
        border-radius:22px !important;
    }

    .idcard-form-card::after{
        border-radius:20px !important;
    }

    .idcard-heading{
        gap:12px !important;
        margin-bottom:18px !important;
    }

    .idcard-icon{
        width:42px !important;
        height:42px !important;
        min-width:42px !important;
        font-size:20px !important;
    }

    .photo-preview-wrap{
        width:95px !important;
        height:95px !important;
    }

    .submit-btn{
        width:100% !important;
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

/* MOBILE MENU BUTTON FIX */
.erp-menu-btn{
    display:none !important;
}

@media(max-width:1023px){
    .erp-menu-btn{
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;

        position:fixed !important;
        top:18px !important;
        left:14px !important;

        width:46px !important;
        height:46px !important;

        z-index:100000 !important;

        border-radius:14px !important;
        background:#000 !important;
        color:#fff !important;

        font-size:24px !important;
        font-weight:900 !important;

        box-shadow:0 12px 30px rgba(0,0,0,.35) !important;
    }
}
    </style>
</head>

<body class="text-white ">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <div class="p-4 md:p-8 mt-10 mb-24 md:mb-10 md:ml-[300px]">

    <div class="idcard-form-card">

        <div class="idcard-heading">
            <div class="idcard-icon">🆔</div>

            <div>
                <h2>Student ID Card Form</h2>
                <p>Generate student identity card details</p>
            </div>
        </div>

        <form>

            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    <label class="label">Select Student</label>
                    <select id="student_select" class="input">
                        <option value="">Search Student</option>
                    </select>
                </div>

                <div>
                    <label class="label">Course</label>
                    <input type="text" id="course" class="input" placeholder="Enter course name">
                </div>

                <div>
                    <label class="label">Class</label>
                    <input type="text" id="student_year" class="input" placeholder="Enter class name">
                </div>

                <div>
                    <label class="label">Date of Birth</label>
                    <input type="date" id="date_of_birth" class="input">
                </div>

                <div>
                    <label class="label">Phone Number</label>
                    <input type="number" id="student_phone" class="input" placeholder="Enter phone number">
                </div>

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

                <div class="md:col-span-2">
                    <label class="label">Address</label>
                    <textarea class="textarea input" id="full_address" placeholder="Enter address"></textarea>
                </div>

                <div class="photo-box">
                    <label class="label">Photo</label>

                    <div class="photo-preview-wrap">
                        <img
                        id="photoPreview"
                        src="images/default-user.png"
                        class="photo-preview">
                    </div>
                </div>

            </div>

            <div class="flex justify-center mt-8">
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



        window.onload = function() {

            getStudents();

        }



        // =========================
        // FETCH STUDENTS
        // =========================

        async function getStudents() {

            try {

                const response = await fetch(

                    url + "students",

                    {

                        headers: {

                            "Authorization": "Bearer " +
                                localStorage.getItem("token"),

                            "Accept": "application/json"

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

                            create: false,

                            sortField: {
                                field: "text",
                                direction: "asc"
                            }

                        }

                    );



                // CHANGE EVENT

                tomSelectInstance.on(

                    "change",

                    function(value) {

                        getStudentData(value);

                    }

                );



            } catch (error) {

                console.log(error);

            }

        }



        // =========================
        // FETCH SINGLE STUDENT
        // =========================

        async function getStudentData(id) {

            try {

                const response = await fetch(

                    url + "students/" + id,

                    {

                        headers: {

                            "Authorization": "Bearer " +
                                localStorage.getItem("token"),

                            "Accept": "application/json"

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

                if (student.passport_photo) {

                    document.getElementById(
                            "photoPreview"
                        ).src =

                        baseUrl +
                        "storage/" +
                        student.passport_photo;

                }



            } catch (error) {

                console.log(error);

            }

        }
    </script>

</body>

</html>