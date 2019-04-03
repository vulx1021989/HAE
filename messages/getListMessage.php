<?php 
// connection database.
    require_once "../database/connection.php";
    require_once "../paginator/paginator.class.php";


    $limit      = ( isset( $_GET['show_per_page'] ) ) ? $_GET['show_per_page'] : 6;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 6;
    $query      = "SELECT messages.ID, messages.user_id, messages.title_message, messages.description_message,messages.created_at ,users.user_login  FROM messages
                          LEFT JOIN users ON messages.user_id = users.ID Where messages.status = 1 ORDER BY messages.ID DESC";

    $Paginator  = new Paginator( $conn, $query );
    $results    = $Paginator->getData($links,$page);
    $results->pagination =  $Paginator->createLinks( $links, 'pagination pagination-sm');
	echo json_encode($results);
	mysqli_close($conn);

 
?>