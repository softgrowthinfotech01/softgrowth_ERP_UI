<?php
// ============================================================
// Bonafide Certificate — Standalone Printable Page
// ============================================================

$cert_no      = $_GET['cert_no']       ?? 'BON-2026-0001';
$name         = $_GET['name']          ?? 'Nayanshree Ramteke';
$parent       = $_GET['parent']        ?? 'Mr. Rajesh Ramteke';
$institution  = $_GET['institution']   ?? 'Softgrowth Infotech';
$class        = $_GET['class']         ?? 'Front-End Development';
$academic     = $_GET['academic']      ?? '2026-2027';
$reg_id       = $_GET['reg_id']        ?? 'SGI00025';
$dob          = $_GET['dob']           ?? '2006-06-15';
$purpose      = $_GET['purpose']       ?? 'Scholarship';
$issue_date   = $_GET['issue_date']    ?? date('Y-m-d');
$city         = $_GET['city']          ?? 'Chandrapur';

$dob_fmt    = date('d/m/Y', strtotime($dob));
$issue_fmt  = date('d/m/Y', strtotime($issue_date));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bonafide Certificate - <?= htmlspecialchars($cert_no) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        html { scroll-behavior: smooth; }
        @media print {
            body { background: #fff !important; padding: 0 !important; margin: 0 !important; }
            .no-print { display: none !important; }
            #certificateCard {
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
                padding: 40px !important;
            }
        }
    </style>
</head>

<body class="bg-gray-200 text-gray-800 antialiased min-h-screen w-full overflow-x-hidden">

    <div class="min-h-screen w-full flex justify-center px-3 sm:px-6 py-6 sm:py-10">
        <div class="w-full max-w-3xl my-auto">

            <!-- ACTION BAR (hidden on print) -->
            <div class="no-print bg-white rounded-xl shadow-md border border-gray-200 p-3 mb-4 flex items-center justify-between gap-3 flex-wrap">
                <div class="flex items-center gap-3">
                    <button type="button" id="backBtn"
                            class="w-9 h-9 rounded-lg bg-gray-100 hover:bg-orange-100 text-gray-600 hover:text-orange-600 flex items-center justify-center transition">
                        <i class="fas fa-arrow-left text-sm"></i>
                    </button>
                    <div>
                        <h1 class="text-base font-bold text-gray-900 leading-tight">Bonafide Certificate</h1>
                        <p class="text-[11px] text-gray-500 mt-0.5">
                            Certificate No.: <span class="font-semibold text-orange-600"><?= htmlspecialchars($cert_no) ?></span>
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2 flex-wrap">
                    <button type="button" id="printBtn"
                            class="px-4 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-[12px] shadow-sm flex items-center gap-1.5">
                        <i class="fas fa-print text-[11px]"></i> Print
                    </button>
                    <button type="button" id="downloadBtn"
                            class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition text-[12px] shadow-md flex items-center gap-1.5">
                        <i class="fas fa-download text-[11px]"></i> Download
                    </button>
                </div>
            </div>

            <!-- CERTIFICATE CARD -->
            <div id="certificateCard" class="bg-white rounded-xl shadow-md border border-gray-200 p-8 sm:p-12">

                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full border-2 border-orange-500 mb-2">
                        <i class="fas fa-graduation-cap text-orange-500 text-xl"></i>
                    </div>
                    <div class="text-[10px] text-gray-400 tracking-widest">[INSTITUTION LOGO]</div>
                </div>

                <h1 class="text-center text-xl sm:text-2xl font-bold text-gray-900 tracking-wide">BONAFIDE CERTIFICATE</h1>

                <p class="text-center text-[12px] text-gray-500 mt-1">
                    Certificate No.: <span class="font-semibold text-gray-700"><?= htmlspecialchars($cert_no) ?></span>
                </p>

                <div class="border-t border-gray-300 my-6"></div>

                <h2 class="text-center text-[14px] font-bold text-gray-900 mb-5">TO WHOMSOEVER IT MAY CONCERN</h2>

                <div class="space-y-4 text-[13px] leading-relaxed text-gray-800 text-justify">
                    <p>
                        This is to certify that <span class="font-bold"><?= htmlspecialchars($name) ?></span>,
                        son/daughter of <span class="font-bold"><?= htmlspecialchars($parent) ?></span>,
                        is a bonafide student of <span class="font-bold"><?= htmlspecialchars($institution) ?></span>,
                        studying in <span class="font-bold"><?= htmlspecialchars($class) ?></span>
                        during the academic year <span class="font-bold"><?= htmlspecialchars($academic) ?></span>.
                    </p>

                    <p>
                        The student's Registration Number is <span class="font-bold"><?= htmlspecialchars($reg_id) ?></span>,
                        and Date of Birth is <span class="font-bold"><?= htmlspecialchars($dob_fmt) ?></span>.
                    </p>

                    <p>
                        This certificate is issued upon request for the purpose of
                        <span class="font-bold"><?= htmlspecialchars($purpose) ?></span>.
                    </p>
                </div>

                <div class="flex items-end justify-between mt-12 text-[12px] text-gray-700">
                    <div class="space-y-1">
                        <div><span class="font-semibold">Date:</span> <?= htmlspecialchars($issue_fmt) ?></div>
                        <div><span class="font-semibold">Place:</span> <?= htmlspecialchars($city) ?></div>
                    </div>
                    <div class="text-center">
                        <div class="w-40 border-t border-gray-400 pt-1 mt-8">
                            <div class="font-semibold text-gray-800">Principal / Authorized Signatory</div>
                        </div>
                    </div>
                </div>

             




            </div>

        </div>
    </div>

    <script>
        (function() {
            document.getElementById('backBtn').addEventListener('click', function() {
                if (window.history.length > 1) window.history.back();
                else window.location.href = 'bonafide.php';
            });

            

            document.getElementById('printBtn').addEventListener('click', function() {
                window.print();
            });

            document.getElementById('downloadBtn').addEventListener('click', function() {
                const certHTML = document.getElementById('certificateCard').outerHTML;
                const fullHTML = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bonafide Certificate - <?= htmlspecialchars($cert_no) ?></title>
    <script src="https://cdn.tailwindcss.com"><\/script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        @media print {
            body { background: #fff !important; padding: 0 !important; margin: 0 !important; }
            #certificateCard {
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
                padding: 40px !important;
            }
        }
    </style>
</head>
<body class="bg-gray-200 text-gray-800 antialiased min-h-screen w-full p-4 sm:p-8">
    <div class="flex justify-center">
        <div class="w-full max-w-3xl">
            ${certHTML}
        </div>
    </div>
</body>
</html>`;

                const blob = new Blob([fullHTML], { type: 'text/html' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'Bonafide-<?= htmlspecialchars($cert_no) ?>.html';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            });
        })();
    </script>

</body>

</html> 