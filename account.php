<!DOCTYPE HTML>

<?php session_start(); 
require_once 'connect.php';?>

<html>
<head>
<title>Account</title>
<script src="jquery-3.1.1.min.js"></script> 
<link rel="stylesheet" type="text/css" href="css/account.css"> 
</head>
<body>
    
<?php 
    
if(!isset($_SESSION['user_id'])) {
    session_destroy();
    header('Location: index.php');
}    

// Fetch All The Users Info & Save As Variables
// Save This As A Function Later
$user_info = "SELECT first_name, last_name, email FROM users WHERE user_id='" . $_SESSION['user_id'] . "'";
$query = mysqli_query($conn, $user_info);

$row = mysqli_fetch_array($query);

$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email']; 
?>


<?php // File Upload 
if(isset($_FILES['image'])){
      $errors = array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type= $_FILES['image']['type'];
      $file_ext = pathinfo($_FILES['image']['name'])['extension'];
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         // If No Errors, Make The Dir and Upload File 
         if(!is_dir("images/". $_SESSION['user_id'] . "/")) {
             mkdir("images/". $_SESSION['user_id'] . "/"); 
         };
          
         // Storing Profile Pic In images/(user_id)/profile.jpg  
         move_uploaded_file($file_tmp,"images/". $_SESSION['user_id'] . "/profile.jpg");
         echo "Success";
      }else{
         print_r($errors);
      }
   }    
?>
    

<h1>Your Logged In <?php echo $first_name . " " . $last_name ?>!</h1>

<!-- Profile Picture -->
<div id='profile_wrap' style="background-image: url('images/<?php echo $_SESSION['user_id'] ?>/profile.jpg')">
 </div>   
    
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit"/>
 </form>    
    
<a href="logout.php"><button>Logout</button></a>
    
  
    
</body>         
</html>