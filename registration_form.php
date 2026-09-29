<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Institution - Softgrowth ERP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
            border-color: #f97316;
        }
        .upload-area:hover {
            border-color: #f97316;
            background-color: #fff7ed;
        }
        .check-valid i { color: #22c55e !important; }
        .check-invalid i { color: #ef4444 !important; }
    </style>
    <script>
        /* 
          prevent opening registration page again after successful registration
          if (localStorage.getItem('institution_registered') === 'true') {
              window.location.href = 'login.php'; 
          }
        */
    </script>
</head>

<body class="bg-gray-100 min-h-screen py-6 px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <!-- ===== PROFESSIONAL HEADER ===== -->
        <div class="bg-gradient-to-r from-[#ea580c] to-[#f97316] px-6 sm:px-8 py-5 text-white relative overflow-hidden">
            <div class="relative z-10 flex flex-col sm:flex-row items-center gap-5">

                <!-- Logo Container - Professional -->
                <div class="flex-shrink-0 bg-white rounded-2xl p-3 shadow-xl ring-4 ring-white/20">
                    <img src="images/logo_SI.png"
                         alt="Softgrowth Infotech Logo"
                         class="h-16 w-auto object-contain" />
                </div>

                <!-- Header Text -->
                <div class="text-center sm:text-left flex-1">
                    <h1 class="text-2xl sm:text-3xl font-bold tracking-tight drop-shadow-sm">
                        Register Institution
                    </h1>
                    <p class="text-orange-50 text-sm mt-1 font-medium">
                        Create your institution profile and Super Admin account to get started.
                    </p>
                </div>

                <!-- Small brand badge -->
                <div class="hidden lg:flex items-center gap-2 bg-white/15 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2">
                    <i class="fas fa-shield-alt text-sm"></i>
                    <span class="text-xs font-semibold tracking-wide">Secure Registration</span>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <form id="institutionForm" class="p-6 sm:p-8 space-y-8" novalidate>

            <!-- ===== SECTION 1: INSTITUTION DETAILS ===== -->
            <div>
                <div class="bg-orange-50 border-l-4 border-orange-500 rounded-r-lg px-4 py-3 mb-6 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-600 flex items-center justify-center text-white shadow-md">
                        <i class="fas fa-university text-lg"></i>
                    </div>
                    <h2 class="text-lg sm:text-xl font-bold text-gray-800">Institution Details</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- College / School Name -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            College / School Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-university absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="text" id="org_name" placeholder="Enter college / school name"
                                   class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-collegeName">College / School Name is required.</p>
                    </div>

                    <!-- AFF. No. -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            AFF. No. <span class="text-gray-400 text-xs font-normal">(Optional)</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-file-signature absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="text" id="affiliation_no" placeholder="Enter affiliation number"
                                   class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                    </div>

                    <!-- Phone No. -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Phone No. <span class="text-red-500">*</span>
                        </label>
                        <div class="flex">
                            <div class="relative">
                                <select class="appearance-none h-full pl-3 pr-8 py-3 rounded-l-xl border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm font-medium outline-none cursor-pointer focus:border-orange-500 transition-colors">
                                    <option>🇮🇳 +91</option>
                                    <option>🇺🇸 +1</option>
                                    <option>🇬🇧 +44</option>
                                    <option>🇦🇪 +971</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
                            </div>
                            <input type="tel" id="mobile" placeholder="Enter 10 digit phone number" maxlength="10"
                                   class="input-focus flex-1 pl-4 pr-4 py-3 rounded-r-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-phoneNo">Please enter a valid 10-digit phone number.</p>
                    </div>

                    <!-- Email ID -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Email ID <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="email" id="email" placeholder="Enter email address"
                                   class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-emailId">Please enter a valid email address.</p>
                    </div>

                    <!-- Website -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Website <span class="text-gray-400 text-xs font-normal">(Optional)</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-globe absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="url" id="website" placeholder="https://www.example.com"
                                   class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-website">Please enter a valid URL.</p>
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-3.5 top-4 text-gray-400 z-10"></i>
                            <textarea id="address" rows="2" placeholder="Enter complete address"
                                      class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200 resize-none"></textarea>
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-address">Address is required.</p>
                    </div>

                    <!-- Institution Logo -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Institution Logo <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div id="dropZone"
                                 class="upload-area border-2 border-dashed border-gray-300 rounded-xl bg-white p-2 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-300 min-h-[160px]">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                <p class="text-sm font-medium text-gray-600">Drag & drop logo here</p>
                                <p class="text-xs text-gray-400 my-1">or</p>
                                <button type="button" onclick="document.getElementById('logoInput').click()"
                                        class="text-sm font-semibold text-orange-500 border border-orange-500 rounded-lg px-4 py-1.5 hover:bg-orange-600 hover:text-white transition-all duration-200">
                                    Browse Logo
                                </button>
                                <input type="file" id="logoInput" accept=".png,.jpg,.jpeg" class="hidden" />
                            </div>

                            <!-- PREVIEW CONTAINER -->
                            <div class="border border-gray-200 rounded-xl bg-gray-50 p-4 flex flex-col items-center justify-center text-center min-h-[160px]">
                                <div id="logoPreviewContainer" class="hidden flex flex-col items-center justify-center">
                                    <img id="logoPreview" src="#" alt="Logo Preview" class="h-28 w-28 object-contain rounded-lg shadow-sm bg-white p-1 mb-1" />
                                    <p class="text-xs text-green-600 font-medium truncate max-w-[200px]" id="logoFileName">logo.png</p>
                                    <button type="button" onclick="removeLogo()" class="text-xs text-red-500 hover:underline mt-0.5">Remove</button>
                                </div>
                                <div id="logoPlaceholder">
                                    <i class="fas fa-image text-4xl text-gray-300 mb-2"></i>
                                    <p class="text-sm text-gray-500 font-medium">No logo selected</p>
                                    <p class="text-xs text-gray-400">Upload institution logo</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">Supported formats: PNG, JPG, JPEG | Max size: 2 MB | Recommended: Square image (1:1)</p>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-logo">Please upload an institution logo (PNG/JPG, max 2MB).</p>
                    </div>

                </div>
            </div>

            <!-- ===== SECTION 2: SUPER ADMIN LOGIN DETAILS ===== -->
            <div>
                <div class="bg-blue-50 border-l-4 border-blue-500 rounded-r-lg px-4 py-3 mb-6 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-500 flex items-center justify-center text-white shadow-md">
                        <i class="fas fa-user-shield text-lg"></i>
                    </div>
                    <h2 class="text-lg sm:text-xl font-bold text-gray-800">Super Admin Login Details</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Username <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="text" id="username" placeholder="Enter username"
                                   class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                        <p class="text-xs text-gray-500 mt-1">e.g., admin_college or principal_office (alphanumeric and underscores only)</p>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-username">Username is required.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="password" id="password" placeholder="Enter password"
                                   class="input-focus w-full pl-11 pr-11 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                            <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer hover:text-orange-500 transition-colors" onclick="togglePassword('password', this)"></i>
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-password">Password does not meet the requirements.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="password" id="password_confirmation" placeholder="Re-enter password"
                                   class="input-focus w-full pl-11 pr-11 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                            <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer hover:text-orange-500 transition-colors" onclick="togglePassword('password_confirmation', this)"></i>
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-confirmPassword">Passwords do not match.</p>
                    </div>

                    <!-- Password Requirements -->
                    <div class="md:col-span-2">
                        <ul class="space-y-1.5 text-sm text-gray-600">
                            <li class="flex items-center gap-2" id="req-length">
                                <i class="fas fa-check-circle text-gray-300"></i>
                                <span>Minimum 8 characters</span>
                            </li>
                            <li class="flex items-center gap-2" id="req-upper">
                                <i class="fas fa-check-circle text-gray-300"></i>
                                <span>At least 1 uppercase character</span>
                            </li>
                            <li class="flex items-center gap-2" id="req-lower">
                                <i class="fas fa-check-circle text-gray-300"></i>
                                <span>At least 1 lowercase character</span>
                            </li>
                            <li class="flex items-center gap-2" id="req-number">
                                <i class="fas fa-check-circle text-gray-300"></i>
                                <span>At least 1 number</span>
                            </li>
                            <li class="flex items-center gap-2" id="req-special">
                                <i class="fas fa-check-circle text-gray-300"></i>
                                <span>At least 1 special character</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- TERMS & SUBMIT -->
            <div class="pt-4 border-t border-gray-200">
                <label class="flex items-start gap-3 cursor-pointer mb-4">
                    <input type="checkbox" id="terms_accepted" class="mt-1 accent-orange-500 w-4 h-4 rounded" />
                    <span class="text-sm text-gray-600">
                        I agree to the
                        <a href="#" class="text-blue-600 hover:underline font-medium">Terms & Conditions</a>
                        and
                        <a href="#" class="text-blue-600 hover:underline font-medium">Privacy Policy</a>.
                    </span>
                </label>
                <p class="text-red-500 text-xs -mt-2 mb-4 hidden" id="error-terms">You must agree to the Terms & Conditions.</p>

                <div class="flex flex-col sm:flex-row justify-end gap-3">
                    <button type="button"
                            class="px-6 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-8 py-3 rounded-xl bg-orange-600 text-white font-bold shadow-md hover:bg-orange-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fas fa-check-circle"></i>
                        Register Institution
                    </button>
                </div>
            </div>

        </form>
    </div>

    <!-- SUCCESS TOAST -->
    <div id="successToast"
         class="fixed top-5 left-1/2 -translate-x-1/2 bg-green-600 text-white px-6 py-3 rounded-xl shadow-2xl hidden z-50 flex items-center gap-2">
        <i class="fas fa-check-circle text-lg"></i>
        <span>Institution registered successfully! Redirecting to login...</span>
    </div>

    <!-- Include your url.js file first -->
    <script src="url.js"></script>

    <script>
        // PASSWORD TOGGLE
        function togglePassword(id, icon) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }

        // LOGO UPLOAD & PREVIEW WITH SIZE VALIDATION (Max 2MB)
        const dropZone = document.getElementById('dropZone');
        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');
        const logoPreviewContainer = document.getElementById('logoPreviewContainer');
        const logoPlaceholder = document.getElementById('logoPlaceholder');
        const logoFileName = document.getElementById('logoFileName');

        dropZone.addEventListener('click', () => logoInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-orange-500', 'bg-orange-50');
        });
        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-orange-500', 'bg-orange-50');
        });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-orange-500', 'bg-orange-50');
            const file = e.dataTransfer.files[0];
            if (file) handleLogoFile(file);
        });

        logoInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) handleLogoFile(file);
        });

        function handleLogoFile(file) {
            const validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            const errorLogo = document.getElementById('error-logo');

            if (!validTypes.includes(file.type)) {
                errorLogo.textContent = 'Please upload a valid PNG, JPG, or JPEG image.';
                errorLogo.classList.remove('hidden');
                return;
            }
            if (file.size > 2 * 1024 * 1024) {
                errorLogo.textContent = 'Institution logo must not exceed 2 MB.';
                errorLogo.classList.remove('hidden');
                return;
            }

            errorLogo.classList.add('hidden');
            const reader = new FileReader();
            reader.onload = (e) => {
                logoPreview.src = e.target.result;
                logoFileName.textContent = file.name;
                logoPreviewContainer.classList.remove('hidden');
                logoPlaceholder.classList.add('hidden');
                dropZone.classList.remove('border-red-500', 'bg-red-50');
            };
            reader.readAsDataURL(file);
        }

        function removeLogo() {
            logoInput.value = '';
            logoPreview.src = '#';
            logoPreviewContainer.classList.add('hidden');
            logoPlaceholder.classList.remove('hidden');
        }

        // PASSWORD REQUIREMENTS LIVE VALIDATION
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('password_confirmation');

        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;
            updateReq('req-length', val.length >= 8);
            updateReq('req-upper', /[A-Z]/.test(val));
            updateReq('req-lower', /[a-z]/.test(val));
            updateReq('req-number', /[0-9]/.test(val));
            updateReq('req-special', /[^A-Za-z0-9]/.test(val));
        });

        function updateReq(id, isValid) {
            const el = document.getElementById(id);
            const icon = el.querySelector('i');
            if (isValid) {
                el.classList.add('check-valid');
                el.classList.remove('check-invalid');
                icon.classList.remove('text-gray-300');
            } else {
                el.classList.remove('check-valid');
                el.classList.add('check-invalid');
                icon.classList.add('text-gray-300');
            }
        }

        // FORM SUBMIT & API INTEGRATION
        document.getElementById('institutionForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            let isValid = true;

            function showError(fieldId, errorElementId, message, show) {
                const el = document.getElementById(errorElementId);
                const input = document.getElementById(fieldId);
                if (show) {
                    if (message && el) el.textContent = message;
                    if (el) el.classList.remove('hidden');
                    if (input) input.classList.add('border-red-500', 'bg-red-50');
                    isValid = false;
                } else {
                    if (el) el.classList.add('hidden');
                    if (input) input.classList.remove('border-red-500', 'bg-red-50');
                }
            }

            // Quick Frontend Validations
            const orgNameVal = document.getElementById('org_name').value.trim();
            showError('org_name', 'error-collegeName', 'College / School Name is required.', orgNameVal === '');

            const mobileVal = document.getElementById('mobile').value.trim();
            showError('mobile', 'error-phoneNo', 'Please enter a valid 10-digit phone number starting with 6-9.', !/^[6-9]\d{9}$/.test(mobileVal));

            const emailVal = document.getElementById('email').value.trim();
            showError('email', 'error-emailId', 'Please enter a valid email address.', !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal));

            const website = document.getElementById('website').value.trim();
            showError('website', 'error-website', 'Please enter a valid URL.', website !== '' && !/^https?:\/\/.+/.test(website));

            const addressVal = document.getElementById('address').value.trim();
            showError('address', 'error-address', 'Address is required.', addressVal === '');

            const logoUploaded = logoInput.files.length > 0;
            showError('logoInput', 'error-logo', 'Please upload an institution logo (PNG/JPG, max 2MB).', !logoUploaded);

            const usernameVal = document.getElementById('username').value.trim();
            showError('username', 'error-username', 'Username is required.', usernameVal === '');

            const password = passwordInput.value;
            const passValid = password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password) && /[^A-Za-z0-9]/.test(password);
            showError('password', 'error-password', 'Password does not meet the requirements.', !passValid);

            const confirm = confirmInput.value;
            showError('password_confirmation', 'error-confirmPassword', 'Passwords do not match.', confirm !== password || confirm === '');

            const termsChecked = document.getElementById('terms_accepted').checked;
            showError('terms_accepted', 'error-terms', 'You must agree to the Terms & Conditions.', !termsChecked);

            if (!isValid) {
                const firstError = document.querySelector('.text-red-500.text-xs:not(.hidden)');
                if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Construct FormData payload
            const formData = new FormData();
            formData.append('org_name', orgNameVal);
            formData.append('affiliation_no', document.getElementById('affiliation_no').value.trim());
            formData.append('mobile', mobileVal);
            formData.append('email', emailVal);
            formData.append('website', website);
            formData.append('address', addressVal);
            if (logoInput.files[0]) {
                formData.append('logo', logoInput.files[0]);
            }
            formData.append('username', usernameVal);
            formData.append('password', password);
            formData.append('password_confirmation', confirm);
            formData.append('terms_accepted', termsChecked ? '1' : '');

            try {
                const response = await fetch(url + 'setup/register', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                // Improved handling: Check if response is JSON to prevent syntax errors
                const contentType = response.headers.get("content-type");
                let data;
                if (contentType && contentType.includes("application/json")) {
                    data = await response.json();
                } else {
                    const rawText = await response.text();
                    console.error("Server response was not JSON:", rawText);
                    throw new Error("Server returned non-JSON response (Check backend errors or path).");
                }

                if (response.ok) {
                    // Lock registration from re-opening using browser localStorage (can be re-enabled later)
                    localStorage.setItem('institution_registered', 'true');

                    // Show Success Toast and Redirect to Login Page
                    const toast = document.getElementById('successToast');
                    toast.classList.remove('hidden');

                    setTimeout(() => {
                        window.location.href = 'login.php'; 
                    }, 2000);

                } else if (response.status === 422) {
                    const errors = data.errors;
                    if (errors.org_name) showError('org_name', 'error-collegeName', errors.org_name[0], true);
                    if (errors.affiliation_no) showError('affiliation_no', 'error-affiliationNo', errors.affiliation_no[0], true);
                    if (errors.mobile) showError('mobile', 'error-phoneNo', errors.mobile[0], true);
                    if (errors.email) showError('email', 'error-emailId', errors.email[0], true);
                    if (errors.website) showError('website', 'error-website', errors.website[0], true);
                    if (errors.address) showError('address', 'error-address', errors.address[0], true);
                    if (errors.logo) showError('logoInput', 'error-logo', errors.logo[0], true);
                    if (errors.username) showError('username', 'error-username', errors.username[0], true);
                    if (errors.password) showError('password', 'error-password', errors.password[0], true);
                    if (errors.terms_accepted) showError('terms_accepted', 'error-terms', errors.terms_accepted[0], true);

                    const firstError = document.querySelector('.text-red-500.text-xs:not(.hidden)');
                    if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else {
                    alert(data.message || 'Something went wrong during registration.');
                }

            } catch (error) {
                console.error('API Error:', error);
                alert('Unable to connect to the server or parse response. Check your network, console logs, or API endpoint.');
            }
        });

        // CLEAR ERRORS ON INPUT TYPING
        ['org_name', 'affiliation_no', 'mobile', 'email', 'website', 'address', 'username', 'password', 'password_confirmation'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', () => {
                    const errorMap = {
                        'org_name': 'error-collegeName',
                        'mobile': 'error-phoneNo',
                        'email': 'error-emailId',
                        'website': 'error-website',
                        'address': 'error-address',
                        'username': 'error-username',
                        'password': 'error-password',
                        'password_confirmation': 'error-confirmPassword'
                    };
                    const errId = errorMap[id];
                    if (errId) {
                        document.getElementById(errId).classList.add('hidden');
                    }
                    el.classList.remove('border-red-500', 'bg-red-50');
                });
            }
        });

        document.getElementById('terms_accepted').addEventListener('change', function() {
            document.getElementById('error-terms').classList.add('hidden');
        });
    </script>
</body>
</html>