<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ledger Form - ERP</title>

<link rel="stylesheet" href="dist/output.css">

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
    padding: 40px;
}

.ledger-card{
    position:relative;
    overflow:hidden;

    padding:22px;
    border-radius:28px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.92),
            rgba(245,243,255,.88),
            rgba(236,254,255,.84)
        );

    border:1px solid rgba(255,255,255,.75);
margin-top: 20px;
    backdrop-filter:blur(35px);

    box-shadow:
        0 35px 90px rgba(15,23,42,.20);
}

.ledger-card::before{
    content:"";
    position:absolute;
    inset:-2px;

    background:
        conic-gradient(
            from 180deg,
            #7C3AED,
            #06B6D4,
            #22C55E,
            #F59E0B,
            #7C3AED
        );

    opacity:.35;

    animation:spinGlow 8s linear infinite;
}

.ledger-card::after{
    content:"";
    position:absolute;
    inset:2px;

    border-radius:26px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.96),
            rgba(245,243,255,.92),
            rgba(240,249,255,.90)
        );
}

.ledger-card>*{
    position:relative;
    z-index:2;
}

/* HEADER */

.ledger-heading{
    display:flex;
    align-items:center;
    gap:14px;

    margin-bottom:24px;
    padding-bottom:18px;

    border-bottom:1px solid rgba(226,232,240,.85);
}

.ledger-icon{
    width:52px;
    height:52px;

    display:grid;
    place-items:center;

    border-radius:16px;

    font-size:24px;

    color:#fff;

    background:
        linear-gradient(
            135deg,
            #7C3AED,
            #06B6D4
        );

    box-shadow:
        0 16px 34px rgba(124,58,237,.25);
}

.ledger-heading h2{
    color:#0F172A;
    font-size:22px;
    font-weight:950;
}

.ledger-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
}

/* FILTER */

.ledger-filter-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:15px;

    margin-bottom:20px;
}

.ledger-label{
    display:block;

    margin-bottom:8px;

    color:#334155;
    font-size:13px;
    font-weight:900;
}

.ledger-input{
    width:100%;
    height:46px;

    padding:0 14px;

    border-radius:14px;

    background:#fff;

    border:1px solid #CBD5E1;

    color:#0F172A;
}

.ledger-input:focus{
    outline:none;

    border-color:#7C3AED;

    box-shadow:
        0 0 0 4px rgba(124,58,237,.12);
}

.filter-btn{
    width:100%;
    height:46px;

    border-radius:14px;

    color:#fff;
    font-size:13px;
    font-weight:900;

    background:
       
        #7C3AED ;
}

/* EXPORT BUTTONS */

.toolbar-buttons{
    display:flex;
    gap:10px;
    flex-wrap:wrap;

    margin-bottom:20px;
}

/* COPY */
.btn-copy{
    background:#475569;
    color:#fff;
    padding: 12px;
    border-radius: 8px;
}

/* CSV */
.btn-csv{
    background:#0EA5E9;
    color:#fff;
     padding: 12px;
    border-radius: 8px;
}

/* EXCEL */
.btn-excel{
    background:#16A34A;
    color:#fff;
     padding: 12px;
    border-radius: 8px;
}

/* PDF */
.btn-pdf{
    background:#DC2626;
    color:#fff;
     padding: 12px;
    border-radius: 8px;
}

/* PRINT */
.btn-print{
    background:#7C3AED;
    color:#fff;
     padding: 12px;
    border-radius: 8px;
}

.btn-copy:hover{background:#334155;}
.btn-csv:hover{background:#0284C7;}
.btn-excel:hover{background:#15803D;}
.btn-pdf:hover{background:#B91C1C;}
.btn-print:hover{background:#6D28D9;}


/* TABLE */

.table-wrap{
    overflow-x:auto;

    border-radius:18px;

    border:1px solid rgba(226,232,240,.85);

    background:#fff;
}

table{
    width:100%;
    min-width:1200px;
    border-collapse:collapse;
}

thead{
    background:
        linear-gradient(
            135deg,
            #7C3AED,
            #06B6D4
        );
}

th{
    padding:14px;

    text-align:left;

    color:#fff;
    font-size:13px;
    font-weight:900;
}

td{
    padding:14px;

    color:#334155;
    font-size:13px;
    font-weight:700;

    border-bottom:1px solid #E2E8F0;
}

tbody tr:hover{
    background:#F8FAFC;
}

.credit{
    color:#16A34A;
    font-weight:900;
}

.debit{
    color:#DC2626;
    font-weight:900;
}

/* FOOTER */

.table-footer{
    margin-top:18px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    flex-wrap:wrap;
    gap:12px;
}

.table-info{
    color:#64748B;
    font-size:13px;
    font-weight:700;
}

.pagination{
    display:flex;
    align-items:center;
    gap:10px;
}

.page-btn{
    padding:10px 16px;

    border-radius:14px;

    color:#fff;
    font-size:13px;
    font-weight:900;

    background:
        linear-gradient(
            135deg,
            #7C3AED,
            #06B6D4
        );
}

.page-number{
    width:40px;
    height:40px;

    display:grid;
    place-items:center;

    border-radius:12px;

    color:#fff;
    font-weight:900;

    background:
        linear-gradient(
            135deg,
            #7C3AED,
            #06B6D4
        );
}

@keyframes spinGlow{
    to{
        transform:rotate(360deg);
    }
}

@media(max-width:768px){

    .ledger-card{
        padding:18px;
    }

    .ledger-heading h2{
        font-size:18px;
    }

    .ledger-icon{
        width:44px;
        height:44px;
        font-size:20px;
    }

    .toolbar-buttons{
        justify-content:center;
    }

    .table-footer{
        flex-direction:column;
        text-align:center;
    }
}


html,
body{
    min-height:100%;
    margin:0;
    padding:0;
}

body{
    display:flex;
    flex-direction:column;
    overflow-x:hidden;
}

/* PAGE CONTENT */

.erp-page-wrap{
    flex:1;
    margin-left:300px;
    padding:105px 30px 20px;
}

/* FOOTER */

footer,
.erp-footer{
    position:relative !important;

    left:auto !important;
    right:auto !important;
    bottom:auto !important;

    width:calc(100% - 290px) !important;

    margin-left:290px !important;
    margin-top:-5px !important;

    padding:0 !important;
}

/* KEEP CURVE */

.erp-footer-wrap,
.erp-footer-inner{
    border-radius:30px 30px 0 0 !important;
    margin:0 !important;
}

/* MOBILE */

@media(max-width:1024px){

    .erp-page-wrap{
        margin-left:0;
        padding:90px 12px 15px;
    }

    footer,
    .erp-footer{
        width:100% !important;
        margin-left:0 !important;
    }
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