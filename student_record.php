<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Records - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        .table-row-hover:hover {
            background-color: #f8fafc;
        }

        .modal-overlay {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal-box {
            animation: fadeIn 0.25s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.97);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
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

        .memo-btn {
            transition: all 0.2s ease;
        }
        .memo-btn:hover {
            transform: translateY(-1px);
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 antialiased font-sans">
    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <!-- MAIN CONTENT -->
    <main class="md:ml-[300px] max-w-7xl mx-auto mb-8 px-4 sm:px-6 py-28 pb-10 transition-all duration-200">

        <!-- ===== STUDENT RECORDS CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            
            <!-- Heading & Add Button -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-6 border-b border-gray-200 bg-white gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">
                        <i class="fas fa-user-graduate text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-900">
                            Student Records
                        </h2>
                        <p class="text-gray-500 mt-1 text-sm">
                            Filter, search, view, and manage all registered student records
                        </p>
                    </div>
                </div>
                <a href="student_reg.php" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md flex items-center gap-2 transition text-sm">
                    <i class="fas fa-plus"></i> Add Student
                </a>
            </div>

            <!-- Unified Search & Filters Bar (Single Search Input + 2 Filters) -->
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gray-50/50">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                    
                    <!-- Single Universal Search Bar (Name, OPR ID, Student ID) -->
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Universal Search</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="unifiedSearchInput" placeholder="Search by name, student ID, or OPR / APAAR ID..." 
                                class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-xl text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none bg-white">
                        </div>
                    </div>

                    <!-- Filter Class -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Class Filter</label>
                        <select id="filterClass" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">All Classes</option>
                        </select>
                    </div>

                    <!-- Filter Academic Year -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Academic Year</label>
                        <select id="filterAcademicYear" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-white py-2 px-3 text-sm outline-none">
                            <option value="">All Academic Years</option>
                        </select>
                    </div>

                </div>

                <!-- Action Controls Row -->
                <div class="flex items-center justify-end gap-2 mt-4">
                    <button type="button" id="searchBtn" class="memo-btn bg-orange-500 text-white font-bold py-2 px-6 rounded-xl hover:bg-orange-600 text-sm shadow-sm flex items-center gap-1.5">
                        <i class="fas fa-search"></i> Search
                    </button>
                    <button type="button" id="resetBtn" class="memo-btn bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-xl hover:bg-gray-300 text-sm flex items-center gap-1.5">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="table-wrap p-4 sm:p-6">
                <table id="studentTable" class="w-full text-sm text-left text-gray-600 border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-4 py-3 rounded-l-xl whitespace-nowrap">#</th>
                            <th class="px-4 py-3 whitespace-nowrap">Student Name</th>
                            <th class="px-4 py-3 whitespace-nowrap">Batch</th>
                            <th class="px-4 py-3 whitespace-nowrap">Class</th>
                            <th class="px-4 py-3 whitespace-nowrap">Student ID</th>
                            <th class="px-4 py-3 whitespace-nowrap">Phone</th>
                            <th class="px-4 py-3 whitespace-nowrap">Parent Phone</th>
                            <th class="px-4 py-3 rounded-r-xl whitespace-nowrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody" class="divide-y divide-gray-100">
                        <tr>
                            <td colspan="8" class="text-center py-10 text-gray-400">Loading student records...</td>
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

        <!-- ===== DETAILS MODAL ===== -->
        <div id="detailsModal" class="fixed inset-0 modal-overlay hidden justify-center items-center z-50 p-4 z-[99999]">
            <div class="modal-box bg-white rounded-2xl w-full max-w-4xl p-6 relative shadow-2xl max-h-[90vh] overflow-y-auto">
                <button onclick="closeDetailsModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl transition">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="text-xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center text-sm">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Student Details & Fee Breakdown
                </h2>
                <div id="detailsContent" class="grid md:grid-cols-2 xl:grid-cols-3 gap-4 text-sm">
                    <!-- populated by JS -->
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closeDetailsModal()" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>

        <!-- ===== DOCUMENTS MODAL ===== -->
        <div id="documentsModal" class="fixed inset-0 modal-overlay hidden justify-center items-center z-50 p-4 z-[99999]">
            <div class="modal-box bg-white rounded-2xl w-full max-w-3xl p-6 relative shadow-2xl">
                <button onclick="closeDocumentsModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl transition">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="text-xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center text-sm">
                        <i class="fas fa-file-alt"></i>
                    </span>
                    Student Documents
                </h2>
                <div id="documentsContent" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- populated by JS -->
                </div>
                <div class="mt-6 flex justify-end">
                    <button onclick="closeDocumentsModal()" class="px-5 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>

    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <script>
        (function() {
            const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token') || '';
            const cleanBase = (typeof url !== 'undefined' && url) ? url.replace(/\/$/, '') : 'http://127.0.0.1:8000/api';
            const storageBase = cleanBase.replace(/\/api$/, '');

            let allStudents = [];
            let filteredStudents = [];
            let currentPage = 1;
            const rowsPerPage = 10;

            document.addEventListener('DOMContentLoaded', () => {
                if (!token) {
                    alert('Session expired. Please log in again.');
                    window.location.href = 'login.php';
                    return;
                }
                fetchDropdownData();
                fetchStudents();

                // Event Listeners for Search & Filters
                document.getElementById('searchBtn').addEventListener('click', doSearch);
                document.getElementById('resetBtn').addEventListener('click', resetFilters);

                const unifiedSearch = document.getElementById('unifiedSearchInput');
                if (unifiedSearch) {
                    unifiedSearch.addEventListener('input', () => doSearch());
                    unifiedSearch.addEventListener('keydown', e => { if (e.key === 'Enter') doSearch(); });
                }

                const filterClass = document.getElementById('filterClass');
                if (filterClass) filterClass.addEventListener('change', () => doSearch());

                const filterAcademicYear = document.getElementById('filterAcademicYear');
                if (filterAcademicYear) filterAcademicYear.addEventListener('change', () => doSearch());
            });

            // ==============================
            // FETCH DROPDOWN OPTIONS (Classes & Academic Years)
            // ==============================
            async function fetchDropdownData() {
                try {
                    const classRes = await fetch(`${cleanBase}/student-classes`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    const classResult = await classRes.json();
                    if (classRes.ok) {
                        const classPayload = classResult.data?.data || classResult.data || classResult;
                        const classes = Array.isArray(classPayload) ? classPayload : [];
                        const classSelect = document.getElementById('filterClass');
                        if (classSelect) {
                            classSelect.innerHTML = '<option value="">All Classes</option>' + 
                                classes.map(c => `<option value="${c.id}">${c.class_name || c.name}</option>`).join('');
                        }
                    }

                    const yearRes = await fetch(`${cleanBase}/academic-years`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    const yearResult = await yearRes.json();
                    if (yearRes.ok) {
                        const yearPayload = yearResult.data?.data || yearResult.data || yearResult;
                        const years = Array.isArray(yearPayload) ? yearPayload : [];
                        const yearSelect = document.getElementById('filterAcademicYear');
                        if (yearSelect) {
                            yearSelect.innerHTML = '<option value="">All Academic Years</option>' + 
                                years.map(y => `<option value="${y.academic_year || y.id}">${y.academic_year || y.name}</option>`).join('');
                        }
                    }
                } catch (err) {
                    console.error('Error loading filter dropdowns:', err);
                }
            }

            // ==============================
            // FETCH STUDENTS FROM API
            // ==============================
            async function fetchStudents() {
                const body = document.getElementById('studentTableBody');
                try {
                    const response = await fetch(`${cleanBase}/students`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    const result = await response.json().catch(() => ({}));
                    
                    if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href='login.php'; return; }
                    if (response.status === 403) throw new Error('You do not have permission to view students.');
                    if (response.status === 404) throw new Error(result.message || 'Student records were not found.');
                    if (!response.ok) throw new Error(result.message || 'Unable to load student records.');

                    const payload = result.data || result;
                    const rows = Array.isArray(payload) ? payload : (payload.data || []);
                    
                    // Map API fields safely for standard access
                    allStudents = rows.map(s => ({
                        dbId: s.id,
                        id: String(s.student_id || s.registration_id || ''),
                        name: s.student_name || s.name || '',
                        oprId: String(s.abc_id || s.opr_id || s.apaar_id || ''),
                        classId: String(s.class_id || s.class?.id || ''),
                        className: String(s.class?.class_name || s.course || ''),
                        batch: String(s.student_batch || s.academic_year || ''),
                        phone: s.student_phone || '—',
                        parentPhone: s.parent_phone || '—',
                        raw: s
                    }));

                    filteredStudents = [...allStudents];
                    currentPage = 1;
                    renderTable();

                } catch (error) { 
                    if (body) body.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-red-600">${error.message}</td></tr>`; 
                }
            }

            // ==============================
            // RENDER TABLE & PAGINATION
            // ==============================
            function renderTable() {
                const body = document.getElementById('studentTableBody');
                if (!body) return;

                const totalEntries = filteredStudents.length;
                const totalPages = Math.ceil(totalEntries / rowsPerPage) || 1;

                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                const start = (currentPage - 1) * rowsPerPage;
                const end = Math.min(start + rowsPerPage, totalEntries);
                const pageItems = filteredStudents.slice(start, end);

                body.innerHTML = '';
                if (!pageItems.length) { 
                    body.innerHTML = '<tr><td colspan="8" class="text-center py-8 text-gray-400"><i class="fas fa-search mr-1.5 text-orange-400"></i> No matching students found.</td></tr>'; 
                } else {
                    pageItems.forEach((s, index) => {
                        const row = document.createElement('tr'); 
                        row.className = 'table-row-hover transition text-sm';

                        row.innerHTML = `
                            <td class="px-4 py-3 font-semibold text-gray-600">${start + index + 1}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">${s.name || '—'}</td>
                            <td class="px-4 py-3 text-gray-600">${s.batch || '—'}</td>
                            <td class="px-4 py-3 text-gray-600">${s.className || '—'}</td>
                            <td class="px-4 py-3 font-mono text-gray-800">${s.id || '—'}</td>
                            <td class="px-4 py-3 text-gray-600">${s.phone}</td>
                            <td class="px-4 py-3 text-gray-600">${s.parentPhone}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <button class="student-details-btn w-8 h-8 rounded-lg bg-teal-50 text-teal-600 hover:bg-teal-100 flex items-center justify-center transition" type="button" title="View Details">
                                        <i class="fas fa-eye text-xs"></i>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 flex items-center justify-center transition" type="button" onclick='openDocumentsModal(${JSON.stringify(s.raw)})' title="Documents">
                                        <i class="fas fa-folder-open text-xs"></i>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition" type="button" onclick="window.location.href='student_reg_update.php?id=${s.dbId}'" title="Edit">
                                        <i class="fas fa-pen text-xs"></i>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition" type="button" onclick="deleteStudent(${Number(s.dbId)})" title="Delete">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>`;

                        row.querySelector('.student-details-btn').addEventListener('click', () => {
                            openDetailsModal(s.raw);
                        });

                        body.appendChild(row);
                    });
                }

                document.getElementById('startEntry').textContent = totalEntries ? start + 1 : 0;
                document.getElementById('endEntry').textContent = end;
                document.getElementById('totalEntries').textContent = totalEntries;
                document.getElementById('currentPageDisplay').textContent = currentPage;

                document.getElementById('prevPage').disabled = (currentPage === 1);
                document.getElementById('nextPage').disabled = (currentPage === totalPages || totalEntries === 0);
            }

            function changePage(direction) {
                const totalPages = Math.ceil(filteredStudents.length / rowsPerPage) || 1;
                currentPage += direction;
                if (currentPage < 1) currentPage = 1;
                if (currentPage > totalPages) currentPage = totalPages;
                renderTable();
            }

            // ==============================
            // UNIFIED SEARCH & FILTER LOGIC
            // ==============================
            function doSearch() {
                const searchInput = document.getElementById('unifiedSearchInput');
                const filterClass = document.getElementById('filterClass');
                const filterYear = document.getElementById('filterAcademicYear');

                const query = searchInput ? searchInput.value.toLowerCase().trim().replace(/\s/g, '') : '';
                const rawQuery = searchInput ? searchInput.value.toLowerCase().trim() : '';
                const classVal = filterClass ? filterClass.value : '';
                const yearVal = filterYear ? filterYear.value : '';

                filteredStudents = allStudents.filter(s => {
                    const nameLower = s.name.toLowerCase();
                    const idLower = s.id.toLowerCase().replace(/\s/g, '');
                    const oprLower = s.oprId.toLowerCase().replace(/\s/g, '');

                    // Checks if search query matches Name, Student ID, or OPR/APAAR ID
                    const matchesSearch = !rawQuery || 
                        nameLower.includes(rawQuery) || 
                        idLower.includes(query) || 
                        oprLower.includes(query);

                    const matchesClass = !classVal || s.classId === classVal || s.className.toLowerCase().includes(classVal.toLowerCase());
                    const matchesYear = !yearVal || s.batch === yearVal;

                    return matchesSearch && matchesClass && matchesYear;
                });

                currentPage = 1;
                renderTable();
            }

            function resetFilters() {
                if (document.getElementById('unifiedSearchInput')) document.getElementById('unifiedSearchInput').value = '';
                if (document.getElementById('filterClass')) document.getElementById('filterClass').value = '';
                if (document.getElementById('filterAcademicYear')) document.getElementById('filterAcademicYear').value = '';
                filteredStudents = [...allStudents];
                currentPage = 1;
                renderTable();
            }

            // ==============================
            // DELETE STUDENT
            // ==============================
            window.deleteStudent = async function(id) {
                if (!confirm("Are you sure you want to delete this student?")) return;

                try {
                    const response = await fetch(`${cleanBase}/students/${id}`, {
                        method: "DELETE",
                        headers: {
                            "Authorization": "Bearer " + token,
                            "Accept": "application/json"
                        }
                    });

                    const result = await response.json().catch(() => ({}));
                    if (response.ok) {
                        alert("Student Deleted Successfully ✅");
                        fetchStudents();
                    } else {
                        alert(result.message || "Delete Failed");
                    }
                } catch (error) {
                    console.log(error);
                    alert("Server Error ❌");
                }
            };

            // ==============================
            // DETAILS MODAL (With Gross, Discount & Payable Amount)
            // ==============================
            window.openDetailsModal = function(student) {
                document.getElementById("detailsModal").classList.remove("hidden");
                document.getElementById("detailsModal").classList.add("flex");

                const grossFee = Number(student.full_fees || student.gross_fee || 0);
                const discountAmount = Number(student.discount_amount || 0);
                const payableAmount = Math.max(0, grossFee - discountAmount);

                document.getElementById("detailsContent").innerHTML = `
                    <div><strong>Registration ID:</strong> ${student.registration_id || student.student_id || "-"}</div>
                    <div><strong>OPR / APAAR ID:</strong> ${student.abc_id || student.opr_id || "-"}</div>
                    <div><strong>Full Name:</strong> ${student.student_name || "-"}</div>
                    <div><strong>Course / Class:</strong> ${student.class?.class_name || student.course || "-"}</div>
                    <div><strong>Phone Number:</strong> ${student.student_phone || "-"}</div>
                    <div><strong>Parent Phone:</strong> ${student.parent_phone || "-"}</div>
                    <div><strong>Parent Name:</strong> ${student.parent_name || "-"}</div>
                    <div><strong>Aadhaar Number:</strong> [Aadhaar Redacted]</div>
                    <div><strong>Date of Birth:</strong> ${student.date_of_birth || "-"}</div>
                    <div><strong>Gender:</strong> ${student.gender || "-"}</div>
                    <div><strong>Blood Group:</strong> ${student.blood_group || "-"}</div>
                    <div><strong>Place of Birth:</strong> ${student.place_of_birth || "-"}</div>
                    <div><strong>Caste:</strong> ${student.caste || "-"}</div>
                    <div><strong>Sub Caste:</strong> ${student.sub_caste || "-"}</div>
                    <div><strong>Board:</strong> ${student.board || "-"}</div>
                    <div><strong>Previous Class:</strong> ${student.previous_class || "-"}</div>
                    <div><strong>Student Batch:</strong> ${student.student_batch || student.academic_year || "-"}</div>
                    <div><strong>Admission Date:</strong> ${student.admission_date || "-"}</div>
                    <div><strong>Gross Fee:</strong> ₹ ${grossFee.toLocaleString('en-IN')}</div>
                    <div><strong>Discount Amount:</strong> ₹ ${discountAmount.toLocaleString('en-IN')}</div>
                    <div class="p-2 bg-orange-50 border border-orange-200 rounded-lg"><strong>Payable Amount:</strong> <span class="text-orange-600 font-bold">₹ ${payableAmount.toLocaleString('en-IN')}</span></div>
                    <div class="md:col-span-2 xl:col-span-3"><strong>Full Address:</strong> ${student.full_address || "-"}</div>
                    <div><strong>Tahsil:</strong> ${student.tahsil || "-"}</div>
                    <div><strong>District:</strong> ${student.district || "-"}</div>
                    <div><strong>State:</strong> ${student.state || "-"}</div>
                    <div><strong>Pincode:</strong> ${student.pincode || "-"}</div>
                `;
            };

            window.closeDetailsModal = function() {
                document.getElementById("detailsModal").classList.add("hidden");
            };

            // ==============================
            // DOCUMENTS MODAL
            // ==============================
          window.openDocumentsModal = function(student) {
                document.getElementById("documentsModal").classList.remove("hidden");
                document.getElementById("documentsModal").classList.add("flex");

                const docs = [
                    { name: "Passport Photo", file: student.passport_photo },
                    { name: "Aadhaar Card", file: student.aadhar_card || student.aadhaar_card },
                    { name: "Other Documents", file: student.other_documents }
                ];

                let html = "";
                docs.forEach(doc => {
                    if (doc.file) {
                        let filesArray = [];
                        if (doc.name === "Other Documents") {
                            try {
                                if (typeof doc.file === 'string') {
                                    if (doc.file.trim().startsWith('[')) {
                                        filesArray = JSON.parse(doc.file);
                                    } else if (doc.file.includes(',')) {
                                        filesArray = doc.file.split(',').map(s => s.trim());
                                    } else {
                                        filesArray = [doc.file.trim()];
                                    }
                                } else if (Array.isArray(doc.file)) {
                                    filesArray = doc.file;
                                }
                            } catch(e) {
                                filesArray = [doc.file];
                            }
                        } else {
                            filesArray = [doc.file];
                        }

                        filesArray.forEach((filePath, idx) => {
                            if(filePath) {
                                let displayName = doc.name;
                                if(filesArray.length > 1) displayName += ` (${idx + 1})`;
                                html += `
                                    <div class="relative group">
                                        <div class="bg-slate-800 rounded-xl p-4 text-center hover:bg-slate-700 transition">
                                            <div class="text-3xl mb-2 text-orange-400"><i class="fas fa-file-pdf"></i></div>
                                            <div class="text-white text-xs font-semibold truncate">${displayName}</div>
                                        </div>
                                        <div class="absolute inset-0 flex items-center justify-center bg-black/60 rounded-xl opacity-0 group-hover:opacity-100 transition-all duration-300">
                                            <a href="${storageBase}/storage/${filePath}" download target="_blank" class="px-3 py-1.5 rounded-lg bg-orange-500 hover:bg-orange-600 text-white text-xs font-semibold shadow">
                                                <i class="fas fa-download mr-1"></i> Download
                                            </a>
                                        </div>
                                    </div>`;
                            }
                        });
                    }
                });

                document.getElementById("documentsContent").innerHTML = html || '<p class="col-span-3 text-center text-gray-400 py-4">No documents uploaded.</p>';
            };

            window.closeDocumentsModal = function() {
                document.getElementById("documentsModal").classList.add("hidden");
            };
        })();
    </script>
</body>

</html>