<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    <div class="container">
        <!-- Form Login -->
        <div class="login-form">
            <h3><b>Welcome!</b></h3>
            <p>Log in to check your attendance data</p>
            <form id="loginForm">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <div class="form-group form-check d-flex justify-content-between mb-4 pt-0 pb-0 ps-0 pe-0">
                    <div class="form-group form-check" required>
                        <input type="checkbox" name="remember" class="form-check-input" required>
                        <label class="form-check-label ms-2" for="remember">Keep me signed in</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
            </form>
            <p class="text-center mt-4" style="font-family: 'Poppins', sans-serif; color: black; font-size: 14px;">Need an account? <a href="/signup">Click here to sign up.</a></p>
        </div>

        <!-- Gambar -->
        <div class="login-image">
            <img src="/assets/img/loginnimg.png" alt="Login Image">
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari submit biasa
            const email = this.email.value;
            const password = this.password.value;

            fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    email,
                    password
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw response; // Lempar respons jika status bukan 2xx
                }
                return response.json(); // Parse respons ke format JSON
            })
            .then(data => {
                // Jika respons API berhasil (status 200)
                Swal.fire({
                    icon: 'success',
                    title: 'Login Successful!',
                    text: 'You will be redirected to your dashboard.',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/dashboard';
                    }
                });
            })
            .catch(async (errorResponse) => {
                // Tangkap error yang dilempar
                let errorMessage = 'Please try again later.';
                if (errorResponse.status === 401) {
                    const errorData = await errorResponse.json();
                    errorMessage = errorData.error || 'Incorrect email or password!';
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed!',
                    text: errorMessage,
                });
            });

        });
    </script>

    <script src="/assets/js/script.js"></script>
</body>

</html>
