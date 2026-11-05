<?php
// ============================================================
// Class Master & Academic Year Master — Side-by-Side ERP View
// ============================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Class & Academic Year Master - ERP</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        .table-row-hover:hover {
            background-color: #f8fafc;
        }
        .table-wrap {
            overflow-x: auto;
        }
        .modal-enter {
            animation: modalIn 0.2s ease;
        }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.96) translateY(8px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 antialiased font-sans">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== PAGE HEADER ===== -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Master Configuration</h1>
            <p class="text-sm text-gray-500">Manage and configure student classes and academic years side by side.</p>
        </div>

        <!-- ===== SPLIT GRID LAYOUT ===== -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- ========================================== -->
            <!-- LEFT SIDE: CLASS MASTER -->
            <!-- ========================================== -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">
                <div class="p-5 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <h2 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-chalkboard text-orange-500"></i> Class Master
                    </h2>
                    <button onclick="openClassModal()" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md flex items-center gap-2 transition">
                        <i class="fas fa-plus"></i> Add Class
                    </button>
                </div>

                <!-- Table Container -->
                <div class="table-wrap flex-1">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead class="bg-gray-100 text-gray-600 font-semibold uppercase text-xs">
                            <tr>
                                <th class="px-6 py-4">SR NO</th>
                                <th class="px-6 py-4">CLASS NAME</th>
                                <th class="px-6 py-4 text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="classTableBody" class="divide-y divide-gray-100">
                            <tr>
                                <td colspan="3" class="text-center py-8 text-gray-400">Loading classes...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- RIGHT SIDE: ACADEMIC YEAR MASTER -->
            <!-- ========================================== -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">
                <div class="p-5 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <h2 class="font-bold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-orange-500"></i> Academic Year Master
                    </h2>
                    <button onclick="openAcademicModal()" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md flex items-center gap-2 transition">
                        <i class="fas fa-plus"></i> Add Academic Year
                    </button>
                </div>

                <!-- Table Container -->
                <div class="table-wrap flex-1">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead class="bg-gray-100 text-gray-600 font-semibold uppercase text-xs">
                            <tr>
                                <th class="px-6 py-4">SR NO</th>
                                <th class="px-6 py-4">ACADEMIC YEAR</th>
                                <th class="px-6 py-4 text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="academicTableBody" class="divide-y divide-gray-100">
                            <tr>
                                <td colspan="3" class="text-center py-8 text-gray-400">Loading academic years...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </main>

    <!-- ============================================================ -->
    <!-- ADD / EDIT CLASS POPUP MODAL -->
    <!-- ============================================================ -->
    <div id="classModal" class="hidden fixed inset-0 z-[9998] bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl border border-gray-100 modal-enter overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <h3 id="classModalTitle" class="font-bold text-gray-900 text-lg flex items-center gap-2">
                    <i class="fas fa-chalkboard text-orange-500"></i> Add Class
                </h3>
                <button onclick="closeClassModal()" class="text-gray-400 hover:text-gray-600 text-xl font-bold">&times;</button>
            </div>

            <form id="classForm" class="p-6 space-y-4" onsubmit="saveClass(event)">
                <input type="hidden" id="class_id" />
                <div id="classErrorBanner" class="hidden bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 text-sm"></div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Class Name <span class="text-red-500">*</span></label>
                    <input type="text" id="class_name" placeholder="e.g. Class 10th / Grade 8" maxlength="150" class="w-full py-2.5 px-3 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none" required />
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="closeClassModal()" class="px-5 py-2.5 rounded-xl bg-gray-200 text-gray-700 font-bold text-sm hover:bg-gray-300 transition">Cancel</button>
                    <button type="submit" id="saveClassBtn" class="px-6 py-2.5 rounded-xl bg-orange-500 text-white font-bold text-sm hover:bg-orange-600 shadow-sm transition">
                        Save Class
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- ADD / EDIT ACADEMIC YEAR POPUP MODAL -->
    <!-- ============================================================ -->
    <div id="academicModal" class="hidden fixed inset-0 z-[9998] bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl border border-gray-100 modal-enter overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <h3 id="academicModalTitle" class="font-bold text-gray-900 text-lg flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-orange-500"></i> Add Academic Year
                </h3>
                <button onclick="closeAcademicModal()" class="text-gray-400 hover:text-gray-600 text-xl font-bold">&times;</button>
            </div>

            <form id="academicForm" class="p-6 space-y-4" onsubmit="saveAcademicYear(event)">
                <input type="hidden" id="academic_id" />
                <div id="academicErrorBanner" class="hidden bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 text-sm"></div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Academic Year <span class="text-red-500">*</span></label>
                    <input type="text" id="academic_year" placeholder="e.g. 2025-2026" maxlength="50" class="w-full py-2.5 px-3 text-sm rounded-lg border border-gray-300 focus:border-orange-500 outline-none" required />
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="closeAcademicModal()" class="px-5 py-2.5 rounded-xl bg-gray-200 text-gray-700 font-bold text-sm hover:bg-gray-300 transition">Cancel</button>
                    <button type="submit" id="saveAcademicBtn" class="px-6 py-2.5 rounded-xl bg-orange-500 text-white font-bold text-sm hover:bg-orange-600 shadow-sm transition">
                        Save Academic Year
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <script>
        const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token') || '';
        const cleanBase = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') : 'http://127.0.0.1:8000/api';

        let classList = [];
        let academicList = [];

        document.addEventListener('DOMContentLoaded', () => {
            if (!token) {
                alert('Session expired. Please log in again.');
                window.location.href = 'login.php';
                return;
            }
            fetchClasses();
            fetchAcademicYears();
        });

        // ============================================================
        // CLASS MASTER API & UI FUNCTIONS (Using /student-classes)
        // ============================================================
        async function fetchClasses() {
            try {
                // Requesting all or a high per_page to avoid missing records since pagination isn't displayed
                const res = await fetch(`${cleanBase}/student-classes?per_page=100`, {
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });
                const result = await res.json();

                if (res.status === 401) {
                    alert('Session expired. Please log in again.');
                    window.location.href = 'login.php';
                    return;
                }
                if (!res.ok) throw new Error(result.message || 'Failed to fetch classes.');

                // Handles Laravel paginated response structure: { success: true, data: { data: [...] } }
                if (result.data && Array.isArray(result.data.data)) {
                    classList = result.data.data;
                } else if (Array.isArray(result.data)) {
                    classList = result.data;
                } else if (Array.isArray(result)) {
                    classList = result;
                } else {
                    classList = [];
                }

                renderClassTable();

            } catch (err) {
                console.error(err);
                classList = [];
                document.getElementById('classTableBody').innerHTML = `<tr><td colspan="3" class="text-center py-8 text-red-500">${err.message}</td></tr>`;
            }
        }

        function renderClassTable() {
            const tbody = document.getElementById('classTableBody');

            if (!Array.isArray(classList) || classList.length === 0) {
                tbody.innerHTML = `<tr><td colspan="3" class="text-center py-8 text-gray-400">No classes found</td></tr>`;
                return;
            }

            tbody.innerHTML = classList.map((item, index) => `
                <tr class="table-row-hover transition text-sm">
                    <td class="px-6 py-4 font-semibold text-gray-600">${index + 1}</td>
                    <td class="px-6 py-4 font-bold text-gray-900">${item.class_name || ''}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openEditClassModal(${item.id}, '${item.class_name || ''}')" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition" title="Edit">
                                <i class="fas fa-pen text-xs"></i>
                            </button>
                            <button onclick="deleteClass(${item.id})" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition" title="Delete">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function openClassModal() {
            document.getElementById('classModalTitle').innerHTML = '<i class="fas fa-chalkboard text-orange-500"></i> Add Class';
            document.getElementById('classForm').reset();
            document.getElementById('class_id').value = '';
            document.getElementById('classErrorBanner').classList.add('hidden');
            document.getElementById('classModal').classList.remove('hidden');
        }

        function openEditClassModal(id, className) {
            document.getElementById('classModalTitle').innerHTML = '<i class="fas fa-edit text-orange-500"></i> Edit Class';
            document.getElementById('class_id').value = id;
            document.getElementById('class_name').value = className;
            document.getElementById('classErrorBanner').classList.add('hidden');
            document.getElementById('classModal').classList.remove('hidden');
        }

        function closeClassModal() {
            document.getElementById('classModal').classList.add('hidden');
        }

        async function saveClass(event) {
            event.preventDefault();
            const id = document.getElementById('class_id').value;
            const classNameVal = document.getElementById('class_name').value.trim();
            const banner = document.getElementById('classErrorBanner');
            const saveBtn = document.getElementById('saveClassBtn');
            banner.classList.add('hidden');

            if (!classNameVal) {
                banner.textContent = 'Please enter a class name.';
                banner.classList.remove('hidden');
                return;
            }

            const payload = { class_name: classNameVal };
            const endpoint = id ? `${cleanBase}/student-classes/${id}` : `${cleanBase}/student-classes`;
            const method = id ? 'PUT' : 'POST';

            try {
                saveBtn.disabled = true;
                saveBtn.textContent = 'Saving...';

                const res = await fetch(endpoint, {
                    method: method,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const result = await res.json();
                if (!res.ok) {
                    let msg = result.message || 'Failed to save class.';
                    if (result.errors) msg = Object.values(result.errors).flat().join('\n');
                    throw new Error(msg);
                }

                alert(result.message || 'Class saved successfully ✅');
                closeClassModal();
                fetchClasses();

            } catch (err) {
                banner.textContent = err.message;
                banner.classList.remove('hidden');
            } finally {
                saveBtn.disabled = false;
                saveBtn.textContent = 'Save Class';
            }
        }

        async function deleteClass(id) {
            if (!confirm('Are you sure you want to delete this class?')) return;

            try {
                const res = await fetch(`${cleanBase}/student-classes/${id}`, {
                    method: 'DELETE',
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });

                const result = await res.json();
                if (!res.ok) throw new Error(result.message || 'Failed to delete class.');

                alert(result.message || 'Class deleted successfully.');
                fetchClasses();
            } catch (err) {
                alert(err.message);
            }
        }


        // ============================================================
        // ACADEMIC YEAR MASTER API & UI FUNCTIONS (Using /academic-years)
        // ============================================================
        async function fetchAcademicYears() {
            try {
                const res = await fetch(`${cleanBase}/academic-years`, {
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });
                const result = await res.json();

                if (res.status === 401) {
                    alert('Session expired. Please log in again.');
                    window.location.href = 'login.php';
                    return;
                }
                if (!res.ok) throw new Error(result.message || 'Failed to fetch academic years.');

                if (result.data && Array.isArray(result.data.data)) {
                    academicList = result.data.data;
                } else if (Array.isArray(result.data)) {
                    academicList = result.data;
                } else if (Array.isArray(result)) {
                    academicList = result;
                } else {
                    academicList = [];
                }

                renderAcademicTable();

            } catch (err) {
                console.error(err);
                academicList = [];
                document.getElementById('academicTableBody').innerHTML = `<tr><td colspan="3" class="text-center py-8 text-red-500">${err.message}</td></tr>`;
            }
        }

        function renderAcademicTable() {
            const tbody = document.getElementById('academicTableBody');

            if (!Array.isArray(academicList) || academicList.length === 0) {
                tbody.innerHTML = `<tr><td colspan="3" class="text-center py-8 text-gray-400">No academic years found</td></tr>`;
                return;
            }

            tbody.innerHTML = academicList.map((item, index) => `
                <tr class="table-row-hover transition text-sm">
                    <td class="px-6 py-4 font-semibold text-gray-600">${index + 1}</td>
                    <td class="px-6 py-4 font-bold text-gray-900">${item.academic_year || ''}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openEditAcademicModal(${item.id}, '${item.academic_year || ''}')" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition" title="Edit">
                                <i class="fas fa-pen text-xs"></i>
                            </button>
                            <button onclick="deleteAcademicYear(${item.id})" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition" title="Delete">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function openAcademicModal() {
            document.getElementById('academicModalTitle').innerHTML = '<i class="fas fa-calendar-alt text-orange-500"></i> Add Academic Year';
            document.getElementById('academicForm').reset();
            document.getElementById('academic_id').value = '';
            document.getElementById('academicErrorBanner').classList.add('hidden');
            document.getElementById('academicModal').classList.remove('hidden');
        }

        function openEditAcademicModal(id, academicYear) {
            document.getElementById('academicModalTitle').innerHTML = '<i class="fas fa-edit text-orange-500"></i> Edit Academic Year';
            document.getElementById('academic_id').value = id;
            document.getElementById('academic_year').value = academicYear;
            document.getElementById('academicErrorBanner').classList.add('hidden');
            document.getElementById('academicModal').classList.remove('hidden');
        }

        function closeAcademicModal() {
            document.getElementById('academicModal').classList.add('hidden');
        }

        async function saveAcademicYear(event) {
            event.preventDefault();
            const id = document.getElementById('academic_id').value;
            const academicYearVal = document.getElementById('academic_year').value.trim();
            const banner = document.getElementById('academicErrorBanner');
            const saveBtn = document.getElementById('saveAcademicBtn');
            banner.classList.add('hidden');

            if (!academicYearVal) {
                banner.textContent = 'Please enter an academic year.';
                banner.classList.remove('hidden');
                return;
            }

            const payload = { academic_year: academicYearVal };
            const endpoint = id ? `${cleanBase}/academic-years/${id}` : `${cleanBase}/academic-years`;
            const method = id ? 'PUT' : 'POST';

            try {
                saveBtn.disabled = true;
                saveBtn.textContent = 'Saving...';

                const res = await fetch(endpoint, {
                    method: method,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const result = await res.json();
                if (!res.ok) {
                    let msg = result.message || 'Failed to save academic year.';
                    if (result.errors) msg = Object.values(result.errors).flat().join('\n');
                    throw new Error(msg);
                }

                alert(result.message || 'Academic Year saved successfully ✅');
                closeAcademicModal();
                fetchAcademicYears();

            } catch (err) {
                banner.textContent = err.message;
                banner.classList.remove('hidden');
            } finally {
                saveBtn.disabled = false;
                saveBtn.textContent = 'Save Academic Year';
            }
        }

        async function deleteAcademicYear(id) {
            if (!confirm('Are you sure you want to delete this academic year?')) return;

            try {
                const res = await fetch(`${cleanBase}/academic-years/${id}`, {
                    method: 'DELETE',
                    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                });

                const result = await res.json();
                if (!res.ok) throw new Error(result.message || 'Failed to delete academic year.');

                alert(result.message || 'Academic year deleted successfully.');
                fetchAcademicYears();
            } catch (err) {
                alert(err.message);
            }
        }
    </script>
</body>

</html>