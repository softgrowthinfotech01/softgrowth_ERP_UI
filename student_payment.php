<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Fee Payment - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-10 mb-10 transition-all duration-200 flex flex-col items-center justify-center">
        <div class="w-full max-w-7xl">

            <!-- ============================================================ -->
            <!-- PAGE 1: STUDENT LIST -->
            <!-- ============================================================ -->
            <div id="listPage">

                <!-- Page Header -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 mb-4">
                    <div class="flex items-start justify-between gap-3 flex-wrap">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div>
                                <h1 class="text-lg font-bold text-gray-900 leading-tight">Student Fee Payment</h1>
                                 <p class="text-[11px] text-gray-500 mt-0.5">Record and manage cash/offline student fee payments.</p>
                            </div>
                        </div>
                        <nav class="flex items-center gap-1.5 text-[11px] text-gray-500">
                            <i class="fas fa-home text-orange-500"></i>
                            <span>Dashboard</span>
                            <i class="fas fa-chevron-right text-[9px] text-gray-400"></i>
                            <span>Students</span>
                            <i class="fas fa-chevron-right text-[9px] text-gray-400"></i>
                            <span class="text-orange-600 font-semibold">Fee Payment</span>
                        </nav>
                    </div>
                </div>

                <!-- Filter Bar -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Student Name</label>
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <input type="text" id="filterName" placeholder="Search student name"
                                    class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">ID Number</label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <input type="text" id="filterId" placeholder="Enter registration / ID number"
                                    class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">APAAR ID</label>
                            <div class="relative">
                                <i class="fas fa-fingerprint absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <input type="text" id="filterApaar" placeholder="Enter APAAR ID"
                                    class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            </div>
                        </div>
                        <div class="flex items-end gap-2">
                            <button type="button" id="searchBtn"
                                class="flex-1 px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center justify-center gap-2">
                                <i class="fas fa-search text-xs"></i> Search
                            </button>
                            <button type="button" id="resetBtn"
                                class="flex-1 px-4 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-sm shadow-sm flex items-center justify-center gap-2">
                                <i class="fas fa-redo text-xs"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Student Table -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1000px] border-collapse text-[11px]">
                            <thead>
                                <tr>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200 w-10">#</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200 w-16">Photo</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200">Student Name</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200">ID Number</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200">APAAR ID</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200">Course</th>
                                    <th class="text-right font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200">Total Fees (₹)</th>
                                    <th class="text-right font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200">Paid (₹)</th>
                                    <th class="text-right font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200">Pending (₹)</th>
                                    <th class="text-center font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200">Status</th>
                                    <th class="text-center font-bold text-gray-700 bg-gray-50 px-3 py-2.5 border-b border-gray-200 w-32">Action</th>
                                </tr>
                            </thead>
                            <tbody id="studentTableBody">
                                <!-- Populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- ============================================================ -->
            <!-- PAGE 2: ADD FEE PAYMENT -->
            <!-- ============================================================ -->
            <div id="addPaymentPage" class="hidden">

                <!-- Header -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 mb-4 flex items-center justify-between gap-3 flex-wrap">
                    <div class="flex items-center gap-3">
                        <button type="button" id="backToListBtn" class="w-9 h-9 rounded-lg bg-gray-100 hover:bg-orange-100 text-gray-600 hover:text-orange-600 flex items-center justify-center transition">
                            <i class="fas fa-arrow-left text-sm"></i>
                        </button>
                        <div class="w-10 h-10 rounded-lg bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-gray-900 leading-tight">Add Fee Payment</h1>
                            <p class="text-[14px] font-semibold text-gray-500 mt-0.5" id="addPageStudentLine">—</p>
                        </div>
                    </div>
                    <span class="text-[10px] bg-orange-100 text-orange-700 px-2.5 py-1 rounded-full font-semibold">
                        <i class="fas fa-user-shield text-[9px] mr-1"></i> Admin / User
                    </span>
                </div>

                <!-- Main Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                    <!-- LEFT: Add Fee Payment Form -->
                    <div class="lg:col-span-2 bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                        <div class="bg-orange-50 px-4 py-2.5 border-b border-orange-100 flex items-center gap-2">
                            <i class="fas fa-file-invoice-dollar text-orange-500 text-xs"></i>
                            <h3 class="font-bold text-gray-800 text-[13px]">Add Fee Payment</h3>
                        </div>

                        <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-3">

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Course Name</label>
                                <input type="text" id="pCourseName" readonly
                                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed focus:outline-none">
                            </div>

                            <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Payable Total</label>
                                <input type="text" id="pTotalFees" readonly
                                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Already Paid</label>
                                <input type="text" id="pAlreadyPaid" readonly
                                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Pending Fees</label>
                                <input type="text" id="pPendingFees" readonly
                                    class="w-full px-3 py-2 text-sm rounded-lg border border-red-200 bg-red-50 text-red-700 font-semibold cursor-not-allowed focus:outline-none">
                            </div>

                            <!-- Late Fees -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">
                                    Late Fees (₹)
                                </label>
                                <div class="relative">
                                    <i class="fas fa-hourglass-half absolute left-3 top-1/2 -translate-y-1/2 text-orange-500 text-xs"></i>
                                    <input type="number" id="pLateFees" placeholder="Enter late fees (optional)"
                                        class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-orange-200 bg-orange-50 text-gray-800 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                                <p class="text-[10px] text-gray-400 mt-1">Applied only if payment is delayed</p>
                            </div>

                            <!-- Installment Number -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">
                                    Installment Type <span class="text-gray-400 font-normal">(Optional)</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-list-ol absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <select id="pInstallmentNo" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 bg-white focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                        <option value="">Select installment (optional)</option>
                                        <option value="1st Installment">1st Installment</option>
                                        <option value="2nd Installment">2nd Installment</option>
                                        <option value="Full Payment">Full Payment</option>
                                    </select>
                                </div>
                                <p class="text-[10px] text-gray-400 mt-1">Must match one of the supported installment types.</p>
                            </div>

                            <!-- ============================================================ -->
                            <!-- NEW: FEE BREAKDOWN BOX (No Selection) -->
                            <!-- ============================================================ -->
                            <div class="md:col-span-2 bg-gray-50 border border-gray-200 rounded-lg overflow-hidden mt-1 mb-1">
                                <div class="bg-orange-100 px-3 py-2 border-b border-orange-200 flex items-center justify-between">
                                    <h4 class="text-[11px] font-bold text-orange-800 uppercase tracking-wide flex items-center gap-1.5">
                                        <i class="fas fa-list-ul"></i>fee categories 
                                    </h4>
                                    <span class="text-[10px] font-semibold text-orange-700 bg-orange-200/50 px-2 py-0.5 rounded">Read Only</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-px bg-gray-200 p-px">
                                    <!-- Tuition Fee -->
                                    <div class="bg-white p-2.5 flex items-center justify-between">
                                        <span class="text-[11.5px] text-gray-600 flex items-center gap-1.5"><i class="fas fa-book text-gray-400 w-4"></i> Tuition Fee</span>
                                        <span class="text-[12px] font-bold text-gray-800">₹5,000</span>
                                    </div>
                                    <!-- Admission Fee -->
                                    <div class="bg-white p-2.5 flex items-center justify-between">
                                        <span class="text-[11.5px] text-gray-600 flex items-center gap-1.5"><i class="fas fa-user-plus text-gray-400 w-4"></i> Admission Fee</span>
                                        <span class="text-[12px] font-bold text-gray-800">₹2,500</span>
                                    </div>
                                    <!-- Library Fee -->
                                    <div class="bg-white p-2.5 flex items-center justify-between">
                                        <span class="text-[11.5px] text-gray-600 flex items-center gap-1.5"><i class="fas fa-book-reader text-gray-400 w-4"></i> Library Fee</span>
                                        <span class="text-[12px] font-bold text-gray-800">₹1,500</span>
                                    </div>
                                    <!-- Transportation Fee -->
                                    <div class="bg-white p-2.5 flex items-center justify-between">
                                        <span class="text-[11.5px] text-gray-600 flex items-center gap-1.5"><i class="fas fa-bus text-gray-400 w-4"></i> Transportation</span>
                                        <span class="text-[12px] font-bold text-gray-800">₹3,000</span>
                                    </div>
                                    <!-- Exam Fee -->
                                    <div class="bg-white p-2.5 flex items-center justify-between">
                                        <span class="text-[11.5px] text-gray-600 flex items-center gap-1.5"><i class="fas fa-file-alt text-gray-400 w-4"></i> Exam Fee</span>
                                        <span class="text-[12px] font-bold text-gray-800">₹1,200</span>
                                    </div>
                                    <!-- Lab Fee -->
                                    <div class="bg-white p-2.5 flex items-center justify-between">
                                        <span class="text-[11.5px] text-gray-600 flex items-center gap-1.5"><i class="fas fa-flask text-gray-400 w-4"></i> Lab Fee</span>
                                        <span class="text-[12px] font-bold text-gray-800">₹1,800</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Amount -->
                            <div class="md:col-span-2">
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">
                                    Payment Amount (₹) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-rupee-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="number" id="pPaymentAmount" step="0.01" min="0.01" placeholder="Enter amount"
                                        class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                                <p class="text-[10px] text-gray-400 mt-1" id="pAmountHint">Amount cannot be more than pending fees.</p>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                    Payment Type <span class="text-red-500">*</span>
                                </label>
                                <div class="grid grid-cols-3 gap-2" id="paymentTypeGroup">
                                    <label class="payment-type-option cursor-pointer flex items-center justify-center gap-2 px-3 py-2.5 border-2 border-gray-200 rounded-lg hover:border-orange-400 transition text-sm font-medium text-gray-700" data-value="Online">
                                        <input type="radio" name="paymentType" value="Online" class="hidden">
                                        <i class="fas fa-globe text-green-600"></i> Online
                                    </label>
                                    <label class="payment-type-option cursor-pointer flex items-center justify-center gap-2 px-3 py-2.5 border-2 border-gray-200 rounded-lg hover:border-orange-400 transition text-sm font-medium text-gray-700" data-value="Google Pay">
                                        <input type="radio" name="paymentType" value="Google Pay" class="hidden">
                                        <i class="fab fa-google-pay text-blue-600"></i> Google Pay
                                    </label>
                                    <label class="payment-type-option cursor-pointer flex items-center justify-center gap-2 px-3 py-2.5 border-2 border-gray-200 rounded-lg hover:border-orange-400 transition text-sm font-medium text-gray-700" data-value="Cash">
                                        <input type="radio" name="paymentType" value="Cash" class="hidden">
                                        <i class="fas fa-money-bill-wave text-emerald-600"></i> Cash
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">
                                    Transaction Reference <span class="text-gray-400 font-normal">(Optional)</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-receipt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="pTransactionId" placeholder="TXN123456789"
                                        class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                                <p class="text-[10px] text-gray-400 mt-1">Optional cash receipt reference</p>
                            </div>

                            <div>
                                    <label class="block text-[11px] font-bold text-gray-700 mb-0.5">
                                    Payment Date <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="date" id="pPaymentDate"
                                        class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Remarks (Optional)</label>
                                <div class="relative">
                                    <i class="fas fa-comment-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                    <input type="text" id="pRemarks" placeholder="First installment"
                                        class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                </div>
                            </div>

                            <div class="md:col-span-2 flex justify-end gap-2 pt-1">
                                <button type="button" id="clearFormBtn"
                                    class="px-5 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-sm shadow-sm">
                                    Clear
                                </button>
                                <button type="button" id="savePaymentBtn"
                                    class="px-6 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center gap-2">
                                    <i class="fas fa-save text-xs"></i> Save Payment
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT: Payment Summary -->
                    <div class="lg:col-span-1 bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden self-start">
                        <div class="bg-orange-50 px-4 py-2.5 border-b border-orange-100 flex items-center gap-2">
                            <i class="fas fa-chart-pie text-orange-500 text-xs"></i>
                            <h3 class="font-bold text-gray-800 text-[13px]">Payment Summary</h3>
                        </div>

                        <div class="p-4 space-y-3 text-[12px]">
                            <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500 font-medium">Gross Fee</span>
                                <span class="font-bold text-gray-800" id="sGrossFee">₹0</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500 font-medium">Discount</span>
                                <span class="font-bold text-gray-800" id="sDiscount">₹0</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500 font-medium">Payable Total</span>
                                <span class="font-bold text-gray-800" id="sTotalFees">₹0</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-gray-100 pb-2"><span class="text-gray-500 font-medium">Completed Payments</span><span class="font-bold text-green-600" id="sPaid">₹0</span></div>
                            <div class="flex items-center justify-between border-b border-gray-100 pb-2"><span class="text-gray-500 font-medium">Remaining Balance</span><span class="font-bold text-red-600" id="sPending">₹0</span></div>
                            <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500 font-medium">Number of Installments</span>
                                <span class="font-bold text-gray-800" id="sInstallments">1</span>
                            </div>
                            <!-- LATE FEES -->
                            <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500 font-medium">Late Fees</span>
                                <span class="font-bold text-orange-600" id="sLateFees">₹0</span>
                            </div>
                            <div class="flex items-center justify-between pt-1">
                                <span class="text-gray-500 font-medium">Payment Status</span>
                                <span id="sStatus" class="text-[10px] font-semibold px-2 py-0.5 rounded-full bg-orange-100 text-orange-700">Partially Paid</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PAYMENT HISTORY -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mt-4">
                    <div class="bg-orange-50 px-4 py-2.5 border-b border-orange-100 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-history text-orange-500 text-xs"></i>
                            <h3 class="font-bold text-gray-800 text-[13px]">Payment History</h3>
                        </div>
                        <span class="text-[10px] text-gray-500" id="historyCount">0 entries</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[900px] border-collapse text-[11px]">
                            <thead>
                                <tr>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2 border-b border-gray-200 w-10">#</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2 border-b border-gray-200">Payment Date</th>
                                    <th class="text-right font-bold text-gray-700 bg-gray-50 px-3 py-2 border-b border-gray-200">Amount (₹)</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2 border-b border-gray-200">Payment Type</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2 border-b border-gray-200">Transaction ID</th>
                                    <th class="text-left font-bold text-gray-700 bg-gray-50 px-3 py-2 border-b border-gray-200">Remarks</th>
                                    <th class="text-center font-bold text-gray-700 bg-gray-50 px-3 py-2 border-b border-gray-200">Receipt</th>
                                </tr>
                            </thead>
                            <tbody id="historyBody">
                                <!-- Populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <!-- ============================================================ -->
    <!-- SCRIPT -->
    <!-- ============================================================ -->
    <script>
        (function() {
            // ============================================================
            // Students and balances are loaded from the Laravel API.
            // ============================================================
            let students = [{
                    id: 'SGI00025',
                    name: 'Nayanshree Ramteke',
                    apaar: '1234 5678 9012',
                    course: 'Front-End Development',
                    batch: 'Oct 2026',
                    totalFees: 15000,
                    paid: 5000,
                    photo: 'https://i.pravatar.cc/80?img=47',
                    payments: [{
                        inst: 1,
                        date: '2026-10-10',
                        amount: 5000,
                        mode: 'Online',
                        txn: 'TXN123456789',
                        remarks: 'First installment'
                    }]
                },
                {
                    id: 'SGI00026',
                    name: 'Rohit Sharma',
                    apaar: '2345 6789 0123',
                    course: 'React Developer',
                    batch: 'Aug 2026',
                    totalFees: 20000,
                    paid: 20000,
                    photo: 'https://i.pravatar.cc/80?img=12',
                    payments: [{
                            inst: 1,
                            date: '2026-08-15',
                            amount: 10000,
                            mode: 'Online',
                            txn: 'TXN223456789',
                            remarks: 'First installment'
                        },
                        {
                            inst: 2,
                            date: '2026-09-20',
                            amount: 10000,
                            mode: 'Google Pay',
                            txn: 'GPAY99887766',
                            remarks: 'Second installment'
                        }
                    ]
                },
                {
                    id: 'SGI00027',
                    name: 'Priya Deshmukh',
                    apaar: '3456 7890 1234',
                    course: 'Software Testing',
                    batch: 'Oct 2026',
                    totalFees: 18000,
                    paid: 8000,
                    photo: 'https://i.pravatar.cc/80?img=45',
                    payments: [{
                        inst: 1,
                        date: '2026-10-01',
                        amount: 8000,
                        mode: 'Cash',
                        txn: '—',
                        remarks: 'First installment'
                    }]
                },
                {
                    id: 'SGI00028',
                    name: 'Saurabh Jain',
                    apaar: '4567 8901 2345',
                    course: 'Python Development',
                    batch: 'Sep 2026',
                    totalFees: 12000,
                    paid: 0,
                    photo: 'https://i.pravatar.cc/80?img=68',
                    payments: []
                },
                {
                    id: 'SGI00029',
                    name: 'Sneha Patil',
                    apaar: '5678 9012 3456',
                    course: 'Data Science',
                    batch: 'Jul 2026',
                    totalFees: 45000,
                    paid: 25000,
                    photo: 'https://i.pravatar.cc/80?img=32',
                    payments: [{
                            inst: 1,
                            date: '2026-07-05',
                            amount: 15000,
                            mode: 'Online',
                            txn: 'TXN445566778',
                            remarks: 'First installment'
                        },
                        {
                            inst: 2,
                            date: '2026-09-10',
                            amount: 10000,
                            mode: 'Google Pay',
                            txn: 'GPAY11223344',
                            remarks: 'Second installment'
                        }
                    ]
                }
            ];

            // ============================================================
            // HELPERS
            // ============================================================
            function formatCurrency(n) {
                return '₹' + Number(n || 0).toLocaleString('en-IN');
            }

            function formatDate(d) {
                if (!d) return '—';
                const dt = new Date(d);
                if (isNaN(dt)) return d;
                return dt.toLocaleDateString('en-IN', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                });
            }

            function todayISO() {
                const d = new Date();
                const yyyy = d.getFullYear();
                const mm = String(d.getMonth() + 1).padStart(2, '0');
                const dd = String(d.getDate()).padStart(2, '0');
                return `${yyyy}-${mm}-${dd}`;
            }

            function statusOf(s) {
                if (s.paid <= 0) return {
                    label: 'Unpaid',
                    cls: 'bg-red-100 text-red-700'
                };
                if (s.paid >= s.totalFees) return {
                    label: 'Fully Paid',
                    cls: 'bg-green-100 text-green-700'
                };
                return {
                    label: 'Partially Paid',
                    cls: 'bg-orange-100 text-orange-700'
                };
            }

            // ============================================================
            // DOM REFS
            // ============================================================
            const listPage = document.getElementById('listPage');
            const addPaymentPage = document.getElementById('addPaymentPage');
            const studentTableBody = document.getElementById('studentTableBody');
            const filterName = document.getElementById('filterName');
            const filterId = document.getElementById('filterId');
            const filterApaar = document.getElementById('filterApaar');
            const searchBtn = document.getElementById('searchBtn');
            const resetBtn = document.getElementById('resetBtn');
            const backToListBtn = document.getElementById('backToListBtn');

            const pCourseName = document.getElementById('pCourseName');
            const pTotalFees = document.getElementById('pTotalFees');
            const pAlreadyPaid = document.getElementById('pAlreadyPaid');
            const pPendingFees = document.getElementById('pPendingFees');
            const pLateFees = document.getElementById('pLateFees');
            const pPaymentAmount = document.getElementById('pPaymentAmount');
            const pInstallmentNo = document.getElementById('pInstallmentNo');
            const pTransactionId = document.getElementById('pTransactionId');
            const pPaymentDate = document.getElementById('pPaymentDate');
            const pRemarks = document.getElementById('pRemarks');
            const pAmountHint = document.getElementById('pAmountHint');
            const savePaymentBtn = document.getElementById('savePaymentBtn');
            const clearFormBtn = document.getElementById('clearFormBtn');
            const addPageStudentLine = document.getElementById('addPageStudentLine');

            const sTotalFees = document.getElementById('sTotalFees');
            const sGrossFee = document.getElementById('sGrossFee');
            const sDiscount = document.getElementById('sDiscount');
            const sPaid = document.getElementById('sPaid');
            const sPending = document.getElementById('sPending');
            const sInstallments = document.getElementById('sInstallments');
            const sLateFees = document.getElementById('sLateFees');
            const sStatus = document.getElementById('sStatus');

            const historyBody = document.getElementById('historyBody');
            const historyCount = document.getElementById('historyCount');

            let currentStudent = null;
            let selectedPaymentType = '';
            let receiptCounter = 1;

            // ============================================================
            // RENDER STUDENT TABLE
            // ============================================================
            function renderTable(list) {
                studentTableBody.innerHTML = '';
                if (!list || list.length === 0) {
                    studentTableBody.innerHTML = `<tr><td colspan="11" class="text-center text-gray-500 py-6 text-[12px]">
                    <i class="fas fa-search mr-1.5 text-orange-400"></i> No students found.
                </td></tr>`;
                    return;
                }
                list.forEach((s, idx) => {
                    const st = statusOf(s);
                    const pending = Math.max(s.totalFees - s.paid, 0);
                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-orange-50/40 transition';
                    tr.innerHTML = `
                    <td class="px-3 py-2 border-b border-gray-100 text-gray-500">${idx + 1}</td>
                    <td class="px-3 py-2 border-b border-gray-100">
                        <img src="${s.photo}" alt="${s.name}" class="w-9 h-9 rounded-full object-cover border border-gray-200">
                    </td>
                    <td class="px-3 py-2 border-b border-gray-100 font-medium text-gray-800">${s.name}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-gray-700">${s.id}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-gray-700">${s.apaar}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-gray-700">${s.course}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-right font-semibold text-gray-800">${s.totalFees.toLocaleString('en-IN')}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-right font-semibold text-green-600">${s.paid.toLocaleString('en-IN')}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-right font-semibold text-red-600">${pending.toLocaleString('en-IN')}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-center">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold ${st.cls}">${st.label}</span>
                    </td>
                    <td class="px-3 py-2 border-b border-gray-100 text-center">
                        <button class="pay-fees-btn inline-flex items-center gap-1.5 px-3 py-1.5 bg-orange-500 hover:bg-orange-600 text-white text-[10px] font-semibold rounded-md shadow-sm transition" data-id="${s.id}">
                            <i class="fas fa-credit-card text-[10px]"></i> Pay Fees
                        </button>
                    </td>
                `;
                    studentTableBody.appendChild(tr);
                });

                studentTableBody.querySelectorAll('.pay-fees-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const student = students.find(x => x.id === id);
                        if (student) openPaymentPage(student);
                    });
                });
            }

            // ============================================================
            // SEARCH / RESET
            // ============================================================
            function doSearch() {
                const nameQ = filterName.value.trim().toLowerCase();
                const idQ = filterId.value.trim().toLowerCase();
                const apaarQ = filterApaar.value.trim().toLowerCase().replace(/\s/g, '');

                const filtered = students.filter(s => {
                    const mName = !nameQ || s.name.toLowerCase().includes(nameQ);
                    const mId = !idQ || s.id.toLowerCase().includes(idQ);
                    const mApaar = !apaarQ || s.apaar.toLowerCase().replace(/\s/g, '').includes(apaarQ);
                    return mName && mId && mApaar;
                });
                renderTable(filtered);
            }

            searchBtn.addEventListener('click', doSearch);
            resetBtn.addEventListener('click', function() {
                filterName.value = '';
                filterId.value = '';
                filterApaar.value = '';
                renderTable(students);
            });
            [filterName, filterId, filterApaar].forEach(i => {
                i.addEventListener('keydown', e => {
                    if (e.key === 'Enter') doSearch();
                });
            });

            // ============================================================
            // OPEN PAYMENT PAGE
            // ============================================================
            function openPaymentPage(student) {
                currentStudent = student;
                listPage.classList.add('hidden');
                addPaymentPage.classList.remove('hidden');

                addPageStudentLine.textContent = `${student.name} · ID: ${student.id} · APAAR: ${student.apaar} · Course: ${student.course}`;

                pCourseName.value = student.course;
                pTotalFees.value = student.totalFees.toLocaleString('en-IN');
                pAlreadyPaid.value = student.paid.toLocaleString('en-IN');
                const pending = Math.max(student.totalFees - student.paid, 0);
                pPendingFees.value = pending.toLocaleString('en-IN');
                pAmountHint.textContent = `Amount cannot be more than pending fees (₹ ${pending.toLocaleString('en-IN')})`;

                // Reset form
                pPaymentAmount.value = '';
                pInstallmentNo.value = '';
                pTransactionId.value = '';
                pPaymentDate.value = todayISO();
                pPaymentDate.max = todayISO();
                pRemarks.value = '';
                pLateFees.value = '';
                selectedPaymentType = '';
                document.querySelectorAll('.payment-type-option').forEach(el => {
                    el.classList.remove('border-orange-500', 'bg-orange-50', 'text-orange-700');
                    el.classList.add('border-gray-200', 'text-gray-700');
                });

                // Summary
                sTotalFees.textContent = formatCurrency(student.totalFees);
                sPaid.textContent = formatCurrency(student.paid);
                sPending.textContent = formatCurrency(pending);
                const installmentCount = student.payments.length > 0 ?
                    Math.max(...student.payments.map(p => p.inst || 0)) :
                    0;
                sInstallments.textContent = installmentCount === 0 ? '0' : String(installmentCount);
                sLateFees.textContent = formatCurrency(0);

                const st = statusOf(student);
                sStatus.textContent = st.label;
                sStatus.className = 'text-[10px] font-semibold px-2 py-0.5 rounded-full ' + st.cls;

                renderHistory();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            // ============================================================
            // PAYMENT TYPE SELECT
            // ============================================================
            document.querySelectorAll('.payment-type-option').forEach(el => {
                el.addEventListener('click', function() {
                    document.querySelectorAll('.payment-type-option').forEach(o => {
                        o.classList.remove('border-orange-500', 'bg-orange-50', 'text-orange-700');
                        o.classList.add('border-gray-200', 'text-gray-700');
                    });
                    this.classList.remove('border-gray-200', 'text-gray-700');
                    this.classList.add('border-orange-500', 'bg-orange-50', 'text-orange-700');
                    selectedPaymentType = this.getAttribute('data-value');
                });
            });

            // ============================================================
            // CLEAR FORM
            // ============================================================
            clearFormBtn.addEventListener('click', function() {
                pPaymentAmount.value = '';
                pInstallmentNo.value = '';
                pTransactionId.value = '';
                pPaymentDate.value = todayISO();
                pRemarks.value = '';
                pLateFees.value = '';
                selectedPaymentType = '';
                document.querySelectorAll('.payment-type-option').forEach(el => {
                    el.classList.remove('border-orange-500', 'bg-orange-50', 'text-orange-700');
                    el.classList.add('border-gray-200', 'text-gray-700');
                });
            });

            // ============================================================
            // RENDER HISTORY
            // ============================================================
            function renderHistory() {
                historyBody.innerHTML = '';
                if (!currentStudent || currentStudent.payments.length === 0) {
                    historyBody.innerHTML = `<tr><td colspan="7" class="text-center text-gray-500 py-4 text-[11px]">
                    <i class="fas fa-info-circle mr-1"></i> No payments recorded yet.
                </td></tr>`;
                    historyCount.textContent = '0 entries';
                    return;
                }
                historyCount.textContent = currentStudent.payments.length + ' entr' + (currentStudent.payments.length === 1 ? 'y' : 'ies');

                currentStudent.payments.forEach((p, i) => {
                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-orange-50/40 transition';
                    tr.innerHTML = `
                    <td class="px-3 py-2 border-b border-gray-100 text-gray-500">${i + 1}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-gray-700">${formatDate(p.date)}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-right font-semibold text-gray-800">${formatCurrency(p.amount)}</td>
                    <td class="px-3 py-2 border-b border-gray-100">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-medium ${
                            p.mode === 'Cash' ? 'bg-yellow-100 text-yellow-800' :
                            p.mode === 'Google Pay' ? 'bg-blue-100 text-blue-800' :
                            'bg-green-100 text-green-800'
                        }">
                            <i class="fas ${
                                p.mode === 'Cash' ? 'fa-money-bill-wave' :
                                p.mode === 'Google Pay' ? 'fa-mobile-alt' :
                                'fa-globe'
                            } text-[9px]"></i>
                            ${p.mode}
                        </span>
                    </td>
                    <td class="px-3 py-2 border-b border-gray-100 text-gray-600 font-mono text-[10px]">${p.txn || '—'}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-gray-600">${p.remarks || '—'}</td>
                    <td class="px-3 py-2 border-b border-gray-100 text-center">
                        <button class="view-receipt-btn inline-flex items-center gap-1 px-2 py-1 bg-blue-50 hover:bg-blue-100 text-blue-700 text-[10px] font-semibold rounded-md transition" data-index="${i}">
                            <i class="fas fa-receipt text-[9px]"></i> View Receipt
                        </button>
                        ${p.id ? `<button class="edit-payment-btn px-2 py-1 bg-amber-50 text-amber-700 rounded-md" data-id="${p.id}" data-index="${i}">Edit</button><button class="delete-payment-btn px-2 py-1 bg-red-50 text-red-700 rounded-md" data-id="${p.id}">Remove</button>` : ''}
                    </td>
                `;
                    historyBody.appendChild(tr);
                });

                historyBody.querySelectorAll('.view-receipt-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const idx = parseInt(this.getAttribute('data-index'), 10);
                        openReceipt(currentStudent.payments[idx], false);
                    });
                });
                historyBody.querySelectorAll('.edit-payment-btn').forEach(btn => btn.addEventListener('click', async () => {
                    const payment = currentStudent.payments[Number(btn.dataset.index)];
                    const amount = prompt('Correct payment amount', payment.amount);
                    if (amount === null) return;
                    if (!/^(?:\d+)(?:\.\d{1,2})?$/.test(amount) || Number(amount) <= 0) { alert('Enter a positive amount with at most two decimals.'); return; }
                    const date = prompt('Correct payment date (YYYY-MM-DD)', payment.date);
                    if (!date || date > todayISO()) { alert('Payment date cannot be in the future.'); return; }
                    try { await apiRequest(`/student-payments/${btn.dataset.id}`, {method:'PUT', body:JSON.stringify({amount_paid:amount, payment_date:date, payment_method:'Cash', installment_type:payment.inst, description:payment.remarks, transaction_reference:payment.txn})}); await refreshSummary(); }
                    catch (error) { alert(error.message); }
                }));
                historyBody.querySelectorAll('.delete-payment-btn').forEach(btn => btn.addEventListener('click', async () => {
                    if (!confirm('Remove this payment? It will no longer count toward the active balance.')) return;
                    try { await apiRequest(`/student-payments/${btn.dataset.id}`, {method:'DELETE'}); await refreshSummary(); }
                    catch (error) { alert(error.message); }
                }));
            }

            // ============================================================
            // SAVE PAYMENT → OPENS RECEIPT
            // ============================================================
            savePaymentBtn.addEventListener('click', function() {
                saveCashPayment();
                return;
                if (!currentStudent) return;

                const amount = parseFloat(pPaymentAmount.value);
                const instDigit = (pInstallmentNo.value || '').trim();
                const mode = selectedPaymentType;
                const date = pPaymentDate.value;
                const txn = pTransactionId.value.trim();
                const remarks = pRemarks.value.trim();
                const lateFees = parseFloat(pLateFees.value) || 0;

                // Validations
                if (!amount || amount <= 0) {
                    alert('Please enter a valid payment amount.');
                    return;
                }
                const pending = currentStudent.totalFees - currentStudent.paid;
                if (amount > pending) {
                    alert(`Amount exceeds pending fees (₹ ${pending.toLocaleString('en-IN')}).`);
                    return;
                }
                if (!instDigit || !/^\d$/.test(instDigit) || Number(instDigit) < 1) {
                    alert('Please enter a valid installment number (single digit like 1, 2, 3).');
                    return;
                }
                if (!mode) {
                    alert('Please select a payment type.');
                    return;
                }
                if (!date) {
                    alert('Please select a payment date.');
                    return;
                }
                if ((mode === 'Online' || mode === 'Google Pay') && !txn) {
                    alert('Transaction ID is required for Online and Google Pay payments.');
                    return;
                }

                // Save payment
                const payment = {
                    inst: Number(instDigit),
                    date: date,
                    amount: amount,
                    mode: mode,
                    txn: txn || '—',
                    remarks: remarks,
                    lateFees: lateFees
                };
                currentStudent.payments.push(payment);
                currentStudent.paid += amount;

                // Reset form
                clearFormBtn.click();

                // Update summary
                const newPending = Math.max(currentStudent.totalFees - currentStudent.paid, 0);
                sPaid.textContent = formatCurrency(currentStudent.paid);
                sPending.textContent = formatCurrency(newPending);
                sInstallments.textContent = String(Math.max(...currentStudent.payments.map(p => p.inst || 0)));
                sLateFees.textContent = formatCurrency(lateFees);
                pAlreadyPaid.value = currentStudent.paid.toLocaleString('en-IN');
                pPendingFees.value = newPending.toLocaleString('en-IN');
                pAmountHint.textContent = `Amount cannot be more than pending fees (₹ ${newPending.toLocaleString('en-IN')})`;

                const st = statusOf(currentStudent);
                sStatus.textContent = st.label;
                sStatus.className = 'text-[10px] font-semibold px-2 py-0.5 rounded-full ' + st.cls;

                renderHistory();

                // ============================================================
                // OPEN PAYMENT RECEIPT IN NEW TAB
                // ============================================================
                openReceipt(payment, true);
            });

            // ============================================================
            // OPEN RECEIPT IN NEW TAB
            // ============================================================
            function openReceipt(payment, isNew) {
                const receiptNo = 'SGI-REC-' + String(receiptCounter).padStart(4, '0');
                if (isNew) receiptCounter++;

                const params = new URLSearchParams({
                    receipt_no: receiptNo,
                    name: currentStudent.name,
                    reg_id: currentStudent.id,
                    apaar: currentStudent.apaar,
                    course: currentStudent.course,
                    batch: currentStudent.batch || '—',
                    total_fees: currentStudent.totalFees,
                    paid: currentStudent.paid,
                    pending: Math.max(currentStudent.totalFees - currentStudent.paid, 0),
                    pay_amount: payment.amount,
                    pay_type: payment.mode,
                    installment_type: payment.inst || '',
                    txn: payment.txn || '—',
                    pay_date: payment.date,
                    remarks: payment.remarks || '—',
                    late_fees: payment.lateFees || 0,
                    gross_fee: currentStudent.totalFees,
                    discount_amount: currentStudent.discount || 0,
                    payable_total: currentStudent.payable ?? currentStudent.totalFees,
                    completed_payments: currentStudent.paid,
                    remaining_balance: currentStudent.remaining ?? Math.max(0, currentStudent.payable - currentStudent.paid),
                    fee_items: JSON.stringify(currentStudent.summary?.fee_items || [])
                });

                // Open receipt page in new tab
                window.open('payment-receipt.php?' + params.toString(), '_blank');
            }

            // ============================================================
            // BACK TO LIST
            // ============================================================
            backToListBtn.addEventListener('click', function() {
                addPaymentPage.classList.add('hidden');
                listPage.classList.remove('hidden');
                currentStudent = null;
                renderTable(students);
            });

            // ============================================================
            const apiRoot = (typeof url !== 'undefined' ? url : '').replace(/\/$/, '');
            const apiToken = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');
            document.querySelectorAll('.payment-type-option').forEach(option => { if (option.dataset.value !== 'Cash') option.remove(); });
            const cashOption = document.querySelector('.payment-type-option[data-value="Cash"]');
            if (cashOption) { cashOption.classList.add('border-orange-500', 'bg-orange-50', 'text-orange-700'); selectedPaymentType = 'Cash'; }
            async function apiRequest(path, options = {}) {
                const response = await fetch(`${apiRoot}${path}`, { ...options, headers: { 'Authorization': `Bearer ${apiToken}`, 'Accept': 'application/json', 'Content-Type': 'application/json', ...(options.headers || {}) } });
                const body = await response.json().catch(() => ({}));
                if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href = 'login.php'; throw new Error('Session expired'); }
                if (response.status === 403) throw new Error('You do not have permission to perform this action.');
                if (response.status === 404) throw new Error(body.message || 'Student, fee summary, or payment was not found.');
                if (response.status === 422) throw new Error(body.message || Object.values(body.errors || {}).flat().join('\n') || 'Please check the payment details.');
                if (!response.ok) throw new Error(body.message || 'The request failed.');
                return body.data?.data ?? body.data ?? body;
            }
            function moneyValue(object, ...keys) { for (const key of keys) if (object?.[key] != null && Number.isFinite(Number(object[key]))) return Number(object[key]); return 0; }
            async function refreshSummary() {
                const summary = await apiRequest(`/students/${currentStudent.dbId}/fee-summary`);
                currentStudent.summary = summary;
                currentStudent.totalFees = moneyValue(summary, 'gross_fee', 'full_fees', 'total_fees');
                currentStudent.discount = moneyValue(summary, 'discount_amount', 'discount');
                currentStudent.payable = moneyValue(summary, 'payable_total', 'payable_fees', 'net_fees') || Math.max(0, currentStudent.totalFees - currentStudent.discount);
                currentStudent.paid = moneyValue(summary, 'completed_payments', 'total_paid', 'paid_amount', 'paid_fees');
                currentStudent.remaining = summary.remaining_balance != null || summary.balance_amount != null || summary.pending_fees != null ? moneyValue(summary, 'remaining_balance', 'balance_amount', 'pending_fees') : Math.max(0, currentStudent.payable - currentStudent.paid);
                currentStudent.payments = (summary.payments || summary.payment_history || []).map(p => ({...p, id:p.id || p.payment_id, date:p.payment_date || p.date, amount:p.amount_paid ?? p.amount, mode:p.payment_method || p.mode || 'Cash', txn:p.transaction_reference || p.transaction_id || p.txn, remarks:p.description || p.remarks, inst:p.installment_type || p.inst}));
                pTotalFees.value = formatCurrency(currentStudent.payable);
                pAlreadyPaid.value = formatCurrency(currentStudent.paid);
                pPendingFees.value = formatCurrency(currentStudent.remaining);
                sTotalFees.textContent = formatCurrency(currentStudent.payable);
                sGrossFee.textContent = formatCurrency(currentStudent.totalFees);
                sDiscount.textContent = formatCurrency(currentStudent.discount);
                sPaid.textContent = formatCurrency(currentStudent.paid);
                sPending.textContent = formatCurrency(currentStudent.remaining);
                pPaymentAmount.max = currentStudent.remaining;
                pAmountHint.textContent = `Amount cannot exceed remaining balance (${formatCurrency(currentStudent.remaining)}).`;
                renderHistory();
                renderTable(students);
            }
            async function loadApiStudents() {
                if (!apiToken) { alert('Authentication token missing. Please log in again.'); window.location.href = 'login.php'; return; }
                try {
                    const result = await apiRequest('/students');
                    const rows = Array.isArray(result) ? result : (result.data || result.students || []);
                    students = rows.map(s => ({ dbId: s.id, id: String(s.student_id || s.registration_id || s.id), name: s.student_name || s.name || 'Student', apaar: s.abc_id || '—', course: s.class?.class_name || s.course || s.class_name || '—', batch: s.student_batch || '—', totalFees: Number(s.total_fees || s.full_fees || 0), paid: 0, photo: s.passport_photo || '', payments: [] }));
                    renderTable(students);
                } catch (error) { alert(error.message); }
            }
            async function saveCashPayment() {
                if (!currentStudent) return;
                const amountText = pPaymentAmount.value.trim();
                const amount = Number(amountText);
                const date = pPaymentDate.value;
                const today = todayISO();
                if (!/^(?:\d+)(?:\.\d{1,2})?$/.test(amountText) || !Number.isFinite(amount) || amount <= 0) { alert('Enter a positive amount with at most two decimal places.'); return; }
                if (amount > currentStudent.remaining) { alert(`Amount exceeds remaining balance (${formatCurrency(currentStudent.remaining)}).`); return; }
                if (!date || date > today) { alert('Payment date is required and cannot be in the future.'); return; }
                try {
                    const payment = await apiRequest('/student-payments', {method:'POST', body:JSON.stringify({abc_id:currentStudent.dbId, amount_paid:amountText, payment_date:date, payment_method:'Cash', installment_type:pInstallmentNo.value.trim() || undefined, description:pRemarks.value.trim() || undefined, transaction_reference:pTransactionId.value.trim() || undefined})});
                    const receipt = payment.payment || payment;
                    await refreshSummary();
                    openReceipt({amount:amount, mode:'Cash', date:date, txn:receipt.transaction_reference || pTransactionId.value.trim() || '—', remarks:pRemarks.value.trim(), inst:pInstallmentNo.value, lateFees:0}, true);
                    clearFormBtn.click();
                } catch (error) { alert(error.message); }
            }
            const originalOpenPaymentPage = openPaymentPage;
            openPaymentPage = function(student) {
                if (!student.dbId) { alert('Student database ID is not available.'); return; }
                originalOpenPaymentPage(student);
                refreshSummary().catch(error => alert(error.message));
            };
            // INIT
            // ============================================================
            loadApiStudents();
        })();
    </script>
</body>

</html>
