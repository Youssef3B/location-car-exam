@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --text-color: #333;
        --light-gray: #f8f9fa;
        --border-color: #e0e0e0;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        padding: 2rem;
        background-color: #f5f7ff;
        color: var(--text-color);
    }
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
    }

    h1 {
        margin-bottom: 1.5rem;
        color: var(--primary-color);
        font-weight: 600;
    }

    .table-container {
        background: white;
        border-radius: 10px;
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: var(--primary-color);
        color: white;
    }

    th {
        padding: 1rem;
        text-align: left;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }

    tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: all 0.2s ease;
    }

    tbody tr:last-child {
        border-bottom: none;
    }

    tbody tr:hover {
        background-color: var(--light-gray);
    }

    td {
        padding: 1rem;
        vertical-align: middle;
    }

    .vehicle-image {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
    }

    .badge {
        display: inline-block;
        padding: 0.25rem 0.5rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .badge-gas {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .badge-diesel {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-electric {
        background-color: #f3e5f5;
        color: #8e24aa;
    }

    .price {
        font-weight: 600;
        color: var(--primary-color);
    }

    .actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        font-size: 0.8rem;
        transition: all 0.2s ease;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--secondary-color);
    }

    .btn-outline {
        background-color: transparent;
        border: 1px solid var(--primary-color);
        color: var(--primary-color);
    }

    .btn-outline:hover {
        background-color: var(--light-gray);
    }

    @media (max-width: 768px) {
        .table-container {
            overflow-x: auto;
        }
        
        table {
            min-width: 700px;
        }
    }
    
    .empty-message {
        text-align: center;
        padding: 2rem;
        color: #666;
    }
</style>

<div class="container">
    <h1>Purchase History</h1>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Date Purchased</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td>
                            @if($sale->car->image)
                                <img src="{{ asset('storage/' . $sale->car->image) }}" alt="{{ $sale->car->brand }} {{ $sale->car->model }}" class="vehicle-image">
                            @else
                                <img src="https://via.placeholder.com/80x60" alt="{{ $sale->car->brand }} {{ $sale->car->model }}" class="vehicle-image">
                            @endif
                        </td>
                        <td>{{ $sale->car->brand }}</td>
                        <td>{{ $sale->car->model }}</td>
                        <td>{{ $sale->car->year }}</td>
                        <td class="price">${{ number_format($sale->price, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($sale->purchased_at)->format('Y-m-d') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-message">You haven't made any purchases yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection