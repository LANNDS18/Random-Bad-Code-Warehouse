<?php
session_start();
?>

<?php
if (isset($_SESSION['email'])) {
    ?>

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
        $pdo = new PDO($dsn, $db_username, $db_password, $opt);

        ?>
        <title>Personal-information</title>
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
        <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all"/>
        <script type="text/javascript" src="js/megamenu.js"></script>
        <script>$(document).ready(function () {
                $(".megamenu").megamenu();
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
                <P class="review-slider">
                <div class="now-showing-list">
                    <div class="col-md-4 movies-by-category movie-booking">
                        <div>
                            <h1>
                                Your Kiwi Profile
                            </h1>
                        </div>
                        <div class="movie-ticket-book">
                            <div class="clearfix"></div>
                            <?php
                            $Session_email = $_SESSION['email'];
                            $user_profile = $pdo->query("select profile_path from user where email = '$Session_email'");#where module='$module'
                            $row = $user_profile->fetch();
                            $profile = $row['profile_path'];
                            echo "<img src='../img/user_profile/$profile' alt=''>";
                            ?>

                            <div class="bahubali-details">

                                <h4>Nickname:</h4>
                                <?php
                                $user_nickname = $pdo->query("select nickname from user where email = '$Session_email'");#where module='$module'
                                $row = $user_nickname->fetch();
                                $nickname = $row['nickname'];
                                echo "$nickname";
                                echo "<form action='editnickname.php' method='get'>
                                  <input class='btn' type='submit' value='Edit nickname'>
                                       </form>";
                                ?>



                                <h4>Gender:</h4>
                                <?php
                                $user_gender = $pdo->query("select gender from user where email = '$Session_email'");#where module='$module'
                                $row = $user_gender->fetch();
                                $gender = $row['gender'];
                                echo "$gender";
                                echo "<form action='editgender.php' method='get'>
                                  <input class='btn' type='submit' value='Edit gender'>
                                       </form>";

                                ?>

                                <h4>Registered time:</h4>
                                <?php
                                $user_registered_time = $pdo->query("select time_stamp from user where email = '$Session_email'");#where module='$module'
                                $row = $user_registered_time->fetch();
                                $time_stamp = $row['time_stamp'];
                                $now = date("Y-m-d h:i:sa");
                                $date = floor((strtotime($now) - strtotime($time_stamp)) / 86400)+1;
                                echo "$date days";
                                ?>

                                <h4>User id:</h4>
                                <?php
                                $user_id = $pdo->query("select user_id from user where email = '$Session_email'");#where module='$module'
                                $row = $user_id->fetch();
                                $id = $row['user_id'];
                                echo "$id";
                                ?>

                                <h4>Review counter:</h4>
                                <?php
                                $review_id = $pdo->query("select count(movie_id) from review where user_id = '$id'");#where module='$module'
                                $row = $review_id->fetch();
                                $review_id = $row['count(movie_id)'];
                                echo "$review_id";
                                ?>

                                <h4>Description:</h4>
                                <?php
                                $user_des = $pdo->query("select description from user where email = '$Session_email'");#where module='$module'
                                $row = $user_des->fetch();
                                $description = $row['description'];
                                echo "$description<br><br>";
                                echo "<form action='editdescription.php' method='get'>
                                  <input class='btn' type='submit' value='Edit description'>
                                       </form>";


                                ?>




                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 movies-dates">
                        <?php
                        $review_movie_id = $pdo->query("select movie_id,time_stamp,content,rating from review where user_id = '$id' order by time_stamp desc");
                        foreach ($review_movie_id as $row) {
                            $movie_id = $row['movie_id'];
                            $time_stamp = $row['time_stamp'];
                            $review_content = $row['content'];
                            $review_rating = $row['rating'];
                            //$review_time_stamp=substr($time_stamp,0,10);
                            $result = $pdo->query("select title,poster_path from movie where movie_id = '$movie_id' ");
                            $row = $result->fetch();
                            $title = $row['title'];
                            $movie_poster = $row['poster_path'];
                            if (strlen($review_content) > 500) {
                                echo "
							<div class='movie-date-selection'>
								<div class='comment'>
										<img src=https://image.tmdb.org/t/p/w500/", $movie_poster, " height=120 width=90>
									<div class='client-message'>
										<p>
										<a href='movie-select-show.php?film_id=$movie_id'>$title</a>
										<i class='fa fa-calendar'>$time_stamp</i></p>
										<h6 overflow: hidden;>
										<details>
										<summary>click to see</summary>
										<p>$review_content</p>
										</details>
										</h6>
									</div>
									<div class='clearfix'>Rating: $review_rating / 10</div>
								</div>
							</div>
							";
                            } else {
                                echo "
							<div class='movie-date-selection'>
								<div class='comment'>
										<a href='movie-select-show.php?film_id=$movie_id'>
										<img src=https://image.tmdb.org/t/p/w500/", $movie_poster, " height=120 width=90>
										</a>
									<div class='client-message'>
										<p>
										<a href='movie-select-show.php?film_id=$movie_id'>$title</a>
										<i class='fa fa-calendar'>$time_stamp</i></p>
										<h6>$review_content</h6>
									</div>
									<div class='clearfix'>Rating: $review_rating / 10</div>
								</div>
							</div>
							";
                            }
                        }
                        ?>

                    </div>

                    <?php
                    $review_movie_id = $pdo->query("select movie_id from review where user_id = '$id'");#where module='$module'
                    foreach ($review_movie_id as $row) {
                        $movie_id = $row['movie_id'];
                        $movie_title = $pdo->query("select title from movie where movie_id = '$movie_id'");#where module='$module'
                        $row = $movie_title->fetch();
                        $title = $row['title'];
                        //echo "<a href='movie-select-show.php'>$title</a><br>";
                    }
                    ?>

                    <?php
                    $review_time_stamp = $pdo->query("select time_stamp from review where user_id = '$id'");#where module='$module'
                    foreach ($review_time_stamp as $row) {
                        $time_stamp = $row['time_stamp'];
                        //echo "<a>$time_stamp</a>";
                    }
                    ?>


                </div>


                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
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
        exit("PDO Error: " . $e->getMessage() . "<br>");
    }
    ?>

    <?php
} else {//this is html file, need to be beautified
    echo '<html><head><Script Language="JavaScript">alert("You need login to see it!");</Script></head></html>' .
        "<meta http-equiv=\"refresh\" content=\"0;url=index5.php\">";
}
?>
