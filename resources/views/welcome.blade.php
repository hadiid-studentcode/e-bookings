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

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('DATA_CLIENT_KEY') }}"></script>

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
            background: linear-gradient(rgba(26, 31, 113, 0.9), rgba(45, 68, 169, 0.9)),
                url('https://images.unsplash.com/photo-1592155931584-901ac15763e3') center/cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
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

        /* New Styles */
        .features-section {
            padding: 80px 0;
            background: url('{{ asset('assets/img/pattern-bg.png') }}') repeat;
        }

        .feature-box {
            padding: 30px;
            text-align: center;
            transition: transform 0.3s;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-box:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #1a1f71;
            margin-bottom: 20px;
        }

        .testimonials-section {
            padding: 80px 0;
            background: linear-gradient(45deg, #2d44a9, #1a1f71);
            color: white;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            margin: 15px;
        }

        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .how-it-works {
            padding: 80px 0;
            background: url('https://images.unsplash.com/photo-1550745165-9bc0b252726f') center/cover fixed;
            position: relative;
        }

        .how-it-works::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.95);
        }

        .step-box {
            text-align: center;
            padding: 20px;
        }

        .step-number {
            width: 40px;
            height: 40px;
            background: #1a1f71;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .cta-section {
            background: linear-gradient(rgba(26, 31, 113, 0.9), rgba(45, 68, 169, 0.9)),
                url('{{ asset('assets/img/gaming-bg.jpg') }}') center/cover;
            padding: 100px 0;
            color: white;
            text-align: center;
        }

        /* Payment Modal Styles */
        .payment-modal .modal-content {
            background: linear-gradient(45deg, #1a1f71, #2d44a9);
            color: white;
            border-radius: 15px;
        }

        .payment-modal .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .payment-modal .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .payment-modal .close {
            color: white;
        }

        #snap-container iframe {
            width: 100%;
            min-height: 500px;
            border: none;
            justify-content: center;
        }

        .console-image {
            max-width: 120px;
            margin-bottom: 15px;
            transition: transform 0.3s;
        }

        .console-option:hover .console-image {
            transform: scale(1.1);
        }

        .game-preview {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .testimonial-bg {
            background: url('https://images.unsplash.com/photo-1511512578047-dfb367046420') center/cover fixed;
        }

        .testimonial-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(26, 31, 113, 0.95), rgba(45, 68, 169, 0.95));
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
                    <div class="col-12 col-md-6 animate__animated animate__fadeInRight">
                        <img src="{{ asset('assets/img/ps5-console.png') }}" alt="PlayStation 5"
                            class="img-fluid floating-controller">
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="features-section">
            <div class="container">
                <h2 class="text-center mb-5">Why Choose Us?</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="feature-box">
                            <i class="fas fa-trophy feature-icon"></i>
                            <h4>Latest Consoles</h4>
                            <p>Access to the newest PlayStation consoles and games</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-box">
                            <i class="fas fa-clock feature-icon"></i>
                            <h4>Flexible Hours</h4>
                            <p>Book your gaming sessions at your convenience</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-box">
                            <i class="fas fa-shield-alt feature-icon"></i>
                            <h4>Safe & Clean</h4>
                            <p>Sanitized equipment and comfortable gaming environment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works -->
        <div class="how-it-works">
            <div class="container">
                <h2 class="text-center mb-5">How It Works</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="step-box">
                            <div class="step-number">1</div>
                            <h4>Choose Console</h4>
                            <p>Select your preferred PlayStation console</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="step-box">
                            <div class="step-number">2</div>
                            <h4>Pick Date</h4>
                            <p>Select your preferred gaming date</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="step-box">
                            <div class="step-number">3</div>
                            <h4>Play & Enjoy</h4>
                            <p>Come in and enjoy your gaming session</p>
                        </div>
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



        <!-- Testimonials Section -->
        <div class="testimonials-section">
            <div class="container">
                <h2 class="text-center mb-5">What Gamers Say</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="testimonial-card">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde" alt="User"
                                class="testimonial-avatar">
                            <h5>John Doe</h5>
                            <p>"Amazing gaming experience! Clean and professional setup."</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="testimonial-card">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="User"
                                class="testimonial-avatar">
                            <h5>Jane Smith</h5>
                            <p>"Best place to enjoy PS5 games with friends!"</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="testimonial-card">
                            <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61" alt="User"
                                class="testimonial-avatar">
                            <h5>Mike Johnson</h5>
                            <p>"Affordable prices and great game selection."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <div class="container">
                <h2 class="mb-4">Ready to Start Gaming?</h2>
                <p class="lead mb-4">Book your session now and experience next-gen gaming!</p>
                <a href="#booking" class="btn btn-primary btn-lg btn-round">Book Your Session</a>
            </div>
        </div>

        <div class="modal fade payment-modal" id="paymentModal" tabindex="-1" role="dialog"
            aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">
                            <i class="fas fa-credit-card mr-2"></i>Complete Your Payment
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="snap-container"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

                // Show loading state
                $('#paymentModal').modal('show');

                try {
                    let response = await axios.post('{{ route('createTransaction') }}', {
                        console: data_console,
                        date: data_date,
                        basePrice: data_basePrice,
                        weekendCharge: data_weekendCharge,
                        totalPrice: data_totalPrice
                    });

                    window.snap.pay(response.data.token, {
                        onSuccess: function(result) {
                            Swal.fire({
                                title: 'Payment Successful!',
                                text: 'Thank you for your payment. Your booking has been confirmed.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });

                            $('#paymentModal').modal('hide');
                           
                             
                         
                        },
                        onPending: function(result) {
                            Swal.fire({
                                title: 'Payment Pending!',
                                text: 'Your payment is pending. Please complete the payment to confirm your booking.',
                                icon: 'info',
                                confirmButtonText: 'OK'
                            });
                        
                        },
                        onError: function(result) {
                            Swal.fire({
                                title: 'Payment Failed!',
                                text: 'An error occurred during the payment process. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        
                        },
                        onClose: function() {
                            Swal.fire({
                                title: 'Payment Cancelled',
                                text: 'You have cancelled the payment process.',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });
                            $('#paymentModal').modal('hide');
                        }
                    });

                } catch (error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while processing your payment. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    $('#paymentModal').modal('hide');
                }
            });
        });
    </script>
</body>

</html>
