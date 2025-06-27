@extends('layouts.admin')

@section('content')

<div class="main-content">
    <!-- Manage Sales Section -->
    <div class="dashboard-section" id="sales">
        <h2 class="section-title">💰 Manage Sales</h2>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Sale ID</th>
                    <th>Car</th>
                    <th>Buyer</th>
                    {{-- <th>Seller</th> This column requires a specific relationship or logic for the seller --}}
                    <th>Date</th>
                    <th>Price</th>
                    {{-- The "Actions" column is removed as requested --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                    <tr>
                        <td>#S{{ $sale->id }}</td>
                        <td>{{ $sale->car->brand ?? 'N/A' }} {{ $sale->car->model ?? 'N/A' }}</td> {{-- Assuming 'make' and 'model' attributes on Car model --}}
                        <td>{{ $sale->buyer->name ?? 'N/A' }}</td> {{-- Assuming 'name' attribute on User model --}}
                        {{-- <td>Premium Motors</td> If you have a seller relationship, you would access it here (e.g., $sale->seller->name) --}}
<td>{{ $sale->purchased_at ? \Carbon\Carbon::parse($sale->purchased_at)->format('M d, Y') : 'N/A' }}</td>                        <td>${{ number_format($sale->price, 2) }}</td>
                        {{-- Action buttons are removed as per the request --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No sales found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination Links --}}
        <div class="pagination-links mt-4">
            {{ $sales->links() }} {{-- This will render Bootstrap-styled pagination links by default --}}
        </div>
    </div>
</div>
@endsection

