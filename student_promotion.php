<?php
// ============================================================
// Student Promotion & Detainment — ERP System
// ============================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Promotion - ERP</title>
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

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== STUDENT PROMOTION CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Heading & Top Action Toolbar -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between p-6 border-b border-gray-200 bg-white gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl">
                        <i class="fas fa-level-up-alt"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-900">Student Promotion & Detainment</h2>
                        <p class="text-sm text-gray-500 mt-1">Promote selected students to the next class while retaining unchecked students in their current class</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 flex-wrap">
                    <button type="button" id="promoteSelectedBtn" class="toolbar-btn px-5 py-2.5 bg-orange-500 text-white text-xs font-bold rounded-xl hover:bg-orange-600 shadow-sm flex items-center gap-2">
                        <i class="fas fa-check-circle"></i> Promote Selected
                    </button>
                </div>
            </div>

            <!-- Warning Banner Above Filter -->
            <div class="px-4 sm:px-6 pt-4">
                <div class="bg-amber-50 border border-amber-300 text-amber-900 rounded-xl p-3.5 text-xs sm:text-sm flex items-start gap-3">
                    <i class="fas fa-exclamation-triangle text-amber-600 text-base mt-0.5 flex-shrink-0"></i>
                    <div>
                        <span class="font-bold">Important Promotion Rule:</span>
                        <span class="font-semibold text-emerald-700">Checked students</span> will be <strong>promoted</strong> to the selected Target Class &amp; Academic Year, while
                        <span class="font-semibold text-rose-700">unchecked students</span> will <strong>repeat / be retained</strong> in their Current Class. Please review your checkboxes carefully before clicking <strong>Promote Selected</strong>.
                    </div>
                </div>
            </div>

            <!-- Filter & Selection Bar -->
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gray-50/50 mt-3">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                    
                    <!-- Current Academic Year -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Current Academic Year <span class="text-red-500">*</span></label>
                        <select id="filterCurrentYear" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">Select Academic Year</option>
                            <option value="2025-26" selected>2025-26</option>
                            <option value="2026-27">2026-27</option>
                        </select>
                    </div>

                    <!-- Current Class Filter -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Current Class <span class="text-red-500">*</span></label>
                        <select id="filterCurrentClass" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">Select Class</option>
                            <option value="BBA sem 1">BBA sem 1</option>
                            <option value="BBA sem 2">BBA sem 2</option>
                            <option value="BCA FY">BCA FY</option>
                            <option value="BCA SY">BCA SY</option>
                        </select>
                    </div>

                    <!-- Target Next Class -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Target Promotion Class <span class="text-red-500">*</span></label>
                        <select id="filterTargetClass" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">Select Next Class</option>
                            <option value="BBA sem 2">BBA sem 2</option>
                            <option value="BBA sem 3">BBA sem 3</option>
                            <option value="BCA SY">BCA SY</option>
                            <option value="BCA TY">BCA TY</option>
                        </select>
                    </div>

                    <!-- Target Academic Year -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Target Academic Year <span class="text-red-500">*</span></label>
                        <select id="filterTargetYear" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">Select Next Year</option>
                            <option value="2026-27" selected>2026-27</option>
                            <option value="2027-28">2027-28</option>
                        </select>
                    </div>

                </div>

                <!-- Search and Load Action Row -->
                <div class="flex flex-wrap items-center justify-between gap-3 mt-4">
                    <div class="w-full sm:w-1/3 relative">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" id="searchInput" placeholder="Search student by name or ID..." 
                               class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-xl text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none bg-white" />
                    </div>

                    <div class="flex gap-2">
                        <button type="button" id="loadStudentsBtn" class="memo-btn bg-orange-500 text-white font-bold py-2 px-6 rounded-xl hover:bg-orange-600 text-sm shadow-sm flex items-center gap-1.5">
                            <i class="fas fa-filter"></i> Load Students
                        </button>
                        <button type="button" id="resetBtn" class="memo-btn bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-xl hover:bg-gray-300 text-sm flex items-center gap-1.5">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="table-wrap p-4 sm:p-6">
                <table class="w-full text-sm text-left text-gray-600 border-collapse" id="promotionTable">
                    <thead>
                        <tr class="bg-orange-500 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-4 py-3 rounded-l-xl whitespace-nowrap text-center w-12">
                                <input type="checkbox" id="selectAllCheckbox" class="accent-orange-700 w-4 h-4 rounded cursor-pointer" />
                            </th>
                            <th class="px-4 py-3 whitespace-nowrap">#</th>
                            <th class="px-4 py-3 whitespace-nowrap">Student Name</th>
                            <th class="px-4 py-3 whitespace-nowrap">Student ID</th>
                            <th class="px-4 py-3 whitespace-nowrap">Current Class</th>
                            <th class="px-4 py-3 whitespace-nowrap">Assigned Next Status / Class</th>
                            <th class="px-4 py-3 rounded-r-xl whitespace-nowrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody" class="divide-y divide-gray-100">
                        <tr>
                            <td colspan="7" class="text-center py-10 text-gray-400">Please select criteria and click "Load Students" to view records.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination Bar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-100 bg-gray-50/50">
                <div class="text-sm text-gray-500 font-semibold">
                    Showing <span id="startEntry">0</span> to <span id="endEntry">0</span> of <span id="totalEntries">0</span> entries
                </div>
                <div class="flex items-center gap-2">
                    <button id="prevPage" class="page-btn px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed text-sm">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </button>
                    <span id="currentPageDisplay" class="px-4 py-2 bg-orange-100 text-orange-800 font-bold rounded-xl text-sm">1</span>
                    <button id="nextPage" class="page-btn px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed text-sm">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
            </div>

        </div>

    </main>

    <?php include 'footer.php'; ?>
    <script src="url.js"></script>

    <script>
        function getToken() {
            return localStorage.getItem('auth_token') || localStorage.getItem('token') || localStorage.getItem('accessToken') || sessionStorage.getItem('token');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Mandatory Authentication & Session Guard Check
            const token = getToken();
            if (!token) {
                alert('Your session has expired or you are not logged in. Please log in again.');
                window.location.href = 'login.php';
                return;
            }

            const loadBtn = document.getElementById('loadStudentsBtn');
            const selectAll = document.getElementById('selectAllCheckbox');

            loadBtn.addEventListener('click', loadMockStudents);
            
            selectAll.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.student-checkbox');
                checkboxes.forEach(cb => {
                    cb.checked = selectAll.checked;
                    updateRowStatusPreview(cb);
                });
            });

            document.getElementById('resetBtn').addEventListener('click', () => {
                document.getElementById('searchInput').value = '';
                document.getElementById('selectAllCheckbox').checked = false;
                document.getElementById('studentTableBody').innerHTML = `<tr><td colspan="7" class="text-center py-10 text-gray-400">Please select criteria and click "Load Students" to view records.</td></tr>`;
                document.getElementById('totalEntries').textContent = '0';
                document.getElementById('startEntry').textContent = '0';
                document.getElementById('endEntry').textContent = '0';
            });

            document.getElementById('promoteSelectedBtn').addEventListener('click', () => {
                const allCheckboxes = document.querySelectorAll('.student-checkbox');
                if (allCheckboxes.length === 0) {
                    alert('Please load students first.');
                    return;
                }

                const checkedCount = document.querySelectorAll('.student-checkbox:checked').length;
                const uncheckedCount = allCheckboxes.length - checkedCount;
                const targetClass = document.getElementById('filterTargetClass').value || 'Next Class';
                const currentClass = document.getElementById('filterCurrentClass').value || 'Current Class';
                const targetYear = document.getElementById('filterTargetYear').value || 'Next Year';

                const confirmMsg = `Confirm Promotion Batch (${targetYear}):\n• ${checkedCount} checked student(s) will be PROMOTED to ${targetClass}\n• ${uncheckedCount} unchecked student(s) will REPEAT ${currentClass}`;
                if (confirm(confirmMsg)) {
                    alert(`Promotion processed! ${checkedCount} promoted to ${targetClass}, ${uncheckedCount} retained in ${currentClass}. ✅`);
                    loadMockStudents();
                }
            });
        });

        function updateRowStatusPreview(checkbox) {
            const targetClass = document.getElementById('filterTargetClass').value || 'BBA sem 2';
            const currentClass = document.getElementById('filterCurrentClass').value || 'BBA sem 1';
            const row = checkbox.closest('tr');
            const badge = row.querySelector('.status-preview-badge');
            if (!badge) return;

            if (checkbox.checked) {
                badge.textContent = `Promoted to ${targetClass}`;
                badge.className = 'status-preview-badge px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700';
            } else {
                badge.textContent = `Repeat (${currentClass})`;
                badge.className = 'status-preview-badge px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700';
            }
        }

        // Mock loader function simulating student fetch based on selected class & year
        function loadMockStudents() {
            const currentClass = document.getElementById('filterCurrentClass').value || 'BBA sem 1';
            const targetClass = document.getElementById('filterTargetClass').value || 'BBA sem 2';
            const tbody = document.getElementById('studentTableBody');
            
            tbody.innerHTML = `<tr><td colspan="7" class="text-center py-10 text-gray-400">Loading student records...</td></tr>`;

            setTimeout(() => {
                const mockData = [
                    { id: 1, name: "Kaustubh", regId: "REG-0BEA4TS2", currentClass: currentClass, checked: true },
                    { id: 2, name: "Pratik", regId: "REG-HGDLZVMP", currentClass: currentClass, checked: true },
                    { id: 3, name: "Sneha Patil", regId: "REG-948271SN", currentClass: currentClass, checked: false },
                    { id: 4, name: "Rahul Sharma", regId: "REG-552718RS", currentClass: currentClass, checked: true },
                    { id: 5, name: "Priya Patel", regId: "REG-339281PP", currentClass: currentClass, checked: false }
                ];

                tbody.innerHTML = mockData.map((s, idx) => {
                    const statusText = s.checked ? `Promoted to ${targetClass}` : `Repeat (${currentClass})`;
                    const badgeClass = s.checked ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700';

                    return `
                        <tr class="table-row-hover transition text-sm">
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <input type="checkbox" class="student-checkbox accent-orange-700 w-4 h-4 rounded cursor-pointer" data-id="${s.id}" ${s.checked ? 'checked' : ''} onchange="updateRowStatusPreview(this)" />
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-600">${idx + 1}</td>
                            <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">${s.name}</td>
                            <td class="px-4 py-3 whitespace-nowrap font-mono text-xs text-gray-700">${s.regId}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-gray-600">${s.currentClass}</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="status-preview-badge px-2.5 py-1 rounded-full text-xs font-semibold ${badgeClass}">
                                    ${statusText}
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <button class="px-3 py-1 bg-orange-50 text-orange-600 hover:bg-orange-100 rounded-lg text-xs font-bold transition" onclick="alert('Promoting ${s.name} to ${targetClass}')">
                                    Promote
                                </button>
                            </td>
                        </tr>
                    `;
                }).join('');

                document.getElementById('startEntry').textContent = '1';
                document.getElementById('endEntry').textContent = mockData.length;
                document.getElementById('totalEntries').textContent = mockData.length;
                document.getElementById('currentPageDisplay').textContent = '1';
            }, 300);
        }
    </script>
</body>

</html>

