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
        .export-toast {
            animation: slideDown 0.4s ease;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translate(-50%, -20px) scale(0.95); }
            to { opacity: 1; transform: translate(-50%, 0) scale(1); }
        }
        @media print {
            body * { visibility: hidden; }
            #printArea, #printArea * { visibility: visible; }
            #printArea { position: absolute; left: 0; top: 0; width: 100%; padding: 20px; }
            .no-print { display: none !important; }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 antialiased font-sans">

    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== BALANCE DETAILS CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" id="printArea">

            <!-- Heading & Export Toolbar -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between p-6 border-b border-gray-200 bg-white gap-4 no-print">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-900">Student Balance Details</h2>
                        <p class="text-sm text-gray-500 mt-1">Track pending balance and payment details</p>
                    </div>
                </div>

                <!-- CSV Export Button Only -->
                <div class="flex items-center gap-2">
                    <button onclick="exportCSV()" class="toolbar-btn px-4 py-2.5 bg-sky-500 text-white text-xs font-bold rounded-xl hover:bg-sky-600 shadow-sm flex items-center gap-2">
                        <i class="fas fa-file-csv text-sm"></i> Export CSV
                    </button>
                </div>
            </div>

            <!-- Unified Search & Filters Bar (Matched to Student Records) -->
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gray-50/50 no-print">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-end">
                    
                    <!-- Universal Search Bar -->
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Universal Search</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input id="unifiedSearchInput" type="text" placeholder="Search by student name or batch..." 
                                   class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-xl text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none bg-white" />
                        </div>
                    </div>

                    <!-- Filter Academic Year -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Academic Year</label>
                        <select id="filterAcademicYear" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">All Academic Years</option>
                        </select>
                    </div>

                </div>

                <!-- Action Controls Row & Per Page -->
                <div class="flex flex-wrap items-center justify-between gap-3 mt-4">
                    <div class="flex items-center gap-2">
                        <label for="balancePerPage" class="text-xs font-bold text-gray-600 uppercase">Show:</label>
                        <select id="balancePerPage" class="rounded-xl border border-gray-300 bg-white py-1.5 px-3 text-xs font-semibold text-gray-700 outline-none focus:border-orange-500">
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
                <table class="w-full text-sm text-left text-gray-600 border-collapse" id="balanceTable">
                    <thead>
                        <tr class="bg-orange-500 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-4 py-3 rounded-l-xl whitespace-nowrap">#</th>
                            <th class="px-4 py-3 whitespace-nowrap">Student Name</th>
                            <th class="px-4 py-3 whitespace-nowrap">Batch</th>
                            <th class="px-4 py-3 whitespace-nowrap">Total Fees</th>
                            <th class="px-4 py-3 whitespace-nowrap">Paid Fees</th>
                            <th class="px-4 py-3 whitespace-nowrap">Balance Amount</th>
                            <th class="px-4 py-3 whitespace-nowrap">Status</th>
                            <th class="px-4 py-3 rounded-r-xl whitespace-nowrap text-center no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody id="balanceTableBody" class="divide-y divide-gray-100">
                        <tr>
                            <td colspan="8" class="text-center py-10 text-gray-400">Loading balance records...</td>
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

        <!-- ===== DETAILS MODAL (Fee Summary Pop-up) ===== -->
        <div id="detailsModal" class="fixed inset-0 modal-overlay hidden justify-center items-center z-[99999] p-4">
            <div class="modal-box bg-white rounded-2xl w-full max-w-2xl p-6 relative shadow-2xl max-h-[90vh] overflow-y-auto">
                <button onclick="closeDetailsModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl transition">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="text-xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center text-sm">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </span>
                    Student Fee Summary Details
                </h2>
                <div id="detailsContent" class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <!-- Populated dynamically -->
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closeDetailsModal()" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
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
            const API_URL = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') + '/student-balance-records' : 'http://127.0.0.1:8000/api/student-balance-records';
            const cleanBase = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') : 'http://127.0.0.1:8000/api';
            const API_TOKEN = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token') || '';

            let allBalanceRecords = [];
            let filteredRecords = [];
            let currentPage = 1;
            let rowsPerPage = 10;

            document.addEventListener('DOMContentLoaded', function() {
                if (!API_TOKEN) {
                    alert('Session expired. Please log in again.');
                    window.location.href = 'login.php';
                    return;
                }

                fetchAcademicYears();

                // Event Listeners for Search & Filters
                document.getElementById('searchBtn').addEventListener('click', doSearch);
                document.getElementById('resetBtn').addEventListener('click', resetFilters);

                const unifiedSearch = document.getElementById('unifiedSearchInput');
                if (unifiedSearch) {
                    unifiedSearch.addEventListener('input', () => doSearch());
                    unifiedSearch.addEventListener('keydown', e => { if (e.key === 'Enter') doSearch(); });
                }

                const filterAcademicYear = document.getElementById('filterAcademicYear');
                if (filterAcademicYear) {
                    filterAcademicYear.addEventListener('change', () => doSearch());
                }

                const balancePerPage = document.getElementById('balancePerPage');
                if (balancePerPage) {
                    balancePerPage.addEventListener('change', (e) => {
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
                    const totalPages = Math.ceil(filteredRecords.length / rowsPerPage) || 1;
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderTable();
                    }
                });

                loadStudents();
            });

            // ============================================================
            // FETCH ACADEMIC YEARS DROPDOWN
            // ============================================================
            async function fetchAcademicYears() {
                try {
                    const res = await fetch(`${cleanBase}/academic-years`, {
                        headers: { 'Authorization': `Bearer ${API_TOKEN}`, 'Accept': 'application/json' }
                    });
                    const result = await res.json();
                    if (res.ok) {
                        const yearPayload = result.data?.data || result.data || result;
                        const years = Array.isArray(yearPayload) ? yearPayload : [];
                        const yearSelect = document.getElementById('filterAcademicYear');
                        if (yearSelect) {
                            yearSelect.innerHTML = '<option value="">All Academic Years</option>' + 
                                years.map(y => `<option value="${y.academic_year || y.name}">${y.academic_year || y.name}</option>`).join('');
                        }
                    }
                } catch (err) {
                    console.error('Error loading academic years:', err);
                }
            }

            // ============================================================
            // LOAD STUDENTS FROM API
            // ============================================================
            async function loadStudents() {
                const tbody = document.getElementById('balanceTableBody');
                try {
                    const response = await fetch(`${API_URL}?per_page=100`, {
                        headers: {
                            'Authorization': 'Bearer ' + API_TOKEN,
                            'Accept': 'application/json'
                        }
                    });

                    if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href = 'login.php'; return; }
                    if (response.status === 403) throw new Error('You do not have permission to view student balances.');
                    if (response.status === 404) throw new Error('Student balance records were not found.');
                    if (!response.ok) throw new Error('Unable to load student balances.');
                    
                    const result = await response.json();
                    const payload = result.data || result;
                    const rows = Array.isArray(payload) ? payload : (payload.data || []);

                    allBalanceRecords = rows.map(student => ({
                        id: student.student_id || student.student?.id || student.id || '',
                        name: student.student_name || student.name || '—',
                        batch: student.student_batch || student.batch || student.academic_year || '—',
                        totalFees: Number(student.total_fees || student.gross_fee || 0),
                        paidFees: Number(student.paid_fees || student.completed_payments || 0),
                        balanceAmount: Number(student.balance_amount ?? student.remaining_balance ?? 0)
                    }));

                    filteredRecords = [...allBalanceRecords];
                    currentPage = 1;
                    renderTable();

                } catch (error) {
                    console.error('Error loading students:', error);
                    tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-red-500 font-medium">${error.message}</td></tr>`;
                }
            }

            // ============================================================
            // RENDER TABLE
            // ============================================================
            function renderTable() {
                const tbody = document.getElementById('balanceTableBody');
                if (!tbody) return;

                const totalEntries = filteredRecords.length;
                const totalPages = Math.ceil(totalEntries / rowsPerPage) || 1;

                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                const start = (currentPage - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, totalEntries);
                const pageItems = filteredRecords.slice(start, end);

                if (pageItems.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-gray-400"><i class="fas fa-search mr-1.5 text-orange-400"></i> No matching balance records found.</td></tr>`;
                } else {
                    tbody.innerHTML = pageItems.map((student, index) => {
                        const rowNum = start + index + 1;
                        const balance = student.balanceAmount;
                        const status = balance <= 0 ? 
                            '<span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">✓ Paid</span>' :
                            `<span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700">● Pending (₹${balance.toLocaleString('en-IN')})</span>`;

                        return `
                            <tr class="table-row-hover transition text-sm">
                                <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-600">${rowNum}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">${student.name}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-gray-600">${student.batch}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-800">₹ ${student.totalFees.toLocaleString('en-IN')}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-semibold text-orange-600">₹ ${student.paidFees.toLocaleString('en-IN')}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-bold ${balance > 0 ? 'text-red-600' : 'text-emerald-600'}">
                                    ₹ ${balance.toLocaleString('en-IN')}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">${status}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-center no-print">
                                    <button class="view-balance-btn w-8 h-8 rounded-lg bg-orange-50 text-orange-600 hover:bg-orange-100 flex items-center justify-center transition mx-auto" data-student-id="${student.id}" title="View Fee Summary">
                                        <i class="fas fa-eye text-xs"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    }).join('');
                }

                // Attach click events for summary modal pop-up
                tbody.querySelectorAll('.view-balance-btn').forEach(button => {
                    button.addEventListener('click', async () => {
                        const studentId = button.dataset.studentId;
                        if (!studentId) return;
                        try {
                            const response = await fetch(`${cleanBase}/students/${encodeURIComponent(studentId)}/fee-summary`, {
                                headers: { 'Authorization': 'Bearer ' + API_TOKEN, 'Accept': 'application/json' }
                            });
                            const body = await response.json().catch(() => ({}));
                            if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href = 'login.php'; return; }
                            if (response.status === 403) throw new Error('You do not have permission to view this fee summary.');
                            if (response.status === 404) throw new Error(body.message || 'Student fee summary was not found.');
                            if (!response.ok) throw new Error(body.message || 'Unable to load fee summary.');
                            const summary = body.data?.data || body.data || body;
                            
                            openDetailsModal(summary);
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
            // DETAILS MODAL (Fee Breakdown Pop-up)
            // ============================================================
            window.openDetailsModal = function(summary) {
                const modal = document.getElementById("detailsModal");
                modal.classList.remove("hidden");
                modal.classList.add("flex");

                const gross = Number(summary.gross_fee ?? summary.full_fees ?? 0);
                const discount = Number(summary.discount_amount ?? 0);
                const payable = Number(summary.total_fee ?? summary.payable_total ?? 0);
                const paid = Number(summary.completed_payments ?? summary.total_paid ?? 0);
                const remaining = Number(summary.remaining_balance ?? summary.balance_amount ?? 0);

                document.getElementById("detailsContent").innerHTML = `
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Gross Fee:</strong> ₹ ${gross.toLocaleString('en-IN')}</div>
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Discount Amount:</strong> ₹ ${discount.toLocaleString('en-IN')}</div>
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Payable Total:</strong> ₹ ${payable.toLocaleString('en-IN')}</div>
                    <div class="p-3 bg-gray-50 rounded-xl"><strong>Paid Fees:</strong> <span class="text-emerald-600 font-bold">₹ ${paid.toLocaleString('en-IN')}</span></div>
                    <div class="sm:col-span-2 p-3 bg-orange-50 border border-orange-200 rounded-xl"><strong>Remaining Balance:</strong> <span class="text-orange-600 font-bold">₹ ${remaining.toLocaleString('en-IN')}</span></div>
                `;
            };

            window.closeDetailsModal = function() {
                const modal = document.getElementById("detailsModal");
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            };

            // ============================================================
            // SEARCH & RESET LOGIC
            // ============================================================
            function doSearch() {
                const searchInput = document.getElementById('unifiedSearchInput');
                const filterAcademicYear = document.getElementById('filterAcademicYear');

                const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
                const yearVal = filterAcademicYear ? filterAcademicYear.value.toLowerCase().trim() : '';

                filteredRecords = allBalanceRecords.filter(student => {
                    const nameMatch = student.name.toLowerCase().includes(query);
                    const batchMatch = student.batch.toLowerCase().includes(query);
                    const totalMatch = student.totalFees.toString().includes(query);
                    const paidMatch = student.paidFees.toString().includes(query);
                    const balanceMatch = student.balanceAmount.toString().includes(query);

                    const matchesSearch = !query || nameMatch || batchMatch || totalMatch || paidMatch || balanceMatch;
                    const matchesYear = !yearVal || student.batch.toLowerCase() === yearVal;

                    return matchesSearch && matchesYear;
                });

                currentPage = 1;
                renderTable();
            }

            function resetFilters() {
                const searchInput = document.getElementById('unifiedSearchInput');
                const filterAcademicYear = document.getElementById('filterAcademicYear');
                if (searchInput) searchInput.value = '';
                if (filterAcademicYear) filterAcademicYear.value = '';
                filteredRecords = [...allBalanceRecords];
                currentPage = 1;
                renderTable();
            }

            // ============================================================
            // CSV EXPORT FUNCTION ONLY
            // ============================================================
            function getHeaders() {
                return ['#', 'Student Name', 'Batch', 'Total Fees', 'Paid Fees', 'Balance Amount', 'Status'];
            }

            window.exportCSV = function() {
                if (filteredRecords.length === 0) return alert('No data to export.');
                let csv = getHeaders().join(',') + '\n';
                filteredRecords.forEach((student, i) => {
                    const statusText = student.balanceAmount <= 0 ? 'Paid' : 'Pending';
                    csv += [
                        i + 1,
                        `"${student.name}"`,
                        `"${student.batch}"`,
                        `"₹ ${student.totalFees.toLocaleString('en-IN')}"`,
                        `"₹ ${student.paidFees.toLocaleString('en-IN')}"`,
                        `"₹ ${student.balanceAmount.toLocaleString('en-IN')}"`,
                        `"${statusText}"`
                    ].join(',') + '\n';
                });
                downloadFile(csv, 'student_balance_records.csv', 'text/csv');
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
                toast.className = 'export-toast fixed top-20 left-1/2 -translate-x-1/2 bg-orange-600 text-white px-6 py-3 rounded-xl shadow-lg z-50 transition-all duration-300';
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