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
      max-height: 500px;
      padding: 20px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .pie-chart {
      width: 100%;
      height: auto;
      margin-bottom: 20px;
      max-height: 360px;
    }

    .pie-chart-container {
      height: auto;
      margin-top: -230px;
      max-height: 750px;
    }

    .bar-chart {
      width: 100px;
      height: auto;
      max-height: 400px;
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
      height: auto;
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
      overflow: hidden;
      word-wrap: break-word;
    }

    .user-info h6,
    .user-info p {
      margin: 0;
      font-weight: 600;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
      white-space: normal;
      word-break: break-word;
    }

    .user-info p {
      margin-top: 2px;
      color: gray;
    }

    .icon-container {
      display: flex;
      align-items: center;
      margin-left: auto;
    }

    /* Stats Container */
    .stats-container {
      display: flex;
      flex-wrap: wrap;
      align-items: flex-start;
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

    .icon-container {
      font-size: 20px;
      color: #666666;
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
          <a class="nav-link active" href="/dashboard">
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
          <a class="nav-link" href="/home/report">
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
    <div id="mainContent" class="content">
      <div class="container-fluid">
        <!-- Dashboard Title -->
        <div class="h2"><b>Dashboard</b></div>
        <div class="d-flex align-items-center mb-3 mt-5 justify-content-between"></div>
        <!-- Cards and Pie Chart Row -->
        <div class="container mt-4">
          <!-- Cards -->
          <div class="row stats-container mt-5">
            <div class="col-md-3">
              <div class="card text-left text-white" style="background-color: #9D9FE6;">
                <div class="card-body">
                  <i class="bi bi-people-fill" style="font-size: 28px;"></i>
                  <h5 class="card-title">Total Employees</h5>
                  <p id="totalEmployees" style="font-size: 32px;">0</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-left text-white" style="background-color: #EFACA7;">
                <div class="card-body">
                  <i class="bi bi-people-fill" style="font-size: 28px;"></i>
                  <h5 class="card-title">Total Employees Present</h5>
                  <p id="totalAttendance" style="font-size: 32px;">0</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Graphs Section -->
          <div class="row mt-4">
            <!-- Bar Chart -->
            <div class="col-md-6">
              <div class="chart-container">
                <h5 class="text-center">Monthly Attendance Report</h5>
                <canvas id="barChart" class="bar-chart"></canvas>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-md-6">
              <div class="chart-container pie-chart-container">
                <h5 class="text-center">Absent Employees</h5>
                <canvas id="pieChart" class="pie-chart"></canvas>
                <!-- Progress Bars -->
                <div class="mt-3">
                  <div class="progress-label">Present <span class="float-end">90%</span></div>
                  <div class="progress mb-2">
                    <div class="progress-bar" role="progressbar" style="background-color: #9D9FE6; width: 90%;"></div>
                  </div>
                  <div class="progress-label">Without Explanation <span class="float-end">2%</span></div>
                  <div class="progress mb-2">
                    <div class="progress-bar bg-secondary" role="progressbar" style="background-color: #AAAAAA; width: 2%;"></div>
                  </div>
                  <div class="progress-label">Sick <span class="float-end">5%</span></div>
                  <div class="progress mb-2">
                    <div class="progress-bar" role="progressbar" style="background-color: #AFD7D0; width: 5%;"></div>
                  </div>
                  <div class="progress-label">Permission <span class="float-end">3%</span></div>
                  <div class="progress mb-2">
                    <div class="progress-bar" role="progressbar" style="background-color: #EFACA7; width: 3%;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
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

    document.addEventListener('DOMContentLoaded', function() {
      // Function untuk fetch total employees
      async function fetchTotalEmployees() {
        try {
          const response = await fetch('/api/employees'); // Pastikan endpoint ini benar
          const employees = await response.json();

          // Hitung total employees
          const totalEmployees = employees.length;

          // Update jumlah employees di halaman
          document.getElementById('totalEmployees').innerText = totalEmployees;
        } catch (error) {
          console.error('Error fetching total employees:', error);
        }
      }

      // Function untuk fetch total attendance
      async function fetchTotalAttendance() {
        try {
          const response = await fetch('/api/attendance'); // Pastikan endpoint ini benar
          const attendance = await response.json();

          console.log(attendance); // Tambahkan log untuk melihat data yang diterima

          // Hitung total attendance
          const totalAttendance = attendance.data.length;


          // Update jumlah attendance di halaman
          document.getElementById('totalAttendance').textContent = totalAttendance;
        } catch (error) {
          console.error('Error fetching total attendance:', error);
        }
      }


      // Panggil kedua function saat halaman dimuat
      fetchTotalEmployees();
      fetchTotalAttendance();
    });



    // Ambil elemen canvas untuk grafik
    var ctxBar = document.getElementById('barChart').getContext('2d');

    // Ambil data dari controller
    fetch('/ReportController/getMonthlyAttendanceData')
      .then(response => response.json())
      .then(data => {
        var barChart = new Chart(ctxBar, {
          type: 'bar',
          data: {
            labels: data.labels,
            datasets: data.datasets.map((dataset, index) => ({
              ...dataset,
              backgroundColor: ['#9D9FE6', '#EFACA7', '#AFD7D0'][index],
              hoverBackgroundColor: ['#7d7fb8', '#c79a9a', '#8fbfb4'][index]
            }))
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
            },
          },
        });
      })
      .catch(error => console.error('Error fetching data:', error));

    // Pie Chart - Ambil elemen canvas
    var ctxPie = document.getElementById('pieChart').getContext('2d');

    // Ambil data dari controller dan buat grafik pie
    fetch('/monthly-attendance-status')
      .then(response => response.json())
      .then(data => {
        var pieChart = new Chart(ctxPie, {
          type: 'pie',
          data: {
            labels: ['Present', 'Without Explanation', 'Sick', 'Permission'],
            datasets: [{
              label: 'Absent Employees',
              data: [data.Present, data['Without Explanation'], data.Sick, data.Permission],
              backgroundColor: ['#9D9FE6', '#AAAAAA', '#AFD7D0', '#EFACA7'],
              hoverBackgroundColor: ['#7d7fb8', '#888888', '#8FC5B5', '#D4817B'],
            }]
          },
          options: {
            responsive: true,
            aspectRatio: 1.5,
            plugins: {
              legend: {
                display: false,
              }
            }
          }
        });

        // Update progress bars sesuai dengan data
        document.querySelector('.progress-bar[style*="width: 90%"]').style.width = `${data.Present}%`;
        document.querySelector('.progress-bar[style*="width: 2%"]').style.width = `${data['Without Explanation']}%`;
        document.querySelector('.progress-bar[style*="width: 5%"]').style.width = `${data.Sick}%`;
        document.querySelector('.progress-bar[style*="width: 3%"]').style.width = `${data.Permission}%`;

        // Update teks persentase
        document.querySelector('.progress-label:contains("Present") .float-end').innerText = `${data.Present}%`;
        document.querySelector('.progress-label:contains("Without Explanation") .float-end').innerText = `${data['Without Explanation']}%`;
        document.querySelector('.progress-label:contains("Sick") .float-end').innerText = `${data.Sick}%`;
        document.querySelector('.progress-label:contains("Permission") .float-end').innerText = `${data.Permission}%`;
      })
      .catch(error => console.error('Error fetching data:', error));


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
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
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
  </script>

  <script>
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
  <script>
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