<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Receipt - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        html { scroll-behavior: smooth; }
        @media print {
            body { background: #fff !important; padding: 0 !important; margin: 0 !important; }
            .no-print { display: none !important; }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 antialiased min-h-screen w-full overflow-x-hidden">

    <!-- SCROLLABLE WRAPPER -->
    <div class="min-h-screen w-full flex justify-center px-3 sm:px-5 py-4 sm:py-6">
        <div class="w-full max-w-md my-auto">

            <!-- ============================================================ -->
            <!-- RECEIPT CARD -->
            <!-- ============================================================ -->
            <div id="receiptCard" class="bg-white w-full shadow-sm border border-gray-200 rounded-sm overflow-hidden">

                <!-- Top label bar -->
                <div class="px-4 pt-3">
                    <h1 class="text-[12px] font-bold text-gray-900">Payment Receipt</h1>
                </div>

                <!-- HEADER: Logo + Company + Badge -->
                <div class="px-4 pt-2 pb-2 flex items-start justify-between gap-2 flex-wrap">
                    <div class="flex items-start gap-2">
                        <div class="w-10 h-10 rounded-full border-2 border-orange-500 flex items-center justify-center flex-shrink-0 bg-white">
                            <i class="fas fa-cubes text-orange-500 text-sm"></i>
                        </div>
                        <div class="pt-0">
                            <h2 class="text-[12px] font-bold text-gray-900 leading-tight">Softgrowth Infotech</h2>
                            <p class="text-[9px] text-gray-600 mt-0.5">Datada, Chandrapur | 7447755280</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 pt-0.5">
                        <span class="inline-block bg-orange-500 text-white text-[9px] font-bold px-2 py-1 rounded-sm">
                            Payment Receipt
                        </span>
                    </div>
                </div>

                <!-- Receipt No. & Date -->
                <div class="px-4 pb-2 flex justify-end">
                    <div class="text-[10px] space-y-0.5">
                        <div class="flex">
                            <span class="w-20 text-gray-700 font-semibold">Receipt No.</span>
                            <span class="text-gray-700 mr-1">:</span>
                            <span class="text-gray-900 font-bold">SGI-REC-0001</span>
                        </div>
                        <div class="flex">
                            <span class="w-20 text-gray-700 font-semibold">Date</span>
                            <span class="text-gray-700 mr-1">:</span>
                            <span class="text-gray-900 font-bold">10-10-2026</span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <!-- STUDENT DETAILS -->
                <div class="px-4 py-1.5 bg-orange-50 border-b border-orange-100">
                    <h3 class="text-[10px] font-bold text-gray-900">Student Details</h3>
                </div>
                <div class="px-4 py-2 space-y-1 text-[10.5px]">
                    <div class="flex flex-wrap">
                        <span class="w-20 text-gray-600">Name</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">Nayanshree Ramteke</span>
                    </div>
                    <div class="flex flex-wrap">
                        <span class="w-20 text-gray-600">Reg. ID</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">SGI00025</span>
                    </div>
                    <div class="flex flex-wrap">
                        <span class="w-20 text-gray-600">Course</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">Front-End Development</span>
                    </div>
                    <div class="flex flex-wrap">
                        <span class="w-20 text-gray-600">Batch</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">Oct 2026</span>
                    </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <!-- ============================================================ -->
                <!-- FEE CATEGORIES BREAKDOWN -->
                <!-- ============================================================ -->
                <div class="px-4 py-1.5 bg-orange-50 border-b border-orange-100 flex items-center justify-between">
                    <h3 class="text-[10px] font-bold text-gray-900">Fee Categories</h3>
                </div>
                <div class="px-4 py-2">
                    <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-[10px]">
                        <div class="flex justify-between border-b border-gray-100 pb-0.5">
                            <span class="text-gray-600">Tuition Fee</span>
                            <span class="font-semibold text-gray-900">₹5,000</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-0.5">
                            <span class="text-gray-600">Admission Fee</span>
                            <span class="font-semibold text-gray-900">₹2,500</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-0.5">
                            <span class="text-gray-600">Exam Fee</span>
                            <span class="font-semibold text-gray-900">₹1,200</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-0.5">
                            <span class="text-gray-600">Library Fee</span>
                            <span class="font-semibold text-gray-900">₹1,500</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-0.5">
                            <span class="text-gray-600">Transportation</span>
                            <span class="font-semibold text-gray-900">₹3,000</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-0.5">
                            <span class="text-gray-600">Lab Fee</span>
                            <span class="font-semibold text-gray-900">₹1,800</span>
                        </div>
                    </div>
                    
                    <!-- NEW: Category Total -->
                    <div class="mt-2 pt-1.5 border-t border-gray-300 flex justify-between items-center text-[11px]">
                        <span class="font-bold text-gray-800">Total Category Fees</span>
                        <span class="font-bold text-orange-600">₹15,000</span>
                    </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <!-- PAYMENT DETAILS -->
                <div class="px-4 py-1.5 bg-orange-50 border-y border-orange-100">
                    <h3 class="text-[10px] font-bold text-gray-900">Payment Details</h3>
                </div>
                <div class="px-4 py-2 space-y-1 text-[10.5px]">
                    <div class="flex flex-wrap">
                        <span class="w-28 text-gray-600">Payment Amount</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">5,000</span>
                    </div>
                    <div class="flex flex-wrap">
                        <span class="w-28 text-gray-600">Payment Type</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">Online</span>
                    </div>
                    <div class="flex flex-wrap">
                        <span class="w-28 text-gray-600">Transaction ID</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">TXN123456789</span>
                    </div>
                    <div class="flex flex-wrap">
                        <span class="w-28 text-gray-600">Payment Date</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">10-10-2026</span>
                    </div>
                    <div class="flex flex-wrap">
                        <span class="w-28 text-gray-600">Remarks</span>
                        <span class="text-gray-600 mr-2">:</span>
                        <span class="text-gray-900 font-semibold">First installment</span>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="border-t border-gray-200 px-4 py-2.5 text-center">
                    <p class="text-[10.5px] font-semibold text-orange-500">
                        Thank you for your payment!
                    </p>
                </div>

            </div>

            <!-- ACTION BUTTONS: Print + Download -->
            <div class="no-print mt-3 flex items-center justify-end gap-2 flex-wrap">
                <button type="button" id="printBtn"
                        class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-md hover:bg-gray-50 transition text-[11px] shadow-sm flex items-center gap-1.5">
                    <i class="fas fa-print text-[10px]"></i> Print
                </button>
                <button type="button" id="downloadBtn"
                        class="px-3 py-1.5 bg-orange-500 text-white font-semibold rounded-md hover:bg-orange-600 transition text-[11px] shadow-sm flex items-center gap-1.5">
                    <i class="fas fa-download text-[10px]"></i> Download
                </button>
            </div>

        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        (function() {
            // PRINT
            document.getElementById('printBtn').addEventListener('click', function() {
                window.print();
            });

            // DOWNLOAD
            document.getElementById('downloadBtn').addEventListener('click', function() {
                const receiptHTML = document.getElementById('receiptCard').outerHTML;

                const fullHTML = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Receipt - SGI-REC-0001</title>
    <script src="https://cdn.tailwindcss.com"><\/script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        html { scroll-behavior: smooth; }
        @media print {
            body { background: #fff !important; padding: 0 !important; margin: 0 !important; }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 antialiased min-h-screen w-full overflow-x-hidden">
    <div class="min-h-screen w-full flex justify-center px-3 sm:px-5 py-4 sm:py-6">
        <div class="w-full max-w-md my-auto">
            ${receiptHTML}
        </div>
    </div>
</body>
</html>`;

                const blob = new Blob([fullHTML], { type: 'text/html' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'Payment-Receipt-SGI-REC-0001.html';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            });
        })();
    </script>

</body>

</html>