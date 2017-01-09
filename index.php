<!DOCTYPE HTML>
<html>
<head>
<title>Social Media</title>
<script src="jquery-3.1.1.min.js"></script> 
<script src="register.js"></script>
<script src="login.js"></script>
</head>
<body>

<span id='register_message'></span>    
    
<form id='register_form' method='post' action='register.php'>
    First: <input type='text' name='first_name' maxlength='30' required='required'><br>
    Last: <input type='text' name='last_name' maxlength='30' required='required'><br>
    Email: <input id='email_register' type='text' name='email' maxlength='60' required='required'><span id='email_exists'></span><br>
    Password: <input type='password' name='password' maxlength='60' required='required'><br>
    <input type='submit' id='register_user' name='register' value='Register'>
</form>

    <br>

<span id='login_message'></span>
    
<form id='login_form' method='post' action='login.php'>
    Email: <input type='text' name='email' maxlength='60' required='required'><br>
    Password: <input type='password' name='password' maxlength='60' required='required'><br>
    <input type='submit' name='login' value='Log In'>
</form>
    
  
    
</body>         
</html>