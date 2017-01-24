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
                $("#search_area").removeClass('hidden');
                $("#search_area").html(data);
                
                // If you click on the body, close the pop-up
                $(document.body).click(function() {
                    $('#search_area').addClass('hidden');
                });
                
                // Below prevents window from cosing if the clicked area
                // is apart of the search div
                $('#search_area').click(function(e) {
                    e.stopPropagation();
               });   
            }
         });
        // Clear the form fields after submit
        $("#user_search_form").trigger("reset");
    });
}); 
