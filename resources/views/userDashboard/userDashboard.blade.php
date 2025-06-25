<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard</title>
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
        background-color: #f1f5f9;
        display: flex;
        min-height: 100vh;
      }

      /* Sidebar Styles */
      .sidebar {
        width: 260px;
        background-color: white;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 20px 0;
        position: fixed;
        height: 100vh;
        transition: all 0.3s ease;
      }

      .sidebar-header {
        display: flex;
        align-items: center;
        padding: 0 20px 20px;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 20px;
      }

      .sidebar-header img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 12px;
      }

      .user-info h3 {
        font-size: 16px;
        color: var(--dark);
        margin-bottom: 4px;
      }

      .user-info p {
        font-size: 13px;
        color: var(--gray);
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
        color: var(--dark);
        text-decoration: none;
        font-size: 15px;
        transition: all 0.2s ease;
      }

      .nav-link:hover,
      .nav-link.active {
        background-color: #eff6ff;
        color: var(--primary);
      }

      .nav-link i {
        font-size: 18px;
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

      .dashboard-section {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      }

      .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e2e8f0;
      }

      .section-title {
        font-size: 18px;
        color: var(--dark);
        font-weight: 600;
      }

      .view-all {
        color: var(--primary);
        font-size: 14px;
        text-decoration: none;
      }

      .view-all:hover {
        text-decoration: underline;
      }

      /* My Rentals Table */
      .rentals-table {
        width: 100%;
        border-collapse: collapse;
      }

      .rentals-table th {
        text-align: left;
        padding: 12px 15px;
        background-color: #f8fafc;
        color: var(--dark);
        font-weight: 500;
        font-size: 14px;
      }

      .rentals-table td {
        padding: 15px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 14px;
        color: var(--dark);
      }

      .status {
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

      .status-completed {
        background-color: #e0f2fe;
        color: var(--primary);
      }

      .status-cancelled {
        background-color: #fee2e2;
        color: var(--error);
      }

      .car-info {
        display: flex;
        align-items: center;
      }

      .car-image {
        width: 50px;
        height: 50px;
        border-radius: 6px;
        object-fit: cover;
        margin-right: 15px;
      }

      .car-name {
        font-weight: 500;
        margin-bottom: 3px;
      }

      .car-model {
        font-size: 13px;
        color: var(--gray);
      }

      .action-btn {
        padding: 8px 15px;
        border-radius: 6px;
        border: none;
        background-color: #eff6ff;
        color: var(--primary);
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s ease;
      }

      .action-btn:hover {
        background-color: #dbeafe;
      }

      /* My Purchases Grid */
      .purchases-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
      }

      .purchase-card {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
      }

      .purchase-card:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      }

      .purchase-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
      }

      .purchase-details {
        padding: 15px;
      }

      .purchase-title {
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 15px;
      }

      .purchase-date {
        font-size: 13px;
        color: var(--gray);
        margin-bottom: 10px;
      }

      .purchase-price {
        font-weight: 600;
        color: var(--success);
      }

      /* Messages List */
      .messages-list {
        max-height: 400px;
        overflow-y: auto;
      }

      .message-item {
        display: flex;
        padding: 15px;
        border-bottom: 1px solid #e2e8f0;
        cursor: pointer;
        transition: all 0.2s ease;
      }

      .message-item:hover {
        background-color: #f8fafc;
      }

      .message-item.unread {
        background-color: #eff6ff;
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

      .message-preview {
        font-size: 13px;
        color: var(--dark);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }

      .unread .message-sender {
        color: var(--primary);
      }

      /* Profile Settings Form */
      .profile-form .form-group {
        margin-bottom: 20px;
      }

      .profile-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        font-size: 14px;
        color: var(--dark);
      }

      .profile-form input,
      .profile-form select,
      .profile-form textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
      }

      .profile-form input:focus,
      .profile-form select:focus,
      .profile-form textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
      }

      .form-row {
        display: flex;
        gap: 20px;
      }

      .form-row .form-group {
        flex: 1;
      }

      .profile-image-upload {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
      }

      .profile-image-preview {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 20px;
        border: 2px solid #e2e8f0;
      }

      .upload-btn {
        padding: 10px 15px;
        background-color: #eff6ff;
        color: var(--primary);
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
      }

      .upload-btn:hover {
        background-color: #dbeafe;
      }

      .save-btn {
        padding: 12px 25px;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .save-btn:hover {
        background-color: var(--primary-dark);
      }

      /* Post a Car Form */
      .car-form .form-group {
        margin-bottom: 20px;
      }

      .car-images-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
      }

      .image-preview-item {
        position: relative;
        width: 120px;
        height: 90px;
        border-radius: 8px;
        overflow: hidden;
      }

      .image-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .remove-image {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(239, 68, 68, 0.8);
        color: white;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        cursor: pointer;
      }

      .image-upload-area {
        border: 2px dashed #e2e8f0;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 20px;
      }

      .image-upload-area:hover {
        border-color: var(--primary);
        background-color: #f8fafc;
      }

      .image-upload-area i {
        font-size: 24px;
        color: var(--gray);
        margin-bottom: 10px;
      }

      .image-upload-text {
        font-size: 14px;
        color: var(--gray);
      }

      .image-upload-text span {
        color: var(--primary);
        font-weight: 500;
      }

      .submit-btn {
        padding: 12px 25px;
        background-color: var(--success);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .submit-btn:hover {
        background-color: #0d9f6e;
      }

      /* Mobile Responsiveness */
      @media (max-width: 992px) {
        .sidebar {
          width: 70px;
          overflow: hidden;
        }

        .sidebar-header,
        .user-info,
        .nav-link span {
          display: none;
        }

        .nav-link {
          justify-content: center;
          padding: 15px 5px;
        }

        .nav-link i {
          margin-right: 0;
          font-size: 20px;
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

        .search-bar {
          width: 100%;
        }

        .form-row {
          flex-direction: column;
          gap: 20px;
        }

        .rentals-table {
          display: block;
          overflow-x: auto;
        }
      }

      @media (max-width: 576px) {
        .main-content {
          padding: 20px 15px;
        }

        .dashboard-section {
          padding: 20px;
        }

        .purchases-grid {
          grid-template-columns: 1fr;
        }
      }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
  </head>
  <body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">
      <div class="sidebar-header">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" />
        <div class="user-info">
          <h3>John Doe</h3>
          <p>Premium Member</p>
        </div>
      </div>

      <nav class="nav-menu">
        <div class="nav-item">
          <a href="#dashboard" class="nav-link active">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#rentals" class="nav-link">
            <i class="fas fa-car"></i>
            <span>My Rentals</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#purchases" class="nav-link">
            <i class="fas fa-shopping-bag"></i>
            <span>My Purchases</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#messages" class="nav-link">
            <i class="fas fa-envelope"></i>
            <span>Messages</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#settings" class="nav-link">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#post-car" class="nav-link">
            <i class="fas fa-plus-circle"></i>
            <span>Post a Car</span>
          </a>
        </div>
      </nav>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
      <div class="header">
        <h1 class="page-title">👤 User Dashboard</h1>
        <div class="search-bar">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Search..." />
        </div>
      </div>

      <!-- My Rentals Section -->
      <div class="dashboard-section" id="rentals">
        <div class="section-header">
          <h2 class="section-title">📂 My Rentals</h2>
          <a href="#" class="view-all">View All</a>
        </div>

        <div class="table-responsive">
          <table class="rentals-table">
            <thead>
              <tr>
                <th>Car</th>
                <th>Rental Dates</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="car-info">
                    <img
                      src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                      class="car-image"
                    />
                    <div>
                      <div class="car-name">Ford Mustang</div>
                      <div class="car-model">2020 GT Premium</div>
                    </div>
                  </div>
                </td>
                <td>Jun 15 - Jun 20, 2023</td>
                <td>$350</td>
                <td><span class="status status-active">Active</span></td>
                <td><button class="action-btn">Details</button></td>
              </tr>
              <tr>
                <td>
                  <div class="car-info">
                    <img
                      src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                      class="car-image"
                    />
                    <div>
                      <div class="car-name">Porsche 911</div>
                      <div class="car-model">2022 Carrera S</div>
                    </div>
                  </div>
                </td>
                <td>May 1 - May 5, 2023</td>
                <td>$600</td>
                <td><span class="status status-completed">Completed</span></td>
                <td><button class="action-btn">Details</button></td>
              </tr>
              <tr>
                <td>
                  <div class="car-info">
                    <img
                      src="https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                      class="car-image"
                    />
                    <div>
                      <div class="car-name">BMW M5</div>
                      <div class="car-model">2021 Competition</div>
                    </div>
                  </div>
                </td>
                <td>Apr 10 - Apr 15, 2023</td>
                <td>$450</td>
                <td><span class="status status-cancelled">Cancelled</span></td>
                <td><button class="action-btn">Details</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- My Purchases Section -->
      <div class="dashboard-section" id="purchases">
        <div class="section-header">
          <h2 class="section-title">🛒 My Purchases</h2>
          <a href="#" class="view-all">View All</a>
        </div>

        <div class="purchases-grid">
          <div class="purchase-card">
            <img
              src="https://images.unsplash.com/photo-1553440569-bcc63803a83d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
              class="purchase-image"
            />
            <div class="purchase-details">
              <h3 class="purchase-title">Tesla Model 3</h3>
              <p class="purchase-date">Purchased on May 12, 2023</p>
              <p class="purchase-price">$48,490</p>
            </div>
          </div>

          <div class="purchase-card">
            <img
              src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
              class="purchase-image"
            />
            <div class="purchase-details">
              <h3 class="purchase-title">Jeep Wrangler</h3>
              <p class="purchase-date">Purchased on Mar 28, 2022</p>
              <p class="purchase-price">$32,500</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Messages Section -->
      <div class="dashboard-section" id="messages">
        <div class="section-header">
          <h2 class="section-title">💬 Messages</h2>
          <a href="#" class="view-all">View All</a>
        </div>

        <div class="messages-list">
          <div class="message-item unread">
            <img
              src="https://randomuser.me/api/portraits/women/44.jpg"
              class="message-avatar"
            />
            <div class="message-content">
              <div class="message-header">
                <span class="message-sender"
                  >Sarah Johnson (Toyota Dealership)</span
                >
                <span class="message-time">2 hours ago</span>
              </div>
              <p class="message-preview">
                Hi John, I wanted to follow up about your test drive appointment
                tomorrow at 2pm. Please bring your driver's license...
              </p>
            </div>
          </div>

          <div class="message-item">
            <img
              src="https://randomuser.me/api/portraits/men/22.jpg"
              class="message-avatar"
            />
            <div class="message-content">
              <div class="message-header">
                <span class="message-sender">Michael Chen (Support)</span>
                <span class="message-time">1 day ago</span>
              </div>
              <p class="message-preview">
                Your recent support ticket #45782 about the payment issue has
                been resolved. Please let us know if you have any other
                questions...
              </p>
            </div>
          </div>

          <div class="message-item">
            <img
              src="https://randomuser.me/api/portraits/women/68.jpg"
              class="message-avatar"
            />
            <div class="message-content">
              <div class="message-header">
                <span class="message-sender"
                  >Jessica Williams (BMW Rental)</span
                >
                <span class="message-time">3 days ago</span>
              </div>
              <p class="message-preview">
                Thank you for renting with us! We hope you enjoyed your BMW M5.
                Would you like to leave a review about your experience...
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Profile Settings Section -->
      <div class="dashboard-section" id="settings">
        <div class="section-header">
          <h2 class="section-title">⚙️ Profile Settings</h2>
        </div>

        <form class="profile-form">
          <div class="profile-image-upload">
            <img
              src="https://randomuser.me/api/portraits/men/32.jpg"
              class="profile-image-preview"
            />
            <button type="button" class="upload-btn">
              <i class="fas fa-camera"></i> Change Photo
            </button>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="first-name">First Name</label>
              <input type="text" id="first-name" value="John" />
            </div>
            <div class="form-group">
              <label for="last-name">Last Name</label>
              <input type="text" id="last-name" value="Doe" />
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" value="john.doe@example.com" />
          </div>

          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" value="+1 (555) 123-4567" />
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input
              type="text"
              id="address"
              value="123 Main St, New York, NY 10001"
            />
          </div>

          <div
            class="section-header"
            style="margin-top: 30px; margin-bottom: 20px"
          >
            <h2 class="section-title">Change Password</h2>
          </div>

          <div class="form-group">
            <label for="current-password">Current Password</label>
            <input
              type="password"
              id="current-password"
              placeholder="Enter current password"
            />
          </div>

          <div class="form-group">
            <label for="new-password">New Password</label>
            <input
              type="password"
              id="new-password"
              placeholder="Enter new password"
            />
          </div>

          <div class="form-group">
            <label for="confirm-password">Confirm New Password</label>
            <input
              type="password"
              id="confirm-password"
              placeholder="Confirm new password"
            />
          </div>

          <button type="submit" class="save-btn">Save Changes</button>
        </form>
      </div>

      <!-- Post a Car Section -->
      <div class="dashboard-section" id="post-car">
        <div class="section-header">
          <h2 class="section-title">➕ Post a Car</h2>
        </div>

        <form class="car-form">
          <div class="form-row">
            <div class="form-group">
              <label for="car-make">Make</label>
              <input type="text" id="car-make" placeholder="e.g. Toyota" />
            </div>
            <div class="form-group">
              <label for="car-model">Model</label>
              <input type="text" id="car-model" placeholder="e.g. Camry" />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="car-year">Year</label>
              <input type="number" id="car-year" placeholder="e.g. 2020" />
            </div>
            <div class="form-group">
              <label for="car-price">Daily Price ($)</label>
              <input type="number" id="car-price" placeholder="e.g. 50" />
            </div>
          </div>

          <div class="form-group">
            <label for="car-location">Location</label>
            <input
              type="text"
              id="car-location"
              placeholder="Where is the car located?"
            />
          </div>

          <div class="form-group">
            <label for="car-description">Description</label>
            <textarea
              id="car-description"
              rows="4"
              placeholder="Tell potential renters about your car..."
            ></textarea>
          </div>

          <div class="form-group">
            <label>Car Images</label>
            <div class="image-upload-area">
              <i class="fas fa-cloud-upload-alt"></i>
              <p class="image-upload-text">
                Drag & drop images here or <span>browse</span>
              </p>
            </div>

            <div class="car-images-preview">
              <!-- Images would appear here after upload -->
            </div>
          </div>

          <button type="submit" class="submit-btn">Post Car Listing</button>
        </form>
      </div>
    </div>
  </body>
</html>
