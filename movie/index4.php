<?php
session_start();// 存储 session 数据
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="author" content="order by womengda.cn/" />
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link rel="stylesheet" href="css/menu.css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
		});
	</script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
		});
	});
</script>
<!---- start-smoth-scrolling---->

</head>
<body>
	<!-- header-section-starts -->
</div>
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
		<div class="bootstrap_container">
			<nav class="navbar navbar-default w3_megamenu" role="navigation">
				<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand"><i class="fa fa-home"></i></a>
				</div><!-- end navbar-header -->

				<div id="defaultmenu" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="personal-information.html">
							<?php
							echo $_SESSION['email'];
							 ?>
						</a></li>
						<li><a href="../index.html">Logout</a></li>
					</ul>
				</div><!-- end #navbar-collapse-1 -->

			</nav><!-- end navbar navbar-default w3_megamenu -->
		</div><!-- end container -->

		<!-- AddThis Smart Layers END -->
		<div class="review-slider">
			<ul id="flexiselDemo1">
				<li>
					<a><img src="images/r1.jpg" alt=""/></a>
					<div class="slide-title"><h4>looked up one of the more Contrary to popular </div>
						<div class="date-city">
							<div class="buy-tickets">
								<a href="movie-select-show.html">DETAIL</a>
							</div>
						</div>
					</li>
					<li>
						<a><img src="images/r2.jpg" alt=""/></a>
						<div class="slide-title"><h4>There are many 'variations' belief</h4></div>
						<div class="date-city">
							<div class="buy-tickets">
								<a href="movie-select-show.html">DETAIL</a>
							</div>
						</div>
					</li>
					<li>
						<a><img src="images/r3.jpg" alt=""/></a>
						<div class="slide-title"><h4>Finibus Bonorum et Malorum more 'Contrary'</h4></div>
						<div class="date-city">
							<div class="buy-tickets">
								<a href="movie-select-show.html">DETAIL</a>
							</div>
						</div>
					</li>
					<li>
						<a><img src="images/r4.jpg" alt=""/></a>
						<div class="slide-title"><h4>Lorem Ipsum is simply Bonorum</h4></div>
						<div class="date-city">
							<div class="buy-tickets">
								<a href="movie-select-show.html">DETAIL</a>
							</div>
						</div>
					</li>
					<li>
						<a><img src="images/r5.jpg" alt=""/></a>
						<div class="slide-title"><h4>Lorem Ipsum is simply Bonorum</h4></div>
						<div class="date-city">
							<div class="buy-tickets">
								<a href="movie-select-show.html">DETAIL</a>
							</div>
						</div>
					</li>
					<li>
						<a><img src="images/r6.jpg" alt=""/></a>
						<div class="slide-title"><h4>Lorem Ipsum is simply Bonorum</h4></div>
						<div class="date-city">
							<div class="buy-tickets">
								<a href="movie-select-show.html">DETAIL</a>
							</div>
						</div>
					</li>
				</ul>
				<script type="text/javascript">
					$(window).load(function() {

						$("#flexiselDemo1").flexisel({
							visibleItems: 5,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,
							pauseOnHover: false,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: {
								portrait: {
									changePoint:480,
									visibleItems: 2
								},
								landscape: {
									changePoint:640,
									visibleItems: 3
								},
								tablet: {
									changePoint:800,
									visibleItems: 4
								}
							}
						});
					});
				</script>
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
			<div class="footer-top-grid">
				<div class="list-of-movies col-md-8">
					<div class="featured">
						<h4>Popular</h4>
						<ul>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f4.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f5.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f6.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f1.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f2.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f3.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="featured">
						<h4>Hign Score</h4>
						<ul>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f4.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f5.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f6.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f1.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f2.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f3.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				<div class="right-side-bar">
					<div class="top-movies-in-india">
						<h4>Guess You Like</h4>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>8.0</li>
							<li><a href="movie-select-show.html">Jurassic World (3D) (U/A)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>7.6</li>
							<li><a href="movie-select-show.html">Jurassic World (3D Hindi) (U/A)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>8.1</li>
							<li><a href="movie-select-show.html">Dil Dhadakne Do (U/A)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>6.1</li>
							<li><a href="movie-select-show.html">Hamari Adhuri Kahani (U)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>7.2</li>
							<li><a href="movie-select-show.html">Premam (U)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>9.0</li>
							<li><a href="movie-select-show.html">Tanu Weds Manu Returns (U/A)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>9.9</li>
							<li><a href="movie-select-show.html">Romeo Juliet (U)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>2.0</li>
							<li><a href="movie-select-show.html">Jurassic World (IMAX 3D) (U/A)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>7.0</li>
							<li><a href="movie-select-show.html">Jurassic World (2D Hindi) (U/A)</a></li>
						</ul>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>10.0</li>
							<li><a href="movie-select-show.html">Kaaka Muttai (U)</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear'
					 		};
					 		*/

					 		$().UItoTop({ easingType: 'easeOutQuart' });

					 	});
					 </script>
					 <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

					</body>
					</html>
