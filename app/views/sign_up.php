<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Icon Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Montserrat font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/sign_up.css" />
    <!-- Javascript -->
    <script src="../../public/js/sign_up.js" defer></script>
</head>
<body>
    <div class="container mt-3">
        <header class="text-sm-center">
            <h1 class="sign__up-header-title">Create an account</h1>
            <p class="sign__up-header-description">Start your Foodie journey today - It's free!</p>
        </header>

        <form action="../controllers/sign_up_controller.php" method="post">
            <main>
                <div class="mb-3">
                    <label for="formFullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="formFullName" name="full_name" placeholder="John Smith" required>
                </div>
                <div class="mb-3">
                    <label for="formEmail" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="formEmail" name="email" placeholder="hello@gmail.com" required>
                </div>
                <div class="mb-3">
                    <label for="formPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="formPassword" name="password" placeholder="Min. 8 characters" minlength="8" required>
                </div>
                <div class="mb-3">
                    <label for="formConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="formConfirmPassword" name="confirm_password" placeholder="Re-enter the password" minlength="8" required>
                </div>
                <div class="text-center mb-3">
                    <p class="sign__up-footer-text">I agree to the <a href="" class="sign__up-footer-login">Terms of Services</a> and <a href="" class="sign__up-footer-login">Privacy Policy</a></p>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary sign__up-main-btn">Create Account</button>
                </div>
            </main>
        </form>

        <footer>
            <div class="text-center my-3">
                <p class="text-muted">Or sign up with</p>
            </div>

            <div class="text-center">
                <div class="d-grid gap-2 d-sm-flex">
                    <a href="/" class="btn btn-outline-danger flex-fill">
                        <i class="bi bi-google"></i> Sign in with Google
                    </a>
                    <a href="/" class="btn btn-outline-primary flex-fill">
                        <i class="bi bi-facebook"></i> Sign in with Facebook
                    </a>
                </div>
                <p class="mt-3 sign__up-footer-text">Already have an account? <a href="sign_in.php" class="sign__up-footer-login">Log in here</a></p>
            </div>
        </footer>
    </div>
</body>
</html>