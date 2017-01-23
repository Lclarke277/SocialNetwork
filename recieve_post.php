<!-- 
Upon page account page load, load all post of user and users friends
-->

<?php
require_once 'connect.php';

$user_posting_id = $_SESSION['user_id'];

// Print Out All Post
$receive_stmt = $conn->prepare('SELECT * FROM post WHERE user_posting_id = ? ORDER BY date_stamp DESC, time_stamp DESC');
$receive_stmt->bind_param('s', $user_posting_id);
$receive_stmt->execute();
$receive_stmt->store_result();

// SELECT (bind_result) FROM users...
$receive_stmt->bind_result($post_id, $user_posting_id, $input, $date_stamp, $time_stamp);

while($receive_stmt->fetch()) {
    echo "<div class='post'>
    <p><span class='message'>" . $input . "</span><br>" . $date_stamp . "<br>" . $time_stamp . "</p></div>";
};


$receive_stmt->close();

?>