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
    <?php include 'navbar.php';?>
    <section id="comparateur" class="container-fluid pt-5">
    <div class="d-flex align-items-center" style="justify-content:space-between">
      <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Comparateur:</h1>

      <button id="comparer" onclick="SUBMIT()" class="btn btn-danger " style="width:200px; height:66px; margin-right:96px; border-radius:25px;background-color:#CE1212; font-size: 32px;font-weight:bold;" disabled>Comparer</button>
    </div>
    <div class="container">
      <form id="vehicules" method="post" action="<?=ROOT?>comparateur">
      <div class="row g-4">
        <?php
          for ($i=1;$i<=4;$i++){
            echo '
              <div class="card col-md mx-3 px-3 py-3" style="border-radius:25px; background-color: transparent; border: 3px solid #3B0000;">

                  <img src="./img/pngwing.png" class="img-fluid mb-3 mt-3">
                  <h4 style="text-align:center; font-weight:bold;color: #3B0000">Véhicule '.$i.'</h4>
                  <div class="mb-3">
                    <label for="field1" style="font-weight:bold;">Marque</label>
                    <select name="marque_'.$i.'" class="form-select" id="Marque_'.$i.'">
                    <option value="">Select an option</option>
                    ';
                    $marques = $data['marques'];
                    foreach($marques as $row){
                      echo "<option value='".$row->marque_id."'>".$row->nom."</option>";
                    }
                    echo '
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="field2" style="font-weight:bold;">Modèle</label>
                    <select name="modele_'.$i.'" class="form-select" id="modele_'.$i.'">
                      <option value="">Select Modele</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="field3" style="font-weight:bold;">Version</label>
                    <select name="version_'.$i.'" class="form-select" id="version_'.$i.'">
                    <option value="">Select version</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="field4" style="font-weight:bold;">Année</label>
                    <select name="annee_'.$i.'" class="form-select" id="annee_'.$i.'">
                    <option value="">Select annee</option>
                    </select>
                    </div>
                  </div>';
                }
                ?>
      </div>
    </form>
    </div>
    <script>
        let check_all = 0
        $(document).ready(function(){
          let button = document.getElementById('comparer');
          for(let i = 1; i < 5;i++){
          let check_form = 0;
        $(`#Marque_${i}`).on('change', function(){
          let marque = $(this).val();
          console.log(marque);
          if(marque){
          $.ajax({
            type: 'POST',
            url: './api.php',
            data: 'marque='+marque, // Set the content type
            success: function(html) {
              $(`#modele_${i}`).html(html);
            },
            error: function(error) {
              console.error('Error:', error);
            }
          })
        }else{
          $(`#modele_${i}`).html("<option value=''>Selectionner un modele</option>")
        }
        if($(`#Marque_${i}`).val()!==''){check_form++;}  
        console.log(`check_form ${check_form}`)  
      });
        $(`#modele_${i}`).on('change', function(){
          let modele = $(this).val();
          console.log(modele);
          if(modele){
          $.ajax({
            type: 'POST',
            url: './api.php',
            data: 'modele='+modele, // Set the content type
            success: function(data) {
              $(`#version_${i}`).html(data);
            },
            error: function(error) {
              console.error('Error:', error);
            }
          })
        }else{
          $(`#version_${i}`).html("<option value=''>Selectionner une version</option>")
        }
        if($(this).val()!==''){check_form++;}
        console.log(`check_form ${check_form}`)
        });
        $(`#version_${i}`).on('change', function(){
          let version = $(this).val();
          if(version){
            $.ajax({
              type: 'POST',
              url: './api.php',
              data: 'version='+version, // Set the content type
              success: function(data) {
                $(`#annee_${i}`).html(data);
              },
              error: function(error) {
                console.error('Error:', error);
              }
            })
          }else{
            $(`#annee_${i}`).html("<option value=''>Selectionner une annee</option>")
          }
          if($(`#version_${i}`).val()!==''){check_form++;}
          console.log(`check_form ${check_form}`)
        });
        $(`#annee_${i}`).on('change', function(){
          if($(`#annee_${i}`).val()!==''){check_form++;}
          console.log(`check_form ${check_form}`)
          if(check_form>=4){
            check_all++;
            console.log(check_all)
            if(check_all>=2){
              console.log("check");
              button.disabled = false;
            }
          }
        })
      }

    });
    </script>

    <script>
      function SUBMIT(){
        $('#vehicules').submit()
      };
    </script>
  </section>  
  <section class="my-5 mx-5" style="color:#3b0000">
    <h1>Résultat de Comparaisons</h1>
    <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
        <thead>
            <tr>
                <th>caractéristique</th>
                <?php for($i=1;$i<=count($data['vehicules']);$i++){
                  echo "<th>Véhicule".$i."</th>";
                }
                ?>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-weight:500">Image</td>
                <?php for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td><img src="'.ROOT.'img/'.$data['vehicules'][$i][0]->lien.'.png" style="width:150px;height:150px;" alt="'.$i.'"></td>';
                }
                ?>
            </tr>
            <tr>
                <td style="font-weight:500">nom</td>
                <?php for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->vehicule_nom.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td style="font-weight:500">marque</td>
                <?php for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->marque_nom.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td style="font-weight:500">modele</td>
                <?php for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->modele_nom.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td style="font-weight:500">version</td>
                <?php for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->version_nom.'</td>';
                }
                ?>
            </tr>
            <tr>
                <td style="font-weight:500">année</td>
                <?php for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->annee_nom.'</td>';
                }
                ?>
            </tr>
            <?php for($i=0;$i<count($data['vehicules'][1]);$i++){
              echo '<tr><td style="font-weight:500">'.$data['vehicules'][1][$i]->feature_name.'</td>';
              for($j=1;$j<=count($data['vehicules']);$j++) {
                echo '<td>'.$data['vehicules'][$j][$i]->feature_value.'</td>';
              }
              echo '</tr>';
            }
            ?>
            <!--<tr>
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
              -->
            <tr>
                <td style="font-weight:500">prix</td>
                <?php for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->prix.' DA</td>';
                }
                ?>
            </tr>
</tbody>
</table>
</section>

<?php include 'footer.php'; ?>
</body>
</html>