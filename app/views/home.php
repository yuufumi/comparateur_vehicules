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
            foreach($data['marques'] as $row) {
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
      <?php foreach($data['comps'] as $row){
        echo '<tr><td>'.$row->first_car_name.'</td>';
        echo '<td>'.$row->second_car_name.'</td>';
        echo '<td>'.$row->frequence.'</td></tr>';
      }
      ?>
    </tbody>
</table>
</section>
<?php include 'footer.php'; ?>
