<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cash Memo - ERP</title>

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

/* LABEL */
.label{
    display:block;
    margin-bottom:8px;
    color:#cbd5e1;
    font-size:14px;
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
.input::placeholder{
    color:#64748b;
}

</style>
</head>

<body class="text-white bg-fixed bg-no-repeat bg-cover bg-center"
style="background-image:url('images/bg8.jpeg');">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="p-12 mt-10 lg:ml-64">

    <!-- PAGE HEADER -->
    <!-- <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-black">
                Cash Memo
            </h1>
        </div>

        <div class="flex items-center gap-2 text-md font-semibold text-black">
            <span>🏠</span>
            <span>/</span>
            <span>Cash Memo</span>
        </div>

    </div> -->

    <!-- CARD -->
    <div class="bg-gray-800 rounded-xl p-6">

        <!-- TITLE -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold">
                Form Elements
            </h2>
        </div>

        <hr class="border-slate-700 mb-8">

        <!-- FORM -->
        <form>

            <div class="grid md:grid-cols-3 gap-6">

                <!-- CASH MEMO -->
                <div>
                    <label class="label">Cash MEMO</label>
                    <input type="text" class="input" placeholder="Enter Cash Memo No">
                </div>

                <!-- AMOUNT -->
                <div>
                    <label class="label">Amount</label>
                    <input type="number" class="input" placeholder="Enter amount">
                </div>

                <!-- RECEIPT NUMBER -->
                <div>
                    <label class="label">Receipt Number</label>
                    <input type="text" class="input" placeholder="Enter receipt number">
                </div>

                <!-- DATE -->
                <div>
                    <label class="label">Date</label>
                    <input type="date" class="input" >
                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-10">
                <button type="submit" class="submit-btn">
                    Submit
                </button>
            </div>

        </form>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>