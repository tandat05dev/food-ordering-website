<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">DaTeNO</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Our Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
            <form
                class="d-flex me-lg-5"
                role="search">
                <input class="form-control"
                type="search"
                placeholder="Search for meals..."
                aria-label="Search"/>
                <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <!-- Checking session -->
            <?php
                $user_id = isset($_SESSION["user_id"]);
                $display_name = isset($_SESSION["display_name"]);
                $role = isset($_SESSION['role']);
                $is_login = $user_id && $display_name && $role;
            ?>

            <!-- < lg use drop down navbar -->
            <ul class="d-lg-none navbar-nav mx-auto mb-2 mb-lg-0">
                <?php if ($is_login): ?>
                    <li class="nav-item">
                        <a
                            class="nav-link text-danger"
                            href="/food-ordering-website/controllers/sign_out_controller.php">Sign Out
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a
                            class="nav-link text-danger"
                            href="/food-ordering-website/app/views/sign_in.php">Log In
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- >= lg use icon user from fibt awesome -->
            <div class="d-none d-lg-block dropdown">
                <i
                    class="fa-solid fa-user dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                </i>
                <ul class="dropdown-menu dropdown-menu-end mt-3">
                    <!-- dropdown-menu-end để dropdown từ phải trên sang trái dưới -->
                    <?php if ($is_login): ?>
                        <li>
                            <a
                                class="dropdown-item text-center"
                                href="/food-ordering-website/app/controllers/sign_out_controller.php">
                                Sign Out
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a
                                class="dropdown-item text-center"
                                href="/food-ordering-website/app/views/sign_in.php">
                                Log In
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>