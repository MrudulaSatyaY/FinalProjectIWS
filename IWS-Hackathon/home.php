<!DOCTYPE HTML>
<?php
	session_start();
	require "connect.inc.php";
?>
<html>
<head>
	<title>hackathon</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/main.css">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/javascript.js"></script>
    	<link rel="stylesheet" href="jquery-ui.min.css">
		<script src="external/jquery/jquery.js"></script>
		<script src="jquery-ui.min.js"></script>
    	<link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    
    	
</head>
<body>
	<div cs="container">
		<nav id="heading" class="navbar navbar-default w3-theme-d1">
				<div class="container-fluid" style="display:flex;">
					
					<h1 id="website_name"><a  href="#" >Articlulate</a></h1>
					
					<form  id="search_box" class="navbar-form" role="search" action="home.php" method = 'POST'>
					    <div class="input-group add-on">
					      <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" name= "keyword" type="text">
					      <div class="input-group-btn">
					        <button class="btn btn-default" type="submit" name = "sub" onclick="search()"><i class="glyphicon glyphicon-search"></i></button>
					      </div>
					    </div>
				  </form>

				</div>
		</nav>
		<nav class="col-md-2 sidebar">
			<div id="nav_out" class="collapse navbar-collapse bs-example-js-navbar-collapse">
				<ul  class="nav navbar-nav"  id="navigation">
					<li id="filter_menu" class="dropdown">
							<a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup = "true" role="button" aria-expanded="false">
								Filter
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
									<li id="location_choice" role="presentation"><a role="menuitem" tabindex="-1" href="#">Location</a></li>
									<li id="rating_choice" role="presentation"><a role="menuitem" tabindex="-1" href="#">Rating</a></li>
								</ul>
					</li>
					<li id="history_label"><a href="#">History</a></li>
					<li id="Bookmarks_label"><a href="#">Bookmarks</a></li>
					<li id="account_label"><a href="#">Account</a></li>
				</ul>
			</div>
		</nav>
		<section id="article_display_section" class="col-md-8">
			<ul  id="article_class">
				<li id="recommended_class"><button>Recommended</button></li>
				<li id="trending_class"><button>Trending</button></li>
			</ul>

			<div id="cardCarrier">
				<p></p>
			</div>

		</section>
		<aside id="topic_display_bar" class="col-md-2">
			<ul style = "list-style:none" id="navigation">
				<li><a href="#">All Topics</a></li>
				
			</ul>
		</aside>
	</div>
	<script type="text/javascript">
		var idnum=1,flag=0;
		 function bookmark_color()
		 {
		 	var x = document.getElementById("bookmark_button");
		 	x.style.color = 'blue';

		 }

		 function star1_color(ele,num)
		 {
		 	var y = document.getElementById(num.id);
		 	y.style.color = 'gold';
		 	$.post( "home.php", {star_value: ele, flag : 1});
		 	
		 }
		 function star2_color(ele,num)
		 {
		 	var y = document.getElementById(num.id);
		 	y.style.color = 'gold';
		 	$.post( "home.php", {star_value: ele, flag : 2 });
		 }

		 function star3_color(ele,num)
		 {
		 	var y = document.getElementById(num.id);
		 	y.style.color = 'gold';
		 	$.post( "home.php", {star_value: ele, flag : 3 });
		 }
		 function star4_color(ele,num)
		 {
		 	var y = document.getElementById(num.id);
		 	y.style.color = 'gold';
		 	$.post( "home.php", {star_value: ele, flag : 4});
		 }
		 function star5_color(ele,num)
		 {
		 	var y = document.getElementById(num.id);
		 	y.style.color = 'gold';
		 	$.post( "home.php", {star_value: ele, flag : 5});
		 }
	</script>
	<?php
		$count = 0;
	 	$query_id = "select count(articleId) from articles";
		$query_run = mysql_query($query_id);
		if($res = mysql_fetch_array($query_run) or die(mysql_error())){
			$count = $res[0];
		}
		$query_title = "select * from articles";
		$query_run1 = mysql_query($query_title);
		if(isset($_POST['star_value'])&&isset($_POST['flag'])){
			$starVal = $_POST['star_value'];
			$flag = $_POST['flag'];
			$query_rating = "update articleinfo set rating='".$flag."' where articleId='".$starVal."'";
			$query_run2 = mysql_query($query_rating);
		}
	?>
	<script type="text/javascript">
		var count = <?php echo $count ?>;
		//function for displaying the article
	 	function displayArticle()
	 	{
		 	var i;
		 	<?php 
		 	while($rows=mysql_fetch_assoc($query_run1))
		 	{
		 	?>
		 	
		 	$('#cardCarrier').append('<div id="card_template" class="card" ><div class="card-header">					<h4 id="art_title" align="left"><?php 
							
        					echo $rows["title"];
    					
				
			?></h4>	<i id="bookmark_button" class="fa fa-bookmark" onclick="bookmark_color()" ></i></div><div class="card-body"><img id="article_image_holder" src="<?php echo $rows['imageUrl'];?>" alt="image unavaliable"></div><hr><div class="card-footer"><div id="rating_stars"><span id="star1'+idnum+'" class="glyphicon glyphicon-star" onclick="star1_color(<?php echo $rows['articleId'];?>,this)"></span><span id="star2'+idnum+'" class="glyphicon glyphicon-star" onclick="star2_color(<?php echo $rows['articleId'];?>,this)" ></span><span id="star3'+idnum+'" class="glyphicon glyphicon-star" onclick="star3_color(<?php echo $rows['articleId'];?>,this)"></span><span id="star4'+idnum+'" class="glyphicon glyphicon-star" onclick="star4_color(<?php echo $rows['articleId'];?>,this)"></span><span id="star5'+idnum+'" class="glyphicon glyphicon-star" onclick="star5_color(<?php echo $rows['articleId'];?>,this)"></span></div><ul  id="keyword_list">		    			<li id="keyword1">#</li><li id="keyword2">#</li><li id="keyword3">#</li><li id="keyword4">#</li>		    			<li id="keyword5">#</li></ul></div></div>');
			idnum++;
		 	<?php
		 	}?>

		}
		displayArticle();
	</script>
	<?php
		function getkeywordidfield() {
			$keywordvar = $_POST["keyword"];
			$query_keywordId = "select keywordId from keywords where keyword = '".$keywordvar."'";
			$query_run3 = mysql_query($query_keywordId);
			if($res_key = mysql_fetch_array($query_run3)){
				 return $res_key[0];
			}
		}
		function getarticleidfield() {
			$keywordId = getkeywordidfield();
			$query_articleid = "select articleId from articleinfo where keywordId = '".$keywordId."'";
			$query_run4 = mysql_query($query_articleid);
			if($res_article = mysql_fetch_array($query_run4)){
				 return $res_article[0];
			}
		}
	?>
	<script type="text/javascript">

		 function search(){
		 <?php
		 	if(isset($_POST['keyword'])){
		 		$keyword = $_POST['keyword'];
		 		$articleid = getarticleidfield();
		 		if(!empty($_POST['keyword'])){
		 			if(isset($_POST['sub'])){
		 				$query_search = "select * from articles where articleId='".$articleid."'";
		 				$query_runSearch = mysql_query($query_search);
		 			}
		 		}
		 	}
		 	?>
		 	displaySearchArticle();
		}
	</script>
	<script type="text/javascript">
		 function displaySearchArticle()
	 	{

		 	<?php 
		 	while($rows1=mysql_fetch_assoc($query_runSearch))
		 	{
		 	?>
		 	
		 	$('#cardCarrier').append('<div id="card_template" class="card" ><div class="card-header">					<h4 id="art_title" align="left"><?php 
							
        					echo $rows1["title"];
    					
				
			?></h4>	<i id="bookmark_button" class="fa fa-bookmark" onclick="bookmark_color()" ></i></div><div class="card-body"><img id="article_image_holder" src="<?php echo $rows1['imageUrl'];?>" alt="image unavaliable"></div><hr><div class="card-footer"><div id="rating_stars"><span id="star1'+idnum+'" class="glyphicon glyphicon-star" onclick="star1_color(<?php echo $rows1['articleId'];?>,this)"></span><span id="star2'+idnum+'" class="glyphicon glyphicon-star" onclick="star2_color(<?php echo $rows1['articleId'];?>,this)" ></span><span id="star3'+idnum+'" class="glyphicon glyphicon-star" onclick="star3_color(<?php echo $rows1['articleId'];?>,this)"></span><span id="star4'+idnum+'" class="glyphicon glyphicon-star" onclick="star4_color(<?php echo $rows1['articleId'];?>,this)"></span><span id="star5'+idnum+'" class="glyphicon glyphicon-star" onclick="star5_color(<?php echo $rows1['articleId'];?>,this)"></span></div><ul  id="keyword_list">		    			<li id="keyword1">#</li><li id="keyword2">#</li><li id="keyword3">#</li><li id="keyword4">#</li>		    			<li id="keyword5">#</li></ul></div></div>');
			idnum++;
		 	<?php
		 	}?>

		}

	</script>
	

	
</body>
</html>