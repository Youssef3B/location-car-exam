@extends('layouts.admin')

@section('content')

 <div class="main-content">
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
      <td>{{ $car->is_rental ? 'Yes' : 'No' }}</td>
      <td class="description-cell">{{ Str::limit($car->description, 50) ?? 'N/A' }}</td>
     <td>
  <button class="action-btn edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editCarModal"
          data-car-id="{{ $car->id }}"
          data-brand="{{ $car->brand }}"
          data-model="{{ $car->model }}"
          data-year="{{ $car->year }}"
          data-fuel-type="{{ $car->fuel_type }}"
          data-status="{{ $car->Status }}"
          data-mileage="{{ $car->mileage }}"
          data-price="{{ $car->price }}"
          data-pricerental="{{ $car->priceRental }}"
          data-is-rental="{{ $car->is_rental }}"
          data-description="{{ $car->description }}"
          data-image="{{ $car->image ? asset('storage/' . $car->image) : '' }}">
    <i class="fas fa-edit"></i>
  </button>
  <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="action-btn delete" title="Delete" onclick="return confirm('Are you sure you want to delete this car?')">
      <i class="fas fa-trash"></i>
    </button>
  </form>
</td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="mt-4">
  {{ $cars->links() }}
</div>
 </div>



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

<div class="modal fade" id="editCarModal" tabindex="-1" aria-labelledby="editCarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editCarForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="car_id" id="edit_car_id">

        <div class="modal-header">
          <h5 class="modal-title" id="editCarModalLabel">Edit Car</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" id="edit_brand" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Model</label>
            <input type="text" name="model" id="edit_model" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Year</label>
            <input type="number" name="year" id="edit_year" min="1900" max="{{ date('Y') + 1 }}" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Fuel Type</label>
            <select name="fuel_type" id="edit_fuel_type" class="form-select" required>
              <option value="Gasoline">Gasoline</option>
              <option value="Diesel">Diesel</option>
              <option value="Electric">Electric</option>
              <option value="Hybrid">Hybrid</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Mileage (km)</label>
            <input type="number" name="mileage" id="edit_mileage" min="0" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Buy Price ($)</label>
            <input type="number" step="0.01" min="0" name="price" id="edit_price" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Rental?</label>
            <select name="is_rental" id="edit_is_rental" class="form-select" required>
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>

                    <div class="col-md-6" id="edit_rental_price_group" style="display: none;">
            <label class="form-label">Rental Price/Day ($)</label>
            <input type="number" step="0.01" min="0" name="priceRental" id="edit_priceRental" class="form-control">
          </div>

          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="Status" id="edit_status" class="form-select" required>
              <option value="available">Available</option>
              <option value="under_review">Under Review</option>
              <option value="unavailable">Unavailable</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
          </div>
          <div class="col-12">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <div class="mt-2">
              <img id="edit_current_image" src="" class="img-thumbnail" style="max-width: 200px; display: none;">
              <small class="text-muted">Current image</small>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Car</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
  // Edit modal handler
  const editCarModal = document.getElementById('editCarModal');
  if (editCarModal) {
    editCarModal.addEventListener('show.bs.modal', function(event) {
      const button = event.relatedTarget; // Button that triggered the modal

      // Extract data from data-* attributes
      const carId = button.getAttribute('data-car-id');
      const brand = button.getAttribute('data-brand');
      const model = button.getAttribute('data-model');
      const year = button.getAttribute('data-year');
      const fuelType = button.getAttribute('data-fuel-type');
      const status = button.getAttribute('data-status');
      const mileage = button.getAttribute('data-mileage');
      const price = button.getAttribute('data-price');
      const priceRental = button.getAttribute('data-pricerental');
      const isRental = button.getAttribute('data-is-rental');
      const description = button.getAttribute('data-description');
      const image = button.getAttribute('data-image');

      // Update the modal's content
      document.getElementById('edit_car_id').value = carId;
      document.getElementById('edit_brand').value = brand;
      document.getElementById('edit_model').value = model;
      document.getElementById('edit_year').value = year;
      document.getElementById('edit_fuel_type').value = fuelType;
      document.getElementById('edit_status').value = status;
      document.getElementById('edit_mileage').value = mileage;
      document.getElementById('edit_price').value = price;
      document.getElementById('edit_priceRental').value = priceRental;
      document.getElementById('edit_is_rental').value = isRental;
      document.getElementById('edit_description').value = description;

      // Handle image display
      const currentImage = document.getElementById('edit_current_image');
      if (image) {
        currentImage.src = image;
        currentImage.style.display = 'block';
      } else {
        currentImage.style.display = 'none';
      }

      // Set form action
      document.getElementById('editCarForm').action = `/admin/cars/${carId}`;

      // Toggle rental price field
      toggleRentalPriceField(isRental);
    });
  }

  // Toggle rental price field based on is_rental value
  function toggleRentalPriceField(isRental) {
    const rentalGroup = document.getElementById('edit_rental_price_group');
    if (isRental === "1") {
      rentalGroup.style.display = "block";
    } else {
      rentalGroup.style.display = "none";
    }
  }

  // Handle rental select change in edit modal
  document.getElementById('edit_is_rental')?.addEventListener('change', function() {
    toggleRentalPriceField(this.value);
  });
});
</script>

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