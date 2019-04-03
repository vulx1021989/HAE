<?php 
// connection database.
    require_once "../database/connection.php";
    
    // define variables and set to empty values
    $IDErr = "";
    $ID = "";

	$validate = [
		   "message" =>"Error",
		   "dataError" => " Can not delete this message!"
	];

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

     if( !empty($ID)) {

     	$sql = "DELETE FROM messages WHERE ID = '$ID' ";
	     if (mysqli_query($conn, $sql)) {
		         $validate = [
				   "message" =>"Sucess",
				   "dataSucess" => "Delete this messages successfully",
			     ];
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	      }
        
     }
     echo json_encode($validate);
     mysqli_close($conn);

?>