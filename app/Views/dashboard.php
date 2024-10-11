<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AttendEase Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: #f9f9f9;
    }

    /* Sidebar */
    .sidebar {
      width: 280px;
      height: 100vh;
      background-color: #F8F8F8;
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
    }

    .sidebar h4 img {
        width: 45px;
        height: 45px;
        margin-right: 20px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      font-size: 16px;
      padding: 12px 16px;
      color: #333;
      text-decoration: none;
      margin-bottom: 15px;
      border-radius: 5px;
    }

    .sidebar a.active {
      background-color: #9D9FE6;
      color: white;
    }

    .sidebar a:hover {
      background-color: #7d7fb8;
      color: white;
    }

    .sidebar i {
      margin-right: 10px;
      font-size: 20px;
    }

    /* User Profile */
    .user-profile {
      background-color: #9D9FE6;
      border-radius: 15px;
      padding: 15px;
      display: flex;
      align-items: center;
      color: white;
      width: calc(100% - 40px);
      position: absolute;
      bottom: 20px;
      left: 20px;
    }

    .user-profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 15px;
    }
    
    .user-info {
      display: flex;
      flex-direction: column; 
    }

    .user-profile p {
      font-size: 14px; 
      margin: 0; 
    }

    .username {
      font-size: 14px;
      font-weight: bold; 
      margin: 0; 
    }

    .email {
      font-size: 12px; 
      margin: 0; 
    }

     /* Main Content */
     .col-md-10 {
      margin-left: 280px; /* Memberi jarak sesuai dengan lebar sidebar */
      padding: 20px;
    }

    /* Dashboard title */
    .dashboard-title {
      font-size: 28px;
      font-weight: 600;
      color: #000000;
      margin-bottom: 30px;
    }

    /* Cards */
    .card {
      border-radius: 20px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .card h5 {
      font-size: 14px;
    }

    .card p {
      font-size: 36px;
      font-weight: bold;
      margin: 0;
    }

    .chart-container {
      background-color: white;
      border-radius: 20px;
      margin-bottom: 30px;
      padding: 20px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
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
    }

    @media (max-width: 768px) {
      .stats-container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2">
        <div class="sidebar">
          <h4>
          <img src="/assets/img/logo.png" alt="Logo"> AttendEase
          </h4>
          <a href="#" class="active"><i class="fas fa-th-large"></i> Dashboard</a>
          <a href="#"><i class="fas fa-users"></i> Employee</a>
          <a href="#"><i class="fas fa-calendar-alt"></i> Employee Attendance</a>
          <a href="#"><i class="fas fa-file-alt"></i> Monthly Report</a>

          <!-- User Profile Card -->
          <div class="user-profile">
            <img src="https://via.placeholder.com/50" alt="Profile Picture">
            <div class="user-info">
            <p class="username">Jake Sim</p>
            <p class="email">jakesim@gmail.com</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-md-10">
        <!-- Dashboard Title -->
        <h1 class="dashboard-title">Dashboard</h1>

        <!-- Cards and Pie Chart Row -->
        <div class="container mt-4">
    <!-- Stats Cards -->
    <div class="stats-container row">
      <div class="col-md-3">
        <div class="card text-center text-white" style="background-color: #9D9FE6;">
          <div class="card-body">
            <h5 class="card-title">Total Employees</h5>
            <p>200</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center text-white" style="background-color: #EFACA7;">
          <div class="card-body">
            <h5 class="card-title">Total Employees Present</h5>
            <p>195</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Graphs Section -->
    <div class="row">
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
        display: false,  // Menghilangkan kotak-kotak legend
      }
    }
    }
    }); 
  </script>
</body>
</html>
