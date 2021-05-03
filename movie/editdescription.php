<?php

session_start();
//$link = mysqli_connect('rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com','team39','Comp20839');
//var_dump($link);

if (isset($_SESSION['email'])) {
    $Session_email = $_SESSION['email'];
//database
    $db_hostname = "rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com";
    $db_database = "kiwi_test";
    $db_username = "team39";
    $db_password = "Comp20839";
    $db_charset = "utf8mb4";
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false);
    try {
        $pdo = new PDO($dsn, $db_username, $db_password, $opt);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (strlen($_POST["description"]) > 0) {
                $new_Description = $_POST["description"];
                $sql_update2 = "update user set description='$new_Description' where email = '$Session_email'";
                $sucess_update2 = $pdo->exec($sql_update2);
                echo '<html><head><Script Language="JavaScript">alert("Edit successfully!");</Script></head></html>' .
                    "<meta http-equiv=\"refresh\" content=\"0;url=personal-information.php\">";
            }

        }
        else {
            echo "start your edit:";
        }

        echo "<form  method='post'>
             <textarea name='description' style='resize:none;width:300px;height:100px;'placeholder='Edit Description here!'></textarea>
             <input class='btn' type='submit' value='submit'>
              </form>";







        $pdo = NULL;
    } catch (PDOException $e) {
        exit("PDO Error: " . $e->getMessage() . "<br>");
    }
}