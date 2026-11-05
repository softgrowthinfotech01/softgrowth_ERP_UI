<?php
// ============================================================
// Cash Memo — ERP with Fixed Employee Payload Handling
// ============================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cash Memo - ERP</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        .submit-btn {
            transition: all 0.2s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(15, 118, 110, 0.25);
        }
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-8 transition-all duration-200">

        <!-- CASH MEMO CARD -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900">Cash Memo</h2>
                    <p class="text-sm text-gray-500">Record income and expense transactions</p>
                </div>
            </div>

            <!-- Form -->
            <form id="cashMemoForm" class="p-6 space-y-5">

                <!-- Success Banner Notification -->
                <div id="successBanner" class="hidden bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 text-sm flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-500 text-lg"></i>
                    <div>
                        <span class="font-bold">Success!</span> <span id="successMessageText">Cash Memo Added Successfully.</span>
                    </div>
                </div>

                <!-- Error Banner Notification -->
                <div id="errorBanner" class="hidden bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 text-sm flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                    <div>
                        <span class="font-bold">Error!</span> <span id="errorMessageText">Please fill all mandatory fields.</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <!-- Transaction Type -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Transaction Type <span class="text-red-500">*</span></label>
                        <select id="transaction_type"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2.5 px-4 outline-none">
                            <option value="">Select Type</option>
                            <option value="Income">Income</option>
                            <option value="Expense">Expense</option>
                        </select>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Category <span class="text-red-500">*</span></label>
                        <select id="category" onchange="handleCategoryChange()"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2.5 px-4 outline-none">
                            <option value="">Select Category</option>
                            <option value="Salary">Salary</option>
                            <option value="Fees">Fees</option>
                            <option value="Stationery">Stationery</option>
                            <option value="Electric Bill">Electric Bill</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Events">Events</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Cash Memo No -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Cash Memo No <span class="text-red-500">*</span></label>
                        <input type="text" id="cash_memo_no" placeholder="Enter cash memo no"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2.5 px-4 outline-none" />
                    </div>

                </div>

                <!-- ============================================================ -->
                <!-- COMPACT CONDITIONAL EMPLOYEE SALARY SECTION (Shows only when Salary) -->
                <!-- ============================================================ -->
                <div id="employeeSalarySection" class="hidden bg-orange-50/60 border border-orange-200 p-4 rounded-2xl">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                        
                        <!-- Search Box Input -->
                        <div class="w-full md:w-1/2 relative">
                            <label class="block text-xs font-bold uppercase tracking-wider text-orange-700 mb-1">
                                <i class="fas fa-user-tie mr-1"></i> Select Employee (Search Name / ID) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="text" id="employeeSearchInput" oninput="searchEmployeesDropdown(this.value)" placeholder="Type name or EMP ID..." 
                                    class="w-full pl-9 pr-4 py-2 rounded-xl border border-orange-300 bg-white shadow-sm focus:border-orange-500 focus:ring-orange-500 outline-none text-sm" />
                            </div>
                            <!-- Suggestions Dropdown List -->
                            <div id="employeeDropdownList" class="hidden absolute z-50 left-0 right-0 mt-1 bg-white border border-gray-200 rounded-xl shadow-lg max-h-40 overflow-y-auto"></div>
                            <input type="hidden" id="selected_employee_id" />
                        </div>

                        <!-- Compact Cross-Check Info Card -->
                        <div id="employeeCrossCheckCard" class="hidden w-full md:w-1/2 bg-white p-3 rounded-xl border border-orange-200 shadow-sm flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xs" id="empInitials">HW</div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-xs" id="summaryEmpName">—</h4>
                                    <p class="text-[11px] text-gray-500">ID: <span class="font-mono font-semibold text-gray-700" id="summaryEmpCode">—</span> | Mobile: <span id="summaryEmpMobile">—</span></p>
                                </div>
                            </div>
                            <button type="button" onclick="clearSelectedEmployee()" class="text-red-500 hover:text-red-700 text-xs font-semibold px-2.5 py-1 rounded-lg bg-red-50 hover:bg-red-100 transition">
                                <i class="fas fa-times"></i> Change
                            </button>
                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <!-- From -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">From <span class="text-red-500">*</span></label>
                        <input type="text" id="from_party" placeholder="Enter sender / source"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2.5 px-4 outline-none" />
                    </div>

                    <!-- To -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">To <span class="text-red-500">*</span></label>
                        <input type="text" id="to_party" placeholder="Enter receiver / destination"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2.5 px-4 outline-none" />
                    </div>

                    <!-- Amount -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Amount <span class="text-red-500">*</span></label>
                        <input type="number" id="amount" min="0" step="0.01" placeholder="Enter amount"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2.5 px-4 outline-none" />
                    </div>

                    <!-- Receipt Number -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Receipt Number <span class="text-gray-400 font-normal">(Optional)</span></label>
                        <input type="text" id="receipt_number" placeholder="Enter receipt number"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2.5 px-4 outline-none" />
                    </div>

                    <!-- Date -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Date <span class="text-red-500">*</span></label>
                        <input type="date" id="date"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2.5 px-4 outline-none" />
                    </div>

                </div>

                <!-- Submit -->
                <div class="flex justify-center pt-4">
                    <button type="button" id="submitMemoBtn"
                        class="submit-btn bg-orange-500 text-white font-bold py-3 px-8 rounded-xl shadow-md hover:bg-orange-600 focus:ring-2 focus:ring-teal-300 flex items-center gap-2"
                        onclick="saveCashMemo(event)">
                        <i class="fas fa-check-circle"></i> Submit Cash Memo
                    </button>
                </div>

            </form>
        </div>
    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

  <script>
    const token = localStorage.getItem('token') || localStorage.getItem('auth_token');
    const cleanBase = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') : 'http://127.0.0.1:8000/api';

    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('date');
        if (dateInput) {
            dateInput.value = new Date().toISOString().split('T')[0];
        }

        // Attach listener for transaction type change
        document.getElementById('transaction_type').addEventListener('change', handleTransactionTypeChange);
    });

    function showBanner(type, message) {
        const successBanner = document.getElementById('successBanner');
        const errorBanner = document.getElementById('errorBanner');

        if (type === 'success') {
            document.getElementById('successMessageText').textContent = message;
            successBanner.classList.remove('hidden');
            errorBanner.classList.add('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });

            setTimeout(() => {
                successBanner.classList.add('hidden');
            }, 5000);
        } else {
            document.getElementById('errorMessageText').textContent = message;
            errorBanner.classList.remove('hidden');
            successBanner.classList.add('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    // ============================================================
    // DYNAMIC CATEGORY FILTERING BASED ON TRANSACTION TYPE
    // ============================================================
    function handleTransactionTypeChange() {
        const type = document.getElementById('transaction_type').value;
        const categorySelect = document.getElementById('category');
        
        // Reset category and employee selection
        categorySelect.innerHTML = '<option value="">Select Category</option>';
        document.getElementById('employeeSalarySection').classList.add('hidden');
        clearSelectedEmployee();

        let categories = [];
        if (type === 'Income') {
            categories = ['Fees', 'Events', 'Other'];
        } else if (type === 'Expense') {
            categories = ['Salary', 'Stationery', 'Electric Bill', 'Transportation', 'Events', 'Other'];
        }

        categories.forEach(cat => {
            const opt = document.createElement('option');
            opt.value = cat;
            opt.textContent = cat;
            categorySelect.appendChild(opt);
        });
    }

    function handleCategoryChange() {
        const category = document.getElementById('category').value;
        const salarySection = document.getElementById('employeeSalarySection');

        if (category === 'Salary') {
            salarySection.classList.remove('hidden');
        } else {
            salarySection.classList.add('hidden');
            clearSelectedEmployee();
        }
    }

    // ============================================================
    // EMPLOYEE SEARCH & AUTOCOMPLETE LOGIC
    // ============================================================
    let searchTimeout;
    async function searchEmployeesDropdown(query) {
        clearTimeout(searchTimeout);
        const dropdown = document.getElementById('employeeDropdownList');

        if (!query || query.trim().length === 0) {
            dropdown.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(async () => {
            try {
                const res = await fetch(`${cleanBase}/employees/search?q=${encodeURIComponent(query)}`, {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                const result = await res.json();

                if (res.ok && result.data && result.data.length > 0) {
                    dropdown.innerHTML = result.data.map(emp => `
                        <div onclick="selectEmployee(${emp.id}, '${encodeURIComponent(emp.employee_name)}', '${emp.employee_code}', '${emp.mobile_number}')"
                            class="p-2.5 hover:bg-orange-50 cursor-pointer border-b border-gray-100 flex justify-between items-center text-xs">
                            <div>
                                <span class="font-bold text-gray-900">${emp.employee_name}</span>
                                <span class="text-gray-500 ml-1">(${emp.mobile_number || 'No mobile'})</span>
                            </div>
                            <span class="font-mono bg-orange-100 text-orange-700 px-2 py-0.5 rounded font-semibold">${emp.employee_code}</span>
                        </div>
                    `).join('');
                    dropdown.classList.remove('hidden');
                } else {
                    dropdown.innerHTML = `<div class="p-3 text-xs text-gray-400 text-center">No employee found</div>`;
                    dropdown.classList.remove('hidden');
                }
            } catch (err) {
                console.error('Employee search error:', err);
            }
        }, 300);
    }

    function selectEmployee(id, encodedName, code, mobile) {
        const name = decodeURIComponent(encodedName);
        document.getElementById('selected_employee_id').value = id;
        document.getElementById('employeeSearchInput').value = `${code} — ${name}`;
        document.getElementById('employeeDropdownList').classList.add('hidden');

        document.getElementById('summaryEmpName').textContent = name;
        document.getElementById('summaryEmpCode').textContent = code;
        document.getElementById('summaryEmpMobile').textContent = mobile || '—';
        document.getElementById('empInitials').textContent = name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();

        document.getElementById('employeeCrossCheckCard').classList.remove('hidden');
        document.getElementById('to_party').value = name;
    }

    function clearSelectedEmployee() {
        document.getElementById('selected_employee_id').value = '';
        document.getElementById('employeeSearchInput').value = '';
        document.getElementById('employeeCrossCheckCard').classList.add('hidden');
        document.getElementById('to_party').value = '';
    }

    // ============================================================
    // SAVE CASH MEMO VIA API
    // ============================================================
    async function saveCashMemo(event) {
        event.preventDefault();
        const submitBtn = document.getElementById('submitMemoBtn');

        try {
            const category = document.getElementById("category").value;
            const rawEmployeeId = document.getElementById("selected_employee_id").value;
            const transactionType = document.getElementById("transaction_type").value;

            if (!transactionType) {
                showBanner('error', 'Please select a transaction type.');
                return;
            }

            if (category === 'Salary' && !rawEmployeeId) {
                showBanner('error', 'Please select an employee for the salary payment.');
                return;
            }

            const data = {
                transaction_type: transactionType.toLowerCase(), // matches backend 'income' / 'expense'
                category: category,
                from_party: document.getElementById("from_party").value.trim(),
                to_party: document.getElementById("to_party").value.trim(),
                cash_memo_no: document.getElementById("cash_memo_no").value.trim(),
                amount: document.getElementById("amount").value,
                receipt_number: document.getElementById("receipt_number").value.trim(),
                date: document.getElementById("date").value,
                employee_id: (category === 'Salary' && rawEmployeeId) ? parseInt(rawEmployeeId) : null
            };

            if (!data.transaction_type || !data.category || !data.from_party || !data.to_party || !data.cash_memo_no || !data.amount || !data.date) {
                showBanner('error', 'Please fill all mandatory fields marked with *.');
                return;
            }

            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i class="fas fa-spinner fa-spin mr-2"></i> Submitting...`;

            const response = await fetch(cleanBase + "/cash-memos/store", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "Authorization": "Bearer " + token
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                showBanner('success', result.message || 'Cash Memo Added Successfully ✅');
                document.getElementById("cashMemoForm").reset();
                document.getElementById("date").value = new Date().toISOString().split('T')[0];
                handleTransactionTypeChange(); // reset categories
            } else {
                let errMsg = result.message || 'Failed to record cash memo.';
                if (result.errors) {
                    errMsg = Object.values(result.errors).flat().join(', ');
                }
                showBanner('error', errMsg);
            }

        } catch (error) {
            console.error(error);
            showBanner('error', 'Server error while saving cash memo.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = `<i class="fas fa-check-circle mr-2"></i> Submit Cash Memo`;
        }
    }
</script>

</body>

</html>