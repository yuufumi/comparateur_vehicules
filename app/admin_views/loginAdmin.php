<?php
class loginAdmin extends View{
    public function __construct($data){
        $this->setStyle();
        $this->loginForm();
    }

    protected function setStyle(){
    echo '<style>
    body {
    font-family: "Oswald";
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

* {
    box-sizing: border-box;
}

.login {
    width: 500px;
    border: 2px solid #ccc;
    text-align: start;
    padding: 30px;
    background: #fcfaef;
    border-radius: 20px;
}

input {
display: block;
font-family: "Oswald",sans-serif;
font-size:20px;
border: 2px solid #ccc;
width: 95%;
padding: 10px;
margin: 10px auto;
}

label {
color: #3B0000;
font-size: 18px;
font-weight: 500;
padding: 10px;
}
h1{
color: #3B0000;
text-align: center;
margin-bottom: 20px;
}

#login {
display: block;
font-family: "Oswald",sans-serif;
font-weight: bold;
font-size: 20px;
border: 2px solid #ccc;
width: 95%;
padding: 10px;
margin-top: 70px;
margin-left: 10px;
margin-left: 10px;    
background: #f5f5f5;
border-radius: 10px;
z-index: 100px;
transition: background-color 0.1s ease-in-out;
}
#login:hover{
color: #f5f5f5;
cursor: pointer;
background-color: #3B0000;
}

#signup {
display: block;
font-family: "Oswald",sans-serif;
font-weight: bold;
font-size: 20px;
border: 2px solid #ccc;
width: 95%;
padding: 10px;
margin-top: 20px;
margin-left: 10px;
margin-left: 10px;    
color: #f5f5f5;
background-color: #3B0000;
border-radius: 10px;
z-index: 100px;
transition: background-color 0.1s ease-in-out;
}
#signup:hover{
background-color: #f5f5f5;
cursor: pointer;
color: #3B0000;
}

.error{
padding: 20px;
background: #f2dede;
color: #A94442;
border-radius: 5px;
}
</style>
    ';
}
protected function loginForm(){
    echo '<div class="login">
    <form action="'.ADMIN.'" method="post">
            <h1 >Se Connecter</h1>';
            if (isset($_SESSION['error'])) {
                echo "<p class='error'>".$_SESSION['error']."</p>";
            }
        echo '<label for="username" style>Username</label>
        <input type="text" name="username" placeholder="username">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" placeholder="Password">
        <button id="login" type="submit">Se connecter comme un admin</button>
    </form>
    </div>';
}
}

?>






    </body>
</html>