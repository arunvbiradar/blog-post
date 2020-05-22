<?php 
    // databse connection
    $db = new mysqli('localhost','root','', 'crud-php-bs-modal');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
    }

    // check if the form is submitted
    // collect the form data from post
    // escape the form fields for any malicious input
    if(!empty($_POST['name'])):
        $name = $db->real_escape_string($_POST['name']);
        $email = $db->real_escape_string($_POST['email']);
        $country = $db->real_escape_string($_POST['country']);
        $phone = $db->real_escape_string($_POST['phone']);
        $bio = $db->real_escape_string($_POST['bio']);

        // mysql query to update the database with form data
        $query = "INSERT INTO `users` SET `name`= '$name', `email`= '$email', `country`='$country', `phone`='$phone', `bio`='$bio'";
    endif;

    if(isset($query)) {        
        // interaction with database
        $sql = $db->query($query);
        $result = $db->query('SELECT * FROM users order by name ASC');
        if(!$row = mysqli_fetch_assoc($result)){
            //response error
            echo false;
        } else {    
            //response success
            echo 'Success';
        }
    }

?>