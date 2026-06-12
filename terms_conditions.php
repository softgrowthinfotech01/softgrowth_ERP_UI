<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Terms & Conditions - ERP</title>

<link rel="stylesheet" href="dist/output.css">

<style>

body{
    overflow-x:hidden;
    min-height:100vh;

    background:
        radial-gradient(
            circle at center,
            rgba(0,0,0,.35) 0%,
            rgba(0,0,0,.65) 60%,
            rgba(0,0,0,.85) 100%
        ),
        url('images/d_bg.png');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
    padding: 130px;
}

/* CARD */

.policy-card{
    position:relative;
    overflow:hidden;

    padding:26px;
    border-radius:28px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.92),
            rgba(245,243,255,.88),
            rgba(236,254,255,.84)
        );

    border:1px solid rgba(255,255,255,.75);

    backdrop-filter:blur(35px);
    -webkit-backdrop-filter:blur(35px);

    box-shadow:
        0 35px 90px rgba(15,23,42,.22);
}

.policy-card::before{
    content:"";
    position:absolute;
    inset:-2px;

    background:
        conic-gradient(
            from 180deg,
            #7C3AED,
            #06B6D4,
            #22C55E,
            #F59E0B,
            #7C3AED
        );

    opacity:.35;

    animation:spinGlow 7s linear infinite;
}

.policy-card::after{
    content:"";
    position:absolute;
    inset:2px;

    border-radius:26px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.96),
            rgba(245,243,255,.92),
            rgba(240,249,255,.90)
        );
}

.policy-card > *{
    position:relative;
    z-index:2;
}

/* HEADER */

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

    color:#fff;

    background:
        linear-gradient(
            135deg,
            #7C3AED,
            #06B6D4
        );

    box-shadow:
        0 16px 34px rgba(124,58,237,.28);
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

/* TEXT */

.policy-text{
    color:#334155;
    font-size:15px;
    font-weight:600;
    line-height:1.8;
}

/* LIST */

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

    background:
        rgba(255,255,255,.70);

    border:1px solid rgba(226,232,240,.9);

    box-shadow:
        0 10px 22px rgba(15,23,42,.06);

    transition:.3s ease;
}

.policy-list li:hover{
    transform:translateY(-2px);

    border-color:#7C3AED;

    box-shadow:
        0 16px 30px rgba(124,58,237,.12);
}

.policy-list li span{
    margin-right:8px;
    color:#7C3AED;
    font-weight:900;
}

/* NOTICE BOX */

.notice-box{
    margin-top:22px;

    padding:18px;

    border-radius:20px;

    background:
        rgba(255,255,255,.60);

    border:1px solid rgba(226,232,240,.9);

    box-shadow:
        0 10px 22px rgba(15,23,42,.05);
}

.notice-box h3{
    color:#0F172A;
    font-size:16px;
    font-weight:900;
    margin-bottom:8px;
}

.notice-box p{
    color:#64748B;
    font-size:14px;
    line-height:1.8;
    font-weight:600;
}

/* UPDATED */

.policy-updated{
    margin-top:18px;

    color:#64748B;
    font-size:13px;
    font-weight:800;
}

/* ANIMATION */

@keyframes spinGlow{
    to{
        transform:rotate(360deg);
    }
}

/* MOBILE */

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

    .policy-text{
        font-size:14px;
    }

    .policy-list li{
        padding:12px;
        font-size:13px;
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

            <div class="policy-icon">
                📜
            </div>

            <div>
                <h1>Terms & Conditions</h1>
                <p>Rules and guidelines for using the ERP system</p>
            </div>

        </div>

        <p class="policy-text">
            By using this ERP system, you agree to comply with the following terms and conditions. These rules help maintain the security, integrity, and proper functioning of the platform.
        </p>

        <ul class="policy-list">

            <li>
                <span>①</span>
                Users must not misuse, exploit, or attempt to hack the system.
            </li>

            <li>
                <span>②</span>
                All information entered into the ERP must be accurate and verified.
            </li>

            <li>
                <span>③</span>
                ERP administrators have full authority to manage user permissions and access rights.
            </li>

            <li>
                <span>④</span>
                Unauthorized access attempts may result in account suspension or termination.
            </li>

            <li>
                <span>⑤</span>
                System activities may be monitored and logged for security and auditing purposes.
            </li>

        </ul>

        <div class="notice-box">

            <h3>
                Important Notice
            </h3>

            <p>
                Continued use of this ERP system indicates acceptance of these terms and conditions. Users are responsible for maintaining the confidentiality of their login credentials and protecting access to their accounts.
            </p>

        </div>

        <p class="policy-updated">
            Last Updated: 2026
        </p>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>