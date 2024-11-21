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
          <a class="nav-link active" href="/home/employee">
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
        <div class="h2"><b>Employee</b></div>
        <div class="d-flex align-items-center mb-3 mt-5 justify-content-between">
          <div class="input-group mt-3" style="max-width: 400px;">
            <input type="text" class="form-control" id="searchInput" placeholder="Search employee" aria-label="Search employee" aria-describedby="search-icon">
            <span class="input-group-text bg-white" id="search-icon">
              <i class="bi bi-search"></i>
            </span>
          </div>
          <a href="/home/addemployee">
            <button class="btn btn-sm d-flex align-items-center justify-content-center mt-3">
              <i class="bi bi-plus me-2" style="font-size: 23px;"></i>
              <span>Add</span>
            </button>
          </a>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered text-center" id="employeeTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

        <div class="mt-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
              <span>Items per page</span>
              <select class="form-select form-select-sm mx-2" id="itemsPerPage" style="width: 80px;">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center" id="pagination">
                <li class=" page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&lt; Previous</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">20</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">Next &gt;</span>
                  </a>
                </li>
              </ul>
            </nav>
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

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="border-radius: 20px;">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editEmployeeForm">
            <div class="mb-3">
              <label for="editName" class="form-label">Name</label>
              <input type="text" class="form-control" id="editName" required>
            </div>
            <div class="mb-3">
              <label for="editEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="editEmail" required>
            </div>
            <div class="mb-3">
              <label for="editJobdesk" class="form-label">Position</label>
              <select class="form-control" id="editJobdesk" required>
                <option value="Intern">Intern</option>
                <option value="Employee">Employee</option>
              </select>
            </div>
            <input type="hidden" id="editEmployeeId">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm" id="saveEditButton">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="border-radius: 20px; border: 1px solid black;">
        <div class="modal-body">
          Are you sure you want to delete this data?
          <div class="button mt-3" style="border-radius: 5px; padding: 10px 20px;">
            <button type="button" class="btn btn-sm" id="confirmDelete">Yes</button>
            <button type="button" class="btn btn-sm" data-bs-dismiss="modal">No</button>
          </div>
        </div>
      </div>
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
      window.location.href = '/logout';
    }

    // Function for search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
      var input = document.getElementById('searchInput').value.toLowerCase();
      var tableRows = document.querySelectorAll('#employeeTable tbody tr');

      tableRows.forEach(function(row) {
        var rowText = row.textContent.toLowerCase();
        if (rowText.includes(input)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });

    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('active');
    }

    document.addEventListener('click', function(event) {
      const sidebar = document.getElementById('sidebar');
      const hamburgerBtn = document.querySelector('.hamburger-btn');

      if (window.innerWidth < 992) {
        if (!sidebar.contains(event.target) && !hamburgerBtn.contains(event.target)) {
          sidebar.classList.remove('active');
        }
      }
    });

    // Pagination and employee fetching logic
    document.addEventListener('DOMContentLoaded', function() {
      const employeeTableBody = document.querySelector('tbody');
      const itemsPerPageSelect = document.getElementById("itemsPerPage");
      const pagination = document.getElementById("pagination");

      let currentPage = 1;
      let itemsPerPage = parseInt(itemsPerPageSelect.value);
      let employees = [];
      let deleteEmployeeId = null;

      async function fetchEmployees() {
        try {
          const response = await fetch('/api/employees'); // Replace with actual API endpoint
          if (!response.ok) {
            throw new Error('Failed to fetch employees');
          }
          employees = await response.json();
          renderTable();
          renderPagination();
        } catch (error) {
          console.error('Error fetching employees:', error);
        }
      }

      function renderTable() {
        employeeTableBody.innerHTML = "";
        let start = (currentPage - 1) * itemsPerPage;
        let end = start + itemsPerPage;
        let paginatedEmployees = employees.slice(start, end);

        paginatedEmployees.forEach(employee => {
          const row = document.createElement('tr');
          row.innerHTML = `
      <td>${employee.id_employee}</td>
      <td>${employee.username}</td>
      <td><a href="mailto:${employee.email}">${employee.email}</a></td>
      <td>${employee.jobdesk}</td>
      <td class="action-buttons justify-content-center">
        <button class="btn btn-sm" onclick="window.location.href='/home/addemployee?id_employee=${employee.id_employee}'">
          <i class="bi bi-pencil" style="color: #fff;"></i>
        </button>
        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteEmployeeId(${employee.id_employee})">
          <i class="bi bi-trash" style="color: #fff;"></i>
        </button>
      </td>
    `;
          employeeTableBody.appendChild(row);
        });
      }


      function renderPagination() {
        pagination.innerHTML = "";
        let totalPages = Math.ceil(employees.length / itemsPerPage);

        let prevButton = `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                                <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">&lt; Previous</a>
                              </li>`;
        pagination.insertAdjacentHTML('beforeend', prevButton);

        for (let i = 1; i <= totalPages; i++) {
          let pageItem = `<li class="page-item ${i === currentPage ? 'active' : ''}">
                                    <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                                </li>`;
          pagination.insertAdjacentHTML('beforeend', pageItem);
        }

        let nextButton = `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                                <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Next &gt;</a>
                              </li>`;
        pagination.insertAdjacentHTML('beforeend', nextButton);
      }

      window.changePage = function(page) {
        let totalPages = Math.ceil(employees.length / itemsPerPage);
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderTable();
        renderPagination();
      }

      itemsPerPageSelect.addEventListener('change', function() {
        itemsPerPage = parseInt(this.value);
        currentPage = 1; // Reset to page 1
        renderTable();
        renderPagination();
      });

      fetchEmployees();
    });

    window.setDeleteEmployeeId = function(id_employee) {
      deleteEmployeeId = id_employee;
    };
    

    document.getElementById('confirmDelete').addEventListener('click', async function() {
  if (deleteEmployeeId) {
    try {
      // Kirim permintaan DELETE ke server API untuk menghapus data karyawan
      const response = await fetch(`/api/employees/${deleteEmployeeId}`, {
        method: 'DELETE',
      });

      if (!response.ok) {
        throw new Error('Failed to delete employee');
      }

      // Tutup modal setelah konfirmasi "Yes"
      const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
      if (deleteModal) {
        deleteModal.hide();
      }

      // Hapus baris tabel berdasarkan ID tanpa memuat ulang halaman
      const employeeRow = document.getElementById(`employee-row-${deleteEmployeeId}`);
      if (employeeRow) {
        employeeRow.remove();
      } else {
        console.error(`Row with ID employee-row-${deleteEmployeeId} not found.`);
      }

    } catch (error) {
      console.error('Error deleting employee:', error);
    }
  }
});



    window.editEmployee = function(id_employee) {
      window.location.href = `/home/addemployee?id=${id_employee}`;
    };
  </script>