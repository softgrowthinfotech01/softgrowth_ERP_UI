<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ledger Form - ERP</title>

<link rel="stylesheet" href="dist/output.css">
<link rel="stylesheet" href="dist/style.css">


<style>

</style>
</head>

<body class="text-white ">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="p-4 md:p-8 mt-10 mb-24 md:mb-10 md:ml-[300px]">

    <div class="ledger-card">

        <!-- HEADER -->
        <div class="ledger-heading">

            <div class="ledger-icon">
                📒
            </div>

            <div>
                <h2>Ledger Report</h2>
                <p>Track debit, credit and transaction history</p>
            </div>

        </div>

        <!-- FILTERS -->
        <div class="grid md:grid-cols-4 gap-4 mb-6">

    <div>
        <label class="text-black block text-sm font-medium mb-2">
            From Date
        </label>

        <input
            type="date"
            id="fromDate"
            class="ledger-input">
    </div>

    <div>
        <label class="text-black block text-sm font-medium mb-2">
            To Date
        </label>

        <input
            type="date"
            id="toDate"
            class="ledger-input">
    </div>

    <div>
        <label class="text-black block text-sm font-medium mb-2">
            Receipt Number
        </label>

        <input
            type="text"
            id="receiptSearch"
            class="ledger-input"
            placeholder="Search Receipt No">
    </div>

    <div class="flex items-end">

        <button
            onclick="loadLedger()"
            class="filter-btn w-full">

            Filter Report

        </button>

    </div>

</div>

        <!-- EXPORT -->
     <div class="toolbar-buttons">

    <button class="btn-copy" onclick="exportLedger('copy')">
        Copy
    </button>

    <button class="btn-csv" onclick="exportLedger('csv')">
        CSV
    </button>

    <button class="btn-excel" onclick="exportLedger('excel')">
        Excel
    </button>

    <button class="btn-pdf" onclick="exportLedger('pdf')">
        PDF
    </button>

    <button class="btn-print" onclick="exportLedger('print')">
        Print
    </button>

</div>
        <!-- TABLE -->
        <div class="table-wrap">

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

               <tbody id="ledgerTableBody">

</tbody>
            </table>

        </div>

        <!-- FOOTER -->
        <div class="table-footer">
<div
id="tableInfo"
class="table-info">

Loading...

</div>

          <div
id="pagination"
class="pagination">

                <button class="page-btn">
                    Previous
                </button>

                <div class="page-number">
                    1
                </div>

                <button class="page-btn">
                    Next
                </button>

            </div>

        </div>

    </div>

</div>
<?php include 'footer.php' ?>
<script src="url.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>

<script>

    let allLedger = [];

window.onload = function () {

    loadLedger();

};

async function loadLedger(page = 1) {

    try {

        const fromDate = document.getElementById("fromDate").value;
        const toDate = document.getElementById("toDate").value;

       const receipt = document.getElementById("receiptSearch").value;

const response = await fetch(

    url +

    "ledger?page=" + page +

    "&receipt_number=" + encodeURIComponent(receipt) +

    "&from_date=" + fromDate +

    "&to_date=" + toDate,

    {
        headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            Accept: "application/json"
        }
    }

);

        const result = await response.json();

        console.log(result);

        fillLedger(result.data);

    }

    catch (error) {

        console.log(error);

        alert("Unable to fetch ledger.");

    }

}

function fillLedger(data) {

    allLedger = data.data;

    const tbody =
        document.getElementById("ledgerTableBody");

    tbody.innerHTML = "";

    if (data.data.length == 0) {

        tbody.innerHTML = `

            <tr>

                <td colspan="9" class="text-center py-8">

                    No Ledger Records Found

                </td>

            </tr>

        `;

        return;

    }

    data.data.forEach((ledger, index) => {

        tbody.innerHTML += `

            <tr>

                <td>${index + 1}</td>

                <td>${ledger.receipt_number}</td>

                <td>${ledger.memo_details}</td>

                <td>${ledger.student_batch ?? "-"}</td>

                <td>${ledger.branch ?? "-"}</td>

                <td class="credit">

                    ₹ ${Number(ledger.credit).toLocaleString()}

                </td>

                <td class="debit">

                    ₹ ${Number(ledger.debit).toLocaleString()}

                </td>

                <td>

                    ₹ ${Number(ledger.running_balance).toLocaleString()}

                </td>

                <td>

                    ${ledger.transaction_date.split(" ")[0]}

                </td>

            </tr>

        `;

    });

    document.getElementById("tableInfo").innerHTML =
        `Showing ${data.from} to ${data.to} of ${data.total} Entries`;

    renderPagination(data);

}

function renderPagination(data) {

    const div = document.getElementById("pagination");

    div.innerHTML = "";

    if (data.current_page > 1) {

        div.innerHTML += `
            <button class="page-btn"
                onclick="loadLedger(${data.current_page - 1})">
                Previous
            </button>
        `;

    }

    for (let i = 1; i <= data.last_page; i++) {

        div.innerHTML += `
            <button
                class="page-btn ${i == data.current_page ? 'bg-blue-700' : ''}"
                onclick="loadLedger(${i})">
                ${i}
            </button>
        `;

    }

    if (data.current_page < data.last_page) {

        div.innerHTML += `
            <button class="page-btn"
                onclick="loadLedger(${data.current_page + 1})">
                Next
            </button>
        `;

    }

}


function exportLedger(type){

    let rows = [];

    rows.push([
        "Receipt Number",
        "Memo Details",
        "Student Batch",
        "Branch",
        "Credit",
        "Debit",
        "Running Balance",
        "Date"
    ]);

    allLedger.forEach(item => {

        rows.push([
            item.receipt_number,
            item.memo_details,
            item.student_batch ?? "-",
            item.branch ?? "-",
            item.credit,
            item.debit,
            item.running_balance,
            item.transaction_date.split(" ")[0]
        ]);

    });

    // COPY
    if(type=="copy"){

        let text = rows.map(r=>r.join("\t")).join("\n");

        navigator.clipboard.writeText(text);

        alert("Copied Successfully");

    }

    // CSV
    else if(type=="csv"){

        let csv = rows.map(r=>r.join(",")).join("\n");

        let blob = new Blob([csv],{type:"text/csv"});

        let a=document.createElement("a");

        a.href=URL.createObjectURL(blob);

        a.download="Ledger_Report.csv";

        a.click();

    }

    // Excel
    else if(type=="excel"){

        let ws=XLSX.utils.aoa_to_sheet(rows);

        let wb=XLSX.utils.book_new();

        XLSX.utils.book_append_sheet(wb,ws,"Ledger");

        XLSX.writeFile(wb,"Ledger_Report.xlsx");

    }

    // PDF
    else if(type=="pdf"){

        const {jsPDF}=window.jspdf;

        let pdf=new jsPDF("l","mm","a4");

        pdf.autoTable({

            head:[rows[0]],

            body:rows.slice(1)

        });

        pdf.save("Ledger_Report.pdf");

    }

    // Print
    else if(type=="print"){

        let html="<h2>Ledger Report</h2><table border='1' cellspacing='0' cellpadding='6'>";

        rows.forEach(r=>{

            html+="<tr>";

            r.forEach(c=>{

                html+="<td>"+c+"</td>";

            });

            html+="</tr>";

        });

        html+="</table>";

        let win=window.open("");

        win.document.write(html);

        win.print();

    }

}

document.getElementById("receiptSearch").addEventListener("keyup", function () {

    loadLedger();

});

document.getElementById("fromDate").addEventListener("change", function () {

    loadLedger();

});

document.getElementById("toDate").addEventListener("change", function () {

    loadLedger();

});
</script>
</body>
</html>