<!-- Function for the register form on index.php 

    Checks if email is a valid email address
    Checks if email is already in the database 
    Alerts user -->

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

// Save raw password for later 
$password_raw = $_POST['password'];

// Check If Email Is Valid
if(filter_var($email, FILTER_VALIDATE_EMAIL))  {
    
    // Check If Email Exists
    $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql);

    // If The Email Is Valid But Already Exists
    if(mysqli_num_rows($result) > 0) {
        echo <<<_END

        <script>
        var message = $('#error_message');
        message.fadeIn(250).html('The email, $email already exists');
        message.delay(3000).fadeOut(1500);
        </script>    

_END;
        
    // If Email Is Valid AND Dosen't Exists, Exicute Register
    } else {
        $stmt = $conn->prepare('INSERT INTO users (first_name, last_name, email, password)VALUES(?, ?, ?, ?)');
        $stmt->bind_param('ssss', $first_name, $last_name, $email, $password);
        $stmt->execute();
        
        // Append Message
        // Add Email & Pass To Login Fields After Register
        echo <<<_END
        <script>
        var message = $('#success_message');
        message.fadeIn(250).html('You are registered $first_name, welcome.');
        message.delay(3000).fadeOut(1500);
        $('#login_email').val('$email');
        $('#login_pass').val('$password_raw');
        </script>    

_END;
$stmt->close();
}   
    
// Else, If The Email Is Not Valid
} else {
    echo <<<_END
    
    <script>
    var message = $('#error_message');
    message.fadeIn(250).html('The email, $email is invalid.<br> Please use a valid email.');
    message.delay(3000).fadeOut(1000);
    </script>    

_END;
    
}

$conn->close();


?>