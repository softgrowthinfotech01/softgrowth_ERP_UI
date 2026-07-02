<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Records - ERP</title>
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
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- PHP includes (header + sidebar) – keep your existing structure -->
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 transition-all duration-200">

        <!-- ===== PAYMENT RECORDS CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-gray-900">Payment Records</h2>
                    <p class="text-sm text-gray-500">Manage and track all student payment transactions</p>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-b border-gray-100">
                <div class="flex flex-wrap items-center gap-2">
                    <button class="toolbar-btn px-4 py-2 bg-gray-600 text-white text-sm font-bold rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-gray-300">
                        <i class="fas fa-copy mr-1"></i> Copy
                    </button>
                    <button class="toolbar-btn px-4 py-2 bg-sky-500 text-white text-sm font-bold rounded-xl hover:bg-sky-600 focus:ring-2 focus:ring-sky-300">
                        <i class="fas fa-file-csv mr-1"></i> CSV
                    </button>
                    <button class="toolbar-btn px-4 py-2 bg-emerald-500 text-white text-sm font-bold rounded-xl hover:bg-emerald-600 focus:ring-2 focus:ring-emerald-300">
                        <i class="fas fa-file-excel mr-1"></i> Excel
                    </button>
                    <button class="toolbar-btn px-4 py-2 bg-red-500 text-white text-sm font-bold rounded-xl hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                        <i class="fas fa-file-pdf mr-1"></i> PDF
                    </button>
                    <button class="toolbar-btn px-4 py-2 bg-purple-500 text-white text-sm font-bold rounded-xl hover:bg-purple-600 focus:ring-2 focus:ring-purple-300">
                        <i class="fas fa-print mr-1"></i> Print
                    </button>
                </div>
                <div class="w-full sm:w-64">
                    <input type="text" placeholder="Search payment records..." 
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
                            <th class="px-3 py-3 whitespace-nowrap">Student ID</th>
                            <th class="px-3 py-3 whitespace-nowrap">Fees Paid</th>
                            <th class="px-3 py-3 whitespace-nowrap">Amount</th>
                            <th class="px-3 py-3 whitespace-nowrap">Receipt No</th>
                            <th class="px-3 py-3 whitespace-nowrap">Payment Mode</th>
                            <th class="px-3 py-3 whitespace-nowrap">Payment Date</th>
                            <th class="px-3 py-3 whitespace-nowrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="paymentTableBody" class="divide-y divide-gray-100">
                        <!-- rows injected by JS -->
                        <tr>
                            <td colspan="9" class="text-center py-8 text-gray-400">Loading...</td>
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

    <!-- PHP footer include -->
    <?php include 'footer.php'; ?>

    <!-- ============================================================
    JAVASCRIPT – simulate data and pagination
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ----- SAMPLE DATA -----
            const payments = [
                { id: 1, studentName: 'Rahul Sharma', studentId: 'S101', feesPaid: 'Admission Fee', amount: '₹15,000', receipt: 'RCP-001', mode: 'Cash', date: '2025-01-15' },
                { id: 2, studentName: 'Priya Patel', studentId: 'S102', feesPaid: 'Tuition Fee', amount: '₹25,000', receipt: 'RCP-002', mode: 'Online', date: '2025-01-16' },
                { id: 3, studentName: 'Amit Singh', studentId: 'S103', feesPaid: 'Exam Fee', amount: '₹5,000', receipt: 'RCP-003', mode: 'Bank Transfer', date: '2025-01-17' },
                { id: 4, studentName: 'Sneha Reddy', studentId: 'S104', feesPaid: 'Library Fee', amount: '₹2,000', receipt: 'RCP-004', mode: 'Cash', date: '2025-01-18' },
                { id: 5, studentName: 'Vikram Kumar', studentId: 'S105', feesPaid: 'Lab Fee', amount: '₹3,500', receipt: 'RCP-005', mode: 'Online', date: '2025-01-19' },
                { id: 6, studentName: 'Neha Jain', studentId: 'S106', feesPaid: 'Admission Fee', amount: '₹15,000', receipt: 'RCP-006', mode: 'Cash', date: '2025-01-20' },
                { id: 7, studentName: 'Ravi Desai', studentId: 'S107', feesPaid: 'Tuition Fee', amount: '₹25,000', receipt: 'RCP-007', mode: 'Bank Transfer', date: '2025-01-21' },
                { id: 8, studentName: 'Meera Iyer', studentId: 'S108', feesPaid: 'Exam Fee', amount: '₹5,000', receipt: 'RCP-008', mode: 'Online', date: '2025-01-22' },
                { id: 9, studentName: 'Arjun Nair', studentId: 'S109', feesPaid: 'Library Fee', amount: '₹2,000', receipt: 'RCP-009', mode: 'Cash', date: '2025-01-23' },
                { id: 10, studentName: 'Kavya Menon', studentId: 'S110', feesPaid: 'Lab Fee', amount: '₹3,500', receipt: 'RCP-010', mode: 'Bank Transfer', date: '2025-01-24' },
                { id: 11, studentName: 'Deepak Gupta', studentId: 'S111', feesPaid: 'Admission Fee', amount: '₹15,000', receipt: 'RCP-011', mode: 'Online', date: '2025-01-25' },
                { id: 12, studentName: 'Pooja Reddy', studentId: 'S112', feesPaid: 'Tuition Fee', amount: '₹25,000', receipt: 'RCP-012', mode: 'Cash', date: '2025-01-26' }
            ];

            const rowsPerPage = 5;
            let currentPage = 1;
            const totalPages = Math.ceil(payments.length / rowsPerPage);
            const tbody = document.getElementById('paymentTableBody');

            function renderTable(page) {
                const start = (page - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, payments.length);
                const pageItems = payments.slice(start, end);

                if (pageItems.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="9" class="text-center py-8 text-gray-400">No records found</td></tr>`;
                } else {
                    let html = '';
                    pageItems.forEach((p, index) => {
                        const rowNum = start + index + 1;
                        html += `
                            <tr class="table-row-hover transition">
                                <td class="px-3 py-3 whitespace-nowrap">${rowNum}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-medium text-gray-900">${p.studentName}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${p.studentId}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${p.feesPaid}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-semibold text-teal-700">${p.amount}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${p.receipt}</td>
                                <td class="px-3 py-3 whitespace-nowrap">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                        ${p.mode === 'Cash' ? 'bg-gray-100 text-gray-700' : 
                                          p.mode === 'Online' ? 'bg-blue-50 text-blue-700' : 
                                          'bg-purple-50 text-purple-700'}">
                                        ${p.mode}
                                    </span>
                                </td>
                                <td class="px-3 py-3 whitespace-nowrap">${p.date}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-center">
                                    <button class="text-teal-600 hover:text-teal-800 transition" title="View Payment">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    tbody.innerHTML = html;
                }

                // Update footer info
                document.getElementById('startEntry').textContent = payments.length ? start + 1 : 0;
                document.getElementById('endEntry').textContent = end;
                document.getElementById('totalEntries').textContent = payments.length;

                // Update pagination buttons
                document.getElementById('prevPage').disabled = (page === 1);
                document.getElementById('nextPage').disabled = (page === totalPages);
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

            // Initial render
            renderTable(currentPage);

            // (Optional) Toolbar buttons – just alerts for demo
            document.querySelectorAll('.toolbar-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    alert(`${this.textContent.trim()} clicked (demo)`);
                });
            });

            // Search functionality (basic filter)
            const searchInput = document.querySelector('.search-input');
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                if (query === '') {
                    // Reset to full list
                    renderTable(1);
                    return;
                }
                const filtered = payments.filter(p => 
                    p.studentName.toLowerCase().includes(query) ||
                    p.studentId.toLowerCase().includes(query) ||
                    p.feesPaid.toLowerCase().includes(query) ||
                    p.receipt.toLowerCase().includes(query) ||
                    p.mode.toLowerCase().includes(query)
                );
                // Re-render with filtered data (we need to adjust pagination)
                // For simplicity, we just show all filtered results without pagination
                if (filtered.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="9" class="text-center py-8 text-gray-400">No matching records</td></tr>`;
                    document.getElementById('startEntry').textContent = 0;
                    document.getElementById('endEntry').textContent = 0;
                    document.getElementById('totalEntries').textContent = 0;
                    document.getElementById('prevPage').disabled = true;
                    document.getElementById('nextPage').disabled = true;
                } else {
                    // Show filtered results without pagination
                    let html = '';
                    filtered.forEach((p, index) => {
                        html += `
                            <tr class="table-row-hover transition">
                                <td class="px-3 py-3 whitespace-nowrap">${index + 1}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-medium text-gray-900">${p.studentName}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${p.studentId}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${p.feesPaid}</td>
                                <td class="px-3 py-3 whitespace-nowrap font-semibold text-teal-700">${p.amount}</td>
                                <td class="px-3 py-3 whitespace-nowrap">${p.receipt}</td>
                                <td class="px-3 py-3 whitespace-nowrap">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                        ${p.mode === 'Cash' ? 'bg-gray-100 text-gray-700' : 
                                          p.mode === 'Online' ? 'bg-blue-50 text-blue-700' : 
                                          'bg-purple-50 text-purple-700'}">
                                        ${p.mode}
                                    </span>
                                </td>
                                <td class="px-3 py-3 whitespace-nowrap">${p.date}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-center">
                                    <button class="text-teal-600 hover:text-teal-800 transition" title="View Payment">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    tbody.innerHTML = html;
                    document.getElementById('startEntry').textContent = 1;
                    document.getElementById('endEntry').textContent = filtered.length;
                    document.getElementById('totalEntries').textContent = filtered.length;
                    document.getElementById('prevPage').disabled = true;
                    document.getElementById('nextPage').disabled = true;
                }
            });

        });
    </script>

</body>
</html>