<footer class="erp-footer fixed bottom-0 right-0 left-0 lg:left-72 z-50">

    <div class="erp-footer-wrap">

        <div class="erp-footer-left">
            <div class="erp-status-dot"></div>

            <p>
                © 2026 <strong>ERP Dashboard</strong>
                <span>All Rights Reserved</span>
            </p>
        </div>

        <div class="erp-footer-right">

            <a href="privacy_policy.php">Privacy</a>

            <a href="terms_conditions.php">Terms</a>

            <a href="support.php">Support</a>

        </div>

    </div>

</footer>

<style>
/* PREMIUM WHITE FOOTER */

.erp-footer{
    padding:12px 18px;
    background:transparent;
}

.erp-footer-wrap{
    display:flex;
    align-items:center;
    justify-content:space-between;

    padding:14px 22px;

    background:
        rgb(5, 97, 143);

    backdrop-filter:blur(25px);
    -webkit-backdrop-filter:blur(25px);

    /* border:1px solid rgba(226,232,240,.9); */
    /* border-bottom:0; */

    border-radius:24px 24px 0 0;

    box-shadow:
        0 -10px 40px rgba(15,23,42,.08),
        inset 0 1px 0 rgba(255,255,255,1);
}

/* LEFT */

.erp-footer-left{
    display:flex;
    align-items:center;
    gap:12px;
    background-color: white;
      padding:8px 15px;
      border-radius: 999px;
}

.erp-footer-left p{
    color:#475569;
    font-size:13px;
    font-weight:700;
}

.erp-footer-left strong{
    color:#475569;
    font-weight:900;
}

.erp-footer-left span{
    color:#475569;
    margin-left:6px;
}

/* DOT */

.erp-status-dot{
    width:10px;
    height:10px;
    border-radius:50%;

    background:#22C55E;

    box-shadow:
        0 0 12px rgba(34,197,94,.5);
}

/* LINKS */

.erp-footer-right{
    display:flex;
    align-items:center;
    gap:10px;
}

.erp-footer-right a{
    padding:8px 15px;

    border-radius:999px;

    color:#475569;
    font-size:13px;
    font-weight:800;

    background:#F8FAFC;
    border:1px solid #E2E8F0;

    transition:.3s;
}

.erp-footer-right a:hover{
    color:#2563EB;

    background:#EFF6FF;

    border-color:#BFDBFE;

    transform:translateY(-2px);

    box-shadow:
        0 8px 18px rgba(37,99,235,.12);
}

/* MOBILE */

@media(max-width:768px){

    .erp-footer{
        padding:0;
    }

    .erp-footer-wrap{
        flex-direction:column;
        gap:4px;

        padding:6px 8px;

        border-radius:14px 14px 0 0;
    }

    .erp-footer-left{
        gap:6px;
    }

    .erp-footer-left p{
        font-size:10px;
        line-height:1.2;
    }

    .erp-status-dot{
        width:6px;
        height:6px;
    }

    .erp-footer-right{
        gap:4px;
        flex-wrap:wrap;
        justify-content:center;
    }

    .erp-footer-right a{
        padding:4px 8px;
        font-size:10px;
        border-radius:999px;
    }
}
</style>