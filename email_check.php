<!-- Check If Email Is Already In The System -->

<?php
require_once 'connect.php';

$email = 'lclarke@unca.edu';//$_POST['email'];

$check_stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$check_stmt->bind_param('s', $email);
$check_stmt->execute();
$check_stmt->store_result();
$check_stmt->bind_result($user_id, $first_name, $last_name, $email, $password);
$check_stmt->fetch();
$check_num_rows = $check_stmt->num_rows;
$check_stmt->close();

if($check_num_rows > 0) {
    echo "Email Exists";
} else {
    echo "Registered";
}



$conn->close();

?>