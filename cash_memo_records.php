<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cash Memo Records - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
  /* Minimal custom styles – everything else is Tailwind */
        .table-row-hover:hover {
            background-color: #f8fafc;
        }
        .memo-btn {
            transition: background-color 0.2s, transform 0.1s;
        }
        .memo-btn:hover {
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
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

 <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== CASH MEMO CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900">Cash Memo Records</h2>
                    <p class="text-sm text-gray-500">Filter and view all cash memo records</p>
                </div>
            </div>

            <!-- Filters -->
            <div class="p-4 sm:p-6 border-b border-gray-100">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
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
                    <div class="flex gap-3">
                        <button onclick="filterByDate()" 
                                class="memo-btn flex-1 bg-teal-600 text-white font-bold py-2.5 px-4 rounded-xl hover:bg-teal-700 focus:ring-2 focus:ring-teal-300">
                            <i class="fas fa-filter mr-1"></i> Filter
                        </button>
                        <button onclick="resetFilter()" 
                                class="memo-btn flex-1 bg-red-500 text-white font-bold py-2.5 px-4 rounded-xl hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                            <i class="fas fa-undo mr-1"></i> Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-wrap p-4 sm:p-6">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="bg-teal-600 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-3 py-3 whitespace-nowrap">Sr No</th>
                            <th class="px-3 py-3 whitespace-nowrap">Cash Memo No</th>
                            <th class="px-3 py-3 whitespace-nowrap">Amount</th>
                            <th class="px-3 py-3 whitespace-nowrap">Receipt Number</th>
                            <th class="px-3 py-3 whitespace-nowrap">Date</th>
                        </tr>
                    </thead>
                    <tbody id="memoTableBody" class="divide-y divide-gray-100">
                        <!-- rows injected by JS -->
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-400">Loading...</td>
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

<!-- ============================================================
    JAVASCRIPT – data, pagination, filter, reset
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ----- SAMPLE MEMO DATA -----
            const memoData = [
                { sr: 1, memoNo: 'CM-001', amount: '₹5,000', receipt: 'RCP-101', date: '2025-01-15' },
                { sr: 2, memoNo: 'CM-002', amount: '₹3,200', receipt: 'RCP-102', date: '2025-01-16' },
                { sr: 3, memoNo: 'CM-003', amount: '₹7,500', receipt: 'RCP-103', date: '2025-01-17' },
                { sr: 4, memoNo: 'CM-004', amount: '₹2,100', receipt: 'RCP-104', date: '2025-01-18' },
                { sr: 5, memoNo: 'CM-005', amount: '₹9,800', receipt: 'RCP-105', date: '2025-01-19' },
                { sr: 6, memoNo: 'CM-006', amount: '₹4,400', receipt: 'RCP-106', date: '2025-01-20' },
                { sr: 7, memoNo: 'CM-007', amount: '₹6,700', receipt: 'RCP-107', date: '2025-01-21' },
                { sr: 8, memoNo: 'CM-008', amount: '₹3,900', receipt: 'RCP-108', date: '2025-01-22' },
                { sr: 9, memoNo: 'CM-009', amount: '₹8,300', receipt: 'RCP-109', date: '2025-01-23' },
                { sr: 10, memoNo: 'CM-010', amount: '₹1,800', receipt: 'RCP-110', date: '2025-01-24' },
                { sr: 11, memoNo: 'CM-011', amount: '₹5,600', receipt: 'RCP-111', date: '2025-01-25' },
                { sr: 12, memoNo: 'CM-012', amount: '₹2,950', receipt: 'RCP-112', date: '2025-01-26' }
            ];

            const rowsPerPage = 5;
            let currentPage = 1;
            let filteredData = [...memoData];
            let totalPages = Math.ceil(filteredData.length / rowsPerPage);

            const tbody = document.getElementById('memoTableBody');
            const fromDate = document.getElementById('fromDate');
            const toDate = document.getElementById('toDate');

            function renderTable(page) {
                const start = (page - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, filteredData.length);
                const pageItems = filteredData.slice(start, end);

                if (pageItems.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="5" class="text-center py-8 text-gray-400">No records found</td></tr>`;
                } else {
                    let html = '';
                    pageItems.forEach((item) => {
                        html += `
                            <tr class="table-row-hover transition">
                                <td class="px-3 py-3 whitespace-nowrap">${item.sr}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-medium text-gray-900">${item.memoNo}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-semibold text-teal-700">${item.amount}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.receipt}</td>
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

            // ----- FILTER FUNCTION -----
            window.filterByDate = function() {
                const from = fromDate.value;
                const to = toDate.value;

                filteredData = memoData.filter(item => {
                    let match = true;
                    if (from && item.date < from) match = false;
                    if (to && item.date > to) match = false;
                    return match;
                });

                currentPage = 1;
                updatePagination();
            };

            // ----- RESET FUNCTION -----
            window.resetFilter = function() {
                fromDate.value = '';
                toDate.value = '';
                filteredData = [...memoData];
                currentPage = 1;
                updatePagination();
            };

            // Initial render
            updatePagination();

            // Optional: auto-filter on date change? We'll keep manual.
        });
    </script>


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

            // } catch (error) {

            //     console.log(error);

            //     alert("Failed To Fetch Data");

            // }

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