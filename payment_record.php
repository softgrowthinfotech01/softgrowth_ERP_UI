<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Payment - ERP</title>

<link rel="stylesheet" href="dist/output.css">
<link rel="stylesheet" href="dist/style.css">


<style>

</style>

</head>

<body class="text-white">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="payment-page-wrap">

    <div class="table-card">

        <div class="table-heading">
            <div class="table-icon">💳</div>

            <div>
                <h2>Payment Records</h2>
                <p>Manage and track all student payment transactions</p>
            </div>
        </div>

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

        <div class="table-footer">

            <div class="table-info">
                Showing 0 to 0 of 0 entries
            </div>

            <div class="pagination">
                <button class="page-btn">Previous</button>
                <button class="page-btn">Next</button>
            </div>

        </div>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>