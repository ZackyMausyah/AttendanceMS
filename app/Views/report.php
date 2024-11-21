<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title><?= $title ?></title>
  <style>
    /* Global Styles */
    body {
      font-family: 'Poppins', sans-serif;
      transition: margin-left 0.3s;
      overflow-x: hidden;
    }

    /* Hamburger Button Styles */
    .hamburger-btn {
      display: none;
      position: fixed;
      top: 1rem;
      left: 1rem;
      z-index: 1050;
      border: none;
      background: #9D9FE6;
      color: white;
      padding: 0.5rem;
      border-radius: 4px;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Sidebar Styles */
    .sidebar {
      width: 270px;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      overflow-y: auto;
      transition: transform 0.3s ease;
      background: white;
      z-index: 1040;
    }

    .sidebar.collapsed {
      width: 60px;
    }

    .logo-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 30px;
    }

    .logo {
      width: 45px;
      height: 45px;
      margin-right: 10px;
      transition: margin 0.3s;
    }

    .nav-link {
      color: black;
      border-radius: 20px;
      padding: 12px;
      transition: all 0.3s;
      white-space: nowrap;
      overflow: hidden;
    }

    .nav-link:hover {
      background-color: #9D9FE6;
      color: white;
    }

    .sidebar .active {
      background-color: #9D9FE6;
      color: #fff;
      border-radius: 20px;
    }

    /* Close Button Styles */
    .close-btn {
      display: none;
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: transparent;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      color: #666;
    }

    /* Content Styles */
    .content {
      margin-left: 270px;
      padding: 20px;
      transition: margin-left 0.3s ease;
    }

    .content.expanded {
      margin-left: 60px;
    }

    /* Card Styles */
    .card {
      bottom: 35px;
      border-radius: 20px;
      width: 100%;
      height: auto;
      max-width: 350px;
      border: 0;
      margin-bottom: 20px;
    }

    /* Chart Styles */
    .chart-container {
      background-color: #F8F8F8;
      border-radius: 20px;
      margin-bottom: 30px;
      margin-top: -20px;
      padding: 20px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .pie-chart {
      width: 100%;
      height: auto;
      margin-bottom: 20px;
    }

    .pie-chart-container {
      margin-top: -230px;
    }

    .bar-chart {
      width: 100px;
      height: auto;
      margin-bottom: 30px;
      border-radius: 15px;
    }

    /* Progress Bar Styles */
    .progress {
      height: 15px;
      border-radius: 0;
      margin-bottom: 15px;
    }

    .progress-label {
      margin-bottom: 10px;
      font-size: 14px;
    }

    /* User Card Styles */
    .user-card {
      background-color: #B7B8E980;
      border-radius: 15px;
      padding: 15px;
      display: flex;
      align-items: center;
      max-width: 350px;
      height: 90px;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .user-card img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .user-info {
      margin-left: 15px;
      flex-grow: 1;
    }

    .user-info h6 {
      margin: 0;
      font-weight: 600;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
    }

    .user-info p {
      margin-top: 2px;
      color: gray;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
    }

    .btn-sm {
      padding: 5px 10px;
      color: #fff;
      background-color: #9D9FE6;
      border-color: #9D9FE6;
      cursor: pointer;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      height: 38px;
      font-size: 16px;
    }

    .btn-sm:hover {
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
      color: #fff;
      background-color: #9D9FE6;
      border-color: #9D9FE6;
    }

    .btn-sm:onclick {
      border-color: 0;
    }

    /* Responsive Styles */
    @media (max-width: 991.98px) {
      .hamburger-btn {
        display: block;
      }

      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.active {
        transform: translateX(0);
      }

      .close-btn {
        display: block;
      }

      .content {
        margin-left: 0 !important;
        padding-top: 60px;
      }

      .stats-container {
        flex-direction: column;
      }

      .stats-container .col-md-3 {
        width: 100%;
      }

      .card {
        width: 100% !important;
        margin-bottom: 20px;
      }

      .chart-container {
        margin-top: 20px !important;
      }

      .pie-chart-container {
        margin-top: 20px !important;
      }

      .user-card {
        width: 100%;
      }

      .row.mt-4>div {
        width: 100%;
        margin-bottom: 20px;
      }

      canvas {
        max-width: 100%;
        height: auto !important;
      }
    }

    .icon-container {
      font-size: 20px;
      color: #666666;
    }

    /* Customizing active page */
    .pagination .page-item.active .page-link {
      background-color: #b1a7f2;
      /* Purple background for active item */
      border-color: #b1a7f2;
      color: white;
      font-size: 16px;
    }

    .pagination .page-link {
      border: 1px solid #ddd;
      color: black;
      border-radius: 3px;
    }

    .pagination .page-link[aria-label="Previous"],
    .pagination .page-link[aria-label="Next"] {
      border: none;
      background: none;
      color: #888888;
    }

    /* Previous and Next arrow icons */
    .pagination .page-link svg {
      width: 1rem;
      height: 1rem;
      vertical-align: middle;
    }

    .pagination .page-item {
      margin: 0 3px;
      /* Adjust spacing between each column */
      font-size: 16px;
    }

    .modal-body {
      font-family: 'Poppins', sans-serif;
      font-size: 20px;
      justify-content: center;
      align-items: center;
      text-align: center;
      margin: 15px;
      z-index: 1050 !important;
    }

    @media (max-width: 576px) {
      .card {
        height: auto;
        padding: 15px;
      }

      .pie-chart-container {
        margin-top: -100px;
      }

      .progress-label {
        font-size: 12px;
      }
    }

    .btn-submit {
      background-color: #9D9FE6;
      border: none;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
      background-color: #7d7fb8;
    }

    /* Base styling for the notification container */
    .not-logged-in-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f5f5f5;
      animation: fadeIn 1s ease-in-out;
      /* Fade-in animation for the container */
    }

    /* Style for the login box (card) */
    .login-box {
      background-color: #fff;
      width: 350px;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
      position: relative;
      animation: slideIn 0.8s ease-out;
      /* Slide-in animation for the card */
    }

    /* Message content styling */
    .message-content h2 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    .message-content p {
      font-size: 16px;
      color: #666;
    }

    /* Link styling with hover effect */
    .message-content a {
      color: #5a67d8;
      text-decoration: none;
      font-weight: bold;
      position: relative;
      transition: color 0.3s ease;
      /* Smooth transition for hover */
    }

    .message-content a:hover {
      color: #7b93ff;
      /* Lighter color on hover */
    }

    .message-content a::after {
      content: "";
      display: block;
      width: 0;
      height: 2px;
      background: #5a67d8;
      transition: width 0.3s ease;
      /* Animated underline */
    }

    .message-content a:hover::after {
      width: 100%;
      /* Expands underline on hover */
    }

    /* Icon styling */
    .icon-session {
      position: absolute;
      top: -60px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #f5a623;
      border-radius: 50%;
      width: 80px;
      height: 80px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      animation: bounce 1.5s infinite ease-in-out;
      /* Bounce effect */
    }

    /* Icon within the circle */
    .icon-session i {
      font-size: 40px;
      color: white;
    }

    /* Shadow effect for the box */
    .shadow {
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* Keyframes for the fade-in effect */
    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    /* Keyframes for the slide-in effect */
    @keyframes slideIn {
      from {
        transform: translateY(50px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    /* Keyframes for the bounce effect on the icon */
    @keyframes bounce {

      0%,
      20%,
      50%,
      80%,
      100% {
        transform: translateX(-50%) translateY(0);
      }

      40% {
        transform: translateX(-50%) translateY(-15px);
      }

      60% {
        transform: translateX(-50%) translateY(-10px);
      }
    }
  </style>
</head>

<body>
  <?php if (session()->get('logged_in')) : ?>
    <!-- Hamburger Button -->
    <button class="hamburger-btn d-lg-none" onclick="toggleSidebar()">
      <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar bg-light p-3">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="logo-container">
          <img src="/assets/img/logoo.png" alt="Logo" class="logo">
          <div class="h4 text-center mb-0"><b>AttendEase</b></div>
        </div>
        <!-- Close button -->
        <button class="close-btn d-lg-none" onclick="toggleSidebar()">
          <i class="bi bi-x-lg"></i>
        </button>
      </div>

      <ul class="nav flex-column">
        <li class="nav-item mb-3">
          <a class="nav-link" href="/dashboard">
            <i class="bi bi-grid me-2"></i> Dashboard
          </a>
        </li>
        <li class="nav-item mb-3">
          <a class="nav-link" href="/home/employee">
            <i class="bi bi-people-fill me-2"></i> Employee
          </a>
        </li>
        <li class="nav-item mb-3">
          <a class="nav-link" href="/home/attendance">
            <i class="bi bi-person-vcard-fill me-2"></i> Employee Attendance
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/home/report">
            <i class="bi bi-file-earmark-text-fill me-2"></i> Monthly report
          </a>
        </li>
      </ul>

      <!-- User Profile -->
      <div class="user-card shadow mt-8 position-absolute bottom-8 w-auto p-3">
        <img src="/assets/img/profile.jpg" alt="User Image">
        <div class="user-info">
          <h6><?= session()->get('username'); ?></h6>
          <p><?= session()->get('email'); ?></p>
        </div>
        <div class="icon-container mb-4">
          <i class="bi bi-box-arrow-right" onclick="showLogoutModal()"></i>
        </div>
      </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 20px; border: 1px solid black;">
          <div class="modal-body">
            Are you sure you want to log out?
            <div class="button mt-3" style="border-radius: 5px; padding: 10px 20px;">
              <button type="button" class="btn btn-sm" onclick="confirmLogout()">Yes</button>
              <button type="button" class="btn btn-sm" data-bs-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid content">
      <div class="h2"><b>Monthly Report</b></div>
      <form id="reportForm" action="/report/generateReport" method="POST">
        <div class="mb-3 row mt-5">
          <label for="month" class="col-sm-2 col-form-label mt-3">Month</label>
          <div class="col-sm-6">
            <select class="form-select mt-3" id="month" name="month">
              <option selected>Month</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="year" class="col-sm-2 col-form-label">Year</label>
          <div class="col-sm-6">
            <select class="form-select" id="year" name="year">
              <option selected disabled>Year</option>
              <option value="2025">2025</option>
              <option value="2024">2024</option>
              <option value="2023">2023</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
              <option value="2016">2016</option>
            </select>

          </div>
        </div>
        <div class="mb-3 row">
          <label for="format" class="col-sm-2 col-form-label">Format</label>
          <div class="col-sm-6">
            <select class="form-select" id="format" name="format" required>
              <option selected disabled>Select your format</option>
              <option value="pdf">PDF</option>
              <option value="excel">Excel</option>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <div class="col-sm-2"></div>
          <div class="col-sm-6">
            <button type="submit" class="btn-submit">Generate Report</button>
          </div>
        </div>
      </form>
    </div>

  <?php else : ?>
    <div class="not-logged-in-container">
      <div class="login-box shadow">
        <div class="message-content">
          <h2>Oops!</h2>
          <p>You are not logged in yet. Please <a href="/">login here</a> to continue.</p>
        </div>
        <div class="icon-session">
          <i class="bi bi-exclamation-triangle"></i>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Assume you have a form to trigger the report generation
    document.getElementById('reportForm').addEventListener('submit', function(e) {
      e.preventDefault(); // Prevent the form from submitting normally

      const formData = new FormData(this);

      fetch('/report/generateReport', { // Adjust the URL to your endpoint
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.status === 404) {
            // Show SweetAlert if no attendance data found
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.messages.error,
              confirmButtonText: 'OK'
            });
          } else if (data.status === 200) {
            // Handle successful report generation
            // For example, you can trigger a file download here
            // window.location.href = data.downloadLink; // Adjust based on your response
          } else {
            // Handle other errors
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An unexpected error occurred.',
              confirmButtonText: 'OK'
            });
          }
        })
        .catch(error => {
          // Handle network errors
          Swal.fire({
            icon: 'error',
            title: 'Network Error',
            text: 'Please check your internet connection and try again.',
            confirmButtonText: 'OK'
          });
        });
    });



    // Show the logout modal
    function showLogoutModal() {
      var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
      logoutModal.show();
    }

    // Function to handle logout
    function confirmLogout() {
      // Redirect the user to the logout endpoint
      window.location.href = '/logout';
    }

    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('active');
    }

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
      const sidebar = document.getElementById('sidebar');
      const hamburgerBtn = document.querySelector('.hamburger-btn');

      if (window.innerWidth < 992) { // Only on mobile
        if (!sidebar.contains(event.target) && !hamburgerBtn.contains(event.target)) {
          sidebar.classList.remove('active');
        }
      }
    });
  </script>