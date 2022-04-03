<?
session_start();
$_SESSION['access'] = TRUE;
if ($_POST) {
    $login = $_POST['login'];
    $password = $_POST['pass'];
    if ($login != Null and $password != Null) {
        $query = "SELECT User, Login, Password FROM `userauth` WHERE Login=\"" . $login."\"";
        $mysql = new mysqli("127.0.0.1", "root", "root", "auth");
        $result = $mysql->query($query);
        $inCorrect = NULL;

        foreach ($result as $row) {
            $inCorrect = $row;
        }
        if ($inCorrect != NULL) {
            if (($password == $inCorrect['Password'])) {
                $result = $mysql->query("SELECT ID FROM `roleuser` WHERE Role=\"" . $inCorrect['User'] . "\"");
                foreach ($result as $row) {
                    $inCorrect = $row;
                }
                //echo($inCorrect['ID']);
                $value = $inCorrect['ID'] . "." . $login;
                setcookie("Profile", "", time() - 3600, "/");
                setcookie("Profile", $value, time() + 3600, "/");
                echo 1;
            } else {
                echo ("er1");
            }
        } else {
            echo ("er2");
        }
    } else {
        echo ("er3");
    }
}
