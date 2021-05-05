<!DOCTYPE html>
<?php
session_start();// 存储 session 数据
?>
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
    $pdo = new PDO($dsn, $db_username, $db_password, $opt);

    $getid = $_GET['film_id'];
    $sql_get_film = "select title,poster_path,vote_average,vote_count,overview,release_date from movie where movie_id='$getid'";
    $result = $pdo->query($sql_get_film);
    $row = $result->fetch();
    $get_film_title = $row['title'];
    $get_film_poster = $row['poster_path'];
    $get_vote_average = $row['vote_average'];
    $get_vote_count = $row['vote_count'];
    $get_film_overview = $row['overview'];
    $get_release_date = $row['release_date'];
    //$get_release_date_ymd=date('Y-m-d',$get_release_date);
    echo "<title>$get_film_title</title>";


    $sql_get_director_id = "select actor_id from cast where movie_id=$getid and identity='Produce: Director'";
    $result = $pdo->query($sql_get_director_id);
    $row = $result->fetch();
    if (isset($row['actor_id'])){
        $get_film_director_id = $row['actor_id'];
        $sql_get_director = "select name from actor where actor_id=$get_film_director_id";
        $result = $pdo->query($sql_get_director);
        $row = $result->fetch();
        $director_name = $row['name'];
        $sql_get_actor_id = "select distinct actor_id from cast where movie_id=$getid and identity like 'Act: %' limit 8";
        $get_film_actor_id = $pdo->query($sql_get_actor_id);
    }




    //$row = $result ->fetch();
    //$get_film_actor_id=$row['actor_id'];


    ?>

    <meta name="author" content="order by womengda.cn/"/>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

    <!-- Custom Theme files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>

    <!-- start menu -->
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/menu.js"></script>
    <script>$(document).ready(function () {
            $(".menu").megamenu();
        });</script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
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
    <link rel="stylesheet" href="css/menu.css"/>
    <link rel="stylesheet" href="css/rating_for_user.css"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- start-smoth-scrolling---->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
            });
        });
    </script>
    <!-- start-smoth-scrolling---->
</head>
<body>

<!-- header-section-starts -->
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

        <!-- AddThis Smart Layers END -->

        <div class="now-showing-list">
            <div class="col-md-4 movies-by-category movie-booking">
                <div class="movie-ticket-book">
                    <div class="clearfix"></div>
                    <?php
                    //echo "<a><img src=https://image.tmdb.org/t/p/w500/",$get_film_poster,"alt='' /></a>";
                    echo "<img src=", "https://image.tmdb.org/t/p/w500", $get_film_poster, " alt='' />";
                    //<img src="images/movie-show.jpg" alt="" />
                    ?>
                    <div class="bahubali-details">
                        <h4>Title</h4>
                        <p></p>
                        <h2><?php echo $get_film_title; ?></h2>
                        <h4>Release date: </h4>
                        <p><?php echo substr($get_release_date, 0, 10); ?></p>
                        <h4>Score(based on <?php echo $get_vote_count ?> votes):</h4>
                        <p><?php echo number_format($get_vote_average, 1) ?></p>
                        <h4>Director:</h4>
                        <p><?php if (isset($director_name)) echo $director_name; ?></p>
                        <h4>Actor:</h4>

                        <?php
                        if (isset($get_film_actor_id)){
                            foreach ($get_film_actor_id as $row) {
                                $get_one_actor_id = $row['actor_id'];
                                $sql_get_actor_name = "select distinct name from actor where actor_id=$get_one_actor_id and name is not NULL";
                                $result = $pdo->query($sql_get_actor_name);
                                $line = $result->fetch();
                                if (isset($line['name'])){
                                    $get_film_actor_name = $line['name'];
                                }
                                else{
                                    $get_film_actor_name = '';
                                }

                                //echo "<a href='actor.php'>$get_film_actor_name </a>";
                                //echo "<form method='get' name='form1' action='actor.php'>
                                //<input type='hidden' name='actor_id' value='$get_one_actor_id'>

                                //<a href='javascript:form1.submit();'>",$get_film_actor_name,"</a>";
                                //echo "</form>";
                                echo "<a href='actor.php?act_id=$get_one_actor_id'>$get_film_actor_name</a><br>";

                            }
                        }
                        //$film_name = $pdo->query("select title,vote_average from movie limit 15");
                        ?>


                    </div>
                </div>
            </div>

            <script type="text/javascript" language="javascript">

            </script>

            <div class="col-md-8 movies-dates">
                <div class='movie-date-selection'>

                    <?php
                    echo("<h2>Description:</h2>");
                    echo "<div class='comment'>";
                    echo "<pstyle='line-height:5'>$get_film_overview</p></div></div><br>";

                    //database review
                    $sql_get_review = "select user_id,content,time_stamp,rating from review where movie_id='$getid' order by time_stamp desc ";
                    $review_result = $pdo->query($sql_get_review);
                    foreach ($review_result as $row) {
                        $get_user_rating = $row['rating'];
                        $get_user_id_review = $row['user_id'];
                        $get_time_review = $row['time_stamp'];
                        $get_content_review = $row['content'];
                        $sql_get_user_name = "select nickname,profile_path from user where user_id=$get_user_id_review";
                        $result = $pdo->query($sql_get_user_name);
                        $row = $result->fetch();
                        $user_name = $row['nickname'];
                        $user_profile = $row['profile_path'];
                        //$get_content_sub=substr($get_content_review,100);
                        //echo "id: ".$get_user_id_review."<br>";
                        //echo "content:".$get_content_review."<br>";
                        if (strlen($get_content_review) > 500) {
                            echo "<div class='movie-date-selection'>
														<div class='comment'>
															<div class='client'>
																<img src='../img/user_profile/$user_profile' alt=''>
															</div>
															<div class='client-message'>
																<p><a href=''>$user_name</a><i class='fa fa-calendar'></i>$get_time_review</p>
																<h4>RATING: $get_user_rating</h4>
																<h6 overflow: hidden;>
																<details>
																<summary>click to see</summary>
																<p>$get_content_review</p>
																</details>
																</h6>
															</div>
															<div class='clearfix'></div>
														</div>
													 </div>";
                        } else {
                            echo "<div class='movie-date-selection'>
														 <div class='comment'>
															 <div class='client'>
																 <img src='../img/user_profile/$user_profile' alt=''>
															 </div>
															 <div class='client-message'>
																 <p><a href=''>$user_name</a><i class='fa fa-calendar'></i>$get_time_review</p>
																 <h4>RATING: $get_user_rating</h4>
																 <h6 overflow: hidden;>$get_content_review</h6>
															 </div>
															 <div class='clearfix'></div>
														 </div>
														</div>";
                        }
                    }
                    //database review
                    //
                    echo "</p>";
                    ?>
                    <?php
                    echo "<div class='movie-date-selection'>
	<div class='comment'>
		<div class='client'>
			<img src='images/c2.jpg' alt=''>
		</div>
		<div class='client-message'>
			<p><a href=''>testphp</a><i class='fa fa-calendar'></i>10 minutes ago</p>
			<h6>great fun.</h6>
		</div>
		<div class='clearfix'></div>
	</div>
</div>";

                    ?>

                    <!--
                    <div class="movie-date-selection">
                        <div class="comment">
                            <div class="client">
                                <img src="images/gc.jpg" alt="">
                            </div>
                            <div class="client-message">
                                <p><a href="#">Tompson</a><i class="fa fa-calendar"></i>1 hours ago</p>
                                <h6>have fun.have fun.have fun.have fun.have fun.have fun.have fun.have fun.have
                                    fun.have fun.have fun.have fun.</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="movie-date-selection">
                        <div class="comment">
                            <div class="client">
                                <img src="images/c1.jpg" alt="">
                            </div>
                            <div class="client-message">
                                <p><a href="#">john doe</a><i class="fa fa-calendar"></i>2 hours ago</p>
                                <h6>the director might be excellent !! While Cameron has had a great night, I suspect
                                    his problems in some way have only just begun.</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="movie-date-selection">
                        <div class="comment">
                            <div class="client">
                                <img src="images/c1.jpg" alt="">
                            </div>
                            <div class="client-message">
                                <p><a href="#">john doe</a><i class="fa fa-calendar"></i>2 hours ago</p>
                                <h6>the director might be excellent !! While Cameron has had a great night, I suspect
                                    his problems in some way have only just begun.</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>-->

                    <div>

                        <?php
                        if (isset($_SESSION['email'])) {
                            $user_email = $_SESSION['email'];
                            $sql_get_user_id = "select user_id from user where email='$user_email'";
                            $result = $pdo->query($sql_get_user_id);
                            $row = $result->fetch();
                            $get_user_id = $row['user_id'];

                            $sql = "select review_id,rating,content from review where user_id='$get_user_id' AND movie_id=$getid";
                            $result = $pdo->query($sql);
                            $row = $result->fetch();
                            if (!$row) {
                                ?>

                                <form method="post" action="movie-select-show.php?film_id=<?php echo $getid; ?>"

                                <div class="comment">
                                    <H1>Leave your Review ?</H1>

                                    <div class="rating">
                                        <input type="radio" id="star10" name="rating" value="10" hidden/>
                                        <label for="star10"></label>
                                        <input type="radio" id="star9" name="rating" value="9" hidden/>
                                        <label for="star9"></label>
                                        <input type="radio" id="star8" name="rating" value="8" hidden/>
                                        <label for="star8"></label>
                                        <input type="radio" id="star7" name="rating" value="7" hidden/>
                                        <label for="star7"></label>
                                        <input type="radio" id="star6" name="rating" value="6" hidden/>
                                        <label for="star6"></label>
                                        <input type="radio" id="star5" name="rating" value="5" hidden/>
                                        <label for="star5"></label>
                                        <input type="radio" id="star4" name="rating" value="4" hidden/>
                                        <label for="star4"></label>
                                        <input type="radio" id="star3" name="rating" value="3" hidden/>
                                        <label for="star3"></label>
                                        <input type="radio" id="star2" name="rating" value="2" hidden/>
                                        <label for="star2"></label>
                                        <input type="radio" id="star1" name="rating" value="1" hidden/>
                                        <label for="star1"></label>
                                    </div>
                                </div>
                                <textarea name="review" style="resize:none;width:600px;height:300px;"placeholder="Text the review here!"></textarea>
                                <input class="btn" type="submit" value="submit">

                                </form>


                                <?php

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    if (isset($_POST["rating"]) && isset($_POST["review"]) && strlen($_POST["review"]) > 0) {
                                        $star = $_POST["rating"];
                                        $comment = $_POST["review"];
                                        $sql_insert = "insert into review(movie_id,user_id,content,rating) values('$getid','$get_user_id','$comment','$star')";
                                        $sucess_insert = $pdo->exec($sql_insert);

                                        $sql = "select vote_count,vote_average from movie where movie_id=$getid";
                                        $result = $pdo->query($sql);
                                        $row = $result->fetch();
                                        $get_vote_count = $row['vote_count'];
                                        $get_vote_average = $row['vote_average'];
                                        $new_average = (($get_vote_count * $get_vote_average) + $star) / ($get_vote_count + 1);
                                        //echo $new_average . "<br>";
                                        $new_vote_count = $get_vote_count + 1;
                                        //echo $new_vote_count;
                                        $sql_update1 = "update movie set vote_average=$new_average where movie_id=$getid";
                                        $sucess_update1 = $pdo->exec($sql_update1);

                                        $sql_update2 = "update movie set vote_count=$new_vote_count where movie_id=$getid";
                                        $sucess_update2 = $pdo->exec($sql_update2);
                                        echo '<html><head><Script Language="JavaScript">alert("Review successfully! redirecting...");</Script></head></html>'.
                                         "<meta http-equiv=\"refresh\" content=\"0;url=movie-select-show.php?film_id=$getid\">";
                                    }else{
                                      echo '<html><head><Script Language="JavaScript">alert("you have to enter both rate and review, pleae try again");</Script></head></html>'.
                                       "<meta http-equiv=\"refresh\" content=\"0;url=movie-select-show.php?film_id=$getid\">";
                                    }
                                }
                            } else {
                              echo "<br>";
                              echo "<h4 align='center'>~</h2><br>";
                                echo "<h1 align='center'>Your have reviewed this movie :) Thank U!</h1>";
                            }


                            ?>

                            <?php
                        } else {
                            echo "<br>";
                            echo "you have to login to leave a Review!<br>";
                        }

                        ?>

                        <br>
                    </div>
                </div>
                <div class="clearfix">
                </div>


            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover"
                                                                         style="opacity: 1;"> </span></a>
</body>
</html>

<?php

$pdo = NULL;
} catch (PDOException $e) {
    exit("PDO Error: " . $e->getMessage() . "<br>");
}
?>
