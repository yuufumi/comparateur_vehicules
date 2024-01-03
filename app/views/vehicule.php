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
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body style="font-family: 'Oswald';">
<?php include 'navbar.php'; ?>
<section class="d-flex justify-content-center my-3">
    <div class="ms-5" style="text-align:center">
      <img src="<?=ROOT?>/img/pngwing.png" style="width: 250px;height:250px;" alt="">
      <h1 style="color:#3b0000">Fiat sandero</h1>
      <div class="btn btn-danger btn-block btn-lg">Ajouter au favoris</div>
    </div>    
    <table class="table table-striped table-bordered table-center mx-5" style="background-color: #F5F5F5;color:#3B0000;font-size:24px;">
    <tbody>
      <tr>
        <td>Nom: </td>
        <td>Fiat</td>
      </tr>
      <tr>
        <td>Marque: </td>
        <td>Italie</td>
      </tr>
      <tr>
        <td>modèle</td>
        <td>Turin, Italie</td>
      </tr>
      <tr>
        <td>Version</td>
        <td>1937</td>
      </tr>
      <tr>
        <td>Année</td>
        <td>1937</td>
      </tr>
      <tr>
        <td>prix</td>
        <td>1937</td>
      </tr>
        
    </tbody>
    </table>
  </section>
<section class="justify-content-center mx-5 my-3" style="padding-top:70px;color:#3B0000">
    <h1 class="my-5">Caractéristiques de la voiture</h1>
    <table class="table table-striped table-bordered table-center mx-5" style="background-color: #F5F5F5;color:#3B0000;font-size:24px;">
    <tbody>
      <tr>
        <td style="font-weight:500">Nom: </td>
        <td>Fiat</td>
      </tr>
      <tr>
        <td style="font-weight:500">Marque: </td>
        <td>Italie</td>
      </tr>
      <tr>
        <td style="font-weight:500">modèle</td>
        <td>Turin, Italie</td>
      </tr>
      <tr>
        <td style="font-weight:500">Version</td>
        <td>1937</td>
      </tr>
      <tr>
        <td style="font-weight:500">Année</td>
        <td>1937</td>
      </tr>
      <tr>
        <td style="font-weight:500">prix</td>
        <td>1937</td>
      </tr>
        
    </tbody>
    </table>
</section>
<section id="comparateur" class="container-fluid pt-5">
    <div class="d-flex align-items-center" style="justify-content:space-between">
      <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Comparer avec autres vehicules:</h1>
      <button class="btn btn-danger " style="width:200px; height:66px; margin-right:96px; border-radius:25px;background-color:#CE1212; font-size: 32px;font-weight:bold;">Comparer</button>
    </div>
    <div class="container">
      <div class="row g-4">
        <?php
          for ($i=1;$i<=3;$i++){
            echo '
              <div class="card col-md mx-3 px-3 py-3" style="border-radius:25px; background-color: transparent; border: 3px solid #3B0000;">
                <form>
                  <img src="./img/pngwing.png" class="img-fluid mb-3 mt-3">
                  <h4 style="text-align:center; font-weight:bold;color: #3B0000">Véhicule '.$i.'</h4>
                  <div class="mb-3">
                    <label for="field1" style="font-weight:bold;">Marque</label>
                    <select class="form-select" id="choiceInput">
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="field2" style="font-weight:bold;">Modèle</label>
                    <select class="form-select" id="choiceInput">
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="field3" style="font-weight:bold;">Version</label>
                    <select class="form-select" id="choiceInput">
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="field4" style="font-weight:bold;">Année</label>
                    <select class="form-select" id="choiceInput">
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select>
                  </div>
                </form>
              </div>';
      }
      ?>
      </div>
    </div>
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
  </section><?php include 'footer.php'; ?>
    
</body>
</html>