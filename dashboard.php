<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ERP Dashboard Animatic</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/echarts-gl@2/dist/echarts-gl.min.js"></script>

<style>

/* ===== FLOAT ANIMATION ===== */
@keyframes float {
    0%   { transform: translateY(0px); }
    50%  { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

.float {
    animation: float 3s ease-in-out infinite;
}

/* ===== 3D CARD EFFECT ===== */

canvas {
    filter: drop-shadow(0px 18px 25px rgba(0,0,0,0.45));
}

/* ICON POP */
.icon-pop {
    transition: transform 0.3s ease;
}



/* ===== ANIMATED GRADIENT BACKGROUND ===== */
body {
    background: linear-gradient(-45deg,
        #0b1220,
        #111827,
        #0f172a,
        #1e1b4b,
        #0b3b5a
    );
    background-size: 400% 400%;
    animation: gradientMove 15s ease infinite;
    overflow-x: hidden;
}

/* smooth motion */
@keyframes gradientMove {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
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
<main class="pt-24 lg:ml-72 px-6 pb-10">

    <!-- CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- CARD 1 -->
<div class="bg-gray-800 backdrop-blur-xl border border-white/10 rounded-3xl p-6">            <div class="flex justify-between items-center">
                <div>
                    <p class="text-white font-bold text-xl">Students</p>
                    <h2 class="text-4xl font-bold mt-2">12K</h2>
                </div>
                <div class="text-5xl float icon-pop">🎓</div>
            </div>
        </div>

        <!-- CARD 2 -->
<div class="bg-gray-800 backdrop-blur-xl border border-white/10 rounded-3xl p-6">            <div class="flex justify-between items-center">
                <div>
                    <p class="text-white font-bold text-xl">Teachers</p>
                    <h2 class="text-4xl font-bold mt-2">540</h2>
                </div>
                <div class="text-5xl float icon-pop">👨‍🏫</div>
            </div>
        </div>

        <!-- CARD 3 -->
<div class="bg-gray-800 backdrop-blur-xl border border-white/10 rounded-3xl p-6">            <div class="flex justify-between items-center">
                <div>
                    <p class="text-whtie font-bold text-xl">Revenue</p>
                    <h2 class="text-4xl font-bold mt-2">$85K</h2>
                </div>
                <div class="text-5xl float icon-pop">💰</div>
            </div>
        </div>

        <!-- CARD 4 -->
<div class="bg-gray-800 backdrop-blur-xl border border-white/10 rounded-3xl p-6">            <div class="flex justify-between items-center">
                <div>
                    <p class="text-white font-bold text-xl">Courses</p>
                    <h2 class="text-4xl font-bold mt-2">320</h2>
                </div>
                <div class="text-5xl float icon-pop">📚</div>
            </div>
        </div>

    </div>

    <!-- CHART SECTION -->
<!-- CHART SECTION -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">

<div class="bg-gray-800 backdrop-blur-xl border border-white/10 rounded-3xl p-6">        <h2 class="text-white font-bold text-xl mb-4">Performance Cube</h2>
        <div id="bar3d" style="height: 400px;"></div>
    </div>

<div class="bg-gray-800 backdrop-blur-xl border border-white/10 rounded-3xl p-6">        <h2 class="text-white font-bold text-xl mb-4">Distribution Sphere</h2>
        <div id="pie3d" style="height: 400px;"></div>
    </div>

</div>

</main>

<!-- FOOTER -->
<?php include 'footer.php' ?>
<script>

// ================= 3D BAR (CUBE STYLE) =================
const bar3d = echarts.init(document.getElementById('bar3d'));

bar3d.setOption({
    backgroundColor: 'transparent',

    tooltip: {},

    xAxis3D: {
        type: 'category',
        data: ['Jan','Feb','Mar','Apr','May','Jun'],
        axisLabel: { color: '#94a3b8' }
    },

    yAxis3D: {
        type: 'value',
        axisLabel: { color: '#94a3b8' }
    },

    zAxis3D: {
        type: 'value'
    },

    grid3D: {
        viewControl: {
            autoRotate: true,
            autoRotateSpeed: 10,
            projection: 'perspective'
        },
        light: {
            main: { intensity: 1.2 },
            ambient: { intensity: 0.4 }
        }
    },

    series: [{
        type: 'bar3D',
        data: [
            [0, 0, 1200],
            [1, 0, 1900],
            [2, 0, 3000],
            [3, 0, 2500],
            [4, 0, 3200],
            [5, 0, 4000]
        ],
        shading: 'realistic',
        itemStyle: {
            color: '#38bdf8'
        }
    }]
});


// ================= 3D PIE (SPHERE STYLE) =================
const pie3d = echarts.init(document.getElementById('pie3d'));

pie3d.setOption({
    backgroundColor: 'transparent',

    tooltip: {
        trigger: 'item'
    },

    series: [{
        type: 'pie',
        radius: ['30%', '70%'],
        roseType: 'area',

        itemStyle: {
            borderRadius: 10,
            borderColor: '#020617',
            borderWidth: 2
        },

        label: {
            color: '#ffffff'
        },

        data: [
            { value: 60, name: 'Students' },
            { value: 10, name: 'Teachers' },
            { value: 20, name: 'Courses' },
            { value: 10, name: 'Revenue' }
        ]
    }]
});

</script>
</body>
</html>