<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/yourkit.js" crossorigin="anonymous"></script>
</head>
<body>
     <style>
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
        background-color: var(--light);
 
      }

      /* Sidebar Styles */
      .sidebar {
        width: 260px;
        background-color: var(--dark);
        color: white;
        padding: 20px 0;
        position: fixed;
        height: 100vh;
        transition: all 0.3s ease;
      }

      .sidebar-header {
        padding: 0 20px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 20px;
      }

      .sidebar-header h2 {
        font-size: 18px;
        display: flex;
        align-items: center;
      }

      .sidebar-header h2 i {
        margin-right: 10px;
        color: var(--secondary);
      }

      .nav-menu {
        padding: 0 15px;
      }

      .nav-item {
        margin-bottom: 5px;
      }

      .nav-link {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 15px;
        transition: all 0.2s ease;
      }

      .nav-link:hover,
      .nav-link.active {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
      }

      .nav-link i {
        font-size: 16px;
        margin-right: 12px;
        width: 20px;
        text-align: center;
      }

      /* Main Content Styles */
      .main-content {
        flex: 1;
        margin-left: 260px;
        padding: 30px;
        transition: all 0.3s ease;
      }

      .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
      }

      .page-title {
        font-size: 24px;
        color: var(--dark);
        font-weight: 600;
      }

      .admin-actions {
        display: flex;
        align-items: center;
        gap: 15px;
      }

      .search-bar {
        display: flex;
        align-items: center;
        background-color: white;
        border-radius: 8px;
        padding: 8px 15px;
        width: 300px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      }

      .search-bar input {
        border: none;
        outline: none;
        flex: 1;
        padding: 8px;
        font-size: 14px;
      }

      .search-bar i {
        color: var(--gray);
        margin-right: 10px;
      }

      .admin-profile {
        display: flex;
        align-items: center;
      }

      .admin-profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
      }

      .admin-name {
        font-weight: 500;
        font-size: 14px;
      }

      .admin-role {
        font-size: 12px;
        color: var(--gray);
      }

      /* Stats Cards */
      .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
      }

      .stat-card {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      }

      .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
      }

      .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
      }

      .stat-icon.users {
        background-color: #dbeafe;
        color: var(--primary);
      }

      .stat-icon.cars {
        background-color: #dcfce7;
        color: var(--success);
      }

      .stat-icon.rentals {
        background-color: #fef3c7;
        color: var(--secondary);
      }

      .stat-icon.sales {
        background-color: #fee2e2;
        color: var(--error);
      }

      .stat-title {
        font-size: 14px;
        color: var(--gray);
        font-weight: 500;
      }

      .stat-value {
        font-size: 24px;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 5px;
      }

      .stat-change {
        font-size: 12px;
        display: flex;
        align-items: center;
      }

      .stat-change.positive {
        color: var(--success);
      }

      .stat-change.negative {
        color: var(--error);
      }

      /* Data Tables */
      .data-table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
      }

      .data-table th {
        text-align: left;
        padding: 15px;
        background-color: #f8fafc;
        color: var(--dark);
        font-weight: 500;
        font-size: 14px;
      }

      .data-table td {
        padding: 15px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 14px;
        color: var(--dark);
      }

      .user-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
      }

      .user-info {
        display: flex;
        align-items: center;
      }

      .user-name {
        font-weight: 500;
        margin-bottom: 3px;
      }

      .user-email {
        font-size: 12px;
        color: var(--gray);
      }

      .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
      }

      .status-active {
        background-color: #dcfce7;
        color: var(--success);
      }

      .status-pending {
        background-color: #fef3c7;
        color: var(--secondary);
      }

      .status-blocked {
        background-color: #fee2e2;
        color: var(--error);
      }

      .action-btn {
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-right: 5px;
      }

      .action-btn.edit {
        background-color: #dbeafe;
        color: var(--primary);
      }

      .action-btn.delete {
        background-color: #fee2e2;
        color: var(--error);
      }

      .action-btn.approve {
        background-color: #dcfce7;
        color: var(--success);
      }

      .action-btn.reject {
        background-color: #fee2e2;
        color: var(--error);
      }

      .action-btn.view {
        background-color: #e0f2fe;
        color: var(--primary);
      }

      .action-btn:hover {
        opacity: 0.9;
      }

      .car-image {
        width: 60px;
        height: 40px;
        border-radius: 4px;
        object-fit: cover;
      }

      /* Message List */
      .message-list {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      }

      .message-item {
        display: flex;
        padding: 15px;
        border-bottom: 1px solid #e2e8f0;
        transition: all 0.2s ease;
      }

      .message-item:hover {
        background-color: #f8fafc;
      }

      .message-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
      }

      .message-content {
        flex: 1;
      }

      .message-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
      }

      .message-sender {
        font-weight: 600;
        font-size: 14px;
      }

      .message-time {
        font-size: 12px;
        color: var(--gray);
      }

      .message-subject {
        font-size: 14px;
        color: var(--dark);
        margin-bottom: 5px;
      }

      .message-preview {
        font-size: 13px;
        color: var(--gray);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }

      .unread .message-sender,
      .unread .message-subject {
        color: var(--primary);
        font-weight: 600;
      }

      /* Responsive Styles */
      @media (max-width: 992px) {
        .sidebar {
          width: 70px;
          overflow: hidden;
        }

        .sidebar-header h2 span {
          display: none;
        }

        .sidebar-header h2 i {
          margin-right: 0;
          font-size: 20px;
        }

        .nav-link span {
          display: none;
        }

        .nav-link {
          justify-content: center;
          padding: 15px 5px;
        }

        .nav-link i {
          margin-right: 0;
          font-size: 18px;
        }

        .main-content {
          margin-left: 70px;
        }
      }

      @media (max-width: 768px) {
        .header {
          flex-direction: column;
          align-items: flex-start;
          gap: 15px;
        }

        .admin-actions {
          width: 100%;
          justify-content: space-between;
        }

        .search-bar {
          width: 100%;
        }

        .stats-grid {
          grid-template-columns: 1fr 1fr;
        }

        .data-table {
          display: block;
          overflow-x: auto;
        }
      }

      @media (max-width: 576px) {
        .main-content {
          padding: 20px 15px;
        }

        .stats-grid {
          grid-template-columns: 1fr;
        }

        .admin-profile .admin-info {
          display: none;
        }
      }
    </style>

  {{-- ✅ Include the global header --}}
  @include('partials.sideBar')

  {{-- Main content --}}
  <main>
    @yield('content')
  </main>


  <!-- For Bootstrap alerts (if you're using Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>
