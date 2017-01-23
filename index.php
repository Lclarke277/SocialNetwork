<!DOCTYPE HTML>
<html>
<head>
<title>Social Media</title>
<script src="jquery-3.1.1.min.js"></script> 
<script src="register.js"></script>
<script src="login.js"></script>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
</head>
<body>
    
    <div id='wrap'>

        <div id="header">

        <img id='logo' src="images/site/logo.png">

        <form id='login_form' method='post' action='login.php'>
            <input id='login_email' type='text' name='email' maxlength='60' required='required' placeholder="Email">
            <input id='login_pass' type='password' name='password' maxlength='60' required='required' placeholder="Password">
            <input type='submit' name='login' value='Log In'>
        </form>    
        </div>

        <div id='main_body'>

            <span id='error_message' class='hidden'></span>
            <span id='success_message' class='hidden'></span> 

            <div id='register_wrap'>

            <h2 id='register'>Sign Up</h2>

            <form id='register_form' method='post' action='register.php'>
                <input class='register' type='text' name='first_name' maxlength='30' required='required' placeholder="First Name">
                <input class='register' type='text' name='last_name' maxlength='30' required='required' placeholder="Last Name">
                <input class='register' id='email_register' type='text' name='email' maxlength='60' required='required' placeholder="Email"><span id='email_exists'></span>
                <input class='register' type='password' name='password' maxlength='60' required='required' placeholder="Password">
                <input id='register_submit' type='submit' id='register_user' name='register' value='Register'>
            </form>
                
            </div><!-- Register Wrap -->



        </div><!-- Main Body -->    
    </div><!-- Wrap -->  
    
</body>         
</html>