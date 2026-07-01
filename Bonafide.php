<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonafide Certificate - ERP</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="dist/style.css">

    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

    <style>

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