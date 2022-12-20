<?php
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
  //echo "<h1>" .  . "</h1>";
  include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
 
  switch($page){
    case "single.php":
      if(isset($_GET['id'])){
        $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['title'];
      }else{
        $page_title = "No Post Found";
      }
      break;
      
      
    case "category.php":
      if(isset($_GET['cid'])){
        $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['category_name'] . " Jobs";
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "author.php":
      if(isset($_GET['aid'])){
        $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = "Jobs By " .$row_title['first_name'] . " " . $row_title['last_name'];
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "search.php":
      if(isset($_GET['search'])){

        $page_title = $_GET['search'];
      }else{
        $page_title = "No Search Result Found";
      }
      break;
    default :
      $sql_title = "SELECT websitename FROM settings";
      $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
      $row_title = mysqli_fetch_assoc($result_title);
      $page_title = $row_title['websitename'];
      break;
      
  }
 
?>

<!--//   switch statement for metatag description-->
<?php

 include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
 
  switch($page){
    case "single.php":
      if(isset($_GET['id'])){
        $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $meta_description = $row_title['meta_description'];
      }else{
        $meta_description = "No Post Found";
      }
      break;
  }

?>
<!--//   switch statement for metatag keywords-->
<?php

 include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
 
  switch($page){
    case "single.php":
      if(isset($_GET['id'])){
        $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $meta_keywords = $row_title['meta_keywords'];
      }else{
        $meta_keywords = "No Post Found";
      }
      break;
  }

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <meta name="keywords" content="<?php echo 	$meta_keywords; ?>"/>
    <meta name="description" content="<?php echo 	$meta_description; ?>"/>

    
    
    <!--Bootstrap icons-->
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']?>/public_html/css/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']?>/public_html/css/bootstrap.min.css" >
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']?>/public_html/css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']?>/public_html/css/style.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']?>/public_html/css/style1.css">
    
    <!--one signal-->
    
    <script src="./scripts/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "33d6d114-90ca-4f13-b347-170b13484169",
    });
  });
</script>


 <!--Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-243930142-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-243930142-1');
</script>

    
    
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4 ">
              <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                    if($row['logo'] == ""){
                      echo '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                    }else{
                      $server_uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
                      echo '<a href="index.php" id="logo"><img src="' .$server_uri. '/public_html/admin/images/'. $row['logo'] .'"  alt="find-agri-jobs-logo"></a>';
                    }

                  }
                }
                ?>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
    
    <div class="social-icons ">
                    <a class="social-icon-youtube" href="https://www.youtube.com/c/BScAgriculture9"><i class="bi bi-youtube"></i></a>
                    <a class="social-icon-facebook " href="https://www.facebook.com/bscagriculture09"><i class="bi bi-facebook"></i></a>
                    <a class="social-icon-instagram " href="https://www.instagram.com/bscagriculture/"><i class="bi bi-instagram"></i></a>
                    <a class="social-icon-quora " href="https://www.quora.com/profile/BSc-Agriculture-3"><i class="bi-quora"></i></a>
                    <a class="social-icon-twitter " href="#!"><i class="bi bi-twitter"></i></a>
                    <a class="social-icon-linkedin " href="#!"><i class="bi bi-linkedin"></i></a>
<a class="social-icon-telegram" href="https://t.me/joinchat/6OV_LKiEoS40NGRl"><i class="bi bi-telegram"></i></a></div>
<!--latest tag-->
<div class="marker marker-ribbon marker-primary pos-absolute align_centre" style="margin-top: 5px;"><h4 style="background-color: #ebe60b;color: black;font-size: 17px;font-weight: bold;margin-bottom: -1px;border: 2px solid black;">Latest Updates</h4></div>

<!--marquee box with latest-->

<div class="box-part box-part-home-latest">
                            
             <marquee onmouseover="this.stop();" onmouseout="this.start();" direction="up" behavior="scroll" scrollamount="2" style="height: 109px!important;" white-space:normal!important"="" class="latestPart">
   <p>
    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
    <content style="color:#012B55">Clarification regarding examination being conducted on two days for Common University Entrance Test [CUET (PG)-2022]&nbsp;</content>
       <a href="/Download/Notice/Notice_20220904212913.pdf" class="orange-text" target="_blank">
            <strong>Read More&nbsp;</strong></a>
            <img src="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']?>/public_html/css/newicon.gif">
      </p>
      
    <p>
    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
     <content style="color:#012B55">PRESS RELEASE NTA Declares IGNOU Ph.D.-2021 Entrance Examination Results&nbsp;</content>
     <a href="/Download/Notice/Notice_20220402173111.pdf" class="orange-text" target="_blank">
      <strong>Read More&nbsp;</strong>
       </a>
     </p>
     
      <p>
        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
            <content style="color:#012B55">NATIONAL TESTING AGENCY Final Answer Key JNUEE&nbsp;</content>
            <a href="/Download/Notice/Notice_20211216152939.pdf" class="orange-text" target="_blank">
            <strong>Read More&nbsp;</strong> </a>
     </p>
     
     <p>
         <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
          <content style="color:#012B55">Public Notice: Conduct of National Eligibility cum Entrance Test (UG) 2021.&nbsp;</content>
         <a href="/Download/Notice/Notice_20210312225050.pdf" class="orange-text" target="_blank">
            <strong>Read More&nbsp;</strong>
                 </a>
            </p>
            
      <p>
         <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
        <content style="color:#012B55">PUBLIC NOTICE: Revision  of  Scores  of  Joint  CSIR-UGC  NET  June  2020  for  Subject Mathematical Sciences&nbsp;</content>
         <a href="/Download/Notice/Notice_20210123171935.pdf" class="orange-text" target="_blank">
            <strong>Read More&nbsp;</strong></a>
     </p>

     </marquee>
         <div class="align_right" style="margin-top:-20px!important">
                                
            </div>
            </div>

                        


</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
                include "config.php";

                if(isset($_GET['cid'])){
                  $cat_id = $_GET['cid'];
                }

                $sql = "SELECT * FROM category WHERE post > 0";
                $result = mysqli_query($conn, $sql) or die("Query Failed. : Category");
                if(mysqli_num_rows($result) > 0){
                  $active = "";
              ?>
                <ul class='menu'>
                  <li><a href='<?php echo $hostname; ?>'>Home</a></li>
                  <?php while($row = mysqli_fetch_assoc($result)) {
                    if(isset($_GET['cid'])){
                      if($row['category_id'] == $cat_id){
                        $active = "active";
                      }else{
                        $active = "";
                      }
                    }
                  $server_uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
                    echo "<li><a class='{$active}' href='{$server_uri}/public_html/category.php/{$row['category_name']}'>{$row['category_name']}</a></li>";
                  } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
