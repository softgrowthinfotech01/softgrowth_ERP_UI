<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Balance Details - ERP</title>
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
    </style>

</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

   <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== BALANCE DETAILS CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-gray-900">Student Balance Details</h2>
                    <p class="text-sm text-gray-500">Track pending balance and payment details</p>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-b border-gray-100">
                <div class="flex flex-wrap items-center gap-2">
                    <button onclick="exportData('copy')" class="toolbar-btn px-4 py-2 bg-gray-600 text-white text-sm font-bold rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-gray-300">
                        <i class="fas fa-copy mr-1"></i> Copy
                    </button>
                    <button onclick="exportData('csv')" class="toolbar-btn px-4 py-2 bg-sky-500 text-white text-sm font-bold rounded-xl hover:bg-sky-600 focus:ring-2 focus:ring-sky-300">
                        <i class="fas fa-file-csv mr-1"></i> CSV
                    </button>
                    <button onclick="exportData('excel')" class="toolbar-btn px-4 py-2 bg-emerald-500 text-white text-sm font-bold rounded-xl hover:bg-emerald-600 focus:ring-2 focus:ring-emerald-300">
                        <i class="fas fa-file-excel mr-1"></i> Excel
                    </button>
                    <button onclick="exportData('pdf')" class="toolbar-btn px-4 py-2 bg-red-500 text-white text-sm font-bold rounded-xl hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                        <i class="fas fa-file-pdf mr-1"></i> PDF
                    </button>
                    <button onclick="exportData('print')" class="toolbar-btn px-4 py-2 bg-purple-500 text-white text-sm font-bold rounded-xl hover:bg-purple-600 focus:ring-2 focus:ring-purple-300">
                        <i class="fas fa-print mr-1"></i> Print
                    </button>
                </div>
                <div class="w-full sm:w-64">
                    <input id="searchInput" type="text" placeholder="Search balance records..." 
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4 text-sm" />
                </div>
            </div>

            <!-- Table -->
            <div class="table-wrap p-4 sm:p-6">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="bg-teal-600 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-3 py-3 whitespace-nowrap">#</th>
                            <th class="px-3 py-3 whitespace-nowrap">Student Name</th>
                            <th class="px-3 py-3 whitespace-nowrap">Branch</th>
                            <th class="px-3 py-3 whitespace-nowrap">Batch</th>
                            <th class="px-3 py-3 whitespace-nowrap">Balance Amount</th>
                            <th class="px-3 py-3 whitespace-nowrap">Payment Date</th>
                            <th class="px-3 py-3 whitespace-nowrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="balanceTableBody" class="divide-y divide-gray-100">
                        <!-- rows injected by JS -->
                        <tr>
                            <td colspan="7" class="text-center py-8 text-gray-400">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-100">
                <div class="text-sm text-gray-500 font-semibold">
                    Showing <span id="startEntry">0</span> to <span id="endEntry">0</span> of <span id="totalEntries">0</span> entries
                </div>
                <div class="flex gap-2">
                    <button id="prevPage" class="page-btn px-5 py-2 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-700 focus:ring-2 focus:ring-teal-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </button>
                    <button id="nextPage" class="page-btn px-5 py-2 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-700 focus:ring-2 focus:ring-teal-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
            </div>

        </div>

    </main>

    <?php include 'footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
    <script src="url.js"></script>






    <!-- ============================================================
    JAVASCRIPT – data, pagination, search, export
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ----- SAMPLE DATA -----
            const balances = [
                { id: 1, name: 'Rahul Sharma', branch: 'BCA', batch: '2024-25', balance: '₹8,500', date: '2025-01-15' },
                { id: 2, name: 'Priya Patel', branch: 'BBA', batch: '2025-26', balance: '₹12,000', date: '2025-01-16' },
                { id: 3, name: 'Amit Singh', branch: 'BCA', batch: '2024-25', balance: '₹3,200', date: '2025-01-17' },
                { id: 4, name: 'Sneha Reddy', branch: 'B.Com', batch: '2023-24', balance: '₹15,500', date: '2025-01-18' },
                { id: 5, name: 'Vikram Kumar', branch: 'BBA', batch: '2025-26', balance: '₹6,750', date: '2025-01-19' },
                { id: 6, name: 'Neha Jain', branch: 'BCA', batch: '2024-25', balance: '₹9,300', date: '2025-01-20' },
                { id: 7, name: 'Ravi Desai', branch: 'B.Com', batch: '2023-24', balance: '₹4,100', date: '2025-01-21' },
                { id: 8, name: 'Meera Iyer', branch: 'BBA', batch: '2025-26', balance: '₹11,200', date: '2025-01-22' },
                { id: 9, name: 'Arjun Nair', branch: 'BCA', batch: '2024-25', balance: '₹7,800', date: '2025-01-23' },
                { id: 10, name: 'Kavya Menon', branch: 'B.Com', batch: '2023-24', balance: '₹5,400', date: '2025-01-24' },
                { id: 11, name: 'Deepak Gupta', branch: 'BCA', batch: '2024-25', balance: '₹10,000', date: '2025-01-25' },
                { id: 12, name: 'Pooja Reddy', branch: 'BBA', batch: '2025-26', balance: '₹14,600', date: '2025-01-26' }
            ];

            const rowsPerPage = 5;
            let currentPage = 1;
            let filteredData = [...balances]; // for search
            let totalPages = Math.ceil(filteredData.length / rowsPerPage);

            const tbody = document.getElementById('balanceTableBody');
            const searchInput = document.getElementById('searchInput');

            function renderTable(page) {
                const start = (page - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, filteredData.length);
                const pageItems = filteredData.slice(start, end);

                if (pageItems.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="7" class="text-center py-8 text-gray-400">No records found</td></tr>`;
                } else {
                    let html = '';
                    pageItems.forEach((item, index) => {
                        const rowNum = start + index + 1;
                        html += `
                            <tr class="table-row-hover transition">
                                <td class="px-3 py-3 whitespace-nowrap">${rowNum}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-medium text-gray-900">${item.name}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.branch}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.batch}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-semibold text-red-600">${item.balance}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${item.date}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-center">
                                    <button class="text-teal-600 hover:text-teal-800 transition" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    tbody.innerHTML = html;
                }

                // Update footer info
                document.getElementById('startEntry').textContent = filteredData.length ? start + 1 : 0;
                document.getElementById('endEntry').textContent = end;
                document.getElementById('totalEntries').textContent = filteredData.length;

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

            // Search functionality
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                if (query === '') {
                    filteredData = [...balances];
                } else {
                    filteredData = balances.filter(item =>
                        item.name.toLowerCase().includes(query) ||
                        item.branch.toLowerCase().includes(query) ||
                        item.batch.toLowerCase().includes(query) ||
                        item.balance.toLowerCase().includes(query) ||
                        item.date.includes(query)
                    );
                }
                currentPage = 1;
                updatePagination();
            });

            // Initial render
            updatePagination();

            // ----- EXPORT FUNCTIONS (demo) -----
            window.exportData = function(type) {
                alert(`Export ${type.toUpperCase()} clicked (demo)`);
                // In a real app, you'd implement the actual export logic here.
            };

        });
    </script>


    
    <script>



        let allBalanceRecords = [];
        window.onload = function() {

            loadStudents();

        }

        //============================

        async function loadStudents(page = 1) {

            try {

                const search =
                    document.getElementById("search").value;

                const response = await fetch(

                    url +
                    "student-balance-records?page=" +
                    page +
                    "&search=" +
                    encodeURIComponent(search),

                    {

                        headers: {

                            Authorization: "Bearer " +
                                localStorage.getItem("token"),

                            Accept: "application/json"

                        }

                    }

                );

                const result =
                    await response.json();

                console.log(result);

                fillTable(result.data);

            } catch (error) {

                console.log(error);

                alert("Unable to fetch records.");

            }

        }

        //============================

        function fillTable(data) {
            allBalanceRecords = data.data;
            const tbody =
                document.getElementById("balanceTableBody");

            tbody.innerHTML = "";

            if (data.data.length == 0) {

                tbody.innerHTML = `

        <tr>

        <td colspan="8"
        class="empty-row">

        No Records Found

        </td>

        </tr>

        `;

                return;

            }

            data.data.forEach((student, index) => {

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

                tbody.innerHTML += `

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

            document.getElementById("tableInfo").innerHTML =

                `Showing ${data.from} to ${data.to} of ${data.total} Entries`;

            pagination(data);

        }

        //============================

        function pagination(data) {

            const div =

                document.getElementById("pagination");

            div.innerHTML = "";

            for (let i = 1; i <= data.last_page; i++) {

                div.innerHTML += `

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

                function() {

                    loadStudents();

                }

            );


        // export
        function exportData(type) {

            let rows = [];

            rows.push([
                "Student Name",
                "Batch",
                "Total Fees",
                "Paid Fees",
                "Balance Fees",
                "Status"
            ]);

            allBalanceRecords.forEach(student => {

                rows.push([

                    student.student_name,

                    student.student_batch,

                    student.total_fees,

                    student.paid_fees,

                    student.balance_amount,

                    student.balance_amount == 0 ?
                    "Paid" :
                    "Pending"

                ]);

            });

            //====================

            if (type == "copy") {

                let text = rows.map(r => r.join("\t")).join("\n");

                navigator.clipboard.writeText(text);

                alert("Copied Successfully");

            }

            //====================
            else if (type == "csv") {

                let csv = rows.map(r => r.join(",")).join("\n");

                let blob = new Blob([csv], {
                    type: "text/csv"
                });

                let a = document.createElement("a");

                a.href = URL.createObjectURL(blob);

                a.download = "Balance_Payment.csv";

                a.click();

            }

            //====================
            else if (type == "excel") {

                let ws = XLSX.utils.aoa_to_sheet(rows);

                let wb = XLSX.utils.book_new();

                XLSX.utils.book_append_sheet(wb, ws, "Balance");

                XLSX.writeFile(wb, "Balance_Payment.xlsx");

            }

            //====================
            else if (type == "pdf") {

                const {
                    jsPDF
                } = window.jspdf;

                let pdf = new jsPDF();

                pdf.autoTable({

                    head: [rows[0]],

                    body: rows.slice(1)

                });

                pdf.save("Balance_Payment.pdf");

            }

            //====================
            else if (type == "print") {

                let html = `
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

                let win = window.open();

                win.document.write(html);

                win.print();

            }

        }
    </script>
</body>

</html>