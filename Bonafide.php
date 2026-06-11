<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonafide Certificate - ERP</title>

    <link rel="stylesheet" href="dist/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

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

.bonafide-card{
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

.bonafide-card::before{
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

.bonafide-card::after{
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

.bonafide-card > *{
    position:relative;
    z-index:2;
}

.bonafide-heading{
    display:flex;
    align-items:center;
    gap:16px;

    margin-bottom:30px;
    padding-bottom:20px;

    border-bottom:1px solid rgba(226,232,240,.85);
}

.bonafide-icon{
    width:58px;
    height:58px;

    display:grid;
    place-items:center;

    border-radius:20px;

    font-size:26px;

    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 18px 40px rgba(124,58,237,.28);
}

.bonafide-heading h2{
    color:#0F172A;
    font-size:26px;
    font-weight:950;
    letter-spacing:-.7px;
}

.bonafide-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
    margin-top:4px;
}

.label{
    display:block;
    color:#1E293B !important;
    font-size:13px !important;
    font-weight:950 !important;
    margin-bottom:8px !important;
}

.input{
    width:100%;
    height:52px;

    padding:0 16px;

    border-radius:18px;

    background:linear-gradient(180deg,#FFFFFF,#F8FAFC);
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
    box-shadow:0 14px 28px rgba(6,182,212,.12);
}

.input:focus{
    background:#fff;
    border-color:#7C3AED;

    box-shadow:
        0 0 0 4px rgba(124,58,237,.14),
        0 18px 35px rgba(6,182,212,.15);
}

.input:read-only{
    background:linear-gradient(180deg,#F8FAFC,#EEF2FF);
    color:#475569;
}

.submit-btn{
    position:relative;
    overflow:hidden;

    padding:14px 28px;

    border-radius:18px;

    color:#fff;
    font-size:14px;
    font-weight:950;

    background:linear-gradient(135deg,#7C3AED,#06B6D4);

    box-shadow:
        0 18px 40px rgba(124,58,237,.28);

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
    .bonafide-card{
        padding:20px;
        border-radius:24px;
    }

    .bonafide-card::after{
        border-radius:22px;
    }

    .bonafide-heading{
        gap:12px;
        margin-bottom:20px;
    }

    .bonafide-icon{
        width:46px;
        height:46px;
        border-radius:16px;
        font-size:22px;
    }

    .bonafide-heading h2{
        font-size:20px;
    }

    .input{
        height:44px;
        border-radius:14px;
        font-size:13px;
    }

    .submit-btn{
        width:100%;
        padding:13px 18px;
    }
}
    </style>
</head>

<body class="text-white ">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <div class="p-4 md:p-8 mt-10 mb-24 md:mb-10 md:ml-[300px]">

    <div class="bonafide-card">

        <!-- TITLE -->
        <div class="bonafide-heading">
            <div class="bonafide-icon">📄</div>

            <div>
                <h2>Bonafide Certificate</h2>
                <p>Generate student bonafide certificate instantly</p>
            </div>
        </div>

        <!-- FORM -->
        <form id="bonafideForm">

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="label">Student Name</label>
                    <select id="student_select" class="input" onchange="getStudentDetails(this.value)">
                        <option value="">Select Student</option>
                    </select>
                </div>

                <div>
                    <label class="label">Parents Name</label>
                    <input type="text" id="parent_name" class="input" placeholder="Parents name" readonly>
                </div>

                <div>
                    <label class="label">Course</label>
                    <input class="input" id="course" placeholder="Course" readonly>
                </div>

                <div>
                    <label class="label">Class Name</label>
                    <input type="text" id="student_year" class="input" placeholder="Class name" readonly>
                </div>

                <div>
                    <label class="label">Date of Admission</label>
                    <input type="date" id="admission_date" class="input" readonly>
                </div>

                <div>
                    <label class="label">Date Of Birth</label>
                    <input type="date" id="date_of_birth" class="input" readonly>
                </div>

                <div>
                    <label class="label">Date Of Birth (In Words)</label>
                    <input type="text" id="date_of_birth_words" class="input" readonly placeholder="Date in words">
                </div>

                <div>
                    <label class="label">Caste</label>
                    <input type="text" id="caste" class="input" placeholder="Caste" readonly>
                </div>

                <div>
                    <label class="label">Sub-Caste</label>
                    <input type="text" id="sub_caste" class="input" placeholder="Sub-caste" readonly>
                </div>

                <div>
                    <label class="label">Address</label>
                    <input type="text" id="full_address" class="input" placeholder="Address" readonly>
                </div>

                <div>
                    <label class="label">Tahsil</label>
                    <input type="text" id="tahsil" class="input" placeholder="Tahsil" readonly>
                </div>

                <div>
                    <label class="label">District</label>
                    <input type="text" id="district" class="input" placeholder="District" readonly>
                </div>

            </div>

            <div class="flex justify-center mt-10">
                <button type="button" class="submit-btn" onclick="generateBonafide()">
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

        window.onload = function() {

            getStudents();

        }


        function formatDateInWords(dateString) {

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

        async function getStudents() {

            try {

                const response = await fetch(

                    url + "students",

                    {

                        headers: {

                            "Authorization": "Bearer " + localStorage.getItem("token"),

                            "Accept": "application/json"

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

                new TomSelect("#student_select", {

                    create: false,

                    sortField: {
                        field: "text",
                        direction: "asc"
                    },

                    placeholder: "Search Student..."

                });



            } catch (error) {

                console.log(error);

                alert("Failed to load students");

            } finally {

                document.getElementById(
                    "student_select"
                ).disabled = false;

            }


        }


        function convertDateToWords(dateString) {

            const months = [

                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"

            ];



            const numbers = [

                "Zero", "One", "Two", "Three", "Four",
                "Five", "Six", "Seven", "Eight", "Nine",
                "Ten", "Eleven", "Twelve", "Thirteen",
                "Fourteen", "Fifteen", "Sixteen",
                "Seventeen", "Eighteen", "Nineteen",
                "Twenty", "Twenty One", "Twenty Two",
                "Twenty Three", "Twenty Four",
                "Twenty Five", "Twenty Six",
                "Twenty Seven", "Twenty Eight",
                "Twenty Nine", "Thirty", "Thirty One"

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

        async function getStudentDetails(id) {

            if (!id) {

                return;

            }



            try {

                const response = await fetch(

                    url + "students/" + id + "/bonafide",

                    {

                        headers: {

                            "Authorization": "Bearer " + localStorage.getItem("token"),

                            "Accept": "application/json"

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



            } catch (error) {

                console.log(error);

                alert("Failed to fetch student details");

            }

        }
        // generate bonafide certificate

        function generateBonafide() {

            const studentId =

                document.getElementById(
                    "student_select"
                ).value;



            if (!studentId) {

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