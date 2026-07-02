<footer class="erp-footer fixed bottom-0 right-0 left-0 lg:left-72 z-50 bg-transparent">
    <div class="erp-footer-wrap flex flex-col sm:flex-row items-center justify-between gap-3 px-4 sm:px-6 py-3 sm:py-4 bg-white border-t border-gray-200 rounded-t-2xl shadow-lg">

        <!-- LEFT -->
        <div class="erp-footer-left flex items-center gap-3 bg-gray-50 px-4 py-2 rounded-full border border-gray-200">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 shadow-md shadow-emerald-500/50"></span>
            <p class="text-xs sm:text-sm font-bold text-gray-600">
                © 2026 <strong class="text-gray-800">ERP Dashboard</strong>
                <span class="text-gray-400 hidden sm:inline">All Rights Reserved</span>
            </p>
        </div>

        <!-- RIGHT -->
        <!-- <div class="erp-footer-right flex flex-wrap items-center gap-2">
            <a href="privacy_policy.php" class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-bold text-gray-600 bg-gray-50 border border-gray-200 hover:bg-teal-50 hover:text-teal-600 hover:border-teal-300 hover:shadow-md transition-all duration-200">
                Privacy
            </a>
            <a href="terms_conditions.php" class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-bold text-gray-600 bg-gray-50 border border-gray-200 hover:bg-teal-50 hover:text-teal-600 hover:border-teal-300 hover:shadow-md transition-all duration-200">
                Terms
            </a>
            <a href="support.php" class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-bold text-gray-600 bg-gray-50 border border-gray-200 hover:bg-teal-50 hover:text-teal-600 hover:border-teal-300 hover:shadow-md transition-all duration-200">
                Support
            </a>
        </div> -->

    </div>
</footer>

<style>
    /* minimal custom – ensures footer stays at bottom and has proper z-index */
    .erp-footer {
        z-index: 50;
    }
    .erp-footer-wrap {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    @media (max-width: 640px) {
        .erp-footer-wrap {
            border-radius: 16px 16px 0 0;
        }
    }
</style>

<script>
    // No JavaScript needed – pure static footer
</script>