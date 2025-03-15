<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>PlayStation Rental Booking</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/now-ui-kit.css?v=1.3.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />

    <!-- Add Flatpickr for better date picking -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Additional CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <style>
        .game-card {
            background: linear-gradient(45deg, #1a1f71, #2d44a9);
            border: none;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .game-card .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }

        .game-card .card-body {
            color: #fff;
        }

        .console-option {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .console-option:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
        }

        .console-option.selected {
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid #00f2c3;
        }

        .price-tag {
            background: #00f2c3;
            color: #1a1f71;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
        }

        .price-summary {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }

        .hero-section {
            background: linear-gradient(45deg, #1a1f71, #2d44a9);
            padding: 150px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .floating-controller {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero-section {
                padding: 100px 0 50px;
                text-align: center;
            }

            .hero-section .display-3 {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }

            .hero-section .lead {
                font-size: 1.1rem;
            }

            .hero-section .btn {
                margin-bottom: 2rem;
            }

            .game-card {
                margin: 0 10px;
                padding: 15px;
            }

            .console-option {
                padding: 15px 10px;
                margin-bottom: 10px;
            }

            .price-tag {
                font-size: 0.9rem;
                padding: 3px 10px;
                display: inline-block;
                margin-top: 10px;
            }

            .btn-lg {
                padding: 0.75rem 1.5rem;
                font-size: 1rem;
            }
        }


        /* Small Mobile Devices */
        @media (max-width: 480px) {
            .hero-section .display-3 {
                font-size: 2rem;
            }

            .console-options .row {
                margin: 0 -5px;
            }

            .col-md-6 {
                padding: 0 5px;
            }
        }

        /* Add smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Animation for booking section */
        .section-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }

        .section-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="landing-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/">
                    PlayStation Rental System
                </a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 animate__animated animate__fadeInLeft">
                        <h1 class="display-3 text-white">Game On!</h1>
                        <p class="lead text-white">Experience next-gen gaming with our premium PlayStation rental
                            service.</p>
                        <a href="#booking" class="btn btn-primary btn-lg btn-round">Book Now</a>
                    </div>
                    <div class="col-12 col-md-6 text-center animate__animated animate__fadeInRight d-none d-md-block">
                        <i class="fas fa-gamepad fa-8x text-white opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-animate" id="booking">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="card game-card">
                            <div class="card-header">
                                <h4 class="card-title mb-0"><i class="fas fa-gamepad mr-2"></i>Book Your Gaming Session
                                </h4>
                            </div>
                            <div class="card-body">
                                <form id="bookingForm">
                                    <!-- Console Selection -->
                                    <div class="console-options">
                                        <label class="d-block mb-3">Select Your Console</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="console-option" data-console="ps4">
                                                    <h5><i class="fas fa-gamepad mr-2"></i>PlayStation 4</h5>
                                                    <span class="price-tag">Rp 30.000/session</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="console-option" data-console="ps5">
                                                    <h5><i class="fas fa-gamepad mr-2"></i>PlayStation 5</h5>
                                                    <span class="price-tag">Rp 40.000/session</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Date Selection -->
                                    <div class="mt-4">
                                        <label>Select Date</label>
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="bookingDate"
                                                    placeholder="Select booking date">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Price Summary -->
                                    <div class="price-summary mt-4">
                                        <h5 class="mb-3">Price Summary</h5>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Base Price:</span>
                                            <span id="basePrice">Rp 0</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Weekend Charge:</span>
                                            <span id="weekendCharge">Rp 0</span>
                                        </div>
                                        <div class="d-flex justify-content-between font-weight-bold">
                                            <span>Total:</span>
                                            <span id="totalPrice" class="text-primary">Rp 0</span>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mt-4">
                                        <i class="fas fa-shopping-cart mr-2"></i>Proceed to Payment
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-default">
            <div class="container">
                <div class="copyright" id="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    PlayStation Rental System
                </div>
            </div>
        </footer>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/now-ui-kit.js?v=1.3.0') }}" type="text/javascript"></script>

    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Enhanced Booking Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scroll functionality
            document.querySelector('a[href="#booking"]').addEventListener('click', function(e) {
                e.preventDefault();
                const bookingSection = document.querySelector('#booking');
                bookingSection.scrollIntoView({
                    behavior: 'smooth'
                });
            });

            // Add scroll animation for booking section
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            observer.observe(document.querySelector('.section-animate'));

            // Console selection
            const consoleOptions = document.querySelectorAll('.console-option');
            consoleOptions.forEach(option => {
                option.addEventListener('click', function() {
                    consoleOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                    calculatePrice();
                });
            });

            // Initialize flatpickr with custom styling
            flatpickr("#bookingDate", {
                enableTime: false,
                dateFormat: "Y-m-d",
                minDate: "today",
                theme: "dark"
            });

            let data_console = [];
            let data_date = [];
            let data_basePrice = [];
            let data_weekendCharge = [];
            let data_totalPrice = [];

            // Price calculation
            function calculatePrice() {
                const selectedConsole = document.querySelector('.console-option.selected');
                const bookingDate = document.getElementById('bookingDate').value;

                if (!selectedConsole || !bookingDate) return;

                let basePrice = selectedConsole.getAttribute('data-console') === 'ps4' ? 30000 : 40000;
                let weekendCharge = 0;

                const date = new Date(bookingDate);
                const isWeekend = date.getDay() === 0 || date.getDay() === 6;
                if (isWeekend) {
                    weekendCharge = 50000;
                }

                const totalPrice = basePrice + weekendCharge;

                document.getElementById('basePrice').textContent = `Rp ${basePrice.toLocaleString()}`;

                document.getElementById('weekendCharge').textContent = `Rp ${weekendCharge.toLocaleString()}`;
                document.getElementById('totalPrice').textContent = `Rp ${totalPrice.toLocaleString()}`;


                data_console = selectedConsole.getAttribute('data-console');
                data_date = bookingDate;
                data_basePrice = basePrice;
                data_weekendCharge = weekendCharge;
                data_totalPrice = totalPrice;



            }

            document.getElementById('bookingDate').addEventListener('change', calculatePrice);

            // Handle form submission
            document.getElementById('bookingForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                // Here you'll add the Midtrans integration
                alert('Proceeding to payment gateway...');


                let response = await axios.post('{{ route('createTransaction') }}', {
                    console: data_console,
                    date: data_date,
                    basePrice: data_basePrice,
                    weekendCharge: data_weekendCharge,
                    totalPrice: data_totalPrice
                }).then(function(response) {
                    window.open(response.data.redirect_url, '_blank');

                }).then(function(error) {
                    console.log(error);
                })


            });
        });
    </script>
</body>

</html>
