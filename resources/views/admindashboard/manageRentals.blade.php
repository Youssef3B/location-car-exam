@extends('layouts.admin')

@section('content')

<div class="main-content">
    <!-- Manage Rentals Section -->
    <div class="dashboard-section" id="rentals">
        <h2 class="section-title">📄 Manage Rentals</h2>

        {{-- Success and Error Messages --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="data-table">
            <thead>
                <tr>
                    <th>Rental ID</th>
                    <th>Car</th>
                    <th>Renter</th>
                    <th>Dates</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentals as $rental)
                <tr>
                    <td>#R{{ $rental->id }}</td>
                    <td>{{ $rental->car->make ?? 'N/A' }} {{ $rental->car->model ?? 'N/A' }}</td> {{-- Assuming 'make' and 'model' attributes on Car model --}}
                    <td>{{ $rental->user->name ?? 'N/A' }}</td> {{-- Assuming 'name' attribute on User model --}}
                    <td>
                        {{ \Carbon\Carbon::parse($rental->start_date)->format('M d') }}-{{ \Carbon\Carbon::parse($rental->end_date)->format('M d, Y') }}
                    </td>
                    <td>${{ number_format($rental->total_price, 2) }}</td>
                    <td>
                        @php
                            $statusClass = '';
                            switch ($rental->status) {
                                case 'pending':
                                    $statusClass = 'status-pending';
                                    break;
                                case 'approved':
                                    $statusClass = 'status-active'; // Or status-approved
                                    break;
                                case 'completed':
                                    $statusClass = 'status-active'; // Or status-completed
                                    break;
                                case 'canceled':
                                    $statusClass = 'status-blocked'; // Or status-cancelled
                                    break;
                                default:
                                    $statusClass = '';
                                    break;
                            }
                        @endphp
                        <span class="status-badge {{ $statusClass }}">{{ ucfirst($rental->status) }}</span>
                    </td>
                    <td>
                        @if ($rental->status === 'pending')
                            {{-- Form for Accepting Rental --}}
                            <form action="{{ route('rentals.accept', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="action-btn approve" title="Approve">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>

                            {{-- Form for Declining Rental --}}
                            <form action="{{ route('rentals.decline', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="action-btn reject" title="Decline">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        @elseif ($rental->status === 'approved')
                            {{-- Optional: Button to mark as completed --}}
                            <form action="{{ route('rentals.complete', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="action-btn edit" title="Mark as Completed">
                                    <i class="fas fa-check-double"></i> {{-- Example icon for complete --}}
                                </button>
                            </form>
                        @endif

                        {{-- View Button (assuming a view route exists) --}}
                        <button class="action-btn view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>

                        {{-- Delete Button --}}
                        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this rental?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No rentals found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

{{-- Add some basic styling for alerts if not already in your admin layout --}}
<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
    .text-center {
        text-align: center;
    }
</style>
