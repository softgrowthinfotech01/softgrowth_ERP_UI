<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Terms &amp; Conditions - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* minimal custom styles – only for the animated border */
        .policy-card {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
        }
     
        .policy-card > * {
            position: relative;
            z-index: 2;
        }
        @keyframes spinGlow {
            to { transform: rotate(360deg); }
        }
        /* subtle hover for list items */
        .policy-list li {
            transition: 0.2s;
        }
        .policy-list li:hover {
            background: #f0fdfa;
            border-color: #0f766e;
        }
    </style>
</head>
<body class="bg-gray-300 text-gray-800 antialiased">

    <!-- PHP includes (header + sidebar) – keep your existing structure -->
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="lg:ml-72 max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 transition-all duration-200">

        <!-- ===== POLICY CARD ===== -->
        <div class="policy-card bg-white shadow-sm border border-gray-200 p-6 md:p-8">

            <!-- Heading -->
            <div class="flex items-center gap-4 mb-6 pb-4 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-file-contract"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-gray-900">Terms &amp; Conditions</h1>
                    <p class="text-sm text-gray-500">Rules and guidelines for using the ERP system</p>
                </div>
            </div>

            <!-- Content -->
            <p class="text-gray-700 text-base font-medium leading-relaxed">
                By using this ERP system, you agree to comply with the following terms and conditions. These rules help maintain the security, integrity, and proper functioning of the platform.
            </p>

            <ul class="policy-list mt-5 grid gap-3">
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 font-bold text-lg">①</span>
                    <span class="text-gray-700 font-semibold">Users must not misuse, exploit, or attempt to hack the system.</span>
                </li>
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 font-bold text-lg">②</span>
                    <span class="text-gray-700 font-semibold">All information entered into the ERP must be accurate and verified.</span>
                </li>
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 font-bold text-lg">③</span>
                    <span class="text-gray-700 font-semibold">ERP administrators have full authority to manage user permissions and access rights.</span>
                </li>
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 font-bold text-lg">④</span>
                    <span class="text-gray-700 font-semibold">Unauthorized access attempts may result in account suspension or termination.</span>
                </li>
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 font-bold text-lg">⑤</span>
                    <span class="text-gray-700 font-semibold">System activities may be monitored and logged for security and auditing purposes.</span>
                </li>
            </ul>

            <!-- Notice Box -->
            <div class="mt-6 p-5 rounded-xl bg-teal-50 border border-teal-200">
                <h3 class="text-base font-extrabold text-gray-900">Important Notice</h3>
                <p class="text-gray-700 text-sm leading-relaxed mt-1">
                    Continued use of this ERP system indicates acceptance of these terms and conditions. Users are responsible for maintaining the confidentiality of their login credentials and protecting access to their accounts.
                </p>
            </div>

            <p class="mt-6 text-sm text-gray-400 font-semibold">
                Last Updated: 2026
            </p>

        </div>

    </main>

    <!-- PHP footer include -->
    <?php include 'footer.php'; ?>

</body>
</html>