<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cash Memo - ERP</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        .submit-btn {
            transition: all 0.2s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(15, 118, 110, 0.25);
        }
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-8 transition-all duration-200">

        <!-- CASH MEMO CARD -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Heading -->
            <div class="flex items-center gap-4 p-6 border-b border-gray-100">

                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                    <i class="fas fa-money-bill-wave"></i>
                </div>

                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900">
                        Cash Memo
                    </h2>

                    <p class="text-sm text-gray-500">
                        Record income and expense transactions
                    </p>
                </div>

            </div>

            <!-- Form -->
            <form id="cashMemoForm" class="p-6 space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <!-- Transaction Type -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">
                            Transaction Type
                        </label>

                        <select id="transaction_type"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4">

                            <option value="">
                                Select Type
                            </option>

                            <option value="Income">
                                Income
                            </option>

                            <option value="Expense">
                                Expense
                            </option>

                        </select>
                    </div>


                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">
                            Category
                        </label>

                        <select id="category"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4">

                            <option value="">
                                Select Category
                            </option>

                            <option value="Salary">
                                Salary
                            </option>

                            <option value="Fees">
                                Fees
                            </option>

                            <option value="Stationery">
                                Stationery
                            </option>

                            <option value="Electric Bill">
                                Electric Bill
                            </option>

                            <option value="Transportation">
                                Transportation
                            </option>

                            <option value="Events">
                                Events
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>
                    </div>


                    <!-- Cash Memo No -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">
                            Cash Memo No
                        </label>

                        <input type="text"
                            id="cash_memo_no"
                            placeholder="Enter cash memo no"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>


                    <!-- From -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">
                            From
                        </label>

                        <input type="text"
                            id="from_party"
                            placeholder="Enter sender / source"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>


                    <!-- To -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">
                            To
                        </label>

                        <input type="text"
                            id="to_party"
                            placeholder="Enter receiver / destination"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>


                    <!-- Amount -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">
                            Amount
                        </label>

                        <input type="number"
                            id="amount"
                            min="0"
                            step="0.01"
                            placeholder="Enter amount"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>


                    <!-- Receipt Number -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">
                            Receipt Number
                        </label>

                        <input type="text"
                            id="receipt_number"
                            placeholder="Enter receipt number"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>


                    <!-- Date -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">
                            Date
                        </label>

                        <input type="date"
                            id="date"
                            class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" />
                    </div>

                </div>


                <!-- Submit -->
                <div class="flex justify-center pt-4">

                    <button type="button"
                        class="submit-btn bg-teal-600 text-white font-bold py-3 px-8 rounded-xl shadow-md hover:bg-teal-700 focus:ring-2 focus:ring-teal-300"
                        onclick="saveCashMemo(event)">

                        <i class="fas fa-check-circle mr-2"></i>

                        Submit Cash Memo

                    </button>

                </div>

            </form>

        </div>

    </main>

    <?php include 'footer.php' ?>

    <script src="url.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const dateInput = document.getElementById('date');

            if (dateInput) {

                const today = new Date().toISOString().split('T')[0];

                dateInput.value = today;

            }

        });


        function showToast(message) {

            alert(message);

        }


        async function saveCashMemo(event) {

            event.preventDefault();

            try {

                const data = {

                    transaction_type:
                        document.getElementById("transaction_type").value,

                    category:
                        document.getElementById("category").value,

                    from_party:
                        document.getElementById("from_party").value.trim(),

                    to_party:
                        document.getElementById("to_party").value.trim(),

                    cash_memo_no:
                        document.getElementById("cash_memo_no").value.trim(),

                    amount:
                        document.getElementById("amount").value,

                    receipt_number:
                        document.getElementById("receipt_number").value.trim(),

                    date:
                        document.getElementById("date").value

                };


                // Basic validation

                if (
                    !data.transaction_type ||
                    !data.category ||
                    !data.from_party ||
                    !data.to_party ||
                    !data.cash_memo_no ||
                    !data.amount ||
                    !data.date
                ) {

                    showToast("Please fill all required fields.");

                    return;

                }


                console.log(data);


                const response = await fetch(

                    url + "cash-memos/store",

                    {

                        method: "POST",

                        headers: {

                            "Content-Type": "application/json",

                            "Accept": "application/json",

                            "Authorization":
                                "Bearer " +
                                localStorage.getItem("token")

                        },

                        body: JSON.stringify(data)

                    }

                );


                const result = await response.json();

                console.log(result);


                if (response.ok) {

                    showToast(
                        result.message ||
                        "Cash Memo Added Successfully ✅"
                    );

                    document
                        .getElementById("cashMemoForm")
                        .reset();

                    // Restore today's date

                    document.getElementById("date").value =
                        new Date().toISOString().split('T')[0];

                } else {

                    showToast(
                        result.message ||
                        "API Error ❌"
                    );

                }


            } catch (error) {

                console.error(error);

                showToast("Server Error ❌");

            }

        }

    </script>

</body>

</html>