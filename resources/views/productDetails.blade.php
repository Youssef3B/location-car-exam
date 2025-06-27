@extends('layouts.app')

<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary: #f59e0b;
        --dark: #1e293b;
        --light: #f8fafc;
        --gray: #94a3b8;
        --success: #10b981;
        --error: #ef4444;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif; /* Changed font to Inter */
    }

    body {
        background-color: #f1f5f9;
        color: var(--dark);
        line-height: 1.6;
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


    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .car-details {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .gallery {
        position: relative;
        width: 100%;
        height: 400px;
        overflow: hidden;
        border-bottom: 1px solid var(--gray);
    }

    .gallery-main {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-thumbnails {
        display: flex;
        padding: 10px;
        gap: 10px;
        overflow-x: auto;
    }

    .thumbnail {
        width: 80px;
        height: 60px;
        border-radius: 5px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .thumbnail:hover, .thumbnail.active {
        border-color: var(--primary);
    }

    .details-content {
        padding: 20px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .car-title {
        font-size: 28px;
        margin-bottom: 5px;
        color: var(--dark);
    }

    .car-price {
        font-size: 24px;
        font-weight: bold;
        color: var(--primary);
        margin-bottom: 15px;
    }

    .car-description {
        color: var(--dark);
        margin-bottom: 20px;
    }

    .specs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }

    .spec-item {
        display: flex;
        align-items: center;
    }

    .spec-icon {
        margin-right: 10px;
        color: var(--primary);
    }

    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary {
        background-color: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
    }

    .btn-secondary {
        background-color: var(--secondary);
        color: white;
    }

    .btn-secondary:hover {
        opacity: 0.9;
    }

    .btn-outline {
        background-color: transparent;
        border: 1px solid var(--primary);
        color: var(--primary);
    }

    .btn-outline:hover {
        background-color: var(--primary);
        color: white;
    }

    .availability {
        display: flex;
        align-items: center;
        margin-top: 15px;
        padding: 10px;
        border-radius: 5px;
        background-color: rgba(16, 185, 129, 0.1);
        color: var(--success);
    }

    .availability.unavailable {
        background-color: rgba(239, 68, 68, 0.1);
        color: var(--error);
    }

    .availability-icon {
        margin-right: 10px;
    }

    /* Message Alerts */
    .alert {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .alert-success {
        background-color: rgba(16, 185, 129, 0.15);
        color: var(--success);
        border: 1px solid var(--success);
    }

    .alert-error {
        background-color: rgba(239, 68, 68, 0.15);
        color: var(--error);
        border: 1px solid var(--error);
    }

    @media (min-width: 768px) {
        .details-content {
            grid-template-columns: 2fr 1fr;
        }

        .action-buttons {
            flex-direction: column;
        }
    }

    @media (min-width: 992px) {
        .gallery {
            height: 500px;
        }

        .specs-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>

@section('content')
<div class="container">
    {{-- Display success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display error message --}}
    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="car-details">
        <!-- Car Gallery -->
        <div class="gallery">
            {{-- Display the main car image --}}
            <img
                src="{{ asset('storage/' . $car->image) }}" {{-- Assuming 'image' stores the path relative to storage --}}
                alt="{{ $car->brand }} {{ $car->model }}"
                class="gallery-main"
                id="mainImage"
                onerror="this.onerror=null;this.src='https://placehold.co/1000x400/cccccc/333333?text=Image+Not+Found';"
            />
            <div class="gallery-thumbnails">
                {{-- For now, we'll use the main image as the only thumbnail.
                     If you have multiple images, loop through them here. --}}
                <img
                    src="{{ asset('storage/' . $car->image) }}"
                    alt="Thumbnail for {{ $car->brand }} {{ $car->model }}"
                    class="thumbnail active"
                    onclick="changeImage(this)"
                    onerror="this.onerror=null;this.src='https://placehold.co/80x60/cccccc/333333?text=Thumb';"
                />
                {{-- Example if you had multiple images (assuming $car->images is a collection of image objects with a 'path' attribute):
                @foreach($car->images as $image)
                    <img
                        src="{{ asset('storage/' . $image->path) }}"
                        alt="Thumbnail for {{ $car->brand }} {{ $car->model }}"
                        class="thumbnail @if($loop->first) active @endif"
                        onclick="changeImage(this)"
                        onerror="this.onerror=null;this.src='https://placehold.co/80x60/cccccc/333333?text=Thumb';"
                    />
                @endforeach
                --}}
            </div>
        </div>

        <!-- Car Details -->
        <div class="details-content">
            <div class="details-main">
                <h1 class="car-title">{{ $car->year }} {{ $car->brand }} {{ $car->model }}</h1>
                <div class="car-price">
                    @if($car->price)
                        ${{ number_format($car->price) }}
                    @else
                        N/A
                    @endif
                </div>
                <p class="car-description">
                    {{ $car->description }}
                </p>

                <div class="specs-grid">
                    <div class="spec-item">
                        <span class="spec-icon">🚗</span>
                        <span>{{ $car->brand }} {{ $car->model }}</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">🗓️</span>
                        <span>{{ $car->year }}</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">⛽</span>
                        <span>{{ $car->fuel_type }}</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon"> odometer</span>
                        <span>{{ number_format($car->mileage) }} miles</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">🏷️</span>
                        <span>Status: {{ ucfirst($car->Status) }}</span>
                    </div>
                    @if($car->owner)
                    <div class="spec-item">
                        <span class="spec-icon">👤</span>
                        <span>Listed by: {{ $car->owner->name }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="details-sidebar">
                @if($car->Status === 'available')
                    <div class="availability">
                        <span class="availability-icon">✓</span>
                        <span>Available for purchase</span>
                    </div>
                @else
                    <div class="availability unavailable">
                        <span class="availability-icon">✗</span>
                        <span>Currently Unavailable for Purchase</span>
                    </div>
                @endif

             

                <div class="action-buttons">
                    @if($car->Status === 'available')
                        {{-- Form for Buy Now button --}}
                        <form action="{{ route('cars.purchase', $car->id) }}" method="POST" style="width: 100%;">
                            @csrf {{-- CSRF token for security --}}
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Buy Now</button>
                        </form>
                    @endif
                 
                </div>

                <div
                    style="
                        margin-top: 20px;
                        padding: 15px;
                        background-color: rgba(245, 158, 11, 0.1);
                        border-radius: 8px;
                    "
                >
                    <h4 style="margin-bottom: 10px">Special Offers</h4>
                    <ul style="padding-left: 20px">
                        <li>Inquire about financing options!</li>
                        @if($car->Status === 'available')
                            <li>Free 1-year maintenance with purchase</li>
                        @endif
                        @if($car->is_rental && $car->priceRental)
                            <li>10% off rental for 3+ days</li>
                        @endif
                        {{-- Add more dynamic offers based on your car data or business logic --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Changes the main image displayed in the gallery based on the clicked thumbnail.
     * @param {HTMLImageElement} thumbnail - The thumbnail image element that was clicked.
     */
    function changeImage(thumbnail) {
        const mainImage = document.getElementById('mainImage');
        // Adjust the image source to get the larger version if your server serves different sizes
        // This is a common pattern, but you might need to adapt it based on your actual image storage.
        mainImage.src = thumbnail.src.replace('/200/', '/1000/').replace('?w=200&q=80', '?w=1000&q=80');
        
        // Remove 'active' class from all thumbnails
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.classList.remove('active');
        });
        // Add 'active' class to the clicked thumbnail
        thumbnail.classList.add('active');
    }
</script>
@endsection
