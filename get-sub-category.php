<?php
require_once 'admin/init.php';
require_once 'admin/functions.php';

$database = new Database();

$c_id   = (int) $_POST['c_id'];
$sub_id = isset( $_POST['sub_id'] ) ? (int) $_POST['sub_id'] : '';

$data  = array( 'sub_id', 'sub_name' );
$query = $database->getData( "sub_categories", $data, "cat_id", "=", "$c_id" );
echo "<label for='p_name'>Course Sub category</label>";
echo "<select name='course_sub_category' class='form-control'>";

while ( $row = mysqli_fetch_array( $query ) ) {
    $db_sub_id = (int) $row['sub_id'];
    $sub_name  = $row['sub_name'];
    if ( $sub_id == $db_sub_id ) {
        $sel = 'selected = "selected" ';
    } else {
        $sel = '';
    }
    echo "<option $sel value='$db_sub_id'>$sub_name</option>";

}

echo "</select>";
