<!DOCTYPE html>
<html>

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
				$pdo = new PDO($dsn,$db_username,$db_password,$opt);
				$genre_array = array('','Adventure','Fantasy','Animation','Drama'
				,'Horror','Action','Comedy','History'
				,'Western','Thriller','Crime','Documentary'
			,'Science_Fiction','Mystery','Music','Romance'
		,'Family','War','TV Movie');
				$region_array = array(0=>'',1=>'China',2=>'UK',3=>'USA',4=>'Japan',
				5=>'Italy',6=>'France',7=>'Germany',8=>'Spain',9=>'India',10=>'Thailand');

				$year_array1 = array('1900-01-01','2020-01-01','2010-01-01','2000-01-01','1990-0101',
				'1980-01-01','1970-01-01','1960-01-01','1950-01-01','1800-01-01');
				$year_array2 = array('2030-01-01','2030-01-01','2020-01-01','2010-01-01','2000-01-01',
				'1990-01-01','1980-01-01','1970-01-01','1960-01-01','1950-01-01');
			 	//$get_actor_id=$_GET['act_id'];
				$get_genre_id=$_GET['genre'];
				$get_region_id=$_GET['region'];
				$get_year_id=$_GET['year'];

				$genre=$genre_array[$get_genre_id];
				$region=$region_array[$get_region_id];
				$year1=$year_array1[$get_year_id];
				$year2=$year_array2[$get_year_id];
				echo "genre: ".$genre."<br>";
				echo "region: ".$region."<br>";
				echo "year: ".$year1."<br>";
				echo "year2:".$year2."<br>";


				//$row = $result ->fetch();
				//$get_one_genre=$row['genre_name'];
			/**
			*加入搜索条件
			*/
			$where ="1";

			if(isset($year)&&($year!=0)) $where .= " AND year=".$year_array[$year];
			if(isset($ctype)&&($ctype!=0)) $where .= " AND ctype=".$ctype_array[$ctype];
			if(isset($colors)&&($colors!=0)) $where .= " AND colors=".$colors_array[$colors];
			if(isset($lengths)&&($lengths!=0)) $where .= " AND lengths=".$lengths_array[$lengths];
			if(isset($micronaire)&&($micronaire!=0)) $where .= " AND micronaire=".$micronaire_array[$micronaire];
			/**
			*加入搜索条件
			*/
	?>

	<script language="javascript">
	function getQueryString(){
	     var result = location.search.match(new RegExp("[\?\&][^\?\&]+=[^\?\&]+","g"));
	     if(result == null){
	         return "";
	     }
	     for(var i = 0; i < result.length; i++){
	         result[i] = result[i].substring(1);
	     }
	     return result;
	}
	function goSort(name,value){
	    var string_array = getQueryString();
	    var oldUrl = (document.URL.indexOf("classification.php")==-1)?document.URL+"classification.php":document.URL;
	    var newUrl;
	    if(string_array.length>0)//如果已经有筛选条件
	    {   var repeatField = false;
	        for(var i=0;i<string_array.length;i++){
	            if(!(string_array[i].indexOf(name)==-1)){
	                repeatField = true;//如果有重复筛选条件，替换条件值
	                newUrl = oldUrl.replace(string_array[i],name+"="+value);
	            }
	        }
	        //如果没有重复的筛选字段
	        if(repeatField == false){
	            newUrl = oldUrl+"&"+name+"="+value;
	        }
	    }else{//如果还没有筛选条件
	        newUrl = oldUrl+"?"+name+"="+value;
	    }
	    //跳转
	    window.location = newUrl;
	}
	function setSelected(name,value){
	    var all_li = $("#"+name).find("li");
	    //清除所有li标签的selected类
	    all_li.each(function(){
	        $(this).removeClass("selected");
	    });
	    //为选中的li增加selected类
	    all_li.eq(value).addClass("selected");
	}
	$(document).ready(function(){
	    var string_array = getQueryString();
	    for(var i=0;i<string_array.length;i++){
	        var tempArr = string_array[i].split("=");
	        setSelected(tempArr[0],tempArr[1]);//设置选中的筛选条件
	    }
	});
	</script>

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
					<a href="../../../Desktop/revise/index4.php" class="navbar-brand"><i class="fa fa-home"></i></a>
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

			<div class="type">
				<ul class="category">
					<li><span class="tag"><a href="javascript:goSort('genre',0)">All types</a></span></li>
				        <li><a href="javascript:goSort('genre',1);">Adventure</a></li>
				        <li><a href="javascript:goSort('genre',2);">Fantasy</a></li>
				        <li><a href="javascript:goSort('genre',3);">Animation</a></li>
				        <li><a href="javascript:goSort('genre',4);">Drama</a></li>
				        <li><a href="javascript:goSort('genre',5);">Horror</a></li>
				        <li><a href="javascript:goSort('genre',6);">Action</a></li>
				        <li><a href="javascript:goSort('genre',7);">Comedy</a></li>
				        <li><a href="javascript:goSort('genre',8);">History</a></li>
				        <li><a href="javascript:goSort('genre',9);">Western</a></li>
				        <li><a href="javascript:goSort('genre',10);">Thriller</a></li>
				        <li><a href="javascript:goSort('genre',11);">Crime</a></li>
				        <li><a href="javascript:goSort('genre',12);">Documentary</a></li>
				        <li><a href="javascript:goSort('genre',13);">Science Fiction</a></li>
				        <li><a href="javascript:goSort('genre',14);">Mystery</a></li>
				        <li><a href="javascript:goSort('genre',15);">Music</a></li>
				        <li><a href="javascript:goSort('genre',16);">Romance</a></li>
				        <li><a href="javascript:goSort('genre',17);">Family</a></li>
				        <li><a href="javascript:goSort('genre',18);">War</a></li>
				        <li><a href="javascript:goSort('genre',19);">TV Movie</a></li>
				</ul>
				<ul class="category">
					<li><span class="tag"><a href="javascript:goSort('region',0)">All regions</a></span></li>
					<li><span><a href="javascript:goSort('region',1)">China</a></span></li>
					<li><span><a href="javascript:goSort('region',2);">UK</a></span></li>
					<li><span><a href="javascript:goSort('region',3);">USA</a></span></li>
					<li><span><a href="javascript:goSort('region',4);">Japan</a></span></li>
					<li><span><a href="javascript:goSort('region',5);">Italy</a></span></li>
					<li><span><a href="javascript:goSort('region',6);">France</a></span></li>
					<li><span><a href="javascript:goSort('region',7);">Germany</a></span></li>
					<li><span><a href="javascript:goSort('region',8);">Spain</a></span></li>
					<li><span><a href="javascript:goSort('region',9);">India</a></span></li>
					<li><span><a href="javascript:goSort('region',10);">Thailand</a></span></li>
				</ul>
				<ul class="category">
					<li><span class="tag"><a href="javascript:goSort('year',0)">All years</span></li>
						<li><span><a href="javascript:goSort('year',1)">20's</a></span></li>
					<li><span><a href="javascript:goSort('year',2)">10's</a></span></li>
					<li><span><a href="javascript:goSort('year',3)">00's</a></span></li>
					<li><span><a href="javascript:goSort('year',4)">90's</a></span></li>
					<li><span><a href="javascript:goSort('year',5)">80's</a></span></li>
					<li><span><a href="javascript:goSort('year',6)">70's</a></span></li>
					<li><span><a href="javascript:goSort('year',7)">60's</a></span></li>
					<li><span><a href="javascript:goSort('year',8)">50's</a></span></li>
					<li><span><a href="javascript:goSort('year',9)">earlier</a></span></li>
				</ul>
			</div>
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
				


				<?php
				
$filter_film = $pdo->query("select distinct movie.movie_id,movie.vote_average, movie.title,movie.poster_path  from movie,moviegenre,genre
where movie.movie_id = moviegenre.movie_id
and moviegenre.genre_id = genre.genre_id
and release_date > '$year1' and release_date < '$year2'
and genre_name like '%$genre%'
and country like '%$region%'");#where module='$module'
foreach($filter_film as $row) {
 //$film_poster=$row['poster_path'];
 //$film_title=$row['title'];
 $get_vote_average=$row['vote_average'];
 $get_title=$row['title'];
 $film_poster=$row['poster_path'];

 echo "<a target='_blank' href='#' class='item'>
	 <div class='cover-wp'>
		 <span class='pic'>
			 <img src=https://image.tmdb.org/t/p/w500",$film_poster," height=270 width=130 alt=''>
		 </span>
	 </div>
	 <p>
		 <span class='title'>$get_title</span>
		 <span class='rate'>$get_vote_average</span>
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
