@extends('layouts.admin')

@section('content')

 <div class="main-content">
 <!-- Manage Rentals Section -->
      <div class="dashboard-section" id="rentals">
        <h2 class="section-title">📄 Manage Rentals</h2>

        <table class="data-table">
          <thead>
            <tr>
              <th>Rental ID</th>
              <th>Car</th>
              <th>Renter</th>
              <th>Dates</th>
              <th>Total</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#R7852</td>
              <td>Ford Mustang</td>
              <td>Robert Smith</td>
              <td>Jun 15-20, 2023</td>
              <td>$600</td>
              <td><span class="status-badge status-pending">Pending</span></td>
              <td>
                <button class="action-btn approve">
                  <i class="fas fa-check"></i>
                </button>
                <button class="action-btn reject">
                  <i class="fas fa-times"></i>
                </button>
                <button class="action-btn view">
                  <i class="fas fa-eye"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>#R7841</td>
              <td>Porsche 911</td>
              <td>Emily Davis</td>
              <td>Jun 18-22, 2023</td>
              <td>$1,000</td>
              <td><span class="status-badge status-active">Approved</span></td>
              <td>
                <button class="action-btn edit">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="action-btn delete">
                  <i class="fas fa-times"></i>
                </button>
                <button class="action-btn view">
                  <i class="fas fa-eye"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>#R7829</td>
              <td>Tesla Model 3</td>
              <td>David Wilson</td>
              <td>Jun 10-15, 2023</td>
              <td>$450</td>
              <td><span class="status-badge status-active">Completed</span></td>
              <td>
                <button class="action-btn view">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="action-btn delete">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>#R7815</td>
              <td>Jeep Wrangler</td>
              <td>Lisa Brown</td>
              <td>Jun 5-12, 2023</td>
              <td>$770</td>
              <td>
                <span class="status-badge status-blocked">Cancelled</span>
              </td>
              <td>
                <button class="action-btn view">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="action-btn delete">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
@endsection
