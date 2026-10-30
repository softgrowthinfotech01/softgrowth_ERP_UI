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

            <!-- Global Error Banner -->
            <div id="globalErrorBanner" class="hidden mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                <span id="globalErrorMessage">Please correct the highlighted fields before proceeding.</span>
            </div>

            <!-- Header -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900 leading-tight">Add Class / Course</h1>
                        <p class="text-[11px] text-gray-500 mt-0.5">Type a course name and press Enter to add it to the database.</p>
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
                            <!-- Empty state / Loading state -->
                            <tr id="emptyRow">
                                <td colspan="3" class="text-center text-gray-500 py-6 text-[11px]">
                                    <i class="fas fa-spinner fa-spin mr-1 text-orange-400"></i> Loading courses...
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

    <!-- Script for API Integration -->
    <script>
        (function() {
            const token = localStorage.getItem('auth_token') || localStorage.getItem('token') || sessionStorage.getItem('token');
            if (!token) {
                alert('Authentication token missing. Please log in again.');
                window.location.href = 'login.php';
                return;
            }

            const baseUrl = typeof url !== 'undefined' ? url : '';
            const cleanBase = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;

            const courseInput = document.getElementById('courseInput');
            const addBtn = document.getElementById('addBtn');
            const tableBody = document.getElementById('tableBody');
            const countText = document.getElementById('countText');
            const globalBanner = document.getElementById('globalErrorBanner');
            const globalErrorMsg = document.getElementById('globalErrorMessage');

            let courses = [];

            function showError(msg) {
                globalErrorMsg.textContent = msg;
                globalBanner.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            function clearError() {
                globalBanner.classList.add('hidden');
            }

            // ============================================================
            // 1. FETCH COURSES (GET /student-classes)
            // ============================================================
            async function fetchCourses() {
                try {
                    const response = await fetch(`${cleanBase}/student-classes`, {
                        method: 'GET',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Accept': 'application/json'
                        }
                    });

                    const result = await response.json();
                    if (response.ok) {
                        const payload = result.data || result;
                        courses = Array.isArray(payload) ? payload : (payload.data || payload.classes || []);
                        renderTable();
                    } else if (response.status === 401) {
                        alert('Your session has expired. Please log in again.');
                        window.location.href = 'login.php';
                    } else if (response.status === 403) {
                        showError('You do not have permission to view classes.');
                    } else {
                        showError(result.message || 'Failed to fetch classes.');
                    }
                } catch (err) {
                    console.error('Fetch error:', err);
                    showError('Network error while loading classes.');
                }
            }

            // ============================================================
            // RENDER TABLE
            // ============================================================
            function renderTable() {
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

                countText.textContent = courses.length + ' entr' + (courses.length === 1 ? 'y' : 'ies');

                courses.forEach((course, index) => {
                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-orange-50/40 transition';
                    tr.innerHTML = `
                        <td class="px-4 py-2 border-b border-gray-100 text-gray-500">${index + 1}</td>
                        <td class="px-4 py-2 border-b border-gray-100 font-medium text-gray-800">${escapeHtml(course.class_name)}</td>
                        <td class="px-4 py-2 border-b border-gray-100 text-center">
                            <button type="button" class="delete-btn text-red-500 hover:text-red-700 hover:bg-red-50 rounded w-6 h-6 inline-flex items-center justify-center transition" data-id="${course.id}" title="Delete Class">
                                <i class="fas fa-trash text-[10px]"></i>
                            </button>
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });

                // Attach delete event listeners
                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const classId = this.getAttribute('data-id');
                        deleteCourse(classId);
                    });
                });
            }

            function escapeHtml(text) {
                const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
                return text.replace(/[&<>"']/g, m => map[m]);
            }

            // ============================================================
            // 2. ADD COURSE (POST /student-classes)
            // ============================================================
            async function addCourse() {
                clearError();
                const val = courseInput.value.trim();
                
                if (!val) {
                    showError('Please enter a Class / Course name.');
                    return;
                }

                addBtn.disabled = true;
                addBtn.innerHTML = '<i class="fas fa-spinner fa-spin text-xs"></i> Adding...';

                try {
                    const response = await fetch(`${cleanBase}/student-classes`, {
                        method: 'POST',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ class_name: val })
                    });

                    const result = await response.json();

                    if (response.status === 201 || response.ok) {
                        courseInput.value = '';
                        courseInput.focus();
                        await fetchCourses(); // Refresh list from backend
                    } else {
                        if (result.errors && result.errors.class_name) {
                            showError(result.errors.class_name[0]);
                        } else {
                            showError(result.message || 'Failed to add class.');
                        }
                    }
                } catch (err) {
                    console.error('Add error:', err);
                    showError('A network error occurred while saving the course.');
                } finally {
                    addBtn.disabled = false;
                    addBtn.innerHTML = '<i class="fas fa-plus text-xs"></i> Add';
                }
            }

            // ============================================================
            // 3. DELETE COURSE (DELETE /student-classes/{id})
            // ============================================================
            async function deleteCourse(id) {
                if (!confirm('Are you sure you want to delete this class?')) return;

                clearError();
                try {
                    const response = await fetch(`${cleanBase}/student-classes/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Accept': 'application/json'
                        }
                    });

                    const result = await response.json();
                    if (response.ok) {
                        await fetchCourses(); // Refresh list from backend
                    } else {
                        showError(result.message || 'Failed to delete class.');
                    }
                } catch (err) {
                    console.error('Delete error:', err);
                    showError('A network error occurred while deleting the course.');
                }
            }

            // Event Listeners
            addBtn.addEventListener('click', addCourse);

            courseInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addCourse();
                }
            });

            // Initial load
            fetchCourses();

        })();
    </script>

</body>

</html>
