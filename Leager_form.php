<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ledger Form - ERP</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{
    background:#0f172a;
}

/* CARD */
.card{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 16px;
}

/* INPUT */
.input{
    width:100%;
    height:50px;
    background:#1e293b;
    border:1px solid #334155;
    border-radius:10px;
    padding:0 14px;
    color:white;
    outline:none;
    transition:0.3s;
}

.input:focus{
    border-color:#06b6d4;
    box-shadow:0 0 0 3px rgba(6,182,212,0.2);
}

/* BUTTON */
.btn{
    padding:6px 10px;
    border-radius:6px;
    font-size:12px;
    border:1px solid #475569;
    color:white;
    background:#1e293b;
    transition:0.3s;
}

.btn:hover{
    background:#334155;
}

/* FILTER BUTTON */
.filter-btn{
    background:#06b6d4;
    color:white;
    height:50px;
    border-radius:10px;
    font-weight:600;
    transition:0.3s;
}

.filter-btn:hover{
    background:#0891b2;
}

/* TABLE */
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
    padding:14px 12px;
    font-size:14px;
    color:#e2e8f0;
    border-bottom:1px solid rgba(255,255,255,0.05);
}

/* TABLE ROW HOVER */
tbody tr:hover{
    background:rgba(255,255,255,0.03);
}

/* PAGINATION */
.page-btn{
    width:38px;
    height:38px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#1e293b;
    border:1px solid #334155;
    color:white;
}

.active-page{
    background:#06b6d4;
    border-color:#06b6d4;
}

</style>
</head>

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center"
style="background-image: url('images/bg8.jpeg');">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class=" p-8 md:p-14 mb-20 md:mb-1 mt-10 lg:ml-64">

    <!-- PAGE TITLE -->
    <!-- <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-black">
                Ledger Form
            </h1>
        </div>

        <div class="flex items-center gap-2 text-md font-semibold text-black">
            <span>🏠</span>
            <span>/</span>
            <span>Ledger Form</span>
        </div>

    </div> -->

    <!-- CARD -->
    <div class="bg-gray-800 rounded-xl p-5">

        <!-- HEADING -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold">
                Basic
            </h2>
        </div>

        <!-- FILTER SECTION -->
        <div class="grid md:grid-cols-4 gap-5 items-end mb-5">

            <!-- FROM DATE -->
            <div>
                <label class="block mb-2 text-slate-300 text-sm">
                    From Date
                </label>

                <input type="date" class="input">
            </div>

            <!-- TO DATE -->
            <div>
                <label class="block mb-2 text-slate-300 text-sm">
                    To Date
                </label>

                <input type="date" class="input">
            </div>

            <!-- FILTER BUTTON -->
            <div>
                <button class="filter-btn w-full">
                    Filter
                </button>
            </div>

        </div>

        <!-- EXPORT BUTTONS -->
        <div class="flex gap-2 flex-wrap mb-5">

            <button class="btn bg-slate-700 hover:bg-slate-600">
                Copy
            </button>

            <button class="btn bg-blue-600 hover:bg-blue-500">
                CSV
            </button>

            <button class="btn bg-green-600 hover:bg-green-500">
                Excel
            </button>

            <button class="btn bg-red-600 hover:bg-red-500">
                PDF
            </button>

            <button class="btn bg-purple-600 hover:bg-purple-500">
                Print
            </button>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table>

                <thead>
                    <tr>
                        <th>SR.NO.</th>
                        <th>RECEIPT NUMBER</th>
                        <th>MEMO DETAILS</th>
                        <th>STUDENT BATCH</th>
                        <th>BRANCH</th>
                        <th>CREDIT</th>
                        <th>DEBIT</th>
                        <th>OPENING</th>
                        <th>DATE</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>1</td>
                        <td>123</td>
                        <td>Snacks</td>
                        <td>BCA 2026</td>
                        <td>Nagpur</td>
                        <td class="text-green-400 font-semibold">
                            0.00
                        </td>
                        <td class="text-red-400 font-semibold">
                            5,000.00
                        </td>
                        <td>-5,000.00</td>
                        <td>12-09-2026 00:00:00</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>124</td>
                        <td>Books</td>
                        <td>BBA 2026</td>
                        <td>Pune</td>
                        <td class="text-green-400 font-semibold">
                            2,000.00
                        </td>
                        <td class="text-red-400 font-semibold">
                            0.00
                        </td>
                        <td>2,000.00</td>
                        <td>13-09-2026 10:30:00</td>
                    </tr>

                </tbody>

            </table>

        </div>

        <!-- FOOTER -->
        <div class="flex justify-between items-center mt-4 text-sm text-slate-400">

            <div>
                Showing 1 to 2 of 2 entries
            </div>

            <div class="flex items-center gap-2">

                <button class="btn bg-blue-500">
                    Previous
                </button>

                <div class="page-btn active-page">
                    1
                </div>

                <button class="btn bg-green-500">
                    Next
                </button>

            </div>

        </div>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>