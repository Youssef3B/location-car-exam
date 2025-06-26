@extends('layouts.admin')

@section('content')

<div class="main-content">
    <!-- View Messages Section -->
    <div class="dashboard-section" id="messages">
        <h2 class="section-title">💬 View Messages</h2>

        <div class="message-list">
            {{-- Loop through the messages passed from the controller --}}
            @forelse ($messages as $message)
                <div class="message-item {{ $message->read_at ? '' : 'unread' }}">
                    {{-- Assuming sender has an 'avatar' or 'profile_picture' attribute, or use a placeholder --}}
                    <img
                        src="{{ $message->sender->profile_picture ?? 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($message->sender->email ?? 'default@example.com'))) . '?d=identicon' }}"
                        alt="{{ $message->sender->name ?? 'Unknown User' }}"
                        class="message-avatar"
                    />
                    <div class="message-content">
                        <div class="message-header">
                            {{-- Display sender's name --}}
                            <span class="message-sender">{{ $message->sender->name ?? 'Unknown Sender' }}</span>
                            {{-- Display time, formatted for readability --}}
                            <span class="message-time">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        {{-- The 'subject' field is not in your migration, so this is illustrative.
                             You might infer a subject from the message content or add a 'subject' column. --}}
                        <div class="message-subject">
                            Message to {{ $message->receiver->name ?? 'Unknown Receiver' }}
                        </div>
                        <p class="message-preview">
                            {{-- Display the message content --}}
                            {{ Str::limit($message->message, 100) }} {{-- Limit message preview length --}}
                        </p>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    No messages to display.
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

    .message-item.unread {
        background-color: #fffde7; /* Light yellow for unread */
        border-left: 5px solid #ffeb3b; /* Yellow border for unread */
    }

    .message-item.unread .message-sender {
        font-weight: bold;
        color: #333;
    }

    .message-item.unread .message-subject {
        font-weight: 600;
    }

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
