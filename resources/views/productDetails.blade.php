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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f1f5f9;
            color: var(--dark);
            line-height: 1.6;
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

        /* Tabs */
        .tabs {
            display: flex;
            border-bottom: 1px solid var(--gray);
            margin-bottom: 20px;
        }

        .tab {
            padding: 12px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .tab.active {
            border-bottom-color: var(--primary);
            color: var(--primary);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Rental/Sale Details */
        .pricing-details {
            background-color: rgba(37, 99, 235, 0.05);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .price-total {
            font-weight: bold;
            border-top: 1px solid var(--gray);
            padding-top: 8px;
            margin-top: 8px;
        }

        /* Contact Form */
        .contact-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-size: 16px;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .form-actions {
            margin-top: 20px;
        }

        /* Rental Calendar */
        .rental-calendar {
            margin-top: 20px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .calendar-day {
            padding: 8px;
            text-align: center;
            border-radius: 5px;
        }

        .calendar-day.header {
            font-weight: bold;
            background-color: var(--light);
        }

        .calendar-day.available {
            background-color: rgba(16, 185, 129, 0.2);
            cursor: pointer;
        }

        .calendar-day.unavailable {
            background-color: rgba(239, 68, 68, 0.2);
            color: var(--gray);
        }

        .calendar-day.selected {
            background-color: var(--primary);
            color: white;
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
    <div class="car-details">
        <div class="gallery">
            {{-- Display the main image of the car --}}
            <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80' }}" alt="{{ $car->brand }} {{ $car->model }}" class="gallery-main" id="mainImage">
            <div class="gallery-thumbnails">
                {{-- Thumbnails: Your model only has one 'image' field. For a real gallery,
                     you'd likely need a separate 'CarImage' model and relationship.
                     For now, we'll just use the main image as a thumbnail and
                     keep the static ones for visual completeness in the example. --}}
                <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80' }}" alt="Thumbnail 1" class="thumbnail active" onclick="changeImage(this)">
                {{-- Hardcoded thumbnails as replacements --}}
                <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Thumbnail 2" class="thumbnail" onclick="changeImage(this)">
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Thumbnail 3" class="thumbnail" onclick="changeImage(this)">
                <img src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Thumbnail 4" class="thumbnail" onclick="changeImage(this)">
                <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Thumbnail 5" class="thumbnail" onclick="changeImage(this)">
            </div>
        </div>

        <div class="details-content">
            <div class="details-main">
                <h1 class="car-title">{{ $car->year }} {{ $car->brand }} {{ $car->model }}</h1>
                <div class="car-price">${{ number_format($car->price, 0, ',', '.') }}</div>
                <p class="car-description">
                    {{ $car->description }}
                </p>

                <div class="specs-grid">
                    <div class="spec-item">
                        <span class="spec-icon">⚙️</span>
                        <span>Engine: 5.0L V8 (Placeholder)</span> {{-- No direct 'engine_size' in your model --}}
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">🏎️</span>
                        <span>450 HP / 410 lb-ft torque (Placeholder)</span> {{-- No direct 'horsepower' or 'torque' in your model --}}
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">⏱️</span>
                        <span>0-60 mph in 4.2s (Placeholder)</span> {{-- No direct 'acceleration' in your model --}}
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">🛣️</span>
                        <span>Transmission: 6-speed manual (Placeholder)</span> {{-- No direct 'transmission_type' in your model --}}
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">⛽</span>
                        <span>{{ $car->mileage ?? 'N/A' }} MPG (combined, est.)</span> {{-- Using 'mileage' but assuming it's combined --}}
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">🚗</span>
                        <span>Body Type: 2-door coupe (Placeholder)</span> {{-- No direct 'body_type' in your model --}}
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">🎨</span>
                        <span>Exterior Color: Velocity Blue (Placeholder)</span> {{-- No direct 'exterior_color' in your model --}}
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon">🧵</span>
                        <span>Interior: Ebony leather (Placeholder)</span> {{-- No direct 'interior_color' in your model --}}
                    </div>
                </div>

                <div class="tabs">
                    {{-- Check $car->Status (assuming 'Status' is the column name, capitalized as in your model) --}}
                    <div class="tab {{ strtolower($car->Status) === 'for_sale' ? 'active' : '' }}" onclick="changeTab('purchase')">Purchase</div>
                    <div class="tab {{ $car->is_rental ? 'active' : '' }}" onclick="changeTab('rental')">Rental</div>
                    <div class="tab" onclick="changeTab('contact')">Contact</div>
                </div>

                <div id="purchase-tab" class="tab-content {{ strtolower($car->Status) === 'for_sale' ? 'active' : '' }}">
                    <h3>Purchase Details</h3>
                    <div class="pricing-details">
                        <div class="price-item">
                            <span>Vehicle Price</span>
                            <span>${{ number_format($car->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="price-item">
                            <span>Destination Charge</span>
                            <span>$1,095 (Placeholder)</span> {{-- Not in model --}}
                        </div>
                        <div class="price-item">
                            <span>Taxes & Fees</span>
                            <span>$2,850 (Placeholder)</span> {{-- Not in model --}}
                        </div>
                        <div class="price-item price-total">
                            <span>Total Purchase Price</span>
                            {{-- Placeholder calculation --}}
                            <span>${{ number_format($car->price + 1095 + 2850, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @if(strtolower($car->Status) === 'for_sale')
                    <p>This vehicle qualifies for our 0.9% APR financing for 60 months. Estimated payment: ${{ number_format(($car->price * 1.009 / 60), 0, ',', '.') }}/month with $5,000 down.</p>
                    @endif
                    <div class="action-buttons">
                        <button class="btn btn-primary">
                            Apply for Financing
                        </button>
                        <button class="btn btn-outline">
                            Schedule Test Drive
                        </button>
                    </div>
                </div>

                <div id="rental-tab" class="tab-content {{ $car->is_rental ? 'active' : '' }}">
                    <h3>Rental Details</h3>
                    <div class="pricing-details">
                        <div class="price-item">
                            <span>Daily Rate</span>
                            <span>${{ number_format($car->priceRental, 0, ',', '.') }}/day</span>
                        </div>
                        <div class="price-item">
                            <span>Weekly Rate (5% discount)</span>
                            {{-- Calculate weekly rate dynamically --}}
                            <span>${{ number_format($car->priceRental * 7 * 0.95, 0, ',', '.') }}/week</span>
                        </div>
                        <div class="price-item">
                            <span>Monthly Rate (10% discount)</span>
                            {{-- Calculate monthly rate dynamically --}}
                            <span>${{ number_format($car->priceRental * 30 * 0.90, 0, ',', '.') }}/month</span>
                        </div>
                        <div class="price-item">
                            <span>Security Deposit</span>
                            <span>$1,500 (Placeholder)</span> {{-- Not in model --}}
                        </div>
                    </div>
                    
                    <div class="rental-calendar">
                        <h4>Availability Calendar</h4>
                        {{-- The calendar relies on booking data which isn't in the current model.
                             This section would ideally fetch actual rental dates from the `rentals` relationship.
                             For now, keeping static June 2025 (current year). --}}
                        <div class="calendar-header">
                            <button class="btn btn-outline" style="padding: 5px 10px;">&lt; Prev</button>
                            <span>June {{ date('Y') }}</span> {{-- Dynamically show current year --}}
                            <button class="btn btn-outline" style="padding: 5px 10px;">Next &gt;</button>
                        </div>
                        <div class="calendar-grid">
                            <div class="calendar-day header">Sun</div>
                            <div class="calendar-day header">Mon</div>
                            <div class="calendar-day header">Tue</div>
                            <div class="calendar-day header">Wed</div>
                            <div class="calendar-day header">Thu</div>
                            <div class="calendar-day header">Fri</div>
                            <div class="calendar-day header">Sat</div>
                            
                            {{-- Calendar days would be generated dynamically based on actual rental bookings (e.g., $car->rentals) --}}
                            {{-- Hardcoded days as replacements --}}
                            <div class="calendar-day unavailable">28</div>
                            <div class="calendar-day unavailable">29</div>
                            <div class="calendar-day unavailable">30</div>
                            <div class="calendar-day unavailable">31</div>
                            <div class="calendar-day available">1</div>
                            <div class="calendar-day available">2</div>
                            <div class="calendar-day available">3</div>
                            <div class="calendar-day available">4</div>
                            <div class="calendar-day available">5</div>
                            <div class="calendar-day available">6</div>
                            <div class="calendar-day available selected">7</div>
                            <div class="calendar-day available">8</div>
                            <div class="calendar-day available">9</div>
                            <div class="calendar-day available">10</div>
                            <div class="calendar-day available">11</div>
                            <div class="calendar-day unavailable">12</div>
                            <div class="calendar-day unavailable">13</div>
                            <div class="calendar-day unavailable">14</div>
                            <div class="calendar-day unavailable">15</div>
                            <div class="calendar-day unavailable">16</div>
                            <div class="calendar-day unavailable">17</div>
                            <div class="calendar-day unavailable">18</div>
                            <div class="calendar-day available">19</div>
                            <div class="calendar-day available">20</div>
                            <div class="calendar-day available">21</div>
                            <div class="calendar-day available">22</div>
                            <div class="calendar-day available">23</div>
                            <div class="calendar-day available">24</div>
                            <div class="calendar-day available">25</div>
                            <div class="calendar-day available">26</div>
                            <div class="calendar-day available">27</div>
                            <div class="calendar-day available">28</div>
                            <div class="calendar-day available">29</div>
                            <div class="calendar-day available">30</div>
                        </div>
                    </div>
                    
                    <div class="action-buttons">
                        <button class="btn btn-secondary">
                            Book This Rental
                        </button>
                        <button class="btn btn-outline">
                            Check Insurance Options
                        </button>
                    </div>
                </div>

                <div id="contact-tab" class="tab-content">
                    <h3>Contact Seller</h3>
                    <div class="seller-info">
                        {{-- Assuming the car has an owner relationship with a User model --}}
                        <p><strong>Dealer:</strong> {{ $car->owner->name ?? 'Premium Auto Sales (Placeholder)' }}</p>
                        <p><strong>Location:</strong> {{ $car->owner->address ?? '123 Auto Mall Drive, Los Angeles, CA 90001 (Placeholder)' }}</p>
                        <p><strong>Phone:</strong> {{ $car->owner->phone ?? '(555) 123-4567 (Placeholder)' }}</p>
                        <p><strong>Email:</strong> {{ $car->owner->email ?? 'sales@premiumauto.example.com (Placeholder)' }}</p>
                        <p><strong>Hours:</strong> Mon-Fri 9am-7pm, Sat 10am-5pm, Sun Closed (Placeholder)</p> {{-- Not in model --}}
                    </div>
                    
                    <div class="contact-form">
                        <h4>Send a Message</h4>
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" class="form-control">
                                <option value="question">I have a question</option>
                                <option value="test-drive">Schedule a test drive</option>
                                <option value="purchase">Purchase inquiry</option>
                                <option value="rental">Rental inquiry</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" class="form-control"></textarea>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details-sidebar">
                <div class="availability">
                    <span class="availability-icon">{{ strtolower($car->Status) === 'for_sale' ? '✓' : '✖' }}</span>
                    <span>Available for purchase</span>
                </div>
                <div class="availability" style="margin-top: 10px;">
                    <span class="availability-icon">{{ $car->is_rental ? '✓' : '✖' }}</span>
                    {{-- For rental availability date, you'd need a specific field or derived logic from rentals.
                         Using a placeholder or looking at actual `rentals` relationship. --}}
                    <span>Available for rental {{ $car->is_rental && $car->rentals->isEmpty() ? 'now' : 'from a future date (Placeholder)' }}</span>
                </div>

                <div class="action-buttons">
                    @if(strtolower($car->Status) === 'for_sale')
                    <button class="btn btn-primary">
                        Buy Now
                    </button>
                    @endif
                    @if($car->is_rental)
                    <button class="btn btn-secondary">
                        Rent Now
                    </button>
                    @endif
                    <button class="btn btn-outline" onclick="changeTab('contact')">
                        Contact Seller
                    </button>
                </div>

                <div style="margin-top: 20px; padding: 15px; background-color: rgba(245, 158, 11, 0.1); border-radius: 8px;">
                    <h4 style="margin-bottom: 10px;">Special Offers</h4>
                    <ul style="padding-left: 20px;">
                        <li style="margin-bottom: 5px;">$500 discount for first responders (Placeholder)</li>
                        <li style="margin-bottom: 5px;">Free 1-year maintenance with purchase (Placeholder)</li>
                        <li style="margin-bottom: 5px;">10% off rental for 3+ days (Placeholder)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(element) {
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
        
        // Update main image
        mainImage.src = element.src.replace('200', '1000');
        
        // Update active thumbnail
        thumbnails.forEach(thumb => thumb.classList.remove('active'));
        element.classList.add('active');
    }

    function changeTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Deactivate all tab buttons
        document.querySelectorAll('.tab').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Activate selected tab
        document.getElementById(tabName + '-tab').classList.add('active');
        
        // Activate selected tab button
        // Find the correct tab button based on its text content
        document.querySelectorAll('.tabs .tab').forEach(tab => {
            if (tab.innerText.toLowerCase().includes(tabName)) {
                tab.classList.add('active');
            }
        });
    }

    // Calendar selection functionality
    document.querySelectorAll('.calendar-day.available').forEach(day => {
        day.addEventListener('click', function() {
            document.querySelectorAll('.calendar-day.selected').forEach(d => {
                d.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });
</script>

@endsection