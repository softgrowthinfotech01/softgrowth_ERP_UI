<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ERP Dashboard</title>

    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com">
    </script>
  

    <!-- ECharts -->
    <script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js">
    </script>

    <!-- Font Awesome (optional icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
         .sidebar-fixed {
            width: 288px;
        }

        .chart-box {
            height: 260px;
            width: 100%;
        }

        @media (max-width: 1023px) {
            .sidebar-fixed {
                width: 100%;
            }
            main {
                margin-left: 0 !important;
            }
            .footer-offset {
                margin-left: 0 !important;
                width: 100% !important;
            }
        }

        @media (min-width: 1024px) {
            main {
                margin-left: 288px;
            }
            .footer-offset {
                margin-left: 288px;
                width: calc(100% - 288px);
            }
        }

        /* small touch for cards */
        .stat-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.07);
        }

    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <!-- PHP includes (header + sidebar) -->
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="pt-24 mb-8 px-4 sm:px-6 pb-10 lg:mb-10 transition-all duration-200">

        <!-- HERO -->
        <!-- <section class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Dashboard
                </h1>
                <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    Live
                </span>
            </div>
            <p class="text-sm text-gray-500 mt-1">Overview of your ERP system</p>
        </section> -->

        <!-- STATS CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

            <!-- Card 1 -->
            <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider text-gray-500">Total Students</p>
                        <h2 class="text-xl font-bold text-gray-900 mt-3">5K</h2>
                      
                    </div>
                    <div class="w-11 h-11 rounded-xl text-gray-500 flex items-center justify-center text-2xl md:mt-2">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider text-gray-500">Courses</p>
                        <h2 class="text-xl font-bold text-gray-900 mt-3">10</h2>
                        
                    </div>
                    <div class="w-11 h-11 rounded-xl text-gray-500 flex items-center justify-center text-2xl md:mt-2">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider text-gray-500">Revenue</p>
                        <h2 class="text-xl font-bold text-gray-900 mt-3">85K</h2>
                      
                    </div>
                    <div class="w-11 h-11 rounded-xl text-gray-500 flex items-center justify-center text-2xl md:mt-2">
                        <i class="fas fa-coins"></i>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider text-gray-500">Expenses</p>
                        <h2 class="text-xl font-bold text-gray-900 mt-3">44K</h2>
                      
                    </div>
                    <div class="w-11 h-11 rounded-xl text-gray-500 flex items-center justify-center text-2xl md:mt-2">
                        <i class="fas fa-book-open"></i>
                    </div>
                </div>
            </div>

        </div>

        <!-- CHARTS ROW -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

            <!-- Bar Chart -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold uppercase tracking-wider text-gray-500">Monthly Performance</h2>
                    <span class="text-xs font-semibold text-gray-400 bg-gray-50 px-3 py-1 rounded-full border border-gray-200">2026</span>
                </div>
                <div id="barChart" class="chart-box"></div>
            </div>

            <!-- Pie Chart -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold uppercase tracking-wider text-gray-500">ERP Distribution</h2>
                    <span class="text-xs font-semibold text-gray-400 bg-gray-50 px-3 py-1 rounded-full border border-gray-200">Live</span>
                </div>
                <div id="pieChart" class="chart-box"></div>
            </div>

        </div>

    </main>

    <!-- FOOTER (PHP include) -->
    <?php include 'footer.php'; ?>

    <!-- ============================================================
    CHARTS INIT
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ---- BAR CHART ----
            const barChart = echarts.init(document.getElementById('barChart'));
            barChart.setOption({
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: '#fff',
                    borderColor: '#e5e7eb',
                    textStyle: { color: '#1f2937' }
                },
                grid: {
                    left: '6%',
                    right: '5%',
                    bottom: '12%',
                    top: '8%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    axisLabel: { color: '#4c4e52', fontWeight: '500', fontSize: 13 },
                    axisLine: { lineStyle: { color: '#e5e7eb' } },
                    axisTick: { show: false }
                },
                yAxis: {
                    type: 'value',
                    axisLabel: { color: '#4c4e52', fontSize: 13 },
                    splitLine: { lineStyle: { color: '#f3f4f6' } },
                },
                series: [{
                    type: 'bar',
                    data: [1200, 1900, 3000, 2500, 3200, 4000],
                    barWidth: '40%',
                    itemStyle: {
                        borderRadius: [8, 8, 0, 0],
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                            { offset: 0, color: '#14b8a6' },
                            { offset: 1, color: '#0f766e' }
                        ])
                    }
                }]
            });

            // ---- PIE CHART ----
            const pieChart = echarts.init(document.getElementById('pieChart'));
            pieChart.setOption({
                tooltip: {
                    trigger: 'item',
                    backgroundColor: '#fff',
                    borderColor: '#e5e7eb',
                    textStyle: { color: '#1f2937' }
                },
                legend: {
                    bottom: 0,
                    textStyle: { color: '#4a4f55', fontWeight: '500', fontSize: 14 },
                    itemGap: 16,
                },
                graphic: [{
                    type: 'text',
                    left: 'center',
                    top: '38%',
                    style: {
                        text: '12K',
                        fill: '#1f2937',
                        fontSize: 26,
                        fontWeight: 'bold'
                    }
                }, {
                    type: 'text',
                    left: 'center',
                    top: '50%',
                    style: {
                        text: 'TOTAL',
                        fill: '#4d525b',
                        fontSize: 12,
                        fontWeight: '700',
                        letterSpacing: 4
                    }
                }],
                series: [{
                    type: 'pie',
                    radius: ['48%', '74%'],
                    center: ['50%', '44%'],
                    itemStyle: {
                        borderRadius: 10,
                        borderColor: '#ffffff',
                        borderWidth: 4
                    },
                    label: {
                        color: '#1f2937',
                        formatter: '{b}\n{d}%',
                        fontWeight: '500',
                        fontSize: 13,
                        lineHeight: 16
                    },
                    emphasis: {
                        scale: true,
                        scaleSize: 8
                    },
                    data: [
               { value: 60, name: 'Students', itemStyle: { color: '#037f70' } },
{ value: 10, name: 'Expenses', itemStyle: { color: '#1c534d' } },
{ value: 20, name: 'Courses', itemStyle: { color: '#14B8A6' } },
{ value: 10, name: 'Revenue', itemStyle: { color: '#5EEAD4' } }
                    ]
                }]
            });

            // ---- RESIZE ----
            let timer;
            window.addEventListener('resize', function() {
                clearTimeout(timer);
                timer = setTimeout(function() {
                    barChart.resize();
                    pieChart.resize();
                }, 150);
            });

        });
    </script>

</body>

</html>