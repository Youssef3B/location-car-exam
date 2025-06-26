@extends('layouts.admin')

@section('content')

    <div class="main-content">
        <!-- Manage Users Section -->
        <div class="dashboard-section" id="users">
            <h2 class="section-title">👥 Manage Users</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="data-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Joined</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <img
                                        src="{{ $user->avatar ?? 'https://placehold.co/50x50/aabbcc/ffffff?text=U' }}"
                                        class="user-avatar"
                                        alt="User Avatar"
                                    />
                                    <div>
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div class="user-email">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>
                                @php
                                    $statusClass = '';
                                    if ($user->status === 'active') {
                                        $statusClass = 'status-active';
                                    } elseif ($user->status === 'blocked') {
                                        $statusClass = 'status-blocked';
                                    }
                                @endphp
                                <span class="status-badge {{ $statusClass }}">{{ ucfirst($user->status) }}</span>
                            </td>
                            <td>{{ ucfirst($user->role ?? 'Standard') }}</td> {{-- Assuming a 'role' column exists, default to 'Standard' if null --}}
                            <td>
                                {{-- Edit button (if you implement an edit function) --}}
                                <button class="action-btn edit">
                                    <i class="fas fa-edit"></i>
                                </button>

                                {{-- Toggle Block/Unblock Button --}}
                                <form action="{{ route('users.toggleBlock', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="action-btn delete">
                                        @if ($user->status === 'active')
                                            <i class="fas fa-ban" title="Block User"></i> {{-- Ban icon for active users --}}
                                        @else
                                            <i class="fas fa-check" title="Unblock User"></i> {{-- Check icon for blocked users --}}
                                        @endif
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination Links --}}
            <div class="pagination-links" style="margin-top: 20px; text-align: center;">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection

{{-- Optional: Add basic styles if not already in your admin.css --}}
@push('styles')
<style>
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden; /* Ensures rounded corners are visible */
    }
    .data-table th, .data-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }
    .data-table th {
        background-color: #f5f5f5;
        font-weight: bold;
        color: #333;
    }
    .data-table tbody tr:hover {
        background-color: #f9f9f9;
    }
    .user-info {
        display: flex;
        align-items: center;
    }
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
        object-fit: cover;
    }
    .user-name {
        font-weight: bold;
        color: #333;
    }
    .user-email {
        font-size: 0.85em;
        color: #777;
    }
    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: bold;
        color: #fff;
    }
    .status-active {
        background-color: #28a745; /* Green */
    }
    .status-blocked {
        background-color: #dc3545; /* Red */
    }
    .action-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9em;
        margin-right: 5px;
        transition: background-color 0.3s ease;
    }
    .action-btn:hover {
        opacity: 0.9;
    }
    .action-btn.edit {
        background-color: #ffc107; /* Yellow for edit */
    }
    .action-btn.delete {
        background-color: #dc3545; /* Red for delete/ban */
    }
    /* Specific style for unblock (check) button if status is blocked */
    .action-btn.delete .fas.fa-check {
        background-color: #28a745; /* Green for unblock */
    }
    /* Laravel Pagination Styling */
    .pagination-links nav {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination-links nav svg {
        width: 20px; /* Adjust SVG icon size */
        height: 20px;
    }
    .pagination-links .flex.justify-between.flex-1 {
        display: none; /* Hide default 'Previous'/'Next' text if not needed */
    }
    .pagination-links .relative.inline-flex.items-center.px-4.py-2 {
        border-radius: 0.25rem;
        margin: 0 5px;
        border: 1px solid #ddd;
        color: #007bff;
        text-decoration: none;
    }
    .pagination-links .relative.inline-flex.items-center.px-4.py-2:hover {
        background-color: #007bff;
        color: white;
    }
    .pagination-links .relative.inline-flex.items-center.px-4.py-2.bg-blue-500.text-white {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
    .pagination-links .relative.inline-flex.items-center.px-4.py-2[aria-current="page"] {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
        font-weight: bold;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
</style>
@endpush
