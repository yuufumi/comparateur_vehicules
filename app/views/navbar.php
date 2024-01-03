<nav class="navbar navbar-expand-lg navbar-light px-5">
      <div class="d-flex align-items-center">  
        <a class="navbar-brand " href="<?=ROOT?>">
          <img src="<?=ROOT?>img/logo.png" class="d-inline-block align-top" alt="compcar">
        </a>
        <?php if (isset($_SESSION['id'])) : ?>
          <a class="mx-5" href="<?=ROOT?>profile" style="text-decoration:none; color: #3B0000;">
            <h3><?php echo $_SESSION['nom']." ".$_SESSION['prenom']?></h3>
          </a>
          <form action="<?=ROOT?>logout" method="post">
            <input type="submit" class="btn btn-danger" value="Se deconnecter">
          </form>
        <?php else : ?>
          <a class="mx-5" href="<?=ROOT?>login" style="text-decoration:none; color: #3B0000;">
            <h4>Se connecter</h4>
          </a>
        <?php endif; ?>
      </div>    
          <ul class="nav ms-auto justify-content-end "> 
              <li class="nav-item mx-2">
                  <a href="https://www.instagram.com/youcefbenali82/">
                      <img src="<?=ROOT?>img/insta.png" alt="instagram">
                  </a>
              </li>
              <li class="nav-item mx-2">
                      <a href="https://www.tiktok.com/@youcefbenali467">
                          <img src="<?=ROOT?>img/tiktok.png" alt="tiktok">
                      </a>
                  </li>
                  <li class="nav-item mx-2">
                      <a href="https://twitter.com/home">
                      <img src="<?=ROOT?>img/twitter.png" alt="twitter">
                  </a>
                  </li>
                  <li class="nav-item mx-2">
                      <a href="https://www.facebook.com/profile.php?id=61552324022503">
                      <img src="<?=ROOT?>img/facebook.png" alt="facebook">
                  </a>
                  </li>
          </ul>
      </nav>