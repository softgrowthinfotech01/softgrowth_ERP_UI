<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cash Memo - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
  /* Minimal custom styles – everything else is Tailwind */
        .submit-btn {
            transition: all 0.2s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(15, 118, 110, 0.25);
        }
        /* subtle focus ring for inputs (Tailwind's focus:ring already does this) */
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-8 transition-all duration-200">

        <!-- ===== CASH MEMO CARD ===== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-gray-900">Cash Memo</h2>
                    <p class="text-sm text-gray-500">Create and submit student cash memo details</p>
                </div>
            </div>

            <!-- Form -->
            <form id="cashMemoForm" class="p-6 space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <!-- Cash Memo No -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Cash Memo No</label>
                        <input type="text" id="cash_memo_no" placeholder="Enter cash memo no" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                    <!-- Amount -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Amount</label>
                        <input type="number" id="amount" placeholder="Enter amount" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                    <!-- Receipt Number -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Receipt Number</label>
                        <input type="text" id="receipt_number" placeholder="Enter receipt number" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                    <!-- Date -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Date</label>
                        <input type="date" id="date" 
                               class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-4">
                    <button type="button" class="submit-btn bg-teal-600 text-white font-bold py-3 px-8 rounded-xl shadow-md hover:bg-teal-700 focus:ring-2 focus:ring-teal-300" onclick="saveCashMemo(event)">
                        <i class="fas fa-check-circle mr-2"></i> Submit Cash Memo
                    </button>
                </div>

            </form>

        </div>

    </main>

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






    <!-- ============================================================
    JAVASCRIPT – form submission demo
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Optional: set default date to today
            const dateInput = document.getElementById('date');
            if (dateInput) {
                const today = new Date().toISOString().split('T')[0];
                dateInput.value = today;
            }
        });

        // Expose save function globally
        window.saveCashMemo = function(e) {
            e.preventDefault();
            const memoNo = document.getElementById('cash_memo_no').value.trim();
            const amount = document.getElementById('amount').value.trim();
            const receipt = document.getElementById('receipt_number').value.trim();
            const date = document.getElementById('date').value;

            if (!memoNo || !amount || !receipt || !date) {
                alert('Please fill all fields.');
                return;
            }

            alert(`Cash Memo ${memoNo} submitted successfully! (demo)`);
            // In a real app, you would send data to server via AJAX or form submit.
        };
    </script>





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