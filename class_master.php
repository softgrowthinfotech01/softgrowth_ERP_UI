<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Class Master - ERP</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-24 pb-10 mb-10 transition-all duration-200 flex flex-col items-center justify-center">
        
        <div class="w-full max-w-3xl space-y-4">

            <!-- Header -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900 leading-tight">Add Class / Course</h1>
                        <p class="text-[11px] text-gray-500 mt-0.5">Type a course name and press Enter to add it to the list.</p>
                    </div>
                </div>
            </div>

            <!-- Input Section -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4">
                <label class="block text-[12px] font-bold text-gray-700 mb-1.5">Class / Course Name</label>
                <div class="flex gap-2">
                    <div class="relative flex-1">
                        <i class="fas fa-book absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                        <input type="text" id="courseInput" placeholder="e.g. BCA, B.Sc, Class 10..."
                               class="w-full pl-8 pr-3 py-2.5 text-sm rounded-lg border border-gray-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 focus:outline-none shadow-sm">
                    </div>
                    <button type="button" id="addBtn"
                            class="px-5 py-2.5 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-sm shadow-md flex items-center gap-2">
                        <i class="fas fa-plus text-xs"></i> Add
                    </button>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                <div class="bg-orange-50 px-4 py-2.5 border-b border-orange-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-list text-orange-500 text-xs"></i>
                        <h3 class="font-bold text-gray-800 text-[13px]">Added Courses</h3>
                    </div>
                    <span class="text-[10px] text-gray-500" id="countText">0 entries</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[400px] border-collapse text-[12px]">
                        <thead>
                            <tr>
                                <th class="text-left font-bold text-gray-700 bg-gray-50 px-4 py-2 border-b border-gray-200 w-12">#</th>
                                <th class="text-left font-bold text-gray-700 bg-gray-50 px-4 py-2 border-b border-gray-200">Class / Course</th>
                                <th class="text-center font-bold text-gray-700 bg-gray-50 px-4 py-2 border-b border-gray-200 w-20">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Empty state -->
                            <tr id="emptyRow">
                                <td colspan="3" class="text-center text-gray-500 py-6 text-[11px]">
                                    <i class="fas fa-info-circle mr-1 text-orange-400"></i> No courses added yet.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <!-- Script for adding inputs to table -->
    <script>
        (function() {
            const courseInput = document.getElementById('courseInput');
            const addBtn = document.getElementById('addBtn');
            const tableBody = document.getElementById('tableBody');
            const emptyRow = document.getElementById('emptyRow');
            const countText = document.getElementById('countText');

            let courses = []; // Array to hold the data

            // Render the table based on the array
            function renderTable() {
                // Clear current rows except the empty state
                tableBody.innerHTML = '';
                
                if (courses.length === 0) {
                    tableBody.innerHTML = `
                        <tr id="emptyRow">
                            <td colspan="3" class="text-center text-gray-500 py-6 text-[11px]">
                                <i class="fas fa-info-circle mr-1 text-orange-400"></i> No courses added yet.
                            </td>
                        </tr>
                    `;
                    countText.textContent = '0 entries';
                    return;
                }

                // Update count
                countText.textContent = courses.length + ' entry' + (courses.length === 1 ? '' : 'ies');

                // Loop through array and create rows
                courses.forEach((course, index) => {
                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-orange-50/40 transition';
                    tr.innerHTML = `
                        <td class="px-4 py-2 border-b border-gray-100 text-gray-500">${index + 1}</td>
                        <td class="px-4 py-2 border-b border-gray-100 font-medium text-gray-800">${course}</td>
                        <td class="px-4 py-2 border-b border-gray-100 text-center">
                            <button type="button" class="delete-btn text-red-500 hover:text-red-700 hover:bg-red-50 rounded w-6 h-6 inline-flex items-center justify-center transition" data-index="${index}">
                                <i class="fas fa-trash text-[10px]"></i>
                            </button>
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });

                // Attach delete event listeners
                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const idx = parseInt(this.getAttribute('data-index'), 10);
                        courses.splice(idx, 1); // Remove item from array
                        renderTable(); // Re-render
                    });
                });
            }

            // Function to handle adding
            function addCourse() {
                const val = courseInput.value.trim();
                
                if (!val) {
                    alert('Please enter a Class / Course name.');
                    return;
                }

                // Check for duplicates
                if (courses.includes(val)) {
                    alert('This course is already added.');
                    return;
                }

                courses.push(val); // Add to array
                courseInput.value = ''; // Clear input
                courseInput.focus(); // Keep focus for fast entry
                renderTable(); // Update UI
            }

            // Button click event
            addBtn.addEventListener('click', addCourse);

            // Enter key event
            courseInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addCourse();
                }
            });

        })();
    </script>

</body>

</html>