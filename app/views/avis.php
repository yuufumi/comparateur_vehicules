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
<body style="font-family:'Oswald'">
<?php include 'navbar.php'; ?>
<h1 class="mx-5 my-5" style="font-weight:bold;color:#3b0000">Avis: </h1>
<div class="swiper myswiper">

 <div class="row mx-5">
         <?php
         for($i=1;$i<=6;$i++) {
           echo 
           "<div class='card mx-5 px-2 my-2 col-md-3' style='border-radius:25px;border: 2px solid #3b0000; background-color:transparent; color:#3b0000'>
               <a href='".ROOT."avis/details/1' style=' text-align:center'><img src='".ROOT."/img/renault.jpg' class='card-img mt-5' style='margin: auto;' alt='...'></a>
                 <h3 class='card-title py-2' style='text-align:center;'>Véhicule ".$i." </h3>
             </div>";
         }
         ?>
   </div>


<!-- If we need navigation buttons -->

 </div>
<?php include 'footer.php'; ?> 
    
</body>
</html>