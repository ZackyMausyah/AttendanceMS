<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
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

        .content {
            margin-left: 270px;
            padding: 40px;
        }

        .form-label {
            font-weight: 500;
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
            background-color: #6c63ff;
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
                    <a class="nav-link" href="#"><i class="bi bi-grid me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link active" href="#"><i class="bi bi-people-fill me-2"></i> Employee</a>
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
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="h2 mb-5"><b>Employee</b></div>
        <form>
            <div class="mb-3 row mt-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="position" class="col-sm-2 col-form-label">Position</label>
                <div class="col-sm-6">
                    <select class="form-select" id="position">
                        <option selected>Select your position</option>
                        <option value="1">Intern</option>
                        <option value="2">Employee</option>
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





    <script src="/assets/js/script.js"></script>
</body>

</html>