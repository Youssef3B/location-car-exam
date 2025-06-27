@extends('layouts.app')
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
        color: var(--dark);
        line-height: 1.6;
      }
       /* Header Styles */
    header {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 100;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
    }

    .logo {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .nav-links {
        display: flex;
        list-style: none;
    }

    .nav-links li {
        margin-left: 30px;
    }

    .nav-links a {
        text-decoration: none;
        color: var(--dark);
        font-weight: 600;
        transition: color 0.3s;
    }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
      }

      .about-header {
        text-align: center;
        margin: 40px 0;
      }

      .about-title {
        font-size: 42px;
        color: var(--dark);
        margin-bottom: 15px;
      }

      .about-subtitle {
        color: var(--gray);
        font-size: 20px;
        max-width: 700px;
        margin: 0 auto;
      }

      .hero-section {
        background: linear-gradient(
          135deg,
          var(--primary) 0%,
          var(--primary-dark) 100%
        );
        color: white;
        padding: 60px 30px;
        border-radius: 10px;
        margin-bottom: 50px;
        text-align: center;
      }

      .hero-title {
        font-size: 36px;
        margin-bottom: 20px;
      }

      .hero-text {
        font-size: 18px;
        max-width: 800px;
        margin: 0 auto 30px;
      }

      .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-bottom: 30px;
      }

      .section-title {
        font-size: 28px;
        color: var(--dark);
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
      }

      .section-title:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background-color: var(--primary);
        border-radius: 2px;
      }

      .mission-statement {
        font-size: 18px;
        line-height: 1.8;
        margin-bottom: 20px;
      }

      .values-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
        margin-top: 30px;
      }

      @media (min-width: 768px) {
        .values-grid {
          grid-template-columns: repeat(3, 1fr);
        }
      }

      .value-card {
        padding: 25px;
        border-radius: 8px;
        background-color: rgba(37, 99, 235, 0.05);
        transition: all 0.3s ease;
      }

      .value-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      }

      .value-icon {
        font-size: 40px;
        margin-bottom: 15px;
        color: var(--primary);
      }

      .value-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--dark);
      }

      .team-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
        margin-top: 30px;
      }

      @media (min-width: 576px) {
        .team-grid {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      @media (min-width: 992px) {
        .team-grid {
          grid-template-columns: repeat(4, 1fr);
        }
      }

      .team-member {
        text-align: center;
      }

      .team-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 15px;
        border: 4px solid var(--primary);
      }

      .team-name {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark);
      }

      .team-position {
        color: var(--gray);
        margin-bottom: 15px;
      }

      .stats-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
        margin-top: 40px;
      }

      @media (min-width: 768px) {
        .stats-container {
          grid-template-columns: repeat(4, 1fr);
        }
      }

      .stat-card {
        text-align: center;
        padding: 30px 20px;
        border-radius: 8px;
        background-color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .stat-number {
        font-size: 42px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 5px;
      }

      .stat-label {
        color: var(--gray);
        font-size: 16px;
      }

      .btn {
        padding: 12px 30px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        text-decoration: none;
      }

      .btn-primary {
        background-color: var(--primary);
        color: white;
      }

      .btn-primary:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
      }

      .cta-section {
        text-align: center;
        margin: 60px 0;
      }
    </style>

@section('content')

 <div class="container">
      <div class="about-header">
        <h1 class="about-title">🚗 About AutoDeals</h1>
        <p class="about-subtitle">
          Driving your automotive dreams forward with exceptional service and
          unbeatable deals since 2010
        </p>
      </div>

      <div class="hero-section">
        <h2 class="hero-title">Our Journey in the Automotive World</h2>
        <p class="hero-text">
          From a small local dealership to a trusted name in automotive sales
          and rentals, we've been committed to providing quality vehicles and
          exceptional customer service for over a decade.
        </p>
        <a href="#our-story" class="btn btn-primary">Discover Our Story</a>
      </div>

      <div class="card" id="our-story">
        <h2 class="section-title">Our Story</h2>
        <p class="mission-statement">
          Founded in 2010 by automotive enthusiasts, AutoDeals began as a
          single-lot dealership with just 10 pre-owned vehicles. Today, we
          operate multiple locations across the state, offering both new and
          pre-owned vehicles along with premium rental services.
        </p>
        <p class="mission-statement">
          What started as a passion project has grown into a thriving business
          that has helped over 15,000 customers find their perfect vehicle. Our
          growth has been fueled by our commitment to transparency, fair
          pricing, and building lasting relationships with our customers.
        </p>
      </div>

      <div class="card">
        <h2 class="section-title">Our Mission</h2>
        <p class="mission-statement">
          To simplify the car buying and rental experience by providing honest
          advice, competitive pricing, and exceptional service. We believe
          everyone deserves access to quality vehicles without the hassle
          traditionally associated with car dealerships.
        </p>

        <div class="values-grid">
          <div class="value-card">
            <div class="value-icon">🤝</div>
            <h3 class="value-title">Integrity</h3>
            <p>
              We believe in transparent pricing and honest advice, putting your
              needs before profits.
            </p>
          </div>
          <div class="value-card">
            <div class="value-icon">🏆</div>
            <h3 class="value-title">Excellence</h3>
            <p>
              Every vehicle in our inventory meets rigorous quality standards
              before being offered to you.
            </p>
          </div>
          <div class="value-card">
            <div class="value-icon">❤️</div>
            <h3 class="value-title">Passion</h3>
            <p>
              Our team genuinely loves cars and helping people find their
              perfect match.
            </p>
          </div>
        </div>
      </div>

      <div class="card">
        <h2 class="section-title">By The Numbers</h2>
        <div class="stats-container">
          <div class="stat-card">
            <div class="stat-number">13+</div>
            <div class="stat-label">Years in Business</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">15K+</div>
            <div class="stat-label">Happy Customers</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">500+</div>
            <div class="stat-label">Vehicles in Stock</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">24/7</div>
            <div class="stat-label">Customer Support</div>
          </div>
        </div>
      </div>

      <div class="card">
        <h2 class="section-title">Meet Our Team</h2>
        <p class="mission-statement">
          Our success comes from our people - a diverse team of automotive
          experts, customer service professionals, and technology enthusiasts
          working together to revolutionize your car buying experience.
        </p>

        <div class="team-grid">
          <div class="team-member">
            <img
              src="https://randomuser.me/api/portraits/men/32.jpg"
              alt="John Doe"
              class="team-photo"
            />
            <h3 class="team-name">John Doe</h3>
            <p class="team-position">Founder & CEO</p>
            <p>25+ years in automotive industry</p>
          </div>
          <div class="team-member">
            <img
              src="https://randomuser.me/api/portraits/women/44.jpg"
              alt="Jane Smith"
              class="team-photo"
            />
            <h3 class="team-name">Jane Smith</h3>
            <p class="team-position">Sales Director</p>
            <p>Specializes in luxury vehicles</p>
          </div>
          <div class="team-member">
            <img
              src="https://randomuser.me/api/portraits/men/75.jpg"
              alt="Mike Johnson"
              class="team-photo"
            />
            <h3 class="team-name">Mike Johnson</h3>
            <p class="team-position">Rental Manager</p>
            <p>10 years with AutoDeals</p>
          </div>
          <div class="team-member">
            <img
              src="https://randomuser.me/api/portraits/women/68.jpg"
              alt="Sarah Williams"
              class="team-photo"
            />
            <h3 class="team-name">Sarah Williams</h3>
            <p class="team-position">Customer Support</p>
            <p>Your go-to for any questions</p>
          </div>
        </div>
      </div>

      <div class="cta-section">
        <h2
          class="section-title"
          style="text-align: center; margin-bottom: 30px"
        >
          Ready to Find Your Perfect Vehicle?
        </h2>
        <a href="#" class="btn btn-primary">Browse Our Inventory</a>
      </div>
    </div>
@endsection