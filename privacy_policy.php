<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Privacy Policy - ERP</title>
<link rel="stylesheet" href="dist/output.css">

<style>

    
body{
    overflow-x:hidden;
    min-height:100vh;
    background:
        radial-gradient(circle at center,
            rgba(0,0,0,.35) 0%,
            rgba(0,0,0,.65) 60%,
            rgba(0,0,0,.85) 100%
        ),
        url('images/d_bg.png');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
    padding: 70px;
}

.policy-card{
    position:relative;
    overflow:hidden;
    padding:26px;
    border-radius:28px;
    background:linear-gradient(135deg,
        rgba(255,255,255,.92),
        rgba(245,243,255,.88),
        rgba(236,254,255,.84)
    );
    border:1px solid rgba(255,255,255,.75);
    backdrop-filter:blur(35px);
    box-shadow:0 35px 90px rgba(15,23,42,.22);
}

.policy-card::before{
    content:"";
    position:absolute;
    inset:-2px;
    background:conic-gradient(from 180deg,#7C3AED,#06B6D4,#22C55E,#F59E0B,#7C3AED);
    opacity:.35;
    animation:spinGlow 7s linear infinite;
}

.policy-card::after{
    content:"";
    position:absolute;
    inset:2px;
    border-radius:26px;
    background:linear-gradient(135deg,
        rgba(255,255,255,.96),
        rgba(245,243,255,.92),
        rgba(240,249,255,.90)
    );
}

.policy-card > *{
    position:relative;
    z-index:2;
}

.policy-heading{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:22px;
    padding-bottom:16px;
    border-bottom:1px solid rgba(226,232,240,.85);
}

.policy-icon{
    width:52px;
    height:52px;
    display:grid;
    place-items:center;
    border-radius:17px;
    font-size:24px;
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 16px 34px rgba(124,58,237,.28);
}

.policy-heading h1{
    color:#0F172A;
    font-size:24px;
    font-weight:950;
}

.policy-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
}

.policy-text{
    color:#334155;
    font-size:15px;
    font-weight:600;
    line-height:1.8;
}

.policy-list{
    margin-top:18px;
    display:grid;
    gap:12px;
}

.policy-list li{
    list-style:none;
    padding:14px 16px;
    border-radius:16px;
    color:#1E293B;
    font-size:14px;
    font-weight:800;
    background:rgba(255,255,255,.70);
    border:1px solid rgba(226,232,240,.9);
    box-shadow:0 10px 22px rgba(15,23,42,.06);
}

.policy-list li span{
    margin-right:8px;
}

.policy-updated{
    margin-top:20px;
    color:#64748B;
    font-size:13px;
    font-weight:800;
}

@keyframes spinGlow{
    to{transform:rotate(360deg);}
}

@media(max-width:768px){
    .policy-card{
        padding:18px;
        border-radius:22px;
    }

    .policy-card::after{
        border-radius:20px;
    }

    .policy-icon{
        width:44px;
        height:44px;
        font-size:20px;
    }

    .policy-heading h1{
        font-size:20px;
    }
}
/* =================================
   STUDENT PAYMENT PAGE SET FIX
================================= */

html,
body{
    margin:0;
    padding:0;
    min-height:100%;
    overflow-x:hidden;
}

body{
    display:flex;
    flex-direction:column;
    padding:0 !important;
}

/* MAIN WRAPPER */
.md\:ml-\[300px\].max-w-7xl{
    flex:1;

    margin-left:300px !important;
    margin-top:0 !important;
    margin-bottom:0 !important;

    padding-top:125px !important;
    padding-left:35px !important;
    padding-right:35px !important;
    padding-bottom:25px !important;

    max-width:none !important;
    width:auto !important;
}

/* CENTER CONTENT */
.md\:ml-\[300px\].max-w-7xl > .step-box,
.md\:ml-\[300px\].max-w-7xl > .flex,
.md\:ml-\[300px\].max-w-7xl > .step-box + .flex{
    max-width:1450px;
    width:100%;
    margin-left:auto;
    margin-right:auto;
}

/* HEADER / SIDEBAR */
.erp-header{
    z-index:9999 !important;
}

.erp-side{
    z-index:9998 !important;
}

/* FOOTER */
footer,
.erp-footer{
    position:relative !important;
    left:auto !important;
    right:auto !important;
    bottom:auto !important;

    margin-left:300px !important;
    width:calc(100% - 300px) !important;

    margin-top:auto !important;
    padding:0 !important;

    z-index:20 !important;
}

.erp-footer-wrap,
.erp-footer-inner{
    margin:0 !important;
    border-radius:30px 30px 0 0 !important;
}

/* TABLET */
@media(max-width:1024px){

    .md\:ml-\[300px\].max-w-7xl{
        margin-left:0 !important;

        padding-top:110px !important;
        padding-left:14px !important;
        padding-right:14px !important;
        padding-bottom:15px !important;

        width:100% !important;
    }

    footer,
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
    }
}

/* MOBILE */
@media(max-width:768px){

    body{
        background-attachment:scroll !important;
    }

    .md\:ml-\[300px\].max-w-7xl{
        margin-left:0 !important;

        padding-top:100px !important;
        padding-left:6px !important;
        padding-right:6px !important;
        padding-bottom:12px !important;

        width:100% !important;
        max-width:100% !important;
    }

    .step{
        width:34px !important;
        height:34px !important;
        font-size:13px !important;
    }

    .line{
        height:2px !important;
    }

    .step-box{
        width:100% !important;
        max-width:100% !important;

        padding:16px !important;
        border-radius:20px !important;
    }

    .step-box::after{
        border-radius:18px !important;
    }

    .step-box h2{
        font-size:18px !important;
        line-height:1.3 !important;
        margin-bottom:18px !important;
    }

    .step-box h2::before{
        width:34px !important;
        height:34px !important;
        font-size:14px !important;
        border-radius:12px !important;
    }

    .step-box h2::after{
        left:45px !important;
        width:80px !important;
    }

    .grid{
        gap:12px !important;
    }

    label{
        font-size:12px !important;
        margin-bottom:5px !important;
    }

    .input{
        width:100% !important;
        height:42px !important;
        padding:0 12px !important;
        font-size:13px !important;
        border-radius:12px !important;
    }

    textarea.input{
        min-height:90px !important;
        padding:10px 12px !important;
    }

    #next,
    #prev{
        width:100% !important;
        height:42px !important;
        font-size:13px !important;
        border-radius:12px !important;
    }

    .flex.justify-between{
        gap:10px !important;
        flex-direction:column !important;
    }

    footer,
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
        padding:0 !important;
    }

    .erp-footer-wrap,
    .erp-footer-inner{
        width:100% !important;
        max-width:100% !important;
        margin:0 !important;
        border-radius:24px 24px 0 0 !important;
    }
}

/* =================================
   PRIVACY POLICY PAGE SET FIX
================================= */

html,
body{
    margin:0;
    padding:0;
    min-height:100%;
    overflow-x:hidden;
}

body{
    display:flex;
    flex-direction:column;
    padding:0 !important;
}

/* PAGE WRAPPER */
.lg\:ml-72.mt-20.mb-24.p-4.md\:p-8{
    flex:1;

    margin-left:300px !important;
    margin-top:0 !important;
    margin-bottom:0 !important;

    padding-top:125px !important;
    padding-left:35px !important;
    padding-right:35px !important;
    padding-bottom:25px !important;

    max-width:none !important;
    width:auto !important;
}

/* CARD */
.policy-card{
    width:100%;
    max-width:1280px;
    margin:0 auto;
}

/* HEADER / SIDEBAR */
.erp-header{
    z-index:9999 !important;
}

.erp-side{
    z-index:9998 !important;
}

/* FOOTER */
footer,
.erp-footer{
    position:relative !important;

    left:auto !important;
    right:auto !important;
    bottom:auto !important;

    margin-left:290px !important;
    width:calc(100% -290px) !important;

    margin-top:15px !important;
    padding:0 !important;

    z-index:20 !important;
}

.erp-footer-wrap,
.erp-footer-inner{
    margin:0 !important;
    border-radius:30px 30px 0 0 !important;
}

/* TABLET */
@media(max-width:1024px){

    .lg\:ml-72.mt-20.mb-24.p-4.md\:p-8{
        margin-left:0 !important;

        padding-top:110px !important;
        padding-left:14px !important;
        padding-right:14px !important;
        padding-bottom:15px !important;

        width:100% !important;
    }

    footer,
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
    }
}

/* MOBILE */
@media(max-width:768px){

    body{
        background-attachment:scroll !important;
    }

    .lg\:ml-72.mt-20.mb-24.p-4.md\:p-8{
        margin-left:0 !important;

        padding-top:100px !important;
        padding-left:10px !important;
        padding-right:10px !important;
        padding-bottom:12px !important;

        width:100% !important;
        max-width:100% !important;
    }

    .policy-card{
        width:100% !important;
        max-width:100% !important;

        padding:18px !important;
        border-radius:22px !important;
    }

    .policy-card::after{
        border-radius:20px !important;
    }

    .policy-heading{
        gap:12px !important;
        margin-bottom:18px !important;
        align-items:flex-start !important;
    }

    .policy-icon{
        width:42px !important;
        height:42px !important;
        min-width:42px !important;
        font-size:20px !important;
    }

    .policy-heading h1{
        font-size:20px !important;
        line-height:1.2 !important;
    }

    .policy-heading p{
        font-size:12px !important;
        line-height:1.4 !important;
    }

    .policy-text{
        font-size:13px !important;
        line-height:1.7 !important;
    }

    .policy-list li{
        padding:12px !important;
        font-size:13px !important;
        line-height:1.5 !important;
    }

    footer,
    .erp-footer{
        margin-left:0 !important;
        width:100% !important;
        padding:0 !important;
    }

    .erp-footer-wrap,
    .erp-footer-inner{
        width:100% !important;
        max-width:100% !important;
        margin:0 !important;
        border-radius:24px 24px 0 0 !important;
    }
}

/* MOBILE MENU BUTTON FIX */
.erp-menu-btn{
    display:none !important;
}

@media(max-width:1023px){
    .erp-menu-btn{
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;

        position:fixed !important;
        top:18px !important;
        left:14px !important;

        width:46px !important;
        height:46px !important;

        z-index:100000 !important;

        border-radius:14px !important;
        background:#000 !important;
        color:#fff !important;

        font-size:24px !important;
        font-weight:900 !important;

        box-shadow:0 12px 30px rgba(0,0,0,.35) !important;
    }
}
</style>
</head>

<body>

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="lg:ml-72 mt-20 mb-24 p-4 md:p-8">

    <div class="policy-card">

        <div class="policy-heading">
            <div class="policy-icon">🔐</div>

            <div>
                <h1>Privacy Policy</h1>
                <p>Student and institutional data protection policy</p>
            </div>
        </div>

        <p class="policy-text">
            We respect your privacy and are committed to protecting student and institutional data in our ERP system.
        </p>

        <ul class="policy-list">
            <li><span>✅</span> We do not share personal student data with third parties.</li>
            <li><span>✅</span> All payments and records are securely stored.</li>
            <li><span>✅</span> Only authorized staff can access sensitive data.</li>
            <li><span>✅</span> We use secure encryption for data protection.</li>
        </ul>

        <p class="policy-updated">
            Last updated: 2026
        </p>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>