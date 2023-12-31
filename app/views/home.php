
<!doctype html>
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
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body style="font-family: 'Oswald', sans-serif;">
      <?php include_once 'navbar.php' ?>
    
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <div id="news">
        <div class="swiper newsswiper">
          <div class="swiper-wrapper">
              <?php 
              foreach ($data['news'] as $row) {
                echo '<div class="swiper-slide">
                <a href="'.ROOT.'news/'.$row->news_id.'"><img src="'.ROOT.'/img/'.$row->lien.'" class="d-block w-100" alt="..."></a>
                      </div>';
              }
              ?>
          </div>
          
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <script>
      const newsswiper = new Swiper('.newsswiper', {
        autoplay: {
          delay: 5000, // 5 seconds
          disableOnInteraction: false, // Continue autoplay after user interaction
        },
        loop: true,
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      });
      </script>

      </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light justify-content-start" style="background-color: #FCFAEF">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item2">
          <a class="nav-link" href="#">Accueil</a>
        </li>
        <li class="nav-item2">
          <a class="nav-link" href="<?=ROOT?>news">News</a>
        </li>
        <li class="nav-item2">
          <a class="nav-link" href="<?=ROOT?>comparateur">Comparateur</a>
        </li>
        <li class="nav-item2">
          <a class="nav-link" href="<?=ROOT?>marques">Marques</a>
        </li>

        <li class="nav-item2">
          <a class="nav-link" href="<?=ROOT?>avis">Avis</a>
        </li>
        
        <li class="nav-item2">
          <a class="nav-link" href="<?=ROOT?>guide">Guide </a>
        </li>
        <li class="nav-item2">
          <a class="nav-link" href="<?=ROOT?>contact">Contact</a>
        </li>
      </ul>
      </nav>
  <section id="marques" class="container-fluid">
    <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Marques:</h1>
 
    <div class="swiper myswiper">
      <div class="swiper-wrapper">
            <?php
            foreach($data['marque'] as $row) {
              echo 
              "<div class='swiper-slide'>
                <div class='card mx-5 px-2' style='border-radius:25px; /*background-color:#3B0000;*/ color:#3B0000'>
                  <img src='".ROOT."/img/".$row->lien.".png' class='card-img mt-5' style='margin: auto;' alt='...'>
                  <div class='card-body' style='text-align:center'>
                    <h4 class='card-title' style='text-align:center;'>".$row->nom."</h4>
                    <a href='".ROOT."marques/details/".$row->marque_id."' class='btn btn-danger mt-2' style='border-radius:20px; width:100px;'>Détails</a>
                  </div>
                </div>
              </div>";
            }
            ?>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

      <script>
      const swiper = new Swiper('.myswiper', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      });
    </script>

<!-- If we need navigation buttons -->

    </div>
  </section>
  
  <section id="comparateur" class="container-fluid pt-5">
    <div class="d-flex align-items-center" style="justify-content:space-between">
      <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Comparateur:</h1>
      <button id="comparer" class="btn btn-danger " style="width:200px; height:66px; margin-right:96px; border-radius:25px;background-color:#CE1212; font-size: 32px;font-weight:bold;">Comparer</button>
    </div>
    <div class="container">
      <div class="row g-4">
        <?php
          for ($i=1;$i<=4;$i++){
            echo '
              <div class="card col-md mx-3 px-3 py-3" style="border-radius:25px; background-color: transparent; border: 3px solid #3B0000;">
                <form id="vehicule'.$i.'" class="myform">
                  <img src="./img/pngwing.png" class="img-fluid mb-3 mt-3">
                  <h4 style="text-align:center; font-weight:bold;color: #3B0000">Véhicule '.$i.'</h4>
                  <div class="mb-3">
                    <label for="field1" style="font-weight:bold;">Marque</label>
                    <select class="form-select" id="Marque">
                    <option value="">Select an option</option>
                    ';
                    foreach($data['marque'] as $row){
                      echo "<option value='".$row->id."'>".$row->nom."</option>";
                    }
                    echo '
                    </select>
                  </div>
                  <div class="mb-3">
                    
                    <label for="field2" style="font-weight:bold;">Modèle</label>
                    <select class="form-select" id="modele">
                    <option value="">Select an option</option>';
                    foreach($data['modeles'] as $row){
                      echo "<option value='".$row->modele."'>".$row->modele."</option>";
                    }
                    echo '</select>
                  </div>
                  <div class="mb-3">
                    <label for="field3" style="font-weight:bold;">Version</label>
                    <select class="form-select" id="choiceInput">
                    <option value="">Select an option</option>';
                    foreach($data['versions'] as $row){
                      echo "<option value='".$row->version."'>".$row->version."</option>";
                    }
                    echo '</select>
                  </div>
                  <div class="mb-3">
                    <label for="field4" style="font-weight:bold;">Année</label>
                    <select class="form-select" id="choiceInput" >
                    <option value="">Select an option</option>';
                    foreach($data['annee'] as $row){
                      echo "<option value='".$row->annee."'>".$row->annee."</option>";
                    }
                    echo '</select>
                  </div>
                </form>
              </div>';
      }
      ?>
      </div>
    </div>
  </section>
  <section id="guide" class="container-fluid pt-5" style="padding-top: 200px;">
    <p class="mx-5 pt-5" style="color:#3B0000;font-weight:bold; font-size:60px;">GUIDE D'ACHAT</p>
    <h3 class="mx-5 pt-5" style="color:#3B0000;font-weight:bold;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
    <button class="btn float-end mx-5 my-5" style="border-radius:20px; font-size:24px;font-weight:bold;color:#F5F5F5; background-color:#3B0000">En savoir plus >></button>
  </section>
  <section class="container-fluid px-4" style="padding-top: 200px;">
  <h1 class="mx-5 pt-5" style="color:#3B0000;font-weight:bold;font-size:66px;">Top Comparaisons recherchées</h1>
  <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
  <thead>
    <tr>
      <th>Véhicule 1</th>
      <th>Véhicule 2</th>
      <th>Fréquence</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Data 1</td>
      <td>Data 2</td>
      <td>Data 3</td>
    </tr>
    <tr>
      <td>Data 1</td>
      <td>Data 2</td>
      <td>Data 3</td>
    </tr>
    <tr>
      <td>Data 1</td>
      <td>Data 2</td>
      <td>Data 3</td>
    </tr>
    </tbody>
</table>
</section>
<?php include 'footer.php'; ?>
  </body>
</html>