<?php
// user-permission.php
?>
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
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg border border-gray-200 p-3 md:p-4 md:mb-10">

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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-1.5 md:gap-4">
                    <!-- SELECTOR BAR: ROLE + NAME DROPDOWNS -->
                    <div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            <!-- Role Dropdown -->
                            <div>
                                <label class="block text-[10px] font-bold text-gray-700 mb-0.5">
                                    User Role <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-user-tag absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-[10px]"></i>
                                    <select id="roleDropdown" class="w-full pl-7 pr-7 py-1.5 text-[11px] rounded-md border border-gray-300 bg-white text-gray-700 appearance-none focus:border-blue-400 focus:ring-1 focus:ring-blue-200 focus:outline-none shadow-sm">
                                        <option value="" disabled selected>Loading roles...</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-[9px] pointer-events-none"></i>
                                </div>
                            </div>
                            <!-- Name Dropdown -->
                            <div>
                                <label class="block text-[10px] font-bold text-gray-700 mb-0.5">
                                    Username <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-user absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-[10px]"></i>
                                    <select id="nameDropdown" class="w-full pl-7 pr-7 py-1.5 text-[11px] rounded-md border border-gray-300 bg-white text-gray-700 appearance-none focus:border-blue-400 focus:ring-1 focus:ring-blue-200 focus:outline-none shadow-sm">
                                        <option value="" disabled selected>Loading users...</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-[9px] pointer-events-none"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User Details Display 1 -->
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-blue-200 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-blue-600 text-[10px]"></i>
                        </div>
                        <div class="space-y-0">
                            <div class="flex items-baseline gap-1 text-[11px]">
                                <span class="font-bold text-gray-800 w-14">Username</span>
                                <span class="text-gray-500">:</span>
                                <span id="displayUsername" class="text-gray-700">—</span>
                            </div>
                            <div class="flex items-baseline gap-1 text-[11px]">
                                <span class="font-bold text-gray-800 w-14">Email</span>
                                <span class="text-gray-500">:</span>
                                <span id="displayEmail" class="text-gray-700">—</span>
                            </div>
                        </div>
                    </div>
                    <!-- User Details Display 2 -->
                    <div class="flex items-center md:justify-start">
                        <div class="space-y-0">
                            <div class="flex items-baseline gap-1 text-[11px]">
                                <span class="font-bold text-gray-800 w-14">User Role</span>
                                <span class="text-gray-500">:</span>
                                <span id="displayRole" class="text-gray-700">—</span>
                            </div>
                            <div class="flex items-baseline gap-1 text-[11px]">
                                <span class="font-bold text-gray-800 w-14">Status</span>
                                <span class="text-gray-500">:</span>
                                <span id="displayStatus" class="inline-flex items-center px-1.5 py-0 rounded-full text-[9px] font-medium bg-green-200 text-green-800">
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
                    <tbody id="permissionsTableBody" class="text-[11px]">
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Loading menus and permissions...</td>
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
        DYNAMIC API INTEGRATION & LOGIC
        ============================================================ -->
    <script>
        function getApiUrl(path) {
            const baseUrl = typeof url !== 'undefined' ? url : '';
            if (!baseUrl) return path;
            const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;
            const cleanPath = path.startsWith('/') ? path : '/' + path;
            return cleanBase + cleanPath;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const roleDropdown = document.getElementById('roleDropdown');
            const nameDropdown = document.getElementById('nameDropdown');
            const displayUsername = document.getElementById('displayUsername');
            const displayEmail = document.getElementById('displayEmail');
            const displayRole = document.getElementById('displayRole');
            const displayStatus = document.getElementById('displayStatus');
            const tableBody = document.getElementById('permissionsTableBody');
            
            const saveBtn = document.getElementById('savePermBtn');
            const cancelBtn = document.getElementById('cancelPermBtn');

            let allUsers = [];
            let allRoles = [];

            function getToken() {
                return localStorage.getItem('auth_token') || localStorage.getItem('token') || localStorage.getItem('accessToken') || sessionStorage.getItem('token');
            }

            const headers = {
                'Authorization': `Bearer ${getToken()}`,
                'Accept': 'application/json'
            };

            async function initPage() {
                try {
                    const [usersRes, rolesRes, menusRes] = await Promise.all([
                        fetch(getApiUrl('users'), { method: 'GET', headers }),
                        fetch(getApiUrl('roles'), { method: 'GET', headers }),
                        fetch(getApiUrl('permissions/menus'), { method: 'GET', headers })
                    ]);

                    const usersData = await usersRes.json();
                    const rolesData = await rolesRes.json();
                    const menusData = await menusRes.json();

                    if (usersRes.ok) {
                        const rawUsers = Array.isArray(usersData) ? usersData : (usersData.data || []);
                        allUsers = rawUsers.filter(u => u.role !== 'admin');
                        populateUserDropdown(allUsers);
                    }

                    if (rolesRes.ok) {
                        allRoles = rolesData.data || rolesData;
                        populateRoleDropdown(allRoles);
                    }

                    if (menusRes.ok) {
                        const menus = menusData.data || [];
                        renderPermissionTable(menus);
                    } else {
                        tableBody.innerHTML = `<tr><td colspan="5" class="text-center py-4 text-red-500">Failed to load menus: ${menusData.message || 'Unauthorized'}</td></tr>`;
                    }

                    if (allUsers.length > 0) {
                        onUserSelected(allUsers[0]);
                    }

                } catch (error) {
                    console.error('Initialization error:', error);
                    tableBody.innerHTML = '<tr><td colspan="5" class="text-center py-4 text-red-500">Network error connecting to API endpoints.</td></tr>';
                }
            }

            function populateUserDropdown(users) {
                nameDropdown.innerHTML = '';
                if (users.length === 0) {
                    nameDropdown.innerHTML = '<option value="" disabled selected>No users found</option>';
                    return;
                }
                users.forEach(user => {
                    const opt = document.createElement('option');
                    opt.value = user.id;
                    opt.textContent = user.username || user.name || user.email;
                    nameDropdown.appendChild(opt);
                });
            }

            function populateRoleDropdown(roles) {
                roleDropdown.innerHTML = '';
                roles.forEach(role => {
                    const opt = document.createElement('option');
                    opt.value = role.id;
                    opt.textContent = role.name;
                    roleDropdown.appendChild(opt);
                });
            }

            nameDropdown.addEventListener('change', function() {
                const selectedUser = allUsers.find(u => u.id == this.value);
                if (selectedUser) {
                    onUserSelected(selectedUser);
                }
            });

            roleDropdown.addEventListener('change', function() {
                const selectedRoleName = roleDropdown.options[roleDropdown.selectedIndex]?.text || '';
                displayRole.textContent = selectedRoleName;
                fetchRolePermissions(this.value);
            });

            function onUserSelected(user) {
                displayUsername.textContent = user.username || user.name || '—';
                displayEmail.textContent = user.email || '—';
                displayRole.textContent = user.role || '—';
                
                if (user.is_active) {
                    displayStatus.textContent = 'Active';
                    displayStatus.className = 'inline-flex items-center px-1.5 py-0 rounded-full text-[9px] font-medium bg-green-200 text-green-800';
                } else {
                    displayStatus.textContent = 'Inactive';
                    displayStatus.className = 'inline-flex items-center px-1.5 py-0 rounded-full text-[9px] font-medium bg-red-200 text-red-800';
                }

                nameDropdown.value = user.id;
                if (user.role_id) {
                    roleDropdown.value = user.role_id;
                    fetchRolePermissions(user.role_id);
                } else {
                    const matchedRole = allRoles.find(r => r.name.toLowerCase() === (user.role || '').toLowerCase());
                    if (matchedRole) {
                        roleDropdown.value = matchedRole.id;
                        fetchRolePermissions(matchedRole.id);
                    }
                }
            }

            function renderPermissionTable(menus) {
                if (!menus || menus.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="5" class="text-center py-4 text-gray-500">No menus configured in database.</td></tr>';
                    return;
                }

                let html = '';
                menus.forEach(menu => {
                    const hasChildren = menu.children && menu.children.length > 0;
                    const groupKey = 'group-' + menu.id;

                    html += `
                        <tr class="hover:bg-gray-50 transition ${hasChildren ? 'cursor-pointer select-none' : ''}" ${hasChildren ? `data-toggle="\${groupKey}"` : ''}>
                            <td class="px-2.5 py-1 border-b border-gray-100">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-folder text-teal-600 text-[9px]"></i>
                                    </span>
                                    <span class="font-medium text-gray-800">${menu.name}</span>
                                    ${hasChildren ? `<i class="fas fa-chevron-up text-gray-400 text-[8px] ml-auto transition-transform duration-200" id="chevron-\${groupKey}"></i>` : ''}
                                </div>
                            </td>
                    `;

                    html += renderPermissionCheckboxes(menu.permissions);
                    html += `</tr>`;

                    if (hasChildren) {
                        menu.children.forEach(child => {
                            html += `
                                <tr class="hover:bg-gray-50 transition ${groupKey}" data-group="${groupKey}">
                                    <td class="px-2.5 py-1 border-b border-gray-100">
                                        <div class="flex items-center gap-1.5 pl-5 relative">
                                            <span class="absolute left-1 top-1/2 -translate-y-1/2 w-2.5 h-px bg-gray-300"></span>
                                            <span class="absolute left-1 top-0 w-px h-1/2 bg-gray-300"></span>
                                            <span class="w-5 h-5 rounded-md bg-teal-100 flex items-center justify-center flex-shrink-0">
                                                <i class="fas fa-file text-teal-600 text-[9px]"></i>
                                            </span>
                                            <span class="font-medium text-gray-800">${child.name}</span>
                                        </div>
                                    </td>
                            `;
                            html += renderPermissionCheckboxes(child.permissions);
                            html += `</tr>`;
                        });
                    }
                });

                tableBody.innerHTML = html;
                attachAccordionListeners();
            }

            function renderPermissionCheckboxes(perms) {
                const actions = ['view', 'add', 'edit', 'delete'];
                let tdHtml = '';

                actions.forEach(action => {
                    const found = perms ? perms.find(p => p.action.toLowerCase() === action) : null;
                    if (found) {
                        tdHtml += `
                            <td class="text-center px-1.5 py-1 border-b border-gray-100">
                                <input type="checkbox" data-permission-id="${found.id}" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1 cursor-pointer accent-blue-600">
                            </td>
                        `;
                    } else {
                        tdHtml += `<td class="text-center px-1.5 py-1 border-b border-gray-100 text-gray-300">—</td>`;
                    }
                });

                return tdHtml;
            }

            async function fetchRolePermissions(roleId) {
                try {
                    document.querySelectorAll('input[type="checkbox"][data-permission-id]').forEach(cb => cb.checked = false);

                    const response = await fetch(getApiUrl(`roles/${roleId}/permissions`), {
                        method: 'GET',
                        headers
                    });
                    const result = await response.json();

                    if (response.ok) {
                        const assignedPerms = result.data.permissions || [];
                        assignedPerms.forEach(p => {
                            const cb = document.querySelector(`input[data-permission-id="${p.id}"]`);
                            if (cb) cb.checked = true;
                        });
                    }
                } catch (error) {
                    console.error('Error fetching role permissions:', error);
                }
            }

            function attachAccordionListeners() {
                const toggleRows = document.querySelectorAll('[data-toggle]');
                toggleRows.forEach(row => {
                    row.addEventListener('click', function(e) {
                        if (e.target.type === 'checkbox') return;

                        const groupName = this.getAttribute('data-toggle');
                        const chevron = document.getElementById('chevron-' + groupName);
                        const childRows = document.querySelectorAll(`[data-group="${groupName}"]`);

                        if (!chevron || childRows.length === 0) return;

                        const isHidden = childRows[0].classList.contains('hidden');
                        childRows.forEach(child => {
                            if (isHidden) child.classList.remove('hidden');
                            else child.classList.add('hidden');
                        });

                        if (isHidden) {
                            chevron.classList.remove('fa-chevron-right');
                            chevron.classList.add('fa-chevron-up');
                        } else {
                            chevron.classList.remove('fa-chevron-up');
                            chevron.classList.add('fa-chevron-right');
                        }
                    });
                });
            }

            saveBtn.addEventListener('click', async function(e) {
                e.preventDefault();
                const roleId = roleDropdown.value;
                if (!roleId) {
                    alert('Please select a role.');
                    return;
                }

                const allCheckboxes = document.querySelectorAll('input[type="checkbox"][data-permission-id]');
                const checkedIds = [];
                const uncheckedIds = [];

                allCheckboxes.forEach(cb => {
                    const permId = parseInt(cb.getAttribute('data-permission-id'));
                    if (cb.checked) {
                        checkedIds.push(permId);
                    } else {
                        uncheckedIds.push(permId);
                    }
                });

                saveBtn.disabled = true;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Saving...';

                try {
                    if (checkedIds.length > 0) {
                        await fetch(getApiUrl(`roles/${roleId}/permissions/grant`), {
                            method: 'POST',
                            headers: { ...headers, 'Content-Type': 'application/json' },
                            body: JSON.stringify({ permission_ids: checkedIds })
                        });
                    }

                    if (uncheckedIds.length > 0) {
                        await fetch(getApiUrl(`roles/${roleId}/permissions/revoke`), {
                            method: 'POST',
                            headers: { ...headers, 'Content-Type': 'application/json' },
                            body: JSON.stringify({ permission_ids: uncheckedIds })
                        });
                    }

                    alert('Permissions updated successfully! ✅');
                } catch (error) {
                    console.error('Error updating permissions:', error);
                    alert('Network error while saving permissions.');
                } finally {
                    saveBtn.disabled = false;
                    saveBtn.innerHTML = 'Save Permissions';
                }
            });

            cancelBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Reset permissions view?')) {
                    const currentRoleId = roleDropdown.value;
                    if (currentRoleId) fetchRolePermissions(currentRoleId);
                }
            });

            initPage();
        });
    </script>
</body>

</html>