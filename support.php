<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Support - ERP</title>

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
    padding: 80px;
}

.support-card{
    position:relative;
    overflow:hidden;
    padding:24px;
    border-radius:28px;
    background:linear-gradient(135deg,
        rgba(255,255,255,.92),
        rgba(245,243,255,.88),
        rgba(236,254,255,.84)
    );
    border:1px solid rgba(255,255,255,.75);
    backdrop-filter:blur(35px);
    -webkit-backdrop-filter:blur(35px);
    box-shadow:0 35px 90px rgba(15,23,42,.22);
}

.support-card::before{
    content:"";
    position:absolute;
    inset:-2px;
    background:conic-gradient(from 180deg,#7C3AED,#06B6D4,#22C55E,#F59E0B,#7C3AED);
    opacity:.35;
    animation:spinGlow 7s linear infinite;
}

.support-card::after{
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

.support-card > *{
    position:relative;
    z-index:2;
}

.support-heading{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:22px;
    padding-bottom:16px;
    border-bottom:1px solid rgba(226,232,240,.85);
}

.support-icon{
    width:52px;
    height:52px;
    display:grid;
    place-items:center;
    border-radius:17px;
    font-size:24px;
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 16px 34px rgba(124,58,237,.28);
}

.support-heading h1,
.support-heading h2{
    color:#0F172A;
    font-size:23px;
    font-weight:950;
}

.support-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
}

.support-text{
    color:#334155;
    font-size:15px;
    font-weight:600;
    line-height:1.8;
    margin-bottom:18px;
}

.support-info{
    display:grid;
    gap:12px;
}

.support-info p{
    padding:14px 16px;
    border-radius:16px;
    color:#1E293B;
    font-size:14px;
    font-weight:800;
    background:rgba(255,255,255,.70);
    border:1px solid rgba(226,232,240,.9);
    box-shadow:0 10px 22px rgba(15,23,42,.06);
}

.support-input{
    width:100%;
    margin-bottom:12px;
    padding:13px 14px;
    border-radius:16px;
    background:linear-gradient(180deg,#FFFFFF,#F8FAFC);
    border:1px solid rgba(203,213,225,.88);
    color:#0F172A;
    font-size:14px;
    font-weight:700;
    outline:none;
    transition:.28s ease;
}

.support-input:focus{
    border-color:#7C3AED;
    box-shadow:
        0 0 0 4px rgba(124,58,237,.14),
        0 16px 30px rgba(6,182,212,.15);
}

.support-input::placeholder{
    color:#94A3B8;
}

.support-btn{
    width:100%;
    padding:13px 24px;
    border-radius:16px;
    color:#fff;
    font-size:14px;
    font-weight:950;
    background:linear-gradient(135deg,#7C3AED,#06B6D4);
    box-shadow:0 18px 40px rgba(124,58,237,.28);
    transition:.3s ease;
}

.support-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 24px 50px rgba(6,182,212,.30);
}

@keyframes spinGlow{
    to{transform:rotate(360deg);}
}

@media(max-width:768px){
    .support-card{
        padding:18px;
        border-radius:22px;
    }

    .support-card::after{
        border-radius:20px;
    }

    .support-icon{
        width:44px;
        height:44px;
        font-size:20px;
    }

    .support-heading h1,
    .support-heading h2{
        font-size:20px;
    }
}


/* =================================
   SUPPORT PAGE SET FIX
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

    width:auto !important;
    max-width:none !important;
}

/* GRID */
.grid.md\:grid-cols-2{
    max-width:1400px;
    margin:0 auto;
}

/* HEADER */
.erp-header{
    z-index:9999 !important;
}

/* SIDEBAR */
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
    width:calc(100% - 290px) !important;

    margin-top:25px !important;
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

    .grid.md\:grid-cols-2{
        display:grid !important;
        grid-template-columns:1fr !important;
        gap:14px !important;
    }

    .support-card{
        width:100% !important;
        max-width:100% !important;

        padding:18px !important;
        border-radius:22px !important;
    }

    .support-card::after{
        border-radius:20px !important;
    }

    .support-heading{
        gap:12px !important;
        align-items:flex-start !important;
        margin-bottom:18px !important;
    }

    .support-icon{
        width:42px !important;
        height:42px !important;
        min-width:42px !important;
        font-size:20px !important;
    }

    .support-heading h1,
    .support-heading h2{
        font-size:19px !important;
        line-height:1.2 !important;
    }

    .support-heading p{
        font-size:12px !important;
    }

    .support-text{
        font-size:13px !important;
        line-height:1.7 !important;
    }

    .support-info p{
        padding:12px !important;
        font-size:13px !important;
        line-height:1.5 !important;
    }

    .support-input{
        padding:12px !important;
        font-size:13px !important;
        border-radius:14px !important;
    }

    textarea.support-input{
        min-height:120px !important;
    }

    .support-btn{
        width:100% !important;
        padding:12px !important;
        font-size:13px !important;
        border-radius:14px !important;
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

    <div class="grid md:grid-cols-2 gap-6">

        <div class="support-card">
            <div class="support-heading">
                <div class="support-icon">🎧</div>
                <div>
                    <h1>Support Center</h1>
                    <p>ERP help and service desk</p>
                </div>
            </div>

            <p class="support-text">
                Need help? Contact our ERP support team anytime.
            </p>

            <div class="support-info">
                <p>📞 Phone: +91 98765 43210</p>
                <p>📧 Email: support@erpdashboard.com</p>
                <p>⏰ Working Hours: 10 AM - 6 PM</p>
            </div>
        </div>

        <div class="support-card">
            <div class="support-heading">
                <div class="support-icon">✉️</div>
                <div>
                    <h2>Send Message</h2>
                    <p>Write your issue or request</p>
                </div>
            </div>

            <input type="text" placeholder="Your Name" class="support-input">
            <input type="email" placeholder="Your Email" class="support-input">
            <textarea rows="5" placeholder="Your Message" class="support-input"></textarea>

            <button class="support-btn">
                Submit Request
            </button>
        </div>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>