<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
        background: #1b1717;
        font-family: 'Oswald';
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    * {
        box-sizing: border-box;
    }

    form {
        position:absolute;
        width: 500px;
        top:5%;
        border: 2px solid #ccc;
        text-align: start;
        margin-top: 50px;
        margin-bottom: 50px;
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        background: #fcfaef;
        border-radius: 20px;
    }

input, select {
    display: block;
    font-family: 'Oswald',sans-serif;
    font-size:16px;
    border: 2px solid #ccc;
    border-radius: 10px;
    width: 95%;
    padding: 5px;
    margin: 10px auto;
}

label {
    color: #3B0000;
    font-size: 18px;
    font-weight: 500;
    padding: 10px;
}
h1{
    color: #3b0000;
    text-align: center;
    margin-bottom: 20px;
}

#login {
    display: block;
    font-family: 'Oswald',sans-serif;
    font-weight: bold;
    font-size: 20px;
    border: 2px solid #ccc;
    width: 95%;
    padding: 10px;
    margin-left: 10px;
    margin-right: 10px;    
    margin-top: 40px;
    margin-bottom: 40px;
    background: #f5f5f5;
    border-radius: 10px;
    z-index: 100px;
    transition: background-color 0.1s ease-in-out;
}
#login:hover{
    color: #3b0000;
    cursor: pointer;
    background-color: #fcfaef;
}
</style>
</head>
<body>
    <form action="" method="post">
        <h1 >Créer un compte</h1>
        <label for="nom" style>Nom</label>
        <input type="text" name="nom" placeholder="Nom">
        <label for="prenom" >Prenom</label>
        <input type="text" name="prenom" placeholder="Prénom">
        <label for="email" style>Email</label>
        <input type="text" name="email" placeholder="Adresse email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" placeholder="Mot de passe">
        <label for="birthdate">Date de naissance</label>
        <input type="text" name="password" placeholder="Date de naissance">
        <label for="sexe">Mot de passe</label>
        <select name="sexe">
            <option value="masculin">masculin</option>
            <option value="feminin">feminin</option>
        </select>
        <button id="login" type="submit">Enregistrer</button>
    </form>
    </body>
</html>