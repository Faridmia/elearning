<?php

require_once 'admin/init.php';
$database = new Database();
$conn     = $database->connection;
if (isset($_POST['action'])) {

    $query = "SELECT * FROM courses";
    if (isset($_POST['category']) && isset($_POST['instructor'])) {
        $category_filter = implode("','", $_POST['category']);
        $instructor_filter = implode("','", $_POST['instructor']);
        $query .= " WHERE category_id IN('" . $category_filter . "') AND  users_id IN('" . $instructor_filter . "')";
    } else {

        if(!empty($_POST['category'])) {
            $category_filter = implode("','", $_POST['category']);
            $query .= " WHERE category_id IN('" . $category_filter . "')";

        }

        if(!empty($_POST['instructor'])) {
            $instructor_filter = implode("','", $_POST['instructor']);
            $query .= " WHERE users_id IN('" . $instructor_filter . "')";

        }
       
    }

    $exc_query = mysqli_query($conn, $query);
    $total_row = mysqli_num_rows($exc_query);
    if ($total_row > 0) {
        $output = '';
        while ($result = mysqli_fetch_array($exc_query)) {

            $course_id = $result['course_id'];
            $users_id  = $result['users_id'];

            $sql_rating = "SELECT * FROM review_table where course_id = {$course_id}";
            $rating_result     = mysqli_query($conn,$sql_rating);


            $array      = [];
            $count      = [];

            while ($row = mysqli_fetch_array($rating_result)) {
               
                $rating     = $row['user_rating'];
                $array[]    = $rating;
                $count[]    = count((array) $rating);
            }

            $rating_output = "";
            $array_sum     = array_sum($array);
            $count         = sizeof($count);
           
            
            if ($array_sum > 0) {
                $ranking = round($array_sum / $count);
            } else{
                 $ranking       = '';
            }

           // echo $ranking."</br>";

            $totalRating = 5;
            for ($i = 1; $i <= $totalRating; $i++) {
                if ($ranking < $i) {
                    $rating_output .= '<i class="fas fa-star"></i>';
                } else {
                    $rating_output .= '<i class="fas fa-star filled"></i>';
                }
            }

            $sql_user = "SELECT * FROM users where users_id = {$users_id}";
            $user_result     = mysqli_query($conn,$sql_user);

            $users_id   = '';
            $user_photo = '';
            while ($row = mysqli_fetch_array($user_result)) {
               
                $username   = $row['username'];
                $users_id   = $row['users_id'];
                $user_photo = $row['user_profile_photo'];
            }

            // total lesson list

            $lesson_sql   = "SELECT * FROM lesson WHERE course_id = {$course_id}";
            $lesson_query = mysqli_query($conn, $lesson_sql);
            $total_lesson = $database->numRows($lesson_query);

            $output .= '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="education_block_list_layout">

                    <div class="education_block_thumb n-shadow">
                        <a href="detail.php?courseid=' . $course_id . '"><img src="assets/img/course/' . $result['course_img'] . '" class="img-fluid" alt=""></a>
                    </div>

                    <div class="list_layout_ecucation_caption">

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="detail.php?courseid=' . $course_id . '">' . $result['course_title'] . '</a></h4>
                            <div class="course_rate_system">
                                <div class="course_ratting">
                                    ' . $rating_output . '
                                </div>
                            </div>

                            <div class="cources_price">Free</div>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="instructor-detail.php?usersid=' . $users_id . '"><img src="assets/img/profile/' . $user_photo . '" class="img-fluid" alt=""></a></div>
                                <h5><a href="instructor-detail.php?usersid=' . $users_id . '">'.$username.'</a></h5>
                            </div>
                            <div class="cources_info_style3">
                                <ul>
                                    <li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>' . $total_lesson . ' lectures</div></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
                ';
        }
    } else {
        $output = '<h3>No data Found</h3>';
    }

    echo $output;
}
