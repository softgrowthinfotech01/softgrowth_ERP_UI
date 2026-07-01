<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record - ERP</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="dist/style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>

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