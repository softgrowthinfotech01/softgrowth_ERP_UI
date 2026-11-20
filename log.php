<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Logs - ERP</title>
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

    <!-- MAIN CONTENT -->
    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200">

        <!-- ===== USER LOGS CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" id="printArea">

            <!-- Heading & Export Toolbar -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between p-6 border-b border-gray-200 bg-white gap-4 no-print">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-900">User Logs</h2>
                        <p class="text-sm text-gray-500 mt-1">Manage and track system activity and user logs</p>
                    </div>
                </div>

                <!-- Export Toolbar Buttons -->
                <div class="flex items-center gap-2">
                    <button id="excelBtn" class="toolbar-btn px-4 py-2.5 bg-emerald-600 text-white text-xs font-bold rounded-xl hover:bg-emerald-700 shadow-sm flex items-center gap-2">
                        <i class="fas fa-file-excel text-sm"></i> Export Excel
                    </button>
                    <button onclick="window.print()" class="toolbar-btn px-4 py-2.5 bg-red-500 text-white text-xs font-bold rounded-xl hover:bg-red-600 shadow-sm flex items-center gap-2">
                        <i class="fas fa-file-pdf text-sm"></i> Export PDF
                    </button>
                </div>
            </div>

            <!-- Unified Filters & Search Bar -->
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gray-50/50 no-print">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 items-end">
                    
                    <!-- Search Input -->
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Search Activity</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="searchLog" placeholder="Search user, activity or IP..." 
                                   class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-xl text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none bg-white" />
                        </div>
                    </div>

                    <!-- Date Filter -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Date</label>
                        <input type="date" id="dateFilter" class="w-full rounded-xl border border-gray-300 bg-white py-2 px-3 text-sm outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500" />
                    </div>

                    <!-- Role Filter -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Role</label>
                        <select id="roleFilter" class="w-full rounded-xl border border-gray-300 bg-white py-2 px-3 text-sm outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                            <option value="">All Roles</option>
                            <option>Admin</option>
                            <option>Teacher</option>
                            <option>Accountant</option>
                            <option>Reception</option>
                            <option>Library</option>
                            <option>Hostel</option>
                            <option>System</option>
                        </select>
                    </div>

                    <!-- Module Filter -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Module</label>
                        <select id="moduleFilter" class="w-full rounded-xl border border-gray-300 bg-white py-2 px-3 text-sm outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                            <option value="">All Modules</option>
                            <option>Students</option>
                            <option>Fees</option>
                            <option>Attendance</option>
                            <option>Teachers</option>
                            <option>Library</option>
                            <option>Admissions</option>
                            <option>Exams</option>
                            <option>Hostel</option>
                            <option>Backup</option>
                        </select>
                    </div>

                </div>

                <!-- Secondary Filter Row & Reset -->
                <div class="flex flex-wrap items-center justify-between gap-3 mt-4">
                    <div class="w-full sm:w-48">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Status</label>
                        <select id="statusFilter" class="w-full rounded-xl border border-gray-300 bg-white py-2 px-3 text-sm outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                            <option value="">All Status</option>
                            <option>Success</option>
                            <option>Failed</option>
                            <option>Completed</option>
                        </select>
                    </div>

                    <div class="flex gap-2 self-end">
                        <button type="button" id="resetBtn" class="memo-btn bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-xl hover:bg-gray-300 text-sm flex items-center gap-1.5">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-wrap p-4 sm:p-6">
                <table class="w-full text-sm text-left text-gray-600 border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white text-xs font-semibold uppercase tracking-wider">
                            <th class="px-4 py-3 rounded-l-xl whitespace-nowrap">#</th>
                            <th class="px-4 py-3 whitespace-nowrap">Date</th>
                            <th class="px-4 py-3 whitespace-nowrap">Time</th>
                            <th class="px-4 py-3 whitespace-nowrap">User</th>
                            <th class="px-4 py-3 whitespace-nowrap">Module</th>
                            <th class="px-4 py-3 whitespace-nowrap">Activity</th>
                            <th class="px-4 py-3 whitespace-nowrap">IP Address</th>
                            <th class="px-4 py-3 rounded-r-xl whitespace-nowrap">Status</th>
                        </tr>
                    </thead>
                    <tbody id="logsTable" class="divide-y divide-gray-100">
                        <tr>
                            <td colspan="8" class="text-center py-10 text-gray-400">Loading user logs...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Bar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-100 bg-gray-50/50 no-print">
                <div class="text-sm text-gray-500 font-semibold" id="paginationInfo">
                    Showing entries
                </div>
                <div class="flex items-center gap-2">
                    <button id="prevPage" class="page-btn px-5 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 disabled:opacity-50 disabled:cursor-not-allowed text-sm">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </button>
                    <span id="pageInfo" class="px-4 py-2 bg-orange-100 text-orange-800 font-bold rounded-xl text-sm">1</span>
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

        const logs = [
            { id: 1, date: "02 Jul 2026", time: "09:10 AM", user: "Admin", module: "Students", action: "Added new student Rahul Sharma", ip: "192.168.1.10", status: "Success" },
            { id: 2, date: "02 Jul 2026", time: "09:25 AM", user: "Reception", module: "Admissions", action: "Created admission enquiry for Sneha Patil", ip: "192.168.1.12", status: "Success" },
            { id: 3, date: "02 Jul 2026", time: "09:40 AM", user: "Teacher", module: "Attendance", action: "Marked attendance for BCA FY", ip: "192.168.1.20", status: "Success" },
            { id: 4, date: "02 Jul 2026", time: "10:05 AM", user: "Accountant", module: "Fees", action: "Received fee payment from Priya Patel", ip: "192.168.1.15", status: "Success" },
            { id: 5, date: "02 Jul 2026", time: "10:20 AM", user: "Library", module: "Library", action: "Issued Java Programming book", ip: "192.168.1.25", status: "Success" },
            { id: 6, date: "02 Jul 2026", time: "10:45 AM", user: "Admin", module: "Teachers", action: "Updated teacher profile", ip: "192.168.1.10", status: "Success" },
            { id: 7, date: "02 Jul 2026", time: "11:00 AM", user: "Hostel", module: "Hostel", action: "Allocated Room 203", ip: "192.168.1.31", status: "Success" },
            { id: 8, date: "02 Jul 2026", time: "11:20 AM", user: "Teacher", module: "Exams", action: "Uploaded Internal Assessment marks", ip: "192.168.1.20", status: "Success" },
            { id: 9, date: "02 Jul 2026", time: "11:40 AM", user: "System", module: "Backup", action: "Automatic database backup completed", ip: "127.0.0.1", status: "Completed" },
            { id: 10, date: "02 Jul 2026", time: "12:05 PM", user: "Admin", module: "Students", action: "Updated student mobile number", ip: "192.168.1.10", status: "Success" },
            { id: 11, date: "01 Jul 2026", time: "09:15 AM", user: "Teacher", module: "Attendance", action: "Attendance submission failed", ip: "192.168.1.20", status: "Failed" },
            { id: 12, date: "01 Jul 2026", time: "09:40 AM", user: "Accountant", module: "Fees", action: "Generated monthly fee report", ip: "192.168.1.15", status: "Success" },
            { id: 13, date: "01 Jul 2026", time: "10:15 AM", user: "Library", module: "Library", action: "Collected overdue fine", ip: "192.168.1.25", status: "Success" },
            { id: 14, date: "01 Jul 2026", time: "10:30 AM", user: "Reception", module: "Admissions", action: "Updated applicant documents", ip: "192.168.1.12", status: "Success" },
            { id: 15, date: "01 Jul 2026", time: "11:00 AM", user: "Admin", module: "Teachers", action: "Reset teacher login password", ip: "192.168.1.10", status: "Success" },
            { id: 16, date: "01 Jul 2026", time: "11:20 AM", user: "Teacher", module: "Exams", action: "Published exam timetable", ip: "192.168.1.20", status: "Success" },
            { id: 17, date: "01 Jul 2026", time: "11:50 AM", user: "Hostel", module: "Hostel", action: "Mess attendance updated", ip: "192.168.1.31", status: "Success" },
            { id: 18, date: "01 Jul 2026", time: "12:20 PM", user: "System", module: "Backup", action: "Backup verification completed", ip: "127.0.0.1", status: "Completed" },
            { id: 19, date: "30 Jun 2026", time: "09:05 AM", user: "Admin", module: "Students", action: "Deleted duplicate student record", ip: "192.168.1.10", status: "Success" },
            { id: 20, date: "30 Jun 2026", time: "09:30 AM", user: "Accountant", module: "Fees", action: "Refund processed", ip: "192.168.1.15", status: "Success" },
            { id: 21, date: "30 Jun 2026", time: "10:00 AM", user: "Teacher", module: "Attendance", action: "Attendance exported", ip: "192.168.1.20", status: "Success" },
            { id: 22, date: "30 Jun 2026", time: "10:30 AM", user: "Library", module: "Library", action: "New books added", ip: "192.168.1.25", status: "Success" },
            { id: 23, date: "30 Jun 2026", time: "11:00 AM", user: "Reception", module: "Admissions", action: "Admission form printed", ip: "192.168.1.12", status: "Success" },
            { id: 24, date: "30 Jun 2026", time: "11:20 AM", user: "Admin", module: "Teachers", action: "Assigned new class teacher", ip: "192.168.1.10", status: "Success" },
            { id: 25, date: "30 Jun 2026", time: "11:45 AM", user: "Teacher", module: "Exams", action: "Question paper uploaded", ip: "192.168.1.20", status: "Success" },
            { id: 26, date: "30 Jun 2026", time: "12:10 PM", user: "Hostel", module: "Hostel", action: "Maintenance request created", ip: "192.168.1.31", status: "Success" },
            { id: 27, date: "30 Jun 2026", time: "12:35 PM", user: "System", module: "Backup", action: "Cloud sync failed", ip: "127.0.0.1", status: "Failed" },
            { id: 28, date: "30 Jun 2026", time: "01:00 PM", user: "Admin", module: "Students", action: "Imported student records", ip: "192.168.1.10", status: "Success" },
            { id: 29, date: "30 Jun 2026", time: "01:20 PM", user: "Accountant", module: "Fees", action: "Fee receipt generated", ip: "192.168.1.15", status: "Success" },
            { id: 30, date: "30 Jun 2026", time: "01:45 PM", user: "System", module: "Backup", action: "Daily backup completed", ip: "127.0.0.1", status: "Completed" }
        ];

        let filteredLogs = [...logs];
        let currentPage = 1;
        const rowsPerPage = 10;

        const tbody = document.getElementById("logsTable");
        const searchLog = document.getElementById("searchLog");
        const dateFilter = document.getElementById("dateFilter");
        const roleFilter = document.getElementById("roleFilter");
        const moduleFilter = document.getElementById("moduleFilter");
        const statusFilter = document.getElementById("statusFilter");
        const resetBtn = document.getElementById("resetBtn");
        const excelBtn = document.getElementById("excelBtn");
        const prevPage = document.getElementById("prevPage");
        const nextPage = document.getElementById("nextPage");
        const pageInfo = document.getElementById("pageInfo");
        const paginationInfo = document.getElementById("paginationInfo");

        document.addEventListener('DOMContentLoaded', function() {
            // Mandatory Authentication & Session Guard Check
            const token = getToken();
            if (!token) {
                alert('Your session has expired or you are not logged in. Please log in again.');
                window.location.href = 'login.php';
                return;
            }

            renderTable();
        });

        function renderTable() {
            tbody.innerHTML = "";

            const totalEntries = filteredLogs.length;
            const totalPages = Math.ceil(totalEntries / rowsPerPage) || 1;

            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const start = (currentPage - 1) * rowsPerPage;
            const end = Math.min(start + rowsPerPage, totalEntries);
            const pageData = filteredLogs.slice(start, end);

            if (pageData.length === 0) {
                tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-gray-400"><i class="fas fa-search mr-1.5 text-orange-400"></i> No matching logs found.</td></tr>`;
                pageInfo.textContent = "1 of 1";
                paginationInfo.textContent = "Showing 0 to 0 of 0 entries";
                return;
            }

            pageData.forEach((log, index) => {
                let badgeClass = 'bg-emerald-50 text-emerald-700';
                if (log.status === 'Failed') badgeClass = 'bg-red-50 text-red-700';
                if (log.status === 'Completed') badgeClass = 'bg-sky-50 text-sky-700';

                tbody.innerHTML += `
                    <tr class="table-row-hover transition text-sm">
                        <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-600">${start + index + 1}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-gray-600">${log.date}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-gray-500 font-mono text-xs">${log.time}</td>
                        <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">${log.user}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-gray-600 font-medium">${log.module}</td>
                        <td class="px-4 py-3 text-gray-700 max-w-xs truncate">${log.action}</td>
                        <td class="px-4 py-3 whitespace-nowrap font-mono text-xs text-gray-500">${log.ip}</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold ${badgeClass}">
                                ${log.status}
                            </span>
                        </td>
                    </tr>
                `;
            });

            paginationInfo.textContent = `Showing ${start + 1} to ${end} of ${totalEntries} entries`;
            pageInfo.textContent = currentPage;
            prevPage.disabled = (currentPage === 1);
            nextPage.disabled = (currentPage === totalPages || totalEntries === 0);
        }

        prevPage.addEventListener("click", () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });

        nextPage.addEventListener("click", () => {
            const totalPages = Math.ceil(filteredLogs.length / rowsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                renderTable();
            }
        });

        function filterLogs() {
            const search = searchLog.value.toLowerCase().trim();
            const date = dateFilter.value;
            const role = roleFilter.value;
            const module = moduleFilter.value;
            const status = statusFilter.value;

            filteredLogs = logs.filter(log => {
                let matchSearch = !search || 
                    log.user.toLowerCase().includes(search) ||
                    log.action.toLowerCase().includes(search) ||
                    log.module.toLowerCase().includes(search) ||
                    log.ip.toLowerCase().includes(search);

                let matchDate = true;
                if (date) {
                    const formatted = formatDate(date);
                    matchDate = log.date === formatted;
                }

                let matchRole = !role || log.user === role;
                let matchModule = !module || log.module === module;
                let matchStatus = !status || log.status === status;

                return matchSearch && matchDate && matchRole && matchModule && matchStatus;
            });

            currentPage = 1;
            renderTable();
        }

        function formatDate(dateStr) {
            const d = new Date(dateStr);
            const day = d.getDate().toString().padStart(2, "0");
            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const month = months[d.getMonth()];
            const year = d.getFullYear();
            return `${day} ${month} ${year}`;
        }

        searchLog.addEventListener("input", filterLogs);
        dateFilter.addEventListener("change", filterLogs);
        roleFilter.addEventListener("change", filterLogs);
        moduleFilter.addEventListener("change", filterLogs);
        statusFilter.addEventListener("change", filterLogs);

        resetBtn.addEventListener("click", () => {
            searchLog.value = "";
            dateFilter.value = "";
            roleFilter.value = "";
            moduleFilter.value = "";
            statusFilter.value = "";
            filteredLogs = [...logs];
            currentPage = 1;
            renderTable();
        });

        excelBtn.addEventListener("click", () => {
            if (filteredLogs.length === 0) return alert('No logs to export.');
            const rows = [["Date", "Time", "User", "Module", "Activity", "IP", "Status"]];
            filteredLogs.forEach(log => {
                rows.push([log.date, log.time, `"${log.user}"`, `"${log.module}"`, `"${log.action}"`, log.ip, log.status]);
            });
            const csv = rows.map(e => e.join(",")).join("\n");
            const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
            const link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "ERP_User_Logs.csv";
            link.click();
        });
    </script>
</body>

</html>