<?php
// ============================================================
// Cash Memo Records — ERP with Custom Pagination & Add Button
// ============================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cash Memo Records - ERP</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        .memo-btn {
            transition: all 0.2s ease;
        }
        .memo-btn:hover {
            transform: translateY(-1px);
        }
        .table-row-hover:hover {
            background-color: #f8fafc;
        }
        .table-wrap {
            overflow-x: auto;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 antialiased font-sans">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== HEADER WITH ADD BUTTON ===== -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Cash Memo Records</h1>
                <p class="text-sm text-gray-500">Filter, search, view, and manage all cash memo transactions.</p>
            </div>
            <a href="cash_memo.php" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md flex items-center gap-2 transition">
                <i class="fas fa-plus"></i> Add Cash Memo
            </a>
        </div>

        <!-- ===== CASH MEMO RECORDS CARD ===== -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Filters Section -->
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gray-50/50">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 items-end">
                    
                    <!-- Filter Transaction Type -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Transaction Type</label>
                        <select id="filterType" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">All Types</option>
                            <option value="Income">Income</option>
                            <option value="Expense">Expense</option>
                        </select>
                    </div>

                    <!-- Filter Category -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Category</label>
                        <select id="filterCategory" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">All Categories</option>
                            <option value="Salary">Salary</option>
                            <option value="Fees">Fees</option>
                            <option value="Stationery">Stationery</option>
                            <option value="Electric Bill">Electric Bill</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Events">Events</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- From Date -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">From Date</label>
                        <input type="date" id="fromDate" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none" />
                    </div>

                    <!-- To Date -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">To Date</label>
                        <input type="date" id="toDate" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none" />
                    </div>

                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button onclick="applyFilters()" class="memo-btn bg-orange-500 text-white font-bold py-2 px-5 rounded-xl hover:bg-orange-600 text-sm shadow-sm">
                        <i class="fas fa-filter mr-1"></i> Apply Filters
                    </button>
                    <button onclick="resetFilters()" class="memo-btn bg-gray-200 text-gray-700 font-bold py-2 px-5 rounded-xl hover:bg-gray-300 text-sm">
                        <i class="fas fa-undo mr-1"></i> Reset
                    </button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="table-wrap">
                <table class="w-full text-sm text-left border-collapse" id="cashMemoTable">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 font-semibold uppercase text-xs">
                            <th class="px-4 py-4">SR NO</th>
                            <th class="px-4 py-4">MEMO NO</th>
                            <th class="px-4 py-4">TYPE</th>
                            <th class="px-4 py-4">CATEGORY</th>
                            <th class="px-4 py-4">AMOUNT</th>
                            <th class="px-4 py-4">RECEIPT</th>
                            <th class="px-4 py-4">DATE</th>
                            <th class="px-4 py-4 text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="cashMemoTableBody" class="divide-y divide-gray-100">
                        <tr>
                            <td colspan="8" class="text-center py-8 text-gray-400">Loading cash memos...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination Bar (Matched to Employee Records Layout) -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-100 bg-gray-50/50">
                <div class="text-sm text-gray-500 font-semibold">
                    Showing <span id="startEntry">0</span> to <span id="endEntry">0</span> of <span id="totalEntries">0</span> entries
                </div>
                <div class="flex items-center gap-2">
                    <button id="prevPage" onclick="changePage(-1)" class="px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed transition">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </button>
                    <span id="currentPageDisplay" class="px-4 py-2 bg-orange-100 text-orange-800 font-bold rounded-xl">1</span>
                    <button id="nextPage" onclick="changePage(1)" class="px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed transition">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
            </div>

        </div>

    </main>

    <!-- ============================================================ -->
    <!-- EDIT CASH MEMO POPUP MODAL -->
    <!-- ============================================================ -->
    <div id="editMemoModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-gray-100">
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-edit text-orange-500"></i> Edit Cash Memo
                </h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 text-xl font-bold">&times;</button>
            </div>

            <form id="editMemoForm" class="p-6 space-y-4" onsubmit="updateCashMemo(event)">
                <input type="hidden" id="edit_memo_id" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Transaction Type *</label>
                        <select id="edit_transaction_type" onchange="handleEditCategoryDropdown()" class="w-full rounded-xl border border-gray-300 p-2.5 outline-none bg-white">
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Category *</label>
                        <select id="edit_category" onchange="handleEditCategoryChange()" class="w-full rounded-xl border border-gray-300 p-2.5 outline-none bg-white">
                            <!-- Populated dynamically -->
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Cash Memo No *</label>
                        <input type="text" id="edit_cash_memo_no" class="w-full rounded-xl border border-gray-300 p-2.5 outline-none" required />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Amount *</label>
                        <input type="number" step="0.01" id="edit_amount" class="w-full rounded-xl border border-gray-300 p-2.5 outline-none" required />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">From Party</label>
                        <input type="text" id="edit_from_party" class="w-full rounded-xl border border-gray-300 p-2.5 outline-none" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">To Party</label>
                        <input type="text" id="edit_to_party" class="w-full rounded-xl border border-gray-300 p-2.5 outline-none" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Receipt Number</label>
                        <input type="text" id="edit_receipt_number" class="w-full rounded-xl border border-gray-300 p-2.5 outline-none" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Date *</label>
                        <input type="date" id="edit_date" class="w-full rounded-xl border border-gray-300 p-2.5 outline-none" required />
                    </div>
                </div>

                <!-- Conditional Employee Selector for Salary inside Edit Modal -->
                <div id="editEmployeeSection" class="hidden bg-orange-50 p-4 rounded-xl border border-orange-200 space-y-2">
                    <label class="block text-xs font-bold text-orange-700 uppercase">Select Employee for Salary *</label>
                    <select id="edit_employee_id" class="w-full rounded-xl border border-orange-300 p-2.5 outline-none bg-white text-sm">
                        <option value="">Select Employee</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="closeEditModal()" class="px-5 py-2.5 rounded-xl bg-gray-200 text-gray-700 font-bold text-sm">Cancel</button>
                    <button type="submit" id="updateMemoBtn" class="px-6 py-2.5 rounded-xl bg-orange-500 text-white font-bold text-sm hover:bg-orange-600 shadow-sm">
                        Update Cash Memo
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- VIEW SINGLE MEMO DETAILS POPUP MODAL -->
    <!-- ============================================================ -->
    <div id="viewMemoModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-gray-100">
            <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-4">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-eye text-orange-500"></i> Cash Memo Details
                </h3>
                <button onclick="closeViewModal()" class="text-gray-400 hover:text-gray-600 text-xl font-bold">&times;</button>
            </div>
            <div id="viewMemoBody" class="space-y-3 text-sm">
                <!-- Dynamically populated -->
            </div>
            <div class="flex justify-end pt-4 border-t border-gray-100 mt-4">
                <button onclick="closeViewModal()" class="px-5 py-2 rounded-xl bg-gray-200 text-gray-700 font-bold text-sm">Close</button>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <script>
        const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token') || '';
        const cleanBase = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') : 'http://127.0.0.1:8000/api';

        let allMemos = [];
        let filteredMemos = [];
        let currentPage = 1;
        const rowsPerPage = 10;
        let employeesList = [];

        document.addEventListener('DOMContentLoaded', () => {
            if (!token) {
                alert('Session expired. Please log in again.');
                window.location.href = 'login.php';
                return;
            }
            fetchCashMemos();
            fetchEmployeesForDropdown();
        });

        // ============================================================
        // FETCH ALL CASH MEMOS
        // ============================================================
        async function fetchCashMemos() {
            try {
                const res = await fetch(`${cleanBase}/cash-memos`, {
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });
                const result = await res.json();

                if (res.status === 401) {
                    alert('Session expired. Please log in again.');
                    window.location.href = 'login.php';
                    return;
                }
                if (!res.ok) throw new Error(result.message || 'Failed to fetch cash memos.');

                allMemos = result.data || [];
                filteredMemos = [...allMemos];
                currentPage = 1;
                renderTable();

            } catch (err) {
                console.error(err);
                document.getElementById('cashMemoTableBody').innerHTML = `<tr><td colspan="8" class="text-center py-8 text-red-500">${err.message}</td></tr>`;
            }
        }

        // ============================================================
        // FETCH EMPLOYEES FOR EDIT MODAL DROPDOWN
        // ============================================================
        async function fetchEmployeesForDropdown() {
            try {
                const res = await fetch(`${cleanBase}/employees`, {
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });
                const result = await res.json();
                if (res.ok) {
                    employeesList = result.data || result;
                    const editSelect = document.getElementById('edit_employee_id');
                    editSelect.innerHTML = '<option value="">Select Employee</option>' + 
                        employeesList.map(e => `<option value="${e.id}">${e.employee_code} — ${e.employee_name}</option>`).join('');
                }
            } catch (err) {
                console.error('Error fetching employees:', err);
            }
        }

        // ============================================================
        // RENDER TABLE WITH CUSTOM PAGINATION
        // ============================================================
        function renderTable() {
            const tbody = document.getElementById('cashMemoTableBody');
            const totalEntries = filteredMemos.length;
            const totalPages = Math.ceil(totalEntries / rowsPerPage) || 1;

            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const start = (currentPage - 1) * rowsPerPage;
            const end = Math.min(start + rowsPerPage, totalEntries);
            const pageItems = filteredMemos.slice(start, end);

            if (totalEntries === 0) {
                tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-gray-400">No cash memo records found</td></tr>`;
            } else {
                tbody.innerHTML = pageItems.map((item, index) => {
                    const txType = item.transaction_type ? item.transaction_type.toString() : 'Expense';
                    const typeColor = txType.toLowerCase() === 'income' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700';
                    const employeeName = item.employee && item.employee.employee_name ? ` (${item.employee.employee_name})` : '';

                    return `
                        <tr class="table-row-hover transition text-sm">
                            <td class="px-4 py-4 font-semibold text-gray-600">${start + index + 1}</td>
                            <td class="px-4 py-4 font-mono font-bold text-gray-900">${item.cash_memo_no || '—'}</td>
                            <td class="px-4 py-4"><span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase ${typeColor}">${txType}</span></td>
                            <td class="px-4 py-4 font-medium text-gray-800">${item.category || '—'}${employeeName}</td>
                            <td class="px-4 py-4 font-bold text-orange-600">₹ ${parseFloat(item.amount || 0).toFixed(2)}</td>
                            <td class="px-4 py-4 text-gray-600">${item.receipt_number || '—'}</td>
                            <td class="px-4 py-4 text-gray-600">${item.date || '—'}</td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="viewMemo(${item.id})" class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 hover:bg-teal-100 flex items-center justify-center transition" title="View Details">
                                        <i class="fas fa-eye text-xs"></i>
                                    </button>
                                    <button onclick="openEditModal(${item.id})" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition" title="Edit Memo">
                                        <i class="fas fa-pen text-xs"></i>
                                    </button>
                                    <button onclick="deleteMemo(${item.id})" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition" title="Delete Memo">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                }).join('');
            }

            // Update footer pagination info
            document.getElementById('startEntry').textContent = totalEntries ? start + 1 : 0;
            document.getElementById('endEntry').textContent = end;
            document.getElementById('totalEntries').textContent = totalEntries;
            document.getElementById('currentPageDisplay').textContent = currentPage;

            document.getElementById('prevPage').disabled = (currentPage === 1);
            document.getElementById('nextPage').disabled = (currentPage === totalPages || totalEntries === 0);
        }

        // Pagination Click Handler
        function changePage(direction) {
            const totalPages = Math.ceil(filteredMemos.length / rowsPerPage) || 1;
            currentPage += direction;
            if (currentPage < 1) currentPage = 1;
            if (currentPage > totalPages) currentPage = totalPages;
            renderTable();
        }

        // ============================================================
        // FILTERS LOGIC
        // ============================================================
        function applyFilters() {
            const typeFilter = document.getElementById('filterType').value.toLowerCase();
            const categoryFilter = document.getElementById('filterCategory').value;
            const fromDate = document.getElementById('fromDate').value;
            const toDate = document.getElementById('toDate').value;

            filteredMemos = allMemos.filter(item => {
                const itemType = item.transaction_type ? item.transaction_type.toLowerCase() : '';
                if (typeFilter && itemType !== typeFilter) return false;
                if (categoryFilter && item.category !== categoryFilter) return false;
                if (fromDate && item.date < fromDate) return false;
                if (toDate && item.date > toDate) return false;
                return true;
            });

            currentPage = 1;
            renderTable();
        }

        function resetFilters() {
            document.getElementById('filterType').value = '';
            document.getElementById('filterCategory').value = '';
            document.getElementById('fromDate').value = '';
            document.getElementById('toDate').value = '';
            filteredMemos = [...allMemos];
            currentPage = 1;
            renderTable();
        }

        // ============================================================
        // VIEW SINGLE CASH MEMO
        // ============================================================
        async function viewMemo(id) {
            try {
                const res = await fetch(`${cleanBase}/cash-memos/show/${id}`, {
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });
                const result = await res.json();
                if (!res.ok) throw new Error(result.message || 'Failed to fetch details.');

                const memo = result.data;
                const modalBody = document.getElementById('viewMemoBody');
                
                const row = (label, val) => `
                    <div class="flex justify-between border-b border-gray-100 py-2">
                        <span class="text-gray-500 font-semibold w-1/3">${label}</span>
                        <span class="text-gray-900 w-2/3 text-right font-medium">${val || '—'}</span>
                    </div>`;

                modalBody.innerHTML = `
                    ${row('Memo Number', memo.cash_memo_no)}
                    ${row('Transaction Type', memo.transaction_type)}
                    ${row('Category', memo.category)}
                    ${memo.employee ? row('Employee', `${memo.employee.employee_name} (${memo.employee.employee_code})`) : ''}
                    ${row('Amount', '₹ ' + parseFloat(memo.amount).toFixed(2))}
                    ${row('From Party', memo.from_party)}
                    ${row('To Party', memo.to_party)}
                    ${row('Receipt Number', memo.receipt_number)}
                    ${row('Transaction Date', memo.date)}
                `;

                document.getElementById('viewMemoModal').classList.remove('hidden');
            } catch (err) {
                alert(err.message);
            }
        }

        function closeViewModal() {
            document.getElementById('viewMemoModal').classList.add('hidden');
        }

        // ============================================================
        // EDIT MODAL & DYNAMIC CATEGORIES
        // ============================================================
        async function openEditModal(id) {
            try {
                const res = await fetch(`${cleanBase}/cash-memos/show/${id}`, {
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });
                const result = await res.json();
                if (!res.ok) throw new Error(result.message || 'Failed to load memo data.');

                const memo = result.data;
                document.getElementById('edit_memo_id').value = memo.id;
                document.getElementById('edit_transaction_type').value = memo.transaction_type ? memo.transaction_type.toLowerCase() : 'expense';
                
                handleEditCategoryDropdown();
                document.getElementById('edit_category').value = memo.category || '';
                
                document.getElementById('edit_cash_memo_no').value = memo.cash_memo_no || '';
                document.getElementById('edit_amount').value = memo.amount || '';
                document.getElementById('edit_from_party').value = memo.from_party || '';
                document.getElementById('edit_to_party').value = memo.to_party || '';
                document.getElementById('edit_receipt_number').value = memo.receipt_number || '';
                document.getElementById('edit_date').value = memo.date || '';

                handleEditCategoryChange();
                if (memo.employee_id) {
                    document.getElementById('edit_employee_id').value = memo.employee_id;
                }

                document.getElementById('editMemoModal').classList.remove('hidden');
            } catch (err) {
                alert(err.message);
            }
        }

        function closeEditModal() {
            document.getElementById('editMemoModal').classList.add('hidden');
        }

        function handleEditCategoryDropdown() {
            const type = document.getElementById('edit_transaction_type').value;
            const categorySelect = document.getElementById('edit_category');
            categorySelect.innerHTML = '';

            let cats = [];
            if (type === 'income') {
                cats = ['Fees', 'Events', 'Other'];
            } else {
                cats = ['Salary', 'Stationery', 'Electric Bill', 'Transportation', 'Events', 'Other'];
            }

            cats.forEach(c => {
                const opt = document.createElement('option');
                opt.value = c;
                opt.textContent = c;
                categorySelect.appendChild(opt);
            });
            handleEditCategoryChange();
        }

        function handleEditCategoryChange() {
            const category = document.getElementById('edit_category').value;
            const empSection = document.getElementById('editEmployeeSection');
            if (category === 'Salary') {
                empSection.classList.remove('hidden');
            } else {
                empSection.classList.add('hidden');
                document.getElementById('edit_employee_id').value = '';
            }
        }

        // ============================================================
        // UPDATE CASH MEMO API SUBMISSION
        // ============================================================
        async function updateCashMemo(event) {
            event.preventDefault();
            const id = document.getElementById('edit_memo_id').value;
            const category = document.getElementById('edit_category').value;
            const employeeId = document.getElementById('edit_employee_id').value;
            const updateBtn = document.getElementById('updateMemoBtn');

            if (category === 'Salary' && !employeeId) {
                alert('Please select an employee for Salary payment.');
                return;
            }

            const payload = {
                transaction_type: document.getElementById('edit_transaction_type').value.toLowerCase(),
                category: category,
                cash_memo_no: document.getElementById('edit_cash_memo_no').value.trim(),
                amount: document.getElementById('edit_amount').value,
                from_party: document.getElementById('edit_from_party').value.trim(),
                to_party: document.getElementById('edit_to_party').value.trim(),
                receipt_number: document.getElementById('edit_receipt_number').value.trim(),
                date: document.getElementById('edit_date').value,
                employee_id: (category === 'Salary' && employeeId) ? parseInt(employeeId) : null
            };

            try {
                updateBtn.disabled = true;
                updateBtn.textContent = 'Updating...';

                const res = await fetch(`${cleanBase}/cash-memos/update/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const result = await res.json();
                if (!res.ok) {
                    let msg = result.message || 'Failed to update cash memo.';
                    if (result.errors) msg = Object.values(result.errors).flat().join('\n');
                    throw new Error(msg);
                }

                alert(result.message || 'Cash memo updated successfully ✅');
                closeEditModal();
                fetchCashMemos();

            } catch (err) {
                alert(err.message);
            } finally {
                updateBtn.disabled = false;
                updateBtn.textContent = 'Update Cash Memo';
            }
        }

        // ============================================================
        // DELETE CASH MEMO API
        // ============================================================
        async function deleteMemo(id) {
            if (!confirm('Are you sure you want to delete this cash memo record?')) return;

            try {
                const res = await fetch(`${cleanBase}/cash-memos/delete/${id}`, {
                    method: 'DELETE',
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });

                const result = await res.json();
                if (!res.ok) throw new Error(result.message || 'Failed to delete cash memo.');

                alert(result.message || 'Cash memo deleted successfully.');
                fetchCashMemos();
            } catch (err) {
                alert(err.message);
            }
        }
    </script>
</body>

</html>