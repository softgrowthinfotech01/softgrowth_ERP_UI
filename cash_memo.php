<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Memo - ERP</title>

    <link rel="stylesheet" href="dist/output.css">

    <style>
        body {
            overflow-x: hidden;
            min-height: 100vh;

            background:
                radial-gradient(circle at center,
                    rgba(0, 0, 0, .35) 0%,
                    rgba(0, 0, 0, .65) 60%,
                    rgba(0, 0, 0, .85) 100%),
                url('images/d_bg.png');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 50px;
        }

        /* CASH MEMO CARD */
        .cashmemo-card {
            position: relative;
            overflow: hidden;

            padding: 22px;
            margin-top: 40px;
            border-radius: 26px;

            background:
                linear-gradient(135deg,
                    rgba(255, 255, 255, .92),
                    rgba(245, 243, 255, .88),
                    rgba(236, 254, 255, .84));

            border: 1px solid rgba(255, 255, 255, .75);

            backdrop-filter: blur(35px);
            -webkit-backdrop-filter: blur(35px);

            box-shadow:
                0 35px 90px rgba(15, 23, 42, .22),
                inset 0 1px 0 rgba(255, 255, 255, 1);
        }

        .cashmemo-card::before {
            content: "";
            position: absolute;
            inset: -2px;
            z-index: 0;

            background:
                conic-gradient(from 180deg,
                    #7C3AED,
                    #06B6D4,
                    #22C55E,
                    #F59E0B,
                    #7C3AED);

            opacity: .35;
            animation: spinGlow 7s linear infinite;
        }

        .cashmemo-card::after {
            content: "";
            position: absolute;
            inset: 2px;
            z-index: 0;

            border-radius: 24px;

            background:
                linear-gradient(135deg,
                    rgba(255, 255, 255, .95),
                    rgba(245, 243, 255, .90),
                    rgba(240, 249, 255, .88));
        }

        .cashmemo-card>* {
            position: relative;
            z-index: 2;
        }

        /* HEADING */
        .cashmemo-heading {
            display: flex;
            align-items: center;
            gap: 14px;

            margin-bottom: 22px;
            padding-bottom: 16px;

            border-bottom: 1px solid rgba(226, 232, 240, .85);
        }

        .cashmemo-icon {
            width: 48px;
            height: 48px;

            display: grid;
            place-items: center;

            border-radius: 16px;

            font-size: 22px;

            background: linear-gradient(135deg, #7C3AED, #06B6D4);
            box-shadow: 0 16px 34px rgba(124, 58, 237, .28);
        }

        .cashmemo-heading h2 {
            color: #0F172A;
            font-size: 22px;
            font-weight: 950;
            letter-spacing: -.6px;
        }

        .cashmemo-heading p {
            color: #64748B;
            font-size: 13px;
            font-weight: 700;
            margin-top: 3px;
        }

        /* LABEL */
        .label {
            display: block;
            color: #1E293B !important;
            font-size: 13px;
            font-weight: 950;
            margin-bottom: 7px;
        }

        /* INPUT */
        .input {
            width: 100%;
            height: 44px;

            padding: 0 14px;

            border-radius: 14px;

            background: linear-gradient(180deg, #FFFFFF, #F8FAFC);
            border: 1px solid rgba(203, 213, 225, .88);

            color: #0F172A;
            font-size: 13px;
            font-weight: 750;

            outline: none;
            transition: .28s ease;

            box-shadow:
                0 8px 20px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, 1);
        }

        .input::placeholder {
            color: #94A3B8;
        }

        .input:hover {
            transform: translateY(-1px);
            border-color: #67E8F9;
            box-shadow: 0 12px 25px rgba(6, 182, 212, .12);
        }

        .input:focus {
            background: #fff;
            border-color: #7C3AED;

            box-shadow:
                0 0 0 4px rgba(124, 58, 237, .14),
                0 16px 30px rgba(6, 182, 212, .15);
        }

        /* BUTTON */
        .submit-btn {
            position: relative;
            overflow: hidden;

            padding: 12px 26px;

            border-radius: 16px;

            color: #fff;
            font-size: 13px;
            font-weight: 950;

            background: linear-gradient(135deg, #7C3AED, #06B6D4);

            box-shadow: 0 18px 40px rgba(124, 58, 237, .28);

            transition: .3s ease;
        }

        .submit-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;

            width: 100%;
            height: 100%;

            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .35), transparent);
            transition: .5s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 24px 50px rgba(6, 182, 212, .30);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        @keyframes spinGlow {
            to {
                transform: rotate(360deg);
            }
        }

        @media(max-width:768px) {
            .cashmemo-card {
                padding: 18px;
                border-radius: 22px;
            }

            .cashmemo-card::after {
                border-radius: 20px;
            }

            .cashmemo-heading {
                gap: 12px;
                margin-bottom: 18px;
            }

            .cashmemo-icon {
                width: 42px;
                height: 42px;
                border-radius: 14px;
                font-size: 20px;
            }

            .cashmemo-heading h2 {
                font-size: 19px;
            }

            .input {
                height: 42px;
                border-radius: 13px;
            }

            .submit-btn {
                width: 100%;
                padding: 12px 18px;
            }
        }
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