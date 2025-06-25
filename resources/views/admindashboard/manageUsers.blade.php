@extends('layouts.admin')

@section('content')

 <div class="main-content">
    <!-- Manage Users Section -->
      <div class="dashboard-section" id="users">
        <h2 class="section-title">👥 Manage Users</h2>

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
            <tr>
              <td>
                <div class="user-info">
                  <img
                    src="https://randomuser.me/api/portraits/men/32.jpg"
                    class="user-avatar"
                  />
                  <div>
                    <div class="user-name">John Doe</div>
                    <div class="user-email">john.doe@example.com</div>
                  </div>
                </div>
              </td>
              <td>Jun 12, 2022</td>
              <td><span class="status-badge status-active">Active</span></td>
              <td>Premium</td>
              <td>
                <button class="action-btn edit">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="action-btn delete">
                  <i class="fas fa-ban"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="user-info">
                  <img
                    src="https://randomuser.me/api/portraits/women/44.jpg"
                    class="user-avatar"
                  />
                  <div>
                    <div class="user-name">Sarah Johnson</div>
                    <div class="user-email">sarah.j@example.com</div>
                  </div>
                </div>
              </td>
              <td>Mar 28, 2023</td>
              <td><span class="status-badge status-active">Active</span></td>
              <td>Standard</td>
              <td>
                <button class="action-btn edit">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="action-btn delete">
                  <i class="fas fa-ban"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="user-info">
                  <img
                    src="https://randomuser.me/api/portraits/men/22.jpg"
                    class="user-avatar"
                  />
                  <div>
                    <div class="user-name">Michael Chen</div>
                    <div class="user-email">michael.c@example.com</div>
                  </div>
                </div>
              </td>
              <td>Jan 15, 2023</td>
              <td><span class="status-badge status-blocked">Blocked</span></td>
              <td>Standard</td>
              <td>
                <button class="action-btn edit">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="action-btn delete">
                  <i class="fas fa-check"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="user-info">
                  <img
                    src="https://randomuser.me/api/portraits/women/68.jpg"
                    class="user-avatar"
                  />
                  <div>
                    <div class="user-name">Jessica Williams</div>
                    <div class="user-email">jessica.w@example.com</div>
                  </div>
                </div>
              </td>
              <td>May 5, 2023</td>
              <td><span class="status-badge status-active">Active</span></td>
              <td>Premium</td>
              <td>
                <button class="action-btn edit">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="action-btn delete">
                  <i class="fas fa-ban"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
@endsection
