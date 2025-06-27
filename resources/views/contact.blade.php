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
        --error: #ef4444;
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
        padding-top: 80px;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .btn {
        display: inline-block;
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-primary {
        background-color: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
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

    /* Contact Page Specific Styles */
    .contact-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 20px;
    }

    .contact-card {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        padding: 40px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
    }

    @media (min-width: 992px) {
        .contact-card {
            grid-template-columns: 1fr 1.5fr;
        }
    }

    .contact-info {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 40px;
        border-radius: 12px;
    }

    .page-header {
        margin-bottom: 40px;
    }

    .page-title {
        font-size: 2.5rem;
        color: white;
        margin-bottom: 15px;
        position: relative;
        padding-bottom: 15px;
    }

    .page-title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background-color: var(--secondary);
    }

    .page-subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        line-height: 1.7;
    }

    .contact-methods {
        display: grid;
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .contact-method {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 20px;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .contact-method:hover {
        transform: translateY(-5px);
        background-color: rgba(255, 255, 255, 0.15);
    }

    .contact-icon {
        font-size: 24px;
        background-color: rgba(255, 255, 255, 0.2);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .contact-details {
        flex-grow: 1;
    }

    .contact-label {
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 1.1rem;
    }

    .contact-value {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1rem;
    }

    .contact-form-section {
        padding: 20px 0;
    }

    .form-header {
        margin-bottom: 30px;
    }

    .form-title {
        font-size: 1.8rem;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .form-subtitle {
        color: var(--gray);
        font-size: 1rem;
    }

    .contact-form {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: var(--dark);
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 14px 18px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f8fafc;
    }

    .form-control:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        background-color: white;
    }

    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
    }

    .form-actions {
        margin-top: 30px;
    }

    .btn-submit {
        width: 100%;
        padding: 16px;
        font-size: 1.1rem;
        background-color: var(--primary);
        color: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-submit:hover {
        background-color: var(--primary-dark);
    }

    .status-message {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
        text-align: center;
        font-weight: 500;
    }

    .status-message.success {
        background-color: rgba(16, 185, 129, 0.1);
        color: var(--success);
    }

    .status-message.error {
        background-color: rgba(239, 68, 68, 0.1);
        color: var(--error);
    }

    /* Error message specific for validation */
    .invalid-feedback {
        color: var(--error);
        font-size: 0.85rem;
        margin-top: 5px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .contact-card {
            padding: 30px 20px;
        }
        
        .contact-info {
            padding: 30px 20px;
        }
        
        .page-title {
            font-size: 2rem;
        }
    }
</style>

@section('content')
<div class="contact-container">
    <div class="contact-card">
        <div class="contact-info">
            <div class="page-header">
                <h1 class="page-title">Contact AutoDrive</h1>
                <p class="page-subtitle">We're here to help you with any questions about our vehicles, services, or anything else.</p>
            </div>

            <div class="contact-methods">
                <div class="contact-method">
                    <div class="contact-icon">📧</div>
                    <div class="contact-details">
                        <div class="contact-label">Email Us</div>
                        <div class="contact-value">support@autodrive.com</div>
                    </div>
                </div>
                <div class="contact-method">
                    <div class="contact-icon">📱</div>
                    <div class="contact-details">
                        <div class="contact-label">Call Us</div>
                        <div class="contact-value">(800) 555-AUTO</div>
                    </div>
                </div>
                <div class="contact-method">
                    <div class="contact-icon">🏢</div>
                    <div class="contact-details">
                        <div class="contact-label">Visit Us</div>
                        <div class="contact-value">123 Auto Drive, San Francisco, CA 94107</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form-section">
            <div class="form-header">
                <h2 class="form-title">Send us a message</h2>
                <p class="form-subtitle">Fill out the form below and we'll get back to you as soon as possible.</p>
            </div>

            {{-- Session-based Status Messages --}}
            @if(session('success'))
                <div class="status-message success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="status-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                @csrf {{-- CSRF token for security --}}

                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="John Doe" value="{{ old('name') }}" required />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com" value="{{ old('email') }}" required />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" required>
                        <option value="">Select a subject</option>
                        <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Technical Support</option>
                        <option value="sales" {{ old('subject') == 'sales' ? 'selected' : '' }}>Sales Inquiry</option>
                        <option value="rental" {{ old('subject') == 'rental' ? 'selected' : '' }}>Rental Questions</option>
                        <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                        <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" placeholder="How can we help you?" required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">
                        <span>Send Message</span> 📤
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection