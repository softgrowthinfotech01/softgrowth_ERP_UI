<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bonafide Certificate - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
  /* minimal custom styles – everything else is Tailwind */
        .input-readonly:read-only {
            background-color: #f8fafc;
            color: #475569;
        }
        .submit-btn {
            transition: all 0.2s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 12px 30px rgba(15, 118, 110, 0.3);
        }
        /* select custom styling – keep consistent */
        select.input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        /* responsive table wrapper (if any) – not needed here */
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>
<main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== BONAFIDE CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-300 overflow-hidden">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-gray-900">Bonafide Certificate</h2>
                    <p class="text-sm text-gray-500">Generate student bonafide certificate instantly</p>
                </div>
            </div>

            <!-- Form -->
            <form id="bonafideForm" class="p-6 space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Student Name (select) -->
                    <div>
                        <label class="block text-sm font-bold  text-gray-700 mb-1">Student Name</label>
                        <select id="student_select" class="input w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" onchange="getStudentDetails(this.value)">
                            <option value="">Select Student</option>
                            <!-- options populated by JS -->
                        </select>
                    </div>

                    <!-- Parents Name (readonly) -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Parents Name</label>
                        <input type="text" id="parent_name" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="Parents name" readonly />
                    </div>

                    <!-- Course -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student Class</label>
                        <input type="text" id="course" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="Student Class" readonly />
                    </div>

                    <!-- Class Name -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Student Section</label>
                        <input type="text" id="student_year" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="Student Section" readonly />
                    </div>

                    <!-- Date of Admission -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Date of Admission</label>
                        <input type="date" id="admission_date" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" readonly />
                    </div>

                    <!-- Date Of Birth -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Date Of Birth</label>
                        <input type="date" id="date_of_birth" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" readonly />
                    </div>

                    <!-- Date Of Birth (In Words) -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Date Of Birth (In Words)</label>
                        <input type="text" id="date_of_birth_words" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="Date in words" readonly />
                    </div>

                    <!-- Caste -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Caste</label>
                        <input type="text" id="caste" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="Caste" readonly />
                    </div>

                    <!-- Sub-Caste -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Sub-Caste</label>
                        <input type="text" id="sub_caste" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="Sub-caste" readonly />
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Address</label>
                        <input type="text" id="full_address" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="Address" readonly />
                    </div>

                    <!-- Tahsil -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Tahsil</label>
                        <input type="text" id="tahsil" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="Tahsil" readonly />
                    </div>

                    <!-- District -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">District</label>
                        <input type="text" id="district" class="input-readonly w-full rounded-xl border border-gray-300 bg-gray-50 text-gray-600 py-2.5 px-4" placeholder="District" readonly />
                    </div>

                </div>

                <!-- Generate Button -->
                <div class="flex justify-center pt-4">
                    <button type="button" class="submit-btn bg-teal-600 text-white font-bold py-3 px-8 rounded-xl shadow-md hover:bg-teal-700 focus:ring-2 focus:ring-teal-300" onclick="generateBonafide()">
                        <i class="fas fa-print mr-2"></i> Generate Bonafide Certificate
                    </button>
                </div>

            </form>

        </div>

    </main>

    <?php include 'footer.php' ?>

    <script src="url.js"></script>



    
    <!-- ============================================================
    JAVASCRIPT – student data and form handling
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ----- SAMPLE STUDENT DATA -----
            const students = [{
                id: 1,
                name: 'Rahul Sharma',
                parent: 'Mr. Rajesh Sharma',
                course: 'BCA',
                year: 'First Year',
                admission: '2024-07-01',
                dob: '2005-06-15',
                dobWords: 'Fifteenth June, Two Thousand Five',
                caste: 'General',
                subCaste: '—',
                address: '123, Andheri East, Mumbai - 400093',
                tahsil: 'Andheri',
                district: 'Mumbai'
            }, {
                id: 2,
                name: 'Priya Patel',
                parent: 'Mr. Manoj Patel',
                course: 'BBA',
                year: 'Second Year',
                admission: '2024-08-10',
                dob: '2004-11-20',
                dobWords: 'Twentieth November, Two Thousand Four',
                caste: 'OBC',
                subCaste: '—',
                address: '45, Kothrud, Pune - 411038',
                tahsil: 'Kothrud',
                district: 'Pune'
            }, {
                id: 3,
                name: 'Amit Singh',
                parent: 'Mr. Suresh Singh',
                course: 'BCA',
                year: 'Third Year',
                admission: '2023-06-20',
                dob: '2003-09-05',
                dobWords: 'Fifth September, Two Thousand Three',
                caste: 'SC',
                subCaste: '—',
                address: '67, Dwarka Sector 12, Delhi - 110075',
                tahsil: 'Dwarka',
                district: 'Delhi'
            }];

            const select = document.getElementById('student_select');

            // Populate select
            students.forEach(s => {
                const opt = document.createElement('option');
                opt.value = s.id;
                opt.textContent = s.name;
                select.appendChild(opt);
            });

            // Expose function to fill details
            window.getStudentDetails = function(id) {
                const student = students.find(s => s.id == id);
                if (!student) {
                    // Clear fields
                    document.getElementById('parent_name').value = '';
                    document.getElementById('course').value = '';
                    document.getElementById('student_year').value = '';
                    document.getElementById('admission_date').value = '';
                    document.getElementById('date_of_birth').value = '';
                    document.getElementById('date_of_birth_words').value = '';
                    document.getElementById('caste').value = '';
                    document.getElementById('sub_caste').value = '';
                    document.getElementById('full_address').value = '';
                    document.getElementById('tahsil').value = '';
                    document.getElementById('district').value = '';
                    return;
                }
                document.getElementById('parent_name').value = student.parent;
                document.getElementById('course').value = student.course;
                document.getElementById('student_year').value = student.year;
                document.getElementById('admission_date').value = student.admission;
                document.getElementById('date_of_birth').value = student.dob;
                document.getElementById('date_of_birth_words').value = student.dobWords;
                document.getElementById('caste').value = student.caste;
                document.getElementById('sub_caste').value = student.subCaste;
                document.getElementById('full_address').value = student.address;
                document.getElementById('tahsil').value = student.tahsil;
                document.getElementById('district').value = student.district;
            };

            // Generate function (demo)
            window.generateBonafide = function() {
                const name = select.options[select.selectedIndex]?.text || '';
                if (!name || name === 'Select Student') {
                    alert('Please select a student first.');
                    return;
                }
                alert(`Bonafide certificate generated for ${name} (demo)`);
                // In a real app, you would generate a PDF or print.
            };

        });
    </script>
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