<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password - ERP</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="dist/style.css">


    <style>

    </style>
</head>

<body class="text-white">

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>

   <div class="p-4 md:p-8 mt-10 mb-24 md:mb-10 md:ml-[300px]">

    <div class="password-card">

        <div class="password-heading">

            <div class="password-icon">
                🔐
            </div>

            <div>
                <h2>Update Admin Password</h2>
                <p>Secure your ERP account with a strong password</p>
            </div>

        </div>

        <form class="space-y-5">

            <!-- CURRENT PASSWORD -->
            <div>
                <label class="label">
                    Current Password
                </label>

                <div class="input-box">

                    <input
                        type="password"
                        id="currentPassword"
                        class="input"
                        placeholder="Enter current password">

                    <span
                        class="eye-btn"
                        onclick="togglePassword('currentPassword', this)">
                        👁
                    </span>

                </div>
            </div>

            <!-- NEW PASSWORD -->
            <div>
                <label class="label">
                    New Password
                </label>

                <div class="input-box">

                    <input
                        type="password"
                        id="newPassword"
                        class="input"
                        placeholder="Enter new password">

                    <span
                        class="eye-btn"
                        onclick="togglePassword('newPassword', this)">
                        👁
                    </span>

                </div>
            </div>

            <!-- CONFIRM PASSWORD -->
            <div>
                <label class="label">
                    Confirm Password
                </label>

                <div class="input-box">

                    <input
                        type="password"
                        id="confirmPassword"
                        class="input"
                        placeholder="Confirm password">

                    <span
                        class="eye-btn"
                        onclick="togglePassword('confirmPassword', this)">
                        👁
                    </span>

                </div>
            </div>

            <div class="pt-3">

                <button type="submit" class="submit-btn">
                    Update Password
                </button>

            </div>

        </form>

    </div>

</div>

    <?php include 'footer.php' ?>

    <script>
        function togglePassword(id, icon) {

            const input = document.getElementById(id);

            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }

        }
    </script>

</body>

</html>