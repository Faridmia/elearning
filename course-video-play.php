<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
    exit();
}
require_once "maininclude/header.php";

$sqllesson_two = "SELECT lesson.lesson_id ,lesson.lesson_title,upload_video,lesson.course_id,lesson.section_id,lesson.video_url,section.section_id ,section.section_title,section.course_id FROM lesson INNER JOIN section ON lesson.section_id = section.section_id";


if (isset($_POST['lesson_id'])) {
    $seenid = $_POST['lesson_id'];
} else {
    $seenid = '';
}

$database = new Database();
$conn     = $database->connection;

if (isset($_POST['lesson_id'])) {
    $seenvideoid = $_POST['lesson_id'];

    $data = array(
        'seen' => 1,
    );

    $query = $database->updatedata('lesson', $data, 'lesson_id', '=', $seenvideoid);
} else {
    $seenvideoid = '';
}

if(isset($_GET['courseid'])) {
    $courseid = $_GET['courseid'];

}
?>
<div class="container-video video-block">
    <!-- Part 1 -->
    <div class="main-video video-tab">
        <div class="tab-content">
            <?php

           

           
           
            $sqllesson = "SELECT lesson.lesson_id ,lesson.lesson_title,upload_video,seen,lesson.course_id,lesson.section_id,lesson.video_url,section.section_id ,section.section_title,section.course_id
                FROM lesson
                INNER JOIN section ON lesson.section_id = section.section_id WHERE section.course_id = {$courseid}";

            $sec_query = mysqli_query($conn, $sqllesson);

            $count = 1;
            while ($row2 = mysqli_fetch_array($sec_query)) {
                $section_iddb = $row2['section_id'];
                $active       = '';
                $activetwo    = 'fade';
                $aria_exp     = 'false';
                if ($count == 1) {
                    $active    = 'show';
                    $aria_exp  = 'true';
                    $activetwo = 'active';
                }

                $lesson_id    = $row2['lesson_id'];
                $lesson_title = $row2['lesson_title'];
                $upload_video = $row2['upload_video'];
                $video_url = $row2['video_url'];
                $seen         = $row2['seen'];

            ?>

                <div class="tab-pane <?php echo $activetwo; ?>" id="videoTab<?php echo $count; ?>">
                    <iframe width="560" height="315" src="<?php echo $video_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="lesson-button"><span style="float:right;">
                            <form action="#" method="post" id="course_lesson">
                                <input type="hidden" name="lesson_id" value="<?php echo $lesson_id; ?>" />
                                <button type="submit" name="submitlesson" style="cursor: pointer;">Complete Lesson</button>
                            </form>
                        </span>
                    </div>
                </div>

            <?php
                $count++;
            } 

            
            ?>

        </div>
    </div>
    <div id="accordionExample" class="accordion shadow circullum video-list edu_wraper">
        <?php

        $query     = "SELECT * FROM section WHERE course_id = {$courseid} ORDER BY section_id ASC";
        $exc_query = mysqli_query($conn, $query);

        $i = 1;
        while ($row = mysqli_fetch_array($exc_query)) {
            $active   = '';
            $aria_exp = 'false';
            if ($i == 1) {
                $active   = 'show';
                $aria_exp = 'true';
            }
            $section_id    = $row['section_id'];
            $section_title = $row['section_title'];
        ?>
            <!-- Part 1 -->
            <div class="card">
                <div id="headingOne<?php echo $i; ?>" class="card-header text-light shadow-sm border-0">
                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne<?php echo $i; ?>" aria-expanded="<?php echo $aria_exp; ?>" aria-controls="collapseOne<?php echo $i; ?>" class="d-block position-relative text-dark collapsible-link py-2"><?php echo $section_title; ?></a></h6>
                </div>
                <div id="collapseOne<?php echo $i; ?>" aria-labelledby="headingOne<?php echo $i; ?>" data-parent="#accordionExample" class="collapse <?php echo $active; ?>">
                    <div class="card-body pl-3 pr-3">
                        <ul class="nav nav-tabs lectures_lists course-video-list">
                            <?php
                            $sqllesson = "SELECT lesson.lesson_id ,lesson.lesson_title,upload_video,seen,lesson.course_id,lesson.section_id,lesson.video_url,section.section_id ,section.section_title,section.course_id
                        FROM lesson
                        INNER JOIN section ON lesson.section_id = section.section_id WHERE lesson.course_id = {$courseid}";

                            $sec_query = mysqli_query($conn, $sqllesson);

                            $count = 1;
                            while ($row2 = mysqli_fetch_array($sec_query)) {
                                $section_iddb = $row2['section_id'];
                                $active       = '';
                                $activetwo    = '';
                                $aria_exp     = 'false';
                                if ($count == 1) {
                                    $active    = 'show';
                                    $aria_exp  = 'true';
                                    $activetwo = 'active';
                                }

                                $lesson_id    = $row2['lesson_id'];
                                $lesson_title = $row2['lesson_title'];
                                $upload_video = $row2['upload_video'];
                                $seen         = $row2['seen'];

                                if ($section_id == $section_iddb) {
                            ?>

                                    <li class="<?php echo $activetwo ?>" aria-expanded="false">
                                        <a href="#videoTab<?php echo $count; ?>" data-toggle="tab" aria-expanded="true">
                                            <h3 class="title"><?php echo $lesson_title; ?>

                                            </h3>
                                            <?php if ($seen == 1) { ?>
                                                <i class="fas fa-check"></i>
                                            <?php } else { ?>
                                                <i class="far fa-circle"></i>
                                            <?php } ?>
                                        </a>
                                    </li>

                            <?php }
                                $count++;
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php $i++;
        } ?>
    </div>
</div>
<?php

$sqllesson = "SELECT lesson.lesson_id ,lesson.lesson_title,upload_video,seen,lesson.course_id,lesson.section_id,lesson.video_url,section.section_id ,section.section_title,section.course_id
                        FROM lesson
                        INNER JOIN section ON lesson.section_id = section.section_id WHERE lesson.course_id = {$courseid}";
$sqllesson2 = "SELECT lesson.lesson_id ,lesson.lesson_title,upload_video,seen,lesson.course_id,lesson.section_id,lesson.video_url,section.section_id ,section.section_title,section.course_id
         FROM lesson
         INNER JOIN section ON lesson.section_id = section.section_id WHERE seen = 1 AND lesson.course_id = {$courseid}";

$sec_query  = mysqli_query($conn, $sqllesson);
$sec_query2 = mysqli_query($conn, $sqllesson2);

$fetch_data = mysqli_fetch_array($sec_query);

$rows       = $database->numRows($sec_query);
$seen_rows2 = $database->numRows($sec_query2);

$lesson_id = $fetch_data['lesson_id'];
$course_id = $fetch_data['course_id'];

if ($rows == $seen_rows2) {


?>

    <!-- ============================ Page Title Start================================== -->
    <div class="ed_detail_head">
        <div class="container" style="width:93%;max-width:93%;">
            <h2 class="text-center" style="margin-bottom: 30px;">Recommend Course For You</h2>
            <div class="row align-items-center">
                <?php
                $query = mysqli_query($conn, "SELECT * from courses  WHERE course_id = $course_id");

                $fetch    = mysqli_fetch_array($query);
                $category_id = $fetch['category_id'];

                $Rquery = mysqli_query($conn, "SELECT * from courses  WHERE course_id != $course_id and category_id = $category_id");
                $unique_id = 1;
                while ($Rfetch = mysqli_fetch_array($Rquery)) {


                    $course_title    = $Rfetch['course_title'];
                    $video_url       = $Rfetch['video_url'];
                    $course_duration = $Rfetch['course_duration'];
                    $course_img      = $Rfetch['course_img'];

                    $enroll_sql = "SELECT * FROM enroll WHERE course_id = {$course_id}";

                    $enroll_query = mysqli_query($conn, $enroll_sql);
                    $fetch_enroll = mysqli_fetch_array($enroll_query);
                    $total_enroll = $database->numRows($enroll_query);

                ?>

                    <div class="col-lg-4 col-md-4">

                        <div class="property_video">
                            <div class="thumb">
                                <img class="pro_img img-fluid w100" src="assets/img/course/<?php echo $course_img; ?>" class="img-fluid avater" alt="">
                                <div class="overlay_icon">
                                    <div class="bb-video-box">
                                        <div class="bb-video-box-inner">
                                            <div class="bb-video-box-innerup">
                                                <a href="<?php echo $video_url; ?>" data-toggle="modal" data-target="#popup-video<?php echo $unique_id;?>" class="theme-cl"><i class="ti-control-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ed_detail_wrap">
                            <div class="ed_header_caption">
                                <h4 class="bl-title"><a href="detail.php?courseid=<?php echo $course_id; ?>"><?php echo $course_title; ?></a></h4>
                                <ul>
                                    <li><i class="ti-calendar"></i>Duration: <?php echo $course_duration; ?></li>

                                    <li><i class="ti-user"></i><?php echo $total_enroll; ?> Student Enrolled</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="popup-video<?php echo $unique_id;?>" tabindex="-1" role="dialog" aria-labelledby="popup-video" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <iframe class="embed-responsive-item" width="100%" height="480" src="<?php echo $video_url; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- End Video Modal -->

                <?php $unique_id++;} ?>

            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
    
    
<?php } ?>

<script>
    let listVideo = document.querySelectorAll('.video-list .vid');
    let mainVideo = document.querySelector('.main-video video');

    let title = document.querySelector('.main-video .title');

    listVideo.forEach(video => {
        video.onclick = () => {
            listVideo.forEach(vid => vid.classList.remove('active'));
            video.classList.add('active');

            if (video.classList.contains('active')) {
                let src = video.children[0].getAttribute('src');
                mainVideo.src = src;
                let text = video.children[1].innerHTML;
                title.innerHTML = text;
            };
        }
    });
</script>

<?php

require_once "maininclude/footer.php"; ?>