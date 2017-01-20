<?php 
session_start();
require_once 'connect.php';

$posting_user_id = $_SESSION['user_id'];
$input = $_POST['input'];

// Insert Your Post To Database
$insert_stmt = $conn->prepare('INSERT INTO post (posting_user_id, input)VALUES(?, ?)');
$insert_stmt->bind_param('ss', $posting_user_id, $input);
$insert_stmt->execute();

// Print Out All Post
$receive_stmt = $conn->prepare('SELECT * FROM post WHERE posting_user_id = ?');
$receive_stmt->bind_param('s', $posting_user_id);
$receive_stmt->execute();
$receive_stmt->store_result();

// SELECT (bind_result) FROM users...
$receive_stmt->bind_result($post_id, $input, $time);

while($receive_stmt->fetch()) {
    echo "<p>" . $input . "</p>";
};


$receive_stmt->close();

?>