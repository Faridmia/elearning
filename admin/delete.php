<?php require_once('includes/header.php');  ?>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <?php require_once('includes/top-nav.php');  ?>
    <!-- Navigation -->
    <?php
    require_once('includes/top-nav.php');

    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $database    = new Database();
    $conn        = $database->connection;
    // $page = $_POST['page'];
    ?>


    <!-- ============================ Dashboard: My Order Start ================================== -->
    <section class="gray pt-0">
        <div class="container-fluid">

            <!-- Row -->
            <div class="row">

                <?php require_once("includes/menu-navbar.php"); ?>

                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="col-lg-12 col-md-6">
                    <h1 class="page-header">Do You Want to Delete This <?php echo $name; ?> </h1>

                   <?php 
                    if ( $name == 'course' ) { ?>    
                        <?php
                            $course_id          = (int) $_GET['courseid'];
                            $data           = array('course_id');
                            $query          = $database->getData("courses", $data, 'course_id', '=', $course_id);
                            $numRows        = $database->numRows($query);  

                            if( $numRows == 1 ) {
                                if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                    header('Location:all-courses.php');
                                } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                    if( $database->deletedata('courses', 'course_id', $course_id) ) {
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
                        <form action="delete.php?courseid=<?php echo $course_id;?>&name=course" method="post">
                            <input type="submit" name="yes" value="YES" class="btn btn-danger">
                            <input type="submit" name="no" value="NO" class="btn btn-success">
                        </form>
                    <?php 
                    } elseif ( $name == 'student' ) { ?>    
                        <?php
                            $stuid          = (int) $_GET['stuid'];
                            $data           = array('users_id');
                            $query          = $database->getData("users", $data, 'users_id', '=', $stuid);
                            $numRows        = $database->numRows($query);  

                            if( $numRows == 1 ) {
                                if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                    header('Location:all-students.php');
                                } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                    if( $database->deletedata('users', 'users_id', $stuid) ) {
                                        echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                        header('Refresh: 3; url=all-students.php');
                                    } else {
                                        echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                    }
                                }
                            } else {
                                echo 'Not found';
                            }
                        ?>
                        <form action="delete.php?stuid=<?php echo $stuid;?>&name=student" method="post">
                            <input type="submit" name="yes" value="YES" class="btn btn-danger">
                            <input type="submit" name="no" value="NO" class="btn btn-success">
                        </form>
                    <?php }
                    elseif ( $name == 'category' ) { ?>    
                        <?php
                            $catid          = (int) $_GET['catid'];
                            $data           = array('cat_id');
                            $query          = $database->getData("categories", $data, 'cat_id', '=', $catid);
                            $numRows        = $database->numRows($query);  

                            if( $numRows == 1 ) {
                                if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                    header('Location:category.php');
                                } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                    if( $database->deletedata('categories', 'cat_id', $catid) ) {
                                        echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                        header('Refresh: 3; url=category.php');
                                    } else {
                                        echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                    }
                                }
                            } else {
                                echo 'Not found';
                            }
                        ?>
                        <form action="delete.php?catid=<?php echo $catid;?>&name=category" method="post">
                            <input type="submit" name="yes" value="YES" class="btn btn-danger">
                            <input type="submit" name="no" value="NO" class="btn btn-success">
                        </form>
                    <?php }
                    elseif ( $name == 'terms' ) { ?>    
                        <?php
                            $tid          = (int) $_GET['tid'];
                            $data           = array('t_id');
                            $query          = $database->getData("terms", $data, 't_id', '=', $tid);
                            $numRows        = $database->numRows($query);  

                            if( $numRows == 1 ) {
                                if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                    header('Location:add_terms_conditions.php');
                                } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                    if( $database->deletedata('terms', 't_id', $tid) ) {
                                        echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                        header('Refresh: 3; url=add_terms_conditions.php');
                                    } else {
                                        echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                    }
                                }
                            } else {
                                echo 'Not found';
                            }
                        ?>
                        <form action="delete.php?tid=<?php echo $tid;?>&name=terms" method="post">
                            <input type="submit" name="yes" value="YES" class="btn btn-danger">
                            <input type="submit" name="no" value="NO" class="btn btn-success">
                        </form>
                    <?php }
                    elseif ( $name == 'faq_cat' ) {    
                       
                            $faqcatid       = (int) $_GET['faqcatid'];
                            $data           = array('faq_cat_id ');
                            $query          = $database->getData("faq_category", $data, 'faq_cat_id ', '=', $faqcatid);
                            $numRows        = $database->numRows($query);  

                            if( $numRows == 1 ) {
                                if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                    header('Location:faq_category.php');
                                } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                    if( $database->deletedata('faq_category', 'faq_cat_id', $faqcatid) ) {
                                        echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                        header('Refresh: 3; url=faq_category.php');
                                    } else {
                                        echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                    }
                                }
                            } else {
                                echo 'Not found';
                            }
                        ?>
                        <form action="delete.php?faqcatid=<?php echo $faqcatid;?>&name=faq_cat" method="post">
                            <input type="submit" name="yes" value="YES" class="btn btn-danger">
                            <input type="submit" name="no" value="NO" class="btn btn-success">
                        </form>
                    <?php }

                    elseif ( $name == 'section' ) {    
                                        
                        $sectionid       = (int) $_GET['sectionid'];
                        $data           = array('section_id  ');
                        $query          = $database->getData("section", $data, 'section_id', '=', $sectionid);
                        $numRows        = $database->numRows($query);  

                        if( $numRows == 1 ) {
                            if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                header('Location:add-section.php');
                            } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                if( $database->deletedata('section', 'section_id', $sectionid) ) {
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
                    <form action="delete.php?sectionid=<?php echo $sectionid;?>&name=section" method="post">
                        <input type="submit" name="yes" value="YES" class="btn btn-danger">
                        <input type="submit" name="no" value="NO" class="btn btn-success">
                    </form>
                    <?php }
                elseif ( $name == 'lesson' ) {    
                                        
                    $lessonid       = (int) $_GET['lessonid'];
                    $data           = array('lesson_id');
                    $query          = $database->getData("lesson", $data, 'lesson_id', '=', $lessonid);
                    $numRows        = $database->numRows($query);  

                    if( $numRows == 1 ) {
                        if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                            header('Location:lessons.php');
                        } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                            if( $database->deletedata('lesson', 'lesson_id', $lessonid) ) {
                                echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                header('Refresh: 3; url=lessons.php');
                            } else {
                                echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                            }
                        }
                    } else {
                        echo 'Not found';
                    }
                ?>
                <form action="delete.php?lessonid=<?php echo $lessonid;?>&name=lesson" method="post">
                    <input type="submit" name="yes" value="YES" class="btn btn-danger">
                    <input type="submit" name="no" value="NO" class="btn btn-success">
                </form>
                <?php }
                    elseif ( $name == 'faq' ) {    
                       
                        $faqid       = (int) $_GET['faqid'];
                        $data           = array('faq_id ');
                        $query          = $database->getData("faq", $data, 'faq_id', '=', $faqid);
                        $numRows        = $database->numRows($query);  

                        if( $numRows == 1 ) {
                            if( isset($_POST['no']) && $_POST['no'] == 'NO' ) {
                                header('Location:add_faq.php');
                            } elseif( isset($_POST['yes']) && $_POST['yes'] == 'YES' ) {
                                if( $database->deletedata('faq', 'faq_id', $faqid) ) {
                                    echo "<div class='alert alert-success'>Successfully Deleted.</div>";
                                    header('Refresh: 3; url=add_faq.php');
                                } else {
                                    echo "<div class='alert alert-danger'>Data is not deleted.</div>";
                                }
                            }
                        } else {
                            echo 'Not found';
                        }
                    ?>
                    <form action="delete.php?faqid=<?php echo $faqid;?>&name=faq" method="post">
                        <input type="submit" name="yes" value="YES" class="btn btn-danger">
                        <input type="submit" name="no" value="NO" class="btn btn-success">
                    </form>
                <?php }
                    
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Dashboard: My Order Start End ================================== -->

    <!-- /#wrapper -->
    <?php require_once('includes/footer.php');  ?>

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php require_once('includes/js.php'); ?>

</body>

</html>