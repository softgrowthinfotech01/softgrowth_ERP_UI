<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Password - ERP</title>

<link rel="stylesheet" href="dist/output.css">

<style>

body{
    overflow-x:hidden;
        background-size: 400% 400%;
    animation: gradientMove 15s ease infinite;
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

/* CARD */
.card{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(18px);
    border:1px solid rgba(255,255,255,0.1);
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

/* INPUT BOX */
.input-box{
    position:relative;
}

/* INPUT */
.input{
    width:100%;
    height:52px;
    background:white;
    border:1px solid #334155;
    border-radius:10px;
    padding:0 50px 0 14px;
    color:black;
    outline:none;
    transition:0.3s;
}

.input:focus{
    border-color:#06b6d4;
    box-shadow:0 0 0 3px rgba(6,182,212,0.2);
}

/* LABEL */
.label{
    display:block;
    margin-bottom:8px;
    color:#cbd5e1;
    font-size:14px;
}

/* EYE BUTTON */
.eye-btn{
    position:absolute;
    right:14px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    color:#94a3b8;
    font-size:18px;
}

/* BUTTON */
.submit-btn{
    background:#06b6d4;
    color:white;
    height:50px;
    padding:0 40px;
    border-radius:10px;
    font-weight:600;
    transition:0.3s;
}

.submit-btn:hover{
    background:#0891b2;
    transform:translateY(-2px);
}

</style>
</head>

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center"
style="background-image:url('images/bg8.jpeg');">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="p-16 md:ml-[500px] mt-5 md:ml-[300px]">

    <!-- PAGE HEADER -->
    <!-- <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-black">
                Update Password
            </h1>
        </div>

        <div class="flex items-center gap-2 text-md font-semibold text-black">
            <span>🏠</span>
            <span>/</span>
            <span>Update Password</span>
        </div>

    </div> -->

    <!-- CARD -->
    <div class="bg-gray-800 rounded-xl  p-6 max-w-2xl">

        <!-- TITLE -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold">
                Update Admin Password
            </h2>
        </div>

        <hr class="border-slate-700 mb-8">

        <!-- FORM -->
       <form class="space-y-6">

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

            <span class="eye-btn"
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

            <span class="eye-btn"
            onclick="togglePassword('newPassword', this)">
                👁
            </span>
        </div>
    </div>

    <!-- CONFIRM PASSWORD -->
    <div>
        <label class="label">
            Confirm New Password
        </label>

        <div class="input-box">
            <input 
            type="password" 
            id="confirmPassword" 
            class="input"
            placeholder="Confirm new password">

            <span class="eye-btn"
            onclick="togglePassword('confirmPassword', this)">
                👁
            </span>
        </div>
    </div>

    <!-- BUTTON -->
    <div class="pt-4">
        <button type="submit" class="submit-btn">
            Update Password
        </button>
    </div>

</form>

    </div>

</div>

<?php include 'footer.php' ?>

<script>

function togglePassword(id, icon){

    const input = document.getElementById(id);

    if(input.type === "password"){
        input.type = "text";
    }else{
        input.type = "password";
    }

}

</script>

</body>
</html>