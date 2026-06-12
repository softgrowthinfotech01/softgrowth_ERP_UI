<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Payment - ERP</title>

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
    padding: 80px;
}
.table-card{
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

.table-card::before{
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

    animation:spinGlow 7s linear infinite;
}

.table-card::after{
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
    width:50px;
    height:50px;

    display:grid;
    place-items:center;

    border-radius:16px;

    font-size:24px;

    background:
        linear-gradient(
            135deg,
            #7C3AED,
            #06B6D4
        );

    box-shadow:
        0 16px 34px rgba(124,58,237,.28);
}

.table-heading h2{
    color:#0F172A;
    font-size:22px;
    font-weight:950;
}

.table-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
}

/* TOOLBAR */

.toolbar-wrap{
    display:flex;
    justify-content:space-between;
    gap:15px;
    flex-wrap:wrap;
    margin-bottom:18px;
}

.toolbar-buttons{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
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

.search-input{
    width:260px;
    max-width:100%;

    height:44px;

    padding:0 14px;

    border-radius:14px;

    background:#fff;

    border:1px solid #CBD5E1;

    color:#0F172A;
}

.search-input:focus{
    outline:none;

    border-color:#7C3AED;

    box-shadow:
        0 0 0 4px rgba(124,58,237,.12);
}

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

.empty-row{
    text-align:center;
    padding:30px;
    color:#64748B;
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
    gap:10px;
}

.page-btn{
    padding:10px 16px;

    border-radius:14px;

    color:#fff;
    font-size:13px;
    font-weight:800;

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
</style>

</head>

<body class="text-white">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<!-- HEADER -->
<div class="p-4 md:p-8 mt-10 mb-24 md:mb-10 md:ml-[300px]">

    <div class="table-card">

        <!-- HEADER -->
        <div class="table-heading">

            <div class="table-icon">
                💳
            </div>

            <div>
                <h2>Payment Records</h2>
                <p>Manage and track all student payment transactions</p>
            </div>

        </div>

        <!-- TOOLBAR -->
        <div class="toolbar-wrap">

            <div class="toolbar-buttons">

                <button class="btn-copy">Copy</button>
                <button class="btn-csv">CSV</button>
                <button class="btn-excel">Excel</button>
                <button class="btn-pdf">PDF</button>
                <button class="btn-print">Print</button>

            </div>

            <input
                type="text"
                placeholder="Search payment records..."
                class="search-input">

        </div>

        <!-- TABLE -->
        <div class="table-wrap">

            <table>

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Fees Paid</th>
                        <th>Amount</th>
                        <th>Receipt No</th>
                        <th>Payment Mode</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td colspan="9" class="empty-row">
                            No data available in table
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

        <!-- FOOTER -->
        <div class="table-footer">

            <div class="table-info">
                Showing 0 to 0 of 0 entries
            </div>

            <div class="pagination">

                <button class="page-btn">
                    Previous
                </button>

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