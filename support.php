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