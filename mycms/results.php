<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>A News Platfrom</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
<div class="container">

 <div class="head">
 <a href="index.php" ><img id="logo" src="images/news1.gif" /></a>
  <img id="banner" src="images/banner2.gif"/>
 </div>
     <?php include ("includes/navbar.php");?>
	 
	   <div class="post_area">
     <?php
	   if(isset($_GET['search'])){
	   $get_query=$_GET['search_query'];
	   if($get_query==''){
	     echo "<script>alert('please write a  keywords')</script>";
		 echo "<script>window.open('index.php','_self')</script>";
		 exit();
	   }
       $get_posts="select * from posts where post_keywords like '%$get_query%'";
	   $run_posts=mysql_query($get_posts);
       while($row_posts=mysql_fetch_array($run_posts)){
	   
	      $post_id=$row_posts['post_id'];
	      $post_title=$row_posts['post_title'];
		  $post_date=$row_posts['post_date'];
          $post_author=$row_posts['post_author'];
		  $post_image=$row_posts['post_image'];
		  $post_content=substr($row_posts['post_content'],0,260);

        echo "
		
		 <h2> <a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
		 <span><i>Posted by </i> <b>$post_author </b> &nbsp; On <b>$post_date </b></span><span style='color:brown;'></span>
		 <img src='admin/news_images/$post_image' width='100' height='100'/>
		 <div>$post_content<a id='rmlink' href='details.php?post=$post_id'>Read More</a></div><br/>
	
		";


	   
	   }
   
     }
	  else
	 
	   if(isset($_GET['cat'])){
	    $cat_id=$_GET['cat'];
       $get_posts="select * from posts where category_id='$cat_id'";
	   $run_posts=mysql_query($get_posts);
       while($row_posts=mysql_fetch_array($run_posts)){
	   
	      $post_id=$row_posts['post_id'];
	      $post_title=$row_posts['post_title'];
		  $post_date=$row_posts['post_date'];
          $post_author=$row_posts['post_author'];
		  $post_image=$row_posts['post_image'];
		  $post_content=substr($row_posts['post_content'],0,260);

        echo "
		
		 <h2> <a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
		 <span><i>Posted by </i> <b>$post_author </b> &nbsp; On <b>$post_date </b></span><span style='color:brown;'></span>
		 <img src='admin/news_images/$post_image' width='100' height='100'/>
		 <div>$post_content<a id='rmlink' href='details.php?post=$post_id'>Read More</a></div><br/>
	
		";


	   
	   }
   
     }
	 
     ?>
</div>


      <?php include ("includes/sidebar.php");?>

 
 <div class="footer">
    <h1 style="padding:20px; text-align:center;"> &copy; All Rights Reserved 2016 -Onlinebd.com </h1>
 </div>
</div>
</body>
</html>
