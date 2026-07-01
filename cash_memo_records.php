<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Memo Records - ERP</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="dist/style.css">

    <link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <link rel="stylesheet"
        href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>

    </style>
</head>

<body class="text-white ">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

<div class="memo-page-wrap">
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

    responsive: true,

    pageLength: 10,

    lengthMenu: [[10,25,50,100],[10,25,50,100]],

    dom:'Bfrtip',

    buttons:[
        'copy',
        'csv',
        'excel',
        'pdf',
        'print'
    ]

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