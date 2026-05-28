<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cash Memo - ERP</title>

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

<div class="p-8 md:p-[70px] mt-10 mb-20 md:mb-10 md:ml-[300px]">

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
        <form id="cashMemoForm">

            <div class="grid md:grid-cols-3 gap-6">

                <!-- CASH MEMO -->
                <div>
                    <label class="label">Cash MEMO</label>
                    <input type="text" id="cash_memo_no" class="input" placeholder="Enter Cash Memo No">
                </div>

                <!-- AMOUNT -->
                <div>
                    <label class="label">Amount</label>
                    <input type="number" id="amount" class="input" placeholder="Enter amount">
                </div>

                <!-- RECEIPT NUMBER -->
                <div>
                    <label class="label">Receipt Number</label>
                    <input type="text"  id="receipt_number" class="input" placeholder="Enter receipt number">
                </div>

                <!-- DATE -->
                <div>
                    <label class="label">Date</label>
                    <input type="date"  id="date" class="input" >
                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-10">
              <button
type="button"
class="submit-btn"
onclick="saveCashMemo(event)">

    Submit

</button>
            </div>

        </form>

    </div>

</div>
<!-- TOAST MESSAGE -->

<div

id="toast"

class="fixed top-5 right-5
translate-x-[120%]
transition-all duration-500
z-50">

    <div

    id="toastBox"

    class="px-5 py-4 rounded-xl
    shadow-2xl text-white
    font-semibold">

        Message

    </div>

</div>


<?php include 'footer.php' ?>

<script src="url.js"></script>

<script>

function showToast(message){

    alert(message);

}



async function saveCashMemo(event){

    event.preventDefault();



    try{

        const data = {

            cash_memo_no:
            document.getElementById("cash_memo_no").value,

            amount:
            document.getElementById("amount").value,

            receipt_number:
            document.getElementById("receipt_number").value,

            date:
            document.getElementById("date").value

        };



        console.log(data);



        const response = await fetch(

            url + "cash-memos/store",

            {

                method:"POST",

                headers:{

                    "Content-Type":"application/json",

                    "Accept":"application/json",

                    "Authorization":
                    "Bearer " +
                    localStorage.getItem("token")

                },

                body:JSON.stringify(data)

            }

        );



        const result =
        await response.json();



        console.log(result);



        if(response.ok){

            showToast(
                result.message ||
                "Cash Memo Added Successfully ✅"
            );



            document.getElementById(
                "cashMemoForm"
            ).reset();

        }

        else{

            showToast(
                result.message ||
                "API Error ❌"
            );

        }



    }catch(error){

        console.log(error);

        showToast("Server Error ❌");

    }

}

</script>
</body>
</html>