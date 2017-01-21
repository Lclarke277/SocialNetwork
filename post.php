<?php 
session_start();
require_once 'connect.php';
date_default_timezone_set('EST');

$user_posting_id = $_SESSION['user_id'];
$input = $_POST['input'];

$date = date('Y-m-d');
$time = date('H:i:s');

// Insert Your Post To Database
$insert_stmt = $conn->prepare('INSERT INTO post (user_posting_id, input, date_stamp, time_stamp)VALUES(?, ?, ?, ?)');
$insert_stmt->bind_param('ssss', $user_posting_id, $input, $date, $time);
$insert_stmt->execute();

// Print Out All Post
$receive_stmt = $conn->prepare('SELECT * FROM post WHERE user_posting_id = ?');
$receive_stmt->bind_param('s', $user_posting_id);
$receive_stmt->execute();
$receive_stmt->store_result();

// SELECT (bind_result) FROM users...
$receive_stmt->bind_result($post_id, $user_posting_id, $input, $date_stamp, $time_stamp);

while($receive_stmt->fetch()) {
    echo "<p>" . $input . "<br>" . $date_stamp . "<br>" . $time_stamp . "</p>";
};


$receive_stmt->close();

?>