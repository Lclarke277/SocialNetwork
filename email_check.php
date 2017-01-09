<!-- Check If Email Is Already In The System -->

<?php
require_once 'connect.php';

$email = 'lclarke@unca.edu';//$_POST['email'];

$sql = "SELECT * FROM users WHERE email = '" . $email . "'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    echo "Email Exists";
} else {
    echo "Registered";
}

?>