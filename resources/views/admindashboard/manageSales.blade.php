@extends('layouts.admin')

@section('content')

 <div class="main-content">
  <!-- Manage Sales Section -->
      <div class="dashboard-section" id="sales">
        <h2 class="section-title">💰 Manage Sales</h2>

        <table class="data-table">
          <thead>
            <tr>
              <th>Sale ID</th>
              <th>Car</th>
              <th>Buyer</th>
              <th>Seller</th>
              <th>Date</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#S1245</td>
              <td>BMW M5</td>
              <td>Michael Chen</td>
              <td>Premium Motors</td>
              <td>Jun 10, 2023</td>
              <td>$72,500</td>
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
              <td>#S1238</td>
              <td>Audi Q7</td>
              <td>Sarah Johnson</td>
              <td>Luxury Auto</td>
              <td>May 28, 2023</td>
              <td>$65,200</td>
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
              <td>#S1221</td>
              <td>Mercedes GLE</td>
              <td>John Doe</td>
              <td>German Auto Group</td>
              <td>May 15, 2023</td>
              <td>$58,750</td>
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
              <td>#S1209</td>
              <td>Land Rover Defender</td>
              <td>Jessica Williams</td>
              <td>British Motors</td>
              <td>Apr 30, 2023</td>
              <td>$81,300</td>
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
