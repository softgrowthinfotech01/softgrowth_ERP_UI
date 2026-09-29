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
</head>

<body class="bg-gray-100 min-h-screen py-6 px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <!-- ===== PROFESSIONAL HEADER ===== -->
        <div class="bg-gradient-to-r from-[#ea580c] to-[#f97316] px-6 sm:px-8 py-5 text-white relative overflow-hidden">
            <!-- Decorative subtle pattern -->
            <div class="absolute inset-0 bg-[radial-gradient(rgba(255,255,255,0.08)_1px,transparent_1px)] bg-[length:18px_18px]"></div>
            <div class="absolute -top-16 -right-16 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>

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
                <!-- <div class="hidden lg:flex items-center gap-2 bg-white/15 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2">
                    <i class="fas fa-shield-alt text-sm"></i>
                    <span class="text-xs font-semibold tracking-wide">Secure Registration</span>
                </div> -->
            </div>
        </div>

        <!-- FORM -->
        <form id="institutionForm" class="p-6 sm:p-8 space-y-8" novalidate>

            <!-- ===== SECTION 1: INSTITUTION DETAILS ===== -->
            <div>
                <div class="bg-orange-50 border-l-4 border-orange-500 rounded-r-lg px-4 py-3 mb-6 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-500 flex items-center justify-center text-white shadow-md">
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
                            <input type="text" id="collegeName" placeholder="Enter college / school name"
                                   class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-collegeName">College / School Name is required.</p>
                    </div>

                    <!-- Registration No. -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Registration No. <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-file-alt absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="text" id="registrationNo" placeholder="Enter registration number"
                                   class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-registrationNo">Registration No. is required.</p>
                    </div>

                    <!-- AFF. No. -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            AFF. No. <span class="text-gray-400 text-xs font-normal">(Optional)</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-file-signature absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                            <input type="text" id="affNo" placeholder="Enter affiliation number"
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
                            <input type="tel" id="phoneNo" placeholder="Enter 10 digit phone number"
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
                            <input type="email" id="emailId" placeholder="Enter email address"
                                   class="input-focus w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                        </div>
                        <p class="text-red-500 text-xs mt-1 hidden" id="error-emailId">Please enter a valid email address.</p>
                    </div>

                    <!-- Website -->
                    <div class="md:col-span-2">
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
                                 class="upload-area border-2 border-dashed border-gray-300 rounded-xl bg-white p-6 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-300 min-h-[160px]">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                <p class="text-sm font-medium text-gray-600">Drag & drop logo here</p>
                                <p class="text-xs text-gray-400 my-1">or</p>
                                <button type="button" onclick="document.getElementById('logoInput').click()"
                                        class="text-sm font-semibold text-orange-500 border border-orange-500 rounded-lg px-4 py-1.5 hover:bg-orange-500 hover:text-white transition-all duration-200">
                                    Browse Logo
                                </button>
                                <input type="file" id="logoInput" accept=".png,.jpg,.jpeg" class="hidden" />
                            </div>

                            <div class="border border-gray-200 rounded-xl bg-gray-50 p-6 flex flex-col items-center justify-center text-center min-h-[160px]">
                                <div id="logoPreviewContainer" class="hidden">
                                    <img id="logoPreview" src="#" alt="Logo Preview" class="h-20 w-20 object-contain rounded-lg mx-auto mb-2" />
                                    <p class="text-xs text-green-600 font-medium" id="logoFileName">logo.png</p>
                                    <button type="button" onclick="removeLogo()" class="text-xs text-red-500 hover:underline mt-1">Remove</button>
                                </div>
                                <div id="logoPlaceholder">
                                    <i class="fas fa-image text-5xl text-gray-300 mb-3"></i>
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
                            <input type="password" id="confirmPassword" placeholder="Re-enter password"
                                   class="input-focus w-full pl-11 pr-11 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 placeholder:text-gray-400 outline-none transition-all duration-200" />
                            <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer hover:text-orange-500 transition-colors" onclick="togglePassword('confirmPassword', this)"></i>
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
                    <input type="checkbox" id="termsCheck" class="mt-1 accent-orange-500 w-4 h-4 rounded" />
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
                            class="px-8 py-3 rounded-xl bg-orange-500 text-white font-bold shadow-md hover:bg-orange-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
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
        <span>Institution registered successfully!</span>
    </div>

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

        // LOGO UPLOAD
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
            if (!validTypes.includes(file.type)) {
                alert('Please upload a PNG, JPG, or JPEG file.');
                return;
            }
            if (file.size > 2 * 1024 * 1024) {
                alert('File size must be less than 2MB.');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                logoPreview.src = e.target.result;
                logoFileName.textContent = file.name;
                logoPreviewContainer.classList.remove('hidden');
                logoPlaceholder.classList.add('hidden');
                document.getElementById('error-logo').classList.add('hidden');
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

        // PASSWORD REQUIREMENTS
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirmPassword');

        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;
            updateReq('req-length', val.length >= 8);
            updateReq('req-upper', /[A-Z]/.test(val));
            updateReq('req-lower', /[a-z]/.test(val));
            updateReq('req-number', /[0-9]/.test(val));
            updateReq('req-special', /[!@#$%^&*(),.?":{}|<>]/.test(val));
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

        // FORM SUBMIT
        document.getElementById('institutionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let isValid = true;

            function showError(id, show) {
                const el = document.getElementById('error-' + id);
                const input = document.getElementById(id);
                if (show) {
                    el.classList.remove('hidden');
                    if (input) input.classList.add('border-red-500', 'bg-red-50');
                    isValid = false;
                } else {
                    el.classList.add('hidden');
                    if (input) input.classList.remove('border-red-500', 'bg-red-50');
                }
            }

            showError('collegeName', document.getElementById('collegeName').value.trim() === '');
            showError('registrationNo', document.getElementById('registrationNo').value.trim() === '');
            showError('phoneNo', !/^\d{10}$/.test(document.getElementById('phoneNo').value.trim()));
            showError('emailId', !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById('emailId').value.trim()));

            const website = document.getElementById('website').value.trim();
            showError('website', website !== '' && !/^https?:\/\/.+\..+/.test(website));

            showError('address', document.getElementById('address').value.trim() === '');

            const logoUploaded = !logoPreviewContainer.classList.contains('hidden');
            showError('logo', !logoUploaded);

            showError('username', document.getElementById('username').value.trim() === '');

            const password = passwordInput.value;
            const passValid = password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password) && /[!@#$%^&*(),.?":{}|<>]/.test(password);
            showError('password', !passValid);

            const confirm = confirmInput.value;
            showError('confirmPassword', confirm !== password || confirm === '');

            showError('terms', !document.getElementById('termsCheck').checked);

            if (isValid) {
                const toast = document.getElementById('successToast');
                toast.classList.remove('hidden');
                setTimeout(() => {
                    toast.classList.add('hidden');
                    this.reset();
                    removeLogo();
                    document.querySelectorAll('#req-length, #req-upper, #req-lower, #req-number, #req-special').forEach(el => {
                        el.classList.remove('check-valid', 'check-invalid');
                        const icon = el.querySelector('i');
                        icon.className = 'fas fa-check-circle text-gray-300';
                    });
                    alert('Form submitted successfully! (Demo)');
                }, 2500);
            } else {
                const firstError = document.querySelector('.text-red-500.text-xs:not(.hidden)');
                if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });

        // CLEAR ERRORS ON INPUT
        ['collegeName', 'registrationNo', 'phoneNo', 'emailId', 'website', 'address', 'username', 'password', 'confirmPassword'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', () => {
                    document.getElementById('error-' + id).classList.add('hidden');
                    el.classList.remove('border-red-500', 'bg-red-50');
                });
            }
        });

        document.getElementById('termsCheck').addEventListener('change', function() {
            document.getElementById('error-terms').classList.add('hidden');
        });
    </script>
</body>
</html>