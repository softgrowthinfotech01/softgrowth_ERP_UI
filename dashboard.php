<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ERP Dashboard</title>

<link rel="stylesheet" href="dist/output.css">
<script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>

<style>
*{box-sizing:border-box}

body{
    overflow-x:hidden;
    color:#000;
    min-height:100vh;
    position:relative;
    background:none;
}

/* VIDEO BACKGROUND */
.erp-video-bg{
    position:fixed;
    inset:0;
    z-index:-2;
    overflow:hidden;
}

.erp-video-bg video{
    width:100%;
    height:100%;
    object-fit:cover;
}

/* DARK OVERLAY */
.erp-video-bg::after{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(
            rgba(0,0,0,.55),
            rgba(0,0,0,.65)
        );
    z-index:1;
}
/* BEST PREMIUM BACKGROUND */

/* TOP PANEL */
.erp-pro-hero{
    position:relative;
    overflow:hidden;
    border-radius:34px;
    padding:1px;
       margin-bottom:10px;
 
}



.erp-pro-hero > *{
    position:relative;
    z-index:1;
}

/* COMMON CARD */
/* COMPACT CARD */
.erp-card{
    position:relative;
    overflow:hidden;

    padding:12px;
    border-radius:16px;

    background:rgb(255, 255, 255);
    border:1px solid rgba(255,255,255,.15);

    backdrop-filter:blur(22px);
    -webkit-backdrop-filter:blur(22px);

    box-shadow:
        0 8px 25px rgba(0,0,0,.18),
        inset 0 1px 0 rgba(255,255,255,.12);

    transition:.3s ease;
}

.erp-card:hover{
    transform:translateY(-3px);
    background:rgb(255, 255, 255);
}

.erp-card::before{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.08),
            transparent 45%
        );
    pointer-events:none;
}
.erp-card > *{
    position:relative;
    z-index:1;
}

/* TYPOGRAPHY */
.erp-kicker{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:9px 17px;
    border-radius:999px;
    background:#FFF8E1;
    color:#8A6100;
    border:1px solid rgba(212,175,55,.30);
    font-size:12px;
    font-weight:950;
    letter-spacing:.7px;
}

.erp-title{
    color:white;
    font-weight:900;
    letter-spacing:1.5px;
      font-size:35px !important;
          line-height:1;
          margin-bottom: 10px;
}

.erp-muted{
    color:#64748B;
}

.erp-small-label{
     font-size:16px;
    font-weight:600;
}

.erp-number{
     font-size:20px !important;
    line-height:1;
    font-weight: 600;
}
/* ICONS */
.erp-icon{
     width:48px;
    height:48px;
    display:grid;
    place-items:center;
    border-radius:14px;
    font-size:20px;
    background:linear-gradient(135deg,#ECFDF5,#99F6E4);
    border:1px solid rgba(15,118,110,.20);
    box-shadow:0 18px 38px rgba(15,118,110,.15);
}

.erp-icon.blue{
    background:linear-gradient(135deg,#EFF6FF,#BFDBFE);
    border-color:rgba(37,99,235,.20);
    box-shadow:0 18px 38px rgba(37,99,235,.15);
}

.erp-icon.gold{
    background:linear-gradient(135deg,#FFFBEB,#FDE68A);
    border-color:rgba(212,175,55,.30);
    box-shadow:0 18px 38px rgba(212,175,55,.18);
}

.erp-icon.purple{
    background:linear-gradient(135deg,#F5F3FF,#DDD6FE);
    border-color:rgba(124,58,237,.20);
    box-shadow:0 18px 38px rgba(124,58,237,.14);
}

.erp-trend{
     margin-top:5px;
    font-size:17px;
}

.erp-trend.emerald{color:#0F766E}
.erp-trend.blue{color:#2563EB}
.erp-trend.gold{color:#B7791F}
.erp-trend.purple{color:#7C3AED}

/* MINI INFO BOX */
.erp-mini-box{
    background:rgba(255,255,255,.72);
    border:1px solid rgba(148,163,184,.24);
    border-radius:20px;
    padding:14px 18px;
    box-shadow:0 12px 28px rgba(15,23,42,.05);
}

.erp-mini-box p{
    color:#94A3B8;
    font-size:11px;
    font-weight:950;
    letter-spacing:.7px;
}

.erp-mini-box h4{
    color:#101827;
    font-weight:950;
}

/* CHART */
.erp-chart{
    height:230px;
}

/* MOBILE */
@media(max-width:768px){
    main{
        padding-left:16px !important;
        padding-right:16px !important;
    }

    .erp-pro-hero{
        padding:22px;
        border-radius:26px;
    }

    .erp-card{
     padding:14px;
        border-radius:18px;
    }

    .erp-icon{
     width:46px;
        height:46px;
        font-size:20px;
    }

    .erp-chart{
  height:220px !important;    }
}
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
    <section class="erp-pro-hero mb-4">
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