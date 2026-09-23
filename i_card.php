<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student ID Card - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
 /* Minimal custom styles – everything else is Tailwind */
        .photo-preview-wrap {
            width: 120px;
            height: 120px;
            padding: 4px;
            border-radius: 20px;
            background: linear-gradient(135deg, #0f766e, #14b8a6);
            box-shadow: 0 8px 24px rgba(15, 118, 110, 0.2);
        }
        .photo-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
            background: #fff;
            border: 3px solid #fff;
        }
        .submit-btn {
            transition: all 0.2s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(15, 118, 110, 0.25);
        }
           .file-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px dashed #d1d5db;
            border-radius: 0.75rem;
            background: #f9fafb;
            transition: 0.2s;
        }
        @media (max-width: 640px) {
            .photo-preview-wrap {
                width: 95px;
                height: 95px;
            }
        }
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

<main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== ID CARD FORM CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-id-card"></i>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900">Student ID Card Form</h2>
                    <p class="text-sm text-gray-500">Generate student identity card details</p>
                </div>
            </div>

            <!-- Form -->
            <form class="p-6 space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Select Student -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Select Student</label>
                        <select id="student_select" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4">
                            <option value="">Search Student</option>
                            <option value="1">Rahul Sharma</option>
                            <option value="2">Priya Patel</option>
                            <option value="3">Amit Singh</option>
                        </select>
                    </div>

                    <!-- Course -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Course</label>
                        <input type="text" id="course" placeholder="Enter course name" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                    <!-- Class -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Class</label>
                        <input type="text" id="student_year" placeholder="Enter class name" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Date of Birth</label>
                        <input type="date" id="date_of_birth" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Phone Number</label>
                        <input type="number" id="student_phone" placeholder="Enter phone number" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                    <!-- Blood Group -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Blood Group</label>
                        <select id="blood_group" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4">
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

                    <!-- Address (full width) -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Address</label>
                        <textarea id="full_address" rows="3" placeholder="Enter address" 
                                  class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4"></textarea>
                    </div>

                    <!-- Photo -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-3">Photo</label>
                        <div class="photo-preview-wrap">
                            <img id="photoPreview" src="https://ui-avatars.com/api/?name=Student&background=0f766e&color=fff&size=120" alt="Preview" class="photo-preview" />
                        </div>
                        <div class="mt-3">
                            <input type="file" id="photoInput" accept="image/*" 
                                   class="text-sm text-gray-500 file-input  file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100" />
                        </div>
                    </div>

                </div>

                <!-- Generate Button -->
                <div class="flex justify-center pt-4">
                    <button type="button" class="submit-btn bg-teal-600 text-white font-bold py-3 px-8 rounded-xl shadow-md hover:bg-teal-700 focus:ring-2 focus:ring-teal-300">
                        <i class="fas fa-id-card mr-2"></i> Generate ID Card
                    </button>
                </div>

            </form>

        </div>

    </main>

    <div id="idCardModal"
class="fixed inset-0 hidden items-center justify-center bg-black/60 z-50">

<div class="bg-white rounded-2xl shadow-xl p-8 w-[420px]">

    <img id="cardPhoto" class="w-28 h-28 rounded-full mx-auto">

    <h2 id="cardStudentName"></h2>

    <p id="cardCourse"></p>

    <p id="cardYear"></p>

    <p id="cardDOB"></p>

    <p id="cardPhone"></p>

    <p id="cardBlood"></p>

    <p id="cardAddress"></p>

    <div class="mt-6 flex gap-3">

        <button onclick="printCard()">Print</button>

        <button onclick="closeCardModal()">Close</button>

    </div>

</div>

</div>

    <?php include 'footer.php' ?>


    <script src="url.js"></script>


    <!-- ============================================================
    JAVASCRIPT – photo preview
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Photo preview
            const photoInput = document.getElementById('photoInput');
            const photoPreview = document.getElementById('photoPreview');

            if (photoInput) {
                photoInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            photoPreview.src = event.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Demo: Generate button click
       document.querySelector(".submit-btn").addEventListener("click", generateIDCard);

function generateIDCard() {

    document.getElementById("cardStudentName").innerText =
        document.getElementById("student_select").selectedOptions[0].text;

    document.getElementById("cardCourse").innerText =
        document.getElementById("course").value;

    document.getElementById("cardYear").innerText =
        document.getElementById("student_year").value;

    document.getElementById("cardDOB").innerText =
        document.getElementById("date_of_birth").value;

    document.getElementById("cardPhone").innerText =
        document.getElementById("student_phone").value;

    document.getElementById("cardBlood").innerText =
        document.getElementById("blood_group").value;

    document.getElementById("cardAddress").innerText =
        document.getElementById("full_address").value;

    document.getElementById("cardPhoto").src =
        document.getElementById("photoPreview").src;

    document.getElementById("idCardModal").classList.remove("hidden");
    document.getElementById("idCardModal").classList.add("flex");

}
        });

        function closeCardModal(){

    document.getElementById("idCardModal").classList.add("hidden");

    document.getElementById("idCardModal").classList.remove("flex");

}
    </script>



    <script>
       const students = [
{
    id: "1",
    student_name: "Rahul Sharma",
    course: "BCA",
    student_year: "FY",
    date_of_birth: "2004-01-10",
    student_phone: "9876543210",
    blood_group: "A+",
    full_address: "Pune, Maharashtra",
    photo: "assets/images/student1.jpg"
},
{
    id: "2",
    student_name: "Priya Patel",
    course: "BSc",
    student_year: "SY",
    date_of_birth: "2003-08-20",
    student_phone: "9988776655",
    blood_group: "B+",
    full_address: "Mumbai",
    photo: "assets/images/student2.jpg"
}
];

window.onload = function () {

    const select = document.getElementById("student_select");

    select.innerHTML = '<option value="">Select Student</option>';

    students.forEach(student => {

        select.innerHTML += `
            <option value="${student.id}">
                ${student.student_name}
            </option>
        `;

    });

    select.addEventListener("change", function () {

    const student = students.find(s => s.id == this.value);

    if (!student) return;

    document.getElementById("course").value = student.course;
    document.getElementById("student_year").value = student.student_year;
    document.getElementById("date_of_birth").value = student.date_of_birth;
    document.getElementById("student_phone").value = student.student_phone;
    document.getElementById("blood_group").value = student.blood_group;
    document.getElementById("full_address").value = student.full_address;
    document.getElementById("photoPreview").src = student.photo;

});

}; 

function printCard(){

    window.print();

}
</script>

</body>

</html>