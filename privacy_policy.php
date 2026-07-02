<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Privacy Policy - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* Minimal custom styles – only for the animated border and card */
        .policy-card {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
        }
        /* .policy-card::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: conic-gradient(from 180deg, #0f766e, #14b8a6, #22c55e, #f59e0b, #0f766e);
            opacity: 0.35;
            animation: spinGlow 7s linear infinite;
            z-index: 0;
        }
        .policy-card::after {
            content: "";
            position: absolute;
            inset: 2px;
            border-radius: 26px;
            background: #ffffff;
            z-index: 1;
        } */
        .policy-card > * {
            position: relative;
            z-index: 2;
        }
        @keyframes spinGlow {
            to { transform: rotate(360deg); }
        }
        /* subtle hover effect for list items */
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
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-gray-900">Privacy Policy</h1>
                    <p class="text-sm text-gray-500">Student and institutional data protection policy</p>
                </div>
            </div>

            <!-- Content -->
            <p class="text-gray-700 text-base font-medium leading-relaxed">
                We respect your privacy and are committed to protecting student and institutional data in our ERP system.
            </p>

            <ul class="policy-list mt-5 grid gap-3">
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 text-lg">✅</span>
                    <span class="text-gray-700 font-semibold">We do not share personal student data with third parties.</span>
                </li>
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 text-lg">✅</span>
                    <span class="text-gray-700 font-semibold">All payments and records are securely stored.</span>
                </li>
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 text-lg">✅</span>
                    <span class="text-gray-700 font-semibold">Only authorized staff can access sensitive data.</span>
                </li>
                <li class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200 hover:border-teal-600 transition">
                    <span class="text-teal-600 text-lg">✅</span>
                    <span class="text-gray-700 font-semibold">We use secure encryption for data protection.</span>
                </li>
            </ul>

            <p class="mt-6 text-sm text-gray-400 font-semibold">
                Last updated: 2026
            </p>

        </div>

    </main>

    <!-- PHP footer include -->
    <?php include 'footer.php'; ?>

</body>
</html>