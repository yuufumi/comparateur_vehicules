<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CompCar</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?=ROOT?>css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body style="font-family:'Oswald'">
    <?php include 'navbar.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <section class="row my-5 ">
            <img class="voiture mx-5 col-lg-4" src="<?=ROOT?>/img/renault.jpg" alt="logo">
            <div class="col-lg-4" style="text-align:center">
                <h1 class="py-5" style="color:#3b0000">Nom de véhicule Nom de véhicule Nom de véhicule</h1>
                <a class="btn btn-danger" href="<?=ROOT?>vehicule/id=1"><h3>Voir détails</h3></a>
            </div>
    </section>
<section class="container">
    <div class="swiper avisswiper swiper-h"> 
        <div class="swiper-wrapper"> 
    <?php 
    for($j=1;$j<=3;$j++){
        echo '<div class="swiper-slide column">';
        for($i=1;$i<=5;$i++){
            echo '<div class="col-lg mb-4">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Avis</h5>
                <span class="badge rounded-pill" style="background-color:#1b1717;">4.5</span>
              </div>
              <div class="card-body">
                <p class="card-text">Comment from user Youcef Benali</p>
                <p class="medium text-muted">Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est Cette véhicule est </p>
              </div>
            </div>
          </div>';
        }
        echo "</div>";
    }
        ?>
    </div>
    <div class="swiper-pagination"></div>
    </div>
    <script>
    var swiper = new Swiper(".avisswiper", {
      cssMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable:true
      },
      mousewheel: true,
      keyboard: true,
    });
  </script>
</section>
    <?php include 'footer.php'; ?>
    
</body>
</html>