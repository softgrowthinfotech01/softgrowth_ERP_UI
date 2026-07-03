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
        /* logs table   */

        .status {
            padding: 5px 12px;
            border-radius: 20px;
            color: white;
            font-size: 12px;
            font-weight: 600;
        }

        .success {
            background: #16a34a;
        }

        .failed {
            background: #dc2626;
        }

        .completed {
            background: #2563eb;
        }

        .log-toolbar {

            display: flex;

            gap: 10px;

            flex-wrap: wrap;

            margin-bottom: 20px;

        }

        .log-toolbar input,
        .log-toolbar select {

            padding: 10px;

            border: 1px solid #ddd;

            border-radius: 6px;

        }

        .log-toolbar button {

            padding: 10px 18px;

            border: none;

            background: #0d6efd;

            color: white;

            border-radius: 6px;

            cursor: pointer;

        }

        .pagination {

            margin-top: 20px;

            display: flex;

            justify-content: center;

            align-items: center;

            gap: 15px;

        }


        /*  */

        /* minimal custom styles – everything else is Tailwind */
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

        /* responsive table wrapper */
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

        .dt-buttons {

            display: flex;

            gap: 10px;

            margin-bottom: 20px;

        }

        .dt-button {

            border: none !important;

            padding: 10px 22px !important;

            border-radius: 14px !important;

            font-weight: 600 !important;

            color: white !important;

            box-shadow: 0 5px 15px rgba(0, 0, 0, .12);

        }

        .btn-copy {

            background: #374151 !important;

        }

        .btn-csv {

            background: #0ea5e9 !important;

        }

        .btn-excel {

            background: #10b981 !important;

        }

        .btn-pdf {

            background: #ef4444 !important;

        }

        .btn-print {

            background: #8b5cf6 !important;

        }

        .dataTables_filter {

            float: right;

            margin-bottom: 20px;

        }

        .dataTables_filter input {

            height: 46px;

            width: 300px;

            padding: 0 18px;

            border-radius: 14px;

            border: 1px solid #e5e7eb;

            outline: none;

            background: #f8fafc;

        }

        .dataTables_length {

            display: none;

        }

        .dataTables_info {

            margin-top: 20px;

            font-weight: 600;

            color: #64748b;

        }

        .dataTables_paginate {

            margin-top: 20px !important;

        }

        .paginate_button {

            border-radius: 12px !important;

            padding: 8px 18px !important;

            margin: 0 5px !important;

            border: none !important;

        }

        .current {

            background: #0f9d94 !important;

            color: white !important;

        }

        .previous,
        .next {

            background: #14b8a6 !important;

            color: white !important;

        }
    </style>

</head>

<body class="bg-gray-300 text-gray-800 antialiased ">
    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>
    <!-- HEADER -->
    <main class="md:ml-[300px] max-w-7xl mx-auto mb-8 px-4 sm:px-6 py-28 pb-10 transition-all duration-200">

        <!-- ===== STUDENT RECORDS CARD ===== -->
        <div class="bg-white rounded-3xl shadow-lg border border-gray-200 overflow-hidden">
            <!-- Heading -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 bg-white">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center">

                        <i class="fas fa-user-graduate text-2xl"></i>

                    </div>

                    <div>

                        <h2 class="text-4xl font-bold text-slate-900">
                            Student Records
                        </h2>

                        <p class="text-gray-500 mt-1">
                            Manage and track all registered students
                        </p>

                    </div>

                </div>

            </div>

            <!-- Table -->
            <div class="log-toolbar">

                <input
                    type="text"
                    id="searchLog"
                    placeholder="🔍 Search user, activity or IP">

                <input
                    type="date"
                    id="dateFilter">

                <select id="roleFilter">
                    <option value="">All Roles</option>
                    <option>Admin</option>
                    <option>Teacher</option>
                    <option>Accountant</option>
                    <option>Reception</option>
                    <option>Library</option>
                    <option>Hostel</option>
                    <option>System</option>
                </select>

                <select id="moduleFilter">
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

                <select id="statusFilter">
                    <option value="">All Status</option>
                    <option>Success</option>
                    <option>Failed</option>
                    <option>Completed</option>
                </select>

                <button id="resetBtn">Reset</button>

                <button id="excelBtn">
                    Export Excel
                </button>

                <button onclick="window.print()">
                    Export PDF
                </button>

            </div>
            <div class="table-wrap">
                <table class="w-full border-collapse">

                    <thead class="bg-gray-100">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>User</th>
                            <th>Module</th>
                            <th>Activity</th>
                            <th>IP Address</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody id="logsTable"></tbody>

                </table>
            </div>
            <div class="pagination">

                <button id="prevPage">
                    ◀ Previous
                </button>

                <span id="pageInfo"></span>

                <button id="nextPage">
                    Next ▶
                </button>

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