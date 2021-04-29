<!DOCTYPE html>
<html>

<head>
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
				$pdo = new PDO($dsn,$db_username,$db_password,$opt);
			 	//$get_actor_id=$_GET['act_id'];

				//$row = $result ->fetch();
				//$get_one_genre=$row['genre_name'];


	?>
	<title>sort</title>
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
			<div class="header">
				<div class="logo">
					<img src="images/logo.png" alt="IMG" width="56" height="56">
				</div>
				<div class="search">
					<div class="search2">
						<form>
							<i class="fa fa-search"></i>
							<input type="text" value="Search for a movie" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search for a movie';}"/>
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<nav class="navbar navbar-default w3_megamenu" role="navigation">
				<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#defaultmenu"
					class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a href="#" class="navbar-brand"><i class="fa fa-home"></i></a>
				</div><!-- end navbar-header -->

				<div id="defaultmenu" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href='personal-information.php'>
							<?php
							if(isset($_SESSION['email'])){

								echo $_SESSION['email'];
							}else {
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
						}else {
							echo "<li><a href='../visitor_logout.php'> Logout</a></li>";
						}
						//<li><a href="../logout.php"> Logout</button></li>
						?>

					</ul>
				</div><!-- end #navbar-collapse-1 -->

			</nav><!-- end navbar navbar-default w3_megamenu -->

			<h1>Filter</h1>

			<?php
			$filter_genre_id='';
			echo "yeysyes<br>";
			$filter_genre_id=$_GET['category'];
			echo $filter_genre_id ?>
			<div class="type">
				<ul class="category">
					<form method='get' name='form_this'>
					<li><span class="tag">All types</span></li>
					<?php
					$sql_get_genre="select genre_name,genre_id from genre";
					$get_genre = $pdo->query($sql_get_genre);

					foreach($get_genre as $row){
						//echo "<li><span>ok</span></li>";
						echo "<li><span><input type='hidden' name='category' value=".$row['genre_name']." onclick=‘sendForm()’>".$row['genre_name']."</input></span></li>";
					}
					echo "</form>";


					?>
				</ul>
				<ul class="category">
					<form method="get">
					<li><span class="tag">All regions</span></li>
					<li><span><button>Chinese Mainland</button></span></li>
					<li><span><button>U.S.A</button></span></li>
					<li><span>Hong Kong, China</span></li>
					<li><span>Taiwan, China</span></li>
					<li><span>Japan</span></li>
					<li><span>South Korea</span></li>
					<li><span>England</span></li>
					<li><span>France</span></li>
					<li><span>Germany</span></li>
					<li><span>Italy</span></li>
					<li><span>Spain</span></li>
					<li><span>India</span></li>
					<li><span>Thailand</span></li>
					<li><span>Russia</span></li>
					<li><span>Canada</span></li>
					<li><span>Australia</span></li>
					<li><span>Ireland</span></li>
				</form>
				</ul>
				<ul class="category">
					<li><span class="tag">All years</span></li>
					<li><span>2021</span></li>
					<li><span>2020</span></li>
					<li><span>2019</span></li>
					<li><span>2010years</span></li>
					<li><span>2000years</span></li>
					<li><span>90years</span></li>
					<li><span>80years</span></li>
					<li><span>70's</li>
					<li><span>60's</span></li>
					<li><span>Earlier</span></li>
				</ul>
			</div>
			<div class="tag-nav">
				<div class="tabs">
					<a href="#" index="0" class="tab tab-checked">Hot near future</a>
					<a href="#" index="1" class="tab">Highest score</a>
					<a href="#" index="2" class="tab">Latest release</a>
				</div>
			</div>
			<div class="list-wp">
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>
				<a target="_blank" href="#" class="item">
					<div class="cover-wp">
						<span class="pic">
							<img src="./images/pic-4.jpg" alt="">
						</span>
					</div>
					<p>
						<span class="title">山河令</span>
						<span class="rate">8.6</span>
					</p>
				</a>

			</div>
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
</body>

</html>
<?php
$pdo = NULL;
} catch (PDOException $e) {
exit("PDO Error: ".$e->getMessage()."<br>");
}
?>
