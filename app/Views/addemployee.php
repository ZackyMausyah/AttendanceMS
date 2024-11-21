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
      width: 350px;
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
  </style>
</head>

<body>
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
        <a class="nav-link active" href="/home/employee">
          <i class="bi bi-people-fill me-2"></i> Employee
        </a>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link" href="/home/absensi">
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
        <h6>Jake Sim</h6>
        <p>jakesim@gmail.com</p>
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
    <div class="h2"><b>Employee</b></div>
    <form id="employeeForm">
      <div class="mb-3 row mt-3">
        <label for="name" class="col-sm-2 col-form-label mt-5">Name</label>
        <div class="col-sm-6 mt-5">
          <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="position" class="col-sm-2 col-form-label">Position</label>
        <div class="col-sm-6">
          <select class="form-select" id="position" required>
            <option selected>Select your position</option>
            <option value="Intern">Intern</option>
            <option value="Employee">Employee</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
          <button type="submit" class="btn-submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
  </div>
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

    document.addEventListener("DOMContentLoaded", function() {
      const urlParams = new URLSearchParams(window.location.search);
      const id_employee = urlParams.get('id_employee');

      if (id_employee) {
        fetchEmployeeData(id_employee);
      }

      document.getElementById('employeeForm').addEventListener('submit', function(event) {
        event.preventDefault();
        if (id_employee) {
          updateEmployee(id_employee);
        } else {
          addEmployee();
        }
      });
    });

    async function fetchEmployeeData(id_employee) {
      try {
        const response = await fetch(`/api/employees/${id_employee}`);
        if (!response.ok) {
          throw new Error('Failed to fetch employee data');
        }
        const employee = await response.json();
        document.getElementById('name').value = employee.username;
        document.getElementById('email').value = employee.email;
        document.getElementById('position').value = employee.jobdesk;
      } catch (error) {
        console.error('Error fetching employee data:', error);
      }
    }

    async function updateEmployee(id_employee) {
      try {
        const response = await fetch(`/api/employees/${id_employee}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            username: document.getElementById('name').value,
            email: document.getElementById('email').value,
            jobdesk: document.getElementById('position').value
          })
        });
        if (!response.ok) {
          throw new Error('Failed to update employee data');
        }
        window.location.href = '/home/employee';
      } catch (error) {
        console.error('Error updating employee data:', error);
      }
    }

    async function addEmployee() {
      try {
        const response = await fetch(`/api/employees`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            username: document.getElementById('name').value,
            email: document.getElementById('email').value,
            jobdesk: document.getElementById('position').value
          })
        });
        if (!response.ok) {
          throw new Error('Failed to add employee');
        }
        window.location.href = '/home/employee';
      } catch (error) {
        console.error('Error adding employee:', error);
      }
    }
  </script>
  <script src="/assets/js/script.js"></script>
</body>

</html>