@extends('layouts.app')

<style>
    /* Global Styles */
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary: #f59e0b;
        --dark: #1e293b;
        --light: #f8fafc;
        --gray: #94a3b8;
        --success: #10b981;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f1f5f9;
        color: var(--dark);
        line-height: 1.6;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .btn {
        display: inline-block;
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-primary {
        background-color: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: var(--secondary);
        color: white;
    }

    .btn-secondary:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    .btn-outline {
        background-color: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
    }

    .btn-outline:hover {
        background-color: var(--primary);
        color: white;
    }

    section {
        padding: 80px 0;
    }

    .section-title {
        font-size: 2.5rem;
        margin-bottom: 20px;
        text-align: center;
        position: relative;
    }

    .section-title::after {
        content: "";
        display: block;
        width: 80px;
        height: 4px;
        background-color: var(--secondary);
        margin: 15px auto 30px;
    }

    .section-subtitle {
        text-align: center;
        color: var(--gray);
        max-width: 700px;
        margin: 0 auto 50px;
    }

    /* Header Styles */
    header {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        width: 100%;
        z-index: 100;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
    }

    .logo {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .logo i {
        margin-right: 10px;
        color: var(--secondary);
    }

    .nav-links {
        display: flex;
        list-style: none;
    }

    .nav-links li {
        margin-left: 30px;
    }

    .nav-links a {
        text-decoration: none;
        color: var(--dark);
        font-weight: 600;
        transition: color 0.3s;
    }

    .nav-links a:hover {
        color: var(--primary);
    }

    .mobile-menu-btn {
        display: none;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--dark);
        cursor: pointer;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
            url("https://images.unsplash.com/photo-1494972308805-463bc619d34e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1473&q=80")
            no-repeat center center/cover;
        height: 100vh;
        display: flex;
        align-items: center;
        text-align: center;
        color: white;
        padding-top: 80px;
    }

    .hero-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .hero h1 {
        font-size: 3.5rem;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }

    .search-box {
        background-color: white;
        border-radius: 8px;
        padding: 30px;
        margin-top: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .search-tabs {
        display: flex;
        margin-bottom: 20px;
    }

    .search-tab {
        flex: 1;
        padding: 10px;
        text-align: center;
        cursor: pointer;
        font-weight: 600;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
    }

    .search-tab.active {
        border-bottom: 3px solid var(--secondary);
        color: var(--primary);
    }

    .search-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--dark);
        text-align: left;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1rem;
    }

    .search-btn {
        grid-column: 1 / -1;
        padding: 15px;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-btn:hover {
        background-color: var(--primary-dark);
    }

    /* Featured Cars Section */
    .featured-cars {
        background-color: white;
    }

    .cars-tabs {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
    }

    .cars-tab {
        padding: 10px 25px;
        margin: 0 10px;
        cursor: pointer;
        font-weight: 600;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
    }

    .cars-tab.active {
        border-bottom: 3px solid var(--secondary);
        color: var(--primary);
    }

    .cars-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .car-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .car-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .car-img {
        height: 200px;
        overflow: hidden;
    }

    .car-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .car-card:hover .car-img img {
        transform: scale(1.1);
    }

    .car-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: var(--secondary);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .car-info {
        padding: 20px;
    }

    .car-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: var(--gray);
        font-size: 0.9rem;
    }

    .car-title {
        font-size: 1.3rem;
        margin-bottom: 10px;
    }

    .car-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        margin: 15px 0;
    }

    .car-price span {
        font-size: 1rem;
        color: var(--gray);
        font-weight: 400;
    }

    .car-features {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }

    .car-feature {
        display: flex;
        align-items: center;
        font-size: 0.9rem;
    }

    .car-feature i {
        margin-right: 5px;
        color: var(--secondary);
    }

    /* CTA Section */
    .cta {
        background: linear-gradient(
                rgba(37, 99, 235, 0.9),
                rgba(37, 99, 235, 0.9)
            ),
            url("https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80")
            no-repeat center center/cover;
        color: white;
        text-align: center;
    }

    .cta-content {
        max-width: 700px;
        margin: 0 auto;
    }

    .cta h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .cta p {
        margin-bottom: 30px;
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    /* Footer */
    footer {
        background-color: var(--dark);
        color: white;
        padding: 60px 0 20px;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        margin-bottom: 40px;
    }

    .footer-column h3 {
        font-size: 1.3rem;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-column h3::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 2px;
        background-color: var(--secondary);
    }

    .footer-links {
        list-style: none;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: var(--gray);
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-links a:hover {
        color: white;
    }

    .footer-contact p {
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
    }

    .footer-contact i {
        margin-right: 10px;
        color: var(--secondary);
    }

    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        color: white;
        transition: all 0.3s;
    }

    .social-links a:hover {
        background-color: var(--secondary);
        transform: translateY(-3px);
    }

    .footer-bottom {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: var(--gray);
        font-size: 0.9rem;
    }

    /* Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 40px;
        padding: 20px 0;
    }

    .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        margin: 0 5px;
        border-radius: 50%;
        text-decoration: none;
        color: var(--primary);
        border: 1px solid var(--primary);
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .page-link.active,
    .page-link:hover {
        background-color: var(--primary);
        color: white;
    }

    .page-link i {
        font-size: 0.8rem;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .section-title {
            font-size: 2.2rem;
        }

        .hero h1 {
            font-size: 3rem;
        }
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 15px 0;
        }

        .nav-links {
            position: fixed;
            top: 70px;
            left: -100%;
            width: 100%;
            height: calc(100vh - 70px);
            background-color: white;
            flex-direction: column;
            align-items: center;
            padding-top: 40px;
            transition: left 0.3s;
        }

        .nav-links.active {
            left: 0;
        }

        .nav-links li {
            margin: 15px 0;
        }

        .mobile-menu-btn {
            display: block;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1rem;
        }

        .search-form {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 2rem;
        }

        .cars-tabs {
            flex-wrap: wrap;
        }

        .cars-tab {
            margin: 5px;
        }
    }

    @media (max-width: 576px) {
        .hero h1 {
            font-size: 2rem;
        }

        .search-box {
            padding: 20px;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .cta h2 {
            font-size: 2rem;
        }

        .cta-buttons {
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            width: 100%;
        }
    }
</style>


@section('content')

    <section class="page-header">
        <div class="container">
            <h1>All Cars</h1>
            <p>Browse our complete inventory of vehicles</p>
        </div>
    </section>

    <section class="cars-listing">
        <div class="container">
            <h2 class="section-title">Available Vehicles</h2>

            <div class="cars-grid">
                @forelse ($cars as $car)
                    <div class="car-card">
                        <div class="car-img">
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->brand }} {{ $car->model }}" />
                            <div class="car-badge">{{ $car->Status }}</div>
                        </div>
                        <div class="car-info">
                            <div class="car-meta">
                                <span><i class="fas fa-calendar-alt"></i> {{ $car->year }}</span>
                                <span><i class="fas fa-tachometer-alt"></i> {{ number_format($car->mileage) }} km</span>
                            </div>
                            <h3 class="car-title">{{ $car->brand }} {{ $car->model }}</h3>
                            <div class="car-price">
                                @if ($car->is_rental)
                                    ${{ number_format($car->priceRental) }} <span>/ day</span>
                                @else
                                    ${{ number_format($car->price) }} <span>/ negotiable</span>
                                @endif
                                {{-- Your original line below was duplicate, removed it:
                                     ${{ number_format($car->price) }} <span>/ negotiable</span>
                                --}}
                            </div>
                            <div class="car-features">
                                <span class="car-feature">
                                    <i class="fas fa-gas-pump"></i> {{ $car->fuel_type }}
                                </span>
                            </div>
                            {{-- HERE IS THE CHANGE --}}
                            <a href="{{ route('cars.details', ['car' => $car->id]) }}" class="btn btn-outline">View Details</a>
                        </div>
                    </div>
                @empty
                    <p>No cars available at the moment.</p>
                @endforelse
            </div>

            <div class="pagination">
                {{ $cars->links('vendor.pagination.default') }}
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>AutoDrive</h3>
                    <p>
                        Your trusted partner for car sales and rentals. We connect buyers
                        and sellers with the best deals on quality vehicles.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">All Cars</a></li>
                        <li><a href="#">Rentals</a></li>
                        <li><a href="#">Sell Your Car</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Info</h3>
                    <div class="footer-contact">
                        <p>
                            <i class="fas fa-map-marker-alt"></i> 123 Auto Drive, City,
                            Country
                        </p>
                        <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                        <p><i class="fas fa-envelope"></i> info@autodrive.com</p>
                        <p><i class="fas fa-clock"></i> Mon-Fri: 9:00 AM - 6:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 AutoDrive. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.querySelector(".mobile-menu-btn");
        const navLinks = document.querySelector(".nav-links");

        mobileMenuBtn.addEventListener("click", () => {
            navLinks.classList.toggle("active");
            mobileMenuBtn.innerHTML = navLinks.classList.contains("active") ?
                '<i class="fas fa-times"></i>' :
                '<i class="fas fa-bars"></i>';
        });
    </script>
@endsection