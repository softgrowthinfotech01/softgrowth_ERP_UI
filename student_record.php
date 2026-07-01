<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record - ERP</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>
html, body{
    margin:0;
    padding:0;
    min-height:100%;
}

body{
    overflow-x:hidden;
    min-height:100vh;
    display:flex;
    flex-direction:column;

    background:
        radial-gradient(circle at center,
            rgba(0,0,0,.35) 0%,
            rgba(0,0,0,.65) 60%,
            rgba(0,0,0,.85) 100%
        ),
        url('images/d_bg.png');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}

/* MAIN CONTENT */
.student-page-wrap{
    flex:1;
    margin-left:300px;
    padding:115px 45px 24px;
}

/* CARD */
.table-card{
    position:relative;
    overflow:hidden;
    width:100%;
    max-width:1280px;
    margin:0 auto;
    padding:22px;
    border-radius:26px;
    background:linear-gradient(135deg,
        rgba(255,255,255,.92),
        rgba(245,243,255,.88),
        rgba(236,254,255,.84)
    );
    border:1px solid rgba(255,255,255,.75);
    backdrop-filter:blur(35px);
    -webkit-backdrop-filter:blur(35px);
    box-shadow:0 35px 90px rgba(15,23,42,.22);
}


.table-card::after{
    content:"";
    position:absolute;
    inset:2px;
    border-radius:24px;
    background:linear-gradient(135deg,
        rgba(255,255,255,.96),
        rgba(245,243,255,.92),
        rgba(240,249,255,.90)
    );
}

.table-card > *{
    position:relative;
    z-index:2;
}

/* HEADING */
.table-heading{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:20px;
    padding-bottom:16px;
    border-bottom:1px solid rgba(226,232,240,.85);
}

.table-icon{
    width:48px;
    height:48px;
    min-width:48px;
    display:grid;
    place-items:center;
    border-radius:16px;
    font-size:22px;
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 16px 34px rgba(124,58,237,.28);
}

.table-heading h2{
    color:#0F172A;
    font-size:22px;
    font-weight:950;
    line-height:1.2;
}

.table-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
    line-height:1.5;
}

/* TABLE */
.table-wrap{
    width:100%;
    overflow-x:auto;
    border-radius:18px;
    border:1px solid rgba(226,232,240,.9);
    background:rgba(255,255,255,.70);
}

#studentTable{
    width:100%;
    min-width:950px;
    border-collapse:separate;
    border-spacing:0;
}

#studentTable thead{
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
}

#studentTable th{
    padding:14px 16px;
    color:#fff;
    font-size:13px;
    font-weight:950;
    text-align:left;
    white-space:nowrap;
}

#studentTable td{
    padding:13px 16px;
    color:#1E293B;
    font-size:13px;
    font-weight:700;
    border-bottom:1px solid rgba(226,232,240,.85);
    white-space:nowrap;
}

#studentTable tbody tr:hover{
    background:rgba(124,58,237,.08);
}

/* FOOTER PROPER SET */
footer,
.erp-footer{
    position:relative !important;
    left:auto !important;
    right:auto !important;
    bottom:auto !important;

    margin-top:auto !important;
    margin-left:290px !important;
    width:calc(100% - 290px) !important;

    padding:0 !important;
    z-index:20 !important;
}

.erp-footer-wrap,
.erp-footer-inner{
    margin:0 !important;
border-radius:30px 30px 0 0 !important;}

/* ANIMATION */
@keyframes spinGlow{
    to{ transform:rotate(360deg); }
}

/* TABLET */
@media(max-width:1024px){
    .student-page-wrap{
        margin-left:0 !important;
        padding:100px 16px 20px !important;
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

    .student-page-wrap{
        margin-left:0 !important;
        padding:95px 12px 16px !important;
    }

    .table-card{
        width:100%;
        max-width:100%;
        padding:18px;
        border-radius:24px;
    }

    .table-card::after{
        border-radius:22px;
    }

    .table-heading{
        align-items:flex-start;
        gap:12px;
        margin-bottom:18px;
    }

    .table-icon{
        width:42px;
        height:42px;
        min-width:42px;
        font-size:20px;
        border-radius:14px;
    }

    .table-heading h2{
        font-size:21px;
    }

    .table-heading p{
        font-size:13px;
    }

    #studentTable{
        min-width:650px;
    }

    #studentTable th,
    #studentTable td{
        padding:11px 12px;
        font-size:12px;
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
  border-radius:24px 24px 0 0 !important;    }
}

/* MENU BUTTON VISIBILITY FIX */
.erp-menu-btn{
    display:none !important;
}

@media(max-width:1023px){
    .erp-menu-btn{
        display:flex !important;
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
    <!-- HEADER -->
<div class="student-page-wrap"> 
       <div class="table-card">

        <div class="table-heading">
            <div class="table-icon">👨‍🎓</div>

            <div>
                <h2>Student Records</h2>
                <p>View and manage registered student details</p>
            </div>
        </div>

        <div class="table-wrap">
            <table id="studentTable">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Batch</th>
                        <th>Year</th>
                        <th>Student Phone</th>
                        <th>Father Phone</th>
                        <th>Branch</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="studentTableBody">
                    <tr>
                        <td colspan="8" class="text-center py-8">
                            Loading...
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>
</div>


    <!-- DETAILS MODAL -->

    <div id="detailsModal" class="fixed inset-0 bg-black/60
        hidden justify-center items-center z-50 p-4">

        <div class="bg-slate-900 rounded-2xl
        w-full max-w-2xl p-6 relative">

            <!-- CLOSE -->

            <button onclick="closeDetailsModal()" class="absolute top-4 right-4
        text-white text-xl">

                ✕

            </button>



            <h2 class="text-xl font-bold mb-6 text-white">

                Student Details

            </h2>



            <div id="detailsContent" class="grid md:grid-cols-2 gap-4 text-white">

            </div>

        </div>

    </div>

    <!-- DOCUMENT MODAL -->

    <div id="documentsModal" class="fixed inset-0 bg-black/60
        hidden justify-center items-center z-50 p-4">

        <div class="bg-slate-900 rounded-2xl
        w-full max-w-2xl p-6 relative">

            <!-- CLOSE -->

            <button onclick="closeDocumentsModal()" class="absolute top-4 right-4
        text-white text-xl">

                ✕

            </button>



            <h2 class="text-xl font-bold mb-6 text-white">

                Student Documents

            </h2>



            <div id="documentsContent" class="grid grid-cols-2 md:grid-cols-3 gap-4">

            </div>

        </div>

    </div>
    <?php include 'footer.php' ?>


    <script src="url.js"></script>

    <script>
        const token = localStorage.getItem("token");



        // ==============================
        // AUTH CHECK
        // ==============================

        if (!token) {

            window.location.href = "login";

        }



        // ==============================
        // FETCH STUDENTS
        // ==============================

        async function fetchStudents() {

            try {

                const response = await fetch(
                    url + "students", {

                        method: "GET",

                        headers: {

                            "Authorization": `Bearer ${token}`,
                            "Accept": "application/json"

                        }

                    }
                );


                const result = await response.json();

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

            <tr class="hover:bg-slate-700/30 transition">

                <td>${index + 1}</td>

            

                <td>${student.student_name ?? '-'}</td>

                <td>${student.student_batch ?? '-'}</td>
                <td>${student.student_year ?? '-'}</td>

                <td>${student.student_phone ?? '-'}</td>

                <td>${student.parent_phone ?? '-'}</td>

                <td>${student.course ?? '-'}</td>

                <td>

                    <div class="flex gap-2">

                        <!-- DETAILS -->

        <button

        onclick='openDetailsModal(${JSON.stringify(student)})'

        class="px-3 py-1 rounded-lg
        bg-cyan-500 text-white text-xs">

            Details

        </button>

                         <!-- DOCUMENTS -->

        <button

        onclick='openDocumentsModal(${JSON.stringify(student)})'

        class="px-3 py-1 rounded-lg
        bg-green-500 text-white text-xs">

            Documents

        </button>

                        <button
                           onclick="window.location.href='student_reg_update.php?id=${student.id}'"
                            class="px-3 py-1 rounded bg-blue-500 text-white text-xs">

                            Edit

                        </button>

                        <button
                            onclick="deleteStudent(${student.id})"
                            class="px-3 py-1 rounded bg-red-500 text-white text-xs">

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

                    destroy: true,

                    responsive: true,

                    pageLength: 10,

                    dom: 'Bfrtip',

                    buttons: [

                        'copy',

                        'csv',

                        'excel',

                        'pdf',

                        'print'

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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
</body>

</html>