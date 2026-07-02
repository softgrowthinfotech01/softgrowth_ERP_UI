<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ledger Report - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
 /* Minimal custom styles – everything else is Tailwind */
        .table-row-hover:hover {
            background-color: #f8fafc;
        }
        .toolbar-btn {
            transition: background-color 0.2s, transform 0.1s;
        }
        .toolbar-btn:hover {
            transform: translateY(-1px);
        }
        .page-btn {
            transition: background-color 0.2s;
        }
        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        /* responsive table wrapper */
        .table-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        @media (max-width: 640px) {
            .table-wrap table {
                font-size: 0.85rem;
            }
            .table-wrap table th,
            .table-wrap table td {
                padding: 0.5rem 0.25rem;
            }
        }
        .credit {
            color: #16a34a;
            font-weight: 700;
        }
        .debit {
            color: #dc2626;
            font-weight: 700;
        }
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

     <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== LEDGER CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Header -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-gray-900">Ledger Report</h2>
                    <p class="text-sm text-gray-500">Track debit, credit and transaction history</p>
                </div>
            </div>

            <!-- Filters -->
            <div class="p-4 sm:p-6 border-b border-gray-100">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">From Date</label>
                        <input type="date" id="fromDate" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">To Date</label>
                        <input type="date" id="toDate" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Receipt Number</label>
                        <input type="text" id="receiptSearch" placeholder="Search Receipt No" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>
                    <div class="flex items-end">
                        <button onclick="loadLedger()" 
                                class="w-full bg-teal-600 text-white font-bold py-2.5 px-4 rounded-xl hover:bg-teal-700 transition focus:ring-2 focus:ring-teal-300">
                            <i class="fas fa-filter mr-1"></i> Filter Report
                        </button>
                    </div>
                </div>
            </div>

            <!-- Export Buttons -->
            <div class="flex flex-wrap items-center gap-2 p-4 sm:p-6 border-b border-gray-100">
                <button onclick="exportLedger('copy')" class="toolbar-btn px-4 py-2 bg-gray-600 text-white text-sm font-bold rounded-xl hover:bg-gray-700">
                    <i class="fas fa-copy mr-1"></i> Copy
                </button>
                <button onclick="exportLedger('csv')" class="toolbar-btn px-4 py-2 bg-sky-500 text-white text-sm font-bold rounded-xl hover:bg-sky-600">
                    <i class="fas fa-file-csv mr-1"></i> CSV
                </button>
                <button onclick="exportLedger('excel')" class="toolbar-btn px-4 py-2 bg-emerald-500 text-white text-sm font-bold rounded-xl hover:bg-emerald-600">
                    <i class="fas fa-file-excel mr-1"></i> Excel
                </button>
                <button onclick="exportLedger('pdf')" class="toolbar-btn px-4 py-2 bg-red-500 text-white text-sm font-bold rounded-xl hover:bg-red-600">
                    <i class="fas fa-file-pdf mr-1"></i> PDF
                </button>
                <button onclick="exportLedger('print')" class="toolbar-btn px-4 py-2 bg-purple-500 text-white text-sm font-bold rounded-xl hover:bg-purple-600">
                    <i class="fas fa-print mr-1"></i> Print
                </button>
            </div>

            <!-- Table -->
            <div class="table-wrap p-4 sm:p-6">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="bg-teal-600 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-3 py-3 whitespace-nowrap">SR.NO.</th>
                            <th class="px-3 py-3 whitespace-nowrap">RECEIPT NUMBER</th>
                            <th class="px-3 py-3 whitespace-nowrap">MEMO DETAILS</th>
                            <th class="px-3 py-3 whitespace-nowrap">STUDENT BATCH</th>
                            <th class="px-3 py-3 whitespace-nowrap">BRANCH</th>
                            <th class="px-3 py-3 whitespace-nowrap">CREDIT</th>
                            <th class="px-3 py-3 whitespace-nowrap">DEBIT</th>
                            <th class="px-3 py-3 whitespace-nowrap">OPENING</th>
                            <th class="px-3 py-3 whitespace-nowrap">DATE</th>
                        </tr>
                    </thead>
                    <tbody id="ledgerTableBody" class="divide-y divide-gray-100">
                        <!-- rows injected by JS -->
                        <tr>
                            <td colspan="9" class="text-center py-8 text-gray-400">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-100">
                <div class="text-sm text-gray-500 font-semibold">
                    Showing <span id="startEntry">0</span> to <span id="endEntry">0</span> of <span id="totalEntries">0</span> entries
                </div>
                <div class="flex items-center gap-2">
                    <button id="prevPage" class="page-btn px-5 py-2 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-700 focus:ring-2 focus:ring-teal-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </button>
                    <span id="currentPageDisplay" class="px-4 py-2 bg-teal-100 text-teal-800 font-bold rounded-xl">1</span>
                    <button id="nextPage" class="page-btn px-5 py-2 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-700 focus:ring-2 focus:ring-teal-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
            </div>

        </div>

    </main>
    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>



 <!-- ============================================================
    JAVASCRIPT – data, pagination, filter, export
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ----- SAMPLE LEDGER DATA -----
            const ledgerData = [
                { sr: 1, receipt: 'RCP-001', memo: 'Admission Fee - Rahul Sharma', batch: '2024-25', branch: 'BCA', credit: '₹15,000', debit: '-', opening: '₹0', date: '2025-01-15' },
                { sr: 2, receipt: 'RCP-002', memo: 'Tuition Fee - Priya Patel', batch: '2025-26', branch: 'BBA', credit: '₹25,000', debit: '-', opening: '₹0', date: '2025-01-16' },
                { sr: 3, receipt: 'RCP-003', memo: 'Exam Fee - Amit Singh', batch: '2024-25', branch: 'BCA', credit: '-', debit: '₹5,000', opening: '₹15,000', date: '2025-01-17' },
                { sr: 4, receipt: 'RCP-004', memo: 'Library Fee - Sneha Reddy', batch: '2023-24', branch: 'B.Com', credit: '-', debit: '₹2,000', opening: '₹10,000', date: '2025-01-18' },
                { sr: 5, receipt: 'RCP-005', memo: 'Lab Fee - Vikram Kumar', batch: '2025-26', branch: 'BBA', credit: '-', debit: '₹3,500', opening: '₹8,000', date: '2025-01-19' },
                { sr: 6, receipt: 'RCP-006', memo: 'Admission Fee - Neha Jain', batch: '2024-25', branch: 'BCA', credit: '₹15,000', debit: '-', opening: '₹4,500', date: '2025-01-20' },
                { sr: 7, receipt: 'RCP-007', memo: 'Tuition Fee - Ravi Desai', batch: '2023-24', branch: 'B.Com', credit: '₹25,000', debit: '-', opening: '₹0', date: '2025-01-21' },
                { sr: 8, receipt: 'RCP-008', memo: 'Exam Fee - Meera Iyer', batch: '2025-26', branch: 'BBA', credit: '-', debit: '₹5,000', opening: '₹25,000', date: '2025-01-22' },
                { sr: 9, receipt: 'RCP-009', memo: 'Library Fee - Arjun Nair', batch: '2024-25', branch: 'BCA', credit: '-', debit: '₹2,000', opening: '₹20,000', date: '2025-01-23' },
                { sr: 10, receipt: 'RCP-010', memo: 'Lab Fee - Kavya Menon', batch: '2023-24', branch: 'B.Com', credit: '-', debit: '₹3,500', opening: '₹18,000', date: '2025-01-24' },
                { sr: 11, receipt: 'RCP-011', memo: 'Admission Fee - Deepak Gupta', batch: '2024-25', branch: 'BCA', credit: '₹15,000', debit: '-', opening: '₹14,500', date: '2025-01-25' },
                { sr: 12, receipt: 'RCP-012', memo: 'Tuition Fee - Pooja Reddy', batch: '2025-26', branch: 'BBA', credit: '₹25,000', debit: '-', opening: '₹0', date: '2025-01-26' }
            ];

            const rowsPerPage = 5;
            let currentPage = 1;
            let filteredData = [...ledgerData];
            let totalPages = Math.ceil(filteredData.length / rowsPerPage);

            const tbody = document.getElementById('ledgerTableBody');

            // References to filter inputs
            const fromDate = document.getElementById('fromDate');
            const toDate = document.getElementById('toDate');
            const receiptSearch = document.getElementById('receiptSearch');

            function renderTable(page) {
                const start = (page - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, filteredData.length);
                const pageItems = filteredData.slice(start, end);

                if (pageItems.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="9" class="text-center py-8 text-gray-400">No records found</td></tr>`;
                } else {
                    let html = '';
                    pageItems.forEach((item) => {
                        const creditClass = item.credit !== '-' ? 'credit' : '';
                        const debitClass = item.debit !== '-' ? 'debit' : '';
                        html += `
                            <tr class="table-row-hover transition">
                                <td class="px-3 py-3 whitespace-nowrap">${item.sr}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-medium text-gray-900">${item.receipt}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.memo}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.batch}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.branch}</td>
                                <td class="px-3 py-3 whitespace-nowrap ${creditClass}">${item.credit}</td>
                                <td class="px-3 py-3 whitespace-nowrap ${debitClass}">${item.debit}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.opening}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.date}</td>
                            </tr>
                        `;
                    });
                    tbody.innerHTML = html;
                }

                // Update footer info
                document.getElementById('startEntry').textContent = filteredData.length ? start + 1 : 0;
                document.getElementById('endEntry').textContent = end;
                document.getElementById('totalEntries').textContent = filteredData.length;
                document.getElementById('currentPageDisplay').textContent = page;

                // Update pagination buttons
                document.getElementById('prevPage').disabled = (page === 1);
                document.getElementById('nextPage').disabled = (page === totalPages || filteredData.length === 0);
            }

            function updatePagination() {
                totalPages = Math.ceil(filteredData.length / rowsPerPage);
                if (currentPage > totalPages) currentPage = totalPages || 1;
                renderTable(currentPage);
            }

            // Pagination event listeners
            document.getElementById('prevPage').addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable(currentPage);
                }
            });

            document.getElementById('nextPage').addEventListener('click', function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTable(currentPage);
                }
            });

            // ----- FILTER FUNCTION (loadLedger) -----
            window.loadLedger = function() {
                const from = fromDate.value;
                const to = toDate.value;
                const receipt = receiptSearch.value.trim().toLowerCase();

                filteredData = ledgerData.filter(item => {
                    let match = true;
                    if (from && item.date < from) match = false;
                    if (to && item.date > to) match = false;
                    if (receipt && !item.receipt.toLowerCase().includes(receipt)) match = false;
                    return match;
                });

                currentPage = 1;
                updatePagination();
            };

            // ----- EXPORT FUNCTIONS (demo) -----
            window.exportLedger = function(type) {
                alert(`Export ${type.toUpperCase()} clicked (demo)`);
                // In a real app, implement actual export logic here.
            };

            // Initial render
            updatePagination();

            // Optional: auto-filter on input change (if desired) – we keep manual button.
        });
    </script>



    <script>
        let allLedger = [];

        window.onload = function() {

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

            } catch (error) {

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


        function exportLedger(type) {

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
            if (type == "copy") {

                let text = rows.map(r => r.join("\t")).join("\n");

                navigator.clipboard.writeText(text);

                alert("Copied Successfully");

            }

            // CSV
            else if (type == "csv") {

                let csv = rows.map(r => r.join(",")).join("\n");

                let blob = new Blob([csv], {
                    type: "text/csv"
                });

                let a = document.createElement("a");

                a.href = URL.createObjectURL(blob);

                a.download = "Ledger_Report.csv";

                a.click();

            }

            // Excel
            else if (type == "excel") {

                let ws = XLSX.utils.aoa_to_sheet(rows);

                let wb = XLSX.utils.book_new();

                XLSX.utils.book_append_sheet(wb, ws, "Ledger");

                XLSX.writeFile(wb, "Ledger_Report.xlsx");

            }

            // PDF
            else if (type == "pdf") {

                const {
                    jsPDF
                } = window.jspdf;

                let pdf = new jsPDF("l", "mm", "a4");

                pdf.autoTable({

                    head: [rows[0]],

                    body: rows.slice(1)

                });

                pdf.save("Ledger_Report.pdf");

            }

            // Print
            else if (type == "print") {

                let html = "<h2>Ledger Report</h2><table border='1' cellspacing='0' cellpadding='6'>";

                rows.forEach(r => {

                    html += "<tr>";

                    r.forEach(c => {

                        html += "<td>" + c + "</td>";

                    });

                    html += "</tr>";

                });

                html += "</table>";

                let win = window.open("");

                win.document.write(html);

                win.print();

            }

        }

        document.getElementById("receiptSearch").addEventListener("keyup", function() {

            loadLedger();

        });

        document.getElementById("fromDate").addEventListener("change", function() {

            loadLedger();

        });

        document.getElementById("toDate").addEventListener("change", function() {

            loadLedger();

        });
    </script>
</body>

</html>