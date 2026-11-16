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
            body { background: #fff !important; padding: 0 !important; margin: 0 !important; color: #000 !important; }
            .no-print { display: none !important; }
            #receiptCard {
                box-shadow: none !important;
                border: 1px solid #000 !important;
                border-radius: 0 !important;
                padding: 30px !important;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 antialiased min-h-screen w-full overflow-x-hidden flex flex-col justify-between">

    <!-- SCROLLABLE WRAPPER -->
    <div class="w-full flex justify-center px-3 sm:px-6 py-8">
        <div class="w-full max-w-xl">

            <!-- ACTION BAR (Hidden on print) -->
            <div class="no-print mb-4 flex items-center justify-between bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                <a href="javascript:history.back()" class="text-xs font-semibold text-gray-600 hover:text-orange-600 flex items-center gap-1.5 transition">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <div class="flex items-center gap-2">
                    <button type="button" id="printBtn"
                            class="px-4 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-xs shadow-sm flex items-center gap-1.5">
                        <i class="fas fa-print"></i> Print
                    </button>
                    <button type="button" id="downloadBtn"
                            class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-xs shadow-md flex items-center gap-1.5">
                        <i class="fas fa-download"></i> Download HTML
                    </button>
                </div>
            </div>

            <!-- ============================================================ -->
            <!-- BLACK & WHITE PROFESSIONAL RECEIPT CARD -->
            <!-- ============================================================ -->
            <div id="receiptCard" class="bg-white w-full shadow-sm border border-gray-300 rounded-xl p-8 sm:p-10 space-y-6">

                <!-- INSTITUTE HEADER (API Driven) -->
                <div class="flex items-center gap-4 border-b-2 border-black pb-5">
                    <div id="instituteLogoContainer" class="w-14 h-14 rounded-lg border-2 border-black flex items-center justify-center bg-gray-50 overflow-hidden flex-shrink-0">
                        <i class="fas fa-graduation-cap text-black text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h1 id="instituteName" class="text-base sm:text-lg font-bold text-black uppercase tracking-wide leading-tight">Loading Institute...</h1>
                        <p id="instituteMeta" class="text-xs text-gray-600 mt-0.5">Fetching institutional details...</p>
                    </div>
                    <div class="text-right">
                        <span class="inline-block border border-black text-black text-[10px] font-bold px-3 py-1 uppercase tracking-wider">
                            Fee Receipt
                        </span>
                    </div>
                </div>

                <!-- RECEIPT & DATE META -->
                <div class="flex justify-between items-center text-xs text-black bg-gray-50 p-3.5 rounded-lg border border-gray-200">
                    <div>
                        <span class="font-semibold text-gray-600">Receipt No:</span> 
                        <span id="receiptNo" class="font-bold text-black ml-1">—</span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-600">Payment Date:</span> 
                        <span id="receiptDate" class="font-bold text-black ml-1">—</span>
                    </div>
                </div>

                <!-- STUDENT DETAILS SECTION -->
                <div>
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 border-b border-gray-200 pb-1">Student Information</h3>
                    <div class="space-y-2 text-xs py-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Student Name</span>
                            <span id="studentName" class="font-bold text-black">—</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Registration / Student ID</span>
                            <span id="studentId" class="font-mono font-bold text-black">—</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Course / Class</span>
                            <span id="courseName" class="font-bold text-black">—</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Batch / Academic Year</span>
                            <span id="studentBatch" class="font-bold text-black">—</span>
                        </div>
                    </div>
                </div>

                <!-- PAYMENT & TRANSACTION DETAILS SECTION -->
                <div>
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 border-b border-gray-200 pb-1">Payment Details</h3>
                    <div class="space-y-2 text-xs py-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-medium">Payment Method</span>
                            <span id="paymentType" class="font-bold text-black">—</span>
                        </div>
                        <div class="flex justify-between" id="txnRow">
                            <span class="text-gray-600 font-medium">Transaction Reference</span>
                            <span id="transactionReference" class="font-mono font-bold text-black">—</span>
                        </div>
                        <div class="flex justify-between" id="installmentRow">
                            <span class="text-gray-600 font-medium">Installment Type</span>
                            <span id="installmentType" class="font-bold text-black">—</span>
                        </div>
                        <div class="flex justify-between" id="remarksRow">
                            <span class="text-gray-600 font-medium">Remarks</span>
                            <span id="paymentDescription" class="font-bold text-black">—</span>
                        </div>
                    </div>
                </div>

                <!-- PAID AMOUNT HIGHLIGHT BOX (Clean Black Border) -->
                <div class="border-2 border-black rounded-lg p-4 flex items-center justify-between bg-gray-50">
                    <div>
                        <span class="text-xs font-bold text-black uppercase block">Amount Paid (This Transaction)</span>
                    </div>
                    <div class="text-right">
                        <span id="paymentAmount" class="text-lg font-extrabold text-black">₹0.00</span>
                    </div>
                </div>

                <!-- SIGNATURE & FOOTER -->
                <div class="pt-6 border-t border-gray-300 flex items-end justify-between text-xs text-gray-700">
                    <div>
                        <p class="font-bold text-black">Thank you for your payment!</p>
                        <p class="text-[10px] text-gray-500 mt-0.5">This is a system-generated computer receipt.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-36 border-t border-black pt-1 mt-6">
                            <span class="font-bold text-black text-[11px]">Authorized Signatory</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- SCRIPT -->
    <script src="url.js"></script>
    <script>
        (function() {
            const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token') || '';
            const baseUrl = typeof url !== 'undefined' ? url : 'http://127.0.0.1:8000/api';
            const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;
            const storageBase = cleanBase.replace(/\/api$/, '');

            // 1. Fetch Institute Details (Logo, Name, Address)
            async function fetchInstituteDetails() {
                try {
                    const response = await fetch(`${cleanBase}/institute`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    if (response.ok) {
                        const result = await response.json();
                        const inst = result.data?.institute || result.data || result;
                        
                        const orgName = inst.org_name || inst.name || 'Softgrowth Infotech';
                        const address = [inst.address, inst.district].filter(Boolean).join(', ') || 'Datada, Chandrapur';
                        const phone = inst.phone || inst.mobile || '7447755280';

                        document.getElementById('instituteName').textContent = orgName;
                        document.getElementById('instituteMeta').textContent = `${address} | Phone: ${phone}`;

                        if (inst.logo) {
                            const logoUrl = inst.logo.startsWith('http') ? inst.logo : `${storageBase}/storage/${inst.logo}`;
                            document.getElementById('instituteLogoContainer').innerHTML = `
                                <img src="${logoUrl}" alt="Institute Logo" class="w-full h-full object-cover" />
                            `;
                        }
                    }
                } catch (e) {
                    console.error('Failed to load institute details', e);
                    document.getElementById('instituteName').textContent = 'Softgrowth Infotech';
                    document.getElementById('instituteMeta').textContent = 'Datada, Chandrapur | Phone: 7447755280';
                }
            }

            // 2. Parse URL Parameters
            const params = new URLSearchParams(window.location.search);
            const get = key => params.get(key) || '';
            const set = (id, value) => { const el = document.getElementById(id); if (el) el.textContent = value || '—'; };
            const currency = value => '₹' + Number(value || 0).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            
            const formatDate = value => {
                if (!value) return '—';
                const cleanStr = value.split('T')[0];
                const parts = cleanStr.split('-');
                if (parts.length === 3) {
                    if (parts[0].length === 4) return `${parts[2]}-${parts[1]}-${parts[0]}`;
                    return cleanStr;
                }
                return value;
            };

            set('receiptNo', get('receipt_no'));
            set('receiptDate', formatDate(get('pay_date')));
            set('studentName', get('name') || get('student_name'));
            set('courseName', get('course') || get('class_name'));
            set('paymentAmount', currency(get('pay_amount') || get('amount')));
            set('paymentType', get('pay_type') || get('payment_method') || 'Cash');
            set('transactionReference', get('txn') || get('transaction_reference'));
            set('paymentDescription', get('remarks') || get('description') || 'Fee Payment');
            set('installmentType', get('installment_type'));

            let regId = get('reg_id') || get('student_id') || get('id');
            let batchVal = get('batch') || get('student_batch');

            set('studentId', regId || '—');
            set('studentBatch', batchVal || '—');

            // 3. Robust Student API Integration (Matches Student Records Pattern)
            async function fetchStudentFromApi() {
                try {
                    const studentDbId = get('student_db_id') || regId;
                    
                    // If we have a specific student ID or dbId, try direct endpoint first
                    if (studentDbId && studentDbId !== '—') {
                        const directRes = await fetch(`${cleanBase}/students/${studentDbId}`, {
                            headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                        });
                        if (directRes.ok) {
                            const json = await directRes.json();
                            const s = json.data?.student || json.data || json;
                            if (s) {
                                const resolvedRegId = s.student_id || s.registration_id || s.id;
                                const resolvedBatch = s.student_batch || s.academic_year || s.batch;
                                if (resolvedRegId) set('studentId', resolvedRegId);
                                if (resolvedBatch) set('studentBatch', resolvedBatch);
                                if (s.student_name && !document.getElementById('studentName').textContent || document.getElementById('studentName').textContent === '—') {
                                    set('studentName', s.student_name);
                                }
                                if (s.course || s.class?.class_name) {
                                    set('courseName', s.course || s.class?.class_name);
                                }
                                return;
                            }
                        }
                    }

                    // Fallback: Fetch all students list and find the match
                    const listRes = await fetch(`${cleanBase}/students`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    if (listRes.ok) {
                        const json = await listRes.json();
                        const rows = Array.isArray(json) ? json : (json.data?.data || json.data || json.students || []);
                        const studentNameParam = (get('name') || get('student_name')).toLowerCase().trim();
                        
                        const matched = rows.find(s => 
                            String(s.id) === String(regId) || 
                            String(s.student_id) === String(regId) || 
                            String(s.registration_id) === String(regId) ||
                            (s.student_name && s.student_name.toLowerCase().trim() === studentNameParam)
                        );

                        if (matched) {
                            const finalRegId = matched.student_id || matched.registration_id || matched.id;
                            const finalBatch = matched.student_batch || matched.academic_year || matched.batch;
                            if (finalRegId) set('studentId', finalRegId);
                            if (finalBatch) set('studentBatch', finalBatch);
                        }
                    }
                } catch (e) {
                    console.error('Error fetching student record from API:', e);
                }
            }

            fetchStudentFromApi();

            if (!get('txn') && !get('transaction_reference')) {
                document.getElementById('txnRow').classList.add('hidden');
            }
            if (!get('installment_type')) {
                document.getElementById('installmentRow').classList.add('hidden');
            }
            if (!get('remarks') && !get('description')) {
                document.getElementById('remarksRow').classList.add('hidden');
            }

            // Load Institute details on start
            fetchInstituteDetails();

            // Print & Download Actions
            document.getElementById('printBtn').addEventListener('click', () => window.print());
            document.getElementById('downloadBtn').addEventListener('click', () => {
                const receiptHTML = document.getElementById('receiptCard').outerHTML;
                const fullHTML = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Receipt - ${document.getElementById('receiptNo').textContent}</title>
    <script src="https://cdn.tailwindcss.com"><\/script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body class="bg-gray-100 p-8 flex justify-center">
    <div class="w-full max-w-xl">${receiptHTML}</div>
</body>
</html>`;

                const blob = new Blob([fullHTML], { type: 'text/html' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `Payment-Receipt-${document.getElementById('receiptNo').textContent || 'receipt'}.html`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            });
        })();
    </script>
</body>

</html>