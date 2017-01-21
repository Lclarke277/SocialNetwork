<!-- 
Search users in the database
-->

<?php
session_start();
require_once 'connect.php';

$current_user = $_SESSION['user_id'];

// Wildcards for the search added
$search = "%" . $_POST['user_search'] . "%";

// Searches by users first or last name, can be changed later
$search_stmt = $conn->prepare("SELECT user_id, first_name, last_name from users WHERE (first_name LIKE ? OR last_name LIKE ?) AND user_id != ?");
$search_stmt->bind_param('ssi', $search, $search, $current_user);
$search_stmt->execute();
$search_stmt->store_result();

// SELECT (bind_result) FROM users...
$search_stmt->bind_result($search_user_id, $search_first, $search_last);

while($search_stmt->fetch()) {
    echo "<p>" . $search_first . " " . $search_last . "<br></p>";
};


$search_stmt->close();

?>