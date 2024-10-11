<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
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
            /* Space between navigation items and user card */
        }

        .sidebar .hover {
            color: #fff;
            background-color: #9D9FE6;
            border-color: #9D9FE6;
        }

        .sidebar .nav {
            flex-grow: 1;
            /* Make the nav take up the remaining space */
        }

        .h2 {
            font-size: 32px;
            font-style: bold;
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
            margin-bottom: 20px;
            /* Add margin from the bottom */
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
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-light p-3">
            <div class="logo-container">
                <img src="/assets/img/logoo.png" alt="Logo" class="logo">
                <div class="h4 text-center"><b>AttendEase</b></div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link" href="/home/dashboard"><i class="bi bi-grid me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link active" href="/home/employee"><i class="bi bi-people-fill me-2"></i> Employee</a>
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
            <div class="h2"><b>Employee</b></div>
            <div class="d-flex align-items-center mb-3 mt-5 justify-content-between">
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" class="form-control" placeholder="Search employee" aria-label="Search employee" aria-describedby="search-icon">
                    <span class="input-group-text bg-white" id="search-icon">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
                <a href="/home/addemployee">
                    <button class="btn btn-sm d-flex align-items-center justify-content-center">
                        <i class="bi bi-plus me-2" style="font-size: 23px;"></i>
                        <span>Add</span>
                    </button>
                </a>
            </div>

            <!-- Employee Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
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
                        <tr>
                            <td>01</td>
                            <td>Winna</td>
                            <td><a href="mailto:winnasalsabila@gmail.com">winnasalsabila@gmail.com</a></td>
                            <td>Intern</td>
                            <td class="action-buttons justify-content-center">
                                <button class="btn btn-sm">
                                    <i class="bi bi-pencil" style="color: #fff;"></i>
                                </button>
                                <button class="btn btn-sm">
                                    <i class="bi bi-trash" style="color: #fff;"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <span>Items per page</span>
                        <select class="form-select form-select-sm mx-2" style="width: 80px;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>