<!-- resources/views/partials/header.blade.php -->
<style>
    /* User dropdown styles */
.user-dropdown {
  position: relative;
  margin-left: auto;
  cursor: pointer;
}

.user-profile {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 5px 10px;
  border-radius: 20px;
  transition: background-color 0.2s;
}

.user-profile:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

.user-avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.avatar-placeholder {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background-color: #4a6bff;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 16px;
}

.user-name {
  font-weight: 500;
  font-size: 14px;
}

.dropdown-arrow {
  font-size: 12px;
  transition: transform 0.3s ease;
  color: #666;
}

.user-dropdown:hover .dropdown-arrow {
  transform: rotate(180deg);
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  right: 0;
  background: white;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  min-width: 220px;
  padding: 8px 0;
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
  z-index: 1000;
}

.user-dropdown:hover .dropdown-menu {
  opacity: 1;
  visibility: visible;
  margin-top: 5px;
}

.dropdown-menu li {
  padding: 8px 16px;
  transition: background 0.2s;
}

.dropdown-menu li:hover {
  background: #f8f9fa;
}

.dropdown-menu a {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #333;
  text-decoration: none;
  font-size: 14px;
}

.dropdown-menu i {
  width: 18px;
  text-align: center;
  color: #6c757d;
}

.logout-btn {
  background: none;
  border: none;
  padding: 0;
  font: inherit;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 10px;
  color: #333;
  width: 100%;
  text-align: left;
}

/* Auth buttons when not logged in */
.auth-buttons {
  display: flex;
  gap: 12px;
  margin-left: auto;
  align-items: center;
}

.login-btn, .register-btn {
  padding: 8px 16px;
  border-radius: 4px;
  text-decoration: none;
  font-weight: 500;
  font-size: 14px;
  transition: all 0.2s;
}

.login-btn {
  color: #333;
  border: 1px solid #ddd;
}

.login-btn:hover {
  background-color: #f8f9fa;
}

.register-btn {
  background: #4a6bff;
  color: white;
}

.register-btn:hover {
  background: #3a5bef;
  transform: translateY(-1px);
}

/* Mobile menu button */
.mobile-menu-btn {
  display: none;
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  margin-left: auto;
  color: #333;
}

@media (max-width: 768px) {
  .nav-links, .auth-buttons, .user-dropdown {
    display: none;
  }
  
  .mobile-menu-btn {
    display: block;
  }
  
  .navbar {
    flex-wrap: wrap;
  }
  
  .nav-links.active {
    display: flex;
    flex-direction: column;
    width: 100%;
    margin-top: 15px;
  }
  
  .auth-buttons.active, .user-dropdown.active {
    display: flex;
    width: 100%;
    margin-top: 15px;
  }
  
  .dropdown-menu {
    position: static;
    box-shadow: none;
    margin-top: 10px;
  }
}
</style>
<header>
  <div class="container">
    <nav class="navbar">
      <a href="#" class="logo"> <i class="fas fa-car"></i> AutoDrive </a>
      <ul class="nav-links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('cars') }}">Buy Cars</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>

      @auth
      <div class="user-dropdown">
        <div class="user-profile">
          @if(Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="User Avatar" class="user-avatar">
          @else
            <div class="avatar-placeholder">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
          @endif
          <span class="user-name">{{ Auth::user()->name }}</span>
          <i class="fas fa-chevron-down dropdown-arrow"></i>
        </div>
        <ul class="dropdown-menu">
          @if(Auth::user()->role === 'admin')
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</a></li>
          @endif
          <li><a href="{{ route('edituser') }}"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
          <li><a href="{{ route('history') }}"><i class="fas fa-user-edit"></i> History</a></li>
     
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
      @else
      <div class="auth-buttons">
        <a href="{{ route('login') }}" class="login-btn">Login</a>
        <a href="{{ route('register') }}" class="register-btn">Register</a>
      </div>
      @endauth

      <button class="mobile-menu-btn">
        <i class="fas fa-bars"></i>
      </button>
    </nav>
  </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
  const navLinks = document.querySelector('.nav-links');
  const authButtons = document.querySelector('.auth-buttons');
  const userDropdown = document.querySelector('.user-dropdown');

  mobileMenuBtn.addEventListener('click', function() {
    // Toggle mobile menu
    navLinks.classList.toggle('active');
    
    // Toggle auth buttons or user dropdown based on login status
    if (authButtons) {
      authButtons.classList.toggle('active');
    }
    if (userDropdown) {
      userDropdown.classList.toggle('active');
    }
    
    // Toggle mobile menu icon
    const icon = this.querySelector('i');
    if (icon.classList.contains('fa-bars')) {
      icon.classList.remove('fa-bars');
      icon.classList.add('fa-times');
    } else {
      icon.classList.remove('fa-times');
      icon.classList.add('fa-bars');
    }
  });
  
  // Close dropdown when clicking outside
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.user-dropdown') && userDropdown) {
      const dropdownMenu = userDropdown.querySelector('.dropdown-menu');
      dropdownMenu.style.opacity = '0';
      dropdownMenu.style.visibility = 'hidden';
    }
  });
});
</script>