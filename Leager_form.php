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
        .table-row-hover:hover {
            background-color: #f8fafc;
        }
        .toolbar-btn, .memo-btn {
            transition: all 0.2s ease;
        }
        .toolbar-btn:hover, .memo-btn:hover {
            transform: translateY(-1px);
        }
        .page-btn {
            transition: background-color 0.2s;
        }
        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .modal-overlay {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }
        .modal-box {
            animation: fadeIn 0.25s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.97); }
            to { opacity: 1; transform: scale(1); }
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
        .export-toast {
            animation: slideDown 0.4s ease;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: #ea580c;
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
    </style>
</head>

<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== LEDGER CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" id="printArea">

            <!-- Heading & CSV Export Toolbar -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between p-6 border-b border-gray-200 bg-white gap-4 no-print">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl">
                        <i class="fas fa-book"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-900">Ledger Report</h2>
                        <p class="text-sm text-gray-500 mt-1">Track debit, credit and transaction history</p>
                    </div>
                </div>

                <!-- CSV Export Button Only -->
                <div class="flex items-center gap-2">
                    <button onclick="exportCSV()" class="toolbar-btn px-4 py-2.5 bg-sky-500 text-white text-xs font-bold rounded-xl hover:bg-sky-600 shadow-sm flex items-center gap-2">
                        <i class="fas fa-file-csv text-sm"></i> Export CSV
                    </button>
                </div>
            </div>

            <!-- Filters Section -->
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gray-50/50 no-print">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                    
                    <!-- Universal Search -->
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Universal Search</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="unifiedSearchInput" placeholder="Search by receipt no, memo details, or branch..." 
                                   class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-xl text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none bg-white" />
                        </div>
                    </div>

                    <!-- From Date -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">From Date</label>
                        <input type="date" id="fromDate" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none" />
                    </div>

                    <!-- To Date -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">To Date</label>
                        <input type="date" id="toDate" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none" />
                    </div>

                    <!-- Transaction Type -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Transaction Type</label>
                        <select id="transactionTypeFilter" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">All Types</option>
                            <option value="credit">Credit</option>
                            <option value="debit">Debit</option>
                        </select>
                    </div>

                </div>

                <!-- Action Controls Row & Per Page -->
                <div class="flex flex-wrap items-center justify-between gap-3 mt-4">
                    <div class="flex items-center gap-2">
                        <label for="ledgerPerPage" class="text-xs font-bold text-gray-600 uppercase">Show:</label>
                        <select id="ledgerPerPage" class="rounded-xl border border-gray-300 bg-white py-1.5 px-3 text-xs font-semibold text-gray-700 outline-none focus:border-orange-500">
                            <option value="10" selected>10 entries</option>
                            <option value="20">20 entries</option>
                            <option value="50">50 entries</option>
                            <option value="100">100 entries</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="button" id="searchBtn" class="memo-btn bg-orange-500 text-white font-bold py-2 px-6 rounded-xl hover:bg-orange-600 text-sm shadow-sm flex items-center gap-1.5">
                            <i class="fas fa-search"></i> Search
                        </button>
                        <button type="button" id="resetBtn" class="memo-btn bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-xl hover:bg-gray-300 text-sm flex items-center gap-1.5">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-wrap p-4 sm:p-6">
                <table class="w-full text-sm text-left text-gray-600 border-collapse" id="ledgerTable">
                    <thead>
                        <tr class="bg-orange-500 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-4 py-3 rounded-l-xl whitespace-nowrap">SR.NO.</th>
                            <th class="px-4 py-3 whitespace-nowrap">RECEIPT NUMBER</th>
                            <th class="px-4 py-3 whitespace-nowrap">MEMO DETAILS</th>
                            <th class="px-4 py-3 whitespace-nowrap">CREDIT</th>
                            <th class="px-4 py-3 whitespace-nowrap">DEBIT</th>
                            <th class="px-4 py-3 whitespace-nowrap">OPENING / BALANCE</th>
                            <th class="px-4 py-3 whitespace-nowrap">DATE</th>
                            <th class="px-4 py-3 rounded-r-xl whitespace-nowrap text-center no-print">ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="ledgerTableBody" class="divide-y divide-gray-100">
                        <tr>
                            <td colspan="10" class="text-center py-10 text-gray-400">Loading ledger entries...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer / Pagination Bar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-100 bg-gray-50/50 no-print">
                <div class="text-sm text-gray-500 font-semibold">
                    Showing <span id="startEntry">0</span> to <span id="endEntry">0</span> of <span id="totalEntries">0</span> entries
                </div>
                <div class="flex items-center gap-2">
                    <button id="prevPage" class="page-btn px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </button>
                    <span id="currentPageDisplay" class="px-4 py-2 bg-orange-100 text-orange-800 font-bold rounded-xl">1</span>
                    <button id="nextPage" class="page-btn px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
            </div>

        </div>

        <!-- ===== LEDGER DETAILS MODAL ===== -->
        <div id="ledgerDetailsModal" class="fixed inset-0 modal-overlay hidden justify-center items-center z-[99999] p-4">
            <div class="modal-box bg-white rounded-2xl w-full max-w-2xl p-6 relative shadow-2xl max-h-[90vh] overflow-y-auto">
                <button onclick="closeLedgerModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl transition">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="text-xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center text-sm">
                        <i class="fas fa-file-invoice"></i>
                    </span>
                    Ledger Entry Details
                </h2>
                <div id="ledgerDetailsContent" class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <!-- Populated dynamically -->
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closeLedgerModal()" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>

    </main>

    <?php include 'footer.php'; ?>
    <script src="url.js"></script>

    <script>
        (function() {
            const API_URL = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') + '/ledger' : 'http://127.0.0.1:8000/api/ledger';
            const cleanBase = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') : 'http://127.0.0.1:8000/api';
            const API_TOKEN = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token') || '';

            let allLedger = [];
            let filteredLedger = [];
            let currentPage = 1;
            let rowsPerPage = 10;

            document.addEventListener('DOMContentLoaded', function() {
                if (!API_TOKEN) {
                    alert('Session expired. Please log in again.');
                    window.location.href = 'login.php';
                    return;
                }

                // Event Listeners for Search & Filters
                document.getElementById('searchBtn').addEventListener('click', doSearch);
                document.getElementById('resetBtn').addEventListener('click', resetFilters);

                const unifiedSearch = document.getElementById('unifiedSearchInput');
                if (unifiedSearch) {
                    unifiedSearch.addEventListener('input', () => doSearch());
                    unifiedSearch.addEventListener('keydown', e => { if (e.key === 'Enter') doSearch(); });
                }

                const fromDate = document.getElementById('fromDate');
                const toDate = document.getElementById('toDate');
                const transactionTypeFilter = document.getElementById('transactionTypeFilter');

                if (fromDate) fromDate.addEventListener('change', doSearch);
                if (toDate) toDate.addEventListener('change', doSearch);
                if (transactionTypeFilter) transactionTypeFilter.addEventListener('change', doSearch);

                const ledgerPerPage = document.getElementById('ledgerPerPage');
                if (ledgerPerPage) {
                    ledgerPerPage.addEventListener('change', (e) => {
                        rowsPerPage = Number(e.target.value) || 10;
                        currentPage = 1;
                        renderTable();
                    });
                }

                document.getElementById('prevPage').addEventListener('click', () => {
                    if (currentPage > 1) {
                        currentPage--;
                        renderTable();
                    }
                });

                document.getElementById('nextPage').addEventListener('click', () => {
                    const totalPages = Math.ceil(filteredLedger.length / rowsPerPage) || 1;
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderTable();
                    }
                });

                loadLedger();
            });

            // ============================================================
            // LOAD LEDGER FROM API
            // ============================================================
            async function loadLedger() {
                const tbody = document.getElementById('ledgerTableBody');
                try {
                    const response = await fetch(`${API_URL}?per_page=100`, {
                        headers: {
                            'Authorization': 'Bearer ' + API_TOKEN,
                            'Accept': 'application/json'
                        }
                    });

                    if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href = 'login.php'; return; }
                    if (response.status === 403) throw new Error('You do not have permission to view ledger entries.');
                    if (response.status === 404) throw new Error('Ledger entries were not found.');
                    if (!response.ok) throw new Error('Unable to load ledger entries.');
                    
                    const result = await response.json();
                    const payload = result.data || result;
                    const rows = Array.isArray(payload) ? payload : (payload.data || []);

                    allLedger = rows.map(item => ({
                        id: item.id || item.ledger_id || '',
                        receiptNumber: item.receipt_number || '—',
                        memoDetails: item.memo_details || '—',
                        credit: Number(item.credit) || 0,
                        debit: Number(item.debit) || 0,
                        balance: Number(item.running_balance ?? item.balance ?? 0),
                        date: item.transaction_date ? item.transaction_date.split(' ')[0] : '—',
                        raw: item
                    }));

                    filteredLedger = [...allLedger];
                    currentPage = 1;
                    renderTable();

                } catch (error) {
                    console.error('Error loading ledger:', error);
                    tbody.innerHTML = `<tr><td colspan="10" class="text-center py-8 text-red-500 font-medium">${error.message}</td></tr>`;
                }
            }

            // ============================================================
            // RENDER TABLE
            // ============================================================
            function renderTable() {
                const tbody = document.getElementById('ledgerTableBody');
                if (!tbody) return;

                const totalEntries = filteredLedger.length;
                const totalPages = Math.ceil(totalEntries / rowsPerPage) || 1;

                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                const start = (currentPage - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, totalEntries);
                const pageItems = filteredLedger.slice(start, end);

                if (pageItems.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="10" class="text-center py-8 text-gray-400"><i class="fas fa-search mr-1.5 text-orange-400"></i> No matching ledger records found.</td></tr>`;
                } else {
                    tbody.innerHTML = pageItems.map((item, index) => {
                        const rowNum = start + index + 1;
                        return `
                            <tr class="table-row-hover transition text-sm">
                                <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-600">${rowNum}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-mono text-gray-900">${item.receiptNumber}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-gray-700">${item.memoDetails}</td>
                                <td class="px-4 py-3 whitespace-nowrap credit">${item.credit > 0 ? '₹ ' + item.credit.toLocaleString('en-IN') : '—'}</td>
                                <td class="px-4 py-3 whitespace-nowrap debit">${item.debit > 0 ? '₹ ' + item.debit.toLocaleString('en-IN') : '—'}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-800">₹ ${item.balance.toLocaleString('en-IN')}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-gray-600">${item.date}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-center no-print">
                                    <button class="ledger-detail-btn w-8 h-8 rounded-lg bg-orange-50 text-orange-600 hover:bg-orange-100 flex items-center justify-center transition mx-auto" data-id="${item.id}" title="View Details">
                                        <i class="fas fa-eye text-xs"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    }).join('');
                }

                // Attach click events for detail modal pop-up
                tbody.querySelectorAll('.ledger-detail-btn').forEach(button => {
                    button.addEventListener('click', async () => {
                        const ledgerId = button.dataset.id;
                        if (!ledgerId) return;
                        try {
                            const response = await fetch(`${API_URL}/${encodeURIComponent(ledgerId)}`, {
                                headers: { 'Authorization': 'Bearer ' + API_TOKEN, 'Accept': 'application/json' }
                            });
                            const body = await response.json().catch(() => ({}));
                            if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href='login.php'; return; }
                            if (response.status === 403) throw new Error('You do not have permission to view this ledger entry.');
                            if (response.status === 404) throw new Error(body.message || 'Ledger entry was not found.');
                            if (!response.ok) throw new Error(body.message || 'Unable to load ledger entry.');
                            const entry = body.data?.entry || body.data || body;
                            
                            openLedgerModal(entry);
                        } catch (error) { 
                            alert(error.message); 
                        }
                    });
                });

                document.getElementById('startEntry').textContent = totalEntries ? start + 1 : 0;
                document.getElementById('endEntry').textContent = end;
                document.getElementById('totalEntries').textContent = totalEntries;
                document.getElementById('currentPageDisplay').textContent = currentPage;

                document.getElementById('prevPage').disabled = (currentPage === 1);
                document.getElementById('nextPage').disabled = (currentPage === totalPages || totalEntries === 0);
            }

            // ============================================================
            // DETAILS MODAL (Pop-up)
            // ============================================================
            window.openLedgerModal = function(entry) {
                const modal = document.getElementById("ledgerDetailsModal");
                modal.classList.remove("hidden");
                modal.classList.add("flex");

                document.getElementById("ledgerDetailsContent").innerHTML = `
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Receipt Number:</strong> ${entry.receipt_number || '—'}</div>
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Transaction Type:</strong> ${entry.transaction_type || (entry.credit > 0 ? 'Credit' : 'Debit')}</div>
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Credit Amount:</strong> <span class="text-emerald-600 font-bold">₹ ${Number(entry.credit || 0).toLocaleString('en-IN')}</span></div>
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Debit Amount:</strong> <span class="text-red-600 font-bold">₹ ${Number(entry.debit || 0).toLocaleString('en-IN')}</span></div>
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Running Balance:</strong> ₹ ${Number(entry.running_balance || entry.balance || 0).toLocaleString('en-IN')}</div>
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Transaction Date:</strong> ${entry.transaction_date || '—'}</div>
                    <div class="sm:col-span-2 p-3 bg-gray-50 rounded-xl"><strong>Memo Details:</strong> ${entry.memo_details || '—'}</div>
                `;
            };

            window.closeLedgerModal = function() {
                const modal = document.getElementById("ledgerDetailsModal");
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            };

            // ============================================================
            // SEARCH & FILTER LOGIC
            // ============================================================
            function doSearch() {
                const searchInput = document.getElementById('unifiedSearchInput');
                const fromDateEl = document.getElementById('fromDate');
                const toDateEl = document.getElementById('toDate');
                const typeFilterEl = document.getElementById('transactionTypeFilter');

                const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
                const fromVal = fromDateEl ? fromDateEl.value : '';
                const toVal = toDateEl ? toDateEl.value : '';
                const typeVal = typeFilterEl ? typeFilterEl.value.toLowerCase().trim() : '';

                filteredLedger = allLedger.filter(item => {
                    const matchReceipt = item.receiptNumber.toLowerCase().includes(query);
                    const matchMemo = item.memoDetails.toLowerCase().includes(query);

                    const matchesSearch = !query || matchReceipt || matchMemo;

                    // Date range filter
                    let matchesDate = true;
                    if (fromVal && item.date !== '—' && item.date < fromVal) matchesDate = false;
                    if (toVal && item.date !== '—' && item.date > toVal) matchesDate = false;

                    // Type filter
                    let matchesType = true;
                    if (typeVal === 'credit') matchesType = (item.credit > 0);
                    if (typeVal === 'debit') matchesType = (item.debit > 0);

                    return matchesSearch && matchesDate && matchesType;
                });

                currentPage = 1;
                renderTable();
            }

            function resetFilters() {
                const searchInput = document.getElementById('unifiedSearchInput');
                const fromDateEl = document.getElementById('fromDate');
                const toDateEl = document.getElementById('toDate');
                const typeFilterEl = document.getElementById('transactionTypeFilter');

                if (searchInput) searchInput.value = '';
                if (fromDateEl) fromDateEl.value = '';
                if (toDateEl) toDateEl.value = '';
                if (typeFilterEl) typeFilterEl.value = '';

                filteredLedger = [...allLedger];
                currentPage = 1;
                renderTable();
            }

            // ============================================================
            // CSV EXPORT FUNCTION ONLY
            // ============================================================
            function getHeaders() {
                return ['Receipt Number', 'Memo Details', 'Credit', 'Debit', 'Running Balance', 'Date'];
            }

            window.exportCSV = function() {
                if (filteredLedger.length === 0) return alert('No data to export.');
                let csv = getHeaders().join(',') + '\n';
                filteredLedger.forEach(item => {
                    csv += [
                        `"${item.receiptNumber}"`,
                        `"${item.memoDetails}"`,
                        `"${item.credit > 0 ? '₹ ' + item.credit.toLocaleString('en-IN') : '-'}"`,
                        `"${item.debit > 0 ? '₹ ' + item.debit.toLocaleString('en-IN') : '-'}"`,
                        `"₹ ${item.balance.toLocaleString('en-IN')}"`,
                        `"${item.date}"`
                    ].join(',') + '\n';
                });
                downloadFile(csv, 'ledger_report.csv', 'text/csv');
                showToast('✅ CSV downloaded successfully!');
            };

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

            function showToast(message) {
                const existing = document.querySelector('.export-toast');
                if (existing) existing.remove();
                const toast = document.createElement('div');
                toast.className = 'export-toast';
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => {
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 300);
                }, 2500);
            }
        })();
    </script>
</body>
</html>