<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Support - ERP</title>

<link rel="stylesheet" href="dist/output.css">
<link rel="stylesheet" href="dist/style.css">


<style>

</style>
</head>

<body>

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="lg:ml-72 mt-20 mb-24 p-4 md:p-8">

    <div class="grid md:grid-cols-2 gap-6">

        <div class="support-card">
            <div class="support-heading">
                <div class="support-icon">🎧</div>
                <div>
                    <h1>Support Center</h1>
                    <p>ERP help and service desk</p>
                </div>
            </div>

            <p class="support-text">
                Need help? Contact our ERP support team anytime.
            </p>

            <div class="support-info">
                <p>📞 Phone: +91 98765 43210</p>
                <p>📧 Email: support@erpdashboard.com</p>
                <p>⏰ Working Hours: 10 AM - 6 PM</p>
            </div>
        </div>

        <div class="support-card">
            <div class="support-heading">
                <div class="support-icon">✉️</div>
                <div>
                    <h2>Send Message</h2>
                    <p>Write your issue or request</p>
                </div>
            </div>

            <input type="text" placeholder="Your Name" class="support-input">
            <input type="email" placeholder="Your Email" class="support-input">
            <textarea rows="5" placeholder="Your Message" class="support-input"></textarea>

            <button class="support-btn">
                Submit Request
            </button>
        </div>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>