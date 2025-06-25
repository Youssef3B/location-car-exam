@extends('layouts.admin')

@section('content')

 <div class="main-content">
 <!-- Manage Cars Section -->

      <div class="dashboard-section" id="cars">
        <h2 class="section-title">🚗 Manage Cars</h2>
 <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCarModal">
    + Add Car
  </button>
  <table class="data-table">
  <thead>
    <tr>
      <th>Image</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Year</th>
      <th>Fuel Type</th>
      <th>Status</th>
      <th>Mileage</th>
      <th>Price</th>
      <th>Rental Price</th>
      <th>Is Rental</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cars as $car)
    <tr>
      <td>
        <div class="user-info">
<img 
  src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/100x60?text=No+Image' }}" 
  class="car-image"
  alt="{{ $car->brand }} {{ $car->model }}"
/>

        </div>
      </td>
      <td>{{ $car->brand }}</td>
      <td>{{ $car->model }}</td>
      <td>{{ $car->year }}</td>
      <td>{{ $car->fuel_type ?? 'N/A' }}</td>
      <td>
        <span class="status-badge status-{{ $car->Status == 'available' ? 'active' : 'blocked' }}">
          {{ ucfirst($car->Status) }}
        </span>
      </td>
      <td>{{ number_format($car->mileage, 0) ?? 'N/A' }} km</td>
      <td>${{ number_format($car->price, 2) }}</td>
      <td>${{ number_format($car->priceRental, 2) ?? 'N/A' }}</td>
      <td>{{ $car->isRental ? 'Yes' : 'No' }}</td>
      <td class="description-cell">{{ Str::limit($car->description, 50) ?? 'N/A' }}</td>
      <td>
        <button class="action-btn edit" title="Edit">
          <i class="fas fa-edit"></i>
        </button>
        <button class="action-btn delete" title="Delete">
          <i class="fas fa-trash"></i>
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="mt-4">
  {{ $cars->links() }}
</div>
 </div>



 <!-- Add Car Modal -->
<!-- Add Car Modal -->
<div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addCarModalLabel">Add New Car</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Model</label>
            <input type="text" name="model" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Year</label>
            <input type="number" name="year" min="1900" max="{{ date('Y') + 1 }}" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Fuel Type</label>
            <select name="fuel_type" class="form-select" required>
              <option value="Gasoline">Gasoline</option>
              <option value="Diesel">Diesel</option>
              <option value="Electric">Electric</option>
              <option value="Hybrid">Hybrid</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Mileage (km)</label>
            <input type="number" name="mileage" min="0" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Buy Price ($)</label>
            <input type="number" step="0.01" min="0" name="price" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Rental?</label>
            <select name="is_rental" class="form-select" id="is_rental_select" required>
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>

          <!-- Rental Price (Hidden by default) -->
          <div class="col-md-6" id="rental_price_group" style="display: none;">
            <label class="form-label">Rental Price/Day ($)</label>
            <input type="number" step="0.01" min="0" name="priceRental" class="form-control">
          </div>

          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="Status" class="form-select" required>
              <option value="available">Available</option>
              <option value="under_review">Under Review</option>
              <option value="unavailable">Unavailable</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
          </div>
          <div class="col-12">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add Car</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function () {
    const rentalSelect = document.getElementById("is_rental_select");
    const rentalGroup = document.getElementById("rental_price_group");

    rentalSelect.addEventListener("change", function () {
      if (this.value === "1") {
        rentalGroup.style.display = "block";
      } else {
        rentalGroup.style.display = "none";
      }
    });
  });
</script>

@endsection


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
