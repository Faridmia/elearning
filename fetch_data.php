<?php

    require_once('admin/init.php');
	$database       = new Database();
    $conn           = $database->connection;

   


    if(isset($_POST['action'])){

        $query = "SELECT * FROM courses";

        if(isset($_POST['category'])){

            $category_filter = implode("','",$_POST['category']);
            $query .= " WHERE category_id IN('".$category_filter."')";
        }

        $exc_query = mysqli_query($conn,$query);

        $total_row = mysqli_num_rows($exc_query);

        if($total_row > 0) {
            $output = '';
            while($result = mysqli_fetch_array( $exc_query)) {

                $course_id = $result['course_id'];

                $sql_two = "SELECT users.users_id,users.user_profile_photo, reviews.r_id,reviews.rating,reviews.users_id,reviews.course_id,reviews.r_name,reviews.email,reviews.message,reviews.added
                FROM reviews
                INNER JOIN users ON reviews.users_id = users.users_id WHERE course_id = $course_id";
            
                    $result_2 = $conn->query($sql_two);
                    $fetch_data = mysqli_fetch_array($result_2);
                    // echo "<pre>";
                    // print_r($fetch_data);
                    // echo "</pre>";
                $rating_output = "";
                while($row = mysqli_fetch_array( $result_2)) {
                    $rating = $row['rating'];
                    
                    for ($i=1; $i <= $rating; $i++) { 
                        $rating_output .= '<i class="fas fa-star filled"></i>';
                    }
                }
                  
                   

                $output .= '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="education_block_list_layout">
                    
                    <div class="education_block_thumb n-shadow">
                        <a href="detail.php?courseid='.$course_id.'"><img src="assets/img/course/'.$result['course_img'].'" class="img-fluid" alt=""></a>
                    </div>
                    
                    <div class="list_layout_ecucation_caption">
                    
                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="detail.php?courseid='.$course_id.'">'.$result['course_title'].'</a></h4>
                            <div class="course_rate_system">
                                <div class="course_ratting">
                                    '.$rating_output.'
                                </div>											
                            </div>
                            <div class="cources_price">$'.$result['course_sell_price'].'<div class="less_offer">$'.$result['course_original_price'].'</div></div>
                        </div>

                        <div class="education_block_footer mt-3">
                            <div class="education_block_author">
                                <div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-5.jpg" class="img-fluid" alt=""></a></div>
                                <h5><a href="instructor-detail.html">Adam Wilson</a></h5>
                            </div>
                            <div class="cources_info_style3">
                                <ul>
                                    <li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>70 lectures</div></li>
                                </ul>
                            </div>
                        </div>
                    
                    </div>
                    
                </div>	
            </div>
                ';
            }
        }else{
            $output = '<h3>No data Found</h3>';
        }

        echo $output;


    }
    
