<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Memo - ERP</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="dist/style.css">


    <style>

    </style>
</head>

<body class="text-white ">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <div class="p-4 md:p-8 mt-10 mb-24 md:mb-10 md:ml-[300px]">

        <div class="cashmemo-card">

            <div class="cashmemo-heading">
                <div class="cashmemo-icon">💵</div>

                <div>
                    <h2>Cash Memo</h2>
                    <p>Create and submit student cash memo details</p>
                </div>
            </div>

            <form id="cashMemoForm">

                <div class="grid md:grid-cols-3 gap-4">

                    <div>
                        <label class="label">Cash Memo No</label>
                        <input type="text" id="cash_memo_no" class="input" placeholder="Enter cash memo no">
                    </div>

                    <div>
                        <label class="label">Amount</label>
                        <input type="number" id="amount" class="input" placeholder="Enter amount">
                    </div>

                    <div>
                        <label class="label">Receipt Number</label>
                        <input type="text" id="receipt_number" class="input" placeholder="Enter receipt number">
                    </div>

                    <div>
                        <label class="label">Date</label>
                        <input type="date" id="date" class="input">
                    </div>

                </div>

                <div class="flex justify-center mt-8">
                    <button type="button" class="submit-btn" onclick="saveCashMemo(event)">
                        Submit Cash Memo
                    </button>
                </div>

            </form>

        </div>

    </div>
    <!-- TOAST MESSAGE -->

    <!-- <div

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

    </div> -->


    <?php include 'footer.php' ?>

    <script src="url.js"></script>

    <script>
        function showToast(message) {

            alert(message);

        }



        async function saveCashMemo(event) {

            event.preventDefault();



            try {

                const data = {

                    cash_memo_no: document.getElementById("cash_memo_no").value,

                    amount: document.getElementById("amount").value,

                    receipt_number: document.getElementById("receipt_number").value,

                    date: document.getElementById("date").value

                };



                console.log(data);



                const response = await fetch(

                    url + "cash-memos/store",

                    {

                        method: "POST",

                        headers: {

                            "Content-Type": "application/json",

                            "Accept": "application/json",

                            "Authorization": "Bearer " +
                                localStorage.getItem("token")

                        },

                        body: JSON.stringify(data)

                    }

                );



                const result =
                    await response.json();



                console.log(result);



                if (response.ok) {

                    showToast(
                        result.message ||
                        "Cash Memo Added Successfully ✅"
                    );



                    document.getElementById(
                        "cashMemoForm"
                    ).reset();

                } else {

                    showToast(
                        result.message ||
                        "API Error ❌"
                    );

                }



            } catch (error) {

                console.log(error);

                showToast("Server Error ❌");

            }

        }
    </script>
</body>

</html>