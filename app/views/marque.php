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
<body style="font-family: 'Oswald', sans-serif;">
    <?php include 'navbar.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <section class="d-flex justify-content-center my-3">
        <div class="mx-5" style="text-align:center">
            <img src="<?php echo ROOT.'/img/'.$data['marque'][0]->lien.'.png'?>" style="width: 250px;height:250px;" alt="">
            <h1 style="color:#3b0000"><?php echo $data['marque'][0]->nom;?></h1>
        </div>    
        <table class="table table-striped table-bordered table-center mx-5" style="background-color: #F5F5F5;color:#3B0000;font-size:24px;">
    <tbody>
      <tr>
        <td>Nom: </td>
        <td><?php echo $data['marque'][0]->nom;?></td>
      </tr>
      <tr>
        <td>Pays</td>
        <td><?php echo $data['marque'][0]->pays;?></td>
      </tr>
      <tr>
        <td>Siège social</td>
        <td><?php echo $data['marque'][0]->siege_social;?></td>
      </tr>
      <tr>
        <td>Année de création</td>
        <td><?php echo $data['marque'][0]->annee_creation;?></td>
      </tr>
        
    </tbody>
    </table>
    </section>
    <section class="my-5 mx-5">
        <h1 style="color:#3b0000; margin-top:100px;">Véhicule qui ont cette marque:</h1>
        <div class="swiper myswiper">
      <div class="swiper-wrapper">

            <?php
            foreach($data['vehicule'] as $row) {
              echo 
              "<div class='swiper-slide'>
                <div class='card mx-5 px-2' style='border-radius:25px; /*background-color:#3B0000;*/ color:#3B0000'>
                  <img src='".ROOT."/img/".$row->lien.".png' class='card-img mt-5' style='margin: auto;' alt='...'>
                  <div class='card-body' style='text-align:center'>
                    <h4 class='card-title' style='text-align:center;'>".$row->nom."</h4>
                    <a href='".ROOT."vehicule' class='btn btn-danger mt-2' style='border-radius:20px; width:100px;'>Détails vehicule</a>
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
    <section class="column my-5 mx-5">
      <h1 class="mb-5" style="font-weight:bold;color:#3b0000">Top avis appreciés</h1>
      <?php
        for($i=1;$i<=3;$i++){
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
      ?>
    </section>

    <section class="column my-5 mx-5">
        <h2 class="mb-5" style="font-weight:bold;color:#3b0000">Votre avis?</h2>
        <div class="container">
          <div class="row">
            <div class="col-lg mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Partager votre avis</h4>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group mt-3">
              <label for="avis">Avis:</label>
              <textarea class="form-control" id="avis" rows="3"></textarea>
            </div>
            <div class="form-group mt-3">
              <label for="score">Note (/10):</label>
              <input type="number" class="form-control" id="score" placeholder="Entrer une note (0-10)">
            </div>
            <button type="submit" class="btn btn-danger mt-3 float-end btn-lg" style="font-size:24px">Ajouter avis</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
    <?php include 'footer.php';?>

</body>
</html>