<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        .input-box {
            position: relative;
        }
        .eye-btn {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.2s;
            font-size: 1.1rem;
            line-height: 1;
        }
        .eye-btn:hover {
            color: #0f766e;
        }
        .input:focus {
            border-color: #0f766e;
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.15);
            outline: none;
        }
    </style>
</head>
<body class="bg-gray-300 text-gray-800 antialiased min-h-screen">

    <!-- PHP includes (header + sidebar) -->
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT - CENTERED WRAPPER -->
    <main class="md:ml-[300px] px-4 sm:px-6 py-28 pb-10 mb-8 lg:mb-10 transition-all duration-200 flex flex-col items-center justify-center">

        <!-- CONTENT CONTAINER -->
        <div class="w-full max-w-4xl space-y-8">

            <!-- ===== PROFILE DETAILS CARD ===== -->
            <div class="w-full bg-white rounded-2xl shadow-sm border border-gray-300 p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                    <div class="w-11 h-11 rounded-xl bg-teal-600 text-white flex items-center justify-center text-xl shadow-md">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900">User Profile Details</h2>
                        <p class="text-sm text-gray-500">View your current account information</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Name -->
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">User Name</span>
                        <p id="profileName" class="text-gray-900 font-semibold text-lg">Gangadhar</p>
                    </div>

                    <!-- Email -->
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Email Address</span>
                        <p id="profileEmail" class="text-gray-900 font-semibold text-lg">gangadhar@example.com</p>
                    </div>

                    <!-- Role -->
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">User Role</span>
                        <p id="profileRole" class="text-teal-700 font-bold text-lg uppercase">Admin</p>
                    </div>
                </div>
            </div>

            <!-- ===== UPDATE PASSWORD CARD ===== -->
            <div class="w-full bg-white rounded-2xl shadow-sm border border-gray-300 p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                    <div class="w-11 h-11 rounded-xl bg-teal-600 text-white flex items-center justify-center text-xl shadow-md">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900">Update Password</h2>
                        <p class="text-sm text-gray-500">Secure your ERP account with a strong password</p>
                    </div>
                </div>

                <!-- Form -->
                <form class="space-y-5" onsubmit="event.preventDefault(); updatePassword();">

                    <!-- Current Password -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Current Password</label>
                        <div class="input-box">
                            <input type="password" id="currentPassword" placeholder="Enter current password" 
                                   class="input w-full rounded-xl border border-gray-300 shadow-sm bg-white py-2.5 px-4 pr-12" />
                            <span class="eye-btn" onclick="togglePassword('currentPassword', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <!-- New Password -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">New Password</label>
                        <div class="input-box">
                            <input type="password" id="newPassword" placeholder="Enter new password" 
                                   class="input w-full rounded-xl border border-gray-300 shadow-sm bg-white py-2.5 px-4 pr-12" />
                            <span class="eye-btn" onclick="togglePassword('newPassword', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Confirm Password</label>
                        <div class="input-box">
                            <input type="password" id="confirmPassword" placeholder="Confirm password" 
                                   class="input w-full rounded-xl border border-gray-300 shadow-sm bg-white py-2.5 px-4 pr-12" />
                            <span class="eye-btn" onclick="togglePassword('confirmPassword', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-2 flex justify-end">
                        <button type="submit" id="submitBtn" class="bg-teal-600 text-white font-bold py-3 px-6 rounded-xl shadow-md hover:bg-teal-700 transition focus:ring-2 focus:ring-teal-300">
                            <i class="fas fa-sync-alt mr-2"></i> Update Password
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </main>

    <!-- PHP footer include -->
    <?php include 'footer.php'; ?>
    <script src="url.js"></script>

    <!-- ============================================================
    JAVASCRIPT – Fetch Profile & Update Password Logic
    ============================================================ -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetchUserProfile();
        });

        async function fetchUserProfile() {
            try {
                const token = localStorage.getItem("token");
                const response = await fetch(url + "profile", {
                    method: "GET",
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        "Accept": "application/json"
                    }
                });

                const result = await response.json();
                if (response.ok) {
                    const user = result.data || result;
                    document.getElementById("profileName").innerText = user.name || "N/A";
                    document.getElementById("profileEmail").innerText = user.email || "N/A";
                    document.getElementById("profileRole").innerText = user.role || "N/A";
                } else {
                    console.error("Failed to load profile data");
                }
            } catch (error) {
                console.error("Error fetching profile:", error);
            }
        }

        function togglePassword(id, icon) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = "password";
                icon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        async function updatePassword() {
            const currentPassword = document.getElementById("currentPassword").value.trim();
            const newPassword = document.getElementById("newPassword").value.trim();
            const confirmPassword = document.getElementById("confirmPassword").value.trim();

            if (!currentPassword || !newPassword || !confirmPassword) {
                alert("All password fields are required.");
                return;
            }

            if (newPassword !== confirmPassword) {
                alert("New password and confirm password do not match.");
                return;
            }

            if (newPassword.length < 6) {
                alert("New password must be at least 6 characters long.");
                return;
            }

            const token = localStorage.getItem("token");
            const submitBtn = document.getElementById("submitBtn");

            try {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Updating...';

                const response = await fetch(url + "update-password", {
                    method: "POST",
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        current_password: currentPassword,
                        new_password: newPassword,
                        new_password_confirmation: confirmPassword
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    alert("Password Updated Successfully ✅");
                    location.reload();
                } else {
                    alert(result.message || "Failed to update password.");
                }
            } catch (error) {
                console.error(error);
                alert("API Connection Error");
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-sync-alt mr-2"></i> Update Password';
            }
        }
    </script>

</body>
</html>