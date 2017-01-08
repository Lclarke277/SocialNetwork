<!-- Function for the register form on index.php -->

<?php 
require_once 'connect.php';

// Salt for Hasing Password
$salt = '$kl._';
$pepper = 'l*&s';

// Format Name w/ Only Capital First Letter
function formatName($var) {
$var = strtolower($var);
$var = ucwords($var);
return $var;
}

$first_name = formatName($_POST['first_name']);
$last_name = formatName($_POST['last_name']);
$email = strtolower($_POST['email']);
$password = hash('ripemd128', $salt . $_POST['password'] . $pepper);

// If The Email Is Valid, Execute
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
    $stmt = $conn->prepare('INSERT INTO users (first_name, last_name, email, password)VALUES(?, ?, ?, ?)');
    $stmt->bind_param('ssss', $first_name, $last_name, $email, $password);
    $stmt->execute();
    echo <<<_END
    
    <script>
    var message = $('#register_message');
    message.show().html('You are registered $first_name, welcome.');
    </script>    

_END;
$stmt->close();
    
// Else, If The Email Is Not Valid
} else {
    echo <<<_END
    
    <script>
    var message = $('#register_message');
    message.show().html('The email: $email is invalid. Please use a valid email.');
    </script>    

_END;
    
}

$conn->close();


?>