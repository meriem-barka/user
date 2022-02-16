
<?php

// session_start();

//require_once('Bdd.php');
class User //extends Bdd
{
    //Les attributs sont les caractères propres à un objet.
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $_bdd;

    //Les méthodes sont les actions applicables à un objet.
    public function __construct()
    {
        $this->bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
        return $this->bdd;
    }


    //Méthode connect 'PAGE MODEL' 

    public function register($login, $password, $email, $firstname, $lastname)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $sql = mysqli_query($this->bdd, "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$this->login', '$this->password', '$this->email', '$this->firstname', '$this->lastname')");
        echo "registration success:$this->login";
        return  '<p>' . $this->login . '</p>';
    }


    public function connect($login, $password)
    {

        $sql = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password'";
        $res = mysqli_query($this->bdd, $sql);
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);

        $_SESSION['id'] = $row[0]['id'];
        $_SESSION['login'] = $login;

        $this->id = $row[0]['id'];
        $this->login = $login;
        $this->password = $password;
    }


    public function disconnect()
    {
        session_destroy();
        unset($_SESSION);
    }


    public function delete()
    {

        if (isset($_SESSION['user'])) {

            $this->id = $_SESSION['user'];
            //$this->id = $_SESSION['user']['id'];
            $sql = mysqli_query($this->bdd, "DELETE FROM utilisateurs WHERE id = $this->id");
            //var_dump($sql);
            //$res = mysqli_fetch_all($sql, MYSQLI_ASSOC); 

            echo "OK, l'utilisateur de la sesssion en cours a bien été effacé de la bdd.";
            $this->disconnect();
        }
    }



    public function update($login, $password, $email, $firstname, $lastname)
    {

        if (isset($_SESSION['user'])) {
            $this->id = $_SESSION['user'];

            $this->login = $login;
            $this->password = $password;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;

            var_dump($login);

            $sql = mysqli_query($this->bdd, "UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE  id = '$this->id' ");

            return  $sql;
        }
    }


    public function isConnected()
    {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }


    public function getAllInfos()
    {
        $session_login = $_SESSION['login'];

        $sql = mysqli_query($this->bdd, "SELECT * FROM utilisatuers WHERE login = '$session_login' ");
        $res = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        var_dump($res);

        return $res;
    }


    public function getLogin()
    {
        $session_login = $_SESSION['login'];

        $sql = mysqli_query($this->bdd, "SELECT login FROM utilisateurs WHERE login = '$session_login' ");
        $res = mysqli_fetch_all($sql, MYSQLI_ASSOC);

        return $res;
    }


    public function getEmail()
    {
        $session_login = $_SESSION['login'];

        $sql = mysqli_query($this->bdd, "SELECT email FROM utilisateurs WHERE login = '$session_login' ");
        $res = mysqli_fetch_all($sql, MYSQLI_ASSOC);

        return $res;
    }


    public function getFirstename()
    {
        $session_login = $_SESSION['login'];

        $sql = mysqli_query($this->bdd, "SELECT firstname FROM utilisateurs WHERE login = '$session_login' ");
        $res = mysqli_fetch_all($sql, MYSQLI_ASSOC);

        return $res;
    }


    public function getLastname($Lastname)
    {
        $session_login = $_SESSION['login'];

        $sql = mysqli_query($this->bdd, "SELECT lastname FROM utilisateurs WHERE login = '$session_login' ");
        $res = mysqli_fetch_all($sql, MYSQLI_ASSOC);

        return $res;
    }
}

//var_dump($_POST);
$user = new User();
$user->getAllinfos()
// $user->register('mer', '1234', 'mer@oo.com', 'mer', 'mer');
// $user->connect('meriem', '1234');
// $user->disconnect('mer', '1234', 'mer@oo.com', 'mer', 'mer');
// $user->delete('mer', '1234');
// $user->update('mer', '12345', 'mer@oo.com', 'mer', 'mer');

// var_dump($User);


?>


   




