<?php

    require 'user.php';
    session_start();
    

    //Partie Controlleur

    //Afficher les information user
    $bdd = mysqli_connect('localhost','root', 'root', 'classes'); ; 
    //var_dump($bdd);

    if (isset($_SESSION['login'])){
        
        $query = 'SELECT * FROM utilisateurs WHERE login = $_SESSION["login"] ';
        $sql = mysqli_query($bdd, $query);

   

    //Modification
    if (isset($_POST['modifier'])) {
        $user = new User();

        $user->update($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    }

        $user->isConnected();

        $res = $user->getAllInfos();

        // $res1 = $user->getLogin(); 
    //var_dump($res);

?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Création d'un site web de réservation de salles">
            <titre>Profil</titre>
        </head>

        <body>
            <?php require 'header.php'?>
            <main>
                <section>
                    <h1></h1>
                    <form action="#"  method="post">

                        <label for="login">Login :</label><br>
                        <input type="text" id="login" name="login" value=""><br>

                        <label for="password">Password :</label><br>
                        <input type="text" id="password" name="password" value=""><br><br>

                        <label for="email">Email :</label><br>
                        <input type="text" id="email" name="email" value="@gmail.com"><br>

                        <label for="firstname">Firs Name :</label><br>
                        <input type="text" id="firstname" name="firstname" value=""><br><br>

                        <label for="lastname">Last Name :</label><br>
                        <input type="text" id="lastname" name="lastname" value=""><br><br>

                        <input type="submit" id="modifier" name="modifier" value="Modifier">
                    </form><br>

                    <form action="" method="post">
                        <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
                    </form> 

                </section>  
            </main> 
        </body>
    </html> 

    <?php  
    } else {
        header('Location: connexion-user.php');
    }?>