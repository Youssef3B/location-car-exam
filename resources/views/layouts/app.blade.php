<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://kit.fontawesome.com/yourkit.js" crossorigin="anonymous"></script>
</head>
<body>
  

  {{-- ✅ Include the global header --}}
  @include('partials.header')

  {{-- Main content --}}
  <main>
    @yield('content')
  </main>


  <!-- For Bootstrap alerts (if you're using Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
