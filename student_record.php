<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Record</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


    <style>
        /* minimal custom styles – everything else is Tailwind */
        .table-row-hover:hover {
            background-color: #f8fafc;
        }

        .modal-overlay {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal-box {
            animation: fadeIn 0.25s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.97);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* responsive table wrapper */
        .table-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 640px) {
            .table-wrap table {
                font-size: 0.85rem;
            }

            .table-wrap table th,
            .table-wrap table td {
                padding: 0.5rem 0.25rem;
            }
        }

        .dt-buttons{

display:flex;

gap:10px;

margin-bottom:20px;

}

.dt-button{

border:none!important;

padding:10px 22px!important;

border-radius:14px!important;

font-weight:600!important;

color:white!important;

box-shadow:0 5px 15px rgba(0,0,0,.12);

}

.btn-copy{

background:#374151!important;

}

.btn-csv{

background:#0ea5e9!important;

}

.btn-excel{

background:#10b981!important;

}

.btn-pdf{

background:#ef4444!important;

}

.btn-print{

background:#8b5cf6!important;

}

.dataTables_filter{

float:right;

margin-bottom:20px;

}

.dataTables_filter input{

height:46px;

width:300px;

padding:0 18px;

border-radius:14px;

border:1px solid #e5e7eb;

outline:none;

background:#f8fafc;

}

.dataTables_length{

display:none;

}

.dataTables_info{

margin-top:20px;

font-weight:600;

color:#64748b;

}

.dataTables_paginate{

margin-top:20px!important;

}

.paginate_button{

border-radius:12px!important;

padding:8px 18px!important;

margin:0 5px!important;

border:none!important;

}

.current{

background:#0f9d94!important;

color:white!important;

}

.previous,.next{

background:#14b8a6!important;

color:white!important;

}
    </style>

</head>

<body class="bg-gray-300 text-gray-800 antialiased ">
    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>
    <!-- HEADER -->
    <main class="md:ml-[300px] max-w-7xl mx-auto mb-8 px-4 sm:px-6 py-28 pb-10 transition-all duration-200">

        <!-- ===== STUDENT RECORDS CARD ===== -->
<div class="bg-white rounded-3xl shadow-lg border border-gray-200 overflow-hidden">
            <!-- Heading -->
           <div class="flex items-center justify-between p-6 border-b border-gray-200 bg-white">

    <div class="flex items-center gap-4">

        <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center">

            <i class="fas fa-user-graduate text-2xl"></i>

        </div>

        <div>

            <h2 class="text-4xl font-bold text-slate-900">
                Student Records
            </h2>

            <p class="text-gray-500 mt-1">
                Manage and track all registered students
            </p>

        </div>

    </div>

</div>

            <!-- Table -->
            <div class="table-wrap p-4 sm:p-6">
             <table id="studentTable"
class="w-full text-sm text-center text-gray-500">
                    <thead>
                        <tr class="bg-teal-600 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-3 py-3 whitespace-nowrap">#</th>
                            <th class="px-3 py-3 whitespace-nowrap ">Student Name</th>
                            <th class="px-3 py-3 whitespace-nowrap">Batch</th>
                            <th class="px-3 py-3 whitespace-nowrap">Class</th>
                            <th class="px-3 py-3 whitespace-nowrap">Section</th>
                            <th class="px-3 py-3 whitespace-nowrap">Student ID</th>
                            <th class="px-3 py-3 whitespace-nowrap">Father Phone</th>
                            <th class="px-3 py-3 whitespace-nowrap text-center rounded-r-xl text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody" class="divide-y divide-gray-100 py-8">
                        <!-- Rows injected by JS -->
                        <tr>
                            <td colspan="8" class="text-center py-8 text-gray-400">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- ===== DETAILS MODAL ===== -->
        <div id="detailsModal" class="fixed inset-0 modal-overlay hidden justify-center items-center z-50 p-4 z-[99999]">
            <div class="modal-box bg-white rounded-2xl w-full max-w-4xl p-6 relative shadow-2xl">
                <button onclick="closeDetailsModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl transition">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="text-xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Student Details
                </h2>
                <div id="detailsContent"
class="grid md:grid-cols-2 xl:grid-cols-3 gap-5">
                    <!-- populated by JS -->
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closeDetailsModal()" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>

        <!-- ===== DOCUMENTS MODAL ===== -->
        <div id="documentsModal" class="fixed inset-0 modal-overlay hidden justify-center items-center z-50 p-4 z-[99999]">
            <div class="modal-box bg-white rounded-2xl w-full max-w-4xl p-6 relative shadow-2xl">
                <button onclick="closeDocumentsModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl transition">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="text-xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm">
                        <i class="fas fa-file-alt"></i>
                    </span>
                    Student Documents
                </h2>
                <div id="documentsContent" class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <!-- populated by JS -->
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closeDocumentsModal()" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
                        Close
                    </button>
                </div>
            </div>
            
        </div>
          

    </main>
    <?php include 'footer.php' ?>


    <script src="url.js"></script>

    <script>
  


        // ==============================
        // FETCH STUDENTS
        // ==============================

        async function fetchStudents() {

            try {

            const result = {

    data: {

        data: [

            {

                id: 1,

                student_name: "Rahul Sharma",

                student_batch: "2025-26",

                class: "1",

                section: "A",

                

                student_id: "STUD001",parent_phone: "9988776655",

                date_of_birth: "10-01-2004",

                blood_group: "A+",

                full_address: "Pune",

                 admission_date: "12-06-2023",
    abc_id: "ABC123457",
    semester_pattern: "Semester",

                passport_photo: "https://placehold.co/120x120",

                 aadhaar_number: "123456789013",

                birth_certificate: "https://placehold.co/120x120",

                marksheet_10: "https://placehold.co/120x120",

                marksheet_12: "https://placehold.co/120x120",

                tc_certificate: "https://placehold.co/120x120",

                caste_certificate: "https://placehold.co/120x120",

                domicile_certificate: "",

                non_creamy_layer_certificate: "",

                other_academic_documents: "",

                other_documents: ""

            },
            {
    id: 2,
    student_name: "Amit Singh",
    student_batch: "2025-26",
    class: "2",
    parent_name: "Suresh Singh",
    section: "B",
    student_id: "STUD002",parent_phone: "9988776655",
    course: "Civil Engineering",
    gender: "Male",
    date_of_birth: "05-03-2003",
    blood_group: "O+",
    aadhaar_number: "123456789013",
    admission_date: "12-06-2023",
    abc_id: "ABC123457",
    semester_pattern: "Semester",
    full_address: "Nagpur, Maharashtra",
    passport_photo: "https://placehold.co/120x120",
    
                marksheet_10: "https://placehold.co/120x120",

                marksheet_12: "https://placehold.co/120x120",

                tc_certificate: "https://placehold.co/120x120",

                caste_certificate: "https://placehold.co/120x120",

                domicile_certificate: "https://placehold.co/120x120"


},

{
    id: 3,
    student_name: "Amit Singh",
    student_batch: "2025-26",
    class: "2",
    parent_name: "Suresh Singh",
    section: "C",
    student_id: "STUD003",parent_phone: "9988776655",
    course: "Civil Engineering",
    gender: "Male",
    date_of_birth: "05-03-2003",
    blood_group: "O+",
    aadhaar_number: "123456789013",
    admission_date: "12-06-2023",
    abc_id: "ABC123457",
    semester_pattern: "Semester",
    full_address: "Nagpur, Maharashtra",
    passport_photo: "https://placehold.co/120x120",
    
                marksheet_10: "https://placehold.co/120x120",

                marksheet_12: "https://placehold.co/120x120",

                tc_certificate: "https://placehold.co/120x120",

                caste_certificate: "https://placehold.co/120x120",

                domicile_certificate: "https://placehold.co/120x120"
},
{
    id: 4,
    student_name: "Sneha Joshi",
    student_batch: "2025-26",
    class: "1",
    parent_name: "Vijay Joshi",
    section: "A",
    student_id: "STUD004",parent_phone: "9988776655",
    course: "Computer Engineering",
    gender: "Female",
    date_of_birth: "18-07-2005",
    blood_group: "AB+",
    aadhaar_number: "123456789014",
    admission_date: "14-06-2025",
    abc_id: "ABC123458",
    semester_pattern: "Semester",
    full_address: "Pune, Maharashtra",
    passport_photo: "https://placehold.co/120x120",
    
                marksheet_10: "https://placehold.co/120x120",

                marksheet_12: "https://placehold.co/120x120",

                tc_certificate: "https://placehold.co/120x120",

                caste_certificate: "https://placehold.co/120x120",

                domicile_certificate: "https://placehold.co/120x120"
},
{
    id: 5,
    student_name: "Rohan Patil",
    student_batch: "2025-26",
    class: "2",
    parent_name: "Ashok Patil",
    section: "B",
    student_id: "STUD005",parent_phone: "9988773344",
    course: "Mechanical Engineering",
    gender: "Male",
    date_of_birth: "22-11-2004",
    blood_group: "B+",
    aadhaar_number: "123456789015",
    admission_date: "15-06-2024",
    abc_id: "ABC123459",
    semester_pattern: "Semester",
    full_address: "Kolhapur, Maharashtra",
    passport_photo: "https://placehold.co/120x120",
    
                marksheet_10: "https://placehold.co/120x120",

                marksheet_12: "https://placehold.co/120x120",

                tc_certificate: "https://placehold.co/120x120",

                caste_certificate: "https://placehold.co/120x120",

                domicile_certificate: "https://placehold.co/120x120"
},
{
    id: 6,
    student_name: "Pooja Kulkarni",
    student_batch: "2025-26",
    class: "2",
    parent_name: "Ramesh Kulkarni",
    section: "C",
    student_id: "STUD006",parent_phone: "9988774455",
    course: "Electronics Engineering",
    gender: "Female",
    date_of_birth: "09-09-2003",
    blood_group: "A-",
    aadhaar_number: "123456789016",
    admission_date: "13-06-2023",
    abc_id: "ABC123460",
    semester_pattern: "Semester",
    full_address: "Nashik, Maharashtra",
    passport_photo: "https://placehold.co/120x120",
    
                marksheet_10: "https://placehold.co/120x120",

                marksheet_12: "https://placehold.co/120x120",

                tc_certificate: "https://placehold.co/120x120",

                caste_certificate: "https://placehold.co/120x120",

                domicile_certificate: "https://placehold.co/120x120"
},
{
    id: 7,
    student_name: "Aditya Deshmukh",
    student_batch: "2025-26",
    class: "1",
    parent_name: "Sunil Deshmukh",
    section: "C",
    student_id: "STUD007",parent_phone: "9988775566",
    course: "Information Technology",
    gender: "Male",
    date_of_birth: "14-04-2005",
    blood_group: "O-",
    aadhaar_number: "123456789017",
    admission_date: "16-06-2025",
    abc_id: "ABC123461",
    semester_pattern: "Semester",
    full_address: "Aurangabad, Maharashtra",
    passport_photo: "https://placehold.co/120x120",
    
                marksheet_10: "https://placehold.co/120x120",

                marksheet_12: "https://placehold.co/120x120",

                tc_certificate: "https://placehold.co/120x120",

                caste_certificate: "https://placehold.co/120x120",

                domicile_certificate: "https://placehold.co/120x120"
},
{
    id: 8,
    student_name: "Neha Shinde",
    student_batch: "2025-26",
    class: "3",
    parent_name: "Mohan Shinde",
    section: "D",
    student_id: "STUD008",parent_phone: "9988776677",
    course: "Computer Engineering",
    gender: "Female",
    date_of_birth: "30-08-2004",
    blood_group: "B-",
    aadhaar_number: "123456789018",
    admission_date: "17-06-2024",
    abc_id: "ABC123462",
    semester_pattern: "Semester",
    full_address: "Satara, Maharashtra",
    passport_photo: "https://placehold.co/120x120",
    
                marksheet_10: "https://placehold.co/120x120",

                marksheet_12: "https://placehold.co/120x120",

                tc_certificate: "https://placehold.co/120x120",

                caste_certificate: "https://placehold.co/120x120",

                domicile_certificate: "https://placehold.co/120x120"
}
        ]

    }

};

                const tbody =
                    document.getElementById("studentTableBody");



                tbody.innerHTML = "";



                if (result.data.data.length === 0) {

                    tbody.innerHTML = `
                <tr>
                    <td colspan="8"
                        class="text-center text-slate-400 py-8">

                        No data available

                    </td>
                </tr>
            `;

                    return;
                }



                result.data.data.forEach((student, index) => {

                    tbody.innerHTML += `

            <!-- MAIN ROW -->

          <tr class="table-row-hover transition">

                <td>${index + 1}</td>

            

                <td>${student.student_name ?? '-'}</td>

                <td>${student.student_batch ?? '-'}</td>
                <td>${student.class ?? '-'}</td>

                <td>${student.section ?? '-'}</td>

                <td>${student.student_id ?? '-'}</td>

                <td>${student.parent_phone ?? '-'}</td>

                <td>

                    <div class="flex gap-2">

                        <!-- DETAILS -->

        <button

        
onclick='openDetailsModal(${JSON.stringify(student)})'
class="px-4 py-2 rounded-xl bg-cyan-600 hover:bg-cyan-700 text-white text-xs font-semibold transition">

<i class="fas fa-eye mr-1"></i>

Details

</button>

                         <!-- DOCUMENTS -->

        
        <button
         onclick='openDocumentsModal(${JSON.stringify(student)})'
class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold transition">

<i class="fas fa-folder-open mr-1"></i>

Documents

</button>

                        
    <button
        onclick="window.location.href='student_reg_update.php?id=${student.id}'"
class="px-4 py-2 rounded-xl bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold transition">



Edit

</button>

  <button
          onclick="deleteStudent(${student.id})"
class="px-4 py-2 rounded-xl bg-red-500 hover:bg-red-600 text-white text-xs font-semibold transition">



 Delete

</button>

                    </div>

                </td>

            </tr>



            
            `;

                });

                // DESTROY OLD TABLE

                if ($.fn.DataTable.isDataTable('#studentTable')) {

                    $('#studentTable')
                        .DataTable()
                        .destroy();

                }



                // INIT DATATABLE
$('#studentTable').DataTable({

    responsive:true,

    pageLength:5,

    dom:'Bfrtip',

    buttons:[
        {
            extend:'copy',
            className:'btn-copy'
        },
        {
            extend:'csv',
            className:'btn-csv'
        },
        {
            extend:'excel',
            className:'btn-excel'
        },
        {
            extend:'pdf',
            className:'btn-pdf'
        },
        {
            extend:'print',
            className:'btn-print'
        }
    ]

});

            } catch (error) {

                console.log(error);

            }

        }



        // ==============================
        // INITIAL LOAD
        // ==============================

        fetchStudents();



        //delete code
        async function deleteStudent(id) {

            const confirmDelete = confirm(
                "Are you sure you want to delete this student?"
            );



            if (!confirmDelete) {

                return;

            }



            try {

                const response = await fetch(

                    url + "students/" + id,

                    {

                        method: "DELETE",

                        headers: {

                            "Authorization": "Bearer " + localStorage.getItem("token"),

                            "Accept": "application/json"

                        }

                    }

                );



                // SUCCESS

                if (response.ok) {

                    alert("Student Deleted Successfully ✅");



                    // AUTO REFRESH

                    window.location.reload();

                }



                // ERROR
                else {

                    const result =
                        await response.json();



                    alert(
                        result.message || "Delete Failed"
                    );

                }



            } catch (error) {

                console.log(error);

                alert("Server Error ❌");

            }

        }


        // =========================
        // DETAILS MODAL
        // =========================

        function openDetailsModal(student) {

            document.getElementById(
                "detailsModal"
            ).classList.remove("hidden");



            document.getElementById(
                "detailsModal"
            ).classList.add("flex");



            document.getElementById(
                "detailsContent"
            ).innerHTML = `

        <div>
            <strong>Parent:</strong>
            ${student.parent_name || "-"}
        </div>

          <div>
            <strong>Semester:</strong>
            ${student.semester_pattern || "-"}
        </div>


        <div>
            <strong>Aadhaar:</strong>
            ${student.aadhaar_number || "-"}
        </div>

         <div>
            <strong>Admission Date:</strong>
            ${student.admission_date || "-"}
        </div>

         <div>
            <strong>Gender:</strong>
            ${student.gender || "-"}
        </div>

        <div>

            <strong>ABC ID:</strong>
            ${student.abc_id || "-"}
        </div>


        <div>
            <strong>DOB:</strong>
            ${student.date_of_birth || "-"}
        </div>

         
        <div>
            <strong>Full Fees:</strong>
            ₹ ${student.full_fees || "-"}
        </div>

        <div>
            <strong>Birth Place:</strong>
            ${student.place_of_birth || "-"}    
        </div>

       <div>
            <strong>Admission Fees:</strong>
            ₹ ${student.admission_fees || "-"}
        </div>

        <div>
        <strong> Blood Group:</strong>
        ${student.blood_group || "-"}
        </div>

          <div>
                <strong>Tahsil:</strong>
                ${student.tahsil || "-"}
            </div>

        <div>
            <strong>Caste:</strong>
            ${student.caste || "-"} 
        </div>

              <div>
                <strong>District:</strong>
                ${student.district || "-"}
            </div>

        <div>
            <strong>Sub Caste:</strong>
            ${student.sub_caste || "-"}
        </div>
  <div>
            <strong>Address:</strong>
            ${student.full_address || "-"}
        </div>
   
    `;

        }



        // CLOSE

        function closeDetailsModal() {

            document.getElementById(
                "detailsModal"
            ).classList.add("hidden");

        }

        function openDocumentsModal(student) {

            document.getElementById(
                "documentsModal"
            ).classList.remove("hidden");



            document.getElementById(
                "documentsModal"
            ).classList.add("flex");



            const docs = [

                {
                    name: "Passport Photo",
                    file: student.passport_photo
                },

                {
                    name: "10th Marksheet",
                    file: student.marksheet_10
                },

                {
                    name: "12th Marksheet",
                    file: student.marksheet_12
                },

                {
                    name: "TC Certificate",
                    file: student.tc_certificate
                },

                {
                    name: "Caste Certificate",
                    file: student.caste_certificate
                },

                {
                    name: "Domicile Certificate",
                    file: student.domicile_certificate
                },

                {
                    name: "NCL Certificate",
                    file: student.non_creamy_layer_certificate
                },

                {
                    name: "Other Academic Documents",
                    file: student.other_academic_documents
                },

                {
                    name: "Other Documents",
                    file: student.other_documents
                }

            ];



            let html = "";



            docs.forEach(doc => {

                if (doc.file) {

                    html += `

                        <div class="relative group">

                            <!-- CARD -->

                            <div

                            class="bg-slate-800 rounded-xl p-4
                            text-center hover:bg-slate-700
                            transition">

                                <div class="text-4xl mb-2">
                                    📄
                                </div>

                                <div class="text-white text-sm">

                                    ${doc.name}

                                </div>

                            </div>



                            <!-- HOVER DOWNLOAD BUTTON -->

                            <div

                            class="absolute inset-0
                            flex items-center justify-center
                            bg-black/60 rounded-xl
                            opacity-0 group-hover:opacity-100
                            transition-all duration-300">

                            <a

                        href="${baseUrl}storage/${doc.file}"

                        download

                        target="_self"

                        class="px-4 py-2 rounded-lg
                        bg-cyan-500 hover:bg-cyan-600
                        text-white text-sm">

                            Download

                        </a>

                            </div>

                        </div>

                        `;
                }

            });



            document.getElementById(
                "documentsContent"
            ).innerHTML = html;

        }



        // CLOSE

        function closeDocumentsModal() {

            document.getElementById(
                "documentsModal"
            ).classList.add("hidden");

        }
    </script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
</body>

</html>