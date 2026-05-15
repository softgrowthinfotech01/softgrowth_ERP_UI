<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Balance Payment - ERP</title>

<script src="https://cdn.tailwindcss.com"></script>

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

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center"
style="background-image: url('images/bg8.jpeg');">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<!-- HEADER -->
<div class=" p-8 md:p-14 mb-20 md:mb-1 mt-10 md:ml-[300px]">

    <!-- <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-black">Balance Payment</h1>

        <div class="flex items-center gap-2 text-md font-semibold text-black">
            <span>🏠</span>
            <span>/</span>
            <span>Balance</span>
        </div>
    </div> -->

    <!-- TABLE CARD -->
    <div class="bg-gray-800 rounded-xl p-5">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Student Balance Details</h2>
        </div>

        <!-- TOOLBAR -->
        <div class="flex flex-col md:flex-row md:justify-between gap-3 mb-4">

            <div class="flex gap-2 flex-wrap">
                <button class="btn bg-slate-700">Copy</button>
                <button class="btn bg-blue-600">CSV</button>
                <button class="btn bg-green-600">Excel</button>
                <button class="btn bg-red-600">PDF</button>
                <button class="btn bg-purple-600">Print</button>
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
                    <th>Student Name</th>
                    <th>Branch</th>
                    <th>Batch</th>
                    <th>Balance Amount</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td colspan="7" class="text-center text-slate-400 py-8">
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