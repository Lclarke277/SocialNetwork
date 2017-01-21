// Send the Register form without refreshing the page using ajax

$(function() {
    $('#user_search_form').submit(function(event) {
        // Default Action is to redirect. Prevent that
        event.preventDefault(); 
        
        $.ajax({
            type: 'POST', // Form Method
            url: 'search_users.php', // Form Action   
            data: $(this).serialize(),
            
            // On Success, Append Data From register.php
            success: function(data) {
                
                // display the error message
                $("#search_area").html(data);
                // jQuery(data).appendTo("#post_area");   
            }
         });
        // Clear the form fields after submit
        $("#user_search_form").trigger("reset");
    });
}); 
