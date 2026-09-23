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
        /* Toast notification */
        .export-toast {
            animation: slideDown 0.4s ease;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: #0f766e;
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            z-index: 9999;
            font-weight: 600;
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

        <!-- ===== LEDGER CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" id="printArea">

            <!-- Header -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100 no-print">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900">Ledger Report</h2>
                    <p class="text-sm text-gray-500">Track debit, credit and transaction history</p>
                </div>
            </div>

            <!-- Filters -->
            <div class="p-4 sm:p-6 border-b border-gray-100 no-print">
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
            <div class="flex flex-wrap items-center gap-2 p-4 sm:p-6 border-b border-gray-100 no-print">
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
                <table class="w-full text-sm text-left" id="ledgerTable">
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
                        <tr>
                            <td colspan="9" class="text-center py-8 text-gray-400">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-100 no-print">
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
        let allLedger = [];
        let currentPage = 1;
        const rowsPerPage = 5;
        let filteredData = [];

        // DOM refs
        const tbody = document.getElementById('ledgerTableBody');
        const fromDate = document.getElementById('fromDate');
        const toDate = document.getElementById('toDate');
        const receiptSearch = document.getElementById('receiptSearch');

        // ============================================================
        // LOAD LEDGER FROM API
        // ============================================================
        async function loadLedger(page = 1) {
            try {
                const from = fromDate.value;
                const to = toDate.value;
                const receipt = receiptSearch.value.trim();

                const response = await fetch(
                    `${API_URL}?page=${page}&receipt_number=${encodeURIComponent(receipt)}&from_date=${from}&to_date=${to}`,
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

                const data = result.data || result;
                allLedger = data.data || data || [];
                renderTable(allLedger, page);
                updatePaginationInfo(allLedger.length, page);

            } catch (error) {
                console.error('Error loading ledger:', error);
                // Fallback to sample data
                loadSampleData();
            }
        }

        // ============================================================
        // SAMPLE DATA (fallback)
        // ============================================================
        function loadSampleData() {
            allLedger = [
                { receipt_number: 'RCP-001', memo_details: 'Admission Fee - Rahul Sharma', student_batch: '2024-25', branch: 'BCA', credit: 15000, debit: 0, running_balance: 15000, transaction_date: '2025-01-15 10:00:00' },
                { receipt_number: 'RCP-002', memo_details: 'Tuition Fee - Priya Patel', student_batch: '2025-26', branch: 'BBA', credit: 25000, debit: 0, running_balance: 40000, transaction_date: '2025-01-16 11:00:00' },
                { receipt_number: 'RCP-003', memo_details: 'Exam Fee - Amit Singh', student_batch: '2024-25', branch: 'BCA', credit: 0, debit: 5000, running_balance: 35000, transaction_date: '2025-01-17 09:00:00' },
                { receipt_number: 'RCP-004', memo_details: 'Library Fee - Sneha Reddy', student_batch: '2023-24', branch: 'B.Com', credit: 0, debit: 2000, running_balance: 33000, transaction_date: '2025-01-18 14:00:00' },
                { receipt_number: 'RCP-005', memo_details: 'Lab Fee - Vikram Kumar', student_batch: '2025-26', branch: 'BBA', credit: 0, debit: 3500, running_balance: 29500, transaction_date: '2025-01-19 16:00:00' },
            ];
            renderTable(allLedger, 1);
            updatePaginationInfo(allLedger.length, 1);
            
        }

        // ============================================================
        // RENDER TABLE
        // ============================================================
        function renderTable(data, page = 1) {
            const start = (page - 1) * rowsPerPage;
            const end = Math.min(start + rowsPerPage, data.length);
            const pageItems = data.slice(start, end);

            if (pageItems.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9" class="text-center py-8 text-gray-400">No records found</td></tr>`;
                return;
            }

            let html = '';
            pageItems.forEach((item, index) => {
                const rowNum = start + index + 1;
                const credit = Number(item.credit) || 0;
                const debit = Number(item.debit) || 0;
                const balance = Number(item.running_balance) || 0;

                html += `
                    <tr class="table-row-hover transition">
                        <td class="px-3 py-3 whitespace-nowrap">${rowNum}</td>
                        <td class="px-3 py-3 whitespace-nowrap font-medium text-gray-900">${item.receipt_number || 'N/A'}</td>
                        <td class="px-3 py-3 whitespace-nowrap">${item.memo_details || 'N/A'}</td>
                        <td class="px-3 py-3 whitespace-nowrap">${item.student_batch || '-'}</td>
                        <td class="px-3 py-3 whitespace-nowrap">${item.branch || '-'}</td>
                        <td class="px-3 py-3 whitespace-nowrap credit">${credit > 0 ? '₹ ' + credit.toLocaleString() : '-'}</td>
                        <td class="px-3 py-3 whitespace-nowrap debit">${debit > 0 ? '₹ ' + debit.toLocaleString() : '-'}</td>
                        <td class="px-3 py-3 whitespace-nowrap">₹ ${balance.toLocaleString()}</td>
                        <td class="px-3 py-3 whitespace-nowrap">${item.transaction_date ? item.transaction_date.split(' ')[0] : 'N/A'}</td>
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
            document.getElementById('currentPageDisplay').textContent = page;

            document.getElementById('prevPage').disabled = (page <= 1);
            document.getElementById('nextPage').disabled = (page >= totalPages);
        }

        // ============================================================
        // PAGINATION EVENTS
        // ============================================================
        document.getElementById('prevPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                loadLedger(currentPage);
            }
        });

        document.getElementById('nextPage').addEventListener('click', function() {
            const totalPages = Math.ceil(allLedger.length / rowsPerPage) || 1;
            if (currentPage < totalPages) {
                currentPage++;
                loadLedger(currentPage);
            }
        });

        // ============================================================
        // FILTER EVENTS (auto-load on change)
        // ============================================================
        fromDate.addEventListener('change', () => { currentPage = 1; loadLedger(1); });
        toDate.addEventListener('change', () => { currentPage = 1; loadLedger(1); });
        receiptSearch.addEventListener('keyup', () => { currentPage = 1; loadLedger(1); });

        // ============================================================
        // TOAST NOTIFICATION
        // ============================================================
        function showToast(message, type = 'success') {
            const existing = document.querySelector('.export-toast');
            if (existing) existing.remove();

            const colors = {
                success: '#0f766e',
                error: '#dc2626',
                warning: '#f59e0b',
                info: '#3b82f6'
            };

            const toast = document.createElement('div');
            toast.className = 'export-toast';
            toast.style.background = colors[type] || colors.success;
            toast.textContent = message;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.3s';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // ============================================================
        // GET EXPORT DATA
        // ============================================================
        function getExportData() {
            if (allLedger.length === 0) {
                showToast('⚠️ No data to export', 'warning');
                return null;
            }
            return allLedger;
        }

        // ============================================================
        // EXPORT FUNCTIONS
        // ============================================================
        window.exportLedger = function(type) {
            const data = getExportData();
            if (!data) return;

            // Build rows: headers + data
            const headers = ['Receipt Number', 'Memo Details', 'Student Batch', 'Branch', 'Credit', 'Debit', 'Running Balance', 'Date'];
            const rows = [headers];

            data.forEach(item => {
                const credit = Number(item.credit) || 0;
                const debit = Number(item.debit) || 0;
                const balance = Number(item.running_balance) || 0;
                rows.push([
                    item.receipt_number || 'N/A',
                    item.memo_details || 'N/A',
                    item.student_batch || '-',
                    item.branch || '-',
                    credit > 0 ? '₹ ' + credit.toLocaleString() : '-',
                    debit > 0 ? '₹ ' + debit.toLocaleString() : '-',
                    '₹ ' + balance.toLocaleString(),
                    item.transaction_date ? item.transaction_date.split(' ')[0] : 'N/A'
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
                
                const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = `Ledger_Report_${new Date().toISOString().slice(0,10)}.csv`;
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
                    showToast('❌ Excel library not loaded', 'error');
                    return;
                }
                const ws = XLSX.utils.aoa_to_sheet(rows);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, 'Ledger');
                XLSX.writeFile(wb, `Ledger_Report_${new Date().toISOString().slice(0,10)}.xlsx`);
                showToast('✅ Excel downloaded!');
            } catch (e) {
                showToast('❌ Excel export failed: ' + e.message, 'error');
            }
        }

        // ---------- PDF ----------
        function exportPDF(rows) {
            try {
                if (typeof window.jspdf === 'undefined' || typeof window.jspdfAutoTable === 'undefined') {
                    showToast('⚠️ PDF library loading... Please try again.', 'warning');
                    return;
                }

                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('landscape', 'mm', 'a4');
                
                doc.setFontSize(16);
                doc.text('Ledger Report', 14, 15);
                doc.setFontSize(10);
                doc.text(`Generated: ${new Date().toLocaleString()}`, 14, 22);
                
                doc.autoTable({
                    head: [rows[0]],
                    body: rows.slice(1),
                    startY: 28,
                    theme: 'striped',
                    headStyles: { fillColor: [15, 118, 110], textColor: [255, 255, 255], fontSize: 9 },
                    bodyStyles: { fontSize: 8 },
                    columnStyles: {
                        0: { cellWidth: 25 },
                        1: { cellWidth: 45 },
                        2: { cellWidth: 25 },
                        3: { cellWidth: 20 },
                        4: { cellWidth: 20 },
                        5: { cellWidth: 20 },
                        6: { cellWidth: 25 },
                        7: { cellWidth: 22 }
                    },
                    didDrawPage: function(data) {
                        doc.setFontSize(8);
                        doc.text(`Page ${data.pageNumber}`, 14, doc.internal.pageSize.height - 10);
                        doc.text(`Total Records: ${rows.length - 1}`, doc.internal.pageSize.width - 40, doc.internal.pageSize.height - 10);
                    }
                });

                doc.save(`Ledger_Report_${new Date().toISOString().slice(0,10)}.pdf`);
                showToast('✅ PDF downloaded!');
            } catch (e) {
                console.error('PDF export error:', e);
                showToast('❌ PDF export failed: ' + e.message, 'error');
            }
        }

        // ---------- PRINT ----------
        function exportPrint(rows) {
            try {
                const printWindow = window.open('', '_blank', 'width=1000,height=700');
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
                        <title>Ledger Report</title>
                        <style>
                            body { font-family: Arial, sans-serif; padding: 30px; }
                            h2 { text-align: center; color: #0f766e; }
                            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                            th { background: #0f766e; color: white; padding: 10px; text-align: left; font-size: 12px; }
                            td { padding: 8px 10px; border: 1px solid #ddd; font-size: 12px; }
                            tr:nth-child(even) { background: #f8fafc; }
                            .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #666; }
                            .credit { color: #16a34a; font-weight: bold; }
                            .debit { color: #dc2626; font-weight: bold; }
                        </style>
                    </head>
                    <body>
                        <h2>📊 Ledger Report</h2>
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
            loadLedger(1);
        });

        // ============================================================
        // KEYBOARD SHORTCUT: Cmd/Ctrl + Enter to filter
        // ============================================================
        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'Enter') {
                e.preventDefault();
                loadLedger(1);
            }
        });
    </script>
</body>
</html>