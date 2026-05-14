<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Record - ERP</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body{
    background:#0f172a;
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
<div class="p-12 mt-10 lg:ml-64">
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
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Batch</th>
                    <th>Student Phone</th>
                    <th>Father Phone</th>
                    <th>Branch</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td colspan="8" class="text-center text-slate-400 py-8">
                        No data available in table
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
</body>
</html>