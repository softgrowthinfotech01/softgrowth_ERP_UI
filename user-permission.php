<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Role Permission - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-300 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <!-- MAIN WRAPPER CENTERED -->
    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-20 pb-6 mb-6 transition-all duration-200 flex flex-col items-center justify-center">

        <!-- ================= USER ROLE PERMISSION CARD ================= -->
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg border border-gray-200 p-3 md:p-4">

            <!-- ===== HEADER ===== -->
            <div class="flex items-start gap-2.5 mb-2.5 pb-2.5 border-b border-gray-200">
                <div class="w-9 h-9 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-blue-600 text-sm"></i>
                </div>
                <div>
                    <h1 class="text-base font-bold text-gray-900 leading-tight">User Role Permission</h1>
                    <p class="text-[11px] text-gray-500 mt-0.5">Manage module and menu permissions for the selected user role.</p>
                </div>
            </div>

            <!-- ===== USER INFO BAR ===== -->
            <div class="bg-blue-50 border border-blue-100 rounded-md p-2 mb-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-1.5 md:gap-3">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-blue-200 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-blue-600 text-[10px]"></i>
                        </div>
                        <div class="space-y-0">
                            <div class="flex items-baseline gap-1 text-[11px]">
                                <span class="font-bold text-gray-800 w-14">Username</span>
                                <span class="text-gray-500">:</span>
                                <span class="text-gray-700">john.smith</span>
                            </div>
                            <div class="flex items-baseline gap-1 text-[11px]">
                                <span class="font-bold text-gray-800 w-14">Email</span>
                                <span class="text-gray-500">:</span>
                                <span class="text-gray-700">john.smith@example.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center md:justify-start">
                        <div class="space-y-0">
                            <div class="flex items-baseline gap-1 text-[11px]">
                                <span class="font-bold text-gray-800 w-14">User Role</span>
                                <span class="text-gray-500">:</span>
                                <span class="text-gray-700">Accountant</span>
                            </div>
                            <div class="flex items-baseline gap-1 text-[11px]">
                                <span class="font-bold text-gray-800 w-14">Status</span>
                                <span class="text-gray-500">:</span>
                                <span class="inline-flex items-center px-1.5 py-0 rounded-full text-[9px] font-medium bg-green-200 text-green-800">
                                    Active
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== PERMISSION TABLE ===== -->
            <div class="overflow-x-auto rounded-md border border-gray-200 mb-3">
                <table class="w-full min-w-[600px] border-collapse">
                    <!-- Table Header -->
                    <thead>
                        <tr class="text-[11px]">
                            <th class="text-left font-bold text-gray-800 bg-amber-50/70 px-2.5 py-1.5 border-b border-gray-200 w-1/3">Module / Menu</th>
                            <th class="text-center font-bold text-gray-800 bg-blue-50/70 px-1.5 py-1.5 border-b border-gray-200 w-1/6">
                                <div class="flex items-center justify-center gap-1">
                                    <i class="fas fa-eye text-blue-600 text-[9px]"></i> View
                                </div>
                            </th>
                            <th class="text-center font-bold text-gray-800 bg-green-50/70 px-1.5 py-1.5 border-b border-gray-200 w-1/6">
                                <div class="flex items-center justify-center gap-1">
                                    <i class="fas fa-plus text-green-600 text-[9px]"></i> Add
                                </div>
                            </th>
                            <th class="text-center font-bold text-gray-800 bg-orange-50/70 px-1.5 py-1.5 border-b border-gray-200 w-1/6">
                                <div class="flex items-center justify-center gap-1">
                                    <i class="fas fa-pencil text-orange-600 text-[9px]"></i> Edit
                                </div>
                            </th>
                            <th class="text-center font-bold text-gray-800 bg-red-50/70 px-1.5 py-1.5 border-b border-gray-200 w-1/6">
                                <div class="flex items-center justify-center gap-1">
                                    <i class="fas fa-trash text-red-600 text-[9px]"></i> Delete
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-[11px]">

                        <!-- Dashboard -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-home text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Dashboard</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                        </tr>

                        <!-- ====== STUDENT ENTRY (PARENT - COLLAPSIBLE) ====== -->
                        <tr class="hover:bg-gray-50 transition cursor-pointer select-none" data-toggle="student-entry-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-graduation-cap text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Student Entry</span>
                                    <i class="fas fa-chevron-up text-gray-400 text-[8px] ml-auto transition-transform duration-200" id="chevron-student-entry-group"></i>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                        </tr>

                        <!-- ↳ Student Registration (CHILD of Student Entry) -->
                        <tr class="hover:bg-gray-50 transition student-entry-group" data-group="student-entry-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5 pl-5 relative">
                                    <span class="absolute left-1 top-1/2 -translate-y-1/2 w-2.5 h-px bg-gray-300"></span>
                                    <span class="absolute left-1 top-0 w-px h-1/2 bg-gray-300"></span>
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-users text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Student Registration</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- ↳ Student Payment (CHILD of Student Entry) -->
                        <tr class="hover:bg-gray-50 transition student-entry-group" data-group="student-entry-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5 pl-5 relative">
                                    <span class="absolute left-1 top-1/2 -translate-y-1/2 w-2.5 h-px bg-gray-300"></span>
                                    <span class="absolute left-1 top-0 w-px h-1/2 bg-gray-300"></span>
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-credit-card text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Student Payment</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- ====== RECORDS (PARENT - COLLAPSIBLE, collapsed by default) ====== -->
                        <tr class="hover:bg-gray-50 transition cursor-pointer select-none" data-toggle="records-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-list text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Records</span>
                                    <i class="fas fa-chevron-right text-gray-400 text-[8px] ml-auto transition-transform duration-200" id="chevron-records-group"></i>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                        </tr>

                        <!-- ↳ Student Record (CHILD of Records) -->
                        <tr class="hover:bg-gray-50 transition records-group hidden" data-group="records-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5 pl-5 relative">
                                    <span class="absolute left-1 top-1/2 -translate-y-1/2 w-2.5 h-px bg-gray-300"></span>
                                    <span class="absolute left-1 top-0 w-px h-1/2 bg-gray-300"></span>
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-users text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Student Record</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- ↳ Payment Record (CHILD of Records) -->
                        <tr class="hover:bg-gray-50 transition records-group hidden" data-group="records-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5 pl-5 relative">
                                    <span class="absolute left-1 top-1/2 -translate-y-1/2 w-2.5 h-px bg-gray-300"></span>
                                    <span class="absolute left-1 top-0 w-px h-1/2 bg-gray-300"></span>
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-credit-card text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Payment Record</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- ↳ Balance Payments (CHILD of Records) -->
                        <tr class="hover:bg-gray-50 transition records-group hidden" data-group="records-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5 pl-5 relative">
                                    <span class="absolute left-1 top-1/2 -translate-y-1/2 w-2.5 h-px bg-gray-300"></span>
                                    <span class="absolute left-1 top-0 w-px h-1/2 bg-gray-300"></span>
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-globe text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Balance Payments</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- ↳ Ledger (CHILD of Records) -->
                        <tr class="hover:bg-gray-50 transition records-group hidden" data-group="records-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5 pl-5 relative">
                                    <span class="absolute left-1 top-1/2 -translate-y-1/2 w-2.5 h-px bg-gray-300"></span>
                                    <span class="absolute left-1 top-0 w-px h-1/2 bg-gray-300"></span>
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-book text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Ledger</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- ↳ Cash Memo Records (CHILD of Records) -->
                        <tr class="hover:bg-gray-50 transition records-group hidden" data-group="records-group">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5 pl-5 relative">
                                    <span class="absolute left-1 top-1/2 -translate-y-1/2 w-2.5 h-px bg-gray-300"></span>
                                    <span class="absolute left-1 top-0 w-px h-1/2 bg-gray-300"></span>
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-receipt text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Cash Memo Records</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- Bonafide -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-certificate text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Bonafide</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- Cash Memo -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-receipt text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Cash Memo</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- Fees Structure Master -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-cogs text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Fees Structure Master</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        </tr>

                        <!-- User Logs -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-file-alt text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">User Logs</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>
                        </tr>

                        <!-- Logout -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-2.5 py-1">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-red-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-sign-out-alt text-red-500 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">Logout</span>
                                </div>
                            </td>
                            <td class="text-center px-1.5 py-1">
                                <input type="checkbox" checked class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                            <td class="text-center px-1.5 py-1 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 text-gray-300">—</td>
                            <td class="text-center px-1.5 py-1 text-gray-300">—</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- ===== ACTION BUTTONS ===== -->
            <div class="flex flex-col sm:flex-row justify-end gap-2">
                <button id="cancelPermBtn" class="px-4 py-1.5 border border-gray-300 bg-white text-gray-700 font-semibold rounded-md hover:bg-gray-50 transition text-[11px] shadow-sm">
                    Cancel
                </button>
                <button id="savePermBtn" class="px-4 py-1.5 bg-orange-500 text-white font-semibold rounded-md hover:bg-orange-600 transition text-[11px] shadow-md flex items-center justify-center gap-1.5">
                    Save Permissions
                </button>
            </div>

        </div>

    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <!-- ============================================================
        DROPDOWN + PERMISSION SAVE / CANCEL LOGIC
        ============================================================ -->
    <script>
        (function() {
            // ============================================================
            // 1. DROPDOWN (COLLAPSIBLE) FUNCTIONALITY
            // ============================================================
            const toggleRows = document.querySelectorAll('[data-toggle]');

            // Initialize: Student Entry is expanded by default
            const studentEntryRows = document.querySelectorAll('[data-group="student-entry-group"]');
            studentEntryRows.forEach(row => row.classList.remove('hidden'));

            // Records is collapsed by default
            const recordsRows = document.querySelectorAll('[data-group="records-group"]');
            recordsRows.forEach(row => row.classList.add('hidden'));

            toggleRows.forEach(row => {
                row.addEventListener('click', function(e) {
                    // Don't toggle if the click was on a checkbox
                    if (e.target.type === 'checkbox') return;

                    const groupName = this.getAttribute('data-toggle');
                    const chevron = document.getElementById('chevron-' + groupName);
                    const childRows = document.querySelectorAll(`[data-group="${groupName}"]`);

                    if (!chevron || childRows.length === 0) return;

                    const isCurrentlyHidden = childRows[0].classList.contains('hidden');

                    // Toggle child rows
                    childRows.forEach(child => {
                        if (isCurrentlyHidden) {
                            child.classList.remove('hidden');
                        } else {
                            child.classList.add('hidden');
                        }
                    });

                    // Rotate chevron
                    if (isCurrentlyHidden) {
                        chevron.classList.remove('fa-chevron-right');
                        chevron.classList.add('fa-chevron-up');
                    } else {
                        chevron.classList.remove('fa-chevron-up');
                        chevron.classList.add('fa-chevron-right');
                    }
                });
            });

            // ============================================================
            // 2. PERMISSION SAVE / CANCEL LOGIC
            // ============================================================
            const saveBtn = document.getElementById('savePermBtn');
            const cancelBtn = document.getElementById('cancelPermBtn');

            saveBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                const permissions = [];
                checkboxes.forEach((cb, index) => {
                    if (cb.checked) {
                        permissions.push(index);
                    }
                });

                saveBtn.disabled = true;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Saving...';

                setTimeout(() => {
                    saveBtn.disabled = false;
                    saveBtn.innerHTML = 'Save Permissions';
                    alert('Permissions saved successfully! ✅');
                }, 800);
            });

            cancelBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to reset all permissions? This cannot be undone.')) {
                    location.reload();
                }
            });
        })();
    </script>
</body>

</html>