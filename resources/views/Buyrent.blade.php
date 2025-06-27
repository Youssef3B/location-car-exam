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
    /* Header Styles */
    header {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        width: 100%;
        top: 0;
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
    .page-header {
        padding: 60px 0;
        background-color: white;
        text-align: center;
    }

    .page-header h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: var(--primary);
    }

    .page-header p {
        color: var(--gray);
        font-size: 1.1rem;
    }

    /* Cars Listing Section */
    .cars-listing {
        padding: 60px 0;
    }

    .section-title {
        font-size: 2rem;
        margin-bottom: 30px;
        text-align: center;
        position: relative;
        color: var(--dark);
    }

    .section-title::after {
        content: "";
        display: block;
        width: 80px;
        height: 4px;
        background-color: var(--secondary);
        margin: 15px auto 30px;
    }

    /* Car Grid */
    .cars-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
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
        position: relative;
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
        color: var(--dark);
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
        color: var(--dark);
    }

    .car-feature i {
        margin-right: 5px;
        color: var(--secondary);
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-outline {
        background-color: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
        width: 100%;
        text-align: center;
    }

    .btn-outline:hover {
        background-color: var(--primary);
        color: white;
    }

    /* Bootstrap-inspired Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 40px;
        padding: 20px 0;
    }

    .pagination .page-item {
        margin: 0 4px;
        list-style: none;
    }

    .pagination .page-link {
        position: relative;
        display: block;
        padding: 8px 16px;
        color: var(--primary);
        background-color: white;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .pagination .page-link:hover {
        z-index: 2;
        color: white;
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .pagination .page-item.active .page-link {
        z-index: 3;
        color: white;
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: white;
        border-color: #dee2e6;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .cars-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }

    @media (max-width: 576px) {
        .page-header h1 {
            font-size: 2rem;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .pagination .page-link {
            padding: 6px 12px;
            font-size: 0.9rem;
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
                            </div>
                            <div class="car-features">
                                <span class="car-feature">
                                    <i class="fas fa-gas-pump"></i> {{ $car->fuel_type }}
                                </span>
                                <span class="car-feature">
                                    <i class="fas fa-car"></i> {{ $car->transmission }}
                                </span>
                            </div>
                            <a href="{{ route('cars.details', ['car' => $car->id]) }}" class="btn btn-outline">View Details</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-100">No cars available at the moment.</p>
                @endforelse
            </div>

            <!-- Bootstrap Pagination -->
            <div class="pagination">
                {{ $cars->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection