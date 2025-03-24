<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
        }

        .header-blue {
            background-color: #1A2F5D;
        }

        .active-tab-blue {
            color: #1A2F5D;
            border-color: #1A2F5D;
        }

        .inactive-tab {
            color: #6B7280;
            border-color: transparent;
        }

        .approved-green {
            background-color: #EBFAEF;
            color: #28A745;
        }

        .visa-holder-blue {
            color: #1A72C9;
        }

        .card-bg {
            background-color: #F7F8FA;
        }

        .rtl-text {
            direction: rtl;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
        
    </style>
</head>

<body>
    <div class="max-w-md mx-auto bg-[#F7F8FA] shadow h-screen">
        <!-- Header -->
        <div class="header-blue text-white px-4 py-3 flex items-center">
            <button class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <h1 class="text-base font-medium">Visa Details</h1>
        </div>

        <!-- Tabs -->
        <div class="flex border-b border-gray-200">
            <button id="details-tab" onclick="switchTab('details')"
                class="flex-1 py-3 px-4 text-sm font-medium active-tab-blue border-b-2 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                Details
            </button>
            <button id="qr-tab" onclick="switchTab('qr')"
                class="flex-1 py-3 px-4 text-sm font-medium inactive-tab border-b-2 border-transparent flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="7" y1="7" x2="7" y2="7"></line>
                    <line x1="17" y1="7" x2="17" y2="7"></line>
                    <line x1="7" y1="12" x2="7" y2="12"></line>
                    <line x1="17" y1="12" x2="17" y2="12"></line>
                    <line x1="7" y1="17" x2="7" y2="17"></line>
                    <line x1="17" y1="17" x2="17" y2="17"></line>
                </svg>
                QR Code
            </button>
        </div>

        <!-- Main Content -->
        <div class="p-4">
            <!-- Details Tab Content -->
            <div id="details-content" class="tab-content active">
                <!-- Visa Status Card -->
                <div class="card-bg rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="text-xs text-gray-500">Visa Number</div>
                            <div class="text-sm font-medium">{{ $evisaApps->visa_number }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-right text-gray-500">Visa Status</div>
                            <div class="approved-green px-3 py-1 rounded-full text-xs font-medium inline-block mt-1">
                                Approved</div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <div class="text-xs text-gray-500">Visa Type</div>
                                <div class="text-sm font-medium"></div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Visa Purpose</div>
                                <div class="text-sm font-medium"></div>
                            </div>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div>
                                <div class="text-xs text-gray-500">Place of Issue</div>
                                <div class="text-sm font-medium rtl-text"></div>
                            </div>
                            <div class="text-right">
                                <div class="text-xs text-gray-500">Date of Issue</div>
                                <div class="text-sm font-medium">{{ $evisaApps->issue_date }}</div>
                            </div>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div></div>
                            <div class="text-right">
                                <div class="text-xs text-gray-500">Date of Expiry</div>
                                <div class="text-sm font-medium">{{ $evisaApps->expiry_date }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visa Holder Details -->
                <div>
                    <div class="visa-holder-blue text-sm font-medium mb-4">Visa Holder Details</div>

                    <div class="divide-y divide-gray-200">
                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Full Name</div>
                            <div class="text-sm font-medium">{{ $evisaApps->full_name_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">MOI Reference</div>
                            <div class="text-sm font-medium">{{ $evisaApps->moi_reference }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Occupation</div>
                            <div class="text-sm font-medium">{{ $evisaApps->occupation_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Nationality</div>
                            <div class="text-sm font-medium uppercase">{{ $evisaApps->nationality_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Gender</div>
                            <div class="text-sm font-medium">{{ $evisaApps->gender }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Passport No</div>
                            <div class="text-sm font-medium">{{ $evisaApps->passport_no }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Passport Type</div>
                            <div class="text-sm font-medium"></div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Date of Birth</div>
                            <div class="text-sm font-medium">{{ $evisaApps->dob }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Place of Issue</div>
                            <div class="text-sm font-medium rtl-text"></div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Date of Expiry</div>
                            <div class="text-sm font-medium">{{ $evisaApps->passport_expiry_date }}</div>
                        </div>
                    </div>
                </div>



                <div>
                    <div class="visa-holder-blue text-sm font-medium mb-4">Employer / Family Breadwinner Details</div>

                    <div class="divide-y divide-gray-200">
                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Full Name</div>
                            <div class="text-sm font-medium">{{ $evisaApps->full_name_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">MOI Reference</div>
                            <div class="text-sm font-medium">{{ $evisaApps->moi_reference }}</div>
                        </div>

                       
                    </div>
                </div>
            </div>


            <!-- QR Code Tab Content -->
            <div id="qr-content" class="tab-content h-scree">
                <div class="flex flex-col items-center justify-center py-8">
                    <div class="text-center mb-6">
                        <p class="text-sm text-blue-500 font-bold">Scan this QR code to verify visa details</p>
                    </div>
                    <div class="w-80 h-80 flex items-center justify-center mb-6">
                        <!-- QR Code Placeholder with Thicker Border -->
                        <img src="data:image/png;base64,{{ $qrCode }}" alt="Visa QR Code" class="w-80 h-80">
                    </div>
                </div>
            </div>



            <!-- No Data State (Hidden by default) -->
            <div id="no-data" class="hidden text-center py-12">
                <p class="text-gray-600 text-sm">No data found</p>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Remove active class from all tabs
            document.getElementById('details-tab').classList.remove('active-tab-blue');
            document.getElementById('qr-tab').classList.remove('active-tab-blue');

            document.getElementById('details-tab').classList.add('inactive-tab');
            document.getElementById('qr-tab').classList.add('inactive-tab');

            // Show selected tab content and activate the tab
            if (tabName === 'details') {
                document.getElementById('details-content').classList.add('active');
                document.getElementById('details-tab').classList.add('active-tab-blue');
                document.getElementById('details-tab').classList.remove('inactive-tab');
            } else if (tabName === 'qr') {
                document.getElementById('qr-content').classList.add('active');
                document.getElementById('qr-tab').classList.add('active-tab-blue');
                document.getElementById('qr-tab').classList.remove('inactive-tab');
            }
        }

        // Check if data exists and show appropriate content
        function checkData() {
            // This is a simplified version. In a real app, you would check for actual data
            const hasData = true; // Set to false to test the "No data found" state

            if (!hasData) {
                document.getElementById('details-content').classList.remove('active');
                document.getElementById('qr-content').classList.remove('active');
                document.getElementById('no-data').classList.remove('hidden');
            }
        }

        // Initialize the page
        window.onload = function() {
            checkData();
        };
    </script>
</body>

</html>
