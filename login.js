// Send the Register form without refreshing the page using ajax

$(function() {
    $('#login_form').submit(function(event) {
        // Default Action is to redirect. Prevent that
        event.preventDefault(); 
        
        $.ajax({
            type: 'POST', // Form Method
            url: 'login.php', // Form Action   
            data: $(this).serialize(),
            
            // On Success, Append Data From register.php
            success: function(data) {
                
                // login.php returns 1 if user exists
                if (data == "1") {
                    
                // take them to the account page
                window.location.href='account.php';
                window.reload();
                    
                // display the error message
                } else {
                 jQuery(data).appendTo("#error_message");   
                }
                
            }
        });
        // Clear the form fields after submit
        $("#login_form").trigger("reset");
    });
}); 