<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <h3><b>Get Started</b></h3>
            <p>Start accessing your attendance data now.</p>
            <form id="registerForm">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Create Account</button>
            </form>
            <p class="text-center mt-4" style="font-family: 'Poppins', sans-serif; color: black; font-size: 14px;">
                Have an account? <a href="/">login here</a>
            </p>
        </div>

        <div class="login-image">
            <img src="/assets/img/loginnimg.png" alt="Login Image">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get input values
            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;

            // Show loading message
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait while we create your account.',
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Send request to server
            fetch('http://localhost:8080/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email,
                        password
                    })
                })
                .then(response => response.json())
                .then(data => {
                    Swal.close(); // Close loading message

                    if (data.status === 201) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: data.messages.success,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/'; // Redirect to home page
                            }
                        });
                    } else {
                        const errorMessage = data.messages.error || 'An unknown error occurred.';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errorMessage,
                        });
                    }
                })
                .catch(error => {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'An error occurred',
                        text: 'Something went wrong: ' + error.message,
                    });
                });
        });
    </script>
    <script src="/assets/js/script.js"></script>
</body>

</html>
