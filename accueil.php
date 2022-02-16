<?php
session_start();


// print_r($_SESSION);
// echo $_SESSION['user'];

    require 'user.php';
    
    if(isset($_SESSION['login'])) {
        echo 'Bonjour '.$_SESSION['login'];
    }

    if (isset($_POST['deconnexion'])) {
        $user->disconnect();

        header('Location: connexion-user.php');
    }

    if(isset($_POST['supprimer'])){
        $user->delete();
    } 

?>



<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/styles.css" rel="stylesheet" type="text/css">
            <title>Document</title>   
        </head>

        <body>
            <?php require 'header.php'?>
            <main>
                <section>
                    <h1>Accueil</h1>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>

                    <form action="" method="post">
                        <input type="submit" id="deconnexion" name="deconnexion" value="Déconnexion">
                    </form> 

                    <form action="" method="post">
                        <input type="submit" id="supprimer" name="supprimer" value="Supprimer">
                        
                    </form>
                </section>
            </main>
            
        <footer>
        </footer>

        </body>
    </html>  
    
