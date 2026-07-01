<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card - ERP</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="dist/style.css">

    <link
        href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
        rel="stylesheet">

    <script
        src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js">
    </script>

    <style>

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