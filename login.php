<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - ERP</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>


body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;

    /* Background Image */
    background: url("images/erp_bg.png") no-repeat center center;

    /* Make image cover entire screen */
    background-size: cover;

    /* Keep image fixed while scrolling */
    background-attachment: fixed;

    /* Fallback color */
    background-color: #e5e7eb;
}

body::before {
    content: "";
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
    z-index: -1;
}
          /* minimal custom – only for smooth transitions and subtle hover */
        .input-transition {
            transition: 0.25s ease;
        }
        .input-transition:focus {
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.2);
            border-color: #0f766e;
        }
        .btn-transition {
            transition: 0.25s ease;
        }
        .btn-transition:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(15, 118, 110, 0.25);
        }
        .alert-slide {
            animation: slideDown 0.4s ease;
        }
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translate(-50%, -20px);
            }
            to {
                opacity: 1;
                transform: translate(-50%, 0);
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-300 p-4">



    <!-- ===== LOGIN CARD ===== -->
    <div class="w-full max-w-sm bg-white/30 rounded-2xl shadow-lg p-6 sm:p-8 border border-gray-100">

        <!-- Icon -->
        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-teal-50 border border-teal-200 flex items-center justify-center">
            <i class="fas fa-lock text-3xl text-teal-600"></i>
        </div>

        <h2 class="text-center text-2xl font-extrabold text-gray-900 mb-1">
            Welcome Back
        </h2>
        <p class="text-center font-semibold text-md text-black mb-6">
            Login to continue your journey
        </p>

        <!-- Username -->
        <input type="text" id="username" placeholder="Enter Username"
               class="input-transition w-full mb-4 p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 placeholder:text-gray-400 outline-none focus:border-teal-600" />

        <!-- Password -->
        <input type="password" id="password" placeholder="Enter Password"
               class="input-transition w-full mb-4 p-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 placeholder:text-gray-400 outline-none focus:border-teal-600" />

        <!-- Options -->
        <div class="flex flex-wrap items-center justify-between gap-2 mb-6 font-semibold text-md">
            <label class="flex items-center gap-2 text-black cursor-pointer">
                <input type="checkbox" class="accent-teal-600 w-4 h-4" />
                Remember me
            </label>
            <a href="#" class="text-teal-400 hover:text-teal-800 font-medium transition">
                Forgot Password?
            </a>
        </div>

        <!-- Login Button -->
    <button
    onclick="goToDashboard()"
    class="btn-transition w-full py-3 rounded-xl bg-teal-600 text-white font-bold shadow-md hover:bg-teal-700">
    Login
</button>
        <!-- Register link (commented out in original, but we can keep it) -->
        <!-- <p class="mt-6 text-center text-sm text-gray-500">
            Don’t have an account?
            <a href="#" class="font-semibold text-teal-600 hover:text-teal-800 transition">
                Register
            </a>
        </p> -->

    </div>

    <!-- ===== CUSTOM ALERT ===== -->
    <div id="customAlert"
         class="fixed top-5 left-1/2 -translate-x-1/2 bg-teal-600 text-white px-6 py-3 rounded-lg shadow-lg hidden z-50 alert-slide">
        <i class="fas fa-check-circle mr-2"></i> Login Successful ✅
    </div>
    <script src="url.js"></script>
    <script>

function goToDashboard() {

    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    // Optional validation
    if (username === "" || password === "") {

        alert("Please enter Username and Password");

        return;

    }

    // Show success message
    const customAlert = document.getElementById("customAlert");
    customAlert.classList.remove("hidden");

    // Redirect after 1.5 seconds
    setTimeout(() => {

        window.location.href = "dashboard.php"; // Change if your dashboard file has a different name

    }, 1500);

}

        //    setTimeout(() => {

        //                 customAlert.classList.add("hidden");

        //                 window.location.href = "dashboard";

        //             }, 1500);


        // async function login() {

            // try {

            //     // ======================
            //     // GET INPUT VALUES
            //     // ======================

            //     const data = {

            //         username: document.getElementById("username").value,

            //         password: document.getElementById("password").value

            //     };



            //     console.log(data);



                // ======================
                // API CALL
                // ======================

                // const response = await fetch(
                //     url + "login", {

                //         method: "POST",

                //         headers: {

                //             "Content-Type": "application/json",
                //             "Accept": "application/json"

                //         },

                //         body: JSON.stringify(data)

                //     }
                // );



                // const result = await response.json();

                // console.log(result);



                // ======================
                // SUCCESS
                // ======================

                // if (response.ok) {

                    // SAVE TOKEN

                    // localStorage.setItem("token", result.token);

                    // // SAVE USER

                    // localStorage.setItem(
                    //     "user",
                    //     JSON.stringify(result.user)
                    // );

                    // const customAlert =
                    //     document.getElementById("customAlert");



                    // // SHOW ALERT

                    // customAlert.classList.remove("hidden");



            //         // AUTO HIDE + REDIRECT

            //         setTimeout(() => {

            //             customAlert.classList.add("hidden");

            //             window.location.href = "dashboard";

            //         }, 1500);

            //     } else {

            //         alert(result.message);

            //     }

            // } catch (error) {

            //     console.log(error);

            //     alert("Login Error");

            // }

        // }
    </script>
</body>

</html>