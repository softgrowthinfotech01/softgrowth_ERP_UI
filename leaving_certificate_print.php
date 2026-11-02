<?php
// ============================================================
// Leaving Certificate — Standalone Printable (DUMMY DATA MODE)
// ============================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leaving Certificate - Loading...</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="leaving.php" class="inline-block mt-4 px-4 py-2 bg-red-600 text-white rounded-lg text-xs font-semibold shadow hover:bg-red-700 transition">
                    <i class="fas fa-arrow-left mr-1"></i> Back to Generator
                </a>
            </div>

            <!-- Main Certificate Container -->
            <div id="certificateContainer" class="hidden space-y-4">

                <!-- ACTION BAR (hidden on print) -->
                <div class="no-print bg-white rounded-xl shadow-md border border-gray-200 p-3 flex items-center justify-between gap-3 flex-wrap">
                    <div class="flex items-center gap-3">
                        <button type="button" id="backBtn"
                                class="w-9 h-9 rounded-lg bg-gray-100 hover:bg-orange-100 text-gray-600 hover:text-orange-600 flex items-center justify-center transition">
                            <i class="fas fa-arrow-left text-sm"></i>
                        </button>
                        <div>
                            <h1 class="text-base font-bold text-gray-900 leading-tight">Leaving Certificate</h1>
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

                    <h1 class="text-center text-xl sm:text-2xl font-bold text-gray-900 tracking-wide">LEAVING CERTIFICATE</h1>

                    <p class="text-center text-[12px] text-gray-500 mt-1">
                        Certificate No.: <span id="cardCertNo" class="font-semibold text-gray-700">—</span>
                    </p>

                    <div class="border-t border-gray-300 my-6"></div>

                    <h2 class="text-center text-[14px] font-bold text-gray-900 mb-5">TO WHOMSOEVER IT MAY CONCERN</h2>

                    <div class="space-y-4 text-[13px] leading-relaxed text-gray-800 text-justify">
                        <p>
                            This is to certify that <span id="cName" class="font-bold">—</span>,
                            son/daughter of <span id="cParent" class="font-bold">—</span>,
                            was a bonafide student of <span id="cInstitution" class="font-bold">—</span>,
                            studying in <span id="cClass" class="font-bold">—</span>
                            under batch <span id="cBatch" class="font-bold">—</span>.
                        </p>

                        <p>
                            The student's Registration Number is <span id="cRegId" class="font-bold">—</span>,
                            Date of Birth is <span id="cDob" class="font-bold">—</span>,
                            and APAAR ID is <span id="cApaar" class="font-bold">—</span>.
                        </p>

                        <p>
                            He/She was admitted on <span id="cAdmissionDate" class="font-bold">—</span>
                            and left the institution on <span id="cLeavingDate" class="font-bold">—</span>
                            due to <span id="cReason" class="font-bold">—</span>.
                        </p>

                        <p>
                            His/Her conduct during the period of study was found to be
                            <span id="cConduct" class="font-bold">—</span>.
                            <span id="cRemarksParagraph" class="hidden">
                                Remarks: <span id="cRemarks" class="font-bold">—</span>.
                            </span>
                        </p>

                        <p>
                            This certificate is issued upon request for the purpose of record and further reference.
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
(function () {
    'use strict';

    // ============================================================
    // 🔶 DUMMY DATA (mirrors the generator's mock students)
    // ============================================================
    const DUMMY_STUDENTS = {
        '101': {
            student_name: 'Aarav Sharma',
            parent_name: 'Rajesh Sharma',
            course: 'B.Tech Computer Science',
            student_batch: '2021-2025',
            registration_id: 'REG2021001',
            abc_id: 'APAAR-9988112233',
            date_of_birth: '2003-04-15'
        },
        '102': {
            student_name: 'Priya Verma',
            parent_name: 'Suresh Verma',
            course: 'B.Com Honours',
            student_batch: '2020-2023',
            registration_id: 'REG2020054',
            abc_id: 'APAAR-7766554433',
            date_of_birth: '2002-08-22'
        },
        '103': {
            student_name: 'Rohan Mehta',
            parent_name: 'Anil Mehta',
            course: 'B.Sc Physics',
            student_batch: '2019-2022',
            registration_id: 'REG2019102',
            abc_id: 'APAAR-5544332211',
            date_of_birth: '2001-12-05'
        },
        '104': {
            student_name: 'Sneha Iyer',
            parent_name: 'Krishnan Iyer',
            course: 'M.Sc Biotechnology',
            student_batch: '2018-2020',
            registration_id: 'REG2018033',
            abc_id: 'APAAR-1122334455',
            date_of_birth: '1999-06-18'
        },
        '105': {
            student_name: 'Karan Singh',
            parent_name: 'Harpreet Singh',
            course: 'B.A English Literature',
            student_batch: '2021-2024',
            registration_id: 'REG2021110',
            abc_id: 'APAAR-6677889900',
            date_of_birth: '2003-02-11'
        },
        '106': {
            student_name: 'Riya Kapoor',
            parent_name: 'Vikram Kapoor',
            course: 'BBA Marketing',
            student_batch: '2022-2025',
            registration_id: 'REG2022077',
            abc_id: 'APAAR-4455667788',
            date_of_birth: '2004-09-30'
        }
    };

    const DUMMY_INSTITUTE = {
        org_name: 'Sunrise Institute of Technology',
        district: 'Jaipur',
        address: 'Sector 12, Malviya Nagar',
        logo: '' // leave blank to show the default graduation-cap icon
    };

    // ============================================================
    // CONFIG / PARAMS
    // ============================================================
    const urlParams = new URLSearchParams(window.location.search);
    const certificateId = urlParams.get('id');

    const baseUrl = typeof url !== 'undefined' ? url : '';
    const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;
    const storageRoot = cleanBase.replace(/\/api$/, '');

    // ============================================================
    // DOM REFS
    // ============================================================
    const loadingState = document.getElementById('loadingState');
    const errorState = document.getElementById('errorState');
    const errorMessage = document.getElementById('errorMessage');
    const certificateContainer = document.getElementById('certificateContainer');
    const backBtn = document.getElementById('backBtn');
    const printBtn = document.getElementById('printBtn');
    const downloadBtn = document.getElementById('downloadBtn');
    const certificateCard = document.getElementById('certificateCard');

    // ============================================================
    // HELPERS
    // ============================================================
    function formatDateDMY(iso) {
        if (!iso) return '—';
        const parts = String(iso).split('T')[0].split('-');
        if (parts.length === 3 && parts[0] && parts[1] && parts[2]) {
            return `${parts[2]}/${parts[1]}/${parts[0]}`;
        }
        return iso;
    }

    function text(id, value) {
        const el = document.getElementById(id);
        if (el) el.textContent = (value === null || value === undefined || value === '') ? '—' : value;
    }

    function showError(msg) {
        loadingState.classList.add('hidden');
        certificateContainer.classList.add('hidden');
        errorMessage.textContent = msg || 'The certificate ID is missing or unauthorized.';
        errorState.classList.remove('hidden');
    }

    function resolveAssetUrl(path) {
        if (!path) return '';
        if (/^https?:\/\//i.test(path)) return path;
        const clean = path.replace(/^\/+/, '');
        return `${storageRoot}/storage/${clean}`;
    }

    const delay = (ms) => new Promise((res) => setTimeout(res, ms));

    // ============================================================
    // 🔶 MOCK: build a certificate from an id
    //   id 101..106 → matching student from DUMMY_STUDENTS
    //   any other id → generic fallback (so links never break)
    // ============================================================
    function buildDummyCertificate(id) {
        const student = DUMMY_STUDENTS[String(id)] || {
            student_name: 'Sample Student',
            parent_name: 'Sample Parent',
            course: 'B.Tech Computer Science',
            student_batch: '2021-2025',
            registration_id: 'REG2021001',
            abc_id: 'APAAR-9988112233',
            date_of_birth: '2003-04-15'
        };

        const year = new Date().getFullYear();
        const paddedId = String(id || '0000').padStart(4, '0');

        return {
            id: id,
            certificate_no: `LC-${year}-${paddedId}`,
            student_snapshot: {
                name: student.student_name,
                parent_name: student.parent_name,
                class: student.course,
                batch: student.student_batch,
                registration_no: student.registration_id,
                dob: student.date_of_birth,
                apaar_id: student.abc_id,
                admission_date: '2021-07-01',
                leaving_date: '2025-05-31'
            },
            institute_snapshot: { ...DUMMY_INSTITUTE },
            reason: 'Course Completed',
            conduct: 'Very Good',
            remarks: 'Consistently performed well in academics and co-curricular activities.',
            issue_date: new Date().toISOString().split('T')[0],
            place: DUMMY_INSTITUTE.district
        };
    }

    // ============================================================
    // FETCH CERTIFICATE (dummy)
    // ============================================================
    async function fetchCertificate() {
        if (!certificateId) {
            showError('No certificate ID provided in the URL query string.');
            return;
        }

        try {
            // Simulate a short network delay so the loader is visible
            await delay(400);

            const cert = buildDummyCertificate(certificateId);

            renderCertificate(cert);
            loadingState.classList.add('hidden');
            errorState.classList.add('hidden');
            certificateContainer.classList.remove('hidden');

        } catch (err) {
            console.error('Fetch error:', err);
            showError('Could not build the certificate.');
        }
    }

    // ============================================================
    // RENDER
    // ============================================================
    function renderCertificate(cert) {
        const student = cert.student_snapshot || {};
        const institute = cert.institute_snapshot || {};
        const certNo = cert.certificate_no || '—';

        document.title = `Leaving Certificate - ${certNo}`;
        text('headerCertNo', certNo);
        text('cardCertNo', certNo);

        // Institute
        const instName = institute.org_name || institute.name || 'Institute';
        text('instituteName', instName);
        text('cInstitution', instName);

        if (institute.logo) {
            const logoUrl = resolveAssetUrl(institute.logo);
            const container = document.getElementById('instituteLogoContainer');
            if (container) {
                container.innerHTML =
                    `<img src="${logoUrl}" alt="Institute Logo" class="h-14 mx-auto object-contain" ` +
                    `onerror="this.style.display='none'" />`;
            }
        }

        // Student fields
        text('cName', student.name || student.full_name || student.student_name);
        text('cParent', student.parent_name || student.father_name || student.guardian_name);
        text('cClass', student.class || student.grade || student.standard);
        text('cBatch', student.batch || student.session || student.academic_year);
        text('cRegId', student.registration_no || student.reg_id || student.registration_number);
        text('cDob', formatDateDMY(student.dob || student.date_of_birth));
        text('cApaar', student.apaar_id || student.apaar);
        text('cAdmissionDate', formatDateDMY(student.admission_date || cert.admission_date));
        text('cLeavingDate', formatDateDMY(student.leaving_date || cert.leaving_date || cert.issue_date));
        text('cReason', cert.reason || student.leaving_reason);
        text('cConduct', cert.conduct || student.conduct);

        // Remarks paragraph
        const remarks = cert.remarks || student.remarks;
        const remarksPara = document.getElementById('cRemarksParagraph');
        if (remarks && remarksPara) {
            text('cRemarks', remarks);
            remarksPara.classList.remove('hidden');
        } else if (remarksPara) {
            remarksPara.classList.add('hidden');
        }

        // Issue details
        text('cIssueDate', formatDateDMY(cert.issue_date || cert.created_at));
        text('cCity', cert.place || institute.district || institute.address || institute.city);
    }

    // ============================================================
    // ACTIONS
    // ============================================================
    if (backBtn) {
        backBtn.addEventListener('click', function () {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = 'leaving.php';
            }
        });
    }

    if (printBtn) {
        printBtn.addEventListener('click', function () {
            window.print();
        });
    }

    // Download as PNG
    if (downloadBtn) {
        downloadBtn.addEventListener('click', async function () {
            const certNo = document.getElementById('cardCertNo')?.textContent || 'certificate';
            const fileName = `Leaving-Certificate-${certNo.replace(/[^\w-]+/g, '_')}.png`;

            downloadBtn.disabled = true;
            const originalHTML = downloadBtn.innerHTML;
            downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin text-[11px]"></i> Preparing...';

            try {
                if (typeof html2canvas === 'undefined') {
                    await new Promise((resolve, reject) => {
                        const s = document.createElement('script');
                        s.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js';
                        s.onload = resolve;
                        s.onerror = reject;
                        document.head.appendChild(s);
                    });
                }

                const canvas = await html2canvas(certificateCard, {
                    scale: 2,
                    useCORS: true,
                    backgroundColor: '#ffffff',
                    logging: false
                });

                const link = document.createElement('a');
                link.download = fileName;
                link.href = canvas.toDataURL('image/png');
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

            } catch (err) {
                console.error('Download failed:', err);
                alert('Could not generate image. Please use the Print option instead.');
            } finally {
                downloadBtn.disabled = false;
                downloadBtn.innerHTML = originalHTML;
            }
        });
    }

    // ============================================================
    // INIT
    // ============================================================
    fetchCertificate();
})();
</script>
</body>
</html>