// Send the Register form without refreshing the page using ajax

$(function() {
    $('#register_form').submit(function(event) {
        // Default Action is to redirect. Prevent that
        event.preventDefault(); 
        
        $.ajax({
            type: 'POST', // Form Method
            url: 'register.php', // Form Action   
            data: $(this).serialize(),
            
            // On Success, Append Data From register.php
            success: function(data) {
                $('#register_message').removeClass('hidden');
                jQuery(data).appendTo("#register_message");
            }
        });
        // Clear the form fields after submit
        $("#register_form").trigger("reset");
    });
}); 

