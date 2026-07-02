<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ERP Dashboard</title>


<link rel="stylesheet" href="dist/style.css">

<link rel="stylesheet" href="dist/output.css">
<script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>

<style>

</style>
</head>

<body>

<!-- BACKGROUND VIDEO -->
<div class="erp-video-bg">
    <video autoplay muted loop playsinline>
        <source src="images/dash_videobg1.mp4" type="video/mp4">
    </video>
</div>



<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<main class="pt-24 lg:ml-72 px-6 pb-10 mb-20">

    <!-- HERO -->
    <section class="erp-pro-hero ">
        <!-- <span class="erp-kicker">✦ ELITE ERP COMMAND CENTER</span> -->

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-3">
                <h1 class="erp-title text-white text-4xl md:text-5xl">
                    Dashboard 
                </h1>
            

        
        </div>
    </section>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

        <div class="erp-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="erp-small-label">Total Students</p>
                    <h2 class="erp-number  mt-1">12K</h2>
                    <p class="erp-trend emerald">▲ 18% Growth</p>
                </div>
                <div class="erp-icon">🎓</div>
            </div>
        </div>

        <div class="erp-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="erp-small-label">Teachers</p>
                    <h2 class="erp-number  mt-1">540</h2>
                    <p class="erp-trend blue">● Active Staff</p>
                </div>
                <div class="erp-icon blue">👨‍🏫</div>
            </div>
        </div>

        <div class="erp-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="erp-small-label">Revenue</p>
                    <h2 class="erp-number mt-1">$85K</h2>
                    <p class="erp-trend gold">▲ Monthly Income</p>
                </div>
                <div class="erp-icon gold">💰</div>
            </div>
        </div>

        <div class="erp-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="erp-small-label">Courses</p>
                    <h2 class="erp-number  mt-1">320</h2>
                    <p class="erp-trend purple">◆ Running Batches</p>
                </div>
                <div class="erp-icon purple">📚</div>
            </div>
        </div>

    </div>

    <!-- CHARTS -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">

        <div class="erp-card">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-[#101827] font-black text-xl">
                    Monthly Performance
                </h2>
                <span class="erp-kicker">2026</span>
            </div>
            <div id="bar3d" class="erp-chart"></div>
        </div>

        <div class="erp-card">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-[#101827] font-black text-xl">
                    ERP Distribution
                </h2>
                <span class="erp-kicker">Live</span>
            </div>
            <div id="pie3d" class="erp-chart"></div>
        </div>

    </div>

</main>

<?php include 'footer.php' ?>

<script>
const bar3d = echarts.init(document.getElementById('bar3d'));

bar3d.setOption({
    backgroundColor:'transparent',

    tooltip:{
        trigger:'axis',
        backgroundColor:'rgba(255,255,255,.98)',
        borderColor:'#CBD5E1',
        textStyle:{color:'#101827'}
    },

    grid:{
        left:'5%',
        right:'5%',
        bottom:'10%',
        top:'12%',
        containLabel:true
    },

    xAxis:{
        type:'category',
        data:['Jan','Feb','Mar','Apr','May','Jun'],
        axisLabel:{color:'#475569',fontWeight:'bold'},
        axisLine:{lineStyle:{color:'#CBD5E1'}}
    },

    yAxis:{
        type:'value',
        axisLabel:{color:'#64748B'},
        splitLine:{lineStyle:{color:'rgba(148,163,184,.26)'}}
    },

    series:[{
        type:'bar',
        data:[1200,1900,3000,2500,3200,4000],
        barWidth:'44%',
        itemStyle:{
            borderRadius:[16,16,0,0],
            color:new echarts.graphic.LinearGradient(0,0,0,1,[
                {offset:0,color:'#2DD4BF'},
                {offset:.5,color:'#0F766E'},
                {offset:1,color:'#115E59'}
            ])
        }
    }]
});

const pie3d = echarts.init(document.getElementById('pie3d'));

pie3d.setOption({
    backgroundColor:'transparent',

    tooltip:{
        trigger:'item',
        backgroundColor:'rgba(255,255,255,.98)',
        borderColor:'#E2E8F0',
        textStyle:{color:'#101827'}
    },

    legend:{
        bottom:0,
        textStyle:{
            color:'#475569',
            fontWeight:'bold'
        }
    },

    graphic:[
        {
            type:'text',
            left:'center',
            top:'38%',
            style:{
                text:'12K',
                fill:'#101827',
                fontSize:28,
                fontWeight:'bold'
            }
        },
        {
            type:'text',
            left:'center',
            top:'52%',
            style:{
                text:'ERP ANALYTICS',
                fill:'#64748B',
                fontSize:10,
                fontWeight:800
            }
        }
    ],

    series:[{
        type:'pie',
        radius:['45%','72%'],
        center:['50%','45%'],
        animationDuration:900,

        itemStyle:{
            borderRadius:15,
            borderColor:'#FFFDF7',
            borderWidth:5
        },

        label:{
            color:'#101827',
            formatter:'{b}\n{d}%',
            fontWeight:'bold'
        },

        emphasis:{
            scale:true,
            scaleSize:10
        },

        data:[
            {value:60,name:'Students',itemStyle:{color:'#0F766E'}},
            {value:10,name:'Teachers',itemStyle:{color:'#2563EB'}},
            {value:20,name:'Courses',itemStyle:{color:'#D4AF37'}},
            {value:10,name:'Revenue',itemStyle:{color:'#8B5CF6'}}
        ]
    }]
});

let resizeTimer;
window.addEventListener('resize',function(){
    clearTimeout(resizeTimer);
    resizeTimer=setTimeout(function(){
        bar3d.resize();
        pie3d.resize();
    },150);
});
</script>

</body>
</html>