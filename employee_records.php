<?php
// ============================================================
// Employee Records — List + View Popup + Edit Registration Form (Live API)
// ============================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Records - ERP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        .table-row-hover:hover { background-color: #f8fafc; }
        .table-wrap { overflow-x: auto; }
        
        /* Modal animations */
        .modal-enter { animation: modalIn 0.2s ease; }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.96) translateY(8px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* Custom form styles matching your ERP */
        .form-section-title {
            background-color: #fcf8f2;
            color: #ea580c;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.75rem 1rem;
            border-top: 1px solid #f3f4f6;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .input-icon-wrapper { position: relative; }
        .input-icon-wrapper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 0.875rem;
        }
        .input-icon-wrapper input,
        .input-icon-wrapper select {
            padding-left: 2.25rem;
        }
        /* Disabled input style */
        input:disabled {
            background-color: #f3f4f6;
            color: #6b7280;
            cursor: not-allowed;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 antialiased font-sans">


<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

    <!-- Main Content (List View) -->
    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Employee Records</h1>
                <p class="text-sm text-gray-500">Manage staff records, view details, or edit profiles.</p>
            </div>
            <a href="employee-registration.php" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md flex items-center gap-2 transition">
                <i class="fas fa-plus"></i> Add Employee
            </a>
        </div>

        <!-- Data Table Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            
            <!-- Filters -->
            <div class="p-4 border-b border-gray-100 flex flex-wrap gap-4 items-center justify-between bg-gray-50">
                <div class="flex gap-4 w-full md:w-auto">
                    <div class="relative w-full md:w-64">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input type="text" id="searchInput" oninput="triggerSearch(this.value)" placeholder="Search Name or ID..." class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none">                    </div>
                    <select id="roleFilter" class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:border-orange-500 outline-none bg-white">
                        <option value="">All Designations</option>
                        <!-- Populated dynamically -->
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="table-wrap">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 font-semibold uppercase text-xs">
                        <tr>
                            <th class="px-4 py-4">PROFILE</th>
                            <th class="px-4 py-4">EMP ID</th>
                            <th class="px-4 py-4">NAME</th>
                            <th class="px-4 py-4">DESIGNATION</th>
                            <th class="px-4 py-4">MOBILE</th>
                            <th class="px-4 py-4">JOINING DATE</th>
                            <th class="px-4 py-4">STATUS</th>
                            <th class="px-4 py-4 text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="employeeTableBody" class="divide-y divide-gray-100">
                        <tr><td colspan="8" class="text-center py-8 text-gray-400">Loading employee records...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- ============================================================ -->
    <!-- MODAL 1: VIEW EMPLOYEE DETAILS (Read-only popup) -->
    <!-- ============================================================ -->
    <div id="viewModal" class="hidden fixed inset-0 z-[9998] bg-black/50 backdrop-blur-sm overflow-y-auto">
        <div class="min-h-full flex items-start justify-center p-4 sm:p-6">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl modal-enter my-6">
                
                <!-- Header -->
                <div class="flex items-center justify-between gap-3 px-6 py-4 border-b border-gray-100 bg-blue-50 rounded-t-2xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-500 text-white flex items-center justify-center">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg">Employee Details</h3>
                            <p class="text-xs text-gray-500">Full profile overview</p>
                        </div>
                    </div>
                    <button onclick="closeViewModal()" class="w-8 h-8 rounded-lg hover:bg-blue-200 text-gray-600 flex items-center justify-center transition">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Body -->
                <div id="viewModalBody" class="p-6 space-y-6 text-sm"></div>

                <!-- Footer -->
                <div class="flex justify-end gap-2 px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
                    <button onclick="closeViewModal()" class="px-5 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- MODAL 2: REGISTRATION FORM (Used for Add & Edit) -->
    <!-- ============================================================ -->
    <div id="employeeModal" class="hidden fixed inset-0 z-[9998] bg-black/50 backdrop-blur-sm overflow-y-auto">
        <div class="min-h-full flex items-start justify-center p-4 sm:p-6">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl modal-enter my-6 overflow-hidden">
                
                <!-- Header -->
                <div class="flex items-center justify-between gap-3 px-6 py-4 border-b border-gray-200">
                    <h3 id="modalTitle" class="font-bold text-gray-900 text-lg flex items-center gap-2">
                        <i class="fas fa-user-plus text-orange-500"></i> Employee Registration
                    </h3>
                    <button onclick="closeEmployeeModal()" class="text-gray-400 hover:text-gray-600 transition">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Form Body -->
                <form id="employeeModalForm" class="space-y-0" novalidate>
                    <input type="hidden" id="m_id" />
                    <div id="m_errorBanner" class="hidden m-4 bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 text-sm"></div>

                    <!-- Basic Info Section -->
                    <div class="form-section-title">
                        <i class="fas fa-id-card"></i> Basic Information
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5 bg-white">
                        
                        <!-- Read-only Employee ID (Only shows on Edit) -->
                        <div id="empIdWrapper" class="hidden">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Employee Code</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-hashtag"></i>
                                <input type="text" id="m_employee_id" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 outline-none" disabled>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Employee Name <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" id="m_name" placeholder="Enter full name" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none">
                            </div>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Profile Photo <span class="text-xs text-gray-400">(JPG/PNG, max 2MB)</span></label>
                            <div class="flex items-center gap-4">
                                <img id="m_photo_preview" src="https://ui-avatars.com/api/?name=New&background=f3f4f6&color=9ca3af" class="w-12 h-12 rounded-full object-cover border border-gray-200">
                                <input type="file" id="m_photo" accept="image/jpeg,image/png,image/jpg" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 cursor-pointer" onchange="previewImage(event)">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Gender <span class="text-red-500">*</span></label>
                            <div class="flex gap-6 py-2">
                                <label class="inline-flex items-center gap-2 text-sm cursor-pointer"><input type="radio" name="m_gender" value="Male" class="accent-orange-500 w-4 h-4"> Male</label>
                                <label class="inline-flex items-center gap-2 text-sm cursor-pointer"><input type="radio" name="m_gender" value="Female" class="accent-orange-500 w-4 h-4"> Female</label>
                                <label class="inline-flex items-center gap-2 text-sm cursor-pointer"><input type="radio" name="m_gender" value="Other" class="accent-orange-500 w-4 h-4"> Other</label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Date of Birth <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-calendar-alt"></i>
                                <input type="date" id="m_dob" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none text-gray-700">
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details Section -->
                    <div class="form-section-title mt-2">
                        <i class="fas fa-address-book"></i> Contact Details
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5 bg-white">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Mobile Number <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-phone"></i>
                                <input type="tel" id="m_mobile" maxlength="10" placeholder="Enter 10-digit number" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-envelope"></i>
                                <input type="email" id="m_email" placeholder="name@example.com" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none">
                            </div>
                        </div>
                       <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Address <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper relative">
                                <i class="fas fa-map-marker-alt absolute text-gray-400" style="top: 20px;"></i>
                                <textarea id="m_address" rows="2" placeholder="Enter complete residential address" class="w-full pl-9 pr-3 py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none resize-none"></textarea>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">City <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-city"></i>
                                <input type="text" id="m_city" placeholder="Enter city" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">State <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-map"></i>
                                <input type="text" id="m_state" placeholder="Enter state name" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">PIN Code <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-map-pin"></i>
                                <input type="text" id="m_pin" maxlength="6" placeholder="6-digit PIN" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none">
                            </div>
                        </div>
                    </div>

                    <!-- Job Details Section -->
                    <div class="form-section-title mt-2">
                        <i class="fas fa-briefcase"></i> Job Details
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5 bg-white">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Designation <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-user-tie"></i>
                                <select id="m_designation" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none bg-white">
                                    <option value="">Select Designation</option>
                                    <!-- Populated dynamically -->
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Date of Joining <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-calendar-check"></i>
                                <input type="date" id="m_doj" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none text-gray-700">
                            </div>
                        </div>
                    </div>

                    <!-- Additional Details Section -->
                    <div class="form-section-title mt-2">
                        <i class="fas fa-info-circle"></i> Additional Details
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5 bg-white pb-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5 flex justify-between">
                                <span>Emergency Contact <span class="text-xs text-gray-400 font-normal">(Optional)</span></span>
                            </label>
                            <div class="input-icon-wrapper">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 text-sm font-medium">+91</span>
                                <input type="tel" id="m_emergency" maxlength="10" placeholder="Enter 10-digit number" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none" style="padding-left: 3rem;">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Employee Status <span class="text-red-500">*</span></label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-toggle-on"></i>
                                <select id="m_status" class="w-full py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none bg-white">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Footer -->
                <div class="flex justify-end gap-3 px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <button type="button" onclick="closeEmployeeModal()" class="px-5 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 font-semibold transition shadow-sm">
                        Cancel
                    </button>
                    <button type="button" id="saveEmployeeBtn" onclick="saveEmployee()" class="px-6 py-2 bg-orange-500 text-white text-sm font-semibold rounded-lg hover:bg-orange-600 flex items-center gap-2 shadow-sm transition">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
<script src="url.js"></script>

<script>
    'use strict';

    // 1. Token & Base URL Configuration with fallback
    const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');
    if (!token) {
        alert('Session expired. Please log in again.');
        window.location.href = 'login.php';
    }

    // Fallback to direct URL if url.js hasn't loaded properly
    const cleanBase = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') : 'http://127.0.0.1:8000/api';
    const storageRoot = cleanBase.replace(/\/api$/, '');

    console.log("ERP Loaded. API Base URL:", cleanBase);

    let designations = [];
    const tbody = document.getElementById('employeeTableBody');
    const employeeModal = document.getElementById('employeeModal');
    const viewModal = document.getElementById('viewModal');

    function resolvePhoto(path, name = 'Staff') {
        if (!path) return `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=f3f4f6&color=9ca3af`;
        if (/^https?:\/\//i.test(path)) return path;
        const clean = path.replace(/^\/+/, '');
        return `${storageRoot}/storage/${clean}`;
    }

    // 2. Direct Search Trigger (Connected via oninput in HTML)
    let searchTimer;
    function triggerSearch(val) {
        console.log("Search input triggered with value:", val);
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
            fetchEmployees();
        }, 300); // 300ms debounce
    }

    // 3. Fetch Designations for dropdowns
    async function fetchDesignations() {
        try {
            const res = await fetch(`${cleanBase}/designations`, {
                headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
            });
            const result = await res.json();
            if (res.ok) {
                designations = result.data || result;
                
                const modalSelect = document.getElementById('m_designation');
                if (modalSelect) {
                    modalSelect.innerHTML = '<option value="">Select Designation</option>' + 
                        designations.map(d => `<option value="${d.id}">${d.name || d.designation_name}</option>`).join('');
                }

                const roleFilter = document.getElementById('roleFilter');
                if (roleFilter) {
                    roleFilter.innerHTML = '<option value="">All Designations</option>' + 
                        designations.map(d => `<option value="${d.id}">${d.name || d.designation_name}</option>`).join('');
                }
            }
        } catch (err) {
            console.error('Failed to load designations:', err);
        }
    }

    // 4. Fetch or Search Employees via Backend API
    async function fetchEmployees() {
        const searchInput = document.getElementById('searchInput');
        const roleFilter = document.getElementById('roleFilter');

        const queryVal = searchInput ? searchInput.value.trim() : '';
        const desigVal = roleFilter ? roleFilter.value : '';

        const params = new URLSearchParams();
        if (queryVal) params.append('q', queryVal);
        if (desigVal) params.append('designation_id', desigVal);

        const endpoint = `${cleanBase}/employees/search${params.toString() ? '?' + params.toString() : ''}`;
        console.log("Fetching from endpoint:", endpoint);

        try {
            const res = await fetch(endpoint, {
                headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
            });

            console.log("Response status:", res.status);

            if (res.status === 401) {
                alert('Session expired. Please log in again.');
                window.location.href = 'login.php';
                return;
            }

            const result = await res.json();
            console.log("API Response Data:", result);

            if (res.ok) {
                renderTable(result.data || []);
            } else {
                if (tbody) tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-red-500">${result.message || 'Failed to load records.'}</td></tr>`;
            }
        } catch (err) {
            console.error('Fetch employees network error:', err);
            if (tbody) tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-red-500">Network error while loading records. Check console.</td></tr>`;
        }
    }

    // 5. Render Table
    function renderTable(employees) {
        if (!tbody) return;
        if (employees.length === 0) {
            tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-gray-500">No employee records found</td></tr>`;
            return;
        }

        tbody.innerHTML = employees.map(item => {
            const statusColor = item.employee_status === 'Active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600';
            const designationName = item.designation?.name || item.designation?.designation_name || '—';
            const photoUrl = resolvePhoto(item.profile_photo, item.employee_name);
            
            return `
                <tr class="table-row-hover transition">
                    <td class="px-4 py-3">
                        <img src="${photoUrl}" alt="${item.employee_name}" class="w-10 h-10 rounded-full object-cover border border-gray-200 shadow-sm" onerror="this.src='https://ui-avatars.com/api/?name=${encodeURIComponent(item.employee_name)}'">
                    </td>
                    <td class="px-4 py-3 font-mono font-semibold text-gray-800">${item.employee_code || '—'}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">${item.employee_name}</td>
                    <td class="px-4 py-3"><span class="bg-orange-100 text-orange-700 px-2.5 py-1 rounded-full text-xs font-semibold">${designationName}</span></td>
                    <td class="px-4 py-3">${item.mobile_number}</td>
                    <td class="px-4 py-3">${formatDate(item.date_of_joining)}</td>
                    <td class="px-4 py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold ${statusColor}">${item.employee_status}</span></td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="viewEmployee(${item.id})" class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 hover:bg-teal-100 flex items-center justify-center transition" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="editEmployee(${item.id})" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition" title="Edit Full Details">
                                <i class="fas fa-pen"></i>
                            </button>
                            <button onclick="deleteEmployee(${item.id})" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        }).join('');
    }

    // 6. Initial Load on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', () => {
        const roleFilter = document.getElementById('roleFilter');
        if (roleFilter) {
            roleFilter.addEventListener('change', fetchEmployees);
        }

        fetchDesignations();
        fetchEmployees();
    });

    // View Modal Logic
    function viewEmployee(id) {
        fetch(`${cleanBase}/employees/${id}`, {
            headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
        })
        .then(res => res.json())
        .then(result => {
            if (!result.data) return;
            const emp = result.data;
            const row = (label, val) => `
                <div class="flex justify-between border-b border-gray-100 py-2.5">
                    <span class="text-gray-500 font-semibold w-1/3">${label}</span>
                    <span class="text-gray-900 w-2/3 text-right sm:text-left">${val || '—'}</span>
                </div>`;

            const designationName = emp.designation?.name || emp.designation?.designation_name || '—';

            document.getElementById('viewModalBody').innerHTML = `
                <div class="flex items-center gap-4 bg-orange-50 p-4 rounded-xl mb-4 border border-orange-100">
                    <img src="${resolvePhoto(emp.profile_photo, emp.employee_name)}" class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm">
                    <div>
                        <h4 class="font-bold text-lg text-gray-900">${emp.employee_name}</h4>
                        <p class="text-sm text-gray-600">${designationName} • ${emp.employee_code}</p>
                    </div>
                    <span class="ml-auto px-3 py-1 rounded-full text-xs font-bold ${emp.employee_status === 'Active' ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-700'}">${emp.employee_status}</span>
                </div>

                <h5 class="text-xs font-bold text-orange-600 uppercase tracking-wider mb-2">Contact Information</h5>
                ${row('Mobile', emp.mobile_number)}
                ${row('Email', emp.email)}
                ${row('Emergency No.', emp.emergency_contact)}
                ${row('Address', emp.address)}
                ${row('City / State', `${emp.city}, ${emp.state}`)}
                ${row('PIN Code', emp.pin_code)}

                <h5 class="text-xs font-bold text-orange-600 uppercase tracking-wider mt-5 mb-2">Job Information</h5>
                ${row('Designation', designationName)}
                ${row('Joining Date', formatDate(emp.date_of_joining))}
                ${row('Gender', emp.gender)}
                ${row('Date of Birth', formatDate(emp.date_of_birth))}
            `;

            viewModal.classList.remove('hidden');
        });
    }

    function closeViewModal() { viewModal.classList.add('hidden'); }

    function openAddModal() {
        document.getElementById('modalTitle').innerHTML = '<i class="fas fa-user-plus text-orange-500"></i> Employee Registration';
        document.getElementById('employeeModalForm').reset();
        document.getElementById('m_id').value = '';
        document.getElementById('empIdWrapper').classList.add('hidden');
        document.querySelectorAll('input[name="m_gender"]').forEach(r => r.checked = false);
        document.getElementById('m_status').value = 'Active';
        document.getElementById('m_photo_preview').src = 'https://ui-avatars.com/api/?name=New&background=f3f4f6&color=9ca3af';
        document.getElementById('m_errorBanner').classList.add('hidden');
        employeeModal.classList.remove('hidden');
    }

    function editEmployee(id) {
        fetch(`${cleanBase}/employees/${id}`, {
            headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
        })
        .then(res => res.json())
        .then(result => {
            if (!result.data) return;
            const emp = result.data;
            
            document.getElementById('modalTitle').innerHTML = '<i class="fas fa-user-edit text-orange-500"></i> Edit Employee Details';
            document.getElementById('empIdWrapper').classList.remove('hidden');
            document.getElementById('m_employee_id').value = emp.employee_code || '';

            document.getElementById('m_id').value = emp.id;
            document.getElementById('m_name').value = emp.employee_name || '';
            
            const genderRadio = document.querySelector(`input[name="m_gender"][value="${emp.gender}"]`);
            if (genderRadio) genderRadio.checked = true;
            
            document.getElementById('m_dob').value = emp.date_of_birth ? emp.date_of_birth.split('T')[0] : '';
            document.getElementById('m_mobile').value = emp.mobile_number || '';
            document.getElementById('m_email').value = emp.email || '';
            document.getElementById('m_address').value = emp.address || '';
            document.getElementById('m_city').value = emp.city || '';
            document.getElementById('m_state').value = emp.state || '';
            document.getElementById('m_pin').value = emp.pin_code || '';
            document.getElementById('m_emergency').value = emp.emergency_contact || '';
            document.getElementById('m_designation').value = emp.designation_id || '';
            document.getElementById('m_doj').value = emp.date_of_joining ? emp.date_of_joining.split('T')[0] : '';
            document.getElementById('m_status').value = emp.employee_status || 'Active';
            
            document.getElementById('m_photo_preview').src = resolvePhoto(emp.profile_photo, emp.employee_name);
            document.getElementById('m_photo').value = ''; 
            
            document.getElementById('m_errorBanner').classList.add('hidden');
            employeeModal.classList.remove('hidden');
        });
    }

    function closeEmployeeModal() { employeeModal.classList.add('hidden'); }

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('m_photo_preview').src = URL.createObjectURL(file);
        }
    }

    async function saveEmployee() {
        const idVal = document.getElementById('m_id').value;
        const banner = document.getElementById('m_errorBanner');
        banner.classList.add('hidden');

        const name = document.getElementById('m_name').value.trim();
        const gender = document.querySelector('input[name="m_gender"]:checked')?.value || '';
        const dob = document.getElementById('m_dob').value;
        const mobile = document.getElementById('m_mobile').value.trim();
        const email = document.getElementById('m_email').value.trim();
        const address = document.getElementById('m_address').value.trim();
        const city = document.getElementById('m_city').value.trim();
        const state = document.getElementById('m_state').value.trim();
        const pin = document.getElementById('m_pin').value.trim();
        const designation = document.getElementById('m_designation').value;
        const doj = document.getElementById('m_doj').value;
        const emergency = document.getElementById('m_emergency').value.trim();
        const status = document.getElementById('m_status').value;
        const photoFile = document.getElementById('m_photo').files[0];

        if (!name || !gender || !dob || !mobile || !email || !address || !city || !state || !pin || !designation || !doj) {
            banner.textContent = 'Please fill all required (*) fields.';
            banner.classList.remove('hidden');
            return;
        }

        const formData = new FormData();
        formData.append('employee_name', name);
        formData.append('gender', gender);
        formData.append('date_of_birth', dob);
        formData.append('mobile_number', mobile);
        formData.append('email', email);
        formData.append('address', address);
        formData.append('city', city);
        formData.append('state', state);
        formData.append('pin_code', pin);
        formData.append('designation_id', designation);
        formData.append('date_of_joining', doj);
        formData.append('employee_status', status);
        
        if (emergency) formData.append('emergency_contact', emergency);
        if (photoFile) formData.append('profile_photo', photoFile);

        const saveBtn = document.getElementById('saveEmployeeBtn');
        saveBtn.disabled = true;
        saveBtn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Saving...`;

        try {
            let endpoint = `${cleanBase}/employees`;
            let method = 'POST';

            if (idVal) {
                endpoint = `${cleanBase}/employees/${idVal}`;
                formData.append('_method', 'PUT'); 
            }

            const res = await fetch(endpoint, {
                method: method,
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const result = await res.json();

            if (!res.ok) {
                let errorMsg = result.message || 'Failed to save employee.';
                if (result.errors) {
                    errorMsg = Object.values(result.errors).flat().join('\n');
                }
                throw new Error(errorMsg);
            }

            alert(result.message || 'Employee saved successfully!');
            closeEmployeeModal();
            fetchEmployees();

        } catch (err) {
            console.error('Save error:', err);
            banner.textContent = err.message;
            banner.classList.remove('hidden'); // Fixed: was classList.add('hidden')
        } finally {
            saveBtn.disabled = false;
            saveBtn.innerHTML = `<i class="fas fa-save"></i> Save`;
        }
    }

    async function deleteEmployee(id) {
        if (!confirm('Are you sure you want to delete this employee record?')) return;

        try {
            const res = await fetch(`${cleanBase}/employees/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            const result = await res.json();
            if (!res.ok) throw new Error(result.message || 'Failed to delete employee.');

            alert(result.message || 'Employee deleted successfully.');
            fetchEmployees();
        } catch (err) {
            console.error('Delete error:', err);
            alert(err.message || 'Error deleting employee record.');
        }
    }

    function formatDate(d) {
        if (!d) return '—';
        const date = new Date(d);
        if (isNaN(date)) return d;
        return `${String(date.getDate()).padStart(2, '0')}-${String(date.getMonth() + 1).padStart(2, '0')}-${date.getFullYear()}`;
    }

    window.viewEmployee = viewEmployee;
    window.editEmployee = editEmployee;
    window.deleteEmployee = deleteEmployee;
    window.openAddModal = openAddModal;
    window.closeViewModal = closeViewModal;
    window.closeEmployeeModal = closeEmployeeModal;
    window.saveEmployee = saveEmployee;
    window.previewImage = previewImage;
</script>
</body>
</html>