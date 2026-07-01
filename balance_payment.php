<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Balance Payment - ERP</title>

<link rel="stylesheet" href="dist/output.css">

<style>
html, body{
    margin:0;
    padding:0;
    min-height:100%;
}

body{
    overflow-x:hidden;
    min-height:100vh;
    display:flex;
    flex-direction:column;

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
}

/* MAIN CONTENT */
.balance-page-wrap{
    flex:1;
    margin-left:300px;
    padding:115px 45px 24px;
}

/* CARD */
.table-card{
    position:relative;
    overflow:hidden;
    width:100%;
    max-width:1280px;
    margin:0 auto;
    padding:22px;
    border-radius:26px;

    background:linear-gradient(135deg,
        rgba(255,255,255,.92),
        rgba(245,243,255,.88),
        rgba(236,254,255,.84)
    );

    border:1px solid rgba(255,255,255,.75);
    backdrop-filter:blur(35px);
    -webkit-backdrop-filter:blur(35px);
    box-shadow:0 35px 90px rgba(15,23,42,.22);
}



.table-card::after{
    content:"";
    position:absolute;
    inset:2px;
    border-radius:24px;
    background:linear-gradient(135deg,
        rgba(255,255,255,.96),
        rgba(245,243,255,.92),
        rgba(240,249,255,.90)
    );
}

.table-card>*{
    position:relative;
    z-index:2;
}

/* HEADER */
.table-heading{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:20px;
    padding-bottom:16px;
    border-bottom:1px solid rgba(226,232,240,.85);
}

.table-icon{
    width:48px;
    height:48px;
    min-width:48px;
    display:grid;
    place-items:center;
    border-radius:16px;
    font-size:22px;
    color:#fff;
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 16px 34px rgba(124,58,237,.28);
}

.table-heading h2{
    color:#0F172A;
    font-size:22px;
    font-weight:950;
    line-height:1.2;
}

.table-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
    line-height:1.5;
}

/* TOOLBAR */
.toolbar-wrap{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
    flex-wrap:wrap;
    margin-bottom:18px;
}

.toolbar-buttons{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

.btn-copy,
.btn-csv,
.btn-excel,
.btn-pdf,
.btn-print{
    color:#fff;
    padding:10px 15px;
    border-radius:12px;
    font-size:13px;
    font-weight:900;
    transition:.25s ease;
}

.btn-copy{background:#475569;}
.btn-csv{background:#0EA5E9;}
.btn-excel{background:#16A34A;}
.btn-pdf{background:#DC2626;}
.btn-print{background:#7C3AED;}

.btn-copy:hover{background:#334155;}
.btn-csv:hover{background:#0284C7;}
.btn-excel:hover{background:#15803D;}
.btn-pdf:hover{background:#B91C1C;}
.btn-print:hover{background:#6D28D9;}

.search-input{
    width:270px;
    max-width:100%;
    height:44px;
    padding:0 14px;
    border-radius:14px;
    background:#fff;
    border:1px solid rgba(203,213,225,.9);
    color:#0F172A;
    font-size:13px;
    font-weight:700;
    outline:none;
}

.search-input:focus{
    border-color:#7C3AED;
    box-shadow:0 0 0 4px rgba(124,58,237,.12);
}

/* TABLE */
.table-wrap{
    width:100%;
    overflow-x:auto;
    border-radius:18px;
    border:1px solid rgba(226,232,240,.85);
    background:#fff;
}

table{
    width:100%;
    min-width:900px;
    border-collapse:collapse;
}

thead{
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
}

th{
    padding:14px;
    text-align:left;
    color:#fff;
    font-size:13px;
    font-weight:900;
    white-space:nowrap;
}

td{
    padding:14px;
    color:#334155;
    font-size:13px;
    font-weight:700;
    border-bottom:1px solid #E2E8F0;
    white-space:nowrap;
}

tbody tr{
    transition:.25s ease;
}

tbody tr:hover{
    background:#F8FAFC;
}

.empty-row{
    text-align:center;
    color:#64748B;
    padding:30px;
}

/* TABLE FOOTER */
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
    gap:10px;
}

.page-btn{
    padding:10px 16px;
    border-radius:14px;
    color:#fff;
    font-size:13px;
    font-weight:900;
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 10px 24px rgba(124,58,237,.18);
    transition:.3s ease;
}

.page-btn:hover{
    transform:translateY(-3px);
}

/* FOOTER PROPER SET */
footer,
.erp-footer{
    position:relative !important;
    left:auto !important;
    right:auto !important;
    bottom:auto !important;

    margin-top:auto !important;
    margin-left:290px !important;
    width:calc(100% - 290px) !important;

    padding:0 !important;
    z-index:20 !important;
}

.erp-footer-wrap,
.erp-footer-inner{
    margin:0 !important;
    border-radius:30px 30px 0 0 !important;
}

@keyframes spinGlow{
    to{transform:rotate(360deg);}
}

/* TABLET */
@media(max-width:1024px){
    .balance-page-wrap{
        margin-left:0 !important;
        padding:100px 16px 20px !important;
    }

    footer,
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
    }
}

/* MOBILE */
@media(max-width:768px){
    body{
        background-attachment:scroll !important;
    }

    .balance-page-wrap{
        margin-left:0 !important;
        padding:95px 12px 16px !important;
    }

    .table-card{
        width:100%;
        max-width:100%;
        padding:18px;
        border-radius:24px;
    }

    .table-card::after{
        border-radius:22px;
    }

    .table-heading{
        align-items:flex-start;
        gap:12px;
        margin-bottom:18px;
    }

    .table-icon{
        width:42px;
        height:42px;
        min-width:42px;
        font-size:20px;
        border-radius:14px;
    }

    .table-heading h2{
        font-size:21px;
    }

    .table-heading p{
        font-size:13px;
    }

    .toolbar-wrap{
        flex-direction:column;
        align-items:stretch;
    }

    .toolbar-buttons{
        justify-content:center;
    }

    .btn-copy,
    .btn-csv,
    .btn-excel,
    .btn-pdf,
    .btn-print{
        padding:9px 13px;
        font-size:12px;
    }

    .search-input{
        width:100%;
    }

    table{
        min-width:760px;
    }

    th,
    td{
        padding:11px 12px;
        font-size:12px;
    }

    .table-footer{
        flex-direction:column;
        text-align:center;
    }

    footer,
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
        padding:0 !important;
    }

    .erp-footer-wrap,
    .erp-footer-inner{
        width:100% !important;
        max-width:100% !important;
        margin:0 !important;
        border-radius:24px 24px 0 0 !important;
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

<body class="text-white">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="balance-page-wrap">

    <div class="table-card">

        <div class="table-heading">
            <div class="table-icon">⚖️</div>

            <div>
                <h2>Student Balance Details</h2>
                <p>Track pending balance and payment details</p>
            </div>
        </div>

        <div class="toolbar-wrap">

            <div class="toolbar-buttons">
                <button onclick="exportData('copy')" class="btn-copy">Copy</button>
                <button onclick="exportData('csv')" class="btn-csv">CSV</button>
                <button onclick="exportData('excel')" class="btn-excel">Excel</button>
                <button onclick="exportData('pdf')" class="btn-pdf">PDF</button>
                <button onclick="exportData('print')" class="btn-print">Print</button>
            </div>

            <input id="search" type="text" placeholder="Search balance records..." class="search-input">

        </div>

        <div class="table-wrap">
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

              <tbody id="balanceTableBody">

</tbody>

            </table>
        </div>

        <div class="table-footer">
<div
id="tableInfo"
class="table-info">

Loading...

</div>

        <div
id="pagination"
class="pagination">

</div>

        </div>

    </div>

</div>

<?php include 'footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<script src="url.js"></script>

<script>
let allBalanceRecords = [];
    window.onload=function(){

    loadStudents();

}

//============================

async function loadStudents(page=1){

    try{

        const search=
        document.getElementById("search").value;

        const response=await fetch(

            url+
            "student-balance-records?page="+
            page+
            "&search="+
            encodeURIComponent(search),

            {

                headers:{

                    Authorization:
                    "Bearer "+
                    localStorage.getItem("token"),

                    Accept:"application/json"

                }

            }

        );

        const result=
        await response.json();

        console.log(result);

        fillTable(result.data);

    }

    catch(error){

        console.log(error);

        alert("Unable to fetch records.");

    }

}

//============================

function fillTable(data){
allBalanceRecords = data.data;
    const tbody=
    document.getElementById("balanceTableBody");

    tbody.innerHTML="";

    if(data.data.length==0){

        tbody.innerHTML=`

        <tr>

        <td colspan="8"
        class="empty-row">

        No Records Found

        </td>

        </tr>

        `;

        return;

    }

    data.data.forEach((student,index)=>{

        let status = "";

if (Number(student.balance_amount) <= 0) {

    status = `
        <span class="px-3 py-1 rounded-full bg-green-600 text-white">

 ✓ Paid

</span>
    `;

} else {

    status = `
        <span class="px-3 py-1 rounded-full bg-red-600 text-white">

● Pending

</span>
    `;

}

        tbody.innerHTML+=`

        <tr>

            <td>

                ${index+1}

            </td>

            <td>

                ${student.student_name}

            </td>

            <td>

                ${student.student_batch}

            </td>

            <td>

                ₹ ${Number(student.total_fees).toLocaleString()}

            </td>

            <td>

                ₹ ${Number(student.paid_fees).toLocaleString()}

            </td>

            <td>

                ₹ ${Number(student.balance_amount).toLocaleString()}

            </td>

            <td>

                ${status}

            </td>

        </tr>

        `;

    });

    document.getElementById("tableInfo").innerHTML=

    `Showing ${data.from} to ${data.to} of ${data.total} Entries`;

    pagination(data);

}

//============================

function pagination(data){

    const div=

    document.getElementById("pagination");

    div.innerHTML="";

    for(let i=1;i<=data.last_page;i++){

        div.innerHTML+=`

        <button

        class="page-btn"

        onclick="loadStudents(${i})">

        ${i}

        </button>

        `;

    }

}

//============================

document

.getElementById("search")

.addEventListener(

"keyup",

function(){

loadStudents();

}

);


// export
function exportData(type){

    let rows = [];

    rows.push([
        "Student Name",
        "Batch",
        "Total Fees",
        "Paid Fees",
        "Balance Fees",
        "Status"
    ]);

    allBalanceRecords.forEach(student=>{

        rows.push([

            student.student_name,

            student.student_batch,

            student.total_fees,

            student.paid_fees,

            student.balance_amount,

            student.balance_amount==0
            ?
            "Paid"
            :
            "Pending"

        ]);

    });

    //====================

    if(type=="copy"){

        let text = rows.map(r=>r.join("\t")).join("\n");

        navigator.clipboard.writeText(text);

        alert("Copied Successfully");

    }

    //====================

    else if(type=="csv"){

        let csv = rows.map(r=>r.join(",")).join("\n");

        let blob = new Blob([csv],{type:"text/csv"});

        let a=document.createElement("a");

        a.href=URL.createObjectURL(blob);

        a.download="Balance_Payment.csv";

        a.click();

    }

    //====================

    else if(type=="excel"){

        let ws=XLSX.utils.aoa_to_sheet(rows);

        let wb=XLSX.utils.book_new();

        XLSX.utils.book_append_sheet(wb,ws,"Balance");

        XLSX.writeFile(wb,"Balance_Payment.xlsx");

    }

    //====================

    else if(type=="pdf"){

        const {jsPDF}=window.jspdf;

        let pdf=new jsPDF();

        pdf.autoTable({

            head:[rows[0]],

            body:rows.slice(1)

        });

        pdf.save("Balance_Payment.pdf");

    }

    //====================

    else if(type=="print"){

        let html=`
        <h2 style="text-align:center">
        Balance Payment Report
        </h2>

        <table border="1"
        cellspacing="0"
        cellpadding="6"
        width="100%">

        <tr>

        ${rows[0].map(h=>`<th>${h}</th>`).join("")}

        </tr>

        ${rows.slice(1).map(r=>`

        <tr>

        ${r.map(c=>`<td>${c}</td>`).join("")}

        </tr>

        `).join("")}

        </table>
        `;

        let win=window.open();

        win.document.write(html);

        win.print();

    }

}
</script>
</body>
</html>