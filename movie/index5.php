<?php
session_start();// store session data
?>
<!DOCTYPE html>
<html>
<head>
    <!-- 导航
                92行开始转动的电影内容（热评）
                180行 popular
                277行 highest score
                377行 Guess You Like
    -->
    <?php

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
    /*
            $stmt = $pdo->query("select title from movie limit 4");#where module='$module'
            foreach($stmt as $row) {//
             echo "___film__     ",$row["title"],"<br>";
             //echo "year:",$row["title"],"";
             #echo "<p1>$row["time"]</p1>";
            }
            //
    echo "--------------------------<br>";
            $stmt = $pdo->query("select poster_path,title from movie limit 4");#where module='$module'
            foreach($stmt as $row) {//
             $film_poster=$row['poster_path'];
             echo "movie: ",$row['title'],"<br>";
             echo "<img src=https://image.tmdb.org/t/p/w500/",$film_poster," height=220 width=150><br>";
             echo $row['poster_path'],"<br>";
             //echo "year:",$row["title"],"";
             #echo "<p1>$row["time"]</p1>";
            }
            //
    */
    ?>

    <title>Kiwi_Home</title>
    <meta name="author" content="order by womengda.cn/"/>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <link rel="stylesheet" href="css/menu.css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates,
	Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia,
	Samsung, LG, SonyErricsson, Motorola web design"/>
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

</head>
<body>
<!-- header-section-starts -->
<div id="home"></div>
</div>

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
        <div class="review-slider">
            <!--
            <a class="sort" href="classification.php">sort</a>
            <a class="user" href="user.php">user</a>
            -->
            <ul id="flexiselDemo1">

                <?php


                if (!isset($_SESSION['email'])) {//vistor
                    $similar_list = $pdo->query("select moviesimilarity.movie_id, similar_list from moviesimilarity, movie where moviesimilarity.movie_id = movie.movie_id order by vote_average desc ,release_date desc limit 3");

                    foreach ($similar_list as $row) {
                        $similar_row = $row['similar_list'];
                        $similar_id = explode(',', $similar_row);

                        for ($index = 0; $index < count($similar_id); $index++) {
                            $poster_path = $pdo->query("select poster_path,title,movie_id from movie where movie_id =$similar_id[$index] and poster_path is not null");#where module='$module'

                            foreach ($poster_path as $row) {
                                $film_poster = $row['poster_path'];
                                $film_title = $row['title'];
                                $film_id = $row['movie_id'];
                                echo "<li><a></a>", "<a href='movie-select-show.php?film_id=$film_id'><img src=https://image.tmdb.org/t/p/w300", $film_poster, " height=270 width=130></a><br>";
                                //echo "<a href='movie-select-show.php?film_id=$film_id'>$film_poster</a><br>";
                                echo "<div class=\"slide-title\"><h4>$film_title</h4></div>";
                                echo "<div class=\"date-city\">";
                                echo "<div class=\"buy-tickets\">";
                                echo "</div></div>";
                                echo "</li>";
                            }
                        }
                    }
                    // vistor
                } else {//login
                    $Session_email = $_SESSION['email'];
                    $get_user_id = $pdo->query("select user_id from user where email = '$Session_email'");
                    $row1 = $get_user_id->fetch();
                    $id = $row1['user_id'];//user_id
                    $get_user_id2 = $pdo->query("select user_id from user where user_id =$id and user_id not in (select distinct user_id from review)");
                    $row2 = $get_user_id2->fetch();
                    //$id2=$row2['user_id'];
                    if ($row2) {//login but no review
                        $similar_list = $pdo->query("select moviesimilarity.movie_id, similar_list from moviesimilarity, movie where moviesimilarity.movie_id = movie.movie_id order by vote_average desc ,release_date desc limit 3");

                        foreach ($similar_list as $row) {
                            $similar_row = $row['similar_list'];
                            $similar_id = explode(',', $similar_row);

                            for ($index = 0; $index < count($similar_id); $index++) {
                                $poster_path = $pdo->query("select poster_path,title,movie_id from movie where movie_id =$similar_id[$index] and poster_path is not null");#where module='$module'

                                foreach ($poster_path as $row) {
                                    $film_poster = $row['poster_path'];
                                    $film_title = $row['title'];
                                    $film_id = $row['movie_id'];
                                    echo "<li><a></a>", "<a href='movie-select-show.php?film_id=$film_id'><img src=https://image.tmdb.org/t/p/w300", $film_poster, " height=270 width=130></a><br>";
                                    //echo "<a href='movie-select-show.php?film_id=$film_id'>$film_poster</a><br>";
                                    echo "<div class=\"slide-title\"><h4>$film_title</h4></div>";
                                    echo "<div class=\"date-city\">";
                                    echo "<div class=\"buy-tickets\">";
                                    echo "</div></div>";
                                    echo "</li>";
                                }
                            }
                        }
                    } else {//login and have review
                        $Session_email = $_SESSION['email'];
                        $user_id = $pdo->query("select user_id from user where email = '$Session_email'");
                        $row = $user_id->fetch();
                        $id = $row['user_id'];
                        $similar_list = $pdo->query("select similar_list
                                                               from moviesimilarity as s,review as r
                                                               where user_id = $id and s.movie_id = r.movie_id
                                                               order by time_stamp desc
                                                               limit 3;");

                        foreach ($similar_list as $row) {
                            $similar_row = $row['similar_list'];
                            $similar_id = explode(',', $similar_row);

                            for ($index = 0; $index < count($similar_id); $index++) {
                                $poster_path = $pdo->query("select poster_path,title,movie_id from movie where movie_id =$similar_id[$index] and poster_path is not null");#where module='$module'

                                foreach ($poster_path as $row) {
                                    $film_poster = $row['poster_path'];
                                    $film_title = $row['title'];
                                    $film_id = $row['movie_id'];
                                    echo "<li><a></a>", "<a href='movie-select-show.php?film_id=$film_id'><img src=https://image.tmdb.org/t/p/w300", $film_poster, " height=270 width=130></a><br>";
                                    //echo "<a href='movie-select-show.php?film_id=$film_id'>$film_poster</a><br>";
                                    echo "<div class=\"slide-title\"><h4>$film_title</h4></div>";
                                    echo "<div class=\"date-city\">";
                                    echo "<div class=\"buy-tickets\">";
                                    echo "</div></div>";
                                    echo "</li>";
                                }
                            }
                        }

                    }
                }
                /*
                $Session_email = $_SESSION['email'];
                $user_id1 = $pdo->query("select user_id from user where email = '$Session_email'");
                $row1 = $user_id1 ->fetch();
                $id1=$row1['user_id'];
        $user_id2 = $pdo->query("select user_id from user where user_id =$id1 and user_id not in (select distinct user_id from review)");
                $row2 = $user_id2 ->fetch();
                $id2=$row2['user_id'];
                if (isset($_SESSION['email'])&& !$id2) {
                    $Session_email = $_SESSION['email'];
                 $user_id = $pdo->query("select user_id from user where email = '$Session_email'");
                 $row = $user_id ->fetch();
                 $id=$row['user_id'];
                  $similar_list = $pdo->query("select similar_list from moviesimilarity where movie_id in (select movie_id from review where rating > 6 and user_id = $id order by time_stamp, rating)limit 3");

          foreach($similar_list as $row ){
                    $similar_row=$row['similar_list'];
                    $similar_id = explode(',',$similar_row);

          for($index=0;$index<count($similar_id);$index++){
                    $poster_path = $pdo->query("select poster_path,title,movie_id from movie where movie_id =$similar_id[$index] and poster_path is not null");#where module='$module'

                    foreach($poster_path as $row) {
                     $film_poster=$row['poster_path'];
                     $film_title=$row['title'];
                     $film_id=$row['movie_id'];
                     echo "<li><a></a>","<a href='movie-select-show.php?film_id=$film_id'><img src=https://image.tmdb.org/t/p/w300",$film_poster," height=270 width=130></a><br>";
          //echo "<a href='movie-select-show.php?film_id=$film_id'>$film_poster</a><br>";
                     echo "<div class=\"slide-title\"><h4>$film_title </h4></div>";
                     echo "<div class=\"date-city\">";
                         echo "<div class=\"buy-tickets\">";
                        echo "</div></div>";
                        echo "</li>";
                    }
                    }
     }

                }else {
                    //Vistor
                      $similar_list = $pdo->query("select moviesimilarity.movie_id, similar_list from moviesimilarity, movie where moviesimilarity.movie_id = movie.movie_id order by vote_average desc ,release_date desc limit 3");

              foreach($similar_list as $row ){
                        $similar_row=$row['similar_list'];
                        $similar_id = explode(',',$similar_row);

              for($index=0;$index<count($similar_id);$index++){
                        $poster_path = $pdo->query("select poster_path,title,movie_id from movie where movie_id =$similar_id[$index] and poster_path is not null");#where module='$module'

                        foreach($poster_path as $row) {
                         $film_poster=$row['poster_path'];
                         $film_title=$row['title'];
                         $film_id=$row['movie_id'];
                         echo "<li><a></a>","<a href='movie-select-show.php?film_id=$film_id'><img src=https://image.tmdb.org/t/p/w300",$film_poster," height=270 width=130></a><br>";
              //echo "<a href='movie-select-show.php?film_id=$film_id'>$film_poster</a><br>";
                         echo "<div class=\"slide-title\"><h4>$film_title </h4></div>";
                         echo "<div class=\"date-city\">";
                             echo "<div class=\"buy-tickets\">";
                            echo "</div></div>";
                            echo "</li>";
                        }
                        }
    }
}

*/


                ?>
                </li>
            </ul>
            <script type="text/javascript">
                $(window).load(function () {

                    $("#flexiselDemo1").flexisel({
                        visibleItems: 5,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: false,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 2
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 3
                            },
                            tablet: {
                                changePoint: 800,
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
                    <h4>Highest Score</h4>
                    <ul>
                        <?php
                        $sql_get_movie_id = $pdo->query("select poster_path,movie_id,title,vote_average from movie
                                                                  where vote_count >= 50 and release_date >= '2006-01-01' 
                                                                  and length(title) < 20
                                                                  and poster_path is not null
                                                                  order by vote_average desc limit 9");
                        foreach ($sql_get_movie_id as $row) {
                            $film_poster = $row['poster_path'];
                            $film_title = $row['title'];
                            $film_id = $row['movie_id'];
                            $film_rating = $row['vote_average'];
                            $get_rating=number_format($film_rating,1);
                            ?>
                            <li>
                                <div class="f-movie">
                                    <div class="f-movie-img">
                                        <a href='movie-select-show.php?film_id=<?php echo $film_id;?>'>
                                            <img src=https://image.tmdb.org/t/p/w500<?php echo $film_poster;?> height=270 width=210></a>
                                    </div>
                                    <div class="f-movie-name">
                                        <a><?php echo $film_title;?></a>
                                        <p><?php echo "Rating: ".$get_rating ?></p>
                                    </div>
                                    <div class="f-buy-tickets">
                                        <a href='movie-select-show.php?film_id=<?php echo $film_id;?>'>DETAIL</a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="clearfix"></div>


                <div class="featured">
                    <h4>Popular</h4>
                    <ul>
                      <?php
                      $sql_get_movie_id = $pdo->query("select poster_path,movie_id,title,vote_average from movie
                                                    where length(title) < 25 order by vote_count desc limit 6");
                      foreach ($sql_get_movie_id as $row) {
                      $film_poster = $row['poster_path'];
                      $film_title = $row['title'];
                      $film_id = $row['movie_id'];
                      $film_rating = $row['vote_average'];
                      $get_rating=number_format($film_rating,1);
                       ?>
                        <li>
                            <div class="f-movie">
                                <div class="f-movie-img">
                                    <a href='movie-select-show.php?film_id=<?php echo $film_id;?>'>
                                      <img src=https://image.tmdb.org/t/p/w500<?php echo $film_poster;?> height=270 width=210></a>
                                </div>
                                <div class="f-movie-name">
                                    <a><?php echo $film_title;?></a>
                                    <p><?php echo "Rating: ".$get_rating ?></p>
                                </div>
                                <div class="f-buy-tickets">
                                    <a href='movie-select-show.php?film_id=<?php echo $film_id;?>'>DETAIL</a>
                                </div>
                            </div>
                        </li>
                      <?php } ?>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
            <div class="right-side-bar">
                <div class="top-movies-in-india">

                    <?php
                    //$film_name = $pdo->query("select title from movie limit 4");#where module='$module'
                    ?>
                    <h4>Guess You Like</h4>
                    <?php

                    if (!isset($_SESSION['email'])) {
                        echo "<h3><font color=red>you need login to see it</font></h3>";
                    } else {//this is html file, need to be beautified
                        $Session_email = $_SESSION['email'];
                        $get_user_id = $pdo->query("select user_id from user where email = '$Session_email'");
                        $row1 = $get_user_id->fetch();
                        $id1 = $row1['user_id'];
                        $user_id2 = $pdo->query("select user_id from user where user_id =$id1 and user_id not in (select distinct user_id from review)");
                        $row2 = $user_id2->fetch();
                        if ($row2) {
                            echo "<h3><font color=red>Insufficient data<br>Let's continue watching the movie!</font></h3>";
                        } else {
                            $Session_email = $_SESSION['email'];
                            $user_id = $pdo->query("select user_id from user where email = '$Session_email'");
                            $row = $user_id->fetch();
                            $id = $row['user_id'];

                            $users = '{';
                            $review_user_id = $pdo->query("select distinct user_id from review");
                            foreach ($review_user_id as $row) {
                                $userid = $row['user_id'];
                                $users = $users . '"' . $userid . '"' . ': ' . '{';
                                $review_movie_id = $pdo->query("select rating,movie_id from review where user_id = $userid ");
                                foreach ($review_movie_id as $row) {
                                    $movie_id = $row['movie_id'];
                                    $rating = $row['rating'];
                                    $users = $users . '"' . $movie_id . '"' . ': ' . $rating;
                                    $users = $users . ", ";
                                }
                                $users = substr($users, 0, -2);
                                $users = $users . '}' . ', ';
                            }
                            $users = substr($users, 0, -2);
                            $users = $users . '}';


                            require_once('manhattanRecommend.php');

                            $usersArray = json_decode($users, true);

                            $recommend = new manhattanRecommend;
                            $recommend = $recommend->recommend($id, $usersArray);
                            $film_id = NULL;
                            for ($index = 0; $index < count($recommend); $index++) {
                                $film_id = $recommend[$index]['name'];


                                $film_name = $pdo->query("select title,vote_average from movie where movie_id=$film_id limit 1");
                                foreach ($film_name as $row) {//
                                    $get_vote_average = $row["vote_average"];
                                    $vote = number_format($get_vote_average, 1);
                                    //echo "___film__     ",$row["title"],"<br>";
                                    //echo "year:",$row["title"],"";
                                    #echo "<p1>$row["time"]</p1>";
                                    echo "<ul class=\"mov_list\"><li><i class=\"fa fa-star\"></i></li>
                                    <li>", $vote, "</li><li><a href=\"movie-select-show.php?film_id=$film_id\">
                                    ", $row["title"], "</a></li></ul>";
                                }
                            }


                        }


                    }

                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
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
<div class="logo" align="center">
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
