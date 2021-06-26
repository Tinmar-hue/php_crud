<?php 

include("db.php");

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("query fail");
    }

    $_SESSION['message'] = 'Task removed successfully';
    $_SESSION['message_type'] = 'danger';
    header("location: index.php");
}

?>