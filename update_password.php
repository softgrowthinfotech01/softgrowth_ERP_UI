<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password - ERP</title>

    <link rel="stylesheet" href="dist/output.css">

    <style>

        
         body {
            overflow-x: hidden;
            min-height: 100vh;

            background:
                linear-gradient(rgba(0, 0, 0, 0.45),
                    rgba(0, 0, 0, .45)),
                url('images/d_bg.png');

            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 70px;
        }
.password-card{
    position:relative;
    overflow:hidden;
    margin-left: 150px;
    max-width:700px;

    padding:24px;
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

    box-shadow:
        0 35px 90px rgba(15,23,42,.20),
        inset 0 1px 0 rgba(255,255,255,1);
}

.password-card::before{
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

.password-card::after{
    content:"";
    position:absolute;
    inset:2px;
    border-radius:26px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.95),
            rgba(245,243,255,.90),
            rgba(240,249,255,.88)
        );
}

.password-card>*{
    position:relative;
    z-index:2;
}

/* HEADING */

.password-heading{
    display:flex;
    align-items:center;
    gap:14px;

    margin-bottom:20px;
    padding-bottom:16px;

    border-bottom:1px solid rgba(226,232,240,.85);
}

.password-icon{
    width:52px;
    height:52px;

    display:grid;
    place-items:center;

    border-radius:16px;

    font-size:24px;

    color:white;

    background:
        linear-gradient(
            135deg,
            #7C3AED,
            #06B6D4
        );

    box-shadow:
        0 16px 34px rgba(124,58,237,.25);
}

.password-heading h2{
    color:#0F172A;
    font-size:22px;
    font-weight:950;
}

.password-heading p{
    color:#64748B;
    font-size:13px;
    font-weight:700;
}

/* LABEL */

.label{
    display:block;

    color:#1E293B;
    font-size:13px;
    font-weight:900;

    margin-bottom:8px;
}

/* INPUT BOX */

.input-box{
    position:relative;
}

.input-box .input{
    padding-right:50px;
}

/* EYE BUTTON */

.eye-btn{
    position:absolute;

    right:15px;
    top:50%;

    transform:translateY(-50%);

    cursor:pointer;

    font-size:18px;

    color:#64748B;

    transition:.25s;
}

.eye-btn:hover{
    color:#7C3AED;
    transform:translateY(-50%) scale(1.1);
}

/* INPUT */

.input{
    width:100%;
    height:46px;

    padding:0 14px;

    border-radius:14px;

    background:
        linear-gradient(
            180deg,
            #FFFFFF,
            #F8FAFC
        );

    border:1px solid rgba(203,213,225,.85);

    color:#0F172A;

    font-size:13px;
    font-weight:700;

    transition:.28s ease;
}

.input:focus{
    border-color:#7C3AED;

    box-shadow:
        0 0 0 4px rgba(124,58,237,.12),
        0 16px 30px rgba(6,182,212,.15);

    outline:none;
}

/* BUTTON */

.submit-btn{
    padding:12px 28px;
    margin-top: 15px;
    border-radius:16px;

    color:#fff;
    font-size:13px;
    font-weight:900;

    background:
        linear-gradient(
            135deg,
            #7C3AED,
            #06B6D4
        );

    box-shadow:
        0 18px 40px rgba(124,58,237,.25);

    transition:.3s ease;
}

.submit-btn:hover{
    transform:translateY(-3px);
}

@keyframes spinGlow{
    to{
        transform:rotate(360deg);
    }
}

@media(max-width:768px){

    .password-card{
        padding:18px;
        border-radius:22px;
    }

    .password-heading h2{
        font-size:18px;
    }

    .password-icon{
        width:44px;
        height:44px;
        font-size:20px;
    }

    .submit-btn{
        width:100%;
    }

}
    </style>
</head>

<body class="text-white">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

   <div class="p-4 md:p-8 mt-10 mb-24 md:mb-10 md:ml-[300px]">

    <div class="password-card">

        <div class="password-heading">

            <div class="password-icon">
                🔐
            </div>

            <div>
                <h2>Update Admin Password</h2>
                <p>Secure your ERP account with a strong password</p>
            </div>

        </div>

        <form class="space-y-5">

            <!-- CURRENT PASSWORD -->
            <div>
                <label class="label">
                    Current Password
                </label>

                <div class="input-box">

                    <input
                        type="password"
                        id="currentPassword"
                        class="input"
                        placeholder="Enter current password">

                    <span
                        class="eye-btn"
                        onclick="togglePassword('currentPassword', this)">
                        👁
                    </span>

                </div>
            </div>

            <!-- NEW PASSWORD -->
            <div>
                <label class="label">
                    New Password
                </label>

                <div class="input-box">

                    <input
                        type="password"
                        id="newPassword"
                        class="input"
                        placeholder="Enter new password">

                    <span
                        class="eye-btn"
                        onclick="togglePassword('newPassword', this)">
                        👁
                    </span>

                </div>
            </div>

            <!-- CONFIRM PASSWORD -->
            <div>
                <label class="label">
                    Confirm Password
                </label>

                <div class="input-box">

                    <input
                        type="password"
                        id="confirmPassword"
                        class="input"
                        placeholder="Confirm password">

                    <span
                        class="eye-btn"
                        onclick="togglePassword('confirmPassword', this)">
                        👁
                    </span>

                </div>
            </div>

            <div class="pt-3">

                <button type="submit" class="submit-btn">
                    Update Password
                </button>

            </div>

        </form>

    </div>

</div>

    <?php include 'footer.php' ?>

    <script>
        function togglePassword(id, icon) {

            const input = document.getElementById(id);

            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }

        }
    </script>

</body>

</html>