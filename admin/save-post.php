<?php
  include "config.php";
  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png","webp");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  session_start();
  $title = mysqli_real_escape_string($conn, $_POST['post_title']);
  $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
  
//   step2
$metaDescription = mysqli_real_escape_string($conn, $_POST['metatag_description']);

$metaKeywords = mysqli_real_escape_string($conn, $_POST['metatag_keywords']);

$post_url = mysqli_real_escape_string($conn, $_POST['post_url']);

$post_url = trim($post_url);

  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $date = date("d M, Y");
  $author = $_SESSION['user_id'];

  
  $auto_increment_sql = "SELECT `AUTO_INCREMENT` as new_id FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'findagrijobs' AND TABLE_NAME = 'post'";
  $result = mysqli_query($conn, $auto_increment_sql) or die("Query Failed.");

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($rows = mysqli_fetch_assoc($result)) {

       $auto_increment = $rows["new_id"];
    }
  } else {
   // echo "0 results";
  }
  $sql = "INSERT INTO post(title, description,category,post_date,author,post_img,meta_description,meta_keywords,post_url)
  VALUES('{$title}','{$description}',{$category},'{$date}',{$author},'{$new_name}','{$metaDescription}','{$metaKeywords}', 
    CONCAT(
      (SELECT REPLACE('{$post_url}', ' ', '-')) ,
      '-',
      {$auto_increment}
    )    
  );";
 echo $sql;

  // $sql = "INSERT INTO post(title, description,category,post_date,author,post_img,meta_description,meta_keywords)
  //         VALUES('{$title}','{$description}',{$category},'{$date}',{$author},'{$new_name}','{$metaDescription}','{$metaKeywords}');";
  $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/post.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
