<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fees Structure Master - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<body class="bg-gray-200 text-gray-800 antialiased min-h-screen">

    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-10 mb-10 transition-all duration-200 flex flex-col items-center justify-center">
        
        <div class="w-full max-w-5xl space-y-4">

            <!-- Header -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 flex items-center justify-between gap-3 flex-wrap">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900 leading-tight">Fees Structure Master</h1>
                        <p class="text-[11px] text-gray-500 mt-0.5">Add and manage fee items with categories and amounts.</p>
                    </div>
                </div>
                <span class="text-[10px] bg-orange-100 text-orange-700 px-2.5 py-1 rounded-full font-semibold">
                    <i class="fas fa-layer-group text-[9px] mr-1"></i> Fee Setup
                </span>
            </div>

            <!-- Input Section -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end">
                    
                    <!-- Class Input -->
                    <div class="md:col-span-3">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Class <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-graduation-cap absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <select id="classInput" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                <option value="">Loading classes...</option>
                            </select>
                        </div>
                    </div>

                    <!-- Category Dropdown + Add Button -->
                    <div class="md:col-span-4">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Category <span class="text-red-500">*</span></label>
                        <div class="flex gap-1.5">
                            <div class="relative flex-1">
                                <i class="fas fa-tags absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                <select id="categoryInput" class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-300 bg-white appearance-none focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                                    <option value="">Select Category</option>
                                    <option value="Tuition Fee">Tuition Fee</option>
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Exam Fee">Exam Fee</option>
                                    <option value="Transportation">Transportation</option>
                                    <option value="Library Fee">Library Fee</option>
                                    <option value="Lab Fee">Lab Fee</option>
                                    <option value="Other">Other</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
                            </div>
                            <!-- Add Category Button -->
                            <button type="button" id="addCategoryBtn" title="Add New Category"
                                    class="w-[38px] h-[38px] flex-shrink-0 flex items-center justify-center bg-orange-100 text-orange-600 hover:bg-orange-500 hover:text-white rounded-lg transition border border-orange-200">
                                <i class="fas fa-plus text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Amount Input -->
                    <div class="md:col-span-3">
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Amount (₹) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-rupee-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="number" id="amountInput" min="0" step="0.01" placeholder="e.g., 15000"
                                   class="w-full pl-8 pr-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                        </div>
                    </div>

                    <!-- Add Item Button -->
                    <div class="md:col-span-2">
                        <button type="button" id="addBtn"
                                class="w-full px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center justify-center gap-1.5 h-[38px]">
                            <i class="fas fa-plus text-xs"></i> Add
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                <div class="bg-orange-50 px-4 py-2.5 border-b border-orange-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-list text-orange-500 text-xs"></i>
                        <h3 class="font-bold text-gray-800 text-[13px]">Fee Structure</h3>
                    </div>
                    <span class="text-[10px] text-gray-500" id="countText">0 entries</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px] border-collapse text-[12px]">
                        <thead>
                            <tr>
                                <th class="text-left font-bold text-gray-700 bg-gray-50 px-4 py-2.5 border-b border-gray-200 w-12">#</th>
                                <th class="text-left font-bold text-gray-700 bg-gray-50 px-4 py-2.5 border-b border-gray-200 w-32">Class</th>
                                <th class="text-left font-bold text-gray-700 bg-gray-50 px-4 py-2.5 border-b border-gray-200">Category & Fee Breakdown</th>
                                <th class="text-right font-bold text-gray-700 bg-gray-50 px-4 py-2.5 border-b border-gray-200 w-32">Total Amount (₹)</th>
                                <th class="text-center font-bold text-gray-700 bg-gray-50 px-4 py-2.5 border-b border-gray-200 w-20">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Populated by JS -->
                            <tr id="emptyRow">
                                <td colspan="5" class="text-center text-gray-500 py-6 text-[11px]">
                                    <i class="fas fa-info-circle mr-1 text-orange-400"></i> No fee structure added yet.
                                </td>
                            </tr>
                        </tbody>
                        <tfoot id="tableFooter" class="hidden">
                            <tr>
                                <td colspan="3" class="text-right font-bold text-gray-800 px-4 py-2.5 bg-orange-50 border-t border-gray-200">Grand Total:</td>
                                <td id="grandTotal" class="text-right font-bold text-orange-600 px-4 py-2.5 bg-orange-50 border-t border-gray-200">₹0.00</td>
                                <td class="bg-orange-50 border-t border-gray-200"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-2">
                <button type="button" id="saveBtn"
                        class="px-6 py-2.5 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center gap-2">
                    <i class="fas fa-save text-xs"></i> Save Fees Structure
                </button>
            </div>

        </div>

        <!-- Toast -->
        <div id="toast" class="fixed top-5 left-1/2 -translate-x-1/2 bg-orange-500 text-white px-5 py-2.5 rounded-lg shadow-lg hidden z-50 transition-all duration-300 text-[12px] font-semibold text-center">
            <i class="fas fa-check-circle mr-1.5"></i> <span id="toastMessage">Saved!</span>
        </div>

        <!-- ADD CATEGORY MODAL -->
        <div id="categoryModal" class="fixed inset-0 bg-black/40 flex items-center justify-center z-[100] hidden">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-sm mx-4 overflow-hidden">
                <div class="bg-orange-50 px-4 py-3 border-b border-orange-100 flex items-center justify-between">
                    <h3 class="font-bold text-gray-800 text-sm flex items-center gap-2">
                        <i class="fas fa-tags text-orange-500 text-xs"></i> Add New Category
                    </h3>
                    <button type="button" id="closeCategoryModal" class="text-gray-400 hover:text-red-500 transition">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="p-4 space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 mb-0.5">Category Name <span class="text-red-500">*</span></label>
                        <input type="text" id="newCategoryName" placeholder="e.g., Sports Fee"
                               class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                    </div>
                    <div class="flex justify-end gap-2 pt-1">
                        <button type="button" id="cancelCategoryBtn" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-[12px] shadow-sm">Cancel</button>
                        <button type="button" id="saveCategoryBtn" class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-[12px] shadow-md">Save Category</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <!-- Script -->
    <script>
        (function() {
            // ============================================================
            // STATE
            // ============================================================
            let feeItems = [];
            let feeStructures = [];
            let editingStructureId = null;

            // ============================================================
            // DOM REFS
            // ============================================================
            const classInput = document.getElementById('classInput');
            const categoryInput = document.getElementById('categoryInput');
            const amountInput = document.getElementById('amountInput');
            const addBtn = document.getElementById('addBtn');
            
            const tableBody = document.getElementById('tableBody');
            const tableFooter = document.getElementById('tableFooter');
            const grandTotalEl = document.getElementById('grandTotal');
            const countText = document.getElementById('countText');
            const saveBtn = document.getElementById('saveBtn');
            const apiRoot = (typeof url !== 'undefined' ? url : '').replace(/\/$/, '');
            const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');

            async function apiRequest(path, options = {}) {
                const response = await fetch(`${apiRoot}${path}`, { ...options, headers:{'Authorization':`Bearer ${token || ''}`,'Accept':'application/json','Content-Type':'application/json',...(options.headers || {})} });
                const body = await response.json().catch(() => ({}));
                if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href='login.php'; throw new Error('Session expired'); }
                if (response.status === 403) throw new Error('You do not have permission to manage fee structures.');
                if (response.status === 404) throw new Error(body.message || 'Fee structure was not found.');
                if (response.status === 422) throw new Error(body.message || Object.values(body.errors || {}).flat().join('\n') || 'The fee structure data is invalid.');
                if (!response.ok) throw new Error(body.message || 'Fee structure request failed.');
                return body.data?.data ?? body.data ?? body;
            }

            function normalizeStructure(structure) {
                const source = structure.fee_structure || structure;
                const items = source.fee_items || source.items || source.fees || [];
                return {
                    id: source.id || source.fee_structure_id,
                    classId: source.class_id || source.class?.id,
                    className: source.class_name || source.class?.class_name || source.class?.name || classInput.querySelector(`option[value="${source.class_id}"]`)?.textContent || `Class ${source.class_id || ''}`,
                    items: Array.isArray(items) ? items.map(item => ({category:item.fee_name || item.category || item.name || 'Fee', amount:Number(item.amount || 0)})) : [],
                    grossFee: Number(source.gross_fee ?? source.total_fee ?? source.total_fees ?? 0)
                };
            }

            async function loadFeeStructures() {
                try {
                    const payload = await apiRequest('/student-fee-structures');
                    const rows = Array.isArray(payload) ? payload : (payload.data || payload.fee_structures || payload.student_fee_structures || []);
                    feeStructures = rows.map(normalizeStructure);
                    renderTable();
                } catch (error) {
                    tableBody.innerHTML = `<tr><td colspan="5" class="text-center text-red-600 py-6">${error.message}</td></tr>`;
                }
            }

            async function loadClasses() {
                classInput.innerHTML = '<option value="">Loading classes...</option>';
                try {
                    const response = await fetch(`${apiRoot}/student-classes`, {
                        headers: { 'Authorization': `Bearer ${token || ''}`, 'Accept': 'application/json' }
                    });
                    const result = await response.json().catch(() => ({}));
                    if (response.status === 401) { alert('Your session has expired. Please log in again.'); window.location.href = 'login.php'; return; }
                    if (response.status === 403) throw new Error('You do not have permission to view classes.');
                    if (!response.ok) throw new Error(result.message || 'Unable to load available classes.');
                    const data = result.data?.data ?? result.data ?? result;
                    classInput.innerHTML = '<option value="">Select class</option>';
                    (Array.isArray(data) ? data : []).forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.id;
                        option.textContent = item.class_name || item.name || item.class || `Class ${item.id}`;
                        classInput.appendChild(option);
                    });
                    if (!classInput.options.length || classInput.options.length === 1) classInput.innerHTML = '<option value="">No classes available</option>';
                } catch (error) {
                    classInput.innerHTML = '<option value="">Could not load classes</option>';
                    showToast(error.message, 'error');
                }
            }

            // Modal Refs
            const addCategoryBtn = document.getElementById('addCategoryBtn');
            const categoryModal = document.getElementById('categoryModal');
            const closeCategoryModal = document.getElementById('closeCategoryModal');
            const cancelCategoryBtn = document.getElementById('cancelCategoryBtn');
            const saveCategoryBtn = document.getElementById('saveCategoryBtn');
            const newCategoryName = document.getElementById('newCategoryName');

            // ============================================================
            // HELPERS
            // ============================================================
            function formatCurrency(n) {
                return '₹' + Number(n || 0).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            // ============================================================
            // CATEGORY MODAL LOGIC
            // ============================================================
            function openCategoryModal() {
                newCategoryName.value = '';
                categoryModal.classList.remove('hidden');
                setTimeout(() => newCategoryName.focus(), 100);
            }

            function closeCategoryModalFn() {
                categoryModal.classList.add('hidden');
            }

            addCategoryBtn.addEventListener('click', openCategoryModal);
            closeCategoryModal.addEventListener('click', closeCategoryModalFn);
            cancelCategoryBtn.addEventListener('click', closeCategoryModalFn);

            saveCategoryBtn.addEventListener('click', function() {
                const newCat = newCategoryName.value.trim();
                if (!newCat) { alert('Please enter a category name.'); return; }
                const exists = Array.from(categoryInput.options).some(opt => opt.value.toLowerCase() === newCat.toLowerCase());
                if (exists) { alert('This category already exists.'); return; }

                const newOption = document.createElement('option');
                newOption.value = newCat;
                newOption.textContent = newCat;
                categoryInput.appendChild(newOption);
                categoryInput.value = newCat;

                closeCategoryModalFn();
                showToast('New category added! ✅', 'success');
                amountInput.focus();
            });

            newCategoryName.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') { e.preventDefault(); saveCategoryBtn.click(); }
            });


            // ============================================================
            // RENDER TABLE (Grouped by Class)
            // ============================================================
            function renderTable() {
                tableBody.innerHTML = '';

                if (feeItems.length === 0 && feeStructures.length === 0) {
                    tableBody.innerHTML = `
                        <tr id="emptyRow">
                            <td colspan="5" class="text-center text-gray-500 py-6 text-[11px]">
                                <i class="fas fa-info-circle mr-1 text-orange-400"></i> No fee structure added yet.
                            </td>
                        </tr>
                    `;
                    tableFooter.classList.add('hidden');
                    countText.textContent = '0 entries';
                    return;
                }

                // Combine saved structures with unsaved fee items by class.
                const groupedItems = {};
                feeStructures.filter(structure => String(structure.id) !== String(editingStructureId)).forEach(structure => {
                    const key = String(structure.classId || structure.id);
                    groupedItems[key] = {className:structure.className, structureId:structure.id, items:[...structure.items]};
                });
                feeItems.forEach(item => {
                    const key = String(item.classId);
                    if (!groupedItems[key]) groupedItems[key] = {className:item.className, structureId:null, items:[]};
                    groupedItems[key].items.push(item);
                });

                // Convert to array for rendering
                const classKeys = Object.keys(groupedItems);
                countText.textContent = classKeys.length + ' class' + (classKeys.length === 1 ? '' : 'es');

                let globalIndex = 0;

                classKeys.forEach((key, index) => {
                    const group = groupedItems[key];
                    const className = group.className;
                    const items = group.items;
                    
                    // Build the breakdown string
                    let breakdownHtml = '';
                    let classTotal = 0;
                    
                    items.forEach((item, i) => {
                        breakdownHtml += `<span class="inline-block bg-orange-50 border border-orange-100 text-gray-700 px-2 py-0.5 rounded text-[11px] mr-1 mb-1">${item.category}: <b>${formatCurrency(item.amount)}</b></span>`;
                        classTotal += item.amount;
                    });

                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-orange-50/40 transition';
                    tr.innerHTML = `
                        <td class="px-4 py-3 border-b border-gray-100 text-gray-500 align-top">${index + 1}</td>
                        <td class="px-4 py-3 border-b border-gray-100 font-bold text-gray-800 align-top">${className}</td>
                        <td class="px-4 py-3 border-b border-gray-100 text-gray-700 align-top">
                            <div class="flex flex-wrap gap-1">${breakdownHtml}</div>
                        </td>
                        <td class="px-4 py-3 border-b border-gray-100 text-right font-bold text-orange-600 align-top">${formatCurrency(classTotal)}</td>
                        <td class="px-4 py-3 border-b border-gray-100 text-center align-top">
                            ${group.structureId ? `<button type="button" class="edit-structure-btn text-blue-500 hover:text-blue-700 rounded w-7 h-7" data-id="${group.structureId}" title="Edit structure"><i class="fas fa-edit"></i></button><button type="button" class="delete-structure-btn text-red-500 hover:text-red-700 rounded w-7 h-7" data-id="${group.structureId}" title="Delete structure"><i class="fas fa-trash text-[11px]"></i></button>` : '<span class="text-xs text-gray-400">Unsaved</span>'}
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });

                tableBody.querySelectorAll('.edit-structure-btn').forEach(btn => btn.addEventListener('click', () => editStructure(btn.dataset.id)));
                tableBody.querySelectorAll('.delete-structure-btn').forEach(btn => btn.addEventListener('click', () => deleteStructure(btn.dataset.id)));

                // Update Grand total
                const total = feeStructures.filter(structure => String(structure.id) !== String(editingStructureId)).reduce((sum, structure) => sum + Number(structure.grossFee || structure.items.reduce((sub,item) => sub + Number(item.amount),0)), 0) + feeItems.reduce((sum, i) => sum + Number(i.amount), 0);
                tableFooter.classList.remove('hidden');
                grandTotalEl.textContent = formatCurrency(total);
            }

            // ============================================================
            // ADD ITEM
            // ============================================================
            function addItem() {
                const classId = classInput.value;
                const cls = classInput.selectedOptions[0]?.textContent || '';
                const category = categoryInput.value;
                const amount = parseFloat(amountInput.value);

                if (!classId) { alert('Please select a Class.'); classInput.focus(); return; }
                if (feeItems.length && feeItems.some(item => String(item.classId) !== String(classId))) { alert('Save fee items for one class at a time.'); return; }
                if (!editingStructureId && feeStructures.some(structure => String(structure.classId) === String(classId))) { alert('This class already has a fee structure. Use its Edit action to change the fee items.'); return; }
                if (!category) { alert('Please select a Category.'); categoryInput.focus(); return; }
                if (!amount || amount <= 0) { alert('Please enter a valid Amount.'); amountInput.focus(); return; }

                feeItems.push({
                    classId: classId,
                    className: cls,
                    category: category,
                    amount: amount
                });

                // Reset inputs
                categoryInput.value = '';
                amountInput.value = '';
                // Keep class input populated so user can quickly add more items for the same class
                
                renderTable();
                categoryInput.focus();
            }

            addBtn.addEventListener('click', addItem);

            // Enter key triggers add
            [classInput, categoryInput, amountInput].forEach(input => {
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addItem();
                    }
                });
            });

            // ============================================================
            // SAVE ALL
            // ============================================================
            async function editStructure(id) {
                try {
                    const structure = normalizeStructure(await apiRequest(`/student-fee-structures/${encodeURIComponent(id)}`));
                    editingStructureId = structure.id;
                    classInput.value = structure.classId;
                    classInput.disabled = true;
                    feeItems = structure.items.map(item => ({classId:String(structure.classId), className:structure.className, category:item.category, amount:item.amount}));
                    saveBtn.innerHTML = '<i class="fas fa-save text-xs"></i> Update Fees Structure';
                    renderTable();
                } catch (error) { showToast(error.message, 'error'); }
            }

            async function deleteStructure(id) {
                if (!confirm('Delete this fee structure?')) return;
                try {
                    await apiRequest(`/student-fee-structures/${encodeURIComponent(id)}`, {method:'DELETE'});
                    feeStructures = feeStructures.filter(structure => String(structure.id) !== String(id));
                    if (String(editingStructureId) === String(id)) { editingStructureId = null; feeItems = []; classInput.disabled = false; saveBtn.innerHTML = '<i class="fas fa-save text-xs"></i> Save Fees Structure'; }
                    showToast('Fee structure deleted.', 'success');
                    renderTable();
                } catch (error) { showToast(error.message, 'error'); }
            }

            saveBtn.addEventListener('click', async function() {
                if (feeItems.length === 0) { showToast('Please add at least one fee item.', 'error'); return; }
                const groups = {};
                feeItems.forEach(item => {
                    if (!groups[item.classId]) groups[item.classId] = {className:item.className, items:[]};
                    groups[item.classId].items.push({fee_name:item.category, amount:Number(item.amount)});
                });
                saveBtn.disabled = true;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin text-xs"></i> Saving...';
                try {
                    for (const [classId, group] of Object.entries(groups)) {
                        const existing = feeStructures.find(structure => String(structure.classId) === String(classId));
                        const id = editingStructureId || existing?.id;
                        const body = {class_id:Number(classId), items:group.items};
                        await apiRequest(id ? `/student-fee-structures/${encodeURIComponent(id)}` : '/student-fee-structures', {method:id ? 'PUT' : 'POST', body:JSON.stringify(body)});
                    }
                    feeItems = [];
                    editingStructureId = null;
                    classInput.disabled = false;
                    categoryInput.value = '';
                    amountInput.value = '';
                    classInput.value = '';
                    saveBtn.innerHTML = '<i class="fas fa-save text-xs"></i> Save Fees Structure';
                    showToast('Fee structure saved successfully.', 'success');
                    await loadFeeStructures();
                } catch (error) { showToast(error.message, 'error'); }
                finally { saveBtn.disabled = false; if (editingStructureId) saveBtn.innerHTML = '<i class="fas fa-save text-xs"></i> Update Fees Structure'; }
            });

            // ============================================================
            // TOAST
            // ============================================================
            function showToast(message, type = 'success') {
                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toastMessage');
                
                toast.className = `fixed top-5 left-1/2 -translate-x-1/2 text-white px-5 py-2.5 rounded-lg shadow-lg z-50 transition-all duration-300 text-[12px] font-semibold text-center ${
                    type === 'error' ? 'bg-red-500' : 'bg-orange-500'
                }`;
                
                toastMessage.textContent = message;
                toast.classList.remove('hidden');
                
                clearTimeout(toast._timeout);
                toast._timeout = setTimeout(() => {
                    toast.classList.add('hidden');
                }, 3000);
            }

            categoryModal.addEventListener('click', function(e) {
                if (e.target === categoryModal) closeCategoryModalFn();
            });

            // ============================================================
            // INIT
            // ============================================================
            loadClasses();
            loadFeeStructures();
        })();
    </script>

</body>
</html>
