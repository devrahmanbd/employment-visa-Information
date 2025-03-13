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
    <div class="title-container">
        <img src="{{ asset('images/logo-left.png') }}" alt="Left Image">
        <div class="title-section">
            Employment Visa Information - Kuwait
        </div>
        <img src="{{ asset('images/logo-right.png') }}" alt="Right Image">
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
                        <a href="{{ route('visa-information') }}" class="nav-link {{ request()->routeIs('visa-information') ? 'active' : '' }}" href="#">Information of Visa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact us</a>
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
                <a href="#"><img src="Images/icons8-instagram-100.png" width="40px" alt="Instagram"
                        class="social-img"></a>
                <a href="#"><img src="Images/icons8-x-50.png" width="40px" alt="X"
                        class="social-img"></a>
                <a href="#"><img src="Images/icons8-youtube-48.png" width="40px" alt="YouTube"
                        class="social-img"></a>
                <a href="#"><img src="Images/icons8-facebook-48.png" alt="Facebook" width="40px"
                        class="social-img"></a>
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
            let seconds = now.getSeconds();
            let ampm = hours >= 12 ? 'PM' : 'AM';

            hours = hours % 12;
            hours = hours ? hours : 12;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            let formattedDate = now.getFullYear() + '/' +
                ('0' + (now.getMonth() + 1)).slice(-2) + '/' +
                ('0' + now.getDate()).slice(-2) + ' - ' +
                hours + ':' + minutes + ':' + seconds + ' ' + ampm;

            document.getElementById('datetime').innerHTML = formattedDate;
        }

        // First call to display the time immediately
        updateDateTime();

        // Update every second
        setInterval(updateDateTime, 1000);
    </script>
</body>

</html>
