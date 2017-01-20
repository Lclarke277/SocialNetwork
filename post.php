<?php 
session_start();
require_once 'connect.php';

$user_posting_id = $_SESSION['user_id'];
$input = $_POST['input'];

// Insert Your Post To Database
$insert_stmt = $conn->prepare('INSERT INTO post (user_posting_id, input)VALUES(?, ?)');
$insert_stmt->bind_param('ss', $user_posting_id, $input);
$insert_stmt->execute();

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