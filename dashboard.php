<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ERP Dashboard Animatic</title>

<link rel="stylesheet" href="dist/output.css">
<script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>

<style>
/* LIGHT FLOAT ANIMATION */
@keyframes float {
    0%,100% { transform: translateY(0px); }
    50% { transform: translateY(-6px); }
}

.float {
    animation: float 4s ease-in-out infinite;
    will-change: transform;
}

.icon-pop {
    transition: transform 0.25s ease;
}

.icon-pop:hover {
    transform: scale(1.08);
}

body {
    overflow-x: hidden;
    background-color: #0f172a;
}

/* lighter card performance */
.erp-card {
    background: rgba(31,41,55,0.95);
    border: 1px solid rgba(255,255,255,0.10);
    border-radius: 24px;
    padding: 24px;
}

/* mobile smoother */
@media (max-width: 768px) {
    .float {
        animation: none;
    }

    .erp-chart {
        height: 300px !important;
    }
}
</style>
</head>

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center"
      style="background-image: url('images/bg8.jpeg');">

<div class="bg"></div>

<!-- HEADER -->
<?php include 'header.php' ?>

<!-- SIDEBAR -->
<?php include 'sidebar.php' ?>

<!-- MAIN -->
<main class="pt-24 lg:ml-72 px-6 pb-10 mb-20">

    <!-- CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- CARD 1 -->
        <div class="erp-card">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-white font-bold text-xl">Students</p>
                    <h2 class="text-4xl font-bold mt-2">12K</h2>
                </div>
                <div class="text-5xl float icon-pop">🎓</div>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="erp-card">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-white font-bold text-xl">Teachers</p>
                    <h2 class="text-4xl font-bold mt-2">540</h2>
                </div>
                <div class="text-5xl float icon-pop">👨‍🏫</div>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="erp-card">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-white font-bold text-xl">Revenue</p>
                    <h2 class="text-4xl font-bold mt-2">$85K</h2>
                </div>
                <div class="text-5xl float icon-pop">💰</div>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="erp-card">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-white font-bold text-xl">Courses</p>
                    <h2 class="text-4xl font-bold mt-2">320</h2>
                </div>
                <div class="text-5xl float icon-pop">📚</div>
            </div>
        </div>

    </div>

    <!-- CHART SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">

        <div class="erp-card">
            <h2 class="text-white font-bold text-xl mb-4">Performance Cube</h2>
            <div id="bar3d" class="erp-chart" style="height: 400px;"></div>
        </div>

        <div class="erp-card">
            <h2 class="text-white font-bold text-xl mb-4">Distribution Sphere</h2>
            <div id="pie3d" class="erp-chart" style="height: 400px;"></div>
        </div>

    </div>

</main>

<!-- FOOTER -->
<?php include 'footer.php' ?>

<script>
// ================= SMOOTH LIGHT BAR CHART =================
const bar3d = echarts.init(document.getElementById('bar3d'));

bar3d.setOption({
    backgroundColor: 'transparent',

    tooltip: {
        trigger: 'axis',
        backgroundColor: 'rgba(15,23,42,0.95)',
        borderColor: '#334155',
        textStyle: { color: '#fff' }
    },

    grid: {
        left: '5%',
        right: '5%',
        bottom: '10%',
        top: '12%',
        containLabel: true
    },

    xAxis: {
        type: 'category',
        data: ['Jan','Feb','Mar','Apr','May','Jun'],
        axisLabel: { color: '#94a3b8' },
        axisLine: { lineStyle: { color: '#334155' } }
    },

    yAxis: {
        type: 'value',
        axisLabel: { color: '#94a3b8' },
        splitLine: { lineStyle: { color: 'rgba(148,163,184,0.15)' } }
    },

    series: [{
        type: 'bar',
        data: [1200,1900,3000,2500,3200,4000],
        barWidth: '45%',
        itemStyle: {
            color: '#38bdf8',
            borderRadius: [10,10,0,0]
        }
    }]
});


// ================= SMOOTH LIGHT DONUT CHART =================
const pie3d = echarts.init(document.getElementById('pie3d'));

pie3d.setOption({
    backgroundColor: 'transparent',

    tooltip: {
        trigger: 'item',
        backgroundColor: 'rgba(15,23,42,0.95)',
        borderColor: '#334155',
        textStyle: { color: '#fff' }
    },

    legend: {
        bottom: 0,
        textStyle: {
            color: '#cbd5e1',
            fontWeight: 'bold'
        }
    },

    graphic: [
        {
            type: 'text',
            left: 'center',
            top: '39%',
            style: {
                text: '12K',
                fill: '#fff',
                fontSize: 36,
                fontWeight: 'bold'
            }
        },
        {
            type: 'text',
            left: 'center',
            top: '52%',
            style: {
                text: 'ERP ANALYTICS',
                fill: '#94a3b8',
                fontSize: 13,
                fontWeight: 700
            }
        }
    ],

    series: [{
        type: 'pie',
        radius: ['45%', '72%'],
        center: ['50%', '45%'],
        avoidLabelOverlap: true,
        animationDuration: 700,

        itemStyle: {
            borderRadius: 12,
            borderColor: '#020617',
            borderWidth: 4
        },

        label: {
            color: '#fff',
            formatter: '{b}\n{d}%',
            fontWeight: 'bold'
        },

        emphasis: {
            scale: true,
            scaleSize: 8
        },

        data: [
            { value: 60, name: 'Students', itemStyle: { color: '#06b6d4' } },
            { value: 10, name: 'Teachers', itemStyle: { color: '#8b5cf6' } },
            { value: 20, name: 'Courses', itemStyle: { color: '#22c55e' } },
            { value: 10, name: 'Revenue', itemStyle: { color: '#f59e0b' } }
        ]
    }]
});


// RESPONSIVE RESIZE
let resizeTimer;
window.addEventListener('resize', function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
        bar3d.resize();
        pie3d.resize();
    }, 150);
});
</script>

</body>
</html>