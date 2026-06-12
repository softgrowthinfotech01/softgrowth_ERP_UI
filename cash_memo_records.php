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
    min-height:100vh;
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
    padding: 100px;
}

.memo-record-card{
    position:relative;
    overflow:hidden;
    padding:22px;
    border-radius:28px;
    background:linear-gradient(135deg,rgba(255,255,255,.92),rgba(245,243,255,.88),rgba(236,254,255,.84));
    border:1px solid rgba(255,255,255,.75);
    backdrop-filter:blur(35px);
    -webkit-backdrop-filter:blur(35px);
    box-shadow:0 35px 90px rgba(15,23,42,.20);
}

.memo-record-card::before{
    content:"";
    position:absolute;
    inset:-2px;
    background:conic-gradient(from 180deg,#7C3AED,#06B6D4,#22C55E,#F59E0B,#7C3AED);
    opacity:.35;
    animation:spinGlow 8s linear infinite;
}

.memo-record-card::after{
    content:"";
    position:absolute;
    inset:2px;
    border-radius:26px;
    background:linear-gradient(135deg,rgba(255,255,255,.96),rgba(245,243,255,.92),rgba(240,249,255,.90));
}

.memo-record-card>*{
    position:relative;
    z-index:2;
}

.memo-heading{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:22px;
    padding-bottom:16px;
    border-bottom:1px solid rgba(226,232,240,.85);
}

.memo-icon{
    width:52px;
    height:52px;
    display:grid;
    place-items:center;
    border-radius:16px;
    font-size:24px;
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 16px 34px rgba(124,58,237,.25);
}

.memo-heading h2{
    color:#0F172A;
    font-size:22px;
    font-weight:950;
}

.memo-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
}

.memo-filter-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:15px;
    align-items:end;
    margin-bottom:20px;
}

.memo-label{
    display:block;
    margin-bottom:8px;
    color:#334155;
    font-size:13px;
    font-weight:900;
}

.memo-input{
    width:100%;
    height:46px;
    padding:0 14px;
    border-radius:14px;
    background:#fff;
    border:1px solid #CBD5E1;
    color:#0F172A;
    outline:none;
}

.memo-input:focus{
    border-color:#7C3AED;
    box-shadow:0 0 0 4px rgba(124,58,237,.12);
}

.memo-actions{
    display:flex;
    gap:10px;
}

.memo-btn{
    height:46px;
    padding:0 22px;
    border-radius:14px;
    color:#fff;
    font-size:13px;
    font-weight:900;
    transition:.3s ease;
}

.memo-btn:hover{
    transform:translateY(-3px);
}

.memo-btn.filter{
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
}

.memo-btn.reset{
    background:linear-gradient(135deg,#EF4444,#F97316);
}

/* TABLE */
.memo-table-wrap{
    overflow-x:auto;
    border-radius:18px;
    border:1px solid rgba(226,232,240,.85);
    background:#fff;
}

#cashMemoTable{
    width:100%;
    min-width:800px;
    border-collapse:collapse;
}

#cashMemoTable thead{
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
}

#cashMemoTable th{
    padding:14px;
    text-align:left;
    color:#fff;
    font-size:13px;
    font-weight:900;
    white-space:nowrap;
}

#cashMemoTable td{
    padding:14px;
    color:#334155;
    font-size:13px;
    font-weight:700;
    border-bottom:1px solid #E2E8F0;
    white-space:nowrap;
}

#cashMemoTable tbody tr:hover{
    background:#F8FAFC;
}

@keyframes spinGlow{
    to{
        transform:rotate(360deg);
    }
}

@media(max-width:768px){
    .memo-record-card{
        padding:18px;
        border-radius:22px;
    }

    .memo-record-card::after{
        border-radius:20px;
    }

    .memo-icon{
        width:44px;
        height:44px;
        font-size:20px;
    }

    .memo-heading h2{
        font-size:18px;
    }

    .memo-actions{
        flex-direction:column;
    }

    .memo-btn{
        width:100%;
    }

    #cashMemoTable th,
    #cashMemoTable td{
        padding:12px;
        font-size:12px;
    }
}

    </style>
</head>

<body class="text-white ">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <div class="p-4 md:p-8 mt-10 mb-24 md:mb-10 md:ml-[300px]">

    <div class="memo-record-card">

        <div class="memo-heading">
            <div class="memo-icon">💵</div>

            <div>
                <h2>Cash Memo Records</h2>
                <p>Filter and view all cash memo records</p>
            </div>
        </div>

        <div class="memo-filter-grid">

            <div>
                <label class="memo-label">From Date</label>
                <input type="date" id="fromDate" class="memo-input">
            </div>

            <div>
                <label class="memo-label">To Date</label>
                <input type="date" id="toDate" class="memo-input">
            </div>

            <div class="memo-actions">
                <button onclick="filterByDate()" class="memo-btn filter">
                    Filter
                </button>

                <button onclick="resetFilter()" class="memo-btn reset">
                    Reset
                </button>
            </div>

        </div>

        <div class="memo-table-wrap">

            <table id="cashMemoTable">

                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Cash Memo No</th>
                        <th>Amount</th>
                        <th>Receipt Number</th>
                        <th>Date</th>
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

        window.onload = function() {

            getCashMemos();

        }



        // =========================
        // GET CASH MEMOS
        // =========================

        async function getCashMemos() {

            try {

                const response = await fetch(

                    url + "cash-memos/",

                    {

                        method: "GET",

                        headers: {

                            "Accept": "application/json",

                            "Authorization": "Bearer " +
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

                if (cashMemos.length === 0) {

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

                cashMemos.forEach((item, index) => {

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

                    destroy: true,

                    dom: 'Bfrtip',

                    buttons: [

                        'copy',

                        'csv',

                        'excel',

                        'pdf',

                        'print'

                    ],

                    pageLength: 10

                });

            } catch (error) {

                console.log(error);

                alert("Failed To Fetch Data");

            }

        }

        // =========================
        // FILTER DATE
        // =========================

        function filterByDate() {

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

                function(settings, data) {

                    const rowDate =
                        data[4];



                    if (

                        (!fromDate && !toDate)

                    ) {

                        return true;

                    }



                    if (

                        fromDate &&
                        rowDate < fromDate

                    ) {

                        return false;

                    }



                    if (

                        toDate &&
                        rowDate > toDate

                    ) {

                        return false;

                    }



                    return true;

                }

            );



            table.draw();

        }

        function resetFilter() {

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