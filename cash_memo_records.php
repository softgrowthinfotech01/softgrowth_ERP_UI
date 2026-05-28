<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cash Memo Records - ERP</title>

<link rel="stylesheet" href="dist/output.css">
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<link rel="stylesheet"
href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

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

<div class=" p-8 md:p-14 mb-20 md:mb-1 mt-10 md:ml-[300px]">

  

    <!-- CARD -->
    <div class="bg-gray-800 rounded-xl p-5">

        <!-- HEADING -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold">
               Cash Memo Records
            </h2>
        </div>

       <div class="flex flex-col md:flex-row gap-4 mb-6">

    <!-- FROM DATE -->

    <div>

        <label class="label">
            From Date
        </label>

        <input
        type="date"
        id="fromDate"
        class="input">

    </div>



    <!-- TO DATE -->

    <div>

        <label class="label">
            To Date
        </label>

        <input
        type="date"
        id="toDate"
        class="input">

    </div>



    <!-- BUTTONS -->

    <div class="flex items-end gap-3">

        <button

        onclick="filterByDate()"

        class="px-5 py-3 h-[50px]
        rounded-xl bg-cyan-500 text-white">

            Filter

        </button>



        <button

        onclick="resetFilter()"

        class="px-5 py-3 h-[50px]
        rounded-xl bg-red-500 text-white">

            Reset

        </button>

    </div>

</div>
       

        <!-- TABLE -->
        <div class="overflow-x-auto">

          <table
id="cashMemoTable"
class="w-full text-sm text-left">

               <thead>

<tr>

    <th>
        Sr No
    </th>

    <th>
        Cash Memo No
    </th>

    <th>
        Amount
    </th>

    <th>
        Receipt Number
    </th>

    <th>
        Date
    </th>


</tr>

</thead>
               <tbody id="cashMemoTableBody">
</tbody>
            </table>

        </div>

      

    </div>

</div>

<?php include 'footer.php' ?>
<script src="url.js"></script>

<script>

// =========================
// LOAD DATA
// =========================

window.onload = function(){

    getCashMemos();

}



// =========================
// GET CASH MEMOS
// =========================

async function getCashMemos(){

    try{

        const response = await fetch(

            url + "cash-memos/",

            {

                method:"GET",

                headers:{

                    "Accept":"application/json",

                    "Authorization":
                    "Bearer " +
                    localStorage.getItem("token")

                }

            }

        );



        const result =
        await response.json();



        console.log(result);



        const cashMemos =
        result.data;



        const tableBody =
        document.getElementById(
    "cashMemoTableBody"
);



        tableBody.innerHTML = "";



        // =========================
        // EMPTY DATA
        // =========================

        if(cashMemos.length === 0){

            tableBody.innerHTML = `

                <tr>

                    <td colspan="6"
                    class="text-center py-10 text-slate-400">

                        No Cash Memo Found

                    </td>

                </tr>

            `;

            return;

        }



        // =========================
        // LOOP DATA
        // =========================

        cashMemos.forEach((item,index) => {

            tableBody.innerHTML += `

                <tr>

                    <td>

                        ${index + 1}

                    </td>

                    <td>

                        ${item.cash_memo_no}

                    </td>

                    <td>

                        ₹ ${item.amount}

                    </td>

                    <td>

                        ${item.receipt_number}

                    </td>

                    <td>

                        ${item.date}

                    </td>

                    

                </tr>

            `;

        });

$('#cashMemoTable').DataTable({

    destroy:true,

    dom:'Bfrtip',

    buttons:[

        'copy',

        'csv',

        'excel',

        'pdf',

        'print'

    ],

    pageLength:10

});

    }catch(error){

        console.log(error);

        alert("Failed To Fetch Data");

    }

}

// =========================
// FILTER DATE
// =========================

function filterByDate(){

    const fromDate =
    document.getElementById(
        "fromDate"
    ).value;



    const toDate =
    document.getElementById(
        "toDate"
    ).value;



    const table =
    $('#cashMemoTable')
    .DataTable();



    $.fn.dataTable.ext.search.push(

        function(settings,data){

            const rowDate =
            data[4];



            if(

                (!fromDate && !toDate)

            ){

                return true;

            }



            if(

                fromDate &&
                rowDate < fromDate

            ){

                return false;

            }



            if(

                toDate &&
                rowDate > toDate

            ){

                return false;

            }



            return true;

        }

    );



    table.draw();

}

function resetFilter(){

    document.getElementById(
        "fromDate"
    ).value = "";



    document.getElementById(
        "toDate"
    ).value = "";



    $.fn.dataTable.ext.search = [];



    $('#cashMemoTable')
    .DataTable()
    .draw();

}

</script>

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