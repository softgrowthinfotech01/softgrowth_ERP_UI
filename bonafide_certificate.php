<?php
// ============================================================
// Bonafide Certificate — Standalone Printable & API-Driven Page
// ============================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bonafide Certificate - Loading...</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        html { scroll-behavior: smooth; }
        @media print {
            body { background: #fff !important; padding: 0 !important; margin: 0 !important; }
            .no-print { display: none !important; }
            #certificateCard {
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
                padding: 40px !important;
            }
        }
    </style>
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen w-full overflow-x-hidden">

    <div class="min-h-screen w-full flex justify-center px-3 sm:px-6 py-6 sm:py-10">
        <div class="w-full max-w-3xl my-auto">

            <!-- Loader / Error Container -->
            <div id="loadingState" class="bg-white rounded-xl shadow-md border border-gray-200 p-12 text-center">
                <i class="fas fa-spinner fa-spin text-orange-500 text-3xl mb-3"></i>
                <p class="text-sm text-gray-600 font-medium">Loading certificate details from database...</p>
            </div>

            <div id="errorState" class="hidden bg-red-50 border border-red-200 text-red-700 rounded-xl p-6 text-center shadow-sm">
                <i class="fas fa-exclamation-triangle text-red-500 text-2xl mb-2"></i>
                <h3 class="font-bold text-base">Could not load certificate</h3>
                <p id="errorMessage" class="text-xs mt-1 text-red-600">The certificate ID is missing or unauthorized.</p>
                <a href="bonafide.php" class="inline-block mt-4 px-4 py-2 bg-red-600 text-white rounded-lg text-xs font-semibold shadow hover:bg-red-700 transition">
                    <i class="fas fa-arrow-left mr-1"></i> Back to Generator
                </a>
            </div>

            <!-- Main Certificate Container (Hidden until data loads) -->
            <div id="certificateContainer" class="hidden space-y-4">

                <!-- ACTION BAR (hidden on print) -->
                <div class="no-print bg-white rounded-xl shadow-md border border-gray-200 p-3 flex items-center justify-between gap-3 flex-wrap">
                    <div class="flex items-center gap-3">
                        <button type="button" id="backBtn"
                                class="w-9 h-9 rounded-lg bg-gray-100 hover:bg-orange-100 text-gray-600 hover:text-orange-600 flex items-center justify-center transition">
                            <i class="fas fa-arrow-left text-sm"></i>
                        </button>
                        <div>
                            <h1 class="text-base font-bold text-gray-900 leading-tight">Bonafide Certificate</h1>
                            <p class="text-[11px] text-gray-500 mt-0.5">
                                Certificate No.: <span id="headerCertNo" class="font-semibold text-orange-600">—</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <button type="button" id="printBtn"
                                class="px-4 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-[12px] shadow-sm flex items-center gap-1.5">
                            <i class="fas fa-print text-[11px]"></i> Print
                        </button>
                        <button type="button" id="downloadBtn"
                                class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-[12px] shadow-md flex items-center gap-1.5">
                            <i class="fas fa-download text-[11px]"></i> Download
                        </button>
                    </div>
                </div>

                <!-- CERTIFICATE CARD -->
                <div id="certificateCard" class="bg-white rounded-xl shadow-md border border-gray-200 p-8 sm:p-12">

                    <!-- Institute Logo & Name -->
                    <div class="text-center mb-4">
                        <div id="instituteLogoContainer" class="mb-2">
                            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full border-2 border-orange-500">
                                <i class="fas fa-graduation-cap text-orange-500 text-xl"></i>
                            </div>
                        </div>
                        <div id="instituteName" class="text-[12px] font-bold text-gray-700 uppercase tracking-widest">[Institution Name]</div>
                    </div>

                    <h1 class="text-center text-xl sm:text-2xl font-bold text-gray-900 tracking-wide">BONAFIDE CERTIFICATE</h1>

                    <p class="text-center text-[12px] text-gray-500 mt-1">
                        Certificate No.: <span id="cardCertNo" class="font-semibold text-gray-700">—</span>
                    </p>

                    <div class="border-t border-gray-300 my-6"></div>

                    <h2 class="text-center text-[14px] font-bold text-gray-900 mb-5">TO WHOMSOEVER IT MAY CONCERN</h2>

                    <div class="space-y-4 text-[13px] leading-relaxed text-gray-800 text-justify">
                        <p>
                            This is to certify that <span id="cName" class="font-bold">—</span>,
                            son/daughter of <span id="cParent" class="font-bold">—</span>,
                            is a bonafide student of <span id="cInstitution" class="font-bold">—</span>,
                            studying in <span id="cClass" class="font-bold">—</span>
                            under batch <span id="cBatch" class="font-bold">—</span>.
                        </p>

                        <p>
                            The student's Registration Number is <span id="cRegId" class="font-bold">—</span>,
                            and Date of Birth is <span id="cDob" class="font-bold">—</span>.
                        </p>

                        <p>
                            This certificate is issued upon request for the purpose of
                            <span id="cPurpose" class="font-bold">—</span>.
                        </p>
                    </div>

                    <div class="flex items-end justify-between mt-12 text-[12px] text-gray-700">
                        <div class="space-y-1">
                            <div><span class="font-semibold">Date:</span> <span id="cIssueDate">—</span></div>
                            <div><span class="font-semibold">Place:</span> <span id="cCity">—</span></div>
                        </div>
                        <div class="text-center">
                            <div class="w-40 border-t border-gray-400 pt-1 mt-8">
                                <div class="font-semibold text-gray-800">Principal / Authorized Signatory</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="url.js"></script>
    <script>
        (function() {
            const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');
            if (!token) {
                alert('Authentication token missing. Please log in again.');
                window.location.href = 'login.php';
                return;
            }

            const urlParams = new URLSearchParams(window.location.search);
            const certificateId = urlParams.get('id');

            const baseUrl = typeof url !== 'undefined' ? url : '';
            const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;

            const loadingState = document.getElementById('loadingState');
            const errorState = document.getElementById('errorState');
            const errorMessage = document.getElementById('errorMessage');
            const certificateContainer = document.getElementById('certificateContainer');

            function formatDateDMY(iso) {
                if (!iso) return '—';
                const parts = iso.split('T')[0].split('-');
                if (parts.length !== 3) return iso;
                return `${parts[2]}/${parts[1]}/${parts[0]}`;
            }

            async function fetchCertificate() {
                if (!certificateId) {
                    loadingState.classList.add('hidden');
                    errorMessage.textContent = 'No certificate ID provided in the URL query string.';
                    errorState.classList.remove('hidden');
                    return;
                }

                try {
                    const response = await fetch(`${cleanBase}/bonafide-certificates/${certificateId}`, {
                        method: 'GET',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Accept': 'application/json'
                        }
                    });

                    const result = await response.json();

                    if (response.ok && result.success) {
                        const cert = result.data;
                        const student = cert.student_snapshot || {};
                        const institute = cert.institute_snapshot || {};

                        // Populate Header & Card fields
                        document.title = `Bonafide Certificate - ${cert.certificate_no || 'View'}`;
                        document.getElementById('headerCertNo').textContent = cert.certificate_no || '—';
                        document.getElementById('cardCertNo').textContent = cert.certificate_no || '—';

                        // Institute details & Logo handling
                        const instName = institute.org_name || 'Institute';
                        document.getElementById('instituteName').textContent = instName;
                        document.getElementById('cInstitution').textContent = instName;
                        document.getElementById('cCity').textContent = institute.district || institute.address || '—';

                        if (institute.logo) {
                            // Prepend storage/asset base if logo path is relative, or use absolute URL
                            const logoUrl = institute.logo.startsWith('http') ? institute.logo : `${cleanBase.replace('/api', '')}/storage/${institute.logo}`;
                            document.getElementById('instituteLogoContainer').innerHTML = `
                                <img src="${logoUrl}" alt="Institute Logo" class="h-14 mx-auto object-contain" />
                            `;
                        }

                        // Student details from snapshot
                        document.getElementById('cName').textContent = student.student_name || '—';
                        document.getElementById('cParent').textContent = student.parent_name || '—';
                        document.getElementById('cClass').textContent = student.course || '—';
                        document.getElementById('cBatch').textContent = student.student_batch || '—';
                        document.getElementById('cRegId').textContent = student.registration_id || '—';
                        document.getElementById('cDob').textContent = formatDateDMY(student.date_of_birth);

                        // Purpose
                        const finalPurpose = cert.purpose === 'Other' ? cert.custom_purpose : cert.purpose;
                        document.getElementById('cPurpose').textContent = finalPurpose || '—';

                        // Issue Date
                        document.getElementById('cIssueDate').textContent = formatDateDMY(cert.issue_date);

                        // Reveal Certificate
                        loadingState.classList.add('hidden');
                        certificateContainer.classList.remove('hidden');
                    } else {
                        loadingState.classList.add('hidden');
                        errorMessage.textContent = result.message || 'Certificate not found or unauthorized access.';
                        errorState.classList.remove('hidden');
                    }
                } catch (err) {
                    console.error('Fetch error:', err);
                    loadingState.classList.add('hidden');
                    errorMessage.textContent = 'A network or server error occurred while retrieving the certificate.';
                    errorState.classList.remove('hidden');
                }
            }

            // Navigation & Actions
            document.getElementById('backBtn').addEventListener('click', function() {
                if (window.history.length > 1) window.history.back();
                else window.location.href = 'bonafide.php';
            });

            document.getElementById('printBtn').addEventListener('click', function() {
                window.print();
            });

            document.getElementById('downloadBtn').addEventListener('click', function() {
                const certHTML = document.getElementById('certificateCard').outerHTML;
                const fullHTML = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bonafide Certificate</title>
    <script src="https://cdn.tailwindcss.com"><\/script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        @media print {
            body { background: #fff !important; padding: 0 !important; margin: 0 !important; }
            #certificateCard {
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
                padding: 40px !important;
            }
        }
    </style>
</head>
<body class="bg-gray-200 text-gray-800 antialiased min-h-screen w-full p-4 sm:p-8">
    <div class="flex justify-center">
        <div class="w-full max-w-3xl">
            ${certHTML}
        </div>
    </div>
</body>
</html>`;

                const blob = new Blob([fullHTML], { type: 'text/html' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `Bonafide-${document.getElementById('cardCertNo').textContent}.html`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            });

            // Execute fetch on load
            fetchCertificate();
        })();
    </script>

</body>

</html>