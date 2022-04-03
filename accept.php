<?
session_start();
if (!isset($_COOKIE['Profile'])) {

    header('Location: http://starter/');
}
if (!isset($_SESSION['access'])) {
    echo "Fatal_ERROR";
} else {
    $arrayRes = explode(".", $_COOKIE['Profile']);
    $mysql = new mysqli("127.0.0.1", "root", "root", "auth");
    if ($arrayRes[0] == 1) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="styleAdmin.css">
            <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script type="text/javascript" src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.6.4'></script>
        </head>

        <body>
            <div>Добро пожаловать, <? echo $arrayRes[1] ?></div>
            <div class="AllUsers">
                <?

                $query = "SELECT ID, Login FROM `userauth` WHERE User=\"Admin\"";
                $resultAdmin = $mysql->query($query);

                ?>
                <div class="tableAdmin">
                    <table class="table">
                        <caption>Админы</caption>
                        <tr>
                            <th>ID пользователя</th>
                            <th>Логин пользователя</th>
                            <th>Изменить роль</th>
                        </tr>
                        <? foreach ($resultAdmin as $rowAdmin) {
                        ?>
                            <tr>
                                <th><? print_r($rowAdmin["ID"]); ?></th>
                                <th><? print_r($rowAdmin["Login"]); ?></th>
                                <th>
                                    <div class="buttonsRole">
                                        <button class="DeleteUser" value="<? print_r($rowAdmin["ID"]); ?>">Удалить пользователя</button>
                                        <div class="SwapRole">
                                            <select class="ChangeRole" name="ChangeRole" id="ChangeRole" size="4">
                                                <Option selected value="Admin">Администратор</Option>
                                                <option value="Employee">Работник склада</option>
                                                <option value="Forwarder">Экспедитор</option>
                                                <option value="Seller">Продавец</option>
                                            </select>
                                            <button class="AcceptChange" id="AcceptChange" value="<? print_r($rowAdmin["ID"]); ?>">Подтвердить</button>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        <? } ?>
                    </table>
                </div>
                <?
                $query = "SELECT ID, Login FROM `userauth` WHERE User=\"Employee\"";
                $resultEmployee = $mysql->query($query);

                ?>
                <div class="tableEmployee">
                    <table class="table">
                        <caption>Работники склада</caption>
                        <tr>
                            <th>ID пользователя</th>
                            <th>Логин пользователя</th>
                    
                            <th>Изменить роль</th>
                        </tr>
                        <? foreach ($resultEmployee as $rowEmployee) {
                        ?>
                            <tr>
                                <th><? print_r($rowEmployee["ID"]); ?></th>
                                <th><? print_r($rowEmployee["Login"]); ?></th>
                                
                                <th>
                                    <div class="buttonsRole">
                                        <button class="DeleteUser" value="<? print_r($rowEmployee["ID"]); ?>">Удалить пользователя</button>
                                        <div class="SwapRole">
                                            <select class="ChangeRole" name="ChangeRole" id="ChangeRole" size="4">
                                                <Option value="Admin">Администратор</Option>
                                                <option selected value="Employee">Работник склада</option>
                                                <option value="Forwarder">Экспедитор</option>
                                                <option value="Seller">Продавец</option>
                                            </select>
                                            <button class="AcceptChange" id="AcceptChange" value="<? print_r($rowEmployee["ID"]); ?>">Подтвердить</button>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        <? } ?>
                    </table>
                </div>
                <?
                $query = "SELECT ID, Login FROM `userauth` WHERE User=\"Forwarder\"";
                $resultForwarder = $mysql->query($query);

                ?>
                <div class="tableForwarder">
                    <table class="table">
                        <caption>Экспедитор</caption>
                        <tr>
                            <th>ID пользователя</th>
                            <th>Логин пользователя</th>
                            <th>Изменить роль</th>
                        </tr>
                        <? foreach ($resultForwarder as $rowForwarder) {
                        ?>
                            <tr>
                                <th><? print_r($rowForwarder["ID"]); ?></th>
                                <th><? print_r($rowForwarder["Login"]); ?></th>
                                
                                <th>
                                    <div class="buttonsRole">
                                        <button class="DeleteUser" value="<? print_r($rowForwarder["ID"]); ?>">Удалить пользователя</button>
                                        <div class="SwapRole">
                                            <select class="ChangeRole" name="ChangeRole" id="ChangeRole" size="4">
                                                <Option value="Admin">Администратор</Option>
                                                <option value="Employee">Работник склада</option>
                                                <option selected value="Forwarder">Экспедитор</option>
                                                <option value="Seller">Продавец</option>
                                            </select>
                                            <button class="AcceptChange" id="AcceptChange" value="<? print_r($rowForwarder["ID"]); ?>">Подтвердить</button>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        <? } ?>
                    </table>
                </div>
                <?
                $query = "SELECT ID, Login FROM `userauth` WHERE User=\"Seller\"";
                $resultSeller = $mysql->query($query);

                ?>
                <div class="tableSeller">
                    <table class="table">
                        <caption>Продавцы</caption>
                        <tr>
                            <th>ID пользователя</th>
                            <th>Логин пользователя</th>
                            <th>Изменить роль</th>
                        </tr>
                        <? foreach ($resultSeller as $rowSeller) {
                        ?>
                            <tr>
                                <th><? print_r($rowSeller["ID"]); ?></th>
                                <th><? print_r($rowSeller["Login"]); ?></th>
                                <th>
                                    <div class="buttonsRole">
                                        <button class="DeleteUser" value="<? print_r($rowSeller["ID"]); ?>">Удалить пользователя</button>
                                        <div class="SwapRole">
                                            <select class="ChangeRole" name="ChangeRole" id="ChangeRole" size="4">
                                                <Option value="Admin">Администратор</Option>
                                                <option value="Employee">Работник склада</option>
                                                <option value="Forwarder">Экспедитор</option>
                                                <option selected value="Seller">Продавец</option>
                                            </select>
                                            <button class="AcceptChange" id="AcceptChange" value="<? print_r($rowSeller["ID"]); ?>">Подтвердить</button>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        <? } ?>
                    </table>
                </div>
            </div>
            <?
            $query = "SELECT ID, Name, Quantity FROM `nomenclature`";
            $resultProduct = $mysql->query($query);

            ?>
            <div class="tableProduct">
                <table class="table">
                    <caption>Товары</caption>
                    <tr>
                        <th>ID Товара</th>
                        <th>Название товара</th>
                        <th>Колличество товара</th>
                        <th>Изменить</th>
                    </tr>
                    <? foreach ($resultProduct as $rowProduct) {
                    ?>
                        <tr>
                            <th><? print_r($rowProduct["ID"]); ?></th>
                            <th><? print_r($rowProduct["Name"]); ?></th>
                            <th><? print_r($rowProduct["Quantity"]) ?></th>
                            <th>
                                <div class="buttonsChangeProduct">
                                    <button class="DeleteProduct" value="<? print_r($rowProduct["ID"]); ?>">Удалить товар</button>
                                    <div>
                                    <input class="Plus" type="text">
                                    <button class="PlusProduct" value="<? print_r($rowProduct["ID"]); ?>">+</button>
                                    </div>
                                    <div>
                                    <input class="Minus" type="text">
                                    <button class="MinusProduct" value="<? print_r($rowProduct["ID"]); ?>">-</button>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    <? } ?>
                </table>
            </div>
            </div>

            <div class="Add">
                <form class="form" id="form">
                    <fieldset class="inputArea" id="formArea">
                        <legend>Добавить Пользователя</legend>
                        <Label>Логин<input class="inputField" name="Login" type="text"></Label>
                        <Label>Пароль<input class="inputField" name="Password" type="text"></Label>
                        <select class="inputField" name="ChangeRole" id="ChangeRoleAdd" size="4">
                            <Option selected value="Admin">Администратор</Option>
                            <option value="Employee">Работник склада</option>
                            <option value="Forwarder">Экспедитор</option>
                            <option value="Seller">Продавец</option>
                        </select>
                        <button type="submit"> Добавить </button>
                    </fieldset>
                </form>
                <form class="formProduct" id="formProduct">
                    <fieldset class="inputArea" id="formArea">
                        <legend>Добавить Товар</legend>
                        <Label>Название Товара<input class="inputField" name="Name" type="text"></Label>
                        <Label>Колличество<input class="inputField" name="Quantity" type="text"></Label>
                        <button type="submit"> Добавить </button>
                    </fieldset>
                </form>
            </div>
            <script src="acceptjs.js" type="text/javascript"></script>
        </body>
    <?



    }
    if ($arrayRes[0] == 2) {
    ?>
    <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="styleAdmin.css">
            <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script type="text/javascript" src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.6.4'></script>
        </head>

        <body>
        <div>Добро пожаловать, <? echo $arrayRes[1] ?></div>
        <?
        $query = "SELECT ID, Name, Quantity FROM `nomenclature`";
            $resultProduct = $mysql->query($query);

            ?>
            <div class="tableProduct">
                <table class="table">
                    <caption>Товары</caption>
                    <tr>
                        <th>ID Товара</th>
                        <th>Название товара</th>
                        <th>Колличество товара</th>
                    </tr>
                    <? foreach ($resultProduct as $rowProduct) {
                    ?>
                        <tr>
                            <th><? print_r($rowProduct["ID"]); ?></th>
                            <th><? print_r($rowProduct["Name"]); ?></th>
                            <th><? print_r($rowProduct["Quantity"]) ?></th>
                        </tr>
                    <? } ?>
                </table>
            </div>
            </div>
            <div>
            <?

            $queryOrder="SELECT ID, CreateUserID FROM ordercheck Where Active=\"N\"";
            $resultOrder=$mysql->query($queryOrder);
            $count=0;
            if(!empty($resultOrder)){
            foreach($resultOrder as $rowOrder){
                $queryOrderAll="SELECT Name, Quantity, Active FROM orderproduct Where ID=".$rowOrder["ID"];
                $resultOrderAll=$mysql->query($queryOrderAll);
                ?>
                    
                    <fieldset>
                        <legend>Запрос от продавца <?print_r($rowOrder["CreateUserID"]);?></legend>
                        <table class="table">
                            <tr>
                                <th>Товар</th>
                                <th>Запращиваемое колличество</th>
                                <th>Одобрение</th>
                            </tr>
                            <?
                                foreach($resultOrderAll as $rowOrderAll){
                                    
                                
                            ?>
                            <tr>
                                <th><?print_r($rowOrderAll["Name"]);?></th>
                                <th><?print_r($rowOrderAll["Quantity"]);?></th>
                                <th><div class="checkedProduct">
                                    <input type="radio" class="inCheckedProduct_<?print_r($count);?>" value="<?print_r($rowOrderAll["Name"]."_".$rowOrderAll["Quantity"]);?>">
                                </div></th>
                            </tr>
                            <?}?>
                        </table>
                        <button type="submit" class="buttonDealAccept" value="<?print_r($rowOrder["ID"]);?>">Подтвердить</button>
                    </fieldset>
                <?
                                
                                $count++;}}
            else{
                print_r("Нет активных сделок");
            }
            ?>
            </div>
            <div>
            <?

            $queryOrder="SELECT ID, CreateUserID FROM ordercheck Where Active=\"Y\" and ischeck=1";
            $resultOrder=$mysql->query($queryOrder);
            $count=0;
            if(!empty($resultOrder)){
            foreach($resultOrder as $rowOrder){
                $queryOrderAll="SELECT Name, Quantity, Active FROM orderproduct Where ID=".$rowOrder["ID"];
                $resultOrderAll=$mysql->query($queryOrderAll);
                ?>
                    
                    <fieldset>
                        <legend>Возврат от продавца <?print_r($rowOrder["CreateUserID"]);?></legend>
                        <table class="table">
                            <tr>
                                <th>Товар</th>
                                <th>Запращиваемое колличество</th>
                                <th>Одобрение</th>
                            </tr>
                            <?
                                foreach($resultOrderAll as $rowOrderAll){
                                    
                                
                            ?>
                            <tr>
                                <th><?print_r($rowOrderAll["Name"]);?></th>
                                <th><?print_r($rowOrderAll["Quantity"]);?></th>
                                <th><div class="checkedProduct">
                                    <input type="radio" class="inCheckedProductReturn_<?print_r($count);?>" value="<?print_r($rowOrderAll["Name"]."_".$rowOrderAll["Quantity"]);?>">
                                </div></th>
                            </tr>
                            <?}?>
                        </table>
                        <button type="submit" class="buttonDealReturn" value="<?print_r($rowOrder["ID"]);?>">Подтвердить</button>
                    </fieldset>
                <?
                                
                                $count++;}}
            else{
                print_r("Нет активных сделок");
            }
            ?>
            </div>
            <div class="Add">
                <form class="form" id="form">
                    <fieldset class="inputArea" id="formArea">
                        <legend>Добавить Пользователя</legend>
                        <Label>Логин<input class="inputField" name="Login" type="text"></Label>
                        <Label>Пароль<input class="inputField" name="Password" type="text"></Label>
                        <select class="inputField" name="ChangeRole" id="ChangeRoleAdd" size="3">
                            <option selected value="Employee">Работник склада</option>
                            <option value="Forwarder">Экспедитор</option>
                            <option value="Seller">Продавец</option>
                        </select>
                        <button type="submit"> Добавить </button>
                    </fieldset>
                </form>
                <form class="formProduct" id="formProduct">
                    <fieldset class="inputArea" id="formArea">
                        <legend>Добавить Товар</legend>
                        <Label>Название Товара<input class="inputField" name="Name" type="text"></Label>
                        <Label>Колличество<input class="inputField" name="Quantity" type="text"></Label>
                        <button type="submit"> Добавить </button>
                    </fieldset>
                </form>
            </div>
            <script src="acceptjs.js" type="text/javascript"></script>
        </body>


    <?
    }
    if ($arrayRes[0] == 3) {
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="styleAdmin.css">
            <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script type="text/javascript" src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.6.4'></script>
        </head>

        <body>
        <div>Добро пожаловать, <? echo $arrayRes[1] ?></div>
        <div>
            <?
            $perSplit=strstr($_COOKIE['Profile'], ".");
            $perSplit=mb_substr($perSplit, 1);
            $queryUser="SELECT ID FROM ordercheck WHERE exp=\"".$perSplit."\"";
            $resultUser=$mysql->query($queryUser);
 
            foreach($resultUser as $rowOrder){
                $queryOrderAll="SELECT Name, Quantity, Active FROM orderproduct Where ID=".$rowOrder["ID"];
                $resultOrderAll=$mysql->query($queryOrderAll);
                ?>
                    
                    <fieldset>
                        <legend>Ваша доставка <?print_r($rowOrder["CreateUserID"]);?></legend>
                        <table class="table">
                            <tr>
                                <th>Товар</th>
                                <th>Запращиваемое колличество</th>
                            </tr>
                            <?
                                foreach($resultOrderAll as $rowOrderAll){
                                    
                                
                            ?>
                            <tr>
                                <th><?print_r($rowOrderAll["Name"]);?></th>
                                <th><?print_r($rowOrderAll["Quantity"]);?></th>

                            </tr>
                            <?}?>
                        </table>
                    </fieldset>
                <?
                                
                                }
        

            ?>
        </div>
        </body>
    <?
    }
    if ($arrayRes[0] == 4) {
    ?>
    <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="styleAdmin.css">
            <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script type="text/javascript" src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.6.4'></script>
        </head>

        <body>
        <div>Добро пожаловать, <? echo $arrayRes[1] ?></div>
        <?
            
            $query = "SELECT ID, Name, Quantity FROM `nomenclature`";
                $resultOrder = $mysql->query($query);
                $count=0;
                ?>
                <div class="tableProduct">
                    <table class="table">
                        <caption>Товары</caption>
                        <tr>
                            <th>ID Товара</th>
                            <th>Название товара</th>
                            <th>Колличество товара</th>
                            <th>Добавить</th>
                        </tr>
                        <? foreach ($resultOrder as $rowOrder) {
                        ?>
                            <tr>
                                <th><? print_r($rowOrder["ID"]); ?></th>
                                <th><? print_r($rowOrder["Name"]); ?></th>
                                <th><? print_r($rowOrder["Quantity"]) ?></th>
                                <th><div class="checkedOrder">
                                    <input type="radio" class="inCheckedOrder" value="<?print_r($rowOrder["Name"]);?>">
                                    <input type="text" class="inCheckedOrderField_<?print_r($count);?>">
                                </div></th>
                            </tr>
                        <?$count++; } ?>
                    </table>
                    <button type="submit" id="buttonOrderAccept">Подтвердить</button>
                </div>
                <?
                            $perSplit=strstr($_COOKIE['Profile'], ".");
                            $perSplit=mb_substr($perSplit, 1);
            $queryOrder="SELECT ID, CreateUserID FROM ordercheck Where Active=\"N\"";
            $resultOrder=$mysql->query($queryOrder);
            $count=0;
            if(!empty($resultOrder)){
            foreach($resultOrder as $rowOrder){
                $queryOrderAll="SELECT Name, Quantity, Active FROM orderproduct Where ID=".$rowOrder["ID"];
                $resultOrderAll=$mysql->query($queryOrderAll);
                ?>
                    
                    <fieldset>
                        <legend>Запрос для Работника склада</legend>
                        <table class="table">
                            <tr>
                                <th>Товар</th>
                                <th>Запращиваемое колличество</th>
                                <th>Одобрение</th>
                            </tr>
                            <?
                                foreach($resultOrderAll as $rowOrderAll){
                                    
                                
                            ?>
                            <tr>
                                <th><?print_r($rowOrderAll["Name"]);?></th>
                                <th><?print_r($rowOrderAll["Quantity"]);?></th>

                            </tr>
                            <?}?>
                        </table>
                    </fieldset>
                <?
                                
                               }}
            else{
                print_r("Нет активных сделок");
            }
            ?>

            <script src="acceptjs.js" type="text/javascript"></script>
            
                
            </body>
<?
    }
}

//unset($_SESSION['access']);