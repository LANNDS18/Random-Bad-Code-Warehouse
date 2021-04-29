
<ul class="category">
  <li><span class="tag"><a href="javascript:goSort('year',0)">All years</span></li>
  <li><span><a href="javascript:goSort('year',1)">10's</a></span></li>
  <li><span><a href="javascript:goSort('year',2)">00's</a></span></li>
  <li><span><a href="javascript:goSort('year',3)">90's</a></span></li>
  <li><span><a href="javascript:goSort('year',4)">80's</a></span></li>
  <li><span><a href="javascript:goSort('year',5)">70's</a></span></li>
  <li><span><a href="javascript:goSort('year',6)">60's</a></span></li>
  <li><span><a href="javascript:goSort('year',7)">50's</a></span></li>















<!DOCTYPE html>
<html>

<head>
  <style type="text/css">

.search_text{ overflow:hidden; height:100%; padding-top:5px; padding-bottom:5px;}
.search_text h1{ color:#6a6a6a; font-weight:bold; float:left; font-size:14px; margin:0px; padding:0px;}
.search_text ul{ margin:0; padding:0; list-style:none; float:left; overflow:hidden; height:100%;}
.search_text li{ list-style:none; color:#6a6a6a; float:left; width:80px; padding-left:8px; padding-right:5px; white-space:nowrap}
.search_text li a{ list-style:none; color:#6a6a6a;}
.search_text li a:hover{ list-style:none; color:#fe8f01; font-weight:bold; text-decoration:underline;}
.search_text li.selected{color:#fe8f01; font-weight:bold;}
.search_text li.selected a{color:#fe8f01;}
.search_text li.selected a:hover{color:#fe8f01;}
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
			 	//$get_actor_id=$_GET['act_id'];

				//$row = $result ->fetch();
				//$get_one_genre=$row['genre_name'];
        $get_genre_id=$_GET['genre'];
        $get_actor_id=$_GET['act_id'];

	?>

  <?php
/**
*加入搜索条件
*/
$where ="1";
$year_array = array(1=>'2015',2=>'2014');
$ctype_array = array(1=>'0',2=>'1');
$colors_array = array(1=>'0',2=>'1',3=>'2',4=>'3',5=>'4',6=>'5');
$lengths_array = array(1=>'0',2=>'1',3=>'2',4=>'3',5=>'4',6=>'5',7=>'6');
$micronaire_array = array(1=>'0',2=>'1',3=>'2',4=>'3',5=>'4');
if(isset($year)&&($year!=0)) $where .= " AND year=".$year_array[$year];
if(isset($ctype)&&($ctype!=0)) $where .= " AND ctype=".$ctype_array[$ctype];
if(isset($colors)&&($colors!=0)) $where .= " AND colors=".$colors_array[$colors];
if(isset($lengths)&&($lengths!=0)) $where .= " AND lengths=".$lengths_array[$lengths];
if(isset($micronaire)&&($micronaire!=0)) $where .= " AND micronaire=".$micronaire_array[$micronaire];
/**
*加入搜索条件
*/
?>
	<title>sort</title>
  <div class="search_text" id="genre">
      <h1>Genre：</h1>
      <ul>
        <li class="selected"><a href="javascript:goSort('genre',0)">ALL</a></li>
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
  </div>
  <div class="search_text" id="region">
      <h1>Regions：</h1>
      <ul>
        <li class="selected"><a href="javascript:goSort('region',0);">ALL</a> </li>
        <li><a href="javascript:goSort('region',1);">UK</a></li>
        <li><a href="javascript:goSort('region',2);">China</a></li>
        </li>
      </ul>
  </div>
  <div class="search_text" id="year">
      <h1>Year：</h1>
      <ul>
        <li class="selected"><a href="javascript:goSort('year',0);">ALL</a> </li>
        <li><a href="javascript:goSort('year',1);">白棉1级</a></li>
        <li><a href="javascript:goSort('year',2);">白棉2级</a></li>
        <li><a href="javascript:goSort('year',3);">白棉3级</a></li>
        <li><a href="javascript:goSort('year',4);">白棉4级</a></li>
        <li><a href="javascript:goSort('year',5);">白棉5级</a></li>
        <li><a href="javascript:goSort('year',6);">淡点污棉1级</a></li>
      </ul>
  </div>

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
      var oldUrl = (document.URL.indexOf("filter.php")==-1)?document.URL+"filter.php":document.URL;
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
</body>
<?php
/**
*加入搜索条件
*/
$where ="1";
$genre_array = array(1=>'2015',2=>'2014');
$region_array = array(1=>'0',2=>'1');
$year_array = array(1=>'0',2=>'1',3=>'2',4=>'3',5=>'4',6=>'5');
if(isset($year)&&($year!=0)) $where .= " AND year=".$year_array[$year];
if(isset($ctype)&&($ctype!=0)) $where .= " AND ctype=".$ctype_array[$ctype];
if(isset($colors)&&($colors!=0)) $where .= " AND colors=".$colors_array[$colors];
/**
*加入搜索条件
*/
?>
</html>
<?php
$pdo = NULL;
} catch (PDOException $e) {
exit("PDO Error: ".$e->getMessage()."<br>");
}
?>
