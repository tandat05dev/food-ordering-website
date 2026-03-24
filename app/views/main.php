<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurnt Website</title>
    <!-- Icon Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Montserrat font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../public/css/header.css" />
    <link rel="stylesheet" href="../../public/css/best_seller.css" />
    <link rel="stylesheet" href="../../public/css/menu.css" />
    <link rel="stylesheet" href="../../public/css/feedback.css" />
    <link rel="stylesheet" href="../../public/css/reservation.css" />
    <link rel="stylesheet" href="../../public/css/footer.css" />
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="../../public/js/header.js" defer></script>
    <script src="../../public/js/best_seller.js" defer></script>
    <script src="../../public/js/menu.js" defer></script>
    <script src="../../public/js/feedback.js" defer></script>
    <script src="../../public/js/reservation.js" defer></script>
    <script src="../../public/js/footer.js" defer></script>
  </head>
  <body>
    <header>
      <?php include("../../components/header.php") ?>
    </header>
  
    <main>
      <?php include("../../components/best_seller.php"); ?>
      <?php include("../../components/menu.php") ?>
      <?php include("../../components/feedback.php") ?>
      <?php include("../../components/reservation.php") ?>
    </main>

    <footer>
      <?php include("../../components/footer.php") ?>
    </footer>
  </body>
</html>