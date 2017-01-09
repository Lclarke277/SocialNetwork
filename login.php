<?php
require_once 'connect.php';

// Salt for Hasing Password
$salt = '$kl._';
$pepper = 'l*&s';

$email = strtolower($_POST['email']);
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

// The User Exists
if($num_of_rows > 0) {
    echo "1";
    session_start();
    $_SESSION['user_id'] = $user_id; 
    
// If The User Doesnt Exists
} else {
        echo <<<_END

        <script>
        var message = $('#login_message');
        message.show().html('Invalid Login');
        message.delay(2000).fadeOut(1000);
        </script>    

_END;
}

?>