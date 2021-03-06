// Send the Register form without refreshing the page using ajax

$(function() {
    $('#post_form').submit(function(event) {
        // Default Action is to redirect. Prevent that
        event.preventDefault(); 
        
        $.ajax({
            type: 'POST', // Form Method
            url: 'post.php', // Form Action   
            data: $(this).serialize(),
            
            // On Success, Append Data From register.php
            success: function(data) {
                
                // display the error message
                $("#post_area").load(location.href + " #post_area");
                // jQuery(data).appendTo("#post_area");   
            }
         });
        // Clear the form fields after submit
        $("#post_form").trigger("reset");
    });
}); 
