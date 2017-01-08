<?php 

$email = 'ldsklgjsdl';

if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    echo "VALID AS HELL";
    
// Else, If The Email Is Not Valid
} else {
    echo "INVALID BITCH SUCK IT";
}


?>