<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Icon Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Montserrat font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/sign_in.css" />
    <!-- Javascript -->
    <script src="../../public/js/sign_in.js" defer></script>
</head>
<body>
    <div class="container mt-3">
        <header class="text-sm-center">
            <h1 class="sign__in-header-title">Welcome back</h1>
            <p class="sign__in-header-description">Enter any email and password to sign in</p>
        </header>

        <form action="../controllers/sign_in_controller.php" method="post">
            <main>
                <div class="mb-3">
                    <label for="formEmail" class="form-label">Email Address</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="formEmail"
                        placeholder="hello@gmail.com"
                        required>
                </div>
                <div class="mb-3">
                    <label for="formPassword" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id="formPassword"
                        placeholder="Min. 8 characters"
                        minlength="8"
                        required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="checkbox" id="formCheckbox">
                        <label class="form-check-label" for="formCheckbox">
                            Remember me for 7 days
                        </label>
                    </div>
                    <a href="" class="sign__in-main-forgot-password">Forgot password?</a>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary sign__in-main-btn">Log In</button>
                </div>
            </main>
        </form>

        <footer>
            <div class="text-center my-3">
                <p class="text-muted">Or continue with</p>
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
                <p class="mt-3 sign__in-footer-text">Don't have an account?
                    <a href="sign_up.php" class="sign__in-footer-signup">Sign up for free</a>
                </p>
            </div>
        </footer>
    </div>
</body>
</html>