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
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script><body>
</head>
<body style="font-family:'Oswald';">
    <?php include 'navbar.php'; ?>
    <section id="comparateur" class="container-fluid pt-5">
    <div class="d-flex align-items-center" style="justify-content:space-between">
      <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Comparateur:</h1>
      <button class="btn btn-danger " style="width:200px; height:66px; margin-right:96px; border-radius:25px;background-color:#CE1212; font-size: 32px;font-weight:bold;">Comparer</button>
    </div>
    <div class="container">
      <div class="row g-4">
        <?php
          for ($i=1;$i<=4;$i++){
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
  </section>
  <section class="my-5 mx-5" style="color:#3b0000">
    <h1>Résultat de Comparaisons</h1>
    <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
        <thead>
            <tr>
                <th>caractéristique</th>
                <th>Véhicule 1</th>
                <th>Véhicule 2</th>
                <th>Véhicule 3</th>
                <th>Véhicule 4</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-weight:500">Image</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">nom</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">marque</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">modele</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">version</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">année</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">car1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">car2</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">car3</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">car4</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
            <tr>
                <td style="font-weight:500">prix</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
</tbody>
</table>
</section>

<?php include 'footer.php'; ?>
</body>
</html>