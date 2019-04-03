<?php 
// connection database.
    require_once "../database/connection.php";
    
    // define variables and set to empty values
	$title_messageErr = $description_messageErr = $user_idErr = "";
	$title_message = $description_message = $user_id = "";

	$validate = [
		   "message" =>"Error",
		   "title_messageErr" =>" ",
		   "description_messageErr" =>" ",

	];

    if (empty($_POST["title_message"])) {
         $title_messageErr = "Title message is required";
         $validate = [
		   "message" =>"Error",
		   "title_messageErr" => $title_messageErr,
		   "description_messageErr" =>$description_messageErr,
	     ];
	  } else {
	    $title_message = test_input($_POST["title_message"]);
	  }

    if (empty($_POST["description_message"])) {
        $description_messageErr = "Description message is requried";
	         $validate = [
			   "message" =>"Error",
			   "title_messageErr" => $title_messageErr,
			   "description_messageErr" => $description_messageErr,
		     ];
		  } else {
		    $description_message = test_input($_POST["description_message"]);
		  }

   if (empty($_POST["user_id"])) {
	    $user_idErr = "User is requried";
	  } else {
	    $user_id = test_input($_POST["user_id"]);
	  }

	  function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

     if( !empty($title_message) && !empty($description_message) && !empty($user_id) ) {

     	$sql = "INSERT INTO messages (user_id, title_message, description_message, status)
                VALUES ('$user_id', '$title_message', '$description_message' , 1)";

         if (mysqli_query($conn, $sql)) {
		         $validate = [
				   "message" =>"Sucess",
				   "dataSucess" => "New record messages created successfully",
			     ];
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	      }
        
     }
     echo json_encode($validate);
     mysqli_close($conn);

?>