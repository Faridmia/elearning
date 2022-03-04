<?php
require_once "maininclude/dashboard-header.php";
$name     = isset($_GET['name']) ? $_GET['name'] : '';
$database = new Database();
$conn     = $database->connection;
?>
<!-- ============================ Dashboard: My Order Start ================================== -->
<section class="gray pt-0">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <?php require_once "maininclude/dashboard-menubar.php"; ?>

            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="col-lg-12 col-md-6">
                    <h1 class="page-header">Do You Want to Delete This <?php echo $name; ?> </h1>
                    <?php
                    if ($name == 'course') { ?>
                        <?php
                        $course_id = (int) $_GET['courseid'];
                        $data      = array('course_id');
                        $query     = $database->getData("courses", $data, 'course_id', '=', $course_id);
                        $numRows   = $database->numRows($query);

                        if ($numRows == 1) {
                            if (isset($_POST['no']) && $_POST['no'] == 'NO') {
                                header('Location:all-courses.php');
                            } elseif (isset($_POST['yes']) && $_POST['yes'] == 'YES') {
                                if ($database->deletedata('courses', 'course_id', $course_id)) {
                                    echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                    header('Refresh: 3; url=all-courses.php');
                                } else {
                                    echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                }
                            }
                        } else {
                            echo 'Not found';
                        }
                        ?>
                        <form action="delete.php?courseid=<?php echo $course_id; ?>&name=course" method="post">
                            <input type="submit" name="yes" value="YES" class="btn btn-danger">
                            <input type="submit" name="no" value="NO" class="btn btn-success">
                        </form>
                    <?php
                    } elseif ($name == 'section') {

                        $sectionid = (int) $_GET['sectionid'];
                        $data      = array('section_id  ');
                        $query     = $database->getData("section", $data, 'section_id', '=', $sectionid);
                        $numRows   = $database->numRows($query);

                        if ($numRows == 1) {
                            if (isset($_POST['no']) && $_POST['no'] == 'NO') {
                                header('Location:add-section.php');
                            } elseif (isset($_POST['yes']) && $_POST['yes'] == 'YES') {
                                if ($database->deletedata('section', 'section_id', $sectionid)) {
                                    echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                    header('Refresh: 3; url=add-section.php');
                                } else {
                                    echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                }
                            }
                        } else {
                            echo 'Not found';
                        }
                    ?>
                        <form action="delete.php?sectionid=<?php echo $sectionid; ?>&name=section" method="post">
                            <input type="submit" name="yes" value="YES" class="btn btn-danger">
                            <input type="submit" name="no" value="NO" class="btn btn-success">
                        </form>
                    <?php } elseif ($name == 'lesson') {

                        $lessonid = (int) $_GET['lessonid'];
                        $data     = array('lesson_id');
                        $query    = $database->getData("lesson", $data, 'lesson_id', '=', $lessonid);
                        $numRows  = $database->numRows($query);

                        if ($numRows == 1) {
                            if (isset($_POST['no']) && $_POST['no'] == 'NO') {
                                header('Location:lessions.php');
                            } elseif (isset($_POST['yes']) && $_POST['yes'] == 'YES') {
                                if ($database->deletedata('lesson', 'lesson_id', $lessonid)) {
                                    echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                    header('Refresh: 3; url=lessions.php');
                                } else {
                                    echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                }
                            }
                        } else {
                            echo 'Not found';
                        }
                    ?>
                        <form action="delete.php?lessonid=<?php echo $lessonid; ?>&name=lesson" method="post">
                            <input type="submit" name="yes" value="YES" class="btn btn-danger">
                            <input type="submit" name="no" value="NO" class="btn btn-success">
                        </form>
                    <?php }

                    ?>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
</section>
<?php require_once "maininclude/footer.php"; ?>