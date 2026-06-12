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
        <div class="ledger-filter-grid">

            <div>
                <label class="ledger-label">
                    From Date
                </label>

                <input type="date" class="ledger-input">
            </div>

            <div>
                <label class="ledger-label">
                    To Date
                </label>

                <input type="date" class="ledger-input">
            </div>

            <div class="flex items-end">
                <button class="filter-btn">
                    Filter Report
                </button>
            </div>

        </div>

        <!-- EXPORT -->
        <div class="toolbar-buttons">

          <button class="btn-copy">Copy</button>
                <button class="btn-csv">CSV</button>
                <button class="btn-excel">Excel</button>
                <button class="btn-pdf">PDF</button>
                <button class="btn-print">Print</button>

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

                <tbody>

                    <tr>
                        <td>1</td>
                        <td>123</td>
                        <td>Snacks</td>
                        <td>BCA 2026</td>
                        <td>Nagpur</td>
                        <td class="credit">0.00</td>
                        <td class="debit">5,000.00</td>
                        <td>-5,000.00</td>
                        <td>12-09-2026 00:00:00</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>124</td>
                        <td>Books</td>
                        <td>BBA 2026</td>
                        <td>Pune</td>
                        <td class="credit">2,000.00</td>
                        <td class="debit">0.00</td>
                        <td>2,000.00</td>
                        <td>13-09-2026 10:30:00</td>
                    </tr>

                </tbody>

            </table>

        </div>

        <!-- FOOTER -->
        <div class="table-footer">

            <div class="table-info">
                Showing 1 to 2 of 2 entries
            </div>

            <div class="pagination">

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

</body>
</html>