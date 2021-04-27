<html>

<head>
<title> my first page</title>
</head>

<body>
<p>body hello,world.</p>

<!DOCTYPE html>
<html>
<head>
	<?php
//get variable from a form(clicked)

//require_once 'connect.php';

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
   $pdo = new PDO($dsn,$db_username,$db_password,$opt);
   $produce_director="Produce: Director";
	 //$sql_get_director_id="select actor_id from cast where movie_id=$getid AND identity='$produce_director'";
	 //$result = $pdo->query($sql_get_director_id);
	 $result = $pdo->query("select actor_id from cast where movie_id=88 AND identity='$produce_director'");
	 $row = $result ->fetch();
	 $get_film_director_id=$row['actor_id'];
   echo "id:$get_film_director_id";

   ?>
</body>

</html>
<?php

$pdo = NULL;
} catch (PDOException $e) {
exit("PDO Error: ".$e->getMessage()."<br>");
}
?>
