<!DOCTYPE html>
<html>

<head>
	<title>user</title>
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
			<div class="now-showing-list">
        <a href="javascript:;" class="edit"><img src="./images/edit.png" alt=""></a>
				<div class="col-md-4 movies-by-category movie-booking">
					<div class="movie-ticket-book">
						<div class="clearfix"></div>
						<img src="images/actor.PNG" alt="" />
						<div class="bahubali-details">
							<h4>user_id:</h4>
							<p>Julia</p>
							<h4>nickname:</h4>
							<p>32 years old</p>
							<h4>email:</h4>
							<p>female</p>
							<h4>description:</h4>
              <p>J and he is given the nickname of a natural singer.</p>
              <h4>gender:</h4>
							<p>J and he is given the nickname of a natural singer.</p>
						</div>
					</div>
				</div>
				<div class="col-md-8 movies-dates">	
					<div class="movie-date-selection">
						<ul>
							<li class="location">
								<a href="movie-select-show.html"><i class="fa fa-star"></i>Pirates of the Caribbean</a>
							</li>
							<li class="xing">
                <span class="act"></span>
                <span class="act"></span>
                <span class="act"></span>
                <span></span>
                <span></span>
							</li>
						</ul>
					</div>
					<div class="movie-date-selection">
						<ul>
							<li class="location">
								<a href="movie-select-show.html"><i class="fa fa-star"></i>Spiderman</a>
							</li>
              <li class="xing">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
							</li>
						</ul>
					</div>
					<div class="movie-date-selection">
						<ul>
							<li class="location">
								<a href="movie-select-show.html"><i class="fa fa-star"></i>Pirates of the Caribbean</a>
							</li>
							<li class="xing">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
							</li>
						</ul>
					</div>
					<div class="movie-date-selection">
						<ul>
							<li class="location">
								<a href="movie-select-show.html"><i class="fa fa-star"></i>Pirates of the Caribbean 2</a>
							</li>
              <li class="xing">
							  <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
							</li>
						</ul>
					</div>
					<div class="movie-date-selection">
						<ul>
							<li class="location">
								<a href="movie-select-show.html"><i class="fa fa-star"></i>iron Man</a>
							</li>
							<li class="xing">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
							</li>
						</ul>
					</div>
					<div class="movie-date-selection">
						<ul>
							<li class="location">
								<a href="movie-select-show.html"><i class="fa fa-star"></i>Pirates of the Caribbean</a>
							</li>
							<li class="xing">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
							</li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</body>

</html>