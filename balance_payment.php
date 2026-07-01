<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Balance Payment - ERP</title>

<link rel="stylesheet" href="dist/output.css">
<link rel="stylesheet" href="dist/style.css">


<style>

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