<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Support - ERP</title>
<link rel="stylesheet" href="dist/output.css">
</head>

<body class="text-white bg-slate-950">

<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<div class="lg:ml-72 mt-14 md:mt-14 mb-20  p-6 md:p-10">

    <div class="grid md:grid-cols-2 gap-6">

        <!-- CONTACT INFO -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">

            <h1 class="text-2xl font-bold mb-4 text-cyan-400">Support Center</h1>

            <p class="text-slate-300 mb-4">
                Need help? Contact our ERP support team anytime.
            </p>

            <div class="space-y-3 text-slate-300">
                <p>📞 Phone: +91 98765 43210</p>
                <p>📧 Email: support@erpdashboard.com</p>
                <p>⏰ Working Hours: 10 AM - 6 PM</p>
            </div>

        </div>

        <!-- CONTACT FORM -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">

            <h2 class="text-xl font-bold mb-4">Send Message</h2>

            <input type="text" placeholder="Your Name"
            class="w-full mb-3 p-2 rounded bg-slate-800 border border-slate-700">

            <input type="email" placeholder="Your Email"
            class="w-full mb-3 p-2 rounded bg-slate-800 border border-slate-700">

            <textarea rows="5" placeholder="Your Message"
            class="w-full mb-3 p-2 rounded bg-slate-800 border border-slate-700"></textarea>

            <button class="w-full bg-cyan-500 hover:bg-cyan-600 py-2 rounded font-bold">
                Submit
            </button>

        </div>

    </div>

</div>

<?php include 'footer.php' ?>

</body>
</html>