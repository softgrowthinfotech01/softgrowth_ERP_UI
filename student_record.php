<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Record - ERP</title>

<link rel="stylesheet" href="dist/output.css">

<style>
body{
    overflow-x:hidden;
        background-size: 400% 400%;
    animation: gradientMove 15s ease infinite;
}
/* smooth motion */
@keyframes gradientMove {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

/* Card */
.card{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 16px;
}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    text-align:left;
    font-size:13px;
    color:#cbd5e1;
    padding:12px;
    border-bottom:1px solid rgba(255,255,255,0.1);
}

td{
    padding:12px;
    font-size:14px;
    color:#e2e8f0;
    border-bottom:1px solid rgba(255,255,255,0.05);
}

.badge{
    background:#334155;
    padding:4px 10px;
    border-radius:8px;
    font-size:12px;
}

.btn{
    padding:6px 10px;
    border-radius:6px;
    font-size:12px;
    border:1px solid #475569;
    color:white;
    background:#1e293b;
}

.btn:hover{
    background:#334155;
}
</style>

</head>

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center" style="background-image: url('images/bg8.jpeg');">
<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- HEADER -->
<div class=" p-8 md:p-14 mb-20 md:mb-1 mt-10 md:ml-[300px]">
    <!-- <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-black">Student Record</h1>

        <div class="flex items-center gap-2 text-md font-semibold text-black">
            <span>🏠</span>
            <span>/</span>
            <span>Students</span>
        </div>
    </div> -->

    <!-- TABLE CARD -->
    <div class="bg-gray-800 rounded-xl p-5">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Basic</h2>
        </div>

        <!-- TOOLBAR -->
        <div class="flex flex-col md:flex-row md:justify-between gap-3 mb-4">

            <div class="flex gap-2 flex-wrap">

    <button class="btn bg-slate-700 hover:bg-slate-600 text-white px-3 py-1 rounded">
        Copy
    </button>

    <button class="btn bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded">
        CSV
    </button>

    <button class="btn bg-green-600 hover:bg-green-500 text-white px-3 py-1 rounded">
        Excel
    </button>

    <button class="btn bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded">
        PDF
    </button>

    <button class="btn bg-purple-600 hover:bg-purple-500 text-white px-3 py-1 rounded">
        Print
    </button>

</div>

            <input type="text"
                placeholder="Search..."
                class="px-3 py-2 rounded bg-slate-800 border border-slate-600 text-white w-full md:w-64">
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <!-- <th>Student ID</th> -->
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
    <td colspan="8" class="text-center text-slate-400 py-8">
        Loading...
    </td>
</tr>

</tbody>

        </table>
        </div>

        <!-- FOOTER -->
        <div class="flex justify-between items-center mt-4 text-sm text-slate-400">
            <div>Showing 0 to 0 of 0 entries</div>

            <div class="flex gap-2">
                <button class="btn bg-blue-500">Previous</button>
                <button class="btn bg-green-500">Next</button>
            </div>
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

if(!token){

    window.location.href = "login";

}

function docItem(file, label){

    if(!file){

        return '';
    }

    return `

        <a
            href="${baseUrl}storage/${file}"
            target="_blank"
            class="group relative block w-full overflow-hidden rounded-xl">

            <img
                src="${baseUrl}storage/${file}"
                class="w-full aspect-square object-cover rounded-lg
                border border-slate-700
                hover:scale-105 transition duration-300">



            <div
                class="absolute inset-0
                bg-black/60
                opacity-0 group-hover:opacity-100
                transition duration-300
                flex items-center justify-center">

                <span
                    class="text-white text-xs font-medium">

                    ${label}

                </span>

            </div>

        </a>

    `;
}

// ==============================
// FETCH STUDENTS
// ==============================

async function fetchStudents(){

    try{

        const response = await fetch(
            url + "students",
            {

                method: "GET",

                headers: {

                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json"

                }

            }
        );



        const result = await response.json();

        console.log(result);
console.log(result.data.data);


        const tbody =
        document.getElementById("studentTableBody");



        tbody.innerHTML = "";



      if(result.data.data.length === 0){

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



        result.data.data.forEach((student,index)=>{

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

                        <button
                            onclick="toggleDetails(${student.id})"
                            class="px-3 py-1 rounded bg-cyan-500 text-white text-xs">

                            View

                        </button>

                        <button
                           onclick="window.location.href='student_reg_update.php?id=${student.id}'"
                            class="px-3 py-1 rounded bg-green-500 text-white text-xs">

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



            <!-- DETAILS ROW -->

            <tr
                id="details-${student.id}"
                class="hidden bg-slate-900/60">

                <td colspan="8">

                    <div class="grid md:grid-cols-3 gap-6 p-5 items-start">

                        <!-- BASIC -->

                        <div class="card p-4">

                            <h3 class="font-bold mb-3 text-cyan-400">
                                Personal Details
                            </h3>

                            <div class="space-y-2 text-sm">
                              <p>
                                    <span class="text-slate-400">
                                        Parent Name:
                                    </span>

                                    ${student.parent_name ?? '-'}
                                </p>

                                <p>
                                    <span class="text-slate-400">
                                        Aadhaar:
                                    </span>

                                    ${student.aadhaar_number ?? '-'}
                                </p>

                                <p>
                                    <span class="text-slate-400">
                                        DOB:
                                    </span>

                                    ${student.date_of_birth ?? '-'}
                                </p>

                                <p>
                                    <span class="text-slate-400">
                                        Birth Place:
                                    </span>

                                    ${student.place_of_birth ?? '-'}
                                </p>

                                <p>
                                    <span class="text-slate-400">
                                        Gender:
                                    </span>

                                    ${student.gender ?? '-'}
                                </p>

                                  <p>
                                    <span class="text-slate-400">
                                        Blood Group:
                                    </span>

                                    ${student.blood_group ?? '-'}
                                </p>
                                <p>
                                    <span class="text-slate-400">
                                        Caste:
                                    </span>

                                    ${student.caste ?? '-'}
                                </p>
                                  <p>
                                    <span class="text-slate-400">
                                        Sub Caste:
                                    </span>

                                    ${student.sub_caste ?? '-'}
                                </p>

                              

                            </div>

                        </div>



                        <!-- FEES -->

                        <div class="card p-4">

                            <h3 class="font-bold mb-3 text-green-400">
                                Other Details
                            </h3>

                            <div class="space-y-2 text-sm">

                              <p>
                                    <span class="text-slate-400">
                                        Semester:
                                    </span>

                                    ${student.semester_pattern ?? '-'}
                                </p>
                            <p>
                                    <span class="text-slate-400">
                                        Admission Date:
                                    </span>

                                    ${student.admission_date ?? '-'}
                                </p>

                                <p>
                                    <span class="text-slate-400">
                                        ABC ID:
                                    </span>

                                    ${student.abc_id ?? '-'}
                                </p>
                                

                                <p>
                                    <span class="text-slate-400">
                                        Full Fees:
                                    </span>

                                    ₹ ${student.full_fees ?? '-'}
                                </p>

                                <p>
                                    <span class="text-slate-400">
                                        Admission Fees:
                                    </span>

                                    ₹ ${student.admission_fees ?? '-'}
                                </p>

                              

                                  <p>
                                    <span class="text-slate-400">
                                        Tahsil:
                                    </span>

                                    ${student.tahsil ?? '-'}
                                </p>
                                  <p>
                                    <span class="text-slate-400">
                                        District:
                                    </span>

                                    ${student.district ?? '-'}
                                </p>
                                <p>
                                    <span class="text-slate-400">
                                        Address:
                                    </span>

                                    ${student.full_address ?? '-'}
                                </p>

                            </div>

                        </div>



                   <!-- DOCUMENTS -->

<div class="card p-4">

    <h3 class="font-bold mb-4 text-pink-400">
        Documents
    </h3>

    <div class="grid grid-cols-2 gap-2 w-full">

        ${docItem(student.passport_photo, 'Photo')}

        ${docItem(student.tc_certificate, 'TC')}

        ${docItem(student.marksheet_10, '10th')}

        ${docItem(student.marksheet_12, '12th')}

        ${docItem(student.other_academic_documents, 'Academic')}

        ${docItem(student.caste_certificate, 'Caste')}

        ${docItem(student.domicile_certificate, 'Domicile')}

        ${docItem(student.non_creamy_layer_certificate, 'NCL')}

        ${docItem(student.other_documents, 'Other')}

    </div>

</div>
                    </div>

                </td>

            </tr>

            `;

        });

    }catch(error){

        console.log(error);

    }

}



// ==============================
// TOGGLE DETAILS
// ==============================

function toggleDetails(id){

    const row =
    document.getElementById(`details-${id}`);

    row.classList.toggle("hidden");

}



// ==============================
// DELETE STUDENT
// ==============================

async function deleteStudent(id){

    const confirmDelete =
    confirm("Delete this student?");

    if(!confirmDelete){

        return;
    }

    try{

        const response = await fetch(
            url + "students/" + id,
            {

                method: "DELETE",

                headers: {

                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json"

                }

            }
        );



        if(response.ok){

            fetchStudents();

        }

    }catch(error){

        console.log(error);

    }

}



// ==============================
// EDIT STUDENT
// ==============================

function editStudent(id){

    window.location.href =
    "edit_student?id=" + id;

}



// ==============================
// INITIAL LOAD
// ==============================

fetchStudents();



//delete code
async function deleteStudent(id){

    const confirmDelete = confirm(
        "Are you sure you want to delete this student?"
    );



    if(!confirmDelete){

        return;

    }



    try{

        const response = await fetch(

            url + "students/" + id,

            {

                method:"DELETE",

                headers:{

                    "Authorization":
                    "Bearer " + localStorage.getItem("token"),

                    "Accept":"application/json"

                }

            }

        );



        // SUCCESS

        if(response.ok){

            alert("Student Deleted Successfully ✅");



            // AUTO REFRESH

            window.location.reload();

        }



        // ERROR

        else{

            const result =
            await response.json();



            alert(
                result.message || "Delete Failed"
            );

        }



    }catch(error){

        console.log(error);

        alert("Server Error ❌");

    }

}
</script>
</body>
</html>