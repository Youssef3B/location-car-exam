<!-- Sidebar Navigation -->
<div class="sidebar">
  <div class="sidebar-header">
    <h2><i class="fas fa-cog"></i> <span>Admin Panel</span></h2>
  </div>

  <nav class="nav-menu">
    <div class="nav-item">
      <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard Overview</span>
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
        <i class="fas fa-users"></i>
        <span>Manage Users</span>
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('admin.cars') }}" class="nav-link {{ request()->routeIs('admin.cars') ? 'active' : '' }}">
        <i class="fas fa-car"></i>
        <span>Manage Cars</span>
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('admin.rentals') }}" class="nav-link {{ request()->routeIs('admin.rentals') ? 'active' : '' }}">
        <i class="fas fa-calendar-check"></i>
        <span>Manage Rentals</span>
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('admin.sales') }}" class="nav-link {{ request()->routeIs('admin.sales') ? 'active' : '' }}">
        <i class="fas fa-shopping-bag"></i>
        <span>Manage Sales</span>
      </a>
    </div>
    <div class="nav-item">
      <a href="{{ route('admin.messages') }}" class="nav-link {{ request()->routeIs('admin.messages') ? 'active' : '' }}">
        <i class="fas fa-envelope"></i>
        <span>View Messages</span>
      </a>
    </div>
  </nav>
</div>