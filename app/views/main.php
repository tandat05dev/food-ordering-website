<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurnt Website</title>
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Icon Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <!-- Poppins font for hero section, Montserrat font for body content -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/hero.css" />
    <link rel="stylesheet" href="css/best_seller.css" />
    <link rel="stylesheet" href="css/menu.css" />
    <link rel="stylesheet" href="css/feedback.css" />
    <link rel="stylesheet" href="css/reservation.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <!-- Javascript -->
    <script src="js/header.js" defer></script>
    <script src="js/hero.js" defer></script>
    <script src="js/best_seller.js" defer></script>
    <script src="js/menu.js" defer></script>
    <script src="js/feedback.js" defer></script>
    <script src="js/reservation.js" defer></script>
    <script src="js/footer.js" defer></script>
  </head>
  <body>
    <header>
      <!-- Header and nav -->
      <?php include("../../components/header.php") ?>
    </header>

    <main>
      <!-- Hero -->
      <?php include("../../components/hero.php"); ?>
      <!-- Best seller -->
      <?php include("../../components/best_seller.php"); ?>
      <!-- Menu -->
      <?php include("../../components/menu.php") ?>
      <!-- Feedbacks -->
      <?php include("../../components/feedback.php") ?>
      <!-- Reservation -->
    </main>

    <footer>
      <!-- Footer -->
      <?php include("../../components/footer.php") ?>
    </footer>
  </body>
</html>