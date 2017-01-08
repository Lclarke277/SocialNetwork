<?php
require_once 'connect.php';

// Salt for Hasing Password
$salt = '$kl._';
$pepper = 'l*&s';

$email = $_POST['email'];
$password = hash('ripemd128', $salt . $_POST['password'] . $pepper);


$stmt = $conn->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$stmt->store_result();

// SELECT (bind_result) FROM users...
$stmt->bind_result($user_id, $first_name, $last_name, $email, $password);
$stmt->fetch();
$num_of_rows = $stmt->num_rows;
$stmt->close();

/*
echo $email . "<br>";
echo $password . "<br";
echo $num_of_rows;
*/

// The User Exists
if($num_of_rows > 0) {
    header("Location: account.php");
    
// If The User Doesnt Exists
} else {
    header("Location: http://www.reddit.com");
}

?>