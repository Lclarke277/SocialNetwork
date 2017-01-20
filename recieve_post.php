<?php
require_once 'connect.php';

$user_posting_id = $_SESSION['user_id'];

// Print Out All Post
$receive_stmt = $conn->prepare('SELECT * FROM post WHERE user_posting_id = ?');
$receive_stmt->bind_param('s', $user_posting_id);
$receive_stmt->execute();
$receive_stmt->store_result();

// SELECT (bind_result) FROM users...
$receive_stmt->bind_result($post_id, $user_posting_id, $input, $time);

while($receive_stmt->fetch()) {
    echo "<p>" . $input . "</p>";
};


$receive_stmt->close();

?>