@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="header">
            <h1 class="page-title">🛠️ Admin Dashboard</h1>
            <div class="admin-actions">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search..." />
                </div>
                <div class="admin-profile">
                    <img
                        src="https://randomuser.me/api/portraits/men/75.jpg"
                        alt="Admin"
                    />
                    <div class="admin-info">
                        <div class="admin-name">Admin User</div>
                        <div class="admin-role">Super Admin</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="dashboard">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-title">Total Users</div>
                            <div class="stat-value">{{ number_format($totalUsers) }}</div>
                            <div class="stat-change {{ $userChange >= 0 ? 'positive' : 'negative' }}">
                                <i class="fas fa-arrow-{{ $userChange >= 0 ? 'up' : 'down' }}"></i> {{ abs($userChange) }}% from last month
                            </div>
                        </div>
                        <div class="stat-icon users">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-title">Total Cars</div>
                            <div class="stat-value">{{ number_format($totalCars) }}</div>
                            <div class="stat-change {{ $carChange >= 0 ? 'positive' : 'negative' }}">
                                <i class="fas fa-arrow-{{ $carChange >= 0 ? 'up' : 'down' }}"></i> {{ abs($carChange) }}% from last month
                            </div>
                        </div>
                        <div class="stat-icon cars">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-title">Active Rentals</div>
                            <div class="stat-value">{{ number_format($activeRentals) }}</div>
                            <div class="stat-change {{ $rentalChange >= 0 ? 'positive' : 'negative' }}">
                                <i class="fas fa-arrow-{{ $rentalChange >= 0 ? 'up' : 'down' }}"></i> {{ abs($rentalChange) }}% from last month
                            </div>
                        </div>
                        <div class="stat-icon rentals">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-title">Total Sales</div>
                            <div class="stat-value">${{ number_format($totalSalesRevenue, 0) }}</div> {{-- Format as currency --}}
                            <div class="stat-change {{ $salesChange >= 0 ? 'positive' : 'negative' }}">
                                <i class="fas fa-arrow-{{ $salesChange >= 0 ? 'up' : 'down' }}"></i> {{ abs($salesChange) }}% from last month
                            </div>
                        </div>
                        <div class="stat-icon sales">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection