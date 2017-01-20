<?php 
session_start(); 
require_once 'connect.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Account</title>
<script src="jquery-3.1.1.min.js"></script> 
<script src='post.js'></script>
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

/*
For new profiles, create the accounts image directory,
then copy the default profile image to the folder 
*/
if(!is_dir("images/". $_SESSION['user_id'] . "/")) {
    mkdir("images/". $_SESSION['user_id'] . "/");
    copy("images/profile.jpg", "images/". $_SESSION['user_id'] . "/profile.jpg");
}
    
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
    
    move_uploaded_file($file_tmp,"images/". $_SESSION['user_id'] . "/profile.jpg");
   }    
?>

<div id='wrap'>

<div id='header'>
<h1>Your Logged In <?php echo $first_name . " " . $last_name ?>!</h1>
</div><!-- Header -->
    
<div id='left'>
    
<!-- Profile Picture -->
<div id='profile_wrap' style="background-image: url('images/<?php echo $_SESSION['user_id'] ?>/profile.jpg')">
 </div>   
    
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit"/>
 </form>    
    
<a href="logout.php"><button>Logout</button></a>
</div><!-- Left -->  
    
<div id='right'>
    
    <form id='post_form' action="post.php" method="POST">
        <input type='text' name='input' placeholder='whats on your mind?'>
        <input type='submit' name='post' value='Post'>
    </form>
    
    <div id='post_area'></div>
    
</div><!-- Right -->  
</div><!-- Wrap -->    
</body>         
</html>