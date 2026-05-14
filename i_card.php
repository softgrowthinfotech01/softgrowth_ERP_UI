<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ID Card - ERP</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{
    background:#0f172a;
}

/* CARD */
.card{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(18px);
    border:1px solid rgba(255,255,255,0.1);
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

/* INPUT */
.input{
    width:100%;
    height:50px;
    background:white;
    border:1px solid #334155;
    border-radius:10px;
    padding:0 14px;
    color:black;
    outline:none;
    transition:0.3s;
}

.input:focus{
    border-color:#06b6d4;
    box-shadow:0 0 0 3px rgba(6,182,212,0.2);
}

/* TEXTAREA */
.textarea{
    width:100%;
    min-height:120px;
    background:#1e293b;
    border:1px solid #334155;
    border-radius:10px;
    padding:14px;
    color:white;
    outline:none;
    resize:none;
    transition:0.3s;
}

.textarea:focus{
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

/* FILE INPUT */
.file-input{
    width:100%;
    padding:12px;
    background:#1e293b;
    border:1px solid #334155;
    border-radius:10px;
    color:#cbd5e1;
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

<div class="p-12 mt-10 lg:ml-64">

    <!-- PAGE HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-black">
                ID Card
            </h1>
        </div>

        <div class="flex items-center gap-2 text-md font-semibold text-black">
            <span>🏠</span>
            <span>/</span>
            <span>ID Card</span>
        </div>

    </div>

    <!-- CARD -->
    <div class="bg-gray-800 rounded-xl p-6">

        <!-- TITLE -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold">
                Student ID Card Form
            </h2>
        </div>

        <hr class="border-slate-700 mb-8">

        <!-- FORM -->
        <form>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- FULL NAME -->
                <div>
                    <label class="label">Full Name</label>
                    <input type="text" class="input">
                </div>

                <!-- SELECT -->
                <div>
                    <label class="label">Select</label>

                    <select class="input">
                        <option>-- Select --</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>

                <!-- DOB -->
                <div>
                    <label class="label">Date of Birth</label>
                    <input type="date" class="input">
                </div>

                <!-- PHONE -->
                <div>
                    <label class="label">Phone Number</label>
                    <input type="number" class="input">
                </div>

                <!-- CLASS -->
                <div>
                    <label class="label">Class</label>
                    <input type="text" class="input">
                </div>

                <!-- BLOOD GROUP -->
                <div>
                    <label class="label">Blood Group</label>

                    <select class="input">
                        <option>-- Select Blood Group --</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                        <option>O+</option>
                        <option>O-</option>
                    </select>
                </div>

                <!-- ADDRESS -->
                <div class="md:col-span-2">
                    <label class="label">Address</label>
                    <textarea class="textarea"></textarea>
                </div>

                <!-- PHOTO -->
               <div class="md:col-span-2">
    <label class="label">Photo</label>

    <input type="file"
    class="file-input w-full text-slate-300
    file:bg-violet-500
    file:text-white
    file:border-0
    file:px-4
    file:py-2
    file:rounded-md
    file:mr-4
    cursor-pointer">
</div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-10">
                <button type="submit" class="submit-btn">
                    Generate ID Card
                </button>
            </div>

        </form>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>