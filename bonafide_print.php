<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bonafide Certificate</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
          /* minimal custom styles */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.05;
            font-size: 8rem;
            font-weight: 900;
            color: #0f172a;
            pointer-events: none;
            user-select: none;
            white-space: nowrap;
        }
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
            .certificate { border: none !important; box-shadow: none !important; }
        }
        @media (max-width: 640px) {
            .watermark { font-size: 4rem; }
        }
    </style>

</head>

<body class="bg-gray-300 p-4 sm:p-6 md:p-8 print:bg-white">

    <!-- Print Button (hidden when printing) -->
   

    <!-- ===== CERTIFICATE ===== -->
    <div class="certificate relative max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 sm:p-12 md:p-16 border-4 border-gray-900 print:border-0 print:shadow-none">

        <!-- Watermark -->
        <div class="watermark">BONAFIDE</div>

        <!-- Header -->
        <div class="text-center border-b-2 border-gray-200 pb-6 relative z-10">
            <!-- Logo placeholder – replace src with your logo -->
            <img src="images/logo.png" 
                 alt="College Logo" 
                 class="w-24 h-24 mx-auto mb-3 rounded-full border-2 border-gray-200" />
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800">SOFTGROWTH COLLEGE</h1>
            <p class="text-gray-600 mt-1">Nagpur, Maharashtra</p>
            <h2 class="text-2xl font-bold mt-4 underline decoration-teal-600 underline-offset-4">BONAFIDE CERTIFICATE</h2>
        </div>

        <!-- Content -->
        <div class="mt-8 md:mt-12 text-base md:text-lg leading-relaxed text-gray-700 relative z-10 space-y-4">
            <p>
                This is to certify that 
                <span id="student_name" class="font-extrabold text-gray-900"></span>
                son/daughter of 
                <span id="parent_name" class="font-extrabold text-gray-900"></span>
                is a bonafide student of our institution studying in 
                <span id="course" class="font-extrabold text-gray-900"></span>
                (<span id="student_year" class="font-extrabold text-gray-900"></span>)
                during the academic year 
                <span id="academic_year" class="font-extrabold text-gray-900"></span>.
            </p>
            <p>
                As per college records, the student's date of birth is 
                <span id="date_of_birth" class="font-extrabold text-gray-900">  </span>
                (<span id="date_of_birth_words" class="font-extrabold text-gray-900"></span>).
            </p>
            <p>
                The student belongs to 
                <span id="caste" class="font-extrabold text-gray-900"></span>
                caste (<span id="sub_caste" class="font-extrabold text-gray-900">—</span>).
            </p>
            <p>
                Residential Address: 
                <span id="full_address" class="font-extrabold text-gray-900"></span>,
                Taluka <span id="tahsil" class="font-extrabold text-gray-900"></span>,
                District <span id="district" class="font-extrabold text-gray-900"></span>.
            </p>
            <p>
                This certificate is issued upon request of the student for official purpose.
            </p>
        </div>

        <!-- Footer -->
        <div class="flex flex-wrap justify-between items-end mt-12 md:mt-16 pt-6 border-t-2 border-gray-200 relative z-10">
            <div>
                <p class="font-semibold text-gray-600">
                    Date: <span id="today_date" class="font-bold"></span>
                </p>
            </div>
            <div class="text-center">
                <div class="border-t-2 border-gray-800 w-40 mx-auto mb-2"></div>
                <p class="font-extrabold text-gray-800">Principal Signature</p>
            </div>
        </div>

    </div>

 <div class="text-center mt-8 no-print">
        <button onclick="window.print()" 
                class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-xl font-bold shadow-md transition">
            <i class="fas fa-print mr-2"></i> Print Certificate
        </button>
    </div>



    <script src="url.js"></script>



    <!-- ===== SCRIPT TO SET TODAY'S DATE ===== -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            document.getElementById('today_date').textContent = `${year}-${month}-${day}`;
        });
    </script>



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
        // LOAD DATA
        // =========================

        window.onload = function() {

            getBonafide();

        }



        // =========================
        // FETCH BONAFIDE
        // =========================

        async function getBonafide() {

            try {

                const response = await fetch(

                    url + "students/" + studentId + "/bonafide",

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



            } catch (error) {

                console.log(error);

                alert("Failed to load bonafide");

            }

        }
    </script>

</body>

</html>