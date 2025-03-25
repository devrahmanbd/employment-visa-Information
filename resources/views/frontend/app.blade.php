<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $setting['site_title'] ?? 'Employment Visa Information - Kuwait' }}</title>
    {{-- favicon --}}
    <link rel="icon" href="{{ asset($setting['favicon']) }}" type="image/x-icon" />

    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(() => console.log("Service Worker Registered"));
        }
    </script>

    {{-- Styles --}}
    @include('frontend.includes.styles')
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Prevent Text Selection */
        /* body {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        } */
    </style>
</head>

<body>
    <!-- Date Bar -->
    <div class="date-bar">
        <div class="container">
            <i class="fas fa-calendar-alt"></i> <span id="datetime"></span>
        </div>
    </div>
    <div class="title-container">
        <a href="{{ route('home') }}"><img src="{{ asset($setting['left_logo']) }}" alt="Left Image"></a>
        <div class="title-section">
            {{ $setting['site_title'] ?? 'Kuwait eVisa Information - Kuwait' }}
        </div>
        <a href="{{ route('home') }}"><img src="{{ asset($setting['right_logo']) }}" alt="Right Image"></a>
    </div>


    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="#">Home</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('about') }}"
                            class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="#">About
                            us</a></li>
                    <li class="nav-item">
                        <a href="{{ route('visa-information') }}"
                            class="nav-link {{ request()->routeIs(['visa-information', 'visa-inquiry', 'visa-email']) ? 'active' : '' }}"
                            href="#">Visa Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>

        <!-- Install Modal -->
        <div class="modal fade" id="installModal" tabindex="-1" aria-labelledby="installModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column align-items-center">
                        <p id="install-text" class="text-center" style="font-size: 1rem; color: #0000FF;">
                            The user must install <span style="font-weight: bold;color: #0000FF;">Kuwait Visa</span> app
                            before entering this website.
                        </p>
                        <button id="install-pwa-btn" class="btn btn-light mt-3"
                            style="border: 2px solid blue; background-color: transparent; font-weight: bold;">
                            Install
                            <img src="{{ asset('images/kuwaitappslogo-r.png') }}" width="40px" alt="kuwait app">
                            app
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-section">
                    <h3 class="fw-bold">Feature</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="{{ route('visa-information') }}">Visa Service</a></li>
                        <li><a href="{{ route('contact') }}">Contact us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-section">
                    <h3 class="fw-bold">Physical Location</h3>
                    <ul>
                        <li>{!! nl2br(e($setting['address'])) !!}</li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-section text-lg-end text-md-center">
                    <a href="{{ route('visa-email') }}" class="btn-email text-dark">
                        Email Us <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <hr class="footer-hr m-0" />
            <div class="social-icons">
                @php
                    $socialLinks = json_decode($setting['social_links'], true);
                @endphp
                <a href="{{ $socialLinks[0]['url'] }}"><img src="{{ asset('images/icons8-instagram-100.png') }}"
                        width="40px" alt="Instagram" class="social-img"></a>
                <a href="{{ $socialLinks[1]['url'] }}"><img src="{{ asset('images/icons8-x-50.png') }}" width="40px"
                        alt="X" class="social-img"></a>
                <a href="{{ $socialLinks[2]['url'] }}"><img src="{{ asset('images/icons8-youtube-48.png') }}"
                        width="40px" alt="YouTube" class="social-img"></a>
                <a href="{{ $socialLinks[3]['url'] }}"><img src="{{ asset('images/icons8-facebook-48.png') }}"
                        alt="Facebook" width="40px" class="social-img"></a>
            </div>
            <div class="copyright">
                All rights reserved to the Public Authority of Manpower ©
            </div>
        </div>
    </div>

    @include('frontend.includes.scripts')
    <script>
        function updateDateTime() {
            let now = new Date();


            let options = {
                timeZone: 'Asia/Kuwait',
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };

            let formattedDate = new Intl.DateTimeFormat('en-US', options).format(now);

            document.getElementById('datetime').innerHTML = formattedDate;
        }


        updateDateTime();


        setInterval(updateDateTime, 1000);
    </script>

    {{-- <script>
        document.addEventListener('copy', function(event) {
            event.preventDefault();
            alert('Copying content is disabled.');
        });

        document.addEventListener('cut', function(event) {
            event.preventDefault();
            alert('Cutting content is disabled.');
        });

        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && (event.key === 'c' || event.key === 'x')) {
                event.preventDefault();
                alert('Copy & Cut functions are disabled.');
            }
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let deferredPrompt;
            const installButton = document.getElementById("install-pwa-btn");
            const iosInstructions = document.getElementById("ios-instructions");
            const modal = new bootstrap.Modal(document.getElementById("installModal"));

            function isIos() {
                return /iPhone|iPad|iPod/.test(navigator.userAgent) && !window.MSStream;
            }

            function isInStandaloneMode() {
                return (window.navigator.standalone === true);
            }

            if (isIos() && !isInStandaloneMode()) {
                // iOS হলে Modal দেখান
                iosInstructions.style.display = "block";
                modal.show();
            }

            window.addEventListener("beforeinstallprompt", (e) => {
                e.preventDefault();
                deferredPrompt = e;
                installButton.style.display = "block"; // Android PWA Install Button দেখান
                modal.show();
            });

            installButton.addEventListener("click", () => {
                if (deferredPrompt) {
                    deferredPrompt.prompt();
                    deferredPrompt.userChoice.then(() => {
                        deferredPrompt = null;
                        modal.hide();
                    });
                }
            });
        });
    </script>
</body>

</html>
