<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Registration - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        .step-box {
            display: none;
            opacity: 0;
            transform: translateY(12px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .step-box.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-gray-300 text-gray-800 antialiased min-h-screen">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

    <!-- MAIN WRAPPER CENTERED -->
    <main id="main" class="md:ml-[300px] px-4 sm:px-6 py-28 pb-10 mb-10 transition-all duration-200 flex flex-col items-center justify-center">

        <!-- ================= USER REGISTRATION CARD ================= -->
        <div class="step-box active w-full max-w-3xl bg-white rounded-2xl shadow-sm border border-gray-300 p-6 md:p-8" id="step1">
            
            <!-- CARD HEADING -->
            <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center text-sm shadow-md">
                    <i class="fas fa-user-plus"></i>
                </span>
                System User Registration
            </h2>
            
            <!-- FORM FIELDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Full Name -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Full Name</label>
                    <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="name" placeholder="Enter full name" />
                </div>

                <!-- Email Address -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Email Address</label>
                    <input type="email" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="email" placeholder="Enter email address" />
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">User Role</label>
                    <select class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="role">
                        <option value="">Select Role</option>
                        <option value="clerk">Clerk</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                    <input type="password" class="w-full rounded-xl border border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 bg-white py-2.5 px-4" id="password" placeholder="Enter secure password" />
                </div>

            </div>

            <!-- SUBMIT BUTTON -->
            <div class="mt-8 flex justify-end">
                <button id="submitBtn" onclick="saveUser()" class="px-6 py-2.5 bg-teal-600 text-white font-bold rounded-xl hover:bg-teal-700 transition sm:w-auto w-full shadow-md">
                    Register User <i class="fas fa-check ml-2"></i>
                </button>
            </div>

        </div>

    </main>

    <?php include 'footer.php' ?>
    <script src="url.js"></script>

    <!-- ============================================================
        REGISTRATION SUBMISSION LOGIC
        ============================================================ -->
    <script>
        async function saveUser() {
            try {
                const token = localStorage.getItem("token");

                // Get Field Values
                const name = document.getElementById("name").value.trim();
                const email = document.getElementById("email").value.trim();
                const role = document.getElementById("role").value;
                const password = document.getElementById("password").value.trim();

                // Basic Validations
                if (!name) {
                    alert("Full Name is Required");
                    return;
                }
                if (!email) {
                    alert("Email Address is Required");
                    return;
                }
                if (!role) {
                    alert("Please Select a Role");
                    return;
                }
                if (!password || password.length < 6) {
                    alert("Password must be at least 6 characters long");
                    return;
                }

                // Payload
                const userData = {
                    name: name,
                    email: email,
                    role: role,
                    password: password
                };

                const submitBtn = document.getElementById("submitBtn");
                submitBtn.disabled = true;
                submitBtn.innerText = "Registering...";

                // API Call
                const response = await fetch(url + "users", {
                    method: "POST",
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify(userData)
                });

                const result = await response.json();

                if (response.ok) {
                    alert("User Registered Successfully ✅");
                    location.reload();
                } else {
                    alert(result.message || "Registration failed. Please check inputs.");
                }

            } catch (error) {
                console.error(error);
                alert("API Connection Error");
            } finally {
                const submitBtn = document.getElementById("submitBtn");
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Register User <i class="fas fa-check ml-2"></i>';
            }
        }
    </script>
</body>

</html>