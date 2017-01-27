<!-- 
Upon page account page load, load all post of user and users friends
-->

<?php
require_once 'connect.php';

$user_posting_id = $_SESSION['user_id'];

// Print Out All Post
//$receive_stmt = $conn->prepare('SELECT * FROM post WHERE user_posting_id = ? ORDER BY date_stamp DESC, time_stamp DESC');

// Using a Inner Join
$receive_stmt = $conn->prepare("SELECT users.first_name, users.last_name, post.input, DATE_FORMAT(post.date_stamp,'%b %e %Y'), DATE_FORMAT(post.time_stamp, '%h:%i %p') FROM users INNER JOIN post ON users.user_id = post.user_posting_id WHERE users.user_id = ? ORDER BY date_stamp DESC, time_stamp DESC;");
$receive_stmt->bind_param('s', $user_posting_id);
$receive_stmt->execute();
$receive_stmt->store_result();

// SELECT (bind_result) FROM users...
$receive_stmt->bind_result($first, $last, $input, $date_stamp, $time_stamp);

while($receive_stmt->fetch()) {
    echo "<div class='post'>
    
    <img class='post_image' src='images/$user_posting_id/profile.jpg'>
    
    <div class='post_details'>
    <p class='post_name'>" . $first  . " " . $last . "
    <span class='datetime'><br>" . $date_stamp . "<br>" . $time_stamp . "</span></p>
    </div>
    
    
    <p class='datetime'><span class='message'>" . $input . "</span></p>
    
    </div>";
};


$receive_stmt->close();

?>