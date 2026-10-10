<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Registration - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-300 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <!-- MAIN WRAPPER CENTERED -->
    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-8 mb-8 transition-all duration-200 flex flex-col items-center justify-center">

        <!-- ================= USER REGISTRATION CARD (compact) ================= -->
        <div class="w-full max-w-xl bg-white rounded-xl shadow-lg border border-gray-200 p-4 md:p-5 relative">

            <!-- HEADER with icon and title -->
            <div class="flex items-start gap-3 mb-1">
                <div class="bg-orange-100 p-2 rounded-lg">
                    <i class="fas fa-file-invoice text-orange-500 text-base"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-gray-900 leading-tight">User Registration</h1>
                    <p class="text-xs text-gray-500 mt-0.5 leading-snug">
                        Create a new user and assign their role. If the required role is not available, you can create a new role.
                    </p>
                </div>
            </div>

            <!-- ROLE DROPDOWN SECTION -->
            <div class="mt-4 relative">
                <label class="block text-xs font-bold text-gray-800 mb-0.5">
                    Select User Role <span class="text-red-500 ml-0.5 font-semibold">*</span>
                </label>
                <div class="flex items-center gap-2">
                    <div class="relative flex-1">
                        <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                        <select id="roleSelect" class="w-full pl-8 pr-7 py-2 text-sm rounded-lg border border-gray-300 bg-white text-gray-700 appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                            <option value="" disabled selected>Select user role</option>
                            <option value="Accountant">Accountant</option>
                            <option value="HR Manager">HR Manager</option>
                            <option value="Inventory Clerk">Inventory Clerk</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-1">
                    <span class="text-[11px] text-gray-500">Can't find the required role?</span>
                    <button id="createRoleBtn" class="text-[11px] font-medium text-blue-600 border border-blue-200 bg-blue-50 px-2 py-1 rounded-md hover:bg-blue-100 transition flex items-center gap-1">
                        <i class="fas fa-plus text-[9px]"></i> Create New Role
                    </button>
                </div>
            </div>

            <!-- NEW ROLE POPUP (hidden by default) -->
            <div id="newRolePopup" class="hidden mt-2 p-3 bg-orange-50 border border-orange-200 rounded-lg transition-all duration-200">
                <div class="flex flex-wrap items-center gap-2">
                    <div class="flex-1 min-w-[150px]">
                        <label class="block text-[10px] font-bold text-gray-700 mb-0.5">
                            New Role Name <span class="text-red-500 ml-0.5 font-semibold">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-user absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-[10px]"></i>
                            <input type="text" id="newRoleInput" placeholder="Enter new role name" class="w-full pl-8 pr-2 py-1.5 rounded-md border border-gray-300 focus:border-orange-400 focus:ring-1 focus:ring-orange-200 focus:outline-none text-xs bg-white">
                        </div>
                    </div>
                    <div class="flex items-center gap-2 self-end mt-3 sm:mt-0">
                        <button id="cancelNewRoleBtn" class="px-3 py-1.5 border border-gray-300 bg-white text-gray-700 text-xs font-medium rounded-md hover:bg-gray-50">Cancel</button>
                        <button id="saveNewRoleBtn" class="px-4 py-1.5 bg-orange-500 text-white text-xs font-semibold rounded-md hover:bg-orange-600 shadow-sm">Save Role</button>
                    </div>
                </div>
            </div>

            <!-- USERNAME FIELD -->
            <div class="mt-3">
                <label class="block text-xs font-bold text-gray-800 mb-0.5">
                    Name <span class="text-red-500 ml-0.5 font-semibold">*</span>
                </label>
                <div class="relative">
                    <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input type="text" id="name" placeholder="Enter name" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm bg-white">
                </div>
            </div>

            <!-- PASSWORD FIELD -->
            <div class="mt-2.5">
                <label class="block text-xs font-bold text-gray-800 mb-0.5">
                    Password <span class="text-red-500 ml-0.5 font-semibold">*</span>
                </label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input type="text" id="password" value="Abcd@123" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm bg-white text-gray-700">
                </div>
                <p class="text-[10px] text-green-600 mt-0.5 flex items-center gap-1">
                    <i class="fas fa-check-circle text-green-500 text-[9px]"></i> Password will be visible while entering.
                </p>
            </div>

            <!-- EMAIL FIELD -->
            <div class="mt-2.5">
                <label class="block text-xs font-bold text-gray-800 mb-0.5">
                    Email Address <span class="text-red-500 ml-0.5 font-semibold">*</span>
                </label>
                <div class="relative">
                    <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input type="email" id="email" placeholder="Enter email address" class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm bg-white">
                </div>
            </div>

            <!-- BUTTONS: Cancel + Save User -->
            <div class="mt-5 flex flex-col sm:flex-row gap-2">
                <button id="cancelMainBtn" class="px-4 py-2 border border-gray-300 bg-white text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition sm:w-1/3 w-full shadow-sm text-sm">
                    Cancel
                </button>
                <button id="saveUserBtn" class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition sm:w-2/3 w-full shadow-md flex items-center justify-center gap-2 text-sm">
                    Save User 
                </button>
            </div>

            <!-- SUCCESS POPUP -->
            <div id="successPopup" class="hidden fixed inset-0 bg-black/10 flex items-center justify-center z-50 pointer-events-none transition-opacity duration-200">
                <div class="pointer-events-auto bg-green-50 border border-green-200 rounded-xl p-5 max-w-xs w-full mx-4 shadow-xl">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-green-200 flex items-center justify-center mb-2.5">
                            <i class="fas fa-check text-green-700 text-xl"></i>
                        </div>
                        <h3 class="text-base font-bold text-green-800">User Created Successfully!</h3>
                        <p class="text-xs text-green-700 mt-1">User has been created and you will now be redirected to User Role Permission.</p>
                        <div class="mt-3 flex items-center justify-center text-green-700 text-xs">
                            <span class="inline-block w-3.5 h-3.5 border-2 border-gray-300 border-t-teal-600 rounded-full animate-spin mr-1.5"></span> Redirecting...
                        </div>
                    </div>
                </div>
            </div>

            <!-- Arrow decoration -->
          <div class="absolute -right-60 top-1/2 transform -translate-y-1/2 hidden md:block">
                <a href="user-permission.php" class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-teal-500 text-teal-600 text-sm font-semibold rounded-xl shadow-md hover:bg-teal-50 hover:border-teal-600 transition-all duration-200">
                    <i class="fas fa-arrow-right text-teal-500"></i>
                    User Permission
                </a>
            </div>
        </div>

    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <!-- ============================================================
        REGISTRATION SUBMISSION LOGIC + UI INTERACTIONS
        ============================================================ -->
    <script>
        (function() {
            const createRoleBtn = document.getElementById('createRoleBtn');
            const newRolePopup = document.getElementById('newRolePopup');
            const cancelNewRoleBtn = document.getElementById('cancelNewRoleBtn');
            const saveNewRoleBtn = document.getElementById('saveNewRoleBtn');
            const newRoleInput = document.getElementById('newRoleInput');
            const roleSelect = document.getElementById('roleSelect');

            const saveUserBtn = document.getElementById('saveUserBtn');
            const cancelMainBtn = document.getElementById('cancelMainBtn');
            const successPopup = document.getElementById('successPopup');

            function showPopup(element) {
                element.classList.remove('hidden');
            }

            function hidePopup(element) {
                element.classList.add('hidden');
            }

            createRoleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                newRolePopup.classList.toggle('hidden');
            });

            cancelNewRoleBtn.addEventListener('click', function() {
                hidePopup(newRolePopup);
                newRoleInput.value = '';
            });

            saveNewRoleBtn.addEventListener('click', function() {
                const newRoleName = newRoleInput.value.trim();
                if (!newRoleName) {
                    alert('Please enter a role name.');
                    return;
                }

                const existingOptions = Array.from(roleSelect.options).map(opt => opt.value.toLowerCase());
                if (existingOptions.includes(newRoleName.toLowerCase())) {
                    alert('Role already exists!');
                    return;
                }

                const newOption = document.createElement('option');
                newOption.value = newRoleName;
                newOption.textContent = newRoleName;
                roleSelect.appendChild(newOption);
                roleSelect.value = newRoleName;

                newRoleInput.value = '';
                hidePopup(newRolePopup);
            });

            saveUserBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const role = roleSelect.value;
                const username = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const password = document.getElementById('password').value.trim();

                if (!role) { alert('Please select a user role.'); return; }
                if (!username) { alert('Please enter a name.'); return; }
                if (!email) { alert('Please enter an email address.'); return; }
                if (!password) { alert('Please enter a password.'); return; }

                showPopup(successPopup);

                setTimeout(() => {
                    hidePopup(successPopup);
                    console.log('Redirecting to User Role Permission...');
                }, 2800);
            });

            cancelMainBtn.addEventListener('click', function(e) {
                e.preventDefault();
                roleSelect.value = '';
                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('password').value = 'Abcd@123';
                if (!newRolePopup.classList.contains('hidden')) {
                    hidePopup(newRolePopup);
                }
                newRoleInput.value = '';
                if (!successPopup.classList.contains('hidden')) {
                    hidePopup(successPopup);
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (!newRolePopup.classList.contains('hidden')) {
                        hidePopup(newRolePopup);
                    }
                    if (!successPopup.classList.contains('hidden')) {
                        hidePopup(successPopup);
                    }
                }
            });
        })();
    </script>
</body>

</html>