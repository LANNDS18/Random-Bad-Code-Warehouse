<!DOCTYPE html>
<html>
<?php
session_start();// 存储 session 数据
?>

<head>

	<style>
		.row .col{
			list-style: none;
			float: left;
			width: 25%;
			height: 100px;
			position: relative;
			background-color: white;
			border: 300px solid #fff;
			overflow: hidden;
		}
	</style>



	<?php
			//$link = mysqli_connect('rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com','team39','Comp20839');
			//var_dump($link);

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
				$get_serach=$_GET['search_content'];
				$pdo = new PDO($dsn,$db_username,$db_password,$opt);
				$search_film = $pdo->query("Select *,case
when REPLACE(title, ' ', '') LIKE REPLACE('$get_serach', ' ', '') then 5
when REPLACE(title, ' ', '') LIKE REPLACE('%$get_serach%', ' ', '') then 4
when REPLACE(original_title,' ','') like replace('%$get_serach%',' ','') then 3
when overview like '%black panther%'  then 2
end as priority
from movie
where REPLACE(title, ' ', '') LIKE REPLACE('$get_serach', ' ', '')
or REPLACE(title, ' ', '') LIKE REPLACE('%$get_serach%', ' ', '')
or REPLACE(original_title,' ','') like replace('%$get_serach%',' ','')
order by priority desc limit 1000;");


	?>


	<title>movie search engine</title>
	<meta name="author" content="order by womengda.cn/" />
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<style>
		ul,
		li {
			list-style: none;
		}

		a:hover{
			text-decoration: none;
		}

		.main-content {
			padding: 20px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="main-content">
            <div class="bootstrap_container">
                <nav class="navbar navbar-default py-4 navbar-fixed-top navbar-inverse" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button class = "navbar-toggle" data-toggle = "collapse" data-target="#navbar1">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar1" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href='index5.php'><img alt="Brand" src="images/logo.png" alt="IMG" width="22"
                                                              height="17">Kiwi Box</a>
                                </li>
                                <li>
                                    <a href="classification.php?year=0">Movie Filter</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href='personal-information.php'>
                                        <?php
                                        if (isset($_SESSION['email'])) {

                                            echo $_SESSION['email'];
                                        } else {
                                            //echo "<li class='active'><a href='../visitor_warning.php'>";
                                            echo "Vistor";
                                        }
                                        ?>
                                    </a></li>
                                <!-- onclick="<script type="text/javascript">
                                    alert("log out successfully");
                                </script> " <li><a href="../index.php" >Logout</a></li>-->
                                <?php
                                if (isset($_SESSION['email'])) {
                                    echo "<li><a href='../logout.php'> Logout</a></li>";
                                } else {
                                    echo "<li><a href='../index.php'> Login</a></li>";
                                }
                                //<li><a href="../logout.php"> Logout</button></li>
                                ?>
                            </ul>

                            <form class="navbar-form navbar-right" method="get" action="movie_search.php">
                                <div class="input-group-sm">
                                    <input type="text" name="search_content" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </nav><!-- end navbar navbar-default w3_megamenu -->
            </div><!-- end container -->


			<!--
			<div class="tag-nav">
				<div class="tabs">
					<a href="javascript:goSort('other',7)" index="0" class="tab tab-checked">Hot near future</a>
					<a href="javascript:goSort('other',7)" index="1" class="tab">Highest score</a>
					<a href="javascript:goSort('other',7)" index="2" class="tab">Latest release</a>
				</div>
			</div>
			-->
			<div class="list-wp">




 <!--
this is a static example
 -->
 <?php
 echo "<h1>Search content: \"".$get_serach."\"</h1>";
 foreach($search_film as $row) {
  $get_vote_average=$row['vote_average'];
  $get_title=$row['title'];
  $film_poster=$row['poster_path'];
  $movie_id=$row['movie_id'];
	$get_vote=number_format($get_vote_average,1);

	echo "<a target='_blank' href='movie-select-show.php?film_id=$movie_id' class='item'>
		<div class='cover-wp'>
			<span class='pic'>
				<img src=https://image.tmdb.org/t/p/w500",$film_poster," height=270 width=130 alt=''>
			</span>
		</div>
		<p>
			<span class='title'>$get_title</span>
			<span class='rate'>$get_vote</span>
		</p>
	</a>";
 }
  ?>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">Shang He Ling</span>
						<span class="rate">8.6</span>
					</p>
				</a>


		</div>
	</div>
	<script>
		$('.type ul li span').click(function () {
			var index = $(this).index();
			$(this).addClass('tag').parent().siblings().children('span').removeClass('tag');
		})

		$('.tag-nav .tabs a').click(function () {
			var index = $(this).index();
			$(this).addClass('tab-checked').siblings().removeClass('tab-checked');
		})
	</script>
        <div class="logo">
            <img src="images/logo.png" alt="IMG" width="86" height="86">
            Welcome to Kiwi Box @COMP208-TEAM39-2021 Thanks for the TMDb API
        </div>
        <div class="clearfix"></div>
</body>

</html>
<?php
$pdo = NULL;
} catch (PDOException $e) {
exit("PDO Error: ".$e->getMessage()."<br>");
}
?>
