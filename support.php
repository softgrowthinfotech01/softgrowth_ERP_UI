<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Support - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* Minimal custom styles – only for subtle hover/transition effects */
        .support-btn {
            transition: all 0.2s ease;
        }
        .support-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(15, 118, 110, 0.25);
        }
        /* keep card consistent */
        .support-card {
            transition: box-shadow 0.2s;
        }
        .support-card:hover {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }
        /* responsive tweaks – Tailwind handles most */
        @media (max-width: 640px) {
            .support-card {
                padding: 1.25rem !important; /* override Tailwind's p-6 to be smaller */
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- PHP includes (header + sidebar) – keep your existing structure -->
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 transition-all duration-200">

        <!-- GRID: two columns on desktop, stacked on mobile -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- ===== LEFT CARD: Support Center ===== -->
            <div class="support-card bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">

                <!-- Heading -->
                <div class="flex items-center gap-4 mb-4 pb-4 border-b border-gray-100">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold text-gray-900">Support Center</h1>
                        <p class="text-sm text-gray-500">ERP help and service desk</p>
                    </div>
                </div>

                <!-- Description -->
                <p class="text-gray-600 text-sm font-medium leading-relaxed mb-4">
                    Need help? Contact our ERP support team anytime.
                </p>

                <!-- Contact Details -->
                <div class="space-y-3">
                    <p class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 font-semibold text-sm">
                        <i class="fas fa-phone-alt text-teal-600 w-5"></i> +91 98765 43210
                    </p>
                    <p class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 font-semibold text-sm">
                        <i class="fas fa-envelope text-teal-600 w-5"></i> support@erpdashboard.com
                    </p>
                    <p class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 font-semibold text-sm">
                        <i class="fas fa-clock text-teal-600 w-5"></i> Working Hours: 10 AM - 6 PM
                    </p>
                </div>

            </div>

            <!-- ===== RIGHT CARD: Send Message ===== -->
            <div class="support-card bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">

                <!-- Heading -->
                <div class="flex items-center gap-4 mb-4 pb-4 border-b border-gray-100">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold text-gray-900">Send Message</h2>
                        <p class="text-sm text-gray-500">Write your issue or request</p>
                    </div>
                </div>

                <!-- Form -->
                <form class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Your Name</label>
                        <input type="text" id="name" placeholder="Your Name" 
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Your Email</label>
                        <input type="email" id="email" placeholder="Your Email" 
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-1">Your Message</label>
                        <textarea id="message" rows="5" placeholder="Your Message" 
                                  class="w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4"></textarea>
                    </div>
                    <button type="submit" class="support-btn w-full bg-teal-600 text-white font-bold py-3 px-6 rounded-xl shadow-md hover:bg-teal-700 focus:ring-2 focus:ring-teal-300">
                        <i class="fas fa-paper-plane mr-2"></i> Submit Request
                    </button>
                </form>

            </div>

        </div>

    </main>

    <!-- PHP footer include -->
    <?php include 'footer.php'; ?>

</body>
</html>