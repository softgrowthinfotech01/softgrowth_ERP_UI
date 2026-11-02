<?php
// ============================================================
// Leaving Certificate — Generator Page (DUMMY DATA MODE)
// ============================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leaving Certificate - ERP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen">

    <?php  include 'header.php' ?>
    <?php  include 'sidebar.php' ?>

    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-10 mb-10 transition-all duration-200 flex flex-col items-center justify-center">
        <div class="w-full max-w-4xl">

            <!-- Global Error Banner -->
            <div id="globalErrorBanner" class="hidden mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                <span id="globalErrorMessage">Please correct the highlighted fields before proceeding.</span>
            </div>

            <!-- Page Header -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 mb-4 flex items-start justify-between gap-3 flex-wrap">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900 leading-tight">Leaving Certificate</h1>
                        <p class="text-[11px] text-gray-500 mt-0.5">Search for a registered student to issue a leaving certificate.</p>
                    </div>
                </div>
                <span class="text-[10px] bg-orange-100 text-orange-700 px-2.5 py-1 rounded-full font-semibold">
                    <i class="fas fa-user-shield text-[9px] mr-1"></i> Student ERP
                </span>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                <div class="bg-orange-50 px-4 py-2.5 border-b border-orange-100 flex items-center gap-2">
                    <i class="fas fa-search text-orange-500 text-xs"></i>
                    <h3 class="font-bold text-gray-800 text-[13px]">Student &amp; Certificate Details</h3>
                </div>

                <div class="p-4 space-y-4">

                    <!-- LIVE SEARCH + DROPDOWN -->
                    <div class="relative" id="studentPickerWrapper">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">
                            Search Student <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text"
                                   id="studentPickerInput"
                                   placeholder="Type Student Name, Registration ID or APAAR ID..."
                                   autocomplete="off"
                                   class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                            <select id="studentSelect" class="hidden">
                                <option value="">Select student</option>
                            </select>
                        </div>

                        <div id="studentPickerDropdown"
                             class="hidden absolute z-20 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-lg max-h-64 overflow-y-auto">
                        </div>

                        <p class="text-[10px] text-gray-400 mt-1">Try typing <b>aarav</b>, <b>priya</b>, <b>rohan</b>, <b>sneha</b>, <b>karan</b>, <b>riya</b> — or leave blank and press Enter to see all.</p>
                    </div>

                    <!-- Auto-populated Student Details -->
                    <div id="detailsBlock" class="hidden bg-gray-50 border border-gray-200 rounded-lg p-3 space-y-2 text-[11.5px]">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-2">
                            <div class="flex"><span class="w-28 text-gray-500">Parent Name</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dParent">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">Course</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dClass">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">Batch</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dBatch">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">Reg. ID</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dRegId">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">APAAR ID</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dApaar">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">Date of Birth</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dDob">—</span></div>
                            <div class="flex md:col-span-2"><span class="w-28 text-gray-500">Address</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dAddress">—</span></div>
                        </div>
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Admission <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-calendar-plus absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <input type="date" id="admissionDate"
                                       class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Leaving <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-calendar-minus absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <input type="date" id="leavingDate"
                                       class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Date of Issue -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Issue <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-calendar-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="date" id="dateOfIssue"
                                   class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                    </div>

                    <!-- Reason / Purpose -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Reason for Leaving <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-comment-dots absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <input type="text" id="remarks" placeholder="Reason for Leaving"
                                       class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            </div>
                    </div>

                    <!-- Custom Reason -->
                    <div id="customReasonBlock" class="hidden">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Specify Reason <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-edit absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="customReason" placeholder="Enter custom reason"
                                   class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                    </div>

                    <!-- Conduct & Remarks -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Conduct</label>
                            <div class="relative">
                                <i class="fas fa-award absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <select id="conduct"
                                        class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    <option value="Good" selected>Good</option>
                                    <option value="Very Good">Very Good</option>
                                    <option value="Excellent">Excellent</option>
                                    <option value="Satisfactory">Satisfactory</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Remarks (optional)</label>
                            <div class="relative">
                                <i class="fas fa-comment-dots absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <input type="text" id="remarks" placeholder="Any remarks..."
                                       class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-2 pt-2">
                        <button type="button" id="resetFormBtn"
                                class="px-5 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-sm shadow-sm">
                            Reset
                        </button>
                        <button type="button" id="generateBtn"
                                class="px-6 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center justify-center gap-2">
                            <i class="fas fa-stamp text-xs"></i> Generate &amp; Issue Leaving Certificate
                        </button>
                    </div>
                </div>
            </div>

            <!-- Info Note -->
            <div class="mt-4 bg-orange-50 border border-orange-200 rounded-lg p-3 text-[11px] text-orange-700 flex items-start gap-2">
                <i class="fas fa-info-circle mt-0.5"></i>
                <div>
                    <b>Note:</b> Each leaving certificate receives a unique sequence number (`LC-YYYY-000X`). Once issued, historical records are locked.
                </div>
            </div>

            <!-- Dummy mode banner -->
            <div class="mt-4 bg-amber-50 border border-amber-200 rounded-lg p-3 text-[11px] text-amber-800 flex items-start gap-2">
                <i class="fas fa-flask mt-0.5"></i>
                <div>
                    <b>Demo Mode:</b> This page is running on in-browser mock data. No backend requests are made.
                </div>
            </div>

        </div>
    </main>
<?php  include 'footer.php' ?>
    <script src="url.js"></script>

    <script>
        (function () {
            'use strict';

            // ============================================================
            // 🔶 DUMMY DATA
            // ============================================================
            const DUMMY_STUDENTS = [
                {
                    id: 101,
                    student_name: 'Aarav Sharma',
                    parent_name: 'Rajesh Sharma',
                    course: 'B.Tech Computer Science',
                    student_batch: '2021-2025',
                    registration_id: 'REG2021001',
                    abc_id: 'APAAR-9988112233',
                    date_of_birth: '2003-04-15',
                    full_address: '12 MG Road',
                    tahsil: 'Sadar',
                    district: 'Jaipur',
                    state: 'Rajasthan',
                    pincode: '302001'
                },
                {
                    id: 102,
                    student_name: 'Priya Verma',
                    parent_name: 'Suresh Verma',
                    course: 'B.Com Honours',
                    student_batch: '2020-2023',
                    registration_id: 'REG2020054',
                    abc_id: 'APAAR-7766554433',
                    date_of_birth: '2002-08-22',
                    full_address: '45 Nehru Nagar',
                    tahsil: 'Civil Lines',
                    district: 'Kanpur',
                    state: 'Uttar Pradesh',
                    pincode: '208001'
                },
                {
                    id: 103,
                    student_name: 'Rohan Mehta',
                    parent_name: 'Anil Mehta',
                    course: 'B.Sc Physics',
                    student_batch: '2019-2022',
                    registration_id: 'REG2019102',
                    abc_id: 'APAAR-5544332211',
                    date_of_birth: '2001-12-05',
                    full_address: '78 Lake Gardens',
                    tahsil: 'Behala',
                    district: 'Kolkata',
                    state: 'West Bengal',
                    pincode: '700053'
                },
                {
                    id: 104,
                    student_name: 'Sneha Iyer',
                    parent_name: 'Krishnan Iyer',
                    course: 'M.Sc Biotechnology',
                    student_batch: '2018-2020',
                    registration_id: 'REG2018033',
                    abc_id: 'APAAR-1122334455',
                    date_of_birth: '1999-06-18',
                    full_address: '23 Anna Salai',
                    tahsil: 'Egmore',
                    district: 'Chennai',
                    state: 'Tamil Nadu',
                    pincode: '600002'
                },
                {
                    id: 105,
                    student_name: 'Karan Singh',
                    parent_name: 'Harpreet Singh',
                    course: 'B.A English Literature',
                    student_batch: '2021-2024',
                    registration_id: 'REG2021110',
                    abc_id: 'APAAR-6677889900',
                    date_of_birth: '2003-02-11',
                    full_address: '9 Sector 22',
                    tahsil: 'Chandigarh',
                    district: 'Chandigarh',
                    state: 'Punjab',
                    pincode: '160022'
                },
                {
                    id: 106,
                    student_name: 'Riya Kapoor',
                    parent_name: 'Vikram Kapoor',
                    course: 'BBA Marketing',
                    student_batch: '2022-2025',
                    registration_id: 'REG2022077',
                    abc_id: 'APAAR-4455667788',
                    date_of_birth: '2004-09-30',
                    full_address: '56 Model Town',
                    tahsil: 'Model Town',
                    district: 'Ludhiana',
                    state: 'Punjab',
                    pincode: '141002'
                }
            ];

            // Simulated server latency
            const FAKE_DELAY_MS = 250;
            const delay = (ms) => new Promise((res) => setTimeout(res, ms));

            // Pretend the token check is fine
            // const token = 'dummy-token';

            // ============================================================
            // DOM refs
            // ============================================================
            const pickerWrapper  = document.getElementById('studentPickerWrapper');
            const pickerInput    = document.getElementById('studentPickerInput');
            const pickerDropdown = document.getElementById('studentPickerDropdown');
            const studentSelect  = document.getElementById('studentSelect');

            const detailsBlock = document.getElementById('detailsBlock');
            const dParent      = document.getElementById('dParent');
            const dClass       = document.getElementById('dClass');
            const dBatch       = document.getElementById('dBatch');
            const dRegId       = document.getElementById('dRegId');
            const dApaar       = document.getElementById('dApaar');
            const dDob         = document.getElementById('dDob');
            const dAddress     = document.getElementById('dAddress');

            const admissionDate = document.getElementById('admissionDate');
            const leavingDate   = document.getElementById('leavingDate');
            const dateOfIssue   = document.getElementById('dateOfIssue');
            const reason        = document.getElementById('reason');
            const customReasonBlock = document.getElementById('customReasonBlock');
            const customReason  = document.getElementById('customReason');
            const conduct       = document.getElementById('conduct');
            const remarks       = document.getElementById('remarks');

            const generateBtn    = document.getElementById('generateBtn');
            const resetFormBtn   = document.getElementById('resetFormBtn');
            const globalBanner   = document.getElementById('globalErrorBanner');
            const globalErrorMsg = document.getElementById('globalErrorMessage');

            let searchTimeout = null;

            // ============================================================
            // Helpers
            // ============================================================
            function todayISO() {
                const d = new Date();
                return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
            }
            function formatDateDMY(iso) {
                if (!iso) return '—';
                const parts = iso.split('T')[0].split('-');
                return parts.length === 3 ? `${parts[2]}/${parts[1]}/${parts[0]}` : iso;
            }
            function showError(msg) {
                globalErrorMsg.textContent = msg;
                globalBanner.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
            function clearError() { globalBanner.classList.add('hidden'); }

            // ============================================================
            // 🔶 MOCK: search students
            // ============================================================
            async function fetchStudentSuggestions(query) {
                const q = (query || '').trim().toLowerCase();
                await delay(FAKE_DELAY_MS);

                if (!q) {
                    // empty query — return all
                    renderDropdownItems(DUMMY_STUDENTS);
                    return;
                }

                const matches = DUMMY_STUDENTS.filter((s) =>
                    s.student_name.toLowerCase().includes(q) ||
                    (s.registration_id || '').toLowerCase().includes(q) ||
                    (s.abc_id || '').toLowerCase().includes(q)
                );

                renderDropdownItems(matches);
            }

            function renderDropdownItems(students) {
                pickerDropdown.innerHTML = '';
                if (!students || students.length === 0) {
                    pickerDropdown.innerHTML = `<div class="px-3 py-3 text-[11px] text-gray-500 text-center">No students found.</div>`;
                    pickerDropdown.classList.remove('hidden');
                    return;
                }
                students.forEach((s) => {
                    const item = document.createElement('div');
                    item.className = 'student-picker-item px-3 py-2 cursor-pointer text-[11.5px] hover:bg-orange-50 border-b border-gray-100 last:border-b-0';
                    item.innerHTML = `
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user-graduate text-orange-500 text-[10px]"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="font-semibold text-gray-800 truncate">${s.student_name}</div>
                                <div class="text-[10px] text-gray-500 truncate">Reg ID: ${s.registration_id || 'N/A'} · APAAR: ${s.abc_id || 'N/A'}</div>
                            </div>
                        </div>`;
                    item.addEventListener('click', () => loadStudentDetails(s.id));
                    pickerDropdown.appendChild(item);
                });
                pickerDropdown.classList.remove('hidden');
            }

            // ============================================================
            // 🔶 MOCK: load student details
            // ============================================================
            async function loadStudentDetails(studentId) {
                pickerDropdown.classList.add('hidden');
                clearError();
                await delay(FAKE_DELAY_MS);

                const s = DUMMY_STUDENTS.find((x) => String(x.id) === String(studentId));
                if (!s) {
                    showError('Failed to load student details.');
                    return;
                }

                pickerInput.value = `${s.student_name} (${s.registration_id || s.id})`;
                studentSelect.innerHTML = `<option value="${s.id}" selected>${s.student_name}</option>`;

                detailsBlock.classList.remove('hidden');
                dParent.textContent = s.parent_name || '—';
                dClass.textContent  = s.course || '—';
                dBatch.textContent  = s.student_batch || '—';
                dRegId.textContent  = s.registration_id || '—';
                dApaar.textContent  = s.abc_id || '—';
                dDob.textContent    = formatDateDMY(s.date_of_birth);
                const fullAddr = [s.full_address, s.tahsil, s.district, s.state, s.pincode].filter(Boolean).join(', ');
                dAddress.textContent = fullAddr || '—';
            }

            // ============================================================
            // Input events
            // ============================================================
            pickerInput.addEventListener('input', function () {
                clearTimeout(searchTimeout);
                const query = this.value;

                if (!query.trim()) {
                    // show all as a hint
                    fetchStudentSuggestions('');
                    detailsBlock.classList.add('hidden');
                    studentSelect.innerHTML = `<option value="">Select student</option>`;
                    return;
                }

                searchTimeout = setTimeout(() => fetchStudentSuggestions(query), 250);
            });

            pickerInput.addEventListener('focus', function () {
                fetchStudentSuggestions(this.value);
            });

            document.addEventListener('click', function (e) {
                if (!pickerWrapper.contains(e.target)) pickerDropdown.classList.add('hidden');
            });

            reason.addEventListener('change', function () {
                if (this.value === 'Other') customReasonBlock.classList.remove('hidden');
                else { customReasonBlock.classList.add('hidden'); customReason.value = ''; }
            });

            dateOfIssue.value = todayISO();

            // ============================================================
            // Reset
            // ============================================================
            resetFormBtn.addEventListener('click', function () {
                pickerInput.value = '';
                pickerDropdown.classList.add('hidden');
                studentSelect.innerHTML = `<option value="">Select student</option>`;
                detailsBlock.classList.add('hidden');
                admissionDate.value = '';
                leavingDate.value = '';
                dateOfIssue.value = todayISO();
                reason.value = 'Course Completed';
                customReasonBlock.classList.add('hidden');
                customReason.value = '';
                conduct.value = 'Good';
                remarks.value = '';
                clearError();
            });

            // ============================================================
            // 🔶 MOCK: generate certificate
            // ============================================================
            generateBtn.addEventListener('click', async function () {
                clearError();

                const studentId = studentSelect.value;
                if (!studentId) return showError('Please search and select a valid student from the dropdown list.');
                if (!admissionDate.value) return showError('Please select the date of admission.');
                if (!leavingDate.value) return showError('Please select the date of leaving.');
                if (new Date(leavingDate.value) < new Date(admissionDate.value)) return showError('Date of leaving cannot be before date of admission.');
                if (!dateOfIssue.value) return showError('Please select the date of issue.');
                if (!reason.value) return showError('Please choose a reason for leaving.');
                if (reason.value === 'Other' && !customReason.value.trim()) return showError('Please specify the custom reason.');

                generateBtn.disabled = true;
                generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Issuing Certificate...';

                // Build the payload (kept for parity with real API)
                const payload = {
                    student_id: parseInt(studentId, 10),
                    admission_date: admissionDate.value,
                    leaving_date: leavingDate.value,
                    issue_date: dateOfIssue.value,
                    reason: reason.value,
                    custom_reason: reason.value === 'Other' ? customReason.value.trim() : null,
                    conduct: conduct.value,
                    remarks: remarks.value.trim() || null
                };

                await delay(600);

                // Fake generated certificate
                const year = new Date().getFullYear();
                const seq = String(Math.floor(Math.random() * 9000) + 1000); // 1000..9999
                const fake = {
                    id: Math.floor(Math.random() * 9000) + 1000,
                    certificate_no: `LC-${year}-${seq}`
                };

                alert('Leaving certificate issued successfully!\nCertificate No: ' + fake.certificate_no);

                // In dummy mode the certificate page may not exist yet — open anyway
                const w = window.open(`leaving_certificate_print?id=${fake.id}`, '_blank');
                if (!w) {
                    console.warn('Popup blocked. In real mode this would open the certificate page.');
                }

                console.log('Mock payload that would be sent to API:', payload);

                resetFormBtn.click();
                generateBtn.disabled = false;
                generateBtn.innerHTML = '<i class="fas fa-stamp text-xs"></i> Generate &amp; Issue Leaving Certificate';
            });

        })();
    </script>

</body>
</html>