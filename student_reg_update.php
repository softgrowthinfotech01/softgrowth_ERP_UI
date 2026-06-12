<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration V2 - ERP</title>

    <link rel="stylesheet" href="dist/output.css">

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
        }



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




        /* STEP  CSS */



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
   STUDENT REGISTRATION PAGE SET FIX
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
#main{
    flex:1;

    margin-left:300px !important;

    padding-top:125px !important;
    padding-left:25px !important;
    padding-right:25px !important;
    padding-bottom:25px !important;

    max-width:none !important;
    width:calc(100% - 300px) !important;
}

/* CENTER CONTENT */
#main > .step-box,
#main > .flex,
#main > .step-box + .flex{
    max-width:1250px;
    width:80%;
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

    margin-top:auto !important;
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

    #main{
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
/* =========================
   MOBILE VIEW
========================= */

@media(max-width:768px){

    body{
        background-attachment:scroll !important;
        overflow-x:hidden !important;
    }

    /* MAIN CONTENT */
    #main{
        margin-left:20px !important;

        width:90% !important;
        max-width:100% !important;

        padding-top:95px !important;
        padding-left:6px !important;
        padding-right:6px !important;
        padding-bottom:12px !important;
    }

    /* STEP INDICATOR */
    .step{
        width:34px !important;
        height:34px !important;
        font-size:13px !important;
    }

    .line{
        height:2px !important;
    }

    /* CARD */
    .step-box{
        width:100% !important;
        max-width:100% !important;

        padding:16px !important;

        border-radius:20px !important;
    }

    .step-box::after{
        border-radius:18px !important;
    }

    /* TITLE */
    .step-box h2{
        font-size:18px !important;
        line-height:1.3 !important;
        margin-bottom:18px !important;
    }

    /* FORM GRID */
    .grid{
        gap:12px !important;
    }

    /* LABEL */
    label{
        font-size:12px !important;
        margin-bottom:5px !important;
    }

    /* INPUTS */
    .input{
        width:100% !important;
        height:42px !important;

        padding:0 12px !important;

        font-size:13px !important;

        border-radius:12px !important;
    }

    select.input{
        height:42px !important;
    }

    textarea.input{
        min-height:90px !important;
        padding:10px 12px !important;
    }

    /* FILE INPUT */
    input[type="file"].input{
        height:auto !important;
        padding:8px !important;
    }

    input[type="file"]::file-selector-button{
        padding:8px 12px !important;
        font-size:12px !important;
        border-radius:8px !important;
    }

    /* BUTTONS */
    #next,
    #prev,
    .submit-btn{
        width:100% !important;

        height:42px !important;

        font-size:13px !important;
        font-weight:700 !important;

        border-radius:12px !important;
    }

    /* BUTTON WRAPPER */
    .flex.justify-between{
        gap:10px !important;
        flex-direction:column !important;
    }

    /* PHOTO PREVIEW */
    #photoPreview{
        width:90px !important;
        height:90px !important;
    }

    /* FOOTER */
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
        padding:0 !important;
    }

    .erp-footer-wrap,
    .erp-footer-inner{
        width:100% !important;
        max-width:100% !important;

        padding:8px !important;

        border-radius:20px 20px 0 0 !important;
    }

    .erp-footer-left{
        text-align:center !important;
    }

    .erp-footer-right{
        justify-content:center !important;
        flex-wrap:wrap !important;
        gap:8px !important;
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

    <div id="main"
        class="md:ml-[300px] transition-all main duration-300  mt-14 mb-20 md:mb-5 md:mt-5 p-4 md:p-[70px] max-w-6xl mx-auto">



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

<label class="text-md text-white font-bold mb-1 block">
Student Year
</label>

<select class="input" id="student_year">

<option value="">
Select Year
</option>

<option value="First Year">
1st Year
</option>

<option value="Second Year">
2nd Year
</option>

<option value="Third Year">
3rd Year
</option>

</select>


</div>

                <!-- Course -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Course</label>
                    <select class="input" id="course">
                        <option value="">Select Course</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                    </select>
                </div>

                <!-- Student Name -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Student Name</label>
                    <input class="input" type="text" id="student_name" placeholder="Enter student name">
                </div>

                <!-- Parent Name -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Parent Name</label>
                    <input class="input" type="text" id="parent_name" placeholder="Enter parent name">
                </div>

                <!-- Caste -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Caste</label>
                    <input class="input" type="text" id="caste" placeholder="Enter caste">
                </div>

                <div>
                    <label class="text-md text-white font-bold mb-1 block">Sub-Caste</label>
                    <input class="input" type="text" id="sub_caste" placeholder="Enter sub-caste">
                </div>

                <!-- Admission Date -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Admission Date</label>
                    <input class="input" type="date" id="admission_date">
                </div>

                <!-- Aadhaar -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Aadhaar Number</label>
                    <input class="input" type="text" id="aadhaar_number" placeholder="XXXX-XXXX-XXXX">
                </div>

                <!-- ABC ID -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">ABC ID</label>
                    <input class="input" type="text" id="abc_id" placeholder="Enter ABC ID">
                </div>

                <!-- DOB -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Date of Birth</label>
                    <input class="input" type="date" id="date_of_birth">
                </div>

                <!-- Place of Birth -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Place of Birth</label>
                    <input class="input" type="text" id="place_of_birth" placeholder="Enter place of birth">
                </div>
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Gender</label>
                    <select class="input" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <!-- PHOTO -->
                <div class="md:col-span-2">
                    <label class="text-md text-white font-bold mb-1 block">Passport Photo</label>
                    <input type="file" id="photo"
                        class="input file:bg-red-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-red-600 cursor-pointer">
                    <img id="photoPreview" class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">
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
                    <input type="file" id="tc_certificate"
                        class="input file:bg-cyan-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-cyan-600 cursor-pointer">
                    <img id="tcPreview" class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">
                </div>

                <!-- 10th Marksheet -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">10th Marksheet</label>
                    <input type="file" id="marksheet_10"
                        class="input file:bg-indigo-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-indigo-600 cursor-pointer">
                    <img id="marksheet10Preview" class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">
                </div>

                <!-- 12th Marksheet -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">12th Marksheet</label>
                    <input type="file" id="marksheet_12"
                        class="input file:bg-purple-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-purple-600 cursor-pointer">
                    <img id="marksheet12Preview" class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">
                </div>

                <!-- Other Academic Docs -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Other Academic Documents</label>
                    <input type="file" id="other_academic_docs"
                        class="input file:bg-sky-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-sky-600 cursor-pointer">
                    <img id="otherAcademicDocsPreview"
                        class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">
                </div>

                <!-- Caste Certificate -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Caste Certificate</label>
                    <input type="file" id="caste_certificate"
                        class="input file:bg-emerald-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-emerald-600 cursor-pointer">
                    <img id="castePreview" class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">
                </div>

                <!-- Domicile Certificate -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Domicile Certificate</label>
                    <input type="file" id="domicile_certificate"
                        class="input file:bg-pink-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-pink-600 cursor-pointer">
                    <img id="domicilePreview" class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">
                </div>

                <!-- Non Creamy Layer -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Non-Creamy Layer Certificate</label>
                    <input type="file" id="non_creamy_layer"
                        class="input file:bg-amber-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-amber-600 cursor-pointer">
                    <img id="nonCreamyLayerPreview"
                        class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">
                </div>

                <!-- Other Documents -->
                <div>
                    <label class="text-md text-white font-bold mb-1 block">Other Documents</label>
                    <input type="file" id="other_documents"
                        class="input file:bg-red-500 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 hover:file:bg-red-600 cursor-pointer">
                    <img id="otherDocumentsPreview"
                        class="w-10 h-10 object-cover rounded-lg mt-2 border border-slate-700">

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
                            <option value="">Select Blood Group</option>
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

                    <h3 class="text-md text-white font-bold mb-3 block">
                        Semester Pattern
                    </h3>

                    <div class="grid md:grid-cols-3 gap-4">

                        <!-- First Year -->
                        <div
                            class="p-4 rounded-xl bg-gradient-to-br from-green-400 via-black/50 to-green-300 border border-slate-700">

                            <p class="font-semibold text-white mb-3">
                                First Year
                            </p>

                            <label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer transition">

                                <input type="radio" name="semester" value="FY Semester 1"
                                    class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500">

                                <span class="text-gray-600">
                                    Semester 1
                                </span>

                            </label>

                            <label
                                class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer transition mt-2">

                                <input type="radio" name="semester" value="FY Semester 2"
                                    class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500">

                                <span class="text-gray-600">
                                    Semester 2
                                </span>

                            </label>

                        </div>



                        <!-- Second Year -->
                        <div
                            class="p-4 rounded-xl bg-gradient-to-br from-violet-400 via-black/50 to-violet-300 border border-slate-700">

                            <p class="font-semibold text-white mb-3">
                                Second Year
                            </p>

                            <label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer transition">

                                <input type="radio" name="semester" value="SY Semester 3"
                                    class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500">

                                <span class="text-gray-600">
                                    Semester 3
                                </span>

                            </label>

                            <label
                                class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer transition mt-2">

                                <input type="radio" name="semester" value="SY Semester 4"
                                    class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500">

                                <span class="text-gray-600">
                                    Semester 4
                                </span>

                            </label>

                        </div>



                        <!-- Third Year -->
                        <div
                            class="p-4 rounded-xl bg-gradient-to-br from-pink-400 via-black/50 to-pink-300 border border-slate-700">

                            <p class="font-semibold text-white mb-3">
                                Third Year
                            </p>

                            <label class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer transition">

                                <input type="radio" name="semester" value="TY Semester 5"
                                    class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500">

                                <span class="text-gray-600">
                                    Semester 5
                                </span>

                            </label>

                            <label
                                class="flex items-center gap-3 p-3 rounded-lg bg-white cursor-pointer transition mt-2">

                                <input type="radio" name="semester" value="TY Semester 6"
                                    class="w-4 h-4 border border-slate-400 bg-white accent-cyan-500">

                                <span class="text-gray-600">
                                    Semester 6
                                </span>

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


    <script src="url.js"></script>

    <script>

        window.onload = function () {

            getStudent();

        }



        const params =
            new URLSearchParams(window.location.search);

        const studentId =
            params.get("id");



        async function getStudent() {

            try {

                const response = await fetch(

                    url + "students/" + studentId,

                    {

                        headers: {

                            "Authorization":
                                "Bearer " + localStorage.getItem("token"),

                            "Accept": "application/json"

                        }

                    }

                );



                const result = await response.json();

                console.log(result);



                const student = result.data;



                console.log(student);

                document.getElementById("student_batch").value =
                    student.student_batch || "";

              let yearValue = student.student_year;



if(yearValue === "1st Year"){

    yearValue = "First Year";

}



if(yearValue === "2nd Year"){

    yearValue = "Second Year";

}



if(yearValue === "3rd Year"){

    yearValue = "Third Year";

}



document.getElementById("student_year").value =
yearValue;

                document.getElementById("course").value =
                    student.course || "";

                document.getElementById("student_name").value =
                    student.student_name || "";

                document.getElementById("parent_name").value =
                    student.parent_name || "";

                document.getElementById("caste").value =
                    student.caste || "";

                document.getElementById("sub_caste").value =
                    student.sub_caste || "";

                document.getElementById("admission_date").value =
                    student.admission_date || "";

                document.getElementById("aadhaar_number").value =
                    student.aadhaar_number || "";

                document.getElementById("abc_id").value =
                    student.abc_id || "";

                document.getElementById("date_of_birth").value =
                    student.date_of_birth || "";

                document.getElementById("place_of_birth").value =
                    student.place_of_birth || "";

                document.getElementById("gender").value =
                    student.gender || "";

                document.getElementById("full_fees").value =
                    student.full_fees || "";

                document.getElementById("admission_fees").value =
                    student.admission_fees || "";

                document.getElementById("student_phone").value =
                    student.student_phone || "";

                document.getElementById("parent_phone").value =
                    student.parent_phone || "";

                document.getElementById("blood_group").value =
                    student.blood_group || "";

                document.getElementById("tahsil").value =
                    student.tahsil || "";

                document.getElementById("district").value =
                    student.district || "";

                document.getElementById("full_address").value =
                    student.full_address || "";

                const semesterRadios = document.getElementsByName("semester");

                semesterRadios.forEach(radio => {

                    if (radio.value === student.semester_pattern) {

                        radio.checked = true;

                    }
                });

                document.getElementById("photoPreview").src =
                    baseUrl + "storage/" + student.passport_photo;

                document.getElementById("tcPreview").src =
                    baseUrl + "storage/" + student.tc_certificate;

                document.getElementById("marksheet10Preview").src =
                    baseUrl + "storage/" + student.marksheet_10;

                document.getElementById("marksheet12Preview").src =
                    baseUrl + "storage/" + student.marksheet_12;

                document.getElementById("otherAcademicDocsPreview").src =
                    baseUrl + "storage/" + student.other_academic_documents;

                document.getElementById("castePreview").src =
                    baseUrl + "storage/" + student.caste_certificate;

                document.getElementById("domicilePreview").src =
                    baseUrl + "storage/" + student.domicile_certificate;

                document.getElementById("nonCreamyLayerPreview").src =
                    baseUrl + "storage/" + student.non_creamy_layer_certificate;

                document.getElementById("otherDocumentsPreview").src =
                    baseUrl + "storage/" + student.other_documents;

            } catch (error) {

                console.log(error);

            }

        }


        async function updateStudent() {

            try {

                const formData = new FormData();



                formData.append("_method", "PUT");



                formData.append(
                    "student_name",
                    document.getElementById("student_name").value
                );



                formData.append(
                    "student_batch",
                    document.getElementById("student_batch").value
                );



                formData.append(
                    "student_year",
                    document.getElementById("student_year").value
                );

                
                formData.append(
                    "course",
                    document.getElementById("course").value
                );



                formData.append(
                    "parent_name",
                    document.getElementById("parent_name").value
                );



                formData.append(
                    "gender",
                    document.getElementById("gender").value
                );



                formData.append(
                    "caste",
                    document.getElementById("caste").value
                );



                formData.append(
                    "sub_caste",
                    document.getElementById("sub_caste").value
                );



                formData.append(
                    "admission_date",
                    document.getElementById("admission_date").value
                );



                formData.append(
                    "aadhaar_number",
                    document.getElementById("aadhaar_number").value
                );



                formData.append(
                    "abc_id",
                    document.getElementById("abc_id").value
                );



                formData.append(
                    "date_of_birth",
                    document.getElementById("date_of_birth").value
                );



                formData.append(
                    "place_of_birth",
                    document.getElementById("place_of_birth").value
                );



                formData.append(
                    "full_fees",
                    document.getElementById("full_fees").value
                );



                formData.append(
                    "admission_fees",
                    document.getElementById("admission_fees").value
                );



                formData.append(
                    "student_phone",
                    document.getElementById("student_phone").value
                );



                formData.append(
                    "parent_phone",
                    document.getElementById("parent_phone").value
                );



                formData.append(
                    "blood_group",
                    document.getElementById("blood_group").value
                );



                formData.append(
                    "tahsil",
                    document.getElementById("tahsil").value
                );



                formData.append(
                    "district",
                    document.getElementById("district").value
                );



                formData.append(
                    "full_address",
                    document.getElementById("full_address").value
                );

                const semesterRadios = document.getElementsByName("semester");
                semesterRadios.forEach(radio => {

                    if (radio.checked) {

                        formData.append("semester_pattern", radio.value);

                    }
                }); 


                document.getElementById("photo").files[0] &&
                    formData.append(
                        "passport_photo",
                        document.getElementById("photo").files[0]
                    );

                    document.getElementById("tc_certificate").files[0] &&
                    formData.append(
                        "tc_certificate",
                        document.getElementById("tc_certificate").files[0]
                    );

                document.getElementById("marksheet_10").files[0] &&
                    formData.append(
                        "marksheet_10",
                        document.getElementById("marksheet_10").files[0]
                    );

                    document.getElementById("marksheet_12").files[0] &&
                    formData.append(
                        "marksheet_12",
                        document.getElementById("marksheet_12").files[0]
                    );

                document.getElementById("other_academic_docs").files[0] &&
                    formData.append(
                        "other_academic_documents",
                        document.getElementById("other_academic_docs").files[0]
                    );      

                document.getElementById("caste_certificate").files[0] &&
                    formData.append(
                        "caste_certificate",
                        document.getElementById("caste_certificate").files[0]
                    );

                document.getElementById("domicile_certificate").files[0] &&
                    formData.append(
                        "domicile_certificate",
                        document.getElementById("domicile_certificate").files[0]
                    );


                document.getElementById("non_creamy_layer").files[0] &&
                    formData.append(    
                        "non_creamy_layer_certificate",
                        document.getElementById("non_creamy_layer").files[0]
                    );

                document.getElementById("other_documents").files[0] &&
                    formData.append(
                        "other_documents",
                        document.getElementById("other_documents").files[0]
                    );  




                const response = await fetch(

                    url + "students/" + studentId,

                    {

                        method: "POST",

                        headers: {

                            "Authorization":
                                "Bearer " + localStorage.getItem("token"),

                            "Accept": "application/json"

                        },

                        body: formData

                    }

                );


const result = await response.json();

console.log(result);



// ================= SUCCESS =================

if(response.ok){

    alert("Student Updated Successfully ✅");

    window.location.href =
    "student_record";

}



// ================= VALIDATION ERRORS =================

else if(response.status === 422){

    let errorMessage = "";



    // LOOP ALL ERRORS

    Object.keys(result.errors).forEach(key => {

        errorMessage +=
        result.errors[key][0] + "\n";

    });



    alert(errorMessage);

}



// ================= OTHER ERRORS =================

else{

    alert(result.message || "Something went wrong");

}



           }catch(error){

    console.log(error);

    alert("Server Error ❌");

}
        }
        // ================= STEPER =================

        let step = 1;

        const next =
            document.getElementById("next");

        const prev =
            document.getElementById("prev");



        function show(n) {

            document.querySelectorAll(".step-box")
                .forEach(e => e.classList.remove("active"));



            document.getElementById("step" + n)
                .classList.add("active");



            for (let i = 1; i <= 3; i++) {

                document.getElementById("s" + i)
                    .classList.remove("active");

            }



            for (let i = 1; i < n; i++) {

                document.getElementById("l" + i)
                    .classList.add("active");

            }



            for (let i = 1; i <= n; i++) {

                document.getElementById("s" + i)
                    .classList.add("active");

            }



            prev.classList.toggle(
                "hidden",
                n === 1
            );



            next.innerText =
                n === 3 ? "Update" : "Next";

        }



        next.onclick = () => {

            if (step === 3) {

                updateStudent();

                return;

            }



            step++;

            show(step);

        }



        prev.onclick = () => {

            step--;

            show(step);

        }



        show(step);

    </script>
</body>

</html>