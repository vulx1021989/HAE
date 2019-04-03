<?php 
// connection database.
    require_once "../database/connection.php";
    
    // define variables and set to empty values
	$title_messageErr = $description_messageErr = $IDErr = "";
	$title_message = $description_message = $ID = "";

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

  
   if (empty($_POST["ID"])) {
	    $IDErr = "ID message is requried";
	  } else {
	    $ID = test_input($_POST["ID"]);
	  }

	  function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

     if( !empty($title_message) && !empty($description_message) && !empty($ID)) {

     	$sql = "UPDATE messages SET  title_message = '$title_message ', description_message = '$description_message' WHERE ID = '$ID' ";
         if (mysqli_query($conn, $sql)) {
		         $validate = [
				   "message" =>"Sucess",
				   "dataSucess" => "Update messages successfully",
			     ];
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	      }
        
     }
     echo json_encode($validate);
     mysqli_close($conn);

?>