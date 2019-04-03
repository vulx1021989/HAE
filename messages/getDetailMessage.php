<?php



   require_once "../database/connection.php";

    $ID      =  $_GET['ID'];
    $sql   =  "SELECT  messages.ID, messages.user_id, messages.title_message, messages.description_message, users.user_login  FROM messages
                LEFT JOIN users ON messages.user_id = users.ID Where messages.status = 1 AND messages.ID = $ID ";   
    $results = mysqli_query($conn, $sql);
    $mess = [];

   if (mysqli_num_rows($results) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($results)) {
	    $mess = $row;
       
	    }
	}             
	echo json_encode($mess);
	mysqli_close($conn);
