@extends('layouts.admin')

@section('content')

<div class="main-content">
    <!-- View Contact Messages Section -->
    <div class="dashboard-section" id="messages">
        <h2 class="section-title">💬 View Contact Messages</h2>

        <div class="message-list">
            {{-- Loop through the contact messages passed from the controller --}}
            @forelse ($messages as $contactMessage) {{-- Renamed variable for clarity --}}
                <div class="message-item"> {{-- Removed 'unread' class logic --}}
                    {{-- Use the email from the Contact model for Gravatar --}}
                    <img
                        src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($contactMessage->email ?? 'default@example.com'))) . '?d=identicon' }}"
                        alt="{{ $contactMessage->fullname ?? 'Unknown Contact' }}"
                        class="message-avatar"
                    />
                    <div class="message-content">
                        <div class="message-header">
                            {{-- Display sender's full name from the Contact model --}}
                            <span class="message-sender">{{ $contactMessage->fullname ?? 'Unknown Sender' }}</span>
                            {{-- Display time, formatted for readability --}}
                            <span class="message-time">{{ $contactMessage->created_at->diffForHumans() }}</span>
                        </div>
                        {{-- Display the subject from the Contact model --}}
                        <div class="message-subject">
                            {{ $contactMessage->subject ?? 'No Subject' }}
                        </div>
                        <p class="message-preview">
                            {{-- Display the message content, limited for preview --}}
                            {{ Str::limit($contactMessage->message, 100) }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    No contact messages to display.
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </div>
</div>

{{-- Basic CSS for message list, you might put this in a separate CSS file --}}
<style>
    .dashboard-section {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .message-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .message-item {
        display: flex;
        align-items: flex-start;
        background-color: #f9f9f9;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 0.0625rem 0.125rem rgba(0, 0, 0, 0.05);
        border-left: 5px solid transparent; /* Default border */
        transition: all 0.2s ease-in-out;
    }

    .message-item:hover {
        background-color: #f0f0f0;
        transform: translateY(-2px);
    }

    /* Removed .message-item.unread specific styles as there's no 'read_at' field in Contact model */

    .message-avatar {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 50%;
        margin-right: 1rem;
        object-fit: cover;
        flex-shrink: 0; /* Prevent shrinking */
    }

    .message-content {
        flex-grow: 1;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.25rem;
    }

    .message-sender {
        font-weight: 500;
        color: #555;
        font-size: 1.05rem;
    }

    .message-time {
        font-size: 0.85rem;
        color: #999;
    }

    .message-subject {
        font-weight: 500;
        color: #444;
        margin-bottom: 0.5rem;
    }

    .message-preview {
        font-size: 0.95rem;
        color: #666;
        line-height: 1.4;
    }

    /* Styling for Laravel Pagination links */
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .pagination li {
        margin: 0 0.25rem;
    }

    .pagination li span,
    .pagination li a {
        display: block;
        padding: 0.5rem 0.75rem;
        text-decoration: none;
        border: 1px solid #ddd;
        color: #007bff;
        border-radius: 0.25rem;
        transition: background-color 0.2s ease;
    }

    .pagination li a:hover {
        background-color: #e9ecef;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination li.disabled span {
        color: #6c757d;
        pointer-events: none;
        background-color: #f8f9fa;
    }
</style>
@endsection