@extends('layouts.app')

 <style>
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #166088;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --border-color: #ddd;
            --error-color: #dc3545;
            --success-color: #28a745;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: var(--dark-color);
            line-height: 1.6;
        }
          /* Header Styles */


 /* Header Styles */


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
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--secondary-color);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.2);
        }

        .avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
            border: 3px solid var(--border-color);
        }

        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .btn:hover {
            background: var(--secondary-color);
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .select-role {
            padding: 0.75rem;
            border-radius: 4px;
            border: 1px solid var(--border-color);
            width: 100%;
            font-size: 1rem;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            .container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .form-footer {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>

@section('content')
<div class="container">
    <h1>Edit User</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('edituser.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>
        
        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>
        
        <!-- Password Field -->
        <div class="form-group">
            <label for="password">Password (Leave blank to keep current)</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>
        
        <!-- Phone Number Field -->
        <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber', $user->phoneNumber ?? '') }}">
            @error('phoneNumber')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-footer">
            <button type="button" class="btn" style="background: #6c757d;">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection