<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bonafide Certificate - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-10 mb-10 transition-all duration-200 flex flex-col items-center justify-center">
        <div class="w-full max-w-4xl">

            <!-- Page Header -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 mb-4 flex items-start justify-between gap-3 flex-wrap">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900 leading-tight">Bonafide Certificate</h1>
                        <p class="text-[11px] text-gray-500 mt-0.5">Search for a registered student to generate a certificate.</p>
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

                    <!-- ============================================================ -->
                    <!-- COMBINED SEARCH + DROPDOWN -->
                    <!-- ============================================================ -->
                    <div class="relative" id="studentPickerWrapper">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">
                            Search Student <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>

                            <input type="text"
                                   id="studentPickerInput"
                                   placeholder="Enter Student Name / ID / APAAR ID"
                                   autocomplete="off"
                                   class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">

                            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>

                            <!-- Hidden native select stores the actual value -->
                            <select id="studentSelect" class="hidden">
                                <option value="">Select or enter student name</option>
                            </select>
                        </div>

                        <!-- Suggestions dropdown -->
                        <div id="studentPickerDropdown"
                             class="hidden absolute z-20 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-lg max-h-64 overflow-y-auto">
                            <!-- Populated by JS -->
                        </div>

                        <p class="text-[10px] text-gray-400 mt-1">Start typing to filter · click a name to select</p>
                    </div>

                    <!-- Auto-populated Student Details -->
                    <div id="detailsBlock" class="hidden bg-gray-50 border border-gray-200 rounded-lg p-3 space-y-2 text-[11.5px]">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-2">
                            <div class="flex"><span class="w-28 text-gray-500">Parent Name</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dParent">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">Class / Course</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dClass">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">Section</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dSection">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">Reg. ID</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dRegId">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">APAAR ID</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dApaar">—</span></div>
                            <div class="flex"><span class="w-28 text-gray-500">Date of Birth</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dDob">—</span></div>
                            <div class="flex md:col-span-2"><span class="w-28 text-gray-500">Address</span><span class="text-gray-500 mr-2">:</span><span class="font-semibold text-gray-800" id="dAddress">—</span></div>
                        </div>
                    </div>

                    <!-- Academic Year + Date of Issue -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Academic Year <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <select id="academicYear"
                                        class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    <option value="2024-2025">2024-2025</option>
                                    <option value="2025-2026">2025-2026</option>
                                    <option value="2026-2027" selected>2026-2027</option>
                                    <option value="2027-2028">2027-2028</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Date of Issue <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-calendar-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <input type="date" id="dateOfIssue"
                                       class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Purpose -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Purpose of Certificate <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-bullseye absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <select id="purpose"
                                    class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                <option value="">Select Purpose</option>
                                <option value="Scholarship" selected>Scholarship</option>
                                <option value="Bank Account">Bank Account</option>
                                <option value="Government Scheme">Government Scheme</option>
                                <option value="Passport">Passport</option>
                                <option value="Travel Concession">Travel Concession</option>
                                <option value="Other">Other</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Custom Purpose -->
                    <div id="customPurposeBlock" class="hidden">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Specify Purpose <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-edit absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="customPurpose" placeholder="Enter custom purpose"
                                   class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
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
                            <i class="fas fa-stamp text-xs"></i> Generate Bonafide
                        </button>
                    </div>
                </div>
            </div>

            <!-- Info Note -->
            <div class="mt-4 bg-orange-50 border border-orange-200 rounded-lg p-3 text-[11px] text-orange-700 flex items-start gap-2">
                <i class="fas fa-info-circle mt-0.5"></i>
                <div>
                    <b>Note:</b> Each certificate receives a unique certificate number. Once issued, changes to student details will not affect previously issued certificates.
                </div>
            </div>

        </div>
    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <script>
        (function() {
            // ============================================================
            // DUMMY STUDENTS
            // ============================================================
            const students = [
                { id: 'SGI00025', name: 'Nayanshree Ramteke', apaar: '1234 5678 9012', parent: 'Mr. Rajesh Ramteke', class: 'Front-End Development', section: 'Section A', dob: '2006-06-15', address: '123, Datada, Chandrapur - 442401' },
                { id: 'SGI00026', name: 'Rohit Sharma', apaar: '2345 6789 0123', parent: 'Mr. Manoj Sharma', class: 'React Developer', section: 'Section B', dob: '2005-11-20', address: '45, Kothrud, Pune - 411038' },
                { id: 'SGI00027', name: 'Priya Deshmukh', apaar: '3456 7890 1234', parent: 'Mr. Suresh Deshmukh', class: 'Software Testing', section: 'Section A', dob: '2005-09-05', address: '67, Dwarka Sector 12, Delhi - 110075' },
                { id: 'SGI00028', name: 'Saurabh Jain', apaar: '4567 8901 2345', parent: 'Mr. Anil Jain', class: 'Python Development', section: 'Section C', dob: '2006-02-12', address: '22, Civil Lines, Nagpur - 440001' },
                { id: 'SGI00029', name: 'Sneha Patil', apaar: '5678 9012 3456', parent: 'Mr. Vijay Patil', class: 'Data Science', section: 'Section A', dob: '2005-07-08', address: '78, Shivaji Nagar, Mumbai - 400001' }
            ];

            const INSTITUTION_NAME = 'Softgrowth Infotech';
            const CITY = 'Chandrapur';

            // ============================================================
            // DOM REFS
            // ============================================================
            const pickerWrapper  = document.getElementById('studentPickerWrapper');
            const pickerInput    = document.getElementById('studentPickerInput');
            const pickerDropdown = document.getElementById('studentPickerDropdown');
            const studentSelect  = document.getElementById('studentSelect');

            const detailsBlock   = document.getElementById('detailsBlock');
            const dParent        = document.getElementById('dParent');
            const dClass         = document.getElementById('dClass');
            const dSection       = document.getElementById('dSection');
            const dRegId         = document.getElementById('dRegId');
            const dApaar         = document.getElementById('dApaar');
            const dDob           = document.getElementById('dDob');
            const dAddress       = document.getElementById('dAddress');

            const academicYear   = document.getElementById('academicYear');
            const dateOfIssue    = document.getElementById('dateOfIssue');
            const purpose        = document.getElementById('purpose');
            const customPurposeBlock = document.getElementById('customPurposeBlock');
            const customPurpose  = document.getElementById('customPurpose');

            const generateBtn = document.getElementById('generateBtn');
            const resetFormBtn = document.getElementById('resetFormBtn');

            let highlightedIndex = -1;

            // ============================================================
            // HELPERS
            // ============================================================
            function todayISO() {
                const d = new Date();
                const yyyy = d.getFullYear();
                const mm = String(d.getMonth() + 1).padStart(2, '0');
                const dd = String(d.getDate()).padStart(2, '0');
                return `${yyyy}-${mm}-${dd}`;
            }

            function formatDateDMY(iso) {
                if (!iso) return '—';
                const [y, m, d] = iso.split('-');
                return `${d}/${m}/${y}`;
            }

            function generateCertNo() {
                const year = new Date().getFullYear();
                const rand = String(Math.floor(Math.random() * 9999) + 1).padStart(4, '0');
                return `BON-${year}-${rand}`;
            }

            function filterStudents(query) {
                const q = query.trim().toLowerCase();
                if (!q) return students;
                return students.filter(s =>
                    s.name.toLowerCase().includes(q) ||
                    s.id.toLowerCase().includes(q) ||
                    s.apaar.toLowerCase().replace(/\s/g, '').includes(q.replace(/\s/g, ''))
                );
            }

            // ============================================================
            // RENDER SUGGESTIONS
            // ============================================================
            function renderSuggestions(query) {
                const list = filterStudents(query);
                pickerDropdown.innerHTML = '';
                highlightedIndex = -1;

                if (list.length === 0) {
                    pickerDropdown.innerHTML = `
                        <div class="px-3 py-3 text-[11px] text-gray-500 text-center">
                            <i class="fas fa-search mr-1 text-orange-400"></i> No students found.
                        </div>
                    `;
                    pickerDropdown.classList.remove('hidden');
                    return;
                }

                list.forEach((s, idx) => {
                    const item = document.createElement('div');
                    item.className = 'student-picker-item px-3 py-2 cursor-pointer text-[11.5px] hover:bg-orange-50 border-b border-gray-100 last:border-b-0';
                    item.setAttribute('data-id', s.id);
                    item.setAttribute('data-index', idx);
                    item.innerHTML = `
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user-graduate text-orange-500 text-[10px]"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="font-semibold text-gray-800 truncate">${s.name}</div>
                                <div class="text-[10px] text-gray-500 truncate">ID: ${s.id} · APAAR: ${s.apaar}</div>
                            </div>
                        </div>
                    `;
                    pickerDropdown.appendChild(item);
                });

                pickerDropdown.classList.remove('hidden');

                pickerDropdown.querySelectorAll('.student-picker-item').forEach(el => {
                    el.addEventListener('click', function() {
                        selectStudent(this.getAttribute('data-id'));
                    });
                });
            }

            // ============================================================
            // SELECT STUDENT
            // ============================================================
            function selectStudent(id) {
                const s = students.find(x => x.id === id);
                if (!s) return;

                pickerInput.value = `${s.name} (${s.id})`;
                studentSelect.innerHTML = `<option value="${s.id}" selected>${s.name}</option>`;
                pickerDropdown.classList.add('hidden');

                detailsBlock.classList.remove('hidden');
                dParent.textContent  = s.parent;
                dClass.textContent   = s.class;
                dSection.textContent = s.section;
                dRegId.textContent   = s.id;
                dApaar.textContent   = s.apaar;
                dDob.textContent     = formatDateDMY(s.dob);
                dAddress.textContent = s.address;

                studentSelect.dispatchEvent(new Event('change', { bubbles: true }));
            }

            // ============================================================
            // INPUT EVENTS
            // ============================================================
            pickerInput.addEventListener('focus', function() {
                renderSuggestions(this.value);
            });

            pickerInput.addEventListener('input', function() {
                renderSuggestions(this.value);
                studentSelect.innerHTML = `<option value="">Select or enter student name</option>`;
                detailsBlock.classList.add('hidden');
            });

            pickerInput.addEventListener('keydown', function(e) {
                const items = pickerDropdown.querySelectorAll('.student-picker-item');
                if (items.length === 0) return;

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    highlightedIndex = Math.min(highlightedIndex + 1, items.length - 1);
                    highlightItem(items);
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    highlightedIndex = Math.max(highlightedIndex - 1, 0);
                    highlightItem(items);
                } else if (e.key === 'Enter') {
                    if (highlightedIndex >= 0 && items[highlightedIndex]) {
                        e.preventDefault();
                        items[highlightedIndex].click();
                    }
                } else if (e.key === 'Escape') {
                    pickerDropdown.classList.add('hidden');
                }
            });

            function highlightItem(items) {
                items.forEach((el, i) => {
                    el.classList.toggle('bg-orange-100', i === highlightedIndex);
                });
                if (items[highlightedIndex]) {
                    items[highlightedIndex].scrollIntoView({ block: 'nearest' });
                }
            }

            // ============================================================
            // CLOSE ON OUTSIDE CLICK
            // ============================================================
            document.addEventListener('click', function(e) {
                if (!pickerWrapper.contains(e.target)) {
                    pickerDropdown.classList.add('hidden');
                }
            });

            // ============================================================
            // PURPOSE → CUSTOM
            // ============================================================
            purpose.addEventListener('change', function() {
                if (this.value === 'Other') {
                    customPurposeBlock.classList.remove('hidden');
                } else {
                    customPurposeBlock.classList.add('hidden');
                    customPurpose.value = '';
                }
            });

            // ============================================================
            // INIT
            // ============================================================
            dateOfIssue.value = todayISO();

            // ============================================================
            // RESET
            // ============================================================
            resetFormBtn.addEventListener('click', function() {
                pickerInput.value = '';
                pickerDropdown.classList.add('hidden');
                studentSelect.innerHTML = `<option value="">Select or enter student name</option>`;
                detailsBlock.classList.add('hidden');
                academicYear.value = '2026-2027';
                dateOfIssue.value = todayISO();
                purpose.value = 'Scholarship';
                customPurposeBlock.classList.add('hidden');
                customPurpose.value = '';
            });

            // ============================================================
            // GENERATE → OPEN CERTIFICATE PAGE IN NEW TAB
            // ============================================================
            generateBtn.addEventListener('click', function() {
                const sid = studentSelect.value;

                if (!sid) { alert('Please select a student.'); return; }
                if (!academicYear.value) { alert('Please select an academic year.'); return; }
                if (!dateOfIssue.value) { alert('Please select the date of issue.'); return; }
                if (!purpose.value) { alert('Please select the purpose.'); return; }
                if (purpose.value === 'Other' && !customPurpose.value.trim()) {
                    alert('Please specify the custom purpose.');
                    return;
                }

                const s = students.find(x => x.id === sid);
                if (!s) { alert('Student not found.'); return; }

                const purposeText = purpose.value === 'Other' ? customPurpose.value.trim() : purpose.value;
                const certNumber = generateCertNo();

                const params = new URLSearchParams({
                    cert_no: certNumber,
                    name: s.name,
                    parent: s.parent,
                    institution: INSTITUTION_NAME,
                    class: s.class,
                    academic: academicYear.value,
                    reg_id: s.id,
                    dob: s.dob,
                    purpose: purposeText,
                    issue_date: dateOfIssue.value,
                    city: CITY
                });

                window.open('bonafide_certificate.php?' + params.toString(), '_blank');
            });

        })();
    </script>

</body>

</html>