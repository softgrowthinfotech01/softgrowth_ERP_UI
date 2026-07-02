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
        /* Print styles */
        @media print {
            body * {
                visibility: hidden;
            }
            #printArea, #printArea * {
                visibility: visible;
            }
            #printArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
            }
            .no-print {
                display: none !important;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table th, table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            table th {
                background: #0f766e !important;
                color: white !important;
            }
        }
    </style>
</head>
<body class="bg-gray-300 text-gray-800 antialiased">

    <!-- PHP includes (header + sidebar) – keep your existing structure -->
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== PAYMENT RECORDS CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" id="printArea">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100 no-print">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-gray-900">Payment Records</h2>
                    <p class="text-sm text-gray-500">Manage and track all student payment transactions</p>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-b border-gray-100 no-print">
                <div class="flex flex-wrap items-center gap-2">
                    <button onclick="exportCopy()" class="toolbar-btn px-4 py-2 bg-gray-600 text-white text-sm font-bold rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-gray-300">
                        <i class="fas fa-copy mr-1"></i> Copy
                    </button>
                    <button onclick="exportCSV()" class="toolbar-btn px-4 py-2 bg-sky-500 text-white text-sm font-bold rounded-xl hover:bg-sky-600 focus:ring-2 focus:ring-sky-300">
                        <i class="fas fa-file-csv mr-1"></i> CSV
                    </button>
                    <button onclick="exportExcel()" class="toolbar-btn px-4 py-2 bg-emerald-500 text-white text-sm font-bold rounded-xl hover:bg-emerald-600 focus:ring-2 focus:ring-emerald-300">
                        <i class="fas fa-file-excel mr-1"></i> Excel
                    </button>
                    <button onclick="exportPDF()" class="toolbar-btn px-4 py-2 bg-red-500 text-white text-sm font-bold rounded-xl hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                        <i class="fas fa-file-pdf mr-1"></i> PDF
                    </button>
                    <button onclick="exportPrint()" class="toolbar-btn px-4 py-2 bg-purple-500 text-white text-sm font-bold rounded-xl hover:bg-purple-600 focus:ring-2 focus:ring-purple-300">
                        <i class="fas fa-print mr-1"></i> Print
                    </button>
                </div>
                <div class="w-full sm:w-64">
                    <input id="searchInput" type="text" placeholder="Search payment records..." 
                           class="w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4 text-sm" />
                </div>
            </div>

            <!-- Table -->
            <div class="table-wrap p-4 sm:p-6">
                <table class="w-full text-sm text-left" id="paymentTable">
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
                            <th class="px-3 py-3 whitespace-nowrap text-center no-print">Action</th>
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
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-100 no-print">
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
    JAVASCRIPT – data, pagination, search, and exports
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ----- SAMPLE DATA -----
            const allPayments = [
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

            let filteredData = [...allPayments];
            const rowsPerPage = 5;
            let currentPage = 1;
            const tbody = document.getElementById('paymentTableBody');

            function renderTable(page) {
                const start = (page - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, filteredData.length);
                const pageItems = filteredData.slice(start, end);

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
                                <td class="px-3 py-3 whitespace-nowrap text-center no-print">
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
                const total = filteredData.length;
                document.getElementById('startEntry').textContent = total ? start + 1 : 0;
                document.getElementById('endEntry').textContent = end;
                document.getElementById('totalEntries').textContent = total;

                // Update pagination buttons
                const totalPages = Math.ceil(total / rowsPerPage) || 1;
                document.getElementById('prevPage').disabled = (page === 1);
                document.getElementById('nextPage').disabled = (page === totalPages || total === 0);
            }

            function updatePagination() {
                const totalPages = Math.ceil(filteredData.length / rowsPerPage) || 1;
                if (currentPage > totalPages) currentPage = totalPages;
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
                const totalPages = Math.ceil(filteredData.length / rowsPerPage) || 1;
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTable(currentPage);
                }
            });

            // ----- SEARCH FUNCTIONALITY -----
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                if (query === '') {
                    filteredData = [...allPayments];
                } else {
                    filteredData = allPayments.filter(p => 
                        p.studentName.toLowerCase().includes(query) ||
                        p.studentId.toLowerCase().includes(query) ||
                        p.feesPaid.toLowerCase().includes(query) ||
                        p.receipt.toLowerCase().includes(query) ||
                        p.mode.toLowerCase().includes(query)
                    );
                }
                currentPage = 1;
                updatePagination();
            });

            // Initial render
            updatePagination();

            // ============================================================
            // EXPORT FUNCTIONS
            // ============================================================

            // Helper: Get current data (filtered + paginated if needed)
            function getCurrentData() {
                return filteredData;
            }

            // Helper: Get table headers
            function getHeaders() {
                return ['#', 'Student Name', 'Student ID', 'Fees Paid', 'Amount', 'Receipt No', 'Payment Mode', 'Payment Date'];
            }

            // 1. COPY to clipboard
            window.exportCopy = function() {
                const data = getCurrentData();
                if (data.length === 0) {
                    alert('No data to copy.');
                    return;
                }

                let text = getHeaders().join('\t') + '\n';
                data.forEach((p, i) => {
                    text += `${i + 1}\t${p.studentName}\t${p.studentId}\t${p.feesPaid}\t${p.amount}\t${p.receipt}\t${p.mode}\t${p.date}\n`;
                });

                navigator.clipboard.writeText(text).then(() => {
                    showToast('✅ Copied to clipboard!');
                }).catch(() => {
                    // Fallback
                    const textarea = document.createElement('textarea');
                    textarea.value = text;
                    document.body.appendChild(textarea);
                    textarea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textarea);
                    showToast('✅ Copied to clipboard!');
                });
            };

            // 2. CSV export
            window.exportCSV = function() {
                const data = getCurrentData();
                if (data.length === 0) {
                    alert('No data to export.');
                    return;
                }

                let csv = getHeaders().join(',') + '\n';
                data.forEach((p, i) => {
                    const row = [
                        i + 1,
                        `"${p.studentName}"`,
                        `"${p.studentId}"`,
                        `"${p.feesPaid}"`,
                        `"${p.amount}"`,
                        `"${p.receipt}"`,
                        `"${p.mode}"`,
                        `"${p.date}"`
                    ];
                    csv += row.join(',') + '\n';
                });

                downloadFile(csv, 'payment_records.csv', 'text/csv');
                showToast('✅ CSV downloaded!');
            };

            // 3. Excel export (HTML table as .xls)
            window.exportExcel = function() {
                const data = getCurrentData();
                if (data.length === 0) {
                    alert('No data to export.');
                    return;
                }

                let html = `
                    <html xmlns:o="urn:schemas-microsoft-com:office:office" 
                          xmlns:x="urn:schemas-microsoft-com:office:excel" 
                          xmlns="http://www.w3.org/TR/REC-html40">
                    <head><meta charset="UTF-8">
                    <!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>
                    <x:Name>Payment Records</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions>
                    </x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->
                    <style>th{background:#0f766e;color:white;font-weight:bold;}td,th{border:1px solid #ddd;padding:8px;}</style>
                    </head><body>
                    <h2>Payment Records</h2>
                    <table>
                        <thead><tr>${getHeaders().map(h => `<th>${h}</th>`).join('')}</tr></thead>
                        <tbody>
                `;

                data.forEach((p, i) => {
                    html += `<tr>
                        <td>${i + 1}</td>
                        <td>${p.studentName}</td>
                        <td>${p.studentId}</td>
                        <td>${p.feesPaid}</td>
                        <td>${p.amount}</td>
                        <td>${p.receipt}</td>
                        <td>${p.mode}</td>
                        <td>${p.date}</td>
                    </tr>`;
                });

                html += `</tbody></table></body></html>`;

                downloadFile(html, 'payment_records.xls', 'application/vnd.ms-excel');
                showToast('✅ Excel downloaded!');
            };

            // 4. PDF export (using print with PDF printer)
            window.exportPDF = function() {
                // Show print dialog with PDF option
                showToast('🖨️ Select "Save as PDF" in the print dialog.');
                setTimeout(() => {
                    window.print();
                }, 500);
            };

            // 5. Print
            window.exportPrint = function() {
                window.print();
            };

            // Helper: Download file
            function downloadFile(content, filename, mimeType) {
                const blob = new Blob([content], { type: mimeType + ';charset=utf-8;' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(link.href);
            }

            // Helper: Toast notification
            function showToast(message) {
                const existing = document.querySelector('.export-toast');
                if (existing) existing.remove();

                const toast = document.createElement('div');
                toast.className = 'export-toast fixed top-20 left-1/2 -translate-x-1/2 bg-teal-600 text-white px-6 py-3 rounded-xl shadow-lg z-50 transition-all duration-300';
                toast.style.animation = 'fadeIn 0.3s ease';
                toast.textContent = message;
                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 300);
                }, 2500);
            }

            // Add toast animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeIn {
                    from { opacity: 0; transform: translate(-50%, -20px); }
                    to { opacity: 1; transform: translate(-50%, 0); }
                }
            `;
            document.head.appendChild(style);

        });
    </script>

</body>
</html>