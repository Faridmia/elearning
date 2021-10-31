<?php 

    ob_start();
    require_once('admin/init.php');
    require_once('admin/functions.php');

    $database       = new Database();
    $conn           = $database->connection;

    if(isset($_POST['query'])){

        $inputText = $_POST['query'];

        $query = "SELECT course_title FROM courses WHERE course_title LIKE '%$inputText%'";

        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)){

                echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['course_title']." </a>"; 
            }
        }else{
            echo "<p class='list-group-item border-1'>No Search Data Found</p>";
        }
    }