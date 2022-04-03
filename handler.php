<?
session_start();
if (!isset($_COOKIE['Profile'])) {

    header('Location: http://starter/');
}
if (!isset($_SESSION['access'])) {
    echo "Fatal_ERROR";
} else {
    $mysql = new mysqli("127.0.0.1", "root", "root", "auth");

    if ($_POST["Comand"] == "DeleteUser") {
        $query = "DELETE FROM userauth WHERE ID=" . $_POST["ID"];
        $resultQuery = $mysql->query($query);
        if ($resultQuery) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if ($_POST["Comand"] == "AddUser") {
        $queryMaxId = "SELECT max(ID) FROM userauth";
        $resultID = $mysql->query($queryMaxId);
        foreach ($resultID as $rowID) {
            $maxID = $rowID["max(ID)"] + 1;
        }
        $queryAddUser = "INSERT INTO userauth SET ID = " . $maxID . ", User=\"" . $_POST["ChangeRole"] . "\", Login=\"" . $_POST["Login"] . "\", Password=\"" . $_POST["Password"] . "\"";
        $resultAddUser = $mysql->query($queryAddUser);
        if ($resultAddUser) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if ($_POST["Comand"] == "ChangeUser") {
        $querySwap = "UPDATE userauth SET User=\"" . $_POST["ChangeRole"] . "\" WHERE ID=" . $_POST["ID"];
        $resultSwap = $mysql->query($querySwap);
        if ($resultSwap) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if ($_POST["Comand"] == "AddProduct") {
        $queryAddProduct = "INSERT INTO nomenclature SET Name=\"" . $_POST["Name"] . "\", Quantity= ". $_POST["Quantity"];
        $resultAddProduct = $mysql->query($queryAddProduct);
        if ($resultAddProduct) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if ($_POST["Comand"] == "DeleteProduct") {
        $queryDelProduct = "DELETE FROM nomenclature WHERE ID=" . $_POST["ID"];
        $resultDelProduct = $mysql->query($queryDelProduct);
        if ($resultDelProduct) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if ($_POST["Comand"] == "MinusProduct") {
        $queryGetProduct = "SELECT Quantity FROM nomenclature WHERE ID=" . $_POST["ID"];
        $checkQuantity = $mysql->query($queryGetProduct);
        foreach ($checkQuantity as $rowQuantity) {
            $checkOK = $rowQuantity["Quantity"];
        }
        if ($checkOK < $_POST["Minus"]) {
            $queryMinus = "UPDATE nomenclature SET Quantity=\"0\" WHERE ID=" . $_POST["ID"];
            $resultMinus = $mysql->query($queryMinus);
            if ($resultMinus) {
                echo 1;
            } else {
                echo 2;
            }
        } else {
            $varForMinus = $checkOK - $_POST["Minus"];
            $queryMinus = "UPDATE nomenclature SET Quantity=\"" . $varForMinus . "\" WHERE ID=" . $_POST["ID"];
            $resultMinus = $mysql->query($queryMinus);
            if ($resultMinus) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }

    if($_POST["Comand"]=="PlusProduct"){
        $queryGetProduct = "SELECT Quantity FROM nomenclature WHERE ID=" . $_POST["ID"];
        $checkQuantity = $mysql->query($queryGetProduct);
        foreach ($checkQuantity as $rowQuantity) {
            $checkOK = $rowQuantity["Quantity"];
        }
        $varForPlus=$checkOK+$_POST["Plus"];
        $queryPlus="UPDATE nomenclature SET Quantity=\"".$varForPlus."\" WHERE ID =".$_POST["ID"];
        $resultPlus=$mysql->query($queryPlus);
        if ($resultPlus) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if($_POST["Comand"]=="Reserve"){
        $queryGetOrder="SELECT Name From orderproduct Where ID=".$_POST["ID"];
        $resultGetOrder=$mysql->query($queryGetOrder);
        foreach($resultGetOrder as $rowGetOrder){
            foreach($_POST as $key=>$value){
                if($rowGetOrder["Name"]==$key){
                    $query="Select Quantity from nomenclature where Name=\"".$key."\"";
                    $resultQuery=$mysql->query($query);
                    foreach($resultQuery as $row){
                        $resultReserve=$row["Quantity"]-$_POST[$key];
                        $querySQL="UPDATE orderproduct SET Active=\"N\" Where ID=".$_POST["ID"]." and Name=\"".$key."\"";
                        $mysql->query($querySQL);
                    }
                    
                    $queryUpdateProduct="UPDATE nomenclature SET Quantity=".$resultReserve."  Where Name=\"".$key."\"";
                    $mysql->query($queryUpdateProduct);
                }

            }
        }
        $queryCheck="UPDATE ordercheck SET Active=\"Y\" Where ID=".$_POST["ID"];
        $resultCheck=$mysql->query($queryCheck);
        if ($resultCheck) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if($_POST["Comand"]=="Return"){
        $queryGetOrder="SELECT Name From orderproduct Where ID=".$_POST["ID"];
        $resultGetOrder=$mysql->query($queryGetOrder);
        foreach($resultGetOrder as $rowGetOrder){
            foreach($_POST as $key=>$value){
                if($rowGetOrder["Name"]==$key){
                    $query="Select Quantity from nomenclature where Name=\"".$key."\"";
                    $resultQuery=$mysql->query($query);
                    foreach($resultQuery as $row){
                        $resultReserve=$row["Quantity"]+$_POST[$key];
                    }
                    
                    $queryUpdateProduct="UPDATE nomenclature SET Quantity=".$resultReserve."  Where Name=\"".$key."\"";
                    $mysql->query($queryUpdateProduct);
                }

            }
        }
        $queryDelete="DELETE from orderproduct where ID=".$_POST["ID"];
        $mysql->query($queryDelete);
        $queryCheck="DELETE from ordercheck where ID=".$_POST["ID"];
        $resultCheck=$mysql->query($queryCheck);
        if ($resultCheck) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if($_POST["Comand"]=="CreateOrder"){
        $perSplit=strstr($_COOKIE['Profile'], ".");
        $perSplit=mb_substr($perSplit, 1);
        $queryAddProduct="Insert Into ordercheck SET CreateUserID=\"".$perSplit."\", Active=\"N\", ischeck=0";
        //$mysql->query($queryAddProduct);
        sleep(3);
        $resFast=$mysql->query("SELECT max(ID) From ordercheck");
        foreach($resFast as $row){
        $queryGetOrder="SELECT Name From nomenclature ";
        $resultGetOrder=$mysql->query($queryGetOrder);
        foreach($resultGetOrder as $rowGetOrder){
            foreach($_POST as $key=>$value){ 
                if($rowGetOrder["Name"]==$key){
                    $queryAddProduct1="Insert Into orderproduct SET ID=".$row["max(ID)"].",Name=\"".$key."\", Quantity=\"".$value."\", Active=\"Y\", ischeck=0, exp=12345" ; 
                    $mysql->query($queryAddProduct1);
                }
            }
        }
        echo 1;
    }
    }
}
