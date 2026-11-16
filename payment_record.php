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
    </style>
</head>
<body class="bg-gray-100 text-gray-800 antialiased font-sans">

    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== PAYMENT RECORDS CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" id="printArea">

            <!-- Heading & Export Toolbar -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between p-6 border-b border-gray-200 bg-white gap-4 no-print">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-900">Payment Records</h2>
                        <p class="text-sm text-gray-500 mt-1">Search, view, and manage all student payment transactions</p>
                    </div>
                </div>

                <!-- CSV Export Button Only -->
                <div class="flex items-center gap-2">
                    <button onclick="exportCSV()" class="toolbar-btn px-4 py-2.5 bg-sky-500 text-white text-xs font-bold rounded-xl hover:bg-sky-600 shadow-sm flex items-center gap-2">
                        <i class="fas fa-file-csv text-sm"></i> Export CSV
                    </button>
                </div>
            </div>

            <!-- Unified Search & Filters Bar (Structured like Student Records) -->
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gray-50/50 no-print">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-end">
                    
                    <!-- Universal Search Bar -->
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Universal Search</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input id="unifiedSearchInput" type="text" placeholder="Search by student name, ID, receipt, or mode..." 
                                   class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-xl text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none bg-white" />
                        </div>
                    </div>

                    <!-- Payment Mode Filter -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Payment Mode</label>
                        <select id="paymentModeFilter" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">All Modes</option>
                            <option value="Cash">Cash</option>
                            <option value="Online">Online</option>
                            <option value="UPI">UPI</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </div>

                </div>

                <!-- Action Controls Row & Per Page -->
                <div class="flex flex-wrap items-center justify-between gap-3 mt-4">
                    <div class="flex items-center gap-2">
                        <label for="paymentPerPage" class="text-xs font-bold text-gray-600 uppercase">Show:</label>
                        <select id="paymentPerPage" class="rounded-xl border border-gray-300 bg-white py-1.5 px-3 text-xs font-semibold text-gray-700 outline-none focus:border-orange-500">
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
                <table class="w-full text-sm text-left text-gray-600 border-collapse" id="paymentTable">
                    <thead>
                        <tr class="bg-orange-500 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-4 py-3 rounded-l-xl whitespace-nowrap">#</th>
                            <th class="px-4 py-3 whitespace-nowrap">Student Name</th>
                            <th class="px-4 py-3 whitespace-nowrap">Student ID</th>
                            <th class="px-4 py-3 whitespace-nowrap">Fees Paid</th>
                            <th class="px-4 py-3 whitespace-nowrap">Amount</th>
                            <th class="px-4 py-3 whitespace-nowrap">Receipt No</th>
                            <th class="px-4 py-3 whitespace-nowrap">Payment Mode</th>
                            <th class="px-4 py-3 whitespace-nowrap">Status</th>
                            <th class="px-4 py-3 whitespace-nowrap">Payment Date</th>
                            <th class="px-4 py-3 rounded-r-xl whitespace-nowrap text-center no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody id="paymentTableBody" class="divide-y divide-gray-100">
                        <tr>
                            <td colspan="10" class="text-center py-10 text-gray-400">Loading payment records...</td>
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
                    <button id="prevPage" onclick="changePage(-1)" class="page-btn px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </button>
                    <span id="currentPageDisplay" class="px-4 py-2 bg-orange-100 text-orange-800 font-bold rounded-xl">1</span>
                    <button id="nextPage" onclick="changePage(1)" class="page-btn px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
            </div>

        </div>

        <!-- ===== PAYMENT DETAILS MODAL ===== -->
        <div id="paymentDetailsModal" class="fixed inset-0 modal-overlay hidden justify-center items-center z-[99999] p-4">
            <div class="modal-box bg-white rounded-2xl w-full max-w-2xl p-6 relative shadow-2xl">
                <button onclick="closePaymentModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl transition">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="text-xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center text-sm">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </span>
                    Payment Transaction Details
                </h2>
                <div id="paymentDetailsContent" class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <!-- populated by JS -->
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closePaymentModal()" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
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
            const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token') || '';
            const cleanBase = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') : 'http://127.0.0.1:8000/api';

            let allPayments = [];
            let filteredPayments = [];
            let currentPage = 1;
            let rowsPerPage = 10;

            document.addEventListener('DOMContentLoaded', () => {
                if (!token) {
                    alert('Session expired. Please log in again.');
                    window.location.href = 'login.php';
                    return;
                }

                // Event Listeners for Search & Filters (structured identically to student records)
                document.getElementById('searchBtn').addEventListener('click', doSearch);
                document.getElementById('resetBtn').addEventListener('click', resetFilters);

                const unifiedSearch = document.getElementById('unifiedSearchInput');
                if (unifiedSearch) {
                    unifiedSearch.addEventListener('input', () => doSearch());
                    unifiedSearch.addEventListener('keydown', e => { if (e.key === 'Enter') doSearch(); });
                }

                const paymentModeFilter = document.getElementById('paymentModeFilter');
                if (paymentModeFilter) {
                    paymentModeFilter.addEventListener('change', () => doSearch());
                }

                const perPageEl = document.getElementById('paymentPerPage');
                if (perPageEl) {
                    perPageEl.addEventListener('change', (e) => {
                        rowsPerPage = Number(e.target.value) || 10;
                        currentPage = 1;
                        renderTable();
                    });
                }

                loadPayments();
            });

            // ==============================
            // FETCH PAYMENTS FROM API
            // ==============================
            async function loadPayments() {
                const tbody = document.getElementById('paymentTableBody');
                try {
                    const response = await fetch(`${cleanBase}/student-payments?per_page=100`, {
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Accept': 'application/json'
                        }
                    });
                    const body = await response.json().catch(() => ({}));

                    if (response.status === 401) {
                        alert('Your session has expired. Please log in again.');
                        window.location.href = 'login.php';
                        return;
                    }
                    if (response.status === 403) throw new Error('You do not have permission to view payments.');
                    if (response.status === 404) throw new Error(body.message || 'Payment records were not found.');
                    if (!response.ok) throw new Error(body.message || 'Unable to load payment records.');

                    const payload = body.data || body;
                    const rows = Array.isArray(payload) ? payload : (payload.data || []);

                    allPayments = rows.map(p => {
                        const rawAmount = Number(p.amount_paid ?? p.amount ?? 0);
                        return {
                            id: p.id || p.payment_id || '',
                            studentDbId: String(p.student_id || p.student?.id || ''),
                            studentName: p.student?.student_name || p.student_name || '—',
                            studentRegId: p.student?.student_id || p.student?.registration_id || p.registration_id || p.abc_id || '—',
                            feesPaid: p.installment_type || p.description || 'Fee Payment',
                            rawAmount: rawAmount,
                            amount: '₹' + rawAmount.toLocaleString('en-IN'),
                            receipt: p.receipt_number || p.transaction_reference || '—',
                            mode: p.payment_method || '—',
                            status: p.payment_status || p.status || 'Completed',
                            date: p.payment_date || (p.created_at ? p.created_at.split('T')[0] : '—'),
                            raw: p
                        };
                    });

                    populateModeFilter(allPayments);

                    filteredPayments = [...allPayments];
                    currentPage = 1;
                    renderTable();

                } catch (error) {
                    tbody.innerHTML = `<tr><td colspan="10" class="text-center py-8 text-red-500 font-medium">${error.message}</td></tr>`;
                }
            }

            function populateModeFilter(payments) {
                const modeSelect = document.getElementById('paymentModeFilter');
                if (!modeSelect) return;
                const defaultModes = ['Cash', 'Online', 'UPI', 'Bank Transfer', 'Cheque'];
                const foundModes = new Set(defaultModes);
                payments.forEach(p => {
                    if (p.mode && p.mode !== '—') foundModes.add(p.mode);
                });
                const currentVal = modeSelect.value;
                modeSelect.innerHTML = '<option value="">All Modes</option>' +
                    Array.from(foundModes).map(m => `<option value="${m}">${m}</option>`).join('');
                modeSelect.value = currentVal;
            }

            // ==============================
            // RENDER TABLE & PAGINATION
            // ==============================
            function renderTable() {
                const tbody = document.getElementById('paymentTableBody');
                if (!tbody) return;

                const totalEntries = filteredPayments.length;
                const totalPages = Math.ceil(totalEntries / rowsPerPage) || 1;

                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                const start = (currentPage - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, totalEntries);
                const pageItems = filteredPayments.slice(start, end);

                if (pageItems.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="10" class="text-center py-8 text-gray-400"><i class="fas fa-search mr-1.5 text-orange-400"></i> No matching payment records found.</td></tr>`;
                } else {
                    tbody.innerHTML = pageItems.map((p, index) => {
                        const rowNum = start + index + 1;
                        const modeClass = p.mode.toLowerCase() === 'cash'
                            ? 'bg-gray-100 text-gray-700'
                            : p.mode.toLowerCase() === 'online' || p.mode.toLowerCase() === 'upi'
                                ? 'bg-blue-50 text-blue-700'
                                : 'bg-purple-50 text-purple-700';

                        const statusLower = p.status.toLowerCase();
                        const statusClass = statusLower === 'completed' || statusLower === 'paid' || statusLower === 'success'
                            ? 'bg-emerald-50 text-emerald-700'
                            : statusLower === 'pending'
                                ? 'bg-amber-50 text-amber-700'
                                : 'bg-red-50 text-red-700';

                        return `
                            <tr class="table-row-hover transition text-sm">
                                <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-600">${rowNum}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">${p.studentName}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-mono text-gray-700">${p.studentRegId}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-gray-600">${p.feesPaid}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-bold text-orange-600">${p.amount}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-mono text-gray-700">${p.receipt}</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold ${modeClass}">
                                        ${p.mode}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold ${statusClass}">
                                        ${p.status}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-gray-600">${p.date}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-center no-print">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="viewPaymentDetails('${p.id}')" class="w-8 h-8 rounded-lg bg-orange-50 text-orange-600 hover:bg-orange-100 flex items-center justify-center transition" title="View Payment Details">
                                            <i class="fas fa-eye text-xs"></i>
                                        </button>
                                        <button onclick="openPaymentReceipt('${p.id}')" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition" title="Get Receipt">
                                            <i class="fas fa-receipt text-xs"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `;
                    }).join('');
                }

                document.getElementById('startEntry').textContent = totalEntries ? start + 1 : 0;
                document.getElementById('endEntry').textContent = end;
                document.getElementById('totalEntries').textContent = totalEntries;
                document.getElementById('currentPageDisplay').textContent = currentPage;

                document.getElementById('prevPage').disabled = (currentPage === 1);
                document.getElementById('nextPage').disabled = (currentPage === totalPages || totalEntries === 0);
            }

            function changePage(direction) {
                const totalPages = Math.ceil(filteredPayments.length / rowsPerPage) || 1;
                currentPage += direction;
                if (currentPage < 1) currentPage = 1;
                if (currentPage > totalPages) currentPage = totalPages;
                renderTable();
            }

            // ==============================
            // UNIFIED SEARCH & FILTER LOGIC (Matched to Student Records Pattern)
            // ==============================
            function doSearch() {
                const searchInput = document.getElementById('unifiedSearchInput');
                const paymentModeFilter = document.getElementById('paymentModeFilter');

                const query = searchInput ? searchInput.value.toLowerCase().trim().replace(/\s/g, '') : '';
                const rawQuery = searchInput ? searchInput.value.toLowerCase().trim() : '';
                const modeVal = paymentModeFilter ? paymentModeFilter.value.toLowerCase().trim() : '';

                filteredPayments = allPayments.filter(p => {
                    const nameLower = p.studentName.toLowerCase();
                    const regIdLower = p.studentRegId.toLowerCase().replace(/\s/g, '');
                    const dbIdLower = p.studentDbId.toLowerCase().replace(/\s/g, '');
                    const feesLower = p.feesPaid.toLowerCase();
                    const receiptLower = p.receipt.toLowerCase().replace(/\s/g, '');
                    const modeLower = p.mode.toLowerCase();
                    const statusLower = p.status.toLowerCase();
                    const dateLower = p.date.toLowerCase();
                    const amountLower = p.amount.toLowerCase();

                    const matchesSearch = !rawQuery || 
                        nameLower.includes(rawQuery) || 
                        regIdLower.includes(query) || 
                        dbIdLower.includes(query) || 
                        feesLower.includes(rawQuery) || 
                        receiptLower.includes(query) || 
                        modeLower.includes(rawQuery) || 
                        statusLower.includes(rawQuery) || 
                        dateLower.includes(rawQuery) || 
                        amountLower.includes(rawQuery);

                    const matchesMode = !modeVal || p.mode.toLowerCase() === modeVal;

                    return matchesSearch && matchesMode;
                });

                currentPage = 1;
                renderTable();
            }

            function resetFilters() {
                if (document.getElementById('unifiedSearchInput')) document.getElementById('unifiedSearchInput').value = '';
                if (document.getElementById('paymentModeFilter')) document.getElementById('paymentModeFilter').value = '';
                filteredPayments = [...allPayments];
                currentPage = 1;
                renderTable();
            }

            // ==============================
            // VIEW PAYMENT DETAILS MODAL
            // ==============================
            window.viewPaymentDetails = async function(paymentId) {
                if (!paymentId) return;
                try {
                    const response = await fetch(`${cleanBase}/student-payments/${encodeURIComponent(paymentId)}`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    const body = await response.json().catch(() => ({}));
                    if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href = 'login.php'; return; }
                    if (response.status === 403) throw new Error('You do not have permission to view this payment.');
                    if (response.status === 404) throw new Error(body.message || 'Payment was not found.');
                    if (!response.ok) throw new Error(body.message || 'Unable to load payment details.');

                    const payment = body.data?.payment || body.data || body;
                    document.getElementById('paymentDetailsContent').innerHTML = `
                        <div class="p-3 bg-gray-50 rounded-xl"><strong>Student Name:</strong> ${payment.student?.student_name || payment.student_name || '—'}</div>
                        <div class="p-3 bg-gray-50 rounded-xl"><strong>Student ID:</strong> ${payment.student?.student_id || payment.student?.registration_id || payment.student_id || '—'}</div>
                        <div class="p-3 bg-gray-50 rounded-xl"><strong>Amount Paid:</strong> <span class="text-orange-600 font-bold">₹${Number(payment.amount_paid || payment.amount || 0).toLocaleString('en-IN')}</span></div>
                        <div class="p-3 bg-gray-50 rounded-xl"><strong>Payment Method:</strong> ${payment.payment_method || '—'}</div>
                        <div class="p-3 bg-gray-50 rounded-xl"><strong>Payment Date:</strong> ${payment.payment_date || '—'}</div>
                        <div class="p-3 bg-gray-50 rounded-xl"><strong>Status:</strong> ${payment.payment_status || payment.status || '—'}</div>
                        <div class="p-3 bg-gray-50 rounded-xl"><strong>Receipt / Reference:</strong> ${payment.receipt_number || payment.transaction_reference || '—'}</div>
                        <div class="p-3 bg-gray-50 rounded-xl"><strong>Installment / Type:</strong> ${payment.installment_type || '—'}</div>
                        <div class="sm:col-span-2 p-3 bg-gray-50 rounded-xl"><strong>Remarks:</strong> ${payment.description || '—'}</div>
                    `;
                    const modal = document.getElementById('paymentDetailsModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                } catch (error) {
                    alert(error.message);
                }
            };

            window.closePaymentModal = function() {
                const modal = document.getElementById('paymentDetailsModal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            };

            // ==============================
            // RECEIPT LAUNCHER
            // ==============================
            window.openPaymentReceipt = async function(paymentId) {
                if (!paymentId) return;
                const receiptWindow = window.open('about:blank', '_blank');
                try {
                    const response = await fetch(`${cleanBase}/student-payments/receipt/${encodeURIComponent(paymentId)}`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json, application/pdf' }
                    });
                    if (response.status === 401) {
                        receiptWindow?.close();
                        alert('Your session has expired. Please log in again.');
                        window.location.href = 'login.php';
                        return;
                    }
                    if (response.status === 403) throw new Error('You do not have permission to view this receipt.');
                    if (response.status === 404) throw new Error('Payment receipt was not found.');
                    if (!response.ok) throw new Error('Unable to load payment receipt.');

                    if ((response.headers.get('content-type') || '').includes('application/pdf')) {
                        receiptWindow.location.href = URL.createObjectURL(await response.blob());
                    } else {
                        const body = await response.json();
                        const receipt = body.data?.payment || body.data || body;
                        const query = new URLSearchParams({
                            receipt_no: receipt.receipt_number || receipt.payment_id || receipt.id || '',
                            name: receipt.student?.student_name || receipt.student_name || '',
                            reg_id: receipt.student?.student_id || receipt.student_id || '',
                            course: receipt.student?.course || receipt.course || '',
                            batch: receipt.student?.student_batch || receipt.student_batch || '',
                            pay_amount: receipt.amount_paid || receipt.amount || 0,
                            pay_type: receipt.payment_method || 'Cash',
                            txn: receipt.transaction_reference || '',
                            pay_date: receipt.payment_date || '',
                            remarks: receipt.description || '',
                            installment_type: receipt.installment_type || '',
                            gross_fee: receipt.gross_fee || 0,
                            discount_amount: receipt.discount_amount || 0,
                            payable_total: receipt.total_fee || receipt.payable_total || 0,
                            completed_payments: receipt.completed_payments || 0,
                            remaining_balance: receipt.remaining_balance || 0,
                            fee_items: JSON.stringify(receipt.fee_items || [])
                        });
                        receiptWindow.location.href = `payment-receipt.php?${query}`;
                    }
                } catch (error) {
                    receiptWindow?.close();
                    alert(error.message);
                }
            };

            // ==============================
            // CSV EXPORT FUNCTION ONLY
            // ==============================
            function getHeaders() {
                return ['#', 'Student Name', 'Student ID', 'Fees Paid', 'Amount', 'Receipt No', 'Payment Mode', 'Status', 'Payment Date'];
            }

            window.exportCSV = function() {
                if (filteredPayments.length === 0) return alert('No data to export.');
                let csv = getHeaders().join(',') + '\n';
                filteredPayments.forEach((p, i) => {
                    csv += [i + 1, `"${p.studentName}"`, `"${p.studentRegId}"`, `"${p.feesPaid}"`, `"${p.amount}"`, `"${p.receipt}"`, `"${p.mode}"`, `"${p.status}"`, `"${p.date}"`].join(',') + '\n';
                });
                downloadFile(csv, 'payment_records.csv', 'text/csv');
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