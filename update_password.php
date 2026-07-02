<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Password - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* Minimal custom style for eye toggle – Tailwind can't handle the pseudo-toggle */
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
        /* subtle focus ring for inputs – Tailwind does it, but ensure consistency */
        .input:focus {
            border-color: #0f766e;
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.15);
            outline: none;
        }
    </style>
</head>
<body class="bg-gray-300 text-gray-800 antialiased">

    <!-- PHP includes (header + sidebar) – keep your existing structure -->
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 lg:mb-10 transition-all duration-200 flex items-center justify-center min-h-[calc(100vh-12rem)]">

        <!-- ===== PASSWORD CARD ===== -->
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">

            <!-- Heading -->
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-gray-900">Update Admin Password</h2>
                    <p class="text-sm text-gray-500">Secure your ERP account with a strong password</p>
                </div>
            </div>

            <!-- Form -->
            <form class="space-y-5">

                <!-- Current Password -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Current Password</label>
                    <div class="input-box">
                        <input type="password" id="currentPassword" placeholder="Enter current password" 
                               class="input w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4 pr-12" />
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
                               class="input w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4 pr-12" />
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
                               class="input w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4 pr-12" />
                        <span class="eye-btn" onclick="togglePassword('confirmPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <!-- Submit -->
                <div class="pt-2">
                    <button type="submit" class="w-full bg-teal-600 text-white font-bold py-3 px-6 rounded-xl shadow-md hover:bg-teal-700 transition focus:ring-2 focus:ring-teal-300">
                        <i class="fas fa-sync-alt mr-2"></i> Update Password
                    </button>
                </div>

            </form>

        </div>

    </main>

    <!-- PHP footer include -->
    <?php include 'footer.php'; ?>

    <!-- ============================================================
    JAVASCRIPT – toggle password visibility
    ============================================================ -->
    <script>
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
    </script>

</body>
</html>