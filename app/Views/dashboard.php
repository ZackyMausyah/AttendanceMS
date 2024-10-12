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

   /* Custom styling to ensure proper layout */
      body {
        font-family: 'Poppins', sans-serif;
      }
    /* Sidebar */
    .sidebar {
      width: 270px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: white;
      padding-top: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
      border-radius: 20px;
      padding: 12px;
    }

    .sidebar a:hover {
      background-color: #7d7fb8;
      color: white;
    }

    .sidebar .nav {
      flex-grow: 1;
      /* Make the nav take up the remaining space */
    }

    .h2 {
      font-size: 32px;
      font-weight: bold !important;
    }

    .h4 {
      font-size: 24px;
    }

    .sidebar .nav-link {
      color: black;
    }

    .sidebar .active {
      background-color: #9D9FE6;
      color: #fff;
      border-radius: 20px;
    }

    .sidebar .profile img {
      display: block;
      margin: 0 auto;
      width: 50px;
      height: 50px;
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
    }

    .content {
      margin-left: 270px;
      /* Adjust according to sidebar width */
      padding: 20px;
    }

    /* Styling for buttons */
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

    /* Aligning search input and add button */
    .input-group {
      max-width: 400px;
    }

    .btn-primary {
      background-color: #6c63ff;
      border-color: #6c63ff;
    }

    .btn-sm:hover {
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
      color: #fff;
      background-color: #9D9FE6;
      border-color: #9D9FE6;
    }

    .action-buttons {
      display: flex;
      gap: 5px;
    }

    /* Fixing table alignment and spacing */
    .table-action {
      text-align: center;
    }

    /* Responsive Design */
      @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .content {
            margin-left: 0;
        }
      }

      .custom-color {
          background-color: #9D9FE6;
      }

    /* Card Style for User Info */
    .user-card {
        background-color: #B7B8E980;
        border-radius: 15px;
        padding: 15px;
        display: flex;
        align-items: center;
        max-width: 350px;
        height: 90px;
        margin-top: 20px;
    }

    .user-card img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        /* Circular image */
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

    .icon-container {
        font-size: 20px;
        color: #666666;
    }

    .chart-container {
        background-color: white;
        border-radius: 20px;
        margin-bottom: 30px;
        padding: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .content {
        margin-left: 270px; /* Adjust according to sidebar width */
        padding: 20px;
    }

    .card {
        bottom: 35px; /* Add space between cards and top of the container */
        border-radius: 15px; /* Ensuring rounded corners */
    }

    .pie-chart {
        width: 100%; 
        height: auto;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .bar-chart {
        width: 100px;
        height: auto;
        margin-top: 20px;
        border-radius: 15px;
    }

    .progress {
        height: 15px;
        border-radius: 0;
        margin-bottom: 15px;
    }

    .progress-label {
        margin-bottom: 10px;
        font-size: 14px;
    }

    .stats-container {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    </style>
</head>

<body>
<?php if (session()->get('logged_in')) : ?>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-light p-3">
            <div class="logo-container">
                <img src="/assets/img/logo.png" alt="Logo" class="logo">
                <div class="h4 text-center"><b>AttendEase</b></div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link active" href="#"><i class="bi bi-grid me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="#"><i class="bi bi-people-fill me-2"></i> Employee</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="#"><i class="bi bi-person-vcard-fill me-2"></i> Employee Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-file-earmark-text-fill me-2"></i> Monthly report</a>
                </li>
            </ul>

          <!-- Additional User Card -->
          <div class="user-card shadow mt-8">
                <img src="/assets/img/profile.jpg" alt="User Image">
                <div class="user-info">
                    <h6>Jake Sim</h6>
                    <p>jakesim@gmail.com</p>
                </div>
                <div class="icon-container mb-4">
                    <i class="bi bi-box-arrow-right"></i>
                </div>
            </div>
        </div>

      <!-- Main Content -->
      <div class="container-fluid content">
        <!-- Dashboard Title -->
        <h2 class="h2">Dashboard</h2>
        <div class="d-flex align-items-center mb-3 mt-5 justify-content-between"></div>
        <!-- Cards and Pie Chart Row -->
        <div class="container mt-4">
        <!-- Cards -->
        <div class="row stats-container">
        <div class="col-md-3">
        <div class="card text-left text-white" style="background-color: #9D9FE6;">
          <div class="card-body">
            <i class="bi bi-people-fill" style="font-size: 16px;"></i>
            <h5 class="card-title">Total Employees</h5>
            <p>200</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-left text-white" style="background-color: #EFACA7;">
          <div class="card-body">
            <i class="bi bi-people-fill" style="font-size: 16px;"></i>
            <h5 class="card-title">Total Employees Present</h5>
            <p>195</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Graphs Section -->
    <div class="row mt-4">
      <!-- Bar Chart -->
      <div class="col-md-7">
        <div class="chart-container">
          <h5 class="text-center">Monthly Attendance Report</h5>
          <canvas id="barChart" class="bar-chart"></canvas>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-md-5">
        <div class="chart-container">
          <h5 class="text-center">Absent Employees</h5>
          <canvas id="pieChart" class="pie-chart"></canvas>
      <!-- Progress Bars for Attendance Breakdown -->
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
  <?php else : ?>
        <p>You are not logged in. <a href="/">Login here</a>.</p>
        
    <?php endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Bar Chart
    var ctxBar = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
      type: 'bar',
      data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        datasets: [
          {
            label: 'Daily attendance',
            data: [300, 400, 350, 420, 380],
            backgroundColor: '#9D9FE6',
            hoverBackgroundColor: ' #7d7fb8',
          },
          {
            label: 'Weekly attendance',
            data: [250, 350, 320, 370, 340],
            backgroundColor: '#EFACA7',
          },
          {
            label: 'Monthly attendance',
            data: [200, 330, 300, 340, 310],
            backgroundColor: '#AFD7D0',
          }
        ]
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

    // Pie Chart
    var ctxPie = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
      type: 'pie',
      data: {
        labels: ['Present', 'Without Explanation', 'Sick', 'Permission'],
        datasets: [{
          label: 'Attendance Employees',
          data: [90, 2, 5, 3],
          backgroundColor: ['#9D9FE6', '#AAAAAA', '#AFD7D0', '#EFACA7'],
          hoverBackgroundColor: [' #7d7fb8','#888888', '#8FC5B5', '#D4817B'],
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
  </script>
</body>
</html>
