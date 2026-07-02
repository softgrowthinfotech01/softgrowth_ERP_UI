<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Payment Form</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />



    <style>
/* Minimal custom styles – everything else is Tailwind */
        .step {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 15px;
            transition: 0.3s ease;
            background: #f1f5f9;
            color: #94a3b8;
            border: 2px solid #e2e8f0;
        }
        .step.active {
            background: #0f766e;
            color: #fff;
            border-color: #0f766e;
            transform: scale(1.05);
            box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.2);
        }
        .line {
            height: 3px;
            flex: 1;
            border-radius: 999px;
            background: #e2e8f0;
            transition: 0.3s ease;
        }
        .line.active {
            background: #0f766e;
        }
        .step-box {
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .step-box.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        @media (max-width: 768px) {
            .step { width: 34px; height: 34px; font-size: 13px; }
            .line { height: 2px; }
        }
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased">
    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>
 <main class="md:ml-[300px] max-w-7xl mx-auto px-4 sm:px-6 py-28 pb-10 mb-4 transition-all duration-200">

        <!-- STEPPER -->
        <div class="flex items-center gap-2 sm:gap-4 mb-8">
                <button id="prev" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition hidden sm:w-auto w-full">
                <i class="fas fa-arrow-left mr-2"></i> Previous
            </button>
      
            <div class="step active" id="s1">1</div>
            <div class="line active" id="l1"></div>
            <div class="step" id="s2">2</div>
            <div class="line" id="l2"></div>
            <div class="step" id="s3">3</div>
                  <button id="next" class="px-6 py-2.5 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-700 transition sm:w-auto w-full sm:ml-auto">
                Next <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>

        <!-- ================= STEP 1 ================= -->
        <div class="step-box active bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8" id="step1">
            <h2 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm"><i class="fas fa-user-graduate"></i></span>
                Student Details
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Class -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Class</label>
                    <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Class" />
                </div>
                <!-- Student Name -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Student Name</label>
                    <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Student Name" />
                </div>
                <!-- Student ID -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Student ID</label>
                    <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Student ID" />
                </div>
                <!-- Total Amount -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Net Payable Amount</label>
                    <input type="text" class="w-full rounded-xl border-gray-300 shadow-sm bg-gray-50 text-gray-500 py-2.5 px-4" placeholder="Auto Calculated" readonly />
                </div>
                <!-- Balance Amount -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Balance Amount</label>
                    <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm bg-gray-50 text-gray-500 py-2.5 px-4" placeholder="Auto Calculated" readonly />
                </div>
            </div>
        </div>

        <!-- ================= STEP 2 ================= -->
        <div class="step-box bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8" id="step2">
            <h2 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm"><i class="fas fa-receipt"></i></span>
                Fee Structure
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- All fee fields -->
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Admission Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Integration Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Exam Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Practical Exam Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">University Development Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Avishkar / Indra Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">E-Suvidha Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">ID Card Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Computer Lab Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Course Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Youth Festival Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Alumni Union Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">College Magazine Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Tuition Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Tuition Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Enrollment Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Enrollment Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Eligibility Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Eligibility Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Laboratory Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Laboratory Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Library Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Library Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Disaster Management Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Exam Form Process Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Convocation Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">College Exam Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">University Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Maintenance Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Student Insurance Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
                <div><label class="block text-sm font-bold text-gray-700 mb-1">Other Fee</label><input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Fee" /></div>
            </div>
        </div>

        <!-- ================= STEP 3 ================= -->
        <div class="step-box bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8" id="step3">
            <h2 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm"><i class="fas fa-credit-card"></i></span>
                Payment Details
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Installment -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Select Installment</label>
                    <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4">
                        <option>Select Installment</option>
                        <option>1st Installment</option>
                        <option>2nd Installment</option>
                        <option>Full Payment</option>
                    </select>
                </div>
                <!-- Amount -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Amount Entered</label>
                    <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Amount" />
                </div>
                <!-- Remark -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Remark</label>
                    <textarea rows="4" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" placeholder="Enter Remark"></textarea>
                </div>
            </div>
        </div>

        <!-- BUTTONS -->
        <div class="flex flex-col sm:flex-row justify-between gap-4 mt-6">
        
        </div>

    </main>



    </div>
    <?php include 'footer.php' ?>
    <!-- ================= SCRIPT ================= -->
    <script>
        let step = 1;

        const next = document.getElementById("next");
        const prev = document.getElementById("prev");

        function show(n) {

            document.querySelectorAll(".step-box").forEach(e => e.classList.remove("active"));
            document.getElementById("step" + n).classList.add("active");

            for (let i = 1; i <= 3; i++) {
                document.getElementById("s" + i).classList.remove("active");
            }

            for (let i = 1; i <= n; i++) {
                document.getElementById("s" + i).classList.add("active");
            }

            for (let i = 1; i < n; i++) {
                document.getElementById("l" + i).classList.add("active");
            }

            prev.classList.toggle("hidden", n === 1);
            next.innerText = n === 3 ? "Submit" : "Next";

        }

        next.onclick = () => {
            if (step === 3) {
                alert("Payment Submitted Successfully ✅");
                return;
            }
            step++;
            show(step);
        }

        prev.onclick = () => {
            step--;
            show(step);
        }

        show(step);
    </script>

</body>

</html>