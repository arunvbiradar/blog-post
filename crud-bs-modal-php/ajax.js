'use strict';

// ajax
$(document).ready(function() {

    // form button click
    $('#users_form').on('submit', function(e){
        e.preventDefault();  // stop form from submitting

        // ajax call to update datatbase
        $.ajax({
            type: 'POST',
            url:"php-interaction.php",
            data: $(this).serialize(),
            success: function(response) {
                if(response) {
                    $('#user-info').modal('hide'); // hide the modal when the user info is saved
                    $('#userAlert').show(); // show the alert message for saving the user info successfully
                }                
            }
        })
    })

});