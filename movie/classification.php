<!DOCTYPE html>
<html>
<?php
session_start();// store session data
?>

<head>

    <style>
        .row .col {
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
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
    $genre_array = array('', 'Adventure', 'Fantasy', 'Animation', 'Drama'
    , 'Horror', 'Action', 'Comedy', 'History'
    , 'Western', 'Thriller', 'Crime', 'Documentary'
    , 'Science_Fiction', 'Mystery', 'Music', 'Romance'
    , 'Family', 'War', 'TV Movie');
    $region_array = array(0 => '', 1 => 'China', 2 => 'UK', 3 => 'United States of America', 4 => 'Japan',
        5 => 'Italy', 6 => 'France', 7 => 'Germany', 8 => 'Spain', 9 => 'India', 10 => 'Thailand',11 => 'Poland',
      12 => 'Austria', 13 => 'New Zealand', 14 => 'Mexico', 15 => 'Denmark', 16 => 'Canada', 17 => 'Sweden'
    , 18 => 'Portugal');

    $year_array1 = array('1900-01-01', '2020-01-01', '2010-01-01', '2000-01-01', '1990-01-01',
        '1980-01-01', '1970-01-01', '1960-01-01', '1950-01-01', '1800-01-01');
    $year_array2 = array('2030-01-01', '2030-01-01', '2020-01-01', '2010-01-01', '2000-01-01',
        '1990-01-01', '1980-01-01', '1970-01-01', '1960-01-01', '1950-01-01');
    //$get_actor_id=$_GET['act_id'];
    if (empty($_GET['genre'])) {
        $get_genre_id = 0;
    } else {
        $get_genre_id = $_GET['genre'];
    }
    if (empty($_GET['region'])) {
        $get_region_id = 0;
    } else {
        $get_region_id = $_GET['region'];
    }

    //$get_year_id=0;
    $get_year_id = $_GET['year'];

    $genre = $genre_array[$get_genre_id];
    $region = $region_array[$get_region_id];
    $year1 = $year_array1[$get_year_id];
    $year2 = $year_array2[$get_year_id];
    /*
    echo "genre: ".$genre."<br>";
    echo "region: ".$region."<br>";
    echo "year: ".$year1."<br>";
    echo "year2:".$year2."<br>";
*/

    //$row = $result ->fetch();
    //$get_one_genre=$row['genre_name'];
    /*
    $where ="1";

    if(isset($year)&&($year!=0)) $where .= " AND year=".$year_array[$year];
    if(isset($ctype)&&($ctype!=0)) $where .= " AND ctype=".$ctype_array[$ctype];
    if(isset($colors)&&($colors!=0)) $where .= " AND colors=".$colors_array[$colors];
    if(isset($lengths)&&($lengths!=0)) $where .= " AND lengths=".$lengths_array[$lengths];
    if(isset($micronaire)&&($micronaire!=0)) $where .= " AND micronaire=".$micronaire_array[$micronaire];
    *加入搜索条件
    */
    ?>

    <script language="javascript">
        function getQueryString() {
            var result = location.search.match(new RegExp("[\?\&][^\?\&]+=[^\?\&]+", "g"));
            if (result == null) {
                return "";
            }
            for (var i = 0; i < result.length; i++) {
                result[i] = result[i].substring(1);
            }
            return result;
        }

        function goSort(name, value) {
            var string_array = getQueryString();
            var oldUrl = (document.URL.indexOf("classification.php") == -1) ? document.URL + "classification.php" : document.URL;
            var newUrl;
            if (string_array.length > 0)//如果已经有筛选条件
            {
                var repeatField = false;
                for (var i = 0; i < string_array.length; i++) {
                    if (!(string_array[i].indexOf(name) == -1)) {
                        repeatField = true;//如果有重复筛选条件，替换条件值
                        newUrl = oldUrl.replace(string_array[i], name + "=" + value);
                    }
                }
                //如果没有重复的筛选字段
                if (repeatField == false) {
                    newUrl = oldUrl + "&" + name + "=" + value;
                }
            } else {//如果还没有筛选条件
                newUrl = oldUrl + "?" + name + "=" + value;
            }
            //跳转
            window.location = newUrl;
        }

        function setSelected(name, value) {
            var all_li = $("#" + name).find("li");
            //清除所有li标签的selected类
            all_li.each(function () {
                $(this).removeClass("selected");
            });
            //为选中的li增加selected类
            all_li.eq(value).addClass("selected");
        }

        $(document).ready(function () {
            var string_array = getQueryString();
            for (var i = 0; i < string_array.length; i++) {
                var tempArr = string_array[i].split("=");
                setSelected(tempArr[0], tempArr[1]);//设置选中的筛选条件
            }
        });
    </script>

    <title>movie filter</title>
    <meta name="author" content="order by womengda.cn/"/>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <!-- Custom Theme files -->
    <script src="js/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script
            type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <style>
        ul,
        li {
            list-style: none;
        }

        a:hover {
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
                <li><span><a href="javascript:goSort('region',11);">Poland</a></span></li>
                <li><span><a href="javascript:goSort('region',12);">Austria</a></span></li>
                <li><span><a href="javascript:goSort('region',13);">New Zealand</a></span></li>
                <li><span><a href="javascript:goSort('region',14);">Mexico</a></span></li>
                <li><span><a href="javascript:goSort('region',15);">Denmark</a></span></li>
                <li><span><a href="javascript:goSort('region',16);">Canada</a></span></li>
                <li><span><a href="javascript:goSort('region',17);">Sweden</a></span></li>
                <li><span><a href="javascript:goSort('region',18);">Portugal</a></span></li>



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
            <?php
            echo "Genre: " . $genre . "<br>";
            echo "Region: " . $region . "<br>";
            $echo_year1 = substr($year1, 0, 4);
            $echo_year2 = substr($year2, 0, 4);
            echo "Year: from " . $echo_year1 . " to " . $echo_year2 . "<br>";
            ?>
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
and country like '%$region%'
and vote_average >0 limit 200");#where module='$module'
            foreach ($filter_film as $row) {
                //$film_poster=$row['poster_path'];
                //$film_title=$row['title'];
                $get_vote_average = $row['vote_average'];
                $get_title = $row['title'];
                $film_poster = $row['poster_path'];
                $movie_id = $row['movie_id'];
                $get_vote = number_format($get_vote_average, 1);

                echo "<a target='_blank' href='movie-select-show.php?film_id=$movie_id' class='item'>
	 <div class='cover-wp'>
		 <span class='pic'>
			 <img src=https://image.tmdb.org/t/p/w500", $film_poster, " height=270 width=130 alt=''>
		 </span>
	 </div>
	 <p>
		 <span class='title'>$get_title</span>
		 <span class='rate'>$get_vote</span>
	 </p>
 </a>";
            }
            ?>

            <!--
           this is a static example

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
            -->
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
    exit("PDO Error: " . $e->getMessage() . "<br>");
}
?>
