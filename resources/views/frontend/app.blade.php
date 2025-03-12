<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employment Visa Information - Kuwait</title>
    @include('frontend.includes.styles')

</head>

<body>
    <!-- Date Bar -->
    <div class="date-bar">
        <div class="container">
            <i class="fas fa-calendar-alt"></i> <span id="datetime"></span>
        </div>
    </div>
    <div class="container">


        <!-- Header -->
        <div class="header d-flex justify-content-between align-items-center flex-wrap py-3">
            <div class="col-12 col-md-3 text-center text-md-start mb-2 mb-md-0">
                <img src="{{ asset('/images') }}/logo-left.png" alt="Kuwait Logo" class="kuwait-logo img-fluid" />
            </div>
            <div class="col-12 col-md-6 text-center mb-2 mb-md-0">
                <h1 class="fs-2 fs-md-3 mb-0">Employment Visa Information - Kuwait</h1>
            </div>
            <div class="col-12 col-md-3 text-center text-md-end">
                <img src="{{ asset('/images') }}/logo-right.png" alt="Public Authority of Manpower Logo"
                    class="manpower-logo img-fluid" />
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="nav-menu py-2">
        <div class="container">
            <ul class="row p-0 m-0 list-unstyled">
                <li class="col-6 col-md-3 text-center m-0">
                    <a href="#" class="d-block text-white text-decoration-none fw-bold"><span
                            class="nav-link">Home</span></a>
                </li>
                <li class="col-6 col-md-3 text-center m-0">
                    <a href="#" class="d-block text-white text-decoration-none fw-bold"><span
                            class="nav-link">About us</span></a>
                </li>
                <li class="col-6 col-md-3 text-center m-0">
                    <a href="#" class="d-block text-white text-decoration-none fw-bold"><span
                            class="nav-link">Information of Visa</span></a>
                </li>
                <li class="col-6 col-md-3 text-center m-0">
                    <a href="#" class="d-block text-white text-decoration-none fw-bold"><span
                            class="nav-link">Contact us</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-section">
                    <h3>Feature</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Information of Visa</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-section">
                    <h3>Physical Location</h3>
                    <ul>
                        <li>Public Authority of Manpower</li>
                        <li>PO Box# 13025</li>
                        <li>Ibrahim Husain Al Ma'rafi Street</li>
                        <li>Jabriya, Kuwait</li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-section text-lg-end text-md-center">
                    <button class="btn-email">
                        Email Us <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <hr class="footer-hr" />
            <div class="social-icons">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
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
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let ampm = hours >= 12 ? 'PM' : 'AM';

            hours = hours % 12;
            hours = hours ? hours : 12; // 0 হলে 12 হবে
            minutes = minutes < 10 ? '0' + minutes : minutes;

            let formattedDate = now.getFullYear() + '/' +
                ('0' + (now.getMonth() + 1)).slice(-2) + '/' +
                ('0' + now.getDate()).slice(-2) + ' - ' +
                hours + ':' + minutes + ' ' + ampm;

            document.getElementById('datetime').innerHTML = formattedDate;
        }

        updateDateTime();
        setInterval(updateDateTime, 60000);
    </script>
</body>

</html>
