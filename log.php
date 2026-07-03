<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Record</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


    <style>
   /* Modal animation (kept minimal) */
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
    /* Print overrides */
    @media print {
        .table-wrap {
            overflow: visible !important;
        }
        .table-wrap table {
            font-size: 0.75rem !important;
        }
        .table-wrap table th,
        .table-wrap table td {
            padding: 8px !important;
            border: 1px solid #ccc !important;
        }
        .no-print {
            display: none !important;
        }
    }
    </style>

</head>

<body class="bg-gray-300 text-gray-800 antialiased ">
    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>
    <!-- HEADER -->
   <main class="md:ml-[300px] max-w-7xl mx-auto mb-8 px-4 sm:px-6 py-28 pb-10 md:mb-8 transition-all duration-200">

    <!-- ===== LOGS CARD ===== -->
    <div class="bg-white rounded-3xl shadow-lg border border-gray-200 overflow-hidden">

        <!-- Heading -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200 bg-white">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center">
                    <i class="fas fa-user-graduate text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900">User Logs</h2>
                    <p class="text-gray-500 mt-1 text-sm">Manage and track all registered users</p>
                </div>
            </div>
        </div>

        <!-- Toolbar -->
        <div class="flex flex-wrap items-center gap-3 p-4 sm:p-6 border-b border-gray-200 bg-gray-50">
            <input type="text" id="searchLog" placeholder="🔍 Search user, activity or IP"
                   class="flex-1 min-w-[140px] sm:min-w-[180px] px-4 py-2.5 rounded-xl border border-gray-300 bg-white text-sm focus:ring-2 focus:ring-teal-400 focus:border-transparent outline-none transition" />

            <input type="date" id="dateFilter"
                   class="px-4 py-2.5 rounded-xl border border-gray-300 bg-white text-sm focus:ring-2 focus:ring-teal-400 focus:border-transparent outline-none transition" />

            <select id="roleFilter" class="px-4 py-2.5 rounded-xl border border-gray-300 bg-white text-sm focus:ring-2 focus:ring-teal-400 focus:border-transparent outline-none transition">
                <option value="">All Roles</option>
                <option>Admin</option>
                <option>Teacher</option>
                <option>Accountant</option>
                <option>Reception</option>
                <option>Library</option>
                <option>Hostel</option>
                <option>System</option>
            </select>

            <select id="moduleFilter" class="px-4 py-2.5 rounded-xl border border-gray-300 bg-white text-sm focus:ring-2 focus:ring-teal-400 focus:border-transparent outline-none transition">
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

            <select id="statusFilter" class="px-4 py-2.5 rounded-xl border border-gray-300 bg-white text-sm focus:ring-2 focus:ring-teal-400 focus:border-transparent outline-none transition">
                <option value="">All Status</option>
                <option>Success</option>
                <option>Failed</option>
                <option>Completed</option>
            </select>

            <button id="resetBtn" class="px-5 py-2.5 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition shadow-sm">
                Reset
            </button>

            <button id="excelBtn" class="px-5 py-2.5 rounded-xl bg-emerald-500 text-white font-semibold hover:bg-emerald-600 transition shadow-sm">
                <i class="fas fa-file-excel mr-1"></i> Excel
            </button>

            <button onclick="window.print()" class="px-5 py-2.5 rounded-xl bg-red-500 text-white font-semibold hover:bg-red-600 transition shadow-sm">
                <i class="fas fa-file-pdf mr-1"></i> PDF
            </button>
        </div>

        <!-- Table -->
        <div class="table-wrap p-4 sm:p-6">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-[#0D9488] text-white text-xs font-semibold uppercase tracking-wider">
                    <tr>
                        <th class="px-3 py-3 whitespace-nowrap">#</th>
                        <th class="px-3 py-3 whitespace-nowrap">Date</th>
                        <th class="px-3 py-3 whitespace-nowrap">Time</th>
                        <th class="px-3 py-3 whitespace-nowrap">User</th>
                        <th class="px-3 py-3 whitespace-nowrap">Module</th>
                        <th class="px-3 py-3 whitespace-nowrap">Activity</th>
                        <th class="px-3 py-3 whitespace-nowrap">IP Address</th>
                        <th class="px-3 py-3 whitespace-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody id="logsTable" class="divide-y divide-gray-100">
                    <!-- Rows injected by JavaScript -->
                    <tr>
                        <td colspan="8" class="text-center py-10 text-gray-400">Loading...</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex flex-wrap items-center justify-between gap-4 p-4 sm:p-6 border-t border-gray-200 bg-gray-50">
            <!-- <div class="text-sm text-gray-600 font-semibold">
                Showing <span id="startEntry">0</span> to <span id="endEntry">0</span> of <span id="totalEntries">0</span> entries
            </div> -->
            <div class="flex items-center gap-2">
                <button id="prevPage" class="px-4 py-2 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </button>
                <span id="pageInfo" class="px-4 py-2 rounded-xl bg-teal-100 text-teal-800 font-bold text-sm">1</span>
                <button id="nextPage" class="px-4 py-2 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    Next <i class="fas fa-chevron-right ml-1"></i>
                </button>
            </div>
        </div>

    </div>
</main>
    <?php include 'footer.php' ?>


    <script src="url.js"></script>

    <!-- logs -->

    <script>
        const logs = [{
                id: 1,
                date: "02 Jul 2026",
                time: "09:10 AM",
                user: "Admin",
                module: "Students",
                action: "Added new student Rahul Sharma",
                ip: "192.168.1.10",
                status: "Success"
            },
            {
                id: 2,
                date: "02 Jul 2026",
                time: "09:25 AM",
                user: "Reception",
                module: "Admissions",
                action: "Created admission enquiry for Sneha Patil",
                ip: "192.168.1.12",
                status: "Success"
            },
            {
                id: 3,
                date: "02 Jul 2026",
                time: "09:40 AM",
                user: "Teacher",
                module: "Attendance",
                action: "Marked attendance for BCA FY",
                ip: "192.168.1.20",
                status: "Success"
            },
            {
                id: 4,
                date: "02 Jul 2026",
                time: "10:05 AM",
                user: "Accountant",
                module: "Fees",
                action: "Received fee payment from Priya Patel",
                ip: "192.168.1.15",
                status: "Success"
            },
            {
                id: 5,
                date: "02 Jul 2026",
                time: "10:20 AM",
                user: "Library",
                module: "Library",
                action: "Issued Java Programming book",
                ip: "192.168.1.25",
                status: "Success"
            },
            {
                id: 6,
                date: "02 Jul 2026",
                time: "10:45 AM",
                user: "Admin",
                module: "Teachers",
                action: "Updated teacher profile",
                ip: "192.168.1.10",
                status: "Success"
            },
            {
                id: 7,
                date: "02 Jul 2026",
                time: "11:00 AM",
                user: "Hostel",
                module: "Hostel",
                action: "Allocated Room 203",
                ip: "192.168.1.31",
                status: "Success"
            },
            {
                id: 8,
                date: "02 Jul 2026",
                time: "11:20 AM",
                user: "Teacher",
                module: "Exams",
                action: "Uploaded Internal Assessment marks",
                ip: "192.168.1.20",
                status: "Success"
            },
            {
                id: 9,
                date: "02 Jul 2026",
                time: "11:40 AM",
                user: "System",
                module: "Backup",
                action: "Automatic database backup completed",
                ip: "127.0.0.1",
                status: "Completed"
            },
            {
                id: 10,
                date: "02 Jul 2026",
                time: "12:05 PM",
                user: "Admin",
                module: "Students",
                action: "Updated student mobile number",
                ip: "192.168.1.10",
                status: "Success"
            },
            {
                id: 11,
                date: "01 Jul 2026",
                time: "09:15 AM",
                user: "Teacher",
                module: "Attendance",
                action: "Attendance submission failed",
                ip: "192.168.1.20",
                status: "Failed"
            },
            {
                id: 12,
                date: "01 Jul 2026",
                time: "09:40 AM",
                user: "Accountant",
                module: "Fees",
                action: "Generated monthly fee report",
                ip: "192.168.1.15",
                status: "Success"
            },
            {
                id: 13,
                date: "01 Jul 2026",
                time: "10:15 AM",
                user: "Library",
                module: "Library",
                action: "Collected overdue fine",
                ip: "192.168.1.25",
                status: "Success"
            },
            {
                id: 14,
                date: "01 Jul 2026",
                time: "10:30 AM",
                user: "Reception",
                module: "Admissions",
                action: "Updated applicant documents",
                ip: "192.168.1.12",
                status: "Success"
            },
            {
                id: 15,
                date: "01 Jul 2026",
                time: "11:00 AM",
                user: "Admin",
                module: "Teachers",
                action: "Reset teacher login password",
                ip: "192.168.1.10",
                status: "Success"
            },
            {
                id: 16,
                date: "01 Jul 2026",
                time: "11:20 AM",
                user: "Teacher",
                module: "Exams",
                action: "Published exam timetable",
                ip: "192.168.1.20",
                status: "Success"
            },
            {
                id: 17,
                date: "01 Jul 2026",
                time: "11:50 AM",
                user: "Hostel",
                module: "Hostel",
                action: "Mess attendance updated",
                ip: "192.168.1.31",
                status: "Success"
            },
            {
                id: 18,
                date: "01 Jul 2026",
                time: "12:20 PM",
                user: "System",
                module: "Backup",
                action: "Backup verification completed",
                ip: "127.0.0.1",
                status: "Completed"
            },
            {
                id: 19,
                date: "30 Jun 2026",
                time: "09:05 AM",
                user: "Admin",
                module: "Students",
                action: "Deleted duplicate student record",
                ip: "192.168.1.10",
                status: "Success"
            },
            {
                id: 20,
                date: "30 Jun 2026",
                time: "09:30 AM",
                user: "Accountant",
                module: "Fees",
                action: "Refund processed",
                ip: "192.168.1.15",
                status: "Success"
            },
            {
                id: 21,
                date: "30 Jun 2026",
                time: "10:00 AM",
                user: "Teacher",
                module: "Attendance",
                action: "Attendance exported",
                ip: "192.168.1.20",
                status: "Success"
            },
            {
                id: 22,
                date: "30 Jun 2026",
                time: "10:30 AM",
                user: "Library",
                module: "Library",
                action: "New books added",
                ip: "192.168.1.25",
                status: "Success"
            },
            {
                id: 23,
                date: "30 Jun 2026",
                time: "11:00 AM",
                user: "Reception",
                module: "Admissions",
                action: "Admission form printed",
                ip: "192.168.1.12",
                status: "Success"
            },
            {
                id: 24,
                date: "30 Jun 2026",
                time: "11:20 AM",
                user: "Admin",
                module: "Teachers",
                action: "Assigned new class teacher",
                ip: "192.168.1.10",
                status: "Success"
            },
            {
                id: 25,
                date: "30 Jun 2026",
                time: "11:45 AM",
                user: "Teacher",
                module: "Exams",
                action: "Question paper uploaded",
                ip: "192.168.1.20",
                status: "Success"
            },
            {
                id: 26,
                date: "30 Jun 2026",
                time: "12:10 PM",
                user: "Hostel",
                module: "Hostel",
                action: "Maintenance request created",
                ip: "192.168.1.31",
                status: "Success"
            },
            {
                id: 27,
                date: "30 Jun 2026",
                time: "12:35 PM",
                user: "System",
                module: "Backup",
                action: "Cloud sync failed",
                ip: "127.0.0.1",
                status: "Failed"
            },
            {
                id: 28,
                date: "30 Jun 2026",
                time: "01:00 PM",
                user: "Admin",
                module: "Students",
                action: "Imported student records",
                ip: "192.168.1.10",
                status: "Success"
            },
            {
                id: 29,
                date: "30 Jun 2026",
                time: "01:20 PM",
                user: "Accountant",
                module: "Fees",
                action: "Fee receipt generated",
                ip: "192.168.1.15",
                status: "Success"
            },
            {
                id: 30,
                date: "30 Jun 2026",
                time: "01:45 PM",
                user: "System",
                module: "Backup",
                action: "Daily backup completed",
                ip: "127.0.0.1",
                status: "Completed"
            }
        ];
        // =============================
        // Pagination
        // =============================

        let filteredLogs = [...logs];
        let currentPage = 1;
        const rowsPerPage = 10;

        // =============================
        // DOM
        // =============================

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

        // =============================
        // Render Table
        // =============================

        function renderTable() {

            tbody.innerHTML = "";

            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            const pageData = filteredLogs.slice(start, end);

            if (pageData.length === 0) {

                tbody.innerHTML = `
            <tr>
                <td colspan="8" style="text-align:center;">
                    No logs found
                </td>
            </tr>
        `;

                pageInfo.innerHTML = "";

                return;
            }

            pageData.forEach((log, index) => {

                tbody.innerHTML += `

            <tr>

                <td>${start + index + 1}</td>

                <td>${log.date}</td>

                <td>${log.time}</td>

                <td>${log.user}</td>

                <td>${log.module}</td>

                <td>${log.action}</td>

                <td>${log.ip}</td>

                <td>

                    <span class="status ${log.status.toLowerCase()}">

                        ${log.status}

                    </span>

                </td>

            </tr>

        `;

            });

            updatePagination();

        }

        // =============================
        // Pagination
        // =============================

        function updatePagination() {

            const totalPages = Math.ceil(filteredLogs.length / rowsPerPage);

            pageInfo.innerHTML = `

        Page ${currentPage} of ${totalPages || 1}

    `;

            prevPage.disabled = currentPage === 1;

            nextPage.disabled = currentPage >= totalPages;

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

        // =============================
        // Filters
        // =============================

        function filterLogs() {

            const search = searchLog.value.toLowerCase();

            const date = dateFilter.value;

            const role = roleFilter.value;

            const module = moduleFilter.value;

            const status = statusFilter.value;

            filteredLogs = logs.filter(log => {

                let matchSearch =

                    log.user.toLowerCase().includes(search)

                    ||

                    log.action.toLowerCase().includes(search)

                    ||

                    log.module.toLowerCase().includes(search)

                    ||

                    log.ip.toLowerCase().includes(search);

                let matchDate = true;

                if (date) {

                    const formatted = formatDate(date);

                    matchDate = log.date === formatted;

                }

                let matchRole =

                    role === "" ||

                    log.user === role;

                let matchModule =

                    module === "" ||

                    log.module === module;

                let matchStatus =

                    status === "" ||

                    log.status === status;

                return (

                    matchSearch

                    &&

                    matchDate

                    &&

                    matchRole

                    &&

                    matchModule

                    &&

                    matchStatus

                );

            });

            currentPage = 1;

            renderTable();

        }

        // =============================
        // Date Format
        // =============================

        function formatDate(date) {

            const d = new Date(date);

            const day = d.getDate().toString().padStart(2, "0");

            const months = [

                "Jan", "Feb", "Mar", "Apr", "May", "Jun",

                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"

            ];

            const month = months[d.getMonth()];

            const year = d.getFullYear();

            return `${day} ${month} ${year}`;

        }

        // =============================
        // Events
        // =============================

        searchLog.addEventListener("input", filterLogs);

        dateFilter.addEventListener("change", filterLogs);

        roleFilter.addEventListener("change", filterLogs);

        moduleFilter.addEventListener("change", filterLogs);

        statusFilter.addEventListener("change", filterLogs);

        // =============================
        // Reset
        // =============================

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

        // =============================
        // Export CSV
        // =============================

        excelBtn.addEventListener("click", () => {

            const rows = [

                ["Date", "Time", "User", "Module", "Activity", "IP", "Status"]

            ];

            filteredLogs.forEach(log => {

                rows.push([

                    log.date,

                    log.time,

                    log.user,

                    log.module,

                    log.action,

                    log.ip,

                    log.status

                ]);

            });

            const csv = rows.map(e => e.join(",")).join("\n");

            const blob = new Blob([csv], {

                type: "text/csv"

            });

            const link = document.createElement("a");

            link.href = URL.createObjectURL(blob);

            link.download = "ERP_Logs.csv";

            link.click();

        });

        // =============================
        // Initial Load
        // =============================

        renderTable();
    </script>
    <!--  -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
</body>

</html>