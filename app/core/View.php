<?php
class View {

    public $data = array();

    public function setData($data) {
        $this->data = $data;
    }


    public function __construct($data){
    }

    
    
    protected function navbar(){
        echo '<nav class="navbar sticky-top navbar-expand-lg navbar-light px-5">
        <div class="d-flex align-items-center">  
          <a class="navbar-brand " href="'.ROOT.'">
            <img src="'.ROOT.'img/logo.png" class="d-inline-block align-top" alt="compcar">
          </a>';
          if (isset($_SESSION['id'])){
              echo '<a class="mx-5" href="'.ROOT.'profile" style="text-decoration:none; color: #3B0000;">
              <h3>'.$_SESSION['nom'].' '.$_SESSION['prenom'].'</h3>
              </a>
              <form action="'.ROOT.'logout" method="post">
              <input type="submit" class="btn btn-danger" value="Se deconnecter">
              </form>';
            }else{
                echo '<a class="mx-5" href="'.ROOT.'login" style="text-decoration:none; color: #3B0000;">
                <h4>Se connecter</h4>
                </a>';
            }
            echo '
        </div>    
            <ul class="nav ms-auto justify-content-end "> 
                <li class="nav-item mx-2">
                    <a href="https://www.instagram.com/youcefbenali82/">
                        <img src="'.ROOT.'img/insta.png" alt="instagram">
                    </a>
                </li>
                <li class="nav-item mx-2">
                        <a href="https://www.tiktok.com/@youcefbenali467">
                            <img src="'.ROOT.'img/tiktok.png" alt="tiktok">
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="https://twitter.com/home">
                        <img src="'.ROOT.'img/twitter.png" alt="twitter">
                    </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="https://www.facebook.com/profile.php?id=61552324022503">
                        <img src="'.ROOT.'img/facebook.png" alt="facebook">
                    </a>
                    </li>
            </ul>
        </nav>';
    }

    protected function footer(){
        echo '
        <nav class="navbar sticky-bottom navbar-expand-lg justify-content-start " style="background-color:#1B1717;margin-top:150px">
        <ul class="navbar-nav mx-auto" >
          <li class="nav-item2">
            <a class="nav-link" href="'.ROOT.'" style="color:#F5F5F5;">Accueil</a>
          </li>
          <li class="nav-item2">
            <a class="nav-link" href="'.ROOT.'news" style="color:#F5F5F5;">News</a>
          </li>
          <li class="nav-item2">
            <a class="nav-link" href="'.ROOT.'comparateur" style="color:#F5F5F5;">Comparateur</a>
          </li>
          <li class="nav-item2">
            <a class="nav-link" href="'.ROOT.'marques" style="color:#F5F5F5;">Marques</a>
          </li>
          <li class="nav-item2">
            <a class="nav-link" href="'.ROOT.'avis" style="color:#F5F5F5;">Avis</a>
          </li>
          <li class="nav-item2">
            <a class="nav-link" href="'.ROOT.'contact" style="color:#F5F5F5;">Contact</a>
          </li>
        </ul>
        </nav>
        ';
    }

    protected function comparator(){
        echo '<section id="comparateur" class="container-fluid pt-5">
        <div class="d-flex align-items-center" style="justify-content:space-between">
          <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Comparateur:</h1>
            <button id="comparer" onclick="SUBMIT()" class="btn btn-danger " style="width:200px; height:66px; margin-right:96px; border-radius:25px;background-color:#CE1212; font-size: 32px;font-weight:bold;" disabled>Comparer</button>
        </div>
        <div class="container">
          <form id="vehicules" method="post" action="'.ROOT.'comparateur">
          <div class="row g-4">';
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
                        $marques = $this->data['marques'];
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
          echo '</div>
        </form>
        </div>
        <script>
            let check_all = 0
            $(document).ready(function(){
              let button = document.getElementById("comparer");
              for(let i = 1; i < 5;i++){
              let check_form = 0;
            $(`#Marque_${i}`).on("change", function(){
              let marque = $(this).val();
              console.log(marque);
              if(marque){
              $.ajax({
                type: "POST",
                url: "./api.php",
                data: "marque="+marque,
                success: function(html) {
                  $(`#modele_${i}`).html(html);
                },
                error: function(error) {
                  console.error("Error:", error);
                }
              })
            }else{
              $(`#modele_${i}`).html("<option value=``>Selectionner un modele</option>")
            }
            if($(`#Marque_${i}`).val()!==""){check_form++;}  
            console.log(`check_form ${check_form}`)  
          });
            $(`#modele_${i}`).on("change", function(){
              let modele = $(this).val();
              console.log(modele);
              if(modele){
              $.ajax({
                type: "POST",
                url: "./api.php",
                data: "modele="+modele, // Set the content type
                success: function(data) {
                  $(`#version_${i}`).html(data);
                },
                error: function(error) {
                  console.error("Error:", error);
                }
              })
            }else{
              $(`#version_${i}`).html("<option value=``>Selectionner une version</option>")
            }
            if($(this).val()!==""){check_form++;}
            console.log(`check_form ${check_form}`)
            });
            $(`#version_${i}`).on("change", function(){
              let version = $(this).val();
              if(version){
                $.ajax({
                  type: "POST",
                  url: "./api.php",
                  data: "version="+version, // Set the content type
                  success: function(data) {
                    $(`#annee_${i}`).html(data);
                  },
                  error: function(error) {
                    console.error("Error:", error);
                  }
                })
              }else{
                $(`#annee_${i}`).html("<option value=``>Selectionner une annee</option>")
              }
              if($(`#version_${i}`).val()!==""){check_form++;}
              console.log(`check_form ${check_form}`)
            });
            $(`#annee_${i}`).on("change", function(){
              if($(`#annee_${i}`).val()!==""){check_form++;}
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
            $("#vehicules").submit()
          };
        </script>
      </section>';
      }



      protected function marqueDisplay(){
        echo '<section id="marques" class="container-fluid">
        <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Marques:</h1>
     
        <div class="swiper myswiper">
          <div class="swiper-wrapper">';
                foreach($this->data['marques'] as $row) {
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
          echo '</div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
    
          <script>
          const swiper = new Swiper(".myswiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          });
        </script>
        </div>
      </section>';
      }

      protected function hNavbar(){
        echo '<nav class="navbar-dark bg-dark fixed-left" style="background-color:#1B1717;">
        <ul class="navbar-nav flex-column my-5">
        <li class="nav-item2">
        <form action="'.ADMIN.'logout" method="post">
        <button type="submit" class="py-3 btn btn-danger btn-lg" style="font-size:32px">Se deconnecter</button>
        </form>
        </li>
        <li class="nav-item2 py-5">
        <a class="nav-link" href="'.ADMIN.'" >Accueil</a>
      </li>
      <li class="nav-item2">
        <a class="nav-link py-5" href="'.ADMIN.'users" >Utilisateurs</a>
      </li>
      <li class="nav-item2">
        <a class="nav-link py-5" href="'.ADMIN.'news">News</a>
      </li>
      <li class="nav-item2">
        <a class="nav-link py-5" href="'.ADMIN.'avis" >Avis</a>
      </li>
      <li class="nav-item2">
        <a class="nav-link py-5" href="'.ADMIN.'vehicules" >Vehicules</a>
      </li>
      <li class="nav-item2">
        <a class="nav-link " href="'.ADMIN.'settings" >Paramètres</a>
      </li>
          </ul>

      </nav>
        ';
      }
    }


?>