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
        /* Toast notification */
        .export-toast {
            animation: slideDown 0.4s ease;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translate(-50%, -20px) scale(0.95); }
            to { opacity: 1; transform: translate(-50%, 0) scale(1); }
        }
        /* Print styles */
        @media print {
            body * { visibility: hidden; }
            #printArea, #printArea * { visibility: visible; }
            #printArea { position: absolute; left: 0; top: 0; width: 100%; padding: 20px; }
            .no-print { display: none !important; }
        }
    </style>

</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== BALANCE DETAILS CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" id="printArea">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100 no-print">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-gray-900">Student Balance Details</h2>
                    <p class="text-sm text-gray-500">Track pending balance and payment details</p>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-b border-gray-100 no-print">
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
                           class="w-full rounded-xl  border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4 text-sm" />
                </div>
            </div>

            <!-- Table -->
            <div class="table-wrap p-4 sm:p-6">
                <table class="w-full text-sm text-left" id="balanceTable">
                    <thead>
                        <tr class="bg-teal-600 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-3 py-3 whitespace-nowrap">#</th>
                            <th class="px-3 py-3 whitespace-nowrap">Student Name</th>
                            <th class="px-3 py-3 whitespace-nowrap">Batch</th>
                            <th class="px-3 py-3 whitespace-nowrap">Total Fees</th>
                            <th class="px-3 py-3 whitespace-nowrap">Paid Fees</th>
                            <th class="px-3 py-3 whitespace-nowrap">Balance Amount</th>
                            <th class="px-3 py-3 whitespace-nowrap">Status</th>
                            <th class="px-3 py-3 whitespace-nowrap text-center no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody id="balanceTableBody" class="divide-y divide-gray-100">
                        <tr>
                            <td colspan="8" class="text-center py-8 text-gray-400">Loading...</td>
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

    <?php include 'footer.php'; ?>

    <!-- Libraries for export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>

    <script>
        // ============================================================
        // API URL (adjust as needed)
        // ============================================================
        const API_URL = 'your-api-url-here'; // replace with actual URL

        // ============================================================
        // DATA & STATE
        // ============================================================
        let allBalanceRecords = [];
        let currentPage = 1;
        const rowsPerPage = 5;
        let filteredData = [];

        // DOM refs
        const tbody = document.getElementById('balanceTableBody');
        const searchInput = document.getElementById('searchInput');

        // ============================================================
        // LOAD STUDENTS FROM API
        // ============================================================
        async function loadStudents(page = 1) {
            try {
                const search = document.getElementById('searchInput')?.value || '';
                const response = await fetch(
                    `${API_URL}?page=${page}&search=${encodeURIComponent(search)}`,
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                            'Accept': 'application/json'
                        }
                    }
                );

                if (!response.ok) throw new Error('Network response was not ok');
                const result = await response.json();
                console.log('API Response:', result);

                // Handle different response structures
                const data = result.data || result;
                allBalanceRecords = data.data || data || [];
                renderTable(allBalanceRecords);
                updatePaginationInfo(allBalanceRecords.length, page);

            } catch (error) {
                console.error('Error loading students:', error);
                tbody.innerHTML = `
                    <tr>
                        <td colspan="8" class="text-center py-8 text-red-500">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            Failed to load records. Please try again.
                        </td>
                    </tr>
                `;
                // Fallback to sample data if API fails
                loadSampleData();
            }
        }

        // ============================================================
        // SAMPLE DATA (fallback)
        // ============================================================
        function loadSampleData() {
            allBalanceRecords = [
                { student_name: 'Rahul Sharma', student_batch: '2024-25', total_fees: 85000, paid_fees: 70000, balance_amount: 15000 },
                { student_name: 'Priya Patel', student_batch: '2025-26', total_fees: 90000, paid_fees: 90000, balance_amount: 0 },
                { student_name: 'Amit Singh', student_batch: '2024-25', total_fees: 82000, paid_fees: 50000, balance_amount: 32000 },
                { student_name: 'Sneha Reddy', student_batch: '2023-24', total_fees: 78000, paid_fees: 60000, balance_amount: 18000 },
                { student_name: 'Vikram Kumar', student_batch: '2025-26', total_fees: 88000, paid_fees: 88000, balance_amount: 0 },
            ];
            renderTable(allBalanceRecords);
            updatePaginationInfo(allBalanceRecords.length, 1);
        }

        // ============================================================
        // RENDER TABLE
        // ============================================================
        function renderTable(data, page = 1) {
            const start = (page - 1) * rowsPerPage;
            const end = Math.min(start + rowsPerPage, data.length);
            const pageItems = data.slice(start, end);

            if (pageItems.length === 0) {
                tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-gray-400">No records found</td></tr>`;
                return;
            }

            let html = '';
            pageItems.forEach((student, index) => {
                const rowNum = start + index + 1;
                const balance = Number(student.balance_amount) || 0;
                const status = balance <= 0 ? 
                    '<span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">✓ Paid</span>' :
                    `<span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">● Pending (₹${balance.toLocaleString()})</span>`;

                html += `
                    <tr class="table-row-hover transition">
                        <td class="px-3 py-3 whitespace-nowrap">${rowNum}</td>
                        <td class="px-3 py-3 whitespace-nowrap font-medium text-gray-900">${student.student_name || 'N/A'}</td>
                        <td class="px-3 py-3 whitespace-nowrap">${student.student_batch || 'N/A'}</td>
                        <td class="px-3 py-3 whitespace-nowrap font-semibold">₹ ${Number(student.total_fees || 0).toLocaleString()}</td>
                        <td class="px-3 py-3 whitespace-nowrap font-semibold text-teal-600">₹ ${Number(student.paid_fees || 0).toLocaleString()}</td>
                        <td class="px-3 py-3 whitespace-nowrap font-semibold ${balance > 0 ? 'text-red-600' : 'text-green-600'}">
                            ₹ ${balance.toLocaleString()}
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">${status}</td>
                        <td class="px-3 py-3 whitespace-nowrap text-center no-print">
                            <button class="text-teal-600 hover:text-teal-800 transition" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        // ============================================================
        // UPDATE PAGINATION INFO
        // ============================================================
        function updatePaginationInfo(total, page) {
            const totalPages = Math.ceil(total / rowsPerPage) || 1;
            const start = (page - 1) * rowsPerPage + 1;
            const end = Math.min(page * rowsPerPage, total);

            document.getElementById('startEntry').textContent = total ? start : 0;
            document.getElementById('endEntry').textContent = end;
            document.getElementById('totalEntries').textContent = total;

            document.getElementById('prevPage').disabled = (page <= 1);
            document.getElementById('nextPage').disabled = (page >= totalPages);
        }

        // ============================================================
        // PAGINATION EVENTS
        // ============================================================
        document.getElementById('prevPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderTable(allBalanceRecords, currentPage);
                updatePaginationInfo(allBalanceRecords.length, currentPage);
            }
        });

        document.getElementById('nextPage').addEventListener('click', function() {
            const totalPages = Math.ceil(allBalanceRecords.length / rowsPerPage) || 1;
            if (currentPage < totalPages) {
                currentPage++;
                renderTable(allBalanceRecords, currentPage);
                updatePaginationInfo(allBalanceRecords.length, currentPage);
            }
        });

        // ============================================================
        // SEARCH
        // ============================================================
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            if (query === '') {
                loadStudents(1);
            } else {
                const filtered = allBalanceRecords.filter(item =>
                    (item.student_name || '').toLowerCase().includes(query) ||
                    (item.student_batch || '').toLowerCase().includes(query) ||
                    String(item.total_fees).includes(query)
                );
                filteredData = filtered;
                currentPage = 1;
                renderTable(filtered, 1);
                updatePaginationInfo(filtered.length, 1);
            }
        });

        // ============================================================
        // GET EXPORT DATA
        // ============================================================
        function getExportData() {
            // Use filtered data if search is active, otherwise use all
            const data = searchInput.value.trim() !== '' ? filteredData : allBalanceRecords;
            if (data.length === 0) {
                showToast('⚠️ No data to export');
                return null;
            }
            return data;
        }

        // ============================================================
        // TOAST NOTIFICATION
        // ============================================================
        function showToast(message, type = 'success') {
            const existing = document.querySelector('.export-toast');
            if (existing) existing.remove();

            const colors = {
                success: 'bg-teal-600',
                error: 'bg-red-600',
                warning: 'bg-amber-500',
                info: 'bg-blue-500'
            };

            const toast = document.createElement('div');
            toast.className = `export-toast fixed top-20 left-1/2 -translate-x-1/2 ${colors[type] || colors.success} text-white px-6 py-3 rounded-xl shadow-lg z-50`;
            toast.textContent = message;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.3s';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // ============================================================
        // EXPORT FUNCTIONS
        // ============================================================
        window.exportData = function(type) {
            const data = getExportData();
            if (!data) return;

            // Build rows: headers + data
            const headers = ['Student Name', 'Batch', 'Total Fees', 'Paid Fees', 'Balance Amount', 'Status'];
            const rows = [headers];

            data.forEach(student => {
                const balance = Number(student.balance_amount) || 0;
                rows.push([
                    student.student_name || 'N/A',
                    student.student_batch || 'N/A',
                    Number(student.total_fees || 0).toLocaleString(),
                    Number(student.paid_fees || 0).toLocaleString(),
                    balance.toLocaleString(),
                    balance <= 0 ? 'Paid' : 'Pending'
                ]);
            });

            switch (type) {
                case 'copy':
                    exportCopy(rows);
                    break;
                case 'csv':
                    exportCSV(rows);
                    break;
                case 'excel':
                    exportExcel(rows);
                    break;
                case 'pdf':
                    exportPDF(rows);
                    break;
                case 'print':
                    exportPrint(rows);
                    break;
                default:
                    showToast('Unknown export type', 'error');
            }
        };

        // ---------- COPY ----------
        function exportCopy(rows) {
            try {
                let text = rows.map(r => r.join('\t')).join('\n');
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(() => {
                        showToast('✅ Copied to clipboard!');
                    }).catch(() => {
                        fallbackCopy(text);
                    });
                } else {
                    fallbackCopy(text);
                }
            } catch (e) {
                showToast('❌ Copy failed: ' + e.message, 'error');
            }
        }

        function fallbackCopy(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            try {
                document.execCommand('copy');
                showToast('✅ Copied to clipboard!');
            } catch (e) {
                showToast('❌ Copy failed. Please select and copy manually.', 'error');
            }
            document.body.removeChild(textarea);
        }

        // ---------- CSV ----------
        function exportCSV(rows) {
            try {
                let csv = rows.map(row => 
                    row.map(cell => `"${String(cell).replace(/"/g, '""')}"`).join(',')
                ).join('\n');
                
                const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' }); // BOM for Excel
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = `Balance_Report_${new Date().toISOString().slice(0,10)}.csv`;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(link.href);
                showToast('✅ CSV downloaded!');
            } catch (e) {
                showToast('❌ CSV export failed: ' + e.message, 'error');
            }
        }

        // ---------- EXCEL ----------
        function exportExcel(rows) {
            try {
                if (typeof XLSX === 'undefined') {
                    showToast('❌ Excel library not loaded. Please refresh and try again.', 'error');
                    return;
                }
                const ws = XLSX.utils.aoa_to_sheet(rows);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, 'Balance Report');
                XLSX.writeFile(wb, `Balance_Report_${new Date().toISOString().slice(0,10)}.xlsx`);
                showToast('✅ Excel downloaded!');
            } catch (e) {
                showToast('❌ Excel export failed: ' + e.message, 'error');
            }
        }

        // ---------- PDF ----------
        function exportPDF(rows) {
            try {
                if (typeof window.jspdf === 'undefined' || typeof window.jspdfAutoTable === 'undefined') {
                    showToast('⚠️ PDF library loading... Please try again in a moment.', 'warning');
                    return;
                }

                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('landscape', 'mm', 'a4');
                
                // Title
                doc.setFontSize(16);
                doc.text('Student Balance Report', 14, 15);
                doc.setFontSize(10);
                doc.text(`Generated: ${new Date().toLocaleString()}`, 14, 22);
                
                // Table
                doc.autoTable({
                    head: [rows[0]],
                    body: rows.slice(1),
                    startY: 28,
                    theme: 'striped',
                    headStyles: { fillColor: [15, 118, 110], textColor: [255, 255, 255], fontSize: 9 },
                    bodyStyles: { fontSize: 8 },
                    columnStyles: {
                        0: { cellWidth: 30 },
                        1: { cellWidth: 25 },
                        2: { cellWidth: 25 },
                        3: { cellWidth: 25 },
                        4: { cellWidth: 30 },
                        5: { cellWidth: 25 }
                    },
                    didDrawPage: function(data) {
                        // Footer
                        doc.setFontSize(8);
                        doc.text(`Page ${data.pageNumber}`, 14, doc.internal.pageSize.height - 10);
                        doc.text(`Total Records: ${rows.length - 1}`, doc.internal.pageSize.width - 40, doc.internal.pageSize.height - 10);
                    }
                });

                doc.save(`Balance_Report_${new Date().toISOString().slice(0,10)}.pdf`);
                showToast('✅ PDF downloaded!');
            } catch (e) {
                console.error('PDF export error:', e);
                showToast('❌ PDF export failed: ' + e.message, 'error');
            }
        }

        // ---------- PRINT ----------
        function exportPrint(rows) {
            try {
                const printWindow = window.open('', '_blank', 'width=900,height=600');
                if (!printWindow) {
                    showToast('⚠️ Please allow pop-ups for this site.', 'warning');
                    return;
                }

                const tableHtml = rows.map(row => 
                    `<tr>${row.map(cell => `<td>${cell}</td>`).join('')}</tr>`
                ).join('');

                printWindow.document.write(`
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Balance Report</title>
                        <style>
                            body { font-family: Arial, sans-serif; padding: 30px; }
                            h2 { text-align: center; color: #0f766e; }
                            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                            th { background: #0f766e; color: white; padding: 10px; text-align: left; font-size: 12px; }
                            td { padding: 8px 10px; border: 1px solid #ddd; font-size: 12px; }
                            tr:nth-child(even) { background: #f8fafc; }
                            .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #666; }
                            .status-paid { color: #16a34a; font-weight: bold; }
                            .status-pending { color: #dc2626; font-weight: bold; }
                        </style>
                    </head>
                    <body>
                        <h2>📊 Student Balance Report</h2>
                        <p style="text-align:center;color:#666;font-size:14px;">
                            Generated: ${new Date().toLocaleString()} &nbsp;|&nbsp; Total Records: ${rows.length - 1}
                        </p>
                        <table>
                            <thead><tr>${rows[0].map(h => `<th>${h}</th>`).join('')}</tr></thead>
                            <tbody>${tableHtml.slice(tableHtml.indexOf('<tr>', 1))}</tbody>
                        </table>
                        <div class="footer">
                            This report is auto-generated from the ERP System.
                        </div>
                        <script>
                            window.onload = function() { window.print(); }
                        <\/script>
                    </body>
                    </html>
                `);
                printWindow.document.close();
                showToast('🖨️ Print dialog opened');
            } catch (e) {
                showToast('❌ Print failed: ' + e.message, 'error');
            }
        }

        // ============================================================
        // INIT
        // ============================================================
        document.addEventListener('DOMContentLoaded', function() {
            // Load data from API
            loadStudents(1);

            // Also try to load from PHP fallback if needed
            // You can comment out the API call above and use sample data
            // loadSampleData();
        });

        // ============================================================
        // KEYBOARD SHORTCUT: Cmd/Ctrl + K to focus search
        // ============================================================
        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                const input = document.getElementById('searchInput');
                if (input) {
                    input.focus();
                    input.select();
                }
            }
        });
    </script>

</body>
</html>