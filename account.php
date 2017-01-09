<!DOCTYPE HTML>

<?php session_start(); 
require_once 'connect.php';?>

<html>
<head>
<title>Account</title>
<script src="jquery-3.1.1.min.js"></script> 
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
    

<h1>Your Logged In <?php echo $first_name . " " . $last_name ?>!</h1>
    
<a href="logout.php"><button>Logout</button></a>
    
  
    
</body>         
</html>