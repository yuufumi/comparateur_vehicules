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
<body style="font-family: 'Oswald';">
<?php include 'navbar.php'; /*show($data['vehicule'])*/?>
<section class="d-flex justify-content-center my-3">
    <div class="ms-5" style="text-align:center">
      <img src="<?=ROOT?>/img/<?=$data['vehicule'][0]->lien?>.png" style="width: 250px;height:250px;" alt="">
      <h1 style="color:#3b0000"><?php echo $data['vehicule'][0]->vehicule_nom ?></h1>
      <form action="<?=ROOT?>vehicules/details/<?=$data['vehicule'][0]->vehicule_id?>" method="POST">
      <input type="text" name="user" value="<?=$_SESSION['id']?>" hidden>
      <input type="text" name="car" value="<?=$data['vehicule'][0]->vehicule_id?>" hidden>
      <button type="submit" class="btn btn-danger btn-block btn-lg">Ajouter au favoris</button>
      </form>
    </div>    
    <table class="table table-striped table-bordered table-center mx-5" style="background-color: #F5F5F5;color:#3B0000;font-size:24px;">
    <tbody>
      <tr>
        <td>Nom: </td>
        <td><?php echo $data['vehicule'][0]->vehicule_nom ?></td>
      </tr>
      <tr>
        <td>Marque: </td>
        <td><?php $post['marque_1'] = $data['vehicule'][0]->marque_id;echo $data['vehicule'][0]->marque_nom ?></td>
      </tr>
      <tr>
        <td>modèle</td>
        <td><?php $post['modele_1'] = $data['vehicule'][0]->modele_id;echo $data['vehicule'][0]->modele_nom ?></td>
      </tr>
      <tr>
        <td>Version</td>
        <td><?php $post['version_1'] = $data['vehicule'][0]->version;;echo $data['vehicule'][0]->version ?></td>
      </tr>
      <tr>
        <td>Année</td>
        <td><?php $post['annee_1'] = $data['vehicule'][0]->version_id;echo $data['vehicule'][0]->annee ?></td>
      </tr>
      <tr>
        <td>prix</td>
        <td><?php echo $data['vehicule'][0]->prix ?> DA</td>
      </tr>
        
    </tbody>
    </table>
  </section>
  <section class="justify-content-center mx-5 my-3" style="padding-top:70px;color:#3B0000">
    <h1 class="my-5">Caractéristiques de la voiture</h1>
    <table class="table table-striped table-bordered table-center mx-5" style="background-color: #F5F5F5;color:#3B0000;font-size:24px;">
    <tbody>
      <?php for($i=0;$i<count($data['vehicule']);$i++){
        echo '<tr><td style="font-weight:500">'.$data['vehicule'][$i]->feature_name.'</td>';
        echo '<td>'.$data['vehicule'][$i]->Value.'</td>';
        echo '</tr>';
        }
      ?>
    </tbody>
    </table>
</section>
<section id="comparateur" class="container-fluid pt-5">
    <div class="d-flex align-items-center" style="justify-content:space-between">
      <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Comparateur:</h1>
        <button id="comparer" onclick="SUBMIT()" class="btn btn-danger " style="width:200px; height:66px; margin-right:96px; border-radius:25px;background-color:#CE1212; font-size: 32px;font-weight:bold;" disabled>Comparer</button>
    </div>
    <div class="container">
      <form id="vehicules" method="post" action="<?=ROOT?>comparateur">
      <div class="row g-4">
        <div hidden>
            <select name="marque_1" class="form-select" id="Marque_'.$i.'">
              <option value="<?=$post['marque_1']?>"></option>
            </select>
            <select name="modele_1" class="form-select" id="modele_'.$i.'">
              <option value="<?=$post['modele_1']?>"></option>
            </select>
            <select name="version_1" class="form-select" id="version_'.$i.'">
              <option value="<?=$post['version_1']?>"></option>
            </select>
            <select name="annee_1" class="form-select" id="annee_'.$i.'">
              <option value="<?=$post['annee_1']?>"></option>
            </select>
        </div>
        <?php
          for ($i=2;$i<=4;$i++){
            echo '
              <div class="card col-md mx-3 px-3 py-3" style="border-radius:25px; background-color: transparent; border: 3px solid #3B0000;">

                  <img src="'.ROOT.'img/pngwing.png" class="img-fluid mb-3 mt-3">
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
            url: '<?=ROOT?>api.php',
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
            url: '<?=ROOT?>api.php',
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
              url: '<?=ROOT?>api.php',
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
            if(check_all>=1){
              console.log("check");
              button.disabled = false;
            }
          }
        })
      }

    });
      function SUBMIT(){
        $('#vehicules').submit()
      };
    </script>
    <section class="column my-5 mx-5">
      <h1 class="mb-5" style="font-weight:bold;color:#3b0000">Top avis appreciés</h1>
      <?php
        foreach($data['avis'] as $row){
          echo '<div class="col-lg mb-4">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="card-title">Avis</h5>
              <span class="badge rounded-pill" style="background-color:#1b1717;">'.$row->note.'</span>
            </div>
            <div class="card-body">
              <p class="card-text">Comment from user '.$row->nom.' '.$row->prenom.'</p>
              <p class="medium text-muted">'.$row->commentaire.'</p>
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
          <form id="AvisForm" action="<?=ROOT?>/vehicules/<?=$data['vehicule'][0]->vehicule_id?>" method="POST">
            <input name="user" value="<?=$_SESSION['id']?>" hidden>
            <input name="vehicule" value="<?=$data['vehicule'][0]->vehicule_id?>" hidden>
            
            <div class="form-group mt-3">
              <label for="avis">Avis:</label>
              <textarea class="form-control" id="avis" name="avis" rows="3"></textarea>
            </div>
            <div class="form-group mt-3">
              <label for="score">Note (/10):</label>
              <input name="note" type="number" min=0 max=10 class="form-control" id="score" placeholder="Entrer une note (0-10)">
            </div>
            <button id="submitAvis" type="submit" class="btn btn-danger mt-3 float-end btn-lg" style="font-size:24px">Ajouter avis</button>
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