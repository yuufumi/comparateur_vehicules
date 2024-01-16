
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CompCar Admin</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

    <body style="font-family: 'Oswald', sans-serif;">
    <style>
        body {
    background-color: #EEEBDD;
    font-family:'Oswald';
}
.carousel-item {
    -webkit-transition: transform 0.5s ease-in-out;
    transition: transform 0.5s ease-in-out;
}
.nav-link {
    color: #F5f5f5;
    font-size:32px;
    font-weight: bold;
}
.col-md-6{
    -webkit-transition: transform 0.5s ease-in-out;
    transition: transform 0.5s ease-in-out;
}
.col-md-6:hover{
    opacity:0.5;
    -webkit-transition: transform 0.5s ease-in-out;
    transition: transform 0.5s ease-in-out;
}
.nav-item2{
    padding-left: 50px;
    padding-right: 50px;
}

.nav-link:hover{
    background-color: #EEEBDD;
    color:#3B0000;
    transition: transform 0.5s ease-in-out;
}

.navbar-nav {
    display: flex;
    justify-content: space-around;
}

.cards-wrapper {
    display: flex;
    justify-content: center;
}
.card-img{
    width: 200px;
    height: 200px;
}
.forms{
    display: flex;
    margin-left:30px;
    margin-right: 30px;
}
.voiture{
    width: 600px;
    height: 300px;
    border-radius: 20px;
    
}


    </style>
<?php
session_start();

require "../app/init.php";
$app = new AdminApp();

?>
</body>
</html>