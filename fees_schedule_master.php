<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fees Schedule Master - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* Minimal custom styles */
        .fee-row {
            animation: fadeSlide 0.3s ease;
        }
        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(-10px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .fee-row-removing {
            animation: fadeOut 0.25s ease forwards;
        }
        @keyframes fadeOut {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.95); }
        }
        .btn-add, .btn-remove {
            transition: all 0.2s ease;
        }
        .btn-add:hover { transform: scale(1.05) rotate(90deg); }
        .btn-remove:hover { transform: scale(1.1); color: #dc2626; }
        input:focus {
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.15);
            border-color: #0f766e;
        }
        /* Mobile‑first responsive adjustments */
        @media (max-width: 640px) {
            .fee-row { padding: 1rem; }
            .fee-row .flex-1 { width: 100%; }
            .fee-row .flex-1 + .flex-1 { margin-top: 0.5rem; }
            .btn-add, .btn-remove { width: 44px; height: 44px; font-size: 1rem; }
        }
    </style>
</head>
<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <!-- Main Container -->
    <div class="md:ml-[300px] max-w-5xl mx-auto px-4 sm:px-6 py-28 pb-10  mb-8 lg:mb-10 transition-all duration-200 flex items-center justify-center min-h-[calc(100vh-12rem)]">

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">

            <!-- Header -->
            <div class="flex items-center gap-3 p-4 sm:p-6 border-b border-gray-100">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl sm:text-2xl">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900">Fees Schedule Master</h2>
                    <p class="text-xs sm:text-sm text-gray-500">Add and manage fee items with labels and amounts</p>
                </div>
            </div>

            <!-- Form -->
            <form id="feesForm" class="p-4 sm:p-6 space-y-4 sm:space-y-6" onsubmit="submitFees(event)">

                <!-- Fee Items Container -->
                <div id="feeContainer" class="space-y-3">
                    <!-- Default first row -->
                    <div class="fee-row flex flex-col sm:flex-row items-stretch sm:items-center gap-3 p-3 sm:p-4 bg-gray-50 rounded-xl border border-gray-200">
                        <div class="flex-1 w-full">
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1">Label</label>
                            <input type="text" name="label[]" placeholder="e.g., Tuition Fee" 
                                   class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:outline-none transition" />
                        </div>
                        <div class="flex-1 w-full">
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1">Amount (₹)</label>
                            <input type="number" name="amount[]" placeholder="e.g., 15000" 
                                   class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:outline-none transition" />
                        </div>
                        <div class="flex items-center justify-end sm:justify-start gap-2 mt-1 sm:mt-0">
                            <button type="button" onclick="addRow(this)" 
                                    class="btn-add w-10 h-10 sm:w-11 sm:h-11 flex items-center justify-center rounded-xl bg-teal-600 text-white hover:bg-teal-700 shadow-md transition">
                                <i class="fas fa-plus text-sm"></i>
                            </button>
                            <button type="button" onclick="removeRow(this)" 
                                    class="btn-remove w-10 h-10 sm:w-11 sm:h-11 flex items-center justify-center rounded-xl bg-gray-200 text-gray-500 hover:bg-red-100 hover:text-red-600 transition">
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-3 p-4 bg-teal-50 rounded-xl border border-teal-200">
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-semibold text-gray-700">Total Items:</span>
                        <span id="totalItems" class="text-lg font-extrabold text-teal-700">1</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-semibold text-gray-700">Total Amount:</span>
                        <span id="totalAmount" class="text-lg font-extrabold text-teal-700">₹ 0</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full py-3.5 rounded-xl bg-teal-600 text-white font-bold text-base sm:text-lg shadow-md hover:bg-teal-700 transition-all duration-200 hover:shadow-lg focus:ring-4 focus:ring-teal-200">
                    <i class="fas fa-save mr-2"></i> Save Fees Schedule
                </button>

            </form>

        </div>

        <!-- Toast Notification -->
        <div id="toast" class="fixed top-5 left-1/2 -translate-x-1/2 bg-teal-600 text-white px-6 py-3 rounded-xl shadow-lg hidden z-50 transition-all duration-300 max-w-[90%] text-center">
            <i class="fas fa-check-circle mr-2"></i> <span id="toastMessage">Fees schedule saved!</span>
        </div>
    </div>
<?php include 'footer.php' ?>

    <script>
        // ============================================================
        // ADD NEW ROW
        // ============================================================
        function addRow(button) {
            const container = document.getElementById('feeContainer');
            const currentRow = button.closest('.fee-row');
            
            // Clone the row
            const newRow = currentRow.cloneNode(true);
            
            // Clear input values
            newRow.querySelectorAll('input').forEach(input => input.value = '');
            
            // Insert after current row
            currentRow.parentNode.insertBefore(newRow, currentRow.nextSibling);
            
            // Update totals
            updateTotals();
            
            // Animate
            newRow.style.animation = 'none';
            requestAnimationFrame(() => {
                newRow.style.animation = 'fadeSlide 0.3s ease';
            });
        }

        // ============================================================
        // REMOVE ROW
        // ============================================================
        function removeRow(button) {
            const row = button.closest('.fee-row');
            const container = document.getElementById('feeContainer');
            
            // Don't remove if it's the last row
            if (container.children.length <= 1) {
                showToast('At least one fee item is required', 'warning');
                return;
            }
            
            // Animate removal
            row.classList.add('fee-row-removing');
            setTimeout(() => {
                row.remove();
                updateTotals();
            }, 250);
        }

        // ============================================================
        // UPDATE TOTALS
        // ============================================================
        function updateTotals() {
            const rows = document.querySelectorAll('.fee-row');
            const totalItems = rows.length;
            let totalAmount = 0;
            
            rows.forEach(row => {
                const amountInput = row.querySelector('input[name="amount[]"]');
                if (amountInput) {
                    const val = parseFloat(amountInput.value);
                    if (!isNaN(val) && val > 0) {
                        totalAmount += val;
                    }
                }
            });
            
            document.getElementById('totalItems').textContent = totalItems;
            document.getElementById('totalAmount').textContent = '₹ ' + totalAmount.toLocaleString('en-IN');
        }

        // ============================================================
        // REAL-TIME TOTAL UPDATE ON INPUT
        // ============================================================
        document.addEventListener('input', function(e) {
            if (e.target.name === 'label[]' || e.target.name === 'amount[]') {
                updateTotals();
            }
        });

        // ============================================================
        // SUBMIT FORM
        // ============================================================
        function submitFees(event) {
            event.preventDefault();
            
            const rows = document.querySelectorAll('.fee-row');
            const feesData = [];
            let isValid = true;
            
            rows.forEach(row => {
                const label = row.querySelector('input[name="label[]"]').value.trim();
                const amount = row.querySelector('input[name="amount[]"]').value.trim();
                
                if (!label) {
                    isValid = false;
                    row.querySelector('input[name="label[]"]').style.borderColor = '#dc2626';
                } else {
                    row.querySelector('input[name="label[]"]').style.borderColor = '';
                }
                
                if (!amount || isNaN(parseFloat(amount)) || parseFloat(amount) <= 0) {
                    isValid = false;
                    row.querySelector('input[name="amount[]"]').style.borderColor = '#dc2626';
                } else {
                    row.querySelector('input[name="amount[]"]').style.borderColor = '';
                }
                
                if (label && amount && parseFloat(amount) > 0) {
                    feesData.push({ label, amount: parseFloat(amount) });
                }
            });
            
            if (!isValid || feesData.length === 0) {
                showToast('Please fill all fields correctly', 'error');
                return;
            }
            
            // Display the data (you can send to server via AJAX here)
            console.log('Fees Data:', feesData);
            
            // Show success message
            const total = feesData.reduce((sum, item) => sum + item.amount, 0);
            showToast(`✅ Fees schedule saved! ${feesData.length} items, Total: ₹${total.toLocaleString('en-IN')}`, 'success');
            
            // You can send data to server here:
            // fetch('your-api-endpoint', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify({ fees: feesData })
            // })
        }

        // ============================================================
        // TOAST NOTIFICATION
        // ============================================================
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            const colors = {
                success: 'bg-teal-600',
                error: 'bg-red-600',
                warning: 'bg-amber-500',
                info: 'bg-blue-500'
            };
            
            toast.className = `fixed top-5 left-1/2 -translate-x-1/2 text-white px-6 py-3 rounded-xl shadow-lg z-50 transition-all duration-300 max-w-[90%] text-center ${colors[type] || colors.success}`;
            toastMessage.textContent = message;
            toast.classList.remove('hidden');
            
            clearTimeout(toast._timeout);
            toast._timeout = setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }

        // ============================================================
        // KEYBOARD SHORTCUT: Ctrl+Enter to submit
        // ============================================================
        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('feesForm').dispatchEvent(new Event('submit'));
            }
        });

        // ============================================================
        // INIT: Update totals on load
        // ============================================================
        document.addEventListener('DOMContentLoaded', function() {
            updateTotals();
        });
    </script>

</body>
</html>